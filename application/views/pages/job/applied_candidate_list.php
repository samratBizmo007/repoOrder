<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Job Info</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css">
        <link href="<?php echo base_url(); ?>css/bootstrap/bootstrap-toggle.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert/jquery-confirm.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/joblisting.css">

        <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>css/bootstrap/bootstrap-toggle.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>css/alert/jquery-confirm.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>css/js/const.js"></script>
        <style>
            .bluishGreen_bg{
                background-color:#1fbea9;
            }
            .button{
                background-color:#1fbea9;
            }
            #basic-addon{
                background-color:#1fbea9;                
            }
            .bluishGreen_txt{
    color:#00B59D;
  }
        </style>
        <?php
        $job_id = '';
        $user_id = $this->session->userdata('user_id');
        $user_name = $this->session->userdata('user_name');
        $company_name = '';
        $Postedby = '';
        $profile_type = '';
        $job_type = '';
        $job_name = '';
        $qualification = '';
        $responsibility = '';
        $skills = '';
        $address = '';
        $salary_range = '';
        $positions = '';
        $posted_time = '';
        $posted_date = '';
        $isActive = '';
        foreach ($jobDetails['status_message'] as $key) {
            //print_r($key);
            $job_id = $key['jm_jobpost_id'];
            $Postedby = $key['jm_user_id'];
            $profile_type = $key['jm_profile_type'];
            $job_type = $key['jm_job_type'];
            $job_name = $key['jm_job_post_name'];
            $company_name = $key['jm_company_name'];
            $qualification = $key['jm_qualification'];
            $responsibility = $key['jm_responsibility'];
            $skills = $key['jm_skills'];
            $address = $key['jm_venue_address'];
            $salary_range = $key['jm_salary_range'];
            $positions = $key['jm_positions'];
            $posted_date = $key['jm_posted_date'];
            $posted_time = $key['jm_posted_time'];
            $isActive = $key['is_active'];
        }
        ?>
    </head>
    <script>
        $(document).ready(function () {
            FetchSkills('<?php echo $job_id; ?>', '<?php echo $skills; ?>');
        });
    </script>
    <body>
        <!--------------------------- div for job details ------------------------------------------------------>
        <div class="container">
            <div class="w3-col l12 w3-padding-small">
                <div class="">
                    <label><h5 class="" style=" color: black;">Job Details</h5></label>
                </div>                
                <div class=" w3-col l12 bind-main  w3-border w3-padding-left">
                    <!-- -------------------Div to bind for project Description------------------------------>
                    <div class="w3-margin-top w3-margin-bottom" id="JobList_Div">
                        <!-------------------------------------------- div for project description------------------------------------------------>
                        <div class="row w3-margin-bottom w3-padding ">
                            <div class="w3-col l12 ">
                                <div class="row w3-col l12 w3-padding-left">
                                    <div class="w3-col l12"  style="font-size:20px">
                                        <span class="w3-margin-right bluishGreen_txt" style=" ;font-size:29px"><b><?php echo $job_name; ?></b></span>
                                    </div> 


                                    <div class="w3-col l12" >
                                        <span style="font-size:20px"><?php echo $company_name; ?></span>
                                    </div>  

                                    <div class="row w3-col l12 w3-padding-left">                                                                  
                                        <div class="w3-col l3 w3-margin-top">
                                            <span style="font-size:15px"><b>Salary : &nbsp;&nbsp;&nbsp;</b><?php echo $salary_range; ?></span>
                                        </div>
                                        <div class="w3-col l3 w3-margin-top"  style="font-size:15px">
                                            <span><b>Positions : &nbsp;&nbsp;&nbsp;</b><?php echo $positions; ?></span>
                                        </div>


                                        <div class="w3-col l3 w3-margin-top"  style="font-size:15px">
                                            <span><b>Job Type :&nbsp;&nbsp;&nbsp;</b><?php echo $job_type; ?></span>
                                        </div> 
                                        <div class="w3-col l3 w3-margin-top">
                                            <span class="" style="font-size:15px"><b>Posted Date : &nbsp;&nbsp;&nbsp;</b><?php echo $posted_date; ?></span>
                                        </div>
                                    </div>

                                    <input type="hidden" id='job_id' value="<?php echo $job_id; ?>">
                                    <div class="row w3-col l12 w3-margin-top w3-padding-left " style="font-size:15px">
                                        <div class="w3-col l8">
                                            <span style="font-size:20px"><b>Job Description :&nbsp;&nbsp;&nbsp;</b></span>
                                            <div><span><b>Responsibility:</b><?php echo $responsibility; ?></span><br>
                                                <span><b>Qualification:</b><?php echo $qualification; ?></span><br>
                                                <span><b>Address:</b><?php echo $address; ?></span></div>
                                        </div>
                                    </div>
                                     <div class=" w3-col l12 ">   
                                    <div class=" w3-col l12 w3-margin-top w3-padding-bottom"  id="SkillId_<?php echo $job_id; ?>">
                                            <label style="font-size:15px">Skills : </label>
                                        </div>
                                     </div>
                                </div>                            
                            </div>
                            <!-------------------------------------------- div for project description------------------------------------------------>                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--------------------------- div for job details ------------------------------------------------------>
        <!--------------------------- div for Applied Candidates ------------------------------------------------------>
        <div class="container w3-margin-bottom">
            <!--this div for used to show the Shortlisted candidate lists-->
            <script>
                $( document ).ready(function() {
                    getShortlistedcandidates('<?php echo $job_Id; ?>');
                });
            </script>
            <div class="w3-col l12 ">
                <label class="w3-padding-small" style=""><h5 class="" style=" color: black;">Hired Candidate List</h5>
                 </label>
                <?php if($isActive != 0){?>
                <button class="btn btn-default w3-text-black w3-margin-right w3-right" onclick="CloseJob('<?php echo $job_id; ?>');" type="button" style=" margin-top: 7px;">Close Job</button>
                <?php } ?>
                <div class="w3-col l12 w3-padding-small">
                <span class="w3-tiny w3-text-red">NOTE: List of Hired Candidates.</span>
                </div>
              <div class="col-md-12 w3-padding-small w3-margin-bottom" id="">
                            <div class="w3-col l12" id="candidate_Div" name="candidate_Div" style="max-height: 600px; overflow: scroll;">
                                <table class="table table-striped table-responsive w3-small"> 
                                    <!-- table starts here -->
                                    <thead class="w3-text-white">
                                        <tr class="bluishGreen_bg">
                                            <th class="text-center">SR. No</th>
                                            <th class="text-center">Job ID</th>  
                                            <th class="text-center">Applied Candidate</th>              
                                            <th class="text-center">Email</th>              
                                            <th class="text-center">Message</th>              
                                            <th class="text-center">Download Resume</th>                                             
                                            <th class="text-center">Status</th>                                             
                                        </tr>
                                    </thead>
                                    <tbody id ="shortlistedCandidate_Div"><!-- table body starts here -->
                                    
                                    </tbody><!-- table body close here -->
                                </table>   <!-- table closed here -->
                            </div>
              </div>
            </div>
        </div>
            <!--this div for used to show the Shortlisted candidate lists-->
            
            <!--this div for used to show th applied candidate lists-->
            <div class=" container">
                    <label class="" style=" padding-left: 14px;"><h5 style=" color: black;">Applied Candidate List</h5></label>

                <div class="col-md-12 w3-margin-bottom" id="Candidate_ListDiv">
                    <form id="submitStatus" name="submitStatus">
                    <div class="w3-col l12 w3-margin-bottom">
                    <div class="w3-col l4 w3-margin-bottom">
                        <label><b>Set Status :</b></label>
                        <select id="Candidate_Status" name="Candidate_Status"  class="form-control" required>
                            <option value="0">Set Status</option>
                            <option value="1">Reviewed</option>
                            <option value="2">Not Reviewed</option>
                            <option value="3">Shortlisted</option>                                        
                        </select>                                    
                    </div>
                        <div class="w3-col l2 w3-padding-left w3-padding-right w3-margin-top">
                            <button class="btn w3-text-white w3-center" type="button" onclick="saveStatus();" style=" background-color: #00B59D; margin-top: 7px;">Set Status</button>
                        </div>
                        <div class="w3-col l4 w3-padding-left w3-margin-top">
                            <a class="btn w3-text-white w3-right" href="<?php echo base_url(); ?>job/Applied_candidate_lists/DownloadCsv?job_id=<?php echo $job_Id; ?>" style=" background-color: #00B59D; margin-top: 7px;">Download CSV</a>
                        </div>
                        <div class="w3-col l2 w3-padding-left w3-margin-top">
                            <button class="btn w3-text-white w3-right" type="button" onclick="hireSelectedStudents();" style=" background-color: #00B59D; margin-top: 7px;">Hire Selected</button>
                        </div>
                    </div>
                    <!-- -------------------Div to bind for project Description------------------------------>
