<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//error_reporting(E_ERROR | E_PARSE);

class Jobseeker_lists extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // //start session		
        // $user_id = $this->session->userdata('user_id');
        // $user_name = $this->session->userdata('user_name');
        // $profile_type = $this->session->userdata('profile_type');
        // //check session variable set or not, otherwise logout
        // if (($user_id == '') || ($user_name == '') || ($profile_type == '')) {
        //     redirect('auth/login');
        // }
    }

    public function index() {
        $this->load->model('job_model/Job_listing_model');

        //$data['jobs'] = Jobseeker_lists::getAllJobs();
        
        //----------pagination code starts here-------------------------------------
        //------loading the library pagination----------------------//
        $this->load->library('pagination');
        //--------------creating the config array for pagination basic requirements----------------//
        $config = [
            'base_url' => base_url('jobseeker/Jobseeker_lists/index'),
            'per_page' => 5,
            'total_rows' => $this->Job_listing_model->numRows(),
        ];
        $config['full_tag_open'] = "<ul class='pagination' style='color:black'>";
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li style="color:black">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active" style="background-color: #4CAF50;"><a href="#" style="color:white">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li style="color:black">';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li style="color:black">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li style="color:black">';
        $config['last_tag_close'] = '</li>';

        $config['prev_link'] = '<i class="fa fa-long-arrow-left" ></i> Previous';
        $config['prev_tag_open'] = '<li style="color:black">';
        $config['prev_tag_close'] = '</li>';

        $config['next_link'] = 'Next <i class="fa fa-long-arrow-right" ></i>';
        $config['next_tag_open'] = '<li style="color:black">';
        $config['next_tag_close'] = '</li>';
        
        //-----initialise pagination library with passing parameter config-----------//
        $this->pagination->initialize($config);
        //-----initialise pagination library with passing parameter config-----------//
        $data["links"] = $this->pagination->create_links();
        //$data['jobs'] = $this->Job_listing_model->getAllJobs($config['per_page'], $this->uri->segment(4));
        $path = base_url();
        $url = $path . 'api/JobListing_api/getAllJobs?per_page='.$config['per_page'].'&offset='.$this->uri->segment(4);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $data['jobs'] = json_decode($response_json, true);

        $search_cat=$this->input->get('search_param', TRUE);
        if($search_cat!=''){
            $data['jobs'] = Jobseeker_lists::getAllJob_Details_param($search_cat);
        }
        //return $response;
       //print_r($response_json);   
        $data['job_bookmarks'] = Jobseeker_lists::getAll_BookmarkedJobs();
        $data['all_skills'] = Jobseeker_lists::get_allSkills();
        $this->load->view('includes/header.php');
        $this->load->view('pages/jobseeker/jobseeker_joblist.php', $data);
        $this->load->view('includes/footer.php');
    }

    public function showjobDetails($job_id = '') {
        //print_r($job_id);
        //start session      
        $user_id = $this->session->userdata('user_id');
        $user_name = $this->session->userdata('user_name');
        $profile_type = $this->session->userdata('profile_type');
        //check session variable set or not, otherwise logout
        if (($user_id == '') || ($user_name == '') || ($profile_type == '')) {
            redirect('auth/login');
        }
        $data['jobDetails'] = Jobseeker_lists::getJob_Details($job_id);
        $data['all_skills'] = Jobseeker_lists::get_allSkills();
        $this->load->view('includes/header.php');
        $this->load->view('pages/jobseeker/job_application.php',$data);
        $this->load->view('includes/footer.php');
    }
    public function get_allSkills() {

        //Connection establishment, processing of data and response from REST API
        $path = base_url();
        $url = $path . 'api/Dashboard_api/get_allSkills';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        return $response;
    }
    public function getAll_BookmarkedJobs() {
        $user_id = $this->session->userdata('user_id');
        $path = base_url();
        $url = $path . 'api/JobListing_api/getAll_BookmarkedJobs?user_id='.$user_id;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        return $response;
    }

    public function getAllJob_Details_param($search_cat) {

        //----------pagination code starts here-------------------------------------
        //------loading the library pagination----------------------//
        $this->load->library('pagination');
        //--------------creating the config array for pagination basic requirements----------------//
        $config = [
            'base_url' => base_url('jobseeker/Jobseeker_lists/index'),
            'per_page' => 10,
            'total_rows' => $this->Job_listing_model->numRows(),
        ];
        $config['first_tag_open'] = $config['last_tag_open']= $config['next_tag_open']= $config['prev_tag_open'] = $config['num_tag_open'] = '';
        $config['first_tag_close'] = $config['last_tag_close']= $config['next_tag_close']= $config['prev_tag_close'] = $config['num_tag_close'] = '';
        
        $config['cur_tag_open'] = "";
        $config['cur_tag_close'] = "";
        //-----initialise pagination library with passing parameter config-----------//
        $this->pagination->initialize($config);
        //-----initialise pagination library with passing parameter config-----------//
        $data["links"] = $this->pagination->create_links();
        //$data['jobs'] = $this->Job_listing_model->getAllJobs($config['per_page'], $this->uri->segment(4));

        $path = base_url();
        $url = $path . 'api/JobListing_api/getAllJob_Details_param?per_page='.$config['per_page'].'&offset='.$this->uri->segment(4).'&param='.$search_cat;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        return $response;
    }

    //-------------------add bookmark----------------------//
    public function add_bookmarkForJob(){
      extract($_POST);
      $path=base_url();
      $url = $path.'api/JobListing_api/add_bookmarkForJob?user_id='.$user_id.'&job_id='.$job_id; 
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_HTTPGET, true);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $response_json = curl_exec($ch);
      curl_close($ch);
      $response=json_decode($response_json, true);
 // print_r($response);die();
//  
//  if($response['status'] == 200){
//            echo '<div class="alert alert-success" style="margin-bottom:5px">
//		  <strong>'.$response['status_message'].'</strong> 
//		  </div>
//		  <script>
//		window.setTimeout(function() {
//		$(".alert").fadeTo(500, 0).slideUp(500, function(){
//		$(this).remove(); 
//		});
//		}, 100);
//		</script>';
//        }
//  
  }
//-------------------function ends----------------------//

  public function del_bookmarkForJob(){
    extract($_POST);
    $path = base_url();
    $url = $path.'api/JobListing_api/del_bookmarkForJob?user_id='.$user_id.'&job_id='.$job_id;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_json = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response_json, true);
}


public function getJob_Details($job_id) {
    $user_id = $this->session->userdata('user_id'); 
    $profile_type = $this->session->userdata('profile_type');
    $path = base_url();
    $url = $path . 'api/JobApplications_api/getJob_Details?job_id='.$job_id.'&user_id='.$user_id.'&profile_type='.$profile_type;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_json = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response_json, true);
        //print_r($response_json);die();
    return $response;
}




}
