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

    <div class="w3-col l12 w3-margin-bottom w3-center">
                <img src="<?php echo DASBOARDIMAGE_PATH.$dashImage['setting_value']; ?>" onerror="this.src='<?php echo base_url();?>images/default_image.png'" id="adminImagePreview" width="auto"  alt="User Dashboard Image will be displayed here once chosen." class="img img-thumbnail w3-centerimg ">
              </div>
  </div>

</body>
</html>
