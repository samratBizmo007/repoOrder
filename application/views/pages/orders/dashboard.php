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
<!--    <script type="text/javascript" src="<?php echo base_url(); ?>css/js/config.js"></script>-->
    <script type="text/javascript" src="<?php echo base_url(); ?>css/alert/jquery-confirm.js"></script>
<!--    <script type="text/javascript" src="<?php echo base_url(); ?>css/js/inventory/materialstock_management.js"></script>-->

</head>
<body class="w3-light-grey">
    <!-- !PAGE CONTENT! -->
    <div class="w3-main w3-padding-small" style="margin-left:120px;">

        <div id="exTab1" class="container w3-small" > <!-- container for tab -->
            <!-- Header -->
    <div class="">
      <h5><b>Manage Orders</b></h5>
    </div>
            <br>
            <ul  class="nav nav-tabs">
                <li class="active "><a class="w3-medium w3-brown w3-button"  href="#allOrders" data-toggle="tab"><span>All</span></a></li>
                <li><a class="w3-medium w3-green w3-button w3-text-white"  href="#openedOrders" data-toggle="tab"><span>Opened</span></a></li>
                <li><a class="w3-medium w3-red w3-button"  href="#closedOrders" data-toggle="tab"><span>Closed</span></a></li>
            </ul>

            <div class="tab-content clearfix "><br><!-- tab containt starts -->
                <div class="tab-pane active" id="allOrders">  <!-- tab for Raw material starts here -->
                    <div class="">                    
                        <div class="w3-col l12 w3-margin-top">
                            <div class="" id="All_Orders" name="All_Orders" style="max-height: 700px; overflow: scroll;">
                                <table class="table table-striped table-responsive w3-small"> 
                                    <!-- table starts here -->
                                    <thead>
                                        <tr class="w3-black">
                                            <th class="text-center">SR. No</th>
                                            <th class="text-center">Order No</th>  
                                            <th class="text-center">Customer Name</th>              
                                            <th class="text-center">date</th>                                                          
                                            <th class="text-center">Status</th>                                                          
                                            <th class="text-center">Actions</th>  
                                        </tr>
                                    </thead>
                                    <tbody><!-- table body starts here -->
                                        <?php
                                        //print_r($orders);
                                $count = 1;
                                $status = '';
                                $color = '';
                                if ($orders['status'] == 200) {
                                    for ($i = 0; $i < count($orders['status_message']); $i++) {
                                         if($orders['status_message'][$i]['status'] == 1){
                                            $status = 'Open';
                                            $color = 'w3-text-green';
                                         }
                                         if($orders['status_message'][$i]['status'] == 0){
                                            $status = 'Closed';
                                            $color = 'w3-text-red';
                                         }
                                        echo '<tr class="text-center">
                                        <td class="text-center">' . $count . '.</td>
                                        <td class="text-center">#000' . $orders['status_message'][$i]['order_id'] . '</td>
                                        <td class="text-center">' . $orders['status_message'][$i]['user_name'] . '</td>
                                        <td class="text-center">' . $orders['status_message'][$i]['order_date'] . '</td>
                                        <td class="text-center '.$color.'">' .$status. '</td>
                                        <td class="text-center">';
                                        echo'<a class="btn w3-text-blue w3-medium w3-padding-small" data-toggle="modal" data-target="#myModalnew_' . $orders['status_message'][$i]['order_id'] . '" title="View Order" style="padding:0"><i class="fa fa-eye"></i></a>';
                                        //echo'<a class="btn w3-text-green w3-medium w3-padding-small" title="Open Order" id="OpenOrder_'.$details['status_message'][$i]['order_id'].'" onclick="delete_rawMaterial('.$details['status_message'][$i]['order_id'].')" style="padding:0"><i class="fa fa-refresh"></i></a> ';
                                        echo'<a class="btn w3-text-red w3-medium w3-padding-small" title="Close Order" id="CloseOrder_'.$orders['status_message'][$i]['order_id'].'" onclick="delOrder('.$orders['status_message'][$i]['order_id'].');" style="padding:0"><i class="fa fa-close"></i></a> 
                                        </td>

                                        <!-- Modal  starts here-->

                                        <div id="myModalnew_'.$orders['status_message'][$i]['order_id'].'" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                        <div class="modal-header ">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <div><b>Product Description</b></div>
                                        </div>
                                        <div class="modal-body w3-light-grey w3-margin-top">
                                        <div class="w3-container">';   
                                        $product_info=json_decode($orders['status_message'][$i]['order_products'],TRUE);

                                        foreach($product_info as $key)
                                        {
                                         echo'<div class="col-lg-12 w3-margin-top">
                                         <div class="col-lg-4 w3-margin-top">
                                         <label class="w3-label">Product&nbsp;Name:</label>
                                         <input type="text" class="w3-input" name="prod_Name[]" value='.$key['prod_Name'].' placeholder="Enter Product Description" required>
                                         </div>
                                         <div class="col-lg-4 w3-margin-top">
                                         <label class="w3-label">Product&nbsp;Description:</label>
                                         <input type="text" class="w3-input" name="prod_Description[]" value='.$key['prod_Description'].' placeholder="Enter Product Description" required>
                                         </div>
                                         <div class="col-lg-2 w3-margin-top">
                                         <label class="w3-label">Quantity:</label>
                                         <input type="number" min="1" class="w3-input" name="prod_quantity[]" value='.$key['prod_quantity'].' placeholder="count" required >
                                         </div>
                                         </div>
                                          <div class="w3-col l12">                                                                                 
                                         <div class="col-lg-6 w3-margin-top">
                                         <label class="w3-label w3-padding-left">Product&nbsp;Image:</label>
                                         <img class="w3-padding-left" src="'.base_url().$key['prod_image'].'" width="180px" id="prod_imagePreview_1" height="140px" alt="Product Image will be displayed here once chosen. Image size is:(100px * 80px)" class=" w3-centerimg img-thumbnail">
                                         </div>
                                         </div>';
                                       }
                                       echo'
                                       </div>
                                       </div>
                                       </div>
                                       </div>
                                       </div>
                                       </tr>'; 
                                       $count++;
                                     }
                                   }
                                   else {

                                    echo '
                                    <tr class="text-center" >
                                    <td colspan="6"><b>No Orders Available</b></td>
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
             location.reload();
            }
          });
        },
        cancel: function () {

        }
      }
    });

  }
