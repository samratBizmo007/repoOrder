<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
error_reporting(E_ERROR | E_PARSE);

?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
  <!-- <link rel="stylesheet" href="assets/css/alert/jquery-confirm.css"> -->
  <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
  <!-- <script type="text/javascript" src="assets/css/alert/jquery-confirm.js"></script> -->
</head>
<body class=" w3-light-grey">
  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-left:120px;">
  	 <header class="w3-container" >
                <h5><b><i class="fa fa-cog"></i> Edit Profile</b><a class="w3-button w3-right" href="<?php echo base_url(); ?>admin/user_profile"><span class="w3-text-orange"><b>Back To Profile </b></span></a></h5>
	</header>

		    <div class="w3-col l9 w3-border-left" id="editprofile">
                        <form id="editProfileForm" name="editProfileForm">
                            <div class="w3-col l12 w3-right">
                                <div class="w3-col l4  w3-padding">
                                    <div class="text-center profile_portfolio ">
                                        <img class="img img-circle w3-center" alt="Profile Image not found" style="height: 70%; width: 70%; object-fit:contain; "  src="<?php echo base_url() . $userDetails['status_message'][0]['user_image']; ?>" id="profile_imagePreview" onerror="this.src='<?php echo base_url() ?>css/logos/default_noimage.jpg'">
                                        <div class="w3-col l12 ">
                                            <h6 class="" style="color: #00B8D4;">Change photo</h6>
                                            <input type="file" class="w3-input " name="profile_image" id="profile_image" required>
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
                                    <input type="text" class="w3-input  w3-small" value="<?php echo $userDetails['status_message'][0]['website']; ?>" name="website" id="website" required>
                                </div>
                            </div>
                            <div class="w3-col l12 w3-padding-small w3-margin-top">
                                <div class="w3-col l2">
                                    <label class="w3-label w3-small">Bio: </label>
                                </div>
                                <div class="w3-col l10">
                                    <textarea class="w3-input w3-small w3-margin-bottom" name="bio" id="bio" rows="5" cols="50" style="resize: none;" required><?php echo $userDetails['status_message'][0]['bio']; ?></textarea>
                                </div>
                            </div>
                            <div class="w3-col l12 w3-padding-small w3-margin-top">
                                <div class="w3-col l2">
                                    <label class="w3-label w3-small">phone no: </label>
                                </div>
                                <div class="w3-col l10">
                                    <input type="number" class="w3-input  w3-small" value="<?php echo $userDetails['status_message'][0]['phone']; ?>" name="phone" id="phone" required>
                                </div>
                            </div>
                            <div class="w3-col l12 w3-padding-small w3-margin-top">
                                <div class="w3-col l2">
                                    <label class="w3-label w3-small">Address: </label>
                                </div>
                                <div class="w3-col l10">
                                    <textarea class="w3-input  w3-small" name="address" id="address" rows="5" cols="50" style="resize: none; text-align: left;" required><?php echo $userDetails['status_message'][0]['address']; ?></textarea>
                                </div>
                            </div>
                            

                            <div class="w3-col l12 w3-margin-bottom w3-padding-bottom w3-margin-bottom w3-center" id="btnsubmit">
                        <button  type="submit" title="submit profile" class="w3-margin-bottom w3-round w3-medium w3-text-white w3-button" style="background-color: #00B8D4;">Submit</button>
                    </div>
                        </form>
                    </div>



  </div>
</body>