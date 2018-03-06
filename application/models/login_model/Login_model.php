<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model{

	public function __construct() {
		parent::__construct();
        //$this->load->model('search_model');
	}
	// -----------------------USER REGISTERATION MODEL----------------------//
	//-------------------------------------------------------------//
	public function register_user($user_name,$email_id,$password,$profile_type){

		$checkEmail=Login_model::checkEmail_exist($email_id,$profile_type);
		if($checkEmail)
		{
			
			$data = array(
				'jm_username' => $user_name,
				'jm_password' => base64_encode($password.USER_KEY),
				'jm_profile_type' => $profile_type,
				'membership_package' => 'FREE',
				'joining_date' => date('Y-m-d'),
				'avail_bids' => '20',
				'avail_view' => '3',
				'total_bids' => '20',
				'total_view' => '3',
				'verification_code' => base64_encode($email_id),
				'jm_email_id' => $email_id
			);
			// $mail_verified=Login_model::sendVerificatinEmail($user_name,$email_id,$profile_type);
			// print_r($mail_verified);die();
		//sql query to insert new user
			if($this->db->insert('jm_user_tab', $data))
			{  
				$mail_verified=Login_model::sendVerificatinEmail($user_name,$email_id,$profile_type);

			// 	$dataProfile = array(
			// 	'jm_user_id' => $user_name,
			// 	'jm_password' => base64_encode($password.USER_KEY),
			// 	'jm_profile_type' => $profile_type,
			// 	'joining_date' => date('Y-m-d'),
			// 	'avail_bids' => '20',
			// 	'total_bids' => '20',
			// 	'verification_code' => base64_encode($email_id),
			// 	'jm_email_id' => $email_id
			// );jm_userprofile_tab
				if($mail_verified['status']==200){
					$response=array(
				'status' => 200,	//---------insert db success code
				'status_message' =>'Registration Successfull. Please Login With Your Registered Email-ID.'
			);
				}
				else{
					$response=array(
				'status' => 200,	//---------insert db success code but email not send
				'status_message' =>'Registration Successfull but Email-ID was not found.'
			);
				}

			}
			else
			{
				$response=array(
				'status' => 500,	//---------db error code 
				'status_message' =>'Something went wrong... Registration Failed!!!'
			);
			}	
		}
		else {
	 	//if email-Id already regiterd then show error
			$response=array(
				'status' => 500,
				'status_message' =>'Email ID Already Registered for this profile. Login by same or use another Email-ID!!!'					
			);	
		}	
		return $response;
	}
	// -----------------------USER REGISTERATION MODEL----------------------//
	//-------------------------------------------------------------//

	//-----------------------function to check whether email-ID already exists------------------//
	function checkEmail_exist($email_id,$profile_id)
	{
		$query = null;
		$query = $this->db->get_where('jm_user_tab', array(//making selection
			'jm_email_id' => $email_id,
			'jm_profile_type' => $profile_id
		));		
		
		if ($query->num_rows() > 0) {
			return 0;			
		} else {
			return 1;			
		}
	}

//-----------------------function to check whether email-ID already exists------------------//
	
	//-------------------------------------------------------------------------//
	//----------------------email verification code----------------------------//
	public function sendVerificatinEmail($username,$email,$profile_type){

		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'mx1.hostinger.in',
			'smtp_port' => '587',
     		'smtp_user' => 'customercare@jobmandi.in', // change it to yours
     		'smtp_pass' => 'Descartes@1990', // change it to yours
     		'mailtype' => 'html',
     		'charset' => 'utf-8',
     		'wordwrap' => TRUE
     	);
		$config['smtp_crypto'] = 'tls';
		//return ($config);die();

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('customercare@jobmandi.in', "Admin Team");
		$this->email->to($email,$username);  
		$this->email->subject("JOBMANDI-Email Verification");
		//$this->email->message("Dear ".$username.",\nPlease click on below URL or paste into your browser to verify your Email Address\n\n <a href='".base_url()."auth/login/verify_email/".base64_encode($email)."?profile=".$profile_type."'>".base_url()."auth/login/verify_email/".base64_encode($email)."?profile=".$profile_type."</a>\n"."\n\nThanks\nAdmin Team");
		
		$this->email->message('<html>
			<head>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link rel="stylesheet" href="http://jobmandi.in/css/bootstrap/bootstrap.min.css">
			<script src="http://jobmandi.in/css/bootstrap/jquery.min.js"></script>
			<script src="http://jobmandi.in/css/bootstrap/bootstrap.min.js"></script>
			</head>
			<body>
			<div class="container col-lg-8" style="box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important;margin:10px; font-family:Candara;">
			<img class="w3-border" style="width:100px;height:auto; margin-left:auto; margin-right: auto;" src="http://jobmandi.in/images/desktop/logo-main.png">
			<h2 style="color:#4CAF50; font-size:30px">Thank You For Registering With Jobmandi!!</h2>
			<h3 style="font-size:15px;">Hello '.$username.',<br>Please click on below URL or paste into your browser to verify your Email Address</h3>
			<div class="col-lg-12">
			<div class="col-lg-4"></div>
			<div class="col-lg-4">
			
			<a href="'.base_url().'auth/login/verify_email/'.base64_encode($email).'?profile='.$profile_type.'">'.base_url().'auth/login/verify_email/'.base64_encode($email).'?profile='.$profile_type.'</a>
			</div>
			<div class="col-lg-4"></div>
			</div>
			<hr>
			<h4 style="font-size:15px;"><b>Questions?</b></h4>
			<h4 style="font-size:15px;">Please let us know if there is anything we can help you with by replying this email.<br><br>Thanks, <b>Admin Team</b></h4>
			</div>
			</body></html>');
		
		if ($this->email->send()) {
			$response=array(
				'status' => 200,	//---------email sending succesfully 
				'status_message' =>'Email Sent Succesfully.'
			);
		} else {
			//print_r($this->email->print_debugger());die();
			$response=array(
				'status' => 500,	//---------email send failed
				'status_message' =>'Email Sending Failed.'
			);
		}
		return $response;

	}
	//----------------------email verification code ends------------------------//
	//--------------------------------------------------------------------------//

	// -----------------------USER LOGIN API----------------------//
	//-------------------------------------------------------------//
	public function login($user_name,$password,$profile_type)
	{
	//sql query to check login credentials
		$pass=base64_encode($password.USER_KEY);
		$query="SELECT * FROM jm_user_tab WHERE (jm_email_id='$user_name' || jm_username='$user_name') AND jm_password='$pass' AND jm_profile_type='$profile_type'";
		//echo $query;die();
		$result = $this->db->query($query);
		$user_id='0';
		$privilege='';
	//if credentials are true, their is obviously only one record
		if($result->num_rows() == 1){
			
			foreach ($result->result_array() as $row) {
				$user_name=$row['jm_username'];
				$user_id=$row['jm_user_id'];
			}

			if ($result) {
				$sql = "UPDATE jm_user_tab SET jm_loginTime=NOW(), jm_login_date=NOW(), jm_current_status='1' WHERE jm_user_id='$user_id'";
				//echo $sql;die();
				$result = $this->db->query($sql);

				//response with values to be stored in sessions if update session_bool true
				$response=array(
					'status' => 200,
					'user_id' =>$user_id,
					'user_name' => $user_name,				
					'profile_type' => $profile_type,
					'status_message' =>'Login Successfull'
				);
			}
			else{
				$response=array(
					'status' => 500,
					'user_id' =>$user_id,
					'user_name' => $user_name,				
					'profile_type' => $profile_type,				
					'status_message' =>'Error to start session for '.$user_name.' !!!',
				);
			}
		}
		else
		{
		//login failed response
			$response=array(
				'status' => 500,
				'status_message' =>'Sorry..Login credentials are incorrect!!!',
				'user_id' =>$user_id,
				'user_name' => $user_name,				
				'profile_type' => $profile_type		
			);
		}
		return $response;
	}
	//----------------------------LOGIN END------------------------------//


//-----------------------function to check whether privilege level already exists------------------//
	function logout_user($user_id)
	{
		$sql = "UPDATE jm_user_tab SET jm_logoutTime=NOW() WHERE jm_user_id='$user_id'";
		//echo $sql;die();
		$this->db->query($sql);
		return $this->db->affected_rows(); 
	}
//-----------------------------------function end---------------------------------------//

	//-----------------------function to check whether privilege level already exists------------------//
	function verifyEmail($code)
	{
		$sql = "UPDATE jm_user_tab SET email_verified=email_verified+1 WHERE verification_code='$code'";
		//echo $sql;die();
		$this->db->query($sql);
		return $this->db->affected_rows(); 
	}
//-----------------------------------function end---------------------------------------//

// ------------------forgot password-------------------------------//
	public function forget_password($forget_email,$forget_profile_type)
	{
		$query = "SELECT * FROM jm_user_tab WHERE jm_email_id='$forget_email' AND jm_profile_type='$forget_profile_type'";
		//echo $query;die();
		$result=$this->db->query($query);  
		if ($result->num_rows() <= 0) 
		   {
		    $response = array(                                             
		      'status' => 500,
		      'status_message' => 'Email ID is not registered for this profile.');                           
		  } else {
		  	$password='';
		  	foreach ($result->result_array() as $row) {
				$password=$row['jm_password'];
				//$user_id=$row['jm_user_id'];
			}
			//echo $password;die();
		    $response = array(
		      'status' => 200,
		      'status_message' => $password);
		  }
		  return $response;
	 }
	//----------------------------------------------------------------

	//-----------------------function to add categories json------------------//
	function addCategory($json)
	{
		$jsonArr=json_decode($json,TRUE);
		$final=array();

			$arr=array();
			foreach ($jsonArr as $val) {
				
				$data = array(
				'jm_category_name' => $val['category'],
				'jm_skill_name' => $val['skill']
			);
				$this->db->insert('jm_skills_tab', $data);
			}

			//print_r($data);

		// //sql query to insert category and resp skill json
		// 	
		

	}
//-----------------------------------function end---------------------------------------//


}
?>