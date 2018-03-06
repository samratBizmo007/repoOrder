<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Job List</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css">
        <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css"> -->
        <link href="<?php echo base_url(); ?>css/bootstrap/bootstrap-toggle.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert/jquery-confirm.css">
        <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css"> -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/joblisting.css">

        <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>css/bootstrap/bootstrap-toggle.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>css/alert/jquery-confirm.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>css/js/const.js"></script>
        <?php 
            $user_id=$this->session->userdata('user_id');    

        ?>
        <style>
            .bluishGreen_bg{
                background-color:#00B59D;
            }
            .bluishGreen_txt{
                color:#00B59D;
            }
            .button{
                background-color:#00B59D;
            }
            #basic-addon{
                background-color:#00B59D;                
            }
            .flex-container {
                display: flex;
                justify-content: space-evenly;
            }
            .flex-container > div {
                align-items:center;
                vertical-align: middle
            }
        
            

        </style>
    </head>
    <body>
        <div class="container w3-margin-bottom ">
            <div class="w3-col l12 ">
                <div class="">
                    <label><h4 class="" style=" color: #00B59D;">Job List</h4></label>
                </div>
<!--   -------------------div for small page started here.use this div for mobile pages and not for web -->
                <div class="flex-container w3-hide-large" >
             
                    <div class="flex-container" style="vertical-align:middle">
                
                    <input type="radio" name="optradio" class="label2" value="1" checked onclick="getOpen_Jobs();">
                        <label style="margin-bottom:-5px ;margin-left:4px">Open</label>
                        </div>
                    <div  class="flex-container" style="vertical-align:middle">
                 
                      <input type="radio" name="optradio" class="label3"  value="0" onclick="getClosed_Jobs()">
                        <label style="margin-bottom:-5px ;margin-left:4px">Closed</label>
                    </div>
                    <div >
                     <a title="Post Job" class="w3-right w3-round-xxlarge  btn w3-text-white" style="background-color: #00B59D;" href="<?php echo base_url();?>job/Post_jobs">Post Job</a>                                                                   
                    </div>
                    </div>
