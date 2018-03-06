<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
error_reporting(E_ERROR | E_PARSE);
$user_name=$this->session->userdata('user_name');
$profile_type=$this->session->userdata('profile_type');
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
  <link href="<?php echo base_url(); ?>css/bootstrap/bootstrap-toggle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert/jquery-confirm.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">

  <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>css/bootstrap/bootstrap-toggle.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/alert/jquery-confirm.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/js/const.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/js/dashboard/dashboard.js"></script>
<style>
  .dashboard_blocks{
    height: 180px;
  }
</style>
</head>
<body class="w3-wide">
  <div class="w3-row w3-black" >
    <div class="col-lg-2"></div>
    <div class="w3-col l8">
      <div class="w3-col l12 w3-text-light-grey w3-margin-top w3-padding-bottom">
        <div class="w3-col l6 w3-left w3-padding-left">
          <div class="w3-col l3 ">
            <span class="w3-medium">Select Profile :</span>
          </div>
          <div class="w3-col l9 w3-text-black">
            <select class="w3-round-xxlarge w3-padding-small" id="select_profileList">
              <option value="1" <?php if($profile_type=='1'){ echo 'selected'; } ?>>Freelancer</option>                  
              <option value="2" <?php if($profile_type=='2'){ echo 'selected'; } ?>>Freelance Employer</option>                  
              <option value="3" <?php if($profile_type=='3'){ echo 'selected'; } ?>>Job Seeker</option>                  
              <option value="4" <?php if($profile_type=='4'){ echo 'selected'; } ?>>Job Employer</option>                  
            </select>
          </div>
        </div>
        <div class="w3-col l6 w3-right">
          <div class="w3-col l12">
            <span class="w3-right">
              <a href="#" class="btn w3-margin-left w3-hover-blue-grey w3-text-white">
                <span class=""><i class="fa fa-inbox w3-circle w3-large w3-white w3-padding-small"></i>&nbsp;INBOX</span>
              </a>
              <a href="#" class="btn w3-margin-left w3-hover-blue-grey w3-text-white">
                <span class=""><i class="fa fa-user w3-circle w3-large w3-white w3-padding-small"></i>&nbsp;PROFILE</span>
              </a>
              <a href="#" class="btn w3-margin-left w3-hover-blue-grey w3-text-white">
                <span class=""><i class="fa fa-search w3-circle w3-large w3-white w3-padding-small"></i>&nbsp;FIND WORK</span>
              </a>             
            </span>
          </div>
        </div>
        <div class="w3-col l12 ">
          <div class="w3-col l12 w3-margin-top w3-padding-top w3-margin-bottom">
            <div class="w3-col l3 w3-padding-small">
              <div class="w3-col l12 dashboard_blocks w3-white">
                <div class="w3-col l12">
                  <center>
                    <h6>My Skills</h6><!-- <?php print_r($all_userSkills);  ?> -->
                    <center> <div class=""><img src="<?php echo base_url(); ?>images/desktop/image25.png" style="margin-top:-41px;"></div></center>
                  </center>
                </div>
                <div class="w3-col l12 scrollbar w3-padding-small" id="style-2" style="height: 90px;">
                  <?php 
                    if($all_userSkills['status']!=200){
                      echo '<center><label class="w3-small w3-text-grey">'.$all_userSkills['status_message'].'</label></center>';
                    }
                    else{
                      foreach($all_userSkills['status_message'] as $result) { 
                      echo '<span class="w3-text-grey w3-white w3-round-xxlarge w3-small" style="margin:2px;padding:2px 0px 2px 5px">'.$result['jm_skill_name'].' 
                      <a class="btn" onclick="del_userSkill('.$result['skill_id'].')" style="margin:0px;padding:0"><i class="fa fa-times-circle w3-medium" style="padding:2px"></i></a></span>';
                    }
                    }
                  ?>
                                   
                </div>
                <div class="w3-col l12 w3-padding-tiny">
                  <input list="skill_list" type="text" name="my_skills" id="my_skills" class="w3-round-xxlarge" placeholder="search skills..." style="padding-left: 10px;width: 165px">
                  <datalist id="skill_list">
                    <?php 
                    foreach($all_skills['status_message'] as $result) { ?>
                    <option data-value="<?php echo $result['jm_skill_id']; ?>" value="<?php echo $result['jm_skill_name']; ?>"><?php echo $result['jm_skill_name']; ?></option>                  
                    <?php } 
                    ?>
                  </datalist>
                  <a id="add_userSkill_Btn" name="add_userSkill_Btn" class="btn w3-circle w3-black w3-padding-small"> <i class="fa fa-plus"></i></a>
                </div>
                <div class="w3-col l12 w3-text-white" id="skill_msg"></div>
              </div>
            </div>
            <div class="w3-col l3 w3-padding-small">
              <div class="w3-col l12 dashboard_blocks w3-white">
                <div class="w3-col l12">
                  <center>
                    <h6>My Feedback</h6>
                    <center> <div class=""><img src="<?php echo base_url(); ?>images/desktop/image25.png" style="margin-top:-41px;"></div></center>
                  </center>

                  <div class="w3-col l12">

                    <div class="w3-col l12 w3-padding-small">
                      <div class="w3-col l6">
                        <span class="w3-small">Jobs Completed</span>
                      </div>
                      <div class="w3-col l6">
                        <span>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                      </span>
                      </div>
                    </div>

                    <div class="w3-col l12 w3-padding-small">
                      <div class="w3-col l6">
                        <span class="w3-small">Jobs Completed</span>
                      </div>
                      <div class="w3-col l6">
                        <span>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                      </span>
                      </div>
                    </div>

                    <div class="w3-col l12 w3-padding-small">
                      <div class="w3-col l6">
                        <span class="w3-small">Jobs Completed</span>
                      </div>
                      <div class="w3-col l6">
                        <span>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                      </span>
                      </div>
                    </div>

                    <div class="w3-col l12 w3-padding-small">
                      <div class="w3-col l6">
                        <span class="w3-small">Jobs Completed</span>
                      </div>
                      <div class="w3-col l6">
                        <span>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                      </span>
                      </div>
                    </div>

                    <div class="w3-col l12 w3-padding-small">
                      <div class="w3-col l6">
                        <span class="w3-small">Jobs Completed</span>
                      </div>
                      <div class="w3-col l6">
                        <span>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                      </span>
                      </div>
                    </div>                    
                    
                  </div>
                </div>

              </div>
            </div>
            <div class="w3-col l3 w3-padding-small">
              <div class="w3-col l12 dashboard_blocks w3-white">
                <div class="w3-col l12" >
                  <center>
                    <h6>My Funds</h6>
                    <center><img src="<?php echo base_url(); ?>images/desktop/image25.png" style="margin-top:-41px;"></center>
                  </center>
                  <div class="w3-col l12 w3-padding">
                    <table class="">
                      <tbody>
                        <tr>
                          <td class="text-left">Paid this month</td>
                          <td class="text-right">&nbsp;&nbsp;<b><i class="fa fa-rupee"></i>  0.00</b></td>
                        </tr>
                        <tr>
                          <td class="text-left">Paid to date</td>
                          <td class="text-right">&nbsp;&nbsp;<b><i class="fa fa-rupee"></i>  0.00</b></td>
                        </tr>
                        <tr>
                          <td class="text-left">Earned this month</td>
                          <td class="text-right">&nbsp;&nbsp;<b><i class="fa fa-rupee"></i>  0.00</b></td>
                        </tr>
                        <tr>
                          <td class="text-left">Earned to month</td>
                          <td class="text-right">&nbsp;&nbsp;<b><i class="fa fa-rupee"></i>  0.00</b></td>
                        </tr>
                      </tbody>
                    </table>

                    <center class="w3-margin-top">
                   <a href="" class="btn w3-medium w3-text-black"><i class="fa fa-money"></i>  <b>Financial Dashboard</b></a>   
                  </center>
                  </div>
                </div>

              </div>
            </div>
            <div class="w3-col l3 w3-padding-small">
              <div class="w3-col l12 dashboard_blocks w3-white">
                <div class="w3-col l12 w3-padding">
                  <center class="w3-margin-bottom">
                    <b><span class="w3-medium w3-text-light-blue">Available Bids</span></b><br>
                    <div class="w3-black w3-round-xxlarge w3-padding-small w3-large w3-wide">35/35</div>
                  </center>

                  <center class="w3-margin-bottom">
                    <b><span class="w3-medium w3-text-light-blue">Membership</span></b><br>
                    <div class="w3-card w3-round-xxlarge w3-padding-small w3-large w3-wide"><i class="fa fa-certificate"></i>PREMIUM</div>
                  </center>

                  <center class="w3-margin-bottom">
                   <a href="" class="btn w3-medium w3-text-black"><i class="fa fa-eye"></i>  <b>View Plans</b></a><br>                  
                  </center>
                </div>

              </div>
            </div>
          </div>        
        </div>
      </div>
    </div>
    <div class="col-lg-2"></div>
  </div>
  <div class="w3-row w3-padding w3-margin-bottom w3-text-white" style="background-color: #02B28B;">
    <div class="w3-col l12 ">
      <center>
        <span>
          <a href="#" class="btn w3-hover-black w3-margin-left w3-text-white">
            <span class="" ><i class="fa fa-users w3-circle w3-large w3-border w3-padding-small"></i>&nbsp;REFERALS</span>
          </a>
          <a href="#" class="btn w3-hover-black w3-margin-left w3-text-white">
            <span class="" ><i class="fa fa-inbox w3-circle w3-large w3-border w3-padding-small"></i>&nbsp;INBOX</span>
          </a>
          <a href="#" class="btn w3-hover-black w3-margin-left w3-text-white">
            <span class="" ><i class="fa fa-feed w3-circle w3-large w3-border w3-padding-small"></i>&nbsp;FEEDBACK</span>
          </a>             
        </span>
      </center>     
    </div>
  </div>

  <!-- current and previous data div -->
  <div class="w3-row w3-margin-top">
    <div class="col-lg-2"></div>
    <div class="w3-col l8">
      <div class="w3-col l12 w3-round-xlarge w3-padding">
        <span class="w3-large">Welcome <?php echo $user_name; ?>,</span>
      </div>
      <div class="w3-col l12" id="profileWise_data">
        <?php 
        switch ($profile_type) {

      //-------------case Freelancer      
          case '1':

          echo '      
          <div class="w3-col l6 w3-padding-small">
          <center><h3>Previous Projects</h3></center>
          <div class="w3-col l12">
          <table class="table table-bordered">
          <thead>
          <tr>
          <th>Project</th>
          <th>Bid Amount</th>
          <th>Time</th>
          <th>Status</th>
          </tr>
          </thead>
          </table>
          </div>
          </div>
          <div class="w3-col l6 w3-padding-small">
          <center><h3>Current Projects</h3></center>
          <div class="w3-col l12">
          <table class="table table-bordered">
          <thead>
          <tr>
          <th>Project</th>
          <th>Bid Amount</th>
          <th>Deadline</th>
          <th>Milestone</th>
          </tr>
          </thead>
          </table>
          </div>
          </div>
          ';

          break;

      //-------------case Freelancer Employer
          case '2':

          echo '      
          <div class="w3-col l6 w3-padding-small">
          <center><h3>Completed Projects</h3></center>
          <div class="w3-col l12">
          <table class="table table-bordered">
          <thead>
          <tr>
          <th>Project</th>
          <th>Money payed</th>
          <th>Completed by</th>
          <th>Date/Time</th>
          </tr>
          </thead>
          </table>
          </div>
          </div>
          <div class="w3-col l6 w3-padding-small">
          <center><h3>Ongoing Projects</h3></center>
          <div class="w3-col l12">
          <table class="table table-bordered">
          <thead>
          <tr>
          <th>Project</th>
          <th>Bid Amount</th>
          <th>Time Estimated</th>
          <th>Delivered Build</th>
          </tr>
          </thead>
          </table>
          </div>
          </div>
          ';
          break;

      //-------------case Job Seeker
          case '3':

          echo '      
          <div class="w3-col l6 w3-padding-small">
          <center><h3>Previous Jobs Applied</h3></center>
          <div class="w3-col l12">
          <table class="table table-bordered">
          <thead>
          <tr>
          <th>Job Details</th>
          <th>Company</th>
          <th>Skills Required</th>
          <th>Salary Offered</th>
          <th>Status</th>
          </tr>
          </thead>
          </table>
          </div>
          </div>
          <div class="w3-col l6 w3-padding-small">
          <center><h3>Current Job Applied</h3></center>
          <div class="w3-col l12">
          <table class="table table-bordered">
          <thead>
          <tr>
          <th>Job Details</th>
          <th>Company</th>
          <th>Skills Required</th>
          <th>Salary Offered</th>
          <th>Status</th>
          </tr>
          </thead>
          </table>
          </div>
          </div>
          ';
          break;

      //-------------case Job Employer
          case '4':

          echo '      
          <div class="w3-col l6 w3-padding-small">
          <center><h3>Previous Jobs Posted</h3></center>
          <div class="w3-col l12">
          <table class="table table-bordered">
          <thead>
          <tr>
          <th>Job Details</th>
          <th>Applied Candidates</th>
          <th>Posted On</th>
          <th>Status</th>
          </tr>
          </thead>
          </table>
          </div>
          </div>
          <div class="w3-col l6 w3-padding-small">
          <center><h3>Current Jobs Posted</h3></center>
          <div class="w3-col l12">
          <table class="table table-bordered">
          <thead>
          <tr>
          <th>Job Details</th>
          <th>No. of Candidates Applied</th>
          <th>Posted on</th>
          <th>Expires on</th>
          </tr>
          </thead>
          </table>
          </div>
          </div>
          ';
          break;

          default:
        # code...
          break;
        }
        ?>
      </div>
    </div>
    <div class="col-lg-2"></div>
  </div>    
  <!-- div ends here -->

  <!-- customer review div -->
  <div class="container">
    <hr>
    <div class="col-md-12">
      <div class="row">
        <center class="section4_inner1">
          <h2>What our Customers Are Saying</h2>
          <center> <div class=""><img src="<?php echo base_url(); ?>images/desktop/image25.png" style="margin-top:-41px;"></div></center>
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
                      <div class="col-sm-3 text-center">
                        <img class="img-circle" src="<?php echo base_url(); ?>images/desktop/image10.png" style="width: 100px;height:100px;">
                        <!--<img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/128.jpg" style="width: 100px;height:100px;">-->
                      </div>
                      <div class="col-sm-7">
                        <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit!</p>
                        <small style="color:#02b28b">Erik Allbest</small>
                        <small style="color:#02b28b">CEO & Founder,Chess.com</small>
                      </div>
                    </div>
                  </blockquote>
                </div>                
              </div>

              <!-- Carousel Buttons Next/Prev -->
              <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
              <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
            </div>                          
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- customer review div ends -->  

  <script>
    //  -------------------ADD USER SKILL------------------------ //
    $("#add_userSkill_Btn").click(function () {
        var skill_id = $('#skill_list option[value="' + $('#my_skills').val() + '"]').data('value');
        var profile_type = $('#select_profileList').val();
        
        $.ajax({
            type: "POST",
            url: BASE_URL + "profile/dashboard/add_userSkills",
            data: {skill_id:skill_id,
                   profile_type:profile_type
                  },
            return: false, //stop the actual form post !important!
            success: function (data)
            {
                $("#skill_msg").html(data);
                $("#style-2").load(location.href + " #style-2>*", "");
            }
        });
        return false;  //stop the actual form post !important!
    });
//  --------------------END --------------------------------- //
  </script>

  <script>
    //  -------------------DELETE USER SKILL------------------------ //
   function del_userSkill(skill_id) { 
        $.ajax({
            type: "POST",
            url: BASE_URL + "profile/dashboard/del_userSkill",
            data: {skill_id:skill_id,
                   profile_type:profile_type
                  },
            return: false, //stop the actual form post !important!
            success: function (data)
            {
                $("#skill_msg").html(data);
                $("#style-2").load(location.href + " #style-2>*", "");
            }
        });
        return false;  //stop the actual form post !important!
    }
//  --------------------END --------------------------------- //
  </script>

  <script>
   
  </script>
</body>
</html>
