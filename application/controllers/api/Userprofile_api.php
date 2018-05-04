<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');

class Userprofile_api extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model/Userprofile_model');
        //date_default_timezone_set('Asia/Kolkata');	//set Kuwait's timezone
    }
    
    public function getUserDetails_get(){
        extract($_GET);
        $result = $this->Userprofile_model->getUserDetails($username);
        return $this->response($result);
    }
}