<!--                    <div class="w3-margin-bottom" id="Candidate_Div">-->
                        <!-------------------------------------------- div for project description------------------------------------------------>
                        <div class="w3-col l12 w3-margin-bottom">
                            <div class="" id="candidate_Div" name="candidate_Div" style="max-height: 600px; overflow: scroll;">
                                <table class="table table-striped table-responsive w3-small"> 
                                    <!-- table starts here -->
                                    <thead class="w3-text-white">
                                        <tr class="bluishGreen_bg">
                                            <th class="text-center">#</th>
                                            <th class="text-center">SR. No</th>
                                            <th class="text-center">Job ID</th>  
                                            <th class="text-center">Applied Candidate</th>              
                                            <th class="text-center">Email</th>              
                                            <th class="text-center">Message</th>              
                                            <th class="text-center">Download Resume</th>                                             
                                            <th class="text-center">Status</th>                                             
                                        </tr>
                                    </thead>
                                    <tbody ><!-- table body starts here -->
                                        <?php
                                        $count = 1;
                                        $color = '';
                                         if ($appliedCandidates['status'] == 200) {
                                        for ($i = 0; $i < count($appliedCandidates['status_message']); $i++) {
                                            if($appliedCandidates['status_message'][$i]['status'] == '1'){
                                                $color = 'w3-text-orange';
                                                $status = 'Reviewed';
                                            }elseif ($appliedCandidates['status_message'][$i]['status'] == '2') {
                                                $color = 'w3-text-red';
                                                $status = 'Not Reviewed';
                                            }elseif ($appliedCandidates['status_message'][$i]['status'] == '3') {
                                                $color = 'w3-text-green';
                                                $status = 'Shortlisted';
                                            }
                                        echo '<tr class="text-center">
                                        <td><input type="checkbox" name="candidate_id[]" id="candidate_id" value="'.$appliedCandidates['status_message'][$i]['jm_applieduser_id'].'"></td>
                                        <td class="text-center">'.$count.'.</td>
                                        <td class="text-center">#-JID0'.$appliedCandidates['status_message'][$i]['jm_job_id'].'</td>
                                        <td class="text-center">'.$appliedCandidates['status_message'][$i]['jm_candidate_name'].'</td>
                                        <td class="text-center">'.$appliedCandidates['status_message'][$i]['jm_email_id'].'</td>
                                        <td class="text-center">'.$appliedCandidates['status_message'][$i]['jm_message'].'</td>
                                        <td class="text-center"><a class="btn w3-medium" title="Download Resume" href="'.base_url().'job/Applied_candidate_lists/download/'.$appliedCandidates['status_message'][$i]['jm_applieduser_id'].'"><i class="fa fa-download"></i></a></td>
                                        <td class="text-center '.$color.'">'.$status.'</td>                                        
                                        </tr>';
                                        $count++;
                                          }
                                        } else {
                                        echo'<tr><td style="text-align: center;" colspan = "9">No Records Found...!</td></tr>';
                                        }
                                        ?>
                                    </tbody><!-- table body close here -->
                                </table>   <!-- table closed here -->