<!--   -------------------div for large page started here.use this div for websites pages and not for mobile -->
                <div class="flex-container w3-col l6 w3-hide-small" >
             
                    <div class="flex-container" style="vertical-align:middle">
                
                    <input type="radio" name="optradio" class="label2" value="1" checked onclick="getOpen_Jobs();">
                        <label style="margin-bottom:-5px ;margin-left:4px">Open</label>
                        </div>
                    <div  class="flex-container" style="vertical-align:middle">
                 
                      <input type="radio" name="optradio" class="label3"  value="0" onclick="getClosed_Jobs()">
                        <label style="margin-bottom:-5px ;margin-left:4px">Closed</label>
                    </div>
                    <div >
                     <a title="Post Job" class="w3-right w3-round-xxlarge  btn w3-text-white" style="background-color: #00B59D;" href="<?php echo base_url();?>job/Post_jobs">Post Job</a>                                                                   
                    </div>
                    </div>
                
                
                <div class=" col-md-9 bind-main w3-border w3-margin-top w3-margin-bottom" id="Job_ListDiv">
                    <!-- -------------------Div to bind for project Description------------------------------>
                    
                    <?php $K = 0; 
                          //print_r($jobs);
                      if($jobs['status']==200) {             ?>
                    <?php foreach ($jobs['status_message'] as $key){
                        
                        ?>
                    <div class="" id="JobList_Div">
                        
                        <div class="row  w3-border-bottom w3-padding ">
                            <div class="w3-col l12 w3-padding-left">
                                
<!--========================  bookmark and title div  START ==================================================================-->
                                <div class=" w3-col l12 w3-margin-top ">
                               
                                    <span class="w3-center w3-margin-right bluishGreen_txt"><b><?php echo $key['job_name']?></b></span>
                                
                                    
                                    <button title="Close Job" class="w3-right w3-black w3-round-large w3-padding-tiny btn" style="align:middle" onclick="CloseJob('<?php echo $key['job_id']?>');"><i class="fa fa-close"></i></button>
                                    <div class="w3-right w3-margin-right w3-hide">
                                               <a onclick="add_bookmark('<?php echo $user_id; ?>','<?php echo $key['job_id'];?>')" title="Add Bookmark">
                                                   <i id="project_'<?php echo $key['job_id'];?>'" class="fa fa-bookmark" style="font-size:25px; color: black">                                                       
                                                   </i>
                                               </a>
                                           </div>  
                                    
                                </div>
<!--========================  bookmark and title div  END ==================================================================-->
                                <div class=" w3-col l12 w3-margin-top ">
                                
                                <div class=" w3-col l12 ">
                                <div class="w3-col l6 w3-padding-bottom">
                                    <span><b><?php echo $key['company_name'];?></b></span>
                                </div> 
                                            
                                </div>
                                <!-- SALARY --> 
                                
                                <div class="w3-col l6 w3-padding-bottom">
                                    <span><b>Salary Range : &nbsp;&nbsp;&nbsp;<?php echo $key['Salary_range'];?></b></span>
                                </div>
                                <!-- POSITIONS -->
                                <div class="w3-col l12 w3-padding-bottom">
                                    <span><b>Positions : &nbsp;&nbsp;&nbsp;<?php echo $key['positions'];?></b></span>
                                </div>
                               
                                <!-- JOB TYPE -->                               
                                <div class=" w3-col l12 ">
                                <div class="w3-col l4 w3-padding-bottom">
                                    <span><b>Job Type :&nbsp;&nbsp;&nbsp;<?php echo $key['job_type'];?></b></span>
                                </div>
                                   
                                <!-- CITY -->  
                                <div class="w3-col l12 w3-padding-bottom">
                                        <span><i class="fa fa-map-marker"></i><b>&nbsp;<?php echo $key['city'];?></b></span>
                                </div> 
                                <!-- BUTTON -->
                                    <div class="w3-col l12 w3-padding-bottom">
                                <a title="Applied Candidate" class="w3-right w3-round-xxlarge w3-padding  btn w3-text-white" style="background-color: #00B59D; font-size:14px"  href="<?php echo base_url();?>job/job_listings/<?php echo $key['job_id'];?>">View Details</a>                                                                   
                                    </div>
                                <!-- SKILLS -->
                                <div class=" w3-col l12 ">                                
                                <div class="w3-padding-bottom w3-col l12" id="SkillId_<?php echo $key['job_id'];?>">
                                    <label>Skills:</label>
                                </div>
                                </div>  
                                    
                                </div>
                            </div>
                        </div>
                        <!-------------------------------------------- div for project description------------------------------------------------>                       
                    </div>
                    </div>
                    <script>
                            $(document).ready(function () {
                               FetchSkills('<?php echo $key['job_id'];?>','<?php echo $key['skills'];?>');
                             });
                    </script>
                    <?php }
                      }else{     ?>
                <div class="w3-margin-top w3-padding w3-margin-bottom" id="elseDiv">
                    <div class="alert alert-success w3-margin w3-center" style="text-align: center;">No records Found.</div>
                </div>
                      <?php }?>
                    <!---------------------/div bind for project description-------------------------->
                </div>
            </div>
            </div>
       
       
    </body>
</html>
<script>
function FetchSkills(job_id,Skills){
	//alert(Skills);
	
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>job/Job_listings/FetchSkills",
                dataType: 'text',
                data: {
                    job_id: job_id,
                    Skills: Skills
                },
                cache: false,
                success: function(data) {
		var key=JSON.parse(data);
                //alert(key);
 		for(i=0; i< key.length; i++){
                    //$.alert(key[i].jm_skill_name);
                    $('#SkillId_'+job_id).append('<span span w3-padding><span  class="w3-padding-small w3-margin-right w3-round-xxlarge  w3-text-white" style="display:inline-block;margin-top:5px;background-color:#787878;font-size:8px;">'+key[i].jm_skill_name+'</span></span>');
                }
            }
        });
}
function CloseJob(job_id){
        $.confirm({
        title: '<label class="w3-large w3-text-red"><i class="fa fa-envelope"></i> Delete Job.</label>',
        content: '<span class="w3-medium">Do You really want to delete this Job?</span>',
        buttons: {
            confirm: function () {
              $.ajax({
                type:'get',
                url:BASE_URL+'job/Job_listings/CloseJob?job_id='+job_id,                                    
                success:function(data) {
                  $.alert(data);              
               $("#JobList_Div").load(location.href + " #JobList_Div>*", "");
               $("#elseDiv").load(location.href + "elseDiv>*", "")
               location.reload();
               }
           });
          },
          cancel: function () {}
      }
  });
}
function getOpen_Jobs(){
$.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>job/Job_listings/getOpen_Jobs",
                data: {
                  
                },
                cache: false,
                success: function(data) {
                 $("#Job_ListDiv").html(data);   
                }
    });
    }
function getClosed_Jobs(){
$.ajax({
           type: "POST",
            url: "<?php echo base_url(); ?>job/Job_listings/getClosed_Jobs",
              data: {
                  
             },
                cache: false,
             success: function(data) {
              $("#Job_ListDiv").html(data);   
            }
    });

}
</script>