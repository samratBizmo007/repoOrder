<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');

class Editprofile_api extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model/Editprofile_model');
        //date_default_timezone_set('Asia/Kolkata');	//set Kuwait's timezone
    }

//--------fun for update profile-----------------------//

    public function updateProfile_post() {
        $data = ($_POST);
        $result = $this->Editprofile_model->updateProfile($data);
        return $this->response($result);
    }

//--------fun for update profile ends here-----------------------//
    //----------fun for change password------------------------//
    public function changePassword_post() {
        $data = ($_POST);
        $result = $this->Editprofile_model->changePassword($data);
        return $this->response($result);
    }

    //--------------fun ends here-----------------------------//
}
