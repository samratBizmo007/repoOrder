<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Job_listing_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('dashboard_model/Dashboard_model');
    }
    public function getRecentJobs(){
     $SqlSelect = "SELECT * FROM jm_post_job WHERE is_active ='1' ORDER BY jm_posted_date DESC LIMIT 20";
     $result = $this->db->query($SqlSelect);
     if ($result->num_rows() <= 0) {
        $response = array(
            'status' => 500,
            'status_message' => 'No Skills Found.');
    }else{
     $response = array(
        'status' => 200,
        'status_message' => $result->result_array());
 }  
 return $response;
}

public function getAllJob_Details($user_id) {
    $SqlSelect = "SELECT * FROM jm_post_job WHERE is_active ='1' AND jm_user_id = '$user_id' ORDER BY jm_posted_date DESC";
    $result = $this->db->query($SqlSelect);
    if ($result->num_rows() <= 0) {
        $response = array(
            'status' => 500,
            'status_message' => 'No Skills Found.');
    } else {
        $skill_details = array();
        $jobs = '';
        $jobDetails = array();
        $skills = '';
        foreach ($result->result_array() as $row) {
            $skills = $row['jm_skills'];

            $jobs = array(
                'job_id' => $row['jm_jobpost_id'],
                'job_name' => $row['jm_job_post_name'],
                'job_type' => $row['jm_job_type'],
                'company_name' => $row['jm_company_name'],
                'qualification' => $row['jm_qualification'],
                'responsibility' => $row['jm_responsibility'],
                'Address' => $row['jm_venue_address'],
                'Salary_range' => $row['jm_salary_range'],
                'positions' => $row['jm_positions'],
                'Active' => $row['is_active'],
                'city' => $row['jm_job_city'],
                'skills' => $skills
            );
            $jobDetails[] = $jobs;

        }             
        $response = array(
            'status' => 200,
            'status_message' => $jobDetails);
    }
        //print_r($jobs);die();
    return $response;
}
//------------------------------------------------------------------------------------------------------//
public function getAll_BookmarkedJobs($user_id) {
    $query = $this->db->select('*')
    ->from('jm_userprofile_tab')
    ->where('jm_user_id', $user_id)
    ->get();
    if ($query->num_rows() > 0) {
        $response = array(
            'status' => 200,
            'status_message' => $query->result_array());
    } else {
        $response = array(
            'status' => 500,
            'status_message' => 'Records Not Found.');
    }
    return $response;
}

    //--------------------------------------------------------------------------------------------------------//
public function del_bookmarkForJob($user_id,$job_id){

	$query = "SELECT * FROM jm_userprofile_tab WHERE jm_user_id='$user_id'";
    $result = $this->db->query($query);

    if ($result->num_rows() <= 0) {
        $response = array(
            'status' => 500,
            'status_message' => 'Project not Found.');
    } else {
        $extra = array();
        foreach ($result->result_array() as $row) {
            $bookmarked = json_decode($row['jm_job_bookmarks'], TRUE);

            foreach ($bookmarked as $key) {
                    //print_r($key);
                if ($key != $job_id) {
                    $extra[] = $key;
                }
            }
        }
        $update_where = array('jm_user_id =' => $user_id);
        $data = array('jm_job_bookmarks' => json_encode($extra));
        $this->db->where($update_where);

        if ($this->db->update('jm_userprofile_tab', $data)) {
            $response = array(
                'status' => 200,
                'status_message' => 'Bookmark Removed.');
        }
    }
    return $response;
}
    //----------------------------------------------------------------------------------------------------------//
public function add_bookmarkForJob($user_id,$job_id){
        
    //sql query to get all user details (membership package)
    $sql = "SELECT * FROM jm_user_tab WHERE jm_user_id='$user_id'";
    $membership_package = '';
    $result = $this->db->query($sql);
    if ($result->num_rows() > 0) {
        foreach ($result->result_array() as $key){
            $membership_package = $key['membership_package'];

        }
    }
    // --------------fucntion ends here-----------------------

    $query = "SELECT * FROM jm_userprofile_tab WHERE jm_user_id='$user_id'";
        //echo $query;die();
    $result = $this->db->query($query);

    $bookmarked = array();

        //if no record found for user
    if ($result->num_rows() == 0) {

        $bookmarked[] = $job_id;
        $data = array(
            'jm_user_id' => $user_id,
            'jm_job_bookmarks' => json_encode($bookmarked)
        );
           // print_r($data);die();
            //sql query to insert new user skill record if not available
        if ($this->db->insert('jm_userprofile_tab', $data)) {
            $response = array(
                'status' => 200,
                'status_message' => 'Bookmark added.');
        } else {
            $response = array(
                'status' => 500,
                'status_message' => 'Bookmark Addition failed.');
        }
    } else {
        foreach ($result->result_array() as $row) {
            $bookmarked = json_decode($row['jm_job_bookmarks'], TRUE);
        }

        //---------condition for check bookmark count for free membership--------//  
        $count=count($bookmarked);
        if($membership_package=='FREE' && $count>=15)
        {
           $response = array(
            'status' => 500,
            'status_message' => 'You are allowed to bookmark only 15 jobs.<br>To bookmark more subscribe to <quote>Premium Membership Plan</quote>. GoTo Dashboard->View Plans.');
           return $response;
           die();
       }
       // -----------end--------------------

       $bookmarked[] = $job_id;
            //print_r(json_encode($user_skills));die();
       $update_where = array('jm_user_id =' => $user_id);
       $data = array('jm_job_bookmarks' => json_encode($bookmarked));
       $this->db->where($update_where);

       if ($this->db->update('jm_userprofile_tab', $data)) {
        $response = array(
            'status' => 200,
            'status_message' => 'Bookmark For Jobs updated.');
    } else {
        $response = array(
            'status' => 500,
            'status_message' => 'Bookmark Updation failed.');
    }
}
}

