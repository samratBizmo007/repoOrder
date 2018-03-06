<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');

class PostJob_api extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('job_model/Post_job_model');
        date_default_timezone_set('Asia/Kolkata'); //set Kuwait's timezone
    }

    public function SaveJOB_post() {
        extract($_POST);
        $data = $_POST;
        $result = $this->Post_job_model->SaveJOB($data);
        return $this->response($result);
    }
//-------------this fun is used to get count of the jobs-----------------------//
    public function getCountOf_Jobs_get() {
        $result = $this->Post_job_model->getCountOf_Jobs();
        return $this->response($result);
    }
//-------------this fun is used to get count of the jobs-----------------------//

}
