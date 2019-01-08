
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ERROR | E_PARSE);
//$user_role = $this->session->userdata('user_role');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manage Product</title>
        <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
        <!-- Link Swiper's CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/posts/dist/css/swiper.min.css">

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
        <!-- Link Swiper's CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/posts/dist/css/swiper.min.css">

        <script type="text/javascript" src="<?php echo base_url(); ?>css/js/const.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900" rel="stylesheet">

        <style>
            body{
                font-family: 'Roboto', sans-serif;
            }
            input,textarea{
                border-bottom:1px solid lightgrey;
                font-size:14px;
                color:#9ca4ab;
            }
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
    <body>
        <!-- !PAGE CONTENT! -->
        <div class="w3-main" style="margin-top:40px;margin-bottom: 40px">
            <header class="w3-center w3-padding ">
                <h5 class="footer_text"><b>Add Product</b></h5>
            </header>
            <div class="w3-margin-bottom">
                <!-- Manage Profiles div -->
                <form id="addProduct_form" enctype="multipart/form-data">  
                    <div class="w3-col l12 w3-padding-left w3-padding-right ">
                        <div class="w3-col l12 w3-small">

                            <!-- Product div start -->
                            <div class="w3-col l12 w3-margin-bottom">
                                <?php $default_image = 'images/default_male.png'; ?>

                                <div class="w3-col l12 w3-margin-top">                 
                                    <div class="w3-col l12 s12 m12" style="padding-right: 2px;">
                                        <input style="border-bottom:1px solid lightgrey" type="text" name="product_name" id="product_name" value="" placeholder="Add Product Name Here" class="w3-input " style="" required>
                                    </div>
                                </div>
                                <div class="w3-col l12 w3-margin-top">                 
                                    <div class="w3-col l12 s12 m12" style=" padding-right: 2px;">
                                        <textarea style="border-bottom:1px solid lightgrey" class="w3-input" name="product_description" id="product_description" placeholder="Add Product Description Here" rows="5" cols="50" style="resize: none; color:#9ca4ab;font-size:14px;" required></textarea>
                                    </div>
                                </div>

                                <div class="w3-col l12 s12 m12 w3-margin-top w3-margin-bottom">
                                    <div class="w3-col s8">
                                        <label class="w3-label w3-text-black">Product Image:</label>
                                        <input style="border-bottom:1px solid lightgrey" type="file" name="prod_image[]" id="prod_image" class="w3-input" onchange="readURL(this);" required>
                                    </div>
                                    <div class="w3-col s4 w3-padding-small w3-display-container">
                                        <img class="img img-circle" id="adminImagePreview" src="<?php echo base_url() . $default_image; ?>" style="height: 80px; width: 80px;">
                                    </div>
                                    <div class="w3-col l12" id="addedmore_imageDiv"></div>
                                    <div class="w3-col l12">
                                        <a id="add_moreimage" title="Add new Item" class="btn w3-text-red add_moreProduct w3-small w3-right w3-margin-top"><b>Add image <i class="fa fa-plus"></i></b>
                                        </a>
                                    </div>
                                </div>                                

                                <div class="w3-col l12 w3-margin-top w3-margin-bottom w3-center w3-padding-bottom" id="btnsubmit">
                                    <button  type="submit" title="add Product" class="capsule_color w3-margin-bottom w3-round w3-medium w3-text-white w3-button" style=" background-color: #0F2951;">Add Product</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- manage profile div end style="background-color: #00B8D4;" -->
        <!-- ___________________________tab 2 div ends here__________________________________ -->
        <!-- ____________________________the tab 2 ends here____________________ -->
        <!-- End page content -->
        <script>
            $(document).ready(function () {
                var max_fields = 5;
                var wrapper = $("#addedmore_imageDiv");
                var add_button = $("#add_moreimage");
                var x = 1;
                $(add_button).click(function (e) {
                    e.preventDefault();

                    if (x < max_fields) {
                        x++;
                        $(wrapper).append('<div>\n\
                <div class="w3-col l12 s12 m12 w3-margin-top">\n\
        <div class="w3-col s8">\n\
        <label class="w3-label w3-text-black">Product Image:</label>\n\
        <input type="file" style="border-bottom:1px solid lightgrey" name="prod_image[]" id="prod_image" class="w3-input" onchange="readURLNEW(this,' + x + ');" required>\n\
        </div>\n\
        <div class="w3-col s4 w3-padding-small w3-display-container">\n\
        <img class="img img-circle" id="adminImagePreview_' + x + '" src="<?php echo base_url() . $default_image; ?>" style="height: 80px; width: 80px;">\n\
        </div>\n\
        <a href="#" class="delete btn w3-text-black w3-left w3-small" title="remove image">remove <i class="fa fa-remove"></i>\n\
        </div>\n\
        </div>'); //add input box
                    } else {
                        $.alert('<label class="w3-label w3-text-red"><i class="fa fa-warning w3-xxlarge"></i> You Reached the maximum limit of adding ' + max_fields + ' fields</label>');   //alert when added more than 4 input fields
                    }
                });
                $(wrapper).on("click", ".delete", function (e) {
                    e.preventDefault();
                    $(this).parent('div').remove();
                    x--;
                })
            });
        </script>
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
            function readURLNEW(input, id) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#adminImagePreview_' + id).attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>

        <!-- add product  -->
        <script>
            $(function () {
                $("#addProduct_form").submit(function () {
                    dataString = $("#addProduct_form").serialize();
                    $('#btnsubmit').html('<span class="w3-card w3-padding-small w3-margin-bottom w3-round"><i class="fa fa-spinner fa-spin w3-large"></i> <b>Posting Product. Hang on...</b></span>');
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>user/manage_products/addProduct",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (data)
                        {
                            $.alert(data);
                            $('#btnsubmit').html('<button  type="submit" title="add Product" class="w3-margin-bottom w3-round w3-medium w3-text-white w3-button" style="background-color: #00B8D4;">Add Product</button>');
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
                        $('#prod_category_' + prod_id).html('&nbsp;<b>' + data + '</b>');
                    }
                });
            }
            //-----------fun for get the category name using category id----------------//
        </script>

    </body>
</html>


