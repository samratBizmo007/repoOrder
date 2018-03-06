<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>JobMandi.com</title>

  <!-- Material Design Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">    

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url() ?>css/home_mobile/css/bootstrap.min.css" rel="stylesheet">

  <!-- Material Design Bootstrap -->
  <link href="<?php echo base_url() ?>css/home_mobile/css/mdb.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>css/home_mobile/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>css/home_mobile/css/testimonials.css" rel="stylesheet">    

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

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <ul class="nav navbar-nav navbar-right">

              <li class="scroll">
                <a href="<?php echo base_url(); ?>content/about_us">About JobMandi </a></li>

                <li class="scroll">
                  <?php if($profile_type == '' || $profile_type == 3 || $profile_type == 1 || $profile_type == 4){ ?>
                  <a class="waves-effect waves-light" href="<?php echo base_url(); ?>jobseeker/jobseeker_lists">Explore Jobs</a>
                  <?php } ?></li>

                  <li class="scroll">
                    <?php if($profile_type == '' || $profile_type == 2 || $profile_type == 1 ){ ?>
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


                        <li> <?php if($profile_type == '' || $profile_type == 2 || $profile_type == 1 ){ ?>
                          <a class="waves-effect waves-light" href="<?php echo base_url(); ?>project/post_project_Controller">Post Project</a>
                          <?php } ?> 
                        </li>  
                        
                        <li> <?php if($profile_type == '' || $profile_type == 4){ ?>
                          <a class="waves-effect waves-light" href="<?php echo base_url(); ?>job/post_jobs">Post Job</a>
                          <?php } ?> 
                        </li>  

                   <!--  <li class="active">
                        <a href="<?php echo base_url(); ?>" class="waves-effect waves-light">Job Seeker <span class="sr-only">(current)</span>
                        </a></li>
                        <li>
                            <a href="<?php echo base_url(); ?>" class="waves-effect waves-light">Job Employer</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>" class="waves-effect waves-light">Find Work</a>
                        </li>
                        <li class="mob-nav-set">
                            <a href="<?php echo base_url(); ?>" class="waves-effect waves-light">Post Project</a>
                          </li> -->
                          
                        </ul>
                      </div>
                    </nav>        
                  </div>
                </div>
              </div>
            </section>
            <!-- /Header-->


            <!-- Sign up -->
            <section id="signup">
              <div class="container">
                <div class="row">
                  <?php 
                  if(isset($user_name) && isset($user_name)!=''){ ?>

                  <div class="col-xs-12">
                    <h5><a href="<?php echo base_url() ?>auth/login/logout">Log out</a></h5>
                  </div>
                  <?php
                }
                else{?>
                <div class="col-xs-6">
                  <h5><a href="<?php echo base_url() ?>auth/login">Log in</a></h5>
                </div>
                <div class="col-xs-6">
                  <h5><a href="<?php echo base_url() ?>auth/login">Sign up</a></h5>
                </div> 
                <?php } ?>
              </div>
            </div>
          </section>
          <!-- /Sign up-->        

          <section id="banner-mobile">
           <div class="container">
             <div class="row">


              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                </ol>

                <div class="carousel-inner">

                  <div class="item active">
                    <img src="<?php echo base_url() ?>css/home_mobile/img/mobile-banner/1.jpg" alt="First slide">
                    <div class="carousel-caption">
                     <img class="wow fadeIn" src="<?php echo base_url() ?>css/home_mobile/img/job-seekar-bg.png" alt="" title="" />
                     <h3 class="wow bounceInLeft">Full Time <b>Job Seeker</b></h3>
                     <a class="btn btn-default" href="<?php echo base_url(); ?>auth/login?profile=3"><i class="material-icons md-36">search</i>&nbsp;<h2>Find Jobs</h2></a>
                   </div>
                 </div>

                 <div class="item">
                  <img src="<?php echo base_url() ?>css/home_mobile/img/mobile-banner/1.jpg" alt="Second slide">
                  <div class="carousel-caption">
                   <img class="wow fadeIn" src="<?php echo base_url() ?>css/home_mobile/img/freelancer-bg.png" alt="" title="" />                        
                   <h3 class="wow bounceInLeft">Become a <b>Freelancer</b></h3>
                   <a href="<?php echo base_url(); ?>auth/login?profile=1" class="btn btn-default"><i class="material-icons md-36">done</i>&nbsp;<h2>Let’s Start</h2></a>
                 </div>
               </div>

               <div class="item">
                <img src="<?php echo base_url() ?>css/home_mobile/img/mobile-banner/1.jpg" alt="Third slide">
                <div class="carousel-caption">
                 <img class="wow fadeIn" src="<?php echo base_url() ?>css/home_mobile/img/job-provider-bg.png" alt="" title="" />                        
                 <h3 class="wow bounceInLeft">Full Time <b>Job Provider</b></h3>
                 <a href="<?php echo base_url(); ?>job/post_jobs" class="btn btn-default" style="margin-top:32px"><i class="material-icons md-36" >toc</i>&nbsp;<h2>Post Job</h2></a>
               </div>
             </div>

             <div class="item">
              <img src="<?php echo base_url() ?>css/home_mobile/img/mobile-banner/1.jpg" alt="Third slide">
              <div class="carousel-caption">
               <img class="wow fadeIn" src="<?php echo base_url() ?>css/home_mobile/img/work-done-bg.png" alt="" title="" />                        
               <h3 class="wow bounceInLeft">Work Done with <b>Freelancer</b></h3>
               <a class="btn btn-default" href="<?php echo base_url(); ?>freelancer/freelancer_list" style="margin-top:34px"><i class="material-icons md-36" >search</i>&nbsp;<h2>Find Freelancers</h2></a>
             </div>
           </div>

         </div>

         <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>


      </div>


    </div><!--End row-->
  </div><!--End container-->
</section><!--End banner-->


<section id="what-different">
	<div class="container">
   <div class="row">


    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 what-diff-left">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 what-diff-set">
        <h1 class="wow fadeInDown animated">What’s Different</h1><hr>
      </div>

      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 what-diff-left-1">
       <center><img class="what-dff-mob-set img-responsive" src="<?php echo base_url() ?>css/home_mobile/img/what-diff-1.png" alt="" title="" /></center>
       <h3 class="text-center wow fadeInDown animated">Curated Community</h3>
       <center><hr></center>
       <h5 class="text-center what-dff-mob-set">Headhunt top-notch freelance talent from a curated community of highly skilled, erudite professional.</h5>				
     </div>
     <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 what-diff-left-2">
      <h3 class="text-center wow fadeInDown animated">Work<br/> On-the-Go</h3>
      <center><hr></center>
      <h5 class="text-center what-dff-mob-set">Post requirements, discuss proposals, and collaborate with freelancers to get the work done on-the-go.</h5>
      <center><img class="what-dff-mob-set img-responsive" src="<?php echo base_url() ?>css/home_mobile/img/what-diff-2.png" alt="" title="" /></center>				
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 what-diff-left-3">
     <center><img class="what-dff-mob-set img-responsive" src="<?php echo base_url() ?>css/home_mobile/img/what-diff-3.png" alt="" title="" /></center>
     <h3 class="text-center wow fadeInDown animated">Reduced<br/> Cost</h3>
     <center><hr></center>
     <h5 class="text-center what-dff-mob-set">A platform like<br/> JobMandi<br/> helps reduce cost incurred in manually hiring full-time freelancers.</h5>				
   </div>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 what-diff-left-4">
    <h3 class="text-center wow fadeInDown animated">Find <br/>Right Skills</h3>
    <center><hr></center>
    <h5 class="text-center what-dff-mob-set">Find skilled local or remote experts for ongoing long-term, short-term or one-time projects.</h5>
    <center><img class="what-dff-mob-set img-responsive" src="<?php echo base_url() ?>css/home_mobile/img/what-diff-4.png" alt="" title="" /></center>				
  </div>                                               
</div><!--end what-diff-left-->

<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 latest-job" id="accordion" >
 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 latest-job-head" id="accordion" role="tablist" aria-multiselectable="true">
   <h3 data-parent="#accordion" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">Latest Jobs <span style="cursor:pointer;" class="pull-right mobile-set-plus"><i class="fa fa-caret-right"></i></span></h3>
 </div>


 <div id="collapse1" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 latest-job-listing-scroll div-collapse collapse" style="height: 400px;overflow-y: scroll;">
  <?php
  if ($jobs['status'] == 200) {
    foreach ($jobs['status_message'] as $key) {
      ?>
      <!--LISTIN-->
      <div class="col-lg-12 latest-job-listing">
        <div class="row">
         <h4 class="pull-left" style="width: 100%"><?php echo $key['jm_job_post_name'];?></h4>
         <h5 class="pull-left"><b>Hourly</b> <span>Posted <?php echo date('M d,Y', strtotime($key['jm_posted_date']));?></span></h5>
         <a href="<?php echo base_url();?>auth/login?profile=3&payload=ApplyJob&value=<?php echo base64_encode($key['jm_jobpost_id']);?>" class="btn btn-warning btn-sm pull-right">View</a>
       </div>
     </div>
     <!--/LISTI-->
     <?php }
   } 
   else{
    echo '
    <div class="col-lg-12 latest-job-listing">
    <div class="row">
    <h4 class="pull-left"><i class="fa fa-empty"></i> No Jobs Listed Yet !!!</h4>
    </div>
    </div>
    ';
  }
  ?>     
</div><!--end latest-job-listing-scroll-->            

</div><!--End row-->
</div><!--End container-->
</section><!--End what-different-->



<section id="text-srcoll">
	<div class="container">
   <div class="row">

     <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-srcoll-left">


       <div class="carousel slide" data-ride="carousel" id="quote-carousel2">
        <!-- Bottom Carousel Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#quote-carousel2" data-slide-to="0" class="active"></li>
          <li data-target="#quote-carousel2" data-slide-to="1"></li>
          <li data-target="#quote-carousel2" data-slide-to="2"></li>
          <li data-target="#quote-carousel2" data-slide-to="3"></li>
        </ol>

        <!-- Carousel Slides / Quotes -->
        <div class="carousel-inner">

          <!-- Quote 1 -->
          <div class="item active">
            <blockquote>
              <div class="row">
                <div class="col-sm-12">
                 <h2>Value yourself to<br/><strong>#SayNoToLess</strong></h2>
               </div>
             </div>
           </blockquote>
         </div>

         <!-- Quote 1 -->
         <div class="item">
          <blockquote>
            <div class="row">
              <div class="col-sm-12">
               <h2>Invest in your team, just<br/><strong>#SayNoToLess</strong></h2>
             </div>
           </div>
         </blockquote>
       </div>
       <!-- Quote 1 -->
       <div class="item">
        <blockquote>
          <div class="row">
            <div class="col-sm-12">
             <h2>Put in extra efforts<br/><strong>#SayNoToLess</strong></h2>
           </div>
         </div>
       </blockquote>
     </div>      

     <!-- Quote 1 -->
     <div class="item">
      <blockquote>
        <div class="row">
          <div class="col-sm-12">
           <h2>Inspire yourself to<br/><strong>#SayNoToLess</strong></h2>
         </div>
       </div>
     </blockquote>
   </div>                                                    

 </div>


</div><!--end carousel slide-->                

</div>


<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
 <iframe width="100%" height="315" src="https://www.youtube.com/embed/mhsz9nZIMoo?showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
</div>            

</div><!--End row-->
</div><!--End container-->
</section><!--End what-different--> 


<section id="why-poject-mob">
	<div class="container">
   <div class="row">       

     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 why-proj-txt">

       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
         <div class="row">
           <h1 class="wow fadeInDown animated"><strong>Why Find Projects on JobMandi?</strong></h1><hr>
         </div>
       </div>            

       <div class="col-xs-3 col-sm-12 col-md-11 col-lg-11 wow fadeInDown animated">
         <center><img src="<?php echo base_url() ?>css/home_mobile/img/circle.png" alt="" title="" /></center>
         <h3>Real-time Connect<br/><img src="<?php echo base_url() ?>css/home_mobile/img/solid.jpg" alt="" title="" /></h3>
       </div> 



       <div class="col-xs-3 col-sm-12 col-md-11 col-lg-11 wow fadeInDown animated">
         <center><img src="<?php echo base_url() ?>css/home_mobile/img/circle.png" alt="" title="" /></center>
         <h3>Get Noticed &amp; Hired<br/><img src="<?php echo base_url() ?>css/home_mobile/img/solid.jpg" alt="" title="" /></h3>
       </div>


       <div class="col-xs-3 col-sm-3 col-md-11 col-lg-11 wow fadeInDown animated">
        <center><img src="<?php echo base_url() ?>css/home_mobile/img/circle.png" alt="" title="" /></center>                    
        <h3>Keep Your Quote<br/><img src="<?php echo base_url() ?>css/home_mobile/img/solid.jpg" alt="" title="" /></h3>
      </div>


      <div class="col-xs-3 col-sm-3 col-md-11 col-lg-11 wow fadeInDown animated">
        <center><img src="<?php echo base_url() ?>css/home_mobile/img/circle.png" alt="" title="" /></center>                    
        <h3>Work Your Way<br/><img src="<?php echo base_url() ?>css/home_mobile/img/solid.jpg" alt="" title="" /></h3>
      </div>                                                                         



    </div><!--End why-proj-txt-->

  </div><!--End row-->
</div><!--End container-->
</section><!--End why-poject-mob-->


<section id="service-we-offer-mob">
	<div class="container">
   <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <h1 class="text-center wow fadeInDown animated">Service we offer</h1><hr>
    </div>         
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">


     <div class="carousel slide" data-ride="carousel" id="quote-carousel3">
      <!-- Bottom Carousel Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#quote-carousel3" data-slide-to="0" class="active"></li>
        <li data-target="#quote-carousel3" data-slide-to="1"></li>
        <li data-target="#quote-carousel3" data-slide-to="2"></li>
        <li data-target="#quote-carousel3" data-slide-to="3"></li>
        <li data-target="#quote-carousel3" data-slide-to="4"></li>
        <li data-target="#quote-carousel3" data-slide-to="5"></li>                                                    
      </ol>

      <!-- Carousel Slides / Quotes -->
      <div class="carousel-inner">

        <!-- Quote 1 -->
        <div class="item active">
          <blockquote>
            <div class="row">
              <div class="col-xs-12">
               <h4 style="font-weight:400;" class="text-center"><center>
                <img src="<?php echo base_url() ?>css/home_mobile/img/service-icon1.png" alt="" title="" /></center>For All Companies</h4>
                <center><img src="<?php echo base_url() ?>css/home_mobile/img/black.jpg" alt="" title="" /></center>
              </div>
            </div>
          </blockquote>
        </div>

        <!-- Quote 1 -->
        <div class="item">
          <blockquote>
            <div class="row">
              <div class="col-sm-12">
               <h4 style="font-weight:400;" class="text-center"><center>
                <img src="<?php echo base_url() ?>css/home_mobile/img/service-icon2.png" alt="" title="" /></center>Create &amp; Share Profile </h4>
                <center><img src="<?php echo base_url() ?>css/home_mobile/img/black.jpg" alt="" title="" /></center>
              </div>
            </div>
          </blockquote>
        </div>

        <!-- Quote 1 -->
        <div class="item">
          <blockquote>
            <div class="row">
              <div class="col-sm-12">
               <h4 style="font-weight:400;" class="text-center"><center>
                <img src="<?php echo base_url() ?>css/home_mobile/img/service-icon3.png" alt="" title="" /></center>No Cuts, No Commissions </h4>
                <center><img src="<?php echo base_url() ?>css/home_mobile/img/black.jpg" alt="" title="" /></center>
              </div>
            </div>
          </blockquote>
        </div> 

        <!-- Quote 1 -->
        <div class="item">
          <blockquote>
            <div class="row">
              <div class="col-sm-12">
               <h4 style="font-weight:400;" class="text-center"><center>
                <img src="<?php echo base_url() ?>css/home_mobile/img/service-icon4.png" alt="" title="" /></center>Say No  &amp; to Less</h4>
                <center><img src="<?php echo base_url() ?>css/home_mobile/img/black.jpg" alt="" title="" /></center>
              </div>
            </div>
          </blockquote>
        </div> 

        <!-- Quote 1 -->
        <div class="item">
          <blockquote>
            <div class="row">
              <div class="col-sm-12">
               <h4 style="font-weight:400;" class="text-center"><center>
                <img src="<?php echo base_url() ?>css/home_mobile/img/service-icon5.png" alt="" title="" /></center>Global Exposure</h4>
                <center><img src="<?php echo base_url() ?>css/home_mobile/img/black.jpg" alt="" title="" /></center>
              </div>
            </div>
          </blockquote>
        </div> 

        <!-- Quote 1 -->
        <div class="item">
          <blockquote>
            <div class="row">
              <div class="col-sm-12">
               <h4 style="font-weight:400;" class="text-center"><center>
                <img src="<?php echo base_url() ?>css/home_mobile/img/service-icon6.png" alt="" title="" /></center> Unlimited Opportunities</h4>
                <center><img src="<?php echo base_url() ?>css/home_mobile/img/black.jpg" alt="" title="" /></center>
              </div>
            </div>
          </blockquote>
        </div>                                                                                                                                  

      </div>


    </div><!--end carousel slide-->                

  </div><!--End col-xs-12 col-sm-12 col-md-12 col-lg-12-->

</div><!--End row-->
</div><!--End container-->
</section><!--End service-we-offer-mob--> 


<section id="how-it-work">
	<div class="container">
   <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <h1 class="text-center wow fadeInDown animated">How it works?</h1><hr>
    </div>

    <div style="height:40px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
     <img class="img-responsive wow fadeInLeft animated" src="<?php echo base_url() ?>css/home_mobile/img/how-it-works.png" alt="" title="" />
   </div>         	
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><h4 class="text-center wow fadeInDown animated">Post Work Details</h4></div>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><h4 class="text-center wow fadeInDown animated">Find & Explore</h4></div>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><h4 class="text-center wow fadeInDown animated">Hire Inspiring Talent</h4></div>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><h4 class="text-center wow fadeInDown animated">Approve Work & Pay</h4></div>


 </div><!--End row-->
</div><!--End container-->
</section><!--End how-it-work-->


<section id="number-counter-mob">
	<div class="container">
   <div class="row">        


     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">


       <div class="carousel slide" data-ride="carousel" id="quote-carousel4">
        <!-- Bottom Carousel Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#quote-carousel4" data-slide-to="0" class="active"></li>
          <li data-target="#quote-carousel4" data-slide-to="1"></li>
          <li data-target="#quote-carousel4" data-slide-to="2"></li>                                                    
        </ol>

        <!-- Carousel Slides / Quotes -->
        <div class="carousel-inner">

          <!-- Quote 1 -->
          <div class="item active">
            <blockquote>
              <div class="row">
                <div class="col-xs-12">
                 <h1 class="text-center number-counter-mob-green"><?php echo $projects;?>+</h1>
                 <h4 style="font-weight:400;" class="text-center white-text"><img src="<?php echo base_url() ?>css/home_mobile/img/brifcase.png" /> NO. OF PROJECTS</h4>
               </div>
             </div>
           </blockquote>
         </div>

         <!-- Quote 1 -->
         <div class="item">
          <blockquote>
            <div class="row">
              <div class="col-xs-12">
               <h1 class="text-center number-counter-mob-green"><?php echo $jobcount; ?>+</h1>
               <h4 style="font-weight:400;" class="text-center white-text"><img src="<?php echo base_url() ?>css/home_mobile/img/jobs.png" /> NO. OF JOBS</h4>
             </div>
           </div>
         </blockquote>
       </div>

       <!-- Quote 1 -->
       <div class="item">
        <blockquote>
          <div class="row">
            <div class="col-xs-12">
             <h1 class="text-center number-counter-mob-green">10,000+</h1>
             <h4 style="font-weight:400;" class="text-center white-text"><img src="<?php echo base_url() ?>css/home_mobile/img/category.png" /> NO. OF CATEGORIES</h4>
           </div>
         </div>
       </blockquote>
     </div> 

   </div>


 </div><!--end carousel slide-->                

</div><!--End col-xs-12 col-sm-12 col-md-12 col-lg-12-->

</div><!--End row-->
</div><!--End container-->
</section><!--End number-counter-mob-->


<section id="success-stories">
	<div class="container">
   <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <h1 class="text-center wow fadeInDown animated">Success Stories</h1><hr>
    </div>


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
              <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 text-center">
                <center><img class="img-circle-mob-set img-circle" src="<?php echo base_url() ?>css/home_mobile/img/profile.png" ></center>

              </div>
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
               <img class="quote-mob-set" style="width:53px; height:45px;" src="<?php echo base_url() ?>css/home_mobile/img/quote.jpg" alt="" title="" />
               <h5>I attribute our success building and scaling our startup to Upwork. 
               It’s how we recruit new people, manage payments and track deadlines.</h5>
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
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 text-center">
              <center><img class="img-circle-mob-set img-circle" src="<?php echo base_url() ?>css/home_mobile/img/profile.png" ></center>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
              <img class="quote-mob-set" style="width:53px; height:45px;" src="<?php echo base_url() ?>css/home_mobile/img/quote.jpg" alt="" title="" />
              <h5>I attribute our success building and scaling our startup to Upwork. 
              It’s how we recruit new people, manage payments and track deadlines.</h5>
              <small style="color:#02b28b">Erik Allbest</small>
              <small style="color:#02b28b">CEO & Founder,Chess.com</small>
            </div>
          </div>
        </blockquote>
      </div> 
      <!--                                       Quote 3 -->
      <div class="item">
        <blockquote>
          <div class="row">
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 text-center">
              <center><img class="img-circle-mob-set img-circle" src="<?php echo base_url() ?>css/home_mobile/img/profile.png" ></center>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
              <img class="quote-mob-set" style="width:53px; height:45px;" src="<?php echo base_url() ?>css/home_mobile/img/quote.jpg" alt="" title="" />
              <h5>I attribute our success building and scaling our startup to Upwork. 
              It’s how we recruit new people, manage payments and track deadlines.</h5>
              <small style="color:#02b28b">Erik Allbest</small>
              <small style="color:#02b28b">CEO & Founder,Chess.com</small>
            </div>
          </div>
        </blockquote>
      </div> 
    </div>

    <!-- Carousel Buttons Next/Prev -->
    <a class="left carousel-control" href="#quote-carousel" role="button" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
    <a class="right carousel-control" href="#quote-carousel" role="button" data-slide="next"><i class="fa fa-chevron-right"></i></a>

    <div style="display:none;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <h6 class="text-center"><a href="#">View all</a></h6>
    </div>

  </div><!--end carousel slide-->




</div><!--End row-->
</div><!--End container-->
</section><!--End how-it-work--> 


<section id="footer-mobile">

  <div class="container">
   <div class="row"> 

     <div class="col-lg-12 footer-set">
       <img src="<?php echo base_url(); ?>css/home_page/img/footer-logo.png" alt="" title="" />
     </div>

     <div class="col-lg-4"><br/>
      <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook&tabs=timeline&width=250&height=200&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="250" height="200" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
    </div>

    <div class="col-lg-2 sitelink w3-text-white" style="padding:3px;text-align:center;">
      <h5>JOBMANDI</h5>
      <ul>
        <li><a style="color: #868686;line-height: 24px;text-transform: uppercase;font-size: 12px;" href="<?php echo base_url(); ?>content/about_us">ABOUT US</a></li>
        <!-- <li><a style="color: #868686;line-height: 24px;text-transform: uppercase;font-size: 12px;" href="<?php echo base_url(); ?>content/TESTIMONIALS">TESTIMONIALS</a></li> -->
        <li><a style="color: #868686;line-height: 24px;text-transform: uppercase;font-size: 12px;" href="<?php echo base_url(); ?>content/Faq_control">FAQ's</a></li>
        <li><a style="color: #868686;line-height: 24px;text-transform: uppercase;font-size: 12px;" href="<?php echo base_url(); ?>content/Blog_control">BLOG</a></li>
<!--               <li><a style="color: #868686;line-height: 24px;text-transform: uppercase;font-size: 12px;" href="<?php echo base_url(); ?>content/Sitemap_control">SITEMAP</a></li>
-->              <li><a style="color: #868686;line-height: 24px;text-transform: uppercase;font-size: 12px;" href="<?php echo base_url(); ?>content/Contact_us">CONTACT US</a></li>
</ul>
</div>
<div class="col-lg-2 sitelink w3-text-white" style="padding:3px;text-align:center;">
  <h5>GENERAL INFO</h5>
  <ul>
    <li><a style="color: #868686;line-height: 24px;text-transform: uppercase;font-size: 12px;" href="<?php echo base_url(); ?>content/Pricing">PRICING</a></li>
    <li><a style="color: #868686;line-height: 24px;text-transform: uppercase;font-size: 12px;" href="<?php echo base_url(); ?>content/Privacy_policy">PRIVACY POLICY</a></li>
    <li><a style="color: #868686;line-height: 24px;text-transform: uppercase;font-size: 12px;" href="<?php echo base_url(); ?>content/Terms_condition">TERMS & CONDITIONS</a></li>
  </ul>
</div>

<div class="col-lg-2 sitelink" style="padding:3px;text-align:center;">
  <h5>EXPLORE</h5>
  <ul>
    <li>
      <a style="color: #868686;line-height: 24px;text-transform: uppercase;font-size: 12px;" href="<?php echo base_url(); ?>project/project_listing?jm_job_type=Fixed_Price">FIXED PROJECTS</a>
    </li>
    <li>
      <a style="color: #868686;line-height: 24px;text-transform: uppercase;font-size: 12px;" href="<?php echo base_url(); ?>project/project_listing?jm_job_type=Hourly">HOURLY PROJECTS</a>
    </li>
    <li>
      <a style="color: #868686;line-height: 24px;text-transform: uppercase;font-size: 12px;" href="<?php echo base_url(); ?>jobseeker/jobseeker_lists?search_param=Full_Time">FULL-TIME JOBS</a>
    </li>
    <li>
      <a style="color: #868686;line-height: 24px;text-transform: uppercase;font-size: 12px;" href="<?php echo base_url(); ?>jobseeker/jobseeker_lists?search_param=Part_Time">PART-TIME JOBS</a>
    </li>
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


<!-- SCRIPTS -->

<!-- JQuery -->
<script type="text/javascript" src="<?php echo base_url() ?>css/home_mobile/js/jquery.min.js"></script>

<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="<?php echo base_url() ?>css/home_mobile/js/bootstrap.min.js"></script>

<!-- Material Design Bootstrap -->
<script type="text/javascript" src="<?php echo base_url() ?>css/home_mobile/js/mdb.js"></script>

<!-- Collapse accordion -->    
<style>
#accordion .panel {
  border:none;
  -webkit-box-shadow:none; 
  box-shadow:none;
}
.div-collapse {
  border-top: 0;
  -webkit-box-shadow: none;
  box-shadow: none;
}

.div-collapse {
  overflow-x: visible;
  -webkit-overflow-scrolling: touch;
  border-top: 1px solid transparent;
  -webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,.1);
  box-shadow: inset 0 1px 0 rgba(255,255,255,.1);
}
.mobile-set-plus{ display:block;}

/* Small devices (tablets, 768px and up) */
@media (min-width: 768px) {
 .div-collapse.collapse {
   display: block !important;
   height: auto !important;
   overflow: visible !important;
 }
 .mobile-set-plus{ display:none;}

}            
</style>


<!--Animated CSS-->
<link rel="stylesheet" href="<?php echo base_url() ?>css/home_mobile/css/animate.css">    
<script src="<?php echo base_url() ?>css/home_mobile/js/wow.min.js"></script>
<script>
  wow = new WOW(
  {
    animateClass: 'animated',
    offset:       200
  }
  );
  wow.init();
</script>     





</body>

</html>