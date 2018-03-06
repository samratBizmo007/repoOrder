<?php echo $msg; ?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url();?>css/w3.css">
	<!--	<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap/bootstrap.min.css">-->
	<link rel="stylesheet" href=" <?php echo base_url(); ?>css/membership/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/membership/style.css"> <!-- Resource style -->
	<!-- Modernizr -->
	<script src="<?php echo base_url(); ?>css/js/jquery-2.1.1.js"></script>
	<script src="<?php echo base_url(); ?>css/js/modernizr.js"></script>
	<script src="<?php echo base_url(); ?>css/js/main.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>css/js/jquery.min.js"></script> 
	<title>Membership Table</title>

	<style>
	* {
		box-sizing: border-box;
	}

	.columns {
		float: left;
		width: 33.3%;
		padding: 8px;
	}

	.price {
		list-style-type: none;
		border: 1px solid #eee;
		margin: 0;
		padding: 0;
		-webkit-transition: 0.3s;
		transition: 0.3s;
	}

	.price:hover {
		box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
	}

	.price .header {
		background-color: #111;
		color: white;
		font-size: 25px;
	}

	.price li {
		border-bottom: 1px solid #eee;
		padding: 20px;
		text-align: center;
	}

	.price .grey {
		background-color: #eee;
		font-size: 20px;
	}

	.toggle.btn-primary {
    color: #fff;
    background-color: bluishGreen_bg;
    border-color: bluishGreen_bg;
	}

	
	@media only screen and (max-width: 600px) {
		.columns {
			width: 100%;
		}
	}
</style>

</head>
<body>
	<?php                    
	$firstName='';
	$lastName='';
	$email='';
	$membership_package='';
	//print_r($all_userInfo);
	if($all_userInfo['status']=='200'){
		foreach ($all_userInfo['status_message'] as $key) {
			//print_r($key);
			//echo $key['jm_user_name'];
			$arr=explode(' ', $key['jm_user_name']);
			$firstName=$arr[0];
			$lastName=$arr[1];
			$email=$key['jm_email_id'];
			$membership_package=$key['membership_package'];
		}
	//echo $membership_package;
	}
	?>
	<div class="w3-container">
		<div class="col-lg-2"></div>
		<div class="w3-small w3-medium w3-col l12 w3-center w3-margin-top w3-margin-bottom">
			<div class="btn-group w3-margin-bottom">
			<button class="btn  btn-lg bluishGreen_bg" style="margin-right:2px" id="Monthly_changeDiv">Monthly</button>
			<button class="btn btn-lg" id="Yearly_changeDiv">Yearly</button>
			</div>
