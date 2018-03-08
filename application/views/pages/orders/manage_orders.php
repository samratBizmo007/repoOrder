<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Orders</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert/jquery-confirm.css">
  <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/alert/jquery-confirm.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/js/const.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/js/orders/manage_order.js"></script>
  
</head>
<body>
  <!-- !PAGE CONTENT! -->
  <div class="w3-main w3-padding-small" style="margin-left:120px;">

    <!-- Header -->
    <header class="w3-container" >
      <h5><b><i class="fa fa-cubes"></i> Manage Orders</b></h5>
    </header>

    <div class="w3-row-padding w3-margin-bottom">
     <!-- container for tab -->
     <br>
     <ul  class="nav nav-tabs">
      <li class="active "><a class="w3-medium w3-button w3-red"  href="#show_table" data-toggle="tab">My Order</a></li>
      <li><a class="w3-medium w3-orange w3-button w3-text-white"  href="#newOrders" data-toggle="tab">New Order</a></li>

    </ul>

    <div class="tab-content clearfix "><br><!-- tab containt starts -->
      <div class="tab-pane active" id="show_table">  <!-- tab for Raw material starts here -->
        <div class="">                    
          <div class="w3-col l6 w3-margin-top">
            <div class="" id="All_Orders" name="All_Orders" style="">
              <table class="table table-striped table-responsive w3-small"> 
                <!-- table starts here -->
                <thead>
                  <tr class="">
                    <th class="text-center">Sr. No.</th>
                    <th class="text-center">Order NO.</th>
                    <th class="text-center">Posted On</th>
                    <th class="text-center">Action</th>  
                  </tr>
                </thead>
                <tbody ><!-- table body starts here -->
                  <?php 
                                    //print_r($orders);
                  if ($orders['status'] == 200) {//print_r($Purchased['status_message']);
                  $count=1;

                  for ($i = 0; $i < count($orders['status_message']); $i++) {                                             
                    echo '<tr class="text-center">
                    <td class="text-center">' . $count . '.</td>
                    <td class="text-center">#OID-'.$orders['status_message'][$i]['order_id'].'</td>
                    <td class="text-center">'.date('M d,Y', strtotime($orders['status_message'][$i]['order_date'])).'-'.date('h:i a', strtotime($orders['status_message'][$i]['order_time'])).'</td>
                    <td class="text-center">
                    <a class="btn w3-padding-small" data-toggle="modal" data-target="#myOrder_'.$orders['status_message'][$i]['order_id'].'" title="view order" style="padding:0"><i class="fa fa-eye"></i></a>
                    <a class="btn w3-padding-tiny" id="delOrder_btn" name="delOrder_btn" onClick="delOrder('.$orders['status_message'][$i]['order_id'].')" title="delete order"><i class="fa fa-remove"></i></a>
                    </td>';   
                    $product_info=json_decode($orders['status_message'][$i]['order_products'],TRUE);

                    echo'
                    <!-- Modal -->
                    <div id="myOrder_'.$orders['status_message'][$i]['order_id'].'" class="modal fade" role="dialog"><!--  modal for vshow portfolio information -->
                    <div class="modal-dialog modal-md">
                    <!-- Modal content-->
                    <div class="modal-content">                         
                    <div class="modal-body w3-small w3-round-large">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="w3-container w3-margin-bottom">
                    <div class="w3-col l12">
                    <h3 class="w3-center"><b>Order No. #OID-'.$orders['status_message'][$i]['order_id'].'</b></h3>
                    
                    <div class="w3-col l12 w3-text-grey"><hr>';

                    foreach($product_info as $key)
                    {
                      //print_r($key);
                      echo '
                      <!-- for loop starts -->
                      <div class="col-lg-12 w3-margin-bottom">
                      
                      <div class="w3-col l6 s6 w3-padding-small w3-center">
                      <img class="img img-thumbnail" alt="Item Image not available" style="height: 100px; width: 100px; object-fit: contain" src="'.base_url().''.$key['prod_image'].'" onerror="this.src=\''.base_url().'images/default_image.png\'">
                      </div>
                      <div class="w3-col l6 s6 w3-padding-small">
                      <div class="w3-col l12 ">
                      <label class="">Item Name:</label>
                      <p class="">'.$key['prod_Name'].'</p>
                      </div>
                      <div class="w3-col l12 ">
                      <label class="">Quantity:</label>
                      <p class="" >'.$key['prod_quantity'].' No(s).</p>
                      </div>
                      </div>
                      </div>

                      <!-- for loop end -->
                      ';
                    } 
                    $count++;
                    echo '
                    </div>
                    </div>
                    </div>
                    </div>  
                    </div>
                    </div>
                    </div>
                    <!-- modal ends here -->
                    ';
                    
                  }
                }
                else {

                  echo '
                  <tr class="text-center" >
                  <td colspan="5"><b>No Orders Available</b></td>
                  </tr>
                  ';
                }
                ?>
              </tbody><!-- table body close here -->
            </table>   <!-- table closed here -->
          </div>
        </div>
      </div>
    </div><!-- table container ends here -->
    <!--____________________________________ tab div 1 ends here_________________________________________ -->

    <!--_______________________________ tab 3 starts here_____________________________________________ -->

    <div class="tab-pane" id="newOrders">
      <!-- tab 3 starts here -->
      <!-- container starts here -->
      <!-- Manage Profiles div -->
      <div class="w3-col l12 w3-padding-left w3-padding-right ">

        <div class="w3-col l12 w3-small">
          <form id="addOrder_form" enctype="multipart/form-data">       
            <!-- Product div start -->
            <div class="w3-col l12 w3-margin-bottom w3-margin-top">
              <header class="w3-col l12" >
                <h6><b><i class="fa fa-first-order"></i> Place New Order</b></h6>
                <span class="w3-small"></span>
              </header>
              <div class="w3-col l12 w3-margin-top">
                <div class="col-lg-7 w3-margin-top">
                  <label class="w3-label">Product Name:</label>
                  <input type="text" class="w3-input" name="prod_Name[]" placeholder="Enter Product Description" required>
                </div>
                
                <div class="col-lg-1 w3-margin-top">
                  <label class="w3-label">Quantity:</label>
                  <input type="number" min="1" class="w3-input" name="prod_quantity[]" placeholder="count" required >
                </div>
                <div class="col-lg-4 w3-margin-top">
                 <div class="w3-col l7">
                  <label class="w3-label">Product Image:</label>
                  <div class="w3-col l12 w3-padding-bottom">
                    <img src="" width="180px" id="prod_imagePreview_1" height="180px" alt="Product Image will be displayed here once chosen. Image size is:(100px * 80px)" class=" w3-centerimg img-thumbnail">
                  </div>
                  <input type="file" name="prod_image[]" id="prod_image_1" class="w3-input w3-padding-small" onchange="readURL(this,1);">
                </div>

                <div class="w3-col l4">
                 <!--  <span><a  id="add_moreProduct" title="Add new Item" class="btn add_moreProduct w3-small w3-text-red w3-right w3-margin-top">Add item <i class="fa fa-plus"></i></a></span> -->
               </div>
             </div>
           </div>
         </div>
         <div id="added_newProduct" class="w3-col l12"></div>
         <div class="w3-col l12 w3-right">
          <span><a  id="add_moreProduct" title="Add new Item" class="btn add_moreProduct w3-small w3-text-red w3-right w3-margin-top">Add item <i class="fa fa-plus"></i></a></span>
        </div>
        <!-- material div end -->
        <div class="w3-col l12 w3-center">
          <button type="submit" title="Raise Order" class="w3-margin w3-button  w3-red">Raise New Order</button>
        </div>
      </form>
    </div>

  </div>
  <!-- manage profile div end -->


