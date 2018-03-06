<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

error_reporting(E_ERROR | E_PARSE);

class Job_listings extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //start session		
//        $user_id = $this->session->userdata('user_id');
//        $user_name = $this->session->userdata('user_name');
//        $profile_type = $this->session->userdata('profile_type');
//        //check session variable set or not, otherwise logout
//        if (($user_id == '') || ($user_name == '') || ($profile_type == '')) {
//            redirect('auth/login');
//        }
    }

    public function index() {
        $data['jobs'] = Job_listings::getAllJob_Details();
        $this->load->view('includes/header.php');
        $this->load->view('pages/job/job_listing.php', $data);
        $this->load->view('includes/footer.php');
    }

    public function showAppliedCandidate($job_id = '') {
        $data['jobDetails'] = Job_listings::getJob_Details($job_id);
        $data['appliedCandidates'] = Job_listings::showApplied_candidate_list($job_id);
        $data['job_Id'] = $job_id;
        $this->load->view('includes/header.php');
        $this->load->view('pages/job/applied_candidate_list.php', $data);
        $this->load->view('includes/footer.php');
    }
    public function showApplied_candidate_list($job_id){
         $path = base_url();
        $url = $path . 'api/AppliedCandidate_Lists_api/showApplied_candidate_list?job_id='.$job_id;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        return $response;
    }

    public function getJob_Details($job_id) {
        $user_id = $this->session->userdata('user_id'); 
        $profile_type = $this->session->userdata('profile_type');
        $path = base_url();
        $url = $path . 'api/JobApplications_api/getJob_Details?job_id='.$job_id.'&user_id='.$user_id.'&profile_type='.$profile_type;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        return $response;
    }

    public function getAllJob_Details() {
        //echo 'sujeet';exit;
        //Connection establishment, processing of data and response from REST API
        $path = base_url();
        $url = $path . 'api/JobListing_api/getAllJob_Details?user_id='.$this->session->userdata('user_id');
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        //print_r($response_json);die();
        return $response;
    }

    public function FetchSkills() {
        extract($_POST);
        //print_r($_POST);die();
        $path = base_url();
        $url = $path . 'api/JobListing_api/FetchSkills?Skills=' . $Skills;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
      print_r($response_json);
        //return $response;
    }

    public function CloseJob(){
        extract($_GET);
        $path = base_url();
        $url = $path . 'api/JobListing_api/CloseJob?job_id='.$job_id;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        //print_r($response_json);die();
        if ($response['status'] == 200) {
            echo '<h3 class="bluish-green w3-margin"><i class="fa fa-check"></i> '.$response['status_message'].'</h3>   
            <script>
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove(); 
                });
                window.location.href="'.base_url().'profile/dashboard";
            }, 800);
            </script>';
        } else {
            echo'<h3 class="w3-text-red w3-margin"><i class="fa fa-warning"></i>'.$response['status_message'].'</h3>
            <script>
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove(); 
                });
                location.reload();
            }, 800);
            </script>';
        }
    }
    public function getOpen_Jobs(){
        $path = base_url();
        $url = $path . 'api/JobListing_api/getAllJob_Details?user_id='.$this->session->userdata('user_id');
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        if($response['status']== 200){
            foreach($response['status_message'] as $key){
            echo'<div class="w3-margin-top w3-border-bottom w3-card-2 w3-margin-bottom" id="JobList_Div">
                        <!-------------------------------------------- div for job description------------------------------------------------>
                        <div class="row w3-margin-bottom w3-padding ">
                            <div class="w3-col l12 w3-padding-left">
                                <button title="Close Job" class=" w3-right w3-black w3-round-xxlarge w3-padding-tiny btn" onclick="CloseJob('.$key['job_id'].');"><i class="fa fa-close"></i></button>                                   
                                <div class="row w3-col l12 w3-margin-top w3-padding-left">
                                <div class="w3-col l6 w3-padding-bottom">
                                    <span class="w3-center w3-margin-right bluishGreen_txt"><b>'.$key['job_name'].'</b></span>
                                </div> 

                                </div>
                                
                                <div class="row w3-col l12 w3-padding-left">
                                <div class="w3-col l6 w3-padding-bottom">
                                    <span><b>'.$key['company_name'].'</b></span>
                                </div>                                                                                               
                                </div>
                                 
                                <div class="row w3-col l12 w3-padding-left">                                
                                <div class="w3-padding-bottom w3-col l12" id="SkillId_'.$key['job_id'].'">
                                    <label>Required Skills : </label>
                                </div>
                                </div>                                
                                
                                <div class="row w3-col l12 w3-padding-left"">
                                <div class="w3-col l6 w3-padding-bottom">
                                    <span><b>Salary Range : &nbsp;&nbsp;&nbsp;'.$key['Salary_range'].'</b></span>
                                </div>
                                <div class="w3-col l6 w3-padding-bottom">
                                    <span><b>Positions : &nbsp;&nbsp;&nbsp;'.$key['positions'].'</b></span>
                                </div>
                                </div>
                                                               
                                <div class="row w3-col l12 w3-padding-left">
                                <div class="w3-col l6 w3-padding-bottom">
                                    <span><b>Job Type :&nbsp;&nbsp;&nbsp;'.$key['job_type'].'</b></span>
                                </div> 
                                    <div class="w3-col l6 w3-padding-bottom"">
                                <a title="Applied Candidate" class="w3-right w3-round-xxlarge w3-padding w3-margin-right btn w3-text-white" style="background-color: #00B59D;" href="'.base_url().'job/job_listings/'.$key['job_id'].'">View Details</a>                                                                   
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-------------------------------------------- div for job description------------------------------------------------>                       
                    </div>
                    <script>
                            $(document).ready(function () {
                               FetchSkills(\''.$key['job_id'].'\',\''.$key['skills'].'\');
                             });
                    </script>';            
            }
        }else{
            echo '<div class="w3-margin-top w3-padding w3-margin-bottom" id="elseDiv">
                    <div class="alert alert-success w3-margin w3-center bluishGreen_bg" style="text-align: center;">No records Found.</div>
                </div>';
        }

    }
    public function getClosed_Jobs(){
        $path = base_url();
        $url = $path . 'api/JobListing_api/getClosed_Jobs';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        if($response['status']== 200){
            $hide='';
            foreach($response['status_message'] as $key){
                if($key['is_active'] == 0){
                    $hide = 'w3-hide';
                }                                      
                
           echo'<div class="w3-margin-top w3-border-bottom w3-card-2 w3-margin-bottom" id="JobList_Div">
                        <!-------------------------------------------- div for project description------------------------------------------------>
                        <div class="row w3-margin-bottom w3-padding ">
                            <div class="w3-col l12 w3-padding-left">
                                <button title="Close Job" class=" w3-right w3-black w3-round-xxlarge w3-padding-tiny btn '.$hide.'" onclick="CloseJob('.$key['job_id'].');"><i class="fa fa-close"></i></button>                                   
                                <div class="row w3-col l12 w3-margin-top w3-padding-left">
                                <div class="w3-col l6 w3-padding-bottom">
                                    <span class="w3-center w3-margin-right bluishGreen_txt"><b>'.$key['job_name'].'</b></span>
                                </div> 

                                </div>
                                
                                <div class="row w3-col l12 w3-padding-left">
                                <div class="w3-col l6 w3-padding-bottom">
                                    <span><b>'.$key['company_name'].'</b></span>
                                </div>                                                                                               
                                </div>
                                 
                                <div class="row w3-col l12 w3-padding-left">                                
                                <div class="w3-padding-bottom w3-col l12" id="SkillId_'.$key['job_id'].'">
                                    <label>Required Skills : </label>
                                </div>
                                </div>                                
                                
                                <div class="row w3-col l12 w3-padding-left"">
                                <div class="w3-col l6 w3-padding-bottom">
                                    <span><b>Salary Range : &nbsp;&nbsp;&nbsp;'.$key['Salary_range'].'</b></span>
                                </div>
                                <div class="w3-col l6 w3-padding-bottom">
                                    <span><b>Positions : &nbsp;&nbsp;&nbsp;'.$key['positions'].'</b></span>
                                </div>
                                </div>
                                                               
                                <div class="row w3-col l12 w3-padding-left">
                                <div class="w3-col l6 w3-padding-bottom">
                                    <span><b>Job Type :&nbsp;&nbsp;&nbsp;'.$key['job_type'].'</b></span>
                                </div> 
                                   
                                </div>
                            </div>
                        </div>
                        <!-------------------------------------------- div for project description------------------------------------------------>                       
                    </div>
            
                    <script>
                            $(document).ready(function () {
                               FetchSkills(\''.$key['job_id'].'\',\''.$key['skills'].'\');
                             });
                    </script>';            
            }
        }else{
            echo '<div class="w3-margin-top w3-padding w3-margin-bottom" id="elseDiv">
                    <div class="alert alert-success w3-margin w3-center bluishGreen_bg" style="text-align: center;">No records Found.</div>
                </div>';
        }
   
        
    }

}
