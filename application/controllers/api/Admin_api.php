<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');
class Admin_api extends REST_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('admin_model/settings_model');
		//date_default_timezone_set('Asia/Kolkata');	//set Kuwait's timezone
	}
	

	// -----------------------UPDATE EMAIL API----------------------//
	//-------------------------------------------------------------//
	public function updateEmail_post(){
		extract($_POST);
		$result = $this->settings_model->updateEmail($admin_email);
		return $this->response($result);			
	}
	//---------------------UPDATE EMAIL END------------------------------//

	// -----------------------UPDATE USER DASHBOARD IMAGE API----------------------//
	//-------------------------------------------------------------//
	public function updateDashboardImage_post(){
		extract($_POST);
		$result = $this->settings_model->updateDashboardImage($imagePath);
		return $this->response($result);			
	}
	//---------------------UPDATE USER DASHBOARD IMAGE END------------------------------//

	// -----------------------UPDATE EMAIL API----------------------//
	//-------------------------------------------------------------//
	public function getAdminDetails_get(){
		//extract($_POST);
		$result = $this->settings_model->getAdminDetails();
		return $this->response($result);			
	}
	//---------------------UPDATE EMAIL END------------------------------//

	// -----------------------GET IMAGE PATH FROM SETTINGS API----------------------//
	//-------------------------------------------------------------//
	public function getDashImage_get(){
		extract($_GET);
		$result = $this->settings_model->getSettingDetails($setting_name);
		return $this->response($result);			
	}
	//---------------------GET IMAGE PATH FROM SETTINGS END------------------------------//

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