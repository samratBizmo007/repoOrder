<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>JobMandi Home</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css">
        <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css"> -->
<!--        <link href="<?php echo base_url(); ?>css/bootstrap/bootstrap-toggle.min.css" rel="stylesheet">-->
<!--        <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert/jquery-confirm.css">-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/tipso.css">
        
<!--        <script type="text/javascript" src="<?php echo base_url(); ?>css/js/tippy.all.min.js"></script>-->
        <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.js"></script>
<!--        <script src="<?php echo base_url(); ?>css/bootstrap/bootstrap-toggle.min.js"></script>-->
<!--        <script type="text/javascript" src="<?php echo base_url(); ?>css/alert/jquery-confirm.js"></script>-->
        <script type="text/javascript" src="<?php echo base_url(); ?>css/js/const.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>css/js/swipe.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>css/js/tipso.js"></script>


    </head>

    <body class="">
        <div class="container main-content-wrap">
            <div class="col-md-12">
                <div class="col-md-4">

                    <div class="row">
                        <div class="col-md-6 profileA">
                            <div class="profileA1 w3-hover-opacity">
                                <a href="<?php echo base_url(); ?>auth/login?profile=3" class="btn w3-text-black ">
                                    <div class="profileA4"><img src="<?php echo base_url(); ?>/images/desktop/image16.png" class="profileA23"></div>
                                    <div class="profileA5 w3-text-white" style="margin-top: -2px;"><center><b>Full-Time<br>Job Seekers</b></center></div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 profileB " >
                            <div class="profileB1 w3-hover-opacity">
                                <a href="<?php echo base_url(); ?>job/post_jobs" class="btn w3-text-black ">
                                    <div class="profileB4 "><img src="<?php echo base_url(); ?>images/desktop/image16.png" class="profileA23"></div>
                                    <div class="profileB5 w3-text-white"><b>Full-Time<br>Job Providers</b></div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 profileC">
                        <div class="row">
                            <div class="profileC1 w3-hover-opacity">
                                <a href="<?php echo base_url(); ?>auth/login?profile=1" class="btn w3-text-black ">
                                    <div class="profileC4"><img src="<?php echo base_url(); ?>images/desktop/image26.png" class="profileC23"></div>
                                    <div class="profileC5 w3-text-white">Become<br>a Freelancer</div>
                                    <div class="profileC6 w3-text-white">Find Work that Match Your Skills</div>
                                    <div class="profileC7"><img src="<?php echo base_url(); ?>images/desktop/image13.png" classs="profileC25"></div>
                                    <div class="profileC8 w3-text-white">Let's Start</div>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4 profileD">
                    <div class="profileD1 w3-hover-opacity">
                        <a href="<?php echo base_url(); ?>project/post_project_Controller" class="btn w3-text-black ">
                            <div class="profileD4"><img src="<?php echo base_url(); ?>images/desktop/image18.png" class="profileD23"></div>
                            <div class="profileD5 w3-text-white">
                                Discover 
                                <br>Top Talents
                                <br>for Your 
                                <br>High-Profile<br>Project
                            </div>
                            <div class="profileD7"><img src="<?php echo base_url(); ?>images/desktop/image13.png" classs="profileD25"></div>
                            <div class="profileD8 w3-text-white">Post a Project</div>
                        </a>                            
                    </div>

                </div>
                <div class="col-md-4 profileE">
                    <div class="row">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
