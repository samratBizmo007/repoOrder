<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');

class JobListing_api extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('job_model/Job_listing_model');
        date_default_timezone_set('Asia/Kolkata'); //set Kuwait's timezone
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function getAllJob_Details_get(){
        $result = $this->Job_listing_model->getAllJob_Details($_GET['user_id']);
        return $this->response($result);
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function getAllJobs_get(){
        extract($_GET);
        $result = $this->Job_listing_model->getAllJobs($per_page,$offset);
        return $this->response($result);
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function getAll_BookmarkedJobs_get(){
        extract($_GET);
        $result = $this->Job_listing_model->getAll_BookmarkedJobs($user_id);
        return $this->response($result); 
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function add_bookmarkForJob_get(){
        extract($_GET);
        $result = $this->Job_listing_model->add_bookmarkForJob($user_id,$job_id);
        return $this->response($result);
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function del_bookmarkForJob_get(){
        extract($_GET);
        $result = $this->Job_listing_model->del_bookmarkForJob($user_id,$job_id);
        return $this->response($result);
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function getAllJob_Details_param_get(){
        extract($_GET);
        $result = $this->Job_listing_model->getAllJob_Details_param($per_page, $offset, $param);
        return $this->response($result);
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function FetchSkills_get(){
        extract($_GET);
        $result = $this->Job_listing_model->FetchSkills($Skills);
        return $this->response($result);        
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function CloseJob_get(){
        extract($_GET);
        $job_id = $_GET['job_id'];
        $result = $this->Job_listing_model->CloseJob($job_id);
        return $this->response($result);
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    
    public function getClosed_Jobs_get(){
        $result = $this->Job_listing_model->getClosed_Jobs();
        return $this->response($result); 
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function getRecentJobs_get(){
         $result = $this->Job_listing_model->getRecentJobs();
        return $this->response($result);
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}