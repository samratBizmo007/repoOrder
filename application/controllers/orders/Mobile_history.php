<?php
class Mobile_history extends CI_controller{

  public function __construct(){
    parent::__construct();
  }
  
  
  public function index(){
  	$data['orders'] = Mobile_history::getMyOrders();
  	$this->load->view('pages/orders/mobile/mobile_history',$data);
  
  }
  
	public function getMyOrders() {
 	 $user_id=$this->session->userdata('user_id');
  //$user_id=1;

  $path = base_url();
  $url = $path.'api/ManageOrder_api/getMyOrders?user_id='.$user_id;
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_HTTPGET, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response_json = curl_exec($ch);
  curl_close($ch);
  $response = json_decode($response_json, true);
  return $response;
	}
  
}