<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

//Jobmandi profile View_profile
class View_profile extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		
		//start session		
		$user_id=$this->session->userdata('user_id');
		$user_name=$this->session->userdata('user_name');
		$profile_type=$this->session->userdata('profile_type');
		//check session variable set or not, otherwise logout
		if(($user_id=='') || ($user_name=='') || ($profile_type=='')){
			redirect('auth/login');
		}
		$userInfo=View_profile::get_userDetails();
		if($userInfo['status_message'][0]['jm_user_name']==''){
			redirect('profile/edit_profile');
		}
	}

	public function index(){

		$data['all_skills']=View_profile::get_allSkills();
		$data['all_userSkills']=View_profile::get_userSkills();
		$data['all_userFeedback']=View_profile::get_userFeedback();
		$data['all_userInfo']=View_profile::get_userInfo();
		$data['all_userTransaction']=View_profile::get_userTransaction();
		$data['all_userDetails']=View_profile::get_userDetails();
		$data['all_userPortfolio']=View_profile::get_userPortfolio();
		$data['percentage']=View_profile::get_bars_value();
		$this->load->view('includes/header.php');
		$this->load->view('pages/profile/view_profile',$data);
		$this->load->view('includes/footer.php');	

	}
        
	public function getEmployer_Details(){
        extract($_POST);
        
        $path = base_url();
        $url = $path . 'api/Dashboard_api/getEmployer_Details?emp_id='.$emp_id.'&profile_type='.$profile_type;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        print_r($response_json);
        //echo $response;
        //return $response;
    }

        //--------------------add portfolio to profile-----------------------//
	public function add_portfolio()
	{
		$user_id=$this->session->userdata('user_id');
		$profile_type=$this->session->userdata('profile_type');
		
		if(($this->session->userdata('selected_profile_type'))!=''){
			$profile_type=$this->session->userdata('selected_profile_type');
		}

		extract($_POST);
		$data = $_POST;
		// --------------------------------if portfolio description is blank check------------------------------------//
		if($data['jm_portfolio_details']=='' || $data['jm_portfolio_details']=='<br>' || $data['jm_portfolio_details']=='<div></div>' || $data['jm_portfolio_details']=='<div><br></div>')
		{
			echo '<div class="alert alert-danger alert-dismissable fade in">
		  	<a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  	<span><strong>Warning!</strong> Please provide atleast short description for your project!!!</span>
		  	</div>		  	
		  	';
		  	die();
		}
		// --------------------------------if portfolio description is blank check------------------------------------//

		$data['user_id']=$user_id;
		$data['profile_type']=$profile_type;
		$image_path='';
//print_r($data['jm_portfolio_details']);die();
		$userPf=View_profile::get_userPortfolio();
		//print_r($userPf);die();
		if($userPf['status']!=200){
			$count=0;
		}
		else{
			$count=count($userPf['status_message']);
		}
		$count++;
//echo $count;
		if(!empty($_FILES['portfolio_image']['name']))
		{
			$extension = pathinfo($_FILES['portfolio_image']['name'], PATHINFO_EXTENSION);
			$_FILES['userFile']['name'] = '#Portfolio_details_#0'.$user_id.'_#'.$profile_type.'_'.$count.'.'.$extension;
			$_FILES['userFile']['type'] = $_FILES['portfolio_image']['type'];
			$_FILES['userFile']['tmp_name'] = $_FILES['portfolio_image']['tmp_name'];
			$_FILES['userFile']['error'] = $_FILES['portfolio_image']['error'];
			$_FILES['userFile']['size'] = $_FILES['portfolio_image']['size'];
			  $uploadPath ='images/profile/portfolio_image/';  //upload images in images/desktop/ folder
			  $config['upload_path'] = $uploadPath;
		      $config['allowed_types'] = 'gif|jpg|png|jpeg'; //allowed types of images           
		      $config['overwrite'] = TRUE;           
		      
		      $this->load->library('upload', $config);  //load upload file config.
		      $this->upload->initialize($config);

		      if($this->upload->do_upload('userFile')){
		      	$fileData = $this->upload->data();
		      	$imagePath='images/profile/portfolio_image/'.$fileData['file_name'];
		      	$image_path= $imagePath;
		      }
		      else{
		      	$error = array('error' => $this->upload->display_errors());
		      	print_r($error);
		      }    
		  }
		  $data['file']=$image_path;
		  $path=base_url();
		  $url = $path.'api/ViewProfile_api/add_portfolio';		
		  $ch = curl_init($url);
		  curl_setopt($ch, CURLOPT_POST, true);
		  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		  $response_json = curl_exec($ch);
		  curl_close($ch);
		  $response = json_decode($response_json, true);
		  //print_r($response_json);die();

		  if($response['status']!=200){
		  	echo '<div class="alert alert-danger alert-dismissable fade in">
		  	<a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  	<span><strong>Failure!</strong> '.$response['status_message'].'</span>
		  	</div>
		  	<script>
		  	window.setTimeout(function() {
		  		$(".alert").fadeTo(500, 0).slideUp(500, function(){
		  			$(this).remove(); 
		  		});
		  	}, 1000);
		  	</script>
		  	';	

		  }
		  else{			
		  	echo '<div class="alert alert-success alert-dismissable fade in">
		  	<a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  	<span><strong>Success!</strong> '.$response['status_message'].'</span>
		  	</div>
		  	<script>
		  	window.setTimeout(function() {
		  		$(".alert").fadeTo(500, 0).slideUp(500, function(){
		  			$(this).remove(); 
		  			location.reload();
		  		});
		  	}, 1000);
		  	</script>
		  	';						
		  }	

		}
		//-------------------Function ends-------------------------------//

		//-------------------delete portfolio----------------------//
		public function del_portfolio()
		{
			extract($_POST);
			$path=base_url();
			$url = $path.'api/ViewProfile_api/del_portfolio?portfolio_id='.$portfolio_id; 
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_HTTPGET, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response_json = curl_exec($ch);
			curl_close($ch);
			$response=json_decode($response_json, true);

			if($response['status']!=200){
		  	echo '<div class="alert alert-danger alert-dismissable fade in">
		  	<a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  	<span><strong>Failure!</strong> '.$response['status_message'].'</span>
		  	</div>
		  	<script>
		  	window.setTimeout(function() {
		  		$(".alert").fadeTo(500, 0).slideUp(500, function(){
		  			$(this).remove(); 
		  		});
		  	}, 1000);
		  	</script>
		  	';	

		  }
		  else{			
		  	echo '<div class="alert alert-success alert-dismissable fade in">
		  	<a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  	<span><strong>Success!</strong> '.$response['status_message'].'</span>
		  	</div>
		  	<script>
		  	window.setTimeout(function() {
		  		$(".alert").fadeTo(500, 0).slideUp(500, function(){
		  			$(this).remove(); 
		  		});
		  	}, 1000);
		  	</script>
		  	';						
		  }	
		}
