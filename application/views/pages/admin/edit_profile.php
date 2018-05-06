<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ERROR | E_PARSE);
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
    </head>

    <body class="w3-light-grey">
        <!-- !PAGE CONTENT! -->
        <div class="w3-main w3-padding-small" style="margin-left:120px;">
            <!-- Header -->
            <header class="w3-container" >
                <h5><b><i class="fa fa-cog"></i> Edit Profile</b><a class="w3-button w3-right" href="<?php echo base_url(); ?>admin/user_profile"><span class="w3-text-blue"><b>Back To Profile </b></span></a></h5>

            </header>
            <?php // print_r($userDetails);?>

            <div class="col-lg-2"></div>
            <div class="w3-col l8 w3-margin-top w3-margin-bottom">
                <div class="w3-col l12 w3-border">
                    <div class="w3-col l3">
                        <ul class="nav nav-pills nav-stacked">
                            <li class="edit"><a>Edit profile</a></li>
                            <li class="change"><a href="#">Change Password</a></li>                            
                        </ul> 
                    </div>
                    <div class="w3-col l9 w3-card" id="editprofile">
                        <form id="editProfileForm" name="editProfileForm">
                            <div class="w3-col l12 w3-right">
                                <div class="w3-col l4 w3-right w3-padding">
                                    <div class="text-center profile_portfolio ">
                                        <img class="img img-thumbnail" alt="Profile Image not found" style="height: 100%; width: 100%; object-fit:contain; " align="right" src="<?php echo base_url() . $userDetails['status_message'][0]['user_image']; ?>" id="profile_imagePreview" onerror="this.src='<?php echo base_url() ?>css/logos/default_noimage.jpg'">
                                        <div class="w3-col l12">
                                            <h6>Upload a profile photo</h6>
                                            <input type="file" class="w3-input" name="profile_image" id="profile_image" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w3-col l12 w3-padding-small w3-margin-top">
                                <div class="w3-col l2">
                                    <label class="w3-label w3-small">Full Name: </label>
                                </div>
                                <div class="w3-col l10">
                                    <input type="text" class="w3-input w3-small" value="<?php echo $userDetails['status_message'][0]['full_name']; ?>" name="fullname" id="fullname" required>
                                </div>
                            </div>
                            <div class="w3-col l12 w3-padding-small w3-margin-top">
                                <div class="w3-col l2">
                                    <label class="w3-label w3-small">Website: </label>
                                </div>
                                <div class="w3-col l10">
                                    <input type="text" class="w3-input w3-small" value="<?php echo $userDetails['status_message'][0]['website']; ?>" name="website" id="website" required>
                                </div>
                            </div>
                            <div class="w3-col l12 w3-padding-small w3-margin-top">
                                <div class="w3-col l2">
                                    <label class="w3-label w3-small">Bio: </label>
                                </div>
                                <div class="w3-col l10">
                                    <textarea class="w3-input w3-small w3-margin-bottom" name="bio" id="bio" rows="5" cols="50" style="resize: none;" required>
                                        <?php echo $userDetails['status_message'][0]['bio']; ?>
                                    </textarea>
                                </div>
                            </div>
                            <div class="w3-col l12 w3-padding-small w3-margin-top">
                                <div class="w3-col l2">
                                    <label class="w3-label w3-small">phone no: </label>
                                </div>
                                <div class="w3-col l10">
                                    <input type="number" class="w3-input w3-small" value="<?php echo $userDetails['status_message'][0]['phone']; ?>" name="phone" id="phone" required>
                                </div>
                            </div>
                            <div class="w3-col l12 w3-padding-small w3-margin-top">
                                <div class="w3-col l2">
                                    <label class="w3-label w3-small">Address: </label>
                                </div>
                                <div class="w3-col l10">
                                    <textarea class="w3-input w3-small w3-margin-bottom" name="address" id="address" rows="5" cols="50" style="resize: none; text-align: left;" required>
                                        <?php echo $userDetails['status_message'][0]['address']; ?>
                                    </textarea>
                                </div>
                            </div>
                            <div class="w3-col l12 w3-center w3-padding-small w3-margin-top">
                                <button  type="submit" title="submit profile" class="w3-margin w3-center w3-button w3-blue">Submit</button>                            
                            </div>
                        </form>
                    </div>
                    <!-- DIV FOR edit profile PASSWORD-->
                    <!-- DIV FOR CHNGE PASSWORD-->
                    <div class="w3-col l9 w3-card" id="changepassword" style="display: none;">
                        <div class="w3-col l12 w3-padding-small w3-margin-top">
                            <div class="w3-col l2">
                                <label class="w3-label w3-small">Current password: </label>
                            </div>
                            <div class="w3-col l10">
                                <input type="text" class="w3-input w3-small" value="" name="curr_password" id="curr_password" required>
                            </div>
                        </div>
                        <div class="w3-col l12 w3-padding-small w3-margin-top">
                            <div class="w3-col l2">
                                <label class="w3-label w3-small">New Password: </label>
                            </div>
                            <div class="w3-col l10">
                                <input type="text" class="w3-input w3-small" value="" name="new_password" id="new_password" required>
                            </div>
                        </div>
                        <div class="w3-col l12 w3-padding-small w3-margin-top">
                            <div class="w3-col l2">
                                <label class="w3-label w3-small">Confirm Password: </label>
                            </div>
                            <div class="w3-col l10">
                                <input type="text" class="w3-input w3-small" value="" name="conf_password" id="conf_password" required>
                            </div>
                        </div>
                        <div class="w3-col l12 w3-center w3-padding-small w3-margin-top">
                            <button  type="submit" title="Change Password" class="w3-margin w3-center w3-button w3-blue">Submit</button>                            
                        </div>
                    </div>
                    <!-- DIV FOR CHNGE PASSWORD-->
                </div>

            </div>
            <div class="col-lg-2"></div>
        </div>
    </body>
</html>
<!--  script to update user dashboard image   -->
<script>
    $(function () {
        $("#editProfileForm").submit(function () {
            dataString = $("#editProfileForm").serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>admin/Edit_profile/updateProfile",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data)
                {
                    $.alert(data);
                    location.reload();
                }
            });
            return false;  //stop the actual form post !important!

        });
    });

    $(".edit").click(function () {
        $("#editprofile").show();
        $("#changepassword").hide();
    });
    $(".change").click(function () {
        $("#editprofile").hide();
        $("#changepassword").show();
    });
</script>
<!-- script ends here -->