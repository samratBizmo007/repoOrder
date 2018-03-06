<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
//error_reporting(E_ERROR | E_PARSE);
$user_name=$this->session->userdata('user_name');
$selected_profile_type=$this->session->userdata('selected_profile_type');
$profile_type=$this->session->userdata('profile_type');

if(($this->session->userdata('selected_profile_type'))==''){
  $selected_profile_type=$profile_type;
}
$profile_value='';
switch ($this->session->userdata('selected_profile_type')) {
      //-------------case Freelancer  ----------------//    
  case '1':
  $profile_value='Freelancer' ;   
  break;

      //-------------case Freelancer Employer----------------//
  case '2':
  $profile_value='Freelancer Employer';    
  break;

      //-------------case Job Seeker----------------//
  case '3':
  $profile_value='Job Seeker' ;   
  break;

      //-------------case Job Employer----------------//
  case '4':
  $profile_value='Job Employer' ;   
  break;    
}    
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Profile</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
  <link href="<?php echo base_url(); ?>css/bootstrap/bootstrap-toggle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert/jquery-confirm.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/view_profile.css">

  <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>css/bootstrap/bootstrap-toggle.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/alert/jquery-confirm.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/js/const.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/js/profile/view_profile.js"></script>
  <!-- <script type="text/javascript" src="<?php echo base_url(); ?>css/js/dashboard/dash.js"></script> -->
  <style>
  .main{
    height: 250px;
  }
</style>
</head>
<body class="w3-wide">
 <div class="w3-row w3-padding" id="mainDiv">
  <div class="col-lg-2"></div>
  <div class="w3-col l8 w3-margin-top w3-margin-bottom">
    <div class="w3-col l8">
      <div class="w3-col l5 w3-padding-xxlarge">
        <div class="col-lg-12 w3-circle prof_pic bg_imageConfig" style="background-image: url('<?php echo base_url(); ?>images/default_male.png');"></div>
      </div>
      <div class="w3-col l7 w3-padding">
        <div class="w3-col l12"><label class="w3-xlarge">Freelancer Name</label></div>
        <div class="w3-col l12"><span class="w3-large bluish-green">UI/UX Designer</span></div>
        <div class="w3-col l12 marginTop_large">
          <div class="w3-col l12">
            <span class="w3-small"><i class="w3-large fa fa-map-marker"></i> Pune, MAH, India.</span><br>
            <span class="w3-tiny w3-text-grey">Member since March 23, 2016.</span>
          </div>
        </div>        
      </div>
    </div>
    <div class="w3-col l4">
      <div class="w3-col l12 w3-margin-top w3-padding-top"><span class="w3-right w3-border w3-padding-tiny w3-padding-right w3-padding-left w3-round-xlarge">Freelancer</span></div>
      <div class="w3-col l12 marginTop_large2">
        <div class="w3-col l12 w3-padding-top">
          <a class="btn w3-right w3-margin-top"><span class="w3-small bluish-green ">Edit Profile <i class="w3-medium w3-text-black fa fa-gear"></i></span></a>
          <br>
        </div>
      </div> 
    </div>
  </div>
  <div class="col-lg-2"></div>
</div>

<!-- div with small buttons row -->
<div class="w3-row w3-padding w3-text-white w3-black">
  <div class="w3-col l12 ">
    <div class="col-lg-2"></div>
    <div class="w3-col l8">
      <div class="w3-col l4">

       <a href="#" class="btn w3-hover-black w3-text-white">
        <span class="" ><i class="fa fa-user-o w3-circle w3-medium w3-border w3-padding-tiny"></i></span>
      </a>
      <a href="#" class="btn w3-hover-black w3-text-white">
        <span class="" ><i class="fa fa-dollar w3-circle w3-medium w3-border w3-padding-tiny"></i></span>
      </a>
      <a href="#" class="btn w3-hover-black w3-text-white">
        <span class="" ><i class="fa fa-inbox w3-circle w3-medium w3-border w3-padding-tiny"></i></span>
      </a>
      <a href="#" class="btn w3-hover-black w3-text-white">
        <span class="" ><i class="fa fa-phone w3-circle w3-medium w3-border w3-padding-tiny"></i></span>
      </a>
    </div>
    <div class="w3-col l6">
      <center>
        <a href="#" class="btn bluishGreen_bg w3-hover-white w3-round-xxlarge w3-padding-tiny w3-padding-left w3-padding-right w3-text-white">
          <span class="w3-large"><b>HIRE</b> </span>
        </a>
      </center>
    </div>
    <div class="w3-col l2">
      <a class="btn w3-right w3-text-white"><span class="w3-small"><i class="w3-large fa fa-share-alt"></i>&nbsp;Share Profile</span></a>
    </div>
  </div>
  <div class="col-lg-2"></div>       
