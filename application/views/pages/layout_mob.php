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
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/mobile.css">

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
    <div class="w3-row">
        <div class="w3-container">
            <div class="w3-col l12">
                <div class="w3-col l6 s6 m6 w3-padding-top w3-padding-tiny">
                    <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>images/desktop/logo-main.png" alt="JobMandi"></a>
                </div>
                <div class="w3-col l6 s6 m6 w3-text-black">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class=" w3-circle w3-text-grey fa fa-bars"></span>
                    </button>
                    <div class="w3-col l12 collapse navbar-collapse navbar-right w3-black w3-text-white">
                        <ul class="nav navbar-nav w3-small w3-center">
                            <li class="scroll"><a href="<?php echo base_url(); ?>content/about_us">About JobMandi </a></li>
                            <!--                <li class="scroll"><a href="#">How it works </a></li>-->
                            <!--                <li class="scroll"><a href="">Blog</a></li>-->
                            <li class="scroll"><a href="<?php echo base_url(); ?>project/project_listing">Explore Projects</a></li>
                            <li class="scroll"><a href="<?php echo base_url(); ?>jobseeker/jobseeker_lists">Explore Jobs</a></li>
                            <li class="scroll"><a href="<?php echo base_url(); ?>project/post_project_Controller">Post Project</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="w3-col l12 s12 m12 loginDiv w3-margin-top w3-padding">
                <div class="w3-col l6 s6 m6 w3-small  w3-text-white w3-center">
                    <a class="w3-center" href="<?php echo base_url(); ?>auth/login">Login</a>
                </div>
                <div class="w3-col l6 s6 m6 w3-small w3-text-white w3-center">
                    <a class="w3-center" href="<?php echo base_url(); ?>auth/login">Sign Up</a>
                </div>
            </div>



            <div class="w3-col l12 s12 m12 w3-margin-top">
                <div class="w3-col l3 s3 m3  w3-text-white w3-center w3-padding-tiny">
                    <div class="w3-col l12 w3-card w3-padding-small" style=" height: 90px; padding-right: 3px; ">
                        <a href="<?php echo base_url(); ?>auth/login?profile=3" class="">
                            <img height="35px" src="<?php echo base_url(); ?>images/mobile_images/employee_1.png" class="">
                        </a>
                        <div class="w3-text-black w3-tiny w3-margin-top">
                            <center><b>Job Seekers</b></center>
                        </div>
                    </div>
                </div>
                <div class="w3-col l3 s3 m3 w3-text-white w3-center w3-padding-tiny" >
                    <div class="w3-col l12 w3-card w3-padding-small" style=" height: 90px; padding-right: 3px; ">
                        <a href="<?php echo base_url(); ?>job/post_jobs">
                            <img height="35px" src="<?php echo base_url(); ?>images/mobile_images/employee.png" class="">
                        </a>
                        <div class="w3-text-black w3-tiny w3-margin-top">
                            <b>Job Employer</b>
                        </div>
                    </div>
                </div>
                <div class="w3-col l3 s3 m3 w3-text-white w3-center w3-padding-tiny" >
                    <div class="w3-col l12 w3-card w3-padding-small" style=" height: 90px; padding-right: 3px; ">
                        <a href="<?php echo base_url(); ?>auth/login?profile=1">
                            <img height="35px" src="<?php echo base_url(); ?>images/mobile_images/loupe.png" class="">
                        </a>
                        <div class="w3-text-black w3-tiny w3-margin-top">
                            <b>Find Work</b>
                        </div>
                    </div>
                </div>
                <div class="w3-col l3 s3 m3 w3-text-white w3-center w3-padding-tiny">
                    <div class="w3-col l12 w3-card w3-padding-small" style=" height: 90px; padding-right: 3px;">
                        <a href="<?php echo base_url(); ?>project/post_project_Controller">
                            <img height="45px" src="<?php echo base_url(); ?>images/mobile_images/handshake.png" class="">
                        </a>
                        <div class="w3-text-black w3-tiny w3-padding-top">
                            <b>Post Project</b>
                        </div>
                    </div>
                </div>
            </div>


            <div class="w3-col l12 s12 m12 w3-margin-top w3-margin-bottom w3-small">
                <a class="w3-round-xxlarge btn btn-block w3-center" id="applyJob" name="applyJob" href="" style="background-color: #02b28b;"><span class="w3-medium " style="align:center; font-weight:normal">
                    <label class="w3-text-white w3-small" style="margin-left:40px">Latest Jobs</label>
                    <i id="ltJob_sym" class="fa fa-chevron-circle-right w3-xlarge w3-right" style="padding:0px 8px"></i></a>

                    <div class="w3-col l12">
                        <div id="latestJob_div" style="display:none;">
                           <?php
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
                                <?php }} ?>

                            </div>
                        </div>                        
                    </div>
                    <script>
                        $('#applyJob').click(function(){
                            $("#latestJob_div").slideToggle();
                            return false;
                        });
                    </script>

                    <div class="w3-col l12 s12 m12 w3-margin-top w3-margin-bottom w3-padding-top w3-padding-bottom" style=" background-color: #eeeeee;">
                        <div class="w3-col l12 s12 m12 w3-center w3-margin-bottom">
                            <span style=" font-size: 15px;">What's Different</span>
                        </div>
                        <div class="w3-col l3 s3 m3 w3-padding-tiny">
                            <div class="w3-col l12 s12 m12 w3-round" style=" height: 70px; padding-right: 3px; background-color: #c6c6c6;">
                                <div class="">                                
                                </div>
                                <div class="w3-text-black w3-center w3-tiny w3-margin-top" style="">
                                    Curated Community
                                    <!--                                <p class="w3-margin-top w3-padding w3-tiny">Headhunt top-notch freelance talent from a curated community of highly skilled, erudite professional.</p></div>-->
                                </div>
                            </div>
                        </div>
                        <div class="w3-col l3 s3 m3 w3-padding-tiny">
                            <div class="w3-col l12 s12 m12 w3-round" style=" height: 70px; padding-right: 3px; background-color: #c6c6c6;">
                                <div class="">                                
                                </div>
                                <div class="w3-text-black w3-center w3-tiny w3-margin-top" style="">
                                    Work<br>On-the-Go
                                    <!--                                <p class="w3-margin-top w3-padding w3-tiny">Post requirements, discuss proposals, and collaborate with freelancers to get the work done on-the-go.</p>-->
                                </div>
                            </div>
                        </div>
                        <div class="w3-col l3 s3 m3 w3-padding-tiny ">
                            <div class="w3-col l12 s12 m12 w3-round" style=" height: 70px; padding-right: 3px; background-color: #c6c6c6;">
                                <div class="">                                
                                </div>
                                <div class="w3-text-black w3-center w3-tiny w3-margin-top" style="">
                                    Reduced Cost
                                    <!--                                <p class="w3-margin-top w3-padding w3-tiny">A platform like JobMandi helps reduce cost incurred in manually hiring full-time freelancers.</p>-->
                                </div>
                            </div>
                        </div>
                        <div class="w3-col l3 s3 m3 w3-padding-tiny ">
                            <div class="w3-col l12 s12 m12 w3-round" style=" height: 70px; padding-right: 3px; background-color: #c6c6c6;">
                                <div class="">                                
                                </div>
                                <div class="w3-text-black w3-center w3-tiny w3-margin-top" style="">
                                    Find Right Skills
                                    <!--                                <p class="w3-margin-top w3-padding w3-tiny">Find skilled local or remote experts for ongoing long-term, short-term or one-time projects. </p>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="w3-col l12 s12 m12 w3-margin-top" style=" background-color: #1ebea4">
                        <center><div class="w3-col l12 l12 s12 m12 w3-padding-top w3-padding-bottom w3-center">
                            <span class="w3-center w3-text-white">Service We Offer</span>
                        </div>
                    </center>

                    <div class="w3-col l12 s12 m12 w3-text-white services" style=" height: 170px;">

                        <div class="carousel slide" data-ride="carousel" id="quote-carousel">

                            <div class="carousel-inner " role="listbox">
                                <div class="item active w3-card-2 div1">
                                    <div class=" w3-col l12">
                                        <div class=" w3-small w3-center">
                                            <b>BigWig Developers</b>
                                            <p class="w3-margin-bottom">Find bigwig developers possessing amazing programming skills, ready to work on your development project.'</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="item w3-card-2 div2">
                                    <div class="w3-col l12 ">
                                        <div class="w3-small w3-center">
                                            <b>Wunderkind Designers</b> 
                                            <p>Hire whiz craft graphic designers and creative professional that are always updated with recent designing trends.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="item w3-card-2 div3">
                                    <div class=" w3-col l12">
                                        <div class="w3-small w3-center">
                                            <b>Ingenious Writers</b>
                                            <p>Browse our database to find writers that indulging in ecstasy of literary art of creation through words and mind-blowing narration.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="item w3-card-2 div4">
                                    <div class=" w3-col l12">
                                        <div class=" w3-small w3-center">
                                            <b>Digital Marketing Peeps</b>
                                            <p>Leverage knowledge & skills of enthusiastic online marketers, experts, & professionals to enhance visibility & online business.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="item w3-card-2 div5">
                                    <div class=" w3-col l12">
                                        <div class=" w3-small w3-center">
                                            <b>Quick-witted Marketers</b> 
                                            <p>Hire marketers and sales representative that are quick-witted and skilled to fulfil the demands of your growing business. </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="item w3-card-2 div6">
                                    <div class=" w3-col l12">
                                        <div class=" w3-small w3-center">
                                            <b>Resourceful Mobile Apps</b>
                                            <p>Now the businesses are focusing on becoming mobile-centric. Collaborate with android & IOS app developers now.</p>
                                        </div>
                                    </div>
                                </div>
                            </div> 

                            <a data-slide="prev" href="#quote-carousel" class="left carousel-control"></a>
                            <a data-slide="next" href="#quote-carousel" class="right carousel-control"></a>
                        </div>                          
                    </div>
                </div>
                
                    <!--  <div class=" w3-col s12 w3-small w3-center w3-margin-top w3-padding"  >
                         <span style="color:#24b8a0 ;font-size:15px"><b><i>#SayNoToLess</i></b> </span>
                        <p style="text-align: justify;"><span style="font-size: x-small;">Settling for something less than desired is a constant conversation topic within an organization, business groups, and individuals.</span></p>
                        <p style="text-align: justify;"><span style="font-size: x-small;"><strong>&ldquo;Say No to Less&rdquo;</strong>, is a campaign launched with a vision that aims to inspire individuals and organisations to strive for excellence.The message is very clear, if you are a </span></p>
                        <p style="text-align: justify;"><span style="font-size: x-small;">&bull; Job seeker or Freelancers- Say No to Low Payments</span></p>
                        <p style="text-align: justify;"><span style="font-size: x-small;">&bull; Organization- Say No to Ordinary, Moderate, or Barely</span></p>
                    </div> -->
                    
                    
                    
                    <div class="w3-col l12 s12 m12 w3-margin-top w3-margin-bottom w3-padding-top w3-padding-bottom w3-padding-left" style=" background-color: #EEEEEE;">
                        <div class="w3-col l12 s12 m12 w3-center w3-margin-bottom">
                            <span>How it works?</span>
                        </div>
                        <div style="background-repeat: no-repeat;background-attachment: fixed;background-image: url(images/desktop/dotted_new.png);z-index: 9999;">
                            <div class="w3-col l12 s12 m12 marks">
                                <div class="w3-col l3 s3 m3 w3-padding-tiny">
                                    <div class="w3-col l12 s12 m12" style=" height: auto;">
                                        <div class="circle"><img width="25px" class="w3-margin-top w3-margin-bottom postproject" title="Post project" src="<?php echo base_url(); ?>images/desktop/image21.png" style=" margin-top: 0px; margin-left: 11px;"></div>                                
                                        <div><center><span class="w3-tiny w3-padding-top"><b style="">Post Project</b></span></center></div>
                                    </div>
                                </div>
                                <div class="w3-col l3 s3 m3 w3-padding-tiny">
                                    <div class="w3-col l12 s12 m12" style=" height: auto; ">
                                        <div class="circle1 w3-white"><img width="25px" class="w3-margin-top postproject w3-margin-bottom" title="Post project" src="<?php echo base_url(); ?>images/desktop/image22.png" style=" margin-top: -2px; margin-left: 13px;"></div>                                
                                        <div style=""><center><span class="w3-tiny w3-padding-top"><b>Find & Hire</b></span></center></div>
                                    </div>
                                </div>
                                <div class="w3-col l3 s3 m3 w3-padding-tiny">
                                    <div class="w3-col l12 s12 m12" style=" height: auto; ">
                                        <div class="circle2 w3-white"><img width="25px" class="w3-margin-top postproject w3-margin-bottom" title="Post project" src="<?php echo base_url(); ?>images/desktop/image23.png" style=" margin-top: 0px; margin-left: 13px;"></div>                                
                                        <div><center><span class="w3-tiny w3-padding-top"><b>Award & Pay</b></span></center></div>
                                    </div>
                                </div>
                                <div class="w3-col l3 s3 m3 w3-padding-tiny">
                                    <div class="w3-col l12 s12 m12" style=" height: auto; ">
                                        <div class="circle3 w3-white"><img width="25px" class="w3-margin-top postproject w3-margin-bottom" title="Post project" src="<?php echo base_url(); ?>images/desktop/image24.png" style=" margin-top: 0px; margin-left: 12px;"></div>                                
                                        <div><center><span class="w3-tiny w3-padding-top"><b>Work & Approve</b></span></center></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!------------------------------------------------------------------------------------------------------------------
                <div>
                    <div class="w3-col l12 s12 m12 w3-margin-top" style=" background-color: black">

                        <div class="w3-col l12 s12 m12 w3-text-white" style=" height: 180px;">

                            <div class="carousel slide" data-ride="carousel" id="quote-carouselnew">

                                <div class="carousel-inner " role="listbox">
                                    <div class="item active">
                                        <div class=" w3-col l12">
                                            <div class=" w3-small w3-center">
                                                <div class="">
                                                    <h1 class=" w3-text-white w3-margin-top w3-padding-top"><?php echo $projects; ?>+</h1>
                                                </div>
                                                <div class="w3-text-white w3-margin-top w3-padding-top">
                                                    <img width="50px" src="<?php echo base_url(); ?>images/desktop/image29.png" >
                                                    <span style="margin: auto;"> No Of Projects</span>
                                                </div>                                        
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item ">
                                        <div class="w3-col l12 ">
                                            <div class="w3-small w3-center">
                                                <div class="">
                                                    <h1 class=" w3-text-white w3-margin-top w3-padding-top"><?php echo $jobcount; ?>+</h1>
                                                </div>
                                                <div class="w3-col l12 w3-margin-top w3-padding-top">
                                                    <img width="50px" src="<?php echo base_url(); ?>images/desktop/image30.png">
                                                    <span  style="padding-top: 2px;"> No Of Jobs</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class=" w3-col l12">
                                            <div class="w3-small w3-center">
                                                <div class="">
                                                    <h1 class=" w3-text-white w3-margin-top w3-padding-top">00+</h1>
                                                </div>
                                                <div class="w3-col l12 w3-margin-top w3-padding-top">
                                                    <img width="50px" src="<?php echo base_url(); ?>images/desktop/image31.png">
                                                    <span class="" style="padding-top: 2px;"> Categories</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <a data-slide="prev" href="#quote-carouselnew" class="left carousel-control"></a>
                                <a data-slide="next" href="#quote-carouselnew" class="right carousel-control"></a>
                            </div>                          
                        </div>
                    </div>  
                </div>
                <!---------------------------------------------------------------------------------------------------------------------------->
                <div class="w3-col l12 m12 s12">
                    <div w3-col l12 s12 m12>
                        <div></div>
                    </div>
                </div>
                <!------------------------------------------------------------------------------------------------------------------------>
                <div class="w3-col l12 s12 m12 w3-margin-top">
                    <div class="w3-col l12 s12 m12">
                        <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                            <!-- Bottom Carousel Indicators -->
                            <ol class="carousel-indicators w3-margin-bottom w3-tiny">
                                <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
                                <li data-target="#quote-carousel" data-slide-to="1"></li>
                                <li data-target="#quote-carousel" data-slide-to="2"></li>
                                <li data-target="#quote-carousel" data-slide-to="3"></li>
                                <li data-target="#quote-carousel" data-slide-to="4"></li>
                                <li data-target="#quote-carousel" data-slide-to="5"></li>
                            </ol>

                            <!-- Carousel Slides / Quotes -->
                            <div class="carousel-inner " role="listbox">
                                <div class="item active">
                                    <blockquote>
                                        <div class="row">
                                            <div class="text-center">
                                                <img class="img-circle" src="<?php echo base_url(); ?>images/desktop/image10.png" style="width: 100px;height:100px;">
                                                <!-- <img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/128.jpg" style="width: 100px;height:100px;"> -->
                                            </div>
                                            <div class=" w3-small">
                                                <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit!</p>
                                                <small style="color:#02b28b">Erik Allbest</small>
                                                <small style="color:#02b28b">CEO & Founder,Chess.com</small>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="item">
                                    <blockquote>
                                        <div class="row">
                                            <div class=" text-center">
                                                <img class="img-circle" src="<?php echo base_url(); ?>images/desktop/image10.png" style="width: 100px;height:100px;">
                                                <!-- <img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/128.jpg" style="width: 100px;height:100px;"> -->
                                            </div>
                                            <div class="w3-small">
                                                <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit!</p>
                                                <small style="color:#02b28b">Erik Allbest</small>
                                                <small style="color:#02b28b">CEO & Founder,Chess.com</small>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="item">
                                    <blockquote>
                                        <div class="row">
                                            <div class=" text-center">
                                                <img class="img-circle" src="<?php echo base_url(); ?>images/desktop/image10.png" style="width: 100px;height:100px;">
                                                <!-- <img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/128.jpg" style="width: 100px;height:100px;"> -->
                                            </div>
                                            <div class="w3-small">
                                                <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit!</p>
                                                <small style="color:#02b28b">Erik Allbest</small>
                                                <small style="color:#02b28b">CEO & Founder,Chess.com</small>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="item">
                                    <blockquote>
                                        <div class="row">
                                            <div class=" text-center">
                                                <img class="img-circle" src="<?php echo base_url(); ?>images/desktop/image10.png" style="width: 100px;height:100px;">
                                                <!-- <img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/128.jpg" style="width: 100px;height:100px;"> -->
                                            </div>
                                            <div class=" w3-small">
                                                <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit!</p>
                                                <small style="color:#02b28b">Erik Allbest</small>
                                                <small style="color:#02b28b">CEO & Founder,Chess.com</small>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="item">
                                    <blockquote>
                                        <div class="row">
                                            <div class=" text-center">
                                                <img class="img-circle" src="<?php echo base_url(); ?>images/desktop/image10.png" style="width: 100px;height:100px;">
                                                <!-- <img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/128.jpg" style="width: 100px;height:100px;"> -->
                                            </div>
                                            <div class=" w3-small">
                                                <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit!</p>
                                                <small style="color:#02b28b">Erik Allbest</small>
                                                <small style="color:#02b28b">CEO & Founder,Chess.com</small>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>                
                            </div> 

                            <!-- Carousel Buttons Next/Prev  -->
                            <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
                            <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
                        </div>                          
                    </div>
                </div>

                <!--------------------------------------------------------------------------------------------------------------------------------->
                <div class="w3-col l12 w3-margin-top w3-padding w3-center w3-black">
                    <div class="w3-col l12 w3-tiny w3-center w3-padding-bottom">
                        <span style="color: #02b28b">FOLLOW US ON</span>
                    </div>
                    <div class="w3-col l2 s2">
                        <i class="fa fa-facebook"></i>
                    </div>
                    <div class="w3-col l2 s2">
                        <i class="fa fa-google-plus"></i>

                    </div>
                    <div class="w3-col l2 s2">
                        <i class="fa fa-linkedin"></i>

                    </div>
                    <div class="w3-col l2 s2">
                        <i class="fa fa-pinterest-p"></i>

                    </div>
                    <div class="w3-col l2 s2">
                        <i class="fa fa-twitter"></i>

                    </div>
                    <div class="w3-col l2 s2">
                        <i class="fa fa-facebook"></i>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script>
    $('.postproject').tipso({
        position: 'top',
        width: 200,
        titleContent: 'Let us know your project or job requirements. We’ll instantly connect you with competent & skilled professionals..!',
        background: '#F8F8F8',
        titleBackground: '#F8F8F8',
        color: '#000000',
        titleColor: '#00B59D',
        size: 'small'
    });
    $('.Find_Hire').tipso({
        position: 'top',
        width: 200,
        titleContent: 'Search our curated community, receive proposals & browse previous works of exceptional talents and work reviews..!',
        background: '#F8F8F8',
        titleBackground: '#F8F8F8',
        color: '#000000',
        titleColor: '#00B59D',
        size: 'small'
    });
    $('.award_Pay').tipso({
        position: 'top',
        width: 200,
        titleContent: 'Arrange an interview to find the right match for your project needs. Create a team of awesome peeps to up-scale your project.',
        background: '#F8F8F8',
        titleBackground: '#F8F8F8',
        color: '#000000',
        titleColor: '#00B59D',
        size: 'small'
    });
    $('.workApprove').tipso({
        position: 'top',
        width: 200,
        titleContent: 'Once, the job is assigned check if they have delivered the work as per your expectation. Pay after you approve it...!',
        background: '#F8F8F8',
        titleBackground: '#F8F8F8',
        color: '#000000',
        titleColor: '#00B59D',
        size: 'small'
    });




