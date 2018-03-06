<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(E_ERROR | E_PARSE);
class Freelancelist_controller extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		 $user_id=$this->session->userdata('user_id');
    	 $project_id=$this->session->userdata('project_id');
	}
	
	public function index()
	{
		//$data['all_userSkills']=Freelancelist_controller::get_userSkills();
		$data['freelancer_info']=Freelancelist_controller::getfreelancelist();
		//print_r($data);die();
		$this->load->view('pages/freelance/freelancerlist.php',$data);
		
	}
	//-----function for getting freelancer skill----------------//
//	public function get_userSkills(){
//
//		$user_id=$this->session->userdata('user_id');
//		$profile_type=$this->session->userdata('profile_type');
//		
//		if(($this->session->userdata('selected_profile_type'))!=''){
//			$profile_type=$this->session->userdata('selected_profile_type');
//		}
//		//Connection establishment, processing of data and response from REST API
//		$path=base_url();
//		$url = $path.'api/Dashboard_api/get_userSkills?user_id='.$user_id.'&profile_type='.$profile_type;	
//		$ch = curl_init($url);
//		curl_setopt($ch, CURLOPT_HTTPGET, true);
//		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//		$response_json = curl_exec($ch);
//		curl_close($ch);
//		$response=json_decode($response_json, true);
//		return $response;	
//	}
	
	//----- End function for getting freelancer skill----------------//
	//------function to show freelancing list-------------------------------//
	public function getfreelancelist()
	{	$user_id=1;
		$profile_type=1;
		$path=base_url();
		$url = $path.'api/freelance_api/get_freelancinglist';
		//echo $url;die();	
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HTTPGET, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response_json = curl_exec($ch);
		curl_close($ch);
		$response=json_decode($response_json, true);
		//print_r($response_json);die();
		return $response;	
	}
	//------End function to show freelancing list-------------------------------//
	public function get_rating()
	{
		//extract($_GET);
		//print_r($_GET);die();
		$path=base_url();
		$url = $path.'api/freelance_api/get_rating';		
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HTTPGET, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response_json = curl_exec($ch);
		curl_close($ch);
		$response=json_decode($response_json, true);
		//print_r($response);
		$ranking='';
		if($response['status']== 1){
			//echo "check condition";
		$ranking =	$response['status_message'][0]['jm_rank'];
		}
		echo $ranking;
	}

	
	
//---------function for freelancing rating calculation-------------------//	
	public function get_freelancing_rating($jm_user_id)
	{
		
		//extract($_GET);
		//print_r($_GET);die();
		//Connection establishment, processing of data and response from REST API
		$path=base_url();
		$url = $path.'api/freelance_api/calculate_freelancing_rating';		
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HTTPGET, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response_json = curl_exec($ch);
		curl_close($ch);
		$response=json_decode($response_json, true);
		//print_r($response);die();
		//print_r($response['status_message']);die();
		//return $response;
		$Avg='';
		$memberShip_type='';
		$project_completed='';
		$project_cost='';
		
		if($response['status']== 1){
			//echo "check condition";
		$Avg =	$response['status_message'][0]['jm_avg_rating'];
		$memberShip_type = $response['status_message'][0]['jm_membership_rating'];
		$project_cost = $response['status_message'][0]['jm_project_cost'];
		$project_completed = $response['status_message'][0]['jm_project_completed'];
		}
		//echo $Avg;
		//echo $memberShip_type;
		//echo $project_cost;
		//echo $project_completed;
		
		$rank = 0.5 * $Avg +
			0.5*$memberShip_type  +
			0.2*$project_cost +
			0.1 *$project_completed;
		echo $rank;
		
			
//		foreach( )
//		{
//		$Rank = 0.5 x $Avg  +
//		0.2 x 1 +  //membership type assume hardcode 1
//		0.2 x previous work average project costs out of 10 +
////		0.1 x Number of projects successfully completed
//		}
		
		
	}
	
}