</div>
</div>
<!-- div ended -->

<!-- div for about details of user and it's score row -->
<div class="w3-row w3-margin-bottom w3-text-black w3-light-grey">
  <div class="w3-col l12 w3-padding">
    <br>
    <div class="col-lg-2"></div>
    <div class="w3-col l8 ">
      <div class="w3-col l6 w3-padding ">
        <div class="w3-col l12"><label class="w3-medium">About Me</label></div>
        <div class="w3-col l12">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>
        </div>
      </div>
      <div class="w3-col l6 ">
        <div class="w3-col l6 w3-border-right w3-border-left" style="padding: 0 32px 16px 32px">
          <div class="w3-col l12 w3-padding">
            <div class="col-lg-12 w3-white w3-padding-top w3-center w3-circle prof_pic">
              <div class="w3-padding-top"><h2>$ 31</h2>
                <span>USD/hr</span></div>
              </div>
            </div>

            <div class="w3-col l12 w3-center">
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
              <span class="fa fa-star-o"></span>
              <span class="fa fa-star-o"></span>
              <span class="badge">4.8</span><br>
              <span class="w3-text-grey w3-small">25 Feedback</span>
            </div>          
          </div>
          <div class="w3-col l6 w3-padding">
            <!-- progress bar div -->
            <div class="w3-col l12 w3-small  w3-padding-small">
              <span><i class="w3-medium fa fa-check-square-o"></i>&nbsp;Jobs Completed</span> 
              <div class="w3-col l10" style="padding-top: 7px">
                <div class="w3-round-xlarge progress w3-border">
                  <div class="w3-green w3-round-large progress" style="width: 25%"></div>              
                </div>
              </div>           
              <div class="w3-col l2">
                <span class="w3-medium" style="padding-top: 0"><b>&nbsp;29%</b></span><br>
              </div>  
            </div>
            <!-- progress bar ends -->

            <!-- progress bar div -->
            <div class="w3-col l12 w3-small  w3-padding-small">
              <span><i class="w3-small fa fa-dollar w3-circle"></i>&nbsp;On Budget</span> 
              <div class="w3-col l10" style="padding-top: 7px">
                <div class="w3-round-xlarge progress w3-border">
                  <div class="w3-green w3-round-large progress" style="width: 25%"></div>              
                </div>
              </div>           
              <div class="w3-col l2">
                <span class="w3-medium" style="padding-top: 0"><b>&nbsp;29%</b></span><br>
              </div>  
            </div>
            <!-- progress bar ends -->

            <!-- progress bar div -->
            <div class="w3-col l12 w3-small  w3-padding-small">
              <span><i class="w3-small fa fa-hourglass-half"></i>&nbsp;On Time</span> 
              <div class="w3-col l10" style="padding-top: 7px">
                <div class="w3-round-xlarge progress w3-border">
                  <div class="w3-green w3-round-large progress" style="width: 50%"></div>              
                </div>
              </div>           
              <div class="w3-col l2">
                <span class="w3-medium" style="padding-top: 0"><b>&nbsp;29%</b></span><br>
              </div>  
            </div>
            <!-- progress bar ends -->

          </div>
        </div>
      </div>
      <div class="col-lg-2"></div>       
    </div>
  </div>
  <!-- div ended -->

  <!-- div for skills and experience row -->
  <div class="w3-row w3-margin-bottom w3-text-black">
    <div class="w3-col l12 w3-padding">
      <br>
      <div class="col-lg-2"></div>
      <div class="w3-col l8 ">
        <div class="w3-col l4 w3-padding">
          <div class="w3-col l12 " style="border: 1px solid;">
            <center>
              <h5>My Skills</h5><!-- <?php print_r($all_userSkills);  ?> -->
              <center> <div class=""><img src="<?php echo base_url(); ?>images/desktop/image25.png" style="margin-top:-41px;"></div></center>
            </center>

            <div class="w3-col l12">
              <div class="skill_column mid_divProfile">
                <ul>
                  <li>esgvggvg</li>
                  <li>esgvggvsefvesfsg</li>
                  <li>esgvggvg</li>
                  <li>esgvggvg</li>
                  <li>esgvggvg</li>
                  <li>esgvggvg</li>
                  <li>esgvggvg</li>
                  <li>esgvggvg</li>
                  <li>esgvggvg</li>
                  <li>esgvggvg</li>                
                </ul>
              </div>              
              <div class="w3-col l12 w3-center">
                <a href="" class="btn bluish-green w3-small">View More</a>
              </div>
            </div>
          </div>
        </div>
        <div class="w3-col l4 w3-padding">
          <div class="w3-col l12 " style="border: 1px solid;">
            <center>
              <h5>Education</h5><!-- <?php print_r($all_userSkills);  ?> -->
              <center> <div class=""><img src="<?php echo base_url(); ?>images/desktop/image25.png" style="margin-top:-41px;"></div></center>
            </center>

            <div class="w3-col l12 w3-padding mid_divProfile">
              <div class="w3-col l12  w3-margin-bottom w3-border-bottom ">
                <div class="w3-col l6 s6">
                  <label class="w3-left">MBA</label>
                </div>
                <div class="w3-col l6 s6">
                  <label class="w3-right">2017</label>
                </div>
                <div class="w3-col l12">
                  <span class="w3-medium w3-text-grey">xyzaj, University</span>
                </div>
              </div>

              <div class="w3-col l12 w3-margin-bottom w3-border-bottom ">
                <div class="w3-col l6 s6">
                  <label class="w3-left">MBA</label>
                </div>
                <div class="w3-col l6 s6">
                  <label class="w3-right">2017</label>
                </div>
                <div class="w3-col l12">
                  <span class="w3-medium w3-text-grey">xyzaj, University</span>
                </div>
              </div>

              <div class="w3-col l12  w3-margin-bottom w3-border-bottom ">
                <div class="w3-col l6 s6">
                  <label class="w3-left">MBA</label>
                </div>
                <div class="w3-col l6 s6">
                  <label class="w3-right">2017</label>
                </div>
                <div class="w3-col l12">
                  <span class="w3-medium w3-text-grey">xyzaj, University</span>
                </div>
              </div>
            </div>
            <div class="w3-col l12 w3-center">
              <a href="" class="btn bluish-green w3-small">View More</a>
            </div>
          </div>
        </div>
        <div class="w3-col l4 w3-padding">
          <div class="w3-col l12" style="border: 1px solid;">
            <center>
              <h5>Experience</h5><!-- <?php print_r($all_userSkills);  ?> -->
              <center> <div class=""><img src="<?php echo base_url(); ?>images/desktop/image25.png" style="margin-top:-41px;"></div></center>
            </center>

            <div class="w3-col l12 w3-padding mid_divProfile">
              <div class="w3-col l12  w3-margin-bottom w3-border-bottom ">
                <div class="w3-col l6 s6">
                  <label class="w3-left">MBA</label>
                </div>
                <div class="w3-col l6 s6">
                  <label class="w3-right">2017</label>
                </div>
                <div class="w3-col l12">
                  <span class="w3-medium w3-text-grey">xyzaj, University</span>
                </div>
              </div>

              <div class="w3-col l12 w3-margin-bottom w3-border-bottom ">
                <div class="w3-col l6 s6">
                  <label class="w3-left">MBA</label>
                </div>
                <div class="w3-col l6 s6">
                  <label class="w3-right">2017</label>
                </div>
                <div class="w3-col l12">
                  <span class="w3-medium w3-text-grey">xyzaj, University</span>
                </div>
              </div>

              <div class="w3-col l12  w3-margin-bottom w3-border-bottom ">
                <div class="w3-col l6 s6">
                  <label class="w3-left">MBA</label>
                </div>
                <div class="w3-col l6 s6">
                  <label class="w3-right">2017</label>
                </div>
                <div class="w3-col l12">
                  <span class="w3-medium w3-text-grey">xyzaj, University</span>
                </div>
              </div>
            </div>
            <div class="w3-col l12 w3-center">
              <a href="" class="btn bluish-green w3-small">View More</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-2"></div>       
    </div>
  </div>
  <!-- div ended -->

  <!-- div for show and add portfolio row -->
  <div class="w3-row w3-margin-bottom w3-text-black">
    <div class="w3-col l12 w3-padding">
      <br>
      <div class="col-lg-2"></div>
      <div class="w3-col l8 ">
        <div class="w3-col l12">
          <center >
            <h3>Portfolio</h3>
            <center> <div class=""><img src="<?php echo base_url(); ?>images/desktop/image25.png" style="margin-top:-41px;"></div></center>
          </center>
        </div>

        <div class="w3-col l12">
          <div class="w3-col l3 w3-padding-small">
            <div class="w3-col l12 profile_portfolio w3-light-grey"></div>
          </div>
          <div class="w3-col l3 w3-padding-small">
            <div class="w3-col l12 profile_portfolio w3-light-grey"></div>
          </div>
          <div class="w3-col l3 w3-padding-small">
            <div class="w3-col l12 profile_portfolio w3-light-grey"></div>
          </div>
          <div class="w3-col l3 w3-padding-small">
            <div class="w3-col l12 profile_portfolio w3-light-grey"></div>
          </div>
        </div>

        <div class="w3-col l12">
          <center>
            <a class="btn w3-round-xlarge w3-border w3-padding-tiny w3-padding-left w3-padding-right port_button w3-margin"><label class="w3-padding-tiny">View More</label></a>
            <a class="btn w3-round-xlarge w3-border w3-padding-tiny w3-padding-left w3-padding-right port_button w3-margin"><label class="w3-padding-tiny">Add More</label></a>
          </center>
          <!-- add portfolio collapsible div -->
          <div class="" >

          </div>
          <!-- div ending -->
        </div>

      </div>
      <div class="col-lg-2"></div>       
    </div>
  </div>
  <!-- div ended -->

  <!-- div for show feedback and reviews row -->
  <div class="w3-row w3-margin-bottom w3-text-black">
    <div class="w3-col l12 w3-padding">
      <br>
      <div class="col-lg-2"></div>
      <div class="w3-col l8 ">
        <div class="w3-col l12">
          <center >
            <h3>Past Work and Feedback</h3>
            <center> <div class=""><img src="<?php echo base_url(); ?>images/desktop/image25.png" style="margin-top:-41px;"></div></center>
          </center>
        </div>

        <div class="w3-col l12">
          <div class="w3-col l6 w3-padding-small">
            <div class="w3-col l12 w3-border w3-padding">
              <div class="w3-col l2">
                <div class="w3-col l12 w3-light-grey w3-circle w3-margin-top feedback_pic bg_imageConfig" style="background-image: url('<?php echo base_url(); ?>images/default_male.png');"></div>
              </div>
              <div class="w3-col l10">
                <div class="w3-col l12 w3-padding">
                  <h5>project name full name</h5>
                  <p class="w3-small w3-text-grey" style="height: 70px;overflow: hidden"><i class="fa fa-quote-left">
                  &nbsp;Lorem ipsum dolor sit amet, proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&nbsp;<i class="fa fa-quote-right"></i></i>
                  
                </p>
                <div class="w3-col l12">
                  <div class="w3-col l7">
                    <span class="w3-tiny"><i>By samrat on December 2017.</i></span>
                  </div>
                  <div class="w3-col l5">
                    <span class="w3-small"><i class="w3-large fa fa-map-marker"></i> Pune, India.</span><br>
                  </div>
                </div>
                <div class="w3-col l5 w3-padding-top">
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star-o"></span>
                  <span class="fa fa-star-o"></span>
                  <span class="badge">4.8</span><br>
                </div>
                <div class="w3-col l7 w3-padding-top">
                  <span class="w3-small">$ 30 USD/hr</span><br>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="w3-col l6 w3-padding-small">
          <div class="w3-col l12 w3-border profile_portfolio"></div>
        </div>
      </div>

    </div>
    <div class="col-lg-2"></div>       
  </div>
</div>
<!-- div ended -->

</body>
</html>
