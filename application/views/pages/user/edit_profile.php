<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ERROR | E_PARSE);
$user_id = $this->session->userdata('user_id');
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert/jquery-confirm.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>css/alert/jquery-confirm.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>css/js/admin/admin_settings.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,700,900" rel="stylesheet">

    <style>
    body {
        font-family: 'Roboto', sans-serif;
    }

    input{
        
       font-size:14px;
       color:#9ca4ab;
        }
</style>
</head>

<body class="w3-light-grey">
    <!-- !PAGE CONTENT! -->
    <div class="w3-main w3-padding-small" style="margin-left:120px;">
        <!-- Header -->
        <header class="w3-container" >
            <h5><b><i class="fa fa-cog"></i> Edit Profile</b><a class="w3-button w3-right w3-small" href="<?php echo base_url(); ?>user/user_profile/<?php echo base64_encode($user_id); ?>"><span class="w3-text-grey"><b><i class="fa fa-chevron-left"></i> Back To Profile</b></span></a></h5>

        </header>


        <div class="col-lg-2"></div>
        <div class="w3-col l8 w3-margin-top w3-margin-bottom">
            <div class="w3-col l12 w3-border">
                <div class="w3-col l3">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active" id="edit"><a href="#">Edit profile</a></li>
                        <li class="" id="change"><a href="#">Change Password</a></li>                            
                    </ul> 
                </div>
                <div class="w3-col l9 w3-border-left" id="editprofile">
                    <form id="editProfileForm" name="editProfileForm">
                        <div class="w3-col l12 w3-right">
                            <div class="w3-col l4 w3-right w3-padding">
                                <div class="text-center w3-small profile_portfolio ">
                                    <img class="img img-thumbnail" alt="Profile Image not found" style="height: 100%; width: 100%; object-fit:contain; " align="right" src="<?php echo PROFILEIMAGE_PATH.$userDetails['status_message'][0]['user_image']; ?>" id="profile_imagePreview" onerror="this.src='<?php echo base_url() ?>css/logos/default_noimage.jpg'">
                                    <div class="w3-col l12">
                                        <h6>Upload a profile photo</h6>
                                        <input type="file" class="w3-input" name="profile_image" id="profile_image" onchange="readURL(this);">
                                        <input type="hidden" class="w3-input" value="<?php echo $userDetails['status_message'][0]['user_image']; ?>" name="profile_image_edit" id="profile_image_edit">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w3-col l12 w3-padding-small w3-margin-top">
                            <div class="w3-col l2">
                                <label class="w3-label w3-small" style="color: #00B8D4;">Full Name: <font color ="red"><span id ="pname_star">*</span></font></label>
                            </div>
                            <div class="w3-col l10">
                                <input type="text" class="w3-input w3-border w3-small" placeholder="Enter your Full Name" value="<?php echo $userDetails['status_message'][0]['full_name']; ?>" name="fullname" id="fullname" required>
                            </div>
                        </div>
                        <div class="w3-col l12 w3-padding-small w3-margin-top">
                            <div class="w3-col l2">
                                <label class="w3-label w3-small" style="color: #00B8D4;">Website: </label>
                            </div>
                            <div class="w3-col l10">
                                <input type="url" class="w3-input w3-border w3-small" placeholder="Enter any of your website url (optional) eg.https://www.site.domain.com" value="<?php echo $userDetails['status_message'][0]['website']; ?>" name="website" id="website">
                            </div>
                        </div>
                        <div class="w3-col l12 w3-padding-small w3-margin-top">
                            <div class="w3-col l2">
                                <label class="w3-label w3-small" style="color: #00B8D4;">Bio: </label>
                            </div>
                            <div class="w3-col l10">
                                <textarea class="w3-input w3-border w3-small w3-margin-bottom" placeholder="Hey! Tell us something about yourself and your Business. (optional)" name="bio" id="bio" rows="5" cols="50" style="resize: none;"><?php echo $userDetails['status_message'][0]['bio']; ?></textarea>
                            </div>
                        </div>
                        <div class="w3-col l12 w3-padding-small w3-margin-top">
                            <div class="w3-col l2">
                                <label class="w3-label w3-small" style="color: #00B8D4;">Country code:<font color ="red"><span id ="pname_star">*</span></font></label>
                            </div>
                            <div class="w3-col l10">
                                <?php
                                $countryCode = '';
                                $phone = '';
                                $countryCode = $userDetails['status_message'][0]['country_code'];
                                    //echo $countryCode;
                                ?>
                                <div class="w3-col l3">
                                    <select class="w3-input w3-border w3-small" name="countryCode" id="countryCode" required>
                                        <option value="965" <?php
                                        if ($countryCode == '965') {
                                            echo 'selected';
                                        }
                                        ?>>+965 (Kuwait)</option>
                                        <option value="971" <?php
                                        if ($countryCode == '971') {
                                            echo 'selected';
                                        }
                                        ?>>+971 (Dubai)</option>
                                        <option value="91" <?php
                                        if ($countryCode == '91') {
                                            echo 'selected';
                                        }
                                        ?>>+91 (India)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="w3-col l12 w3-padding-small w3-margin-top">
                            <div class="w3-col l2">
                                <label class="w3-label w3-small" style="color: #00B8D4;">Whatsapp no:</label>
                            </div>
                            <div class="w3-col l10">                              
                                <input type="text" class="w3-input w3-border w3-small" placeholder="Enter your Whatsapp Number" value="<?php echo $userDetails['status_message'][0]['whatsapp_no']; ?>" maxLength="10" name="whatsapp_no" id="whatsapp_no">
                            </div>
                        </div>
                        <div class="w3-col l12 w3-padding-small w3-margin-top">
                            <div class="w3-col l2">
                                <label class="w3-label w3-small" style="color: #00B8D4;">Mobile no: <font color ="red"><span id ="pname_star">*</span></font></label>
                            </div>
                            <div class="w3-col l10">                           
                                <input type="text" class="w3-input w3-border w3-small" placeholder="Enter your Mobile Number" value="<?php echo $userDetails['status_message'][0]['phone']; ?>" maxLength="10" name="phone" id="phone" required>
                            </div>
                        </div>

                        <div class="w3-col l12 w3-padding-small w3-margin-top">
                            <div class="w3-col l2">
                                <label class="w3-label w3-small" style="color: #00B8D4;">Company name: <font color ="red"><span id ="pname_star">*</span></font></label>
                            </div>
                            <div class="w3-col l10">
                                <input type="text" class="w3-input w3-border w3-small" placeholder="Enter your Company name" value="<?php echo $userDetails['status_message'][0]['company_name']; ?>" name="company_name" id="company_name" required>
                            </div>
                        </div>
                        <div class="w3-col l12 w3-padding-small w3-margin-top">
                            <div class="w3-col l2">
                                <label class="w3-label w3-small" style="color: #00B8D4;">Address: <font color ="red"><span id ="pname_star">*</span></font></label>
                            </div>
                            <div class="w3-col l10">
                                <textarea class="w3-input w3-border w3-small" name="address" id="address" placeholder="Enter your address" rows="5" cols="50" style="resize: none; text-align: left;" required><?php echo $userDetails['status_message'][0]['address']; ?></textarea>
                            </div>
                        </div>
                        <div class="w3-col l12 w3-center w3-padding" id="submitEditBtn">
                            <button  type="submit" title="submit profile" class="w3-center w3-margin-bottom w3-button w3-blue"><i class="fa fa-edit"></i> Update Profile</button> 
                        </div>
                    </form>
                </div>
                
                <!-- DIV FOR edit profile PASSWORD-->
                <!-- DIV FOR CHNGE PASSWORD-->
                <div class="w3-col l9 w3-border-left" id="changepassword" style="display: none;">
                    <form id="changepass_Form" name="changepass_Form">
                        <div class="w3-col l12 w3-padding-small w3-margin-top">
                            <div class="w3-col l2">
                                <label class="w3-label w3-small" style="color: #00B8D4;">Current password: <font color ="red"><span id ="pname_star">*</span></font></label>
                            </div>
                            <div class="w3-col l10 w3-padding-right w3-padding-left">
                                <input type="text" class="w3-input w3-border w3-small" placeholder="Current Password" value="" name="curr_password" id="curr_password" required>
                            </div>
                        </div>
                        <div class="w3-col l12 w3-padding-small w3-margin-top">
                            <div class="w3-col l2">
                                <label class="w3-label w3-small" style="color: #00B8D4;">New password: <font color ="red"><span id ="pname_star">*</span></font></label>
                            </div>
                        <div class="w3-col l10 w3-padding-right w3-padding-left">
                            <div class="w3-col l11 m12 s12">
                                <input class="w3-input w3-border w3-small" onkeyup="checkPassword();" placeholder="Enter Password" id="new_password" name="new_password" type="password" minlength="8"  required>
                            </div>
                            <div class="w3-col l1 w3-margin-bottom">
                                <span class="">
                                    <a class="w3-button w3-border" onclick="show_pass();" style="padding-right:11px ;padding-bottom:4px;padding-left: 11px"><i id="pass_sym" class="fa fa-eye"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="w3-col l12 w3-padding-small">
                        <div class="w3-col l2">
                            <label class="w3-label w3-small" style="color: #00B8D4;">Confirm password: <font color ="red"><span id ="pname_star">*</span></font></label>
                        </div>
                        <div class="w3-col l10 w3-padding-right w3-padding-left">
                            <input type="password" onkeyup="checkPassword();" placeholder="Confirm Password" class="w3-input w3-border w3-small" value="" name="conf_password" id="conf_password" minlength="8" required>
                        </div>
                    </div>
                    <div class="w3-col l12 w3-margin-left w3-padding-small" id="message"></div>
                    <div class="w3-col l12 w3-center w3-padding-small" id="changePassBtn">
                        <button  type="submit" id="changepass_submit" title="Change Password" class="w3-margin w3-center w3-button w3-blue" disabled><i class="fa fa-edit"></i> Update Password</button>                            
                    </div>
                </form>
            </div>
            <!-- DIV FOR CHNGE PASSWORD-->
        </div>
    </div>
    <div class="col-lg-2"></div>
