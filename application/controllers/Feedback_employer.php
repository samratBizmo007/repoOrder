<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(E_ERROR | E_PARSE);
//Jobmandi profile Edit profile
class Feedback_employer extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$user_id=$this->session->userdata('user_id');
		$profile_type=$this->session->userdata('profile_type');
	}

  public function index()
  {
   
   $this->load->view('includes/header.php');
   $this->load->view('pages/Feedback_free_employer.php');
   $this->load->view('includes/footer.php');	
 }

//-------------function to submit project feedback for freelancer-------------------//
 	public function submit_feedback_freelanceremployer()
 	{
 		extract($_POST);
 		//print_r($_POST);die();
 		//$data = $_POST;
 		//print_r($data);die();
 		$user_id=$this->session->userdata('user_id');
 		$data=array(
 			'jm_project_id' =>'1',
 			'jm_employer_id' =>$user_id,
 			'jm_freelance_id'=>'1',
			'jm_communication' =>$jm_communication,
			'jm_payment_prompt' => $jm_payment_prompt,
			'jm_acc_of_requirement' => $jm_acc_of_requirement,
			'jm_work_again'	=> $jm_work_again,
			'jm_feedback_comment'=>$jm_feedback_comment
			
		);
 		//print_r($data);die();
 		$path=base_url();
 		$url = $path.'api/Project_posting_api/feedback_freelancer_emp_api';		
 		$ch = curl_init($url);
 		curl_setopt($ch, CURLOPT_POST, true);
  		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  		$response_json = curl_exec($ch);	  
  		curl_close($ch);
  		$response = json_decode($response_json, true); 
  		//print_r($response_json);die();
  		//echo $response['status_message'];
  		return $response;
 	}
//-------------------------end function----------------------------------//
}