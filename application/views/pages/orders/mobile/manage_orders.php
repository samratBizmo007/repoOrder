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
  <style>
  /* width */
  ::-webkit-scrollbar {
    width: 5px;
  }

  /* Track */
  ::-webkit-scrollbar-track {
    background: #f1f1f1; 
  }

  /* Handle */
  ::-webkit-scrollbar-thumb {
    background: black; 
  }

  /* Handle on hover */
  ::-webkit-scrollbar-thumb:hover {
    background: #555; 
  }
</style>
</head>
<body class=" w3-light-grey">
  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-left:120px;">

    <div class="w3-margin-bottom">
      <!-- Manage Profiles div -->
      <form id="addOrder_formMobile" enctype="multipart/form-data">  
      <div class="w3-col l12 w3-padding-left w3-padding-right ">
        <div class="w3-col l12 w3-small">
               
            <!-- Product div start -->
            <div class="w3-col l12 w3-margin-bottom">

              <div class="w3-col l12 s12 m12">
                <div class="w3-col l12 s12 m12 w3-margin-top">
                  <label class="w3-label w3-text-black">Business Type:</label>                      
                  <select name="business_field" id="business_field" tabindex="2" class="form-control" required>
                    <option class="w3-light-grey" selected <?php if ($this->uri->segment(2) == '') echo 'selected'; ?> value="0">Select Business Field</option>
                    <option value="1" <?php if ($this->input->get('field', TRUE) == 1) echo 'selected'; ?>>Mobile Accessories</option>
                    <option value="2" <?php if ($this->input->get('field', TRUE) == 2) echo 'selected'; ?>>Cosmetics</option>
                    <option value="3" <?php if ($this->input->get('field', TRUE) == 3) echo 'selected'; ?>>Watch and Glasses</option>
                    <option value="4" <?php if ($this->input->get('field', TRUE) == 4) echo 'selected'; ?>>Bags</option>
                    <option value="5" <?php if ($this->input->get('field', TRUE) == 5) echo 'selected'; ?>>Other</option>
                  </select>
                </div>
              </div>
              <div class="w3-col l12 w3-margin-top">                 
                <div class="w3-col l12 s12 m12" style=" padding-right: 2px;">
                  <input type="text" class="form-control" name="prodName" id="prodName" placeholder="Product Name">
                </div>
              </div>
              <div class=" w3-col l12">
                <div class="w3-col l3 s3 m3 w3-margin-top" >
                  <input type="number" min="1" class="form-control" name="prodQty" id="prodQty" placeholder="count">
                </div>                
                <div class="w3-col s9 w3-margin-top " style="margin-top: -5px">
                  <span class="w3-right"><a class="btn " id="add_moreProduct" style="padding: 0"><i class="fa fa-plus-circle w3-xxlarge" style="color:#00B8D4"></i></a><span> <b>ADD</b></span></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="w3-container w3-padding ">
          <center class="w3-border-top w3-border-bottom w3-padding-small"><b>CURRENT ORDERS</b></center>
        </div>
        
        <div class="w3-col l12 w3-padding" >
          <div class="w3-light-grey" style=" height: 180px;overflow-y: scroll">
            <div id="added_newProduct" class="w3-col l12"></div>            
          </div>
        </div>


        <div class="w3-col l12 w3-center" id="btnsubmit">
          <button  type="submit" title="Place Order" class="w3-margin-bottom w3-round w3-medium w3-text-white w3-button" style="background-color: #00B8D4;">Place Order</button>
        </div>
      </form>
    </div>
  </div>
  <!-- manage profile div end -->
  <!-- ___________________________tab 2 div ends here__________________________________ -->
  <!-- ____________________________the tab 2 ends here____________________ -->
  <!-- End page content -->

  <!-- script to add more material div  -->
  <script>
    $(document).ready(function (e){
      $("#addOrder_formMobile").on('submit',(function(e){       
        e.preventDefault();   
        $("#btnsubmit").html('<center><span class="w3-xxlarge fa fa-spinner fa-spin"></span></center>');
        $.ajax({
          url: BASE_URL + "orders/Manage_orders/addOrder",
          type: "POST",
          data:  new FormData(this),
          contentType: false,
          cache: false,
          processData:false,
          success: function(data){
            $.alert(data);
            $("#btnsubmit").html('<button  type="submit" title="Place Order" class="w3-margin-bottom w3-round w3-medium w3-text-white w3-button" style="background-color: #00B8D4;">Place Order</button>');
          },
          error: function(){}             
        });
      }));
    });
