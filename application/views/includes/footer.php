<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
error_reporting(E_ERROR | E_PARSE);

$user_name=$this->session->userdata('user_name');

$profile_type=$this->session->userdata('profile_type');
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
</head>
<body class="">
  <div class="footerFull" style="background-color: black;">
    <div class="container">
      <!-- <div class="row"> -->
        <div class="col-sm-12">
          <div class="col-sm-3 myfooter-logo">
            <div><img src="<?php echo base_url(); ?>images/desktop/logo-footer.png" alt="JobMandi"></div>
          </div>
        </div>
        <div class="col-sm-12">
          <footer id="myFooter" class="myfooter-contain">
            <div class="container">
              <div class="row ">
                <div class="col-sm-2">
                </div>
                <div class="col-sm-2 col-xs-4" style="padding:3px">
                  <h5>JOBMANDI</h5>
                  <ul>
                    <li><a href="<?php echo base_url(); ?>content/about_us">ABOUT US</a></li>
                    <!-- <li><a href="<?php echo base_url(); ?>content/TESTIMONIALS">TESTIMONIALS</a></li> -->
                    <li><a href="<?php echo base_url(); ?>content/Faq_control">FAQ's</a></li>
                    <li><a href="<?php echo base_url(); ?>content/Blog_control">BLOG</a></li>
<!--                     <li><a href="<?php echo base_url(); ?>content/Sitemap_control">SITEMAP</a></li>
 -->                    <li><a href="<?php echo base_url(); ?>content/Contact_us">CONTACT US</a></li>
                  </ul>
                </div>
                <div class="col-sm-2  col-xs-4" style="padding:3px">
                  <h5>GENERAL INFO</h5>
                  <ul>
                    <li><a href="<?php echo base_url(); ?>content/Pricing">PRICING</a></li>
                    <li><a href="<?php echo base_url(); ?>content/Privacy_policy">PRIVACY POLICY</a></li>
                    <li><a href="<?php echo base_url(); ?>content/Terms_condition">TERMS & CONDITIONS</a></li>
                  </ul>
                </div>
<!--                      <div class="col-sm-2">
                          <h5>DISCOVER</h5>
                          <ul>
                              <li><a href="#">EXPERT FREELANCERS</a></li>
                              <li><a href="#">FREELANCE PROJECTS</a></li>
                              <li><a href="#">FULL-TIME JOBS</a></li>
                              <li><a href="#">PART-TIME-JOBS</a></li>
                              <li><a href="#">ONLINE JOBS</a></li>
                          </ul>
                        </div>-->
                        <div class="col-sm-2  col-xs-4 " style="padding:3px">
                          <h5>EXPLORE</h5>
                          <ul>
                           <?php if($profile_type=='' || $profile_type=='1'){ ?>
                            <li><a href="<?php echo base_url(); ?>project/project_listing?jm_job_type=Fixed_Price">FIXED PROJECTS</a></li>
                            
                            <li><a href="<?php echo base_url(); ?>project/project_listing?jm_job_type=Hourly">HOURLY PROJECTS</a></li>
                              <?php } ?>
                              
                              <?php if($profile_type=='' || $profile_type=='3'){ ?>
            				 <li><a  href="<?php echo base_url(); ?>jobseeker/jobseeker_lists?search_param=Full_Time">FULL-TIME JOBS</a></li>
                             <li><a href="<?php echo base_url(); ?>jobseeker/jobseeker_lists?search_param=Part_Time">PART-TIME JOBS</a></li>
                             <?php } ?>
                            <!--  <li><a href="#">ONLINE JOBS</a></li> -->
                        
                          
                          </ul> 
                        </div>
                        <div class="col-sm-2  col-xs-12">
                          <h5>FOLLOW US ON</h5>
                          <div class="social-networks" >
                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="google"><i class="fa fa-google"></i></a>
                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>

                            <a href="#" class="google"><i class="fa fa-pinterest"></i></a>
<!--                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>-->
<!--                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>-->
                          </div>
                        </div>
                      </div>
                    </div>
                  </footer>
                </div>
                <div class=" col-sm-12 footer-copyright">
                  <p>©2017 jobmandi.in All rights are reserved </p>
                </div>
                <!--  </div> -->
              </div>
            </div>
          </body>
          </html>
