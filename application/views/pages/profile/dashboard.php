<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
error_reporting(E_ERROR | E_PARSE);
$user_name=$this->session->userdata('user_name');
$selected_profile_type=$this->session->userdata('selected_profile_type');
$profile_type=$this->session->userdata('profile_type');

if(($this->session->userdata('selected_profile_type'))==''){
  $selected_profile_type=$profile_type;
}
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
  //echo $this->session->userdata('user_name');   
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>  
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">  
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/tipso.css">
  <script type="text/javascript" src="<?php echo base_url(); ?>css/js/const.js"></script> 
  <script type="text/javascript" src="<?php echo base_url(); ?>css/js/dashboard/dashboard.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/js/tipso.js"></script>
  <style>
  .dashboard_blocks{
    height: 180px;
  }

</style>

</head>
<?php 
$hide_Job="";
$hide_work="";
$myjob='';
$hide_freeRating='';
$hide_empRating='';
$hide_rating='';
$hide_funds='';
$hide_mem='';
$hide_bid='';
$hide_Div='';
$hideView_plans='';
$hide_forFE='w3-hide';
$show_extra='';
$skill_title='My Skills';
$hide_feedback='';
$hide_earnings='';
$joblink="";
switch ($profile_type) {
      //-------------case Freelancer  ----------------//    
  case '1':
  //$hide_fullDiv="w3-hide";
      //$hide_Job="w3-hide"
  $hide_mem='w3-hide';
  $show_extra='w3-hide';
  $hide_empRating='w3-hide';
  $myjob="w3-hide";
  $hide_Job='w3-hide';
  break;

      //-------------case Freelancer Employer----------------//
  case '2':
  $hide_freeRating='w3-hide';
  $hide_bid='w3-hide'; 
  $hide_forFE='';
  $show_extra='w3-hide';
  $skill_title='Required Skills';
  $myjob="w3-hide";
  $hide_Job='w3-hide';
  $hide_earnings='w3-hide';
  $hide_work="w3-hide";
  $hideView_plans='w3-hide';
  break;

      //-------------case Job Seeker----------------//
  case '3':
  $hide_rating='w3-hide';
  $hide_funds='w3-hide';
  $hide_work="w3-hide";
  $hide_bid='w3-hide';
  //$hide_rateDiv="w3-hide";
  break;

      //-------------case Job Employer----------------//
  case '4':
  $hide_Div='w3-hide';
  $myjob="w3-hide"; 
  $hide_work="w3-hide";
  $hide_Job='w3-hide';
  $hideView_plans='w3-hide';
  break;
}
?>
<body class="w3-wide" onload="">
  <div class="w3-container w3-center w3-margin" style="display: none;" id="cover">
    <label class="w3-xlarge" id="spinner_label"></label><br>
    <img src="<?php echo base_url(); ?>css/logos/progress.gif" width="50%" height="auto">
  </div>
  <div class="w3-row w3-black" id="mainDiv">
    <div class="col-lg-2"></div>
    <div class="w3-col l8">
      <div class="col-lg-12 w3-text-light-grey w3-margin-top w3-padding-bottom">
        <div class="w3-col l5 w3-hide w3-left w3-padding-left w3-margin-bottom">
          <div class="w3-col l4 s4 w3-padding-top">
            <label class="w3-medium">View profile:</label>
          </div>
          <div class="w3-col l8 s8 w3-text-black">
            <select class="w3-round-xxlarge w3-padding-small form-control" id="select_profileList" name="skill">
              <option value="1" <?php if($selected_profile_type=='1'){ echo 'selected'; } ?>>Freelancer</option>                  
              <option value="2" <?php if($selected_profile_type=='2'){ echo 'selected'; } ?>>Freelance Employer</option>                  
              <option value="3" <?php if($selected_profile_type=='3'){ echo 'selected'; } ?>>Job Seeker</option>                  
              <option value="4" <?php if($selected_profile_type=='4'){ echo 'selected'; } ?>>Job Employer</option>                  
            </select>
          </div>
        </div>
        <div class="w3-col l7 w3-right w3-margin-bottom">
          <!-- desktop menu -->
          <div class="w3-col l12 w3-hide-small">

            <span class="w3-right">
              <a href="<?php echo base_url(); ?>profile/view_profile" class="btn w3-padding-tiny w3-margin-left  w3-text-white">              
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-user fa-stack-1x " style="color:#000000"></i>
                </span>&nbsp;PROFILE
              </a>
              
              <a href="<?php echo base_url(); ?>project/project_listing" class="btn <?php echo $hide_work; ?> w3-padding-tiny w3-margin-left w3-text-white">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-search fa-stack-1x " style="color:#000000"></i>
                </span>&nbsp;FIND WORK
              </a> 
              <?php ?>
              <a href="<?php echo base_url() ?>jobseeker/jobseeker_lists" class="btn <?php echo $hide_Job; ?> w3-margin-left w3-text-white w3-padding-tiny">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-search fa-stack-1x " style="color:#000000"></i>
                </span>&nbsp;FIND JOBS
              </a>            
            </span>
          </div>
          <!-- desktop menu end -->

          <!-- mobile menu -->
          <div class="span11 w3-hide-large  scroll_mob" style="overflow: auto;">
            <div class="row-fluid">
              <div class="horizontal">
                <div class="w3-col l12">
                  <span class="w3-right">              
                    <a href="<?php echo base_url(); ?>profile/view_profile" class="btn w3-margin-left w3-text-white w3-padding-tiny" >
                      <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-user fa-stack-1x " style="color:#000000"></i>
                      </span>&nbsp;PROFILE
                    </a>
                    <a href="<?php echo base_url(); ?>project/project_listing" class="btn <?php echo $hide_work; ?> w3-padding-tiny w3-margin-left  w3-text-white">
                      <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-search fa-stack-1x " style="color:#000000"></i>
                      </span>&nbsp;FIND WORK
                    </a> 
                    <?php ?>
                    <a href="<?php echo base_url(); ?>jobseeker/jobseeker_lists" class="btn <?php echo $hide_Job; ?> w3-margin-left w3-text-white w3-padding-tiny">
                      <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-search fa-stack-1x " style="color:#000000"></i>
                      </span>&nbsp;FIND JOBS
                    </a>            
                  </span>
                </div>
              </div>
            </div>
          </div>
          <!-- mobile menu end -->
        </div>

        <!-- desktop grid scroll view -->
        <div class="w3-col l12 <?php echo $hide_Div; ?> w3-hide-small ">
          <div class="w3-col l12 w3-margin-top w3-padding-top w3-margin-bottom">
            <div class="">

              <div class="col-lg-3  w3-padding-small <?php echo $show_extra; ?>" ></div>
              <div class="col-lg-1  w3-padding-small <?php echo $hide_forFE; ?>" ></div>

              <!-- skill tab start -->
              <div class="w3-col l3 w3-padding-tiny <?php if($profile_type=='2'){ echo 'w3-hide';} ?>">
                <div class="col-lg-12 dashboard_blocks w3-white w3-round">
                  <div class="w3-col l12">
                    <center>
                      <h6><b><?php echo $skill_title; ?></b></h6><!-- <?php print_r($all_userSkills);  ?> -->
                      <center><div class=""><img src="<?php echo base_url(); ?>images/desktop/image25.png" style="margin-top:-26px;"></div></center>
                    </center>
                  </div>
                  <div class="w3-col l12 w3-center  scrollyClass skill" id="style-2" style="height: 80px;overflow-y: scroll">
                   <?php 

                   if($all_userSkills['status']!=200){
                    echo '<center><label class="w3-small w3-text-grey">'.$all_userSkills['status_message'].'</label></center>';
                  }
                  else{
                    if(empty($all_userSkills['status_message'])){
                      echo '<center><label class="w3-small w3-text-grey">All Skills were removed!!!</label></center>';
                    }
                    else{
                      foreach($all_userSkills['status_message'] as $result) { 
                        echo '<span class="w3-white w3-left w3-text-grey w3-round-xxlarge w3-small" style="margin:1px;padding:1px 0px 1px 3px">'.$result['jm_skill_name'].'
                        <a class="btn" onclick="del_userSkill('.$result['skill_id'].')" style="margin:0px;padding:0"><i class="fa fa-times-circle w3-medium" style="padding:2px"></i></a></span>';
                      }
                    }
                  }
                  ?>
                </div>
                <div class="w3-col l12">
                  <div class="w3-col l10 s10 w3-center w3-padding-bottom" style="padding-right: 5px;padding-left: 1px">
                    <input list="skill_list" onClick="this.select();" type="text" name="my_skills" id="my_skills" class="form-control w3-round-xxlarge" placeholder="search skills..." style="padding-left: 10px;">
                    <datalist id="skill_list">
                      <?php 
                      foreach($all_skills['status_message'] as $result) { ?>
                      <option data-value="<?php echo $result['jm_skill_id']; ?>" value="<?php echo $result['jm_skill_name']; ?>"><?php echo $result['jm_skill_name']; ?></option>                  
                      <?php } 
                      ?>
                    </datalist>

                  </div>
                  <div class="w3-col l2 s2 w3-center w3-padding-bottom" style="padding-top: -1px;">
                   <a id="add_userSkill_Btn" name="add_userSkill_Btn" class="btn w3-circle w3-black w3-padding-small"> <i class="fa fa-plus w3-large" style="padding-top:3px"></i></a>
                 </div>

               </div>
               <div class="w3-col l12 w3-text-white" id="skill_msg"></div>
               
             </div>
           </div>
           <!-- skills tab end -->
<?php //print_r($freelancer_ratings);
$communication = '';
$Delivery = '';
$money = '';
$expert = '';
$hire = '';
foreach($freelancer_ratings['status_message'] as $key){
        //print_r($key);
  $communication = $key['communication'];
  $comm = explode(".", $communication);
  if ($comm[1] == 0) {
   $communication = round($communication);
 }else{
  $communication = number_format($key['communication'], 1, '.', '');                
}

$Delivery = $key['delivery'];
$DEl = explode(".", $Delivery);
if($DEl[1] == 0){
  $Delivery = round($Delivery);  
}else{
  $Delivery = number_format($key['delivery'], 1, '.', '');
}


$money = $key['money'];
$mon = explode(".", $money);
if($mon[1] == 0){
 $money = round($money); 
}else{
  $money = number_format($key['money'], 1, '.', '');
}

$expert = $key['expert'];
$exp = explode(".",$expert);
if($exp[1] == 0){
  $expert = round($expert);  
}else{
  $expert = number_format($key['expert'], 1, '.', '');
}

$hire = $key['hire'];
$hi = explode(".", $hire);
if($hi[1] == 0){
  $hire = round($hire);
}else{
  $hire = number_format($key['hire'], 1, '.', '');
}
}
?>
<!-- feedback tab start -->
<div class="w3-col l3  w3-padding-tiny <?php echo $hide_rating; ?>">
  <div class="col-lg-12  dashboard_blocks w3-white w3-round">
    <div class="w3-col l12 ">
      <center>
        <h6><b>My Feedback</b></h6>
        <center> <div class=""><img src="<?php echo base_url(); ?>images/desktop/image25.png" style="margin-top:-26px;"></div></center>
      </center>

      <div class="w3-col l12 w3-center" style="margin-top: 5px">
        <div class="w3-col l12 <?php echo $hide_freeRating; ?>">
          <div class="w3-col l12" style="">
            <div class="w3-col l6 s6  w3-small">
              <span class="w3-left"><b>Communication:</b></span>
            </div>
            <div class="w3-col l6 s6" style="padding-left:10px;">
              <span class="stars w3-left" data-rating="<?php if($communication){ echo $communication; }else{ echo 0; }?>" data-num-stars="5" ></span>
            </div>
          </div>
          <div class="w3-col l12" style="">
            <div class="w3-col l6 s6 w3-small">
              <span class="w3-left"><b>On Time:</b></span>
            </div>
            <div class="w3-col l6 s6" style="padding-left:10px;">
              <span class="stars w3-left" data-rating="<?php if($Delivery != ''){ echo $Delivery; }else{ echo 0; }?>" data-num-stars="5" ></span>
            </div>
          </div>
          <div class="w3-col l12" style="">
            <div class="w3-col l6 s6 w3-small">
              <span class="w3-left"><b>Value money:</b></span>
            </div>
            <div class="w3-col l6 s6" style="padding-left:10px;">
              <span class="stars w3-left" data-rating="<?php if($money != ''){ echo $money; }else{ echo 0; }?>" data-num-stars="5" ></span>
            </div>
          </div>
          <div class="w3-col l12" style="">
            <div class="w3-col l6 s6 w3-small">
              <span class="w3-left"><b>Expertise:</b></span>
            </div>
            <div class="w3-col l6 s6" style="padding-left:10px;">
              <span class="stars w3-left" data-rating="<?php if($expert != ''){ echo $expert; }else{ echo 0; }?>" data-num-stars="5" ></span>
            </div>
          </div>
          <div class="w3-col l12" style="">
            <div class="w3-col l6 s6 w3-small">
              <span class="w3-left"><b>Hire Again?:</b></span>
            </div>
            <div class="w3-col l6 s6" style="padding-left:10px;">
              <span class="stars w3-left" data-rating="<?php if($hire != ''){ echo $hire; }else{ echo 0; }?>" data-num-stars="5" ></span>
            </div>
          </div>
        </div>

