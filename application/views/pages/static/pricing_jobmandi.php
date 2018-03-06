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

	<title>Membership Details</title>

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
    color: #1fbea9;
    background-color: #1fbea9;
    border-color: #1fbea9;
	}
	.btn btn-lg active btn-primary
	{
		background-color: #1fbea9;
	}
	 .box{
	
    width:350px;
    height:350px;
    border:1px solid black;
    display:inline-block;
    display:inline;/* For IE7*/
    zoom:1;/* For IE7*/
    white-space:normal;
}

#container{
    width:100%;
    height:400px;
    float:left;
    overflow-x:scroll;
    white-space:nowrap;
}
	/*.row-fluid{
    white-space: nowrap;
}
.row-fluid .col-lg-3{
    display: inline-block;
}*/

	.button {
		background-color: #24b8a0;
		border: none;
		color: white;
		padding: 10px 25px;
		text-align: center;
		text-decoration: none;
		font-size: 18px;
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
//		echo $membership_package;
	}
	?>
<!------------Freelancer's membership plan div------------------------------>

	<div class="w3-container">
		<!-- <div class="col-lg-2"></div> -->
			<h4 class='w3-center'>Freelancer's Membership Plan</h4>
		<div class="w3-col l12 w3-center w3-margin-top w3-margin-bottom">
			<div class="btn-group btn-toggle  w3-margin-bottom"> 
   			 <button class="btn btn-lg btn-default" onclick="switchVisible();">Monthly</button>
    		 <button class="btn btn-lg btn-primary w3-text-white bluishGreen_bg" onclick="switchVisible();">Yearly</button>
  			</div>
			<!-- <div class="w3-col l12 w3-center w3-margin-top w3-margin-bottom" >
				<button id="button" class="toggler toggler--is-active"onclick="switchVisible();">Monthly/yearly</button> 
			</div> -->
			<div class="w3-col l12" id="show_div" style="display: none;">
				<div class="col-lg-3"></div>
				<div class="col-lg-3 col-md-6 w3-margin-bottom">

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
<!--							<li><a href="#" class="btn w3-margin-top w3-margin-bottom w3-button w3-center" style="background-color:#a5a5a5;color:#eaeaea"><?php if($membership_package=='FREE'){ echo 'Subscribed';} else{ echo 'Subscribe'; }?></a></li>		-->
						</ul>		
					</div>					
				</div>
				<div class="col-lg-3 col-md-6 w3-margin-bottom">
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
<!--							<li><a data-toggle="modal" data-target="#subscribeYearPlan" class="btn w3-margin-top w3-margin-bottom w3-button  w3-center" style="background-color:#24b8a0; color:#ffffff"><?php if($membership_package=='P/Y'){ echo 'Subscribed';} else{ echo 'Subscribe'; }?></a></li>-->
						</ul>
					</div>
				</div>
				
				
			</div>
			<div class="w3-col l12" id="hide_div">
				<div class="col-lg-3"></div>
				<div class="col-lg-3 col-md-6 w3-margin-bottom">
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
<!--							<li><a href="#" class="btn w3-margin-top w3-margin-bottom w3-button w3-center" style="background-color:#a5a5a5;color:#eaeaea"><?php if($membership_package=='FREE'){ echo 'Subscribed';} else{ echo 'Subscribe'; }?></a></li>-->
						</ul>
					</div>

				</div>
				<div class="col-lg-3 col-md-6 w3-margin-bottom">
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
<!--							<li><a data-toggle="modal" data-target="#subscribeMonthPlan" class="btn w3-margin-top w3-margin-bottom w3-button w3-center" style="background-color:#24b8a0; color:#ffffff"><?php if($membership_package=='P/M'){ echo 'Subscribed';} else{ echo 'Subscribe'; }?></a></li>-->
						</ul>
					</div>
			
				
				</div>
			</div>
			<!-- <div class="col-lg-3"></div> -->




		</div>
		<!-- <div class="col-lg-1"></div> -->


	</div>