<!--			<div class="btn-group btn-toggle  w3-margin-bottom"> -->
<!--   			 <button class="btn btn-lg btn-default" onclick="switchVisible();">Monthly</button>-->
<!--    		 <button class="btn btn-lg btn-primary w3-text-white bluishGreen_bg" onclick="switchVisible();">Yearly</button>-->
<!--  			</div>-->
			<!-- <div class="w3-col l12 w3-center w3-margin-top w3-margin-bottom" >
				<button id="button" class="toggler toggler--is-active"onclick="switchVisible();">Monthly/yearly</button> 
			</div> -->
			<div class="w3-col l12" id="show_div" style="display: none;">
				<div class="col-lg-3"></div>
				<div class="col-lg-3 w3-margin-bottom">

					<div class="w3-center ">
						<ul class="price">
							<li class="header" style="background-color:#c7c7c7">Free</li>
							<li class="grey"><i class="fa fa-rupee"></i> 0<span class="w3-medium">/year</span></li>
							<li>20 Bids / month</li>
							<li>15 Project Bookmarks</li>
							<li>Custom Cover Photo</li>
							<li>Standard Bidding priority</li>		
                                                        <li>0% Commission</li>		
                                                        <li>No Bids Rollover</li>		
                                                        <li>Share Profile</li>
							<li><a href="#" class="btn w3-margin-top w3-margin-bottom w3-button w3-center" style="background-color:#a5a5a5;color:#eaeaea"><?php if($membership_package=='FREE'){ echo 'Initially Subscribed';} else{ echo 'Subscribe'; }?></a></li>		
						</ul>		
					</div>					
				</div>
				<div class="col-lg-3 w3-margin-bottom">
					<div class="w3-center">
						<ul class="price">
							<li class="header" style="background-color:#24b8a0;color:#ffffff ">PREMIUM </li>
							<li class="grey"><i class="fa fa-rupee"></i> 1200<span class="w3-medium">/year</span></li>
							<li><b>50 Bids / month</b></li>
							<li>Unlimited Project Bookmarks</li>
							<li>Custom Cover Photo</li>
                                                        <li><b>Premium Bidding priority</b></li>		
                                                        <li>0% Commission</li>		
                                                        <li><b>Monthly Bids Rollover</b></li>		
                                                        <li>Share Profile</li>
							<li><a data-toggle="modal" data-target="#subscribeYearPlan" class="btn w3-margin-top w3-margin-bottom w3-button  w3-center" style="background-color:#24b8a0; color:#ffffff"><?php if($membership_package=='P/Y'){ echo 'Already Subscribed';} else{ echo 'Subscribe'; }?></a></li>
						</ul>
					</div>
				</div>
				<!-- Modal -->
				<div id="subscribeYearPlan" class="modal fade" role="dialog"><!--  modal for add vendor information -->
					<div class="w3-display-topright w3-margin" id="msg" style="z-index: 4;position: fixed;">
					</div>
					<div class="modal-dialog modal-md">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header bluishGreen_bg">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<div class=""><h4 class="w3-text-white">Subscribe to PREMIUM Membership</h4></div>
							</div>
							<div class="modal-body w3-small">
								<!-- add portfolio form -->
								<form action="<?php echo base_url(); ?>payment/transaction" method="post" name="paymentForm" id="paymentForm" style="display: block">
									<div class="w3-container">
										<div class="w3-col l12 w3-padding-top">
											<img src="<?php echo base_url() ?>css/logos/payumoney_logo.png" class="img" width="auto" height="auto" style="float: left">
											<div class="w3-col l12 w3-margin-top">
												<div class="col-lg-6">
													<label class="w3-label" style="float: left">First Name:</label>
													<input type="text" name="firstName" class="w3-input" placeholder="Enter your First Name" value="<?php echo $firstName; ?>" required>
												</div>
												<div class="col-lg-6">
													<label class="w3-label" style="float: left">Last Name:</label>
													<input type="text" name="lastName" class="w3-input" placeholder="Enter your Last Name" value="<?php echo $lastName; ?>" required>
												</div>
											</div>
											<div class="w3-col l12 w3-margin-top">
												<div class="col-lg-6">
													<label class="w3-label" style="float: left">Email-ID:</label>
													<input type="email" name="email" class="w3-input" placeholder="Enter your Email ID" value="<?php echo $email; ?>" required>
												</div>
												<div class="col-lg-6">
													<label class="w3-label" style="float: left">Mobile No:</label>
													<input type="number" name="mobile" class="w3-input" placeholder="Enter your Mobile No." required>
												</div>
												<!-- <input type="hidden" name="membership_package" id="membership_package" value="P/Y"> -->
												<input type="hidden" name="productinfo" class="w3-input" value="P/Y" required>
												
											</div>
											<div class="w3-col l12 w3-margin-top">
												<div class="col-lg-6 ">
													<!-- <h5 style="text-align: right">Subscribe to Premium Membership in<br><i class="fa fa-inr w3-large"></i>300 /-</h5> -->
													<label class="w3-label" style="float: left">Address :</label>
													<textarea name="address" class="w3-input" rows="" placeholder="Enter your current address"></textarea>
												</div>
												<div class="col-lg-6">
													<label class="w3-label" style="float: left">Total Cost <i class="fa fa-inr w3-large"></i>:</label>
													<input type="number" name="totalCost" class="w3-input" value="1200" readonly>
													<!-- <input type="text" name="package" class="w3-input" value="P/Y" readonly> -->
												</div>
											</div>
											<div class="w3-col l12 w3-margin-top w3-center ">
												<button type="submit" class="bluishGreen_bg w3-button w3-text-white w3-large w3-round">Proceed to Payment <i class="fa fa-sign-out"></i></button>
											</div>
										</div>
									</div>
								</form>
								<!-- form ends for subscribe premium-->
							</div>  
						</div>
					</div>
				</div>
				<!-- modal ends -->
			</div>
			<div class="w3-col l12" id="hide_div">
				<div class="col-lg-3"></div>
				<div class="col-lg-3 w3-margin-bottom">
					<div class="w3-center">
						<ul class="price">
							<li class="header" style="background-color:#c7c7c7">Free</li>
							<li class="grey"><i class="fa fa-rupee"></i> 0<span class="w3-medium">/month</span></li>
							<li>20 Bids / month</li>
							<li>15 Project Bookmarks</li>
							<li>Custom Cover Photo</li>
							<li>Standard Bidding priority</li>		
                            <li>0% Commission</li>		
                            <li>No Bids Rollover</li>		
                            <li>Share Profile</li>
							<li><a href="#" class="btn w3-margin-top w3-margin-bottom w3-button w3-center" style="background-color:#a5a5a5;color:#eaeaea"><?php if($membership_package=='FREE'){ echo 'Initially Subscribed';} else{ echo 'Subscribe'; }?></a></li>
						</ul>
					</div>

				</div>
				<div class="col-lg-3 w3-margin-bottom">
					<div class="w3-center">
						<ul class="price">
							<li class="header" style="background-color:#24b8a0">PREMIUM</li>
							<li class="grey"><i class="fa fa-rupee"></i> 300<span class="w3-medium">/month</span></li>
                            <li><b>50 Bids / month</b></li>
							<li>Unlimited Project Bookmarks</li>
							<li>Custom Cover Photo</li>
                            <li><b>Premium Bidding priority</b></li>		
                            <li>0% Commission</li>		
                            <li><b>Monthly Bids Rollover</b></li>		
                            <li>Share Profile</li>
							<li><a data-toggle="modal" data-target="#subscribeMonthPlan" class="btn w3-margin-top w3-margin-bottom w3-button w3-center" style="background-color:#24b8a0; color:#ffffff"><?php if($membership_package=='P/M'){ echo 'Already Subscribed';} else{ echo 'Subscribe'; }?></a></li>
						</ul>
					</div>
					<!-- Modal -->
				<div id="subscribeMonthPlan" class="modal fade" role="dialog"><!--  modal for add vendor information -->
					<div class="w3-display-topright w3-margin" id="msg" style="z-index: 4;position: fixed;">
					</div>
					<div class="modal-dialog modal-md">
						<!-- Modal content-->
						<div class="modal-content ">
							<div class="modal-header bluishGreen_bg">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<div class=""><h4 class="w3-text-white">Subscribe to PREMIUM Membership</h4></div>
							</div>
							<div class="modal-body w3-small">
								<!-- add portfolio form -->
								<form action="<?php echo base_url(); ?>payment/transaction" method="post" name="paymentForm" id="paymentForm" style="display: block">
									<div class="w3-container">
										<div class="w3-col l12 w3-padding-top " >
											<img src="<?php echo base_url() ?>css/logos/payumoney_logo.png" class="img" width="auto" height="auto" style="float: left">
											<div class="w3-col l12 w3-margin-top">
												<div class="col-lg-6">
													<label class="w3-label" style="float: left">First Name:
													  <span class="w3-text-red">*</span>
													  </label>
													<input type="text" name="firstName" class="w3-input" pattern="^[_A-z]{1,}$" oninvalid="this.setCustomValidity('No whitespaces, special characters and numeric values allowed.')" oninput="setCustomValidity('')" placeholder="Enter your First Name" value="<?php echo $firstName; ?>" required>
												</div>
												<div class="col-lg-6">
													<label class="w3-label" style="float: left">Last Name:
													  <span class="w3-text-red">*</span>
													  </label>
													<input type="text" name="lastName" class="w3-input" pattern="^[_A-z]{1,}$" oninvalid="this.setCustomValidity('No whitespaces, special characters and numeric values allowed.')" oninput="setCustomValidity('')" placeholder="Enter your Last Name" value="<?php echo $lastName; ?>" required>
												</div>
											</div>
											<div class="w3-col l12 w3-margin-top">
												<div class="col-lg-6">
													<label class="w3-label" style="float: left">Email-ID:<span class="w3-text-red">*</span></label>
													  
													<input type="email" name="email" class="w3-input" placeholder="Enter your Email ID" value="<?php echo $email; ?>" required>
												</div>
												<div class="col-lg-6">
													<label class="w3-label" style="float: left">Mobile No:<span class="w3-text-red">*</span></label>
													  
													<input type="number" name="mobile" class="w3-input" placeholder="Enter your Mobile No." required>
												</div>
												<!-- <input type="hidden" name="membership_package" id="membership_package" value="P/M"> -->
												<input type="hidden" name="productinfo" class="w3-input" value="P/M" required>
												
											</div>
											<div class="w3-col l12 w3-margin-top">
												<div class="col-lg-6 ">
													<!-- <h5 style="text-align: right">Subscribe to Premium Membership in<br><i class="fa fa-inr w3-large"></i>300 /-</h5> -->
													<label class="w3-label" style="float: left">Address :</label>
													<textarea name="address" class="w3-input" rows="3" placeholder="Enter your current address"></textarea>
												</div>
												<div class="col-lg-6">
													<label class="w3-label" style="float: left">Total Cost <i class="fa fa-inr w3-large"></i>: <span class="w3-text-red">*</span></label>
													 
													<input type="number" name="totalCost" class="w3-input" value="300" readonly>
													<!-- <input type="text" name="package" class="w3-input" value="P/M" readonly> -->
												</div>
											</div>
											<div class="w3-col l12 w3-margin-top w3-center ">
												<button type="submit" class="bluishGreen_bg w3-button w3-text-white w3-large w3-round">Proceed to Payment <i class="fa fa-sign-out"></i></button>
											</div>
										</div>
									</div>
								</form>
								<!-- form ends for add portfolio-->
							</div>  
						</div>
					</div>
				</div>
				<!-- modal ends -->
				</div>
			</div>
			<!-- <div class="col-lg-3"></div> -->




		</div>
		<div class="col-lg-1"></div>


	</div>