<?php //print_r($FreelancEmployer_ratings); 

$communicationemployer = '';
$payment = '';
$requirements = '';
$working = '';
foreach($FreelancEmployer_ratings['status_message'] as $key){

  $communicationemployer = $key['communicationemployer'];
  $commEmploy = explode(".", $communicationemployer);
  if($commEmploy[1] == 0){
    $communicationemployer = round($communicationemployer);
  }else{
    $communicationemployer = number_format($key['communicationemployer'], 1, '.', '');
  }

  $payment = $key['payment'];
  $pay = explode(".", $payment);
  if($pay[1] == 0){
    $payment = round($payment);
  }else{
    $payment = number_format($key['payment'], 1, '.', '');
  }

  $requirements = $key['requirements'];
  $requir = explode(".", $requirements);
  if($requir[1] == 0){
    $requirements = round($requirements);
  }else{
    $requirements = number_format($key['requirements'], 1, '.', '');
  }

  $working = $key['working'];
  $work = explode(".", $working);
  if($work[1] == 0){
    $working = round($working);
  }else{
    $working = number_format($key['working'], 1, '.', '');
  }


//        $payment = number_format($key['payment'], 1, '.', '');
//        $requirements = number_format($key['requirements'], 1, '.', '');
//        $working = number_format($key['working'], 1, '.', '');
}
//echo $communicationemployer;
//echo $payment;
//echo $requirements;
//echo $working;
?>
<!-- freelance employer rating div -->
<div class="w3-col l12 <?php echo $hide_empRating; ?>">
  <div class="w3-col l12" style="">
    <div class="w3-col l6 s6 w3-small">
      <span class="w3-left"><b>Communication:</b></span>
    </div>
    <div class="w3-col l6 s6" style="padding-left:10.5px;">
      <span class="stars w3-left" data-rating="<?php if($communicationemployer != ''){ echo $communicationemployer; }else{ echo 0; }?>" data-num-stars="5" ></span>
    </div>
  </div>
  <div class="w3-col l12" style="">
    <div class="w3-col l6 s6 w3-small">
      <span class="w3-left"><b>Payment:</b></span>
    </div>
    <div class="w3-col l6 s6" style="padding-left:10.5px;">
      <span class="stars w3-left" data-rating="<?php if($payment != ''){ echo $payment; }else{ echo 0; }?>" data-num-stars="5" ></span>
    </div>
  </div>
  <div class="w3-col l12" style="">
    <div class="w3-col l6 s6 w3-small">
      <span class="w3-left"><b>Requirement:</b></span>
    </div>
    <div class="w3-col l6 s6" style="padding-left:10.5px;">
      <span class="stars w3-left" data-rating="<?php if($requirements != ''){ echo $requirements; }else{ echo 0; }?>" data-num-stars="5" ></span>
    </div>
  </div>
  <div class="w3-col l12" style="">
    <div class="w3-col l6 s6 w3-small">
      <span class="w3-left"><b>Work Again?:</b></span>
    </div>
    <div class="w3-col l6 s6" style="padding-left:10.5px;">
      <span class="stars w3-left" data-rating="<?php if($working != ''){ echo $working; }else{ echo 0; }?>" data-num-stars="5" ></span>
    </div>
  </div>              
</div>
<!-- end -->

<!-- <span class="stars" data-rating="<?php echo $avg_rating; ?>" data-num-stars="5" ></span><br> -->

<!-- script to dispaly stars -->
<script>
  $.fn.stars = function() {
    return $(this).each(function() {
      var rating = $(this).data("rating");
      var numStars = $(this).data("numStars");
      var fullStar = new Array(Math.floor(rating + 1)).join('<i class="fa fa-star-o" style="margin-right:2px"></i>');
      var halfStar = ((rating%1) !== 0) ? '<i class="fa fa-star-half-empty" style="margin-right:2px"></i>': '';
      var noStar = new Array(Math.floor(numStars + 1 - rating)).join('<i class="fa fa-star-o" style="margin-right:2px"></i>');
      $(this).html(fullStar + halfStar + noStar);
    });
  }
  $('.stars').stars();
</script>                          
</div>
</div>

</div>
</div>
<!-- feedback ends -->

<!-- funds start -->
<div class="w3-col l3 w3-padding-tiny <?php echo $hide_funds; ?>">
  <div class="col-lg-12 dashboard_blocks w3-white w3-round ">
    <div class="w3-col l12" >
      <center>
        <h6><b>My Funds</b></h6>
        <center><img src="<?php echo base_url(); ?>images/desktop/image25.png" style="margin-top:-26px;"></center>
      </center>
      <div class="w3-col l12 " >
        <center><table class="" style="height: 85px;">
          <tbody>
            <?php                    
            $paid_thisMonth='0.00';
            $paid_toDate='0.00';
            $earn_thisMonth='0.00';
            $earn_toDate='0.00';
            if($all_userTransaction['status']=='200'){
              foreach ($all_userTransaction['status_message'] as $key) {
                $paid_thisMonth=$key['paid_thisMonth'];
                $paid_toDate=$key['paid_toDate'];
                $earn_thisMonth=$key['earn_thisMonth'];
                $earn_toDate=$key['earn_toDate'];
              }
            }
            ?>
            <tr>
              <td class="text-left">Paid this month</td>
              <td class="text-right">&nbsp;&nbsp;<b><i class="fa fa-rupee"></i>  <?php echo $paid_thisMonth; ?></b></td>
            </tr>
            <tr>
              <td class="text-left">Paid to date</td>
              <td class="text-right">&nbsp;&nbsp;<b><i class="fa fa-rupee"></i>  <?php echo $paid_toDate; ?></b></td>
            </tr>
            <tr class="<?php echo $hide_earnings; ?>">
              <td class="text-left">Earned this month</td>
              <td class="text-right">&nbsp;&nbsp;<b><i class="fa fa-rupee"></i>  <?php echo $earn_thisMonth; ?></b></td>
            </tr>
            <tr class="<?php echo $hide_earnings; ?>">
              <td class="text-left">Earned to date</td>
              <td class="text-right">&nbsp;&nbsp;<b><i class="fa fa-rupee"></i>  <?php echo $earn_toDate; ?></b></td>
            </tr>                     
          </tbody>
        </table></center>

        <div class="w3-center w3-col l12 w3-margin-top w3-hide" >
         <a href="" class="btn w3-medium w3-text-black" style="padding:0"><i class="fa fa-money"></i> <b>Financial Dashboard</b></a>   
       </div>                 
     </div>
   </div>

 </div>
</div>
<!-- funds ends -->

<!-- membership start -->
<div class="w3-col l3 w3-padding-tiny <?php echo $hide_bid; ?>" >
  <div class="col-lg-12 dashboard_blocks w3-white w3-round">
    <div class="w3-col l12 w3-padding " >
      <?php                    
      $membership_package='FREE';
      $total_bids='0';
      $avail_bids='0';          

      if($all_userInfo['status']=='200'){
        foreach ($all_userInfo['status_message'] as $key) {
          switch ($key['membership_package']) {
            case 'FREE':
            $membership_package=$key['membership_package'];
            break;

            case 'P/M':
            $membership_package='PREMIUM<b class="w3-large">/</b>M';
            break;

            case 'P/Y':
            $membership_package='PREMIUM<b class="w3-large">/</b>Y';
            break;
          }
          $total_bids=$key['total_bids'];
          $avail_bids=$key['avail_bids'];

          $total_view=$key['total_view'];
          $avail_view=$key['avail_view'];
        }

      }          
      ?>
      <div class="w3-col l12" style="height: 118px;">
        <center class="w3-margin-bottom ">
          <h6 class="" style="color:#00b59e;margin:0px;margin-bottom:17px" ><b>Available Bids</b></h6>
          <span class="w3-black w3-round-xxlarge w3-medium " style="padding:10px 30px 10px 30px"><?php echo $avail_bids; ?> / <?php echo $total_bids; ?></span>
        </center>

        <center class="w3-margin-bottom" style="margin-top:20px;">
          <h6 class="" style="color:#00b59e;margin:0px;margin-bottom:15px" style="margin-bottom:20px"><b>Membership</b></h6>
          <span class="w3-card w3-round-xxlarge w3-medium " style="padding:8px 16px 8px 16px"><i class="fa fa-certificate"></i> <?php
          echo $membership_package; ?></span>
        </center>
      </div>
    </div>
    <div class="w3-col l12 <?php echo $hideView_plans; ?>">
      <center class="w3-padding-top ">
        <a href="<?php echo base_url(); ?>profile/membership_control" class="btn w3-medium w3-center w3-text-black">  <b>view plans</b></a><br>                  
      </center>
    </div>

  </div>
</div>
<!-- membership ends -->

<!-- membership start -->
<div class="w3-col l3 w3-padding-small <?php echo $hide_mem; ?>" >
  <div class="col-lg-12 dashboard_blocks w3-white w3-round">
    <div class="w3-col l12 w3-padding " >
      <?php                    
      $membership_package='FREE';
      $hide='';

      if($all_userInfo['status']=='200'){
        foreach ($all_userInfo['status_message'] as $key) {
          switch ($key['membership_package']) {
            case 'FREE':
            $membership_package=$key['membership_package'];
            break;

            case 'P/M':
            $membership_package='PREMIUM<b class="w3-large">/</b>M';
            break;

            case 'P/Y':
            $membership_package='PREMIUM<b class="w3-large">/</b>Y';
            break;
          }
        }
      }
      if($total_bids==0){
        $hide='w3-hide';
      }
      ?>
      <div class="w3-col l12" style="height: 118px;">         

        <center class="w3-margin-bottom">
          <h6 class="w3-text-bluishGreen"><b>Membership</b></h6>
          <span class="w3-card w3-round-xxlarge w3-padding-tiny w3-large "><i class="fa fa-certificate"></i> <?php echo $membership_package; ?></span>
        </center>
      </div>
    </div>
    <div class="w3-col l12 <?php echo $hideView_plans; ?>">
      <center class="w3-margin-top">
       <a href="<?php echo base_url(); ?>profile/membership_control" class="btn w3-medium w3-text-black"><b>View Plans</b></a><br>                  
     </center>
   </div>

 </div>
