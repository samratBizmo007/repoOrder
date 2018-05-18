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
        extract($data);
        //print_r($data);die();

        if(empty($user_role) ){
         //set the response and exit
            $this->response([
                'status' => 500,
                'status_message' => 'Please Select User your role.'
            ], REST_Controller::HTTP_PRECONDITION_FAILED);       
        }
        if(empty($register_username) ){     
            $this->response([
                'status' => 500,
                'status_message' => 'Please Enter User your Username.'
            ], REST_Controller::HTTP_PRECONDITION_FAILED);
        //die();        
        }
        if(empty($register_password) ){

            $this->response([
                'status' => 500,
                'status_message' => 'Please Enter your Password.'
            ], REST_Controller::HTTP_PRECONDITION_FAILED);
        //die();        
        }
        if(empty($register_email) ){

            $this->response([
                'status' => 500,
                'status_message' => 'Please Enter your Email.'
            ], REST_Controller::HTTP_PRECONDITION_FAILED);
        //die();        
        }
        if(empty($register_countryCode) ){
            
            $this->response([
                'status' => 500,
                'status_message' => 'Please Select Country Code.'
            ], REST_Controller::HTTP_PRECONDITION_FAILED);
        //die();        
        }
        if (!(is_numeric($register_mobile_no))) {
           if (empty($register_mobile_no)) {
               $this->response([
                   'status' => 500,
                   'status_message' => 'Please Enter Mobile No.!'], REST_Controller::HTTP_PRECONDITION_FAILED);                 
           } else {
               $this->response([
                   'status' => 500,
                   'status_message' => 'Mobile number should be numeric!'], REST_Controller::HTTP_PRECONDITION_FAILED);
           }
       }


       $result = $this->login->registerCustomer($data);
           // echo $result;
            //check if the user data inserted
       switch ($result) {
        case '1':
        $this->response([
            'status' => 200,
            'status_message' => 'Registration Successfull. Please Login With Your Registered Email-ID..'
        ], REST_Controller::HTTP_OK);
        break;

        case '0':
        $this->response([
            'status' => 500,
            'status_message' => "Something went wrong... Registration Failed!!!"], REST_Controller::HTTP_BAD_REQUEST);
        break;
        case '500':
        $this->response([
            'status' => 500,
            'status_message' => 'Email-ID OR Username already registered. Login by same or try another Email-ID OR Username!!!'
        ], REST_Controller::HTTP_BAD_REQUEST);
        break;
        
        default:
        $this->response([
            'status' => 500,
            'status_message' => "Something went wrong. Request was not send... Registration Failed!!!"], REST_Controller::HTTP_BAD_REQUEST);
        break;
    }
    


        //$result = $this->login->registerCustomer($data);
        //return $this->response();
}

    // -----------------------seller REGISTER API----------------------//
