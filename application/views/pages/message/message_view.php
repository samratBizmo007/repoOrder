<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
//error_reporting(E_ERROR | E_PARSE);
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
<body class="">
  <div class="w3-container w3-center w3-margin" style="display: none;" id="cover">
    <label class="w3-xlarge" id="spinner_label"></label><br>
    <img src="<?php echo base_url(); ?>css/logos/progress.gif" width="50%" height="auto">
  </div>
  <div class="w3-row w3-black" id="mainDiv">
    <div class="col-lg-2"></div>
    <div class="w3-col l8">

      <div class="w3-col l12 w3-padding-small w3-round-large w3-white">
        <div class="w3-col l12 col-md-12 w3-margin-bottom">
          <!-- Nav tabs -->
          <?php $active_tab=$this->uri->segment('3'); ?>

          <ul class="nav nav-tabs">
            <li <?php if($active_tab==''){ echo 'class="active"'; } ?> ><a href="<?php echo site_url()."message/pm"?>" ><span class="fa fa-inbox"></span> <span class="w3-hide-small">Inbox</span> &nbsp;</a></li>
            <li <?php if($active_tab=='3'){ echo 'class="active"'; } ?> ><a href="<?php echo site_url()."message/pm/messages/".MSG_UNREAD?>" ><span class="fa fa-mail-reply"></span> <span class="w3-hide-small">Unread</span></a></li>
            <li <?php if($active_tab=='2'){ echo 'class="active"'; } ?> ><a href="<?php echo site_url()."message/pm/messages/".MSG_SENT?>" ><span class="fa fa-mail-reply"></span> <span class="w3-hide-small">Sent</span></a></li>
            <li <?php if($active_tab=='1'){ echo 'class="active"'; } ?> ><a href="<?php echo site_url()."message/pm/messages/".MSG_DELETED?>"><span class="fa fa-trash"></span> <span class="w3-hide-small">Trash Bin</span></a></li>
            
          </ul>
        </div>
        <span class="w3-large fa fa-inbox">&nbsp;Message</span>
        <hr>

        <!-- Show user's Ijarline items -->
        <div class="w3-col l12 col-md-12">
          <div class="w3-col l12 w3-round-large w3-card-2 w3-padding-large w3-margin-bottom">
            <div class="w3-col l12 w3-margin-bottom">
              <span class="w3-left w3-small">Reply to: <a href="<?php echo site_url().'message/pm/send/'.$message[TF_PM_AUTHOR] ?>"><strong class="w3-medium w3-text-blue"><?php echo $message[TF_PM_AUTHOR]; ?></strong></a>
              </span>
            </div>
            
            <div class="w3-col l12 w3-margin-bottom">
              <span class="w3-left w3-small">Subject:</span><br>
              <span class="w3-large">
                <strong><?php echo $message[TF_PM_SUBJECT]; ?></strong>
              </span>
          </div>
            
            <div class="w3-col l12 w3-margin-bottom">
              <span class="w3-left w3-small">Message:</span><br>
              <strong><i><q><span class=""><?php echo $message[TF_PM_BODY]; ?></span></q></i></strong>
          </div>
            <!-- <?php foreach($message[PM_RECIPIENTS] as $recipient) echo (next($message[PM_RECIPIENTS])) ? $recipient.', ' : $recipient; ?> -->

            <div class="w3-col l12 w3-margin-top">
              <span class="w3-right w3-tiny"><?php echo $message[TF_PM_DATE]; ?></span>             
            </div>            
          </div>
          
        </div>
        <!-- item div end -->
      </div>
    </div>
    <div class="col-lg-2"></div>
  </div>
</body>
</html>