</div>
<!-- membership ends -->
</div>
</div>        
</div>
<!-- desktop grid view ends -->

<!-- mobile grid scroll view -->
<div class="w3-col l12 span11 w3-mobile <?php echo $hide_Div; ?> scroll_mob w3-hide-large " style="overflow: auto;">
  <div class="w3-col l12 w3-margin-top w3-padding-top w3-margin-bottom">
    <div class="row-fluid">

      <div class="horizontal"><div class="col-lg-3 w3-padding-small <?php echo $show_extra; ?>" ></div></div>

      <!-- skill tab start -->
      <div class="horizontal">
        <div class="w3-col l3 w3-padding-small <?php if($profile_type=='2'){ echo 'w3-hide';} ?>">
          <div class="col-lg-12 dashboard_blocks w3-white w3-round">
            <div class="w3-col l12">
              <center>
                <h6><b><?php echo $skill_title; ?></b></h6><!-- <?php print_r($all_userSkills);  ?> -->
                <center><div class=""><img src="<?php echo base_url(); ?>images/desktop/image25.png" style="margin-top:-25px;"></div></center>
              </center>
            </div>
            <div class="w3-col l12 w3-center scrollyClass skill" id="style-mob" style="height: 80px;overflow-y: scroll">
             <?php 

             if($all_userSkills['status']!=200){
              echo '<center><label class="w3-small w3-text-grey">'.$all_userSkills['status_message'].'</label></center>';
            }
            else{
              if(empty($all_userSkills['status_message'])){
                echo '<center><label class="w3-small w3-text-grey">All Skills were removed!!!</label></center>';
              }
              else{
                foreach($all_userSkills['status_message'] as $result) { 
                  echo '<span class="w3-white w3-left w3-text-grey w3-round-xxlarge w3-small" style="margin:1px;padding:1px 0px 1px 3px">'.$result['jm_skill_name'].'
                  <a class="btn" onclick="del_userSkill('.$result['skill_id'].')" style="margin:0px;padding:0"><i class="fa fa-times-circle w3-medium" style="padding:2px"></i></a></span>';
                }
              }
            }
            ?>
          </div>
          <div class="w3-col l12">
            <div class="w3-col l10 s10 w3-center w3-padding-bottom" style="padding-right: 5px;padding-left: 1px">
              <input list="skill_list_mob" onClick="this.select();" type="text" name="my_skills_mob" id="my_skills_mob" class="form-control w3-round-xxlarge" placeholder="search skills..." style="padding-left: 10px;">
              <datalist id="skill_list_mob">
                <?php 
                foreach($all_skills['status_message'] as $result) { ?>
                <option data-value="<?php echo $result['jm_skill_id']; ?>" value="<?php echo $result['jm_skill_name']; ?>"><?php echo $result['jm_skill_name']; ?></option>                  
                <?php } 
                ?>
              </datalist>

            </div>
            <div class="w3-col l2 s2 w3-center w3-padding-bottom" style="padding-top: -1px;">
             <a id="add_userSkill_Btn_mob" name="add_userSkill_Btn_mob" class="btn w3-circle w3-black w3-padding-small"> <i class="fa fa-plus w3-large" style="padding-top:3px"></i></a>
           </div>

         </div>
         <div class="w3-col l12 w3-text-white" id="skill_msg_mob"></div>
         
       </div>
     </div>
   </div>
   <!-- skills tab end -->

   <!-- feedback tab start -->
   <div class="horizontal">
     <div class="w3-col l3 w3-padding-small <?php echo $hide_rating; ?>">
      <div class="col-lg-12 dashboard_blocks w3-white w3-round">
        <div class="w3-col l12">
          <center>
            <h6><b>My Feedback</b></h6>
            <center> <div class=""><img src="<?php echo base_url(); ?>images/desktop/image25.png" style="margin-top:-25px;"></div></center>
          </center>

          <div class="w3-col l12 w3-center" style="margin-top: 5px">
            <div class="w3-col l12 <?php echo $hide_freeRating; ?>">
              <div class="w3-col l12" style="">
                <div class="w3-col l6 s6 w3-small">
                  <span class="w3-right"><b>Communication:</b></span>
                </div>
                <div class="w3-col l6 s6" style="padding-left:10px;">
                  <span class="stars w3-left" data-rating="<?php if($communication != ''){ echo $communication; }else{ echo 0; }?>" data-num-stars="5" ></span>
                </div>
              </div>
              <div class="w3-col l12" style="">
                <div class="w3-col l6 s6 w3-small">
                  <span class="w3-right"><b>On Time:</b></span>
                </div>
                <div class="w3-col l6 s6" style="padding-left:10px;">
                  <span class="stars w3-left" data-rating="<?php if($Delivery != ''){ echo $Delivery; }else{ echo 0; }?>" data-num-stars="5" ></span>
                </div>
              </div>
              <div class="w3-col l12" style="">
                <div class="w3-col l6 s6 w3-small">
                  <span class="w3-right"><b>Value money:</b></span>
                </div>
                <div class="w3-col l6 s6" style="padding-left:10px;">
                  <span class="stars w3-left" data-rating="<?php if($money != ''){ echo $money; }else{ echo 0; }?>" data-num-stars="5" ></span>
                </div>
              </div>
              <div class="w3-col l12" style="">
                <div class="w3-col l6 s6 w3-small">
                  <span class="w3-right"><b>Expertise:</b></span>
                </div>
                <div class="w3-col l6 s6" style="padding-left:10px;">
                  <span class="stars w3-left" data-rating="<?php if($expert != ''){ echo $expert; }else{ echo 0; }?>" data-num-stars="5" ></span>
                </div>
              </div>
              <div class="w3-col l12" style="x">
                <div class="w3-col l6 s6 w3-small">
                  <span class="w3-right"><b>Hire Again?:</b></span>
                </div>
                <div class="w3-col l6 s6" style="padding-left:10px;">
                  <span class="stars w3-left" data-rating="<?php if($hire != ''){ echo $hire; }else{ echo 0; }?>" data-num-stars="5" ></span>
                </div>
              </div>
            </div>


            <!-- freelance employer rating div -->
            <div class="w3-col l12 <?php echo $hide_empRating; ?>">
              <div class="w3-col l12" style="x">
                <div class="w3-col l6 s6 w3-small">
                  <span class="w3-right"><b>Communication:</b></span>
                </div>
                <div class="w3-col l6 s6" style="padding-left:10.5px;">
                  <span class="stars w3-left" data-rating="<?php if($communicationemployer != ''){ echo $communicationemployer; }else{ echo 0; }?>" data-num-stars="5" ></span>
                </div>
              </div>
              <div class="w3-col l12" style="">
                <div class="w3-col l6 s6 w3-small">
                  <span class="w3-right"><b>Payment:</b></span>
                </div>
                <div class="w3-col l6 s6" style="padding-left:10.5px;">
                  <span class="stars w3-left" data-rating="<?php if($payment !=''){ echo $payment; }else{ echo 0; } ?>" data-num-stars="5" ></span>
                </div>
              </div>
              <div class="w3-col l12" style="">
                <div class="w3-col l6 s6 w3-small">
                  <span class="w3-right"><b>Requirement:</b></span>
                </div>
                <div class="w3-col l6 s6" style="padding-left:10.5px;">
                  <span class="stars w3-left" data-rating="<?php if($requirements != ''){ echo $requirements; }else{ echo 0; } ?>" data-num-stars="5" ></span>
                </div>
              </div>
              <div class="w3-col l12" style="">
                <div class="w3-col l6 s6 w3-small">
                  <span class="w3-right"><b>Work Again?:</b></span>
                </div>
                <div class="w3-col l6 s6" style="padding-left:10.5px;">
                  <span class="stars w3-left" data-rating="<?php if($working != ''){ echo $working; }else{ echo 0; }?>" data-num-stars="5" ></span>
                </div>
              </div>              
            </div>
            <!-- end -->

            <!-- <span class="stars" data-rating="<?php echo $avg_rating; ?>" data-num-stars="5" ></span><br> -->

            <!-- script to dispaly stars -->
            <script>
              $.fn.stars = function() {
                return $(this).each(function() {
                  var rating = $(this).data("rating");
                  var numStars = $(this).data("numStars");
                  var fullStar = new Array(Math.floor(rating + 1)).join('<i class="fa fa-star" style="margin-right:2.5px"></i>');
                  var halfStar = ((rating%1) !== 0) ? '<i class="fa fa-star-half-empty" style="margin-right:2.5px"></i>': '';
                  var noStar = new Array(Math.floor(numStars + 1 - rating)).join('<i class="fa fa-star-o" style="margin-right:2.5px"></i>');
                  $(this).html(fullStar + halfStar + noStar);
                });
              }
              $('.stars').stars();
            </script>                          
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- feedback ends -->

  <!-- funds start -->
  <div class="horizontal">
    <div class="w3-col l3 w3-padding-small <?php echo $hide_funds; ?>">
      <div class="col-lg-12 dashboard_blocks w3-white w3-round w3-padding-right w3-padding-left">
        <div class="w3-col l12" >
          <center>
            <h6><b>My Funds</b></h6>
            <center><img src="<?php echo base_url(); ?>images/desktop/image25.png" style="margin-top:-25px;"></center>
          </center>
          <div class="w3-col l12 " >
            <center><table class="" style="height: 85px;">
              <tbody>
                <?php                    
                $paid_thisMonth='0.00';
                $paid_toDate='0.00';
                $earn_thisMonth='0.00';
                $earn_toDate='0.00';
                if($all_userTransaction['status']=='200'){
                  foreach ($all_userTransaction['status_message'] as $key) {
                    $paid_thisMonth=$key['paid_thisMonth'];
                    $paid_toDate=$key['paid_toDate'];
                    $earn_thisMonth=$key['earn_thisMonth'];
                    $earn_toDate=$key['earn_toDate'];
                  }
                }
                ?>
                <tr>
                  <td class="text-left">Paid this month</td>
                  <td class="text-right">&nbsp;&nbsp;<b><i class="fa fa-rupee"></i>  <?php echo $paid_thisMonth; ?></b></td>
                </tr>
                <tr>
                  <td class="text-left">Paid to date</td>
                  <td class="text-right">&nbsp;&nbsp;<b><i class="fa fa-rupee"></i>  <?php echo $paid_toDate; ?></b></td>
                </tr>
                <tr class="<?php echo $hide_earnings; ?>">
                  <td class="text-left">Earned this month</td>
                  <td class="text-right">&nbsp;&nbsp;<b><i class="fa fa-rupee"></i>  <?php echo $earn_thisMonth; ?></b></td>
                </tr>
                <tr class="<?php echo $hide_earnings; ?>">
                  <td class="text-left">Earned to date</td>
                  <td class="text-right">&nbsp;&nbsp;<b><i class="fa fa-rupee"></i>  <?php echo $earn_toDate; ?></b></td>
                </tr>                     
              </tbody>
            </table></center>

            <div class="w3-center w3-col l12 w3-margin-top w3-hide" >
             <a href="" class="btn w3-medium w3-text-black" style="padding:0"><i class="fa fa-money"></i> <b>Financial Dashboard</b></a>   
           </div>                 
         </div>
       </div>

     </div>
   </div>
 </div>
 <!-- funds ends -->

 <!-- membership start -->
 <div class="horizontal">
   <div class="w3-col l3 w3-padding-small <?php echo $hide_bid; ?>" >
    <div class="col-lg-12 dashboard_blocks w3-white w3-round">
      <div class="w3-col l12 w3-padding " >
        <?php                    
        $membership_package='FREE';
        $total_bids='0';
        $avail_bids='0';          

        if($all_userInfo['status']=='200'){
          foreach ($all_userInfo['status_message'] as $key) {
            switch ($key['membership_package']) {
              case 'FREE':
              $membership_package=$key['membership_package'];
              break;

              case 'P/M':
              $membership_package='PREMIUM<b class="w3-large">/</b>M';
              break;

              case 'P/Y':
              $membership_package='PREMIUM<b class="w3-large">/</b>Y';
              break;
            }
            $total_bids=$key['total_bids'];
            $avail_bids=$key['avail_bids'];
          }

        }          
        ?>
        <div class="w3-col l12" style="height: 118px;">
          <center class="w3-margin-bottom ">
            <h6 class="" style="color:#00b59e"><b>Available Bids</b></h6>
            <span class="w3-black w3-round-xxlarge w3-medium  " style="padding:5px 30px 5px 30px"><?php echo $avail_bids; ?> / <?php echo $total_bids; ?></span>
          </center>

          <center class="w3-margin-bottom w3-margin-top  ">
            <h6 class="" style="color:#00b59e ;margin:10px" ><b>Membership</b></h6>
            <span class="w3-card w3-round-xxlarge w3-medium " style="padding:5px 23px 5px 23px"><i class="fa fa-certificate"></i> <?php echo $membership_package; ?></span>
          </center>
        </div>
      </div>
      <div class="w3-col s12 w3-center <?php echo $hideView_plans; ?>">    
       <a href="<?php echo base_url(); ?>profile/membership_control" class="btn w3-small w3-text-black"> <b>View Plans</b></a><br>    
     </div>

   </div>
 </div>
