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

        <!-- Show user's Ijarline items -->
        <div class="w3-col l12 col-md-12">
          <!-- Nav tabs -->
          <?php $active_tab=$this->uri->segment('3'); ?>

          <ul class="nav nav-tabs">
            <li class="active"><a href="<?php echo site_url()."message/pm"?>" ><span class="fa fa-inbox"></span> <span class="w3-hide-small">Inbox</span> &nbsp;</a></li>
            <li <?php if($active_tab=='3'){ echo 'class="active"'; } ?> ><a href="<?php echo site_url()."message/pm/messages/".MSG_UNREAD?>" ><span class="fa fa-mail-reply"></span> <span class="w3-hide-small">Unread</span></a></li>
            <li <?php if($active_tab=='2'){ echo 'class="active"'; } ?> ><a href="<?php echo site_url()."message/pm/messages/".MSG_SENT?>" ><span class="fa fa-mail-reply"></span> <span class="w3-hide-small">Sent</span></a></li>
            <li <?php if($active_tab=='1'){ echo 'class="active"'; } ?> ><a href="<?php echo site_url()."message/pm/messages/".MSG_DELETED?>"><span class="fa fa-trash"></span> <span class="w3-hide-small">Trash Bin</span></a></li>
            
          </ul>
          <!-- Tab panes -->
          <?php
/*
 * Note:
 * 'name' is the "name" property of the input field / list
 * 'id' is the "id" property of the input field / list AND the "for" property of the label field
 * 'name' and 'id' dont have to be the same - but it is most logical
 */
$this->load->library('session');
$MAX_INPUT_LENGTHS = $this->config->item('$MAX_INPUT_LENGTHS', 'pm');
$recipients = array(
  'name'  => PM_RECIPIENTS,
  'id'  => PM_RECIPIENTS,
  'value' => set_value(PM_RECIPIENTS, $message[PM_RECIPIENTS]),
  'maxlength' => $MAX_INPUT_LENGTHS[PM_RECIPIENTS], 
  'size'  => 40,
  'class' =>  'form-control',
  'readonly'  =>  0
);
$subject = array(
  'name'  => TF_PM_SUBJECT,
  'id'  => TF_PM_SUBJECT,
  'value' => set_value(TF_PM_SUBJECT, $message[TF_PM_SUBJECT]),
  'maxlength' => $MAX_INPUT_LENGTHS[TF_PM_SUBJECT], 
  'size'  => 40,
  'class' =>  'form-control'
);
$body = array(
  'name'  => TF_PM_BODY,
  'id'  => TF_PM_BODY,
  'value' => set_value(TF_PM_BODY, $message[TF_PM_BODY]),
  'cols'  => 80,
  'rows'  => 5,
  'class' =>  'form-control'
);
?>

<?php echo form_open($this->uri->uri_string()); ?>
<table class="w3-margin-top" width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="5%"><?php echo form_label('To :', $recipients['id']); ?></td>
    <td width="90%" class="w3-padding"><?php echo form_input($recipients); ?></td>
    <td><?php echo form_error($recipients['name']); ?></td> 
  </tr> 
  <tr>
    <td><?php echo form_label('Subject:', $subject['id']); ?></td>
    <td class="w3-padding"><?php echo form_input($subject); ?></td>
    <td><?php echo form_error($subject['name']); ?></td>  
  </tr> 
  <tr>
    <td><?php echo form_label('Message:', $body['id']); ?></td>
    <td  class="w3-padding"><?php echo form_textarea($body); ?></td>
    <td><?php echo form_error($body['name']); ?></td> 
  </tr>
  <tr>
    <td colspan=2 align="center" valign="top" style="background:#F2F2F2; padding:4px;">
      <label>
        <!-- DO NOT CHANGE BUTTON NAME, NEEDED FOR CONTROLLER "send" -->
        <input type="submit" name="btnSend" id="btnSend" value="Send" />
      </label>
    </td>
    <td></td>
  </tr> 
  <tr>
    <td align="left" valign="top" style="font-weight:bold; background:#F2F2F2; padding:4px;">
    </td>
    <td align="left" valign="top" style="font-weight:bold; background:#F2F2F2; padding:4px;">
      <?php
      if(isset($status)) echo $status.' ';
      if($this->session->flashdata('status')) echo $this->session->flashdata('status').' ';
      if(!$found_recipients)
      {
        foreach($suggestions as $original => $suggestion) 
        {
          echo 'Did you mean <font color="#00CC00">'.$suggestion.'</font> for <font color="#CC0000">'.$original.'</font> ?'; 
          echo '<br />';
        }
      } ?>
    </td>
    <td></td>
  </tr>
</table>
<?php echo form_close(); ?>
</div>
<!-- item div end -->
</div>
</div>
    <div class="col-lg-2"></div>
  </div>
</body>
</html>
