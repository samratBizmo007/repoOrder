<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Product</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert/jquery-confirm.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>css/alert/jquery-confirm.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>css/js/admin/admin_settings.js"></script>
   <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900" rel="stylesheet">

    <style>
    body {
        font-family: 'Roboto', sans-serif;

    }
    input
    {
    	color: #9ca4ab;
    }
</style>
</head>
<style>
/* saved images overlay opacity overlay */
.saved-image{
    background: rgb(0, 0, 0);
    background: rgba(0, 0, 0, 0.5); /* Black see-through */
    transition: .1s ease;
    opacity:0;
    text-align: center;
    height: 142px;
    padding: 20px;
}

/* When you mouse over the saved image div, fade in the overlay title */
.allImage:hover .saved-image {
    opacity: 0.7;
}

/* all saved images */
.allImage{
    width: 100%;
    height: 100%;
    /*background-size: contain;*/
    background-position: center;
    background-repeat: no-repeat;
}

/* all saved images div */
.allImage-div{
    height: 150px;
}

/* all saved images div */
.allImage-btn{
    padding: 2px 5px 2px 5px;
    margin: 0
}


/* SCROLL BAR CSS */
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
<body class="w3-light-grey">

    <!-- !PAGE CONTENT! -->
    <div class="w3-main w3-padding-small" style="margin-left:120px;">
        <!-- Header -->
        <header class="w3-container" >
            <h5><b><i class="fa fa-cog"></i> Manage Product</b></h5>
        </header>
        <div class="w3-col l12 w3-padding-small">
            <form id="addProduct_form" name="addProduct_form">
                <div class="w3-col l12 s12 m12 w3-margin-top">
                    <div class="col-lg-6 w3-padding-small" id="deletecat">
                        <div class="w3-col l12 s12 m12 w3-medium w3-padding-bottom">
                            <label> Product Name: <font color ="red"><span id ="pname_star">*</span></font></label><br>
                            <font color ="red"><span id ="product_name_span"></span></font>
                            <input type="text" name="product_name" id="product_name" value="" placeholder="Add Product Name Here" class="w3-input  w3-margin-bottom" required>
                        </div>                           
                        <!-- kk -->
                        <div class="w3-col l12 s12 m12 w3-medium w3-padding-bottom">
                            <label> Product Description: <font color ="red"><span id ="pdescription_star">*</span></font></label><br>
                            <font color ="red"><span id ="product_description_span"></span></font>
                            <textarea class="w3-input  w3-margin-bottom" placeholder="Add Product Description Here" name="product_description" id="product_description" rows="5" cols="50" style="resize: none; color: #9ca4ab;" required></textarea>
                        </div>
                        <!-- kk -->                            
                        
                    </div>
                    <!-- ---div for images -->
                    <div class="col-lg-6 w3-padding-tiny" id="deletecat">
                        <div class="w3-col l12 s12 m12 ">
                            <div class="w3-col l6 ">
                                <label class="w3-medium">Product Image:</label>
                                <input type="file" name="prod_image[]" id="prod_image" class="w3-input " onchange="readURL(this);" required>
                            </div>
                            <div class="w3-col l6 w3-padding-small w3-margin-top">
                                <img src="" width="auto" id="adminImagePreview" height="150px" alt="Product Image will be displayed here once chosen." class=" w3-centerimg img-thumbnail">
                            </div>
                            <div class="w3-col l12" id="addedmore_imageDiv"></div>
                            <div class="w3-col l12 w3-margin-bottom">
                                <a id="add_moreimage" title="Add new Item" class="btn w3-text-red add_moreProduct w3-small w3-right w3-margin-top"><b>Add image <i class="fa fa-plus"></i></b>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- ---div for images -->
                </div>                   
                <div class="w3-col l12 w3-center" id="btnsubmit">
                    <button  type="submit" title="add Product" class="w3-margin w3-medium w3-button w3-red">Add Product</button>
                </div>
            </form>
        </div>         
        </div>
    </body>
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
                        <div class="w3-col l12 s12 m12 w3-small w3-margin-top">\n\
                        <div class="w3-col l6 w3-padding-small">\n\
                        <label>Product Image:</label>\n\
                        <input type="file" name="prod_image[]" id="prod_image" class="w3-input" onchange="readURLNEW(this,'+x+');" required>\n\
                        </div>\n\
                        <div class="w3-col l6 w3-padding-small">\n\
                        <img src="" width="auto" id="adminImagePreview_'+x+'" height="150px" alt="Product Image will be displayed here once chosen." class=" w3-centerimg img-thumbnail">\n\
                        </div>\n\
                        <a href="#" class="delete btn w3-text-black w3-left w3-small" title="remove image">remove <i class="fa fa-remove"></i>\n\
                        </a>\n\
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
function readURLNEW(input,id){
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#adminImagePreview_'+id).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
<!--  script to update user dashboard image   -->
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
                    $('#btnsubmit').html('<button type="submit" title="add Product" class="w3-margin w3-medium w3-button w3-red">Add Product</button>');
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
                            url: "<?php echo base_url(); ?>user/manage_products/removeProduct",
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
            url: "<?php echo base_url(); ?>user/manage_products/getProductCategory",
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
    </html>
