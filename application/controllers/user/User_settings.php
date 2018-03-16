<?php

//User Settings controller
class User_settings extends CI_Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {

    $data['userDetails']=User_settings::getUserDetails();
    $this->load->view('includes/header.php');
    $this->load->view('pages/user/user_settings',$data);
        //$this->load->view('includes/footer.php');
  }

     //----------this fun to send otp and save to db-----------------------------//
  public function verifyEmail() { 
    extract($_POST);
    //print_r($_POST);die();

  //print_r($data);die();
    $data=$_POST;
    $path = base_url();
    $url = $path.'api/User_api/sendOTPEmail';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_json = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response_json, true);
  //print_r($response_json);die();

    if ($response['status'] != 200) {
      echo '<h4 class="w3-text-red w3-medium w3-margin"><i class="fa fa-warning"></i> '.$response['status_message'].'</h4>'; 
    } 
    else {
      echo '<h4 class="w3-text-green w3-medium w3-margin"><i class="fa fa-check"></i> '.$response['status_message'].'</h4>';

      // -----------------save opt and email to db api-----------------
      $data['otp']=$response['otp'];
      $url_next = $path.'api/User_api/saveOTP';
      $ch_next = curl_init($url_next);
      curl_setopt($ch_next, CURLOPT_POST, true);
      curl_setopt($ch_next, CURLOPT_POSTFIELDS, $data);
      curl_setopt($ch_next, CURLOPT_RETURNTRANSFER, true);
      $response_json_next = curl_exec($ch_next);
      curl_close($ch_next);
      $response_next = json_decode($response_json_next, true);
//print_r($response_json_next);die();
      echo '<h4 class="w3-text-green w3-medium w3-margin"><i class="fa fa-check"></i> '.$response_next['status_message'].'</h4>
      <script>
      window.setTimeout(function() {
       location.reload();
     }, 3000);
     </script>';
   }
 }
//----------------this fun to send otp and save to db end---------------//

   //----------this function to verify otp -----------------------------//
 public function verifyOTP() { 
  extract($_POST);
    //print_r($_POST);die();

  //print_r($data);die();
  $data=$_POST;
  $path = base_url();
  $url = $path.'api/User_api/verifyOTP';
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response_json = curl_exec($ch);
  curl_close($ch);
  $response = json_decode($response_json, true);
  //print_r($response_json);die();

  if ($response['status'] != 200) {
    echo '<h4 class="w3-text-red w3-medium w3-margin"><i class="fa fa-warning"></i> '.$response['status_message'].'</h4>'; 
  } 
  else {
    echo '<h4 class="w3-text-green w3-medium w3-margin"><i class="fa fa-check"></i> '.$response['status_message'].'</h4><script>
    window.setTimeout(function() {
     location.reload();
   }, 1200);
   </script>';
 }
}
//----------------this fun is to verify otp end---------------//


//----------this function to get user details-----------------------------
public function getUserDetails() {
  $user_id=$this->session->userdata('user_id');
  //$user_id=1;
  $path = base_url();
  $url = $path.'api/User_api/getUserDetails?user_id='.$user_id;
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_HTTPGET, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response_json = curl_exec($ch);
  curl_close($ch);
  $response = json_decode($response_json, true);
  return $response;
}
//----------------this fun get user details end---------------//

}