</div>
<!-- membership ends -->

<!-- membership start -->
<div class="horizontal">
 <div class="w3-col l3 w3-padding-small <?php echo $hide_mem; ?>" >
  <div class="col-lg-12 dashboard_blocks w3-white w3-round">
    <div class="w3-col l12 w3-padding " >
      <?php                    
      $membership_package='FREE';
      $hide='';

      if($all_userInfo['status']=='200'){
        foreach ($all_userInfo['status_message'] as $key) {
          switch ($key['membership_package']) {
            case 'FREE':
            $membership_package=$key['membership_package'];
            break;

            case 'P/M':
            $membership_package='PREMIUM<b class="w3-large">/</b>M';
            break;

            case 'P/Y':
            $membership_package='PREMIUM<b class="w3-large">/</b>Y';
            break;
          }
        }
      }
      if($total_bids==0){
        $hide='w3-hide';
      }
      ?>
      <div class="w3-col l12" style="height: 118px;">         

        <center class="w3-margin-bottom">
          <h6 class="w3-text-light-blue"><b>Membership</b></h6>
          <span class="w3-card w3-round-xxlarge w3-padding-small w3-large "><i class="fa fa-certificate"></i> <?php echo $membership_package; ?></span>
        </center>
      </div>
    </div>
    <div class="w3-col l12 <?php echo $hideView_plans; ?>">
      <center class="w3-margin-top">
       <a href="<?php echo base_url(); ?>profile/membership_control" class="btn w3-medium w3-text-black"><i class=""></i>  <b>View Plans</b></a><br>                  
     </center>
   </div>

 </div>
</div>
</div>
<!-- membership ends -->
</div>
</div>        
</div>
<!-- mobile grid view ends -->
</div>

</div>
<div class="col-lg-2"></div>
</div>
<div class="w3-row w3-padding-tiny w3-margin-bottom w3-text-white" style="background-color: #00B59D;">
  <div class="w3-col l12">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
      <div class="w3-col l4 w3-center w3-hide">
        <span>
          <a href="#" class="btn w3-text-white">
            <span class="" ><i class="fa fa-users w3-hover-black w3-circle w3-large "></i>&nbsp;REFERALS</span>
          </a>
        </span>
      </div>
      <div class="w3-col l12  w3-center">
        <span>
          <a href="<?php echo base_url(); ?>message/pm" class="btn w3-text-white w3-left">
            <span class="inbox" ><i class="fa fa-inbox w3-hover-black w3-circle w3-large"></i>&nbsp;INBOX</span>
          </a>
        </span>
      </div>
      <div class="w3-col l6 s6 w3-center w3-hide">
        <span>
          <a href="#" class="btn w3-text-white">
            <span class="" ><i class="fa fa-feed w3-hover-black w3-circle w3-large "></i>&nbsp;FEEDBACK</span>
          </a>             
        </span>
      </div>
    </div>
    <div class="col-lg-2"></div>

  </div>
</div>

