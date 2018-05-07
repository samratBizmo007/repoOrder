<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
error_reporting(E_ERROR | E_PARSE);

?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
  <!-- <link rel="stylesheet" href="assets/css/alert/jquery-confirm.css"> -->
  <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
  <!-- <script type="text/javascript" src="assets/css/alert/jquery-confirm.js"></script> -->
</head>
<body class="w3-light-grey">

  <!-- !PAGE CONTENT! -->
  <div class="w3-main w3-padding-small" style="margin-left:120px;">

    <!-- Header -->
    <header class="w3-col l12" >
      <h5><b><i class="fa fa-dashboard"></i> Dashboard</b></h5>
    </header>
    <div class="w3-col l12 s12 m12 w3-margin-bottom">
      <div class="w3-col l4 s4 m4">
        <div class="w3-container w3-blue w3-center">
          <div class="w3-center">
            <span class="w3-xxlarge w3-center"><?php echo $orderCount['activeOrders']; ?></span>
          </div>
          <div class="w3-clear "></div>
          <h5>Active Orders</h5>
        </div>
      </div>
      <div class="w3-col l4 s4 m4">
        <div class="w3-container w3-green w3-center">
          <div class="w3-center">
            <span class="w3-xxlarge w3-center"><?php echo $orderCount['openOrders']; ?></span>
          </div>
          <div class="w3-clear w3-center"></div>
          <h5>Open Orders</h5>
        </div>
      </div>
      <div class="w3-col l4 s4 m4">
        <div class="w3-container w3-red w3-center">
          <div class="w3-center">
            <span class="w3-xxlarge w3-center"><?php echo $orderCount['closeOrders']; ?></span>
          </div>
          <div class="w3-clear w3-center"></div>
          <h5>Closed Orders</h5>
        </div>
      </div>      
    </div>
    <!-- End page content -->

    <!-- Product timeline div starts -->
    <div class="w3-row w3-margin-bottom">
      <div class="">
        <div class="col-lg-2"></div>
        <div class="w3-col l8 ">
          <!-- Header -->
          <header class="w3-container" style="margin-left: 30px">
            <h5><b><i class="fa fa-rss-square"></i> Latest Feeds</b></h5>
          </header>
          <div class="w3-col l12">
            <?php
            if($timelineData['status']!=500){
              foreach ($timelineData['status_message'] as $key) { ?>
              <div class="w3-col l12 w3-card-2 w3-margin-bottom">

                <!-- Top section div start -->
                <div class="w3-col l12 w3-border-bottom">
                  <div class="w3-col l1 w3-padding">
                    <div class="w3-circle w3-border user_img" style="background-image: url('<?php echo base_url(); ?><?php echo $key['user_image']; ?>');"></div>
                  </div>
                  <div class="w3-col l11 w3-padding-left w3-padding-top">
                    <label class="w3-margin-top w3-small"><?php echo $key['username']; ?></label>
                  </div>
<!--                    <div class="w3-col l7 w3-left w3-padding-top">
                    </div>-->
                </div>
                <!-- Top section div ends -->

                <!-- Mid section div start -->
                <div class="w3-col l12 w3-border-bottom w3-black timeline_img" style="background-image: url('<?php echo base_url(); ?><?php echo $key['prod_image']; ?>');">
                  <!-- <img src="<?php echo base_url(); ?>images/users/4.jpg" style="width: 100%;height: auto;" class="img img-responsive" > -->
                </div>
                <!-- Mid section div ends -->

                <!-- Bottom section div starts -->
                <div class="w3-col l12">
                  <div class="w3-col l12 w3-padding-small w3-right">
                    <a class="w3-button w3-white w3-hover-text-orange w3-hover-white" href="tel:<?php echo $key['phone']; ?>" title="<?php echo $key['phone']; ?>" style="padding-right: 0px;padding-left: 8px">
                      <span class="fa fa-phone w3-xlarge"></span>
                    </a>

                    <a class="w3-button w3-white w3-hover-text-orange w3-hover-white" href="<?php echo $key['email']; ?>" title="<?php echo $key['email']; ?>" style="padding-right: 0px;padding-left: 15px">
                      <span class="fa fa-envelope-o w3-xlarge"></span>
                    </a> 
                      <span class="w3-margin-top w3-right w3-small"><i><?php echo $key['category_name']; ?></i></span>
                  </div>

                  <div class="w3-col l12 w3-padding ">
                    <label><?php echo $key['product_name']; ?></label>
                    <span class="w3-small w3-margin-left"><?php echo $key['prod_description']; ?></span>
                    <hr>
                  </div>

                </div>
                <!-- Bottom section div ends -->

              </div>
              <?php
            }
          }
          else{
            ?>
            <div class="alert alert-warning w3-center">
              <b><?php echo $all_users['status_message']; ?></b>
            </div>               
            <?php 
          } 
          ?>          
        </div>

      </div>
      <div class="col-lg-2"></div>
    </div>
  </div>
  <!-- Product timeline ends here -->
  </div>

</body>
</html>
