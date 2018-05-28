<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');
class FacebookUser_api extends REST_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('User');
		//date_default_timezone_set('Asia/Kolkata');	//set Kuwait's timezone
	}
	

	// -----------------------SEND OTP TO EMAIL API----------------------//
	//-------------------------------------------------------------//
	public function checkUser_post(){
		extract($_POST);
		//print_r($_POST);die();
		$oauth_provider='facebook';
		// ------if facebook oauth provider not found-------------
		if ($oauth_provider=='') {
			$this->response([
				'status' => 500,
				'status_message' => 'OAuth provider field is empty. All parameters are required!'
			], REST_Controller::HTTP_PRECONDITION_FAILED);
			die();
		}

        // ------if facebook oauth uid not found-------------
		if ($oauth_uid=='') {
			$this->response([
				'status' => 500,
				'status_message' => 'OAuth UID field is empty. All parameters are required!'
			], REST_Controller::HTTP_PRECONDITION_FAILED);
			die();
		}

        // ------if facebook First Name not found-------------
		if ($first_name=='') {
			$this->response([
				'status' => 500,
				'status_message' => 'Facebook First Name field is empty. All parameters are required!'
			], REST_Controller::HTTP_PRECONDITION_FAILED);
			die();
		}

        // ------if facebook Last Name not found-------------
		if ($last_name=='') {
			$this->response([
				'status' => 500,
				'status_message' => 'Facebook Last Name field is empty. All parameters are required!'
			], REST_Controller::HTTP_PRECONDITION_FAILED);
			die();
		}

        // ------if facebook email not found-------------
		if ($email=='') {
			$this->response([
				'status' => 500,
				'status_message' => 'Facebook email field is empty. All parameters are required!'
			], REST_Controller::HTTP_PRECONDITION_FAILED);
			die();
		}

  //       // ------if facebook picture not found-------------
		// if ($picture=='') {
		// 	$this->response([
		// 		'status' => 500,
		// 		'status_message' => 'Facebook picture field is empty. All parameters are required!'
		// 	], REST_Controller::HTTP_PRECONDITION_FAILED);
		// 	die();
		// }
		$userData = $_POST;
		$result = $this->User->checkUser($userData);

		if($result['status']==200){
			$this->response($result, REST_Controller::HTTP_OK);
		}
		else{
			$this->response($result, REST_Controller::HTTP_PRECONDITION_FAILED);
		}
	}
	//---------------------SEND OTP TO EMAIL END------------------------------//
}