<!-- current and previous data div -->
<div class="w3-row w3-margin-top">
  <div class="col-lg-1"></div>
  <div class="w3-col l10">
    <div class="col-lg-12 w3-round-xlarge  ">
      <span class="w3-large w3-padding-small "><b>Welcome</b> <?php echo $user_name; ?></span>
    </div>

    <div class="col-lg-12 w3-hide-small <?php echo $myjob; ?>" id="profileWise_data" >
      <h3 class="w3-padding-small"><b>My Jobs</b></h3>
      <div class="w3-col l6 w3-margin-bottom w3-padding-small " id="JobList_Div" style="height: 350px; overflow: auto;">
        <label class="" style="">Applied Jobs</label>
        <?php
        $K = 0;
        if ($jobsApplied['status'] == 200) {
          ?>
          <?php foreach ($jobsApplied['status_message'] as $key) {?>
          
          <div class="w3-col l12 m12 s12 w3-card w3-center w3-padding" style=" height: 65px; ">
            <div class="col-lg-3 m3 s3 w3-center lineinfo" style="">
              <label class="w3-tiny w3-text-grey ">Job&nbsp;Name</label><br>
              <label class="w3-small"><b><?php echo $key['jm_job_post_name']; ?></b></label>
            </div>
            <div class="col-lg-2 m3 s3 lineinfo">
              <label class="w3-tiny w3-text-grey">Job Type</label><br>
              <label class="w3-small"><b><?php echo $key['jm_job_type'] ?></b></label>
            </div>
            <div class="col-lg-3 m3 s3 lineinfo">
              <label class="w3-tiny w3-text-grey">Salary</label><br>                
              <label class="w3-small"><b><?php echo $key['jm_salary_range'] ?></b></label>
            </div>
            <div class="col-lg-2 m3 s3 lineinfo" >

              <label class="w3-tiny w3-text-grey">Positions</label><br>                
              <label class="w3-small"><b><?php echo $key['jm_positions'] ?></b></label>
              
            </div>
            <div class="w3-col l2 m6 s6 lineinfo w3-margin-top">
              <a href="<?php echo base_url(); ?>jobseeker/jobseeker_lists/<?php echo $key['jm_jobpost_id']; ?>" class="w3-small w3-right w3-black w3-round-xlarge w3-padding-tiny btn">View Details</a>
            </div>
            
          </div>
          <?php
        }
      } else {
        ?>     
        <div class="w3-col l12 w3-card" id="">
          <div class=" w3-light-grey w3-text-grey w3-padding-small w3-small bluishGreen_bg" style ="text-align: center;"><b>You haven't applied any job yet.</b></div>
        </div>
        <?php } ?>
      </div>  
          <!------------------------ div for previous jobs ----------------------------------------------->                                            
       <div class="w3-col l6 w3-padding-small" id="JobList_Div" style=" padding-left: 5px; height: 350px; overflow: auto;">
           <label class="">Previous Jobs</label>              
      <?php
      if ($previousJobs['status'] == 200) {
          ?>
          <?php foreach ($previousJobs['status_message'] as $key) {
              //print_r($key);
              ?>                      
                         <div class="w3-col l12 w3-card w3-col l12 w3-card w3-center w3-padding" style=" height: 65px;">
                          <div class="col-lg-3 w3-center lineinfo" style="">
                                          <label class="w3-tiny w3-text-grey ">Job&nbsp;Name</label><br>
                                          <label class="w3-small"><b><?php echo $key['jm_job_post_name']; ?></b></label>
                                      </div>
                                      <div class="col-lg-2 lineinfo">
                                          <label class="w3-tiny w3-text-grey">Job Type</label><br>
                                          <label class="w3-small"><b><?php echo $key['jm_job_type'] ?></b></label>
                                      </div>
                                      <div class="col-lg-3 lineinfo">
                                          <label class="w3-tiny w3-text-grey">Salary</label><br>                
                                          <label class="w3-small"><b><?php echo $key['jm_salary_range'] ?></b></label>
                                      </div>
                                      <div class="col-lg-2 m3 s3 lineinfo" >
                                        
                                             <label class="w3-tiny w3-text-grey">Positions</label><br>                
                                             <label class="w3-small"><b><?php echo $key['jm_positions'] ?></b></label>
                                         </div>
                                         <div class="w3-col l2 m6 s6  w3-margin-top">
                                             <a href="<?php echo base_url(); ?>jobseeker/jobseeker_lists/<?php echo $key['jm_jobpost_id']; ?>" class="w3-small w3-right w3-black w3-round-xlarge w3-padding-tiny btn">View Details</a>
                                         </div>
                                     
                                  </div>                  
                       <?php 
                     }
                   }else{     ?>                   
                  <div class="w3-col l12 w3-card" id="">
                    <div class=" w3-light-grey w3-text-grey w3-small w3-padding-small bluishGreen_bg" style ="text-align: center;"><b>There are no previous jobs.</b></div>
                  </div>     
                  <?php }?>
                  </div>                            
                       <!------------------------ div for previous Applied  jobs ----------------------------------------------->                                              
                </div>
              </div>
              <div class="col-lg-1"></div>
            </div>    
            <!-- div ends here -->
            <!-----------------------------mobile view for jobs seeker applied jobs And Previous Applied jobs-->
            
            <div class="w3-row w3-margin-top">
              <div class="col-lg-1"></div>
              <div class="w3-col l10">    

                <div class="col-lg-12 w3-hide-large <?php echo $myjob; ?>" id="profileWise_data" >
                  <h3 class="w3-padding-small"><b>My Jobs</b></h3>
                  <div class="w3-col l6 w3-margin-bottom w3-padding-small" id="JobList_Div" style="padding-right: 5px;height: 350px; overflow: auto;">
                    <label class="" style="">Applied Jobs</label>
                    <?php
                    $K = 0;
                    if ($jobsApplied['status'] == 200) {
                      ?>
                      <?php foreach ($jobsApplied['status_message'] as $key) {?>

                      <div class="w3-col l12 m12 s12 w3-card w3-center w3-padding-left w3-padding-right" style=" height: 65px;">
                        <div class="smallview w3-col l3 m3 s3 w3-center " style="">
                          <label class="w3-tiny w3-text-grey ">Job&nbsp;Name</label><br>
                          <label class="w3-small"><b><?php echo $key['jm_job_post_name']; ?></b></label>
                        </div>
                        <div class="w3-col l2 m3 s2 smallview">
                          <label class="w3-tiny w3-text-grey">Job Type</label><br>
                          <label class="w3-small"><b><?php echo $key['jm_job_type']; ?></b></label>
                        </div>
                        <div class="w3-col l2 m3 s2 smallview">
                          <label class="w3-tiny w3-text-grey">Salary</label><br>                
                          <label class="w3-small"><b><?php echo $key['jm_salary_range']; ?></b></label>
                        </div>                                     
                        <div class="w3-col l2 m3 s2 smallview" >
                          <label class="w3-tiny w3-text-grey">Positions</label><br>                
                          <label class="w3-small"><b><?php echo $key['jm_positions']; ?></b></label>
                        </div>

                        <div class="w3-col l3 m3 s3  w3-margin-top">
                          <a href="<?php echo base_url(); ?>jobseeker/jobseeker_lists/<?php echo $key['jm_jobpost_id']; ?>" class="w3-small  w3-black w3-round-xlarge w3-padding-tiny btn">View Details</a>
                        </div>
                      </div>

                      <?php
                    }
                  } else {
                    ?>     
                    <div class="w3-col l12 w3-card" id="">
                      <div class=" w3-light-grey w3-text-grey w3-small w3-padding-small bluishGreen_bg" style ="text-align: center;"><b>You haven't applied any job yet.</b></div>
                    </div>
                    <?php } ?>
                  </div>  
          <!------------------------ div for previous jobs ----------------------------------------------->                                            
       <div class="w3-col l6 w3-padding-small" id="JobList_Div" style="padding-left: 5px;height: 350px; overflow: auto;">
           <label class="w3-left">Previous Jobs</label>              
        <?php
      if ($previousJobs['status'] == 200) {
          ?>
          <?php foreach ($previousJobs['status_message'] as $key) {
              //print_r($key);
              ?>                      
                         <div class="w3-col l12 s12 m12 w3-card w3-center w3-padding" style=" height: 70px;">
                             <div class="smallview w3-col l3 m3 s3 w3-center " style="">
                                         <label class="w3-tiny w3-text-grey ">Job&nbsp;Name</label><br>
                                         <label class="w3-small"><b><?php echo $key['jm_job_post_name']; ?></b></label>
                                     </div>
                                      <div class="w3-col l2 s2 m3 smallview">
                                          <label class="w3-tiny w3-text-grey">Job Type</label><br>
                                          <label class="w3-small"><b><?php echo $key['jm_job_type'] ?></b></label>
                                      </div>
                                      <div class="w3-col l2 s2 m3 smallview">
                                          <label class="w3-tiny w3-text-grey">Salary</label><br>                
                                          <label class="w3-small"><b><?php echo $key['jm_salary_range'] ?></b></label>
                                      </div>
                                      <div class="w3-col l2 s2 m3 smallview" >
                                          <label class="w3-tiny w3-text-grey">Positions</label><br>                
                                          <label class="w3-small"><b><?php echo $key['jm_positions'] ?></b></label>

                                      </div>
                                      <div class="w3-col l3 m3 s3  w3-margin-top">
                          				<a href="<?php echo base_url(); ?>jobseeker/jobseeker_lists/<?php echo $key['jm_jobpost_id']; ?>" class="w3-small  w3-black w3-round-xlarge w3-padding-tiny btn">View Details</a>
                        			</div>
                                  </div>                  
                       <?php 
                     }
                   }else{     ?>                   
                  <div class="w3-col l12 w3-card" id="">
                    <div class=" w3-light-grey w3-text-grey w3-small w3-padding-small bluishGreen_bg" style ="text-align: center;"><b>There are no previous jobs.</b></div>
                  </div>     
                  <?php }?>
                  </div>                            
                       <!------------------------ div for previous Applied  jobs ----------------------------------------------->                                              
                </div>
              </div>
              <div class="col-lg-1"></div>
            </div> 
            
            
            
            <!-----------------------------mobile view for jobs seeker applied jobs And Previous Applied jobs-->
            
            
            <!--------------------------------------- desktop view Starts here ---------------------------------------------------------------->
            <!-- Div For Showing The Posted Jobs -->
            <?php
            $user_id = $this->session->userdata('user_id');
            if($profile_type == 4 ){
                //print_r($postedjobs);              
              ?>
              <div class="w3-row">
                <div class="col-lg-1"></div>
                <div class="w3-col l10">
                  <!-------------------------------------Div for showing the posted jobs -------------------------------------------------------->
                  <div class="col-lg-12  w3-hide-small" id="JobDescription">

                    <h3 class="w3-padding-small" style=""><b>My Jobs</b></h3>

                    <div class="w3-col l6 " >
                     <label class="w3-padding-small" style="">Posted Jobs</label>
                     <div class="w3-padding-small" style=" height: 350px; overflow: auto;">
                      <?php
                      if ($postedjobs['status'] == 200) {
                        foreach ($postedjobs['status_message'] as $key) {
                          ?>

                          <div class="w3-col l12 w3-card w3-col l12 w3-card w3-center w3-padding" style="padding-top: 4px; padding-bottom: 4px; height: 65px;">
                            <div class="col-lg-2 w3-center lineinfo" style="">
                              <label class="w3-tiny w3-text-grey ">Job&nbsp;Name</label><br>
                              <label class="w3-small"><b><?php echo $key['jm_job_post_name']; ?></b></label>
                            </div>
                            <div class="col-lg-3 lineinfo">
                              <label class="w3-tiny w3-text-grey">Job Type</label><br>
                              <label class="w3-small"><b><?php echo $key['jm_job_type']; ?></b></label>
                            </div>
                            <div class="col-lg-2 lineinfo">
                              <label class="w3-tiny w3-text-grey">Salary</label><br>                
                              <label class="w3-small"><b><?php echo $key['jm_salary_range']; ?></b></label>
                            </div>
                            <div class="col-lg-2 lineinfo" >
                              <label class="w3-tiny w3-text-grey">Positions</label><br>                
                              <label class="w3-small"><b><?php echo $key['jm_positions']; ?></b></label>
                            </div>
                            <div class="col-lg-3 lineinfo w3-margin-top">
                              <a href="<?php echo base_url(); ?>job/job_listings/<?php echo $key['jm_jobpost_id']; ?>" class="w3-small w3-right w3-black w3-round-xlarge w3-padding-tiny btn">View Details</a>
                            </div>   
                          </div>


                          <?php
                        }
                      } else { ?>

                      <div class="w3-col l12 w3-card" id="">
                        <div class=" w3-light-grey w3-text-grey w3-small w3-padding-small bluishGreen_bg" style ="text-align: center;"><b>There are no jobs Posted.</b></div>
                      </div> 
                      <?php } ?>
                    </div>
                  </div>
                  <!-----------------------------------------div for showing closed jobs-------------------------------------------------------->                    

                  <div class="w3-col l6 " >
                   <label class="w3-padding-small" style="">Previous Jobs</label> 
                   <div class="w3-padding-small" style=" height: 350px; overflow: auto; padding-left: 5px;"> 
                     <?php
                     if ($previousjobs['status'] == 200) {
                      foreach ($previousjobs['status_message'] as $key) {
                        ?>

                        <div class="w3-col l12 w3-card w3-col l12 w3-card w3-center w3-padding" style="padding-top: 4px; padding-bottom: 4px; height: 65px;">
                          <div class="col-lg-2 w3-center lineinfo" style="">
                            <label class="w3-tiny w3-text-grey ">Job&nbsp;Name</label><br>
                            <label class="w3-small"><b><?php echo $key['jm_job_post_name']; ?></b></label>
                          </div>
                          <div class="col-lg-3 lineinfo">
                            <label class="w3-tiny w3-text-grey">Job Type</label><br>
                            <label class="w3-small"><b><?php echo $key['jm_job_type']; ?></b></label>
                          </div>
                          <div class="col-lg-2 lineinfo">
                            <label class="w3-tiny w3-text-grey">Salary</label><br>                
                            <label class="w3-small"><b><?php echo $key['jm_salary_range']; ?></b></label>
                          </div>
                          <div class="col-lg-2 lineinfo" >

                            <label class="w3-tiny w3-text-grey">Positions</label><br>                
                            <label class="w3-small"><b><?php echo $key['jm_positions']; ?></b></label>
                          </div>
                          <div class="col-lg-3 lineinfo w3-margin-top">
                            <a href="<?php echo base_url(); ?>job/job_listings/<?php echo $key['jm_jobpost_id']; ?>" class="w3-small w3-right w3-black w3-round-xlarge w3-padding-tiny btn">View Details</a></div>   


                          </div>                                   
                          <?php
                        }
                      } else { ?>
                      <div class="w3-col l12 w3-card" id="">
                       <div class=" w3-light-grey w3-text-grey w3-small w3-padding-small bluishGreen_bg" style ="text-align: center;"><b>There are no previous jobs .</b></div>
                     </div> 
                     <?php } ?>
                     <!-----------------------------------------div for showing closed jobs-------------------------------------------------------->                                                               
                   </div>
                 </div>
                 <!-----------------End Div for showing the posted jobs ------------------------------------>

               </div>                 

               <div class="col-lg-1"></div>      
             </div>
           </div>

                  <!----------------------------------Posted Jobs by job employer For Mobile view ----------------------------------------------->
                  <div class="w3-row w3-hide-large">
                    <div class="col-lg-1"></div>
                     <div class="w3-col l10">
                  <div class="col-lg-12 w3-hide-small " id="JobDescription">
                   <div class="w3-col l6 " style="">
                      <label class="" style="">Posted Jobs</label>
                       <div class="w3-padding-small" style=" height: 350px; overflow: auto;">
                      <?php
                      if ($postedjobs['status'] == 200) {
                        foreach ($postedjobs['status_message'] as $key) {
                          ?>

                      <div class="w3-col l12 l12 m12 s12 w3-card w3-center w3-padding" style="padding-top: 4px; padding-bottom: 4px; height: 65px;">
                          <div class="w3-col l3 m3 s3 w3-center smallview lineinfo" style="">
                                          <label class="w3-tiny w3-text-grey ">Job&nbsp;Name</label><br>
                                          <label class="w3-small"><b><?php echo $key['jm_job_post_name']; ?></b></label>
                                      </div>
                                      <div class="w3-col l3 m3 s3 lineinfo">
                                          <label class="w3-tiny w3-text-grey">Job Type</label><br>
                                          <label class="w3-small"><b><?php echo $key['jm_job_type'] ?></b></label>
                                      </div>
                                      <div class="w3-col l3 m3 s3 lineinfo">
                                          <label class="w3-tiny w3-text-grey">Salary</label><br>                
                                          <label class="w3-small"><b><?php echo $key['jm_salary_range'] ?></b></label>
                                      </div>
                                      <div class="w3-col l3 m3 s3 lineinfo" >
                                          <div class="w3-col l6 m6 s6">
                                          <label class="w3-tiny w3-text-grey">Positions</label><br>                
                                          <label class="w3-small"><b><?php echo $key['jm_positions'] ?></b></label>
                                          </div>
                                          <div class="w3-col l6 m6 s6 w3-margin-top" style=" padding-top: 5px;; ">
                                            <a href="<?php echo base_url(); ?>job/job_listings/<?php echo $key['jm_jobpost_id']; ?>" class="w3-small w3-right w3-black w3-round-xlarge w3-padding-tiny btn">View</a></div>   
                                          </div>
                                      </div>

                                         <?php
                                       }
                                     } else { ?>
                                     
                                         <div class="w3-col l12 w3-card" id="">
                                          <div class=" w3-light-grey w3-text-grey w3-small w3-padding-small bluishGreen_bg" style ="text-align: center;"><b>There are no jobs Posted.</b></div>
                                        </div> 
                                    <?php } ?>
                                  </div>
                                  </div>
                                  
                                  <!-----------------------------------------div for showing closed jobs-------------------------------------------------------->                    

                                  <div class="w3-col l6 w3-padding-small" style=" height: 350px; overflow: auto; padding-left: 5px;">
                                   <label class="" style=" padding-left: 8px;">Previous Jobs</label> 
                                   <?php
                                   if ($previousjobs['status'] == 200) {
                                    foreach ($previousjobs['status_message'] as $key) {
                                      ?>

                                      <div class="w3-col l12 l12 m12 s12 w3-card w3-center w3-padding" style="padding-top: 4px; padding-bottom: 4px; height: 65px;">
                                        <div class="w3-col l3 m3 s3 w3-center smallview lineinfo" style="">
                                          <label class="w3-tiny w3-text-grey ">Job&nbsp;Name</label><br>
                                          <label class="w3-small"><b><?php echo $key['jm_job_post_name']; ?></b></label>
                                        </div>
                                        <div class="w3-col l3 m3 s3 lineinfo">
                                          <label class="w3-tiny w3-text-grey">Job Type</label><br>
                                          <label class="w3-small"><b><?php echo $key['jm_job_type'] ?></b></label>
                                        </div>
                                        <div class="w3-col l3 m3 s3 lineinfo">
                                          <label class="w3-tiny w3-text-grey">Salary</label><br>                
                                          <label class="w3-small"><b><?php echo $key['jm_salary_range'] ?></b></label>
                                        </div>
                                        <div class="w3-col l3 m3 s3 lineinfo" >
                                          <label class="w3-tiny w3-text-grey">Positions</label><br>                
                                          <label class="w3-small"><b><?php echo $key['jm_positions'] ?></b></label>
                                        </div>
                                      </div>                                  
                                      <?php
                                    }
                                  } else { ?>
                                  <div class="w3-col l12 w3-card" id="">
                                   <div class=" w3-light-grey w3-text-grey w3-small w3-padding-small bluishGreen_bg" style ="text-align: center;"><b>There are no previous jobs .</b></div>
                                 </div> 
                                 <?php } ?>
                                 <!-----------------------------------------div for show ing closed jobs-------------------------------------------------------->                                                               
                               </div>
                               <!-----------------End Div for showing the posted jobs ------------------------------------>
                             </div>  
                  <!----------------------------------Posted Jobs by job employer For Mobile view ----------------------------------------------->
                     </div>
                    <div class="col-lg-1"></div>
                  </div>
                            <?php } ?>
