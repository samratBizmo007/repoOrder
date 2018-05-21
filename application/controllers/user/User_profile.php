<?php

//Admin Settings controller
class User_profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
    }

    public function index($profileuser_id='') {
        // decrypting userID
        $id = base64_decode(base64_decode($profileuser_id));
        $id_Arr=explode('|', $id);
        $user_id=$id_Arr[1];

        $data['link_user_id'] = $user_id;
        $this->load->library('user_agent');

        $data['userDetails'] = User_profile::getUserDetails($user_id);
        $data['prod_count'] = User_profile::getProductCountBy_userid($user_id);
        $data['products'] = User_profile::getUserProducts($user_id);
        //print_r($data['userDetails']);die();
        if ($this->agent->is_mobile()) {
            $this->load->view('includes/mobile/header');
            $this->load->view('pages/user/mobile/profile/mobileuser_profile', $data);
            $this->load->view('includes/mobile/footer');
        } else {
            $this->load->view('includes/header.php');
            $this->load->view('pages/user/user_profile', $data);
        }
    }

    //------------fun for get user details -----------------------//
    public function getUserDetails($user_id) {
//        $admin_name = $this->session->userdata('admin_name');
        //$user_id = $this->session->userdata('user_id');
        $path = base_url();
        $url = $path.'api/Userprofile_api/getUserDetails';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("user_id: ".$user_id));
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        //print_r($response_json);die();
        return $response;
    }

    //------------fun for get user details -----------------------//
    //------------fun for get posted products  -----------------------//
    public function getUserProducts($user_id) {
        //$user_id = $this->session->userdata('user_id');
        $path = base_url();
        $url = $path . 'api/ManageProduct_api/getUserProducts';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("user_id: ".$user_id));
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        //print_r($response_json);die();
        return $response;
    }

    //------------fun for get posted products  -----------------------//
    //------------fun for get the count of posted products---------------------//

    public function getProductCountBy_userid($user_id) {
        //$user_id = $this->session->userdata('user_id');
        $path = base_url();
        $url = $path . 'api/Userprofile_api/getProductCountBy_userid?user_id=' . $user_id;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        //print_r($response_json);die();
        return $response;
    }

    //------------fun for get the count of posted products ends---------------------//
}
