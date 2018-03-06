<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');

class Login_api extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('login_cust/login');
        date_default_timezone_set('Asia/Kolkata'); //set Kuwait's timezone
    }

    // -----------------------USER REGISTER API----------------------//
    //-------------------------------------------------------------//
    public function registerCustomer_post() {
        extract($_POST);
        $result = $this->login->registerCustomer($register_username, $register_email, $register_password, $register_mobile_no, $register_address, $register_business_field);
        return $this->response($result);
    }

    // -----------------------USER LOGOUT API----------------------//
    //-------------------------------------------------------------// 
    // -----------------------USER LOGIN API----------------------//
    //-------------------------------------------------------------//
    public function loginCustomer_post() {
        extract($_POST);
        $result = $this->login->loginCustomer($login_username, $login_password);
        return $this->response($result);
    }

    //---------------------USER LOGIN END------------------------------//
        // -----------------------USER LOGIN API----------------------//
    //-------------------------------------------------------------//
    public function adminLogin_post() {
        extract($_POST);
        $result = $this->login->adminLogin($login_username, $login_password);
        return $this->response($result);
    }

    //---------------------USER LOGIN END------------------------------//
}
