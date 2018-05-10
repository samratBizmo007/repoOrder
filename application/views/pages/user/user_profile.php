<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ERROR | E_PARSE);
$user_id = $this->session->userdata('user_id');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View Profile</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert/jquery-confirm.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/posts/dist/css/swiper.min.css">
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
            height: 172px;
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
            height: 180px;
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
            <!-- DIV FOR profile Description ends-->
            <div class="w3-col l12 w3-padding-small">
                <header class="w3-container w3-padding-bottom" >
                    <h5><b><i class="fa fa-users"></i> Profile</b></h5>
                </header>
                <div class="col-lg-2"></div>
                <div class="w3-col l8 w3-margin-top w3-margin-bottom">

                    <div class="w3-col l12">
                        <div class="w3-col l4">
                            <?php
                            $default_image = 'images/default_male.png';
                            if ($userDetails['status_message'][0]['user_image'] == '') {
                                ?>
                                <div class="w3-padding w3-border w3-black w3-circle w3-center w3-large" title="profile image" style="background-position:center; background-repeat: no-repeat; background-size:contain; background-image: url('<?php echo base_url() . $default_image; ?>'); height:150px;width:150px;"></div>
                            <?php } else { ?>
                                <div class="w3-padding w3-border w3-black w3-circle w3-center w3-large" title="profile image" style="background-position:center; background-repeat: no-repeat; background-size:contain; background-image: url('<?php echo base_url() . $userDetails['status_message'][0]['user_image']; ?>'); height:150px;width:150px;">
                                </div>
                            <?php } ?>
                        </div>
                        <div class="w3-col l8 w3-margin-top">
                            <label class="w3-large"><?php echo $userDetails['status_message'][0]['username']; ?></label>
                            <?php if ($link_user_id == $user_id) { ?>                          
                                <a class="btn w3-right" href="<?php echo base_url(); ?>user/edit_profile"><span class="w3-small bluish-green "><b>Edit Profile </b><i class="w3-medium w3-text-black fa fa-gear"></i></span></a>
                            <?php } ?>
                            <div class="w3-col l12 w3-margin-bottom">
                                <div class="w3-col l8"><b><?php echo $prod_count; ?></b> Posts</div>
                            </div>
                            <div class="w3-col l12">
                                <div class="w3-col l8"><b>
                                        <?php
                                        if ($userDetails['status_message'][0]['full_name'] != '') {
                                            echo $userDetails['status_message'][0]['full_name'];
                                        } else {
                                            //echo 'Enter Full Name.  <a href="' . base_url() . 'user/edit_profile" class="btn  bluishGreen_txt w3-small fa fa-plus"> Add</a>';
                                        }
                                        ?></b></div>
                            </div>
                            <div class="w3-col l12 w3-margin-bottom">
                                <div class="w3-col l8">
                                    <?php
                                    if ($userDetails['status_message'][0]['bio'] != '') {
                                        echo $userDetails['status_message'][0]['bio'];
                                    } else {
                                        //echo 'Enter Your Bio.  <a href="' . base_url() . 'user/edit_profile" class="btn  bluishGreen_txt w3-small fa fa-plus"> Add</a>';
                                    }
                                    ?></div>
                            </div>
                            <div class="w3-col l12">
                                <div class="w3-col l8">
                                    <?php
                                    if ($userDetails['status_message'][0]['company_name'] != '') {
                                        echo $userDetails['status_message'][0]['company_name'];
                                    } else {
                                        // echo 'Enter Comapany Name.  <a href="' . base_url() . 'user/edit_profile" class="btn  bluishGreen_txt w3-small fa fa-plus"> Add</a>';
                                    }
                                    ?></div>
                            </div>
                            <div class="w3-col l12">
                                <div class="w3-col l8">
                                    <?php
                                    if ($userDetails['status_message'][0]['website'] != '') {
                                        echo $userDetails['status_message'][0]['website'];
                                    } else {
                                        //echo 'Enter Website.  <a href="' . base_url() . 'user/edit_profile" class="btn  bluishGreen_txt w3-small fa fa-plus"> Add</a>';
                                    }
                                    ?></div>
                            </div>
                            <div class="w3-col l12">
                                <div class="w3-col l8">
                                    <?php
                                    if ($userDetails['status_message'][0]['address'] != '') {
                                        echo $userDetails['status_message'][0]['address'];
                                    } else {
                                        //echo 'Enter Comapany Name.  <a href="' . base_url() . 'user/edit_profile" class="btn  bluishGreen_txt w3-small fa fa-plus"> Add</a>';
                                    }
                                    ?></div>
                            </div>
                            <div class="w3-col l12">
                                <div class="w3-col l8">
                                    <?php
                                    if ($userDetails['status_message'][0]['phone'] != '') {
                                        echo $userDetails['status_message'][0]['phone'];
                                    } else {
                                        //echo 'Enter Comapany Name.  <a href="' . base_url() . 'user/edit_profile" class="btn  bluishGreen_txt w3-small fa fa-plus"> Add</a>';
                                    }
                                    ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
            <!-- DIV FOR profile Description ends-->
            <div class="w3-col l12 w3-padding-small">
                <hr>
                <div class="col-lg-2"></div>
                <div class="w3-col l8">
                    <div class="w3-col s12 w3-center w3-margin-bottom">
                        <a><span class="w3-center" style=" border-top-style: solid; border-color: black;">Posts</span></a>
                    </div>
                    <!-- MAIN CONTENT STARTS -->
                    <!--------------------------- Div for posted products and my products --------------------------->
                    <div class="w3-col l12" style="" id="myProductDiv" >
                        <div class="w3-col l12" id="sliderImages">
                            <?php
                            //print_r($sliderInfo);die();
                            if (count($products['status_message']) != 0) {
                                foreach ($products['status_message'] as $key) {
                                    $prodimages = json_decode($key['prod_image'],TRUE);
                                    foreach ($prodimages as $val){
                                    ?>
                                    <!-- Image Div -->
                                    <div class="w3-col l4 w3-padding-small allImage-div ">
                                        <div class="allImage w3-card-2" style="background-position:center;background-repeat: no-repeat; background-image: url('<?php echo base_url() . $val['prod_image']; ?>');">
                                            <div class="w3-col l12">
                                                <!-- overlay for action div -->
                                                <div class="w3-col l12 saved-image">
                                                    <div class="w3-col l12 w3-center" style="margin-top: 30px">
                                                        <a href="#" title="View Product" class="btn w3-xlarge w3-text-orange allImage-btn"><span class="fa fa-search-plus" data-toggle="modal" data-target="#productModal_<?php echo $key['prod_id']; ?> "></span></a>									
                                                    </div>                                                   
                                                </div>
                                                <!-- overlay for action div ends -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Image Div ends -->
                                    <?php break; }?>
                                    <!-- Modal for show images -->	
                                    <div id="productModal_<?php echo $key['prod_id']; ?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog modal-md">
                                            <!-- Modal content-->
                                            <center><a data-dismiss="modal" title="Close Image" class="btn fa fa-close w3-xlarge w3-padding-small w3-text-white"></a></center>
                                            <div class="modal-content">
                                                <div class="modal-body ">
                                                    <?php if ($link_user_id == $user_id) { ?>                                             
                                                        <div class="w3-right w3-small w3-padding-bottom"><a href="#" id="Removebtn_<?php echo $key['prod_id']; ?>" onclick="RemoveProduct(<?php echo $key['prod_id']; ?>);" class="w3-red w3-button" style="padding: 3px;"><span>Delete</span></a></div>
                                                    <?php } ?>
                                                    <!-- Mid section div start -->
                                                    <?php
                                                    $imageArr = json_decode($key['prod_image'], TRUE);
                                                    if (count($imageArr) > 1) {
                                                        ?>
                                                        <!-- Image slider Swiper repo -->
                                                        <div class="swiper-container" style="height: 500px;width: 100%">
                                                            <div class="swiper-wrapper">
                                                                <?php
                                                                foreach ($imageArr as $image) {
                                                                    ?>
                                                                    <div class="w3-col l12 swiper-slide w3-border-bottom w3-black timeline_img" style="background-image: url('<?php echo base_url(); ?><?php echo $image['prod_image']; ?>');">
                                                                      <!-- <img src="<?php echo base_url(); ?>images/users/4.jpg" style="width: 100%;height: auto;" class="img img-responsive" > -->
                                                                    </div>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </div>
                                                            <!-- Add Pagination for multiple images-->
                                                            <div class="swiper-pagination w3-opacity"></div>
                                                        </div>
                                                    <?php } //-------end of if count of images
                                                    else {
                                                        ?>

                                                        <!-- Single image div -->
                                                        <?php
                                                        foreach ($imageArr as $image) {
                                                            ?>
                                                            <div class="w3-col l12 w3-border-bottom w3-black timeline_imgMob" style="background-image: url('<?php echo base_url(); ?><?php echo $image['prod_image']; ?>');">
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>

                                                        <?php
                                                    } //----------------end of else count of images
                                                    ?>

                                                    <!-- Mid section div ends -->
                                                                                        <!--<img class="img w3-center" src="<?php echo base_url() . $key['prod_image']; ?>" style="height: 100%; width: 100%;">-->
                                                    <label class="w3-margin-top w3-label">Product Name: </label><b> <?php echo $key['product_name']; ?></b><br>                                   
                                                    <label class="w3-label">Product Description: </label><b class="w3-small"> <?php echo $key['prod_description']; ?></b>
                                                </div>							
                                            </div>
                                        </div>
                                    </div>
                                    <!-- modal for show image -->
                                    <?php
                                }
                            } else {
                                echo '<div class="w3-col l12 w3-center"><h4>Oops! You don\'t have any products available.</h4></div>';
                            }
                            ?>
                        </div>

                    </div>
                    <!--------------------------- Div for posted products and my products ends--------------------------->

                    <!--------------------------- Div for my orders or order history ends------------------------------ -->

                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
        <!-- div with small buttons row -->
    </body>
    <!-- Swiper JS -->
<script src="<?php echo base_url(); ?>css/posts/dist/js/swiper.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper('.swiper-container', {
    pagination: {
      el: '.swiper-pagination',
    },
  });
</script>
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
                                $('#myProductDiv').load(location.href + " #myProductDiv>*", "");
                                location.reload();
                            }
                        });
                    },
                    cancel: function () {
                    }
                }
            });
        }
        //------------fun ends here------------------------------------------------------//

    </script>
</html>