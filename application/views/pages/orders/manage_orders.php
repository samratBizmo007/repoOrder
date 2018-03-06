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
  <style type="text/css">
  input[type=number]::-webkit-inner-spin-button, 
  input[type=number]::-webkit-outer-spin-button {  

   opacity: 1;

 }
</style>
</head>
<body>

  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-left:120px;margin-top: 50px">

    <!-- Header -->
    <header class="w3-container" >
      <h2>Manage Orders</h2>
    </header>

    <div class="w3-col l12"><!-- container starts here -->
     <!-- Manage Profiles div -->
     <div class="w3-col l12 w3-padding-left w3-padding-right ">

      <div class="w3-col l12 w3-padding w3-small">
        <form id="addOrder_form" enctype="multipart/form-data">       
          <!-- Product div start -->
          <div class="w3-col l12 w3-margin-bottom w3-margin-top">
            <header class="w3-col l12" >
              <h6><b><i class="fa fa-cubes"></i> Place New Order</b></h6>
              <span class="w3-small"></span>
            </header>
            <div class="col-lg-12 w3-margin-top">
              <div class="col-lg-6">
                <label class="w3-label">Product Description:</label>
                <input list="Materialinfo_1" type="text" class="w3-input" name="prod_Description[]" placeholder="Enter Product Description" required>
              </div>
              <div class="col-lg-2">
                <label class="w3-label">Product Quantity:</label>
                <input type="number" min="1" class="w3-input w3-center" name="prod_quantity[]" placeholder="count" required >
              </div>
              <div class="col-lg-4">
               <div class="w3-col l7">
                <label class="w3-label">Product Image:</label>
                <div class="w3-col l12 w3-padding-bottom">
                  <img src="" width="180px" id="profile_imagePreview" height="180px" alt="Product Profile Image will be displayed here once chosen. Image size is:(100px * 80px)" class=" w3-centerimg img-thumbnail">
                </div>
                <input type="file" name="prod_image[]" id="prod_image" class="w3-input w3-padding-small">
              </div>

              <div class="w3-col l4">
                <span><a  id="add_moreProduct" title="Add new Item" class="btn add_moreProduct w3-small w3-text-red w3-right w3-margin-top">Add item <i class="fa fa-plus"></i></a></span>
              </div>
            </div>
          </div>
        </div>
        <div id="added_newProduct" class="w3-col l12"></div>
        <!-- material div end -->
        <div class="w3-col l12 ">
          <button type="submit" title="Raise Order" class="w3-margin w3-button w3-right w3-red">Raise Order</button>
        </div>
      </form>
    </div>

  </div>
  <!-- manage profile div end -->

</div>
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
          <div class="col-lg-6">\n\
          <label class="w3-label">Product Description:</label>\n\
          <input list="Materialinfo_1" type="text" class="w3-input" name="prod_Description[]" placeholder="Enter Product Description" required>\n\
          </div>\n\
          <div class="col-lg-2">\n\
          <label class="w3-label">Product Quantity:</label>\n\
          <input type="number" min="1" class="w3-input w3-center" name="prod_quantity[]" placeholder="count" required >\n\
          </div>\n\
          <div class="col-lg-4">\n\
               <div class="w3-col l7">\n\
                <label class="w3-label">Product Image:</label>\n\
                <div class="w3-col l12 w3-padding-bottom">\n\
                  <img src="" width="180px" id="profile_imagePreview" height="180px" alt="Product Profile Image will be displayed here once chosen. Image size is:(100px * 80px)" class=" w3-centerimg img-thumbnail">\n\
                </div>\n\
                <input type="file" name="prod_image[]" id="prod_image" class="w3-input w3-padding-small">\n\
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

</body>
</html>


