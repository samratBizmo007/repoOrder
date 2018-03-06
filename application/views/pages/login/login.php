<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
error_reporting(E_ERROR | E_PARSE);
$disable_free='';
$hide_option_free='';
$disable_freeEmployer='';
$hide_option_freeEmployer='';
$disable_jseeker='';
$hide_option_jseeker='';
$disable_jemployer='';
$hide_option_jemployer='';

extract($_GET);
switch ($profile) {
	case '1':
	$disable_free='';
	$hide_option_free='';
	$disable_freeEmployer='disabled';
	$hide_option_freeEmployer='w3-hide';
	$disable_jseeker='disabled';
	$hide_option_jseeker='w3-hide';
	$disable_jemployer='disabled';
	$hide_option_jemployer='w3-hide';
	break;

	case '2':
	$disable_free='disabled';
	$hide_option_free='w3-hide';
	$disable_freeEmployer='';
	$hide_option_freeEmployer='';
	$disable_jseeker='disabled';
	$hide_option_jseeker='w3-hide';
	$disable_jemployer='disabled';
	$hide_option_jemployer='w3-hide';
	break;

	case '3':
	$disable_free='disabled';
	$hide_option_free='w3-hide';
	$disable_freeEmployer='disabled';
	$hide_option_freeEmployer='w3-hide';
	$disable_jseeker='';
	$hide_option_jseeker='';
	$disable_jemployer='disabled';
	$hide_option_jemployer='w3-hide';
	break;

	case '4':
	$disable_free='disabled';
	$hide_option_free='w3-hide';
	$disable_freeEmployer='disabled';
	$hide_option_freeEmployer='w3-hide';
	$disable_jseeker='disabled';
	$hide_option_jseeker='w3-hide';
	$disable_jemployer='';
	$hide_option_jemployer='';
	break;
	
	default:
	$disable_free='';
	$hide_option_free='';
	$disable_freeEmployer='';
	$hide_option_freeEmployer='';
	$disable_jseeker='';
	$hide_option_jseeker='';
	$disable_jemployer='';
	$hide_option_jemployer='';
	break;
}

if((isset($_GET['payload'])=='ApplyJob') && ($_GET['payload'] !='') && ($_GET['value'] !='')){
	$disable='disabled';
	$hide_option='w3-hide';
}
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

	<script type="text/javascript" src="<?php echo base_url(); ?>css/alert/jquery-confirm.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>css/js/const.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>css/js/login/login.js"></script>
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
		padding: 14px 0;
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
	<div class="w3-middle" id="spinnerDiv"></div>

	<div class="container" id="mainBody" style="margin-top: 71px;margin-bottom: 71px;">
		<div class="row">
			<div class="w3-col m4 col-md-offset-4 w3-center" id="messageDiv"></div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-4 w3-card-2">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="w3-col l12 w3-margin w3-left" id="message_div">
							<?php 
							if(isset($status)!=''){
								if($status==200){
									echo '<center><label class="w3-green w3-padding-small w3-round"><i class="fa fa-check "></i>  '.$status_message.'.</label></center>';
								}
								else{
									echo '<center><label class="w3-red w3-padding-small w3-round"><i class="fa fa-warning "></i>  '.$status_message.'.</label></center>';
								}
							}
							?>
							
						</div>
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
								<form id="login_form" role="form" method='post' enctype='multipart/form-data' style="display: block;">
									<div class="w3-col l12 " id="login_err"></div>
									<div class="form-group"><?php echo $cookie_profile;?>
										<select name="login_profile_type" id="login_profile_type" tabindex="1" class="form-control">
											<option class="w3-light-grey" selected <?php if($this->uri->segment(2)=='') echo 'selected'; ?> value="0">Select profile type</option>
											<option class="<?php echo $hide_option_free; ?>" value="1" <?php if($_COOKIE['cookie_profile']=='1'){echo "selected"; }  if($this->input->get('profile', TRUE)==1) echo 'selected'; echo $disable_free;?>>Freelancer</option>
											<option class="<?php echo $hide_option_freeEmployer; ?>" value="2" <?php if($_COOKIE['cookie_profile']==2){echo "selected"; } if($this->input->get('profile', TRUE)==2) echo 'selected'; echo $disable_freeEmployer; ?>>Freelance Employer</option>
											<option class="<?php echo $hide_option_jseeker; ?>" value="3" <?php if($_COOKIE['cookie_profile']==3){echo "selected"; } if($this->input->get('profile', TRUE)==3) echo 'selected'; echo $disable_jseeker; ?>>Job Seeker</option>
											<option class="<?php echo $hide_option_jemployer; ?>" value="4" <?php if($_COOKIE['cookie_profile']==4){echo "selected"; } if($this->input->get('profile', TRUE)==4) echo 'selected'; echo $disable_jemployer; ?>>Job Employer</option>
										</select>
									</div>
									<div class="form-group">
									
										<input type="text" name="login_username" id="login_username" tabindex="2" class="form-control" placeholder="Username" value="<?php
