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

		$query = "SELECT * FROM order_tab WHERE user_id='$user_id' ORDER BY order_id DESC";

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


	//-------ADD NEW ORDER FUNCTION--------------//
	public function addNewOrder($data) { 

        extract($data);
//print_r($data);die();
        $sql = "INSERT INTO order_tab(user_id,user_name,order_products,order_date,order_time,status) VALUES
         ('$user_id','$user_name','$prod_associated',NOW(),NOW(),'1')";
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

}
?>