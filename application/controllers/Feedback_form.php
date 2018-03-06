<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(E_ERROR | E_PARSE);
//Jobmandi profile Edit profile
class Feedback_form extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$user_id=$this->session->userdata('user_id');
		$profile_type=$this->session->userdata('profile_type');
	}

  public function index()
  {
   
   $this->load->view('includes/header.php');
   $this->load->view('pages/feedback.form.php');
   $this->load->view('includes/footer.php');	
 }

//-------------function to submit project feedback for freelancer-------------------//
 	public function submit_feedback_freelanceremployer()
 	{
 		extract($_POST);
 		//print_r($_POST);die();
 		$user_id=$this->session->userdata('user_id');
 		$data=array(
 			'jm_project_id' =>$project_id,
 			'jm_emp_id' =>$user_id,
 			'jm_freelancer_id'=>$freelance_id,
			'jm_communication' =>$jm_communication,
			'jm_ontimedelivery' => $jm_ontimedelivery,
			'jm_valueformoney' => $jm_valueformoney,
			'jm_expertise'	=> $jm_expertise,
			'jm_hire_again'=>$jm_hire_again,
			'jm_feedback_comment'=>$jm_feedback_comment
		);
 		//print_r($data);die();
 		$path=base_url();
 		$url = $path.'api/Project_posting_api/feedback_api';		
 		$ch = curl_init($url);
 		curl_setopt($ch, CURLOPT_POST, true);
  		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  		$response_json = curl_exec($ch);	  
  		curl_close($ch);
  		$response = json_decode($response_json, true); 
  		print_r($response_json);die();
  		//echo $response['status_message'];
  		 if ($response['status'] == 200) {
            echo'
            <label class="bluish-green w3-padding w3-xlarge"><i class="fa fa-check "></i> Success!</label> <p class="w3-text-grey w3-medium w3-padding">'.$response['status_message'].'</p>
            <script>
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove(); 
                });
                window.location.href="'.base_url().'profile/dashboard";
            }, 1000);
            </script>    
            ';
        } else {
            echo '<label class="w3-text-red w3-padding w3-xlarge"><i class="fa fa-warning "></i> Warning!</label><p class="w3-text-grey w3-medium w3-padding">'.$response['status_message'].'</p>';
        }
 	}
//-------------------------end function----------------------------------//

 	//-------------function to submit project feedback for freelancer employer-------------------//
 	public function submit_feedbackEmployer()
 	{
 		extract($_POST);
 		//print_r($_POST);die();
 		//$data = $_POST;
 		//print_r($data);die();
 		$user_id=$this->session->userdata('user_id');
 		$data=array(
 			'jm_project_id' =>$emp_project_id,
 			'jm_emp_id' =>$emp_id,
 			'jm_freelancer_id'=>$user_id,
			'jm_communication' =>$jm_communication,
			'jm_promptpay' => $jm_promptpay,
			'jm_reqAccuracy' => $jm_reqAccuracy,
			'jm_workAgain'	=> $jm_workAgain,
			'emp_comment'=>$emp_comment
		);
 		//print_r($data);die();
 		$path=base_url();
 		$url = $path.'api/Project_posting_api/feedback_freelancer_emp_api';		
 		$ch = curl_init($url);
 		curl_setopt($ch, CURLOPT_POST, true);
  		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  		$response_json = curl_exec($ch);	  
  		curl_close($ch);
  		$response = json_decode($response_json, true); 
  		//print_r($response_json);die();
  		//echo $response['status_message'];
  		 if ($response['status'] == 200) {
            echo'
            <label class="bluish-green w3-padding w3-xlarge"><i class="fa fa-check "></i> Success!</label> <p class="w3-text-grey w3-medium w3-padding">'.$response['status_message'].'</p>
            <script>
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove(); 
                });
                window.location.href="'.base_url().'profile/dashboard";
            }, 1000);
            </script>    
            ';
        } else {
            echo '<label class="w3-text-red w3-padding w3-xlarge"><i class="fa fa-warning "></i> Warning!</label><p class="w3-text-grey w3-medium w3-padding">'.$response['status_message'].'</p>';
        }
 	}
//-------------------------end function----------------------------------//
 	//-----------------function for calculating avg freelancing rating-------------------//

 	public function save_avg_rating_freelancer()
 	{
 		extract($_GET);
 		$path=base_url();
		$url = $path.'api/Project_posting_api/get_Avg_Freelancer_rating';		
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HTTPGET, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response_json = curl_exec($ch);
		curl_close($ch);
		$response=json_decode($response_json, true);
		//print_r($response);
		return $response;
 	}
 	//-------------------end function--------------------------------//

 //  //-----------------------------function to calculate avg fpr freelancer employer------------------//
 // 	public function save_avg_rating_freelancer()
 // 	{
 // 		extract($_GET);
 // 		$path=base_url();
	// 	$url = $path.'api/Project_posting_api/get_Avg_Freelancer_Employer_rating';		
	// 	$ch = curl_init($url);
	// 	curl_setopt($ch, CURLOPT_HTTPGET, true);
	// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// 	$response_json = curl_exec($ch);
	// 	curl_close($ch);
	// 	$response=json_decode($response_json, true);
	// 	//print_r($response);
	// 	return $response;
		
 // 	}
 // //-----------end function-------------------------------//
}