//- This script is used to save profile information -->

var rowCount = 1;
function addMoreRows() {
  rowCount++;


  var recRow = '<tr id="rowCount' + rowCount + '">\n\<td class="text-center"></td>\n\
  <td><input value="" id="stopnumber' + rowCount + '" name="stopnumber" type="text" placeholder="Stop Number" class="form-control input-md"/> </td>\n\
  <td><input value="" id="stopname' + rowCount + '" name="stopname"  type="text" placeholder="Stop Name"  class="form-control input-md"></td>\n\
  <td><input value="" id="pickuptime' + rowCount + '" name="pickuptime"  type="text" placeholder="Pick Up time"  class="form-control input-md"></td>\n\
  <td><input value="" id="dropuptime' + rowCount + '" name="dropuptime"  type="text" placeholder="Drop up Time"  class="form-control input-md"></td>\n\
  <td><input value="" id="fare' + rowCount + '" name="fare"  type="text" placeholder="Fare"  class="form-control input-md"></td>\n\
  \n\
  <td><a href="javascript:void(0);" onclick="removeRow(' + rowCount + ');">Delete</a></td></tr>';

  jQuery('#addedRows').append(recRow);
}
function removeRow(removeNum) {
  jQuery('#rowCount' + removeNum).remove();

}




$(document).ready(function () {
  var max_fields = 10;
  var wrapper = $("#added_newProduct");
  var add_button = $("#add_moreProduct");

  var x = 1;
  $(add_button).click(function (e) {
    var prodName=$('#prodName').val();
    var prodQty=$('#prodQty').val();

    if(prodName=='' || prodQty==''){
      $.alert('<h4 class="w3-text-red w3-medium"><i class="fa fa-warning"></i> All fields are required.</h4>');
      return false;
    }
    e.preventDefault();
    if (x < max_fields) {
      x++;
      $(wrapper).append('<div class="">\n\
        <div class="w3-col s12 w3-center w3-white w3-padding-top ">\n\
        <div class="w3-col s5">\n\
        <span>'+prodName+'</span>\n\
        </div>\n\
        <div class="w3-col s4">\n\
        <span>'+prodQty+'</span>\n\
        </div>\n\
        <div class="w3-col s3">\n\
        <a class="delete fa fa-minus-circle w3-xlarge" ></a>\n\
        </div>\n\
        <div class="w3-col s12 w3-tiny w3-padding">\n\
        <input type="file" name="prod_image[]" id="prod_image" class="w3-input" >\n\
        </div>\n\
        <input type="hidden" name="prod_Name[]" value="'+prodName+'">\n\
        <input type="hidden" name="prod_quantity[]" value="'+prodQty+'">\n\
        </div>\n\
        </div>\n\
        </div>'); 
      $('#prodName').val('');
      $('#prodQty').val('');
    } else
    {
     $.alert('<h4 class="w3-text-red w3-medium"><i class="fa fa-warning"></i> You Reached the maximum limit of adding ' + max_fields + ' fields.</h4>');   //alert when added more than 4 input fields
   }
 });
  $(wrapper).on("click", ".delete", function (e) {
    e.preventDefault();
    $(this).parent().parent('div').remove();
    x--;
  });
});
</script>
<!-- script to add more material end -->
<!-- script to delete order -->
<script>
  function delOrder(id) {
    $.confirm({
      title: '<h4 class="w3-text-red"><i class="fa fa-warning"></i> Delete Order Permanantly!!!</h4>',
      type: 'red',
      buttons: {
        confirm: function () {
          var dataS = 'order_id=' + id;
          $.ajax({
            url: "<?php echo base_url(); ?>orders/manage_orders/delOrder",
            type: "POST",
            data: dataS,
            cache: false,
            success: function (html) {
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


