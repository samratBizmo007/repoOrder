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
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,700,900" rel="stylesheet">
    <style>
    body {
        font-family: 'Roboto', sans-serif;
    }
</style>

    <!-- Material Design Bootstrap -->
    <link href="<?php echo base_url() ?>css/home_page/css/style.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>css/alert/jquery-confirm.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>css/js/const.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>css/js/login/login.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>css/js/loadingoverlay.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>css/js/loadingoverlay_progress.min.js"></script>

   <div class="container" id="mainBody" style="margin-top: 71px;margin-bottom: 71px;">
    <div class="row">
        <div class="w3-col m4 col-md-offset-4 w3-center" id="messageDiv"></div>
    </div>
    <div class="row">
        <div class="col-lg-4 w3-hide-small"></div>
        <div class="col-lg-4 ">
            
            <!-- LOGIN DIV -->
            <div class="col-lg-12 w3-card-2 w3-margin-bottom"> 
                <div class="w3-padding " style="margin-top: 30px">
                    <div class="row  w3-xlarge w3-padding-small">
                        <center>JUMLA BUSINESS</center>
                    </div>
                </div>
                <div class="w3-container " style="padding:0 36px 12px 36px">
                    <div id="Login_RegisterDiv">

                    <form id="forget_password">
                                        <div class="w3-col l12 " id="fpasswd_err"></div>
                                        <div class="form-group">
                                            <input type="email" name="forget_email" id="forget_email" class="form-control" placeholder="Enter your registered Email ID" value="" required>
                                        </div>
                                        <div class="w3-col l12">                                
                               <center>
                                   <button type="submit" name="forget_submit" id="forget_submit" class=" w3-center btn w3-blue" >GET PASSWORD</button>
                               </center>
                           </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-12 w3-margin-top">

                                                    <div class="text-center">
                                                        <a href="<?php echo base_url(); ?>login" class="btn w3-small w3-text-blue w3-hover-text-grey" class="forgot-password"><i class="fa fa-arrow-left"></i> Go to Login Page.</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            </form>

                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $("#forget_password").submit(function (e) {
            e.preventDefault();
            dataString = $("#forget_password").serialize();

            $.LoadingOverlay("show");
            $.ajax({
                type: "POST",
                url: BASE_URL+"user/forget_password/getPassword",
                dataType : 'text',
                data: dataString,
                return: false, //stop the actual form post !important!
                success: function (data)
                {
                    $.LoadingOverlay("hide");
                    if(navigator.userAgent.match(/(iPod|iPhone|iPad|Android)/)) {           
                        $("html,body").animate({scrollTop:0},"slow");
                        document.scrollingElement.scrollTop;
                    } else {
                       $("html,body").animate({scrollTop:0},"slow");
                   }
                   $("#fpasswd_err").html(data);
               }
           });
            return false;  //stop the actual form post !important!
        });
    });
</script>




