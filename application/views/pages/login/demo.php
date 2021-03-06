<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ERROR | E_PARSE);
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
    <style>
    .input-1,
.input-2 {
  width: 80%;
  /*border: 1px solid #dbdbdb;*/
  /*box-sizing: border-box;*/
  /*border-radius: 3px;*/
}

</style>
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
                  <!-- <select id="role" name="role" class="form-control w3-margin-bottom" required>
                    <option class="w3-red" selected>Select your role</option>
                    <option value="Cashier">Consumer</option>
                    <option value="Customer">WholeSeller</option>
                 </select> -->
              </div>
                        <div id='Login_RegisterDiv'>
                                    <form id="login_form" role="form" method='post' enctype='multipart/form-data' style="display: block;">
                                        <div class="w3-col l12 " id="login_err"></div>
                                        <div class="w3-margin-bottom" style="margin-left: 60px;"><?php ?>
                                            <input type="text" name="login_username" id="login_username" tabindex="2" class="w3-input w3-border w3-light-grey input-1" placeholder="Username or Email Id" value="<?php echo $_COOKIE['jumla_uname']; ?>" required>
                                        </div>
       
                                        <div class="w3-margin-bottom" style="margin-left: 60px;">
                                            <input type="password" name="login_password" id="login_password" class="w3-input w3-border input-2 w3-light-grey w3-padding" value="<?php echo $_COOKIE['jumla_pass']; ?>" placeholder="Password" required>
                                        </div>
                                         <div class="w3-margin-bottom" style="margin-left: 60px;width:65%">
                                             <input type="submit" name="login_login_submit" id="login_login_submit" class="form-control btn btn-login w3-blue" value="Log In">
                                        </div>
                                        
                                        <p class="w3-center"> OR </p>
                                          <p class="text-center text-muted">
                                           <i class=" w3-large fa fa-facebook-square" style="color:#3F5271;"></i> Log in with Facebook
                                         </p>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="text-center">
                                                        <a href="<?php echo base_url(); ?>user/forget_password" class="btn w3-small w3-text-black w3-hover-text-grey" class="forgot-password">Forgot Password?</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>

                            </div>
                            <div class="col-lg-12 w3-card-2 w3-padding-top w3-margin-top" style="height:50px;">
                                 <p class="text-center text-muted">
                                           <i class=" w3-large "></i> 
                                           Don't Have an Account?<a hret="#" class="w3-text-blue"> Sign Up</a>
                                         </p>
                        </div>

        </div>
         
    </div>
     
</div>