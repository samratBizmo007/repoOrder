<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ERROR | E_PARSE);

?>
<!DOCTYPE html>
<html >
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Post Project</title>

	<!-- Bootstrap -->
	<link href="<?php echo base_url(); ?>css/freelancer.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/normalize.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/alert/jquery-confirm.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/stylesheet.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>css/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>css/js/const.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>css/js/selectize.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>css/js/index.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>css/alert/jquery-confirm.js"></script>

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
</style>
</head>
<body>

	<div id="session_values">
		<?php 
		//start session		
		$user_id=$this->session->userdata('user_id');
		$profile_type=$this->session->userdata('profile_type');

		?>
		<input type="hidden" id="userValue" value="<?php echo $user_id; ?>">
		<input type="hidden" id="profileValue" value="<?php echo $profile_type; ?>">
	</div>

	<!-- 
	|																										 |
	||||||||||||||||||||||||||||||||||||||||||LOGIN/REGISTER FORM STARTS HERE|||||||||||||||||||||||||||||||||||
	|																										 |	
-->
<div class="w3-container" id="loginDiv_beforeLogin" style="display: none;">
	<div class="w3-topmiddle" id="spinnerDiv"></div>

	<div class="container" id="mainBody" style="margin-top: 71px;margin-bottom: 71px;width: 100%">
		<div class="row">
			<div class="w3-col m4 col-md-offset-4 w3-center" id="messageDiv">
				<div class="alert alert-warning w3-medium">
					<strong><i class="fa fa-warning"></i> You need to login/register to proceed further</strong> 
				</div>	
			</div>
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
								<a href="#" class="active" id="login_form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register_form-link">Register</a>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12" id="Login_RegisterDiv">
								<form id="login_form" role="form" style="display: block;">
									<div class="w3-col l12 " id="login_err"></div>
									<div class="form-group">
										<select name="login_profile_type" id="login_profile_type" tabindex="1" class="form-control">
											<option class="w3-light-grey" selected <?php if($this->uri->segment(2)=='') echo 'selected'; ?> value="0">Select profile type</option>
											<option value="2" selected>Freelance Employer</option>
										</select>
									</div>
									<div class="form-group">
										<input type="text" name="login_username" id="login_username" tabindex="2" class="form-control" placeholder="Username" value="" required>
									</div>
									<div class="form-group">
										<input type="password" name="login_password" id="login_password" tabindex="3" class="form-control" placeholder="Password" required>
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="4" class="" name="login_remember" id="login_remember">
										<label for="remember"> Remember Me</label>
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
											<option class="w3-light-grey" value="0">Select profile type</option>
											<option class="" value="2" selected>Freelance Employer</option>
										</select>
									</div>
									<div class="form-group">
										<input type="email" name="forget_email" id="femail" tabindex="1" class="form-control" placeholder="Enter your Email Address" value="" required>
									</div>
									<div class="col-sm-6 col-sm-offset-3">
										<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn bluishGreen_bg" value="Submit">
									</div>
								</form>

								<form id="register_form" role="form" style="display: none;">
									<div class="w3-col l12 " id="registration_err"></div>
									<div class="form-group">
										<select name="register_profile_type" id="register_profile_type" tabindex="1" class="form-control" required>
											<option class="w3-light-grey" selected <?php if($this->uri->segment(2)=='') echo 'selected'; ?> value="0">Select profile type</option>
											<option value="2" selected>Freelance Employer</option>

											<!-- <option class="w3-light-grey" selected <?php if($this->uri->segment(2)=='') echo 'selected'; ?> value="0">Select profile type</option>
											<option value="1" <?php if($this->input->get('profile', TRUE)==1) echo 'selected'; ?>>Freelancer</option>
											<option value="2" <?php if($this->input->get('profile', TRUE)==2) echo 'selected'; ?>>Freelance Employer</option>
											<option value="3" <?php if($this->input->get('profile', TRUE)==3) echo 'selected'; ?>>Job Seeker</option>
											<option value="4" <?php if($this->input->get('profile', TRUE)==4) echo 'selected'; ?>>Job Employer</option> -->
										</select>
									</div>
									<div class="form-group">
										<input type="text" name="register_username" id="register_username" tabindex="2" class="form-control" placeholder="Username" value="" required>
									</div>
									<div class="form-group">
										<input type="email" name="register_email" id="register_email" tabindex="4" class="form-control" placeholder="Email address" required>
									</div>
									<div class="form-group">
										<input type="password" name="register_password" onkeyup="checkPassword();" id="register_password" tabindex="4" class="form-control" placeholder="Password" minlength="8" required>
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
				$('#login_form-link').html('<i class="fa fa-unlock-alt"></i> Login');
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
	            	
	            	$("#spinnerDiv").html('');
	            	if(key.status == 200){                    
	            		
	            		$('#Login_RegisterDiv').load(location.href + " #Login_RegisterDiv>*", ""); 
	            		$('#login_form-link').html('<i class="fa fa-unlock-alt"></i> Login');
	            		$("#messageDiv").html('<div class="alert alert-success" style="margin-bottom:5px"><strong>'+key.status_message+'</strong></div><div class="col-lg-12 alert alert-info alert-dismissable fade in"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a><span><strong><i class="fa fa-warning"></i></strong>Please Check your Email... We have sent your password on your Registered Email-ID..!</span></div>');	            		

	            	}else{ 
	            		$("#messageDiv").html('<div class="alert alert-danger" style="margin-bottom:5px"><strong>'+key.status_message+'</strong></div>');
	            	}
	            }
	        });
	        return false;  //stop the actual form post !important!
	    });
		});
	</script>
	<script>
	//  -------------------REGISTER FORM------------------------ //
	$(function () {
		$("#register_form").submit(function () {
			dataString = $("#register_form").serialize();

			$("#spinnerDiv").html('<center><img width="70%" height="auto" src="'+BASE_URL+'css/logos/reg.gif"/></center>');
			$.ajax({
				type: "POST",
				url: BASE_URL + "auth/login/register_beforeSubmit",
				data: dataString,
            return: false, //stop the actual form post !important!
            success: function (data){  
            	//alert(data); 
            	var key=JSON.parse(data);
            	$("#spinnerDiv").html('');
            	if(key.status=='200'){
            		$("#session_values").load(location.href + " #session_values>*", "");
            		$("#postProject_div").show();
            		$("#loginDiv_beforeLogin").hide();
            	}else{
            		$("#message_div").html('<div class="alert alert-danger"><strong>'+key.status_message+'</strong></div>');
            	}
            }
        });
        return false;  //stop the actual form post !important!
    });
	});
