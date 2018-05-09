<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
//error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feeds</title>
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/posts/dist/css/swiper.min.css">
</head>
<body>

  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-top:40px;margin-bottom:40px">

    <!-- Header -->
    <header class="w3-col l12 w3-padding-small" >
      <h5><b><i class="fa fa-rss-square"></i> Feeds</b></h5>
    </header>

    <!-- Product timeline div starts -->
    <div class="w3-row w3-margin-bottom">
      <div class="">
        <div class="w3-col l8 ">
          <div class="w3-col l12">
            <?php
            if($timelineData['status']!=500){
              $count=1;
              foreach ($timelineData['status_message'] as $key) { ?>
              <div class="w3-col l12 w3-margin-bottom">

                <!-- Top section div start -->
                <div class="w3-col s12 w3-border-bottom w3-padding-bottom">                  
                  <div class="w3-col s1 w3-padding-small">
                    <div class="w3-circle w3-border user_imgMob" style="background-image: url('<?php echo base_url(); ?><?php echo $key['user_image']; ?>');"></div>
                  </div>
                  <div class="w3-col s11 w3-padding">
                    <a class="btn" style="padding: 0"><label class="w3-small"><?php echo $key['username']; ?></label></a>
                  </div>
                </div>
                <!-- Top section div ends -->

                <!-- Mid section div start -->
                <?php 
                $imageArr=json_decode($key['prod_image'],TRUE);
                if(count($imageArr)>1){
                  ?>
                  <!-- Image slider Swiper repo -->
                  <div class="swiper-container" style="height: 250px;width: 100%">
                    <div class="swiper-wrapper">
                      <?php 
                      foreach ($imageArr as $image) {
                        ?>
                        <div class="w3-col l12 swiper-slide w3-border-bottom w3-black timeline_imgMob" style="background-image: url('<?php echo base_url(); ?><?php echo $image['prod_image']; ?>');">
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
                  <div class="w3-col l12 w3-border-bottom w3-black timeline_imgMob" style="background-image: url('<?php echo base_url(); ?><?php echo $image['prod_image']; ?>');">
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
              $count++;
            }
          }
          else{
            ?>
            <div class="alert alert-warning w3-center">
              <b><?php echo $timelineData['status_message']; ?></b>
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
