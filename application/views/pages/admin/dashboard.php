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
        <div class="w3-col l8">
          <!-- Header -->
          <header class="w3-container" style="margin-left: 30px">
            <h5><b><i class="fa fa-rss-square"></i> Latest Feeds</b></h5>
          </header>
          <div class="w3-col l12 w3-padding-xxlarge">
            <div class="w3-col l12 w3-card-2 w3-margin-bottom">

              <!-- Top section div start -->
              <div class="w3-col l12 w3-border-bottom">
                <div class="w3-col l1 w3-padding">
                  <div class="w3-circle w3-border" style="height: 40px;width: 40px;background-image: url('<?php echo base_url(); ?>images/users/1.jpg');background-size: contain;"></div>
                </div>
                <div class="w3-col l11 w3-padding-left">
                  <label class="w3-margin-top w3-small">Username007</label>
                </div>
              </div>
              <!-- Top section div ends -->

              <!-- Mid section div start -->
              <div class="w3-col l12 w3-border-bottom">
                <img src="<?php echo base_url(); ?>images/users/1.jpg" style="width: 100%;height: auto;" class="img img-responsive" >
              </div>
              <!-- Mid section div ends -->

              <!-- Bottom section div starts -->
              <div class="w3-col l12">
                <div class="w3-col l12 w3-padding-small">
                  <a class="w3-button w3-white w3-hover-text-orange w3-hover-white" href="tel:965-6589745" title="Call: 965-6589745" style="padding-right: 0px">
                    <span class="fa fa-phone w3-xlarge"></span>
                  </a>

                  <a class="w3-button w3-white w3-hover-text-orange w3-hover-white" href="mailto:example@gm.com" title="Mail: example@gm.com" style="padding-right: 0px">
                    <span class="fa fa-envelope-o w3-xlarge"></span>
                  </a>                  
                </div>

                <div class="w3-col l12 w3-padding ">
                  <label>Prodcyt title</label><br>
                  <span class="w3-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
                  <hr>
                </div>

              </div>
              <!-- Bottom section div ends -->

            </div>


            <div class="w3-col l12 w3-card-2 w3-margin-bottom">

              <!-- Top section div start -->
              <div class="w3-col l12 w3-border-bottom">
                <div class="w3-col l1 w3-padding">
                  <div class="w3-circle w3-border" style="height: 40px;width: 40px;background-image: url('<?php echo base_url(); ?>images/users/1.jpg');background-size: contain;"></div>
                </div>
                <div class="w3-col l11 w3-padding-left">
                  <label class="w3-margin-top w3-small">Username007</label>
                </div>
              </div>
              <!-- Top section div ends -->

              <!-- Mid section div start -->
              <div class="w3-col l12 w3-border-bottom">
                <img src="<?php echo base_url(); ?>images/users/3.jpg" style="width: 100%;height: auto;" class="img img-responsive" >
              </div>
              <!-- Mid section div ends -->

              <!-- Bottom section div starts -->
              <div class="w3-col l12">
                <div class="w3-col l12 w3-padding-small">
                  <a class="w3-button w3-white w3-hover-text-orange w3-hover-white" href="tel:965-6589745" title="Call: 965-6589745" style="padding-right: 0px">
                    <span class="fa fa-phone w3-xlarge"></span>
                  </a>

                  <a class="w3-button w3-white w3-hover-text-orange w3-hover-white" href="mailto:example@gm.com" title="Mail: example@gm.com" style="padding-right: 0px">
                    <span class="fa fa-envelope-o w3-xlarge"></span>
                  </a>                  
                </div>

                <div class="w3-col l12 w3-padding ">
                  <label>Prodcyt title</label><br>
                  <span class="w3-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
                  <hr>
                </div>

              </div>
              <!-- Bottom section div ends -->

            </div>
          
          </div>
          
        </div>
        <div class="col-lg-2"></div>
      </div>
    </div>
    <!-- Product timeline ends here -->
  </div>

</body>
</html>