<!--                            </div>-->
                        </div>
                        <!-------------------------------------------- div for project description------------------------------------------------>                       
                    </div> 
                    </form>
                    <!---------------------/div bind for project description-------------------------->
                </div>
            </div>
                        <!--this div for used to show th applied candidate lists-->

<!--        </div>-->
        <!--------------------------- div for Applied Candidates ------------------------------------------------------>
    </body>
</html>
<script>
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
            }
          });
        },
        cancel: function () {}
      }
    });
  }    
 function FetchSkills(job_id, Skills) {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>job/Job_listings/FetchSkills",
                dataType: 'text',
                data: {
                    job_id: job_id,
                    Skills: Skills
                },
                cache: false,
                success: function (data) {
                    var key = JSON.parse(data);
                    //alert(key);
                    for (i = 0; i < key.length; i++) {
                        //$.alert(key[i].jm_skill_name);
                        $('#SkillId_' + job_id).append('<span w3-padding><span  class="w3-padding-small w3-light-grey w3-round" style="display:inline-block; margin-top:5px; margin-right: 5px; font-size:10px;">'+key[i].jm_skill_name+'</span></span>');
                    }
                }
            });
        }   
//----this fun is used to add job details information---------------------//
function saveStatus()
{
var Candidate_Status = $('#Candidate_Status').val();
var candidate_id = [];
    $("input[name='candidate_id[]']:checked").each(function (){
         candidate_id.push($(this).val());//--this is for get material length array...            
        }); 
            $.ajax({
            type: "POST",
            url: BASE_URL + "job/Applied_candidate_lists/SaveStatus",
            data: {
                candidate_id: candidate_id,
                Candidate_Status: Candidate_Status
            },
            return: false, //stop the actual form post !important!
            success: function (data)
            {
               $.alert(data);
               $("#Candidate_ListDiv").load(location.href + " #Candidate_ListDiv>*", "");               
            }
        });
        return false;  //stop the actual form post !important!
    }
