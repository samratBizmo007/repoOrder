<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
</head>
<body>
    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-top: 40px;">
        <div class="w3-col l9" style="padding: 10px">
            <form id="uploadImageForm" name="uploadImageForm" enctype="multipart/form-data">
                <div class="w3-col l12 w3-right w3-card-2 w3-round">
                    <div class="w3-col l12 w3-padding w3-center">
                        <span class="w3-medium w3-text-grey"><i class="fa fa-user-circle"></i> Profile Photo</span>
                    </div>
                    <div class="col-sm-2 col-xs-2"></div>
                    <div class="w3-col s8 w3-center w3-margin-bottom">
                        <div class="text-center w3-padding">
                            <?php
                            $default_image = 'images/default_male.png';
                            if ($userDetails['status_message'][0]['user_image'] == '') {
                                ?>
                                <img class="img img-circle" id="profile_imagePreview" src="<?php echo base_url().$default_image; ?>" style="height: 80px; width: 80px;background-position:center; background-repeat: no-repeat; background-size:contain;">                                  
                            <?php } else { ?>
                                <img class="img img-circle" id="profile_imagePreview" src="<?php echo PROFILEIMAGE_PATH.$userDetails['status_message'][0]['user_image']; ?>" style="height: 80px; width: 80px;background-position:center; background-repeat: no-repeat; background-size:contain;">
                            <?php } ?>
                            <div class="w3-col l12">
                                <br>
                                <input type="file" class="w3-input w3-border" name="profile_image" id="profile_image" onchange="readURL(this);" required style="padding: 0">
                                <div class="w3-col l12 w3-center w3-margin-top" id="uploadImgMsg">
                                    <button  type="submit" id="uploadimg" title="submit profile" class="w3-medium w3-text-white w3-button" style="background-color: #00B8D4;"><i class="fa fa-image"></i> Update Photo</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-2"></div>
                </div>
            </form>
            <div class="w3-col l12" >
                <div class="w3-col l12 w3-card-2 w3-round w3-margin-top">
                    <div class="w3-col l12 w3-padding w3-center">
                        <span class="w3-medium w3-text-grey"><i class="fa fa-address-book"></i> Personal Details</span>
                    </div>
                    <form id="editProfileForm" name="editProfileForm" enctype="multipart/form-data">
                        <div class="w3-col l12 w3-padding">
                            <div class="w3-col l2">
                                <label class="w3-label w3-small" style="color: #00B8D4;">Full Name: <font color ="red"><span id ="pname_star">*</span></font></label>
                            </div>
                            <div class="w3-col l10">
                                <input type="text" class="w3-input w3-small" placeholder="Enter your Full Name" value="<?php echo $userDetails['status_message'][0]['full_name']; ?>" name="fullname" id="fullname" required>
                            </div>
                        </div>
                        <div class="w3-col l12 w3-padding">
                            <div class="w3-col l2">
                                <label class="w3-label w3-small" style="color: #00B8D4;">Website: </label>
                            </div>
                            <div class="w3-col l10">
                                <input type="url" class="w3-input w3-small" placeholder="(optional) eg.https://www.site.domain.com" value="<?php echo $userDetails['status_message'][0]['website']; ?>" name="website" id="website">
                            </div>
                        </div>
                        <div class="w3-col l12 w3-padding">
                            <div class="w3-col l2">
                                <label class="w3-label w3-small" style="color: #00B8D4;">Bio: </label>
                            </div>
                            <div class="w3-col l10">
                                <textarea class="w3-input w3-small " placeholder="Hey! Tell us something about yourself and your Business." name="bio" id="bio" rows="5" cols="50" style="resize: none;"><?php echo $userDetails['status_message'][0]['bio']; ?></textarea>
                            </div>
                        </div>
                        <div class="w3-col l12 w3-padding">
                            <div class="w3-col l2">
                                <label class="w3-label w3-small" style="color: #00B8D4;">Country code: <font color ="red"><span id ="pname_star">*</span></font></label>
                            </div>
                            <div class="w3-col l3">
                                <?php
                                $countryCode = '';
                                $phone = '';
                                $countryCode = $userDetails['status_message'][0]['country_code'];
                            //echo $countryCode;
                                ?>
                                <div class="w3-col s6">
                                    <select class="w3-input w3-small" name="countryCode" id="countryCode" required>
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
                        <div class="w3-col l12 w3-padding">
                            <div class="w3-col l2">
                                <label class="w3-label w3-small" style="color: #00B8D4;">Whatsapp no:</label>
                            </div>
                            <div class="w3-col l10">                           
                                <input type="text" class="w3-input w3-small" placeholder="Enter your Whatsapp Number" value="<?php echo $userDetails['status_message'][0]['whatsapp_no']; ?>" name="whatsapp_no" id="whatsapp_no">
                            </div>
                        </div>
                        <div class="w3-col l12 w3-padding">
                            <div class="w3-col l2">
                                <label class="w3-label w3-small" style="color: #00B8D4;">Phone no: <font color ="red"><span id ="pname_star">*</span></font></label>
                            </div>
                            <div class="w3-col l10">
                                <input type="text" class="w3-input w3-small" placeholder="Enter your Mobile Number" value="<?php echo $userDetails['status_message'][0]['phone'];
                                ; ?>" name="phone" id="phone" required>
                            </div>                
                        </div>
                        <div class="w3-col l12 w3-padding">
                            <div class="w3-col l2">
                                <label class="w3-label w3-small" style="color: #00B8D4;">Company name: <font color ="red"><span id ="pname_star">*</span></font></label>
                            </div>
                            <div class="w3-col l10">
                                <input type="text" class="w3-input w3-small" placeholder="Enter your Company name" value="<?php echo $userDetails['status_message'][0]['company_name']; ?>" name="company_name" id="company_name" required>
                            </div>
                        </div>
                        <div class="w3-col l12 w3-padding ">
                            <div class="w3-col l2">
                                <label class="w3-label w3-small" style="color: #00B8D4;">Address: <font color ="red"><span id ="pname_star">*</span></font></label>
                            </div>
                            <div class="w3-col l10">
                                <textarea class="w3-input w3-small" placeholder="Enter your address" name="address" id="address" rows="5" cols="50" style="resize: none; text-align: left;" required><?php echo $userDetails['status_message'][0]['address']; ?></textarea>
                            </div>
                        </div>
                        <div class="w3-col l12 w3-padding w3-center" id="btnsubmit">
                            <button  type="submit" id="submitEditBtn" title="submit profile" class="w3-medium w3-text-white w3-button" style="background-color: #00B8D4;"><i class="fa fa-edit"></i> Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="w3-col l9 w3-margin-bottom" style="padding: 10px">
            <div class="w3-col l12 w3-card-2 w3-round">
                <div class="w3-col l12 w3-padding w3-center">
                    <span class="w3-medium w3-text-grey"><i class="fa fa-lock"></i> Change Password</span>
                </div>
                
                <form id="changepass_Form" name="changepass_Form">
                    <div class="w3-col l12 w3-padding ">
                        <div class="w3-col l2">
                            <label class="w3-label w3-small" style="color: #00B8D4;">Current password: </label>
                        </div>
                        <div class="w3-col l10">
                            <input type="text" class="w3-input w3-small" placeholder="Enter Current Password" value="" name="curr_password" id="curr_password" required>
                        </div>
                    </div>
                    <div class="w3-col l12 w3-padding">
                        <div class="w3-col l2">
                            <label class="w3-label w3-small" style="color: #00B8D4;">New Password: </label>
                        </div>
                        <div class="w3-col l10">
                            <div class="w3-col s10">
                                <input class="w3-input" onkeyup="checkPassword();" placeholder="Enter New Password" id="new_password" name="new_password" type="password" minlength="8"  required>
                            </div>
                            <div class="w3-col s2">
                                <span class=""><a class="w3-button w3-border" onclick="show_pass();"><i id="pass_sym" class="fa fa-eye"></i></a></span>
                            </div>
                        </div>
                    </div>
                    <div class="w3-col l12 w3-padding">
                        <div class="w3-col l2">
                            <label class="w3-label w3-small" style="color: #00B8D4;">Confirm Password: </label>
                        </div>
                        <div class="w3-col l10">
                            <input type="password" onkeyup="checkPassword();" placeholder="Re-enter New Password" class="w3-input w3-small" value="" name="conf_password" id="conf_password" required>
                        </div>
                    </div>
                    <div class="w3-col l12 w3-margin-left w3-padding-small" id="message"></div>
                    <div class="w3-col l12 w3-center w3-padding-small w3-margin-bottom" id="changePassBtn">
                        <button  type="submit" id="changepass_submit" title="Change Password" class="w3-center w3-button w3-medium w3-blue" disabled><i class="fa fa-edit"></i> Update Password</button>                            
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- add more space below form-->
    <div class="w3-col l12" style="height: 50px"></div>
