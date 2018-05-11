<?php

//Admin Dashboard controller
class Dashboard extends CI_Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {

    //start session   
    $admin_name=$this->session->userdata('admin_name');
    $admin_role=$this->session->userdata('admin_role');
    // $this->load->library('user_agent');
    //check session variable set or not, otherwise logout
    if($admin_name=='') {
     redirect('admin_login');
   }
    $data['orderCount'] = Dashboard::getOrderCount();   
    $data['timelineData'] = Dashboard::getTimeline();   

    //  if ($this->agent->is_mobile())
    // {
    //   $this->load->view('includes/mobile/header');
    //   $this->load->view('pages/admin/mobile/dashboard',$data);
    //   $this->load->view('includes/mobile/admin_footer');
    // }
    // else{
    $this->load->view('includes/admin_header.php');
    $this->load->view('pages/admin/dashboard', $data);
   // }     //$this->load->view('includes/footer.php');
  }

    //----------this function to get all my orders count-----------------------------
  public function getOrderCount() {

    $path = base_url();
    $url = $path . 'api/Dashboard_api/getOrderCount';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_json = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response_json, true);
    return $response;
  }
//----------------this fun get all my orders count end---------------//


  // --------- this function gets all latest product feeds---------------//
  public function getTimeline() {

    $path = base_url();
    $url = $path.'api/Dashboard_api/getTimeline';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_json = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response_json, true);
    return $response;
  }
  // -----------------fucntion ends here --------------------------------//

}
