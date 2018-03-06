<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//Jobmandi profile View_profile
class View_project extends CI_Controller {

    public function __construct() {
        parent::__construct();

        //start session		
        $user_id = $this->session->userdata('user_id');
        $user_name = $this->session->userdata('user_name');
        $profile_type = $this->session->userdata('profile_type');
        //check session variable set or not, otherwise logout
        if (($user_id == '') || ($user_name == '') || ($profile_type == '')) {
            redirect('auth/login');
        }
    }

    public function index($link='') {
        $project_id=base64_decode($link);
        $data['bidList'] = View_project::get_biddedList($project_id);
        $data['details'] = View_project::getProjectDetails($project_id);
        $data['Skills'] = View_project::getProjectSkills($project_id);
        $data['EmployersRating'] = View_project::getDetails_OF_FreelanceEmployerRatings($project_id);
        $data['FreelancerRating'] = View_project::getDetails_OF_FreelancerRatings($project_id);
        $this->load->view('includes/header.php');
        $this->load->view('pages/project/view_project', $data);
        $this->load->view('includes/footer.php');
    }
//-----------this fun is used to get the details of the freelancer employer and freelancer ratings are given
//----------or not given------------------------------------------------------------------------------------//    
    public function getDetails_OF_FreelanceEmployerRatings($project_id){
        $profile_type = $this->session->userdata('profile_type');
        $user_id = $this->session->userdata('user_id');
        $path = base_url();
        $url = $path.'api/View_Project_api/getDetails_OF_FreelanceEmployerRatings?user_id='.$user_id.'&profile_type='.$profile_type.'&project_id='.$project_id;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        return $response;
    }

//-----------this fun is used to get the details of the freelancer employer and freelancer ratings are given
//----------or not given------------------------------------------------------------------------------------//
//-----------this fun is used to get the details of the freelancer employer and freelancer ratings are given
//----------or not given------------------------------------------------------------------------------------//    
    public function getDetails_OF_FreelancerRatings($project_id){
        $profile_type = $this->session->userdata('profile_type');
        $user_id = $this->session->userdata('user_id');
        $path = base_url();
        $url = $path.'api/View_Project_api/getDetails_OF_FreelancerRatings?user_id='.$user_id.'&profile_type='.$profile_type.'&project_id='.$project_id;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        return $response;
    }

//-----------this fun is used to get the details of the freelancer employer and freelancer ratings are given
//----------or not given------------------------------------------------------------------------------------//    
    public function Fetch_Bidding_Info(){
        extract($_POST);
        $path = base_url();
        $url = $path . 'api/View_Project_api/Fetch_Bidding_Info?user_id='.$user_id.'&project_id='.$project_Id;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
       // print_r($response);die();
        if($response['status']== 200){
            $status = 'TRUE';
        }else{
            $status = 'FALSE';
        }
        echo  $status;   
    }

//------------Function to get all project details to add in user list------------//
    public function getProjectDetails($project_id) {
        //Connection establishment, processing of data and response from REST API
        $path = base_url();
        $url = $path . 'api/View_Project_api/getProjectDetails?project_id='.$project_id;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        return $response;       
    }

// ---------------------function ends----------------------------------//
//-------this fun to get the all project skills-------------------------//    
    public function getProjectSkills($project_id) {
        $path = base_url();
        $url = $path . 'api/View_Project_api/getProjectSkills?project_id='.$project_id;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        return $response;
    }

//-------this fun to get the all project skills-------------------------// 


//------------------------get bidded list-------------------//
    public function get_biddedList($project_id)
    {
        //print_r($_GET);die();
        $path=base_url();
        $url = $path.'api/View_Project_api/get_biddedList?project_id='.$project_id;        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response=json_decode($response_json, true);
        //print_r($response);
        return $response;
    }
    //-----------------------function ends here-----------------------//
    

//---------this fun is used to save project bidding data---------------//
    public function saveProjectBidding() {

        extract($_POST);
        $data = $_POST;
        //print_r($_POST);die();
        $File_path_forCoverletter='';
        //print_r($image_path);die();
        $data = $_POST;
        if (!empty($_FILES['projectCoverletter_file']['name'])) {
            //echo "check if condition";
            $extension = pathinfo($_FILES['projectCoverletter_file']['name'], PATHINFO_EXTENSION);
            //print_r($extension);die();
            $_FILES['userFile']['name'] = '#Project_CoverLetter_0' . $user_id . '_' . $project_id . '.' . $extension;
            $_FILES['userFile']['type'] = $_FILES['projectCoverletter_file']['type'];
            $_FILES['userFile']['tmp_name'] = $_FILES['projectCoverletter_file']['tmp_name'];
            $_FILES['userFile']['error'] = $_FILES['projectCoverletter_file']['error'];
            $_FILES['userFile']['size'] = $_FILES['projectCoverletter_file']['size'];
            $uploadPath = 'images/jm_project_file/project_coverletter/';  //upload images in images/desktop/ folder
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = '*'; //allowed types of images           
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);  //load upload file config.
            $this->upload->initialize($config);

            if ($this->upload->do_upload('userFile')) {
                $fileData = $this->upload->data();
                $File_path = 'images/jm_project_file/project_coverletter/' . $fileData['file_name'];
                $File_path_forCoverletter = $File_path;
                //echo($File_path_forCoverletter);die();
            } else {
                $error = array('error' => $this->upload->display_errors());
                //print_r($error['error']);                die();
            }
        }
        else{
            $File_path_forCoverletter='';
        }
        $data['File_path'] = $File_path_forCoverletter;
        //print_r($data['File_path']);die(); 
        $path = base_url();
        $url = $path . 'api/View_Project_api/saveProjectBidding';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        //print_r($response_json);die();
        if ($response['status'] == 200) {
            echo'
            <h4 class="bluish-green w3-margin"><i class="fa fa-check"></i> '.$response['status_message'].'</h4>
            <script>
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove(); 
                });
                window.location.href="'.base_url().'project/project_listing";
            }, 1000);
            </script>    
            ';
        } else {
            echo'<h4 class="w3-text-red w3-margin"><i class="fa fa-warning"></i> '.$response['status_message'].'</h4>
            <script>
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove(); 
                });
                window.location.href="'.base_url().'project/project_listing";
            }, 1000);
            </script>  
            ';
        }
    }

//---------this fun is used to save project bidding data---------------//
}
