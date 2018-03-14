<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class ManageOrder_model extends CI_Model{

	public function __construct() {
		parent::__construct();
    //$this->load->model('search_model');
	}

    // -----------------------GET ALL MY ORDERS MODEL----------------------//
	//-------------------------------------------------------------//
	public function getMyOrders($user_id){

            if (!(is_numeric($user_id))) {
            if ($user_id == '') {
                $response = array(
                    'status' => 500,
                    'status_message' => 'No Orders Found..!');
                return $response;
                die();
            } else {
                $response = array(
                    'status' => 500,
                    'imageBasePath'  => 'http://ordertracker.bizmo-tech-admin.com/images/order_images/',
                    'status_message' => 'Order Placing Failed..!');
                return $response;
                die();
            }
        }

        $query = "SELECT * FROM order_tab WHERE user_id='$user_id' AND status!=0 ORDER BY order_id DESC";

		$result = $this->db->query($query);

		if ($result->num_rows() <= 0) {
			$response = array(
				'status' => 500,
				'status_message' => 'No orders found.');
		} else {
			$response = array(
				'status' => 200,
				'status_message' => $result->result_array());
		}
		return $response;
	}
	// -----------------------GET ALL MY ORDERS MODEL----------------------//

           // -----------------------GET ALL ORDERS on admin dashboard MODEL----------------------//
	//-------------------------------------------------------------//
	public function getAllOrders(){

		$query = "SELECT * FROM order_tab WHERE status=1 ORDER BY order_id DESC";

		$result = $this->db->query($query);

		if ($result->num_rows() <= 0) {
			$response = array(
				'status' => 500,
				'status_message' => 'No orders found.');
		} else {
			$response = array(
				'status' => 200,
				'status_message' => $result->result_array());
		}
		return $response;
	}
	// -----------------------GET ALL ORDERS on admin dashboard MODEL----------------------//
        
                   // -----------------------GET ALL CLOSED ORDERS on admin dashboard MODEL----------------------//
	//-------------------------------------------------------------//
	public function AllClosed_Orders(){

		$query = "SELECT * FROM order_tab WHERE status=0 ORDER BY order_id DESC";

		$result = $this->db->query($query);

		if ($result->num_rows() <= 0) {
			$response = array(
				'status' => 500,
				'status_message' => 'No orders found.');
		} else {
			$response = array(
				'status' => 200,
				'status_message' => $result->result_array());
		}
		return $response;
	}
	// -----------------------GET ALL CLOSED ORDERS on admin dashboard MODEL----------------------//

           // -----------------------GET ALL OPEN ORDERS on admin dashboard  MODEL----------------------//
	//-------------------------------------------------------------//
	public function AllOrders(){

		$query = "SELECT * FROM order_tab ORDER BY order_id DESC";

		$result = $this->db->query($query);

		if ($result->num_rows() <= 0) {
			$response = array(
				'status' => 500,
				'status_message' => 'No orders found.');
		} else {
			$response = array(
				'status' => 200,
				'status_message' => $result->result_array());
		}
		return $response;
	}
	// -----------------------GET ALL ORDERS on admin dashboard MODEL----------------------//



	//-------ADD NEW ORDER FUNCTION--------------//
	public function addNewOrder($data) { 

        extract($data);
        //echo(is_numeric($user_id));die();
        if(!(is_numeric($user_id))){
            if($user_id == ''){
            $response = array(
                'status' => 500,
                'status_message' => 'Order Placing Failed..!');
            return $response;
            die();
            }
            else{
                  $response = array(
                'status' => 500,
                'status_message' => 'Order Placing Failed..!');
            return $response;
            die();
            }
        }

        
        $sql = "INSERT INTO order_tab(user_id,order_products,order_date,order_time,status) VALUES
         ('$user_id','$prod_associated',NOW(),NOW(),'1')";
//print_r($sql);die();
        $result = $this->db->query($sql);

        if ($result) {
        	$order_id=$this->getNextID('order_id','order_tab');
            $response = array(
                'status' => 200,
                'order_id' => $order_id,
                'status_message' => 'Order Placed Successfully..!');
        } else {
            $response = array(
                'status' => 500,
                'status_message' => 'Order Placing Failed...!');
        }

        return $response;
    }
	//---------ADD NEW ORDER FUNCTION ENDS------------------//


	//------------GET NEXT AUTO INCREMENT VALUE IN ORDER_TAB-----------------
    public function getNextID($col_name,$table_name) {


        $sql = "SELECT MAX($col_name) as id FROM $table_name";
        $resultnew = $this->db->query($sql);

        $id = "";

        foreach ($resultnew->result_array() as $row) {
            $id = $row['id'];
        }
        return $id;
    }

//-------------GET NEXT AUTO INCREMENT VALUE IN ORDER_TAB---------------*/


    //---------------delete ORder model-------------//
    function delOrder($order_id)
    {
        $query="UPDATE order_tab SET status=0 WHERE order_id=".$order_id." ";  
        
        if($this->db->query($query)){
            $response=array(
                'status' => 200,
                'status_message' =>'Order deleted Successfully.'         
            );
        }
        else
        {
            //insertion failure
            $response=array(
                'status' => 500,
                'status_message' =>'Sorry..Order Deletion Failed!!!'         
            );
        }

        return $response;
    }
    //----------------delete ORder ends--------------------------//
    
 
    
}
?>