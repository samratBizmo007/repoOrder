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
//echo $project_Id;
//echo '<pre>';print_r($details['status_message']);exit;


// foreach ($details['status_message'] as $key) {
//     $project_Title = $key['jm_project_title'];
//     $project_Description = $key['jm_project_description'];
//     $project_Id = $key['jm_project_id'];
//     $project_type = $key['jm_job_type'];
//     $budget = $key['jm_projectbudget_type'];
// }
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
                  if($is_closed==0 && $profile_type==1){
                    if($freelance_id == $user_id && $employerProject_Id == $project_Id){
                      echo '<a class="btn w3-right" data-toggle="modal" data-target="#"><span class="w3-margin-top w3-margin-bottom w3-padding-small w3-padding-left w3-padding-right w3-round-xxlarge  w3-text-white" style=" background-color: #00B59D;"><b>Rating Submited.!</b></span></a>'; 
                    }else{
                      echo '<a class="btn w3-right" data-toggle="modal" data-target="#rateEmp"><span class="w3-margin-top w3-margin-bottom w3-padding-small w3-padding-left w3-padding-right w3-round-xxlarge  w3-text-white" style=" background-color: #00B59D;"><b>Rate Employer!</b></span></a>';
                    }

                  }
                  else{
                    echo '<span id="bid_id" class="w3-margin-top w3-margin-bottom w3-padding-small w3-padding-left w3-padding-right w3-round-xxlarge w3-right w3-text-white" style=" background-color: #00B59D; display: none;"><b>Bid Submitted !</b></span>';
                  }

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
                  </div>
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

<?php if($bypost_user_id != $user_id) { ?>
<?php if($profile_type != 4){ ?>
<div class="w3-padding w3-margin-bottom" id="Bidding_Div">
  <form id="Bidding_Form" name="Bidding_Form" enctype="multipart/form-data">
    <input type="hidden" name="project_id" id="project_id" value="<?php echo $project_Id; ?>">
    <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>">
    <input type="hidden" name="user_name" id="user_name" value="<?php echo $user_name; ?>">
    <div class="row">
      <div class="w3-col l12">
        <div class="w3-padding row w3-col l12">
          <div class="w3-col l2 ">
            <label>Your Bid For Project.</label>
            <span class="w3-text-red">*</span>
            <div class="input-group">
              <input type="number" class="form-control input-md" min="1" name="Project_Bid" id="Project_Bid" required>
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
      <div class="">
        <h5 ><b>Additional Information</b></h5>
      </div>
      <div class="w3-col l12 ">
        <label>Cover Letter (optional):</label>
        <textarea class="form-control" rows="6" cols="80" name="Cover_Letter" id="Cover_Letter" style=" resize: none;"></textarea>
      </div>
      <div class="w3-col l12 ">
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