<!-- =================================================MOBILE VERSION CODE FOR THE PLANS=================================-->
	
	  
  <div class="span11 w3-center w3-hide-large w3-hide-small scroll_mob" style="overflow: auto;">
           <div class="row-fluid"> 
            <div class="horizontal">
        
       <div class="w3-co l8 w3-small w3-medium w3-col l12 w3-center w3-margin-top w3-margin-bottom">
			<div class="btn-group btn-toggle  w3-margin-bottom"> 
   			 <button class="btn btn-lg btn-default" onclick="switchVisible();">Monthly</button>
    		 <button class="btn btn-lg btn-primary w3-text-white bluishGreen_bg" onclick="switchVisible();">Yearly</button>
  			</div>
  			<div class="w3-col l12" id="show_div" style="display: none;">
				<div class="col-lg-3"></div>
				<div class="col-lg-3 w3-margin-bottom">

					<div class="w3-center ">
						<ul class="price">
							<li class="header" style="background-color:#c7c7c7">Free</li>
							<li class="grey"><i class="fa fa-rupee"></i> 0<span class="w3-medium">/year</span></li>
							<li>20 Bids / month</li>
							<li>15 Project Bookmarks</li>
							<li>Custom Cover Photo</li>
							<li>Standard Bidding priority</li>		
                            <li>0% Commission</li>		
                            <li>No Bids Rollover</li>		
                            <li>Share Profile</li>
							<li><a href="#" class="btn w3-margin-top w3-margin-bottom w3-button w3-center" style="background-color:#a5a5a5;color:#eaeaea"><?php if($membership_package=='FREE'){ echo 'Subscribed';} else{ echo 'Subscribe'; }?></a></li>		
						</ul>		
					</div>					
				</div>
			</div>
  		</div>
    </div>
 </div> 