<!------------Freelancer's membership plan div------------------------------>
<!-- =================================================MOBILE VERSION CODE THE  FOR FREELANCER PLANS=================================-->
	
	<!-- <div class="span11 w3-hide-large scroll_mob" style="">
		<div class="row-fluid">
			<div class="horizontal">
				<div class="col-lg-1"></div>
				<div class="w3-col l8">
					<div class="w3-col l12 w3-center w3-margin-top w3-margin-bottom">
						<button id="button" class="w3-button " onclick="switchbutton();">Monthly/yearly</button> 
					</div>
					<div class="w3-col l12" id="show" style="display: none;">
						<div class="col-lg-3"></div>
						<div class="col-lg-3 ">
							<div class="w3-center col-md-6 ">
								<ul class="price">
									<li class="header" style="background-color:#C7C7C7">Free</li>
									<li class="grey"><i class="fa fa-rupee"></i> 0<span class="w3-medium">/year</span></li>
									<li>3 job views per month</li>
									<li>15 Project Bookmarks</li>
									<li>Custom Cover Photo</li>
									<li>Standard Job priority</li>		
		                            <li>No View Count Rollover</li>		
		                            <li>No Share Profile</li>

								</ul>
								<a href="#" class="btn w3-margin-top w3-margin-bottom w3-button  w3-center" style="background-color:#a5a5a5;color:#eaeaea">Subscribe</a>
							</div>
						</div>
						<div class="col-lg-3 " >
							<div class="w3-center col-md-6 ">
								<ul class="price">
									<li class="header" style="background-color:#24b8a0;color:#ffffff ">PREMIUM</li>
									<li class="grey"><i class="fa fa-rupee"></i> 300<span class="w3-medium">/month</span></li>
                                    <li><b>Unlimited jobs per month</b></li>
									<li>Unlimited Project Bookmarks</li>
									<li>Custom Cover Photo</li>
		                            <li><b>Premium Job priority</b></li>		
		                            <li><b>Unlimited Jobs Rollover</b></li>		
		                            <li><b>Share Profile</b></li>

								</ul>
								<a href="#" class="btn w3-button w3-margin-bottom w3-margin-top w3-center" style="background-color:#24b8a0; color:#ffffff" >Subscribe</a>
							</div>

						</div>
					</div>
					<div class="w3-col l12" id="hide">
						<div class="col-lg-2"></div>
						<div class="col-lg-4 ">
							<div class="w3-center col-md-6 ">
								<ul class="price">
									<li class="header" style="background-color:#C7C7C7">Free</li>
									<li class="grey"><i class="fa fa-rupee"></i> 0<span class="w3-medium">/year</span></li>
                                    <li>3 job views per month</li>
							        <li>15 Project Bookmarks</li>
							        <li>Custom Cover Photo</li>
							        <li>Standard Job priority</li>		
                                    <li>No View Count Rollover</li>		
                                    <li>No Share Profile</li>
								</ul>
								<!-- <a href="#" class="btn w3-button w3-margin-bottom w3-margin-top w3-center" style="background-color:#a5a5a5;color:#eaeaea">Subscribe</a> -->
							<!-- </div>

						</div>
						<div class="col-lg-4 col-md-6">
							<div class="w3-center col-md-6">
								<ul class="price">
									<li class="header" style="background-color:#24b8a0;color:#ffffff ">PREMIUM</li>
									
									<li class="grey"><i class="fa fa-rupee"></i> 300<span class="w3-medium">/month</span></li>
                                   <li><b>Unlimited jobs per month</b></li>
									<li>Unlimited Project Bookmarks</li>
									<li>Custom Cover Photo</li>
		                            <li><b>Premium Job priority</b></li>		
		                            <li><b>Unlimited Jobs Rollover</b></li>		
		                            <li><b>Share Profile</b></li>
								</ul>
								<!-- <a href="#" class="btn w3-button w3-margin-bottom w3-margin-top w3-center" style="background-color:#24b8a0; color:#ffffff">Subscribe</a> -->
							<!-- </div>

						</div>
					</div>
					<div class="col-lg-3"></div>




				</div>
				<div class="col-lg-2"></div>
			</div>
		</div>
	</div> --> 
 <!-- <div class="span11 w3-center w3-hide-large  scroll_mob" style="overflow: auto;">
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
							<li>20 Bids per month</li>
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
</div> -->
<!-- =================================================MOBILE VERSION CODE THE  FOR FREELANCER PLANS=================================-->
<!------------JobSeeker's membership plan div------------------------------>
<div class="w3-container">
		<div class="col-lg-2"></div>
		<h4 class='w3-center''>JobSeeker's Membership Plan</h4>
