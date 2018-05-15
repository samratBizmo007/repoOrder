<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
error_reporting(E_ERROR | E_PARSE);
$user_name=$this->session->userdata('user_name');
$user_id=$this->session->userdata('user_id');
$user_role=$this->session->userdata('user_role');

// $profile_type=$this->session->userdata('profile_type');
// /echo $profile_type;
?>
<!DOCTYPE html>
<html>
<head>
  <style type="text/css">

  .alert{
    margin-bottom: 0px !important; 
  }
  
</style>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css">
<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css"> -->
<link rel="stylesheet" href="<?php echo base_url(); ?>css/alert/jquery-confirm.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/header/header_overlay.css">
<script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>css/alert/jquery-confirm.js"></script>
<style></style>
</head>
<body id="home" class="homepage">

  <!-- Sidebar/menu -->
  <nav class="w3-sidebar w3-collapse w3-black w3-animate-left w3-white" style="z-index:2px;width:120px;" id="navigation"><br>

    <div class="w3-bar-block">

      <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu "><i class="fa fa-remove fa-fw"></i>&nbsp; Close
      </a>

      <?php if($user_role=='2'){ ?>
      <a href="<?php echo base_url(); ?>user/user_profile/<?php echo base64_encode($user_id);?>" class="w3-bar-item <?php if($this->uri->segment(2)=='user_profile' || $this->uri->segment(2)=='edit_profile'){ echo 'w3-text-orange';}else{ echo 'w3-text-white';}?> w3-hover-text-orange w3-padding w3-center ">
        <div class="w3-col l12"><i class="w3-xlarge fa fa-user-circle fa-fw"></i></div>
        <div class="w3-col l12 w3-wide w3-small w3-border-bottom w3-margin-bottom" style="letter-spacing: 2px">Profile<br><br></div>
        <div class="clear"></div>
      </a>
      <?php } ?>

      <a href="<?php echo base_url(); ?>user/feeds" class="w3-bar-item <?php if($this->uri->segment(2)=='feeds'){ echo 'w3-text-orange';}else{ echo 'w3-text-white';}?> w3-hover-text-orange w3-padding w3-center ">
        <div class="w3-col l12"><i class="w3-xlarge fa fa-rss-square fa-fw"></i></div>
        <div class="w3-col l12 w3-wide w3-small" style="letter-spacing: 2px">Latest Feeds<br><br></div>      
        <div class="clear"></div>
      </a>

      <a href="<?php echo base_url(); ?>user/all_categories" class="w3-bar-item <?php if($this->uri->segment(2)=='all_categories' || $this->uri->segment(2)=='category'){ echo 'w3-text-orange';}else{ echo 'w3-text-white';}?> w3-hover-text-orange w3-padding w3-center">
        <div class="w3-col l12"><i class="w3-xlarge fa fa-search fa-fw"></i></div>
        <div class="w3-col l12 w3-wide w3-small" style="letter-spacing: 2px">Search Category<br><br></div>      
        <div class="clear"></div>
      </a>

      <?php if($user_role=='' || $user_id==''){ ?>
      <a href="<?php echo base_url(); ?>login" class="w3-bar-item w3-hover-text-orange w3-padding w3-center ">
        <div class="w3-col l12"><i class="w3-xlarge fa fa-user fa-fw"></i></div>
        <div class="w3-col l12 w3-wide w3-small w3-margin-bottom" style="letter-spacing: 2px">Log In<br><br></div>
        <div class="clear"></div>
      </a>
      <?php } ?>

      <?php if($user_role=='2' && $user_id!=''){ ?>
      <a href="<?php echo base_url(); ?>user/manage_products" class="w3-bar-item <?php if($this->uri->segment(2)=='manage_products'){ echo 'w3-text-orange';}else{ echo 'w3-text-white';}?> w3-hover-text-orange w3-padding w3-center">
        <div class="w3-col l12"><i class="w3-xlarge fa fa-plus-square fa-fw"></i></div>
        <div class="w3-col l12 w3-wide w3-small" style="letter-spacing: 2px">Add Product<br><br></div>      
        <div class="clear"></div>
      </a>
      <?php } ?>

      <!-- <a href="<?php echo base_url(); ?>orders/manage_orders" class="w3-bar-item <?php if($this->uri->segment(2)=='manage_orders'){ echo 'w3-text-orange';}else{ echo 'w3-text-white';}?> w3-hover-text-orange w3-padding w3-center">
        <div class="w3-col l12"><i class="w3-xlarge fa fa-list-alt fa-fw"></i></div>
        <div class="w3-col l12 w3-wide w3-small" style="letter-spacing: 2px">My Orders<br><br></div>      
        <div class="clear"></div>
      </a> -->

      <!-- <a href="<?php echo base_url(); ?>user/user_settings" class="w3-bar-item w3-hover-text-orange w3-padding w3-center">
        <div class="w3-col l12"><i class="w3-xlarge fa fa-cog fa-fw"></i></div>
        <div class="w3-col l12 w3-wide w3-small" style="letter-spacing: 2px">Settings<br><br></div>      
        <div class="clear"></div>
      </a> -->
    </div>
  </nav>

  <!-- Top container -->
  <div class="w3-bar w3-white w3-card-2 w3-large w3-padding" style="z-index:0px">
    <div class="w3-col l12">
      <div class="w3-col l6 s6">
       <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey w3-blue" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
     </div>
     <div class="w3-col l6 s6 w3-right">

      <!-- After login div -->
      <?php if($user_role!='' || $user_id!='' || $user_name!=''){ ?>
      <div class="w3-col l12 w3-right">
        <div class="w3-right">
          <span class="w3-small">Welcome, <strong><?php echo $user_name; ?></strong></span>
          <a href="<?php echo base_url(); ?>login/logout" class="w3-small btn w3-black w3-padding-tiny w3-round-large w3-text-white">Logout <i class="fa fa-sign-out" ></i></a>
        </div>
      </div>

      <?php } ?>
      <!-- After login div ends -->

      <!-- Before login div -->
      <?php if($user_role=='' || $user_id=='' || $user_name==''){ ?>
      <div class="w3-col l12 w3-right">
        <div class="w3-right">
          <label class="w3-small">For better experience, Please </label>
          <a href="<?php echo base_url(); ?>login" class="w3-small btn w3-black w3-padding-tiny w3-round-large w3-text-white">Log In <i class="fa fa-sign-in" ></i></a>
        </div>
      </div>
      <?php } ?>
      <!-- Before login div ends -->

    </div>

  </div>



</div>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>


<script>
// Get the Sidebar
var navigation = document.getElementById("navigation");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (navigation.style.display === 'block') {
    navigation.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    navigation.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  navigation.style.display = "none";
  overlayBg.style.display = "none";
}
</script>


</body>
</html>