//-------------------function ends----------------------//

	//------------Function to get all user specific portfolios------------//
		public function get_userPortfolio(){

			$user_id=$this->session->userdata('user_id');
			$profile_type=$this->session->userdata('profile_type');

			if(($this->session->userdata('selected_profile_type'))!=''){
				$profile_type=$this->session->userdata('selected_profile_type');
			}
		//Connection establishment, processing of data and response from REST API
			$path=base_url();
			$url = $path.'api/ViewProfile_api/get_userPortfolio?user_id='.$user_id.'&profile_type='.$profile_type;	
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_HTTPGET, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response_json = curl_exec($ch);
			curl_close($ch);
			$response=json_decode($response_json, true);
			return $response;	
		}
	// ---------------------function ends----------------------------------//	
		
	//------------Function to get all user specific skills------------//
		public function get_userSkills(){

			$user_id=$this->session->userdata('user_id');
			$profile_type=$this->session->userdata('profile_type');

			if(($this->session->userdata('selected_profile_type'))!=''){
				$profile_type=$this->session->userdata('selected_profile_type');
			}
		//Connection establishment, processing of data and response from REST API
			$path=base_url();
			$url = $path.'api/Dashboard_api/get_userSkills?user_id='.$user_id.'&profile_type='.$profile_type;	
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_HTTPGET, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response_json = curl_exec($ch);
			curl_close($ch);
			$response=json_decode($response_json, true);
			return $response;	
		}
	// ---------------------function ends----------------------------------//

	//------------Function to get all data of user------------//
		public function get_userInfo(){

			$user_id=$this->session->userdata('user_id');
			$profile_type=$this->session->userdata('profile_type');


			if(($this->session->userdata('selected_profile_type'))!=''){
				$profile_type=$this->session->userdata('selected_profile_type');
			}
		//Connection establishment, processing of data and response from REST API
			$path=base_url();
			$url = $path.'api/ViewProfile_api/get_userInfo?user_id='.$user_id;	
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_HTTPGET, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response_json = curl_exec($ch);
			curl_close($ch);
			$response=json_decode($response_json, true);
			return $response;	
		}