</script>
            <!--____________________________________ tab div 1 ends here_________________________________________ -->
            <!--_______________________________ tab 3 starts here_____________________________________________ -->
            
            <div class="tab-pane" id="openedOrders"><!-- tab 3 starts here -->
                 <div class="">                    
                        <div class="w3-col l12 w3-margin-top">
                            <div class="" id="Opened_Orders" name="Opened_Orders" style="max-height: 700px; overflow: scroll;">
                            <table class="table table-striped table-responsive w3-small"> 
                                <!-- table starts here -->
                                <thead>
                                        <tr class="w3-black">
                                            <th class="text-center">SR. No</th>
                                            <th class="text-center">Order No</th>  
                                            <th class="text-center">Customer Name</th>              
                                            <th class="text-center">date</th>                                                          
                                            <th class="text-center">status</th>                                                          
                                            <th class="text-center">Actions</th>  
                                        </tr>
                                    </thead>
                                <tbody><!-- table body starts here --> 
                                    <?php
                                    $count = 1;
                                       $status = '';
                                $color = '';
                                if ($Open_orders['status'] == 200) {
                                    for ($i = 0; $i < count($Open_orders['status_message']); $i++) {
                                        if($Open_orders['status_message'][$i]['status'] == 1){
                                            $status = 'Open';
                                            $color = 'w3-text-green';
                                         }
                                         if($Open_orders['status_message'][$i]['status'] == 0){
                                            $status = 'Closed';
                                            $color = 'w3-text-red';
                                         }
                                        echo '<tr class="text-center">
                                        <td class="text-center">' . $count . '.</td>
                                        <td class="text-center">#000' . $Open_orders['status_message'][$i]['order_id'] . '</td>
                                        <td class="text-center">' . $Open_orders['status_message'][$i]['user_name'] . '</td>
                                        <td class="text-center">' . $Open_orders['status_message'][$i]['order_date'] . '</td>
                                        <td class="text-center '.$color.'">' .$status. '</td>                                        
                                        <td class="text-center">
                                        <a class="btn w3-text-blue w3-medium w3-padding-small" data-toggle="modal" data-target="#openOrder_' . $Open_orders['status_message'][$i]['order_id'] . '" title="View Order" style="padding:0"><i class="fa fa-eye"></i></a>
                                        <a class="btn w3-text-red w3-medium w3-padding-small" title="Close Order" id="CloseOrder_'.$Open_orders['status_message'][$i]['order_id'].'" onclick="delOrder('.$Open_orders['status_message'][$i]['order_id'].');" style="padding:0"><i class="fa fa-close"></i></a> 
                                        </td>

                                        <!-- Modal  starts here-->

                                        <div id="openOrder_'.$Open_orders['status_message'][$i]['order_id'].'" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <div><b>Product Description</b></div>
                                        </div>
                                        <div class="modal-body w3-light-grey">
                                        <div class="w3-container">';   
                                        $product_info=json_decode($Open_orders['status_message'][$i]['order_products'],TRUE);

                                        foreach($product_info as $key)
                                        {
                                         echo'<div class="col-lg-12 w3-margin-top">
                                         <div class="col-lg-4 w3-margin-top">
                                         <label class="w3-label">Product&nbsp;Name:</label>
                                         <input type="text" class="w3-input" name="prod_Name[]" value='.$key['prod_Name'].' placeholder="Enter Product Description" required>
                                         </div>
                                         <div class="col-lg-4 w3-margin-top">
                                         <label class="w3-label">Product&nbsp;Description:</label>
                                         <input type="text" class="w3-input" name="prod_Description[]" value='.$key['prod_Description'].' placeholder="Enter Product Description" required>
                                         </div>
                                         <div class="col-lg-2 w3-margin-top">
                                         <label class="w3-label">Quantity:</label>
                                         <input type="number" min="1" class="w3-input" name="prod_quantity[]" value='.$key['prod_quantity'].' placeholder="count" required >
                                         </div>
                                         </div>
                                        <div class="w3-col l12">                                                                                 
                                         <div class="col-lg-6 w3-margin-top">
                                         <label class="w3-label w3-padding-left">Product&nbsp;Image:</label>
                                         <img class="w3-padding-left" src="'.base_url().$key['prod_image'].'" width="180px" id="prod_imagePreview_1" height="140px" alt="Product Image will be displayed here once chosen. Image size is:(100px * 80px)" class=" w3-centerimg img-thumbnail">
                                         </div>
                                         </div>';
                                       }
                                       echo'
                                       </div>
                                       </div>
                                       </div>
                                       </div>
                                       </div>
                                       </tr>'; 
                                       $count++;
                                     }
                                   }
                                   else {

                                    echo '
                                    <tr class="text-center" >
                                    <td colspan="6"><b>No Orders Available</b></td>
                                    </tr>
                                    ';
                                  }
                                
                                    ?>
                                </tbody><!-- table body close here -->
                            </table>   <!-- table closed here -->
                        </div>
                    </div>
                </div>     
            </div>         
            <!-- ___________________________tab 2 div ends here__________________________________ -->
            <!-- ____________________________the tab 2 ends here____________________ -->
            <!--_______________________________ tab 3 starts here_____________________________________________ -->
            <div class="tab-pane" id="closedOrders"><!-- tab 3 starts here -->

                 <div class="">                    
                        <div class="w3-col l12 w3-margin-top">
                            <div class="" id="Closed_Orders" name="Closed_Orders" style="max-height: 700px; overflow: scroll;">
                            <table class="table table-striped table-responsive w3-small"> 
                                    <thead>
                                        <tr class="w3-black">
                                            <th class="text-center">SR. No</th>
                                            <th class="text-center">Order No</th>  
                                            <th class="text-center">Customer Name</th>              
                                            <th class="text-center">date</th>                                                          
                                            <th class="text-center">status</th>                                                          
                                            <th class="text-center">Actions</th>  
                                        </tr>
                                    </thead>
                                    <tbody><!-- table body starts here -->
                                        <?php
                                        $count = 1;
                                           $status = '';
                                $color = '';
                                if ($Closed_orders['status'] == 200) {
                                    for ($i = 0; $i < count($Closed_orders['status_message']); $i++) {
                                           if($Closed_orders['status_message'][$i]['status'] == 1){
                                            $status = 'Open';
                                            $color = 'w3-text-green';
                                         }
                                         if($Closed_orders['status_message'][$i]['status'] == 0){
                                            $status = 'Closed';
                                            $color = 'w3-text-red';
                                         }
                                        echo '<tr class="text-center">
                                        <td class="text-center">' . $count . '.</td>
                                        <td class="text-center">#000' . $Closed_orders['status_message'][$i]['order_id'] . '</td>
                                        <td class="text-center">' . $Closed_orders['status_message'][$i]['user_name'] . '</td>
                                        <td class="text-center">' . $Closed_orders['status_message'][$i]['order_date'] . '</td>
                                        <td class="text-center '.$color.'">' .$status. '</td>
                                        <td class="text-center">
                                        <a class="btn w3-text-blue w3-medium w3-padding-small" data-toggle="modal" data-target="#closeOrder_' . $Closed_orders['status_message'][$i]['order_id'] . '" title="View Order" style="padding:0"><i class="fa fa-eye"></i></a>
                                        <a class="btn w3-text-green w3-medium w3-padding-small" title="Open Order" id="OpenOrder_'.$Closed_orders['status_message'][$i]['order_id'].'" onclick="reOpen_Orders('.$Closed_orders['status_message'][$i]['order_id'].');" style="padding:0"><i class="fa fa-refresh"></i></a> 
                                        </td>

                                        <!-- Modal  starts here-->

                                        <div id="closeOrder_'.$Closed_orders['status_message'][$i]['order_id'].'" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <div><b>Product Description</b></div>
                                        </div>
                                        <div class="modal-body w3-light-grey">
                                        <div class="w3-container">';   
                                        $product_info=json_decode($Closed_orders['status_message'][$i]['order_products'],TRUE);

                                        foreach($product_info as $key)
                                        {
                                         echo'<div class="col-lg-12 w3-margin-top">
                                         <div class="col-lg-4 w3-margin-top">
                                         <label class="w3-label">Product&nbsp;Name:</label>
                                         <input type="text" class="w3-input" name="prod_Name[]" value='.$key['prod_Name'].' placeholder="Enter Product Description" required>
                                         </div>
                                         <div class="col-lg-4 w3-margin-top">
                                         <label class="w3-label">Product&nbsp;Description:</label>
                                         <input type="text" class="w3-input" name="prod_Description[]" value='.$key['prod_Description'].' placeholder="Enter Product Description" required>
                                         </div>
                                         <div class="col-lg-2 w3-margin-top">
                                         <label class="w3-label">Quantity:</label>
                                         <input type="number" min="1" class="w3-input" name="prod_quantity[]" value='.$key['prod_quantity'].' placeholder="count" required >
                                         </div>
                                         </div>
                                         <div class="w3-col l12">                                                                                 
                                         <div class="col-lg-6 w3-margin-top">
                                         <label class="w3-label w3-padding-left">Product&nbsp;Image:</label>
                                         <img class="w3-padding-left" src="'.base_url().$key['prod_image'].'" width="180px" id="prod_imagePreview_1" height="140px" alt="Product Image will be displayed here once chosen. Image size is:(100px * 80px)" class=" w3-centerimg img-thumbnail">
                                         </div>
                                         </div>';
                                       }
                                       echo'
                                       </div>
                                       </div>
                                       </div>
                                       </div>
                                       </div>
                                       </tr>'; 
                                       $count++;
                                     }
                                   }
                                   else {

                                    echo '
                                    <tr class="text-center" >
                                    <td colspan="6"><b>No Orders Available</b></td>
                                    </tr>
                                    ';
                                  }
                                
                                        ?>
                                    </tbody><!-- table body close here -->
                                </table><!-- table closed here -->
                            </div>
                        </div>
                    </div>
                </div><!-- table container ends here -->
            </div>
            <!-- ___________________________tab 3 div ends here__________________________________ -->
        </div><!-- tab containt ends here -->
    </div><!-- tab containt div ends here -->
</div><!-- container for tab -->
<!--_______________________ div for main container____________________________ -->

<script>
  function reOpen_Orders(id){
    $.confirm({
      title: '<h4 class="w3-text-red"><i class="fa fa-warning"></i> Are You Sure To Reopen Oreder..!</h4>',
      type: 'red',
      buttons: {
        confirm: function () {
          var dataS = 'order_id='+ id;
          $.ajax({
            url:"<?php echo base_url(); ?>orders/manage_orders/reOpen_Orders", 
            type: "POST", 
            data: dataS,
            cache: false,
            success:function(html){     
            $.alert(html);              
             $('#Closed_Orders').load(location.href + " #Closed_Orders>*", "");
             location.reload();
            }
          });
        },
        cancel: function () {

        }
      }
    });

  }
</script>