</div> 
	
<script>
$(document).ready(function(){
    $("#Monthly_changeDiv").click(function(){
        $("#hide_div").show();
        $("#show_div").hide();
        $("#Monthly_changeDiv").addClass('bluishGreen_bg');
        $("#Yearly_changeDiv").removeClass('bluishGreen_bg');
    });
    $("#Yearly_changeDiv").click(function(){
        $("#hide_div").hide();
        $("#show_div").show();
        $("#Yearly_changeDiv").addClass('bluishGreen_bg');
        $("#Monthly_changeDiv").removeClass('bluishGreen_bg');
    });
});
</script>
	
<script type="text/javascript">
// $(document).ready(function() {
// 	$("#button").click(function () {
// 	$("#hide_div").toggle()
// 	});
// 	});
//function switchVisible() {
//	$('.btn-toggle').click(function() {
//    $(this).find('.btn').toggleClass('active');  
//    
//    if ($(this).find('.btn-primary').size()>0) {
//    	$(this).find('.btn').toggleClass('btn-primary');
//    
//	if (document.getElementById('hide_div')) {
//
//		if (document.getElementById('hide_div').style.display == 'none')
//		{
//			document.getElementById('hide_div').style.display = 'block';
//			document.getElementById('show_div').style.display = 'none';
//		}
//		else {
//			document.getElementById('hide_div').style.display = 'none';
//			document.getElementById('show_div').style.display = 'block';
//		}
//	}
//}
// $(this).find('.btn').toggleClass('btn-default');
//       
//});

// $('form').submit(function(){
// 	alert($(this["options"]).val());
//     return false;
//});
//}
</script>
<script>
	
    // if ($(this).find('.btn-danger').size()>0) {
    // 	$(this).find('.btn').toggleClass('btn-danger');
    // }
    // if ($(this).find('.btn-success').size()>0) {
    // 	$(this).find('.btn').toggleClass('btn-success');
    // }
    // if ($(this).find('.btn-info').size()>0) {
    // 	$(this).find('.btn').toggleClass('btn-info');
    // }
    
   
</script>
</body>	
</html>