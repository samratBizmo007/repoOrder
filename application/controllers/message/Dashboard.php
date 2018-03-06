<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

//Jobmandi profile Dashboard
class Dashboard extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->view('pages/helper/helper');
		//start session		
		$user_id=$this->session->userdata('user_id');
		$user_name=$this->session->userdata('user_name');
		$profile_type=$this->session->userdata('profile_type');
		//check session variable set or not, otherwise logout
		if(($user_id=='') || ($user_name=='') || ($profile_type=='')){
			redirect('auth/login');
		}
	}

	public function index(){

		$data['all_skills']=Dashboard::get_allSkills();
		$data['addedRow']=Dashboard::addRow();
		//print_r($data['addedRow']);
		$data['all_userSkills']=Dashboard::get_userSkills();
		$data['all_userFeedback']=Dashboard::get_userFeedback();
		$data['all_userInfo']=Dashboard::get_userInfo();
		$data['all_userTransaction']=Dashboard::get_userTransaction();
    $data['jobsApplied'] = Dashboard::getAppliedJobs_ByUser();
    $data['previousJobs'] = Dashboard::getPostedJobs_ByUser();
    $data['postedjobs'] = Dashboard::getPosted_JobsByJobEmployer();
    $data['previousjobs'] = Dashboard::getPrevious_JobsByJobEmployer();
    $data['view_bookmark'] = Dashboard::show_bookmark();
    $data['user_comments'] = Dashboard::get_userComments();
    $data['freelancer_ratings'] = Dashboard::getAverageRatingsOf_Freelancer();
    $data['FreelancEmployer_ratings'] = Dashboard::getAverageRatingsOf_FreelancEmployer();
    $data['Testimonials_For_Freellancer'] = Dashboard::getTestomonials();
    $this->load->view('includes/header.php');
    $this->load->view('pages/profile/dashboard',$data);
    $this->load->view('includes/footer.php');	

  }	
//-----------------------------------------------------------------------------
//------------this fun is used to get the details of rating of freelancer----------------------//
  public function getAverageRatingsOf_Freelancer(){
    $user_id=$this->session->userdata('user_id');
       // echo $user_id;die();
    $path = base_url();
    $url = $path . 'api/Dashboard_api/getAverageRatingsOf_Freelancer?user_id='.$user_id;        
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_json = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response_json, true);
        //print_r($response_json);die();
    return $response;
  }
//------------this fun is used to get the details of rating of freelancer----------------------//
  public function getTestomonials(){
    $user_id=$this->session->userdata('user_id');
    $profile_type=$this->session->userdata('profile_type');
    $path = base_url();
    $url = $path . 'api/Dashboard_api/getTestomonials?user_id='.$user_id.'&profile_type='.$profile_type;        
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_json = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response_json, true);
        //print_r($response_json);die();
    return $response;
  }
//------------this fun is used to get the details of rating of freelance Employer----------------------//    
  public function getAverageRatingsOf_FreelancEmployer(){
    $user_id=$this->session->userdata('user_id');
    $path = base_url();
    $url = $path . 'api/Dashboard_api/getAverageRatingsOf_FreelancEmployer?user_id='.$user_id;        
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_json = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response_json, true);
        //print_r($response_json);die();
    return $response;
  }
//------------this fun is used to get the details of rating of freelance Employer----------------------//    

  public function addRow(){
    $user_id=$this->session->userdata('user_id');

    $path = base_url();
    $url = $path . 'api/Dashboard_api/addRow?user_id='.$user_id;
        //echo $url;die();
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_json = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response_json, true);
        //print_r($response_json);die();
    return $response;
  }

//-----------htis fun is used to get the applied jobs by that user--------------------//
  public function getAppliedJobs_ByUser(){
    $user_id=$this->session->userdata('user_id');

    $path = base_url();
    $url = $path . 'api/Dashboard_api/getAppliedJobs_ByUser?user_id='.$user_id;

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_json = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response_json, true);
        //print_r($response_json);die();
    return $response;
  }
