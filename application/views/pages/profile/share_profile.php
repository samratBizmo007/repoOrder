<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
error_reporting(E_ERROR | E_PARSE);
$user_id=$New_userID;
$profile_type=$New_profile_type;

//echo $profile_type;
//echo $user_id;
$profile_value='';
switch ($profile_type) {
      //-------------case Freelancer  ----------------//    
  case '1':
  $profile_value='Freelancer' ;   
  break;

      //-------------case Freelancer Employer----------------//
  case '2':
  $profile_value='Freelancer Employer';    
  break;

      //-------------case Job Seeker----------------//
  case '3':
  $profile_value='Job Seeker' ;   
  break;

      //-------------case Job Employer----------------//
  case '4':
  $profile_value='Job Employer' ;   
  break;    
}    
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Share Profile</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
<!--  <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">-->
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/view_profile.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
<!--   <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css">-->
  
 
  
  <script type="text/javascript" src="<?php echo base_url(); ?>css/js/jquery.min.js"></script>
  
  <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/js/const.js"></script>
 <style>
  .main{
    height: 250px;
  }
</style>

<!--<script>
  $(document).ready(function() {
    $('.content').richText();
  });
       </script>-->
  <!-- <script>
  $(document).ready(function() {
    $("#jm_portfolio_details").Editor();
  });
