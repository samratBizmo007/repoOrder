<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$user_name = $this->session->userdata('user_name');
$user_id = $this->session->userdata('user_id');
$user_role = $this->session->userdata('user_role');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'/>
        <!--        <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert/jquery-confirm.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/header/header_overlay.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,700,900" rel="stylesheet">
        <style>
            body {
                font-family: 'Roboto', sans-serif;
            }
        </style>
    </head>
    <body>
        <div class="w3-row w3-left w3-text-white header_footer_gradient w3-padding w3-top head_shadow" style="position: fixed;z-index: 3">
            <b class="w3-large">Jumla Business</b>

            <!-- Before login div -->
            <?php if ($user_role == '' || $user_id == '' || $user_name == '') { ?>
                <a href="<?php echo base_url(); ?>login" class="w3-large w3-right btn" style="padding:0; margin: 0;"><i class="fa fa-sign-in"></i></a>
            <?php } ?>
            <!-- Before login div ends -->

            <!-- After login div -->
            <?php if ($user_role != '' || $user_id != '' || $user_name != '') { ?>
                <a href="<?php echo base_url(); ?>login/logout" class="w3-large w3-right btn" style="padding: 0;margin: 0;"><i class="fa fa-sign-out"></i></a>
                <?php } ?>
            <!-- After login div ends -->

    </body>
</div>

</html>
