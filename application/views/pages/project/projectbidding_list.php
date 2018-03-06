<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(E_ERROR | E_PARSE);
$profile_type = $this->session->userdata('profile_type');
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Project</title>
    
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
    .bluishGreen_bg{
        background-color:#00B59D;
    }
    .button{
        background-color:#00B59D;
    }
    #basic-addon{
        background-color:#00B59D;                
    }

</style>

</head>
<?php
//print_r($EmployersRating);
//print_r($FreelancerRating);
$freelance_id = $EmployersRating['status_message'][0]['jm_freelance_id'];
$employerProject_Id = $EmployersRating['status_message'][0]['jm_project_id'];
$employer_id = $FreelancerRating['status_message'][0]['jm_emp_id'];
$frelancerProject_Id = $FreelancerRating['status_message'][0]['jm_project_id'];
//echo $employerProject_Id;
//echo $frelancerProject_Id;
$user_id = $this->session->userdata('user_id');

//echo $user_id;
$user_name = $this->session->userdata('user_name');
$project_Title = $details['status_message'][0]['jm_project_title'];
$project_Description = $details['status_message'][0]['jm_project_description'];
$project_Id = $details['status_message'][0]['jm_project_id'];
$project_type = $details['status_message'][0]['jm_job_type'];
$budget = $details['status_message'][0]['jm_projectbudget_type'];
$freelancer_id = $details['status_message'][0]['jm_freelancer_user_id'];
$emp_id = $details['status_message'][0]['jm_posted_user_id'];
$is_closed = $details['status_message'][0]['is_active'];

$bypost_user_id = $details['status_message'][0]['jm_posted_user_id'];

?>
<script>
    
    $(document).ready(function () {
     var user_id = '<?php echo $user_id ; ?>';
     var project_Id = '<?php echo $project_Id; ?>'; 
     $.ajax({
        type: "POST",
        url: BASE_URL + "project/View_project/Fetch_Bidding_Info",
        data: {
            user_id:user_id,
            project_Id:project_Id
        },
            return: false, //stop the actual form post !important!
            success: function (data)
            {   
                if(data == 'TRUE'){
                    $("#Bidding_Div").css("display","none");
                    $("#bid_id").css("display","block");
                }else{
                    $("#Bidding_Div").css("display","block");  
                    $("#bid_id").css("display","none");
                }
            }
        });
     return false;                        
 });
</script>
<body>

    <div class="container w3-margin-top">
        <div class="w3-col l12 bluishGreen_bg">
            <div class="w3-col l8">
                <div class="w3-col l12 w3-padding">
                    <h4 class="w3-text-white"><?php echo $project_Title; ?></h4>
                </div>
            </div>
            <div class="w3-col l4 w3-padding ">
                <h5 class="w3-text-white"><?php echo $budget; ?></h5>
            </div>
        </div>
    </div>
    <div class="container w3-margin-bottom">
        <div class="w3-col l12 ">
            <div class=" col-md-12 bind-main w3-border">
                <!-- -------------------Div to bind for project Description------------------------------>
                <div class=" w3-margin-top">
                    <!-------------------------------------------- div for project description------------------------------------------------>
                    <div class="row">

                        <div class="w3-col l12" style="font-size:15px">

                            <div class=" w3-padding">
                                <p><b>Project Title:&nbsp;&nbsp;</b><?php echo $project_Title; ?></p> 
                            </div>
                            <div class=" w3-padding">
                                <p><b>Project Budget:&nbsp;&nbsp;</b><?php echo $budget; ?></p> 
                            </div>

                            <div class=" w3-padding">
                                <p><b>Project Description:&nbsp;&nbsp;</b><?php echo $project_Description; ?></p> 
                            </div>
                            <div class=" w3-padding">                                    
                                <p><b>Skills :-&nbsp;&nbsp;</b><b style="color: #585454;">
                                    <?php foreach ($Skills['status_message'] as $row) { ?>
                                    <span  class="w3-padding-small w3-light-grey w3-round" style="display:inline-block; margin-top:5px; margin-right: 5px; font-size:10px;"><?php echo $row['jm_skill_name']; ?></span>                                        
                                        <?php //echo $row['jm_skill_name'] . ' ,'; ?>
                                    <?php } ?>
                                </b></p>                                    
                            </div>
                            <div class="w3-padding ">
                                <div>
                                    <p><b>Project ID:-</b>&nbsp;&nbsp;#PID0<?php echo $project_Id; ?></p>
                                    <?php 
