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
                        
                        <!-- <div class="w3-col l12 s12 m12 w3-small w3-padding-bottom">
                            <label class="w3-small">Business Field: <font color ="red"><span id ="pcategory_star">*</span></font></label><br>
                            <font color ="red"><span id ="cat_id_span"></span></font>							
                            <select class="w3-select w3-margin-bottom" name="cat_id" id="cat_id">
                                <option value="0" class="w3-light-grey">Select Business Field</option>
                                <?php
                                    //print_r($categories);
                                foreach ($categories['status_message'] as $result) {
                                    ?>
                                    <option value="<?php echo $result['cat_id']; ?>"><?php echo $result['category_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div> -->
                        <!-- kk -->
                        <div class="w3-col l12 s12 m12 w3-small w3-padding-bottom">
                            <label> Product Name: <font color ="red"><span id ="pname_star">*</span></font></label><br>
                            <font color ="red"><span id ="product_name_span"></span></font>
                            <input type="text" name="product_name" id="product_name" value="" placeholder="Add Product Name" class="w3-input w3-margin-bottom" required>
                        </div>                           
                        <!-- kk -->
                        <div class="w3-col l12 s12 m12 w3-small w3-padding-bottom">
                            <label> Product Description: <font color ="red"><span id ="pdescription_star">*</span></font></label><br>
                            <font color ="red"><span id ="product_description_span"></span></font>
                            <textarea class="w3-input w3-margin-bottom" name="product_description" id="product_description" rows="5" cols="50" style="resize: none;" required></textarea>
                        </div>
                        <!-- kk -->                            
                        
                    </div>
                    <!-- ---div for images -->
                    <div class="col-lg-6 w3-padding-tiny" id="deletecat">
                        <div class="w3-col l12 s12 m12 w3-small">
                            <div class="w3-col l6 w3-padding-small">
                                <label>Product Image:</label>
                                <input type="file" name="prod_image[]" id="prod_image" class="w3-input" onchange="readURL(this);" required>
                            </div>
                            <div class="w3-col l6 w3-padding-small">
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
        <!-- DIV FOR THE ALL PRODUCT ARE TO BE ADDED BY CURRENT USER-->
        <!-- MAIN CONTENT STARTS -->
<!--            <div class="w3-col l12 w3-border yellow-border" style="height: 400px;padding:20px;overflow: hidden;overflow-y: scroll;" id="myProductDiv" >
                <div class="w3-col l12" id="sliderImages">
                    <div class="w3-col l12">
                        <label><i class="fa fa-dropbox w3-large"></i> My Products</label>
                    </div>
                    <?php
                    //print_r($sliderInfo);die();
//                    if (count($products['status_message']) != 0) {
//                        foreach ($products['status_message'] as $key) {
                            ?>
                             Image Div 
                            <div class="w3-col l2 w3-padding-small allImage-div ">
                                <div class="allImage w3-card-2" style="background-position:center; background-size:contain; background-image: url('<?php echo base_url() . $key['prod_image']; ?>');">
                                    <div class="w3-col l12">
                                         overlay for action div 
                                        <div class="w3-col l12 saved-image">
                                            <div class="w3-col l12 w3-center" style="margin-top: 30px">
                                                <a href="#" title="View Product" class="btn w3-xlarge w3-text-orange allImage-btn" onclick="getProductCategory(<?php echo $key['cat_id']; ?>,<?php echo $key['prod_id']; ?>)"><span class="fa fa-search-plus" data-toggle="modal" data-target="#productModal_<?php echo $key['prod_id']; ?> "></span></a>									
                                                <a id="Removebtn_<?php echo $key['prod_id']; ?>" onclick="RemoveProduct(<?php echo $key['prod_id']; ?>);" title="Remove product" class="btn w3-xlarge w3-text-orange allImage-btn"><span class="fa fa-minus-circle"></span></a>
                                            </div>
                                            <div class="w3-text-white" style="padding: 0 4px 0 4px">
                                                <label class="w3-tiny"><?php //echo $key['cat_name'];        ?></label>
                                            </div>
                                        </div>
                                         overlay for action div ends 
                                    </div>
                                </div>
                            </div>
                             Image Div ends 	
                             Modal for show images 	
                            <div id="productModal_<?php echo $key['prod_id']; ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-md">
                                     Modal content
                                    <center><a data-dismiss="modal" title="Close Image" class="btn fa fa-close w3-xlarge w3-padding-small w3-text-white"></a></center>
                                    <div class="modal-content">
                                        <div class="modal-body ">
                                            <img class="img w3-center" src="<?php echo base_url() . $key['prod_image']; ?>" style="height: 100%; width: 100%;">
                                            <label class="w3-margin-top w3-label">Product Category: </label><span id="prod_category_<?php echo $key['prod_id']; ?>"><b></b></span><br>                                   
                                            <label class="w3-margin-top w3-label">Product Name: </label><span><b> <?php echo $key['product_name']; ?></b></span><br>                                   
                                            <label class="w3-margin-top w3-label">Product Description: </label><span><b class="w3-small"> <?php echo $key['prod_description']; ?></b></span>
                                        </div>							
                                    </div>
                                </div>
                            </div>
                             modal for show image 
                            <?php
//                        }
//                    } else {
//                        echo '<div class="w3-col l12 w3-center"><h4>Oops! You don\'t have any products available.</h4></div>';
//                    }
                    ?>
                </div>

            </div>-->
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
