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

}
?>