<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
error_reporting(E_ERROR | E_PARSE);

?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Settings</title>
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
      <h5><b><i class="fa fa-cog"></i> Settings</b></h5>
    </header>
    <div class="w3-row-padding w3-margin-bottom">
      <div class="w3-col l12">
        <div class="col-lg-6 w3-padding-small">
          <div class="w3-col l12 w3-small">
            <label><i class="fa fa-envelope"></i> SetUp Email-ID</label><br>

            <form id="updateEmail">
            <div class="w3-col l8 w3-padding-right w3-margin-bottom">
              <input type="email" name="admin_email" value="<?php echo $adminDetails['status_message'][0]['admin_email']; ?>" placeholder="Enter Email-ID here..." id="admin_email" class="w3-input" required>
            </div>
            <div class="w3-col l4">
              <button type="submit" class="w3-button w3-red">Update Email</button>
            </div>
          </form>
            
          </div>
        </div>
      </div>
    </div>
    <!-- End page content -->
  </div>

<!--  script to update email id   -->
<script>
  $(function(){
   $("#updateEmail").submit(function(){
     dataString = $("#updateEmail").serialize();

     $.ajax({
       type: "POST",
       url: "<?php echo base_url(); ?>admin/admin_settings/updateEmail",
       data: dataString,
           return: false,  //stop the actual form post !important!

           success: function(data)
           {
             $.alert(data);                       
           }

         });

         return false;  //stop the actual form post !important!

       });
 });
</script>
<!-- script ends here -->
</body>
</html>