<!--                                    <div class="w3-col l12 w3-margin-bottom">
                                    <center>
                                        <div>
                                            <img class="w3-margin-bottom" src="<?php echo base_url(); ?>images/desktop/image15.png"><span class="profileE2">GET STARTED</span>
                                        </div>
                                        <div class="w3-padding">
                                                <input type="text" class="w3-round-xxlarge w3-padding uneditable-input w3-padding-left" name="" id="">&nbsp;
                                                <a class="btn-lg w3-round-xxlarge w3-black w3-text-white w3-padding">Let's Go</a>
                                            </div>                                        
                                    </center>
                                    </div>-->
                                    <div class="profileG w3-border" style="height: 570px; overflow: auto;">
                                        <div class=" ">
                                            <div class="w3-center w3-margin-bottom w3-margin-top">
                                                <span class="w3-center w3-margin-top w3-margin-bottom w3-margin-bottom" style=" color: #02b28b;"><b>Recent Jobs</b>&nbsp;<i class="fa fa-briefcase"></i></span></div>
                                                    <?php
                                                    //print_r($jobs);
                                                    if ($jobs['status'] == 200) {
                                                        foreach ($jobs['status_message'] as $key) {
                                                            ?>
                                                    <div class="w3-col l12 w3-border-bottom w3-padding-left w3-padding-right w3-padding-bottom" style=" margin-top: 1%;  background-color: #f8f8f8;">
                                                            <div class="w3-col l12">
                                                            <div class=" w3-col l4">
                                                                <h4 class="" style=" color: #02b28b; font-size: 12px;"><?php echo $key['jm_job_post_name'];?></h4>
                                                            </div>
                                                            <div class="w3-col l4 w3-padding-top w3-right">
                                                                <span class=" w3-right"><i class=" fa fa-user"></i> <?php echo $key['jm_positions'];?></span>
                                                            </div>
<!--                                                            <div class="w3-col l4 w3-padding-top w3-right">
                                                                <a class="w3-right btn" href="">Apply</a>
                                                            </div>    -->
                                                            </div>
                                                            <div class="w3-col l12">
                                                            <div class="w3-col l4">
                                                                <span class="" style="font-size: 10px;"><?php echo $key['jm_company_name'];?></span>
                                                            </div>                                                            
                                                            <div class="w3-col l4 w3-padding-top">
                                                                <span class="w3-tiny w3-right"><?php echo $key['jm_posted_date'];?></span>
                                                            </div>
                                                            <div class="w3-col l4 w3-right w3-padding-bottom">
                                                                <a class="w3-tiny w3-right w3-black w3-text-white btn w3-round-xxlarge" id="applyJob" name="applyJob" href="<?php echo base_url();?>auth/login?profile=3&payload=ApplyJob&value=<?php echo base64_encode($key['jm_jobpost_id']);?>">Apply</a>
                                                            </div>     
                                                            </div>
                                                    </div>  
                                                 <?php }
                                             } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--         -------------------------- for scrollable div--------------------------------------------------------
        <div class="container section2 w3-hide-large">
            <div class="col-md-12">
                <h2 class="text-center">What's Different</h2>
                <div class="heading_img"><img src="<?php echo base_url(); ?>images/desktop/image25.png"></div>
                <div class="section2_inner1">
                    <div id="myCarousel" class="hidden-md col-xs-12 " data-ride="" style="overflow-x: scroll; width: 250px; height: 250px;">
                         Indicators 
                         Wrapper for slides 
                        <div class="images col-md-12" >
                            <div class=" squareA1">
                                <div class="squareForSmall"><img src="<?php echo base_url(); ?>images/desktop/image28.png"></div>
                                    <div class="heading_here">Heading Here</div>
                            </div>
                            <div class=" squareA2">
                                <div class="squareForSmall"><img src="<?php echo base_url(); ?>images/desktop/image28.png"></div>
                                <div class="heading_here">Heading Here</div>
                            </div>
                            <div class=" squareA3">
                                <div class="squareForSmall"><img src="<?php echo base_url(); ?>images/desktop/image28.png"></div>
                                <div class="heading_here">Heading Here</div>
                            </div>
                            <div class=" squareA4">
                                <div class="squareForSmall"><img src="<?php echo base_url(); ?>images/desktop/image28.png"></div>
                                <div class="heading_here">Heading Here</div>
                            </div>
                        </div>            
                    </div>
                </div>
            </div>
        </div>-->

  <!-- W
        
        <!---------------------------for scrolable div------------------------------------------------------------------> 
        <div class="container section2 ">
            <div class="col-md-12"> 
                <div class="col-md-12">
                    <h2 class="text-center">What's Different</h2>
                    <div class="heading_img"><img src="<?php echo base_url(); ?>images/desktop/image25.png"></div>
                    <div class="row">
                        <div class="section2_inner1">
                            <div class="col-md-3 squareA1">
                                <div class="square"><img src="<?php echo base_url(); ?>images/desktop/image28.png"></div>
                                <div class="heading_here w3-padding-tiny" style=" margin-top: 45px;"><b>Curated Community</b><p class="w3-margin-top w3-padding w3-medium">Headhunt top-notch freelance talent from a curated community of highly skilled, erudite professional.</p>
