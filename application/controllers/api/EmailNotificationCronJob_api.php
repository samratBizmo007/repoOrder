<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');
class EmailNotificationCronJob_api extends REST_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('emailNotification_model/EmailNotification_model');
		date_default_timezone_set('Asia/Kolkata');	//set Kuwait's timezone
	}
//---this fun is used to send the email notification for not getting logged in for freelancer from last 15 days---------//                
        public function getEmailNotifications_get(){
		$result = $this->EmailNotification_model->getEmailNotifications();
		return $this->response($result);			
	}
//---this fun is used to send the email notification for not getting logged in for freelancer from last 15 days---------// 
//---this fun is used to send the email notification for not getting logged in for freelancer employer from last 15 days---------//        
        
         public function getEmailNotificationsForFreelancer_Employer_get(){
		$result = $this->EmailNotification_model->getEmailNotificationsForFreelancer_Employer();
		return $this->response($result);			
	}
//---this fun is used to send the email notification for not getting logged in for freelancer employer from last 15 days---------//        
//---this fun is used to send the email notification for not getting logged in for freelancer job employer from last 5 days---------//        
        
         public function getEmailNotificationsForJob_Employer_get(){
		$result = $this->EmailNotification_model->getEmailNotificationsForJob_Employer();
		return $this->response($result);			
	}
//---this fun is used to send the email notification for not getting logged in for freelancer job employer from last 5 days---------//        
        
}
?>