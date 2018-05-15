<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
error_reporting(E_ERROR | E_PARSE);

?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Salers</title>
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
      <h5><b><i class="fa fa-user-secret"></i> All Salers</b></h5>
    </header>
    <div class="w3-row-padding w3-margin-bottom">
     <?php
    // print_r($all_salers);die();
     if($all_salers['status']!=500){
      foreach ($all_salers['status_message'] as $key) { ?>


            <!-- saler info div start -->
            <div class="w3-col l3 w3-card w3-round w3-margin-bottom" style="margin:6px">
              <div class="w3-col s4 w3-padding-small w3-padding-top ">
                <?php 
                if($key['user_image']!=''){
                ?>
                 <div class="w3-circle w3-border" style="height: 80px;width: 80px;background-position:center;background-repeat: no-repeat; background-size:contain; background-image: url('<?php echo base_url().$key['user_image']; ?>');"></div>
                <?php 
              }
              else{
                ?>
                <div class="w3-circle w3-border" style="height: 60px;width: 60px;background-position:center;background-repeat: no-repeat; background-size:contain; background-image: url('<?php echo base_url(); ?>images/default_male.png');"></div>
                <?php } ?>

              </div>
              <div class="w3-col s8 w3-padding">
                <div>
                  <div class="w3-col s12">
                    <span class="w3-small"><i class="fa fa-user"></i> <?php if($key['full_name']==''){ echo '<span class="w3-text-red">Not Disclosed.</span>';}else { echo $key['full_name']; }?> </span>
                    <!-- <label>Samrat Munde dc wcc</label> -->
                  </div>

                  <div class="w3-col s12">
                    <span class="w3-small"><i class="fa fa-briefcase"></i> <?php if($key['company_name']==''){ echo '<span class="w3-text-red">Not Disclosed.</span>';}else { echo $key['company_name']; }?> </span>
                    <!-- <span>Samrat Munde scdscdsv ecwcdscv </span> -->
                  </div>

                  <div class="w3-col s12">
                    <a class="w3-button w3-white w3-text-yellow w3-hover-text-orange w3-hover-white" href="tel:<?php echo $key['phone']; ?>" title="<?php echo $key['phone']; ?>">
                    <span class="fa fa-phone w3-large"></span> <span class="w3-small"></span>
                  </a>

                  <a class="w3-button w3-white w3-center w3-text-green w3-hover-text-orange w3-hover-white" href="whatsapp://send?text=Hello! I got your contact from Jumla Business.&phone=<?php echo $key['phone']; ?>" title="Whatsapp on: <?php echo $key['phone']; ?>">
                    <span class="fa fa-whatsapp w3-large"></span> <span class="w3-small"></span>
                  </a>

                  <a class="w3-button w3-white w3-text-red w3-hover-text-orange w3-hover-white" href="mailto:<?php echo $key['email']; ?>" title="<?php echo $key['email']; ?>">
                    <span class="fa fa-envelope-o w3-large"></span> <span class="w3-small"></span>
                  </a>
                  </div>

                  <div class="w3-col s12 w3-margin-top">
                    <a class="w3-button badge w3-right w3-hover-text-orange w3-hover-white" href="<?php echo base_url(); ?>user/user_profile/<?php echo base64_encode($key['user_id']); ?>" title="View <?php echo $key['username']; ?>" style="padding: 3px">
                    <span class="w3-small">view</span> <span class="fa fa-chevron-circle-right w3-medium"></span>
                  </a>
                  </div>

                </div>
              </div>
            </div>
            <!-- saler info div ends -->

      <?php
    }
  }
  else{
    ?>
    <div class="alert alert-warning w3-center">
      <b><?php echo $all_salers['status_message']; ?></b>
    </div>               
    <?php 
  } 
  ?>     
</div>
<!-- End page content -->
</div>


</body>
</html>