</div>
                            </div>
                            <div class="col-md-3 squareA2">
                                <div class="square"><img src="<?php echo base_url(); ?>images/desktop/image28.png"></div>
                                <div class="heading_here w3-padding-tiny" style=" margin-top: 45px;"><b>Work On-the-Go </b><p class="w3-margin-top w3-padding w3-medium">Post requirements, discuss proposals, and collaborate with freelancers to get the work done on-the-go.</p>
</div>
                            </div>
                            <div class="col-md-3 squareA3">
                                <div class="square"><img src="<?php echo base_url(); ?>images/desktop/image28.png"></div>
                                <div class="heading_here w3-padding-tiny" style=" margin-top: 45px;"><b>Reduced Cost</b><p class="w3-margin-top w3-padding w3-medium">A platform like JobMandi helps reduce cost incurred in manually hiring full-time freelancers.</p>
</div>
                            </div>
                            <div class="col-md-3 squareA4">
                                <div class="square"><img src="<?php echo base_url(); ?>images/desktop/image28.png"></div>
                                <div class="heading_here w3-padding-tiny" style=" margin-top: 45px;"><b>Find Right Skills</b><p class="w3-margin-top w3-padding w3-medium">Find skilled local or remote experts for ongoing long-term, short-term or one-time projects. </p>