//                                    if($is_closed==0){
//                                        if($employer_id == $user_id){
//                                        //echo '<a class="btn w3-right" data-toggle="modal" data-target="#"><span class="w3-margin-top w3-margin-bottom w3-padding-small w3-padding-left w3-padding-right w3-round-xxlarge  w3-text-white" style=" background-color: #00B59D;"><b>Rating Submited.!</b></span></a>'; 
//                                            
//                                        }
//                                        else{
//                                        echo '<a class="btn w3-right" data-toggle="modal" data-target="#rateEmp"><span class="w3-margin-top w3-margin-bottom w3-padding-small w3-padding-left w3-padding-right w3-round-xxlarge  w3-text-white" style=" background-color: #00B59D;"><b>Rate Employer!</b></span></a>';                                            
//                                            
//                                        }                                        
//                                    }
//                                    else{
//                                    echo '<span id="bid_id" class="w3-margin-top w3-margin-bottom w3-padding-small w3-padding-left w3-padding-right w3-round-xxlarge w3-right w3-text-white" style=" background-color: #00B59D; display: none;"><b>Bid Submitted !</b></span>';
//                                    }                                     
                                    ?>
                                </div>                                   
                            </div>
                        </div>
                    </div>
                    <!-- ===================================================modal for rate employer=================================== -->
                    <!-- Modal -->
                        <div id="rateEmp" class="modal fade" role="dialog"><!--  modal for vshow portfolio information -->
                          <div class="modal-dialog modal-sm">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-body w3-small w3-round-large">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <div class="w3-container w3-margin-bottom">
                                    <form class="form-horizontal" id="emp_rateForm" name="emp_rateForm" role="form" method="post" enctype="multipart/form-data">
                                        <div class="w3-col l12 w3-center">
                                            <h5>Give Feedback to Freelance Employer</h5>
                                            <input type="hidden" class="" value="<?php echo $project_Id; ?>" id="emp_project_id"  name="emp_project_id">
                                            <input type="hidden" class="" value="<?php echo $emp_id; ?>" id="emp_id"  name="emp_id">
                                            <div class="w3-col l12  w3-small">
                                                <div class="form-group">
                                                    <label style="margin-bottom:0">Communication</label>
                                                    <div class="star-rating-one  w3-large" style="padding-top:-2px">
                                                        <span class="fa fa-star-o" data-rating="1"></span>
                                                        <span class="fa fa-star-o" data-rating="2"></span>
                                                        <span class="fa fa-star-o" data-rating="3"></span>
                                                        <span class="fa fa-star-o" data-rating="4"></span>
                                                        <span class="fa fa-star-o" data-rating="5"></span>
                                                        <input type="hidden" class="rating-value" value="" id="jm_communication"  name="jm_communication">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                 <label style="margin-bottom:0">Prompt Payment</label>
                                                 <div class="star-rating-two w3-large" style="padding-top:-2px">
                                                    <span class="fa fa-star-o" data-rating="1"></span>
                                                    <span class="fa fa-star-o" data-rating="2"></span>
                                                    <span class="fa fa-star-o" data-rating="3"></span>
                                                    <span class="fa fa-star-o" data-rating="4"></span>
                                                    <span class="fa fa-star-o" data-rating="5"></span>
                                                    <input type="hidden" class="rating-value" value="" name="jm_promptpay" id="jm_promptpay">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                             <label style="margin-bottom:0">Accuracy of Requirements</label>
                                             <div class="star-rating-three w3-large" style="padding-top:-2px">
                                                <span class="fa fa-star-o" data-rating="1"></span>
                                                <span class="fa fa-star-o" data-rating="2"></span>
                                                <span class="fa fa-star-o" data-rating="3"></span>
                                                <span class="fa fa-star-o" data-rating="4"></span>
                                                <span class="fa fa-star-o" data-rating="5"></span>
                                                <input type="hidden" class="rating-value" value="" name="jm_reqAccuracy" id="jm_reqAccuracy">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                         <label style="margin-bottom:0">Work Again ?</label>
                                         <div class="star-rating-four w3-large" style="padding-top:-2px">
                                            <span class="fa fa-star-o" data-rating="1"></span>
                                            <span class="fa fa-star-o" data-rating="2"></span>
                                            <span class="fa fa-star-o" data-rating="3"></span>
                                            <span class="fa fa-star-o" data-rating="4"></span>
                                            <span class="fa fa-star-o" data-rating="5"></span>
                                            <input type="hidden" class="rating-value" value="" name="jm_workAgain" id="jm_workAgain">
                                        </div>
                                    </div>                                    
                                <div class="form-group">
                                    <label>Comment :</label>
                                    <textarea class="form-control" name="emp_comment" rows="5"></textarea>
                                </div>
                                <button type="submit" class="btn w3-text-white bluishGreen_bg">Submit</button>
