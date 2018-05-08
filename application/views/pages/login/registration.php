<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert/jquery-confirm.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/header/header_overlay.css">
    <!-- Material Design Bootstrap -->
    <link href="<?php echo base_url() ?>css/home_page/css/style.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>css/alert/jquery-confirm.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>css/js/const.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>css/js/login/login.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>css/js/loadingoverlay.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>css/js/loadingoverlay_progress.min.js"></script>
    
</head>
<body>
   <div class="w3-middle" id="spinnerDiv"></div>
   <div class="container" id="mainBody" style="margin-top: 71px;margin-bottom: 71px;">
    <div class="row">
        <div class="w3-col m4 col-md-offset-4 w3-center" id="messageDiv"></div>
    </div>
    <div class="row">
        <div class="col-lg-4 w3-hide-small"></div>
        <div class="col-lg-4 ">
            <div class="col-lg-12 w3-card-2"> 
               <div class="w3-padding " style="margin-top: 30px">
                <div class="row  w3-xlarge w3-padding-small">
                    <center>JUMLA BUSINESS</center>
                </div>

                <p class="text-center text-muted w3-padding-left w3-padding-right">
                   <button type="button" class="btn btn-block w3-blue"><i class=" w3-large fa fa-facebook-square" style="color:#ffffff;"></i> Log in with Facebook</button>
               </p>
               <p class="w3-center"> OR </p>


           </div>

           <div class="w3-container " style="padding:0 36px 12px 36px">
               <div id="Login_RegisterDiv">

                <form id="register_form" role="form" method='post' enctype='multipart/form-data' style="">
                    <div class="w3-col l12 " id="registration_err"></div>
                    <div id = "registerDiv">
                        <div class="w3-margin-bottom w3-col l12 s12"> 
                            <select name="user_role" id="user_role" class="w3-input w3-border w3-light-grey" required>
                                <option class="w3-red" selected>Select your role</option>
                                <option value="1">Consumer</option>
                                <option value="2">WholeSaler</option>
                            </select>
                        </div>
                        <div id="2" class="jumla_role  w3-col l12 s12">
                            <div class="w3-margin-bottom">
                                <input type="text" name="register_username" id="register_username"  class="w3-input w3-border w3-light-grey " placeholder="Username " value="" required>
                            </div>

                            <div class="w3-margin-bottom">
                                <input type="email" name="register_email" id="register_email" class="w3-input w3-border w3-light-grey" placeholder="Email address" required>
                            </div>

                            <div class="w3-col l12 w3-margin-bottom"  >
                                <div class="w3-col l4 s4" style=" padding-right: 5px;">
                                    <input type="text" name="mobile_code" id="mobile_code" value="965" class="w3-input w3-border w3-light-grey" pattern="[0-9]{3}" oninvalid="this.setCustomValidity('No whitespaces, Enter Only 3 Digit Country Code.')" oninput="setCustomValidity('')" placeholder="Code" required>
                                </div>
                                <div class="w3-col l8 s8">
                                    <input type="text" name="register_number" id="register_number" maxlength="10" class="w3-input  w3-light-grey w3-padding w3-border" placeholder="Enter Your Number" required>
                                </div>
                            </div>

                        </div>
                        <!-- hide this part for seller -->
                        <div id="1" class="w3-margin-bottom " style="display: none;">
                            <div class="w3-margin-bottom" style="">
                                <input type="password" onkeyup="checkPassword();" name="register_password" id="register_password" class="w3-input w3-border w3-light-grey " placeholder="Password" minlength="8" >
                            </div>
                            <div class="w3-margin-bottom" style="">
                                <input type="password" name="register_confirm_password" id="register_confirm_password" onkeyup="checkPassword();" class="w3-input w3-border w3-light-grey " minlength="8" placeholder="Confirm Password">
                            </div>
                            <div id="message"></div>
                        </div>
                        <div class="w3-margin-bottom" style="">
                         <input type="submit" name="register_register_submit" id="register_register_submit" class="form-control btn btn-register w3-blue" value="Sign In">
                     </div>

                 </div>

             </form>

         </div>
     </div>

 </div>

 <div class="col-lg-12 w3-card-2 w3-padding-top w3-margin-top" style="height:50px;">
   <p class="text-center text-muted">
     <i class=" w3-large "></i> 
     Have an Account?<a href="<?php echo base_url(); ?>login" class="w3-text-blue"> Log in</a>
 </p>
</div>
</div>


</div>

</div>
<!-- change as per role -->
<script>
// SELECT BOX DEPENDENCY CODE
$(document).ready(function()
{
 $(function() {
  $('#user_role').change(function(){
    // $('.jumla_role').hide();
    var val=$(this).val();
    if(val==1){
        $('#1').show();
    }
    else{
        $('#1').hide();
    }
    // $('#' + $(this).val()).show();
});
});
});
</script>


<script>
    $(function () {
        $('#login_form-link').click(function (e) {
            $("#login_form").delay(100).fadeIn(100);
            $("#register_form").fadeOut(100);
                    //$("#forget_password").fadeOut(100);
                    //$('#mainBody').load(location.href + " #mainBody>*", ""); 
                    $('#login_form-link').html('<i class="fa fa-unlock-alt"></i> Login');
                    //window.location.reload();
                    $('#register_form-link').removeClass('active');
                    $(this).addClass('active');
                    e.preventDefault();
                });
        $('#register_form-link').click(function (e) {
            $("#register_form").delay(100).fadeIn(100);
            $("#login_form").fadeOut(100);
                    //$("#forget_password").fadeOut(100);
                    $('#login_form-link').removeClass('active');
                    $(this).addClass('active');
                    e.preventDefault();
                });
        $('#forget_link').click(function (e) {
                    //$("#forget_password").delay(100).fadeIn(100);
                    $("#login_form").fadeOut(100);
                    $('#login_form-link').html('<i class="fa fa-unlock"></i> Forget Password');
                    $('#register_form-link').html('');
                    $('#login_form-link').removeClass('active');
                    $(this).addClass('active');
                    e.preventDefault();
                });
    });

</script>