//    $('.div1').tipso({
//        position: 'top',
//        width: 200,
//        titleContent: 'Find bigwig developers possessing amazing programming skills, ready to work on your development project.',
//        background: '#F8F8F8',
//        titleBackground: '#F8F8F8',
//        color: '#000000',
//        titleColor: '#00B59D' 
//    });
//    $('.div2').tipso({
//         position: 'top',
//        width: 200,
//        titleContent: 'Hire whiz craft graphic designers and creative professional that are always updated with recent designing trends.',
//        background: '#F8F8F8',
//        titleBackground: '#F8F8F8',
//        color: '#000000',
//        titleColor: '#00B59D'
//    });
//    $('.div3').tipso({
//         position: 'top',
//        width: 200,
//        titleContent: 'Browse our database to find writers that indulging in ecstasy of literary art of creation through words and mind-blowing narration.',
//        background: '#F8F8F8',
//        titleBackground: '#F8F8F8',
//        color: '#000000',
//        titleColor: '#00B59D'
//    });
//    $('.div4').tipso({
//        position: 'top',
//        width: 200,
//        titleContent: 'Leverage knowledge & skills of enthusiastic online marketers, experts, & professionals to enhance visibility & online business.',
//        background: '#F8F8F8',
//        titleBackground: '#F8F8F8',
//        color: '#000000',
//        titleColor: '#00B59D' 
//    });
//    $('.div5').tipso({
//        position: 'top',
//        width: 200,
//        titleContent: 'Hire marketers and sales representative that are quick-witted and skilled to fulfil the demands of your growing business. ',
//        background: '#F8F8F8',
//        titleBackground: '#F8F8F8',
//        color: '#000000',
//        titleColor: '#00B59D' 
//    });
//    $('.div6').tipso({
//         position: 'top',
//        width: 200,
//        titleContent: 'Now the businesses are focusing on becoming mobile-centric. Collaborate with android & IOS app developers now.',
//        background: '#F8F8F8',
//        titleBackground: '#F8F8F8',
//        color: '#000000',
//        titleColor: '#00B59D'
//    });
</script>
<script>
    $(document).ready(function () {
        $(".carousel").swipe({

            swipe: function (event, direction, distance, duration, fingerCount, fingerData) {

                if (direction == 'left')
                    $(this).carousel('next');
                if (direction == 'right')
                    $(this).carousel('prev');

            },
            allowPageScroll: "vertical"

        });
    });
</script>
