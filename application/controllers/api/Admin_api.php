<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');
class Admin_api extends REST_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('admin_model/settings_model');
		$this->load->model('admin_model/adminUser_model');
		//date_default_timezone_set('Asia/Kolkata');	//set Kuwait's timezone
	}
	

	// -----------------------UPDATE EMAIL API----------------------//
	//-------------------------------------------------------------//
	public function updateEmail_post(){
		extract($_POST);
		$result = $this->settings_model->updateEmail($admin_email);
		return $this->response($result);			
	}
	//---------------------UPDATE EMAIL END------------------------------//

		// -----------------------UPDATE username API----------------------//
	//-------------------------------------------------------------//
	public function updateUname_post(){
		extract($_POST);
		$result = $this->settings_model->updateUname($admin_uname);
		return $this->response($result);			
	}
	//---------------------UPDATE username END------------------------------//
// -----------------------UPDATE Password API----------------------//
	//-------------------------------------------------------------//
	public function updatePass_post(){
		extract($_POST);
		$result = $this->settings_model->updatePass($admin_pass);
		return $this->response($result);			
	}
	//---------------------UPDATE username END------------------------------//

	// -----------------------UPDATE Password API----------------------//
	//-------------------------------------------------------------//
	public function updateKey_post(){
		extract($_POST);
		$result = $this->settings_model->updateKey($admin_key);
		return $this->response($result);			
	}
	//---------------------UPDATE username END------------------------------//

	// -----------------------UPDATE USER DASHBOARD IMAGE API----------------------//
	//-------------------------------------------------------------//
	public function updateDashboardImage_post(){
		extract($_POST);
		$result = $this->settings_model->updateDashboardImage($imagePath);
		return $this->response($result);			
	}
	//---------------------UPDATE USER DASHBOARD IMAGE END------------------------------//

	// -----------------------UPDATE EMAIL API----------------------//
	//-------------------------------------------------------------//
	public function getAdminDetails_get(){
		//extract($_POST);
		$result = $this->settings_model->getAdminDetails();
		return $this->response($result);			
	}
	//---------------------UPDATE EMAIL END------------------------------//
	 public function registerAdmin_post() {
        extract($_POST);
        $result = $this->settings_model->registerCustomer($register_username,$register_email,$register_mobile_no,$user_role);
        return $this->response($result);
    }
	
	
	// -----------------------GET IMAGE PATH FROM SETTINGS API----------------------//
	//-------------------------------------------------------------//
	public function getDashImage_get(){
		extract($_GET);
		$result = $this->settings_model->getSettingDetails($setting_name);
		return $this->response($result);			
	}
	//---------------------GET IMAGE PATH FROM SETTINGS END------------------------------//
//---------get private key----------//
	public function getpasskey_get(){
		extract($_GET);
		$result = $this->settings_model->getSettingDetails($setting_name);
		return $this->response($result);			
	}


	// -----------------------GET ALL ADMIN USERS API----------------------//
	//-------------------------------------------------------------//
	public function allUsers_get(){
		extract($_GET);
		$result = $this->adminUser_model->allUsers();
		return $this->response($result);			
	}
	//---------------------GET ALL ADMIN USERS API END------------------------------//

	// -----------------------GET PRIVATE KEY FROM SETTINGS API----------------------//
	//-------------------------------------------------------------//
	public function getPrivateKey_get(){
		extract($_GET);
		$result = $this->settings_model->getSettingDetails($setting_name);
		return $this->response($result);			
	}
	//---------------------GET PRIVATE KEY FROM SETTINGS END------------------------------//


	// -----------------------REJECT USER REQUEST API----------------------//
	//-------------------------------------------------------------//
	public function rejectUser_post(){
		extract($_POST);
		$result = $this->adminUser_model->rejectUser($user_id);
		return $this->response($result);			
	}
	//---------------------REJECT USER REQUEST END------------------------------//

	// -----------------------APPROVE USER REQUEST API----------------------//
	//-------------------------------------------------------------//
	public function apprUser_post(){
		extract($_POST);
		$result = $this->adminUser_model->apprUser($user_id,$auto_passwd);
		return $this->response($result);			
	}
	//---------------------APPROVE USER REQUEST END------------------------------//

	
}