//-----------htis fun is used to get the applied jobs by that user--------------------//
//--------------this fun is used to get the previous applied jobs by user---------------//
  public function getPostedJobs_ByUser() {
    $user_id=$this->session->userdata('user_id');

    $path = base_url();
    $url = $path . 'api/Dashboard_api/getPostedJobs_ByUser?user_id='.$user_id;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_json = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response_json, true);
    return $response;
  }

//--------------this fun is used to get the previous applied jobs by user---------------//
//-------------this fun is used to get the posted job by job employer----------------------//
  public function getPosted_JobsByJobEmployer(){
    $user_id=$this->session->userdata('user_id');

    $path = base_url();
    $url = $path . 'api/Dashboard_api/getPosted_JobsByJobEmployer?user_id='.$user_id;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_json = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response_json, true);

    return $response;
  }
//-----------this fun is used to get the posted job by job employer-----------------------//
//-------------this fun is used to get the posted job by job employer----------------------//
  public function getPrevious_JobsByJobEmployer(){
    $user_id=$this->session->userdata('user_id');

    $path = base_url();
    $url = $path . 'api/Dashboard_api/getPrevious_JobsByJobEmployer?user_id='.$user_id;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_json = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response_json, true);

    return $response;
  }

//-------------this fun is used to get the posted job by job employer----------------------//
  public function get_userComments(){
    $user_id=$this->session->userdata('user_id');
    $profile_type=$this->session->userdata('profile_type');
    $base='';
    $path = base_url();
    if($profile_type==1){
      $base = $path . 'api/Project_posting_api/getFreelance_comment?user_id='.$user_id;
    }
    if($profile_type==2){
      $base = $path . 'api/Project_posting_api/getEmployer_comment?user_id='.$user_id;
    }

    $url = $base;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_json = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response_json, true);

    return $response;
  }
//-----------this fun is used to get live projects for freelance employer-----------------------//

//-----------this fun is used to get live projects for freelance employer-----------------------//
  public function Show_Live_Projects(){
    extract($_POST);

//-----getting the user details for bookmark-----------------------------------------------------//
    $path = base_url();
    $url = $path.'api/Dashboard_api/get_userDetails?user_id='.$user_id;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_json = curl_exec($ch);
    curl_close($ch);
    $responsedata = json_decode($response_json, true);
    $userBookmark=array();
    $username = '';
    if($responsedata['status']==200){
      $username= $responsedata['status_message'][0]['jm_username'];
    }
//-----getting the user details for bookmark-----------------------------------------------------//

    $path = base_url();
    $url = $path.'api/Dashboard_api/Show_Live_Projects?user_id='.$user_id;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_json = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response_json, true);
        //print_r($response_json);die();
    $project_id='';
    $status = '';

        //print_r($response);
    if($response['status'] == 200)
    {
      foreach ($response['status_message'] as $key)  
      { 
        if($key['is_active'] == 1){
         $status = 'live'; 
       }else{
         $status = 'Completed';  
       }

       echo'<div class="w3-col l12">
       <div class="w3-col l3 m3 s3">
       <label class="w3-tiny w3-text-grey">Project&nbsp;Name</label>
       <label class="w3-small datainfo"><b>'.$key['jm_project_title'].'</b></label>
       <label class="w3-tiny w3-text-grey">By- '.$username.'</label>
       </div>
       <div class="w3-col l3 m3 s3">
       <label class="w3-tiny w3-text-grey">Project Amount</label><br>
       <label class="w3-small"><b>'.$key['jm_project_price'].'</b></label>
       </div>
       <div class="w3-col l3 m3 s3">
       <label class="w3-tiny w3-text-grey">Time</label>                
       <label class="w3-small"><b>posted '.timeago($key['jm_posting_date']).'</b></label>
       </div>
       <div class="w3-col l3 m3 s3 w3-margin-top " >
       <a href="'.base_url().'project/view_project/'.base64_encode($key['jm_project_id']).'" class="w3-small w3-right w3-black w3-round-xlarge w3-padding-tiny btn">View</a></div>   
       </div>
       <div>
       ';
            //-------this div starts for the 12 col div---- //
     }

   }else{
    echo '<div class="w3-col l12 " id="elseDiv">
    <div class="w3-light-grey w3-text-grey w3-small w3-padding-small w3-center bluishGreen_bg" style="text-align: center;"><b>Posted Projects are incomplete and open.</b></div>
    </div>';
  }
}
// ------------------------------   function ends------------------------------------------//

