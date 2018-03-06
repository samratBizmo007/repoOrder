<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
error_reporting(E_ERROR | E_PARSE);
$user_name=$this->session->userdata('user_name');

$profile_type=$this->session->userdata('profile_type');
// /echo $profile_type;
?>
<!DOCTYPE html>
<html>
<head>
  <style type="text/css">

  .alert{
    margin-bottom: 0px !important; 
  }
  
</style>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css">
<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css"> -->
<link rel="stylesheet" href="<?php echo base_url(); ?>css/alert/jquery-confirm.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/header/header_overlay.css">
<!--   <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
-->
</head>

 <!-- Material Design Bootstrap -->
<!--   <link href="<?php echo base_url() ?>css/home_page/css/mdb.css" rel="stylesheet">
 -->  <link href="<?php echo base_url() ?>css/home_page/css/style.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>css/alert/jquery-confirm.js"></script>
<style>
.header_div{
  -webkit-box-shadow: 0 4px 10px -6px #222;
  -moz-box-shadow: 0 4px 10px -6px #222;
  box-shadow: 0 4px 10px -6px #222;
}

.btn {
  display: inline-block;
  padding: 6px 12px;
  margin-bottom: 0;
  font-size: 14px;
  font-weight: 400;
  line-height: 1.42857143;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  -ms-touch-action: manipulation;
  touch-action: manipulation;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  background-image: none;
  border: 1px solid transparent;
  border-radius: 4px;
}
.ui-group-buttons .or{position:relative;float:left;width:.3em;height:1.3em;z-index:3;font-size:12px}
.ui-group-buttons .or:before{position:absolute;top:50%;left:50%;content:'or';background-color:#5a5a5a;margin-top:-.1em;margin-left:-.9em;width:1.8em;height:1.8em;line-height:1.55;color:#fff;font-style:normal;font-weight:400;text-align:center;border-radius:500px;-webkit-box-shadow:0 0 0 1px rgba(0,0,0,0.1);box-shadow:0 0 0 1px rgba(0,0,0,0.1);-webkit-box-sizing:border-box;-moz-box-sizing:border-box;-ms-box-sizing:border-box;box-sizing:border-box}
.ui-group-buttons .or:after{position:absolute;top:0;left:0;content:' ';width:.3em;height:2.84em;background-color:rgba(0,0,0,0);border-top:.6em solid #5a5a5a;border-bottom:.6em solid #5a5a5a}
.ui-group-buttons .or.or-lg{height:1.3em;font-size:16px}
.ui-group-buttons .or.or-lg:after{height:2.85em}
.ui-group-buttons .or.or-sm{height:1em}
.ui-group-buttons .or.or-sm:after{height:2.5em}
.ui-group-buttons .or.or-xs{height:.25em}
.ui-group-buttons .or.or-xs:after{height:1.84em;z-index:-1000}
.ui-group-buttons{display:inline-block;vertical-align:middle}
.ui-group-buttons:after{content:".";display:block;height:0;clear:both;visibility:hidden}
.ui-group-buttons .btn{float:left;border-radius:0}
.ui-group-buttons .btn:first-child{margin-left:0;border-top-left-radius:.25em;border-bottom-left-radius:.25em;padding-right:15px}
.ui-group-buttons .btn:last-child{border-top-right-radius:.25em;border-bottom-right-radius:.25em;padding-left:15px}
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
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

.btn-warning{color:#fff !important; font-size:14px !important; font-weight:600; text-transform:none;
/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#ff7725+0,ff7725+50,ec4b17+50,ec4b17+100 */
background: #ff7725; /* Old browsers */
background: -moz-linear-gradient(top, #ff7725 0%, #ff7725 50%, #ec4b17 50%, #ec4b17 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top, #ff7725 0%,#ff7725 50%,#ec4b17 50%,#ec4b17 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom, #ff7725 0%,#ff7725 50%,#ec4b17 50%,#ec4b17 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff7725', endColorstr='#ec4b17',GradientType=0 ); /* IE6-9 */
}

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

.waves-effect .waves-ripple {
  position: absolute;
  border-radius: 50%;
  width: 20px;
  height: 20px;
  margin-top: -10px;
  margin-left: -10px;
  opacity: 0;
  background: rgba(0, 0, 0, 0.2);
  -webkit-transition: all 0.7s ease-out;
  -moz-transition: all 0.7s ease-out;
  -o-transition: all 0.7s ease-out;
  -ms-transition: all 0.7s ease-out;
  transition: all 0.7s ease-out;
  -webkit-transition-property: -webkit-transform, opacity;
  -moz-transition-property: -moz-transform, opacity;
  -o-transition-property: -o-transform, opacity;
  transition-property: transform, opacity;
  -webkit-transform: scale(0);
  -moz-transform: scale(0);
  -ms-transform: scale(0);
  -o-transform: scale(0);
  transform: scale(0);
  pointer-events: none;
}

.waves-effect.waves-light .waves-ripple {
  background-color: rgba(255, 255, 255, 0.45);
}

.waves-effect.waves-red .waves-ripple {
  background-color: rgba(244, 67, 54, 0.7);
}

.waves-effect.waves-yellow .waves-ripple {
  background-color: rgba(255, 235, 59, 0.7);
}

.waves-effect.waves-orange .waves-ripple {
  background-color: rgba(255, 152, 0, 0.7);
}

.waves-effect.waves-purple .waves-ripple {
  background-color: rgba(156, 39, 176, 0.7);
}

.waves-effect.waves-green .waves-ripple {
  background-color: rgba(76, 175, 80, 0.7);
}

.waves-effect.waves-teal .waves-ripple {
  background-color: rgba(0, 150, 136, 0.7);
}
</style>
</head>
<body id="home" class="homepage">
 
  <div class="alert alert-success do-suc" role="alert" style="display: none">
    <span id="suc-msg"></span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="mainHeader" >

    <header id="header" style="padding: 0">
      <div class="alert alert-danger do-err" role="alert" style="display: none;">
        <span id="err-msg"></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <nav id="main-menu" class="navbar top-nav-collapse header_div navbar-jobmandi" role="banner">
        <div class="col-lg-offset-1">
          <div class="col-lg-3 col-xs-12 col-sm-12 w3-padding-left">
            <!-- <div class="w3-col l12 s10">
              <img class="w3-border" src="<?php echo base_url(); ?>images/desktop/logo-main.png">
            </div>
            <div class="w3-col l2 s2"></div> -->
            
            <div class="navbar-header">
              <?php 
              if(isset($user_name) && isset($user_name)!=''){

                echo '<a href="'.base_url().'profile/dashboard"><img class="img" src="'.base_url().'images/desktop/logo-main.png" alt="JobMandi Logo"></a>';
              }
              else{
                echo '<a href="'.base_url().'"><img class="img" src="'.base_url().'images/desktop/logo-main.png" alt="JobMandi Logo"></a>';
              }
              ?>    
              <button type="button" class="navbar-toggle w3-right" onclick="openNav()" style="margin-top:15px">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>              
            </div>
          </div>
          <!--            -----------------LEFT SIDENAV CONTENTS---------------------->
          <div id="mySidenav" class="sidenav">
            <div class="w3-col l12"><a class="btn w3-left w3-large" href="javascript:void(0)" class="btn closebtn" onclick="closeNav()">&times;</a></div>

            <a class="btn w3-left w3-col s12 w3-left" style="text-align:left" href="<?php echo base_url(); ?>content/about_us">About JobMandi </a>

            <?php if($profile_type=='' || $profile_type=='1'){ ?>
            <a class="btn w3-left w3-col s12 w3-left" style="text-align:left" href="<?php echo base_url(); ?>project/project_listing">Explore Projects</a>
            <?php } ?>

            <?php if($profile_type=='' || $profile_type=='3'){ ?>
            <a class="btn w3-left w3-col s12 w3-left" style="text-align:left" href="<?php echo base_url(); ?>jobseeker/jobseeker_lists">Explore Jobs</a>
            <?php } ?>

            <?php if($profile_type=='' || $profile_type=='2'){ ?>
            <a class="btn w3-left w3-col s12 w3-left" style="text-align:left" href="<?php echo base_url(); ?>freelancer/freelancer_list">Explore Freelancers</a>
            <?php } ?>

            <?php if($profile_type=='' || $profile_type=='4'){ ?>
            <a class="btn w3-left w3-col s12 w3-left" style="text-align:left" href="<?php echo base_url(); ?>jobseeker/explore_jobseeker">Explore Job Seekers</a>
            <?php } ?>

            <?php if($profile_type=='' ||  $profile_type=='2'){ ?>
            <a class="btn w3-left w3-col s12 w3-left"  style="text-align:left" href="<?php echo base_url(); ?>project/post_project_Controller">Post Project</a>
            <?php } ?>

            <?php if($profile_type=='' || $profile_type=='4'){ ?>
            <a class="btn w3-left w3-col s12 w3-left"  style="text-align:left" href="<?php echo base_url(); ?>job/post_jobs">Post Job</a>
            <?php } ?>

            <?php 
            if(isset($user_name) && isset($user_name)!=''){
              echo '
              <div class="ui-group-buttons">
              <a href="'.base_url().'auth/login/logout" class="btn  waves-effect waves-light w3-margin-top w3-black w3-round-xlarge w3-text-white" style="margin-left: 30px">Logout <i class="fa fa-sign-out" ></i></a>
             
              </div>';
            }
            else{ ?>
            <div class="ui-group-buttons">
              <a href="'.base_url().'auth/login" class="btn btn-warning waves-effect waves-light w3-margin-top w3-orange w3-round-xlarge w3-text-white" style="margin-left: 30px"><b>Login &nbsp;/&nbsp;SignUp</b> <i class="fa fa-sign-in"></i></a>
              
<!-- 
              <a href="<?php echo base_url().'auth/login'; ?>" style="" class="btn btn-warning waves-effect waves-light w3-margin-top w3-orange w3-round-xlarge w3-text-white">Sign up</a> -->
            </div>
            <!-- echo '<a class="btn w3-left" href="'.base_url().'auth/login" >Login | Sign Up</a>'; -->
            <?php }
            ?>
          </div>
          <!-- -------------------------SIDE NAV CONTENT ENDS HERE---------------------------           -->
          <div class="col-lg-7 col-xs-7 col-sm-7 w3-padding-top">
            <div class="collapse navbar-collapse navbar-right">
              <ul class="nav navbar-nav">
                <li class="scroll"><a href="<?php echo base_url(); ?>content/about_us">About JobMandi </a></li>
                
                <li class="scroll dropdown"><a class="dropbtn">Explore </a>
                  <div class="dropdown-content" style="float:left;">
                    <?php if($profile_type == '' || $profile_type == 3 ){ ?>
                    <a class="btn w3-left" style="color:black;width:100%" href="<?php echo base_url(); ?>jobseeker/jobseeker_lists">Explore Jobs</a>
                    <?php } ?>

                    <?php if($profile_type == '' || $profile_type == 1 ){ ?>
                    <a class="btn w3-left" style="color:black;width:100%" href="<?php echo base_url(); ?>project/project_listing">Explore Projects</a>
                    <?php } ?>

                    <?php if( $profile_type == 2 ){ ?>
                    <a class="btn btn-block w3-left" style="color:black;width:100%" href="<?php echo base_url(); ?>freelancer/freelancer_list">Explore Freelancers</a>
                    <?php } ?>                    

                    <?php if($profile_type == 4 ){ ?>
                    <a class="btn btn-block w3-left" style="color:black;width:100%" href="<?php echo base_url(); ?>jobseeker/explore_jobseeker">Explore JobSeeker</a>
                    <?php } ?>
                  </div>
                </li>


                <li class="scroll dropdown">
                  <?php if($profile_type != 3 && $profile_type != 1 ){ ?>
                  <a class="dropbtn">Post </a>
                  <?php } ?>
                  <div class="dropdown-content" style="float:left;">
                    <?php if($profile_type == '' || $profile_type == 4){ ?>
                    <a class="btn w3-left" style="color:black;width:100%" href="<?php echo base_url(); ?>job/post_jobs">Post Job</a>
                    <?php } ?>
                    
                    <?php if($profile_type == '' || $profile_type == 2){ ?>
                    <a class="btn w3-left" style="color:black;width:100%" href="<?php echo base_url(); ?>project/post_project_Controller">Post Project</a>
                    <?php } ?>                    
                  </div>
                </li>

              </ul>
            </div>
          </div>
          <div class="col-lg-2 col-sm-2 w3-hide-small">
           <div class="w3-left ">
            <?php 
            if(isset($user_name) && isset($user_name)!=''){
              echo '<a href="'.base_url().'auth/login/logout" class="btn waves-effect waves-light w3-margin-top w3-black w3-round-xlarge w3-text-white">Logout <i class="fa fa-sign-out"></i></a>';
            }
            else{
              echo '<a href="'.base_url().'auth/login" class="btn btn-warning waves-effect waves-light w3-margin-top w3-orange w3-round-xlarge w3-text-white"><b>Login &nbsp;/&nbsp;SignUp</b> <i class="fa fa-sign-in"></i></a>';
            }
            ?>                        
          </div>
        </div>
      </div><!--/.container-->
    </nav><!--/nav-->
  </header><!--/header-->

  <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
      //document.getElementById("main").style.marginLeft = "250px";
      document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
      //document.getElementById("main").style.marginLeft= "0";
      document.body.style.backgroundColor = "white";
    }
  </script>
</div>
</body>
</html>
