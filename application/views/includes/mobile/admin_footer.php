<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
//error_reporting(E_ERROR | E_PARSE);
$admin_name=$this->session->userdata('admin_name');
$admin_role=$this->session->userdata('admin_role');
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
  <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert/jquery-confirm.css"> -->
  <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.js"></script>
  <!-- <script type="text/javascript" src="<?php echo base_url(); ?>css/alert/jquery-confirm.js"></script> -->
</head>
<body class="">
  <div class="w3-small w3-bottom" style=" position: fixed;z-index: 3">
    <?php
    $last = $this->uri->total_segments();
    $record_num = $this->uri->segment($last);
    ?>

    <?php 
    if($admin_role=='1'){?>
    <!-- Super Admin Menu in mobile view -->
    <div class="w3-col s3 w3-center" style="padding:0px">
      <a href="<?php echo base_url(); ?>admin/dashboard" style="width: 100%;height: 100%;padding-left:10px;background-color: <?php if($record_num=='dashboard'){ echo '#0097A7'; }else{ echo '#bcb8b8'; } ?>" class="w3-button w3-text-white"><label>Home</label></a>
    </div>
    <div class="w3-col s3 w3-center" style="padding:0px">
      <a href="<?php echo base_url(); ?>admin/orders" style="width: 100%;height: 100%;padding-left:10px;background-color: <?php if($record_num=='orders'){ echo '#0097A7'; }else{ echo '#bcb8b8'; } ?>" class="w3-button w3-text-white"><label>All Order</label></a>
    </div>
    <div class="w3-col s3 w3-center" style="padding:0px">
      <a href="<?php echo base_url(); ?>admin/all_users" style="width: 100%;height: 100%;padding-left:10px;background-color: <?php if($record_num=='all_users'){ echo '#0097A7'; }else{ echo '#bcb8b8'; } ?>" class="w3-button w3-text-white"><label>All User</label></a>
    </div>
    <div class="w3-col s3 w3-center" style="padding:0px">
      <a href="<?php echo base_url(); ?>admin/admin_settings" style="width: 100%;height: 100%;padding-left:10px;background-color: <?php if($record_num=='admin_settings'){ echo '#0097A7'; }else{ echo '#bcb8b8'; } ?>" class="w3-button w3-text-white"><label>Settings</label></a>
    </div>
    <?php 
  }
  ?>

  <?php 
  if($admin_role=='2'){?>
  <!-- Super Admin Menu in mobile view -->
  <div class="w3-col s3 w3-center" style="padding:0px">
    <a href="<?php echo base_url(); ?>admin/dashboard" style="width: 100%;height: 100%;padding-left:10px;background-color: <?php if($record_num=='dashboard'){ echo '#0097A7'; }else{ echo '#bcb8b8'; } ?>" class="w3-button w3-text-white"><label>Home</label></a>
  </div>
  <div class="w3-col s3 w3-center" style="padding:0px">
    <a href="<?php echo base_url(); ?>admin/orders" style="width: 100%;height: 100%;padding-left:10px;background-color: <?php if($record_num=='orders'){ echo '#0097A7'; }else{ echo '#bcb8b8'; } ?>" class="w3-button w3-text-white"><label>All Order</label></a>
  </div>
  <div class="w3-col s3 w3-center" style="padding:0px">
    <a href="<?php echo base_url(); ?>admin/manage_products" style="width: 100%;height: 100%;padding-left:10px;background-color: <?php if($record_num=='all_users'){ echo '#0097A7'; }else{ echo '#bcb8b8'; } ?>" class="w3-button w3-text-white"><label>My Post</label></a>
  </div>
  <div class="w3-col s3 w3-center" style="padding:0px">
    <a href="<?php echo base_url(); ?>admin/admin_settings" style="width: 100%;height: 100%;padding-left:10px;background-color: <?php if($record_num=='admin_settings'){ echo '#0097A7'; }else{ echo '#bcb8b8'; } ?>" class="w3-button w3-text-white"><label>Settings</label></a>
  </div>
  <?php 
}
?>

<?php 
  if($admin_role=='3'){?>
  <!-- Super Admin Menu in mobile view -->
  <div class="w3-col s4 w3-center" style="padding:0px">
    <a href="<?php echo base_url(); ?>admin/dashboard" style="width: 100%;height: 100%;padding-left:10px;background-color: <?php if($record_num=='dashboard'){ echo '#0097A7'; }else{ echo '#bcb8b8'; } ?>" class="w3-button w3-text-white"><label>Home</label></a>
  </div>
  <div class="w3-col s4 w3-center" style="padding:0px">
    <a href="<?php echo base_url(); ?>admin/orders" style="width: 100%;height: 100%;padding-left:10px;background-color: <?php if($record_num=='orders'){ echo '#0097A7'; }else{ echo '#bcb8b8'; } ?>" class="w3-button w3-text-white"><label>All Order</label></a>
  </div>
  <div class="w3-col s4 w3-center" style="padding:0px">
    <a href="<?php echo base_url(); ?>admin/manage_products" style="width: 100%;height: 100%;padding-left:10px;background-color: <?php if($record_num=='all_users'){ echo '#0097A7'; }else{ echo '#bcb8b8'; } ?>" class="w3-button w3-text-white"><label>My Post</label></a>
  </div>
  <?php 
}
?>

</div>
</body>
</html>
