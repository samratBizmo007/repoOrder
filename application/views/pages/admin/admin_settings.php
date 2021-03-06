<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
// error_reporting(E_ERROR | E_PARSE);
$admin_name=$this->session->userdata('admin_name');
$admin_role=$this->session->userdata('admin_role');
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Settings</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/alert/jquery-confirm.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,700,900" rel="stylesheet">
	<style>
	body {
		font-family: 'Roboto', sans-serif;
	}
</style>
<script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>css/alert/jquery-confirm.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>css/js/admin/admin_settings.js"></script>
</head>
<body class="w3-light-grey">

	<!-- !PAGE CONTENT! -->
	<div class="w3-main w3-padding-small" style="margin-left:120px;">

		<!-- Header -->
		<header class="w3-container" >
			<h5><b><i class="fa fa-cog"></i> Settings</b></h5>
		</header>
		<div class="w3-margin-bottom">
			<div class="w3-col l12">
				<!-- div for update email id -->
				<div class="col-lg-6 w3-padding-small ">
					<div class="w3-col l12 w3-small w3-round w3-margin-bottom w3-border w3-padding-small">
						<label><i class="fa fa-envelope"></i> SetUp Email-ID</label><br>
						<form id="updateEmail">
							<div class="w3-col l8 w3-padding-right w3-margin-bottom">
								<input type="email" name="admin_email" value="<?php echo $adminDetails['status_message'][0]['admin_email']; ?>" placeholder="Enter Email-ID here..." id="admin_email" class="w3-input" required>
							</div>
							<div class="w3-col l4">
								<button type="submit" class="w3-button w3-red">Update Email-ID</button>
							</div>
						</form>
					</div>

					<div class="w3-col l12 w3-round w3-margin-bottom w3-small w3-border w3-padding-small">
						<label><i class="fa fa-key"></i> SetUp Private Key</label><br>
						<form id="updateKey">
							<div class="w3-col l8 w3-padding-right w3-margin-bottom">
								<input type="text" name="admin_key" value="<?php echo $key['setting_value']; ?>" placeholder="Enter Private Key here..." id="admin_key" class="w3-input" required>
							</div>
							<div class="w3-col l4">
								<button type="submit" class="w3-button w3-red">Update Private Key</button>
							</div>
							<div class="w3-col l12">
								<p class="w3-small">
									<b>
										NOTE: This Private Key will be used to auto-generate Secure Password. Do not keep this field empty!
									</b>
								</p>
							</div>
						</form>
					</div>
				</div>

				<!-- div for update user name -->
				<div class="col-lg-6 w3-padding-small w3-small w3-margin-bottom">
					<div class="w3-col l12 w3-small w3-round w3-margin-bottom w3-border w3-padding-small">
						<label><i class="fa fa-users"></i> Update Username</label><br>
						<form id="updateUname">
							<div class="w3-col l8 w3-padding-right w3-margin-bottom">
								<input type="text" name="admin_uname" value="<?php echo $adminDetails['status_message'][0]['username']; ?>" placeholder="Enter Username Here..." id="admin_uname" class="w3-input" required>
							</div>
							<div class="w3-col l4">
								<button type="submit" class="w3-button w3-red">Update Username</button>
							</div>
						</form>
					</div>

					<div class="w3-col l12 w3-round w3-margin-bottom w3-border w3-padding-small">
						<label><i class="fa fa-lock"></i> Update Password</label><br>

						<form id="updatePass">
							<div class="w3-col l8 w3-padding-right w3-margin-bottom">
								<input type="text" name="admin_pass" value="<?php echo $adminDetails['status_message'][0]['password']; ?>" placeholder="Enter Password here..." id="admin_email" class="w3-input" required>
							</div>
							<div class="w3-col l4">
								<button type="submit" class="w3-button w3-red">Update Password</button>
							</div>
						</form>
					</div>
				</div>

			</div>
			
		</div>
	</div>
	<!-- End page content -->
</div>

<!--  script to update email id   -->
<script>
	$(function(){
		$("#updateEmail").submit(function(){
			dataString = $("#updateEmail").serialize();

			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>admin/admin_settings/updateEmail",
				data: dataString,
           return: false,  //stop the actual form post !important!

           success: function(data)
           {
           	$.alert(data);                       
           }
         });
         return false;  //stop the actual form post !important!

     });
	});
</script>
<!-- script ends here -->

<!--  script to update email id   -->
<script>
	$(function(){
		$("#updateUname").submit(function(){
			dataString = $("#updateUname").serialize();

			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>admin/admin_settings/updateUname",
				data: dataString,
           return: false,  //stop the actual form post !important!

           success: function(data)
           {
           	$.alert(data);                       
           }

       });

         return false;  //stop the actual form post !important!

     });
	});
</script>
<!-- script ends here -->
<!--  script to update email id   -->
<script>
	$(function(){
		$("#updatePass").submit(function(){
			dataString = $("#updatePass").serialize();

			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>admin/admin_settings/updatePass",
				data: dataString,
           return: false,  //stop the actual form post !important!

           success: function(data)
           {
           	$.alert(data);                       
           }

       });

         return false;  //stop the actual form post !important!

     });
	});
</script>
<!-- script ends here -->
<!-- update private key -->
<script>
	$(function(){
		$("#updateKey").submit(function(){
			dataString = $("#updateKey").serialize();

			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>admin/admin_settings/updateKey",
				data: dataString,
           return: false,  //stop the actual form post !important!

           success: function(data)
           {
           	$.alert(data);                       
           }

       });

         return false;  //stop the actual form post !important!

     });
	});
</script>

<!--  script to update user dashboard image   -->
<script>
	$(function(){
		$("#updateDashboardImage").submit(function(){
			dataString = $("#updateDashboardImage").serialize();

			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>admin/admin_settings/updateDashboardImage",
				data:  new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success: function(data)
				{
					$.alert(data);                       
				}

			});

         return false;  //stop the actual form post !important!

     });
	});
</script>
<!-- script ends here -->

<script>
	// ----function to preview selected image for profile------//
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#adminImagePreview').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
// ------------function preview image end------------------//
</script>
</body>
</html>
