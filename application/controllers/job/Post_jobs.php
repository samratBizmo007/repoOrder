<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

error_reporting(E_ERROR | E_PARSE);
class Post_jobs extends CI_Controller {

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
        $data['all_skills'] = Post_jobs::get_allSkills();
        $data['all_categories'] = Post_jobs::get_allCategory();
        $data['country'] = Post_jobs::get_country();
        
        //$data['state'] = Post_jobs::get_state();
        $this->load->view('includes/header.php');
        $this->load->view('pages/job/post_job.php', $data);
        $this->load->view('includes/footer.php');
    }

        //----------------fun for getting state by country id-----------------------//
    public function getStateby_country() {
        extract($_POST);
        $path = base_url();
        $url = $path . 'api/Edit_profile_api/getStateby_country?country_id=' . $country_id;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        print_r($response_json);
       //return $response;
    }

    //---------------------------------this fun ends here-------------------//
 public function get_country() {

        //Connection establishment, processing of data and response from REST API
        $path = base_url();
        $url = $path . 'api/Edit_profile_api/get_country';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        //print_r($response_json);die();
        return $response;
    }
    //---------------------------------this fun for getting states by -------------------//
    public function get_state() {

        //Connection establishment, processing of data and response from REST API
        $path = base_url();
        $url = $path . 'api/Edit_profile_api/get_state';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        //print_r($response_json);die();
        return $response;
    }

    //---------------------------------this fun for getting states by -------------------//   
//----------function to get skill list from database--------------------------//	
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

    //----------function to get skill list from database--------------------------//    
    public function getSkill_byCategory() {
        extract($_POST);
        //print_r($_POST);die();
        //Connection establishment, processing of data and response from REST API
        $path = base_url();
        $url = $path.'api/Dashboard_api/getSkill_byCategory?category_id='.$category_id;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
print_r($response_json);
//        $key='';
//        if($response['status']==200){
//        foreach($response['status_message'] as $key) {
//            //print_r($key['jm_skill_name']);
//            echo '<option value="'.$key['jm_skill_name'].'"><b>'.$key['jm_skill_name'].'</b></option>';
//}
//        }
    }
    

    //----------function to get Category list from database--------------------------//    
    public function get_allCategory() {

        //Connection establishment, processing of data and response from REST API
        $path = base_url();
        $url = $path . 'api/Dashboard_api/get_allCategory';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        return $response;
    }

//----------function to get skill list from database--------------------------//
    public function SaveJOB() {
        extract($_POST);
            //print_r($_POST);die();
            //echo json_encode($skill);
        $salary='';
        if($Salary_range == '0'){
            $Salary_range = 'Not Disclosed';
        }
        $data = $_POST;
        
        $data['skill'] = json_encode($_POST['skill']);                    
        $data['Salary_range'] = $Salary_range;
        
        $user_id = $this->session->userdata('user_id');
        $user_name = $this->session->userdata('user_name');
        $profile_type = $this->session->userdata('profile_type');
        
        $data['user_id'] = $user_id;
        $data['user_name'] = $user_name;
        $data['profile_type'] = $profile_type;
        //print_r($data);die();
        $path = base_url();
        $url = $path.'api/PostJob_api/SaveJOB';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        //print_r($response_json);die();
        if ($response['status'] == 200) {
            echo '<h3 class="bluish-green w3-margin"><i class="fa fa-check"></i> '.$response['status_message'].'</h3>   
            <script>
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove(); 
                });
                window.location.href="'.base_url().'profile/dashboard";
            }, 800);
            </script>';
        } else {
            echo '<h3 class="w3-text-red w3-margin"><i class="fa fa-warning"></i>Something went wrong. Job Posting Failed !!!</h3> 
            <script>
            /*window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove(); 
                });
                location.reload();
                //window.location.href="'.base_url().'profile/dashboard";
            }, 800);*/
            </script>   
            ';
        }
        
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

     // ---------------explore job seeker filter--------------//
    public function filterJobs(){ 
        //print_r($_POST);die();
    $this->load->model('jobseeker_model/Jobseeker_list_model','jobs');
    $data = $this->input->post();
    $result['result'] = $this->jobs->filterJob($data);
    //echo '<pre>';print_r($result);exit;
    $result['job_bookmarks'] = Post_jobs::getAll_BookmarkedJobs();

    if($result['result'] == 'N/A'){
      echo '
      <div class="w3-col 12 w3-padding w3-margin">              
      <div class="w3-col l12">
      <div class="w3-center">
      <img src="'.base_url().'css/logos/no_data.png" width="auto" class="img"/>
      </div>
      </div>             
      </div>';
    }else{
      
      if($data['mode']['mode'] == 'job_list'){
        //echo 'Demooooo';die();
        $this->load->view('pages/job/_jobList.php',$result);
      }
    }

  }
  //---------------------fucntion ends--------------------//

}
