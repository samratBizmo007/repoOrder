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
	

	// -----------------------ALL ORDERS API----------------------//
	//-------------------------------------------------------------//
	public function getAllOrders_get(){
		$result = $this->manageOrder_model->getAllOrders();
		return $this->response($result);			
	}
	//---------------------ALL ORDERS END------------------------------//

	// -----------------------ADD USER SKILLS API----------------------//
	//-------------------------------------------------------------//
	public function add_userSkills_get(){
		extract($_GET);
		$result = $this->dashboard_model->add_userSkills($user_id,$skill_id,$profile_type);
		return $this->response($result);			
	}
	//---------------------ADD USER SKILLS END------------------------------//

	
}