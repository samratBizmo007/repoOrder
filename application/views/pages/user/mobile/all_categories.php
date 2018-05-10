<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
error_reporting(E_ERROR | E_PARSE);

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

    <!-- main content -->
    <div class="w3-row-padding w3-margin-bottom">

      <!-- All categories -->
      <div class="w3-col l12" id="categoryDiv">

        <?php
        foreach ($all_categories['status_message'] as $result) {
         ?>
         <!-- category div block -->
         <div class="w3-col s6" style="padding: 6px">
          <div class="w3-col s12 w3-border w3-round-large w3-card-2" style="height: 120px">
            <div class="w3-col l12 w3-center w3-padding-top " >
              <a class="btn w3-padding" href="<?php echo base_url(); ?>user/category/<?php echo base64_encode($result['cat_id']); ?>">
                <span>
                <i class="fa fa-<?php echo $result['fa_symbol']; ?> w3-xxlarge"></i>
              </span>
              <div class="w3-col l12">
                <span class="w3-small"><?php echo $result['category_name']; ?></span>
              </div>
              
              </a>              
            </div>            
          </div>
        </div>
        <?php } ?>
        <!-- category div block ends -->

      </div>
      <!-- All Categories end -->
    </div>
    <!-- main content ends -->

  </div>


</body>
</html>