//-----------this fun is used to get live projects for freelance employer-----------------------//
public function freelanceLive_Projects(){
  extract($_POST);
//print_r($_POST);die();
//-----getting the user details for bookmark-----------------------------------------------------//
  $path = base_url();
  $url = $path.'api/Dashboard_api/get_userDetails?user_id='.$user_id;
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_HTTPGET, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response_json = curl_exec($ch);
  curl_close($ch);
  $responsedata = json_decode($response_json, true);
  $userBookmark=array();
  $username = '';
  if($responsedata['status']==200){
    $username= $responsedata['status_message'][0]['jm_username'];
  }
//-----getting the user details for bookmark-----------------------------------------------------//

  $path = base_url();
  $url = $path.'api/Dashboard_api/freelanceLive_Projects?user_id='.$user_id;
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_HTTPGET, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response_json = curl_exec($ch);
  curl_close($ch);
  $response = json_decode($response_json, true);
        //print_r($response_json);die();
  $project_id='';
  $status = '';

        //print_r($response);
  if($response['status'] == 200)
  {
    foreach ($response['status_message'] as $key)  
    { 
      if($key['is_active'] == 1){
       $status = 'live'; 
     }else{
       $status = 'Completed';  
     }

     echo'<div class="w3-col l12">
     <div class="w3-col l3 m3 s3">
     <label class="w3-tiny w3-text-grey">Project&nbsp;Name</label>
     <label class="w3-small datainfo"><b>'.$key['jm_project_title'].'</b></label>
     <label class="w3-tiny w3-text-grey">By- '.$username.'</label>
     </div>
     <div class="w3-col l3 m3 s3">
     <label class="w3-tiny w3-text-grey">Project Amount</label><br>
     <label class="w3-small"><b>'.$key['jm_project_price'].'</b></label>
     </div>
     <div class="w3-col l3 m3 s3">
     <label class="w3-tiny w3-text-grey">Time</label>                
     <label class="w3-small"><b>posted '.timeago($key['jm_posting_date']).'</b></label>
     </div>
     <div class="w3-col l3 m3 s3 w3-margin-top " >
     <a href="'.base_url().'project/view_project/'.base64_encode($key['jm_project_id']).'" class="w3-small w3-right w3-black w3-round-xlarge w3-padding-tiny btn">View</a></div>   
     </div>
     <div>
     ';
            //-------this div starts for the 12 col div---- //
   }

 }else{
  echo '<div class="w3-col l12 " id="elseDiv">
  <div class="w3-light-grey w3-text-grey w3-small w3-padding-small w3-center bluishGreen_bg" style="text-align: center;"><b>No project is open now.</b></div>
  </div>';
}
}
// -----------------------------------fucntion ends--------------------------------------------------//

