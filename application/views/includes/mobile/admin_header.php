<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert/jquery-confirm.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/header/header_overlay.css">
        <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>css/alert/jquery-confirm.js"></script>
        <style type="text/css">
            .user_img{
                height: 40px;
                width: 40px;
                background-size: contain;
                background-position: center;
                background-repeat: no-repeat;
            }

            .timeline_img{
                height:500px;
                background-size: contain;
                background-position: center;
                background-repeat: no-repeat;
            }
        </style>
        <style>
            /* Style to reverse the caret icon from pointing downwards to upwards */
            .caret.caret-up {
                border-top-width: 0;
                border-bottom: 4px solid #fff;
            }
        </style>
    </head>
    <body>
        <?php
        $default_image = 'images/default_male.png';
        ?>
        <div class="w3-col s12 w3-text-white w3-padding-left" style="background-color: #00B8D4">
            <div class="w3-col s8">
                <h5><b>Jumla Business</b></h5>
            </div>
            <div class="dropdown w3-col s4" style="z-index: 2;">
                <button class="btn btn-primary w3-right dropdown-toggle" type="button" data-toggle="dropdown">
                    <div class="w3-col s4 w3-circle user_img w3-padding" style="background-image: url('<?php echo base_url() . $default_image; ?>');"></div>
                    <span class="w3-margin-top caret"></span></button>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="#">View Profile</a></li>
                    <li><a href="#">Logout</a></li>
                </ul>
            </div>           
        </div>
    </body>
    <script>
        $(document).ready(function () {
            $(".dropdown").on("hide.bs.dropdown", function () {
                alert(hi);
                //$(".btn").html('Dropdown <span class="caret"></span>');
            });
//            $(".dropdown").on("show.bs.dropdown", function () {
//                alert(hi);
//                //$(".btn").html('Dropdown <span class="caret caret-up"></span>');
//            });
        });
    </script>
</html>
