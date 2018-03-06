<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

error_reporting(E_ERROR | E_PARSE);

class Applied_candidate_lists extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //start session	
        $this->load->model('job_model/Applied_candidatelist_model');
        $this->load->helper('file');
        $this->load->helper('download');
         //$this->load->helper('url');
         //$this->load->helper('csv');
        $user_id = $this->session->userdata('user_id');
        $user_name = $this->session->userdata('user_name');
        $profile_type = $this->session->userdata('profile_type');
        //check session variable set or not, otherwise logout
        if (($user_id == '') || ($user_name == '') || ($profile_type == '')) {
            redirect('auth/login');
        }
    }

    public function index() {

    }
//----this fun is used to get the shortlisted candidates-------//
    public function getShortlistedcandidates(){
        extract($_POST);
        $path = base_url();
        $url = $path . 'api/AppliedCandidate_Lists_api/getShortlistedcandidates?job_id='.$job_id;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        //print_r($response);die();
        $count = 1;
        $color = '';
        if ($response['status'] == 200) {
            foreach ($response['status_message'] as $key) {
                
                foreach($key as $i){ 
                    
                if ($i['status'] == '3') {
                    $color = 'w3-text-green';
                    $status = 'Shortlisted';
                }
                echo '<tr class="text-center">
                <td class="text-center">'.$count . '.</td>
                <td class="text-center">#-JID0'.$i['jm_job_id'].'</td>
                <td class="text-center">'.$i['jm_candidate_name'].'</td>
                <td class="text-center">'.$i['jm_email_id'].'</td>
                <td class="text-center">'.$i['jm_message'].'</td>
                <td class="text-center"><a class="btn w3-medium" title="Download Resume" href="'.base_url().'job/Applied_candidate_lists/download/'.$i['jm_applieduser_id'] . '"><i class="fa fa-download"></i></a></td>
                <td class="text-center '.$color.'">'.$status.'</td>                                        
                </tr>';
                $count++;
                }
            }
        } else {
            echo'<tr><td style="text-align: center;" colspan = "9">No Records Found...!</td></tr>';
        }
    }
    //----this fun is used to get the shortlisted candidates-------//

    //---------------download user resume----------------------//
    public function download($user_id = '') {
        $path = base_url();
        $url = $path . 'api/AppliedCandidate_Lists_api/download?user_id='.$user_id;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        $file = explode("/", $response);
        $file_name = $file[2];
        $file = base_url().$response;
        $data =   file_get_contents($file);            
        force_download($file_name,$data);        
    }
    // -----------------download function ends---------------//

    public function DownloadCsv(){
        extract($_GET);
        //print_r($_GET);die();
        $path = base_url();
        $url = $path . 'api/AppliedCandidate_Lists_api/DownloadCsv?job_id='.$job_id;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        // print_r($response['status_message']);die();
        // file name 
        $filename = 'Applied_CandidatesFor- '.$response['job_name'].'_'.date('Ymd').'.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");

// get data 
        $usersData = $response['status_message'];

// file creation 
        $file = fopen('php://output', 'w');

        $header = array("Candidate id", "Candidate Name", "Candidate Email", "Contact_no", "Message", "Applied Date", "Applied Time", "Candidate Resume", "Job_id", "User_id", "Status");
        fputcsv($file, $header);
        foreach ($usersData as $key => $line) {
            fputcsv($file, $line);
        }
        fclose($file);
        exit;
    }

    public function SaveStatus(){
        extract($_POST);
       // print_r($_POST);die();
        if($candidate_id == ''){
            echo'<div class="alert alert-danger w3-margin" style="text-align: center;">
            <strong>Please Select At Least One Candidate...!</strong> 
            </div>    
            ';
            die();
        }
        if($Candidate_Status == '0'){
            echo'<div class="alert alert-danger w3-margin" style="text-align: center;">
            <strong>Please Select Status...!</strong> 
            </div>    
            '; 
            die();
        }
        $candidate_id = json_encode($candidate_id);
        $path = base_url();
        $url = $path.'api/AppliedCandidate_Lists_api/SaveStatus?candidate_id='.$candidate_id.'&Candidate_Status='.$Candidate_Status;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        //print_r($response_json);
        if ($response['status'] == 200) {
            echo'<div class="alert alert-success w3-margin" style="text-align: center;">
            <strong>' . $response['status_message'] . '</strong> 
            </div>    
            ';
        } else {
            echo'<div class="alert alert-danger w3-margin" style="text-align: center;">
            <strong>' . $response['status_message'] . '</strong> 
            </div>    
            ';
        }
    }

    // ------------------HIRE CANDIDATE FOR JOB---------------------//
    public function hireSelectedStudents(){
        extract($_POST);
       // print_r($_POST);die();
        if($candidate_id == ''){
            echo'<div class="alert alert-danger w3-margin" style="text-align: center;">
            <strong>Please Select At Least One Candidate...!</strong> 
            </div>    
            ';
            die();
        }
        $candidate_id = json_encode($candidate_id);

        $path = base_url();
        $url = $path.'api/AppliedCandidate_Lists_api/hireSelectedStudents?candidate_id='.$candidate_id.'&job_id='.$job_id;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        //print_r($response_json);die();
        if ($response['status'] == 200) {
            echo'<div class="alert alert-success" style="margin-bottom:5px">
            <strong>'.$response['status_message'].'</strong> 
            </div>
            <script>
            window.setTimeout(function() {
              $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
                 $(this).remove(); 
             });
             window.location.href="'.base_url().'profile/dashboard";
         }, 100);
         </script>';
     } else {
        echo'<div class="alert alert-danger" style="margin-bottom:5px">
        <strong>'.$response['status_message'].'</strong> 
        </div>
        <script>
        window.setTimeout(function() {
          $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
             $(this).remove(); 
         });
         window.location.href="'.base_url().'profile/dashboard";
     }, 100);
     </script>    
     ';
 }            
}
    //----------------------------ENDS-----------------------------------//
}