</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="container section2 ">
            <div class="col-md-12"> 
                <div class="col-md-12">
                    <div class="w3-center w3-padding" style=" font-size: 30px;">Why Find Projects on JobMandi?</div>
                    <div class="heading_img"><img src="<?php echo base_url(); ?>images/desktop/image25.png"></div>                    
                    <div class="row">
                        <div class="section2_inner1">
                            <div class="col-md-3 squarenewA1">
                                <div class="heading_new w3-padding-tiny"><b>Real-time Connect</b><p class="w3-margin-top w3-medium">Fill details like skills, experience, interests, and get notified via email if a business is interested in your services.</p>
                                </div>
                            </div>
                            <div class="col-md-3 squarenewA2">
                                <div class="heading_new w3-padding-tiny"><b>Get Noticed & Hired </b><p class="w3-margin-top w3-medium">Create an online portfolio to connect with thousands of enthusiastic businesses interested in hiring people like you.</p>
                                </div>
                            </div>
                            <div class="col-md-3 squarenewA3">
                                <div class="heading_new w3-padding-tiny"><b>Keep Your Quote</b><p class="w3-margin-top w3-medium">Unlike other sites, JobMandi allows you to keep 100% earnings. You get full payment for your hard work and skills you showcase.</p>
                                </div>
                            </div>
                            <div class="col-md-3 squarenewA4">
                                <div class="heading_new w3-padding-tiny"><b>Work Your Way</b><p class="w3-margin-top w3-medium">Whether you’re a writer, coder, or designer to collaborate with clients the way you want in your free time.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="services_offer">
            <div class="container">
                <!-- <section id="services" > -->
                <!-- <div class="container"> -->
                <div class="section-header">
                    <h2 class="section-title text-center wow fadeInDown" style="color:white;margin-top:60px; margin-bottom:40px;">Services We Offer</h2>
                    <center> <div class=""><img src="<?php echo base_url(); ?>images/desktop/image27.png" style="margin-top: -90px;"></center>
                        </div>
                        <div class="row">
                            <div class="features">
                                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">
                                    <div class="media service-box">
                                        <div class="pull-left">
                                            <a href="#" class="skilled_developers"><i class="fa fa-desktop"></i></a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">BigWig Developers</h4>
                                            <p style="font-size: 14px;">Find bigwig developers possessing amazing programming skills, ready to work on your development project.
                                            </p>
                                        </div>
                                    </div>
                                </div><!--/.col-md-4-->

                                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">
                                    <div class="media service-box">
                                        <div class="pull-left">
                                            <a href="#" class="designers_creatives"><i class="fa fa-desktop"></i></a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">Wunderkind Designers</h4>
                                            <p style="font-size: 14px;">Hire whiz craft graphic designers and creative professional that are always updated with recent designing trends.
                                            </p>
                                        </div>
                                    </div>
                                </div><!--/.col-md-4-->

                                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">
                                    <div class="media service-box">
                                        <div class="pull-left">
                                            <a href="#" class="bloggers_writers"><i class="fa fa-desktop"></i></a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">Ingenious Writers:</h4>
                                            <p style="font-size: 14px;">Browse our database to find writers that indulging in ecstasy of literary art of creation through words and mind-blowing narration.
                                            </p>
                                        </div>
                                    </div>
                                </div><!--/.col-md-4-->

                                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="300ms">
                                    <div class="media service-box">
                                        <div class="pull-left">
                                            <a href="#" class="seo_expert"><i class="fa fa-line-chart"></i></a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">Digital Marketing Peeps</h4>
                                            <p style="font-size: 14px;">Leverage knowledge & skills of enthusiastic online marketers, experts, & professionals to enhance visibility & online business.
                                            </p>
                                        </div>
                                    </div>
                                </div><!--/.col-md-4-->

                                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="400ms">
                                    <div class="media service-box">
                                        <div class="pull-left">
                                            <a href="#" class="sales_marketing"><i class="fa fa-desktop"></i></a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">Quick-witted Marketers</h4>
                                            <p style="font-size: 14px;">Hire marketers and sales representative that are quick-witted and skilled to fulfil the demands of your growing business. 
                                            </p>
                                        </div>
                                    </div>
                                </div><!--/.col-md-4-->

                                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="500ms">
                                    <div class="media service-box">
                                        <div class="pull-left">
                                            <a href="#" class="Mobile_apps"><i class="fa fa-desktop"></i></a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">Resourceful Mobile Apps</h4>
                                            <p style="font-size: 14px;">Now the businesses are focusing on becoming mobile-centric. Collaborate with android & IOS app developers now.
                                            </p>
                                        </div>
                                    </div>
                                </div><!--/.col-md-4-->
                            </div>
                        </div><!--/.row-->    
                        <!--  </div> --><!--/.container-->
                        <!-- </section> --><!--/#services-->
                </div>
            </div>
            
           <!--  <div class ="w3-col l12 w3-center">
                <div class="col-lg-2"></div>
            <div class=" w3-col l8   w3-margin w3-padding"  >
                         <span style="color:#24b8a0 ;font-size:30px"><b><i>#SayNoToLess</i></b> </span>
                        <p style="text-align: justify;"><span style="font-size:14px;">Settling for something less than desired is a constant conversation topic within an organization, business groups, and individuals.</span></p>
                        <p style="text-align: justify;"><span style="font-size:14px;"><strong>&ldquo;Say No to Less&rdquo;</strong>, is a campaign launched with a vision that aims to inspire individuals and organisations to strive for excellence.The message is very clear, if you are a </span></p>
                        <p style="text-align: justify;"><span style="font-size: 14px;">&bull; Job seeker or Freelancers- Say No to Low Payments</span></p>
                        <p style="text-align: justify;"><span style="font-size: 14px;">&bull; Organization- Say No to Ordinary, Moderate, or Barely</span></p>
                    </div>
                </div> -->
                                
              <div class="section3">
                <div class="container">
                  <!-- <div class="row"> -->
                    <div class="col-md-12" style="margin-bottom:65px;">
                      <div  class="row">
                         <center class="section3_inner1">
                            <h2>How It Works</h2>
                            <center> <div class=""><img src="<?php echo base_url(); ?>images/desktop/image25.png" style="margin-top: -32px;"></div></center>
                        </center>
                    </div>
                    <div class="col-md-12">
                        <div class="section3_inner2">
                          <div class="col-md-3 ">
                            <center>
                              <div class="circle_green"><img class="postproject" title="Post project" src="<?php echo base_url(); ?>images/desktop/image21.png" style="margin-top: 28px;"></div>
                              <div class="bottom_letter">Post Project</div>
                              <center>
                              </div>
                              <div class="col-md-3">
                                <center>
                                  <div class="circle_white"><img class="Find_Hire" title=" Find And Hire...!" src="<?php echo base_url(); ?>images/desktop/image22.png" style="margin-top: 28px;"></div>
                                  <div class="bottom_letter">Find & Hire</div>
                              </center>
                          </div>
                          <div class="col-md-3">
                            <center>
                              <div class="circle_white"><img class="award_Pay" title="Award And Pay....! " src="<?php echo base_url(); ?>images/desktop/image23.png" style="margin-top: 28px;"></div>
                              <div class="bottom_letter">Award & Pay</div>
                              <center>
                              </div>
                              <div class="col-md-3">
                                <center>
                                  <div class="circle_white"><img class="workApprove" title="Work And Approve..!" src="<?php echo base_url(); ?>images/desktop/image24.png" style="margin-top: 28px;"></div>
                                  <div class="bottom_letter">Work & Approve</div>
                              </center>
                          </div>
                      </div>
                  </div>
                  <!--  </div> -->
              </div>
          </div>
      </div>
                                
      <section id="animated-number">
        <div class="container">
           <div class="col-md-12">
             <div class="row">
              <center>
                <div class="col-md-4 animated_div">
                  <div class="number11"><h1 class="number1"><?php echo $projects;?>+</div>
                      <div class="number12"><img src="<?php echo base_url(); ?>images/desktop/image29.png" class="img11 w3-padding-bottom"><b> No Of Projects</b></div>
                  </div>
                  <div class="col-md-4 animated_div">
                      <div style="margin-left: 25px" class="number22"><h1 class="number2"><?php echo $jobcount; ?>+</div>
                          <div class="number13"><img src="<?php echo base_url(); ?>images/desktop/image30.png" class="img11"><b> No Of Jobs</b></div>
                      </div>
                      <div class="col-md-4 animated_div">
                          <div style="margin-left: 25px" class="number33"><h1 class="number3">1,000+</div>
                              <div class="number14"><img src="<?php echo base_url(); ?>images/desktop/image31.png" class="img11"><b> Categories</b></div>
                          </div>
                      </center>
                  </div>
              </div>
          </div>   
      </section><!--/#animated-number-->
      
      <section id="section4">
          <div class="container">
              <div class="col-md-12">
                  <div class="row">
                      <center class="section4_inner1">
                          <h2>What our Customers Are Saying</h2>
                          <center> <div class=""><img src="<?php echo base_url(); ?>images/desktop/image25.png" style="margin-top:-25px;"></div></center>
                      </center>
                      <div class='row'>
                          <div class='col-md-12'>
                              <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                                  <!-- Bottom Carousel Indicators -->
                                  <ol class="carousel-indicators">
                                      <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
                                      <li data-target="#quote-carousel" data-slide-to="1"></li>
                                      <li data-target="#quote-carousel" data-slide-to="2"></li>
                                  </ol>

                                  <!-- Carousel Slides / Quotes -->
                                  <div class="carousel-inner">

                                      <!-- Quote 1 -->
                                      <div class="item active">
                                          <blockquote>
                                              <div class="row">
                                                  <div class="col-sm-4 text-center">
                                                      <img class="img-circle" src="<?php echo base_url(); ?>images/desktop/image10.png" style="width: 150px;height:150px;">
                                                      <!--<img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/128.jpg" style="width: 100px;height:100px;">-->
                                                  </div>
                                                  <div class="col-sm-6">
                                                      <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit!</p>
                                                      <small style="color:#02b28b">Erik Allbest</small>
                                                      <small style="color:#02b28b">CEO & Founder,Chess.com</small>
                                                  </div>
                                              </div>
                                          </blockquote>
                                      </div>
                                      <!-- Quote 2 -->
                                       <div class="item">
                                        <blockquote>
                                          <div class="row">
                                            <div class="col-sm-3 text-center">
                                              <img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/mijustin/128.jpg" style="width: 100px;height:100px;">
                                            </div>
                                            <div class="col-sm-9">
                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam auctor nec lacus ut tempor. Mauris.</p>
                                              <small>Someone famous</small>
                                            </div>
                                          </div>
                                        </blockquote>
                                    </div> 
