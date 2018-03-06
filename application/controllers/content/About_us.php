<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

error_reporting(E_ERROR | E_PARSE);
class About_us extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		
		//start session		
		// $user_id=$this->session->userdata('user_id');
		// $user_name=$this->session->userdata('user_name');
		// $privilege=$this->session->userdata('privilege');
				
		// //check session variable set or not, otherwise logout
		// if(($user_id=='') || ($user_name=='') || ($privilege=='')){
		// 	redirect('role_login');
		// }
	}

	public function index(){
		//$data['jobs']= About_us::getRecentJobs();		
		//$this->load->view('includes/header.php');
		$this->load->view('pages/static/about_us.php');
		//$this->load->view('pages/static/about_jobmandi.php');
		//$this->load->view('includes/footer.php');
		
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

}

?>