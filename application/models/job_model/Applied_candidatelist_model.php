<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Applied_candidatelist_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('dashboard_model/Dashboard_model');
    }
    
    //-----------this fun is used to get the shortlisted candidates-------//
    public function getShortlistedcandidates($job_id){
        $SqlSelect = "SELECT * FROM jm_post_job WHERE jm_jobpost_id ='$job_id'";
        //echo $SqlSelect;die();
        $result = $this->db->query($SqlSelect);
        $selectedCandidates = '';

        if ($result->num_rows() >= 1) {
            foreach ($result->result_array() as $key) {
                $selectedCandidates = json_decode($key['selected_candidates']);    //----getting job name                
            }
        }
       // print_r(( $selectedCandidates);die();
        $arr = array();
        foreach ($selectedCandidates as $id) {
            $Select = "SELECT * FROM jm_applied_candidates WHERE jm_applieduser_id ='$id'";
            $output = $this->db->query($Select);
            $arr[] = $output->result_array();
        }
        if ($output->num_rows() > 0) {
            $response = array(
                'status' => 200,
                'status_message' => $arr);
        } else {
            $response = array(
                'status' => 500,
                'status_message' => 'No records Found.');
        }
        return $response;
    }
    //-----------this fun is used to get the shortlisted candidates-------//

    //--------------------------------------------------------------
    public function showApplied_candidate_list($job_id){
        $SqlSelect = "SELECT * FROM jm_applied_candidates WHERE jm_job_id ='$job_id'";
        $result = $this->db->query($SqlSelect);
        if ($result->num_rows() <= 0) {
            $response = array(
                'status' => 500,
                'status_message' => 'No Skills Found.');
        } else {
            $response = array(
                'status' => 200,
                'status_message' => $result->result_array());
        }
        return $response;
    }
    //---------------------------------------------------------------------
    //-------------------------------------------------------------------------
    public function DownloadCsv($job_id){
        $response = array();

        $sqlselect = "SELECT * FROM jm_post_job WHERE jm_jobpost_id ='$job_id'";
        $result = $this->db->query($sqlselect);
        $job_name = '';
        if ($result->num_rows() >= 1) {
            foreach ($result->result_array() as $key) {
                $job_name = $key['jm_job_post_name'];    //----getting job name
            }
        }
        $querynew = "SELECT * FROM jm_applied_candidates WHERE jm_job_id='$job_id'";
        $query = $this->db->query($querynew);
        // Select record
        
         if ($query->num_rows() <= 0) {
            $response = array(
                'status' => 500,
                'status_message' => 'No records Found.');
        } else {
            $response = array(
                'status' => 200,
                'status_message' => $query->result_array(),
                'job_name' => $job_name);
        }
        return $response;
    }
    //-------------this fun is used to set the status for applied candidates----------------//
    public function SaveStatus($Candidate_Status,$candidate_id){
        foreach(json_decode($candidate_id) as $id){
            $sqlUpdate = "UPDATE jm_applied_candidates SET status='$Candidate_Status' WHERE jm_applieduser_id='$id'";
            $result = $this->db->query($sqlUpdate);
        }
        if ($result) {
            $response = array(
                'status' => 200,
                'status_message' => 'Status Updated Successfully..!');
        } else {
            $response = array(
                'status' => 500,
                'status_message' => 'Status Update Failed..!');
        }
        return $response;

    }
    //-------------this fun is used to set the status for applied candidates----------------//
    //-------------this fun is used to hire the applied candidates with status shortlisted----------------//
    
    public function hireSelectedStudents($candidate_id,$job_id){
        
    //--------checking the selected candidates are having the status shortlisted 
        
    $selectedCandiate_Status = Applied_candidatelist_model::getShortlistedCanfidate_status($candidate_id, $job_id);
    
    //--------checking the selected candidates are having the status shortlisted  
        if ($selectedCandiate_Status['status'] == 200) {

            $sqlUpdate = "UPDATE jm_post_job SET selected_candidates = '$candidate_id', is_active='0' WHERE jm_jobpost_id='$job_id'";
            //echo $sqlUpdate;die();
            //---checking the upadete candidats list updated successfully-----------------//
            if ($this->db->query($sqlUpdate)) {
                //-----fetching the job details from job table using job id-------------//
                $sqlselect = "SELECT * FROM jm_post_job WHERE jm_jobpost_id ='$job_id'";
                $result = $this->db->query($sqlselect);

                $job_name = '';
                $company_name = '';

                if ($result->num_rows() >= 1) {
                    foreach ($result->result_array() as $key) {
                        $job_name = $key['jm_job_post_name'];    //----getting job name
                        $company_name = $key['jm_company_name'];  //----geting company name
                    }
                }
                //-------sending mail functionality by applied candidate id-------------------//
                foreach (json_decode($candidate_id) as $id) {

                    $sqlSelect = "SELECT * FROM jm_user_tab WHERE jm_user_id='$id'";
                    $output = $this->db->query($sqlSelect);

                    $email_id = '';
                    $username = '';

                    if ($output->num_rows() >= 1) {

                        foreach ($output->result_array() as $row) {
                            $email_id = $row['jm_email_id'];
                            $username = $row['jm_username'];
                        }
                        //print_r($email_id);
                        //------send mail function starts here-------------//              
                        $selected_CandidateEmail_Response = Applied_candidatelist_model::sendMail_ToSelected_Candidates($email_id, $job_name, $company_name, $username);
                        //------send mail function ends here-------------//

                        if ($selected_CandidateEmail_Response['status'] == 200) {
                            $response = array(
                                'status' => 200,
                                'status_message' => 'Email Sent To The Selected Candidates!');
                        } else {
                            $response = array(
                                'status' => 500,
                                'status_message' => 'Mail Sending Failed!');
                        }
                    }
                }          //-------sending mail functionality by applied candidate id-------------------//
            } else {
                $response = array(
                    'status' => 500,
                    'status_message' => 'Hire Job Seekers Failed!');
            }            
            
        } else {
            $response = array(
                'status' => 500,
                'status_message' => 'Candidates Not Shortlisted..!. Please Select Candidates With Status Shortlisted..!');
        }
        return $response;
    }
    // ------------------fucntion ends here-0-----//
    //-------------this fun is used to hire the applied candidates with status shortlisted----------------//
    //-------------this fun is used to download the resume of that applied candidate----------------//

