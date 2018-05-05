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
        $data['userDetails'] = User_profile::getUserDetails();
        $data['products'] = User_profile::getPostedImagesBy_username();        
        $this->load->view('includes/admin_header.php');
        $this->load->view('pages/admin/user_profile',$data);
    }
    
     //------------fun for get user details -----------------------//
    public function getUserDetails() {
        $admin_name=$this->session->userdata('admin_name');
        $path = base_url();
        $url = $path . 'api/Userprofile_api/getUserDetails?username='.$admin_name;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        //print_r($response_json);die();
        return $response;
    }

    //------------fun for get user details -----------------------//
      //------------fun for get posted products  -----------------------//
    public function getPostedImagesBy_username() {
        $admin_name = $this->session->userdata('admin_name');
        $path = base_url();
        $url = $path . 'api/ManageProduct_api/getPostedImagesBy_username?username='.$admin_name;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        return $response;
    }

    //------------fun for get posted products  -----------------------//
}