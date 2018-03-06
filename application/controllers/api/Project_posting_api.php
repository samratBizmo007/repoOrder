<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');

class Project_posting_api extends REST_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('project_model/Project_listing_model');
        $this->load->model('project_model/Post_project_model');
    }
    //------this fun is used to get the count of projects-----------------//
    public function getCountOf_Projects_get(){
        $result = $this->Post_project_model->getCountOf_Projects();
     	return $this->response($result);
    }
    //---------this fun is used to get the count of projects-------------------//
//---------------Api for get all project details from form---------//
     public function get_allproject_details_post()
     {
        $data = $_POST;
        $result = $this->Post_project_model->get_allproject_details($data);
        return $this->response($result);            
     }
  //---------------Api to show project list on projectlisting page ---------//  
     public function get_project_list_get()
     {
     	$result = $this->Post_project_model->get_project_list();
     	return $this->response($result);
     }

     //---------------API tO BOOKMARK PROJECT ---------//  
     public function addBookmark_get()
     {
        extract($_GET);
        $result = $this->Project_listing_model->bookmark_project($user_id,$project_id);
        return $this->response($result);
     }
     //----------------------------------API ENDS------------------------------//

     //---------------API tO DELETE BOOKMARK PROJECT ---------//  
     public function del_bookmark_get()
     {
        extract($_GET);
        $result = $this->Project_listing_model->del_bookmark($user_id,$project_id);
        return $this->response($result);
     }
     //----------------------------------API ENDS------------------------------//

     // -----------------------USER DETAILS API----------------------//
    //-------------------------------------------------------------//
    public function get_userDetails_get(){
        extract($_GET);
        $result = $this->Project_listing_model->get_userDetails($user_id);
        return $this->response($result);            
    }
    //---------------------USER DETAILS END------------------------------//
    //----------------function for show bookmark------------------------//
    public function show_bookmark_get()
    {
        extract($_GET);
        $result = $this->Project_listing_model->show_bookmark_project($user_id);
        return $this->response($result);
    }
    //---------------------end function--------------------------------//  

 public function FetchSkills_get(){
        extract($_GET);
        $result = $this->Project_listing_model->FetchSkills($Skills);
        return $this->response($result);        
    }
    public function Get_Skills_get(){
        extract($_GET);
        $result = $this->Project_listing_model->Get_Skills($Skills);
        return $this->response($result); 
    }

    public function get_project_get()
    {
         extract($_GET);
        $result = $this->Project_listing_model->getprojectlist($jm_project_id);
        return $this->response($result);
    }

  //-------------function to submit project feedback for freelancer-------------------//
    public function feedback_api_post()
    {
       $data=($_POST);
        $result = $this->Post_project_model->save_feedback_freelancer($data);
        return $this->response($result);
    }
  //--------------------end function-----------------------------------------------// 

    public function feedback_freelancer_emp_api_post()
    {
        $data=($_POST);
        $result = $this->Post_project_model->save_feedback_freelancerEmployer($data);
        return $this->response($result);
    }

    public function get_Avg_Freelancer_rating_get()
    {
        extract($_GET);
        $result = $this->Post_project_model->calculate_Avg_freelancing_rating($jm_freelancer_id);
        return $this->response($result);
    }

    public function get_Avg_Freelancer_Employer_rating_get()
    {
        extract($_GET);
        $result = $this->Post_project_model->calculate_Avg_freelancerEmp_rating($jm_emp_id);
        return $this->response($result);
    }


     public function getFreelance_comment_get()
    {
        extract($_GET);
        $result = $this->Post_project_model->get_freelancerComments($jm_freelancer_id);
        return $this->response($result);
    }

     public function getEmployer_commentfeedbackEmployer_get()
    {
        extract($_GET);
        $result = $this->Post_project_model->get_fEmployerComments($jm_emp_id);
        return $this->response($result);
    }

}