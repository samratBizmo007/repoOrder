<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Controller {
	public function __construct() {
    parent::__construct();
    $this->load->helper('url');      
  }

  public function index() {
    $user_id=$this->session->userdata('user_id');
    $user_name=$this->session->userdata('user_name');
     // ------------session variables

    $status = $this->input->post('status');
    if (empty($status)) {
      redirect('profile/membership_control');
    }

    $firstname = $this->input->post('firstname');
    $amount = $this->input->post('amount');
    $txnid = $this->input->post('txnid');
    $posted_hash = $this->input->post('hash');
    $key = $this->input->post('key');
    $productinfo = $this->input->post('productinfo');
    $email = $this->input->post('email');
//print_r($firstname);
        $salt = "j93rEBf2Ah"; //  Your salt
        $add = $this->input->post('additionalCharges');
        if(isset($add)) {
          $additionalCharges = $this->input->post('additionalCharges');
          $retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
        } else {

          $retHashSeq = $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
        }
        $data['hash'] = hash("sha512", $retHashSeq);
        $data['amount'] = $amount;
        $data['txnid'] = $txnid;
        $data['posted_hash'] = $posted_hash;
        $data['status'] = $status;
        $data['user_id'] = $user_id;
        $data['user_name'] = $user_name;
        $data['productinfo'] = $productinfo;
        $this->load->view('includes/header.php');       

        $path = base_url();
          $url = $path.'api/User_api/SavePayment';
          $ch = curl_init($url);
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          $response_json = curl_exec($ch);
          curl_close($ch);
          $response = json_decode($response_json, true);
//print_r($response_json);die();
          $data['response'] = $response;
        if($status == 'success' && $response['status']==200){
          //echo $response_json;die();
          $this->load->view('pages/payment/success', $data);   
        }
        else{
         $this->load->view('pages/payment/failure', $data); 
       }
       $this->load->view('includes/footer.php');

     }


   }
