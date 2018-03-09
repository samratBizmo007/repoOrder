<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');
class Dashboard_api extends REST_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('dashboard_model/dashboard_model');
		date_default_timezone_set('Asia/Kolkata');	//set Kuwait's timezone
	}

        // -----------------------ALL ORDERS API----------------------//
	//-------------------------------------------------------------//
	public function AllOrders_get(){
		extract($_GET);
		$result = $this->dashboard_model->AllOrders();
		return $this->response($result);			
	}
	//---------------------ALL ORDERS END------------------------------//
        
              // -----------------------ALL ORDERS API----------------------//
	//-------------------------------------------------------------//
	public function AllOpen_Orders_get(){
		extract($_GET);
		$result = $this->dashboard_model->AllOpen_Orders();
		return $this->response($result);			
	}
	//---------------------ALL ORDERS END------------------------------//

             // -----------------------ALL closed ORDERS API----------------------//
	//-------------------------------------------------------------//
	public function AllClosed_Orders_get(){
		extract($_GET);
		$result = $this->dashboard_model->AllClosed_Orders();
		return $this->response($result);			
	}
	//---------------------ALL Closed ORDERS END------------------------------//

        // -----------------------REOPEN ORDERS API----------------------//
	//-------------------------------------------------------------//
	public function reOpen_Orders_get(){
                extract($_GET);
		$result = $this->dashboard_model->reOpen_Orders($order_id);
		return $this->response($result);
        }
	//---------------------REOPEN ORDERS END------------------------------//
        
	// -----------------------DELETE MY ORDERS API----------------------//
	//-------------------------------------------------------------//
	public function delOrder_get(){
		extract($_GET);
		$result = $this->dashboard_model->delOrder($order_id);
		return $this->response($result);			
	}
	//---------------------DELETE MY ORDERS END------------------------------//
        public function regretProduct_get(){
            extract($_GET);
		$result = $this->dashboard_model->regretProduct($prod_no,$order_id);
		return $this->response($result);
        }
        
         public function AllRegreted_orders_get(){
            extract($_GET);
		$result = $this->dashboard_model->AllRegreted_orders();
		return $this->response($result);
        }
}