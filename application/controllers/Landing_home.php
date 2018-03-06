<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

error_reporting(E_ERROR | E_PARSE);
class Landing_home extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		//start session		
		$user_id=$this->session->userdata('user_id');
		$user_name=$this->session->userdata('user_name');
		$privilege=$this->session->userdata('privilege');

		//check session variable set or not, otherwise logout
		if(($user_id!='') || ($user_name!='') || ($privilege!='')){
			redirect('profile/dashboard');
		}

	}

	public function index(){		
		$this->load->library('user_agent');
		$data['jobs']= Landing_home::getRecentJobs();
                $data['projects'] = Landing_home::getCountOf_Projects();
                $data['jobcount'] = Landing_home::getCountOf_Jobs();
		if ($this->agent->is_mobile())
		{
			$this->load->view('pages/home/home_mobile.php',$data);
		}
		else{
                       // $this->load->view('includes/header.php');
			$this->load->view('pages/home/home_desktop.php',$data);
                   	//$this->load->view('includes/footer.php');

		}
		
		//$this->load->view('pages/layout_mob.php',$data);

		
	}

	function getRecentJobs() {
		$path = base_url();
		$url = $path . 'api/JobListing_api/getRecentJobs';
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HTTPGET, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response_json = curl_exec($ch);
		curl_close($ch);
		$response = json_decode($response_json, true);
		return $response;
	}
//-------------this fun is get the count of projects-------------------------------//
    public function getCountOf_Projects(){
                $path = base_url();
		$url = $path . 'api/Project_posting_api/getCountOf_Projects';
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HTTPGET, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response_json = curl_exec($ch);
		curl_close($ch);
		$response = json_decode($response_json, true);
		return $response;
    }
//---------------this fun is used to get the count of projects-------------------------// 
    //-------------this fun is get the count of projects-------------------------------//
    public function getCountOf_Jobs(){
                $path = base_url();
		$url = $path . 'api/PostJob_api/getCountOf_Jobs';
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HTTPGET, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response_json = curl_exec($ch);
		curl_close($ch);
		$response = json_decode($response_json, true);
		return $response;
    }
//---------------this fun is used to get the count of projects-------------------------//
}

?>