<!--                                       Quote 3 -->
                                       <div class="item">
                                        <blockquote>
                                          <div class="row">
                                            <div class="col-sm-3 text-center">
                                              <img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/keizgoesboom/128.jpg" style="width: 100px;height:100px;">
                                            </div>
                                            <div class="col-sm-9">
                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum elit in arcu blandit, eget pretium nisl accumsan. Sed ultricies commodo tortor, eu pretium mauris.</p>
                                              <small>Someone famous</small>
                                            </div>
                                          </div>
                                        </blockquote>
                                    </div> 
                                  </div>

                                  <!-- Carousel Buttons Next/Prev -->
                                  <a class="left carousel-control" href="#quote-carousel" role="button" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                                  <a class="right carousel-control" href="#quote-carousel" role="button" data-slide="next"><i class="fa fa-chevron-right"></i></a>

<!--                                  <a data-slide="prev" href="#quote-carousel" class="glyphicon glyphicon-chevron-left"><i class="fa fa-chevron-left"></i></a>
                                  <a data-slide="next" href="#quote-carousel" class="glyphicon glyphicon-chevron-right"><i class="fa fa-chevron-right"></i></a>
                             --></div>                          
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="container w3-margin-top">
          <div class="w3-col l12 w3-center w3-margin-top">
              
                  <a href="<?php echo base_url(); ?>job/post_jobs" class="btn-lg w3-round-xxlarge w3-black w3-text-white w3-padding w3-margin-right">Post As A Job Provider</a>
        
                  <a href="<?php echo base_url(); ?>project/project_listing" class="btn-lg w3-round-xxlarge w3-black w3-text-white w3-padding w3-margin-left">Work As A Freelancer</a>
          </div>
          </div>
      </section>