//  --------------------END --------------------------------- //
</script>

<script>
	//  ------------------------LOGIN FORM -------------------------//
	$(function () {
		$("#login_form").submit(function (e) {
			dataString = $("#login_form").serialize();
			projectString = $("#post_project").serialize();
			e.preventDefault();
			$("#spinnerDiv").html('<center><img width="70%" height="auto" src="'+BASE_URL+'css/logos/reg.gif"/></center>');
			$.ajax({
				type: "POST",
				url: BASE_URL + "auth/login/login_beforeSubmit",
				data: dataString,
            return: false, //stop the actual form post !important!
            success: function (data)
            {
            	var key=JSON.parse(data);
            	$("#spinnerDiv").html('');
            	if(key.status=='200'){
            		var formData = new FormData($('#post_project')[0]);
            		formData.append('jm_project_file', $('input[type=file]')[0].files[0]);

            		$.ajax({
            			type: "POST",
            			url: BASE_URL+"project/post_project_Controller/get_allproject",
            			data:  formData,
            			contentType: false,
            			cache: false,
            			processData:false,
            			success: function (data){
            				$.alert(data);
            			}
            		});
            		// $("#session_values").load(location.href + " #session_values>*", "");
            		// $("#postProject_div").show();
            		// $("#loginDiv_beforeLogin").hide();
            	}
            	else{
            		$("#login_err").html('<div class="alert alert-danger"><strong>'+key.status_message+'</strong></div>');
            	}
            }
        });
        return false;  //stop the actual form post !important!
    });
	});
//  -------------------------END -------------------------------//

</script>
<script>
	//-------------------fucntion to check confirm password---------------
	function checkPassword() {
		if ($('#register_password').val() == $('#register_confirm_password').val()) {
			$('#register_register_submit').prop("disabled", false);
			$('#message').html('');

		} else {
			$('#message').html('<label>Password Not Matching</label>').css('color', 'red');
			$('#register_register_submit').prop("disabled", true);
		}
	}
//-----------function ends------------------------

</script>

</div>




	<!-- 
	|																										 |
	||||||||||||||||||||||||||||||||||||||||||POST PROJECT FORM STARTS HERE|||||||||||||||||||||||||||||||||||
	|																										 |	