</script> -->
</head>
<body class="">
  <?php 
  $user_feedbackCount=0;
 // print_r($all_userFeedback);
  if($all_userFeedback['status']==200){
    $user_feedbackCount=count($all_userFeedback['status_message']);
  }
  ?>
  <?php
  //print_r($all_userDetails);
  if($all_userDetails['status']==200){
    foreach ($all_userDetails['status_message'] as $details) {
        //print_r($details);
            if ($details['jm_user_name']=='')
            {
                ?><div class="w3-col l12 w3-margin-top container">              
                    <div class="w3-center">
                         <span><strong>Please Update your Profile Before Share..!</strong></span>
                     </div>
                    <div class="w3-center">
                         <span> Go To: dashboard -> profile ->Edit Profile</span>  
                    </div>
                </div>
            <?php } else {?>
      <div class="w3-row w3-padding" id="mainDiv">
        <div class="col-lg-2"></div>
        <div class="w3-col l8 w3-margin-top w3-margin-bottom">
          <div class="w3-col l8">
            <div class="w3-col l5 w3-padding-xxlarge">
              <?php 
              // echo $details['jm_profile_image']; 
              $prof_image=base_url().$details['jm_profile_image'];
              if($details['jm_profile_image']==''){
                echo '<div class="col-lg-12 w3-circle prof_pic bg_imageConfig" style="background-image: url(\''.base_url().'images/default_male.png\'); max-height: 130px; width: 130px;"></div>';
              }              
              else{
                echo '<div class="col-lg-12 w3-circle prof_pic bg_imageConfig" style="background-image: url(\''.base_url().$details['jm_profile_image'].'\'),url(\''.base_url().'images/default_male.png\'); height: 130px; width: 130px;"></div>';
              }

              ?>              
            </div>
            <?php 
            $user_name='';
            $avg_rating='';
            $membership_rating='';
            $project_cost='';
            $project_completed='';
            $payment_verified='';
            $profile_completed='';
            $email_verified='';
            $phone_verified='';

            $payment_verified_text='Not Verified';
            $profile_completed_text='Not Completed';
            $email_verified_text='Not Verified';
            $phone_verified_text='Not Verified';

            if($all_userInfo['status']=='200'){
              foreach ($all_userInfo['status_message'] as $key) {
                  //print_r($key);
                $user_name=$key['jm_username'];
                $avg_rating=$key['jm_avg_rating'];
                $membership_rating=$key['jm_membership_rating'];
                $project_cost=$key['jm_project_cost'];
                $project_completed=$key['jm_project_completed'];
                $joiningdate = $key['joining_date'];
                if($key['payment_verified']!=0){
                  $payment_verified='w3-green';
                  $payment_verified_text='Verified';
                }
                if($key['profile_completed']!=0){
                  $profile_completed='w3-green';
                  $profile_completed_text='Completed';
                }
                if($key['email_verified']!=0){
                  $email_verified='w3-green';
                  $email_verified_text='Verified';
                }
                if($key['phone_verified']!=0){
                  $phone_verified='w3-green';
                  $phone_verified_text='Verified';
                }
              }
            }

            ?>
            <div class="w3-col l7 w3-padding">
              <?php 
              if($details['jm_user_name']!=''){
                ?>
                <div class="w3-col l12"><label class="w3-xlarge"><?php echo $details['jm_user_name']; ?></label></div>
                <?php } 
                else{
                  echo '<div class="w3-col l12"><label class="w3-xlarge">Enter your name</label></div>';
                }
                ?>

                <?php 
                if($details['jm_userDesignation']!=''){
                  ?>
                  <div class="w3-col l12"><span class="w3-large bluish-green"><?php echo $details['jm_userDesignation']; ?></span></div>
                  <?php } 
                  else{
                    echo '<div class="w3-col l12"><span class="w3-large bluish-green">Your Designation</span></div>';
                  }
                  ?>
                  <div class="w3-col l12 marginTop_large">
                    <div class="w3-col l12">
                      <?php 
                      if($details['jm_userCity']!=''){
                        ?>
                        <span class="w3-small"><i class="w3-large fa fa-map-marker"></i> <?php echo $details['jm_userCity'].', '.$details['jm_userState'].', '.$all_userDetails['country']; ?>.</span><br>
                        <span class="w3-tiny w3-text-grey">Member since <?php echo date('M d,Y', strtotime($joiningdate)); ?>.</span>
                        <?php } 
                        else{
                          echo '<span class="w3-small"><i class="w3-large fa fa-map-marker"></i> where are you from?</span><br>
                          <span class="w3-tiny w3-text-grey">Member since '.date('M d,Y', strtotime($details['joining_date'])).'.</span>';
                        }
                        ?>
                      </div>
                    </div>        
                  </div>
                </div>
                <div class="w3-col l4">
                  <div class="w3-col l12 w3-margin-top w3-padding-top"><span class="w3-right w3-border w3-padding-tiny w3-padding-right w3-padding-left w3-round-xlarge"><?php echo $profile_value; ?></span></div>
                  <div class="w3-col l12 marginTop_large2">
                    <div class="w3-col l12 w3-padding-top">
                      <br>
                    </div>
                  </div> 
                </div>
              </div>
              <div class="col-lg-2"></div>
            </div>

            <!-- div with small buttons row -->
            <div class="w3-row w3-padding w3-text-white w3-black">
              <div class="w3-col l12 ">
                <div class="col-lg-2"></div>
                <div class="w3-col l8">
                  <div class="w3-col l4">

                   <a href="#" class="btn w3-hover-black w3-text-white">
                    <span class="" ><i title="<?php echo $profile_completed_text; ?>" class="fa fa-user-o <?php echo $profile_completed; ?> w3-circle w3-medium w3-border w3-padding-tiny"></i></span>
                  </a>
                  <a href="#" class="btn w3-hover-black w3-text-white">
                    <span class="" ><i title="<?php echo $payment_verified_text; ?>" class="fa fa-dollar <?php echo $payment_verified; ?> w3-circle w3-medium w3-border w3-padding-tiny"></i></span>
                  </a>
                  <a href="#" class="btn w3-hover-black w3-text-white">
                    <span class="" ><i title="<?php echo $email_verified_text; ?>" class="fa fa-inbox <?php echo $email_verified; ?> w3-circle w3-medium w3-border w3-padding-tiny"></i></span>
                  </a>
                  <a href="#" class="btn w3-hover-black w3-text-white">
                    <span class="" ><i title="<?php echo $phone_verified_text; ?>" class="fa fa-phone <?php echo $phone_verified; ?> w3-circle w3-medium w3-border w3-padding-tiny"></i></span>
                  </a>
                </div>
                <div class="w3-col l6 w3-hide">
                  <center>
                    <a href="#" class="btn bluishGreen_bg w3-hover-white w3-round-xxlarge w3-padding-tiny w3-padding-left w3-padding-right w3-text-white">
                      <span class="w3-large"><b>HIRE</b> </span>
                    </a>
                  </center>
                </div>
                <?php $user_id=$this->session->userdata('user_id');
                //echo $user_id;?>
              
              </div>
              <div class="col-lg-2"></div>       
            </div>
          </div>
          <!-- div ended -->

          <!-- div for about details of user and it's score row -->
          <?php 
          $hide_fullDiv="";
          $hide_rateDiv="";
          $hide_extraDiv="";
          switch ($profile_type) {
      //-------------case Freelancer  ----------------//    
            case '1':
  //$hide_fullDiv="w3-hide";
            $hide_extraDiv="w3-hide";
            break;

      //-------------case Freelancer Employer----------------//
            case '2':
  //$hide_fullDiv="w3-hide";
            $hide_rateDiv="w3-hide"; 
            $hide_extraDiv="w3-hide";
            
            break;

      //-------------case Job Seeker----------------//
            case '3':

            $hide_fullDiv="w3-hide";
  //$hide_rateDiv="w3-hide";
            break;

      //-------------case Job Employer----------------//
            case '4':
  // $hide_fullDiv="w3-hide";
            $hide_rateDiv="w3-hide"; 
            $hide_extraDiv="w3-hide"; 
            break;
          }
          ?>
          <div class="w3-row w3-margin-bottom w3-text-black w3-light-grey">
            <div class="w3-col l12 w3-padding">
              <br>
              <div class="col-lg-2"></div>
              <div class="w3-col l8 ">
                <div class="w3-col l6 w3-padding">
                  <div class="w3-col l12"><label class="w3-medium">About Me</label></div>
                  <div class="w3-col l12 w3-text-grey">
                    <p>
                      <?php 
                      if($details['jm_userDescription']=='' || $details['jm_userDescription']=='<div><br></div>'){
                        echo 'Tell us something about yourself...';
                      }
                      else{
                        echo $details['jm_userDescription'];
                        
                      }
                      ?>
                    </p>
                  </div>
                </div>
                <div class="w3-col l6 w3-padding w3-border-left <?php echo $hide_extraDiv; ?>">
                  <div class="w3-col l12"><label class="w3-medium">My Aspirations</label></div>
                  <div class="w3-col l12">
                    <p class="w3-text-grey">
                      <?php 
                      if($details['jm_userAspiration']=='' || $details['jm_userAspiration']=='<div><br></div>'){
                        echo 'Explore your Aspirations...';
                      }
                      else{
                        echo $details['jm_userAspiration'];
                        
                      }
                      
                      ?>
                    </p>
                    <p>
                     <?php 
                     if($details['expected_salary']==''){
                      echo 'N/A';
                    }
                    else{
                      ?>
                      <label class="w3-small"><i class="fa fa-money w3-medium"></i> Expected Salary : <span class="w3-text-grey"><?php echo $details['expected_salary']; ?></span></label>
                      <?php } ?>
                      <br>
                      <label class="w3-small"><i class="fa fa-linkedin-square w3-medium"></i> Linked In :</label> <a class="w3-text-blue" href="<?php echo $details['jm_linkedIn_url']; ?>"><span><?php echo $details['jm_linkedIn_url']; ?></span></a>
                    </p>
                  </div>
                </div>
                <div class="w3-col l6 <?php echo $hide_fullDiv; ?>">
                  <div class="w3-col l6 w3-border-right w3-border-left <?php echo $hide_rateDiv; ?>" style="padding: 0 32px 16px 32px">
                    <div class="w3-col l12 w3-padding">
                        <div class="col-lg-12 w3-white w3-padding-top w3-center w3-circle prof_pic">
                            <div class="w3-padding-top" style=" width: auto;"><h2 style=" font-size: 45px;"><i class="fa fa-inr"></i> <?php echo $details['jm_ratePerHr']; ?></h2>
                          <span>INR/hr</span></div>
                        </div>
                      </div>

                      <div class="w3-col l12 w3-center">                  
                        <span class="stars" data-rating="<?php echo $avg_rating; ?>" data-num-stars="5" ></span><br>

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
                        <span class="w3-text-grey w3-small"><?php echo $user_feedbackCount; ?> Feedback</span>
                      </div>          
                    </div>
                    <div class="w3-col l6 w3-padding <?php if($profile_type==1 || $profile_type== 2){echo '';}else{ echo 'w3-hide';} ?>">
                      <!-- progress bar div -->
<!--                      <?php print_r($percentage);?>-->
                      <div class="w3-col l12 w3-small  w3-padding-small">
                        <span><i class="w3-medium fa fa-check-square-o"></i>&nbsp;Jobs Completed</span> 
                        <div class="w3-col l10" style="padding-top: 7px">
                          <div class="w3-round-xlarge progress w3-border">
                            <div class="w3-green w3-round-large progress" style="width: <?php echo number_format($percentage['percentage'],2);?>%"></div>              
                          </div>
                        </div>           
                        <div class="w3-col l2">
                          <span class="w3-medium" style="padding-top: 0"><b>&nbsp;<?php echo number_format($percentage['percentage'],2);?>%</b></span><br>
                        </div>  
                      </div>
                      <!-- progress bar ends -->

                      <!-- progress bar div -->
                      <div class="w3-col l12 w3-small  w3-padding-small">
                        <span><i class="w3-small fa fa-dollar w3-circle"></i>&nbsp;On Budget</span> 
                        <div class="w3-col l10" style="padding-top: 7px">
                          <div class="w3-round-xlarge progress w3-border">
                            <div class="w3-green w3-round-large progress" style="width: <?php echo number_format($percentage['percentage_budget'],2);?>%"></div>              
                          </div>
                        </div>           
                        <div class="w3-col l2">
                          <span class="w3-medium" style="padding-top: 0"><b>&nbsp;<?php echo number_format($percentage['percentage_budget'],2);?>%</b></span><br>
                        </div>  
                      </div>
                      <!-- progress bar ends -->

                      <!-- progress bar div -->
                      <div class="w3-col l12 w3-small  w3-padding-small">
                        <span><i class="w3-small fa fa-hourglass-half"></i>&nbsp;On Time</span> 
                        <div class="w3-col l10" style="padding-top: 7px">
                          <div class="w3-round-xlarge progress w3-border">
                            <div class="w3-green w3-round-large progress" style="width: <?php echo number_format($percentage['percentage_time'],2);?>%"></div>              
                          </div>
                        </div>           
                        <div class="w3-col l2">
                          <span class="w3-medium" style="padding-top: 0"><b>&nbsp;<?php echo number_format($percentage['percentage_time'],2);?>%</b></span><br>
                        </div>  
                      </div>
                      <!-- progress bar ends -->

                    </div>
                  </div>
                </div>
                <div class="col-lg-2"></div>       
              </div>
            </div>
            <!-- div ended -->

            <!-- div for skills and experience row -->
            <div class="w3-row w3-margin-bottom w3-text-black">
              <div class="w3-col l12 w3-padding">
                <br>
                <div class="col-lg-2"></div>
                <div class="w3-col l8 ">
                  <div class="col-lg-2 <?php if($profile_type==2 || $profile_type==4){echo '';}else{echo 'w3-hide';} ?>"></div>
                  <div class="w3-col l4 w3-padding <?php if($profile_type==1 || $profile_type==3){echo '';}else{echo 'w3-hide';} ?>">
                    <div class="w3-col l12 w3-card-2">
                      <center>
                        <h5>My Skills</h5><!-- <?php print_r($all_userSkills);  ?> -->
                        <center> <div class=""><img src="<?php echo base_url(); ?>images/desktop/image25.png" style="margin-top:-41px;"></div></center>
                      </center>

                      <div class="w3-col l12">
                        <?php 
                        if($all_userSkills['status']!=200){
                          echo '<center><label class="w3-small w3-text-grey">'.$all_userSkills['status_message'].'</label></center>';
                        }
                        else{
                          if(empty($all_userSkills['status_message'])){
                            echo '<center><label class="w3-small w3-text-grey">All Skills were removed!!!</label></center>';
                          }
                          else{
                            echo '<div class="skill_column mid_divProfile">';
                            echo '<ul style="padding-left:10px;list-style-type:none">';
                            foreach($all_userSkills['status_message'] as $result) { 
                              echo '<li style="text-align: left"><i class="fa fa-circle"></i>'.$result['jm_skill_name'].'</li>';
                            }
                            echo '</ul>';
                            echo '</div>';
                          }
                        }
                        ?>         
                        <div class="w3-col l12 w3-center">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="w3-col l4 w3-padding">
                    <div class="w3-col l12 w3-card-2">
                      <center>
                        <h5>Education</h5><!-- <?php print_r($all_userSkills);  ?> -->
                        <center><div class=""><img src="<?php echo base_url(); ?>images/desktop/image25.png" style="margin-top:-41px;"></div></center>
                      </center>

                      <?php 
                      if($details['jm_education']==''){
                        echo '<center><label class="w3-small w3-text-grey">No Education Details added!!!</label></center>';
                      }
                      else{
                        if(empty($details['jm_education'])){
                          echo '<center><label class="w3-small w3-text-grey">All Education details were removed!!!</label></center>';
                        }
                        else{
                          ?>
                          <div class="w3-col l12 w3-padding mid_divProfile">
                            <?php 
                            foreach(json_decode($details['jm_education'],TRUE) as $result) { 
                        //print_r($result);
                              if($result['jm_course']==''){
                                echo '<center><label class="w3-small w3-text-grey">No Education Details added!!!</label></center>';
                              }
                              else{
                                ?>
                                <div class="w3-col l12  w3-margin-bottom w3-border-bottom ">
                                  <div class="w3-col l6 s6">
                                    <label class="w3-left"><?php echo $result['jm_course']; ?></label>
                                  </div>
                                  <div class="w3-col l6 s6">
                                    <label class="w3-right"><?php echo $result['jm_passing_year']; ?></label>
                                  </div>
                                  <div class="w3-col l12" >
                                    <span class="w3-tiny w3-text-grey"><?php echo $result['jm_university']; ?></span>
                                  </div>
                                </div>
                                <?php
                              }
                            } ?>
                          </div>
                          <?php 
                        }
                      } ?>

                      <div class="w3-col l12 w3-center">
                      </div>
                    </div>
                  </div>
                  <div class="w3-col l4 w3-padding">
                    <div class="w3-col l12 w3-card-2">
                      <center>
                        <h5>Experience</h5><!-- <?php print_r($all_userSkills);  ?> -->
                        <center> <div class=""><img src="<?php echo base_url(); ?>images/desktop/image25.png" style="margin-top:-41px;"></div></center>
                      </center>

                      <?php 
                      if($details['jm_experience']==''){
                        echo '<center><label class="w3-small w3-text-grey">No Experience Details added!!!</label></center>';
                      }
                      else{
                        if(empty($details['jm_experience'])){
                          echo '<center><label class="w3-small w3-text-grey">All Experiences were removed!!!</label></center>';
                        }
                        else{
                          ?>
                          <div class="w3-col l12 w3-padding mid_divProfile">
                            <?php 
                            foreach(json_decode($details['jm_experience'],TRUE) as $result) {
                        //print_r($result); 
                             if($result['jm_designation']==''){
                              echo '<center><label class="w3-small w3-text-grey">No Education Details added!!!</label></center>';
                            }
                            else{
                              ?>
                              <div class="w3-col l12  w3-margin-bottom w3-border-bottom ">
                                <div class="w3-col l6 s6">
                                  <label class="w3-left"><?php echo $result['jm_designation']; ?></label>
                                </div>
                                <div class="w3-col l6 s6">
                                  <label class="w3-right"><?php echo date_format(date_create($result['jm_worked_till']),'M Y'); ?></label>
                                </div>
                                <div class="w3-col l12">
                                  <span class="w3-tiny w3-text-grey"><?php echo $result['jm_organisation']; ?></span>
                                </div>
                              </div>
                              <?php 
                            }
                          } ?>
                        </div>
                        <?php 
                      }
                    } ?>

                    <div class="w3-col l12 w3-center">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2"></div>       
            </div>
          </div>
          <!-- div ended -->

          <!-- div for show and add portfolio row -->
          <div class="w3-row w3-margin-bottom w3-text-black">
            <div class="w3-col l12 w3-padding">
              <br>
              <div class="col-lg-2"></div>
              <div class="w3-col l8 ">
                <div class="w3-col l12">
                  <center >
                    <h3>Portfolio and Projects</h3>
                    <center> <div class=""><img src="<?php echo base_url(); ?>images/desktop/image25.png" style="margin-top:-41px;"></div></center>
                  </center>
                </div>

                <div class="w3-col l12" id="portfolio_list">
                  <?php 

                  if($all_userPortfolio['status']!=200){
                    echo '<center class="w3-light-grey w3-padding"><label class="w3-medium w3-text-grey">'.$all_userPortfolio['status_message'].'</label></center>';
                  }
                  else{
                    foreach ($all_userPortfolio['status_message'] as $key) { ?>

                    <div class="w3-col l3 w3-padding-small">
                      <div class="w3-col l12  w3-round-large">
                        <a class="btn w3-small w3-right" style="padding:0;margin:0" title="Remove"><i class="w3-text-grey fa fa-remove" onclick="del_portfolio('<?php echo $key['jm_portfolio_id']; ?>')"></i></a>
                        <a style="padding:0;margin:0" data-toggle="modal" data-target="#Portfolio_<?php echo $key['jm_portfolio_id']; ?>" class="btn profile_portfolio">
                          <img class="img img-thumbnail" alt="Portfolio Image not found" style="height: 100%; width: 100%; object-fit: contain" src="<?php echo base_url().''.$key['jm_portfolio_file']; ?>" onerror="this.src='<?php echo base_url()?>images/default_image.png'">
                        </a>
                      </div>
                    </div>

                    <!-- Modal -->
                    <div id="Portfolio_<?php echo $key['jm_portfolio_id']; ?>" class="modal fade" role="dialog"><!--  modal for vshow portfolio information -->
                      <div class="modal-dialog modal-lg">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <!-- <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div> -->
                          <div class="modal-body w3-small bluishGreen_bg w3-round-large">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div class="w3-container w3-text-white w3-margin-bottom">
                              <div class="w3-col l5 w3-margin-top w3-white w3-round-large">
                                <img class="img img-thumbnail" alt="Portfolio Image not found" style="height: 100%; width: 100%; object-fit: contain" src="<?php echo base_url().''.$key['jm_portfolio_file']; ?>" onerror="this.src='<?php echo base_url()?>images/default_image.png'">
                              </div>
                              <div class="w3-col l7 w3-padding" style="height: 300px;">
                                <h3 class="w3-text-white">Portfolio Details</h3>
                                <div class="w3-col l12">
                                  <p class="w3-medium w3-text-lightgrey"><?php echo $key['jm_portfolio_details']; ?></p>
                                </div>
                              </div>
                            </div>
                          </div>  
                        </div>
                      </div>
                    </div>
                    <!-- modal ends here -->
                    <?php
                  }
                }
                ?>
              </div>
              <div id="del_portMsg" style="position: fixed;"></div>
              <div class="w3-col l12">
                <center>
                </center>
                <!-- add portfolio collapsible div -->
                <div class="" >
                  <!-- Modal -->
                  <div id="addPortfolio" class="modal fade" role="dialog"><!--  modal for add vendor information -->
                    <div class="w3-display-topright w3-margin" id="msg" style="z-index: 4;position: fixed;">
                    </div>
                    <div class="modal-dialog modal-lg">
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header bluishGreen_bg">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <div class="w3-center"><h3 class="w3-text-white">Add Portfolio or Projects</h3></div>
                        </div>
                        <div class="modal-body w3-small">
                          <!-- add portfolio form -->
                          <form id="post_form" name="post_form" enctype="multipart/form-data">
                            <div class="w3-container">
                              <div class="w3-col l12">
                                <div class="w3-col l5">
                                  <label class="w3-label w3-text-black w3-margin-top w3-margin-left w3-medium">Upload Image:</label>
                                  <img src="" width="80%" id="portfolio_imagePreview" alt="NOTE: Add your project image, screenshot or portfolio snaps here. Use proper image format as png, jpg, jpeg, gif." class="w3-margin w3-centerimg img img-thumbnail">
                                  <div class="w3-col l11 w3-padding">
                                    <input type="file" class="w3-input" name="portfolio_image" id="portfolio_image">
                                  </div>
                                </div>
                                <div class="w3-col l7">
                                  <label class="w3-label  w3-text-black w3-margin-top w3-medium">Add Description:</label>
                                  <div class="page-wrapper scrolly box-content" style="padding-right: 5px;max-height: 350px;overflow: scroll;">
                                    <textarea id="jm_portfolio_details" class="content " name="jm_portfolio_details"  rows="7" placeholder="Describe you here..." ></textarea> 
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="w3-col l12 w3-margin-top w3-center">
                                  <button type="submit" class="w3-button w3-margin w3-round-xlarge w3-small btn-lg w3-hover-black w3-text-white bluishGreen_bg">Add Portfolio</button>
                                </div>
                              </div>
                            </div>
                          </form>
                          <!-- form ends for add portfolio-->
                        </div>  
                      </div>
                    </div>
                  </div>
                </div>
                <!-- div ending -->
              </div>

            </div>
            <div class="col-lg-2"></div>       
          </div>
        </div>
        <!-- div ended -->

        <!-- div for show feedback and reviews row -->
        <?php if($profile_type == 1 || $profile_type == 2) {?>
        <!-- div for show feedback and reviews row -->
        <div class="w3-row w3-margin-bottom w3-text-black">
          <div class="w3-col l12 w3-padding">
            <br>
            <div class="col-lg-2"></div>
            <div class="w3-col l8 ">
              <div class="w3-col l12">
                <center >
                  <h3>Past Work and Feedback</h3>
                  <center> <div class=""><img src="<?php echo base_url(); ?>images/desktop/image25.png" style="margin-top:-41px;"></div></center>
                </center>
              </div>

              <div class="w3-col l12">
                <?php 
                
                if($all_userFeedback['status']!=200){
                  echo '<center class="w3-light-grey w3-padding"><label class="w3-medium w3-text-grey">'.$all_userFeedback['status_message'].'</label></center>';
                }                    
                else {
                  foreach ($all_userFeedback['status_message'] as $key) {
                      //print_r($key);
                    ?>
                    <div class="w3-col l6 w3-padding-small w3-margin-bottom">
                      <div class="w3-col l12 w3-card-2 w3-padding ">
                        <div class="w3-col l2">
                          <div id="image_<?php echo $key['jm_project_id']; ?>" class="w3-col l12 s3 w3-light-grey w3-circle w3-margin-top feedback_pic bg_imageConfig" style="background-image: url('<?php echo base_url(); ?>images/default_male.png');"></div>
                        </div>
                        <div class="w3-col l10">
                          <div class="w3-col l12 w3-padding">
                            <div class="w3-col l12 w3-padding-bottom" style="height: 100px;overflow: hidden">
                              <h5><?php echo $key['jm_project_title'] ?></h5>
                              <p class="w3-medium w3-text-grey" ><i class="fa fa-quote-left">
                                &nbsp;<?php echo $key['jm_feedback_comment']; ?>.&nbsp;<i class="fa fa-quote-right"></i></i>
                              </p>
                            </div>
                              <script>
                                $(document).ready(function() {
                                var profile_type = <?php echo $profile_type; ?>;
                                if(profile_type == 1){
                                    getEmployer_Details('<?php echo $key['jm_emp_id']; ?>','<?php echo $key['jm_project_id']; ?>','<?php echo $profile_type; ?>');
                                }else{
                                    getEmployer_Details('<?php echo $key['jm_freelance_id']; ?>','<?php echo $key['jm_project_id']; ?>','<?php echo $profile_type; ?>');
                                }
                                });
                              </script>
                            <div class="w3-col l12 w3-margin-top" id="data_<?php echo $key['jm_project_id']; ?>">
                              <div class="w3-col l7" id="emaployerDetails_<?php echo $key['jm_project_id']; ?>">
<!--                                <span class="w3-tiny" id=""><i>By Demo_user on December 2017.</i></span>-->
                              </div>
                              <div class="w3-col l5" id="employerCity_<?php echo $key['jm_project_id']; ?>">
<!--                                <span class="w3-small"><i class="w3-large fa fa-map-marker"></i> Pune, India.</span><br>-->
                              </div>
                            </div>
                            <div class="w3-col l5 w3-padding-top" id="employerRatings_<?php echo $key['jm_project_id']; ?>">
                              <span class="stars" id="rating_<?php echo $key['jm_project_id'];?>" data-rating="" data-num-stars="5" ></span><br>
                              <span class="badge"></span><br>
                            </div>
                           <?php if($profile_type == 1) {?>
                            <div class="w3-col l7 w3-padding-top">
                              <span class="w3-small"><i class="fa fa-inr"></i> <?php echo $details['jm_ratePerHr']; ?> INR/hr</span><br>
                            </div>
                           <?php } ?>
                          </div>
                        </div>
                      </div>
                    </div> 
                    <?php 
                  }
                }
                ?>

              </div>

            </div>
            <div class="col-lg-2"></div>       
          </div>
        </div>
        <?php } ?>
        <!-- div ended -->

        <?php 
      }
    }
  }
    ?>

  </body>
  </html>
