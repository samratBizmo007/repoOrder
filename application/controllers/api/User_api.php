<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');
class User_api extends REST_Controller
{
	public function __construct(){
		parent::__construct();
		//$this->load->model('admin_model/user_model');
		$this->load->model('membership_model/membership_model');
		date_default_timezone_set('Asia/Kolkata');	//set Kuwait's timezone
	}

	
	// // -----------------------ADD USER API----------------------//
	// //-------------------------------------------------------------//
	// public function add_user_post(){
	// 	$data = $_POST;
	// 	$result = $this->user_model->add_user($data);
	// 	return $this->response($result);			
	// }
	// //---------------------ADD USER END------------------------------//

	// // -----------------------GET ALL USER API----------------------//
	// //-------------------------------------------------------------//
	// public function all_user_get(){
	// 	$result = $this->user_model->getAll_users();
	// 	return $this->response($result);			
	// }
	// //---------------------GET ALL USER END------------------------------//

	// -----------------------GET USER DETAILS API----------------------//
	//-------------------------------------------------------------//
	public function getUserDetails_pay_get(){
		extract($_GET);
		$result = $this->membership_model->getUserDetails_pay($user_id);
		return $this->response($result);			
	}
	//---------------------GET USER DETAILS END------------------------------//

	// // -----------------------EDIT USER API----------------------//
	// //-------------------------------------------------------------//
	// public function edit_user_post(){
	// 	$data = $_POST;
	// 	$result = $this->user_model->edit_user($data);
	// 	return $this->response($result);			
	// }
	// //---------------------EDIT USER END------------------------------//

	// // -----------------------DELETE USER API----------------------//
	// //-------------------------------------------------------------//
	// public function del_user_get(){
	// 	$data = $_GET;
	// 	$result = $this->user_model->del_user($data);
	// 	return $this->response($result);			
	// }
	// //---------------------DELETE USER END------------------------------//

	//--------------------------function for save payment details-------------------//
	 public function SavePayment_post() {
        $data = $_POST;
       // print_r($data);die();
        $result = $this->membership_model->save_paymentdetails($data);
       return $this->response($result);
    }
	//--------------------end function-----------------------------------------//

	public function cron_job_membership_get()
	{
		//extract($_GET);
		$result = $this->membership_model->cron_job_membership();
		return $this->response($result);
	}

}