<?php

error_reporting(E_ERROR | E_PARSE);

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        //start session		
        $user_id = $this->session->userdata('user_id');
        $user_name = $this->session->userdata('user_name');
        if (($user_id != '') || ($user_name != '')) {
            redirect('user/dashboard');
        }
        $this->load->view('pages/login/login');
    }
//-------------------api for the otp sending to user during registering customer-------------------//
public function send_otpForMobile() {
        extract($_POST);
        //print_r($_POST);die();
        //Connection establishment, processing of data and response from REST API		
        $data = array(
            'register_username' => $register_username,
            'register_password' => $register_password,
            'register_email' => $register_email,
            'register_mobile_no' => $register_number,
            'register_address' => $address
        );
        $path = base_url();
        $url = $path . 'api/Login_api/send_otpForMobile';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);

        echo $response_json;
    }
//-------------------api for the otp sending to user during registering customer-------------------//
    // --------------register user fucntion starts----------------------//
    public function registerCustomer() {
        extract($_POST);
        //print_r($_POST);die();
        //Connection establishment, processing of data and response from REST API		
        $data = array(
            'register_username' => $register_username,
            'register_password' => $register_password,
            'register_email' => $register_email,
            'register_mobile_no' => $register_number,
            'register_address' => $address
        );
        $path = base_url();
        $url = $path . 'api/Login_api/registerCustomer';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);

        echo $response_json;
    }

    //	------------------function ends here-----------------------------//
//-------------------api for the verify otp for mobile to login customer-------------------//
 public function verify_otpForRegisterCustomer() {
        extract($_POST);
        //print_r($_POST);die();
        $data = array(
            'register_username' => $register_username,
            'register_password' => $register_password,
            'register_email' => $register_email,
            'register_mobile_no' => $register_number,
            'register_address' => $address,
            'OTP_id' => $OTP_id
        );
        //if logout success then destroy session and unset session variables
        $path = base_url();
        $url = $path . 'api/Login_api/verify_otpForRegisterCustomer';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        echo $response_json;
    }
//-------------------api for the verify otp for mobile to login customer-------------------//
//-------------------fun for verify otp -----------------------------------------//
    public function verify_otp() {
        extract($_POST);
        //print_r($_POST);die();
        $data = array(
            'register_username' => $register_username,
            'register_password' => $register_password,
            'register_email' => $register_email,
            'register_mobile_no' => $register_number,
            'register_address' => $address,
            'OTP_id' => $OTP_id
        );
        //if logout success then destroy session and unset session variables
        $path = base_url();
        $url = $path . 'api/Login_api/verify_otp';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        echo $response_json;
    }
//-------------------fun for verify otp -----------------------------------------//

    //----------------------function to login---------------------------//
    public function loginCustomer() {
        extract($_POST);
       		
        $data = array(
            'login_username' => $login_username,
            'login_password' => $login_password
                //'login_remember' => $remember_me
        );
        $path = base_url();
        $url = $path . 'api/Login_api/loginCustomer';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
     
        if ($response['status'] == 500) {
            echo '<div class="alert alert-danger ">
            <strong>' . $response['status_message'] . '</strong> 
            </div>			
            ';
        } else {
            //----create session array--------//
            $session_data = array(
                'user_id' => $response['user_id'],
                'user_name' => $response['user_name']
            );

            //start session of user if login success
            $this->session->set_userdata($session_data);

            echo '<div class="alert alert-success" style="margin-bottom:5px">
            <strong>' . $response['status_message'] . '</strong> 
            </div>
            <script>
            window.setTimeout(function() {
               $(".alert").fadeTo(500, 0).slideUp(500, function(){
                  $(this).remove(); 
              });
              window.location.href="' . base_url() . 'user/dashboard";
          }, 100);
          </script>
          ';
        }
    }

//-----------------------function ends-----------------------------//
    // ---------------function to logout------------------------//
    public function logout() {

        $user_id = $this->session->userdata('user_id');
        //if logout success then destroy session and unset session variables
        $path = base_url();
        $url = $path . 'api/Login_api/logout?user_id=' . $user_id;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);

        //if logout success then destroy session and unset session variables
        $this->session->unset_userdata(array("user_id" => "", "user_name" => ""));
        $this->session->sess_destroy();

        redirect(base_url());
    }

// ---------------------function ends----------------------------------//
}

?>