</body>
<!--  script to update user dashboard image   -->
<script>
    $(document).ready(function(e){
//  -------------------REGISTER FORM------------------------ //
$(function () {
    $("#editProfileForm").submit(function () {
        dataString = $("#editProfileForm").serialize();
        // alert(dataString);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>user/Edit_profile/updateProfileMob",
            dataType : 'text',
            data: dataString,
            return: false, //stop the actual form post !important!
            beforeSend: function(){
             $('#btnsubmit').html('<span class="w3-card w3-padding-small w3-margin-bottom w3-round"><i class="fa fa-spinner fa-spin w3-large"></i> <b>Updating profile. Please wait...</b></span>');
         },
         success: function(data){
            $.alert(data);
            $('#btnsubmit').html('<button  type="submit" id="submitEditBtn" title="submit profile" class="w3-medium w3-text-white w3-button" style="background-color: #00B8D4;"><i class="fa fa-edit"></i> Update Profile</button>');
        },
        error:function(data){
            $.alert('something went wrong! Profile was not updated.');
            $('#btnsubmit').html('<button  type="submit" id="submitEditBtn" title="submit profile" class="w3-medium w3-text-white w3-button" style="background-color: #00B8D4;"><i class="fa fa-edit"></i> Update Profile</button>');
        }
    });
        return false;  //stop the actual form post !important!
    });
});
//  --------------------END --------------------------------- //

$(document).ready(function (e) {

    $("#uploadImageForm").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo base_url(); ?>user/Edit_profile/updateImage",        // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,        // To send DOMDocument or non processed data file it is set to false
            beforeSend: function(){
             $('#uploadImgMsg').html('<span class="w3-card w3-padding-small w3-margin-bottom w3-round"><i class="fa fa-spinner fa-spin w3-large"></i> <b>Updating profile...</b></span>');
         },
         success: function(data){
            $.alert(data);
            $('#uploadImgMsg').html('<button  type="submit" id="uploadimg" title="upload image" class="w3-margin-top w3-text-white w3-button" style="background-color: #00B8D4;"><i class="fa fa-gallery"></i> Update Photo</button>');
        },
        error:function(data){
            $.alert('something went wrong!');
        }
    });
    }
    ));
});
});
    
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
                        $('#changePassBtn').html('<button  type="submit" id="changepass_submit" title="Change Password" class="w3-center w3-button w3-medium w3-blue">Update Password</button> ');
                    }
                });
                return false;  //stop the actual form post !important!
            });
        });
        //  -------------------------END -------------------------------//
    </script>
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

    </html>