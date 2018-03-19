<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');
class ManageOrder_api extends REST_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('order_model/manageOrder_model');
		//date_default_timezone_set('Asia/Kolkata');	//set Kuwait's timezone
	}
	
//--------------get my orders count ------------------------------------------------//
        public function numRows_get(){
		extract($_GET);
		$result = $this->manageOrder_model->numRows($user_id);
		return $this->response($result);			
	}
//-----------------------get my orders count---------------------------------------//
	// -----------------------ALL MY ORDERS API----------------------//
	//-------------------------------------------------------------//
	public function getMyOrders_get(){
		extract($_GET);
		$result = $this->manageOrder_model->getMyOrders($user_id,$per_page,$offset);
		return $this->response($result);			
	}
	//---------------------ALL MY ORDERS END------------------------------//

        // -----------------------ALL ORDERS API----------------------//
	//-------------------------------------------------------------//
	public function getAllOrders_get(){
		extract($_GET);
		$result = $this->manageOrder_model->getAllOrders();
		return $this->response($result);			
	}
	//---------------------ALL ORDERS END------------------------------//

    // -----------------------ALL ORDERS API----------------------//
	//-------------------------------------------------------------//
	public function AllOrders_get(){
		extract($_GET);
		$result = $this->manageOrder_model->AllOrders();
		return $this->response($result);			
	}
	//---------------------ALL ORDERS END------------------------------//

	// -----------------------ALL MY ORDERS COUNT API----------------------//
	//-------------------------------------------------------------//
	public function getOrderCount_get(){
		extract($_GET);
		$result = $this->manageOrder_model->getOrderCount($user_id);
		return $this->response($result);			
	}
	//---------------------ALL MY ORDERS COUNT END------------------------------//
   
        
	// -----------------------ADD USER ORDER API----------------------//
	//-------------------------------------------------------------//
	public function addNewOrder_post(){
		$data=($_POST);
		$result = $this->manageOrder_model->addNewOrder($data);
		return $this->response($result);			
	}
	//---------------------ADD USER ORDER END------------------------------//

	// -----------------------DELETE MY ORDERS API----------------------//
	//-------------------------------------------------------------//
	public function delOrder_get(){
		extract($_GET);
		$result = $this->manageOrder_model->delOrder($order_id);
		return $this->response($result);			
	}
	//---------------------DELETE MY ORDERS END------------------------------//

}