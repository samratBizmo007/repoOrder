<?php

//Admin All Orders controller
class Orders extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        //start session   
        $admin_name=$this->session->userdata('admin_name');
        $admin_role=$this->session->userdata('admin_role');

    //check session variable set or not, otherwise logout
        if(($admin_name=='') || ($admin_role=='')){
           redirect('admin_login');
       }

//        $data['orders'] = Orders::AllOrders();     //-------show all Raw prods
        $data['Open_orders'] = Orders::AllOpen_Orders();     //-------show all Raw prods
        $data['Closed_orders'] = Orders::AllClosed_Orders();     //-------show all Raw prods
//        
        $path = base_url();
        $url = $path . 'api/Dashboard_api/all_ActiveOrdersCount';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_data = curl_exec($ch);
        curl_close($ch);

        //----------pagination code starts here-------------------------------------
        //------loading the library pagination----------------------//
        $this->load->library('pagination');
        //--------------creating the config array for pagination basic requirements----------------//
        $config = [
            'base_url' => base_url('admin/orders/index'),
            'per_page' => 10,
            'total_rows' => json_decode($response_data, true),
        ];
        $config['full_tag_open'] = "<ul class='pagination' style='color:black'>";
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li style="color:black">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active" style="background-color: #4CAF50;"><a href="#" style="color:white">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li style="color:black">';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li style="color:black">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li style="color:black">';
        $config['last_tag_close'] = '</li>';

        $config['prev_link'] = '<i class="fa fa-long-arrow-left" ></i> Previous';
        $config['prev_tag_open'] = '<li style="color:black">';
        $config['prev_tag_close'] = '</li>';

        $config['next_link'] = 'Next <i class="fa fa-long-arrow-right" ></i>';
        $config['next_tag_open'] = '<li style="color:black">';
        $config['next_tag_close'] = '</li>';
        //-----initialise pagination library with passing parameter config-----------//
        $this->pagination->initialize($config);
        //-----initialise pagination library with passing parameter config-----------//
        //echo $this->uri->segment(3);die();
        $data["ActiveOrderslinks"] = $this->pagination->create_links();
        $path = base_url();
        $url = $path . 'api/Dashboard_api/AllOrders?per_page='.$config['per_page'].'&offset='.$this->uri->segment(4);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $data['orders'] = json_decode($response_json, true);
        //print_r($response_json);

       // print_r($data);
        $this->load->view('includes/admin_header.php');
        $this->load->view('pages/admin/all_orders', $data);
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
     // ---------------function to get all orders------------------------//
    public function AllRegreted_orders() {
        $path = base_url();
        $url = $path . 'api/Dashboard_api/AllRegreted_orders';
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
        $url = $path . 'api/Dashboard_api/reOpen_Orders?order_id='.$order_id;
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
// ---------------function to close orders------------------------//
    public function closeOrder() {
        extract($_POST);

        //Connection establishment to get data from REST API
        $path = base_url();
        $url = $path . 'api/Dashboard_api/closeOrder?order_id='.$order_id;
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
            echo '<h4 class="w3-text-red w3-margin"><i class="fa fa-warning"></i> ' . $response['status_message'] . '</h4>';
        } else {
            echo '<h4 class="w3-text-green w3-margin"><i class="fa fa-check"></i> ' . $response['status_message'] . '</h4>';
        }
    }

// ---------------------function ends----------------------------------//
// ---------------function to regretproducts------------------------//

    public function regretProduct() {
        extract($_POST);
        $path = base_url();
        $url = $path . 'api/Dashboard_api/regretProduct?prod_no='.$prod_no.'&order_id='.$order_id;
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
// ---------------------function ends----------------------------------//

}
