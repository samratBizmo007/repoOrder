<?php


class Forget_password extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kuwait');   //set Kuwait's timezone
    }

    public function index() {
        $this->load->view('pages/login/forget_password');
    }

    public function getPassword() {
        extract($_POST);
        //print_r($_POST);die();
        //Connection establishment, processing of data and response from REST API		
        $data = array(
            'forget_email' => $forget_email
        );
        //print_r($data);die();
        $path = base_url();
        $url = $path . 'api/Login_api/getPassword';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
//print_r($response_json);die();
        //API processing end
        if ($response['status'] == 500) {
            echo '<div class="alert alert-danger">
            <strong>' . $response['status_message'] . '</strong> 
            </div>          
            ';
        } else {

            echo '<div class="alert alert-success">
            <strong>' . $response['status_message'] . '</strong> 
            </div>
            
      ';
  }
    }


}
