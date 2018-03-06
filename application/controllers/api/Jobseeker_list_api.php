<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');

class Jobseeker_list_api extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('jobseeker_model/Jobseeker_list_model');
        date_default_timezone_set('Asia/Kolkata'); //set Kuwait's timezone
    }
    
    public function all_jobSeeker_get(){
        $result = $this->Jobseeker_list_model->all_jobSeeker();
        return $this->response($result);
    }

}
