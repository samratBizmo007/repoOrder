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
            <div class="w3-col l12 w3-center w3-padding-top">
              <a class="btn w3-padding" href="category/<?php echo $result['cat_id']; ?>">
                <span>
                <i class="fa fa-cubes w3-jumbo"></i>
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

      <div class="w3-col l12 w3-padding w3-margin-bottom">
        <select  name="cat_id" id="cat_id" class="w3-input w3-border">
          <option class="w3-light-grey" selected value="0">Select Business Field</option>
          <?php
          foreach ($all_categories['status_message'] as $result) {
           ?>
           <option value="<?php echo $result['cat_id']; ?>"><?php echo $result['category_name']; ?></option>
           <?php } ?>
         </select>
       </div>


       <!-- show salers list as per category slection -->
       <div class="w3-container">
        <div class="w3-col l12" id="saler_list">
          <!-- Header -->
          <header class="w3-col l12" >
            <span><b><i class="fa fa-list"></i> Category Name</b></span>
          </header>

          <div class="w3-col l12 w3-padding">

            <!-- saler info div start -->
            <div class="w3-col l12 w3-card w3-round w3-margin-bottom">
              <div class="w3-col s4 w3-padding-small">
                <div class="w3-circle w3-border" style="height: 60px;width: 60px;background-position:center; background-size:contain; background-image: url('<?php echo base_url(); ?>images/default_male.png');"></div>

                <div class="w3-col l12 w3-center w3-margin-top">
                  <a class="w3-button w3-white w3-hover-text-orange w3-hover-white" href="tel:98745612" title="98745612" style="padding: 2px">
                    <span class="fa fa-phone w3-medium"></span>
                  </a>

                  <a class="w3-button w3-white w3-hover-text-orange w3-hover-white" href="mailto:98745612" title="98745612" style="padding: 2px">
                    <span class="fa fa-envelope-o w3-medium"></span>
                  </a>

                  <a class="w3-button w3-white w3-hover-text-orange w3-hover-white" href="tel:98745612" title="98745612" style="padding: 2px">
                    <span class="fa fa-binoculars w3-medium"></span>
                  </a>

                </div>
              </div>
              <div class="w3-col s8 w3-padding">
                <div>
                  <div class="w3-col s12">
                    <span><i class="fa fa-user"></i> Samrat Munde scdscdsv ecwcdscv </span>
                    <!-- <label>Samrat Munde dc wcc</label> -->
                  </div>

                  <div class="w3-col s12">
                    <span><i class="fa fa-briefcase"></i>   Samrat Munde scdscdsv ecwcdscv </span>
                    <!-- <span>Samrat Munde scdscdsv ecwcdscv </span> -->
                  </div>

                </div>
              </div>
            </div>
            <!-- saler info div ends -->

          </div>

        </div>
      </div>
      <!-- salers list ends -->
    </div>
    <!-- main content ends -->

  </div>


</body>
</html>
