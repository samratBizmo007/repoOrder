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
        <span class="w3-large fa fa-comment"> Your Message Box</span>
        <hr>

        <!-- Show user's Message -->
        <div class="w3-col l12 col-md-12 w3-margin-bottom">
          <!-- Nav tabs -->
          <?php $active_tab=$this->uri->segment('3'); ?>

          <ul class="nav nav-tabs">
            <li <?php if($active_tab==''){ echo 'class="active"'; } ?> ><a href="<?php echo site_url()."message/pm"?>" ><span class="fa fa-inbox"></span> <span class="w3-hide-small">Inbox</span> &nbsp;</a></li>
            <li <?php if($active_tab=='3'){ echo 'class="active"'; } ?> ><a href="<?php echo site_url()."message/pm/messages/".MSG_UNREAD?>" ><span class="fa fa-mail-reply"></span> <span class="w3-hide-small">Unread</span></a></li>
            <li <?php if($active_tab=='2'){ echo 'class="active"'; } ?> ><a href="<?php echo site_url()."message/pm/messages/".MSG_SENT?>" ><span class="fa fa-mail-reply"></span> <span class="w3-hide-small">Sent</span></a></li>
            <li <?php if($active_tab=='1'){ echo 'class="active"'; } ?> ><a href="<?php echo site_url()."message/pm/messages/".MSG_DELETED?>"><span class="fa fa-trash"></span> <span class="w3-hide-small">Trash Bin</span></a></li>
            
          </ul>
          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane fade in active" id="home">
              
              <?php if(count($messages)>0):?>             

                <?php for ($i=0; $i<count($messages); $i++): ?>
                  <div class="w3-col l12 list-group-item w3-hover-light-grey " >
                    <a href="<?php echo site_url().'message/pm/message/'.$messages[$i][TF_PM_ID]; ?>">
                      <div class="w3-col l3">
                        <span class="w3-large"><strong>
                          <?php
                          if($type != MSG_SENT) echo $messages[$i][TF_PM_AUTHOR];
                          else
                          {
                            $recipients = $messages[$i][PM_RECIPIENTS];
                            foreach ($recipients as $recipient)
                              echo (next($recipients)) ? $recipient.', ' : $recipient;
                          }?>
                        </strong></span><br>
                        <span class="w3-tiny"><i><?php echo $messages[$i]['TF_PM_USERID']; ?></i></span>
                      </div>
                      <div class="w3-col l5 w3-padding-top">
                        <span class="w3-medium "><strong>
                          <?php echo $messages[$i][TF_PM_SUBJECT] ?>
                        </strong></span>
                      </div>
                    </a>
                    <div class="w3-col l4 ">
                      <div class="w3-col l12">
                        <span class=" w3-right">
                          <?php if($type != MSG_SENT): ?>
                            <a href="<?php echo site_url().'message/pm/send/'.$messages[$i][TF_PM_AUTHOR].'/RE&#58;'.$messages[$i][TF_PM_SUBJECT]; ?>" class="btn w3-small" title="Reply Back"><span class="text-muted  "><i class="fa fa-reply"></i></span></a> 
                          <?php endif; ?>

                          <?php if($type != MSG_DELETED){  ?>
                          <a href="<?php echo site_url().'message/pm/delete/'.$messages[$i][TF_PM_ID].'/'.$type; ?>" class="btn w3-small" title="Delete Message"><span class="text-muted "><i class="fa fa-remove"></i></span> </a>
                          <?php } else { ?>
                          <a href="<?php echo site_url().'message/pm/restore/'.$messages[$i][TF_PM_ID]; ?>" class="btn w3-small" title="Restore Message"><span class="text-muted "><i class="fa fa-repeat"></i></span> </a>
                          <?php } ?>
                        </span>
                      </div><br>
                      <div class="w3-col l12">
                        <span class=" w3-right"><a class="btn w3-tiny" disabled>
                          <?php echo $messages[$i][TF_PM_DATE]; ?>
                        </a></span> 
                      </div>

                    </div>
                  </div>

                <?php endfor;?>

              <?php else:?>
                <h3>No messages found.</h3>
              <?php endif;?>
            </div>
            <div class="tab-pane fade in" id="profile">
              <div class="list-group">
                <div class="list-group-item">
                  <span class="text-center">This tab is empty.</span>
                </div>
              </div>
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