<!-- 
		<div class="w3-co l8  w3-hide-medium"> -->

			<div class="  w3-col l12 w3-center w3-margin-top w3-margin-bottom">
				<div class="btn-group btn-toggle  w3-margin-bottom">
   			 <button class="btn btn-lg btn-default" onclick="switchbutton();">Monthly</button>
    		 <button class="btn btn-lg btn-primary w3-text-white bluishGreen_bg" onclick="switchbutton();">Yearly</button>
  			</div>
<!-- 			<div class="w3-col l12 w3-center w3-margin-top w3-margin-bottom" >
				<button id="button" class="button "onclick="switchVisible();">Monthly/yearly</button> 
			</div> -->
			<div class="w3-col l12" id="show" style="display: none;">
				<div class="col-lg-3"></div>
				<div class="col-lg-3  col-md-3 w3-margin-bottom">

					<div class="w3-center ">
						<ul class="price">
							<li class="header" style="background-color:#c7c7c7">Free</li>
							<li class="grey"><i class="fa fa-rupee"></i> 0<span class="w3-medium">/year</span></li>
							<li>3 job Applications / month</li>
							<li>15 Project Bookmarks</li>
							<li>Custom Cover Photo</li>
							<li>Standard Job priority</li>		
                            <li>No View Count Rollover</li>		
                            <li>No Share Profile</li>
							<!-- <li><a href="#" class="btn w3-margin-top w3-margin-bottom w3-button w3-center" style="background-color:#a5a5a5;color:#eaeaea"><?php if($membership_package=='FREE'){ echo 'Subscribed';} else{ echo 'Subscribe'; }?></a></li> -->		
						</ul>		
					</div>					
				</div>
				<div class="col-lg-3 col-md-3 w3-margin-bottom">
					<div class="w3-center">
						<ul class="price">
							<li class="header" style="background-color:#24b8a0;color:#ffffff ">PREMIUM </li>
							<li class="grey"><i class="fa fa-rupee"></i> 1200<span class="w3-medium">/year</span></li>
							<li><b>Unlimited job Applications / month</b></li>
							<li>Unlimited Project Bookmarks</li>
							<li>Custom Cover Photo</li>
                            <li><b>Premium Job priority</b></li>		
                            <li><b>Unlimited Jobs Rollover</b></li>		
                            <li><b>Share Profile</b></li>
							<!-- <li><a data-toggle="modal" data-target="#subscribeYearPlan" class="btn w3-margin-top w3-margin-bottom w3-button  w3-center" style="background-color:#24b8a0; color:#ffffff"><?php if($membership_package=='P/Y'){ echo 'Subscribed';} else{ echo 'Subscribe'; }?></a></li> -->
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
											<img src="<?php echo base_url() ?>css/logos/payumoney_logo.png" class="img" width="auto" height="auto">
											<div class="w3-col l12 w3-margin-top">
												<div class="col-lg-6">
													<label class="w3-label">First Name:</label>
													<input type="text" name="firstName" class="w3-input" placeholder="Enter your First Name" value="<?php echo $firstName; ?>" required>
												</div>
												<div class="col-lg-6">
													<label class="w3-label">Last Name:</label>
													<input type="text" name="lastName" class="w3-input" placeholder="Enter your Last Name" value="<?php echo $lastName; ?>" required>
												</div>
											</div>
											<div class="w3-col l12 w3-margin-top">
												<div class="col-lg-6">
													<label class="w3-label">Email-ID:</label>
													<input type="email" name="email" class="w3-input" placeholder="Enter your Email ID" value="<?php echo $email; ?>" required>
												</div>
												<div class="col-lg-6">
													<label class="w3-label">Mobile No:</label>
													<input type="number" name="mobile" class="w3-input" placeholder="Enter your Mobile No." required>
												</div>
												<input type="hidden" name="productinfo" class="w3-input" value="Yearly Premium Membership Package of JobMandi, worth rupees only 1200/-" required>
												
											</div>
											<div class="w3-col l12 w3-margin-top">
												<div class="col-lg-6 ">
													<h5 style="text-align: right">Subscribe to Premium Membership in<br><i class="fa fa-inr w3-large"></i>1200 /-</h5>
												</div>
												<div class="col-lg-6">
													<label class="w3-label">Total Cost <i class="fa fa-inr w3-large"></i>:</label>
													<input type="number" name="totalCost" class="w3-input" value="1200">
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
			<div class="w3-col l12" id="hide">
				<div class="col-lg-3"></div>
				<div class="col-lg-3 col-md-3 w3-margin-bottom">
					<div class="w3-center">
						<ul class="price">
							<li class="header" style="background-color:#c7c7c7">Free</li>
							<li class="grey"><i class="fa fa-rupee"></i> 0<span class="w3-medium">/month</span></li>
							<li>3 job Applications / month</li>
							<li>15 Project Bookmarks</li>
							<li>Custom Cover Photo</li>
							<li>Standard Job priority</li>		
                            <li>No View Count Rollover</li>		
                            <li>No Share Profile</li>
							<!-- <li><a href="#" class="btn w3-margin-top w3-margin-bottom w3-button w3-center" style="background-color:#a5a5a5;color:#eaeaea"><?php if($membership_package=='FREE'){ echo 'Subscribed';} else{ echo 'Subscribe'; }?></a></li> -->
						</ul>
					</div>

				</div>
				<div class="col-lg-3 col-md-3 w3-margin-bottom">
					<div class="w3-center">
						<ul class="price">
							<li class="header" style="background-color:#24b8a0">PREMIUM</li>
							<li class="grey"><i class="fa fa-rupee"></i> 300<span class="w3-medium">/month</span></li>
                            <li><b>Unlimited job Applications / month</b></li>
							<li>Unlimited Project Bookmarks</li>
							<li>Custom Cover Photo</li>
                            <li><b>Premium Job priority</b></li>		
                            <li><b>Unlimited Jobs Rollover</b></li>		
                            <li><b>Share Profile</b></li>
							<!-- <li><a data-toggle="modal" data-target="#subscribeMonthPlan" class="btn w3-margin-top w3-margin-bottom w3-button w3-center" style="background-color:#24b8a0; color:#ffffff"><?php if($membership_package=='P/M'){ echo 'Subscribed';} else{ echo 'Subscribe'; }?></a></li> -->
						</ul>
					</div>
					<!-- Modal -->
				<div id="subscribeMonthPlan" class="modal fade" role="dialog"><!--  modal for add vendor information -->
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
											<img src="<?php echo base_url() ?>css/logos/payumoney_logo.png" class="img" width="auto" height="auto">
											<div class="w3-col l12 w3-margin-top">
												<div class="col-lg-6">
													<label class="w3-label">First Name:</label>
													<input type="text" name="firstName" class="w3-input" placeholder="Enter your First Name" value="<?php echo $firstName; ?>" required>
												</div>
												<div class="col-lg-6">
													<label class="w3-label">Last Name:</label>
													<input type="text" name="lastName" class="w3-input" placeholder="Enter your Last Name" value="<?php echo $lastName; ?>" required>
												</div>
											</div>
											<div class="w3-col l12 w3-margin-top">
												<div class="col-lg-6">
													<label class="w3-label">Email-ID:</label>
													<input type="email" name="email" class="w3-input" placeholder="Enter your Email ID" value="<?php echo $email; ?>" required>
												</div>
												<div class="col-lg-6">
													<label class="w3-label">Mobile No:</label>
													<input type="number" name="mobile" class="w3-input" placeholder="Enter your Mobile No." required>
												</div>
												<input type="hidden" name="productinfo" class="w3-input" value="Monthly Premium Membership Package of JobMandi, worth rupees only 300/-" required>
												
											</div>
											<div class="w3-col l12 w3-margin-top">
												<div class="col-lg-6 ">
													<h5 style="text-align: right">Subscribe to Premium Membership in<br><i class="fa fa-inr w3-large"></i>300 /-</h5>
												</div>
												<div class="col-lg-6">
													<label class="w3-label">Total Cost <i class="fa fa-inr w3-large"></i>:</label>
													<input type="number" name="totalCost" class="w3-input" value="300">
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
			<div class="col-lg-3"></div>




		</div>
		<div class="col-lg-2"></div>


	</div>

