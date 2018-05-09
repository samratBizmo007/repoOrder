<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
//error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/alert/jquery-confirm.js"></script>
</head>
<body class="">
  <?php
    $last = $this->uri->total_segments();
    $record_num = $this->uri->segment($last);
    ?>
  <div class="w3-row w3-center w3-border-top header_bg w3-bottom w3-border-top" style="position: fixed;z-index: 3">
    <div class="w3-col s2 w3-center" style="padding:0 ">
      <a href="<?php echo base_url(); ?>user/feeds" class="btn icon"><label><i class="fa fa-home <?php if($this->uri->segment(2)=='feeds'){ echo 'icon_active';}else{ echo 'w3-text-lightgrey';}?> w3-xlarge "></i></label>
      </a>
    </div>
    <div class="w3-col s2 w3-center" style="padding:0 0 0 12px">
      <a href="<?php echo base_url(); ?>user/all_categories" class="btn icon"><label><i class="fa fa-search <?php if($record_num=='all_categories'){ echo 'icon_active';}else{ echo 'w3-text-lightgrey';}?> w3-xlarge"></i></label>
      </a>
    </div>
    <div class="w3-col s4 w3-center" style="padding:0 ">
      <a href="<?php echo base_url(); ?>user/manage_products" class="btn icon"><label><i class="fa fa-plus-square <?php if($record_num=='manage_products'){ echo 'icon_active';}else{ echo 'w3-text-lightgrey';}?> w3-xlarge"></i></label>
      </a>
    </div>
    <div class="w3-col s2 w3-center" style="padding:0;margin-left: -12px">
      <a href="<?php echo base_url(); ?>orders/manage_orders" class="btn icon"><label><i class="fa fa-cubes <?php if($record_num=='manage_orders'){ echo 'icon_active';}else{ echo 'w3-text-lightgrey';}?> w3-xlarge"></i></label></a>
    </div>
    
    <div class="w3-col s2 w3-center" style="padding:0 ">
      <a href="<?php echo base_url(); ?>user/user_profile" class="btn icon"><label><i class="fa fa-user <?php if($record_num=='user_profile'){ echo 'icon_active';}else{ echo 'w3-text-lightgrey';}?> w3-xlarge"></i></label>
      </a>
    </div>
  </div>
  
    <!-- <div class="w3-small w3-bottom" style=" position: fixed;z-index: 3">
    <?php
    $last = $this->uri->total_segments();
    $record_num = $this->uri->segment($last);
    ?>
    <div class="w3-col s3 w3-center" style="padding:0px">
      <a href="<?php echo base_url(); ?>user/dashboard" style="width: 100%;height: 100%;background-color: <?php if($record_num=='dashboard'){ echo '#0097A7'; }else{ echo '#bcb8b8'; } ?>" class="w3-button w3-text-white"><label>Home</label></a>
    </div>
    <div class="w3-col s3 w3-center" style="padding:0px">
      <a href="<?php echo base_url(); ?>orders/manage_orders" style="width: 100%;height: 100%;padding-left:5px;background-color: <?php if($record_num=='manage_orders'){ echo '#0097A7'; }else{ echo '#bcb8b8'; } ?>" class="w3-button w3-text-white"><label>Add Order</label></a>
    </div>
    <div class="w3-col s3 w3-center" style="padding:0px">
      <a href="<?php echo base_url(); ?>mobile/history" style="width: 100%;height: 100%;background-color:<?php if($record_num=='history'){ echo '#0097A7'; }else{ echo '#bcb8b8'; } ?>" class="w3-button w3-text-white"><label>History</label></a>
    </div>
    <div class="w3-col s3 w3-center" style="padding:0px">
      <a href="<?php echo base_url(); ?>user/user_settings" style="width: 100%;height: 100%;padding-left:10px;background-color: <?php if($record_num=='user_settings'){ echo '#0097A7'; }else{ echo '#bcb8b8'; } ?>" class="w3-button w3-text-white"><label>Settings</label></a>
    </div>

  </div> -->
</body>
</html>
