<?php

class History extends CI_controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kuwait');   //set Kuwait's timezone
    }

    public function index() {
        //$data['orders'] = History::getMyOrders();

        $user_id = $this->session->userdata('user_id');

        $path = base_url();
        $url = $path . 'api/ManageOrder_api/numRows?user_id=' . $user_id;
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
            'base_url' => base_url('mobile/history/index'),
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
        $data["links"] = $this->pagination->create_links();
        //$data['jobs'] = $this->Job_listing_model->getAllJobs($config['per_page'], $this->uri->segment(4));
        $path = base_url();
        $url = $path . 'api/ManageOrder_api/getMyOrders?user_id=' . $user_id . '&per_page=' . $config['per_page'] . '&offset=' . $this->uri->segment(4);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $data['orders'] = json_decode($response_json, true);



        $this->load->view('includes/mobile/header');
        $this->load->view('pages/history/hist_orders', $data);
        $this->load->view('includes/mobile/footer');
    }

    public function getMyOrders() {
        $user_id = $this->session->userdata('user_id');
        //$user_id=1;

        $path = base_url();
        $url = $path . 'api/ManageOrder_api/getMyOrders?user_id=' . $user_id;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        return $response;
    }

}
