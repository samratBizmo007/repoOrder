<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
error_reporting(E_ERROR | E_PARSE);
$user_id=$this->session->userdata('user_id');
$user_name=$this->session->userdata('user_name');
$selected_profile_type=$this->session->userdata('selected_profile_type');
$profile_type=$this->session->userdata('profile_type');

if(($this->session->userdata('selected_profile_type'))==''){
  $selected_profile_type=$profile_type;
}
$profile_value='';
switch ($selected_profile_type) {
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
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile</title>
  <!-- Bootstrap -->  
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/normalize.css">
  <!--  <link rel="stylesheet" href="<?php echo base_url(); ?>css/stylesheet.css">-->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/editor.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/view_profile.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert/jquery-confirm.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/site.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/richtext.min.css">
  <script type="text/javascript" src="<?php echo base_url(); ?>css/js/jquery.min.js"></script>

  <script src="<?php echo base_url(); ?>css/js/jquery.richtext.js"></script>

  <script type="text/javascript" src="<?php echo base_url(); ?>css/js/const.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/alert/jquery-confirm.js"></script>

  <script type="text/javascript" src="<?php echo base_url(); ?>css/js/profile/edit_profile.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/js/selectize.js"></script>
  <!-- <script type="text/javascript" src="<?php echo base_url();?>dist/editor.js"></script> -->
  <!--  <script type="text/javascript" src="<?php echo base_url(); ?>css/js/country2.js"></script>-->




  <style>
  .scrolly::-webkit-scrollbar
  {
    width: 4px;  
  }
  .scrolly::-webkit-scrollbar-track
  {
    background-color: #00B59D;

  }
  .scrolly::-webkit-scrollbar-thumb
  {
    background: rgba(0, 0, 0, 0.5);
  }
</style>
</head>
<body>
  <div class="container" >

    <?php
    //print_r($all_userProfile_info);
    foreach ($all_userProfile_info['status_message'] as $key) {
      $name=$key['jm_user_name'];
      $nameArr=explode(' ',$name);
      $fname=$nameArr[0];
      $lname=$nameArr[1];
      $prof_image=$key['jm_profile_image'];
      $jm_userDesignation=$key['jm_userDesignation'];
      $jm_linkedIn_url=$key['jm_linkedIn_url'];
      $jm_userCity=$key['jm_userCity'];
      $jm_userState=$key['jm_userState'];
      $jm_userCountry=$key['jm_userCountry'];
      $jm_userDescription=$key['jm_userDescription'];
      $jm_ratePerHr=$key['jm_ratePerHr'];
      $expected_salary=$key['expected_salary'];
      $jm_userAspiration=$key['jm_userAspiration'];
      $jm_education=$key['jm_education'];
      $jm_experience=$key['jm_experience'];
      $jm_total_experience = $key['jm_total_experience'];
    }
    $password = '';
    $pass = '';
    //print_r($userInfo);
    foreach ($userInfo['status_message'] as $value){
     $pass = base64_decode($value['jm_password']); 
   }
   $passw = explode("|", $pass);
   $password = $passw[0];
        //echo $password;

   ?>
   <!-- div for about details of user and it's score row -->
   <?php 
   $hide_fullDiv="";
   $hide_rateDiv="";
   $hide_extraDiv="";
   switch ($selected_profile_type) {
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
    $hide_rateDiv="w3-hide";
    $hide_fullDiv="w3-hide";
  //$hide_rateDiv="w3-hide";
    break;

      //-------------case Job Employer----------------//
    case '4':
  // $hide_fullDiv="w3-hide";
  // $hide_rateDiv="w3-hide"; 
    $hide_extraDiv="w3-hide"; 
    break;
  }
  ?>
  <div class="col-lg-2"></div>
  <div class="w3-col l8">
   <form class="form-horizontal" id="Edit_profile" name="Edit_profile" role="form" enctype="multipart/form-data">
    <div class="w3-col l12">
      <div class="w3-col l8 ">
       <h2 class="bluishGreen_txt"><b>Edit Profile</b></h2>
       <a class=" btn badge" href="<?php echo base_url(); ?>profile/view_profile"><i class="fa fa-chevron-left w3-tiny"></i> View Profile</a>

     </div>
     <div class="w3-col l4 w3-padding">
      <div class="text-center profile_portfolio ">
        <img class="img img-thumbnail" alt="Profile Image not found" style="height: 100%; width: 100%; object-fit:contain; " align="right" src="<?php echo base_url().$prof_image; ?>" id="profile_imagePreview" onerror="this.src='<?php echo base_url()?>css/logos/default_noimage.jpg'">
        <div class="w3-col l12 ">
          <h6>Upload a profile photo</h6>
          <input type="file" class="w3-input" name="jm_profile_image" id="jm_profile_image">
          <input type="hidden" class="w3-input" name="jm_profile_image_edit" id="jm_profile_image_edit" value="<?php echo $key['jm_profile_image']; ?>">
        </div>
      </div>
    </div>
  </div>


  <div class ="w3-col l12" id="full_name">
    <h5 class="w3-col l12 w3-padding-tiny w3-text-black  w3-round w3-margin-bottom" style="padding-left:20px;"><b>Personal Details:</b></h5>
    <div class="w3-col l6 w3-padding">
      <label class="control-label ">First name:</label>
      <span class="w3-text-red">*</span>
      <input class="w3-input" pattern="^[_A-z]{1,}$" type="text" oninvalid="this.setCustomValidity('No whitespaces, special characters and numeric values allowed.')" oninput="setCustomValidity('')" name="jm_user_name" value="<?php echo $fname; ?>" placeholder="Name" <?php if($fname==''){ echo 'autofocus';} ?> required>
    </div> 
    <div class="w3-col l6 w3-padding">
      <label class="control-label">Last name:</label>
      <span class="w3-text-red">*</span>
      <input class="w3-input" pattern="^[_A-z]{1,}$" oninvalid="this.setCustomValidity('No whitespaces, special characters and numeric values allowed.')" oninput="setCustomValidity('')"  type="text" name="jm_user_last" value="<?php echo $lname; ?>" placeholder="Surname" required>
    </div>
  </div>

  <div class="w3-col l12" id="designation">
    <div class="w3-col l6 w3-padding">
      <label class="control-label">Designation:</label>
      <span class="w3-text-red">*</span>
      <input class="w3-input" type="text" name="jm_userDesignation" value="<?php echo $jm_userDesignation; ?>" placeholder="Php Developer">
    </div>

    <div class="w3-col l6 w3-padding <?php if($profile_type==1){echo '';} else{ echo 'w3-hide';} ?>">
      <label class="control-label">Rate/Hour:</label>
      <input class="w3-input"  type="number" min="0" placeholder="Rate/Hour" name="jm_rateHr" value="<?php echo $jm_ratePerHr; ?>">
    </div>
  </div>

  <div class="w3-col l12  w3-padding" id="user_description" style="padding-right: 5px;">
   <label class="control-label">Description:</label>
   <textarea class="" id="txtEditor-new" name="jm_userDescription" class="content" rows="7" placeholder="Describe you here..."><?php echo $jm_userDescription; ?></textarea> 
   <span class="help-block"></span>
 </div>
 <!--added country by country table-->
 <?php// print_r($country);?>
 <div class="w3-col l12 " id="location">
  <div class="col-lg-4 w3-margin-top">
    <label class="control-label">Country:</label>
    <span class="w3-text-red">*</span>
    <!--         	<span id = "countrydata" name = "countrydata" style = "color:red; display: block;">&nbsp;</span>-->
    <select class="w3-input"  id="user_country" name="user_country" required>
     <option value="">Select Country</option>
     <?php 
     foreach ($country['status_message'] as $key){?>
     <option value="<?php echo $key['id']; ?>"  <?php if($jm_userCountry == $key['id']){ echo 'selected=selected'; } ?> ><?php echo $key['name']; ?></option>
     <?php }
     ?>
     <!--        <option value="<?php //echo $jm_userCountry ?>" <?php //if($jm_userCountry == 'Angola'){echo'selected=selected';} ?>><?php echo $jm_userCountry ?></option>-->
   </select>
 </div>
 <!--added country by country table-->
 <!--added country by state by country id from state table-->

 <div class="col-lg-4 w3-margin-top" id="state">
  <label class="control-label">State:</label>
  <span class="w3-text-red">*</span>
  <!--         	<span id = "statedata" name = "statedata" style = "color:red; display: block;">&nbsp;</span>-->
  <select class="w3-input" name="user_state" id="user_state" required>
    <?php if($jm_userState != ''){?>
    <option value="<?php echo $jm_userState ?>"><?php echo $jm_userState ?></option>
    <?php } //echo $jm_userState; ?>
  </select>

</div>
<!--added country by state by country id from state table-->

<div class="col-lg-4 w3-margin-top">
 <label class="control-label">City:</label>
 <span class="w3-text-red">*</span>
 <input class="w3-input" type="text" placeholder="Enter your city" name="jm_userCity" value="<?php echo $jm_userCity; ?>" required>
</div>
</div>

<div id="jobSeeker_form" class="<?php if($profile_type==3){echo '';} else{ echo 'w3-hide';} ?>">
 <div class="w3-col l12 w3-margin-top">
   <h5 class="w3-col l12 w3-text-black w3-round w3-padding-top"><b>Job Seeker Miscellaneous Details:</b></h5>
 </div>
 
 <div class="w3-col l12 w3-padding" id="user_aspiration" style="padding-right: 5px;">
   <label class=" control-label">Job Seeker's Aspiration:</label>
   <textarea id="jm_userAspiration" name="jm_userAspiration" class="content" rows="7" placeholder="Describe you details here..." ><?php echo $jm_userAspiration; ?></textarea>
   <span class="help-block"></span>
 </div>
 <div class="w3-col l12 w3-margin-top">
  <div class="col-lg-3">
    <label class="control-label">Expected Salary:</label>

    <select class="w3-input" id="expected_salary" name="expected_salary" selected>
      <option value="0">Select Salary</option>
      <option value="0-1 LPA" <?php if($expected_salary=='0-1 LPA'){ echo 'selected'; } ?>>0-1 LPA</option>
      <option value="1-2 LPA" <?php if($expected_salary=='1-2 LPA'){ echo 'selected'; } ?>>1-2 LPA</option>
      <option value="2-3 LPA" <?php if($expected_salary=='2-3 LPA'){ echo 'selected'; } ?>>2-3 LPA</option>
      <option value="3-4 LPA" <?php if($expected_salary=='3-4 LPA'){ echo 'selected'; } ?>>3-4 LPA</option>
      <option value="4-5 LPA" <?php if($expected_salary=='4-5 LPA'){ echo 'selected'; } ?>>4-5 LPA</option>
      <option value="More Than 5 LPA">More Than 5 LPA</option>
    </select>
  </div>
  <div class="col-lg-3">
    <label class="control-label">Total Experience:</label>
    <select class="w3-input" id="total_exp" name="total_exp" selected>
      <option value="0" <?php if($jm_total_experience =="0"){ echo 'selected'; } ?>>0</option>
      <option value="1" <?php if($jm_total_experience =="1"){ echo 'selected'; }  ?>>1</option>
      <option value="2" <?php if($jm_total_experience =="2"){ echo 'selected'; }  ?>>2</option>
      <option value="3" <?php if($jm_total_experience =="3"){ echo 'selected'; }  ?>>3</option>
      <option value="4" <?php if($jm_total_experience =="4"){ echo 'selected'; }  ?>>4</option>
      <option value="5" <?php if($jm_total_experience =="5"){ echo 'selected'; }  ?>>5</option>
      <option value="6" <?php if($jm_total_experience =="6"){ echo 'selected'; }  ?>>6</option>
      <option value="7" <?php if($jm_total_experience =="7"){ echo 'selected'; }  ?>>7</option>
      <option value="8" <?php if($jm_total_experience =="8"){ echo 'selected'; }  ?>>8</option>
      <option value="9" <?php if($jm_total_experience =="9"){ echo 'selected'; }  ?>>9</option>
      <option value="10+" <?php if($jm_total_experience =="10+"){ echo 'selected'; }  ?>>10+</option>     
    </select>
  </div>

  <div class="col-lg-6">
    <label class="control-label">LinkedIn URL:</label>
    <input class="w3-input" pattern="http(s)?:\/\/([\w]+\.)?linkedin\.com\/in\/(A-z 0-9 _ -)\/?" oninvalid="this.setCustomValidity('LinkedIn Profile link format is invalid.')" oninput="setCustomValidity('')" type="text" name="LinkedIn_url" placeholder="Add URL here..." value="<?php echo $jm_linkedIn_url; ?>">
  </div>
</div>
</div>

<div class ="w3-col l12 w3-margin-top">
  <h5 class="w3-col l12 w3-padding-tiny w3-text-black w3-round w3-margin-top"><b>Educational Details:</b></h5>
  <?php 
  $count=0;
  if($jm_education==''){?>
  <div class="w3-col l12">
    <div class="col-lg-4">
      <label class="control-label">Course :</label>
      <span class="w3-text-red">*</span>
      <input class="w3-input"  type="text" name="course[]" placeholder="BE IT" value="<?php echo $edu['jm_course']; ?>">
    </div>

    <div class="col-lg-4">
      <label class="control-label">Passing Year :</label>
      <span class="w3-text-red">*</span>
      <input class="w3-input" type="number" name="passing_year[]" min="1800"  placeholder="2018" value="<?php echo $edu['jm_passing_year']; ?>" style="">
    </div>

    <div class="col-lg-4">
      <label class="control-label">University :</label>
      <span class="w3-text-red">*</span>
      <input class="w3-input" type="text" name="university[]" placeholder="university name" value="<?php echo $edu['jm_university']; ?>">
    </div>
  </div> 
  <?php } 
  else {
    foreach (json_decode($jm_education,TRUE) as $edu) {
      $hide='';
      if($count==0){
        $hide='w3-hide';
      }
      ?>
      <div class="w3-col l12">
       <div class="w3-col l12">
        <a class="w3-right" title="remove" onclick="$(this).parent('div').parent('div').remove();"><i class="fa fa-close"></i></a>
      </div> 
      <div class="col-lg-4">
        <label class="control-label">Course :</label>
        <span class="w3-text-red">*</span>
        <input class="w3-input"  type="text" name="course[]" placeholder="BE IT" value="<?php echo $edu['jm_course']; ?>">
      </div>

      <div class="col-lg-4">
        <label class="control-label">Passing Year :</label>
        <span class="w3-text-red">*</span>
        <input class="w3-input" type="number" name="passing_year[]" min="1800" placeholder="passing year" value="<?php echo $edu['jm_passing_year']; ?>" style="">
      </div>

      <div class="col-lg-4">
        <label class="control-label">University :</label>
        <span class="w3-text-red">*</span>
        <input class="w3-input" type="text" name="university[]" placeholder="university name" value="<?php echo $edu['jm_university']; ?>">
      </div>
    </div> 
    <?php 
    $count++;
  } }
  ?>
  <div id="more_education" class=""></div>
  <span><a  id="add_more" class="btn add_moreMaterial w3-small bluish-green w3-right">Add more <i class="fa fa-plus"></i></a></span>
</div>

<div class ="w3-col l12">
  <h5 class="w3-col l12  w3-padding-tiny w3-text-black w3-round " style="padding-left:1px;"><b>Work Experience Details:</b></h5>
  <?php 
  $count=0; 
  if($jm_experience==''){?>
  <div class="w3-col l12">
    <div class="w3-col l12">
      <a class="w3-right" title="remove" onclick="$(this).parent('div').parent('div').remove();"><i class="fa fa-close"></i></a>
    </div>      
    <div class="col-lg-4">
      <label class="control-label">Previous designation :</label>
      <input class="w3-input"  type="text" name="jm_previous_designation[]" placeholder="UI Designer" value="<?php echo $exp['jm_designation']; ?>">
    </div>

    <div class="col-lg-4 ">
      <label class="control-label">Worked-till :</label>
      <input class="w3-input" type="date" name="jm_worked_till[]" value="<?php echo $exp['jm_worked_till']; ?>" style="padding:0px">
    </div>

    <div class="col-lg-4 ">
     <label class="control-label">Organisation :</label>
     <input class="w3-input" type="text" name="jm_organisation[]" placeholder="company name " value="<?php echo $exp['jm_organisation']; ?>">
   </div>     
 </div>
 <?php 
}
else {
  foreach (json_decode($jm_experience,TRUE) as $exp) {
    $hide='';
    if($count==0){
      $hide='w3-hide';
    }
    ?>
    <div class="w3-col l12">
     <div class="col-lg-4">
      <label class="control-label">Previous designation :</label>
      <input class="w3-input"  type="text" name="jm_previous_designation[]" placeholder="UI Designer" value="<?php echo $exp['jm_designation']; ?>">
    </div>

    <div class="col-lg-4 ">
      <label class="control-label">Worked-till :</label>
      <input class="w3-input" type="date" name="jm_worked_till[]" value="<?php echo $exp['jm_worked_till']; ?>" style="padding:0px">
    </div>

    <div class="col-lg-4 ">
     <label class="control-label">Organisation :</label>
     <input class="w3-input" type="text" name="jm_organisation[]" placeholder="company name " value="<?php echo $exp['jm_organisation']; ?>">
   </div>     
 </div>
 <?php 
}
$count++;
} ?>
<div id="more_experiance" class=""></div>
<span><a  id="add_more_experiance" class="btn add_moreMaterial w3-small bluish-green w3-right">Add more <i class="fa fa-plus"></i></a></span>
</div>  

<div class="form-group w3-margin-top w3-padding-right w3-margin-bottom">
  <div class="w3-col l12 ">
    <center><button type="submit" class="btn w3-center btn-lg w3-text-white bluishGreen_bg"><i class="fa fa-save"></i> Save Changes</button></center>
    <span></span>
  </div>
</div>
</form>
</div>
<div class="col-lg-2"></div>
</div>


<div class="container">
  <div class="w3-col l12">
    <div class="col-lg-2"></div>
    <form name="updatePassword" id="updatePassword">
      <div class="w3-col l8" id="passwordDiv">
        <div class="w3-col l12">
          <h5 class="w3-col l12  w3-padding-tiny w3-text-black w3-round " style="padding-left:1px;"><b>Change Password:</b></h5>
          <div class="w3-col l6">
            <label class="w3-padding-left">Your Password: </label>
            <div class="w3-margin-bottom w3-padding-left input-group">
              <input class="form-control" placeholder="Enter Password" id="user_password" name="user_password" type="password" minlength="8" value="<?php echo $password; ?>" required>
              <span class="input-group-btn"><a class="btn btn-default" onclick="show_pass(this);">Show</a></span>
            </div>
          </div>
          <div class="w3-col l6">
            <label class="w3-padding-left">Confirm Password: </label>
            <div class=" w3-padding-left">
              <input class="form-control input-group" placeholder="Re-enter your password" id="user_passwordConfirm" name="user_passwordConfirm" type="password" minlength="8"  required>
            </div>
            <div class=" w3-padding-left"><label id="message"></label></div>
          </div>                    
        </div>
        <div class="w3-col l12">
          <button class="btn bluishGreen_bg w3-text-white w3-margin-bottom w3-right" name="edit_btn" id="edit_btn" type="submit">
            <i class="fa fa-pencil"></i> Change Password
          </button>
        </div>
      </div>
    </form>
    <div class="col-lg-2"></div>
  </div>

</div>
<hr>
<script>
  $(function () {
    $("#updatePassword").submit(function () {
      dataString = $("#updatePassword").serialize();
      $.ajax({
        type: "POST",
        url: BASE_URL + "profile/Edit_profile/upadteUser_Password",
        data:dataString,
        return: false, //stop the actual form post !important!
        success: function (data)
        {
          $.alert(data);
          $("#passwordDiv").load(location.href + " #passwordDiv>*", "");               
        }
      });
    return false; //stop the actual form post !important!
  });
  });
</script>    
<script>
	$('#user_passwordConfirm').on('keyup', function () {
		if ($('#user_password').val() == $('#user_passwordConfirm').val()) {
			$('#edit_btn').prop("disabled", false);
			$('#message').html('');

		} else {
			$('#message').html('Password Not Matching').css('color', 'red');
			$('#edit_btn').prop("disabled", true);
		}
	});

  $('#user_password').on('keyup', function () {
    if ($('#user_password').val() == $('#user_passwordConfirm').val()) {
      $('#edit_btn').prop("disabled", false);
      $('#message').html('');

    } else {
      $('#message').html('Password Not Matching').css('color', 'red');
      $('#edit_btn').prop("disabled", true);
    }
  });
</script>
<!--script end -->
<!-- script script to hide or show password input field -->
<script>
  function show_pass(item){ 
    if(item.innerText=='Show'){
     item.innerText='Hide';
     document.getElementById('user_password').type="text"; 
   }else{
     item.innerText='Show';
     document.getElementById('user_password').type="password"; 
   }
 } 
</script>
<!-- script end -->

<script type="text/javascript">
  $(function () {
    $("#Edit_profile").submit(function (e) {
      e.preventDefault();
      dataString = $("#Edit_profile").serialize();
    //alert(dataString);
   // return false;
   $.ajax({
    type: "POST",
    url: BASE_URL + "profile/Edit_profile/get_allEditinfo",
    data:  new FormData(this),
    contentType: false,
    cache: false,
    processData:false,
    success: function (data)
    {        
     $.alert(data);
   }
 });
   return false;  
 });
  });
</script>  
<script>   
  $(document).ready(function () {
    $("#user_country").change(function(){
      var country_id = $('#user_country').val();
        //$("#state").load(location.href + " #state>*", "");
        $('#user_state').html('');
        $.ajax({
          type: "POST",
          url: BASE_URL + "profile/Edit_profile/getStateby_country",
          data: {
           country_id: country_id 
         },  
         dataType: "text",
        return: false, //stop the actual form post !important!
        success: function (data)
        {
          var obj = JSON.parse(data);
            //alert(obj.status_message[0].name);
            for(var i=0; i<(obj.status_message).length; i++){
              $('#user_state').append('<option value="'+obj.status_message[i].name+'">'+obj.status_message[i].name+'</option>');
            }
            //$('#user_state').append('<option value=""></option>');
//             for (var i = 0; i < (response.data).length; i++)
//                {
//                    $("#driverName").append("<option value='" + response.data[i].drivername + "'>" + response.data[i].drivername + "</option>");
//
//                }
}
});
    return false; //stop the actual form post !important!
  });
  });
</script>
<script>
  $(document).ready(function() {
    $('#txtEditor-new').richText();
    $('#jm_userAspiration').richText();
  });
</script>
</body>