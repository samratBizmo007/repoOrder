<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert/jquery-confirm.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/header/header_overlay.css">

        <!-- Material Design Bootstrap -->
        <link href="<?php echo base_url() ?>css/home_page/css/style.css" rel="stylesheet">
        <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>css/alert/jquery-confirm.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>css/js/const.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>css/js/login/login.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>css/js/loadingoverlay.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>css/js/loadingoverlay_progress.min.js"></script>
        <style>

        </style>
    </head>
    <body>
        <?php
        if (!empty($authURL)) {
            echo '<div class="w3-center w3-display-middle"><a classs="w3-center" href="' . $authURL . '"><img src="' . base_url() . 'images/flogin.png" alt=""/></a></div>';
        } else {
            ?>
            <div class="wrapper">
                <h1>Facebook Profile Details </h1>
                <div class="welcome_txt">Welcome <b><?php echo $userData['first_name']; ?></b></div>
                <div class="fb_box">
                    <div style="position: relative;">
                        <img src="<?php echo $userData['cover']; ?>" />
                        <img style="position: absolute; top: 90%; left: 45%;" src="<?php echo $userData['picture']; ?>"/>
                    </div>
                    <p><b>Facebook ID : </b><?php echo $userData['oauth_uid']; ?></p>
                    <p><b>Name : </b><?php echo $userData['first_name'] . ' ' . $userData['last_name']; ?></p>
                    <p><b>Email : </b><?php echo $userData['email']; ?></p>
                    <p><b>Gender : </b><?php echo $userData['gender']; ?></p>
                    <p><b>Locale : </b><?php echo $userData['locale']; ?></p>
                    <p><b>You are login with : </b>Facebook</p>
                    <p><b>Profile Link : </b><a href="<?php echo $userData['link']; ?>" target="_blank">Click to visit Facebook page</a></p>
                    <p><b>Logout from <a href="<?php echo $logoutURL; ?>">Facebook</a></b></p>
                </div>
            </div>
        <?php } ?>
    </body>
</html>