</div>       
</body>
</html>
<!--  script to update user profile  -->
<script>
    $(function () {
        $("#editProfileForm").submit(function () {
            dataString = $("#editProfileForm").serialize();
            $('#submitEditBtn').html('<span class="w3-card w3-padding-small w3-margin-bottom w3-round"><i class="fa fa-spinner fa-spin w3-large"></i> <b>Updating profile. Please wait...</b></span>');
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>user/Edit_profile/updateProfile",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data)
                {
                    $.alert(data);
                    $('#submitEditBtn').html('<button type="submit" title="submit profile" class="w3-center w3-margin-bottom w3-button w3-blue">Update</button>');
                    //location.reload();
                }
            });
            return false;  //stop the actual form post !important!

        });
    });

//----------------change pills on click to edit profile------------------//
$("#edit").click(function () {
    $("#edit").addClass("active");
    $("#change").removeClass("active");
    $("#editprofile").show();
    $("#changepassword").hide();
});
    //---------------------fun ends here--------------------------------------//
    //----------------change pills on click to change password------------------//

    $("#change").click(function () {
        $("#change").addClass("active");
        $("#edit").removeClass("active");
        $("#editprofile").hide();
        $("#changepassword").show();
    });
    //----------------change pills on click to change password------------------//    
    //-------------------fucntion to check confirm password---------------
    function checkPassword() {
        if ($('#new_password').val() == $('#conf_password').val()) {
            $('#changepass_submit').prop("disabled", false);
            $('#message').html('');

        } else {
            $('#message').html('<label>Password Not Matching</label>').css('color', 'red');
            $('#changepass_submit').prop("disabled", true);
        }
    }
