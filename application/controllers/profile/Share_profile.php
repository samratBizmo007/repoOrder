<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ERROR | E_PARSE);
//Jobmandi profile Edit profile
class Share_profile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

  public function index()
   {
   	 	
   	
   }
   
   public function share_profile_data($var = '')
   {
   		$obj = base64_decode($var);
   		$arr= explode('|',$obj);
   		$user_id = $arr[1];
   		$profile_type = $arr[2];
   		$data['New_userID'] = $user_id;
   		$data['New_profile_type'] = $profile_type;
   		$data['all_skills']=Share_profile::get_allSkills($user_id);
		$data['all_userSkills']=Share_profile::get_userSkills($user_id);
		$data['all_userFeedback']=Share_profile::get_userFeedback($user_id,$profile_type);
		$data['all_userInfo']=Share_profile::get_userInfo($user_id);
		$data['all_userTransaction']=Share_profile::get_userTransaction($user_id);
		$data['all_userDetails']=Share_profile::get_userDetails($user_id);
		$data['all_userPortfolio']=Share_profile::get_userPortfolio($user_id);
		$data['percentage']=Share_profile::get_bars_value($user_id,$profile_type);
		$this->load->view('pages/profile/share_profile',$data);
   }
   ///---------------------------------fun for employer details-------------------------------------//
   public function getEmployer_Details(){
        extract($_POST);
        
        $path = base_url();
        $url = $path . 'api/Dashboard_api/getEmployer_Details?emp_id='.$emp_id.'&profile_type='.$profile_type;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        print_r($response_json);
        //echo $response;
        //return $response;
    }
    //--------------fun is ends here-----------------------------------------------------------------------//
   //------------Function to get all skills to add in user list------------//
		public function get_allSkills($user_id){

		//Connection establishment, processing of data and response from REST API
			$path=base_url();
			$url = $path.'api/Dashboard_api/get_allSkills';		
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_HTTPGET, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response_json = curl_exec($ch);
			curl_close($ch);
			$response=json_decode($response_json, true);
			return $response;	
		}
// ---------------------function ends----------------------------------//

//------------Function to get all user specific skills------------//
   public function get_userSkills($user_id){

		//$user_id=$this->session->userdata('user_id');
		$profile_type=$this->session->userdata('profile_type');

		if(($this->session->userdata('selected_profile_type'))!=''){
			$profile_type=$this->session->userdata('selected_profile_type');
		}
		//Connection establishment, processing of data and response from REST API
		$path=base_url();
		$url = $path.'api/Dashboard_api/get_userSkills?user_id='.$user_id.'&profile_type='.$profile_type;	
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HTTPGET, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response_json = curl_exec($ch);
		curl_close($ch);
		$response=json_decode($response_json, true);
		return $response;	
	}
	// ---------------------function ends----------------------------------//
	//------------Function to get all user specific project feedbacks------------//
		public function get_userFeedback($user_id,$profile_type){

			//$user_id=$this->session->userdata('user_id');
			//$profile_type=$this->session->userdata('profile_type');


//			if(($this->session->userdata('selected_profile_type'))!=''){
//				$profile_type=$this->session->userdata('selected_profile_type');
//			}
//		//Connection establishment, processing of data and response from REST API
			$path=base_url();
			$url = $path.'api/Dashboard_api/get_userFeedback?user_id='.$user_id.'&profile_type='.$profile_type;		
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_HTTPGET, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response_json = curl_exec($ch);
			curl_close($ch);
			$response=json_decode($response_json, true);
			//print_r($response_json);	
			return $response;	
		}
// ---------------------function ends----------------------------------//
   //------------Function to get all data of user------------//
		public function get_userInfo($user_id){

			//$user_id=$this->session->userdata('user_id');
			//$profile_type=$this->session->userdata('profile_type');


//			if(($this->session->userdata('selected_profile_type'))!=''){
//				$profile_type=$this->session->userdata('selected_profile_type');
//			}
		//Connection establishment, processing of data and response from REST API
			$path=base_url();
			$url = $path.'api/ViewProfile_api/get_userInfo?user_id='.$user_id;	
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_HTTPGET, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response_json = curl_exec($ch);
			curl_close($ch);
			$response=json_decode($response_json, true);
			return $response;	
		}
// ---------------------function ends----------------------------------//
//------------Function to get financial data of user------------//
		public function get_userTransaction($user_id){

			//$user_id=$this->session->userdata('user_id');

		//Connection establishment, processing of data and response from REST API
			$path=base_url();
			$url = $path.'api/Dashboard_api/get_userTransaction?user_id='.$user_id;	
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_HTTPGET, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response_json = curl_exec($ch);
			curl_close($ch);
			$response=json_decode($response_json, true);
			return $response;	
		}
// ---------------------function ends----------------------------------//
   //------------Function to get all data of user------------//
		public function get_userDetails($user_id){
			//$user_id=$this->session->userdata('user_id');

    //Connection establishment, processing of data and response from REST API
			$path=base_url();
			$url = $path.'api/Project_posting_api/get_userDetails?user_id='.$user_id; 
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_HTTPGET, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response_json = curl_exec($ch);
			curl_close($ch);
			$response=json_decode($response_json, true);
			return $response; 
		}
// ---------------------function ends----------------------------------//
//------------Function to get all user specific portfolios------------//
		public function get_userPortfolio($user_id){

			//$user_id=$this->session->userdata('user_id');
//			$profile_type=$this->session->userdata('profile_type');
//
//			if(($this->session->userdata('selected_profile_type'))!=''){
//				$profile_type=$this->session->userdata('selected_profile_type');
//			}
		//Connection establishment, processing of data and response from REST API
			$path=base_url();
			$url = $path.'api/ViewProfile_api/get_userPortfolio?user_id='.$user_id.'&profile_type='.$profile_type;	
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_HTTPGET, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response_json = curl_exec($ch);
			curl_close($ch);
			$response=json_decode($response_json, true);
			return $response;	
		}
	// ---------------------function ends----------------------------------//	
 
                //----------------function for 3 bars of rating--------------------------//
	
	public function get_bars_value($user_id,$profile_type)
	{
		//$user_id='24';
		//$user_id=$this->session->userdata('user_id');
		//$profile_type=$this->session->userdata('profile_type');
			//print_r($user_id);
			//print_r($profile_type);
		    $path=base_url();
			$url = $path.'api/ViewProfile_api/get_bars_value?user_id='.$user_id.'&profile_type='.$profile_type;	
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_HTTPGET, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response_json = curl_exec($ch);
			curl_close($ch);
			$response=json_decode($response_json, true);
			//print_r($response_json);die();
			//eho $response;
			return $response;
		
	}
	//----------------------function ends-------------------------------------//
                
}
?>