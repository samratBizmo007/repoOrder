<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        //$this->load->model('search_model');
    }

    // -----------------------GET ALL ORDERS on admin dashboard MODEL----------------------//
    //-------------------------------------------------------------//
    public function AllOpen_Orders() {

        $query = "SELECT * FROM order_tab WHERE status=2 ORDER BY order_id DESC";

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
    // -----------------------GET ALL OPEN ORDERS on admin dashboard  MODEL----------------------//
    //-------------------------------------------------------------//
    public function AllOrders() {

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
    public function AllClosed_Orders() {

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
    //---------------delete ORder model-------------//
    function reOpen_Orders($order_id) {
        $query = "UPDATE order_tab SET status=2 WHERE order_id=" . $order_id . " ";

        if ($this->db->query($query)) {
            $response = array(
                'status' => 200,
                'status_message' => 'Order Opemed Successfully.'
            );
        } else {
            //insertion failure
            $response = array(
                'status' => 500,
                'status_message' => 'Sorry..Order Opening Failed!!!'
            );
        }

        return $response;
    }

    //----------------delete ORder ends--------------------------//
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