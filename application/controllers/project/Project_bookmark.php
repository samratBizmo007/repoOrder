<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(E_ERROR | E_PARSE);
class Project_bookmark extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		 $user_id = $this->session->userdata('user_id');

		$data['response']=Project_bookmark::show_bookmark();
		//print_r($data);die();
	    $this->load->view('includes/header.php');
		$this->load->view('pages/project/view_bookmark',$data);
		$this->load->view('includes/footer.php');

	}

	public function show_bookmark()
	{
		$user_id='1';

    //Connection establishment, processing of data and response from REST API
 		 $path=base_url();
  		$url = $path.'api/Project_posting_api/show_bookmark?user_id='.$user_id; 
  		$ch = curl_init($url);
  		curl_setopt($ch, CURLOPT_HTTPGET, true);
  		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  		$response_json = curl_exec($ch);
  		curl_close($ch);
  		$response=json_decode($response_json, true);
  	   // return $response;
  	   // print_r($response['status_message']);die();
  		$bookmark="";
  		foreach ($response['status_message'] as $value)
  		{
  			$bookmark=$value['jm_userBookmark'];

  		}
  			$a=array();
  			foreach(json_decode($bookmark) as $key)
  			{
  				//$jm_project_id='1';
  				$path=base_url();
		  		$url = $path.'api/Project_posting_api/get_project?jm_project_id='.$key; 
		  		$ch = curl_init($url);
		  		curl_setopt($ch, CURLOPT_HTTPGET, true);
		  		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		  		$response_json = curl_exec($ch);
		  		curl_close($ch);
		  		$response=json_decode($response_json, true);
  				//echo $key['jm_project_id'];
  				$a[]=$response['status_message'];
  				//print_r($response);die();
  				//return $response;
  				
  			}
  			return $a;
  			
  		 //print_r($a);die();
   }

}
?>