public function download($user_id){
    $SqlSelect = "SELECT * FROM jm_applied_candidates WHERE jm_applieduser_id ='$user_id'";
    $result = $this->db->query($SqlSelect);
    $path = '';
    if ($result->num_rows() <= 0) {
        $path = array(
            'status' => 500,
            'status_message' => 'No Skills Found.');
    } else {
     foreach ($result->result_array() as $row) {
        $path = $row['jm_file_resume'];
    }
}
return $path;
}
    //-------------this fun is used to download the resume of that applied candidate----------------//

//-------this fun is used to send email to the selected candidates 
public function sendMail_ToSelected_Candidates($email_id,$job_name,$company_name,$username){
     $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'mx1.hostinger.in',
            'smtp_port' => '587',
            'smtp_user' => 'customercare@jobmandi.in', // change it to yours
            'smtp_pass' => 'Descartes@1990', // change it to yours
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );
           $config['smtp_crypto'] = 'tls';
             
            $current_date = date('Y-m-d');                
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from('customercare@jobmandi.in', "Admin Team");
            $this->email->to($email_id);
            $this->email->subject("JOBMANDI-Job Selection");
//            $this->email->message('<html>'
//                . '<head>'
//                . '<title>Congratulations...!</title>'
//                . '</head>'
//                . '<body>'                        
//                . '<form action="/action_page.php">'
//                . '<fieldset>'
//                . '<legend>Congratulations...! - '.$username.'</legend>'
//                . '<p><label>You Have Been Selected For Your Applied Job Position- '.$job_name.'</label></p>'
//                . '<p><label>Company Name- '.$company_name.'</label></p>'
//                . '<a class="btn" href="'. base_url().'auth/login?profile=3">login</a>'
//                . '</fieldset>'
//                . '</form>'
//                . '</body>'
//                . '</html>');

                
            $this->email->message('<html>
			<head>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link rel="stylesheet" href="http://jobmandi.in/css/bootstrap/bootstrap.min.css">
			<script src="http://jobmandi.in/css/bootstrap/jquery.min.js"></script>
			<script src="http://jobmandi.in/css/bootstrap/bootstrap.min.js"></script>
			</head>
			<body>
			<div class="container col-lg-8" style="box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important;margin:10px; font-family:Candara;">
			<img class="w3-border" style="width:100px;height:auto; margin-left:auto; margin-right: auto;" src="http://jobmandi.in/images/desktop/logo-main.png">
			<h2 style="color:#4CAF50; font-size:30px">Congratulations...!</h2>
			<h3 style="font-size:15px;">Hello '.$username.',<br>You Have Been Selected For Your Applied Job Position- <b>'.strtoupper($job_name).'</b>.<br><br>Company Name- :<b>'.strtoupper($company_name).'</b></h3>
			<div class="col-lg-12">
			<div class="col-lg-4"></div>
			<div class="col-lg-4">
			<a href="'.base_url().'auth/login?profile=3" type="button" style="background-color:#4CAF50; color:white;padding:3px" class="btn btn-md">Go To Login Page</a>
			</div>
			<div class="col-lg-4"></div>
			</div>
			<hr>
			<h4 style="font-size:15px;"><b>Questions?</b></h4>
			<h4 style="font-size:15px;">Please let us know if there is anything we can help you with by replying this email.<br><br>Thanks, <b>Admin Team</b></h4>
			</div>
			</body></html>');
                
                
                //$this->email->send(); //----send email function
            if (!$this->email->send()) {
                $response = array(
                    'status' => 500,
                    'status_message' => 'Mail Sending Failed!');
            } else {
                $response = array(
                    'status' => 200,
                    'status_message' => 'Email Sent Successfully...!');
            }
        
        return $response;
}
//-------this fun is used to send email to the selected candidates 

//--------this fun is used for--------checking the selected candidates are having the status shortlisted  

public function getShortlistedCanfidate_status($candidate_id,$job_id){
    
    foreach (json_decode($candidate_id) as $userid){
        $sqlSelect = "SELECT * FROM jm_applied_candidates WHERE jm_applieduser_id = '$userid' AND jm_job_id = '$job_id'";
        //print_r ($sqlSelect);die();
        $status = '';
            $result = $this->db->query($sqlSelect);
            
            if ($result->num_rows() >= 1) {           
                foreach ($result->result_array() as $row) {
                    $status = $row['status'];
                }
            }
            
            if ($status != 3) {
                $response = array(
                    'status' => 500,
                    'status_message' => 'Candidates Not Shortlisted..!. Please Select Candidates With Status Shortlisted..!');
                break;
            } else {
                $response = array(
                    'status' => 200,
                    'status_message' => 'All Candidates Shortlisted...!');
            }
        }
        return $response;
    }

//--------this fun is used for--------checking the selected candidates are having the status shortlisted  

}
