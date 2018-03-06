<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');
class Auth_api extends REST_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('login_model/login_model');
		date_default_timezone_set('Asia/Kolkata');	//set Kuwait's timezone
	}

	
	// -----------------------USER LOGIN API----------------------//
	//-------------------------------------------------------------//
	public function login_post(){
		extract($_POST);
		$result = $this->login_model->login($login_username,$login_password,$login_profile_type);
		return $this->response($result);			
	}
	//---------------------USER LOGIN END------------------------------//


	// -----------------------USER REGISTER API----------------------//
	//-------------------------------------------------------------//
	public function register_post(){
		extract($_POST);
		$result = $this->login_model->register_user($register_username,$register_email,$register_password,$register_profile_type);
		return $this->response($result);			
	}


	// -----------------------USER LOGOUT API----------------------//
	//-------------------------------------------------------------//
	public function logout_get(){
		extract($_GET);
		$result = $this->login_model->logout_user($user_id);
		return $this->response($result);			
	}


	//---------------------USER FORGOT PASSWORD END------------------------------//
	public function forget_password_post(){
		extract($_POST);
		$result = $this->login_model->forget_password($forget_email,$forget_profile_type);
		return $this->response($result);			
	}

	// -----------------------add  category API----------------------//
	//-------------------------------------------------------------//
	public function addCategory_post(){
		extract($_POST);
		$result = $this->login_model->addCategory($json);
		return $this->response($result);			
	}
	//---------------------add  category END------------------------------//
        public function verifyEmail_get(){
                extract($_GET);
		$result = $this->login_model->verifyEmail($code);
		return $this->response($result);
        }
        

}