<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(E_ERROR | E_PARSE);
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
    <body>
        <!-- !PAGE CONTENT! -->
        <div class="w3-main w3-padding-small" style="margin-left:120px;">
            <!-- Header -->
            <header class="w3-container" >
                <h5><b><i class="fa fa-cubes"></i> My Orders</b></h5>
            </header>
            <div class="w3-padding-left w3-margin-bottom">
                    <!-- Manage Profiles div -->
                    <div class="w3-col l12 w3-padding-left w3-padding-right ">
                        <div class="w3-col l12 w3-small">
                            <form id="addOrder_form" enctype="multipart/form-data">       
                                <!-- Product div start -->
                                <div class="w3-col l12 w3-margin-bottom w3-margin-top">
                                    <header class="w3-col l12 ">
                                        <h6><b><i class="fa fa-first-order"></i> Place New Order</b></h6>
                                        <span class="w3-small"></span>
                                    </header>
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
                                            <input type="text" class="form-control" name="prod_Name[]" placeholder="Product Name" required>
                                        </div>
                                    </div>
                                    <div class=" w3-col l12">
                                        <div class="w3-col l3 s3 m3 w3-margin-top" >
                                            <input type="number" min="1" class="form-control" name="prod_quantity[]" placeholder="count" required >
                                        </div>
                                        <div class="w3-col l5 s5 m5 w3-margin-top w3-center" style=" padding-left: 20px;">
                                            <input type="file" name="prod_image[]" id="prod_image_1" class="w3-input w3-padding-small" onchange="readURL(this,1);">                                            
                                        </div>
                                        <div class="w3-col l4 s4 m4 w3-margin-top w3-center">
                                            <span class="fa fa-plus-circle w3-blue w3-xlarge" ></span>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class=" w3-margin-bottom">
                        <center>CURRENT ORDERS</center>
                    </div>
                    <div class="w3-col l12  w3-light-grey" style=" height: 150px;">
                        <table class=" table table-striped">
                        <tbody>
                        <tr class="text-center">
                            <td class=" text-center">
                            <center><span>Skybage</span></center>                            
                        </td>
                        <td class="text-centre">
                            <center><span>5</span></center>
                        </td>
                        <td>
                         <span class="fa fa-minus-circle w3-xlarge" ></span>                            
                        </td>
                        </tr>
                    </tbody>
                    </table>
                    </div>
                    <div id="added_newProduct" class="w3-col l12"></div>
<!--                    <div class="w3-col l12 w3-right">
                        <span><a  id="add_moreProduct" title="Add new Item" class="btn add_moreProduct w3-small w3-text-red w3-right w3-margin-top">Add item <i class="fa fa-plus"></i></a></span>
                    </div>-->
                    <!-- material div end -->
                    <div class="w3-col l12 w3-center" id="btnsubmit">
                        <button  type="submit" title="Raise Order" class="w3-margin w3-round w3-medium w3-text-white w3-button" style="background-color: #00B8D4;">Place Order</button>
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
                    e.preventDefault();
                    if (x < max_fields) {
                        x++;
                        $(wrapper).append('<div class="">\n\
                  <div class="w3-col l12 w3-margin-bottom"><hr>\n\
                  <div class="w3-col l12 w3-margin-top">\n\
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
                  <img src="" width="180px" id="prod_imagePreview_' + x + '" height="180px" alt="Product Image will be displayed here once chosen. Image size is:(100px * 80px)" class=" w3-centerimg img-thumbnail">\n\
                  </div>\n\
                  <input type="file" name="prod_image[]" id="prod_image_' + x + '" class="w3-input w3-padding-small" onchange="readURL(this,' + x + ');">\n\
                  </div>\n\
                  </div>\n\
                  </div>\n\
                  <a href="#" class="delete btn w3-text-grey w3-right w3-margin-right w3-small" title="remove item">remove item <i class="fa fa-remove"></i></a>\n\
                  </div>\n\
                  </div>'); //add input box
                    } else
                    {
                        $.alert('<label class="w3-label w3-text-red"><i class="fa fa-warning w3-xxlarge"></i> You Reached the maximum limit of adding ' + max_fields + ' fields</label>');   //alert when added more than 4 input fields
                    }
                });
                $(wrapper).on("click", ".delete", function (e) {
                    e.preventDefault();
                    $(this).parent('div').remove();
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


