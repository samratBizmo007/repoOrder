<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class ManageOrder_model extends CI_Model{

	public function __construct() {
		parent::__construct();
    //$this->load->model('search_model');
	}

    // -----------------------GET ALL ORDERS MODEL----------------------//
	//-------------------------------------------------------------//
	public function getAllOrders(){

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
	// -----------------------GET ALL ORDERS MODEL----------------------//

}
?>