echo $_COOKIE['cookie_uname']; ?>" required>
									</div>
									<div class="form-group">
										<input type="password" name="login_password" id="login_password" tabindex="3" class="form-control" placeholder="Password" value="<?php
 ?>" required>
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="4" class="" name="login_remember"  id="login_remember">
										<label for="remember" style="margin-bottom: -5px"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login_login_submit" id="login_login_submit" tabindex="5" class="form-control btn btn-login bluishGreen_bg" value="Log In">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="#" tabindex="5" id="forget_link" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
								<form id="forget_password" action="" method="post" role="form" style="display: none;">
									<div class="form-group">
										<select name="forget_profile_type" id="forget_profile_type" tabindex="1" class="form-control">
											<option class="w3-light-grey" selected value="0">Select profile type</option>
											<option class="" value="1">Freelancer</option>
											<option class="" value="2">Freelance Employer</option>
											<option class="" value="3">Job Seeker</option>
											<option class="" value="4">Job Employer</option>
										</select>
									</div>
									<div class="form-group">
										<input type="email" name="forget_email" id="femail" tabindex="1" class="form-control" placeholder="Enter your Email Address" value="" required>
									</div>
									<div class="col-sm-6 col-sm-offset-3">
										<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn bluishGreen_bg" value="Submit">
									</div>
								</form>
								<form id="register_form" role="form" method='post' enctype='multipart/form-data' style="display: none;">
									<div class="w3-col l12 " id="registration_err"></div>
									<div class="form-group">
										<select name="register_profile_type" id="register_profile_type" tabindex="1" class="form-control">
											<option class="w3-light-grey" selected <?php if($this->uri->segment(2)=='') echo 'selected'; ?> value="0">Select profile type</option>
											<option value="1" <?php if($this->input->get('profile', TRUE)==1) echo 'selected'; ?>>Freelancer</option>
											<option value="2" <?php if($this->input->get('profile', TRUE)==2) echo 'selected'; ?>>Freelance Employer</option>
											<option value="3" <?php if($this->input->get('profile', TRUE)==3) echo 'selected'; ?>>Job Seeker</option>
											<option value="4" <?php if($this->input->get('profile', TRUE)==4) echo 'selected'; ?>>Job Employer</option>
										</select>
									</div>
									<div class="form-group">
										<input type="text" name="register_username" id="register_username" tabindex="2" class="form-control" placeholder="Username" value="" required>
									</div>
									<div class="form-group">
										<input type="email" name="register_email" id="register_email" tabindex="4" class="form-control" placeholder="Email address" required>
									</div>
									<div class="form-group">
										<input type="password" onkeyup="checkPassword();" name="register_password" id="register_password" tabindex="4" class="form-control" placeholder="Password" minlength="8" required>
									</div>
									<div class="form-group">
										<input type="password" name="register_confirm_password" id="register_confirm_password" tabindex="5" onkeyup="checkPassword();" class="form-control" minlength="8" placeholder="Confirm Password" required>
									</div>
									<div id="message"></div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register_register_submit" id="register_register_submit" tabindex="5" class="form-control  btn btn-register bluishGreen_bg" value="Register Now">
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
		$(function() {
			$('#login_form-link').click(function(e) {
				$("#login_form").delay(100).fadeIn(100);
				$("#register_form").fadeOut(100);
				$("#forget_password").fadeOut(100);
				//$('#mainBody').load(location.href + " #mainBody>*", ""); 
				$('#login_form-link').html('<i class="fa fa-unlock-alt"></i> Login');
				//window.location.reload();
				$('#register_form-link').removeClass('active');
				$(this).addClass('active');
				e.preventDefault();
			});
			$('#register_form-link').click(function(e) {
				$("#register_form").delay(100).fadeIn(100);
				$("#login_form").fadeOut(100);
				$("#forget_password").fadeOut(100);
				$('#login_form-link').removeClass('active');
				$(this).addClass('active');
				e.preventDefault();
			});
			$('#forget_link').click(function(e) {
				$("#forget_password").delay(100).fadeIn(100);
				$("#login_form").fadeOut(100);
				$('#login_form-link').html('<i class="fa fa-unlock"></i> Forget Password');
				$('#register_form-link').html('');
				$('#login_form-link').removeClass('active');
				$(this).addClass('active');
				e.preventDefault();
			});
		});

	</script>
	<script>
		$(function () {
			$("#forget_password").submit(function (e) {
				e.preventDefault();
				dataString = $("#forget_password").serialize();

				$("#spinnerDiv").html('<center><img width="70%" height="auto" src="'+BASE_URL+'css/logos/reg.gif"/></center>');
				$.ajax({
					type: "POST",
					url: BASE_URL+"auth/login/get_forget_password",
					dataType : 'text',
					data: dataString,
	            return: false, //stop the actual form post !important!
	            success: function (data)
	            {
	            	//alert(data);
	            	var key=JSON.parse(data);
	            	if(key.status == 200){                    
	            		$('#Login_RegisterDiv').load(location.href + " #Login_RegisterDiv>*", ""); 
	            		$('#login_form-link').html('<i class="fa fa-unlock-alt"></i> Login');
	            		$("#spinnerDiv").html('');
	            		$("#messageDiv").html('<div class="alert alert-success" style="margin-bottom:5px"><strong>'+key.status_message+'</strong></div><div class="col-lg-12 alert alert-info alert-dismissable fade in"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a><span><strong><i class="fa fa-warning"></i></strong>Please Check your Email... We have sent your password on your Registered Email-ID..!</span></div>');
	            		window.setTimeout(
	            			function(){
	            				location.reload(true)
	            			},
	            			3000
	            			);

	            	}else{ 
	            		$("#spinnerDiv").html('');               
	            		$("#messageDiv").html('<div class="alert alert-danger" style="margin-bottom:5px"><strong>'+key.status_message+'</strong></div>');
	            	}
	            }
	        });
	        return false;  //stop the actual form post !important!
	    });
		});
	</script>
</body>
</html>





