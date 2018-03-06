<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');

class Edit_profile_api extends REST_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('profile_model/edit_profile_model');
    }
//---------------Api for get all project details from form---------//
     public function get_allEditdetails_post()
     {
        $data = $_POST;
        $result = $this->edit_profile_model->get_allEditdetails($data);
        return $this->response($result);            
     }
     // ------------------------END------------------------------------//
     public function getStateby_country_get(){
         extract($_GET);
         $result = $this->edit_profile_model->getStateby_country($country_id);
         return $this->response($result);
     }
     //-------------------get country---------//
	public function get_country_get(){
		$result = $this->edit_profile_model->get_country();
		return $this->response($result);			
	}
     //-----------end----------------------------//
     
	//------------get state-----------//
	public function get_state_get(){
		$result = $this->edit_profile_model->get_state();
		return $this->response($result);			
	}
	//-------------end-------------------//
//--------this fun is used to get the deatails of user details----------//
    public function get_userDetails_get(){
        extract($_GET);        
        $result = $this->edit_profile_model->get_userDetails($user_id);
        return $this->response($result);
    }
//--------this fun is used to get the deatails of user details----------//     
     // -----------------------USER PROFILE INFORMATION API----------------------//
    //-------------------------------------------------------------//
    public function get_userProfile_info_get(){
        extract($_GET);
        $result = $this->edit_profile_model->get_userProfile_info($user_id);
        return $this->response($result);            
    }
    //---------------------USER PROFILE INFORMATION END------------------------------//
    //---------this fun is used to get save the details of the updated password---------//
    public function upadteUser_Password_post(){
        $data = $_POST;
        $result = $this->edit_profile_model->upadteUser_Password($data);
        return $this->response($result);
    }
    //---------this fun is used to get save the details of the updated password---------//    
    }