//end of function 
    //----------------fucntion ends---------------------//

public function numRows() {
    $query = $this->db->select('*')
    ->from('jm_post_job')
    ->where('is_active', 1)
    ->order_by('jm_posted_date', 'DESC')
    ->get();
    return $query->num_rows();
}

public function getAllJobs($limit, $offset) {
    $result = $this->db->select('*')
    ->from('jm_post_job')
    ->where('is_active', '1')
    ->order_by('jm_posted_date', 'DESC')
    ->limit($limit, $offset)
    ->get();
    //print_r($result);die();
//$result = $this->db->query($SqlSelect);
    if ($result->num_rows() <= 0) {
        $response = array(
            'status' => 500,
            'status_message' => 'No Jobs Found.');
    } else {
        $skill_details = array();
        $jobs = '';
        $jobDetails = array();
        $skills = '';
        foreach ($result->result_array() as $row) {
            $skills = $row['jm_skills'];

            $jobs = array(
                'job_id' => $row['jm_jobpost_id'],
                'job_name' => $row['jm_job_post_name'],
                'job_type' => $row['jm_job_type'],
                'company_name' => $row['jm_company_name'],
                'qualification' => $row['jm_qualification'],
                'responsibility' => $row['jm_responsibility'],
                'Address' => $row['jm_venue_address'],
                'Salary_range' => $row['jm_salary_range'],
                'positions' => $row['jm_positions'],
                'Active' => $row['is_active'],
                'city' => $row['jm_job_city'],
                'skills' => $skills
            );
            $jobDetails[] = $jobs;

        }             
        $response = array(
            'status' => 200,
            'status_message' => $jobDetails);
    }
        //print_r($jobs);die();
    return $response;
}

    // -----------job details for deep linked params-----------//
public function getAllJob_Details_param($limit, $offset, $search_cat) {
    $result = $this->db->select('*')
    ->from('jm_post_job')
    ->where('is_active', 1)
    ->like('jm_job_type', $search_cat)
    ->order_by('jm_posted_date', 'DESC')
    ->limit($limit, $offset)
    ->get();
//$result = $this->db->query($SqlSelect);
    if ($result->num_rows() <= 0) {
        $response = array(
            'status' => 500,
            'status_message' => 'No Jobs Found.');
    } else {
        $skill_details = array();
        $jobs = '';
        $jobDetails = array();
        $skills = '';
        foreach ($result->result_array() as $row) {
            $skills = $row['jm_skills'];

            $jobs = array(
                'job_id' => $row['jm_jobpost_id'],
                'job_name' => $row['jm_job_post_name'],
                'job_type' => $row['jm_job_type'],
                'company_name' => $row['jm_company_name'],
                'qualification' => $row['jm_qualification'],
                'responsibility' => $row['jm_responsibility'],
                'Address' => $row['jm_venue_address'],
                'Salary_range' => $row['jm_salary_range'],
                'positions' => $row['jm_positions'],
                'Active' => $row['is_active'],
                'city' => $row['jm_job_city'],
                'skills' => $skills
            );
            $jobDetails[] = $jobs;

        }             
        $response = array(
            'status' => 200,
            'status_message' => $jobDetails);
    }
        //print_r($jobs);die();
    return $response;
}
//------------------------------------------------------------//

public function FetchSkills($Skills) {
        //print_r($Skills);die();
    foreach (json_decode($Skills, TRUE) as $key) {
        $demo = $this->Dashboard_model->get_skillName($key);
        foreach ($demo['status_message'] as $skill) {
            $extra = array(
                'jm_skill_name' => $skill['jm_skill_name'],
            );
            $skill_details[] = $extra;
        }
    }
    return $skill_details;
}
public function CloseJob($job_id){
    $sqlDelete = "UPDATE jm_post_job SET is_active='0' WHERE jm_jobpost_id='$job_id'";
    $result = $this->db->query($sqlDelete);

    if ($result) {
        $response = array(
            'status' => 200,
            'status_message' => 'Job Closed..!');
    } else {
        $response = array(
            'status' => 500,
            'status_message' => 'Something Went Wrong...!');
    }
    return $response;
}
public function getClosed_Jobs(){
    $SqlSelect = "SELECT * FROM jm_post_job WHERE is_active ='0'";
    $result = $this->db->query($SqlSelect);
    if ($result->num_rows() <= 0) {
        $response = array(
            'status' => 500,
            'status_message' => 'No Skills Found.');
    } else {
        $skill_details = array();
        $jobs = '';
        $jobDetails = array();
        $skills = '';
        foreach ($result->result_array() as $row) {
            $skills = $row['jm_skills'];

            $jobs = array(
                'job_id' => $row['jm_jobpost_id'],
                'job_name' => $row['jm_job_post_name'],
                'job_type' => $row['jm_job_type'],
                'company_name' => $row['jm_company_name'],
                'qualification' => $row['jm_qualification'],
                'responsibility' => $row['jm_responsibility'],
                'Address' => $row['jm_venue_address'],
                'Salary_range' => $row['jm_salary_range'],
                'positions' => $row['jm_positions'],
                'Active' => $row['is_active'],
                'skills' => $skills
            );
            $jobDetails[] = $jobs;

        }             
        $response = array(
            'status' => 200,
            'status_message' => $jobDetails);
    }
        //print_r($jobs);die();
    return $response;
}
}
