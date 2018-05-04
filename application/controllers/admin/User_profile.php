<?php

//Admin Settings controller
class User_profile extends CI_Controller {

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
        $data['userDetails'] = Manage_products::getUserDetails();
        $this->load->view('includes/admin_header.php');
        $this->load->view('pages/admin/user_profile',$data);
    }
    
     //------------fun for get user details -----------------------//
    public function getUserDetails() {
        $admin_name=$this->session->userdata('admin_name');
        $path = base_url();
        $url = $path . 'api/ManageProduct_api/getUserDetails?username='.$admin_name;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        return $response;
    }

    //------------fun for get user details -----------------------//
}