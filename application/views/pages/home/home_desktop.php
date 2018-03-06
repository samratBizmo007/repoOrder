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
  <link href="<?php echo base_url(); ?>css/home_page/css/bootstrap.min.css" rel="stylesheet">

  <!-- Material Design Bootstrap -->
  <link href="<?php echo base_url() ?>css/home_page/css/mdb.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>css/home_page/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>css/home_page/css/testimonials.css" rel="stylesheet">    
  <style>
  
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

                        
                        <li>
                          <?php 
                          if(isset($user_name) && isset($user_name)!=''){
                            echo '<a href="'.base_url().'auth/login/logout" class="btn btn-warning btn-rounded waves-effect waves-light">Logout <i class="fa fa-sign-out"></i></a>';
                          }
                          else{?>
                          <div class="">
                            <a href="<?php echo base_url().'auth/login'; ?>" style="margin:0px; padding:3px 12px;" class="btn btn-warning btn-rounded waves-effect waves-light">Log in&nbsp;/&nbsp;Sign up</a>
                          </div>
                          <?php
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


        <!-- Sign up -->
        <section id="signup">
          <div class="container">
            <div class="row">

             <div class="col-xs-6">
               <h5><a href="#">Log in</a></h5>
             </div>
             <div class="col-xs-6">
               <h5><a href="#">Sign up</a></h5>
             </div>            

           </div>
         </div>
       </section>
       <!-- /Sign up-->        


       <section id="banner">
         <div class="container">
           <div class="row">

             <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 job-seekar border-vertical">
               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                 <img class="img-responsive pull-right wow fadeIn" src="<?php echo base_url() ?>css/home_page/img/job-seekar-bg.png" alt="" title="" />
                 <h2 class="wow bounceInLeft">Full Time<br/><b>Job Seeker</b></h2>
                 <a class="btn btn-default" href="<?php echo base_url(); ?>auth/login?profile=3"><i class="material-icons md-36">search</i>&nbsp;<h2>Find Jobs</h2></a>
               </div><!--end job seekar-->

               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 border-bottom">&nbsp;</div>

               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 freelancer">
                 <img class="img-responsive pull-right wow fadeIn" src="<?php echo base_url() ?>css/home_page/img/freelancer-bg.png" alt="" title="" />
                 <h2 class="wow bounceInLeft">Become a<br/><b>Freelancer</b></h2>
                 <h5 class="wow bounceInLeft">Find work that match your skills</h5>
                 <a href="<?php echo base_url(); ?>auth/login?profile=1" class="btn btn-default"><i class="material-icons md-36">done</i>&nbsp;<h2>Let’s Start</h2></a>
               </div><!--end freelancer-->               
             </div><!--end job-seekar-->

             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 border-bottom-mob-set">&nbsp;</div>

             <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 job-provider border-vertical">
               <h2 class="wow bounceInDown">Full Time<br/><b>Job Provider</b></h2>
               <h5 class="wow bounceInDown">Find right talent for the job</h5>	
               <center><img class="img-responsive wow fadeIn" src="<?php echo base_url() ?>css/home_page/img/job-provider-bg.png" alt="" title="" /></center>
               <center><a href="<?php echo base_url(); ?>job/post_jobs" class="btn btn-default" style="margin-top:32px"><i class="material-icons md-36" >toc</i>&nbsp;<h2>Post Job</h2></a></center>
             </div><!--end job-provider-->

             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 border-bottom-mob-set">&nbsp;</div>

             <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 work-done">
               <h2 class="text-center wow bounceInDown">Get <b>Work Done</b><br/> with Skilled <b>Freelancer</b></h2>
               <h5 class="wow bounceInDown">Get Work Done with Skilled Freelancer</h5>                
               <center><img class="img-responsive wow fadeIn" src="<?php echo base_url() ?>css/home_page/img/work-done-bg.png" alt="" title="" /></center>

               <center>
                <a class="btn btn-default" href="<?php echo base_url(); ?>freelancer/freelancer_list" style="margin-top:34px"><i class="material-icons md-36" >search</i>&nbsp;<h2>Find Freelancers</h2></a>
              </center>
              <!--Search Form-->
             <!-- <form class="search-form">
              <input type="search" value="" placeholder="Java, PHP" class="search-input">
              <button type="submit" class="search-button">
                <svg class="submit-button">
                  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#search"></use>
              </svg>
          </button>
      </form>

      <svg xmlns="http://www.w3.org/2000/svg" width="0" height="0" display="none">
          <symbol id="search" viewBox="0 0 32 32">
            <path d="M 19.5 3 C 14.26514 3 10 7.2651394 10 12.5 C 10 14.749977 10.810825 16.807458 12.125 18.4375 L 3.28125 27.28125 L 4.71875 28.71875 L 13.5625 19.875 C 15.192542 21.189175 17.250023 22 19.5 22 C 24.73486 22 29 17.73486 29 12.5 C 29 7.2651394 24.73486 3 19.5 3 z M 19.5 5 C 23.65398 5 27 8.3460198 27 12.5 C 27 16.65398 23.65398 20 19.5 20 C 15.34602 20 12 16.65398 12 12.5 C 12 8.3460198 15.34602 5 19.5 5 z" />
        </symbol>
      </svg> -->
      <!--/Search Form-->
    </div><!--end work-done-->                        

  </div><!--End row-->
</div><!--End container-->
</section><!--End banner-->



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
          <img src="<?php echo base_url() ?>css/home_page/img/mobile-banner/1.jpg" alt="First slide">
          <div class="carousel-caption">
           <img class="wow fadeIn" src="<?php echo base_url() ?>css/home_page/img/job-seekar-bg.png" alt="" title="" />
           <h3 class="wow bounceInLeft">Full Time <b>Job Seeker</b></h3>
           <button type="button" class="btn btn-default"><i class="material-icons md-36">search</i>&nbsp;<h2>Find Jobs</h2></button>
         </div>
       </div>

       <div class="item">
        <img src="<?php echo base_url() ?>css/home_page/img/mobile-banner/1.jpg" alt="Second slide">
        <div class="carousel-caption">
         <img class="wow fadeIn" src="<?php echo base_url() ?>css/home_page/img/freelancer-bg.png" alt="" title="" />                        
         <h3 class="wow bounceInLeft">Become a <b>Freelancer</b></h3>
         <button type="button" class="btn btn-default"><i class="material-icons md-36">search</i>&nbsp;<h2>Find Jobs</h2></button>
       </div>
     </div>

     <div class="item">
      <img src="<?php echo base_url() ?>css/home_page/img/mobile-banner/1.jpg" alt="Third slide">
      <div class="carousel-caption">
       <img class="wow fadeIn" src="<?php echo base_url() ?>css/home_page/img/job-provider-bg.png" alt="" title="" />                        
       <h3 class="wow bounceInLeft">Full Time <b>Job Provider</b></h3>
       <button type="button" class="btn btn-default"><i class="material-icons md-36">search</i>&nbsp;<h2>Find Jobs</h2></button>
     </div>
   </div>

   <div class="item">
    <img src="<?php echo base_url() ?>css/home_page/img/mobile-banner/1.jpg" alt="Third slide">
    <div class="carousel-caption">
     <img class="wow fadeIn" src="<?php echo base_url() ?>css/home_page/img/work-done-bg.png" alt="" title="" />                        
     <h3 class="wow bounceInLeft">Work Done with <b>Freelancer</b></h3>
     <button type="button" class="btn btn-default"><i class="material-icons md-36">search</i>&nbsp;<h2>Find Jobs</h2></button>
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
       <center><img class="what-dff-mob-set img-responsive" src="<?php echo base_url() ?>css/home_page/img/what-diff-1.png" alt="" title="" /></center>
       <h3 class="text-center wow fadeInDown animated">Curated Community</h3>
       <center><hr></center>
       <h5 class="text-center what-dff-mob-set">Headhunt top-notch freelance talent from a curated community of highly skilled, erudite professional.</h5>				
     </div>
     <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 what-diff-left-2">
      <h3 class="text-center wow fadeInDown animated">Work<br/> On-the-Go</h3>
      <center><hr></center>
      <h5 class="text-center what-dff-mob-set">Post requirements, discuss proposals, and collaborate with freelancers to get the work done on-the-go.</h5>
      <center><img class="what-dff-mob-set img-responsive" src="<?php echo base_url() ?>css/home_page/img/what-diff-2.png" alt="" title="" /></center>				
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 what-diff-left-3">
     <center><img class="what-dff-mob-set img-responsive" src="<?php echo base_url() ?>css/home_page/img/what-diff-3.png" alt="" title="" /></center>
     <h3 class="text-center wow fadeInDown animated">Reduced<br/> Cost</h3>
     <center><hr></center>
     <h5 class="text-center what-dff-mob-set">A platform like<br/> JobMandi<br/> helps reduce cost incurred in manually hiring full-time freelancers.</h5>				
   </div>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 what-diff-left-4">
    <h3 class="text-center wow fadeInDown animated">Find <br/>Right Skills</h3>
    <center><hr></center>
    <h5 class="text-center what-dff-mob-set">Find skilled local or remote experts for ongoing long-term, short-term or one-time projects.</h5>
    <center><img class="what-dff-mob-set img-responsive" src="<?php echo base_url() ?>css/home_page/img/what-diff-4.png" alt="" title="" /></center>				
  </div>                                               
</div><!--end what-diff-left-->

<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 latest-job" id="accordion" style="height: 600px;overflow-y: scroll;">
 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 latest-job-head" id="accordion" role="tablist" aria-multiselectable="true">
   <h3 data-parent="#accordion" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">Latest Jobs <span style="cursor:pointer;" class="pull-right mobile-set-plus"><i class="fa fa-caret-right"></i></span></h3>
 </div>


 <div id="collapse1" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 latest-job-listing-scroll div-collapse collapse" >
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


<section id="why-poject">
	<div class="container">
   <div class="row">       

     <div class="col-lg-6 extra-margin-2 circle-img-set-hide"><img class="img-responsive circle-img-set" src="<?php echo base_url() ?>css/home_page/img/why-find.png" alt="" title="" /></div>

     <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 why-proj-txt">

       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
         <div class="row">
           <h1 class="wow fadeInDown animated">Why Find Projects on JobMandi?</h1><hr>
         </div>
       </div>

       <div style="height:20px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>

       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 wow fadeInDown animated">

         <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">
           <img src="<?php echo base_url() ?>css/home_page/img/circle.png" alt="" title="" />
         </div>
         <div class="col-xs-3 col-sm-12 col-md-11 col-lg-11">
           <h3>Real-time Connect<br/><img src="<?php echo base_url() ?>css/home_page/img/solid.jpg" alt="" title="" /></h3>
           <h5>Fill details like skills, experience, interests, and get notified via email if a business is interested in your services.</h5>				</div> 

           <div style="height:30px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>

           <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">
             <img src="<?php echo base_url() ?>css/home_page/img/circle.png" alt="" title="" />
           </div>
           <div class="col-xs-3 col-sm-12 col-md-11 col-lg-11">
             <h3>Get Noticed &amp; Hired<br/><img src="<?php echo base_url() ?>css/home_page/img/solid.jpg" alt="" title="" /></h3>
             <h5>Create an online portfolio to connect with thousands of enthusiastic 
             businesses interested in hiring people like you.</h5>				
           </div>

           <div style="height:30px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>

           <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">
             <img src="<?php echo base_url() ?>css/home_page/img/circle.png" alt="" title="" />
           </div>
           <div class="col-xs-12 col-sm-3 col-md-11 col-lg-11">
             <h3>Keep Your Quote<br/><img src="<?php echo base_url() ?>css/home_page/img/solid.jpg" alt="" title="" /></h3>
             <h5>Unlike other sites, JobMandi allows you to keep 100% earnings. You get full payment for your hard work and skills you showcase.</h5>				
           </div>

           <div style="height:30px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>

           <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">
             <img src="<?php echo base_url() ?>css/home_page/img/circle.png" alt="" title="" />
           </div>
           <div class="col-xs-12 col-sm-3 col-md-11 col-lg-11">
             <h3>Work Your Way<br/><img src="<?php echo base_url() ?>css/home_page/img/solid.jpg" alt="" title="" /></h3>
             <h5>Whether you’re a writer, coder, or designer to collaborate with 
             clients the way you want in your free time.</h5>				
           </div>                                                                         

         </div><!--end col-lg-12-->

       </div><!--End why-proj-txt-->

     </div><!--End row-->
   </div><!--End container-->
 </section><!--End why-poject--> 



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
           <center><img src="<?php echo base_url() ?>css/home_page/img/circle.png" alt="" title="" /></center>
           <h3>Real-time Connect<br/><img src="<?php echo base_url() ?>css/home_page/img/solid.jpg" alt="" title="" /></h3>
         </div> 



         <div class="col-xs-3 col-sm-12 col-md-11 col-lg-11 wow fadeInDown animated">
           <center><img src="<?php echo base_url() ?>css/home_page/img/circle.png" alt="" title="" /></center>
           <h3>Get Noticed &amp; Hired<br/><img src="<?php echo base_url() ?>css/home_page/img/solid.jpg" alt="" title="" /></h3>
         </div>


         <div class="col-xs-3 col-sm-3 col-md-11 col-lg-11 wow fadeInDown animated">
          <center><img src="<?php echo base_url() ?>css/home_page/img/circle.png" alt="" title="" /></center>                    
          <h3>Keep Your Quote<br/><img src="<?php echo base_url() ?>css/home_page/img/solid.jpg" alt="" title="" /></h3>
        </div>


        <div class="col-xs-3 col-sm-3 col-md-11 col-lg-11 wow fadeInDown animated">
          <center><img src="<?php echo base_url() ?>css/home_page/img/circle.png" alt="" title="" /></center>                    
          <h3>Work Your Way<br/><img src="<?php echo base_url() ?>css/home_page/img/solid.jpg" alt="" title="" /></h3>
        </div>                                                                         



      </div><!--End why-proj-txt-->

    </div><!--End row-->
  </div><!--End container-->
</section><!--End why-poject-mob-->


<section id="service-we-offer">
	<div class="container">
   <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <h1 class="text-center wow fadeInDown animated">Service we offer</h1><hr>
    </div> 

    <div style="height:40px;" class="col-lg-12">&nbsp;</div>

    <div class="col-lg-2 wow fadeInDown animated">
     <center><img class="img-responsive" src="<?php echo base_url() ?>css/home_page/img/services-1.png" alt="" title="" /></center>
     <h4 class="text-center">For All<br/>Companies</h4>
     <center><img src="<?php echo base_url() ?>css/home_page/img/black.jpg" alt="" title="" /></center>
     <h5 class="text-justify">Companies from any industrial segments can hire diverse part-time and freelance talents for their all-important project</h5>
   </div>

   <div class="col-lg-2 border-right wow fadeInDown animated">
     <center><img class="img-responsive" src="<?php echo base_url() ?>css/home_page/img/services-2.png" alt="" title="" /></center>
     <h4 class="text-center">Create & <br/> &amp; Share Profile</h4>
     <center><img src="<?php echo base_url() ?>css/home_page/img/black.jpg" alt="" title="" /></center>
     <h5 class="text-justify">Freelancers can create and share their profile to connect with fervent businesses interested in hiring keen talent.</h5>
   </div>

   <div class="col-lg-2 border-right wow fadeInDown animated">
     <center><img class="img-responsive" src="<?php echo base_url() ?>css/home_page/img/services-3.png" alt="" title="" /></center>
     <h4 class="text-center">Say No &amp;<br/>to Less</h4>
     <center><img src="<?php echo base_url() ?>css/home_page/img/black.jpg" alt="" title="" /></center>
     <h5 class="text-justify">Why settle for less? Don’t compromise. Hire the right talent. Plus, freelancers get an opportunity to earn what they are worth.</h5>
   </div>


   <div class="col-lg-2 border-right wow fadeInDown animated">
     <center><img class="img-responsive" src="<?php echo base_url() ?>css/home_page/img/services-4.png" alt="" title="" /></center>
     <h4 class="text-center">No Commissions,<br/> No Cuts</h4>
     <center><img src="<?php echo base_url() ?>css/home_page/img/black.jpg" alt="" title="" /></center>
     <h5 class="text-justify">Unlike other sites, JobMandi allows you to keep 100% earnings. You get full payment for your hard work and skills you showcase</h5>
   </div>


   <div class="col-lg-2 border-right wow fadeInDown animated">
     <center><img class="img-responsive" src="<?php echo base_url() ?>css/home_page/img/services-5.png" alt="" title="" /></center>
     <h4 class="text-center">Global &amp;<br/>Exposure</h4>
     <center><img src="<?php echo base_url() ?>css/home_page/img/black.jpg" alt="" title="" /></center>
     <h5 class="text-justify">Harness high demand skills to become work-ready and gain valuable experience by working with clients from across the globe.</h5>
   </div>

   <div class="col-lg-2 border-right wow fadeInDown animated">
     <center><img class="img-responsive" src="<?php echo base_url() ?>css/home_page/img/services-6.png" alt="" title="" /></center>
     <h4 class="text-center">Unlimited<br/>Opportunities</h4>
     <center><img src="<?php echo base_url() ?>css/home_page/img/black.jpg" alt="" title="" /></center>
     <h5 class="text-justify">No limits on site usage means freelancers aren't investing a dime while earning. Search and bid on as many jobs as they wish.</h5>
   </div>                                                                                       	

 </div><!--End row-->
</div><!--End container-->
</section><!--End service-we-offer--> 



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
                <img src="<?php echo base_url() ?>css/home_page/img/service-icon1.png" alt="" title="" /></center>For All Companies</h4>
                <center><img src="<?php echo base_url() ?>css/home_page/img/black.jpg" alt="" title="" /></center>
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
                <img src="<?php echo base_url() ?>css/home_page/img/service-icon2.png" alt="" title="" /></center>Create & Share Profile</h4>
                <center><img src="<?php echo base_url() ?>css/home_page/img/black.jpg" alt="" title="" /></center>
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
                <img src="<?php echo base_url() ?>css/home_page/img/service-icon3.png" alt="" title="" /></center>Say No to Less</h4>
                <center><img src="<?php echo base_url() ?>css/home_page/img/black.jpg" alt="" title="" /></center>
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
                <img src="<?php echo base_url() ?>css/home_page/img/service-icon4.png" alt="" title="" /></center>No Cuts, No Commissions</h4>
                <center><img src="<?php echo base_url() ?>css/home_page/img/black.jpg" alt="" title="" /></center>
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
                <img src="<?php echo base_url() ?>css/home_page/img/service-icon5.png" alt="" title="" /></center>Global Exposure</h4>
                <center><img src="<?php echo base_url() ?>css/home_page/img/black.jpg" alt="" title="" /></center>
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
                <img src="<?php echo base_url() ?>css/home_page/img/service-icon6.png" alt="" title="" /></center>Unlimited Opportunities</h4>
                <center><img src="<?php echo base_url() ?>css/home_page/img/black.jpg" alt="" title="" /></center>
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
     <img class="<?php echo base_url() ?>css/home_page/img-responsive wow fadeInLeft animated" src="<?php echo base_url() ?>css/home_page/img/how-it-works.png" alt="" title="" />
   </div>         	
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><h4 class="text-center wow fadeInDown animated">Post Work Details</h4></div>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><h4 class="text-center wow fadeInDown animated">Find & Explore</h4></div>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><h4 class="text-center wow fadeInDown animated">Hire Inspiring Talent</h4></div>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><h4 class="text-center wow fadeInDown animated">Approve Work & Pay</h4></div>                                    

 </div><!--End row-->
</div><!--End container-->
</section><!--End how-it-work-->


<section id="number-counter">
	<div class="container">
   <div class="row">        

     <div class="col-lg-4 text-center wow flipInX animated">
       <h1><?php echo $projects;?>+</h1><br/>
       <h3><img src="<?php echo base_url() ?>css/home_page/img/brifcase.png" alt="" title="" />&nbsp;&nbsp;NO. OF PROJECTS</h3>
     </div>

     <div class="col-lg-4 text-center wow flipInX animated">
       <h1><?php echo $jobcount; ?>+</h1><br/>
       <h3><img src="<?php echo base_url() ?>css/home_page/img/jobs.png" alt="" title="" />&nbsp;&nbsp;NO. OF jOBS</h3>
     </div>

     <div class="col-lg-4 text-center wow flipInX animated">
       <h1>10,000+</h1><br/>
       <h3><img src="<?php echo base_url() ?>css/home_page/img/category.png" alt="" title="" />&nbsp;&nbsp;CATEGORIES</h3>
     </div>                        

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
                 <h1 class="text-center number-counter-mob-green">5,00,000+</h1>
                 <h4 style="font-weight:400;" class="text-center white-text"><img src="<?php echo base_url() ?>css/home_page/img/brifcase.png" /> NO. OF PROJECTS</h4>
               </div>
             </div>
           </blockquote>
         </div>

         <!-- Quote 1 -->
         <div class="item">
          <blockquote>
            <div class="row">
              <div class="col-xs-12">
               <h1 class="text-center number-counter-mob-green">75,000+</h1>
               <h4 style="font-weight:400;" class="text-center white-text"><img src="<?php echo base_url() ?>css/home_page/img/jobs.png" /> NO. OF JOBS</h4>
             </div>
           </div>
         </blockquote>
       </div>

       <!-- Quote 1 -->
       <div class="item">
        <blockquote>
          <div class="row">
            <div class="col-xs-12">
             <h1 class="text-center number-counter-mob-green">1,000+</h1>
             <h4 style="font-weight:400;" class="text-center white-text"><img src="<?php echo base_url() ?>css/home_page/img/category.png" /> NO. OF CATEGORIES</h4>
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
                <center><img class="img-circle-mob-set img-circle" src="<?php echo base_url() ?>css/home_page/img/profile.png" ></center>

              </div>
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
               <img class="quote-mob-set" style="width:53px; height:45px;" src="<?php echo base_url() ?>css/home_page/img/quote.jpg" alt="" title="" />
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
              <center><img class="img-circle-mob-set img-circle" src="<?php echo base_url() ?>css/home_page/img/profile.png" ></center>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
              <img class="quote-mob-set" style="width:53px; height:45px;" src="<?php echo base_url() ?>css/home_page/img/quote.jpg" alt="" title="" />
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
              <center><img class="img-circle-mob-set img-circle" src="<?php echo base_url() ?>css/home_page/img/profile.png" ></center>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
              <img class="quote-mob-set" style="width:53px; height:45px;" src="<?php echo base_url() ?>css/home_page/img/quote.jpg" alt="" title="" />
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


<div id="cometchat_embed_synergy_container" style="width:350px;height:420px;max-width:100%;border:1px solid #CCCCCC;border-radius:5px;overflow:hidden;" ></div><script src="//fast.cometondemand.net/50319x_x3a1bcx_xcorex_xembedcode.js" type="text/javascript"></script><script>var iframeObj = {};iframeObj.module="synergy";iframeObj.style="min-height:420px;min-width:350px;";iframeObj.width="350px";iframeObj.height="420px";iframeObj.src="//50319.cometondemand.net/cometchat_embedded.php"; if(typeof(addEmbedIframe)=="function"){addEmbedIframe(iframeObj);}</script>

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
<!--               <li><a style="color: #868686;line-height: 24px;text-transform: uppercase;font-size: 12px;" href="<?php echo base_url(); ?>content/Sitemap_control">SITEMAP</a></li>
-->              <li><a style="color: #868686;line-height: 24px;text-transform: uppercase;font-size: 12px;" href="<?php echo base_url(); ?>content/Contact_us">CONTACT US</a></li>
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
                <script type="text/javascript" src="<?php echo base_url() ?>css/home_page/js/jquery.min.js"></script>

                <!-- Bootstrap core JavaScript -->
                <script type="text/javascript" src="<?php echo base_url() ?>css/home_page/js/bootstrap.min.js"></script>

                <!-- Material Design Bootstrap -->
                <script type="text/javascript" src="<?php echo base_url() ?>css/home_page/js/mdb.js"></script>

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


             <link rel="stylesheet" href="<?php echo base_url() ?>css/home_page/css/animate.css">    
             <script src="<?php echo base_url() ?>css/home_page/js/wow.min.js"></script>
             <script>
              wow = new WOW(
              {
                animateClass: 'animated',
                offset:       200
              }
              );
              wow.init();
            </script>     




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
          </body>

          </html>