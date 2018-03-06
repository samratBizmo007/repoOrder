<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Project</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css"> -->
    <link href="<?php echo base_url(); ?>css/bootstrap/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert/jquery-confirm.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css"> -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/joblisting.css">

    <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>css/bootstrap/bootstrap-toggle.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>css/alert/jquery-confirm.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>css/js/const.js"></script>
   <style>
   .star-rating {
  line-height:32px;
  font-size:1.25em;
}

.star-rating .fa-star{color: yellow;}
</style>
   </head>
   <body>
   	<div class="container">
   		<div class="col-lg-2"></div>
   		<div class="col-lg-8">
   		<form class="form-horizontal" id="feedback_form" name="feedback_form" role="form" method="post" enctype="multipart/form-data">
   		<div class="w3-col l12">
   			<h3>Feedback For Freelancer</h3>
   		
   				<div class="w3-col l6 s6 w3-small">
            <div class="form-group">
            <label class="w3-small">communication</label>
            
            <div class="star-rating w3-large">
            <span class="fa fa-star-o" data-rating="1"></span>
            <span class="fa fa-star-o" data-rating="2"></span>
            <span class="fa fa-star-o" data-rating="3"></span>
            <span class="fa fa-star-o" data-rating="4"></span>
            <span class="fa fa-star-o" data-rating="5"></span>
            <input type="hidden" class="rating-value" value="" id="jm_communication"  name="jm_communication">
            
            </div>
            </div>
  					<div class="form-group">
   					 <label >On time Deliver</label>
            <div class="star-rating w3-large">
            <span class="fa fa-star-o" data-rating="1"></span>
            <span class="fa fa-star-o" data-rating="2"></span>
            <span class="fa fa-star-o" data-rating="3"></span>
            <span class="fa fa-star-o" data-rating="4"></span>
            <span class="fa fa-star-o" data-rating="5"></span>
   					 <input type="hidden" class="rating-value" value="" name="jm_ontimedelivery" id="jm_ontimedelivery">
  					</div>
            </div>
  					<div class="form-group">
   					 <label >Value for Money</label>
             <div class="star-rating w3-large">
            <span class="fa fa-star-o" data-rating="1"></span>
            <span class="fa fa-star-o" data-rating="2"></span>
            <span class="fa fa-star-o" data-rating="3"></span>
            <span class="fa fa-star-o" data-rating="4"></span>
            <span class="fa fa-star-o" data-rating="5"></span>
   					 <input type="hidden" class="rating-value" value="" name="jm_valueformoney" id="jm_valueformoney">
  					</div>
            </div>
  					<div class="form-group">
   					 <label >Expertise</label>
            <div class="star-rating w3-large">
            <span class="fa fa-star-o" data-rating="1"></span>
            <span class="fa fa-star-o" data-rating="2"></span>
            <span class="fa fa-star-o" data-rating="3"></span>
            <span class="fa fa-star-o" data-rating="4"></span>
            <span class="fa fa-star-o" data-rating="5"></span>
   					 <input type="hidden" class="rating-value" value="" name="jm_expertise" id="jm_expertise">
  					</div>
            </div>
  					<div class="form-group">
   					 <label >Hire Again</label>
             <div class="star-rating w3-large">
            <span class="fa fa-star-o" data-rating="1"></span>
            <span class="fa fa-star-o" data-rating="2"></span>
            <span class="fa fa-star-o" data-rating="3"></span>
            <span class="fa fa-star-o" data-rating="4"></span>
            <span class="fa fa-star-o" data-rating="5"></span>
   					 <input type="hidden" class="rating-value"  value="" name="jm_hire_again" id="jm_hire_again">
  					</div>
            </div>
  					<div class="form-group">
  						<label>Comment :</label>
  						<textarea style="height:100px; width:500px;" name="jm_feedback_comment"></textarea>
  					</div>
  					<button type="submit" class="btn btn-default w3-text-white bluishGreen_bg">Submit</button>
  					<button  class="btn btn-default w3-text-white bluishGreen_bg">Rate Later</button>
  				</div>

				
                      
   			</div>
   		</div>	
   		</form>
   		</div>
		<div class="col-lg-2"></div>
   	</div>

   	<script>
   	$(function () {
    $("#feedback_form").submit(function () {
        dataString = $("#feedback_form").serialize();
			//alert(dataString);
				$.ajax({
						type: "POST",
            			url: BASE_URL + "Feedback_form/submit_feedback_freelanceremployer",
	    				dataType : 'text',
            			data: dataString,
            			return: false, //stop the actual form post !important!
            			success: function (data){ 
            				$.alert(data);
            			}
	               		});
	               		
				
			
         return false;  //stop the actual form post !important!
     
	});
});
</script>
<script>
  var $star_rating = $('.star-rating .fa');
  // alert($star-rating);

var SetRatingStar = function() {
  
  return $star_rating.each(function() {
    
    if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
      
      return $(this).removeClass('fa-star-o').addClass('fa-star');
    } else {
       
      return $(this).removeClass('fa-star').addClass('fa-star-o');
    }
  });
};

$star_rating.on('click', function() {
  $star_rating.siblings('input.rating-value').val($(this).data('rating'));

  return SetRatingStar();
});

SetRatingStar();
$(document).ready(function() {
  

});
  </script>
   </body>

  </html>