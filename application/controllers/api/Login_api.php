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
        $result = $this->login->registerCustomer($register_username, $register_email, $register_password, $register_mobile_no, $register_address);
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
    
    //-----------user logout ---------------//
    	public function logout_get()
    	{
		extract($_GET);
		$result = $this->login->logout_user($user_id);
		return $this->response($result);			
	  }
	  //---------------------veerify otp---------//
       public function verify_otp_post() {
        extract($_POST);
        $result = $this->login->verify_otp($register_username, $register_email, $register_password, $register_mobile_no, $register_address,$OTP_id);
        return $this->response($result);
    }

}
