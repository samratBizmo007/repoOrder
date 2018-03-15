<?php

//Admin Settings controller
class Admin_settings extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $data['adminDetails']=Admin_settings::getAdminDetails();
        $this->load->view('includes/admin_header.php');
        $this->load->view('pages/admin/admin_settings',$data);
        //$this->load->view('includes/footer.php');
    }

     //----------this function to update admin email-----------------------------//
public function updateEmail() { 
  extract($_POST);
  //print_r($_POST);die();

  //print_r($data);die();
  $data=$_POST;
  $path = base_url();
  $url = $path.'api/Admin_api/updateEmail';
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response_json = curl_exec($ch);
  curl_close($ch);
  $response = json_decode($response_json, true);
  //print_r($response_json);die();
  
  if ($response['status'] != 200) {
    echo '<h4 class="w3-text-red w3-margin"><i class="fa fa-warning"></i> '.$response['status_message'].'</h4>
    ';
  } else {
    echo '<h4 class="w3-text-green w3-margin"><i class="fa fa-check"></i> '.$response['status_message'].'</h4>
    <script>
    window.setTimeout(function() {
     location.reload();
    }, 1000);
    </script>';
  }
}
//----------------this fun is to add order details end---------------//

    
//----------this function to get admin details-----------------------------
 public function getAdminDetails() {

  $path = base_url();
  $url = $path . 'api/Admin_api/getAdminDetails';
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_HTTPGET, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response_json = curl_exec($ch);
  curl_close($ch);
  $response = json_decode($response_json, true);
  return $response;
}
//----------------this fun get admin details end---------------//
}
