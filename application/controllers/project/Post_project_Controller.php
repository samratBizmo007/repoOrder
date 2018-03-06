<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ERROR | E_PARSE);
class Post_project_Controller extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		// //start session		
		// $user_id=$this->session->userdata('user_id');
		// $user_name=$this->session->userdata('user_name');
		// $profile_type=$this->session->userdata('profile_type');
		// //check session variable set or not, otherwise logout
		// if(($user_id=='') || ($user_name=='') || ($profile_type=='')){
		// 	redirect('auth/login');
		// }
	}

	public function index()
	{
		$data['all_skills']=Post_project_Controller::get_allSkills();
		//print_r($data['all_skills']);
		$this->load->view('includes/header.php');
		$this->load->view('pages/project/post_project.php',$data);
		$this->load->view('includes/footer');
		
	}
//----------function to get skill list from database--------------------------//	
	public function get_allSkills(){

		//Connection establishment, processing of data and response from REST API
		$path=base_url();
		$url = $path.'api/Dashboard_api/get_allSkills';		
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HTTPGET, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response_json = curl_exec($ch);
		curl_close($ch);
		$response=json_decode($response_json, true);
		//print_r($response_json);die();
		return $response;	
	}
//----------function to get skill list from database--------------------------//	
//--------------------------function to add post project form data-------//
	public function get_allproject()
	{
		$user_id=$this->session->userdata('user_id');
		$profile_type=$this->session->userdata('profile_type');
		
		if(($this->session->userdata('selected_profile_type'))!=''){
			$profile_type=$this->session->userdata('selected_profile_type');
		}
		extract($_POST);
		$data = $_POST;
		$image_path='';
		$data = $_POST;
    if( preg_match( '!\(([^\)]+)\)!', $_POST['jm_projectbudget_type'], $match ) )
    $jm_project_price = $match[1];
    //echo $text;exit;
		if(!empty($_FILES['jm_project_file']['name'])){
 		//echo "check if condition";
			$extension = pathinfo($_FILES['jm_project_file']['name'], PATHINFO_EXTENSION);
		//print_r($extension);die();
			$_FILES['userFile']['name'] = '#Project_details_0'.$user_id.'_'.$profile_type.'.'.$extension;
			$_FILES['userFile']['type'] = $_FILES['jm_project_file']['type'];
			$_FILES['userFile']['tmp_name'] = $_FILES['jm_project_file']['tmp_name'];
			$_FILES['userFile']['error'] = $_FILES['jm_project_file']['error'];
			$_FILES['userFile']['size'] = $_FILES['jm_project_file']['size'];
	  $uploadPath ='images/jm_project_file/';  //upload images in images/desktop/ folder
	  $config['upload_path'] = $uploadPath;
      $config['allowed_types'] = '*'; //allowed types of images           
      $config['overwrite'] = TRUE;            

      $this->load->library('upload', $config);  //load upload file config.
      $this->upload->initialize($config);

      if($this->upload->do_upload('userFile')){
      	$fileData = $this->upload->data();
      	$imagePath='images/jm_project_file/'.$fileData['file_name'];
      	$image_path= $imagePath;
      }
      else{
      	$error = array('error' => $this->upload->display_errors());
      	echo $error['error'];
      }    
  }else{
    $image_path = '';
  } 
  //	$data['skill']=json_encode($skill);
  
  $a=array(
  	'user_id'	=>	$user_id,
  	'profile_id'	=>	$profile_type,
  	'project_skill'	=>	json_encode($skill),
  	'file'	=> $image_path,
  	'project_title'	=> $jm_project_title,
  	'project_description' => $jm_project_description,
  	'project_type'=>$jm_project_type,
  	'project_price'=>$jm_project_price,
  	'time_estimation'=>$jm_time_estimation,
  	'project_budget'=>$jm_projectbudget_type,
  );
  	//print_r($a);die();
  	//echo $image_path;die();
  $data['projectFile']='';
  $path=base_url();
  $url = $path.'api/Project_posting_api/get_allproject_details';		
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $a);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response_json = curl_exec($ch);
	   //print_r($response_json);die();
  curl_close($ch);
  $response = json_decode($response_json, true); 
	    //print_r($response_json);die();
  if($response['status']!='200'){
  	echo '<h4 class="w3-text-red w3-margin"><i class="fa fa-warning"></i> '.$response['status_message'].'</h4>
  	<script>
  	window.setTimeout(function() {
  		$(".alert").fadeTo(500, 0).slideUp(500, function(){
  			$(this).remove(); 
  		});
  		location.reload();
  		//window.location.href="'.base_url().'profile/dashboard";
  	}, 800);
  	</script>';
  }
  else{
  	echo '<h4 class="bluish-green w3-margin"><i class="fa fa-check"></i> '.$response['status_message'].'</h4>
  	<script>
  	window.setTimeout(function() {
  		$(".alert").fadeTo(500, 0).slideUp(500, function(){
  			$(this).remove(); 
  		});
  		window.location.href="'.base_url().'profile/dashboard";
  	}, 800);
  	</script>';

  }
  
}
//------------------------End function to add post project form data-------//	

}