<script>
  function getEmployer_Details(emp_id,project_id,profile_type){
      //alert(emp_id);
    $.ajax({
    type: "POST",
    url: "<?php echo base_url(); ?>profile/share_profile/getEmployer_Details",
    dataType: "text",
    data: {
      emp_id: emp_id,
      project_id: project_id,
      profile_type: profile_type
    },
    cache: false,
    success: function(data) {
        //alert(data);
      //$('#data_'+project_id).html(data);       
      var key=JSON.parse(data);
      for(i=0; i< key.length; i++){   
      var userName = '';
      if(key[i].jm_user_name == ''){
         userName = 'N/A'; 
      }else {
         userName = key[i].jm_user_name; 
      }
      var postingDate = '';
      if(key[i].dated == ''){
         postingDate = 'N/A'; 
      }else {
         postingDate = key[i].dated; 
      }
      var rate = parseFloat(key[i].freelancerRatings).toFixed(1);
      var ratings = rate.split('.');
      var rating = '';
      if(ratings[1] == '0'){
          rating = Math.round(rate);
      }else{
          rating = rate;
      }

      var city = '';
      if(key[i].jm_userCity == ''){
         city = 'N/A'; 
      }else {
         city = key[i].jm_userCity; 
      }
      var image = '';
      if(key[i].jm_profile_image == ''){
         image = 'images/default_male.png'; 
      }else {
         image = key[i].jm_profile_image; 
      }
      $('#emaployerDetails_'+project_id).html('<span class="w3-tiny"><i>By '+ userName +' on '+ postingDate +'.</i></span>');
         $('#employerCity_'+project_id).html('<span class="w3-small"><i class="w3-large fa fa-map-marker"></i> '+city+' .</span><br>');
         $('#employerRatings_'+project_id).html('<span class="stars" data-rating='+rating+' data-num-stars="5" ></span><br><span class="badge"> '+rating+' </span><br>');
         $('#image_'+project_id).css("background-image", "url("+BASE_URL+""+image+")");
         rate_stars();
        }
      }
    });
  }
  </script>
   <!-- script to dispaly stars -->
                        <script>
                 function rate_stars(){
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
                          }
                        </script>
                        <!-- script to dispaly stars ends-->
