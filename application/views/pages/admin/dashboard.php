<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
error_reporting(E_ERROR | E_PARSE);

?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
  <!-- <link rel="stylesheet" href="assets/css/alert/jquery-confirm.css"> -->
  <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
  <!-- <script type="text/javascript" src="assets/css/alert/jquery-confirm.js"></script> -->

  <style type="text/css">
  .user_img{
    height: 50px;
    width: 50px;
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
  }

  .timeline_img{
    height:500px;
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
  }
</style>
</head>
<body class="w3-light-grey">

  <!-- !PAGE CONTENT! -->
  <div class="w3-main w3-padding-small" style="margin-left:120px;">

    <!-- Header -->
    <header class="w3-container" >
      <h5><b><i class="fa fa-user-secret"></i> Dashboard</b></h5>
    </header>
    <div class="w3-row-padding w3-margin-bottom">
      <div class="w3-third">
        <div class="w3-container w3-blue w3-padding-16">
          <div class="w3-left"><i class="fa fa-check-square w3-jumbo"></i></div>
          <div class="w3-right">
            <span class="w3-xxlarge"><?php echo $orderCount['activeOrders']; ?></span>
          </div>
          <div class="w3-clear"></div>
          <h4>Active Orders</h4>
        </div>
      </div>
      <div class="w3-third">
        <div class="w3-container w3-green w3-padding-16">
          <div class="w3-left"><i class="fa fa-info-circle w3-jumbo"></i></div>
          <div class="w3-right">
            <span class="w3-xxlarge"><?php echo $orderCount['openOrders']; ?></span>
          </div>
          <div class="w3-clear"></div>
          <h4>Open Orders</h4>
        </div>
      </div>
      <div class="w3-third">
        <div class="w3-container w3-red w3-padding-16">
          <div class="w3-left"><i class="fa fa-history w3-jumbo"></i></div>
          <div class="w3-right">
            <span class="w3-xxlarge"><?php echo $orderCount['closeOrders']; ?></span>
          </div>
          <div class="w3-clear"></div>
          <h4>Closed Orders</h4>
        </div>
      </div>      
    </div>
    <!-- End page content -->

    <!-- Product timeline div starts -->
    <div class="w3-row-padding w3-margin-bottom">
      <div class="w3-container">
        <div class="col-lg-2"></div>
        <div class="w3-col l8 ">
          <!-- Header -->
          <header class="w3-container" style="margin-left: 30px">
            <h5><b><i class="fa fa-rss-square"></i> Latest Feeds</b></h5>
          </header>
          <div class="w3-col l12 w3-padding-xxlarge">
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
                    <a class="w3-button w3-white w3-hover-text-orange w3-hover-white" href="tel:965-6589745" title="<?php echo $key['phone']; ?>" style="padding-right: 0px;padding-left: 5px">
                      <span class="fa fa-phone w3-xlarge"></span>
                    </a>

                    <a class="w3-button w3-white w3-hover-text-orange w3-hover-white" href="mailto:example@gm.com" title="<?php echo $key['email']; ?>" style="padding-right: 0px;padding-left: 5px">
                      <span class="fa fa-envelope-o w3-xlarge"></span>
                    </a>                  
                  </div>

                  <div class="w3-col l12 w3-padding ">
                    <label><?php echo $key['product_name']; ?></label><br>
                    <span class="w3-small"><?php echo $key['prod_description']; ?></span>
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
