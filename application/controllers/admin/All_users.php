<?php

//Show All USers controller
class All_users extends CI_Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    //start session   
    $admin_name=$this->session->userdata('admin_name');
    $admin_role=$this->session->userdata('admin_role');

    //check session variable set or not, otherwise logout
    if($admin_name==''){
     redirect('admin_login');
   }
    $data['all_users'] = All_users::AllUsers();     //-------show all admin users
    $data['private_key'] = All_users::getPrivateKey();     //-------get Private key for password generation

    $this->load->view('includes/admin_header.php');
    $this->load->view('pages/admin/all_users',$data);
        //$this->load->view('includes/footer.php');
  }

  // -----------function to get all users registered for admin panel----------------//
  public function AllUsers() {
    $path = base_url();
    $url = $path . 'api/Admin_api/allUsers';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_json = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response_json, true);
    return $response;
  }

  // ------------------------------fucntion ends here----------------------------//

  //----------Function to get auto generate password Private key from admin settings-----------------------------
  public function getPrivateKey() {

    $path = base_url();
    $url = $path . 'api/Admin_api/getPrivateKey?setting_name=pass_privateKey';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_json = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response_json, true);
    return $response;
  }
//----------------Fucntion ends here---------------//

// ----------------------reject user request function------------------//
  public function rejectUser() { 
    extract($_POST);
  //print_r($_POST);die();

    $data=$_POST;
    $path = base_url();
    $url = $path.'api/Admin_api/rejectUser';
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
      echo '<h4 class="w3-text-green w3-margin"><i class="fa fa-check"></i> '.$response['status_message'].'</h4>';
    }
  }
// ----------------------fucntion ends here ----------------------------//

  // -------------- fucntion to approve user request --------------------//
  public function apprUser() { 
    extract($_POST);
  //print_r($_POST);die();

    $data=$_POST;
    $path = base_url();
    $url = $path.'api/Admin_api/apprUser';
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
      echo '<h4 class="w3-text-green w3-margin"><i class="fa fa-check"></i> '.$response['status_message'].'</h4>';
    }
  }
  // -----------------------fuxntion ends here ------------------------//

}
