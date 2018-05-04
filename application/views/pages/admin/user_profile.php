<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html>
       <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manage Product</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert/jquery-confirm.css">
        <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>css/alert/jquery-confirm.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>css/js/admin/admin_settings.js"></script>
    </head>
    <body class="w3-wide">
        <?php
        //print_r($all_userDetails);
//        if ($all_userDetails['status'] == 200) {
//            foreach ($all_userDetails['status_message'] as $details) {
//                // print_r($details);
        ?>
        <div class="w3-row w3-padding" id="mainDiv">
            <div class="col-lg-2"></div>
            <div class="w3-col l8 w3-margin-top w3-margin-bottom">
                <div class="w3-col l8">
                    <div class="w3-col l5 w3-padding-xxlarge">
                        <?php
                        // echo $details['jm_profile_image']; 
                        $prof_image = base_url() . $details['jm_profile_image'];
                        if ($details['jm_profile_image'] == '') {
                            echo '<div class="col-lg-12 w3-circle prof_pic bg_imageConfig" style="background-image: url(\'' . base_url() . 'images/default_male.png\');"></div>';
                        } else {
                            echo '<div class="col-lg-12 w3-circle prof_pic bg_imageConfig" style="background-image: url(\'' . base_url() . $details['jm_profile_image'] . '\'),url(\'' . base_url() . 'images/default_male.png\');"></div>';
                        }
                        ?>              
                    </div>

                    <div class="w3-col l7 w3-padding">
                        <?php
                        if ($details['jm_user_name'] != '') {
                            ?>
                            <div class="w3-col l12"><label class="w3-xlarge"><?php echo $details['jm_user_name']; ?></label></div>
                            <?php
                        } else {
                            echo '<div class="w3-col l12"><label class="w3-xlarge">Enter your name</label><a href="' . base_url() . 'profile/edit_profile#full_name" class="btn  bluishGreen_txt w3-small fa fa-plus"> Add</a></div>';
                        }
                        ?>

                        <?php
                        if ($details['jm_userDesignation'] != '') {
                            ?>
                            <div class="w3-col l12"><span class="w3-large bluish-green"><?php echo $details['jm_userDesignation']; ?></span></div>
                            <?php
                        } else {
                            echo '<div class="w3-col l12"><span class="w3-large bluish-green">Your Designation</span><a href="' . base_url() . 'profile/edit_profile#designation" class="btn bluishGreen_txt w3-small fa fa-plus"> Add</a></div>';
                        }
                        ?>
                        <div class="w3-col l12 marginTop_large">
                            <div class="w3-col l12">
                                <?php
                                if ($details['jm_userCity'] != '') {
                                    ?>
                                    <span class="w3-small"><i class="w3-large fa fa-map-marker"></i> <?php echo $details['jm_userCity'] . ', ' . $details['jm_userState'] . ', ' . $all_userDetails['country']; ?>.</span><br>
                                    <span class="w3-tiny w3-text-grey">Member since <?php echo date('M d,Y', strtotime($key['joining_date'])); ?>.</span>
                                    <?php
                                } else {
                                    echo '<span class="w3-small"><i class="w3-large fa fa-map-marker"></i> where are you from?</span><a href="' . base_url() . 'profile/edit_profile#location" class="btn bluish-green w3-small fa fa-plus"> Add</a><br>
                          <span class="w3-tiny w3-text-grey">Member since ' . date('M d,Y', strtotime($key['joining_date'])) . '.</span>';
                                }
                                ?>
                            </div>
                        </div>        
                    </div>
                </div>
                <div class="w3-col l4">
                    <div class="w3-col l12 w3-margin-top w3-padding-top"><span class="w3-right w3-border w3-padding-tiny w3-padding-right w3-padding-left w3-round-xlarge"><?php echo $profile_value; ?></span></div>
                    <div class="w3-col l12 marginTop_large2">
                        <div class="w3-col l12 w3-padding-top">
                            <a class="btn w3-right w3-margin-top" href="<?php echo base_url(); ?>profile/edit_profile"><span class="w3-small bluish-green ">Edit Profile <i class="w3-medium w3-text-black fa fa-gear"></i></span></a>
                            <br>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>

        <!-- div with small buttons row -->
    </body>
</html>