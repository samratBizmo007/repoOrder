
    <div class=" w3-col l12 w3-margin-bottom" id="Job_ListDiv">
        <!-- -------------------Div to bind for project Description------------------------------>                    
        <?php
        $user_id=$this->session->userdata('user_id');
        $user_name=$this->session->userdata('user_name');
        $profile_type=$this->session->userdata('profile_type');

        $K = 0; 
           //print_r($result);die();
$Bookmark_jobs = array();
if ($job_bookmarks['status'] == 200) {
    $Bookmark_jobs = json_decode($job_bookmarks['status_message'][0]['jm_job_bookmarks'], TRUE);
}
                ?>
        <?php foreach ($result as $key){
         //print_r($Bookmark_jobs);die();
            $class = "fa-bookmark-o";
            $title = "Add Bookmark";
            if ($Bookmark_jobs) {
                if (in_array($key['jm_jobpost_id'], $Bookmark_jobs)) {
                    $class = "fa-bookmark";
                    $title = "Bookmarked";
                }
            }
            ?>
<!--            <div class="w3-margin-top w3-border-bottom  w3-margin-bottom" id="JobList_Div">
                 div for project description
                <div class="row w3-padding ">
                    <div class="w3-col l12 w3-padding-left">
                        <div class="row w3-col l12 w3-margin-top">
                            <div class="w3-col l6 w3-padding-bottom">
                                <span class="bluishGreen_txt w3-padding w3-medium w3-margin-right"><b><?php //echo $key['jm_job_post_name']?></b></span>
                            </div> 
                        </div>

                        <div class="row w3-col l12 w3-padding-left">
                            <div class="w3-col l6 w3-padding-bottom w3-medium">
                                <span><b><?php// echo //$key['jm_company_name']?></b></span>
                            </div>                                                                                               
                        </div>



                        <div class="row w3-col l12 w3-padding-left">
                            <div class="w3-col l12 w3-padding-bottom w3-medium">
                                <span><b>Salary Range : &nbsp;&nbsp;&nbsp;<?php //echo $key['jm_salary_range']?></b></span>
                            </div>
                            <div class="w3-col l6 w3-padding-bottom w3-medium">
                                <span><b>Positions : &nbsp;&nbsp;&nbsp;<?php //echo $key['jm_positions']?></b></span>
                            </div>
                        </div>

                        <div class="row w3-col l12 w3-padding-left w3-medium">
                            <div class="flex-container w3-col l6 w3-padding-bottom">
                                <span><b>Job Type :&nbsp;&nbsp;&nbsp;<?php //echo $key['jm_job_type']?></b></span>
                            </div> 
                             ====================================SKILLS DIV=============================================                               
                            <div class=" w3-col l12 m12 s12 " style="overflow-wrap:break-word;">                     
                                <div class=" w3-padding " id="SkillId_<?php //echo $key['jm_jobpost_id'];?>">

                                </div>
                            </div>  
                             ====================================APPLY JOB BUTTON=============================================                                  
                            <?php 
                            //$apply_link=base_url().'jobseeker/jobseeker_lists/'.$key['jm_jobpost_id'];
                            //if($user_id=''|| $profile_type==''){
                                //$apply_link=base_url().'auth/login?profile=3&payload=ApplyJob&value='.base64_encode($key['jm_jobpost_id']);
                            //}
                            ?>                                
                            <div class="w3-col l12 s12 w3-padding-bottom">
                                <a title="Apply To This Job" class="w3-right w3-round-xxlarge w3-padding-small w3-margin-right btn w3-text-white" style="background-color: #00B59D; font-size:10px" href="<?php echo $apply_link;?>">Apply Now</a>                                                                   
                            </div>
                        </div>

                    </div>
                </div>
                 div for project description                       
            </div>-->
            <?php 
                  $apply_link=base_url().'jobseeker/jobseeker_lists/'.$key['jm_jobpost_id'];
                  if($user_id==''|| $profile_type==''){
                    $apply_link=base_url().'auth/login?profile=3&payload=ApplyJob&value='.base64_encode($key['jm_jobpost_id']);
                  }
                  ?>
          <div class="w3-col l12 w3-border-bottom" id="JobList_Div">
            <!-- div for project description-->
            <div class="row w3-padding ">
              <div class="w3-col l12 w3-padding-left">
                <div class="row w3-col l12">
                  <div class="w3-col l11 s11 m11">
                      <a href="<?php echo $apply_link;?>"><span class="bluishGreen_txt w3-padding-left w3-margin-right" style=" font-size: 25px;"><b><?php echo $key['jm_job_post_name']?></b></span></a>
                  </div> 

                  <?php 
                  if (($user_id != '') || ($user_name != '') || ($profile_type != '')) { ?> 
                  <div class="w3-col l1 s1 m1 w3-right w3-medium">
                      <a class="w3-right w3-padding-left" data-toggle="fa" onclick="add_bookmarkForJob('<?php echo $user_id; ?>','<?php echo $key['jm_jobpost_id']; ?>')" title="<?php echo $title; ?>">
                      <i id="job_<?php echo $key['jm_jobpost_id']; ?>" class="fa <?php echo $class; ?>" style="font-size:25px; color: black;">                                                       
                      </i>
                    </a>
                  </div> 
                   <?php } ?> 
                    
                </div>

                <div class="row w3-col l12 w3-padding-left">
                  <div class="w3-col l6 w3-padding-bottom w3-medium">
                      <span><b><?php echo $key['jm_company_name']; ?></b></span>
                  </div>                                                                                               
                </div>



                <div class="row w3-col l12 w3-padding-left">
                  <div class="w3-col l3 w3-padding-bottom w3-medium">
                      <i class="fa fa-rupee w3-text-grey" style="font-size:15px;"></i><span> <?php echo $key['jm_salary_range']; ?> </span>
                  </div>
                  <div class="w3-col l3 w3-padding-bottom w3-medium">
                      <i class="fa fa-user w3-text-grey" style="font-size:15px;"></i><span> <?php echo $key['jm_positions']; ?></span>
                  </div>
                  <div class="w3-col l3 w3-padding-bottom w3-medium">
                      <i class="fa fa-briefcase w3-text-grey" style="font-size:15px;"></i><span> <?php echo $key['jm_job_type']; ?></span>       
                  </div>
                  <div class="w3-col l3 w3-padding-bottom w3-medium">
                      <i class="fa fa-map-marker w3-text-grey" style="font-size:15px;"></i><span> <?php echo $key['jm_job_city']; ?></span>       
                  </div>
                </div>

                   
                  <!-- ====================================SKILLS DIV=============================================                               -->
                  <div class="row w3-col l12 m12 s12 w3-padding-left" style="overflow-wrap:break-word;">                     
                    <div class="w3-medium w3-col l12 s12 m12" id="SkillId_<?php echo $key['jm_jobpost_id'];?>">
                        <label>Skills : </label>
                    </div>
                  </div>  
                  <!-- ====================================APPLY JOB BUTTON=============================================                               -->   
                <div class="row w3-col l12 w3-padding-left w3-medium">                                               
                  <div class="w3-col l12 s12 m12">
                    <a title="Apply To This Job" class="w3-right w3-round-xxlarge w3-padding-small btn w3-text-white" data-toggle="tooltip" style="background-color: black; font-size:10px" href="<?php echo $apply_link;?>">Apply Now</a>                                                                   
                  </div>
                </div>

              </div>
            </div>
            </div>

            <!-- div for project description-->                       
<!--          </div>-->

            <script>
                $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip(); 
            $('[data-toggle="fa"]').tooltip();
        });
                $(document).ready(function () {
                 FetchSkills('<?php echo $key['jm_jobpost_id'];?>','<?php echo $key['jm_skills'];?>');
             });                          
         </script>
         <?php }
     ?>
</div>
         
    <!---------------------/div bind for project description-------------------------->
<script>
     // -----------------fucntion add bookmark-------------
  function add_bookmarkForJob(user_id,job_id){
    var uri=BASE_URL+"jobseeker/Jobseeker_lists/add_bookmarkForJob";
    if($('#job_'+job_id).hasClass('fa-bookmark')){
     uri=BASE_URL+"jobseeker/Jobseeker_lists/del_bookmarkForJob";
   }
   dataString='user_id='+user_id+'&job_id='+job_id;
   $.LoadingOverlay("show");

   $.ajax({
     type: "POST",
     url: uri,
     data: dataString,
     return: false,  
     success: function(data)
     {	
      $.LoadingOverlay("hide");
      $('#bookmark_msg').html(data); 
      location.reload(); 

    }
  });	
 }
//----------------------function ends-----------------//
</script>