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
        $this->load->view('pages/orders/dashboard', $data);
        //$this->load->view('includes/footer.php');
    }

    // ---------------function to get all orders------------------------//
    public function AllOrders() {
        $path = base_url();
        $url = $path . 'api/Dashboard_api/AllOrders';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        return $response;
    }

    // ---------------function to get all orders------------------------//
    // ---------------function to opened orders------------------------//

    public function AllOpen_Orders() {
        $path = base_url();
        $url = $path . 'api/Dashboard_api/AllOpen_Orders';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        return $response;
    }

    // ---------------function to opened orders------------------------//
    // ---------------function to closed orders------------------------//

    public function AllClosed_Orders() {
        $path = base_url();
        $url = $path . 'api/Dashboard_api/AllClosed_Orders';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        return $response;
    }

    // ---------------function to closed orders------------------------//
    // ---------------function to reopen orders------------------------//

    public function reOpen_Orders() {
        extract($_POST);

        //Connection establishment to get data from REST API
        $path = base_url();
        $url = $path . 'api/Dashboard_api/reOpen_Orders?order_id=' . $order_id;
        //echo $url;  
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        // print_r($response_json);die();

        if ($response['status'] != 200) {
            echo '<h4 class="w3-text-red w3-margin"><i class="fa fa-warning"></i> ' . $response['status_message'] . '</h4>';
        } else {
            echo '<h4 class="w3-text-green w3-margin"><i class="fa fa-check"></i> ' . $response['status_message'] . '</h4>';
        }
    }

// ---------------function ends here------------------------//
// ---------------function to delete orders------------------------//
    public function delOrder() {
        extract($_POST);

        //Connection establishment to get data from REST API
        $path = base_url();
        $url = $path . 'api/Dashboard_api/delOrder?order_id=' . $order_id;
        //echo $url;  
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        // print_r($response_json);die();
        //api processing ends
        //API processing end
        if ($response['status'] != 200) {
            echo '<h4 class="w3-text-red w3-margin"><i class="fa fa-warning"></i> ' . $response['status_message'] . '</h4> 
      ';
        } else {
            echo '<h4 class="w3-text-green w3-margin"><i class="fa fa-check"></i> ' . $response['status_message'] . '</h4>   
      ';
        }
    }

// ---------------------function ends----------------------------------//

    public function regretProduct() {
        extract($_POST);
        print_r($_POST);die();
        $path = base_url();
        $url = $path . 'api/Dashboard_api/regretProduct?prod_no='.$prod_no.'&order_id='.$order_id;
        //echo $url;  
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        
        if ($response['status'] != 200) {
            echo '<h4 class="w3-text-red w3-margin"><i class="fa fa-warning"></i> ' . $response['status_message'] . '</h4>';
        } else {
            echo '<h4 class="w3-text-green w3-margin"><i class="fa fa-check"></i> ' . $response['status_message'] . '</h4>';
        }
    }

}
