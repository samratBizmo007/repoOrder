<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
error_reporting(E_ERROR | E_PARSE);

//Login controller
class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        //start session		
//		$user_id=$this->session->userdata('user_id');
//		$profile_type=$this->session->userdata('profile_type');
//		$user_name=$this->session->userdata('user_name');
//		//check session variable set or not, otherwise logout
//		if(($user_id!='') || ($user_name!='') || ($profile_type!='')){
//			redirect('profile/dashboard');
//		}

        $this->load->view('includes/header.php');
        $this->load->view('pages/login/login');
        $this->load->view('includes/footer.php');
    }

    // --------------register user fucntion starts----------------------//
    public function registerCustomer() {
        extract($_POST);
        //print_r($_POST);die();
        //---------------if any of the profile is not selected, then return this--------//
//		if($register_profile_type=='0'){
//			$response=array(
//				'status' => 500,	//---------email sending failed 
//				'status_message' =>'<label class="w3-text-red w3-small">
//				<b><i class="fa fa-warning"> WARNING<br><br>Select Appropriate Profile first !!!</i> </b>
//				</label>'
//			);
//			echo json_encode($response);	
//			die();
//		}
        //Connection establishment, processing of data and response from REST API		
        $data = array(
            'register_username' => $register_username,
            'register_password' => $register_password,
            'register_email' => $register_email,
            'register_mobile_no' => $register_number,
            'register_address' => $address,
            'register_business_field' => $business_field
        );
        //print_r($data);die();
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
    //----------------------function to login---------------------------//
    public function loginCustomer() {
        extract($_POST);
        //print_r($_POST);
        //die();
        //Connection establishment, processing of data and response from REST API		
        $data = array(
            'login_username' => $login_username,
            'login_password' => $login_password
            //'login_remember' => $remember_me
        );
        //print_r($data);die();
        $path = base_url();
        $url = $path . 'api/Login_api/loginCustomer';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
//print_r($response_json);die();
        //API processing end
        if ($response['status'] == 500) {
            echo '<div class="alert alert-danger ">
			<strong>'.$response['status_message'].'</strong> 
			</div>			
			';
        } else {
            //----create session array--------//
            $session_data = array(
                'user_id' => $response['user_id'],
                'user_name' => $response['username']
            );

            //start session of user if login success
            $this->session->set_userdata($session_data);

            echo '<div class="alert alert-success" style="margin-bottom:5px">
		 <strong>'.$response['status_message'].'</strong> 
		 </div>
				<script>
				window.setTimeout(function() {
					$(".alert").fadeTo(500, 0).slideUp(500, function(){
						$(this).remove(); 
					});
					window.location.href="'.base_url().'orders/manage_orders";
				}, 100);
				</script>
				';
        }
    }

//-----------------------function ends-----------------------------//
}

?>