//-----------this fun is used to get live projects for freelance employer-----------------------//
public function freelancePrevious_Projects(){
  extract($_POST);
//print_r($_POST);die();
//-----getting the user details for bookmark-----------------------------------------------------//
  $path = base_url();
  $url = $path.'api/Dashboard_api/get_userDetails?user_id='.$user_id;
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_HTTPGET, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response_json = curl_exec($ch);
  curl_close($ch);
  $responsedata = json_decode($response_json, true);
  $userBookmark=array();
  $username = '';
  if($responsedata['status']==200){
    $username= $responsedata['status_message'][0]['jm_username'];
  }
//-----getting the user details for bookmark-----------------------------------------------------//

  $path = base_url();
  $url = $path.'api/Dashboard_api/freelancePrevious_Projects?user_id='.$user_id;
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_HTTPGET, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response_json = curl_exec($ch);
  curl_close($ch);
  $response = json_decode($response_json, true);
        //print_r($response_json);die();
  $project_id='';
  $status = '';

        //print_r($response);
  if($response['status'] == 200)
  {
    foreach ($response['status_message'] as $key)  
    { 
      if($key['is_active'] == 1){
       $status = 'live'; 
     }else{
       $status = 'Completed';  
     }

     echo'<div class="w3-col l12">
     <div class="w3-col l3 m3 s3">
     <label class="w3-tiny w3-text-grey">Project&nbsp;Name</label>
     <label class="w3-small datainfo"><b>'.$key['jm_project_title'].'</b></label>
     <label class="w3-tiny w3-text-grey">By- '.$username.'</label>
     </div>
     <div class="w3-col l3 m3 s3">
     <label class="w3-tiny w3-text-grey">Project Amount</label><br>
     <label class="w3-small"><b>'.$key['jm_project_price'].'</b></label>
     </div>
     <div class="w3-col l3 m3 s3">
     <label class="w3-tiny w3-text-grey">Time</label>                
     <label class="w3-small"><b>posted '.timeago($key['jm_posting_date']).'</b></label>
     </div>
     <div class="w3-col l3 m3 s3 w3-margin-top " >
     <a href="'.base_url().'project/view_project/'.base64_encode($key['jm_project_id']).'" class="w3-small w3-right w3-black w3-round-xlarge w3-padding-tiny btn">View</a></div>   
     </div>
     <div>
     ';
            //-------this div starts for the 12 col div---- //
   }
 }else{
  echo '<div class="w3-col l12 " id="elseDiv">
  <div class="w3-light-grey w3-text-grey w3-small w3-padding-small w3-center bluishGreen_bg" style="text-align: center;"><b>You haven\'t completed any project yet.</b></div>
  </div>';
}
}
// -----------------------------------fucntion ends--------------------------------------------------//



//-----------this fun is used to get previous project of freelance employer-----------------------//
public function Show_Previous_Projects(){
  extract($_POST);

//-----getting the user details for bookmark-----------------------------------------------------//
  $path = base_url();
  $url = $path.'api/Dashboard_api/get_userDetails?user_id='.$user_id;
        //echo $url;die();
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_HTTPGET, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response_json = curl_exec($ch);
  curl_close($ch);
  $responsedata = json_decode($response_json, true);

  $userBookmark=array();
  if($responsedata['status']==200){
    $username= $responsedata['status_message'][0]['jm_username'];
  }
//-----getting the user details for bookmark-----------------------------------------------------//
  
  $path = base_url();
  $url = $path.'api/Dashboard_api/Show_Previous_Projects?user_id='.$user_id;
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_HTTPGET, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response_json = curl_exec($ch);
  curl_close($ch);
  $response = json_decode($response_json, true);
  
       //print_r($response);
  if($response['status'] == 200)
  {
    foreach ($response['status_message'] as $key)  
    { 

      echo'<div class="w3-col l12">
      <div class="w3-col l3 m3 s3">
      <label class="w3-tiny w3-text-grey">Project&nbsp;Name</label>
      <label class="w3-small datainfo"><b>'.$key['jm_project_title'].'</b></label>
      <label class="w3-tiny w3-text-grey">By- '.$username.'</label>
      </div>
      <div class="w3-col l3 m3 s3">
      <label class="w3-tiny w3-text-grey">Project Amount</label><br>
      <label class="w3-small"><b>'.$key['jm_project_price'].'</b></label>
      </div>
      <div class="w3-col l3 m3 s3">
      <label class="w3-tiny w3-text-grey">Time</label>                
      <label class="w3-small"><b>posted '.timeago($key['jm_posting_date']).'</b></label>
      </div>
      <div class="w3-col l3 m3 s3 w3-margin-top " >
      <a href="'.base_url().'project/view_project/'.base64_encode($key['jm_project_id']).'" class="w3-small w3-right w3-black w3-round-xlarge w3-padding-tiny btn">View</a></div>   
      </div>
      </div>
      ';
    }
  }else{
    echo '<div class="w3-col l12 " id="elseDiv">
    <div class="w3-light-grey w3-text-grey w3-small w3-padding-small w3-center bluishGreen_bg" style="text-align: center;"><b>There are no previous Projects .</b></div>
    </div>';
  }

}

    //------------Function to change role------------//
