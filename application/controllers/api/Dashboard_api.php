<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');
class Dashboard_api extends REST_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('dashboard_model/dashboard_model');
		date_default_timezone_set('Asia/Kolkata');	//set Kuwait's timezone
	}

	
	// -----------------------USER LOGIN API----------------------//
	//-------------------------------------------------------------//
	// public function get_allSkills_post(){
	// 	extract($_POST);
	// 	$result = $this->login_model->login($login_username,$login_password,$login_profile_type);
	// 	return $this->response($result);			
	// }
	//---------------------USER LOGIN END------------------------------//
        public function getEmployer_Details_get(){
            extract($_GET);
            $result = $this->dashboard_model->getEmployer_Details($emp_id,$profile_type);
	    return $this->response($result);
        }
        public function get_job_get(){
            extract($_GET);
            $result = $this->dashboard_model->get_job($job_id);
	    return $this->response($result);
        }
        public function show_BookmarkedJobs_get(){
            extract($_GET);
            $result = $this->dashboard_model->show_BookmarkedJobs($user_id);
	    return $this->response($result);
        }
        // -----------------------ALL SKILLS API----------------------//
	//-------------------------------------------------------------//
	public function get_allSkills_get(){
		$result = $this->dashboard_model->get_allSkills();
		return $this->response($result);			
	}
	//---------------------ALL SKILLS END------------------------------//
	// -----------------------ALL SKILLS API----------------------//
	//-------------------------------------------------------------//
	public function getSkill_byCategory_get(){
		extract($_GET);
		$result = $this->dashboard_model->getSkill_byCategory($category_id);
		return $this->response($result);			
	}
	//---------------------ALL SKILLS END------------------------------//
	// -----------------------ALL CATEGORY API----------------------//
	//-------------------------------------------------------------//
	public function get_allCategory_get(){
		$result = $this->dashboard_model->get_allCategory();
		return $this->response($result);			
	}
	//---------------------ALL CATEGORY END------------------------------//
	// -----------------------ALL SKILLS API----------------------//
	//-------------------------------------------------------------//
	public function addRow_get(){
		extract($_GET);
		$result = $this->dashboard_model->addRow($user_id,$profile_type);
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

	// -----------------------USER SKILLS API----------------------//
	//-------------------------------------------------------------//
	public function get_userSkills_get(){
		extract($_GET);
		$result = $this->dashboard_model->get_userSkills($user_id,$profile_type);
		return $this->response($result);			
	}
	//---------------------USER SKILLS END------------------------------//

	// -----------------------USER INFORMATION API----------------------//
	//-------------------------------------------------------------//
	public function get_userInfo_get(){
		extract($_GET);
		$result = $this->dashboard_model->get_userInfo($user_id,$profile_type);
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
	public function getAppliedJobs_ByUser_get(){
		$user_id=$_GET['user_id'];
		$result = $this->dashboard_model->getAppliedJobs_ByUser($user_id);
		return $this->response($result);
	}
	public function getPostedJobs_ByUser_get(){
		$user_id=$_GET['user_id'];
		$result = $this->dashboard_model->getPostedJobs_ByUser($user_id);
		return $this->response($result);
	}
	public function getPosted_JobsByJobEmployer_get(){
		$user_id=$_GET['user_id'];
		$result = $this->dashboard_model->getPosted_JobsByJobEmployer($user_id);
		return $this->response($result);
	}
	public function getPrevious_JobsByJobEmployer_get(){
		$user_id=$_GET['user_id'];
		$result = $this->dashboard_model->getPrevious_JobsByJobEmployer($user_id);
		return $this->response($result);
	}
	public function Show_Live_Projects_get(){
		$user_id=$_GET['user_id'];
		$result = $this->dashboard_model->Show_Live_Projects($user_id);
		return $this->response($result);
	}
	public function Show_Previous_Projects_get(){
		$user_id=$_GET['user_id'];
		$result = $this->dashboard_model->Show_Previous_Projects($user_id);
		return $this->response($result);
	}
	public function get_userDetails_get(){
		$user_id=$_GET['user_id'];
		$result = $this->dashboard_model->get_userDetails($user_id);
		return $this->response($result);
	}
//-------------this fun is used to get the feedbacks of freelancer---------------------//
        public function getTestomonials_get(){
                $user_id=$_GET['user_id'];
                $profile_type=$_GET['profile_type'];
		$result = $this->dashboard_model->getTestomonials($user_id,$profile_type);
		return $this->response($result);
        }
//-------------this fun is used to get the feedbacks of freelancer---------------------//

    // ---------------	FREELANCER LIVE PROJECTS--------------------//
	public function freelanceLive_Projects_get(){
		$user_id=$_GET['user_id'];
		$result = $this->dashboard_model->freelanceLive_Projects($user_id);
		return $this->response($result);
	}
        //	-------------------------ENDS--------------------------------//

         // ---------------	FREELANCER PREVIOUS PROJECTS--------------------//
	public function freelancePrevious_Projects_get(){
		$user_id=$_GET['user_id'];
		$result = $this->dashboard_model->freelancePrevious_Projects($user_id);
		return $this->response($result);
	}
        //	-------------------------ENDS--------------------------------//
        //-----------------this fun gets the average rating of freelancer-------------//
        public function getAverageRatingsOf_Freelancer_get(){
                $user_id=$_GET['user_id'];
		$result = $this->dashboard_model->getAverageRatingsOf_Freelancer($user_id);
		return $this->response($result);
        }
        //-----------------this fun gets the average rating of freelancer-------------//
        //-----------------this fun gets the average rating of freelancer employer-------------//
        public function getAverageRatingsOf_FreelancEmployer_get(){
                $user_id=$_GET['user_id'];
		$result = $this->dashboard_model->getAverageRatingsOf_FreelancEmployer($user_id);
		return $this->response($result);
        }
        //-----------------this fun gets the average rating of freelancer employer-------------//
        
}