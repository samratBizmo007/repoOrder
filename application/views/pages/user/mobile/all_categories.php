<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
//error_reporting(E_ERROR | E_PARSE);

?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Categories</title>
</head>
<body>

  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-top:40px;margin-bottom: 40px">

    <!-- Header -->
    <header class="w3-container" >
      <h6><b><i class="fa fa-search"></i> All Categories</b></h6>
    </header>
    <div class="w3-row-padding w3-margin-bottom">
      <div class="w3-col l12 w3-padding">
        <select  name="cat_id" id="cat_id" class="w3-input w3-border">
        <option class="w3-light-grey" selected value="0">Select Business Field</option>
        <?php
        foreach ($all_categories['status_message'] as $result) {
         ?>
         <option value="<?php echo $result['cat_id']; ?>"><?php echo $result['category_name']; ?></option>
         <?php } ?>
       </select>
      </div>
      
       <?php //print_r($all_categories); ?>
     </div>

   </div>


 </body>
 </html>
