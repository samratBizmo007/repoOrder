<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
error_reporting(E_ERROR | E_PARSE);
$user_name=$this->session->userdata('user_name');
$user_id=$this->session->userdata('user_id');
$user_role=$this->session->userdata('user_role');
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

  <!-- FOOTER WITHOUT LOGIN -->
  <?php 
  if($user_role=='' || $user_id==''){
  ?>
  <div class="w3-row w3-center header_bg w3-bottom w3-border-top w3-white" style="position: fixed;z-index: 3; height: 50px;">
    <div class="w3-col s4 w3-center" style="padding:0 ">
        <a href="<?php echo base_url(); ?>user/feeds" class="btn icon"><label class="w3-tiny <?php if($this->uri->segment(2)=='feeds'){ echo 'icon_active';}else{ echo 'w3-text-grey';}?>"><i class="fa fa-home <?php if($this->uri->segment(2)=='feeds'){ echo 'icon_active';}else{ echo 'w3-text-grey';}?> w3-large "></i><br>Feeds</label>
      </a>
    </div>
    <div class="w3-col s4 w3-center" style="padding:0">
        <a href="<?php echo base_url(); ?>user/all_categories" class="btn icon"><label class="w3-tiny <?php if($record_num=='all_categories' || $this->uri->segment(2)=='category'){ echo 'icon_active';}else{ echo 'w3-text-grey';}?>"><i class="fa fa-search <?php if($record_num=='all_categories' || $this->uri->segment(2)=='category'){ echo 'icon_active';}else{ echo 'w3-text-grey';}?> w3-large"></i><br>Search</label>
      </a>
    </div>
    <div class="w3-col s4 w3-center" style="padding:0 ">
        <a href="<?php echo base_url(); ?>login" class="btn icon"><label class="w3-tiny w3-text-grey"><i class="fa fa-user-circle w3-text-grey w3-large"></i><br>Login</label>
      </a>
    </div>
  </div>
  <?php } ?>
  <!-- FOOTER WITHOUT LOGIN ENDS -->

  <!-- FOOTER WITH CONSUMER LOGIN -->
  <?php 
  if($user_role=='1' && $user_id!=''){
  ?>
  <div class="w3-row w3-center header_bg w3-bottom w3-white w3-border-top" style="position: fixed;z-index: 3; height: 50px;">
    <div class="w3-col s6 w3-center" style="padding:0 ">
        <a href="<?php echo base_url(); ?>user/feeds" class="btn icon"><label class="w3-tiny <?php if($this->uri->segment(2)=='feeds'){ echo 'icon_active';}else{ echo 'w3-text-grey';}?>"><i class="fa fa-home <?php if($this->uri->segment(2)=='feeds'){ echo 'icon_active';}else{ echo 'w3-text-grey';}?> w3-large "></i><br>Feeds</label>
      </a>
    </div>
    <div class="w3-col s6 w3-center" style="padding:0">
        <a href="<?php echo base_url(); ?>user/all_categories" class="btn icon"><label class="w3-tiny <?php if($record_num=='all_categories' || $this->uri->segment(2)=='category'){ echo 'icon_active';}else{ echo 'w3-text-grey';}?>"><i class="fa fa-search <?php if($record_num=='all_categories' || $this->uri->segment(2)=='category'){ echo 'icon_active';}else{ echo 'w3-text-grey';}?> w3-large"></i><br>Search</label>
      </a>
    </div>
  </div>
  <?php } ?>
  <!-- FOOTER WITH CONSUMER LOGIN ENDS -->


  <!-- FOOTER WITHOUT LOGIN -->
  <?php 
  if($user_role=='2' && $user_id!=''){
  ?>
  <div class="w3-row w3-center header_bg w3-bottom w3-border-top w3-white" style="position: fixed;z-index: 3; height: 50px;">
    <div class="w3-col s3 w3-center" style="padding:0 ">
        <a href="<?php echo base_url(); ?>user/feeds" class="btn icon"><label class="w3-tiny <?php if($this->uri->segment(2)=='feeds'){ echo 'icon_active';}else{ echo 'w3-text-grey';}?>"><i class="fa fa-home <?php if($this->uri->segment(2)=='feeds'){ echo 'icon_active';}else{ echo 'w3-text-grey';}?> w3-large "></i><br>Feeds</label>
      </a>
    </div>
    <div class="w3-col s3 w3-center" style="padding:0">
        <a href="<?php echo base_url(); ?>user/all_categories" class="btn icon"><label class="w3-tiny <?php if($record_num=='all_categories' || $this->uri->segment(2)=='category'){ echo 'icon_active';}else{ echo 'w3-text-grey';}?>"><i class="fa fa-search <?php if($record_num=='all_categories' || $this->uri->segment(2)=='category'){ echo 'icon_active';}else{ echo 'w3-text-grey';}?> w3-large"></i><br>Search</label>
      </a>
    </div>
    <div class="w3-col s3 w3-center" style="padding:0 ">
        <a href="<?php echo base_url(); ?>user/manage_products" class="btn icon"><label class="w3-tiny <?php if($record_num=='manage_products'){ echo 'icon_active';}else{ echo 'w3-text-grey';}?>"><i class="fa fa-plus-square <?php if($record_num=='manage_products'){ echo 'icon_active';}else{ echo 'w3-text-grey';}?> w3-large"></i><br>Add</label>
      </a>
    </div>
    <div class="w3-col s3 w3-center" style="padding:0 ">
        <a href="<?php echo base_url(); ?>user/user_profile/<?php echo base64_encode($user_id);?>" class="btn icon"><label class="w3-tiny <?php if($this->uri->segment(2)=='user_profile' || $record_num=='edit_profile'){ echo 'icon_active';}else{ echo 'w3-text-grey';}?>"><i class="fa fa-user <?php if($this->uri->segment(2)=='user_profile' || $record_num=='edit_profile'){ echo 'icon_active';}else{ echo 'w3-text-grey';}?> w3-large"></i><br>Profile</label>
      </a>
    </div>
  </div>
  <?php } ?>
  <!-- FOOTER WITHOUT LOGIN ENDS -->

  <!-- <div class="w3-row w3-center w3-border-top header_bg w3-bottom w3-border-top" style="position: fixed;z-index: 3">
    <div class="w3-col s3 w3-center" style="padding:0 ">
      <a href="<?php echo base_url(); ?>user/feeds" class="btn icon"><label><i class="fa fa-home <?php if($this->uri->segment(2)=='feeds'){ echo 'icon_active';}else{ echo 'w3-text-lightgrey';}?> w3-xlarge "></i></label>
      </a>
    </div>
    <div class="w3-col s3 w3-center" style="padding:0">
      <a href="<?php echo base_url(); ?>user/all_categories" class="btn icon"><label><i class="fa fa-search <?php if($record_num=='all_categories' || $this->uri->segment(2)=='category'){ echo 'icon_active';}else{ echo 'w3-text-lightgrey';}?> w3-xlarge"></i></label>
      </a>
    </div>
    <div class="w3-col s3 w3-center" style="padding:0 ">
      <a href="<?php echo base_url(); ?>user/manage_products" class="btn icon"><label><i class="fa fa-plus-square <?php if($record_num=='manage_products'){ echo 'icon_active';}else{ echo 'w3-text-lightgrey';}?> w3-xlarge"></i></label>
      </a>
    </div>
    <div class="w3-col s3 w3-center" style="padding:0 ">
      <a href="<?php echo base_url(); ?>user/user_profile/<?php echo base64_encode($user_id);?>" class="btn icon"><label><i class="fa fa-user <?php if($this->uri->segment(2)=='user_profile' || $record_num=='edit_profile'){ echo 'icon_active';}else{ echo 'w3-text-lightgrey';}?> w3-xlarge"></i></label>
      </a>
    </div>
  </div> -->
  
</body>
</html>