<!------------JobSeeker's membership plan div End------------------------------>
<!-- =================================================MOBILE VERSION CODE FOR THE JobSeeker's PLANS=================================-->
<!--	<div class="span11 w3-hide-large scroll_mob" style="overflow: auto;">-->
<!--		<div class="row-fluid">-->
<!--			<div class="horizontal">-->
<!--				<div class="col-lg-1"></div>-->
<!--				<div class="w3-col l8 w3-center">-->
<!--				<div class="btn-group btn-toggle  w3-margin-bottom">-->
<!--   			 		<button class="btn btn-lg btn-default" onclick="switchDiv();">Monthly</button>-->
<!--    				<button class="btn btn-lg btn-primary w3-text-white bluishGreen_bg" onclick="switchDiv();">Yearly</button>-->
<!--  				</div>-->
<!--					<div class="w3-col l12 w3-center w3-margin-top w3-margin-bottom">-->
<!--						<button id="button" class="w3-button " onclick="switchbutton();">Monthly/yearly</button> -->
<!--					</div>-->
<!--					<div class="w3-col l12" id="show_s" style="display: none;">-->
<!--						<div class="col-lg-3"></div>-->
<!--						<div class="col-lg-3 ">-->
<!--							<div class="w3-center col-md-6">-->
<!--								<ul class="price">-->
<!--									<li class="header" style="background-color:#C7C7C7">Free</li>-->
<!--									<li class="grey"><i class="fa fa-rupee"></i> 0<span class="w3-medium">/year</span></li>-->
<!--									<li>3 job views per month</li>-->
<!--									<li>15 Project Bookmarks</li>-->
<!--									<li>Custom Cover Photo</li>-->
<!--									<li>Standard Job priority</li>		-->
<!--		                            <li>No View Count Rollover</li>		-->
<!--		                            <li>No Share Profile</li>-->
<!---->
<!--								</ul>-->
<!--								<a href="#" class="btn w3-margin-top w3-margin-bottom w3-button  w3-center" style="background-color:#a5a5a5;color:#eaeaea">Subscribe</a>-->
<!--							</div>-->
<!--						</div>-->
<!--						<div class="col-lg-3 " >-->
<!--							<div class="w3-center col-md-6">-->
<!--								<ul class="price">-->
<!--									<li class="header" style="background-color:#24b8a0;color:#ffffff ">PREMIUM</li>-->
<!--									<li class="grey"><i class="fa fa-rupee"></i> 300<span class="w3-medium">/month</span></li>-->
<!--                                    <li><b>Unlimited jobs per month</b></li>-->
<!--									<li>Unlimited Project Bookmarks</li>-->
<!--									<li>Custom Cover Photo</li>-->
<!--		                            <li><b>Premium Job priority</b></li>		-->
<!--		                            <li><b>Unlimited Jobs Rollover</b></li>		-->
<!--		                            <li><b>Share Profile</b></li>-->
<!---->
<!--								</ul>-->
<!--								<a href="#" class="btn w3-button w3-margin-bottom w3-margin-top w3-center" style="background-color:#24b8a0; color:#ffffff" >Subscribe</a>-->
<!--							</div>-->
<!---->
<!--						</div>-->
<!--					</div>-->
<!--					<div class="w3-col l12" id="hide_s">-->
<!--						<div class="col-lg-2"></div>-->
<!--						<div class="col-lg-4 ">-->
<!--							<div class="w3-center col-md-6">-->
<!--								<ul class="price">-->
<!--									<li class="header" style="background-color:#C7C7C7">Free</li>-->
<!--									<li class="grey"><i class="fa fa-rupee"></i> 0<span class="w3-medium">/year</span></li>-->
<!--                                    <li>3 job views per month</li>-->
<!--							        <li>15 Project Bookmarks</li>-->
<!--							        <li>Custom Cover Photo</li>-->
<!--							        <li>Standard Job priority</li>		-->
<!--                                    <li>No View Count Rollover</li>		-->
<!--                                    <li>No Share Profile</li>-->
<!--								</ul>-->
<!--								 <a href="#" class="btn w3-button w3-margin-bottom w3-margin-top w3-center" style="background-color:#a5a5a5;color:#eaeaea">Subscribe</a> -->
<!--							</div>-->
<!---->
<!--						</div>-->
<!--						<div class="col-lg-4 col-md-6">-->
<!--							<div class="w3-center col-md-6  ">-->
<!--								<ul class="price">-->
<!--									<li class="header" style="background-color:#24b8a0;color:#ffffff ">PREMIUM</li>-->
<!--									-->
<!--									<li class="grey"><i class="fa fa-rupee"></i> 300<span class="w3-medium">/month</span></li>-->
<!--                                   <li><b>Unlimited jobs per month</b></li>-->
<!--									<li>Unlimited Project Bookmarks</li>-->
<!--									<li>Custom Cover Photo</li>-->
<!--		                            <li><b>Premium Job priority</b></li>		-->
<!--		                            <li><b>Unlimited Jobs Rollover</b></li>		-->
<!--		                            <li><b>Share Profile</b></li>-->
<!--								</ul>-->
<!--								 <a href="#" class="btn w3-button w3-margin-bottom w3-margin-top w3-center" style="background-color:#24b8a0; color:#ffffff">Subscribe</a> -->
<!--							</div>-->
<!---->
<!--						</div>-->
<!--					</div>-->
<!--					<div class="col-lg-3"></div>-->




