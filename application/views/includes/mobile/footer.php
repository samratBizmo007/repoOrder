<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert/jquery-confirm.css">
  <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/alert/jquery-confirm.js"></script>
</head>
<body class="">
  <div class="w3-small w3-bottom">
    <?php $color=' #0097A7'; ?>
    <div class="w3-col s3" style="padding:0px">
      <a href="<?php echo base_url(); ?>user/dashboard" style="width: 100%;height: 100%;background-color: #bcb8b8" class="w3-button w3-text-white"><label>Home</label></a>
    </div>
    <div class="w3-col s3" style="padding:0px">
      <a href="<?php echo base_url(); ?>orders/manage_orders" style="width: 100%;height: 100%;padding-left:4px;background-color: #bcb8b8" class="w3-button w3-text-white"><label>Add Order</label></a>
    </div>
    <div class="w3-col s3" style="padding:0px">
      <a href="<?php echo base_url(); ?>mobile/history" style="width: 100%;height: 100%;background-color:#bcb8b8" class="w3-button w3-text-white"><label>History</label></a>
    </div>
    <div class="w3-col s3" style="padding:0px">
      <a href="<?php echo base_url(); ?>user/user_settings" style="width: 100%;height: 100%;padding-left:10px;background-color: #bcb8b8" class="w3-button w3-text-white"><label>Settings</label></a>
    </div>
      
  </div>
</body>
</html>
