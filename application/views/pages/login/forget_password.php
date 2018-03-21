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
    .panel-login {
        border-color: #ccc;
        -webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
        -moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
        box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
    }
    .panel-login>.panel-heading {
        color: #00415d;
        background-color: #fff;
        border-color: #fff;
        text-align:center;
    }
    .panel-login>.panel-heading a{
        text-decoration: none;
        color: #666;
        font-weight: bold;
        font-size: 15px;
        -webkit-transition: all 0.1s linear;
        -moz-transition: all 0.1s linear;
        transition: all 0.1s linear;
    }
    .panel-login>.panel-heading a.active{
        color: #029f5b;
        font-size: 18px;
    }
    .panel-login>.panel-heading hr{
        margin-top: 10px;
        margin-bottom: 0px;
        clear: both;
        border: 0;
        height: 1px;
        background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
        background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
        background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
        background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
    }
    .panel-login select,.panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
        height: 45px;
        border: 1px solid #ddd;
        font-size: 16px;
        -webkit-transition: all 0.1s linear;
        -moz-transition: all 0.1s linear;
        transition: all 0.1s linear;
    }
    .panel-login select:hover,.panel-login input:hover,
    .panel-login select:focus,.panel-login input:focus {
        outline:none;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
        border-color: #ccc;
    }
    .btn-login {
        background-color: #59B2E0;
        outline: none;
        color: #fff;
        font-size: 14px;
        height: auto;
        font-weight: normal;
        padding: 10px 0;
        text-transform: uppercase;
        border-color: #59B2E6;
    }
    .btn-login:hover,
    .btn-login:focus {
        color: #fff;
        background-color: #1fbea9;
        border-color: #1fbea9;
    }
    .forgot-password {
        text-decoration: underline;
        color: #888;
    }
    .forgot-password:hover,
    .forgot-password:focus {
        text-decoration: underline;
        color: #666;
    }

    @media only screen and (max-width: 377px) {
        input[type="text"] {
            /*width: 220px;*/
            /*margin-left: 0px;*/
        }
        input[type="password"] {
            /*width: 220px;*/
            /*margin-left: 0px;*/
        }
        input[type="email"] {
            /*width: 220px;*/
            /*margin-left: 0px;*/
        }
    }
</style>
</head>
<body class="" >
    <div class="row w3-light-grey w3-xxxlarge w3-padding-small">
        <center>JUMLA BUSINESS</center>
    </div>
    <div class="w3-middle" id="spinnerDiv"></div>

    <div class="container" id="mainBody" style="margin-top: 71px;margin-bottom: 71px;">
        <div class="row">
            <div class="w3-col m4 col-md-offset-4 w3-center" id="messageDiv"></div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-login">
                    <div class="panel-heading" id="heading_div">

                        <div class="row" id="">
                            <div class="w3-col l12 w3-left">
                                <a href="#" class="active"><i class="fa fa-question-circle"></i> Forget Password</a>
                            </div>
                            
                        </div>
                    </div>
                    <div class="panel-body" id="">
                        <div class="row">
                            <div class="col-lg-12" id="">
                                <div>
                                    <form id="forget_password">
                                        <div class="w3-col l12 " id="fpasswd_err"></div>
                                        <div class="form-group">
                                            <input type="email" name="forget_email" id="forget_email" class="form-control" placeholder="Enter your registered Email ID" value="" required>
                                        </div>
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="forget_submit" id="forget_submit" class="form-control btn bluishGreen_bg" value="Get Password">
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
        </div>
    </div>
    <div class="w3-center">       
<!--     <span class="w3-medium">© Copyright and All Rights reserved</span><br>
-->    <span class="w3-medium">© Powered by <a class="w3-text-blue" href="#" target="_blank">HQ Mobiles</a> </span>
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
                        $("html").animate({scrollTop:0},"slow");
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
</body>
</html>





