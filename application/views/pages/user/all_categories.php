<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
error_reporting(E_ERROR | E_PARSE);

?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Categories</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert/jquery-confirm.css">
  <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/alert/jquery-confirm.js"></script>
</head>
<body class="w3-light-grey">

  <!-- !PAGE CONTENT! -->
  <div class="w3-main w3-padding-small" style="margin-left:120px;">

    <!-- Header -->
    <header class="w3-container" >
      <h5><b><i class="fa fa-search"></i> All Categories</b></h5>
    </header>
    <div class="w3-row-padding w3-margin-bottom">
      <div class="w3-col l4 w3-padding">
        <select  name="cat_id" id="cat_id" class="w3-input w3-border">
        <option class="w3-light-grey" selected value="0">Select Business Field</option>
        <?php
        foreach ($all_categories['status_message'] as $result) {
         ?>
         <option value="<?php echo $result['cat_id']; ?>"><?php echo $result['category_name']; ?></option>
         <?php } ?>
       </select>
      </div>
    </div>
    <!-- End page content -->
  </div>


</body>
</html>
