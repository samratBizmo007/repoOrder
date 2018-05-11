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
        $data=$_POST;
        $result = $this->login->registerCustomer($data);
        return $this->response($result);
    }

    // -----------------------seller REGISTER API----------------------//
      public function registerSeller_post() {
        $data=$_POST;
        $result = $this->login->registerSeller($data);
        return $this->response($result);
    }
    //-------------------------------------------------------------// 
    // -----------------------seller REGISTER API----------------------//
    //-------------------------------------------------------------//
    public function send_otpForMobile_post() {
        extract($_POST);
        $result = $this->login->send_otpForMobile($register_username, $register_email);
        return $this->response($result);
    }

    // -----------------------USER REGISTER API----------------------//
    //-------------------------------------------------------------// 
    // -----------------------USER LOGIN API----------------------//
    //-------------------------------------------------------------//
    public function loginCustomer_post() {
        extract($_POST);
        $result = $this->login->loginCustomer($login_username, $login_password);
        return $this->response($result);
    }

    //---------------------USER LOGIN END------------------------------//
    // -----------------------ADMIN LOGIN API----------------------//
    //-------------------------------------------------------------//
    public function adminLogin_post() {
        extract($_POST);
        $result = $this->login->adminLogin($login_username, $login_password);
        return $this->response($result);
    }

    //---------------------ADMIN LOGIN END------------------------------//
    //-----------user logout ---------------//
    public function logout_get() {
        extract($_GET);
        $result = $this->login->logout_user($user_id);
        return $this->response($result);
    }

    //-----------user logout ---------------//
    //---------------------verify otp---------//
    public function verify_otp_post() {
        extract($_POST);
        $result = $this->login->verify_otp($register_username, $register_email, $register_password, $register_mobile_no, $register_address, $OTP_id);
        return $this->response($result);
    }

    //---------------------veerify otp---------//
//---------------------veerify otp for Mobile---------//
    public function verify_otpForRegisterCustomer_post() {
        extract($_POST);
        $result = $this->login->verify_otpForRegisterCustomer($register_username, $register_email, $register_password, $register_mobile_no, $register_address, $OTP_id);
        return $this->response($result);
    }

//---------------------veerify otp for Mobile---------//

    // -----------------------GET USER PASSWORD BY EMAIL API----------------------//
    //-------------------------------------------------------------//
    public function getPassword_post(){
        extract($_POST);
        $result = $this->login->getPassword($forget_email);
        return $this->response($result);            
    }
    //---------------------GET USER PASSWORD BY EMAIL END------------------------------//
}