//this fun is used to add job details ends here----------------------------------//
//---------this fun is used to get the shortlisted candidates----------------//
function getShortlistedcandidates(job_id){
    $.ajax({
            type: "POST",
            url: BASE_URL + "job/Applied_candidate_lists/getShortlistedcandidates",
            data: {
                job_id: job_id
            },
            return: false, //stop the actual form post !important!
            success: function (data)
            {
              $("#shortlistedCandidate_Div").html(data);               
            }
        });
         return false;  
}
//---------this fun is used to get the shortlisted candidates----------------//

function hireSelectedStudents(){
    var job_id = $('#job_id').val();
    var candidate_id = [];
    $("input[name='candidate_id[]']:checked").each(function (){
         candidate_id.push($(this).val());//--this is for get material length array...            
        }); 
     $.confirm({
        title: '<label class="w3-large w3-text-red"><i class="fa fa-envelope"></i> Confirm..!</label>',
        content: '<span class="w3-medium">Do You really want to hire.?</span>',
        buttons: {
            confirm: function () {
                     //$("#spinnerDiv").html('<center><img width="70%" height="auto" src="'+BASE_URL+'css/logos/reg.gif"/></center>');
            $.ajax({
            type: "POST",
            url: BASE_URL + "job/Applied_candidate_lists/hireSelectedStudents",
            data: {
                job_id: job_id,
                candidate_id: candidate_id
            },
            return: false, //stop the actual form post !important!
            success: function (data)
            {
               //$("#spinnerDiv").html('');
               $.alert(data);
               $("#Candidate_ListDiv").load(location.href + " #Candidate_ListDiv>*", "");               
            }
        });
    },
          cancel: function () {}
      }
    });
    }
    
//    function DownloadCsv(job_id){
//       $.ajax({
//            type: "POST",
//            url: BASE_URL + "job/Applied_candidate_lists/DownloadCsv",
//            data: {
//                job_id: job_id
//            },
//            return: false, //stop the actual form post !important!
//            success: function (data)
//            {
//               $.alert(data);
//               //$("#Candidate_ListDiv").load(location.href + " #Candidate_ListDiv>*", "");               
//            }
//        });
//        return false;  
//    }
</script>