//-----------function ends------------------------

//  ------------------------Change Password -------------------------//
$(function () {
    $("#changepass_Form").submit(function () {
        dataString = $("#changepass_Form").serialize();
        $('#changePassBtn').html('<span class="w3-card w3-padding-small w3-margin-bottom w3-round"><i class="fa fa-spinner fa-spin w3-large"></i> <b>Updating password. Please wait...</b></span>');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>user/edit_profile/changePassword",
            data: dataString,
                return: false, //stop the actual form post !important!
                success: function (data)
                {
                    $.alert(data);
                    $('#changePassBtn').html('<button  type="submit" id="changepass_submit" title="Change Password" class="w3-margin w3-center w3-button w3-blue">Update Password</button>');
                }
            });
            return false;  //stop the actual form post !important!
        });
});
//  -------------------------END -------------------------------//

</script>
<!-- script ends here -->
<script>
    // ----function to preview selected image for profile------//
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profile_imagePreview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
// ------------function preview image end------------------//
</script>
<!-- show password script -->
<script>
    function show_pass() {
        var item = $('#pass_sym');
        if (item.hasClass('fa-eye')) {
            item.removeClass('fa-eye');
            item.addClass('fa-eye-slash');
            document.getElementById('new_password').type = "text";
        } else {
            item.removeClass('fa-eye-slash');
            item.addClass('fa-eye');
            document.getElementById('new_password').type = "password";
        }
    }
</script>