public function change_role(){

  extract($_POST);
  $this->session->set_userdata('selected_profile_type', $profile_id);
  
  
}
// ---------------------function ends----------------------------------//

	//------------Function to add user skills------------//
public function add_userSkills(){
		//print_r($_POST);die();
  extract($_POST);
  if($skill_id=='undefined' || $skill_id==500){
   echo '<label class="w3-small w3-padding-small"><i class="fa fa-warning"></i> Undefined Skill !!!</label>';
   die();
 }
 $user_id=$this->session->userdata('user_id');
 if(($this->session->userdata('selected_profile_type'))!=''){
   $profile_type=$this->session->userdata('selected_profile_type');
 }
		//Connection establishment, processing of data and response from REST API
 $path=base_url();
 $url = $path.'api/Dashboard_api/add_userSkills?user_id='.$user_id.'&skill_id='.$skill_id.'&profile_type='.$profile_type;	
		//echo $url;die();	
 $ch = curl_init($url);
 curl_setopt($ch, CURLOPT_HTTPGET, true);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 $response_json = curl_exec($ch);
 curl_close($ch);
 $response=json_decode($response_json, true);
		//echo $response_json;die();
 echo '<label class="w3-small w3-padding-small"><i class="fa fa-comment-o"></i> '.$response['status_message'].'</label>';	
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
 return ($response);	
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
 $url = $path.'api/Dashboard_api/get_userInfo?user_id='.$user_id.'&profile_type='.$profile_type;	
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


	//------------Function to get all user specific skills------------//
	// public function get_userSkills1(){

	// 	$id = $this->input->post();
	// 	$profile_type = $id['id'];

	// 	$user_id=$this->session->userdata('user_id');
	// 	// //$profile_type=$this->session->userdata('profile_type');

	// 	// extract($_POST);
	// 	// $profile_type=$id;
	// 	// // if(($this->session->userdata('selected_profile_type'))!=''){
	// 	// // 	$profile_type=$this->session->userdata('selected_profile_type');
	// 	// // }
	// 	// //Connection establishment, processing of data and response from REST API
	// 	$path=base_url();
	// 	$url = $path.'api/Dashboard_api/get_userSkills?user_id='.$user_id.'&profile_type='.$profile_type;		
	// 	$ch = curl_init($url);
	// 	curl_setopt($ch, CURLOPT_HTTPGET, true);
	// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// 	$response_json = curl_exec($ch);
	// 	curl_close($ch);
	// 	$response=$response_json;
	// 	print_r($response);	
	// }
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

	//------------Function to delete user skill from user list------------//
public function del_userSkill(){
  extract($_POST);
  $user_id=$this->session->userdata('user_id');

		//Connection establishment, processing of data and response from REST API
  $path=base_url();
  $url = $path.'api/Dashboard_api/del_userSkill?skill_id='.$skill_id.'&user_id='.$user_id.'&profile_type='.$profile_type;
		//echo $url;die();
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_HTTPGET, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response_json = curl_exec($ch);
  curl_close($ch);
  $response=json_decode($response_json, true);
  return $response_json;	
}
// ---------------------function ends----------------------------------//

 // ----------------function to set the div data as per profile type selected----//
public function profileData(){
  $profile_id=$_POST['profile_id'];		
  
  switch ($profile_id) {

			//-------------case Freelancer			
   case '1':

   echo '			
   <div class="w3-col l6 w3-padding-small">
   <center><h3>Previous Projects</h3></center>
   <div class="w3-col l12">
   <table class="table table-bordered">
   <thead>
   <tr>
   <th>Project</th>
   <th>Bid Amount</th>
   <th>Time</th>
   <th>Status</th>
   </tr>
   </thead>
   </table>
   </div>
   </div>
   <div class="w3-col l6 w3-padding-small">
   <center><h3>Current Projects</h3></center>
   <div class="w3-col l12">
   <table class="table table-bordered">
   <thead>
   <tr>
   <th>Project</th>
   <th>Bid Amount</th>
   <th>Deadline</th>
   <th>Milestone</th>
   </tr>
   </thead>
   </table>
   </div>
   </div>
   ';

   break;

			//-------------case Freelancer Employer
   case '2':

   echo '			
   <div class="w3-col l6 w3-padding-small">
   <center><h3>Completed Projects</h3></center>
   <div class="w3-col l12">
   <table class="table table-bordered">
   <thead>
   <tr>
   <th>Project</th>
   <th>Money payed</th>
   <th>Completed by</th>
   <th>Date/Time</th>
   </tr>
   </thead>
   </table>
   </div>
   </div>
   <div class="w3-col l6 w3-padding-small">
   <center><h3>Ongoing Projects</h3></center>
   <div class="w3-col l12">
   <table class="table table-bordered">
   <thead>
   <tr>
   <th>Project</th>
   <th>Bid Amount</th>
   <th>Time Estimated</th>
   <th>Delivered Build</th>
   </tr>
   </thead>
   </table>
   </div>
   </div>
   ';
   break;

			//-------------case Job Seeker
   case '3':

   echo '			
   <div class="w3-col l6 w3-padding-small">
   <center><h3>Previous Jobs Applied</h3></center>
   <div class="w3-col l12">
   <table class="table table-bordered">
   <thead>
   <tr>
   <th>Job Details</th>
   <th>Company</th>
   <th>Skills Required</th>
   <th>Salary Offered</th>
   <th>Status</th>
   </tr>
   </thead>
   </table>
   </div>
   </div>
   <div class="w3-col l6 w3-padding-small">
   <center><h3>Current Job Applied</h3></center>
   <div class="w3-col l12">
   <table class="table table-bordered">
   <thead>
   <tr>
   <th>Job Details</th>
   <th>Company</th>
   <th>Skills Required</th>
   <th>Salary Offered</th>
   <th>Status</th>
   </tr>
   </thead>
   </table>
   </div>
   </div>
   ';
   break;

			//-------------case Job Employer
   case '4':

   echo '			
   <div class="w3-col l6 w3-padding-small">
   <center><h3>Previous Jobs Posted</h3></center>
   <div class="w3-col l12">
   <table class="table table-bordered">
   <thead>
   <tr>
   <th>Job Details</th>
   <th>Applied Candidates</th>
   <th>Posted On</th>
   <th>Status</th>
   </tr>
   </thead>
   </table>
   </div>
   </div>
   <div class="w3-col l6 w3-padding-small">
   <center><h3>Current Jobs Posted</h3></center>
   <div class="w3-col l12">
   <table class="table table-bordered">
   <thead>
   <tr>
   <th>Job Details</th>
   <th>No. of Candidates Applied</th>
   <th>Posted on</th>
   <th>Expires on</th>
   </tr>
   </thead>
   </table>
   </div>
   </div>
   ';
   break;

   default:
				# code...
   break;
 }
}	
	// -----------------function ends here--------------------------//
    //-----------function for show bookmark project list-----------------------//

public function show_bookmark()
{
   // $user_id=1;
  $user_id=$this->session->userdata('user_id');

    //Connection establishment, processing of data and response from REST API
  $path=base_url();
  $url = $path.'api/Project_posting_api/show_bookmark?user_id='.$user_id; 
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_HTTPGET, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response_json = curl_exec($ch);
  curl_close($ch);
  $response=json_decode($response_json, true);
       // return $response;
      // print_r($response['status_message']);die();
  $bookmark="";
  foreach ($response['status_message'] as $value)
  {
    $bookmark=$value['jm_userBookmark'];

  }
  if($bookmark!="")
  {
        // echo $bookmark;die();
    $a=array();
    foreach(json_decode($bookmark) as $key)
    {
               // $jm_project_id='1';
      $path=base_url();
      $url = $path.'api/Project_posting_api/get_project?jm_project_id='.$key; 
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_HTTPGET, true);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $response_json = curl_exec($ch);
      curl_close($ch);
      $response=json_decode($response_json, true);

      $a[]=$response;
    }
    return $a;
  } 
}
    //--------------end function----------------------------//

}
?>