<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
//error_reporting(E_ERROR | E_PARSE);

?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feeds</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/posts/dist/css/swiper.min.css">

  <!-- <link rel="stylesheet" href="assets/css/alert/jquery-confirm.css"> -->
  <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
  <!-- <script type="text/javascript" src="assets/css/alert/jquery-confirm.js"></script> -->
</head>
<body class="w3-light-grey">

  <!-- !PAGE CONTENT! -->
  <div class="w3-main w3-padding-small" style="margin-left:120px;">

    <!-- Header -->
    <header class="w3-container" >
      <h5><b><i class="fa fa-rss-square"></i> Latest Feeds</b></h5>
    </header>
    <!-- Product timeline div starts -->
    <div class="w3-row-padding w3-margin-bottom">
      <div class="w3-container">
        <div class="col-lg-2"></div>
        <div class="w3-col l8 ">

          <div class="w3-col l12 w3-padding-xxlarge">
            <?php
            if($timelineData['status']!=500){
              foreach ($timelineData['status_message'] as $key) { ?>
              <div class="w3-col l12 w3-card-2 w3-margin-bottom">

                <!-- Top section div start -->
                <div class="w3-col l12 w3-border-bottom">
                  <div class="w3-col l1 w3-padding">
                    <div class="w3-circle w3-border user_img" style="background-image: url('<?php echo base_url(); ?><?php echo $key['user_image']; ?>');"></div>
                  </div>
                  <div class="w3-col l11 w3-padding-left w3-padding-top">
                    <label class="w3-margin-top w3-small"><?php echo $key['username']; ?></label>
                  </div>
                </div>
                <!-- Top section div ends -->

                <!-- Mid section div start -->
                <?php 
                $imageArr=json_decode($key['prod_image'],TRUE);
                if(count($imageArr)>1){
                  ?>
                  <!-- Image slider Swiper repo -->
                  <div class="swiper-container" style="height: 500px;width: 100%">
                    <div class="swiper-wrapper">
                      <?php 
                      foreach ($imageArr as $image) {
                        ?>
                        <div class="w3-col l12 swiper-slide w3-border-bottom w3-black timeline_img" style="background-image: url('<?php echo base_url(); ?><?php echo $image['prod_image']; ?>');">
                          <!-- <img src="<?php echo base_url(); ?>images/users/4.jpg" style="width: 100%;height: auto;" class="img img-responsive" > -->
                        </div>
                        <?php 
                      }
                      ?>
                    </div>
                    <!-- Add Pagination for multiple images-->
                    <div class="swiper-pagination w3-opacity"></div>
                  </div>
                <?php } //-------end of if count of images
                else{ ?>

                <!-- Single image div -->
                <?php 
                foreach ($imageArr as $image) {
                  ?>
                  <div class="w3-col l12 w3-border-bottom w3-black timeline_img" style="background-image: url('<?php echo base_url(); ?><?php echo $image['prod_image']; ?>');">
                  </div>
                  <?php 
                }
                ?>

                <?php 
                } //----------------end of else count of images
                ?>

                <!-- Mid section div ends -->

                <!-- Bottom section div starts -->
                <div class="w3-col l12">
                  <div class="w3-col l12 w3-padding-small w3-right">
                    <a class="w3-button w3-white w3-hover-text-orange w3-hover-white" href="tel:<?php echo $key['phone']; ?>" title="<?php echo $key['phone']; ?>" style="padding-right: 0px;padding-left: 8px">
                      <span class="fa fa-phone w3-xlarge"></span>
                    </a>

                    <a class="w3-button w3-white w3-hover-text-orange w3-hover-white" href="mailto:<?php echo $key['email']; ?>" title="<?php echo $key['email']; ?>" style="padding-right: 0px;padding-left: 15px">
                      <span class="fa fa-envelope-o w3-xlarge"></span>
                    </a> 
                    <a class="btn w3-right" style="padding: 0">
                      <span class="w3-margin-top w3-small"><i><?php echo $key['category_name']; ?></i></span>
                    </a>
                  </div>

                  <div class="w3-col l12 w3-padding ">
                    <label><?php echo $key['product_name']; ?></label>
                    <span class="w3-small w3-margin-left"><?php echo $key['prod_description']; ?></span>
                    <hr>
                  </div>

                </div>
                <!-- Bottom section div ends -->

              </div>
              <?php
            }
          }
          else{
            ?>
            <div class="alert alert-warning w3-center">
              <b><?php echo $all_users['status_message']; ?></b>
            </div>               
            <?php 
          } 
          ?>          
        </div>
        <center>
          <div class="pagination" style="margin:10px;padding: 10px;">
            <?php echo $links; ?>
          </div>
        </center>
      </div>
      <div class="col-lg-2"></div>
    </div>
  </div>
  <!-- Product timeline ends here -->
</div>
<!-- End page content -->

<!-- Swiper JS -->
<script src="<?php echo base_url(); ?>css/posts/dist/js/swiper.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper('.swiper-container', {
    pagination: {
      el: '.swiper-pagination',
    },
  });
</script>
</body>
</html>
