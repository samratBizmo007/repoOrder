<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');

class Userprofile_api extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model/Userprofile_model');
        //date_default_timezone_set('Asia/Kolkata');	//set Kuwait's timezone
    }

    public function getUserDetails_get() {
        extract(getallheaders());

        // ------if user_id not found-------------
        if ($user_id=='') {
            $this->response([
                'status' => 500,
                'status_message' => 'User ID field is empty. All parameters are required!'
            ], REST_Controller::HTTP_PRECONDITION_FAILED);
            die();
        }

        $result = $this->Userprofile_model->getUserDetails($user_id);

        if(!empty($result)){
            $this->response([
                'status' => 200,
                'PRODUCTIMAGE_PATH' => PRODUCTIMAGE_PATH,
                'PROFILEIMAGEPATH' => PROFILEIMAGE_PATH,
                'status_message' => $result['status_message']
            ], REST_Controller::HTTP_OK);
        }
        else{
            $this->response([
                'status' => 500,
                'status_message' => 'No data found for this user'
            ], REST_Controller::HTTP_PRECONDITION_FAILED);
        }
    }

    public function getProductCountBy_userid_get() {
        extract($_GET);
        $result = $this->Userprofile_model->getProductCountBy_userid($user_id);
        return $this->response($result);
    }

}