<!----------------------------- Div for showing posted projects and previous projects ----------------------------------------->
<!-- Div For Showing The Posted Jobs -->

<!-- Div for showing the posted projects and previous projects for freelancer-->
<?php
if ($profile_type == '') {
  ?>
  <script>
    $(document).ready(function () {
      Show_Live_Projects('<?php echo $user_id; ?>');
      Show_Previous_Projects('<?php echo $user_id; ?>');
    });
  </script>
  <div class="w3-row" >
    <div class="col-lg-1"></div>
    <div class="w3-col l10">
      <div class="col-lg-12 " id="projectsDescription">          
        <h5><b class="w3-padding-small">My Posted Projects</b></h5>
        <div class="w3-col l6 w3-padding-small" >
          <label class="" style="">Posted Projects</label>
          <div class="" style=" height: 350px; overflow: auto;">
            <div class="w3-col l12 w3-card w3-padding-small" id="postedProjects">
            </div>
          </div>
        </div>
        <div class="w3-col l6 w3-padding-small" style="">
         <label class="" style="">Previous Projects</label>
         <div class="" style=" height: 350px;padding-right: 5px; overflow: auto;">
           <div class="w3-col l12 w3-card w3-padding-small" id="previousProjects" style"">
           </div>
         </div>
       </div>
     </div>
   </div>
   <div class="col-lg-1"></div>
 </div>
 
 <?php } ?>
 <!-- Div for showing the posted projects and previous projects -->


 <!-- Div for showing the posted projects and previous projects for freelancer-->
 <?php
 if ($profile_type == 2) {
  ?>
  <script>
    $(document).ready(function () {
      Show_Live_Projects('<?php echo $user_id; ?>');
      Show_Previous_Projects('<?php echo $user_id; ?>');
    });
  </script>
  <div class="w3-row" >
    <div class="col-lg-1"></div>
    <div class="w3-col l10">
      <div class="col-lg-12 " id="projectsDescription">          
        <h5><b class="w3-padding-small">My Posted Projects</b></h5>
        <div class="w3-col l6 w3-padding-small" style=" ">
          <label class="" style="">Posted Projects</label>
          <div class="" style="height: 350px; overflow: auto;">
            <div class="w3-col l12 w3-card w3-padding-small" id="postedProjects" style="">
            </div>
          </div>
        </div>
        <div class="w3-col l6 w3-padding-small" style="">
         <label class="" style="">Previous Projects</label>
         <div class="" style="height: 350px; overflow: auto;">
           <div class="w3-col l12 w3-card  w3-padding-small" id="previousProjects" style="">
           </div>
         </div>
       </div>
     </div>
   </div>
   <div class="col-lg-1"></div>
 </div>
 
 <?php } ?>
 <!-- Div for showing the posted projects and previous projects -->
 <!--------------------------------------- desktop view ends here ---------------------------------------------------------------->

 <!-- Div For Showing The Posted Jobs -->
 <!-- Div for showing the posted projects and previous projects for freelancer-->
 <?php
 if ($profile_type == 1) {
  ?>
  <script>
    $(document).ready(function () {
      freelanceLive_Projects('<?php echo $user_id; ?>');
      freelancePrevious_Projects('<?php echo $user_id; ?>')
    });
  </script>
  <div class="w3-row" >
    <div class="col-lg-1"></div>
    <div class="w3-col l10">
      <div class="col-lg-12 " id="freelanceProject_desc">          
        <h5><b class="w3-padding-small">My Awarded Projects</b></h5>
        <div class="w3-col l6 w3-padding-small" >
          <label class="" style="">Awarded Projects</label>
          <div class="" style=" height: 350px; overflow: auto; padding-right: 5px;">
            <div class="w3-col l12 w3-card w3-padding-small" id="freelance_liveProjects" >
            </div>
          </div>
        </div>
        <div class="w3-col l6 w3-padding-small " >
         <label class="" style="">Previous Projects</label>
         <div class="" style="height: 350px; overflow: auto;">
           <div class="w3-col l12 w3-card w3-padding-small" id="freelance_previousProjects">
           </div>
         </div>
       </div>
     </div>
   </div>
   <div class="col-lg-1"></div>
 </div>
 
 <?php } ?>
 <!-- Div for showing the posted projects and previous projects -->
 <!--------------------------------------- desktop view ends here ---------------------------------------------------------------->
 
 <!---------------------------div for the mobile view starts here-------------------------------------------------->            
 
 
 <!-- Div For Showing The Posted Jobs -->
 <?php
 $user_id = $this->session->userdata('user_id');
 if($profile_type == 4){
                //print_r($postedjobs);

  ?>
  <div class="w3-row w3-hide-large">
   <div class="col-lg-1"></div>
   <div class="w3-col l10">
    <div class="col-lg-12 " id="JobDescription">

      <!-------------------------------------Div for showing the posted jobs -------------------------------------------------------->
      <h3 class="w3-padding-small" style=""><b>My Jobs</b></h3>
      <div class="w3-col l6" style=" ">
        <label class="w3-padding-small" style="">Posted Jobs</label>
        <div class="w3-padding-small " style="height: 350px; overflow: auto;">
          <?php
          if ($postedjobs['status'] == 200) {
            foreach ($postedjobs['status_message'] as $key) {
              ?>

              <div class="w3-col l12 m12 s12  w3-card w3-card  w3-center w3-padding-left w3-padding-right" style="">
               <div class="smallview w3-col l3 m3 s3 w3-center " style="">
                <label class="w3-tiny w3-text-grey ">Job&nbsp;Name</label><br>
                <label class="w3-small"><b><?php echo $key['jm_job_post_name']; ?></b></label>
              </div>
              <div class="w3-col l3 m3 s3 smallview">
                <label class="w3-tiny w3-text-grey">Job Type</label><br>
                <label class="w3-small"><b><?php echo $key['jm_job_type'] ?></b></label>
              </div>
              <div class="w3-col l3 m3 s3 smallview">
                <label class="w3-tiny w3-text-grey">Salary</label><br>                
                <label class="w3-small"><b><?php echo $key['jm_salary_range'] ?></b></label>
              </div>
              <div class="w3-col l3 m3 s3 smallview" >
                <label class="w3-tiny w3-text-grey">Positions</label><br>                
                <label class="w3-small"><b><?php echo $key['jm_positions'] ?></b></label>

              </div>
              <div class="w3-col l12 w3-margin-bottom"><a href="<?php echo base_url(); ?>job/job_listings/<?php echo $key['jm_jobpost_id']; ?>" class="w3-small w3-right w3-black w3-round-xlarge  w3-padding-tiny ">View Details</a></div>
            </div>

            <?php
          }
        } else { ?>
        <div class="w3-col l12" id="">
          <div class=" w3-light-grey w3-text-grey w3-small w3-padding-small bluishGreen_bg" style ="text-align: center;"><b>There are no jobs Posted.</b></div>
        </div>
        <?php } ?>
      </div>
    </div>

    <!-----------------------------------------div for showing closed jobs-------------------------------------------------------->                    
    <div class="w3-col l6 " style="">
     <label class="" style="">Previous Jobs</label>
     <div class="w3-paddding-small" style="height: 350px; overflow: auto;">
       <?php
       if ($previousjobs['status'] == 200) {
        foreach ($previousjobs['status_message'] as $key) {
          ?>

          <div class="w3-col l12 m12 s12  w3-card w3-card  w3-center w3-padding-left w3-padding-right" style="">
           <div class="smallview w3-col l3 m3 s3 w3-center " style="">
            <label class="w3-tiny w3-text-grey ">Job&nbsp;Name</label><br>
            <label class="w3-small"><b><?php echo $key['jm_job_post_name']; ?></b></label>
          </div>
          <div class="w3-col l3 m3 s3 smallview">
            <label class="w3-tiny w3-text-grey">Job Type</label><br>
            <label class="w3-small"><b><?php echo $key['jm_job_type'] ?></b></label>
          </div>
          <div class="w3-col l3 m3 s3 smallview">
            <label class="w3-tiny w3-text-grey">Salary</label><br>                
            <label class="w3-small"><b><?php echo $key['jm_salary_range'] ?></b></label>
          </div>
          <div class="w3-col l3 m3 s3 smallview" >
            <label class="w3-tiny w3-text-grey">Positions</label><br>                
            <label class="w3-small"><b><?php echo $key['jm_positions'] ?></b></label>

          </div>
          <div class="w3-col l12 w3-margin-bottom"><a href="<?php echo base_url(); ?>job/job_listings/<?php echo $key['jm_jobpost_id']; ?>" class="w3-small w3-right w3-black w3-round-xlarge  w3-padding-tiny ">View Details</a></div>
        </div>

        <?php
      }
    } else { ?>
    <div class="w3-col l12" id="elseDiv">
      <div class="w3-light-grey w3-text-grey w3-small w3-padding-small w3-center bluishGreen_bg" style="text-align: center;"><b>There are no previous jobs .</b></div>
    </div>
    <?php } ?>
  </div> 
</div>                                  
<!-----------------------------------------div for show ing closed jobs-------------------------------------------------------->                                                               

</div>
<!-----------------End Div for showing the posted jobs ------------------------------------>

<!-----------------------------------Next Div for showing the project posted and previous project---------------------------------->                 

<!-----------------------------------Next Div for showing the project posted and previous project---------------------------------->                 
</div>
<div class="col-lg-1"></div>      
</div>
<?php } ?>



