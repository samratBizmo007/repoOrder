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

</style>

</head>
<body class="" >
	<?php
	if (isset($status) != '') {
		if ($status == 200) {
			echo '<center><label class="w3-green w3-padding-small w3-round"><i class="fa fa-check "></i>  ' . $status_message . '.</label></center>';
		} else {
			echo '<center><label class="w3-red w3-padding-small w3-round"><i class="fa fa-warning "></i>  ' . $status_message . '.</label></center>';
		}
	}
	?>

</div>

</div>

<div class="w3-middle" id="spinnerDiv"></div>
<div class="container" id="mainBody" style="margin-top: 71px;margin-bottom: 71px;">
	<div class="row">
		<div class="w3-col m4 col-md-offset-4 w3-center" id="messageDiv"></div>
	</div>
	<div class="row">
		<div class="col-lg-4 w3-hide-small"></div>
		<div class="col-lg-4 ">
			<!-- SKIP SIGNIN DIV -->
			<div class="col-lg-12 w3-card-2 w3-padding-top w3-margin-bottom" style="height:50px;">
				<p class="text-center text-muted w3-medium">
					<a href="<?php echo base_url(); ?>user/feeds" class="w3-text-blue"> Skip Log In <i class="fa fa-chevron-circle-right"></i></a>
				</p>
			</div>
			<!-- SKIP SIGN IN DIV ENDS -->

			<!-- LOGIN DIV -->
			<div class="col-lg-12 w3-card-2 w3-margin-bottom"> 
				<div class="w3-padding " style="margin-top: 30px">
					<div class="row  w3-xlarge w3-padding-small">
						<center>JUMLA BUSINESS</center>
					</div>
				</div>
				<div class="w3-container " style="padding:0 36px 12px 36px">
					<div id="Login_RegisterDiv">

						<form id="login_form" role="form" method='post' enctype='multipart/form-data' style="">
							<div class="w3-col l12 " id="login_err"></div>
							<div id = "registerDiv">
								<div class="w3-margin-bottom w3-col l12 s12"> 

								</div>
								<div id="2" class="jumla_role  w3-col l12 s12">
									<div class="w3-margin-bottom">
										<input type="text" name="login_username" id="login_username" tabindex="2" class="w3-input w3-border w3-light-grey" placeholder="Username or Email Id" value="<?php echo $_COOKIE['jumla_uname']; ?>" required>
									</div>

									<div class="w3-margin-bottom">
										<input type="password" name="login_password" id="login_password" class="w3-input w3-border w3-light-grey" value="<?php echo $_COOKIE['jumla_pass']; ?>" placeholder="Password" required>
									</div>

								</div>

								<div class="w3-margin-bottom" style="">
									<input type="submit" name="register_register_submit" id="register_register_submit" class="form-control btn btn-register w3-blue" value="Log In">
								</div>

								<p class="w3-center"> OR </p>
								<p class="text-center text-muted">
									<button type="button" class="btn btn-block w3-blue"><i class=" w3-large fa fa-facebook-square" style="color:#ffffff;"></i> Log in with Facebook</button>
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
				</div>
			</div>

			<!-- LOGIN DIV ENDS -->

			<!-- REGISTER DIV -->
			<div class="col-lg-12 w3-card-2 w3-padding-top w3-medium" style="height:50px;">
				<p class="text-center text-muted">
					Don't Have an Account?<a href="<?php echo base_url(); ?>registration" class="w3-text-blue"> Sign In</a>
				</p>
			</div>
			<!-- REGISTER DIV ENDS -->

		</div>

	</div>

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
-->    
<span class="w3-medium">© Powered by <a class="w3-text-blue" href="#" target="_blank">HQ Mobiles</a> </span><br>
<span class="w3-medium">Checkout our <a class="w3-text-blue" href="<?php echo base_url(); ?>privacy_terms">Terms & Privacy Policy</a>! </span>

</div>

</body>
</html>





