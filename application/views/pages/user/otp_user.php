<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
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
<!--   <link href="<?php echo base_url() ?>css/home_page/css/mdb.css" rel="stylesheet">
 -->  <link href="<?php echo base_url() ?>css/home_page/css/style.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>css/alert/jquery-confirm.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>css/js/const.js"></script>
<!--	<script type="text/javascript" src="<?php echo base_url(); ?>css/js/login/login.js"></script>-->
<style>
body{
	font-family: calibri;
}
.tblLogin {
	border: #95bee6 1px solid;
    background: #d1e8ff;
    border-radius: 4px;
    max-width: 300px;
	padding:20px 30px 30px;
	text-align:center;
}
.tableheader { font-size: 20px; }
.tablerow { padding:20px; }
.error_message {
	color: #b12d2d;
    background: #ffb5b5;
    border: #c76969 1px solid;
}
.message {
	width: 100%;
    max-width: 300px;
    padding: 10px 30px;
    border-radius: 4px;
    margin-bottom: 5px;    
}
.login-input {
	border: #CCC 1px solid;
    padding: 10px 20px;
	border-radius:4px;
}
.btnSubmit {
	padding: 10px 20px;
    background: #2c7ac5;
    border: #d1e8ff 1px solid;
    color: #FFF;
	border-radius:4px;
}
</style>
</head>

<body class="" >
<div class="container" id="mainBody" style="margin-top: 71px;margin-bottom: 71px;">
		<div class="row">
			<div class="w3-col m4 col-md-offset-4 w3-center" id="messageDiv"></div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-login">
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12" id="">
							<form id="otp_form" name="otp_form" role="form" method='post' enctype='multipart/form-data' style="">
									<div class="w3-col l12 " id="otp_err"></div>
									<div class="w3-center">Enter OTP</div>
									<p style="color:#31ab00;">Check your email for the OTP</p>
									<div class="form-group">
										<input type="number" name="otp" id="otp" tabindex="2" class="form-control" placeholder="Enter otp" value="" required>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="otp_submit" id="otp_submit" tabindex="5" class="form-control  btn btn-register bluishGreen_bg" value="Submit">
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
	    $("#otp_form").submit(function () {
	        dataString = $("#otp_form").serialize();
				//alert(dataString)
	        $("#spinnerDiv").html('<center><img width="70%" height="auto" src="'+BASE_URL+'css/logos/reg.gif"/></center>');
	        $.ajax({
	            type: "POST",
	            url: BASE_URL + "login/verify_otp",
	            data: dataString,
	            return: false, //stop the actual form post !important!
	            success: function (data)
	            {
	                $("#spinnerDiv").html('');
	                $("#otp_err").html(data);
	            }
	        });
	        return false;  //stop the actual form post !important!
	    });
	});
	</script>
	</body>
</html>