public function registerSeller_post() {
    $data=$_POST;
    extract($data);

    if(empty($user_role) ){
         //set the response and exit
        $this->response([
            'status' => 500,
            'status_message' => 'Please Select User your role.'
        ], REST_Controller::HTTP_PRECONDITION_FAILED);       
    }
    if ($user_role != '2') {
       $this->response([
                 'status' => 500, //---------db error code 
                 'status_message' => 'User Role is not valid!!!'
             ],REST_Controller::HTTP_PRECONDITION_FAILED);           
   }
   if(empty($register_username) ){     
    $this->response([
        'status' => 500,
        'status_message' => 'Please Enter User your Username.'
    ], REST_Controller::HTTP_PRECONDITION_FAILED);
        //die();        
}
if(empty($cat_id)){
    $this->response([
        'status' => 500,
        'status_message' => 'Please Select Category.'
    ], REST_Controller::HTTP_PRECONDITION_FAILED);
        //die();        
}
if(empty($register_email) ){

    $this->response([
        'status' => 500,
        'status_message' => 'Please Enter your Email.'
    ], REST_Controller::HTTP_PRECONDITION_FAILED);
        //die();        
}
if(empty($register_countryCode) ){
    
    $this->response([
        'status' => 500,
        'status_message' => 'Please Select Country Code.'
    ], REST_Controller::HTTP_PRECONDITION_FAILED);
        //die();        
}

if (!(is_numeric($register_mobile_no))) {
   if (empty($register_mobile_no)) {
       $this->response([
           'status' => 500,
           'status_message' => 'Please Enter Mobile No.!'], REST_Controller::HTTP_PRECONDITION_FAILED);                 
   } else {
       $this->response([
           'status' => 500,
           'status_message' => 'Mobile number should be numeric!'], REST_Controller::HTTP_PRECONDITION_FAILED);
   }
}

$result = $this->login->registerSeller($data);
        //return $this->response($result);

switch ($result) {
    case '1':
    $this->response([
        'status' => 200,
        'status_message' => 'Your Registration Request has been succesfully sent to JUMLA TEAM.Soon you will get Login Password on your email.'], REST_Controller::HTTP_OK);
    break;

    case '0':
    $this->response([
        'status' => 500,
        'status_message' => "Something went wrong... Registration Failed!!!"], REST_Controller::HTTP_BAD_REQUEST);
    break;
    case '500':
    $this->response([
        'status' => 500,
        'status_message' => 'Email-ID OR Username already registered. Login by same or try another Email-ID OR Username!!!'], REST_Controller::HTTP_BAD_REQUEST);
    break;
    
    default:
    $this->response([
        'status' => 500,
        'status_message' => "Something went wrong. Request was not send... Registration Failed!!!"], REST_Controller::HTTP_BAD_REQUEST);
    break;
}

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
    $data=$_POST;
        //print_r($data);die();
    extract($data);

    if(empty($login_username) ){     
        $this->response([
            'status' => 500,
            'status_message' => 'Please Enter User your Username.'
        ], REST_Controller::HTTP_PRECONDITION_FAILED);
        //die();        
    }
    if(empty($login_password) ){

        $this->response([
            'status' => 500,
            'status_message' => 'Please Enter your Password.'
        ], REST_Controller::HTTP_PRECONDITION_FAILED);
        //die();        
    }

    $result = $this->login->loginCustomer($data);
        //print_r($result['status']);die();

    switch ($result['status']) {
        case '200':
        $this->response([
            'status' => 200,
            'user_id' => $result['user_id'],
            'user_name' => $result['user_name'],
            'role' => $result['role'],
            'cat_id'=>$result['cat_id'],
            'status_message' => 'Login Successfull'], REST_Controller::HTTP_OK);
                // $this->response([
                //     'status' => 200,
                //     'status_message' => 'Your Registration Request has been succesfully sent to JUMLA TEAM.Soon you will get Login Password on your email.'], REST_Controller::HTTP_OK);
        break;

        case '500':
        $this->response([
            'status' => 500,
            'user_id' => $result['user_id'],
            'user_name' => $result['user_name'],
            'status_message' => 'Error to start session for ' . $user_name . ' !!!'],REST_Controller::HTTP_BAD_REQUEST);
                // $this->response([
                //     'status' => 500,
                //     'status_message' => "Something went wrong... Registration Failed!!!"], REST_Controller::HTTP_BAD_REQUEST);
        break;
        case '412':
        $this->response([
            'status' => 412,
            'status_message' => 'Sorry..Login credentials are incorrect!!!',
            'user_name' => $user_name], REST_Controller::HTTP_PRECONDITION_FAILED);
                // $this->response([
                //     'status' => 500,
                //     'status_message' => 'Email-ID OR Username already registered. Login by same or try another Email-ID OR Username!!!'], REST_Controller::HTTP_BAD_REQUEST);
        break;
        
        default:
        $this->response([
            'status' => 500,
            'status_message' => "Something went wrong. Request was not send... Registration Failed!!!"], REST_Controller::HTTP_BAD_REQUEST);
        break;
    }

        //return $this->response($result);
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