<!--                                 <button  class="btn btn-default w3-text-white bluishGreen_bg">Rate Later</button>
-->                            </div>
</div>
</form>
</div>
</div>  
</div>
</div>
</div>
<script>
    $(function () {
        $("#emp_rateForm").submit(function () {
            dataString = $("#emp_rateForm").serialize();
            //alert(dataString);
            $.ajax({
                type: "POST",
                url: BASE_URL + "Feedback_form/submit_feedbackEmployer",
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
  var $star_rating = $('.star-rating-two .fa');  // alert($star-rating);
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

 <script>
  var $star_rating_1 = $('.star-rating-one .fa');  // alert($star-rating);
  var SetRatingStar1 = function() {  
      return $star_rating_1.each(function() {    
        if (parseInt($star_rating_1.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {      
          return $(this).removeClass('fa-star-o').addClass('fa-star');    
      } else {       
          return $(this).removeClass('fa-star').addClass('fa-star-o');    
      }
  });
  };

  $star_rating_1.on('click', function() {
      $star_rating_1.siblings('input.rating-value').val($(this).data('rating'));
      return SetRatingStar1();
  });
  SetRatingStar1();
  $(document).ready(function() {

  });
</script>
   
<script>
  var $star_rating_3 = $('.star-rating-three .fa');  // alert($star-rating);
  var SetRatingStar3 = function() {  
      return $star_rating_3.each(function() {    
        if (parseInt($star_rating_3.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {      
          return $(this).removeClass('fa-star-o').addClass('fa-star');    
      } else {       
          return $(this).removeClass('fa-star').addClass('fa-star-o');    
      }
  });
  };

  $star_rating_3.on('click', function() {
      $star_rating_3.siblings('input.rating-value').val($(this).data('rating'));
      return SetRatingStar3();
  });
  SetRatingStar3();
  $(document).ready(function() {

  });
</script>        

<script>
  var $star_rating_4 = $('.star-rating-four .fa');  // alert($star-rating);
  var SetRatingStar4 = function() {  
      return $star_rating_4.each(function() {    
        if (parseInt($star_rating_4.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {      
          return $(this).removeClass('fa-star-o').addClass('fa-star');    
      } else {       
          return $(this).removeClass('fa-star').addClass('fa-star-o');    
      }
  });
  };

  $star_rating_4.on('click', function() {
      $star_rating_4.siblings('input.rating-value').val($(this).data('rating'));
      return SetRatingStar4();
  });
  SetRatingStar4();
  $(document).ready(function() {

  });
</script> 
           
<script>
  var $star_rating_5 = $('.star-rating-five .fa');  // alert($star-rating);
  var SetRatingStar5 = function() {  
      return $star_rating_5.each(function() {    
        if (parseInt($star_rating_5.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {      
          return $(this).removeClass('fa-star-o').addClass('fa-star');    
      } else {       
          return $(this).removeClass('fa-star').addClass('fa-star-o');    
      }
  });
  };

  $star_rating_5.on('click', function() {
      $star_rating_5.siblings('input.rating-value').val($(this).data('rating'));
      return SetRatingStar5();
  });
  SetRatingStar5();
  $(document).ready(function() {

  });
</script>
<!-- modal ends here -->
                    <!-- =================================================end============================================================== -->
                    <!-------------------------------------------- div for project description------------------------------------------------>
                    <!-------------------------------------------- div for project bid------------------------------------------------>

                    <?php if($bypost_user_id != $user_id && $is_closed != 0) { ?>
                    <?php if($profile_type != 4){ ?>
                    <div class="w3-padding w3-margin-bottom" id="Bidding_Div">
                        <form id="Bidding_Form" name="Bidding_Form" enctype="multipart/form-data">
                            <input type="hidden" name="project_id" id="project_id" value="<?php echo $project_Id; ?>">
                            <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>">
                            <input type="hidden" name="user_name" id="user_name" value="<?php echo $user_name; ?>">
                            <div class="row">
                                <div class="w3-col l12">
                                    <div class="w3-padding row w3-col l12">
                                        <div class="w3-col l2 w3-padding-left">
                                            <label>Your Bid For Project.</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control input-md" name="Project_Bid" id="Project_Bid" required>
                                                <span class="input-group-addon w3-text-white" id="basic-addon">INR</span>
                                            </div>
                                        </div>
                                        <div class="w3-padding">
                                            <label class="w3-col l4 w3-right w3-margin-top">Type:-&nbsp;&nbsp;<?php echo $project_type;?></label>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="w3-padding-left">
                                    <h5 ><b>Additional Information</b></h5>
                                </div>
                                <div class="w3-col l12 w3-padding">
                                    <label>Cover Letter (optional):</label>
                                    <textarea class="form-control" rows="6" cols="80" name="Cover_Letter" id="Cover_Letter" style=" resize: none;"></textarea>
                                </div>
                                <div class="w3-col l12 w3-padding">
                                    <div class="w3-margin-top">
                                        <label>Attachment (optional)</label>
                                    </div>                                        
                                    <div class="w3-col l8 w3-padding w3-margin-bottom" style=" border: 0.5px dashed;">
                                        <input type="file" class="file-uploader-area" id="projectCoverletter_file" name="projectCoverletter_file" > 
                                    </div>
                                    <div class="w3-col l4 w3-padding-left" style="margin-top: 0px;">
                                        <button type="submit" class="button btn-lg w3-medium w3-text-white w3-right">Bid on this project</button>
                                    </div>                                                                 
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php } ?>
                    <?php } ?>
                    <!-------------------------------------------- div for project bid------------------------------------------------>
                </div>
                <!---------------------/div bind for project description-------------------------->
            </div>
        </div>

        <!-- Bidded freelamcer list as follows -->
        <?php if($bypost_user_id == $user_id) {
            if($profile_type != ''){ ?>
            <div class="w3-col l12 w3-padding-top w3-margin-bottom w3-margin-top">
                <div class="w3-col l12">
                    <div class="w3-col l6 w3-margin-bottom">
                        <h4>Bids by Freelancers</h4>
                    </div>
                    <div class="w3-col l6 w3-margin-bottom">
                        <?php
//                        echo $employer_id.'<br>';
//                        echo $user_id.'<br>';
//                        echo $frelancerProject_Id.'<br>';
//                        echo $project_Id.'<br>';
                        if($employer_id == $user_id && $frelancerProject_Id == $project_Id){
                                        echo '<button class="w3-button w3-text-white w3-right" data-toggle="modal" data-target="#" id="finishCurrent_project" style="background-color: #'.THEME_COLOR.'">Ratings Submitted.!</button>'; 
                                        }else{
                                        echo '<button class="w3-button w3-right w3-light-red" onclick="closeProject('.$project_Id.')" id="closeCurrent_project">Close Project</button>';                                            
                                        echo '<button class="w3-button w3-text-white w3-right" data-toggle="modal" data-target="#finishModal" id="finishCurrent_project" style="background-color: #'.THEME_COLOR.'">Finish & Close Project</button>'; 
                                        }?>
                       <!--<button class="w3-button w3-text-white w3-right" data-toggle="modal" data-target="#finishModal" id="finishCurrent_project" style="background-color: #<?php echo THEME_COLOR; ?>">Finish & Close Project</button>--> 

                        <!-- Modal -->
                        <div id="finishModal" class="modal fade" role="dialog"><!--  modal for vshow portfolio information -->
                          <div class="modal-dialog modal-sm">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-body w3-small w3-round-large">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <div class="w3-container w3-margin-bottom">
                                    <form class="form-horizontal" id="feedback_form" name="feedback_form" role="form" method="post" enctype="multipart/form-data">
                                        <div class="w3-col l12 w3-center">
                                            <h5>Give Feedback to Freelancer</h5>
                                            <input type="hidden" class="" value="<?php echo $project_Id; ?>" id="project_id"  name="project_id">
                                            <input type="hidden" class="" value="<?php echo $freelancer_id; ?>" id="freelance_id"  name="freelance_id">
                                            <div class="w3-col l12  w3-small">
                                                <div class="form-group">
                                                    <label style="margin-bottom:0">communication</label>
                                                    <div class="star-rating-one  w3-large" style="padding-top:-2px">
                                                        <span class="fa fa-star-o" data-rating="1"></span>
                                                        <span class="fa fa-star-o" data-rating="2"></span>
                                                        <span class="fa fa-star-o" data-rating="3"></span>
                                                        <span class="fa fa-star-o" data-rating="4"></span>
                                                        <span class="fa fa-star-o" data-rating="5"></span>
                                                        <input type="hidden" class="rating-value" value="" id="jm_communication"  name="jm_communication">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                 <label style="margin-bottom:0">On time Deliver</label>
                                                 <div class="star-rating-two w3-large" style="padding-top:-2px">
                                                    <span class="fa fa-star-o" data-rating="1"></span>
                                                    <span class="fa fa-star-o" data-rating="2"></span>
                                                    <span class="fa fa-star-o" data-rating="3"></span>
                                                    <span class="fa fa-star-o" data-rating="4"></span>
                                                    <span class="fa fa-star-o" data-rating="5"></span>
                                                    <input type="hidden" class="rating-value" value="" name="jm_ontimedelivery" id="jm_ontimedelivery">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                             <label style="margin-bottom:0">Value for Money</label>
                                             <div class="star-rating-three w3-large" style="padding-top:-2px">
                                                <span class="fa fa-star-o" data-rating="1"></span>
                                                <span class="fa fa-star-o" data-rating="2"></span>
                                                <span class="fa fa-star-o" data-rating="3"></span>
                                                <span class="fa fa-star-o" data-rating="4"></span>
                                                <span class="fa fa-star-o" data-rating="5"></span>
                                                <input type="hidden" class="rating-value" value="" name="jm_valueformoney" id="jm_valueformoney">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                         <label style="margin-bottom:0">Expertise</label>
                                         <div class="star-rating-four w3-large" style="padding-top:-2px">
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
                                     <div class="star-rating-five w3-large">
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
                                    <textarea class="form-control" name="jm_feedback_comment" rows="5"></textarea>
                                </div>
                                <button type="submit" class="btn w3-text-white bluishGreen_bg">Submit</button>
<!--                                 <button  class="btn btn-default w3-text-white bluishGreen_bg">Rate Later</button>
-->                            </div>
</div>
</div>
</form>
</div>  
</div>
</div>
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
                            //closeProject(<?php echo $project_Id; ?>);
                        }
                    });
         return false;  //stop the actual form post !important!

     });
    });
</script>

<script>
  var $star_rating = $('.star-rating-two .fa');  // alert($star-rating);
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

 <script>
  var $star_rating_1 = $('.star-rating-one .fa');  // alert($star-rating);
  var SetRatingStar1 = function() {  
      return $star_rating_1.each(function() {    
        if (parseInt($star_rating_1.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {      
          return $(this).removeClass('fa-star-o').addClass('fa-star');    
      } else {       
          return $(this).removeClass('fa-star').addClass('fa-star-o');    
      }
  });
  };

  $star_rating_1.on('click', function() {
      $star_rating_1.siblings('input.rating-value').val($(this).data('rating'));
      return SetRatingStar1();
  });
  SetRatingStar1();
  $(document).ready(function() {

  });
</script>
   
<script>
  var $star_rating_3 = $('.star-rating-three .fa');  // alert($star-rating);
  var SetRatingStar3 = function() {  
      return $star_rating_3.each(function() {    
        if (parseInt($star_rating_3.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {      
          return $(this).removeClass('fa-star-o').addClass('fa-star');    
      } else {       
          return $(this).removeClass('fa-star').addClass('fa-star-o');    
      }
  });
  };

  $star_rating_3.on('click', function() {
      $star_rating_3.siblings('input.rating-value').val($(this).data('rating'));
      return SetRatingStar3();
  });
  SetRatingStar3();
  $(document).ready(function() {

  });
</script>        

<script>
  var $star_rating_4 = $('.star-rating-four .fa');  // alert($star-rating);
  var SetRatingStar4 = function() {  
      return $star_rating_4.each(function() {    
        if (parseInt($star_rating_4.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {      
          return $(this).removeClass('fa-star-o').addClass('fa-star');    
      } else {       
          return $(this).removeClass('fa-star').addClass('fa-star-o');    
      }
  });
  };

  $star_rating_4.on('click', function() {
      $star_rating_4.siblings('input.rating-value').val($(this).data('rating'));
      return SetRatingStar4();
  });
  SetRatingStar4();
  $(document).ready(function() {

  });
</script> 
           
<script>
  var $star_rating_5 = $('.star-rating-five .fa');  // alert($star-rating);
  var SetRatingStar5 = function() {  
      return $star_rating_5.each(function() {    
        if (parseInt($star_rating_5.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {      
          return $(this).removeClass('fa-star-o').addClass('fa-star');    
      } else {       
          return $(this).removeClass('fa-star').addClass('fa-star-o');    
      }
  });
  };

  $star_rating_5.on('click', function() {
      $star_rating_5.siblings('input.rating-value').val($(this).data('rating'));
      return SetRatingStar5();
  });
  SetRatingStar5();
  $(document).ready(function() {

  });
</script>  
                            

<!-- script to award project to freelnacer -->
<script>
    function closeProject(project_id)
    {
        $.confirm({
          title: '<label class="w3-text-red w3-xlarge"><i class="fa fa-warning "></i> Alert!</label>',
      content: '<span class="w3-medium w3-text-grey w3-medium ">Do you really want to close this project permanantly?</span>',
      type:'red',
          buttons: {
            confirm: function () {
              $.ajax({
                type:'POST',
                url:BASE_URL+'project/project_listing/closeProject',
                data:{
                  project_id:project_id
              },
              success:function(response) {
                  $.alert(response);
                  
              }
          });
          },
          cancel: function () {}
      }
  });
    }
</script>
<!-- script ends -->
<!-- modal ends here -->
</div>
</div>

<div class="w3-col l12" id="BiddedFreelancer_Div" name="BiddedFreelancer_Div" style="max-height: 600px; overflow: scroll;">
    <table class="table table-striped table-hover">          
        <thead>
          <tr class="w3-light-grey">
            <th class="text-center"><h6>#</h6></th>
            <th class="text-center"></th>
            <th class="text-center"><h6>Name</h6></th>
            <th class="text-center"><h6>Average Ratings</h6></th>
            <th class="text-center"><h6>Bid Amount</h6></th>
            <th class="text-center"><h6>Email-ID</h6></th>
            <th class="text-center"><h6>Date</h6></th>
            <th class="text-center"><h6>Action</h6></th>
        </tr>
    </thead>
    <tbody>
      <?php $i=1; 
      if($bidList['status']==200){

        foreach ($bidList['status_message'] as  $value) { 
            $hide='';

            if($is_closed=='0'){
                $hide='w3-hide';
            }
            if($freelancer_id==$value['jm_user_id'] && $is_closed=='1'){
                $hide='';
            }

            ?>
            <tr id="divID" onclick="slidedownn('<?php echo $value['jm_user_id']; ?>');">
                <td class="text-center" style="vertical-align: middle;"><?php echo $i.'.'; ?></td>
                <td class="text-center" style="vertical-align: middle;"><i class="fa fa-trophy <?php if($freelancer_id!=$value['jm_user_id']){echo 'w3-hide'; } ?> w3-xlarge" title="Awarded" style="color:<?php echo '#'.THEME_COLOR; ?>"></i></td>
                <td class="text-center" style="vertical-align: middle;"><?php if($value['jm_user_name']!='') {echo $value['jm_user_name'];}else{ echo '<b>Not Available</b>';} ?></td>
                <td class="text-center" style="vertical-align: middle;min-width:95px"><span class="stars" data-rating="<?php echo $value['jm_avg_rating']; ?>" data-num-stars="5" ></span></td>
                <td class="text-center" style="vertical-align: middle;"><i class="fa fa-rupee"></i> <?php if($value['jm_bidding_amount']!='') {echo $value['jm_bidding_amount'];}else{ echo '<b>N/A</b>';} ?></td>
                <td class="text-center" style="vertical-align: middle;"><?php echo $value['jm_email_id']; ?></td>
                <td class="text-center" style="vertical-align: middle;"><?php echo date('M d,Y', strtotime($value['jm_bidding_date'])); ?></td>
                <td class="text-center" style="vertical-align: middle;"><?php                 
                echo ' 
                <a style="padding:2px" class="w3-medium btn '.$hide.'" onclick="awardProject('.$value['jm_user_id'].',\''.$value['jm_username'].'\','.$value['jm_project_id'].')" title="Award Project" ><i class="fa fa-trophy" style="color: #1fbea9"></i> </a>
                <a href="" style="padding:2px" class="w3-medium btn" title="Chat with '.$value['jm_username'].'"><i class="fa fa-weixin" style="color: #1fbea9"></i> </a></td>
                ';
                ?>
            </tr> 
        <tr id="slideDIV_<?php echo $value['jm_user_id']; ?>" style=" display: none;">
                <td colspan="4" class="text-left" style="vertical-align: middle;">
                    <b>User Message: </b>
                    <?php if($value['jm_project_bidding_coverletter']){echo $value['jm_project_bidding_coverletter'];}else{echo '<b>Not Available</b>';} ?></td>
                <td colspan="4" class="text-left" style="vertical-align: middle;">
                  <b>Attachments: </b>
               <?php 
               if($value['jm_project_bidding_coverletter_file']!=''){
                   echo '<a class="btn w3-medium" title="Download Resume" href="'.base_url().'project/project_listing/download/'.$value['project_bid_id'].'"><i class="fa fa-download"></i> File</a>';
               }
               else{
                echo '<b>No File</b>';
            }
            ?>
                </td>  
        </tr>
    </tr>

    <?php $i++; } 
}else{
  echo '<tr>
  <td colspan="8" class="text-center">'.$bidList['status_message'].'.</td>
  </tr>';
}
?>
</tbody>                  
</table>
</div>
</div>
<?php    
}
}
?>
</div>
</body>
</html>
<script>
function slidedownn(user_id){
    $("#slideDIV_"+user_id).slideToggle("slow");
    $("#slideDIVnew_"+user_id).slideToggle("slow");
    }
 
    //-----this script is used to save the bidding and upload file for project cover letter-----------------// 
    $(function () {
        $("#Bidding_Form").submit(function (e) {
            e.preventDefault();
            dataString = $("#Bidding_Form").serialize();
            //$.alert(dataString);
            $.ajax({
                type: "POST",
                url: BASE_URL + "project/View_project/saveProjectBidding",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
               // return: false, //stop the actual form post !important!
               success: function (data)
               {
                $.alert(data);
                // $("#Bidding_Form").load(location.href + "Bidding_Form>*", "");
            }               
        });          
            return false;  //stop the actual form post !important!
        });
    });
    //-----this script is used to save the bidding and upload file for project cover letter-----------------//
</script>


<!-- script to dispaly stars -->
<script>
    $.fn.stars = function() {
      return $(this).each(function() {
        var rating = $(this).data("rating");
        var numStars = $(this).data("numStars");
        var fullStar = new Array(Math.floor(rating + 1)).join('<i class="fa fa-star" style="margin-right:3px"></i>');
        var halfStar = ((rating%1) !== 0) ? '<i class="fa fa-star-half-empty" style="margin-right:3px"></i>': '';
        var noStar = new Array(Math.floor(numStars + 1 - rating)).join('<i class="fa fa-star-o" style="margin-right:3px"></i>');
        $(this).html(fullStar + halfStar + noStar);
    });
  }
  $('.stars').stars();
</script>
<!-- script to dispaly stars ends-->

<!-- script to award project to freelnacer -->
<script>
    function awardProject(freelancer_id,name,project_id)
    {
        $.confirm({
          title: '<label class="w3-large w3-text-green"><i class="fa fa-trophy w3-xxlarge"></i> Award Project.</label>',
          content: '<span class="w3-medium"><b>Confirm award this project to '+name+'?</b></span>',
          buttons: {
            confirm: function () {
              $.ajax({
                type:'POST',
                url:BASE_URL+'project/project_listing/awardProject',
                data:{
                  freelancer_id:freelancer_id,
                  project_id:project_id
              },
              success:function(response) {
                  $.alert(response);
                  $("#BiddedFreelancer_Div").load(location.href+" #BiddedFreelancer_Div>*","");
              }
          });
          },
          cancel: function () {}
      }
  });
    }
</script>
<!-- script ends -->


