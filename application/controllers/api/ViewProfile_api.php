<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');
class ViewProfile_api extends REST_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('profile_model/profile_model');
		date_default_timezone_set('Asia/Kolkata');	//set Kuwait's timezone
	}
	

	// -----------------------ALL SKILLS API----------------------//
	//-------------------------------------------------------------//
	public function get_allSkills_get(){
		$result = $this->dashboard_model->get_allSkills();
		return $this->response($result);			
	}
	//---------------------ALL SKILLS END------------------------------//

	// -----------------------ADD USER SKILLS API----------------------//
	//-------------------------------------------------------------//
	public function add_userSkills_get(){
		extract($_GET);
		$result = $this->dashboard_model->add_userSkills($user_id,$skill_id,$profile_type);
		return $this->response($result);			
	}
	//---------------------ADD USER SKILLS END------------------------------//

	// -----------------------ADD USER PORTFOLIO API----------------------//
	//-------------------------------------------------------------//
	public function add_portfolio_post(){
		$data=$_POST;
		$result = $this->profile_model->add_portfolio($data);
		return $this->response($result);			
	}
	//---------------------ADD USER PORTFOLIO END------------------------------//

	// -----------------------USER SKILLS API----------------------//
	//-------------------------------------------------------------//
	public function get_userSkills_get(){
		extract($_GET);
		$result = $this->dashboard_model->get_userSkills($user_id,$profile_type);
		return $this->response($result);			
	}
	//---------------------USER SKILLS END------------------------------//

	// -----------------------USER SKILLS API----------------------//
	//-------------------------------------------------------------//
	public function get_userPortfolio_get(){
		extract($_GET);
		$result = $this->profile_model->get_userPortfolio($user_id,$profile_type);
		return $this->response($result);			
	}
	//---------------------USER SKILLS END------------------------------//

	// -----------------------DELETE PORTFOLIO API----------------------//
	//-------------------------------------------------------------//
	public function del_portfolio_get(){
		extract($_GET);
		$result = $this->profile_model->del_portfolio($portfolio_id);
		return $this->response($result);			
	}
	//---------------------DELETE PORTFOLIO END------------------------------//

	// -----------------------USER INFORMATION API----------------------//
	//-------------------------------------------------------------//
	public function get_userInfo_get(){
		extract($_GET);
		$result = $this->profile_model->get_userInfo($user_id);
		return $this->response($result);			
	}
	//---------------------USER INFORMATION END------------------------------//

	// -----------------------USER FEEDBACK API----------------------//
	//-------------------------------------------------------------//
	public function get_userFeedback_get(){
		extract($_GET);
		$result = $this->dashboard_model->get_userFeedback($user_id,$profile_type);
		return $this->response($result);			
	}
	//---------------------USER FEEDBACK END------------------------------//

	// -----------------------USER TRANSCATONS API----------------------//
	//-------------------------------------------------------------//
	public function get_userTransaction_get(){
		extract($_GET);
		$result = $this->dashboard_model->get_userTransaction($user_id);
		return $this->response($result);			
	}
	//---------------------USER TRANSCATONS END------------------------------//

	// -----------------------DELETE USER SKILLS API----------------------//
	//-------------------------------------------------------------//
	public function del_userSkill_get(){
		$skill_id=$_GET['skill_id'];
		$profile_type=$_GET['profile_type'];
		$user_id=$_GET['user_id'];
		$result = $this->dashboard_model->del_userSkill($user_id,$skill_id,$profile_type);
		return $this->response($result);			
	}
	//---------------------DELETE USER SKILLS END------------------------------//
	
	//-----------------function for 3 bars of rating-----------------------//
	public function get_bars_value_get(){
		extract($_GET);
		$profile_type=$_GET['profile_type'];
		$user_id=$_GET['user_id'];
		$result = $this->profile_model->get_bars_value($user_id,$profile_type);
		return $this->response($result);			
	}
	//--------------------function end--------------------------------//
        public function getBars_PercentageValue_get(){
                $user_id=$_GET['user_id'];
		$result = $this->profile_model->getBars_PercentageValue($user_id);
		return $this->response($result);
        }
}