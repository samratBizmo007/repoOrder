<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Post Project</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert/jquery-confirm.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/freelancer.css">

  <script type="text/javascript" src="<?php echo base_url(); ?>css/js/const.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/js/dashboard/dashboard.js"></script>

     </head>
  <body>

<div class="col-sm-10 col-xs-offset-1">
	<div class="masthead">
        <h3 class="text-muted">LOGO</h3>
      </div>
	<div class="row">
	<div class="col-md-12">
		<div class="block">
			<form id="jvalidate" role="form" method="post" class="form-horizontal" action="" enctype="multipart/form-data">
				<div class="col-md-12">
					<div class="form-group need">   																			
					<h1>Tell us what you need done</h1>					
						<p class="quotes">Get free quotes from skilled freelancers within minutes, view profiles, rating and portfolios and chat with them.
						Pay the freelancer only when you are 100% satisfied with their work.</p>
						<span class="help-block"></span>					
					</div>
				</div>
				<div class="col-md-12">	
					<div class="form-group need">
					<legend class="project-legend">Choose a name for your project</legend>															
						<input type="text" name="project_name" class="form-control" placeholder="e.g. Build me a website" required/>                 											
						<span class="help-block"></span>									
					</div>
				</div>
								
				<div class="col-md-12">
					<div class="form-group need">
					<legend class="project-legend">Tell us more about your project</legend>																
						<textarea name="about" rows="7" class="form-control" placeholder="Describe your project here..." required/></textarea>                 											
						<span class="help-block"></span>									
					</div>
				</div>
								
				<div class="col-md-12">
					<div class="form-group need">	
						<div id="fileupload-container" class="">
						<span></span>
						<input type="file" class="file-uploader-area" name="file" required/>
						</div>
						<span class="help-block"></span>									
					</div>
				</div>		
				
				<div class="col-md-12">	
					<div class="form-group need">
					<legend class="project-legend">How do you want to pay?</legend>															
						<label class="container">Fixed Price project
						<input class="checkmark" type="radio" name="project" checked="checked" required/>
						</label>
						<label class="container">Hourly project
						<input class="checkmark" type="radio" name="project" required/>
						</label>           											
						<span class="help-block"></span>									
					</div>
				</div>

				<div class="col-md-12">	
					<div class="form-group need">
					<legend class="project-legend">What skills are required?</legend>															
						<input type="text" name="skills" class="form-control" placeholder="What skills are required?" required/>                 											
						<span class="help-block"></span>									
					</div>
				</div>
				
				
				
				<div class="col-md-12">	
					<div class="form-group need">
					<legend class="project-legend">What is your estimated budget?</legend>															
						<div class="col-md-4">
						<select class="form-control" name="" required>
							<option value="USD">USD</option>
							<option value="NZD">NZD</option>
							<option value="AUD">AUD</option>
							<option value="INR">INR</option>
						</select>
						</div>
						<div class="col-md-8">
						<select class="form-control" name="" required>
							<option value="Micro Project(600-1500INR)">Micro Project(600-1500INR)</option>
							<option value="Simple Project(1500-12500INR)">Simple Project(1500-12500INR)</option>
							<option value="Very Small Project(12500-37500INR)">Very Small Project(12500-37500INR)</option>
							<option value="Small Project(37500-75000INR)">Small Project(37500-75000INR)</option>
							<option value="Medium Project(75000-150000INR)">Micro Project(75000-150000INR)</option>
							<option value="Large Project(150000-250000INR)">Large Project(150000-250000INR)</option>
							<option value="Huge Project(1000000-2500000INR)">Huge Project(1000000-2500000INR)</option>
						</select>
						</div>
						<span class="help-block"></span>									
					</div>
				</div>
				
				<div class="col-md-4">	
					<div class="form-group need">															
						<input type="button" name="submit" class="btn btn-primary btn-xlarge" value="Post My Project">                 											
						<span class="help-block"></span>									
					</div>
				</div>
			</form>								
        </div>
	</div>
	</div>    
  </body>
</html>