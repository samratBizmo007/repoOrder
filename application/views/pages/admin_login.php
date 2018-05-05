<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>JUMLA BIZ-Admin Login</title>
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
   </style>
</head>
<body class="" >
	<div class="row w3-light-grey w3-xxxlarge w3-padding-small">
		<center>JUMLA BUSINESS</center>
	</div>
	<a href="<?php echo base_url(); ?>" class="btn w3-margin "><i class="fa fa-arrow-left"></i> Goto <u class="w3-text-blue">Jumla Business</u> website</a>
	<div class="w3-middle" id="spinnerDiv"></div>

	<div class="container" id="mainBody" style="margin-top: 71px;margin-bottom: 71px;">
		<div class="row">
			<div class="w3-col m4 col-md-offset-4 w3-center" id="messageDiv"></div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-login w3-padding-large w3-card-2">
					<div class="panel-heading">
						<div class="w3-col l12 w3-margin w3-left" id="message_div">
						</div>
						<center><img class="img img-responsive w3-padding-bottom" title="JumlaKuwait- Administrator Login" src="<?php echo base_url(); ?>css/logos/admin.png" style="margin-bottom: 10px;" width="100px" height="auto"></center>
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login_form-link"><i class="fa fa-unlock-alt"></i> Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register_form-link"><i class="fa fa-sign-in"></i> Register</a>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12" id="Login_RegisterDiv">
								<form id="Adminlogin_form" style="display: block;">
									<div class="w3-col l12 " id="login_err"></div>
									<div class="form-group">
										<select name="user_role" id="user_role" class="w3-input w3-border">
											<option class="w3-light-grey" value="0">Select Your Role</option>
											<option value="1">Super Admin</option>
											<option value="2">Admin</option>
											<option value="3">Wholesaler</option>
										</select>
									</div>

									<div class="form-group w3-margin-top">
										<input type="text" name="login_username" id="login_username" class="w3-input w3-border" placeholder="Admin Username" required>
									</div>
									<div class="form-group">
										<input type="password" name="login_password" id="login_password" class="w3-input w3-border" placeholder="Admin Password" required>
									</div>
									<div class="form-group">
										<div class="row w3-center">
											<button type="submit" class="w3-button w3-black w3-hover-blue w3-margin-bottom" name="admin_login_submit" id="admin_login_submit"><i class="fa fa-sign-in"></i> Login</button>
										</div>
									</div>
								</form>
								<form id="admin_register_form" role="form" method='post' enctype='multipart/form-data' style="display: none;">
									<div class="w3-col l12 " id="registration_err"></div>
									<div class="form-group">
										<select name="user_role" id="register_profile_type" class="w3-input w3-border">
											<option class="w3-light-grey" selected <?php if($this->uri->segment(2)=='') echo 'selected'; ?> value="0">Select Your Role</option>
											<option value="2">Admin</option>
											<option value="3">Wholesaler</option>
										</select>
									</div>
									<div class="form-group">
										<input type="text" name="register_username" id="register_username" class="w3-input w3-border" placeholder="Username" value="" required>
									</div>
									<div class="form-group">
										<input type="email" name="register_email" id="register_email" class="w3-input w3-border" placeholder="Email address" required>
									</div>
									<div class="form-group">
										<input type="number" name="mob_number" id="mob_number" class="w3-input w3-border" placeholder="Mobile Number" required>
									</div>
									
									<div id="message"></div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<button type="submit" class="w3-button w3-black w3-hover-blue w3-margin-bottom" name="register_register_submit" id="register_register_submit"><i class="fa fa-sign-out"></i> Register User</button>
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
	<script>
		$(function () {
			$('#login_form-link').click(function (e) {
				$("#Adminlogin_form").delay(100).fadeIn(100);
				$("#admin_register_form").fadeOut(100);
                    //$("#forget_password").fadeOut(100);
                    //$('#mainBody').load(location.href + " #mainBody>*", ""); 
                    $('#login_form-link').html('<i class="fa fa-unlock-alt"></i> Login');
                    //window.location.reload();
                    $('#register_form-link').removeClass('active');
                    $(this).addClass('active');
                    e.preventDefault();
                });
			$('#register_form-link').click(function (e) {
				$("#admin_register_form").delay(100).fadeIn(100);
				$("#Adminlogin_form").fadeOut(100);
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





