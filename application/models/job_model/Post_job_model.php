<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Post_job_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    //-----------------------------------------------------------------------------------------//
    public function getCountOf_Jobs(){
        $sql = "SELECT count(*) as jobCount FROM jm_post_job";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            $response = array(
                'status' => 0,
                'status_message' => 'No Project Found.');
        } else {

            foreach ($result->result_array() as $row) {
                $response = $row['jobCount'];
            }
        }
        return $response;
    }
//---------------------------------------------------------------------------------------------
    public function SaveJOB($data) {
        extract($data);
       
        $query = "INSERT INTO jm_post_job(jm_user_id,jm_profile_type,jm_job_type,"
                . "jm_job_post_name,jm_company_name,jm_qualification,"
                . "jm_responsibility,jm_skills,jm_venue_address,"
                . "jm_salary_range,jm_positions,jm_posted_by,"
                . "jm_posted_date,jm_posted_time,is_active,jm_job_country,jm_job_state,jm_job_city,categories)"
                . "values('$user_id','$profile_type','$select_jobType','$jobpost_name',"
                . "'$Company_name','$Requirements','$Responsibility',"
                . "'$skill','$Address','$Salary_range','$Positions',"
                . "'$user_id',now(),now(),'1','".addslashes($user_country)."','".addslashes($user_state)."','".addslashes($Job_Location)."','$categories')";
        //echo $query; die();
        $result = $this->db->query($query);
        if (!$result) {
           $response = array(
                'status' => 500,
                'status_message' => 'Job Posted Failed..!!');
        } else {
             $response = array(
                'status' => 200,
                'status_message' => 'Job Posted...!!');
        }
        return $response;
    }

}
