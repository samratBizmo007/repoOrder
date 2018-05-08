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
    <body class="">
        <!-- !PAGE CONTENT! -->
        <div class="w3-main" style="margin-top: 40px; margin-bottom: 40px;">
            <!--            <header class="w3-container" >
                            <h5><b><i class="fa fa-cog"></i> Edit Profile</b><a class="w3-button w3-right" href="<?php echo base_url(); ?>admin/user_profile"><span class="w3-text-orange"><b>Back To Profile </b></span></a></h5>
                        </header>-->
<?php //echo base64_decode('c3dhcDEyMzQ=');?>
            <div class="w3-col l9 w3-border-left w3-margin-bottom" id="editprofile">
                <form id="editProfileForm" name="editProfileForm">
                    <div class="w3-col l12 w3-right">
                        <div class="col-sm-3 col-xs-3"></div>
                        <div class="w3-col s6 w3-center w3-padding">
                            <div class="text-center w3-padding profile_portfolio">
                            <div class="w3-circle w3-center" title="profile image" style="margin-left: 7px; background-position:center; background-size:contain; background-image: url('<?php echo base_url() . $userDetails['status_message'][0]['user_image']; ?>'); height:80px;width:80px;"></div>
<!--                                <img class="img img-circle w3-center" alt="Profile Image not found" style="height: 50%; width: 50%; object-fit:contain; "  src="<?php echo base_url() . $userDetails['status_message'][0]['user_image']; ?>" id="profile_imagePreview" onerror="this.src='<?php echo base_url() ?>css/logos/default_noimage.jpg'">-->
                                <div class="w3-col l12 ">
                                    <h6 class="w3-small" style="color: #00B8D4;">Change photo</h6>
                                    <input type="file" class="w3-input " name="profile_image" id="profile_image" >
                                    <input type="hidden" class="w3-input" name="profile_image_edit" id="profile_image_edit">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-3"></div>
                    </div>
                    <div class="w3-col l12 w3-padding w3-margin-top">
                        <div class="w3-col l2">
                            <label class="w3-label w3-small">Full Name: </label>
                        </div>
                        <div class="w3-col l10">
                            <input type="text" class="w3-input w3-border w3-small" placeholder="full name" value="<?php echo $userDetails['status_message'][0]['full_name']; ?>" name="fullname" id="fullname" required>
                        </div>
                    </div>
                    <div class="w3-col l12 w3-padding w3-margin-top">
                        <div class="w3-col l2">
                            <label class="w3-label w3-small">Website: </label>
                        </div>
                        <div class="w3-col l10">
                            <input type="text" class="w3-input w3-border w3-small" placeholder="website" value="<?php echo $userDetails['status_message'][0]['website']; ?>" name="website" id="website">
                        </div>
                    </div>
                    <div class="w3-col l12 w3-padding w3-margin-top">
                        <div class="w3-col l2">
                            <label class="w3-label w3-small">Bio: </label>
                        </div>
                        <div class="w3-col l10">
                            <textarea class="w3-input w3-border w3-small w3-margin-bottom" placeholder="bio" name="bio" id="bio" rows="5" cols="50" style="resize: none;"><?php echo $userDetails['status_message'][0]['bio']; ?></textarea>
                        </div>
                    </div>
                    <div class="w3-col l12 w3-padding w3-margin-top">
                        <div class="w3-col l2">
                            <label class="w3-label w3-small">phone no: </label>
                        </div>
                        <div class="w3-col l10">
                            <input type="number" class="w3-input w3-border w3-small" placeholder="phone no" value="<?php echo $userDetails['status_message'][0]['phone']; ?>" name="phone" id="phone" required>
                        </div>
                    </div>
                    <div class="w3-col l12 w3-padding w3-margin-top">
                        <div class="w3-col l2">
                            <label class="w3-label w3-small">Company Name: </label>
                        </div>
                        <div class="w3-col l10">
                            <input type="text" class="w3-input w3-border w3-small" placeholder="company name" value="<?php echo $userDetails['status_message'][0]['company_name']; ?>" name="company_name" id="company_name">
                        </div>
                    </div>
                    <div class="w3-col l12 w3-padding w3-margin-top w3-margin-bottom">
                        <div class="w3-col l2">
                            <label class="w3-label w3-small">Address: </label>
                        </div>
                        <div class="w3-col l10">
                            <textarea class="w3-input w3-border w3-small" placeholder="address" name="address" id="address" rows="5" cols="50" style="resize: none; text-align: left;" required><?php echo $userDetails['status_message'][0]['address']; ?></textarea>
                        </div>
                    </div>
                    <div class="w3-col l12 w3-margin-bottom w3-padding-bottom w3-center" id="btnsubmit">
                        <button  type="submit" title="submit profile" class="w3-margin-bottom w3-medium w3-text-white w3-button" style="background-color: #00B8D4;">Submit</button>
                    </div>
                </form>
            </div>
            <div class="w3-col l9 w3-border-left w3-margin-bottom" id="editprofile">
                <hr>
                <div class="w3-col l12 w3-center">
                   <span class="w3-center w3-label w3-large">Change Password</span>
                </div>
                <form id="changepass_Form" name="changepass_Form">
                    <div class="w3-col l12 w3-padding w3-margin-top">
                        <div class="w3-col l2">
                            <label class="w3-label w3-small">Current password: </label>
                        </div>
                        <div class="w3-col l10">
                            <input type="text" class="w3-input w3-border w3-small" placeholder="Current Password" value="" name="curr_password" id="curr_password" required>
                        </div>
                    </div>
                    <div class="w3-col l12 w3-padding w3-margin-top">
                        <div class="w3-col l2">
                            <label class="w3-label w3-small">New Password: </label>
                        </div>
                        <div class="w3-col l10">
                            <input type="password" onkeyup="checkPassword();" placeholder="New Password" class="w3-input w3-border w3-small" value="" name="new_password" id="new_password" required>
                        </div>
                    </div>
                    <div class="w3-col l12 w3-padding w3-margin-top">
                        <div class="w3-col l2">
                            <label class="w3-label w3-small">Confirm Password: </label>
                        </div>
                        <div class="w3-col l10">
                            <input type="password" onkeyup="checkPassword();" placeholder="Confirm Password" class="w3-input w3-border w3-small" value="" name="conf_password" id="conf_password" required>
                        </div>
                    </div>
                    <div class="w3-col l12 w3-margin-left w3-padding-small" id="message"></div>
                    <div class="w3-col l12 w3-center w3-padding-small w3-margin-bottom">
                        <button  type="submit" id="changepass_submit" title="Change Password" class="w3-center w3-button w3-medium w3-blue" disabled>Submit</button>                            
                    </div>
                </form>

            </div>
        </div>
    </body>
    <!--  script to update user dashboard image   -->
    <script>
        $(function () {
            $("#editProfileForm").submit(function () {
                dataString = $("#editProfileForm").serialize();
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
                        //location.reload();
                    }
                });
                return false;  //stop the actual form post !important!
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

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>user/edit_profile/changePassword",
                data: dataString,
                return: false, //stop the actual form post !important!
                success: function (data)
                {
                    $.alert(data);
                }
            });
            return false;  //stop the actual form post !important!
        });
    });
//  -------------------------END -------------------------------//

    </script>
</html>