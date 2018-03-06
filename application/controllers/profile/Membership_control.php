<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ERROR | E_PARSE);

class Membership_control extends CI_Controller
{
	public function __construct(){
		parent::__construct();
   $user_id=$this->session->userdata('user_id');
   $user_name=$this->session->userdata('user_name');
   $privilege=$this->session->userdata('privilege');
 }
 public function index()
 {
   $data['all_userInfo']=Membership_control::getUserDetails_pay();
  		 //print_r($data);
   $this->load->view('includes/header.php');
         //check if the person is a freelancer from session
   if($this->session->userdata('profile_type') == 1)
   {
   		 $this->load->view('pages/profile/membership_view',$data);
         }else if($this->session->userdata('profile_type') == 3) //check if the user is a job seeker 
         {
          $this->load->view('pages/profile/membership_job_seeker',$data);
        }else
        {
             //incase the user is neither freelancer nor jobseeker goback.This is a safety measure for other roles
          header('Location:'.$_SERVER['HTTP_REFERER']);
              //redirect('profile/dashboard');
        }
        
        $this->load->view('includes/footer.php');
   }

  	// -----------------get user details---------------------//
      public function getUserDetails_pay(){
        $user_id=$this->session->userdata('user_id');
        
        $path = base_url();
        $url = $path . 'api/User_api/getUserDetails_pay?user_id='.$user_id;        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        //print_r($response_json);die();
        return $response;
      }
  	//---------------------user ends---------------------------//
  	
  
//-----------function end-------------------------------//
    //---------------------function for payment success--------------------//
      public function payment_successful()
      {
        $user_id=$this->session->userdata('user_id');

        $status = $this->input->post("status");
        $firstname = $this->input->post("firstname");
        $amount = $this->input->post("amount");
        $txnid = $this->input->post("txnid");
        $posted_hash = $this->input->post("hash");
        $key = $this->input->post("key");
        $productinfo = $this->input->post("productinfo");
    // $membership_package=$this->input->post('membership_package');
        $email = $this->input->post("email");
        $salt = SALT;
    //echo $membership_package;die();


        if ($this->input->post("additionalCharges")) {
          $additionalCharges = $this->input->post("additionalCharges");
          $retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
        } else {

          $retHashSeq = $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
        }
        $hash = hash("sha512", $retHashSeq);

        if ($hash != $posted_hash) {
          $data['msg'] = "Invalid Transaction. Please try again";
        } else {
          
      //echo $user_id;die();
      // echo $status;
      // echo $txnid;
      // echo $amount;
      // echo $firstname;
      // echo $hash;die();
      //echo $membership_package;die();
          $data=array(
            'user_id'=>$user_id,
            'user_name'=>$firstname,
            'status'=>$status,
            'txnid'=>$txnid,
            'amount'=>$amount,
            'hash'=>$hash
          );

      //print_r($data);die();
          $path = base_url();
          $url = $path.'api/User_api/SavePayment';
          $ch = curl_init($url);
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          $response_json = curl_exec($ch);
          curl_close($ch);
          $response = json_decode($response_json, true);
        //  print_r($response_json);die();
          $data['msg'] = "<h3>Thank You. Your order status is " . $status . ".</h3>";
          $data['msg'] .= "<h4>Your Transaction ID for this transaction is " . $txnid . ".</h4>";
          $data['msg'] .= "<h4>We have received a payment of Rs. " . $amount . ". Your order will soon be shipped.</h4>";
          
        }
        $this->load->view('includes/header.php');
        $this->load->view('pages/profile/membership_view',$data);
    //$this->load->view('pages/payment/success.php',$data);
        $this->load->view('includes/footer.php');
      }

      public function order_success() {


        $this->load->view('pages/profile/membership_view', $data);
      }
      
    //----------------end function------------------------------------//

  //----------------------function for payment failed-----------------------//
      public function payment_failed()
      {
        $status = $this->input->post("status");
        $firstname = $this->input->post("firstname");
        $amount = $this->input->post("amount");
        $txnid = $this->input->post("txnid");
        $posted_hash = $this->input->post("hash");
        $key = $this->input->post("key");
        $productinfo = $this->input->post("productinfo");
        $email = $this->input->post("email");
        $salt = SALT;
        If ($this->input->post("additionalCharges")) {
          $additionalCharges = $this->input->post("additionalCharges");
          $retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
        } else {
          $retHashSeq = $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
        }
        $hash = hash("sha512", $retHashSeq);
        if ($hash != $posted_hash) {
          $data['msg'] = "Invalid Transaction. Please try again";
        } else {

          $data=array(
            'user_name'=>$user_name,
            'status'=>$status,
            'txnid'=>$txnid,
            'amount'=>$amount,
            'hash'=>$hash
          );

          $path = base_url();
          $url = $path.'api/User_api/SavePayment';
          $ch = curl_init($url);
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          $response_json = curl_exec($ch);
          curl_close($ch);
          $response = json_decode($response_json, true);
          //return $response;
          
          $data['msg'] = "<h3>Your order status is " . $status . ".</h3>";
          $data['msg'] .= "<h4>Your transaction id for this transaction is " . $txnid . ". You may try making the payment by clicking the link below.</h4>";
        }
        $data['msg'] .= '<p><a href=http://sforsuresh.in/> Try Again</a></p>';
        $this->load->view('includes/header.php');
        $this->load->view('pages/profile/membership_view',$data);
        $this->load->view('includes/footer.php');
      }
      public function order_fail() {
        
        $this->load->view('pages/profile/membership_view',$data);
      }
  //------------------end function-------------------------------------------//


    }