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
        // print_r($userDetails);
//        if ($all_userDetails['status'] == 200) {
//            foreach ($all_userDetails['status_message'] as $details) {
//                // print_r($details);
        ?>
        <div class="w3-row w3-padding" id="">
            <div class="col-lg-2"></div>
            <div class="w3-col l8 w3-margin-top w3-margin-bottom w3-border">
                <div class="w3-col l12">
                    <div class="w3-col l6">
                        <div class="w3-circle w3-large" style="background-position:center; background-size:contain; background-image: url('<?php echo base_url() . $userDetails['status_message'][0]['user_image']; ?>'); height:120px;width:120px;">
                        </div>                                 
                    </div>
                    <div class="w3-col l4 w3-margin-top">
                        <div class="w3-col l12 w3-margin-top"><label class="w3-xxlarge"><?php echo $userDetails['status_message'][0]['username']; ?></label></div>                                                  
                    </div>
                    <div class="w3-col l2 w3-margin-top">
                        <a class="btn w3-right w3-margin-top" href="<?php echo base_url(); ?>profile/edit_profile"><span class="w3-small bluish-green ">Edit Profile <i class="w3-medium w3-text-black fa fa-gear"></i></span></a>
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>

        <!-- div with small buttons row -->
    </body>
</html>