<!--				</div>-->
<!--				<div class="col-lg-2"></div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!-- ===========================================End MOBILE VERSION CODE FOR THE JobSeeker's PLANS==============================-->
<script type="text/javascript">
// $(document).ready(function() {
// 	$("#button").click(function () {
// 	$("#hide_div").toggle()
// 	});
// 	});
function switchVisible() {
	$('.btn-toggle').click(function() {
    $(this).find('.btn').toggleClass('active');  
    
    if ($(this).find('.btn-primary').size()>0) {
    	$(this).find('.btn').toggleClass('btn-primary');
    
	if (document.getElementById('hide_div')) {

		if (document.getElementById('hide_div').style.display == 'none')
		{
			document.getElementById('hide_div').style.display = 'block';
			document.getElementById('show_div').style.display = 'none';
		}
		else {
			document.getElementById('hide_div').style.display = 'none';
			document.getElementById('show_div').style.display = 'block';
		}
	}
}
 $(this).find('.btn').toggleClass('btn-default');
       
});

// $('form').submit(function(){
// 	alert($(this["options"]).val());
//     return false;
//});
}
</script>
<script>
	
 function switchbutton() {
 	$('.btn-toggle').click(function() {
    $(this).find('.btn').toggleClass('active');  
    
    if ($(this).find('.btn-primary').size()>0) {
    	$(this).find('.btn').toggleClass('btn-primary');
    
	if (document.getElementById('hide')) {

		if (document.getElementById('hide').style.display == 'none')
		{
			document.getElementById('hide').style.display = 'block';
			document.getElementById('show').style.display = 'none';
		}
		else {
			document.getElementById('hide').style.display = 'none';
			document.getElementById('show').style.display = 'block';
		}
	}
}
 $(this).find('.btn').toggleClass('btn-default');
       
});
 }
</script>
<script>
	
 function switchDiv() {
 	$('.btn-toggle').click(function() {
    $(this).find('.btn').toggleClass('active');  
    
    if ($(this).find('.btn-primary').size()>0) {
    	$(this).find('.btn').toggleClass('btn-primary');
    
	if (document.getElementById('hide_s')) {

		if (document.getElementById('hide_s').style.display == 'none')
		{
			document.getElementById('hide_s').style.display = 'block';
			document.getElementById('show_s').style.display = 'none';
		}
		else {
			document.getElementById('hide_s').style.display = 'none';
			document.getElementById('show_s').style.display = 'block';
		}
	}
}
 $(this).find('.btn').toggleClass('btn-default');
       
});
 }
</script>

</body>	
</html>