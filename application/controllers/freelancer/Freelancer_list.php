<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Freelancer_list extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		// //start session		
		// $user_id=$this->session->userdata('user_id');
		// $user_name=$this->session->userdata('user_name');
		// $privilege=$this->session->userdata('privilege');

		// //check session variable set or not, otherwise logout
		// if(($user_id=='') || ($user_name=='') || ($privilege=='')){
		// 	redirect('role_login');
		// }

	}

	public function index(){

		$user_id = $this->session->userdata('user_id');
		$this->load->model('freelancer_model/freelancer_model');
		$data['info']=$this->freelancer_model->get_freelancer();
		//$data['percentage']=Freelancer_list::get_bars_value();
		//print_r($data['percentage']);die();
		$path=base_url();
		$url = $path.'api/Dashboard_api/get_allSkills';   
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HTTPGET, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response_json = curl_exec($ch);
		curl_close($ch);
		$data['all_skills'] = json_decode($response_json, true);
		
		//print_r($response);die();
		//$data['all_skills']=Project_listing::get_allSkills();
		//$data['user_details']=Project_listing::get_userDetails();
		
		//print_r($data);die();
		$this->load->view('includes/header.php');
		$this->load->view('pages/freelancer/freelancer_list.php',$data);
		$this->load->view('includes/footer.php');
	}

	//----------------function for 3 bars of rating--------------------------//
	
   public function get_bars_value() {
       extract($_POST);
       $user_id = $_POST;
       $use_id = '';
       foreach ($user_id as $id){
           $use_id = 'api/ViewProfile_api/getBars_PercentageValue?user_id='.$id;
       }
        $path = base_url();
        $url = $path.$use_id;
        //echo $url;die();
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        print_r($response_json);
    }

    //----------------------function ends-------------------------------------//
    public function getUserFeedback(){
        extract($_POST);
        //Connection establishment, processing of data and response from REST API
        $path = base_url();
        $url = $path . 'api/Freelancer_api/getUserFeedback?user_id='.$user_id;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        print_r($response);
    }
}

?>