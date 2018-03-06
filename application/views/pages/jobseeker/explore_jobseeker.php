<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
//error_reporting(E_ERROR | E_PARSE);
$user_id=$this->session->userdata('user_id');
$selected_profile_type=$this->session->userdata('selected_profile_type');
$profile_type=$this->session->userdata('profile_type');

if(($this->session->userdata('selected_profile_type'))==''){
  $selected_profile_type=$profile_type;
}
//echo 'sujeet';
//echo '<pre>';print_r($info);exit;
$profile_value='';
switch ($selected_profile_type) {
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
$search_cat=$this->input->get('search_param', TRUE);
?>
<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
  /*Reusing bootstrap 3 panel CSS*/
  .panel {
    background-color: #FFFFFF;
    border: 1px solid rgba(0, 0, 0, 0);
    border-radius: 4px 4px 4px 4px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
    margin-bottom: 20px;
  }   

  .panel-primary {
    border-color: #1fbea9;
  }   

  .panel-primary > .panel-heading {
    background-color: #1fbea9;
    border-color: #1fbea9;
    color: #FFFFFF;
  }   

  .panel-heading {
    border-bottom: 1px solid rgba(0, 0, 0, 0);
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    padding: 10px 15px;
  }   

  .panel-title {
    font-size: 16px;
    margin-bottom: 0;
    margin-top: 0;
  }   

  .panel-body:before, .panel-body:after {
    content: " ";
    display: table;
  }   

  .panel-body:before, .panel-body:after {
    content: " ";
    display: table;
  }   

  .panel-body:after {
    clear: both;
  }   

  .panel-body {
    padding: 15px;
  }   

  .panel-footer {
    background-color: #F5F5F5;
    border-bottom-left-radius: 3px;
    border-bottom-right-radius: 3px;
    border-top: 1px solid #DDDDDD;
    padding: 10px 15px;
  }

  /*CSS from v3 snipp*/
  .user-row {
    margin-bottom: 14px;
  }

  .user-row:last-child {
    margin-bottom: 0;
  }

  .dropdown-user {
    margin: 13px 0;
    padding: 5px;
    height: 100%;
  }

  .dropdown-user:hover {
    cursor: pointer;
  }

  .table-user-information > tbody > tr {
    border-top: 1px solid rgb(221, 221, 221);
  }

  .table-user-information > tbody > tr:first-child {
    border-top: 0;
  }


  .table-user-information > tbody > tr > td {
    border-top: 0;
  }

  .bg_imageConfig{
    background-size: auto 130px;
    background-position: center;
    background-repeat: no-repeat;
  }
</style>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Job Seeker List</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/joblisting.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">

<script type="text/javascript" src="<?php echo base_url(); ?>css/js/const.js"></script>
<style>
.bluishGreen_bg{
  background-color:#1fbea9;
  color: #ffffff;
}
.bluishGreen_txt{
  color:#1fbea9;
}
.button{
  background-color:#1fbea9;
}
#basic-addon{
  background-color:#1fbea9;                
}

