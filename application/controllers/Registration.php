<?php
//error_reporting(E_ERROR | E_PARSE);

class Registration extends CI_controller{

     public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kuwait');   //set Kuwait's timezone
        $this->load->helper('cookie');
    }

    public function index() {

        if(isset($_COOKIE['jumla_uname']) && isset($_COOKIE['jumla_uname'])!=''){
            Login::loginCustomer();
        }

        //start session		
        $user_id = $this->session->userdata('user_id');
        $user_name = $this->session->userdata('user_name');
        $user_role = $this->session->userdata('user_role');
        if (($user_id != '') || ($user_name != '') || ($user_role !='')) {
            redirect('user/feeds');
        }
	  	 $this->load->view('pages/login/registration');
    }

      // --------------register user fucntion starts----------------------//
    public function registerCustomer() {
    	extract($_POST);
    	// print_r($_POST);die();
        if($user_role==0){
             echo '<div class="alert alert-danger" style="margin-bottom:5px">
            <strong>Please select appropriate role!</strong> 
            </div>';die();
        }
    	if($user_role==1)
    	{
    		if($register_password == '')
    		{   		
    			 echo '<div class="alert alert-danger" style="margin-bottom:5px">
            <strong>Please enter your password</strong> 
            </div>';die();
    		}
		//Connection establishment, processing of data and response from REST API		
        $data = array(
        	'user_role' =>$user_role,
            'register_username' => $register_username,
            'register_password' => $register_password,
            'register_email' => $register_email,
            'register_countryCode' => $mobile_code,
            'register_mobile_no' => $register_number,
            // 'register_address' => $address
        );
        // print_r($data);die();
        $path = base_url();
        $url = $path . 'api/Login_api/registerCustomer';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
    }
    else{
    	// extract($_POST);
		// print_r($_POST);die();
        //Connection establishment, processing of data and response from REST API		
        $data = array(
        	'user_role' =>$user_role,
            'register_username' => $register_username,
            // 'register_password' => $register_password,
            'register_email' => $register_email,
            'register_mobile_no' => $mobile_code.'-'.$register_number,
            // 'register_address' => $address
        );
        //print_r($data);die();
        $path = base_url();
        $url = $path . 'api/Login_api/registerSeller';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);

    }
        // print_r($response_json);die();
        if ($response['status'] == 500) {
            echo '<div class="alert alert-danger ">
            <strong>' . $response['status_message'] . '</strong> 
            </div>          
            ';
        } else {

            echo '<div class="alert alert-success" style="margin-bottom:5px">
            <strong>' . $response['status_message'] . '</strong> 
            </div>';
  }
        //echo $response_json;
}

    //	------------------function ends here-----------------------------//
	  
}