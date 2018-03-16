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
	

	// -----------------------SEND OTP TO EMAIL API----------------------//
	//-------------------------------------------------------------//
	public function sendOTPEmail_post(){
		extract($_POST);
		$result = $this->user_model->sendOTPEmail($user_email);
		return $this->response($result);			
	}
	//---------------------SEND OTP TO EMAIL END------------------------------//

	// -----------------------SAVE OTP TO DB API----------------------//
	//-------------------------------------------------------------//
	public function saveOTP_post(){
		extract($_POST);
		$result = $this->user_model->saveOTP($user_email,$otp);
		return $this->response($result);			
	}
	//---------------------SAVE OTP TO DB END------------------------------//

	// -----------------------VERIFY OTP TO DB API----------------------//
	//-------------------------------------------------------------//
	public function verifyOTP_post(){
		extract($_POST);
		$result = $this->user_model->verifyOTP($otp_email,$user_otp);
		return $this->response($result);			
	}
	//---------------------VERIFY OTP TO DB END------------------------------//

	// -----------------------UPDATE EMAIL API----------------------//
	//-------------------------------------------------------------//
	public function getUserDetails_get(){
		extract($_GET);
		$result = $this->manageOrder_model->getUserDetails($user_id);
		return $this->response($result);			
	}
	//---------------------UPDATE EMAIL END------------------------------//

 //        // -----------------------ALL ORDERS API----------------------//
	// //-------------------------------------------------------------//
	// public function getAllOrders_get(){
	// 	extract($_GET);
	// 	$result = $this->manageOrder_model->getAllOrders();
	// 	return $this->response($result);			
	// }
	// //---------------------ALL ORDERS END------------------------------//

 //    // -----------------------ALL ORDERS API----------------------//
	// //-------------------------------------------------------------//
	// public function AllOrders_get(){
	// 	extract($_GET);
	// 	$result = $this->manageOrder_model->AllOrders();
	// 	return $this->response($result);			
	// }
	// //---------------------ALL ORDERS END------------------------------//

	// // -----------------------ALL MY ORDERS COUNT API----------------------//
	// //-------------------------------------------------------------//
	// public function getOrderCount_get(){
	// 	extract($_GET);
	// 	$result = $this->manageOrder_model->getOrderCount($user_id);
	// 	return $this->response($result);			
	// }
	// //---------------------ALL MY ORDERS COUNT END------------------------------//
   
        
	// // -----------------------ADD USER ORDER API----------------------//
	// //-------------------------------------------------------------//
	// public function addNewOrder_post(){
	// 	$data=($_POST);
	// 	$result = $this->manageOrder_model->addNewOrder($data);
	// 	return $this->response($result);			
	// }
	// //---------------------ADD USER ORDER END------------------------------//

	// // -----------------------DELETE MY ORDERS API----------------------//
	// //-------------------------------------------------------------//
	// public function delOrder_get(){
	// 	extract($_GET);
	// 	$result = $this->manageOrder_model->delOrder($order_id);
	// 	return $this->response($result);			
	// }
	// //---------------------DELETE MY ORDERS END------------------------------//

}