</div>         
<!-- ___________________________tab 2 div ends here__________________________________ -->
<!-- ____________________________the tab 2 ends here____________________ -->

</div><!-- tab containt ends here -->
</div>
<!-- End page content -->
</div>

<!-- script to add more material div  -->
<script>
  $(document).ready(function () {
    var max_fields = 10;
    var wrapper = $("#added_newProduct");
    var add_button = $("#add_moreProduct");

    var x = 1;
    $(add_button).click(function (e) {
      e.preventDefault();
      if (x < max_fields) {
        x++;

        $(wrapper).append('<div class="">\n\
          <div class="w3-col l12 w3-margin-bottom"><hr>\n\
          <div class="col-lg-12 w3-margin-top">\n\
          <div class="col-lg-7 w3-margin-top">\n\
          <label class="w3-label">Product Name:</label>\n\
          <input type="text" class="w3-input" name="prod_Name[]" placeholder="Enter Product Description" required>\n\
          </div>\n\
          <div class="col-lg-1 w3-margin-top">\n\
          <label class="w3-label">Quantity:</label>\n\
          <input type="number" min="1" class="w3-input" name="prod_quantity[]" placeholder="count" required >\n\
          </div>\n\
          <div class="col-lg-4 w3-margin-top">\n\
          <div class="w3-col l7">\n\
          <label class="w3-label">Product Image:</label>\n\
          <div class="w3-col l12 w3-padding-bottom">\n\
          <img src="" width="180px" id="prod_imagePreview_'+x+'" height="180px" alt="Product Image will be displayed here once chosen. Image size is:(100px * 80px)" class=" w3-centerimg img-thumbnail">\n\
          </div>\n\
          <input type="file" name="prod_image[]" id="prod_image_'+x+'" class="w3-input w3-padding-small" onchange="readURL(this,'+x+');">\n\
          </div>\n\
          </div>\n\
          </div>\n\
          <a href="#" class="delete btn w3-text-grey w3-right w3-margin-right w3-small" title="remove item">remove item <i class="fa fa-remove"></i></a>\n\
          </div>\n\
          </div>'); //add input box

      } else
      {
          $.alert('<label class="w3-label w3-text-red"><i class="fa fa-warning w3-xxlarge"></i> You Reached the maximum limit of adding '+max_fields+' fields</label>');   //alert when added more than 4 input fields
        }
      });

    $(wrapper).on("click", ".delete", function (e) {
      e.preventDefault();
      $(this).parent('div').remove();
      x--;
    })
  });
</script>
<!-- script to add more material end -->

<!-- script to delete order -->
<script>
  function delOrder(id){
    $.confirm({
      title: '<h4 class="w3-text-red"><i class="fa fa-warning"></i> Delete Order Permanantly!!!</h4>',
      type: 'red',
      buttons: {
        confirm: function () {
          var dataS = 'order_id='+ id;
          $.ajax({
            url:"<?php echo base_url(); ?>orders/manage_orders/delOrder", 
            type: "POST", 
            data: dataS,
            cache: false,
            success:function(html){     
              $.alert(html);              
              $('#All_Orders').load(location.href + " #All_Orders>*", ""); 
            }
          });
        },
        cancel: function () {

        }
      }
    });

  }
</script>
<!-- script ends -->

</body>
</html>


