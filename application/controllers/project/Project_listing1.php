<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(E_ERROR | E_PARSE);
class Project_listing extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		
	}

	public function index()
	{
       $this->load->database();
       $this->load->model('Project_model/project_listing_model');
       $data['info']=$this->project_listing_model->project_post_model();
  // print_r($data);die();
       $this->load->view('includes/header.php');
       $this->load->view('pages/project/project_listing.php',$data);
       $this->load->view('includes/footer.php',$data);
   }
//----------------function to show project list--------------------------------//

   public function project_post()
   {
            //$jm_user_id='1';
      extract($_POST);
      $path=base_url();
      $url = $path.'api/project_listing_api/project_list'; 
   			//echo $url;die();  
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_HTTPGET, true);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $response_json = curl_exec($ch);
      curl_close($ch);
      $response=json_decode($response_json, true);
            //return $response;
            //print_r($response_json);die();
            // foreach($response['status_message'] as $key)
            // {
            // 	$previous_date=$key['jm_posting_date'];
            //   $current_date=date('Y-m-d');
            //   $date1Timestamp = strtotime($current_date);
            //   $date2Timestamp = strtotime($previous_date);
            //   $difference = $date1Timestamp - $date2Timestamp;
            //   $diff= floor($difference / (60*60*24));
            //   $date_difference=$diff;
      
            // }
  }

  public function sort_projectb_type()
  {
      extract($_POST);
      $path=base_url();
      $url = $path.'api/Project_posting_api/sort_job_type?jm_project_type='.$project_type; 
            //echo $url;die();  
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_HTTPGET, true);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $response_json = curl_exec($ch);
      curl_close($ch);
      $response=json_decode($response_json, true);       
  }
}