</body>

</html>
<script>
$('.postproject').tipso({
        	position: 'top',
                width: 200,
                titleContent: 'Let us know your project or job requirements. We’ll instantly connect you with competent & skilled professionals..!',
                background        : '#c6c6c6',
                titleBackground   : '#F8F8F8',
                color             : '#000000',
                titleColor        : '#00B59D'
    });
    $('.Find_Hire').tipso({
        	position: 'top',
                width: 200,
                titleContent: 'Search our curated community, receive proposals & browse previous works of exceptional talents and work reviews..!',
                background        : '#c6c6c6',
                titleBackground   : '#F8F8F8',
                color             : '#000000',
                titleColor        : '#00B59D'
    });
    $('.award_Pay').tipso({
        	position: 'top',
                width: 200,
                titleContent: 'Arrange an interview to find the right match for your project needs. Create a team of awesome peeps to up-scale your project.',
                background        : '#c6c6c6',
                titleBackground   : '#F8F8F8',
                color             : '#000000',
                titleColor        : '#00B59D'
    });
    $('.workApprove').tipso({
        	position: 'top',
                width: 200,
                titleContent: 'Once, the job is assigned check if they have delivered the work as per your expectation. Pay after you approve it...!',
                background        : '#c6c6c6',
                titleBackground   : '#F8F8F8',
                color             : '#000000',
                titleColor        : '#00B59D'
    });
</script>
<script>
    $(document).ready( function(){
$(".carousel").swipe({

  swipe: function(event, direction, distance, duration, fingerCount, fingerData) {

    if (direction == 'left') $(this).carousel('next');
    if (direction == 'right') $(this).carousel('prev');

  },
  allowPageScroll:"vertical"

});
    });
</script>