-->
<div class="w3-container" id="postProject_div">
	<div class="col-lg-2"></div>
	<div class="w3-col l8">
		<div class="col-md-12">
			<form id="post_project" name="post_project" role="form" method="POST" class="form-horizontal" action="" enctype="multipart/form-data">

				<div class="col-md-12">
					<div class="form-group">   																			
						<h1>Tell us what you need done</h1>					
						<p class="quotes">Get free quotes from skilled freelancers within minutes, view profiles, rating and portfolios and chat with them.
						Pay the freelancer only when you are 100% satisfied with their work.</p>
					</div>
				</div>
				<div class="col-md-12">	
					<div class="form-group">
						<label class="project-legend">Choose a name for your project</label>															
						<span class="w3-text-red">*</span>
						<input type="text" name="jm_project_title" id="jm_project_title" class="form-control" placeholder="e.g. Build me a website" required>                 											
						<!--						<span class="help-block"></span>									-->
					</div>
				</div>

				<div class="col-md-12">
					<div class="form-group">
						<label class="project-legend">Tell us more about your project</label>
						<span class="w3-text-red">*</span>																
						<textarea name="jm_project_description" id="jm_project_description" rows="7" class="form-control" placeholder="Describe your project here..." required></textarea>                 											
						<!--						<span class="help-block"></span>									-->
					</div>
				</div>


				<div class ="col-md-12 w3-margin-top w3-padding" style="border:1px dashed ">

					<input  type="file" id="jm_project_file" name="jm_project_file">
				</div>

				<div class="col-lg-12 w3-margin-top">
					<div class="form-group">
						<label class="project-legend">How do you want to pay?</label>
						<span class="w3-text-red">*</span>

						<label class="container" style="padding-left:30px">Fixed price project
							<input  type="radio" class="checkmark" name="jm_project_type" checked="checked" value="Fixed_Price">
						</label>
						<label class="container" style="padding-left:30px">Hourly project
							<input  type="radio" id="jm_project_type" class="checkmark" value="Hourly" name="jm_project_type" required >
						</label>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label class="project-legend">Add skill for project</label>	
						<span class="w3-text-red">*</span>
						<select id="select-skill" name="skill[]" multiple class="demo-default " style="width:100%" placeholder="Select a skill..." required>
							<?php 
							foreach($all_skills['status_message'] as $row)
							{
							//print_r($row);die();
								?>	
								<option value=""><h1>Select skill...</h1></option>
								<option value="<?php echo $row['jm_skill_id'];?>"><?php echo $row['jm_skill_name'];?></option>

								<?php 
							}
							?>
						</select>
					</div>
					<script>
						$('#select-skill').selectize({
							maxItems: 8
						});
					</script>
				</div>

				<div class="w3-col l4 ">
					<label class="project-legend">What is your estimated Time?</label>
					<span class="w3-text-red">*</span>
					<select class="form-control" class="w3-margin-top" id="jm_time_estimation" name="jm_time_estimation" selected>
						<option value="1-2 Month">1-2 Month</option>
						<option value="2-3 Month">2-3 Month</option>
						<option value="3-6 Month">3-6 Month</option>
					</select>
				</div>

				<div class="w3-col l12 w3-margin-bottom">
					<div class="w3-col l12 w3-margin-top ">
						<label class="project-legend">What is your estimated budget?</label>
						<span class="w3-text-red">*</span>
					</div>
					<div class="w3-col l4 s4 w3-padding-right ">
						<select class="form-control" id="jm_project_price" name="jm_project_price" required>
							<option value="INR">INR</option>
						</select>
					</div>
					<div class="w3-col l8 s8 ">
						<select class="form-control" name="jm_projectbudget_type" id="jm_projectbudget_type" required>
							<option value="Micro Project(600-1500INR)">Micro Project(600-1500INR)</option>
							<option value="Simple Project(1500-12500INR)">Simple Project(1500-12500INR)</option>
							<option value="Very Small Project(12500-37500INR)">Very Small Project(12500-37500INR)</option>
							<option value="Small Project(37500-75000INR)">Small Project(37500-75000INR)</option>
							<option value="Micro Project(75000-150000INR)">Micro Project(75000-150000INR)</option>
							<option value="Large Project(150000-250000INR)">Large Project(150000-250000INR)</option>
							<option value="Huge Project(1000000-2500000INR)">Huge Project(1000000-2500000INR)</option>
						</select>
					</div>
				</div>
				<div class="col-md-12 w3-margin-top w3-center w3-margin-bottom ">	
					<div class="form-group">															
						<input type="submit" name="" class="btn btn-primary btn-md bluishGreen_bg" value="Post My Project">
					</div>
				</div>

			</form>								
		</div>
	</div>
	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-title" id="msg_header" name="msg_header"></div>
				</div>
				<div class="modal-body">
					<div id="addProducts_err" name="addProducts_err"></div>
				</div>
				<div class="modal-footer">
					<button type="button" onclick="window.location.reload();" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-2"></div>
</div>


<script>
	$(function () {
		$("#post_project").submit(function (e) {
			dataString = $("#post_project").serialize();
			e.preventDefault();
			var user_id=$('#userValue').val();
			var profile_id=$('#profileValue').val();

			$("#session_values").load(location.href + " #session_values>*", "");
			if(user_id=='' || profile_id==''){
				$("#postProject_div").hide();
				$("#loginDiv_beforeLogin").show();				
				$('html,body').animate({
					scrollTop: $("#loginDiv_beforeLogin").offset().top},
					'slow');
			}
			else{
				$.ajax({
					type: "POST",
					url: BASE_URL+"project/post_project_Controller/get_allproject",
					data:  new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success: function (data){
						$.alert(data);
					}
				});
			}
         return false;  //stop the actual form post !important!
     });
	});
</script>
<script>
	$('#input-tags').selectize({
		delimiter: ',',
		persist: false,
		create: function(input) {
			return {
				value: input,
				text: input
			}
		}
	});



// 	$(document).ready(function(){
// 		$("#msg_header").text('Message');
//                 $("#msg_span").css({'color': "black"});
//                 $("#addCustomers_err").html('project posted');
//                 $('#myModalnew').modal('show');
// });
</script>
</body>
</html>