</style>
</head>
<body>

  <div class="container search_main">
    <div class="col-md-12">
      <div class="col-md-2">

      </div>
      <div class="col-md-8">

        <div class="row">
          <form class="form-group">
            <div class="search">
              <span class="fa fa-search"></span>
              <input placeholder="Search job seekers by name or location..." id="strsearch" onclick="this.select();" class="search_input form-control" name="search">
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-2">
      </div>
    </div>
  </div>

  <div class="w3-container">
    <div class="col-lg-2 ">

      <div class="w3-margin-top w3-padding-left">
        <div><b>Skills :</b></div>
        <div class="skill"></div>
      </div>
      <div class="small_search w3-padding-left">
        <div style="display:inline" class="w3-col l12">
          <form>
            <input type="hidden" class="" id="skills_filtered">
            <input list="skill_list" type="text" name="allSkill" id="term" class="latest_search uneditable-input" placeholder="search skills..." style="padding-left: 10px;width: 150px;height: 25px" required>
            <datalist id="skill_list">
              <?php 
              foreach($all_skills['status_message'] as $result) { ?>
              <option data-value="<?php echo $result['jm_skill_id']; ?>" value="<?php echo $result['jm_skill_name']; ?>"><?php echo $result['jm_skill_name']; ?></option>                  
              <?php
            } 
            ?>
          </datalist>
          <i class="fa fa-plus-circle" title="add skill" style="font-size:18px;" name='usrname' id="hit"></i>
        </form>
      </div>
    </div>
    <div class="w3-padding-left">
      <div style="display:inline">       
        <button type="button" class="view_button w3-margin-top w3-margin-bottom" onclick="window.location.reload();" id="reset" name="reset"><i class="fa fa-refresh"></i> Reset Filter</button>
      </div>
    </div>

  </div>
  <div class="col-md-10 ">
    <h3 class="w3-padding-left">Explore Job Seekers</h3>
    <div class="col-md-10  w3-margin-bottom" id="showResult">
      <div class="table-responsive">
        <table summary="This table shows how to create responsive tables using Bootstrap's default functionality" class="table table-striped table-hover">          
          <thead>
            <tr class="w3-light-grey">
              <th class="text-center"><h6>#</h6></th>
              <th class="text-center"><h6>Name</h6></th>
              <th class="text-center"><h6>Designation</h6></th>
              <th class="text-center"><h6>Expected Salary</h6></th>
              <th class="text-center"><h6>City</h6></th>
              <th class="text-center"><h6>Email-ID</h6></th>
              <th class="text-center"><h6>Action</h6></th>
            </tr>
          </thead>

          <tbody>
            <?php $i=1; 
            foreach ($job_seeker['status_message'] as $value) { ?>
            <tr>
              <td class="text-center"><?php echo $i.'.'; ?></td>
              <td class="text-center"><?php if($value['jm_user_name']!='') {echo $value['jm_user_name'];}else{ echo '<b>Not Available</b>';} ?></td>
              <td class="text-center"><?php if($value['jm_userDesignation']!='') {echo $value['jm_userDesignation'];}else{ echo '<b>Not Available</b>';} ?></td>
              <td class="text-center"><?php if($value['expected_salary']!='') {echo $value['expected_salary'];}else{ echo '<b>N/A</b>';} ?></td>
              <td class="text-center"><?php if($value['jm_userCity']!='') {echo $value['jm_userCity'];}else{ echo '<b>N/A</b>';} ?></td>
              <td class="text-center"><?php echo $value['jm_email_id']; ?></td>
              <td class="text-center"><?php ?>
                <a style="padding:2px" class="w3-medium btn " title="View Profile Card" ><i class="fa fa-address-card-o" style="color: #1fbea9" data-toggle="modal" data-target="#Profile_<?php echo $value['jm_user_id']; ?>"></i> </a>
                <a href="" style="padding:2px" class="w3-medium btn " title="Chat with <?php echo $value['jm_username']; ?>"><i class="fa fa-weixin" style="color: #1fbea9"></i> </a></td>

              </tr>

              <!-- Modal -->
              <div id="Profile_<?php echo $value['jm_user_id']; ?>" class="modal fade" role="dialog"><!--  modal for vshow portfolio information -->
                <div class="modal-dialog modal-md">
                  <!-- Modal content-->
                  <div class="modal-content">

                    <div class="modal-body w3-small w3-round-large">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <div class="w3-container w3-margin-bottom" >
                        <div class="w3-col l12 w3-padding" >
                          <div class="w3-col l4 w3-margin-top w3-round-large">
                            <img class="img img-thumbnail" alt="Profile Image not found" style="height: 70%; width: 70%; object-fit: contain" src="<?php echo base_url().''.$value['jm_profile_image']; ?>" onerror="this.src='<?php echo base_url()?>css/logos/default_noimage.jpg'">
                          </div>
                          <div class="w3-col l8">
                            <h4 class=""><?php echo $value['jm_user_name']; ?></h4>
                            <div class="w3-col l12"><span class="w3-medium"><?php echo $value['jm_userDesignation']; ?></span></div>                              
                            <?php

                            echo 
                            '<span class="w3-small">';
                            if($value['jm_userCity']!=''){
                             echo '<i class="w3-large fa fa-map-marker"></i> '.$value['jm_userCity'].', '.$value['jm_userState'].', '.$value['jm_userCountry'].'</span>';
                           }
                           echo '<br>
                           <span class="w3-tiny w3-text-grey">Member since '.date('M d,Y', strtotime($value['joining_date'])).'</span>';
                           ?>                                
                         </div>
                       </div> 
                       <div class="w3-col l12 w3-white w3-round ">
                        <div class="w3-col l6 w3-padding-small">
                          <div class="w3-col l12 "><label class="w3-medium">About Me</label></div>
                          <div class="w3-col l12 w3-text-grey">
                            <p>
                              <?php 
                              if($value['jm_userDescription']=='' || $value['jm_userDescription']=='<div><br></div>'){
                                echo 'No Description Available.';
                              }
                              else{
                                echo $value['jm_userDescription'];

                              }
                              ?>
                            </p>
                          </div>
                        </div>
                        <div class="w3-col l6 w3-padding-small">
                          <div class="w3-col l12"><label class="w3-medium">My Aspirations</label></div>
                          <div class="w3-col l12 w3-text-grey">
                            <p>
                              <?php 
                              if($value['jm_userAspiration']=='' || $value['jm_userAspiration']=='<div><br></div>'){
                                echo 'Not Available';
                              }
                              else{
                                echo $value['jm_userAspiration'];                                  
                              }
                              ?>
                            </p>
                          </div>
                        </div>
                      </div> 

                      <div class="w3-col l12 ">
                        <div class="w3-col l6 w3-padding-small">
                          <label>Educational Details:</label>
                          <?php 
                                 //print_r($value['jm_education']);
                          if($value['jm_education']!='' || $value['jm_education']!='[]'){
                            foreach (json_decode($value['jm_education'],TRUE) as $key) {
                            	//echo $key['jm_course'];
                              echo '<li class="w3-text-grey"><b>'.$key['jm_course'].'</b> from <b>'.$key['jm_university'].'</b> passing year <b>'.$key['jm_passing_year'].'</b></li>';
                            }
                          }
                          else{
                            echo '<b>Not Available</b>';
                          }
                          ?>
                        </div>
                        <div class="w3-col l6 w3-padding-small">
                          <label>Experience Details:</label>
                          <?php 
                          //	print_r($value['jm_experience']);
                          if($value['jm_experience']!='' || $value['jm_experience']!=''){
                          	//echo "check if";
                            foreach (json_decode($value['jm_experience'],TRUE) as $key) {
                            	//echo($key);die();
                           // echo $key['jm_worked_till'];
                              echo '<li class="w3-text-grey"><b>'.$key['jm_designation'].'</b> at <b>'.$key['jm_organisation'].'</b> till <b>'.$key['jm_worked_till'].'</b></li>';
                            }
                          }
                          else{
                          	//echo "check else";
                            echo '<b>Not Available</b>';
                          }
                          ?>

                        </div>
                      </div>                        
                    </div>
                  </div>  
                </div>
              </div>
            </div>
            <!-- modal ends here -->
            <?php $i++; } ?>


          </tbody>
              <!-- <tfoot>
                <tr>
                  <td colspan="7" class="text-center">PAGINATION.</td>
                </tr>
              </tfoot> -->
            </table>
          </div><!--end of .table-responsive--> 
        </div>
        <div class="w3-col l3 w3-padding"></div>
      </div>
      <div class="col-lg-1"></div>
    </div>

    <script>
      $(document).ready(function() {
        var panels = $('.user-infos');
        var panelsButton = $('.dropdown-user');
        panels.hide();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);

        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
            if(idFor.is(':visible'))
            {
              currentButton.html('<i class="fa fa-chevron-circle-up w3-xlarge" title="Hide" style="color: #1fbea9"></i>');
            }
            else
            {
              currentButton.html('<i class="fa fa-chevron-circle-down w3-xlarge" title="Expand" style="color: #1fbea9"></i>');
            }
          })
      });


    $('[data-toggle="tooltip"]').tooltip();

    $('button').click(function(e) {
      e.preventDefault();
      // alert("This is a demo.\n :-)");
    });

    // -------------------filter function ---------------------//
    var timeout = null;
    $('input[name="search"]').on('keyup',function(event){
      //alert("sujeet");
      $('#showResult').html('<center><i class="fa fa-spinner fa-spin w3-jumbo w3-margin" style="font-size:24px;"></i></center>');  
      event.preventDefault();
      skill = $('#skills_filtered').val();
      var str = $('#strsearch').val();
      if (timeout) {  
        clearTimeout(timeout);
      }

      var div=$('.skill').html();
      if(div ==''){
        $('#skills_filtered').val('');
        skill = '';
      }

      if(str.length != 1 || event.keyCode != 32){

        timeout = setTimeout(function(){
          $.ajax({
          url :BASE_URL+'jobseeker/explore_jobseeker/filterSeeker',
          type : 'POST',
          dataType : 'text',
          data : {
            'fileds' : {
              //'jm_skills' : str+'/LIKE',
              'jm_skills' : skill+'/REGEXP',
              'jm_userCity' : str+'/LIKE',
              'jm_user_name' : str+'/LIKE',  
            },
            'order' : {
              'field' : '',
              'order' : '',
            },
            'table' : {
              'table' : 'jm_userprofile_tab',
            },
            'mode' : {
              'mode' : 'jobseeker_list',
            }
          },
        }).
         done(function(data){
          console.log(data);
          $('#showResult').html(data);
        });//end of ajax
      },2000);//end of timeout function
      }else{
        $('#err-msg').text("No content for search");
        $('.do-err').fadeIn("slow");
        $(".do-err").delay(1000).fadeOut();
      }
    });
  // ---------------function ends for filter------------//

  $('#hit').on('click',function(event){
    event.preventDefault();
    var str = $('#term').val();
    skill=$('#skills_filtered').val();
    var skill_selected = $('#skill_list option[value="' + $('#term').val() + '"]').data('value');
    if(str!=""){
      if(skill==''){
        skill=skill_selected;
      }
      else{
        // ----------check skill already added or not
        if(skill.includes(skill_selected))
        {
          return false; 
        }
        
        skill = skill+'|'+skill_selected;
      }
      // if(skill=='')
      //   skill=skill_selected;
      // else
      //   skill = skill+'|'+skill_selected;
      $('.skill').append('<div id="'+skill_selected+'" class="skill-tabs"><span><a class="btn" onclick="delSkill('+skill_selected+')" style="padding:0;margin:0"><i class="fa fa-times-circle-o" style="font-size: 15px; color: black"></i></a><span style="font-size:12px; padding-left:7px; color: black;text-decoration: none;"><label class="getskill">'+str+'</label></span></span></div>');
      $('#term').val('');
      $('#skills_filtered').val(skill);
    }//end if if
  });//end of click

  $('#hit').on('click',function(event){
    event.preventDefault();
    skill = $('#skills_filtered').val();
    if(skill == ''){
      return false;
    }
    var str = $('#strsearch').val();
    $('#showResult').html('<center><i class="fa fa-spinner fa-spin w3-jumbo w3-margin" style="font-size:24px;"></i></center>');                      
   $.ajax({
          url :BASE_URL+'jobseeker/explore_jobseeker/filterSeeker',
          type : 'POST',
          dataType : 'text',
          data : {
            'fileds' : {
              //'jm_skills' : str+'/LIKE',
              'jm_skills' : skill+'/REGEXP',
              'jm_userCity' : str+'/LIKE',
              'jm_user_name' : str+'/LIKE',  
            },
            'order' : {
              'field' : '',
              'order' : '',
            },
            'table' : {
              'table' : 'jm_userprofile_tab',
            },
            'mode' : {
              'mode' : 'jobseeker_list',
            }
          },
        }).
    done(function(data){
      console.log(data);
      $('#showResult').html(data);
    });//end of ajax

  });

});

