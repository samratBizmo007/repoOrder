<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
error_reporting(E_ERROR | E_PARSE);

//Login controller
class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $data['orders'] = Dashboard::AllOrders();     //-------show all Raw prods
        $data['Open_orders'] = Dashboard::AllOpen_Orders();     //-------show all Raw prods
        $data['Closed_orders'] = Dashboard::AllClosed_Orders();     //-------show all Raw prods
        $this->load->view('includes/admin_header.php');
        $this->load->view('pages/orders/dashboard',$data);
        //$this->load->view('includes/footer.php');
    }
    
    public function AllOrders(){
        $path = base_url();
        $url = $path . 'api/ManageOrder_api/AllOrders';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        return $response;
    }  
    public function AllOpen_Orders(){
        $path = base_url();
        $url = $path . 'api/ManageOrder_api/getAllOrders';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        return $response;
    }   
    public function AllClosed_Orders(){
        $path = base_url();
        $url = $path . 'api/ManageOrder_api/AllClosed_Orders';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        return $response;
    }
}