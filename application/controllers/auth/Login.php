<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ERROR | E_PARSE);

//Login controller
class Login extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		
	

		$this->load->helper('cookie');

		//check session variable set or not, otherwise logout
		if(($user_id=='') || ($profile_type=='')){
			if((isset($_GET['payload'])) && ($_GET['payload'] !='')){
				extract($_GET);

				switch($_GET['payload']){
					case 'ApplyJob':

					$applyJob_cookie= array( 
						'name'   => 'Payload', 
						'value'  => 'ApplyJob|'.base64_decode($value), 
						'expire' => '1200' 
					);
					$this->input->set_cookie($applyJob_cookie);
					break;

					case 'ViewProject':

					$viewProject_cookie= array( 
						'name'   => 'Payload', 
						'value'  => 'ViewProject|'.$value, 
						'expire' => '1200' 
					);
					$this->input->set_cookie($viewProject_cookie);
					break;

					default:
					$cookie= array( 
						'name'   => 'Payload', 
						'value'  => '', 
						'expire' => '0' 
					);
					$this->input->set_cookie($cookie);
					//delete_cookie('Payload');
					break;
				}
			}
			else{				
				$cookie= array( 
					'name'   => 'Payload', 
					'value'  => '', 
					'expire' => '0' 
				);
				$this->input->set_cookie($cookie);
			}
			//print_r($_GET);
			//redirect('auth/login');
		}
		//---------uncomment this to load db automatically---------------//
		// $this->load->model('DbSetup_model')	;
		// $this->DbSetup_model->createDbSchema();		
	}

	public function index(){
		
		//start session		
		$user_id=$this->session->userdata('user_id');
		$profile_type=$this->session->userdata('profile_type');
		$user_name=$this->session->userdata('user_name');
		//check session variable set or not, otherwise logout
		if(($user_id!='') || ($user_name!='') || ($profile_type!='')){
			redirect('profile/dashboard');
		}
		
		$this->load->view('includes/header.php');
		$this->load->view('pages/login/login');
		$this->load->view('includes/footer.php');
		
	}
	
	// --------------register user fucntion starts----------------------//
	public function register_auth(){
		extract($_POST);

		//---------------if any of the profile is not selected, then return this--------//
		if($register_profile_type=='0'){
			$response=array(
				'status' => 500,	//---------email sending failed 
				'status_message' =>'<label class="w3-text-red w3-small">
				<b><i class="fa fa-warning"> WARNING<br><br>Select Appropriate Profile first !!!</i> </b>
				</label>'
			);
			echo json_encode($response);	
			die();
		}

		//Connection establishment, processing of data and response from REST API		
		$data=array(
			'register_username' =>$register_username,
			'register_password' => $register_password,
			'register_email' => $register_email,
			'register_profile_type'	=> $register_profile_type
		);
		//print_r($data);die();
		$path=base_url();
		$url = $path.'api/auth_api/register';
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response_json = curl_exec($ch);
		curl_close($ch);
		$response=json_decode($response_json, true);
		echo $response_json;		
	}
	//	------------------function ends here-----------------------------//

	// --------------register user fucntion starts----------------------//
	public function get_forget_password(){
		extract($_POST);

		//---------------if any of the profile is not selected, then return this--------//
		if($forget_profile_type=='0'){
			$response=array(
				'status' => 500,	//---------email sending failed 
				'status_message' =>'<label class="w3-text-red w3-small">
				<b><i class="fa fa-warning"> WARNING<br><br>Select Appropriate Profile first !!!</i> </b>
				</label>'
			);
			echo json_encode($response);	
			die();
		}

		//---------------if forget email is blank, then return this--------//
		if($forget_email==''){
			$response=array(
				'status' => 500,	//---------email sending failed 
				'status_message' =>'<label class="w3-text-red w3-small">
				<b><i class="fa fa-warning"> WARNING<br><br>Invalid Email ID !!!</i> </b>
				</label>'
			);
			echo json_encode($response);	
			die();			
		}

		//Connection establishment, processing of data and response from REST API		
		$data=array(
			'forget_email' =>$forget_email,
			'forget_profile_type'	=> $forget_profile_type
		);

		$path=base_url();
		$url = $path.'api/auth_api/forget_password';
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response_json = curl_exec($ch);
		curl_close($ch);
		$response=json_decode($response_json, true);
		if($response['status']==200){
			$password=explode('|',base64_decode($response['status_message']) ) ;
			//echo ($password[0]);die();
			$mail_send=Login::sendPasswordEmail($forget_email,$password[0],$forget_profile_type);

			if($mail_send['status']==200){
				$response_mail=array(
				'status' => 200,	//---------email sending succesfully 
				'status_message' =>$mail_send['status_message']
			);
			}
			else{
				$response_mail=array(
				'status' => 500,	//---------email sending succesfully 
				'status_message' =>'Email Sending Failed. Check your Internet connection or check your registered Email-ID is valid or not.'
			);
			}
			$response_json=json_encode($response_mail);
		}
		else
		{
			$response_mail=array(
				'status' => 500,	//---------email sending failed 
				'status_message' =>$response['status_message']
			);
			$response_json=json_encode($response_mail);
		}
		echo $response_json;		
	}
	//	------------------function ends here-----------------------------//

	//-------------------------------------------------------------------------//
	//----------------------email for forget password code----------------------------//
	public function sendPasswordEmail($email,$password,$forget_profile_type){
		
		$Username='';
		switch ($forget_profile_type) {
			case '1':
			$Username='Freelancer';
			break;
			case '2' :
			$Username='Freelancer Employer';
			break;
			case '3' :
			$Username='Job Seeker';
			break;
			case '4' :
			$Username='Job Employer';
			break;		
		}
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
		$this->email->to($email);  
		$this->email->subject("JOBMANDI-Forget Password Request");
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
			<h2 style="color:#4CAF50; font-size:30px">Forgot Your Password?</h2>
			<h3 style="font-size:15px;">Hello '.$Username.',<br>We have recieved a request to have your password for <b>JobMandi</b>. If you did not make this request, then kindly ignore this email.<br><br>As per request, here comes your login credentails:</h3>
			<div class="col-lg-12">
			<div class="col-lg-4"></div>
			<div class="col-lg-4">
			<h4><b>Email: </b>'.$email.'<br><b>Password: </b>'.$password.'</h4>
			<a href="'.base_url().'auth/login?profile='.$forget_profile_type.'" type="button" style="background-color:#4CAF50; color:white;padding:3px" class="btn btn-md">Go To Login Page</a>
			</div>
			<div class="col-lg-4"></div>
			</div>
			<hr>
			<h4 style="font-size:15px;"><b>Questions?</b></h4>
			<h4 style="font-size:15px;">Please let us know if there is anything we can help you with by replying this email.<br><br>Thanks, <b>Admin Team</b></h4>
			</div>
			</body></html>');
		//$this->email->message("Dear ".$email.",<br>\nAs per your request, We are sending you the password of your registered Account.<br>Email: <b>".$email."</b><br>Password: <b>".$password."</b>.<br>Please try login by this password.<br>\n"."\n\nThanks\nAdmin Team");
//print_r($this->email->message());die();
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
	//----------------------email for forget password code ends------------------------//
	//--------------------------------------------------------------------------//

	// ---------------function to logout all role------------------------//
	public function logout(){

		$user_id=$this->session->userdata('user_id');
		$profile_type=$this->session->userdata('profile_type');
		//if logout success then destroy session and unset session variables
		$path=base_url();
		$url = $path.'api/Auth_api/logout?user_id='.$user_id;	
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HTTPGET, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response_json = curl_exec($ch);
		curl_close($ch);
		$response=json_decode($response_json, true);
		
		//if logout success then destroy session and unset session variables
		$this->session->unset_userdata(array("user_id"=>"","user_name"=>"","profile_type"=>"","selected_profile_type"=>""));
		$this->session->sess_destroy();
		
//		$cookie= array( 
//						'name'   => 'cookie_uname', 
//						'value'  => '', 
//						'expire' => '0' 
//					);
//					$this->input->set_cookie($cookie);
//		
//		$password= array( 
//						'name'   => 'cookie_pass', 
//						'value'  => '', 
//						'expire' => '0' 
//					);
//					$this->input->set_cookie($password);
		
		redirect(base_url());
		
	}
// ---------------------function ends----------------------------------//

	// ---------------function for verify email------------------------//
	public function verify_email($code=NULL){
		$profile_type= $this->input->get('profile', TRUE);
		$error='';
		//if logout success then destroy session and unset session variables
		$path=base_url();
		$url = $path.'api/Auth_api/verifyEmail?code='.$code.'&profile_type='.$profile_type;	
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HTTPGET, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response_json = curl_exec($ch);
		curl_close($ch);
		$response=json_decode($response_json, true);
		//print_r( $response_json);die();
		if ($response > 0){
			$response=array(
				'status' => 200,	//---------email sending failed
				'status_message' =>'Email Verified Succesfully. You can go for login.'
			);
		} else {
			$response=array(
				'status' => 404,	//---------email send succesfully
				'status_message' =>'Email Verification Failed.'
			);
		}
		$this->load->view('includes/header.php');
		$this->load->view('pages/login/login', $response);
		$this->load->view('includes/footer.php');  
	}
// ---------------------function ends----------------------------------//
	//---------code for password decode----------//
	// $e=base64_decode('c2FtcmF0X2t1d2FpdEpvYm1hbmRp');
	// 	$arr=explode('_', $e);	
 //      echo $arr[0];
	//----------------code end------------------//

//----------------------function to login---------------------------//
	public function login_auth(){
		extract($_POST);

		//---------------if any of the role is not selected, then return this--------//
		if($login_profile_type=='0'){
			echo '<div class="alert alert-danger">
			<strong>Select Appropriate Profile first !!!</strong> 
			</div>			
			';	
			die();
		}

		$remember_me='0';
		//print_r($login_remember);
		if(isset($login_remember)){
			$remember_me='1';
		}
		
		//Connection establishment, processing of data and response from REST API		
		$data=array(
			'login_profile_type' =>$login_profile_type,
			'selected_profile_type' =>'',
			'login_username' => $login_username,
			'login_password'	=> $login_password,
			'login_remember'	=> $remember_me
		);
		//print_r($data);die();
		$path=base_url();
		$url = $path.'api/auth_api/login';
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response_json = curl_exec($ch);
		curl_close($ch);
		$response=json_decode($response_json, true);
//print_r($response_json);die();
		//API processing end
		if($response['status']==500){
			echo '<div class="alert alert-danger ">
			<strong>'.$response['status_message'].'</strong> 
			</div>			
			';			
		}
		else{
			//----create session array--------//
			$session_data= array(
				'user_id'  => $response['user_id'],
				'user_name' => $response['user_name'],
				'profile_type'=>$response['profile_type']
			);

			//start session of user if login success
			$this->session->set_userdata($session_data);

			//print_r($remember_me);
		//$remember_me='0';
		//print_r($login_remember);
			if(isset($login_remember)){
				$cookie_profile = array(
					'name'   => 'cookie_profile', 
					'value'  => $response['profile_type'], 
					'expire' => '86400' 
				);
				$this->input->set_cookie($cookie_profile);
				
				$cookie= array( 
					'name'   => 'cookie_uname', 
					'value'  => $response['user_name'], 
					'expire' => '86400' 
				);
					//print_r($cookie);die();
				$this->input->set_cookie($cookie);
				
//			$password= array(
//						'name' => 'cookie_pass',
//						'value' => $login_password,
//						'expire' => '360000'
//			
//			);
			//print_r($password);die();
				$this->input->set_cookie($password);
			//print_r(set_cookie($password));die();
//			$remember_me='1';
//			$year = time() + 31536000;
//			setcookie('remember_me', $_POST['login_username'], $year);
			}
			
			
			
			// ---check payload cookie--------------//
			$payloadCookie=$this->input->cookie('Payload',true);
//echo $arr[1];die();
			if($payloadCookie!=''){
				$arr=explode('|', $payloadCookie);
				
//echo $arr[1];die();
				switch($arr[0]){
					case 'ApplyJob':

					echo '
					<div class="alert alert-success">
					<strong>'.$response['status_message'].'</strong> 
					</div>
					<script>
					window.setTimeout(function() {
						$(".alert").fadeTo(500, 0).slideUp(500, function(){
							$(this).remove(); 
						});
						window.location.href="'.base_url().'jobseeker/jobseeker_lists/'.$arr[1].'";
					}, 100);
					</script>
					';	
					//echo $arr[1];die();					
					$cookie= array( 
						'name'   => 'Payload', 
						'value'  => '', 
						'expire' => '0' 
					);
					$this->input->set_cookie($cookie);
					break;

					case 'ViewProject':

					echo '
					<div class="alert alert-success">
					<strong>'.$response['status_message'].'</strong> 
					</div>
					<script>
					window.setTimeout(function() {
						$(".alert").fadeTo(500, 0).slideUp(500, function(){
							$(this).remove(); 
						});
						window.location.href="'.base_url().'project/view_project/'.$arr[1].'";
					}, 100);
					</script>
					';	
					//echo $arr[1];die();					
					$cookie= array( 
						'name'   => 'Payload', 
						'value'  => '', 
						'expire' => '0' 
					);
					$this->input->set_cookie($cookie);
					break;

					default:
					echo '
					<div class="alert alert-success" style="margin-bottom:5px">
					<strong>'.$response['status_message'].'</strong> 
					</div>
					<script>
					window.setTimeout(function() {
						$(".alert").fadeTo(500, 0).slideUp(500, function(){
							$(this).remove(); 
						});
						window.location.href="'.base_url().'profile/dashboard";
					}, 100);
					</script>
					';	
					
					$cookie= array( 
						'name'   => 'Payload', 
						'value'  => '', 
						'expire' => '0' 
					);
					$this->input->set_cookie($cookie);
					break;
				}	
			}
			else{
				echo '<div class="alert alert-success" style="margin-bottom:5px">
				<strong>'.$response['status_message'].'</strong> 
				</div>
				<script>
				window.setTimeout(function() {
					$(".alert").fadeTo(500, 0).slideUp(500, function(){
						$(this).remove(); 
					});
					window.location.href="'.base_url().'profile/dashboard";
				}, 100);
				</script>
				';	
			}					
		}	
		
	}
//-----------------------function ends-----------------------------//
	
	//----------------------function to login---------------------------//
	public function login_beforeSubmit(){
		extract($_POST);

		//---------------if any of the role is not selected, then return this--------//
		if($login_profile_type=='0'){
			echo '<div class="alert alert-danger">
			<strong>Select Appropriate Profile first !!!</strong> 
			</div>			
			';	
			die();
		}

		
		//Connection establishment, processing of data and response from REST API		
		$data=array(
			'login_profile_type' =>$login_profile_type,
			'selected_profile_type' =>'',
			'login_username' => $login_username,
			'login_password'	=> $login_password,
			'login_remember'	=> $remember_me
		);
		//print_r($data);die();
		$path=base_url();
		$url = $path.'api/auth_api/login';
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response_json = curl_exec($ch);
		curl_close($ch);
		$response=json_decode($response_json, true);
//print_r($response_json);die();
		//API processing end
		if($response['status']==500){
			echo ($response_json);
		}
		else{
			//----create session array--------//
			$session_data= array(
				'user_id'  => $response['user_id'],
				'user_name' => $response['user_name'],
				'profile_type'=>$response['profile_type']
			);

			//start session of user if login success
			$this->session->set_userdata($session_data);
			
			echo ($response_json);			
		}							
	}		
	
//-----------------------function ends-----------------------------//

//---------------------fucntion for direct register and login-----------------//
		// --------------register user fucntion starts----------------------//
	public function register_beforeSubmit(){
		extract($_POST);

		//---------------if any of the profile is not selected, then return this--------//
		if($register_profile_type=='0'){
			echo '<label class="w3-text-red w3-large">
			<b><i class="fa fa-warning"> WARNING<br><br>Select Appropriate Profile first !!!</i> </b>
			</label>			
			';	
			die();
		}

		//Connection establishment, processing of data and response from REST API		
		$data=array(
			'register_username' =>$register_username,
			'register_password' => $register_password,
			'register_email' => $register_email,
			'register_profile_type'	=> $register_profile_type
		);

		$path=base_url();
		$url = $path.'api/auth_api/register';
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response_json = curl_exec($ch);
		curl_close($ch);
		$response=json_decode($response_json, true);
		if($response['status']==500){
			echo ($response_json);
		}
		else{
			$login_data=array(
				'login_profile_type' =>$register_profile_type,
				'selected_profile_type' =>'',
				'login_username' => $register_username,
				'login_password'	=> $register_password
			);

			$login_path=base_url();
			$login_url = $login_path.'api/auth_api/login';
			$login_ch = curl_init($login_url);
			curl_setopt($login_ch, CURLOPT_POST, true);
			curl_setopt($login_ch, CURLOPT_POSTFIELDS, $login_data);
			curl_setopt($login_ch, CURLOPT_RETURNTRANSFER, true);
			$login_response_json = curl_exec($login_ch);
			curl_close($login_ch);
			$login_response=json_decode($login_response_json, true);
			if($login_response['status']==500){
				echo ($login_response_json);
			}
			else{
			//----create session array--------//
				$session_data= array(
					'user_id'  => $login_response['user_id'],
					'user_name' => $login_response['user_name'],
					'profile_type'=>$login_response['profile_type']
				);

			//start session of user if login success
				$this->session->set_userdata($session_data);
				echo ($login_response_json);			
			}			
		}							
	}		
	//	------------------function ends here-----------------------------//
		//-----------------function ends------------------------------//

}
?>