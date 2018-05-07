
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
                  <select  name="cat_id" id="cat_id" tabindex="2" class="form-control" required>
                    <option class="w3-light-grey" selected <?php if ($this->uri->segment(2) == '') echo 'selected'; ?> value="0">Select Business Field</option>
                    <?php
                                    //print_r($categories);
                         foreach ($categories['status_message'] as $result) {
                       ?>
                      	<option value="<?php echo $result['cat_id']; ?>"><?php echo $result['category_name']; ?></option>
                        <?php } ?>
                  </select>
                </div>
              </div>
              <div class="w3-col l12 w3-margin-top">                 
                <div class="w3-col l12 s12 m12" style="padding-right: 2px;">
                   <input type="text" name="product_name" id="product_name" value="" placeholder="Add Product Name" class="form-control" required>
                </div>
              </div>
               <div class="w3-col l12 w3-margin-top">                 
                <div class="w3-col l12 s12 m12" style=" padding-right: 2px;">
                  <textarea class="form-control" name="product_description" id="product_description" placeholder="Add Product Description" rows="5" cols="50" style="resize: none;" required></textarea>
                </div>
              </div>

                <div class="w3-col l12 s12 m12 w3-margin-top">
                  <label class="w3-label w3-text-black">Product Image:</label>
                                    <input type="file" name="prod_image" id="prod_image" class="w3-input" onchange="readURL(this);" required>
                                </div>
                                <div class="w3-col l6 w3-padding-small">
                                    <img src="" width="auto" id="adminImagePreview" height="180px" alt="Product Image will be displayed here once chosen." class=" w3-centerimg img-thumbnail">
                                </div>
                            
                        <div class="w3-col l12 w3-margin-top w3-margin-bottom w3-center" id="btnsubmit">
                        <button  type="submit" title="add Product" class="w3-margin-bottom w3-round w3-medium w3-text-white w3-button" style="background-color: #00B8D4;">Add Product</button>
                    </div>
              
            </div>
          </div>
        </div>
        
        
       <!--  <div class="w3-col l12 w3-padding" >
          <div class="w3-light-grey" style=" height: 180px;overflow-y: scroll">
            <div id="added_newProduct" class="w3-col l12"></div>            
          </div>
        </div> -->


       <!--  <div class="w3-col l12 w3-center" id="btnsubmit">
          <button  type="submit" title="Place Order" class="w3-margin-bottom w3-round w3-medium w3-text-white w3-button" style="background-color: #00B8D4;">Add Product</button>
        </div> -->
      </form>
    </div>
  </div>
  <!-- manage profile div end -->
  <!-- ___________________________tab 2 div ends here__________________________________ -->
  <!-- ____________________________the tab 2 ends here____________________ -->
  <!-- End page content -->

 <script>
        // ----function to preview selected image for profile------//
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#adminImagePreview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
// ------------function preview image end------------------//
    </script>
    <!--  script to update user dashboard image   -->
    <script>
        $(function () {
            $("#addProduct_form").submit(function () {
                dataString = $("#addProduct_form").serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>admin/manage_products/addProduct",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data)
                    {
                        $.alert(data);
                        $('#sliderImages').load(location.href + " #sliderImages>*", "");
                    }
                });
                return false;  //stop the actual form post !important!

            });
        });
    </script>
    <!-- script ends here -->
    <script>
        //--------------fun for remove product from product table-------------------------------//
        function RemoveProduct(prod_id) {
            $.confirm({
                title: '<h4 class="w3-text-red"><i class="fa fa-warning"></i> Are you sure you want to delete this product.!</h4>',
                content: '',
                type: 'red',
                buttons: {
                    confirm: function () {
                        var dataS = 'prod_id=' + prod_id;
                        $.ajax({
                            url: "<?php echo base_url(); ?>admin/manage_products/removeProduct",
                            type: "POST",
                            data: dataS,
                            cache: false,
                            success: function (html) {
                                $.alert(html);
                                $('#sliderImages').load(location.href + " #sliderImages>*", "");
                                //$('#savedImage').load(location.href + " #savedImage>*", "");
                            }
                        });
                    },
                    cancel: function () {
                    }
                }
            });
        }
        //------------fun ends here------------------------------------------------------//
        //-----------fun for get the category name using category id----------------//
        function getProductCategory(cat_id, prod_id) {
        //alert(cat_id);
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>admin/manage_products/getProductCategory",
                data: {
                    cat_id: cat_id
                },
                cache: false,
                success: function (data) {
                    //alert(data);
                    $('#prod_category_' + prod_id).html('&nbsp;<b>'+data+'</b>');
                }
            });
        }
        //-----------fun for get the category name using category id----------------//
    </script>

</body>
</html>


