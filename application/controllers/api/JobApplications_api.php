<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');

class JobApplications_api extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('jobseeker_model/Jobapplication_model');
        date_default_timezone_set('Asia/Kolkata'); //set Kuwait's timezone
    }
    public function getJob_Details_get(){
        extract($_GET);
        $result = $this->Jobapplication_model->getJob_Details($job_id,$user_id,$profile_type);
        return $this->response($result);
    
    }
    public function saveApplication_post(){
        $data = $_POST;
        $response = $this->Jobapplication_model->saveApplication($data);
        return $this->response($response);
    }
    public function checkAlreadyApplied_get(){
        extract($_GET);
        $result = $this->Jobapplication_model->checkAlreadyApplied($job_id,$user_id);
        return $this->response($result);
    }
    
	
}
