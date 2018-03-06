<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
//error_reporting(E_ERROR | E_PARSE);
$user_id=$this->session->userdata('user_id');
$selected_profile_type=$this->session->userdata('selected_profile_type');
$profile_type=$this->session->userdata('profile_type');

if(($this->session->userdata('selected_profile_type'))==''){
  $selected_profile_type=$profile_type;
}
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
if(isset($_GET['jm_job_type'])){
  $search_cat=$this->input->get('jm_job_type', TRUE);
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Project Listing</title>
  
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/joblisting.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/freelancer.css">

  <script type="text/javascript" src="<?php echo base_url(); ?>css/js/const.js"></script>
  <!-- <script>
    $(document).ready(function(){
      var search_cat='<?php echo $search_cat ?>';
      if(search_cat=='Fixed_Price'){
        $('#fixedRadio').trigger("click");
      }
      if(search_cat=='Hourly'){
        $('#hourlyRadio').trigger("click");
      }
    });
  </script> -->

  <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>css/bootstrap/bootstrap-toggle.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/js/findwork/findwork.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/js/loadingoverlay.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/js/loadingoverlay_progress.min.js"></script>
  <style>
  .pagination {
    display: inline-block;
  }

  .pagination a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
    border: 1px solid #ddd;
  }

  .pagination a.active {
    background-color: #4CAF50;
    color: white;
    border: 1px solid #4CAF50;
  }

  .pagination a:hover:not(.active) {background-color: #ddd;}
</style>
</head>
<body class="">

  <div class="container search_main">
    <div class="col-md-12">
      <div class="col-md-2">
      </div>
      <div class="col-md-8">
        <div class="row">
          <form class="form-group">
            <div class="search">
              <span class="fa fa-search"></span>
              <input id="strsearch" placeholder="Search job by keywords" onclick="this.select();" class="search_input form-control" name="search">
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-2">
      </div>
    </div>
  </div>

  <div class="w3-container w3-padding-bottom" style="margin-top: 10px">
    <div class="w3-col l12 ">
      <div class="col-lg-1"></div>
      <div class="w3-col l10">
        <div class="col-lg-12 ">
          <div class="w3-col l9 ">


            <!-- show bookmarking message -->
            <div class="" id="bookmark_msg"></div>            
            <!-- show bookmarking message -->

            <div class="">
              <form class="form-group">
                <span>
                  <div class="w3-col l12 ">
                    <div class="w3-col l2">
                     <label class="w3-margin-left w3-medium"><b>Project Types:</b></label>
                   </div>
                   <div class="w3-col l9 w3-padding-left">
                    <label class="radio-inline label1">
                      <input type="radio" name="optradio" class="label2" value="All" selected>All
                    </label>
                    <label class="radio-inline label1">
                      <input type="radio" id="fixedRadio" name="optradio" class="label2" value="Fixed_Price">Fixed Price
                    </label>
                    <label class="radio-inline label1">
                      <input type="radio" id="hourlyRadio" name="optradio" class="label3" value="Hourly">Hourly
                    </label>
                  </div>
                </div> 
              </span>
            </form>
          </div>
        </div>
        <div class="w3-col l3 w3-margin-top w3-padding-left">
          <div class="">
            <label class="" style="display:inline">
              <label class="w3-medium"><b>Sort By:&nbsp;</b></label>
              <select id="sortby" class="latest_search uneditable-input" name="searchby">
                <option value="lastest">Latest</option>
                <option value="high">Price(High to low)</option>
                <option value="low">Price(Low to High)</option>
              </select>
            </label>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-1"></div>
  </div>
</div>

<div class="w3-container w3-margin-bottom">
  <hr>
  <div class="w3-col l12">
    <div class="col-lg-1"></div>
    <div class="w3-col l10">
      <div class="w3-col l12">
       <!-- <div class="w3-col l3 w3-padding w3-hide-large">
        <div>
          <div style="margin-left:14px"><b>Skills :</b></div>
          <div style="margin-left:14px" class="skill"></div>
        </div>
        <div class="small_search">
          <div style="display:inline">
            <form>
              <input type="hidden" class="" id="skills_filtered">
              <input list="skill_list" type="text" name="allSkill" id="term" class="latest_search uneditable-input" placeholder="search skills..." style="margin-left: 15px;padding-left: 10px;width: 200px">
              <datalist id="skill_list">
                <?php 
                foreach($all_skills['status_message'] as $result) { ?>
                <option data-value="<?php echo $result['jm_skill_id']; ?>" value="<?php echo $result['jm_skill_name']; ?>"><?php echo $result['jm_skill_name']; ?></option>                  
               
                <?php } 
                ?>
              </datalist>
              <i class="fa fa-plus-circle" style="font-size:20px;" name='usrname_mobile' id="hit_mobile"></i>
            </form>
          </div>
        </div>
        <div class="budget w3-border-bottom w3-padding-bottom">
          <div style="display:inline">
            <div style="margin-left:14px"><b>Budget : &nbsp;&nbsp;&nbsp;<span id="demo"></span></b></div>
            <div class="slidecontainer"><input type="range" min="1" max="100" value="1" class="slider" id="myRange" name="rangetype" style="margin-left:14px"></div>
            <div style="margin-left:14px"><p class="w3-label">Range 100-2500000</p></div>
            <button type="button" class="view_button" id="reset" name="reset" style="margin-left:14px"><i class="fa fa-filter"></i> Reset Filter</button>
          </div>
        </div>

      </div>
    -->      <div class="w3-col l9 w3-border-right" id="showResult">
     <?php
     $userBookmark=array();
     if($user_details['status']==200){
      $userBookmark=json_decode($user_details['status_message'][0]['jm_userBookmark'],TRUE);
    }
    if($info['status']==1)
    {
      foreach ($info['status_message'] as $key)  
      { 
		//print_r($key);die();
        $view_link=base_url().'project/view_project/'.base64_encode($key['jm_project_id']);

        if($user_id=''|| $profile_type==''){
          $view_link=base_url().'auth/login?profile=1&payload=ViewProject&value='.base64_encode($key['jm_project_id']);
        }

        $class="fa-bookmark-o";
        $title="Add Bookmark";
        if($userBookmark){ 
          if(in_array($key['jm_project_id'], $userBookmark)){

            $class="fa-bookmark";
            $title="Bookmarked";
          }
        }
        $user_id=$this->session->userdata('user_id');
        echo '<div class="w3-col 12 w3-padding" id="spinnerDiv_'.$key['jm_project_id'].'">              
        <div class="w3-col l12 w3-border-bottom">';

        if (($user_id != '') || ($user_name != '') || ($profile_type != '')) {  
          echo 
          '<div class="w3-right w3-margin-right w3-padding-right"><a onclick="add_bookmark('.$user_id.','.$key['jm_project_id'].');" data-toggle="fa" title="'.$title.'"><i id="project_'.$key['jm_project_id'].'" class="fa '.$class.'" style="font-size:25px; color: black"></i></a></div>';
        }
        echo '<div class="col-lg-8">
        <h4>'.$key['jm_project_title'].'</h4>
        <div>
        <p>
        <div style="max-height:200px;overflow: hidden">
        '.$key['jm_project_description'].'<a class="w3-margin-left" href="'.$view_link.'"><span style="color:#02b28b"><i>more</i></span></a>
        </div>
        </p>
        </div>
        <div class=" w3-col l12" style="overflow-wrap:break-word;">                                
        <div class="w3-padding-bottom w3-medium w3-col l12" id="SkillId_'.$key['jm_project_id'].'">
        <label>Skills:</label>
        </div>
        </div>  
        <div class="w3-col l8 w3-margin-bottom">
        <div class="w3-col l12">
        <div class="w3-col l3 s3 w3-padding-tiny w3-tiny"><b>'.$key['jm_job_type'].'</b></div>

        </div>
        </div>              
        </div>
        <div class="col-lg-4 w3-hide-small">
        <div class="">
        <div class="w3-small w3-col l12 "><b class="w3-right w3-margin-top w3-margin-bottom">'.$key['jm_projectbudget_type'].'</b></div>
        <div class="w3-col l12"><a title="View Project Details" href="'.$view_link.'" class="w3-small w3-padding-left w3-padding-right w3-black w3-right w3-round-xlarge w3-padding-tiny btn" data-toggle="tooltip">View Project</a></div>
        <div class=" w3-col l12 w3-small"><span class="w3-right" style="padding-right:5px;margin-top:10px">'.$key['jm_project_bid'].' Proposals</span></div>
        <div class="w3-col 12 w3-padding-tiny w3-margin-top w3-right w3-tiny w3-text-grey"><i class="w3-right">posted '.timeago($key['jm_posting_date']).'</i></div>
        </div>
        </div>

        <div class="col-lg-4 w3-hide-large">
        <div class="">
        <div class="w3-small w3-col l6 s6"><b class="w3-left w3-margin-top w3-margin-bottom">'.$key['jm_projectbudget_type'].'</b></div>
        <div class="w3-col l6 s6">
        <a title="View Details Of Project" href="'.$view_link.'" class="w3-small w3-black w3-right w3-padding-left w3-padding-right w3-round-xlarge w3-padding-tiny btn" data-toggle="tooltip" style="">View Project</a>
        </div>

        <div class=" w3-col l12 s6 w3-small">
        <span class="w3-right" style="padding-right:5px; margin-top:10px">'.$key['jm_project_bid'].' Proposals</span></div>

        <div class="w3-col l6 s6 w3-padding-tiny w3-margin-top w3-left w3-tiny w3-text-grey"><i class="w3-left">posted '.timeago($key['jm_posting_date']).'</i></div>
        </div>
        </div>
        </div>             
        </div>
        
        <script>
        $(document).ready(function () {

         FetchSkills('.$key['jm_project_id'].','.$key['jm_project_skill'].');
       });
       </script>';

     }

   }
   else{     
    echo '
    <div class="w3-col 12 w3-padding w3-margin">              
    <div class="w3-col l12">
    <div class="w3-center">
    <img src="'.base_url().'css/logos/no_data.png" width="auto" class="img"/>
    </div>
    </div>             
    </div>';
  }
  ?>

<!--      <div class="pagination">
  		  <a href="#">&laquo;</a>
  	 	  <a href="<?php  //echo $this->pagination->create_links();?>"></a>
		  <a href="#" class="">2</a>
		  <a href="#">3</a>
		  <a href="#">4</a>
		  <a href="#">5</a>
		  <a href="#">6</a>
		  <a href="#">&raquo;</a>
   </div>-->



	 <!--<nav aria-label="Page navigation example">
        <ul class="pagination">      
           <li class="page-item"><a class="page-link"> <?php  echo $this->pagination->create_links();?></a></li>
        </ul>
        </nav>
    
      --></div>





      <div class="w3-col l3 w3-padding ">

        <div>
          <div><b>Skills :</b></div>
          <div class="skill"></div>
        </div>
        <div class="small_search">
          <div style="display:inline">
            <form>
              <input type="hidden" class="" id="skills_filtered">
              <input list="skill_list" type="text" name="allSkill" id="term" class="latest_search uneditable-input" placeholder="search skills..." style="padding-left: 10px;width: 165px" required>
              <datalist id="skill_list">
                <?php 
                foreach($all_skills['status_message'] as $result) { ?>
                <option data-value="<?php echo $result['jm_skill_id']; ?>" value="<?php echo $result['jm_skill_name']; ?>"><?php echo $result['jm_skill_name']; ?></option>                  
                <?php
              } 
              ?>
            </datalist>
            <i class="fa fa-plus-circle" style="font-size:20px;" name='usrname' id="hit"></i>
          </form>
        </div>
      </div>
      <div class="budget">
        <div style="display:inline">
          <div><b>Budget :   less than <i class="fa fa-rupee"></i> <span id="demo"></span></b></div>
          <div class="slidecontainer"><input type="range" min="100" max="2500000" value="1" class="slider" id="myRange" name="rangetype"></div>
          <div><p class="w3-label">Range <i class="fa fa-rupee"></i> 100 - <i class="fa fa-rupee"></i> 2500000 <i class="w3-tiny">(default is <i class="fa fa-rupee"></i>100)</i></p></div>
          <button type="button" class="view_button" onclick="window.location.reload();" id="reset" name="reset"><i class="fa fa-refresh"></i> Reset Filter</button>
        </div>
      </div>
               <!--  <div class="w3-col l6 s6 w3-margin-top" ><a href="#" id="view_bookmark" class=" btn w3-small w3-black  w3-round-xlarge w3-padding-tiny btn">View Bookmark</a>
               </div> -->
               
             </div>
           </div>
         </div>
         <div class="col-lg-1"></div>

       </div>
     </div>      

     <script>
       $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip(); 
        $('[data-toggle="fa"]').tooltip();
      });
       function FetchSkills(jm_project_id,Skills){
    		//alert(jm_project_id);
    		//alert(Skills);
                //$("#element").LoadingOverlay("show");

                $('#SkillId_'+jm_project_id).append('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>');
                $.ajax({
                 type: "POST",
                 url: "<?php echo base_url(); ?>project/Project_listing/FetchSkills",
                 dataType: 'text',
                 data: {
                  jm_project_id: jm_project_id,
                  Skills: Skills
                },
                cache: false,
                success: function(data) {
                  $('#SkillId_'+jm_project_id).html('');
                  var key=JSON.parse(data);
    	                //alert(key);
                      for(i=0; i< key.length; i++){
    	                    //$.alert(key[i].jm_skill_name);
    	                    $('#SkillId_'+jm_project_id).append('<span><span  class="w3-padding-small w3-round w3-light-grey" style="display:inline-block;margin-top:5px; margin-right: 5px; background-color:#787878;font-size:8px;">'+key[i].jm_skill_name+'</span></span>');
                       }
                     }
                   });
              }
 //  var today = new Date();
 //    var expiry = new Date(today.getTime() + 30 * 24 * 3600 * 1000); // plus 30 days

 //    function setCookie(name, value)
 //    {
 //      document.cookie=name + "=" + escape(value) + "; path=/; expires=" + expiry.toGMTString();
 //    }
 //  function putCookie(form)
 //                  //this should set the UserName cookie to the proper value;
 //    {
 //     setCookie("userName", form[0].usrname.value);
 //     alert("hiiii");
 //      return true;
 //    }
//  </script>
</body>
</html>
