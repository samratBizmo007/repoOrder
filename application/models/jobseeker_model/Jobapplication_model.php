<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jobapplication_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('dashboard_model/Dashboard_model');
    }
    public function checkAlreadyApplied($job_id,$user_id){
       $sqlSelect = "SELECT * FROM jm_applied_candidates WHERE jm_job_id='$job_id' AND jm_applieduser_id='$user_id'";
        $result = $this->db->query($sqlSelect);
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
//-------------get the details of the job -----------------------------------------------------//
    public function getJob_Details($job_id,$user_id,$profile_type){
//-----------get the details of available views and total views of user---------------------------------//
        $sql = "SELECT * FROM jm_user_tab WHERE jm_user_id='$user_id'";
        //echo $sql; die();
        $avail_view = '';
        $total_view = '';
        $RESULT = $this->db->query($sql);
        if ($RESULT->num_rows() > 0) {
            foreach ($RESULT->result_array() as $key) {
                $avail_view = $key['avail_view'];
                $total_view = $key['total_view'];
                //print_r($key);die();
            }
        }
//-----------get the details of available views and total views of user---------------------------------//
//-----------Checking the available view value is not null or -1---------------------------------//
        //if ($avail_view != -1) {
//-----------if available view value is -1 then checking the available view value is 0 or profile type== jobseeker---------------------------------//

            if ($avail_view == 0 && $profile_type == 3) {
                $response = array(
                    'status' => 500,
                    'status_message' => 'You Can Apply Only 3 Jobs.<br> To Apply More, Subscribe To Our Premium Membership Plan.');
                return $response;
                die();
//-----------if available view value is 0 or profile type == jobseeker it returns the above message---------------------------------//
//-----------else update the availbe view value subtract by -1 WHERE user_id is ---------------------------------//
                
            } 
//            else {
//                $update = "UPDATE jm_user_tab SET avail_view = (avail_view - 1) WHERE jm_user_id = '$user_id'";
//                $this->db->query($update);
//            }
//-----------else update the availbe view value subtract by -1 WHERE user_id is ---------------------------------//            
       // } 
//----------get the details of the jobs as per the job id------------------------------------------------------//
            $sqlSelect = "SELECT * FROM jm_post_job WHERE jm_jobpost_id='$job_id'";
            //echo $sqlSelect;die();
            $result = $this->db->query($sqlSelect);
            if ($result->num_rows() <= 0) {
                $response = array(
                    'status' => 500,
                    'status_message' => 'No Jobs Found.');
            } else {
                $response = array(
                    'status' => 200,
                    'status_message' => $result->result_array());
            }        
        return $response;
    }
//-------------get the details of the job -----------------------------------------------------//

    public function saveApplication($data){
        extract($data);
        //print_r($data);die();
        
        $sql = "SELECT * FROM jm_user_tab WHERE jm_user_id='$user_id'";
        //echo $sql; die();
        $avail_view = '';
        $total_view = '';
        $RESULT = $this->db->query($sql);
        if ($RESULT->num_rows() > 0) {
            foreach ($RESULT->result_array() as $key) {
                $avail_view = $key['avail_view'];
                $total_view = $key['total_view'];
                //print_r($key);die();
            }
        }

           if ($avail_view != -1) {
            if ($avail_view == 0 && $profile_type == 3) {
                $response = array(
                    'status' => 500,
                    'status_message' => 'You Can Apply Only 3 Jobs.<br> To Apply More, Subscribe To Our Premium Membership Plan.');
                return $response;
                die();
//-----------if available view value is 0 or profile type == jobseeker it returns the above message---------------------------------//
//-----------else update the availbe view value subtract by -1 WHERE user_id is ---------------------------------//
            } else {
                $update = "UPDATE jm_user_tab SET avail_view = (avail_view - 1) WHERE jm_user_id = '$user_id'";
                $this->db->query($update);
            }
//-----------else update the availbe view value subtract by -1 WHERE user_id is ---------------------------------// 
        }
        $sqlSelect = "SELECT * FROM jm_applied_candidates WHERE jm_job_id='$job_id' AND jm_applieduser_id='$user_id'";
        $result = $this->db->query($sqlSelect);
        if($result->num_rows() <= 0){
           $insert = "INSERT INTO jm_applied_candidates(jm_candidate_name,jm_email_id,"
                   . "jm_contact_no,jm_message,jm_applied_date,jm_applied_time,"
                   . "jm_file_resume,jm_job_id,jm_applieduser_id,status) "
                   . "values('$candidate_name','$Email_id','$contact_no',"
                   . "'$message',now(),now(),'$File_path','$job_id','$user_id','')";
           
           $resultInsert = $this->db->query($insert);
            
            if ($resultInsert) {
                $response = array(
                    'status' => 200,
                    'status_message' => 'Applied Successfully..!');
            } else {
                $response = array(
                    'status' => 500,
                    'status_message' => 'Application Failed...!');
            }
           
        }else{
                $response = array(
                    'status' => 500,
                    'status_message' => 'Already Applied...!');
        }
        
        return $response;
    }
}