<?php
if ($profile_type == 2) {
  ?>
  <script>
    $(document).ready(function () {
      Show_Live_Projects('<?php echo $user_id; ?>');
      Show_Previous_Projects('<?php echo $user_id; ?>')
    });
  </script>
  <div class="w3-row w3-hide-large" >
    <div class="col-lg-1"></div>
    <div class="w3-col l10">
      <div class="col-lg-12 w3-hide-large w3-hide-small" id="JobDescription">
        <h5><b class="w3-padding-left">My Projects</b></h5>
        <div class="w3-col l6" style=" height: 350px; overflow: auto;">
          <label class="" style=" padding-left: 15px;">Posted Projects</label>
          <div class="w3-col l12 w3-card w3-padding-tiny" id="postedProjectsSmall" style="padding-right: 5px;">                               
          </div>
        </div>

        <div class="w3-col l6" style=" height: 350px;  overflow: auto;">
          <label class="" style=" padding-left: 8px;">Previous Projects</label>
          <div class="w3-col l12 w3-padding-tiny" id="previousProjectsSmall" style="padding-left: 5px;">                               
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-1"></div>
  </div>

  <?php } ?>
  <!-----------------------------------this div for showing the projects list for freelancer list -->
  <!-----------------------------------this div for show bookmark project list -->
  <div class="w3-row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10" id="myBookmark_div" >
      <?php if($profile_type==1){ ?>


      <h4>Bookmark Project</h4>

      <div class="" style=" height:350px; overflow: auto;">
       <?php 
   		//print_r($view_bookmark);

       if(count($view_bookmark)!=0)
       {
//       check for closed bookmark projects 	
        $bmark_status=array();
        foreach($view_bookmark as $bmark){
          if($bmark['status']=='500'){
           $bmark_status[]='1';
         }
         else{
           $bmark_status[]='0';
         }
       }

       if(!in_array('0', $bmark_status)){
         echo '  <div class="w3-col l12 w3-card" id="">
         <div class=" w3-light-grey w3-text-grey w3-small w3-padding-small bluishGreen_bg" style ="text-align: center;"><b>No Bookmark Available.</b></div>
         </div>';
       }
   	//	print_r($bmark_status);
//   check for bookmarked closed project ends		
       ?>

       <?php   
       $count=1;
                 //  print_r( $view_bookmark['status_message'][0]);die();
       foreach ($view_bookmark as $key)  
       { 
        foreach ($key as $val) {
                      //print_r($val[0]);
          foreach ($val as $book) {

            ?>
            <div class="w3-col l12  w3-card " >
              <div class="col-lg-2 col-xs-3">
                <label class="w3-tiny w3-text-grey">Project Name</label>
                <p><b><?php echo $book['jm_project_title'];?></b></p>
              </div>

              <div class="col-lg-2 col-xs-3 w3-center">
                <label class="w3-tiny w3-text-grey">Project Amount</label>
                <p><b><?php echo $book['jm_project_price'];?></b></p>

              </div>

              <div class="col-lg-2 col-xs-3 w3-center">
                <label class="w3-tiny w3-text-grey">Posted time</label>
                <p><b><?php echo "posted ".timeago($book['jm_posting_date']);?></b></p>

              </div>
              <div class="col-lg-3 col-xs-3 w3-center">
                <label class="w3-tiny w3-text-grey">Project Bid</label>
                <p><b><?php echo $book['jm_project_bid'];?></b></p>

              </div>
              <div class="col-lg-2 col-xs-12 w3-center w3-margin-bottom">
                <a href="<?php echo base_url();?>project/view_project/<?php echo base64_encode($book['jm_project_id']);?>" class="w3-small w3-right w3-black w3-round-xlarge w3-margin-top w3-padding-tiny btn">View Details</a>
              </div>
            </div>
            <?php
          # code...
          }
        }
      }$count++;
      ?> <?php }else{ ?>
      <div class="w3-col l12 w3-card" id="">
        <div class=" w3-light-grey w3-text-grey w3-small w3-padding-small bluishGreen_bg" style ="text-align: center;"><b>No Bookmark Available.</b></div>
      </div>

      <?php } ?>
    </div>
  </div>

  <?php } ?>
  <div class="col-lg-1"></div>
</div>
<!--  <div class="w3-container ">
   <div class="col-lg-1"></div>
   <div class="col-lg-8 "> -->
         <!-- <h4>Bookmark Project</h4>
                                <div class="w3-col l12 w3-margin-top" id="hide_show">
                                 <div class="col-lg-2"></div> -->
                         <!-- <?php  

            if($view_bookmark)
            {
                  $count=1;
                 //  print_r( $view_bookmark['status_message'][0]);die();
                  foreach ($view_bookmark as $key)  
                   { 
                    foreach ($key as $val) {
                      //print_r($val[0]);
                      foreach ($val as $book) {
                       
                    
                  //print_r($key);
                //  echo $key['jm_project_title'];
                        ?>

                         <div class="col-lg-8 w3-card">
                          <div class="col-lg-4 ">
                            <label>Project Name</label>
                             <p><?php echo $book['jm_project_title'];?></p>
                             
                          </div>
                          <!-- <div class="col-lg-3">
                            <p><?php echo $book['jm_project_description'];?><span style="color:#02b28b"><i>More</i></span></p>
                          <hr>
                        </div> -->
                          <!-- <div class="col-lg-2 w3-center">
                            <label>Budget type</label>
                            <p><?php echo $book['jm_projectbudget_type'];?></p>
                          
                          </div>

                           <div class="col-lg-2 w3-center">
                            <label>Project Bid</label>
                             <p><?php echo $book['jm_project_bid'];?></p>
                            
                          </div>
                          
                        </div> -->
        <!--                 
         <?php
          # code...
                      }
         }
          }$count++;
    }
    ?>  -->
      <!-- <div class="col-lg-2"></div>
                        </div>

                        
                    </div>
                  </div> -->
      <!-- <div class="col-lg-4 w3-hide-small">
            <div class="">
            <div class="w3-small w3-col l12 "><b class="w3-right w3-margin-top w3-margin-bottom">'.$key['jm_projectbudget_type'].'</b></div>
            <div class="w3-col l12"><a href="'.$view_link.'" class="w3-small w3-black w3-right w3-round-xlarge w3-padding-tiny btn">VIEW PROJECT</a></div>
            <div class=" w3-col l12 w3-small"><span class="w3-right" style="padding-right:5px;margin-top:10px">'.$key['jm_project_bid'].' Proposals</span></div>
            
          </div> -->
<!--          <div class="col-lg-1"></div>
</div>-->




 <!----------------- End div for show bookmark project list--------------------------------------->
 
 <!-----------------------div for Bookmark Job---------------------------------------------------->
 <div class="w3-row w3-padding-small">
  <div class="col-lg-1"></div>
  <div class="col-lg-10" id="myBookmarkjob_div" >
    <?php if($profile_type==3){?>


    <h4>Bookmark Job</h4>
    
    <div class="" style=" height:350px; overflow: auto;">
   <?php         //print_r (count($job_bookmarks));die();
   if(count($job_bookmarks)!=0)
   {
//       check for closed bookmark job 	
    $bmarkjob_status=array();
    foreach($job_bookmarks as $bmark){
      if($bmark['status']=='500'){
       $bmarkjob_status[]='1';
     }
     else{
       $bmarkjob_status[]='0';
     }
   }

   if(!in_array('0', $bmarkjob_status)){
     echo '  <div class="w3-col l12 w3-card" id="">
     <div class=" w3-light-grey w3-text-grey w3-small w3-padding-small bluishGreen_bg" style ="text-align: center;"><b>No Bookmark Available.</b></div>
     </div>';
   }
   		//print_r($bmarkjob_status);
     //      check for closed bookmark job end
   ?>

   <?php   
   $count=1;
                 //  print_r( $view_bookmark['status_message'][0]);die();
   foreach ($job_bookmarks as $key)  
   { 
            // print_r($key);
    foreach ($key as $val) {
      {

           //  print_r($val);
        foreach ($val as $book) {
				//print_r($book);die();
          ?>
          <div class="w3-col l12  w3-card " >
            <div class="col-lg-2 col-xs-3">
              <label class="w3-tiny w3-text-grey">Job Name</label>
              <p><b><?php echo $book['jm_job_post_name'];?></b></p>
            </div>

            <div class="col-lg-2 col-xs-3 w3-center">
              <label class="w3-tiny w3-text-grey">Company name</label>
              <p><b><?php echo $book['jm_company_name'];?></b></p>

            </div>

            <div class="col-lg-2 col-xs-3 w3-center">
              <label class="w3-tiny w3-text-grey">Posted time</label>
              <p><b><?php echo "posted ".timeago($book['jm_posted_date']);?></b></p>

            </div>
            <div class="col-lg-3 col-xs-3 w3-center">
              <label class="w3-tiny w3-text-grey">Location</label>
              <p><b><?php echo $book['jm_job_city'];?></b></p>

            </div>
            <div class="col-lg-2 col-xs-12 w3-center w3-margin-bottom">
              <a href="<?php echo base_url();?>jobseeker/jobseeker_lists/<?php echo $book['jm_jobpost_id'];?>" class="w3-small w3-right w3-black w3-round-xlarge w3-margin-top w3-padding-tiny btn">View Details</a>
            </div>
          </div>
          <?php
          # code...
        }
      }
    }$count++;
  }
      //else{  ?>                   

      <?php }else{?>
      <div class="w3-col l12 w3-card" id="">
        <div class=" w3-light-grey w3-text-grey w3-small w3-padding-small bluishGreen_bg" style ="text-align: center;"><b>No Bookmark Available.</b></div>
      </div>
      <?php } ?>
      
    </div>
    <?php } ?>
  </div>
  <div class="col-lg-1"></div>
