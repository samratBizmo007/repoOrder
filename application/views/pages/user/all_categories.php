<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
error_reporting(E_ERROR | E_PARSE);

?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Categories</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert/jquery-confirm.css">
  <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/alert/jquery-confirm.js"></script>
</head>
<body class="w3-light-grey">

  <!-- !PAGE CONTENT! -->
  <div class="w3-main w3-padding-small" style="margin-left:120px;">

    <!-- Header -->
    <header class="w3-container" >
      <h5><b><i class="fa fa-search"></i> All Categories</b></h5>
    </header>
    <div class="w3-row-padding w3-margin-bottom">
      
      <!-- All categories -->
      <div class="w3-col l12" id="categoryDiv">

        <?php
        // print_r($all_categories['status_message']);die();
        foreach ($all_categories['status_message'] as $result) {
         ?>
         <!-- category div block -->
         <div class="w3-col l2" style="padding: 6px">
          <div class="w3-col s12 w3-border w3-round-large w3-card-2" style="height: 120px">
            <div class="w3-col l12 w3-center w3-padding-top">
              <a class="btn w3-padding" href="<?php echo base_url(); ?>user/category/<?php echo base64_encode($result['cat_id']); ?>">
                <span>
                <i class="fa fa-<?php echo $result['fa_symbol']; ?> w3-xxlarge"></i>
              </span>
              <div class="w3-col l12">
                <span class="w3-small"><?php echo $result['category_name']; ?></span>
              </div>
              
              </a>              
            </div>            
          </div>
        </div>
        <?php } ?>
        <!-- category div block ends -->

      </div>
      <!-- All Categories end -->
    </div>
    <!-- End page content -->
  </div>


</body>
</html>
