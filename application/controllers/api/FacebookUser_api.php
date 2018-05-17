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
		$userData = $_POST;
		$result = $this->User->checkUser($userData);
		return $this->response($result);			
	}
	//---------------------SEND OTP TO EMAIL END------------------------------//
}