<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

//error_reporting(E_ERROR | E_PARSE);
class Failure extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		//start session		
		// $user_id=$this->session->userdata('user_id');
		// $user_name=$this->session->userdata('user_name');
		// $privilege=$this->session->userdata('privilege');

		// //check session variable set or not, otherwise logout
		// if(($user_id=='') || ($user_name=='') || ($privilege=='')){
		// 	redirect('role_login');
		// }

	}

	public function index(){
		$status = $this->input->post("status");
		$firstname = $this->input->post("firstname");
		$amount = $this->input->post("amount");
		$txnid = $this->input->post("txnid");
		$posted_hash = $this->input->post("hash");
		$key = $this->input->post("key");
		$productinfo = $this->input->post("productinfo");
		$email = $this->input->post("email");
		$salt = SALT;
		If ($this->input->post("additionalCharges")) {
			$additionalCharges = $this->input->post("additionalCharges");
			$retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
		} else {
			$retHashSeq = $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
		}
		$hash = hash("sha512", $retHashSeq);
		if ($hash != $posted_hash) {
			$data['msg'] = "Invalid Transaction. Please try again";
		} else {

			$data=array(
				'user_name'=>$user_name,
				'status'=>$status,
				'txnid'=>$txnid,
				'amount'=>$amount,
				'hash'=>$hash
			);

			$path = base_url();
        	$url = $path.'api/User_api/SavePayment';
        	$ch = curl_init($url);
        	curl_setopt($ch, CURLOPT_POST, true);
        	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        	$response_json = curl_exec($ch);
        	curl_close($ch);
        	$response = json_decode($response_json, true);
        	//return $response;
			
			$data['msg'] = "<h3>Your order status is " . $status . ".</h3>";
			$data['msg'] .= "<h4>Your transaction id for this transaction is " . $txnid . ". You may try making the payment by clicking the link below.</h4>";
		}
		$data['msg'] .= '<p><a href=http://sforsuresh.in/> Try Again</a></p>';
		$this->load->view('includes/header.php');
		$this->load->view('pages/profile/membership_view',$data);
		$this->load->view('includes/footer.php');
	}
	public function order_fail() {
		
		$this->load->view('pages/payment/failure',$data);
	}

//--------------------------Function for save failure data----------------------------//
	// public function save_failure_details()
	// 	{
	// 		extract($_POST);
	// 		$data=extract($_POST);
	// 		//print_r($_POST);die();
	// 		$path = base_url();
 //        	$url = $path.'api/User_api/SavePayment';
 //        	$ch = curl_init($url);
 //        	curl_setopt($ch, CURLOPT_POST, true);
 //        	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
 //        	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 //        	$response_json = curl_exec($ch);
 //        	curl_close($ch);
 //        	$response = json_decode($response_json, true);
 //        	return $response;
 //        	//print_r($response_json);die();
	// 	}
//---------------------------------function end--------------------------------------//
}

?>