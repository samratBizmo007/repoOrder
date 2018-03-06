<?php 
$user_id=$this->session->userdata('user_id');
$user_name=$this->session->userdata('user_name');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>About Jobmandi</title>
  <!-- Material Design Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">    

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url(); ?>css/home_page/css/bootstrap.min.css" rel="stylesheet">

  <!-- Material Design Bootstrap -->
  <link href="<?php echo base_url(); ?>css/home_page/css/mdb.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>css/w3.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>css/home_page/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>css/home_page/css/testimonials.css" rel="stylesheet"> 

  <link href="<?php echo base_url(); ?>css/about_us/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>css/about_us/style.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>css/about_us/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <style>
  .waves-effect {
    position: relative;
    cursor: pointer;
    display: inline-block;
    overflow: hidden;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -webkit-tap-highlight-color: transparent;
    vertical-align: middle;
    z-index: 1;
    will-change: opacity, transform;
    -webkit-transition: all 0.3s ease-out;
    -moz-transition: all 0.3s ease-out;
    -o-transition: all 0.3s ease-out;
    -ms-transition: all 0.3s ease-out;
    transition: all 0.3s ease-out;
  }

  .waves-effect.waves-light .waves-ripple {
    background-color: rgba(255, 255, 255, 0.45);
  }
  .btn-warning{color:#fff !important; font-size:14px !important; font-weight:600; text-transform:none;
    /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#ff7725+0,ff7725+50,ec4b17+50,ec4b17+100 */
    background: #ff7725; /* Old browsers */
    background: -moz-linear-gradient(top, #ff7725 0%, #ff7725 50%, #ec4b17 50%, #ec4b17 100%); /* FF3.6-15 */
    background: -webkit-linear-gradient(top, #ff7725 0%,#ff7725 50%,#ec4b17 50%,#ec4b17 100%); /* Chrome10-25,Safari5.1-6 */
    background: linear-gradient(to bottom, #ff7725 0%,#ff7725 50%,#ec4b17 50%,#ec4b17 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff7725', endColorstr='#ec4b17',GradientType=0 ); /* IE6-9 */
  }
  .btn-warning a:focus{ background:none;}
  .btn-rounded{ border-radius:12px; }
  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 3;
  }

  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }

  .dropdown-content a:hover {background-color: #f1f1f1}

  .dropdown:hover .dropdown-content {
    display: block;
  }

  .dropdown:hover .dropbtn {
    /*background-color: #3e8e41;*/
  }
</style>
</head>

<body>

  <!-- Header -->
  <section id="header">
    <div class="container">
      <div class="row">

        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>css/home_page/img/logo.png" alt="" title="" /></a></div>

        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
         <nav class="navbar">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <?php $profile_type=$this->session->userdata('profile_type'); ?>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <ul class="nav navbar-nav navbar-right">

              <li class="scroll">
                <a href="<?php echo base_url(); ?>content/about_us">About JobMandi </a></li>

                <li class="scroll">
                  <?php if($profile_type == '' || $profile_type == 3 ){ ?>
                  <a class="waves-effect waves-light" href="<?php echo base_url(); ?>jobseeker/jobseeker_lists">Explore Jobs</a>
                  <?php } ?></li>

                  <li class="scroll">
                    <?php if($profile_type == '' || $profile_type == 1 ){ ?>
                    <a class="waves-effect waves-light" href="<?php echo base_url(); ?>project/project_listing">Explore Projects</a>
                    <?php } ?></li>

                    <li class="scroll">
                      <?php if( $profile_type == 2 ){ ?>
                      <a class="waves-effect waves-light" href="<?php echo base_url(); ?>freelancer/freelancer_list">Explore Freelancers</a>
                      <?php } ?> </li>                   

                      <li class="scroll">
                        <?php if($profile_type == 4 ){ ?>
                        <a class="waves-effect waves-light" href="<?php echo base_url(); ?>">Explore JobSeeker</a>
                        <?php } ?></li>


                        <li> <?php if($profile_type == '' || $profile_type == 2 ){ ?>
                          <a class="waves-effect waves-light" href="<?php echo base_url(); ?>project/post_project_Controller">Post Project</a>
                          <?php } ?> 
                        </li>  

                         <li> <?php if($profile_type == '' || $profile_type == 4 ){ ?>
                          <a class="waves-effect waves-light" href="<?php echo base_url(); ?>job/post_jobs">Post Job</a>
                          <?php } ?> 
                        </li>  
                        <li>
                          <?php 
                          if(isset($user_name) && isset($user_name)!=''){
                            echo '<a href="'.base_url().'auth/login/logout" class="btn w3-black btn-warning btn-rounded " style="margin-top:2px;margin-bottom:2px;padding-top:7px;padding-bottom:7px">Logout <i class="fa fa-sign-out"></i></a>';
                          }
                          else{?>
                          <div class="">
                            <a href="<?php echo base_url().'auth/login'; ?>" style="margin:0px; padding:7px 11px;" class="btn btn-warning btn-rounded waves-effect waves-light">Log in&nbsp;/&nbsp;Sign up</a>
                          </div>

                          <?php
                  //echo '<a class="btn btn-warning btn-rounded waves-effect waves-light" href="'.base_url().'auth/login" style="background-color:#00B59D; padding:8px">Login | Sign Up</a>';
                        }
                        ?> 
                      </li>
                    </ul>
                  </div>
                </nav>        
              </div>
            </div>
          </div>
        </section>
        <!-- /Header-->

        <!-- banner   -->

        <section class="fullscreen-bg" >
          <div class="fullscreen-bg">
            <video loop muted autoplay poster="<?php echo base_url(); ?>css/about_us/img/videoframe.jpg" class="fullscreen-bg__video">
              <source src="<?php echo base_url(); ?>css/about_us/img/lab.mp4" type="video/mp4">
              </video>

            </section>

            <section>
              <div class="container-fluid">
                <div class="row equal">
                  <div class="col-md-8 col-xs-12 content">
                    <div class="row">
                      <div class="col-sm-offset-1 col-sm-11">
                        <div class="about_text">
                         <p>JobMandi is a work market that empowers businesses and freelancers to deliver experiences that unlock productivity, growth, and success. As our emphasis is purely on quality and efficiency, we aim to connect bigwig developers, wunderkind designers, or creative whiz-kids with promising start-ups, fast-growing business, and enthusiastic entrepreneurs. </p>
                         <p>Today, freelancers are mostly at the receiving end. They strive day-in, day-out for countless hours to build a successful freelancing business. However, they don’t get paid what their skills deserve. In recent years, the potential of getting paid less has become a huge dilemma.  </p>
                         <p>No doubt, it is difficult to put value on your skills. 
                         On the flipside, organization are experiencing a big performance drop.  They go through real tough times in finding trustworthy, reliable, and skilled full-time folks and freelancers capable of delivering up to the mark project requirements. Most times they curtail their expectations because they don’t find the right talent. </p>
                         <p>Therefore, JobMandi provides an easy, fair, and modest way to match business requirements with freelancer skills - to get jobs done well in-time and in-budget. Our prime motive is to help clients post eloquent projects and to help freelancers reply with expressive proposals. </p>
                         <p>We at JobMandi, strongly want to eradicate the dilemma’s faced by both, organisations and freelancers. We allow freelancers to earn what they truly deserve and help organisations to optimize their organization performance with talents capable of delivering what is expected.</p>


                       </div>
                     </div>
                   </div>

                   <!-- freelancer row   -->

                   <div class="row freelancer">
                    <div class="col-sm-offset-1 col-sm-6">
                      <h1 class="section_tittle">How Job Mandi <br> Works for <br> Freelancers?</h1>
                      <h4> Work with Genuine Employers that value you</h4>
                      We connect top freelancers with top employers from diverse business segments. But, before that, once you’ve sign-up, we thoroughly scan your profile to find projects that match your skills. Here’s how we help talented freelancers build a successful freelancing business.


                    </div>
                    <div class="col-sm-5">
                      <div class="freelancer-img">
                        <img src="<?php echo base_url(); ?>css/about_us/img/hired.png" class="img-responsive">
                      </div>  
                    </div>

                  </div>

                  <!-- seekers feature -->
                  <div class="row seeker_features hidden-xs">

                    <div class="col-lg-offset-1 col-lg-11 ">
                      <div class="feature_list">
                        <div class="feature" style="padding-top: 206px;">
                          <h3>No Commissions</h3>
                          <p>Work with Genuine Employers that value you
                            We connect top freelancers with top employers from diverse business segments. But, before that, once you’ve sign-up, we thoroughly scan your profile to find projects that match your skills. Here’s how we help talented freelancers build a successful freelancing business.
                          </p>
                        </div>
                        <div class="feature down_feature" style="padding-top: 206px;">
                          <h3>Build Quality  <br> Network</h3>
                          <p>JobMandi is a trusted marketplace for pre-screened freelancers. If you have the right skills, skilled, we have a genuine customer base eager to hire professionals like you. Easily connect with leading clients and partners across the world. Prove your worth, build a quality network of partners and clients to receive projects round the year.</p>

                        </div>
                        <div class="feature experience" style="padding-top: 206px;">
                          <h3>Promote  <br> Your Work</h3>
                          <p>Brand yourself on JobMandi. We understand that today an online portfolio is must to showcase your previous work, talents, and skill-sets. Job Mandi allows you to create an online portfolio that is completely tailored to suit your unique needs. Build a stellar portfolio, highlight your work and skill-sets to gain recognition.
                          </p>
                        </div>
                        <div class="feature down_feature" style="padding-top: 206px;">
                          <h3>Get Picked for <br> Great Jobs</h3>
                          <p>JobMandi screens every project posted by job providers. We review each client's profile and guide them on how to submit well-described jobs. To get the job done virtually it is very important to crisply specify the requirements and what’s expected from the freelancers. </p>
                          
                        </div>
                      </div>
                    </div>

                  </div>

                  <div class="row  visible-xs">
                    <div id="seeker_carousel" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner" role="listbox">
                        <div class="item ">
                          <div class="mobile_feature">
                            <h3>No Commissions</h3>
                            <p>Keep what you quote your clients. Zero commission fees means freelancers keep 100% of what they earn.</p>
                          </div>
                        </div>
                        <div class="item active">
                          <div class="mobile_feature down_feature mobile_experience">
                            <h3>Free <br> Portfolio</h3>
                            <p>Create your profile and full portfolio, free of charge. Receive messages and bid requests from clients, free of charge. When you find a job you want, purchase a membership to submit your bid. Once you're a member, you can make an unlimited number of quality bids.</p>
                          </div>
                        </div>
                        <div class="item">
                         <div class="mobile_feature">
                          <h3>Great <br> Jobs</h3>
                          <p>JobMandi screens every job posted by clients. We review each client's profile and guide them on how to submit well-described jobs. <br>
                          We only allow jobs with clear specifications and expectations that we feel can be successfully completed by freelancers. We only allow jobs with fair budgets, appropriate for the work required by the job.</p>
                        </div>
                      </div>
                      <div class="item">
                        <div class="mobile_feature down_feature mobile_efficient">
                          <h3>Unlimited</h3>
                          <p>No limits to site usage means freelancers aren't nickle and dimed while making their earnings. Freelancers can search for, be notified of, and bid on as many jobs as they wish.</p>
                        </div>
                      </div>  
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#seeker_carousel" role="button" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#seeker_carousel" role="button" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>          
                </div>

                <!-- employer section -->

                <div class="row freelancer">
                  <div class="col-sm-offset-1 col-sm-6">
                    <h1 class="section_tittle">How Job Mandi <br> Works for <br> Employers?</h1>
                    <p>JobMandi helps enthusiastic employers find seasoned and successful freelancers for their high-profile projects.
                    </p>
                  </div>
                  <div class="col-sm-5">
                    <div class="freelancer-img">
                      <img src="<?php echo base_url(); ?>css/about_us/img/employer.png" class="img-responsive">
                    </div>  
                  </div>
                </div>

                <!-- employer features -->
                <div class="row seeker_features hidden-xs">

                  <div class="col-lg-offset-1 col-lg-11 ">
                    <div class="feature_list">
                      <div class="feature" style="padding-top: 206px;">
                        <h3>Quality</h3>
                        <p>We screen all freelancers and coach them on providing clear profiles, portfolios and job proposals.</p>
                      </div>
                      <div class="feature down_feature experience" style="padding-top: 206px;">
                        <h3>Experienced, <br> Qualified <br> Freelancers</h3>
                        <p>Freelancers using JobMandi are seasoned and confident in their success.They pay us a monthly fee in advance, taking a risk up front.</p>
                        <p>This is a cost of sales successful freelancers understand and manage. It works for them because they know their worth, how to make clients happy, and what it takes to run a business.</p>
                      </div>
                      <div class="feature" style="padding-top: 206px;">
                        <h3>Cost- <br> Effective</h3>
                        <p>Posting jobs on JobMandi is free.</p>
                        <p>To make it easy, we'll post your jobs for you, or take a job feed from you - also free of charge. Because we don't charge a 20% commission fee, freelancers don't need to add that 20% onto their fees.</p>
                      </div>
                      <div class="feature down_feature efficient" style="padding-top: 206px;">
                        <h3>Efficient</h3>
                        <p>JobMandi provides an efficient way to find, screen, and hire freelancers.</p>
                        <p>We utilize sophisticated logic to match freelancers to jobs.</p>
                        <p>We provide easy to use tools for posting jobs, searching freelancers, reviewing proposals, managing bids and communicating with freelancers.</p>
                        <p>Both clients and freelancers receive job match notifications and proposal management reminders.</p>
                        <p>Mutually agreeing on good milestones is the first step towards a lucrative and communicative relationship between a client and freelancer.</p>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="row  visible-xs">
                  <div id="employer_carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                      <div class="item ">
                        <div class="mobile_feature">
                          <h3>Quality</h3>
                          <p>We screen all freelancers and coach them on providing clear profiles, portfolios and job proposals.</p>
                        </div>
                      </div>
                      <div class="item active">
                        <div class="mobile_feature down_feature mobile_experience">
                          <h3>Experienced, <br> Qualified <br> Freelancers</h3>
                          <p>Freelancers using JobMandi are seasoned and confident in their success.</p>
                          <p>They pay us a monthly fee in advance, taking a risk up front.</p>
                          <p>This is a cost of sales successful freelancers understand and manage. It works for them because they know their worth, how to make clients happy, and what it takes to run a business.</p>
                        </div>
                      </div>
                      <div class="item">
                       <div class="mobile_feature">
                        <h3>Cost- <br> Effective</h3>
                        <p>Posting jobs on JobMandi is free.</p>
                        <p>To make it easy, we'll post your jobs for you, or take a job feed from you - also free of charge.</p>
                        <p>Because we don't charge a 20% commission fee, freelancers don't need to add that 20% onto their fees.</p>
                      </div>
                    </div>
                    <div class="item">
                      <div class="mobile_feature down_feature mobile_efficient">
                        <h3>Efficient</h3>
                        <p>JobMandi provides an efficient way to find, screen, and hire freelancers.</p>
                        <p>We utilize sophisticated logic to match freelancers to jobs.</p>
                        <p>We provide easy to use tools for posting jobs, searching freelancers, reviewing proposals, managing bids and communicating with freelancers.</p>
                        <p>Both clients and freelancers receive job match notifications and proposal management reminders.</p>
                        <p>Mutually agreeing on good milestones is the first step towards a lucrative and communicative relationship between a client and freelancer.</p>
                      </div>
                    </div>  
                  </div>

                  <!-- Controls -->
                  <a class="left carousel-control" href="#employer_carousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#employer_carousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>          
              </div>
            </div>

            <div class="col-md-4 col-xs-12 sidesection">
             <div class="clearfix"></div>
             <div class="row ">
              <div class="col-sm-6 col-md-10 social_slider_row">
                <div class="social_slider">
                  <div class="dark_background"></div>
                  <div class="slider_tittle" style="background: #32769a;">
                    <span><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></span>
                  </div>
                  <div class="slider_background">
                    <div id="fb_slider" class="carousel slide post_slider" data-ride="carousel">
                      <!-- Wrapper for slides -->
                      <div class="carousel-inner" role="listbox">
                        <div class="item active">
                          <a href="https://www.facebook.com/">https://www.facebook.com/</a>
                          <p>oreum ipsum dummy text here it ts</p>
                          <a href="https://www.facebook.com/">https://www.facebook.com/</a>
                          <img src="<?php echo base_url(); ?>css/about_us/img/post_img.jpg" alt="...">
                          <div class="post_click">
                            <span><a href="#">unlike</a></span>
                            <span><a href="#">like</a></span>
                            <span><a href="#">comment</a></span>
                          </div>
                        </div>
                        <div class="item">
                          <a href="https://www.facebook.com/">https://www.facebook.com/</a>
                          <p>oreum ipsum dummy text here it ts</p>
                          <a href="https://www.facebook.com/">https://www.facebook.com/</a>
                          <img src="<?php echo base_url(); ?>css/about_us/img/post_img.jpg" alt="...">
                          <div class="post_click">
                            <span><a href="#">unlike</a></span>
                            <span><a href="#">like</a></span>
                            <span><a href="#">comment</a></span>
                          </div>
                        </div>
                      </div>
                      <!-- Controls -->
                      <a class="left carousel-control" href="#fb_slider" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#fb_slider" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-10 col-sm-6 social_slider_row" >
                <div class="social_slider">
                  <div class="dark_background"></div>
                  <div class="slider_tittle" style="background: #32769a;">
                    <span><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></span>
                  </div>
                  <div class="slider_background">
                    <div id="fb_slider6" class="carousel slide post_slider" data-ride="carousel">
                      <!-- Wrapper for slides -->
                      <div class="carousel-inner" role="listbox">
                        <div class="item active">
                          <a href="https://www.facebook.com/">https://www.facebook.com/</a>
                          <p>oreum ipsum dummy text here it ts</p>
                          <a href="https://www.facebook.com/">https://www.facebook.com/</a>
                          <img src="<?php echo base_url(); ?>css/about_us/img/post_img.jpg" alt="...">
                          <div class="post_click">
                            <span><a href="#">unlike</a></span>
                            <span><a href="#">like</a></span>
                            <span><a href="#">comment</a></span>
                          </div>
                        </div>
                        <div class="item">
                          <a href="https://www.facebook.com/">https://www.facebook.com/</a>
                          <p>oreum ipsum dummy text here it ts</p>
                          <a href="https://www.facebook.com/">https://www.facebook.com/</a>
                          <img src="<?php echo base_url(); ?>css/about_us/img/post_img.jpg" alt="...">
                          <div class="post_click">
                            <span><a href="#">unlike</a></span>
                            <span><a href="#">like</a></span>
                            <span><a href="#">comment</a></span>
                          </div>
                        </div>
                      </div>
                      <!-- Controls -->
                      <a class="left carousel-control" href="#fb_slider6" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#fb_slider6" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-10 col-sm-6 social_slider_row">
                <div class="social_slider">
                  <div class="dark_background"></div>
                  <div class="slider_tittle" style="background: #32769a;">
                    <span><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></span>
                  </div>
                  <div class="slider_background">
                    <div id="fb_slider1" class="carousel slide post_slider" data-ride="carousel">
                      <!-- Wrapper for slides -->
                      <div class="carousel-inner" role="listbox">
                        <div class="item active">
                          <a href="https://www.facebook.com/">https://www.facebook.com/</a>
                          <p>oreum ipsum dummy text here it ts</p>
                          <a href="https://www.facebook.com/">https://www.facebook.com/</a>
                          <img src="<?php echo base_url(); ?>css/about_us/img/post_img.jpg" alt="...">
                          <div class="post_click">
                            <span><a href="#">unlike</a></span>
                            <span><a href="#">like</a></span>
                            <span><a href="#">comment</a></span>
                          </div>
                        </div>
                        <div class="item">
                          <a href="https://www.facebook.com/">https://www.facebook.com/</a>
                          <p>oreum ipsum dummy text here it ts</p>
                          <a href="https://www.facebook.com/">https://www.facebook.com/</a>
                          <img src="<?php echo base_url(); ?>css/about_us/img/post_img.jpg" alt="...">
                          <div class="post_click">
                            <span><a href="#">unlike</a></span>
                            <span><a href="#">like</a></span>
                            <span><a href="#">comment</a></span>
                          </div>
                        </div>
                      </div>
                      <!-- Controls -->
                      <a class="left carousel-control" href="#fb_slider1" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#fb_slider1" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-10 col-sm-6 social_slider_row">
                <div class="social_slider">
                  <div class="dark_background"></div>
                  <div class="slider_tittle" style="background: #32769a;">
                    <span><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></span>
                  </div>
                  <div class="slider_background">
                    <div id="fb_slider2" class="carousel slide post_slider" data-ride="carousel">
                      <!-- Wrapper for slides -->
                      <div class="carousel-inner" role="listbox">
                        <div class="item active">
                          <a href="https://www.facebook.com/">https://www.facebook.com/</a>
                          <p>oreum ipsum dummy text here it ts</p>
                          <a href="https://www.facebook.com/">https://www.facebook.com/</a>
                          <img src="<?php echo base_url(); ?>css/about_us/img/post_img.jpg" alt="...">
                          <div class="post_click">
                            <span><a href="#">unlike</a></span>
                            <span><a href="#">like</a></span>
                            <span><a href="#">comment</a></span>
                          </div>
                        </div>
                        <div class="item">
                          <a href="https://www.facebook.com/">https://www.facebook.com/</a>
                          <p>oreum ipsum dummy text here it ts</p>
                          <a href="https://www.facebook.com/">https://www.facebook.com/</a>
                          <img src="<?php echo base_url(); ?>css/about_us/img/post_img.jpg" alt="...">
                          <div class="post_click">
                            <span><a href="#">unlike</a></span>
                            <span><a href="#">like</a></span>
                            <span><a href="#">comment</a></span>
                          </div>
                        </div>
                      </div>
                      <!-- Controls -->
                      <a class="left carousel-control" href="#fb_slider2" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#fb_slider2" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-10 col-sm-6 social_slider_row">
                <div class="social_slider">
                  <div class="dark_background"></div>
                  <div class="slider_tittle" style="background: #32769a;">
                    <span><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></span>
                  </div>
                  <div class="slider_background">
                    <div id="fb_slider3" class="carousel slide post_slider" data-ride="carousel">
                      <!-- Wrapper for slides -->
                      <div class="carousel-inner" role="listbox">
                        <div class="item active">
                          <a href="https://www.facebook.com/">https://www.facebook.com/</a>
                          <p>oreum ipsum dummy text here it ts</p>
                          <a href="https://www.facebook.com/">https://www.facebook.com/</a>
                          <img src="<?php echo base_url(); ?>css/about_us/img/post_img.jpg" alt="...">
                          <div class="post_click">
                            <span><a href="#">unlike</a></span>
                            <span><a href="#">like</a></span>
                            <span><a href="#">comment</a></span>
                          </div>
                        </div>
                        <div class="item">
                          <a href="https://www.facebook.com/">https://www.facebook.com/</a>
                          <p>oreum ipsum dummy text here it ts</p>
                          <a href="https://www.facebook.com/">https://www.facebook.com/</a>
                          <img src="<?php echo base_url(); ?>css/about_us/img/post_img.jpg" alt="...">
                          <div class="post_click">
                            <span><a href="#">unlike</a></span>
                            <span><a href="#">like</a></span>
                            <span><a href="#">comment</a></span>
                          </div>
                        </div>
                      </div>
                      <!-- Controls -->
                      <a class="left carousel-control" href="#fb_slider3" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#fb_slider3" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-10 col-sm-6 social_slider_row">
                <div class="social_slider">
                  <div class="dark_background"></div>
                  <div class="slider_tittle" style="background: #32769a;">
                    <span><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></span>
                  </div>
                  <div class="slider_background">
                    <div id="fb_slider4" class="carousel slide post_slider" data-ride="carousel">
                      <!-- Wrapper for slides -->
                      <div class="carousel-inner" role="listbox">
                        <div class="item active">
                          <a href="https://www.facebook.com/">https://www.facebook.com/</a>
                          <p>oreum ipsum dummy text here it ts</p>
                          <a href="https://www.facebook.com/">https://www.facebook.com/</a>
                          <img src="<?php echo base_url(); ?>css/about_us/img/post_img.jpg" alt="...">
                          <div class="post_click">
                            <span><a href="#">unlike</a></span>
                            <span><a href="#">like</a></span>
                            <span><a href="#">comment</a></span>
                          </div>
                        </div>
                        <div class="item">
                          <a href="https://www.facebook.com/">https://www.facebook.com/</a>
                          <p>oreum ipsum dummy text here it ts</p>
                          <a href="https://www.facebook.com/">https://www.facebook.com/</a>
                          <img src="<?php echo base_url(); ?>css/about_us/img/post_img.jpg" alt="...">
                          <div class="post_click">
                            <span><a href="#">unlike</a></span>
                            <span><a href="#">like</a></span>
                            <span><a href="#">comment</a></span>
                          </div>
                        </div>
                      </div>
                      <!-- Controls -->
                      <a class="left carousel-control" href="#fb_slider4" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#fb_slider4" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-2"></div>
            </div>  




          </div>     
        </div>
      </div>

    </section>

    <section id="footer">
      <div class="container">
       <div class="row"> 

         <div class="col-lg-12 footer-set">
           <img src="<?php echo base_url(); ?>css/home_page/img/footer-logo.png" alt="" title="" />
         </div>

         <div class="col-lg-4"><br/>
          <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook&tabs=timeline&width=250&height=200&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="250" height="200" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
        </div>

        <div class="col-lg-2 sitelink w3-text-white" style="padding:3px">
          <h5>JOBMANDI</h5>
          <ul>
            <li><a style="color: #868686;line-height: 24px;text-transform: uppercase;font-size: 12px;" href="<?php echo base_url(); ?>content/about_us">ABOUT US</a></li>
            <!-- <li><a style="color: #868686;line-height: 24px;text-transform: uppercase;font-size: 12px;" href="<?php echo base_url(); ?>content/TESTIMONIALS">TESTIMONIALS</a></li> -->
            <li><a style="color: #868686;line-height: 24px;text-transform: uppercase;font-size: 12px;" href="<?php echo base_url(); ?>content/Faq_control">FAQ's</a></li>
            <li><a style="color: #868686;line-height: 24px;text-transform: uppercase;font-size: 12px;" href="<?php echo base_url(); ?>content/Blog_control">BLOG</a></li>
<!--         <li><a style="color: #868686;line-height: 24px;text-transform: uppercase;font-size: 12px;" href="<?php echo base_url(); ?>content/Sitemap_control">SITEMAP</a></li>
-->        <li><a style="color: #868686;line-height: 24px;text-transform: uppercase;font-size: 12px;" href="<?php echo base_url(); ?>content/Contact_us">CONTACT US</a></li>
</ul>
</div>
<div class="col-lg-2 sitelink w3-text-white" style="padding:3px">
  <h5>GENERAL INFO</h5>
  <ul>
    <li><a style="color: #868686;line-height: 24px;text-transform: uppercase;font-size: 12px;" href="<?php echo base_url(); ?>content/Pricing">PRICING</a></li>
    <li><a style="color: #868686;line-height: 24px;text-transform: uppercase;font-size: 12px;" href="<?php echo base_url(); ?>content/Privacy_policy">PRIVACY POLICY</a></li>
    <li><a style="color: #868686;line-height: 24px;text-transform: uppercase;font-size: 12px;" href="<?php echo base_url(); ?>content/Terms_condition">TERMS & CONDITIONS</a></li>
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
                        <div class="col-lg-2 sitelink" style="padding:3px">
                          <h5>EXPLORE</h5>
                          <ul>
                           <?php if($profile_type=='1' || $profile_type == ''){ ?>
                            <li>
                              <a style="color: #868686;line-height: 24px;text-transform: uppercase;font-size: 12px;" href="<?php echo base_url(); ?>project/project_listing?search_param=fixPrice">FIXED PROJECTS</a>
                            </li>
                            <li>
                              <a style="color: #868686;line-height: 24px;text-transform: uppercase;font-size: 12px;" href="<?php echo base_url(); ?>project/project_listing?search_param=hourly">HOURLY PROJECTS</a>
                            </li>
                           <?php } ?>
                           <?php if($profile_type=='3' || $profile_type == ''){ ?>
                            <li>
                              <a style="color: #868686;line-height: 24px;text-transform: uppercase;font-size: 12px;" href="<?php echo base_url(); ?>jobseeker/jobseeker_lists?search_param=Full_Time">FULL-TIME JOBS</a>
                            </li>
                            <li>
                              <a style="color: #868686;line-height: 24px;text-transform: uppercase;font-size: 12px;" href="<?php echo base_url(); ?>jobseeker/jobseeker_lists?search_param=Part_Time">PART-TIME JOBS</a>
                            </li>
                           <?php } ?>
                            <!--  <li><a href="#">ONLINE JOBS</a></li> -->
                          </ul>
                        </div>                  

                        <div class="col-lg-2 sitelink">
                         <h5 class="text-right">FOLLOW US ON</h5>
                         <h5 class="text-right"><a href="#"><i class="fa fa-facebook"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><i class="fa fa-google"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><i class="fa fa-twitter"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><i class="fa fa-pinterest"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><i class="fa fa-instagram"></i></a>
                         </h5>
                       </div> 

                       <div class="col-lg-12 copy-rigt">
                         <h5>©2018 Jobmandi.com. All rights resrved.</h5>
                       </div> 
                     </div><!--End row-->
                   </div><!--End container-->
                 </section><!--End how-it-work--> 

                 <!--Start of Tawk.to Script-->
                 <script type="text/javascript">
                  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
                  (function(){
                    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                    s1.async=true;
                    s1.src='https://embed.tawk.to/5a7184f4d7591465c7073e33/default';
                    s1.charset='UTF-8';
                    s1.setAttribute('crossorigin','*');
                    s0.parentNode.insertBefore(s1,s0);
                  })();
                </script>
                <!--End of Tawk.to Script-->

                <script src="<?php echo base_url(); ?>css/about_us/vendor/jquery/jquery.min.js"></script> 
                <script src="<?php echo base_url(); ?>css/about_us/vendor/bootstrap/js/bootstrap.min.js"></script>
              </body>

              </html>