// ---------------------function ends----------------------------------//

	//------------Function to get all skills to add in user list------------//
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
			return $response;	
		}
// ---------------------function ends----------------------------------//

	//------------Function to get all data of user------------//
		public function get_userDetails(){
			$user_id=$this->session->userdata('user_id');
			$profile_type=$this->session->userdata('profile_type');
    //Connection establishment, processing of data and response from REST API
			$path=base_url();
			$url = $path.'api/Project_posting_api/get_userDetails?user_id='.$user_id; 
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_HTTPGET, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response_json = curl_exec($ch);
			curl_close($ch);
			$response=json_decode($response_json, true);
			return $response; 
		}
// ---------------------function ends----------------------------------//

	//------------Function to get financial data of user------------//
		public function get_userTransaction(){

			$user_id=$this->session->userdata('user_id');
			
		//Connection establishment, processing of data and response from REST API
			$path=base_url();
			$url = $path.'api/Dashboard_api/get_userTransaction?user_id='.$user_id;	
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_HTTPGET, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response_json = curl_exec($ch);
			curl_close($ch);
			$response=json_decode($response_json, true);
			return $response;	
		}
// ---------------------function ends----------------------------------//


	//------------Function to get all user specific project feedbacks------------//
		public function get_userFeedback(){

			$user_id=$this->session->userdata('user_id');
			$profile_type=$this->session->userdata('profile_type');


			if(($this->session->userdata('selected_profile_type'))!=''){
				$profile_type=$this->session->userdata('selected_profile_type');
			}
		//Connection establishment, processing of data and response from REST API
			$path=base_url();
			$url = $path.'api/Dashboard_api/get_userFeedback?user_id='.$user_id.'&profile_type='.$profile_type;		
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_HTTPGET, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response_json = curl_exec($ch);
			curl_close($ch);
			$response=json_decode($response_json, true);
			return $response;	
		}
// ---------------------function ends----------------------------------//

	//----------------function for 3 bars of rating--------------------------//
	
	public function get_bars_value()
	{
		//$user_id='24';
		$user_id=$this->session->userdata('user_id');
		$profile_type=$this->session->userdata('profile_type');
			//print_r($user_id);
			//print_r($profile_type);
		    $path=base_url();
			$url = $path.'api/ViewProfile_api/get_bars_value?user_id='.$user_id.'&profile_type='.$profile_type;	
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_HTTPGET, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response_json = curl_exec($ch);
			curl_close($ch);
			$response=json_decode($response_json, true);
			//print_r($response_json);die();
			//echo $response;
			return $response;
		
	}
	//----------------------function ends-------------------------------------//


	}
	?>