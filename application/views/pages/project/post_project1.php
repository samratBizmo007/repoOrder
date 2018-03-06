<!DOCTYPE html>
<html >
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Post Project</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
	<link href="<?php echo base_url(); ?>css/freelancer.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/normalize.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/stylesheet.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/alert/jquery-confirm.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>css/js/project/post_project_form.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>css/js/const.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>css/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>css/js/selectize.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>css/alert/jquery-confirm.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>css/js/index.js"></script>
</head>
<body>
	<div class="w3-container">
	<div class="col-lg-2"></div>
	<div class="w3-col l8">
		<div class="col-md-12">
			<div class="block">
				<form id="post_project" name="post_project" role="form" method="POST" class="form-horizontal" action="" enctype="multipart/form-data">
					<div class="col-md-12">
						<div class="form-group need">   																			
							<h1>Tell us what you need done</h1>					
							<p class="quotes">Get free quotes from skilled freelancers within minutes, view profiles, rating and portfolios and chat with them.
							Pay the freelancer only when you are 100% satisfied with their work.</p>
						</div>
					</div>

					<div class="col-md-12">	
						<div class="form-group need">
							<legend class="project-legend">Choose a name for your project</legend>															
							<input type="text" name="jm_project_title" id="jm_project_title" class="form-control" placeholder="e.g. Build me a website" required/>                 											
							<!--						<span class="help-block"></span>									-->
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group need">
							<legend class="project-legend">Tell us more about your project</legend>																
							<textarea name="jm_project_description" id="jm_project_description" rows="7" class="form-control" placeholder="Describe your project here..." required></textarea>                 											
							<!--						<span class="help-block"></span>									-->
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group need w3-border">	
							<div id="fileupload-container" class="">
								<span></span>
								<input type="file" class="file-uploader-area" id="jm_project_file" name="jm_project_file" required>
							</div>
							<!--						<span class="help-block"></span>									-->
						</div>
					</div> 		

					<div class="col-md-12">	
						<div class="form-group need">
							<legend class="project-legend">How do you want to pay?</legend>															
							<label class="container" >Fixed Price project
								<input class="checkmark" type="radio" id="jm_project_type" value="Fixed Price project" name="jm_project_type" checked="checked" required/>
							</label>
							<label class="container" >Hourly project
								<input class="checkmark" type="radio" id="jm_project_type" value="Hourly project" name="jm_project_type" required/>
							</label>           											
							<!--						<span class="help-block"></span>									-->
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group need">
							<legend class="project-legend">Add skill for project</legend>	
							<select id="select-skill" name="skill[]" multiple class="demo-default " style="width:100%" placeholder="Select a skill...">
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

					<div class="col-md-12">	
						<div class="form-group need">
							<legend class="project-legend">What is your estimated Time?</legend>
							<div class="col-md-4">
								<select class="form-control" name="jm_time_estimation" id="jm_time_estimation" required>
									<option value="1-2 Month">1-2 Month</option>
									<option value="2-3 Month">2-3 Month</option>
									<option value="3-6 Month">3-6 Month</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-12">	
						<div class="form-group need">
							<legend class="project-legend">What is your estimated budget?</legend>															
							<div class="col-md-4">
								<select class="form-control" name="jm_project_price" id="jm_project_price"  required>
									<option value="INR">INR</option>
								</select>
							</div>
							<div class="col-md-8">
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
							<!--						<span class="help-block"></span>									-->
						</div>
					</div>

					<div class="col-md-4">	
						<div class="form-group need">															
							<input type="submit" name="" class="btn btn-primary btn-xlarge" value="Post My Project">                 											
							<!--						<span class="help-block"></span>									-->
						</div>
					</div>
				</form>								
			</div>
		</div>
	</div>
	<div class="col-lg-2"></div>
</div>
	

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  	<!-- Include all compiled plugins (below), or include individual files as needed -->
  	<script src="<?php echo base_url();?>css/bootstrap/bootstrap.min.js"></script>
  	<script>
  		$(function () {
  			$("#post_project").submit(function (e) {
  				dataString = $("#post_project").serialize();
  				e.preventDefault();
           //alert(dataString);
           $.ajax({
           	type: "POST",
           	url: BASE_URL+"project/Post_project_Controller/get_allproject",
           	type: "POST",
           	data:  new FormData(this),
           	contentType: false,
           	cache: false,
           	processData:false,
               // return: false, //stop the actual form post !important!
               success: function (data)
               {
               	$.alert(data);
               }

               
           });
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
  	</script>
  </body>
  </html>