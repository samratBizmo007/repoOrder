<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
error_reporting(E_ERROR | E_PARSE);

?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Settings</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert/jquery-confirm.css">
  <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/alert/jquery-confirm.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900" rel="stylesheet">

    <style>
    body {
        font-family: 'Roboto', sans-serif;
    }
</style>
</head>
<body class="w3-light-grey">

  <!-- !PAGE CONTENT! -->
  <div class="w3-main w3-padding-small" style="margin-left:120px;">

    <!-- Header -->
    <header class="w3-container" >
      <h5><b><i class="fa fa-cog"></i> Settings</b></h5>
    </header>
    <div class="w3-row-padding w3-margin-bottom">
      <div class="w3-col l12">
        <div class="col-lg-6 w3-padding-small ">
          <div class="w3-col l12 w3-small w3-margin-bottom">
            <label><i class="fa fa-check-square"></i> Verify Email-ID</label><br>

            <form id="verifyEmail">
              <div class="w3-col l8 w3-padding-right w3-margin-bottom">
                <input type="email" name="user_email" value="<?php echo $userDetails['email']; ?>" placeholder="Enter Email-ID here..." id="user_email" class="w3-input" required readonly>
              </div>
              <div class="w3-col l4"  id="verifyEmail_btn">
                <button type="submit" class="w3-button w3-red">Send OTP</button>
              </div>
            </form>            
          </div>
        </div>

        <div class="col-lg-6 w3-padding-small ">
          <div class="w3-col l6 w3-small w3-margin-bottom">
            <label><i class="fa fa-check-square"></i> Verify OTP</label><br>

            <form id="verifyOTP">
              <div class="w3-col l8 w3-padding-right w3-margin-bottom">
                <input type="hidden" name="otp_email" value="<?php echo $userDetails['email']; ?>" id="otp_email" class="w3-input">
                <input type="text" name="user_otp" pattern="[0-9]{6}" oninvalid="this.setCustomValidity('Invalid OTP Pattern')" oninput="setCustomValidity('')" maxlength="6" placeholder="Enter OTP here..." id="user_otp" class="w3-input" required>
              </div>
              <div class="w3-col l4"  id="verifyOTP_btn">
                <button type="submit" class="w3-button w3-red">Verify OTP</button>
              </div>
            </form>            
          </div>
          <div class="w3-col l6 w3-small w3-padding-small">
            <label></label><br>
            <?php 
            $msg='';
            if($userDetails['email_verified']==1){
              $msg='<span class="w3-text-green w3-padding-small w3-round-large"><i class="fa fa-check-circle"></i> Email-ID has been Verified.</span>';
            }
            elseif($userDetails['email_verified']==0){
              $msg='<span class="w3-text-red w3-padding-small w3-round-large"><i class="fa fa-remove"></i> Email-ID is not Verified.</span>';
            }

            echo '<label>'.$msg.'</label>';
            ?>
                    
          </div>
        </div>
      </div>
    </div>
    <!-- End page content -->
  </div>

  <!--  script to send OTP to email id   -->
  <script>
    $(function(){
     $("#verifyEmail").submit(function(){
       dataString = $("#verifyEmail").serialize();
       $("#verifyEmail_btn").html('<span class="w3-large fa fa-spinner fa-spin"></span> Sending OTP...');
       $.ajax({
         type: "POST",
         url: "<?php echo base_url(); ?>user/user_settings/verifyEmail",
         data: dataString,
       return: false,  //stop the actual form post !important!

       success: function(data)
       {
        $("#verifyEmail_btn").html('<button type="submit" class="w3-button w3-red">Verify Email-ID</button>');
         $.alert(data);                       
       }

     });

         return false;  //stop the actual form post !important!

       });
   });
 </script>
 <!-- script ends here -->

 <!--  script to verify OTP to email id   -->
  <script>
    $(function(){
     $("#verifyOTP").submit(function(){
       dataString = $("#verifyOTP").serialize();
       $("#verifyOTP_btn").html('<span class="w3-large fa fa-spinner fa-spin"></span> Verifying OTP...');
       $.ajax({
         type: "POST",
         url: "<?php echo base_url(); ?>user/user_settings/verifyOTP",
         data: dataString,
       return: false,  //stop the actual form post !important!

       success: function(data)
       {
        $("#verifyOTP_btn").html('<button type="submit" class="w3-button w3-red">Verify OTP</button>');
         $.alert(data);                       
       }

     });

         return false;  //stop the actual form post !important!

       });
   });
 </script>
 <!-- script ends here -->
</body>
</html>
