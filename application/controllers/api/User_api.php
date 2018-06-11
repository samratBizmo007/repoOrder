<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');
class User_api extends REST_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('user_model/user_model');
		$this->load->model('order_model/manageOrder_model');
		//date_default_timezone_set('Asia/Kolkata');	//set Kuwait's timezone
	}

	// -----------------------UPDATE EMAIL API----------------------//
	//-------------------------------------------------------------//
	public function getUserDetails_get(){
		extract($_GET);
		$result = $this->manageOrder_model->getUserDetails($user_id);
		return $this->response($result);			
	}
	//---------------------UPDATE EMAIL END------------------------------//



}