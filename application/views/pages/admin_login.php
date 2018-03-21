<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Login</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert/jquery-confirm.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/header/header_overlay.css">

        <!-- Material Design Bootstrap -->
       <!--   <link href="<?php echo base_url() ?>css/home_page/css/mdb.css" rel="stylesheet">
        -->  <link href="<?php echo base_url() ?>css/home_page/css/style.css" rel="stylesheet">
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

            .btn-register {
                background-color: #1CB94E;
                outline: none;
                color: #fff;
                font-size: 14px;
                height: auto;
                font-weight: normal;
                padding: 14px 0;
                text-transform: uppercase;
                border-color: #1CB94A;
            }
            .btn-register:hover,
            .btn-register:focus {
                color: #fff;
                background-color: #1fbea9;
                border-color: #1fbea9;
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
        <a href="<?php echo base_url(); ?>" class="btn w3-margin "><i class="fa fa-arrow-left"></i> Goto <u class="w3-text-blue">ordertracker</u> website</a>
        <div class="w3-middle" id="spinnerDiv"></div>
        <div class="container" id="mainBody" style="margin-top: 71px;margin-bottom: 71px;">
            <div class="row">
                <div class="w3-col m4 col-md-offset-4 w3-center" id="messageDiv"></div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-login">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12" id="Login_RegisterDiv">
                                  <div class="w3-col l12 " id="login_err"></div>
                                    <form id="Adminlogin_form" role="form" method='post' enctype='multipart/form-data' style="display: block;">
                                        <center><img class="img img-responsive" title="Ijarline- Administrator Login" src="<?php echo base_url(); ?>css/logos/admin.png" width="100px" height="auto"></center>
                                        <div class="form-group w3-margin-top">
                                            <input type="text" name="login_username" id="login_username" tabindex="2" class="form-control" placeholder="Admin Username" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="login_password" id="login_password" tabindex="3" class="form-control" placeholder="Admin Password" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="submit" name="admin_login_submit" id="admin_login_submit" tabindex="5" class="form-control btn btn-login bluishGreen_bg" value="Log In">
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
        <div class="w3-center">       
<!--     <span class="w3-medium">© Copyright and All Rights reserved</span><br>
-->    <span class="w3-medium">© Powered by <a class="w3-text-blue" href="#" target="_blank">HQ Mobiles</a> </span>
</div>
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
    </body>
</html>





