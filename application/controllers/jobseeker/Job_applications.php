<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

error_reporting(E_ERROR | E_PARSE);
class Job_applications extends CI_Controller {

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
    
    public function saveApplication(){
        extract($_POST);
        $data = $_POST;
        
        $File_path = '';
        //print_r($image_path);die();
        $data = $_POST;
        if (!empty($_FILES['resume']['name'])) {
            //echo "check if condition";
            $extension = pathinfo($_FILES['resume']['name'], PATHINFO_EXTENSION);
            //print_r($extension);die();
            $_FILES['userFile']['name'] = '#resume'.'_'. $user_name .'_'. $job_id . '_' . $user_id . '.' . $extension;
            $_FILES['userFile']['type'] = $_FILES['resume']['type'];
            $_FILES['userFile']['tmp_name'] = $_FILES['resume']['tmp_name'];
            $_FILES['userFile']['error'] = $_FILES['resume']['error'];
            $_FILES['userFile']['size'] = $_FILES['resume']['size'];
            $uploadPath = 'images/jobseeker_resume/';  //upload images in images/desktop/ folder
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = '*'; //allowed types of images           
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);  //load upload file config.
            $this->upload->initialize($config);

            if ($this->upload->do_upload('userFile')) {
                $fileData = $this->upload->data();
                $File_path = 'images/jobseeker_resume/' . $fileData['file_name'];
                $File_path = $File_path;
            } else {
                $error = array('error' => $this->upload->display_errors());
            }
        }
        else{
            $File_path='';
        }
        $data['File_path'] = $File_path;
        $data['profile_type'] = $this->session->userdata('profile_type');
       //print_r($data);die(); 
        $path = base_url();
        $url = $path . 'api/JobApplications_api/saveApplication';
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
                window.location.href="'.base_url().'jobseeker/jobseeker_lists";
            }, 1000);
            </script>    
            ';
        } else {
            echo'
            <h4 class="bluish-green w3-margin"><i class="fa fa-warning"></i> '.$response['status_message'].'</h4>
            <script>
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove(); 
                });
                window.location.href="'.base_url().'jobseeker/jobseeker_lists";
            }, 1000);
            </script>    
            ';
        }
    }
    public function checkAlreadyApplied(){
        extract($_POST);
        $path = base_url();
        $url = $path . 'api/JobApplications_api/checkAlreadyApplied?job_id='.$job_id.'&user_id='.$user_id;
        //echo $url;die();
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        //print_r($response_json);die();
        if ($response['status'] == 200) {
            echo 'TRUE';
        }else{
            echo 'FALSE';
        }
    }
    
 	
 
}
