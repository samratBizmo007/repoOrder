<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Project Listing</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
 <!--  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css"> -->
  <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css"> -->
  <link href="<?php echo base_url(); ?>css/bootstrap/bootstrap-toggle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert/jquery-confirm.css">
  <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css"> -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/joblisting.css">
  <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>css/bootstrap/bootstrap-toggle.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/alert/jquery-confirm.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/js/const.js"></script>
</head>
<body>

<div class="w3-container ">
      <div class="col-lg-1"></div>
      <div class="col-lg-8 w3-border solid black ">
         <?php 

            if($response==1)
            {
                  $count=1;
                  foreach ($response as $key)  
                   { 
                        echo $key['jm_project_title'];
                        ?> 
          <div class="row">
            <div class="col-md-9">
              <h4>Email Sending Application</h4>
              <div>
                <p>hjshfjdhjfhcsdjkcnjsdbcbdsmndmdbfh<span style="color:#02b28b"><i>More</i></span></p>
              </div>
             </div>
            <div class="col-md-3">
              <div class="innerThird1">

                
                
              </div>
            </div>  
          </div>
          <?php
          }$count++;
    }
      ?>  </div>
      

      </div>
      <div class="col-lg-1"></div>
     
</div>



</body>
</html>