// ------------------delete skill from skill filter list-------------------
function delSkill(id){
  $('#showResult').html('<center><i class="fa fa-spinner fa-spin w3-jumbo w3-margin" style="font-size:24px;"></i></center>');                  
  $('#'+id+'').remove();
  var strValue=$('#skills_filtered').val();
  //alert(strValue);
  var res; 
  if(strValue.includes(id))
  {
    res= strValue.replace(id, '');
  }
  else{
    res= strValue.replace('|'+id, '');
  }
  //var res = strValue.replace('|'+id, '');
  $('#skills_filtered').val(res);
  skill = $('#skills_filtered').val();

  var div=$('.skill').html();
  if(div ==''){
    $('#skills_filtered').val('');
    skill = '';
  }
  
  var str = $('#strsearch').val();

  timeout = setTimeout(function(){
   $.ajax({
          url :BASE_URL+'jobseeker/explore_jobseeker/filterSeeker',
          type : 'POST',
          dataType : 'text',
          data : {
            'fileds' : {
              //'jm_skills' : str+'/LIKE',
              'jm_skills' : skill+'/REGEXP',
              'jm_userCity' : str+'/LIKE',
              'jm_user_name' : str+'/LIKE',  
            },
            'order' : {
              'field' : '',
              'order' : '',
            },
            'table' : {
              'table' : 'jm_userprofile_tab',
            },
            'mode' : {
              'mode' : 'jobseeker_list',
            }
          },
        }).
   done(function(data){
    console.log(data);
    $('#showResult').html(data);
        });//end of ajax
      },2000);//end of timeout function
  
}
// ----------------------remove skill form skill filter ends here

//  </script>
</body>
</html>