</div>
<!----------------------------End Div for Bookmark Job---------------------------------------->
<?php         
$user_id = $this->session->userdata('user_id');
?>
<script>
 $(document).ready(function(){
     //getTestomonials(<?php echo $user_id; ?>);
   });
 </script>
 <?php if ($profile_type == 1 || $profile_type == 2) {?>
                       <!--------------------------------------- mobile view ends here --------------------------------------------------------------
                         <!-- customer review div -->
                         <div class="container">
                          <div class="col-md-12">
                            <div class="row">
                              <center class="section4_inner1">
                                <h2>Testimonials</h2>
                                <center> <div class=""><img src="<?php echo base_url(); ?>images/desktop/image25.png" style="margin-top:-41px;"></div></center>
                              </center>
                              <div class='row'>
                                <div class='col-md-12'>
                                  <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                                    <!-- Bottom Carousel Indicators -->
                                    <ol class="carousel-indicators w3-margin-bottom">
                                      <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
                                      <?php
                                        //echo count($Testimonials_For_Freellancer['status_message']);
                                      for ($i = 1; $i <= count($Testimonials_For_Freellancer['status_message']); $i++) {
                                        ?>
                                        <li data-target="#quote-carousel" data-slide-to="<?php echo $i; ?>" class=""></li>
                                        <?php } ?>
<!--                                      <li data-target="#quote-carousel" data-slide-to="1"></li>
                                      <li data-target="#quote-carousel" data-slide-to="3"></li>
                                      <li data-target="#quote-carousel" data-slide-to="4"></li>
                                      <li data-target="#quote-carousel" data-slide-to="5"></li>-->
                                    </ol>
                                    <div class="carousel-inner " role="listbox" id="showFeedback">
                                      <div class="item active">
                                        <blockquote>
                                          <div class="row">
                                           <div class="col-sm-12 text-center">
                                            <h3>Testimonials</h3>
                                          </div>
                                        </div>
                                      </blockquote>
                                    </div>                                        
                                    <?php //print_r($Testimonials_For_Freellancer);
                                    if($Testimonials_For_Freellancer['status'] == 200){
                                      foreach ($Testimonials_For_Freellancer['status_message'] as $key){
                                        ?>
                                        <!-- Carousel Slides / Quotes -->
                                        <div class="item">
                                          <blockquote>
                                            <div class="col-lg-12 w3-margin-left" >
                                              <div class="w3-col l2 w3-center text-center">
                                                <img class="img-circle" src="<?php echo base_url(); ?><?php echo $key['UserImage']; ?>" style="width: 100px;height:100px;" onerror="this.src='<?php echo base_url()?>css/logos/default_noimage.jpg'">
                                                <!-- <img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/128.jpg" style="width: 100px;height:100px;"> -->
                                              </div>
                                              <div class="w3-col l10" style="overflow-wrap:break-word;">
                                                <p><?php if($key['comments'] != ''){ echo $key['comments']; } else{ echo 'N/A'; } ?>!</p>
                                                <small style="color:#02b28b"><?php if($key['username'] != ''){ echo $key['username']; } else{ echo 'N/A'; }?></small>
                                                <small style="color:#02b28b"><?php if($key['designation'] != ''){ echo $key['designation']; } else { echo 'N/A'; } ?></small>
                                              </div>
                                            </div>
                                          </blockquote>
                                        </div>
                                        <?php } }?>
                                      </div> 

                                      <!-- Carousel Buttons Next/Prev  -->
                                      <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
                                      <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
                                    </div>                          
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <?php }?>
                          <br><br>
            <!-- carosel
            <!-- <div id="myCarousel" class="carousel slide hidden-md col-xs-12" data-ride="carousel">
              <!-- Indicators -->

              <!-- Wrapper for slides -->
              <!-- <div class="carousel-inner" role="listbox">
                <div class="item active">
                  Item One
                </div>

                <div class="item">
                  Item One
                </div>

                <div class="item">
                  Item Two
                </div>


              </div>
            -->
            <!-- Left and right controls -->
             <!--  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">

                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            <div class="container col-md-12 hidden-xs">
              <div class="row">
                <div class="col-md-4">
                  Item One
                </div>
                <div class="col-md-4">
                  Item Two
                </div>
                <div class="col-md-4">
                  Item Three
                </div>
              </div>-->
              <!-- carousel ends -->
              <script>
                function getTestomonials(user_id){
                 $.ajax({
                  type: "POST",
                  url: "<?php echo base_url(); ?>profile/dashboard/getTestomonials",
                  dataType: 'text',
                  data: {
                    user_id: user_id
                  },
                  cache: false,
                  success: function(data) {
                    $.alert(data);
                    $("#showFeedback").html(data);
                  }
                });
            return false;  //stop the actual form post !important!
          }
        </script>
        <script>
          $('.inbox').tipso({
            position: 'top',
            width: 200,
            titleContent: 'Chat Application is in progress. Soon you will be connected to each other!',
            background        : '#c6c6c6',
            titleBackground   : '#F8F8F8',
            color             : '#000000',
            titleColor        : '#00B59D'
          });
        </script>
        <!-- customer review div ends -->  
        <script>
         function Show_Live_Projects(user_id){
           $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>profile/dashboard/Show_Live_Projects",
            dataType: 'text',
            data: {
              user_id: user_id
            },
            cache: false,
            success: function(data) {
              $("#postedProjects").html(data);
              $("#postedProjectsSmall").html(data);
            }
          });
            return false;  //stop the actual form post !important!
          }

          //----------------script to show employer projects----------------------//
          function Show_Previous_Projects(user_id){
           $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>profile/dashboard/Show_Previous_Projects",
            dataType: 'text',
            data: {
              user_id: user_id
            },
            cache: false,
            success: function(data) {
              $("#previousProjects").html(data);
              $("#previousProjectsSmall").html(data);
            }
          });
   return false;  //stop the actual form post !important!    
 }
//----------------script to show employer projects----------------------//

//----------------script to show employer projects----------------------//
function freelanceLive_Projects(user_id){
 $.ajax({
  type: "POST",
  url: "<?php echo base_url(); ?>profile/dashboard/freelanceLive_Projects",
  dataType: 'text',
  data: {
    user_id: user_id
  },
  cache: false,
  success: function(data) {
    $("#freelance_liveProjects").html(data);
              //$("#freelance_previousProjects").html(data);
            }
          });
   return false;  //stop the actual form post !important!    
 }
//----------------script to show employer projects----------------------//

//----------------script to show employer projects----------------------//
function freelancePrevious_Projects(user_id){
 $.ajax({
  type: "POST",
  url: "<?php echo base_url(); ?>profile/dashboard/freelancePrevious_Projects",
  dataType: 'text',
  data: {
    user_id: user_id
  },
  cache: false,
  success: function(data) {
    $("#freelance_previousProjects").html(data);
              //$("#freelance_previousProjects").html(data);
            }
          });
   return false;  //stop the actual form post !important!    
 }
//----------------script to show employer projects----------------------//

function FetchSkills(job_id,Skills){
  $.ajax({
    type: "POST",
    url: "<?php echo base_url(); ?>job/Job_listings/FetchSkills",
    dataType: 'text',
    data: {
      job_id: job_id,
      Skills: Skills
    },
    cache: false,
    success: function(data) {
     var key=JSON.parse(data);
                //alert(key);
                for(i=0; i< key.length; i++){
                    //$.alert(key[i].jm_skill_name);
                    $('#SkillId_'+job_id).append('<span span w3-padding><span  class="w3-padding-small w3-margin-right w3-round-xxlarge  w3-text-white" style="display:inline-block;margin-top:5px;background-color:#787878;font-size:8px;">'+key[i].jm_skill_name+'</span></span>');
                    $('#SkillData_'+job_id).append('<span span w3-padding><span  class="w3-padding-small w3-margin-right w3-round-xxlarge  w3-text-white" style="display:inline-block;margin-top:5px;background-color:#787878;font-size:8px;">'+key[i].jm_skill_name+'</span></span>');
                    $('#SkillName_'+job_id).append('<span span w3-padding><span  class="w3-padding-small w3-margin-right w3-round-xxlarge  w3-text-white" style="display:inline-block;margin-top:5px;background-color:#787878;font-size:8px;">'+key[i].jm_skill_name+'</span></span>');
                  }
                }               
              });
}
</script>
<script>
  function getskills(job_id,Skills){
    $.ajax({
     type: "POST",
     url: "<?php echo base_url(); ?>job/Job_listings/FetchSkills",
     dataType: 'text',
     data: {
      job_id: job_id,
      Skills: Skills
    },
    cache: false,
    success: function(data) {
     var key=JSON.parse(data);
     var j = 0;
     for(i=0; i< key.length; i++){
      $('#SkillDetails_'+job_id).append('<span span w3-padding><span  class="w3-padding-small w3-margin-right w3-round-xxlarge  w3-text-white" style="display:inline-block;margin-top:5px;background-color:#787878;font-size:8px;">'+key[i].jm_skill_name+'</span></span>');         
    }
  }
});
  }
</script>              
<script>
    //  -------------------ADD USER SKILL DESKTOP------------------------ //
    $("#add_userSkill_Btn").click(function () {
      var skill_id = $('#skill_list option[value="' + $('#my_skills').val() + '"]').data('value');
      var profile_type = $('#select_profileList').val();

      //if(skill_id != undefined){
        $.ajax({
          type: "POST",
          url: BASE_URL + "profile/dashboard/add_userSkills",
          data: { skill_id: skill_id, profile_type: profile_type },
            return: false, //stop the actual form post !important!
            success: function (data)
            {
              $("#skill_msg").html(data);
              $("#skill_msg_mob").html(data);
              $("#style-2").load(location.href + " #style-2>*", "");
              $("#style-mob").load(location.href + " #style-2>*", "");
              $('#my_skills').val('');
              $('#my_skills_mob').val('');
            }
          });
      // }else{
      //   alert("Please select skill first");
      //   return false;
      // }
            //stop the actual form post !important!
          });
//  --------------------END --------------------------------- //
</script>

<script>
    //  -------------------ADD USER SKILL MOBILE------------------------ //
    $("#add_userSkill_Btn_mob").click(function () {
      var skill_id = $('#skill_list_mob option[value="' + $('#my_skills_mob').val() + '"]').data('value');
      var profile_type = $('#select_profileList').val();
       // alert(skill_id);
       $.ajax({
        type: "POST",
        url: BASE_URL + "profile/dashboard/add_userSkills",
        data: { skill_id: skill_id, profile_type: profile_type },
            return: false, //stop the actual form post !important!
            success: function (data)
            {
              $("#skill_msg").html(data);
              $("#skill_msg_mob").html(data);
              $("#style-2").load(location.href + " #style-2>*", "");
              $("#style-mob").load(location.href + " #style-2>*", "");
              $('#my_skills').val('');
              $('#my_skills_mob').val('');
            }
          });
        return false;  //stop the actual form post !important!
      });
//  --------------------END --------------------------------- //
</script>

<script>
    //  -------------------DELETE USER SKILL------------------------ //
    function del_userSkill(skill_id) { 
      var profile_type = $('#select_profileList').val();
      $.ajax({
        type: "POST",
        url: BASE_URL + "profile/dashboard/del_userSkill",
        data: {skill_id:skill_id,
         profile_type:profile_type
       },
            return: false, //stop the actual form post !important!
            success: function (data)
            {
              $("#skill_msg").html(data);
              $("#skill_msg_mob").html(data);
              $("#style-2").load(location.href + " #style-2>*", "");
              $("#style-mob").load(location.href + " #style-2>*", "");
              $('#my_skills').val('');
              $('#my_skills_mob').val('');
            }
          });
        return false;  //stop the actual form post !important!
      }
//  --------------------END --------------------------------- //
</script>

<script>
  function fetch(){
    document.getElementById('cover').style.display='block';
    document.getElementById('mainDiv').style.display='none';
    window.setTimeout(function() {
      $("#cover").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
      });
        //window.location.href="'.base_url().'profile/dashboard";
        location.reload();
      }, 700);
  }
</script>
<!-- script to add comet chat script info -->
<script>
  var chat_name = '<?php echo $user_name; ?>';
  var chat_id = '<?php echo $user_id; ?>';
  //var chat_avatar = 'LOGGEDIN_PROFILE_IMAGE';
  //var chat_link = 'LOGGEDIN_USERS_PROFILE_LINK';
  var chat_role = 'Developer';
</script>

<script type="text/javascript" charset="utf-8" src="//fast.cometondemand.net/50319x_x3a1bc.js"></script>
<link type="text/css" rel="stylesheet" media="all" href="//fast.cometondemand.net/50319x_x3a1bc.css" />
<a href="javascript:void(0)" onclick="javascript:jqcc.cometchat.chatWith('20');">Chat with me<a>

<!-- script ends here -->
</body>
</html>
