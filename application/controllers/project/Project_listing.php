<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(E_ERROR | E_PARSE);
class Project_listing extends CI_Controller
{
	public function __construct(){
		parent::__construct();
   $this->load->helper('file');
   $this->load->helper('download');
   $this->load->view('pages/helper/helper');
   $this->load->model('dashboard_model/dashboard_model');
   $this->load->library('pagination');

		//print_r($response);die();
		//

		 //print_r($data);die();
 }

	// public function index()
	// {
 //    //echo 'sujeet';
 //    $user_id = $this->session->userdata('user_id');
 //    $this->load->database();
 //    $this->load->model('project_model/Project_listing_model','project');
 //    $arr = array();
 //    if(isset($_GET['search_param'])){

 //      $arr['fileds']['jm_job_type'] = $_GET['search_param'].'/=';
 //      $arr['order']['field'] = 'jm_project_id';
 //      $arr['order']['order'] = 'DESC';
 //      $arr['table']['table'] = 'jm_project_list';
 //      $arr['mode']['mode'] = 'project_list';
 //    }

 //    $data['info'] = $this->project->filterProject($arr);
 //    //echo '<pre>';print_r($result);exit;
 //    $this->load->view('includes/header.php');
 //    if($data['result'] == 'N/A'){
 //      echo '
 //      <div class="w3-col 12 w3-padding w3-margin">              
 //      <div class="w3-col l12">
 //      <div class="w3-center">
 //      <img src="'.base_url().'images/desktop/NoResultsImage.jpg" width="auto" class="img"/>
 //      </div>
 //      </div>             
 //      </div>';
 //    }else{
 //      $this->load->view('pages/project/project_listing.php',$data);
 //    }
 //  $data['all_skills']=Project_listing::get_allSkills();
 //  $data['user_details']=Project_listing::get_userDetails();
 //  $this->load->view('includes/footer.php',$data);
 // }


 public function index(){
    //echo 'sujeet';
   if(isset($_GET)){
    $str = $_GET;
  }else{
    $str = array();
  }
  $user_id = $this->session->userdata('user_id');
  $this->load->database();
  $this->load->model('project_model/project_listing_model');
  $data['info']=$this->project_listing_model->project_post_model($str);
	  // print_r($data);die();
  $data['all_skills']=Project_listing::get_allSkills();
  $data['user_details']=Project_listing::get_userDetails();
  //$data['skill']=Project_listing::FetchSkills();
 
  $this->load->view('includes/header.php');
  $this->load->view('pages/project/project_listing.php',$data);
  $this->load->view('includes/footer.php',$data);
}

public function FetchSkills() {
        extract($_POST);
       //print_r($_POST);die();
        $path = base_url();
        $url = $path . 'api/Project_posting_api/FetchSkills?Skills='.json_encode($Skills);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        print_r($response_json);
        //return $response;
    }
//-------------this fun is used to get the all skills which provide to that project-------------//
    public function Get_Skills(){
       extract($_POST);
       //print_r($_POST);die();
        $path = base_url();
        $url = $path . 'api/Project_posting_api/Get_Skills?Skills='.$Skills;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        print_r($response_json); 
    }
    //------------this fun is used to get the all skills which provide to that project----------//

 //------------Function to get all data of user------------//
public function get_userDetails(){

  $user_id=$this->session->userdata('user_id');

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


//------------Function to get all skills to add in user list------------//
public function get_allSkills(){

//		$config['base_url']=base_url()."project/Project_listing/index";
//		$config['per_page'] = 5;
//		$config['use_page_numbers'] = TRUE;
//		$config['next_link'] = 'Next';
//		$config['prev_link'] = 'Previous';
//		$config['num_links'] = 1;
//		$config['total_rows'] = $this->db->get('jm_project_list',$config['per_page'],$this->uri->segment(3))->num_rows();
//		//print_r($config['total_rows']);die();
//		//$data=array();
//		$this->pagination->initialize($config);
//		$this->pagination->create_links();
////		$response['query']=$this->db->get('jm_project_list',$config['per_page'],$this->uri->segment(3));
//		//print_r($response);die();
//  		 $response["links"] = $this->pagination->create_links();
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


//----------------function to show project list--------------------------------//

public function project_post()
{
            //$jm_user_id='1';
  extract($_POST);
  $path=base_url();
  $url = $path.'api/project_listing_api/project_list'; 
   			//echo $url;die();  
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_HTTPGET, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response_json = curl_exec($ch);
  curl_close($ch);
  $response=json_decode($response_json, true);
}

//-------------------add bookmark----------------------//
public function add_bookmark(){
  extract($_POST);
  $path=base_url();
  $url = $path.'api/project_posting_api/addBookmark?user_id='.$user_id.'&project_id='.$project_id; 
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_HTTPGET, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response_json = curl_exec($ch);
  curl_close($ch);
  $response=json_decode($response_json, true);

  if($response['status']==200){
     echo '<div class="alert alert-success w3-display-topright w3-margin" style="position: fixed;"><b>Success</b><br>'.$response['status_message'].'</div>
    <script>
    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
      });
    }, 2000);
    </script>';
   
  }
  else{
    echo '<div class="alert alert-danger w3-display-topright w3-margin" style="position: fixed;"><b>Warning !</b> Something Went Wrong.<br>'.$response['status_message'].'</div>
    <script>
    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
      });
    }, 8000);
    </script>';
  }
 // print_r($response_json);
}
//-------------------function ends----------------------//

//-------------------delete bookmark----------------------//
public function del_bookmark()
{
  extract($_POST);
  $path=base_url();
  $url = $path.'api/project_posting_api/del_bookmark?user_id='.$user_id.'&project_id='.$project_id; 
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_HTTPGET, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response_json = curl_exec($ch);
  curl_close($ch);
  $response=json_decode($response_json, true);
  if($response['status']==200){
     echo '<div class="alert alert-success w3-display-topright w3-margin" style="position: fixed;"><b>Success</b><br>'.$response['status_message'].'</div>
    <script>
    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
      });
    }, 2000);
    </script>';
   
  }
  else{
    echo '<div class="alert alert-danger w3-display-topright w3-margin" style="position: fixed;"><b>Warning !</b> Something Went Wrong.<br>'.$response['status_message'].'</div>
    <script>
    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
      });
    }, 2000);
    </script>';
  }
}
//-------------------function ends----------------------//

public function sort_projectb_type()
{
  extract($_POST);
  $path=base_url();
  $url = $path.'api/Project_posting_api/sort_job_type?jm_project_type='.$project_type; 
            //echo $url;die();  
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_HTTPGET, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response_json = curl_exec($ch);
  curl_close($ch);
  $response=json_decode($response_json, true);       
  }//end of function


  public function filterProject(){ 
    $this->load->model('project_model/Project_listing_model','project');
    $data = $this->input->post();
    //print_r($data);die();
    $result['result'] = $this->project->filterProject($data);
    $result['user_details']=Project_listing::get_userDetails();
    //echo '<pre>';print_r($result['result']);die();
    if($result['result'] == 'N/A'){
      echo '
      <div class="w3-col 12 w3-padding w3-margin">              
      <div class="w3-col l12">
      <div class="w3-center">
      <img src="'.base_url().'css/logos/no_data.png" width="auto" class="img"/>
      </div>
      </div>             
      </div>';
    }else{
      if($data['mode']['mode'] == 'project_list'){
        $this->load->view('pages/project/_project_listing.php',$result);
      }
      if($data['mode']['mode'] == 'freelancer_list'){
        $this->load->view('pages/project/_free_listing.php',$result);
      }
    }

  }


  public function fetchProject(){
    $this->load->model('project_model/Project_listing_model','project');
    $data = $this->input->post();
    //echo '<pre>';print_r($data);
    $user_id=$this->session->userdata('user_id');    
    $po = $this->project->fetchProject($data['str']);
    $data="";
    //print_r($po);die();
    if($po=='N/A'){
      echo '
      <div class="w3-col 12 w3-padding w3-margin">              
      <div class="w3-col l12">
      <div class="w3-center">
      <img src="'.base_url().'css/logos/no_data.png" width="auto" class="img"/>
      </div>
      </div>             
      </div>';
    }
    else{
      $user_details=Project_listing::get_userDetails();
      $userBookmark=array();
      if($user_details['status']==200){
        $userBookmark=json_decode($user_details['status_message'][0]['jm_userBookmark'],TRUE);
      }
      foreach ($po as $key) {
        $class="fa-bookmark-o";
        $title="Add Bookmark";

        if($userBookmark){
          if(in_array($key['jm_project_id'], $userBookmark)){
            $class="fa-bookmark";
            $title="Bookmarked";
          }
        }

        
        print_r('
          <div class="w3-col 12 w3-padding">              
          <div class="w3-col l12 w3-border-bottom">
          <div class="w3-right w3-margin-right w3-padding-right"><a onclick="add_bookmark('.$user_id.','.$key['jm_project_id'].')" title="'.$title.'"><i id="project_'.$key['jm_project_id'].'" class="fa '.$class.'" style="font-size:25px; color: black"></i></a></div>
          <div class="col-lg-8">
          <h4>'.$key['jm_project_title'].'</h4>
          <div>
          <p>
          <div style="max-height:200px;overflow: hidden">
          '.$key['jm_project_description'].'<a class="w3-margin-left" href="'.base_url().'project/view_project/'.base64_encode($key['jm_project_id']).'"><span style="color:#02b28b"><i>more</i></span></a>
          </div>
          </p>
          </div>
          <div class="para_second">
          <p>Tags & Skills: </p>
          </div>
          <div class="w3-col l8 w3-margin-bottom">
          <div class="w3-col l12">
          <div class="w3-col l3 s3 w3-padding-tiny w3-tiny"><b>'.$key['jm_job_type'].'</b></div>

          </div>
          </div>              
          </div>
          <div class="col-lg-4 w3-hide-small">
          <div class="">
          <div class="w3-small w3-col l12 "><b class="w3-right w3-margin-top w3-margin-bottom">'.$key['jm_projectbudget_type'].'</b></div>
          <div class="w3-col l12"><a href="'.base_url().'project/view_project/'.base64_encode($key['jm_project_id']).'" class="w3-small w3-black w3-right w3-round-xlarge w3-padding-tiny btn">VIEW PROJECT</a></div>
          <div class=" w3-col l12 w3-small"><span class="w3-right" style="padding-right:5px;margin-top:10px">'.$key['jm_project_bid'].' Proposals</span></div>
          <div class="w3-col 12 w3-padding-tiny w3-margin-top w3-right w3-tiny w3-text-grey"><i class="w3-right">posted '.timeago($key['jm_posting_date']).'</i></div>
          </div>
          </div>

          <div class="col-lg-4 w3-hide-large">
          <div class="">
          <div class="w3-small w3-col l6 s6"><b class="w3-left w3-margin-top w3-margin-bottom">'.$key['jm_projectbudget_type'].'</b></div>
          <div class="w3-col l6 s6"><a href="'.base_url().'project/view_project/'.base64_encode($key['jm_project_id']).'" class="w3-small w3-black w3-right w3-round-xlarge w3-padding-tiny btn">VIEW PROJECT</a>
          </div>

          <div class=" w3-col l12 s6 w3-small">
          <span class="w3-right" style="padding-right:5px; margin-top:10px">'.$key['jm_project_bid'].' Proposals</span></div>

          <div class="w3-col l6 s6 w3-padding-tiny w3-margin-top w3-left w3-tiny w3-text-grey"><i class="w3-left">posted '.timeago($key['jm_posting_date']).'</i></div>
          </div>
          </div>
          </div>             
          </div>
          ');    
      }
    }
  }//end of function

  public function fetchProjectbyskill(){
   $this->load->model('project_model/Project_listing_model','project');
   $data = $this->input->post();
//print_r($data);die();
   $user_id=$this->session->userdata('user_id');
   $po = $this->project->fetchProjectbyskill($data['skill'],$data['value']);
   $data="";
//print_r($po);die();

   if($po=='N/A'){
    echo '
    <div class="w3-col 12 w3-padding w3-margin">              
    <div class="w3-col l12">
    <div class="w3-center">
    <img src="'.base_url().'images/desktop/NoResultsImage.jpg" width="auto" class="img"/>
    </div>
    </div>             
    </div>';
  }
  else{
    $user_details=Project_listing::get_userDetails();
    $userBookmark=array();
    if($user_details['status']==200){
      $userBookmark=json_decode($user_details['status_message'][0]['jm_userBookmark'],TRUE);
    }
    foreach ($po as $key) {
      $class="fa-bookmark-o";
      $title="Add Bookmark";
      if(in_array($key['jm_project_id'], $userBookmark)){

        $class="fa-bookmark";
        $title="Bookmarked";
      }
      print_r('
        <div class="w3-col 12 w3-padding">              
        <div class="w3-col l12 w3-border-bottom">
        <div class="w3-right w3-margin-right w3-padding-right"><a onclick="add_bookmark('.$user_id.','.$key['jm_project_id'].')" title="'.$title.'"><i id="project_'.$key['jm_project_id'].'" class="fa '.$class.'" style="font-size:25px; color: black"></i></a></div>
        <div class="col-lg-8">
        <h4>'.$key['jm_project_title'].'</h4>
        <div>
        <p>
        <div style="max-height:200px;overflow: hidden">
        '.$key['jm_project_description'].'<a class="w3-margin-left" href="'.base_url().'project/view_project/'.base64_encode($key['jm_project_id']).'"><span style="color:#02b28b"><i>more</i></span></a>
        </div>
        </p>
        </div>
        <div class="para_second">
        <p>Tags & Skills: </p>
        </div>
        <div class="w3-col l8 w3-margin-bottom">
        <div class="w3-col l12">
        <div class="w3-col l3 s3 w3-padding-tiny w3-tiny"><b>'.$key['jm_job_type'].'</b></div>

        </div>
        </div>              
        </div>
        <div class="col-lg-4 w3-hide-small">
        <div class="">
        <div class="w3-small w3-col l12 "><b class="w3-right w3-margin-top w3-margin-bottom">'.$key['jm_projectbudget_type'].'</b></div>
        <div class="w3-col l12"><a href="'.base_url().'project/view_project/'.base64_encode($key['jm_project_id']).'" class="w3-small w3-black w3-right w3-round-xlarge w3-padding-tiny btn">VIEW PROJECT</a></div>
        <div class=" w3-col l12 w3-small"><span class="w3-right" style="padding-right:5px;margin-top:10px">'.$key['jm_project_bid'].' Proposals</span></div>
        <div class="w3-col 12 w3-padding-tiny w3-margin-top w3-right w3-tiny w3-text-grey"><i class="w3-right">posted '.timeago($key['jm_posting_date']).'</i></div>
        </div>
        </div>

        <div class="col-lg-4 w3-hide-large">
        <div class="">
        <div class="w3-small w3-col l6 s6"><b class="w3-left w3-margin-top w3-margin-bottom">'.$key['jm_projectbudget_type'].'</b></div>
        <div class="w3-col l6 s6"><a href="'.base_url().'project/view_project/'.base64_encode($key['jm_project_id']).'" class="w3-small w3-black w3-right w3-round-xlarge w3-padding-tiny btn">VIEW PROJECT</a>
        </div>

        <div class=" w3-col l12 s6 w3-small">
        <span class="w3-right" style="padding-right:5px; margin-top:10px">'.$key['jm_project_bid'].' Proposals</span></div>

        <div class="w3-col l6 s6 w3-padding-tiny w3-margin-top w3-left w3-tiny w3-text-grey"><i class="w3-left">posted '.timeago($key['jm_posting_date']).'</i></div>
        </div>
        </div>
        </div>             
        </div>
        ');    
    }
  }

  }//end of function

  public function searchProject(){
    //echo 'sujeet';exit;
    $this->load->model('project_model/Project_listing_model','project');
    $data = $this->input->post();
    //echo '<pre>';print_r($data);exit;
    $user_id=$this->session->userdata('user_id');

    $post = $this->project->serchby($data['str'],$user_id);
    //echo '<pre>';print_r($post);exit;
    $data="";
    
    if($post=='N/A'){
      echo '
      <div class="w3-col 12 w3-padding w3-margin">              
      <div class="w3-col l12">
      <div class="w3-center">
      <img src="'.base_url().'images/desktop/NoResultsImage.jpg" width="auto" class="img"/>
      </div>
      </div>             
      </div>';
    }
    else{
      $user_details=Project_listing::get_userDetails();
      $userBookmark=array();
      if($user_details['status']==200){
        $userBookmark=json_decode($user_details['status_message'][0]['jm_userBookmark'],TRUE);
      }
      foreach ($post as $key) {
        $class="fa-bookmark-o";
        $title="Add Bookmark";
        if($userBookmark){
          if(in_array($key['jm_project_id'], $userBookmark)){
            $class="fa-bookmark";
            $title="Bookmarked";
          }
        }
        
        print_r('
          <div class="w3-col 12 w3-padding">              
          <div class="w3-col l12 w3-border-bottom">
          <div class="w3-right w3-margin-right w3-padding-right"><a onclick="add_bookmark('.$user_id.','.$key['jm_project_id'].')" title="'.$title.'"><i id="project_'.$key['jm_project_id'].'" class="fa '.$class.'" style="font-size:25px; color: black"></i></a></div>
          <div class="col-lg-8">
          <h4>'.$key['jm_project_title'].'</h4>
          <div>
          <p>
          <div style="max-height:200px;overflow: hidden">
          '.$key['jm_project_description'].'<a class="w3-margin-left" href="'.base_url().'project/view_project/'.base64_encode($key['jm_project_id']).'"><span style="color:#02b28b"><i>more</i></span></a>
          </div>
          </p>
          </div>
          <div class="para_second">
          <p>Tags & Skills: </p>
          </div>
          <div class="w3-col l8 w3-margin-bottom">
          <div class="w3-col l12">
          <div class="w3-col l3 s3 w3-padding-tiny w3-tiny"><b>'.$key['jm_job_type'].'</b></div>

          </div>
          </div>              
          </div>
          <div class="col-lg-4 w3-hide-small">
          <div class="">
          <div class="w3-small w3-col l12 "><b class="w3-right w3-margin-top w3-margin-bottom">'.$key['jm_projectbudget_type'].'</b></div>
          <div class="w3-col l12"><a href="'.base_url().'project/view_project/'.base64_encode($key['jm_project_id']).'" class="w3-small w3-black w3-right w3-round-xlarge w3-padding-tiny btn">VIEW PROJECT</a></div>
          <div class=" w3-col l12 w3-small"><span class="w3-right" style="padding-right:5px;margin-top:10px">'.$key['jm_project_bid'].' Proposals</span></div>
          <div class="w3-col 12 w3-padding-tiny w3-margin-top w3-right w3-tiny w3-text-grey"><i class="w3-right">posted '.timeago($key['jm_posting_date']).'</i></div>
          </div>
          </div>

          <div class="col-lg-4 w3-hide-large">
          <div class="">
          <div class="w3-small w3-col l6 s6"><b class="w3-left w3-margin-top w3-margin-bottom">'.$key['jm_projectbudget_type'].'</b></div>
          <div class="w3-col l6 s6"><a href="'.base_url().'project/view_project/'.base64_encode($key['jm_project_id']).'" class="w3-small w3-black w3-right w3-round-xlarge w3-padding-tiny btn">VIEW PROJECT</a>
          </div>

          <div class=" w3-col l12 s6 w3-small">
          <span class="w3-right" style="padding-right:5px; margin-top:10px">'.$key['jm_project_bid'].' Proposals</span></div>

          <div class="w3-col l6 s6 w3-padding-tiny w3-margin-top w3-left w3-tiny w3-text-grey"><i class="w3-left">posted '.timeago($key['jm_posting_date']).'</i></div>
          </div>
          </div>
          </div>             
          </div>
          ');    
      }
    }
  }//end of function
  public function jobtypeproject(){
   $this->load->model('project_model/Project_listing_model','project');
   $data = $this->input->post();


   $post = $this->project->serchjobtype($data['str']);
   //echo'<pre>';print_r($post);die();
   $data="";
   $user_id=$this->session->userdata('user_id');
   if($post=='N/A'){
    echo '
    <div class="w3-col 12 w3-padding w3-margin">              
    <div class="w3-col l12">
    <div class="w3-center">
    <img src="'.base_url().'images/desktop/NoResultsImage.jpg" width="auto" class="img"/>
    </div>
    </div>             
    </div>';
  }
  else{
    $user_details=Project_listing::get_userDetails();
    $userBookmark=array();
    if($user_details['status']==200){
      $userBookmark = json_decode($user_details['status_message'][0]['jm_userBookmark'],TRUE);
    }
    foreach ($post as $key) {
      $class="fa-bookmark-o";
      $title="Add Bookmark";
      if($userBookmark){
        if(in_array($key['jm_project_id'], $userBookmark)){
          $class="fa-bookmark";
          $title="Bookmarked";
        }
      }

      print_r('
        <div class="w3-col 12 w3-padding">              
        <div class="w3-col l12 w3-border-bottom">
        <div class="w3-right w3-margin-right w3-padding-right"><a onclick="add_bookmark('.$user_id.','.$key['jm_project_id'].')" title="'.$title.'"><i id="project_'.$key['jm_project_id'].'" class="fa '.$class.'" style="font-size:25px; color: black"></i></a></div>
        <div class="col-lg-8">
        <h4>'.$key['jm_project_title'].'</h4>
        <div>
        <p>
        <div style="max-height:200px;overflow: hidden">
        '.$key['jm_project_description'].'<a class="w3-margin-left" href="'.base_url().'project/view_project/'.base64_encode($key['jm_project_id']).'"><span style="color:#02b28b"><i>more</i></span></a>
        </div>
        </p>
        </div>
        <div class="para_second">
        <p>Tags & Skills: </p>
        </div>
        <div class="w3-col l8 w3-margin-bottom">
        <div class="w3-col l12">
        <div class="w3-col l3 s3 w3-padding-tiny w3-tiny"><b>'.$key['jm_job_type'].'</b></div>

        </div>
        </div>              
        </div>
        <div class="col-lg-4 w3-hide-small">
        <div class="">
        <div class="w3-small w3-col l12 "><b class="w3-right w3-margin-top w3-margin-bottom">'.$key['jm_projectbudget_type'].'</b></div>
        <div class="w3-col l12"><a href="'.base_url().'project/view_project/'.base64_encode($key['jm_project_id']).'" class="w3-small w3-black w3-right w3-round-xlarge w3-padding-tiny btn">VIEW PROJECT</a></div>
        <div class=" w3-col l12 w3-small"><span class="w3-right" style="padding-right:5px;margin-top:10px">'.$key['jm_project_bid'].' Proposals</span></div>
        <div class="w3-col 12 w3-padding-tiny w3-margin-top w3-right w3-tiny w3-text-grey"><i class="w3-right">posted '.timeago($key['jm_posting_date']).'</i></div>
        </div>
        </div>

        <div class="col-lg-4 w3-hide-large">
        <div class="">
        <div class="w3-small w3-col l6 s6"><b class="w3-left w3-margin-top w3-margin-bottom">'.$key['jm_projectbudget_type'].'</b></div>
        <div class="w3-col l6 s6"><a href="'.base_url().'project/view_project/'.base64_encode($key['jm_project_id']).'" class="w3-small w3-black w3-right w3-round-xlarge w3-padding-tiny btn">VIEW PROJECT</a>
        </div>

        <div class=" w3-col l12 s6 w3-small">
        <span class="w3-right" style="padding-right:5px; margin-top:10px">'.$key['jm_project_bid'].' Proposals</span></div>

        <div class="w3-col l6 s6 w3-padding-tiny w3-margin-top w3-left w3-tiny w3-text-grey"><i class="w3-left">posted '.timeago($key['jm_posting_date']).'</i></div>
        </div>
        </div>
        </div>             
        </div>
        ');    
    }
  }
  }//end of function

  // public function getAllskill(){
  //  $this->load->model('project_model/Project_listing_model','project');
  //  $post = $this->project->fetchAllSkill();
  //  print_r(json_encode($post));
  // }//end of function

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
    print_r(json_encode($response)); 
  }
// ---------------------function ends----------------------------------//

  public function show_bookmark()
  {
    //print_r($_POST);die();
    $user_id='1';
    extract($_POST);
    // // $user_id = $this->session->userdata('user_id');
    // //Connection establishment, processing of data and response from REST API
    //  $path=base_url();
    //   $url = $path.'api/Project_posting_api/show_bookmark?user_id='.$user_id; 
    //   $ch = curl_init($url);
    //   curl_setopt($ch, CURLOPT_HTTPGET, true);
    //   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //   $response_json = curl_exec($ch);
    //   curl_close($ch);
    //   $response=json_decode($response_json, true);
    //    //return $response;
    //    //print_r($response_json);die();
    //   $bookmark="";
    //   foreach ($response['status_message'] as $value)
    //   {
    //     $bookmark=$value['jm_userBookmark'];

    //   }
    //  // print_r(json_decode($bookmark));die();
    //     $a=array();
    //     foreach(json_decode($bookmark) as $key)
    //     {
    $this->load->model('project_model/Project_listing_model','project');
    $data = $this->input->post();
//print_r($data);die();
    $user_id=$this->session->userdata('user_id');
    $po = $this->project->fetchProjectbyskill($data['fileds'],$data['value']);
    $data="";
//print_r($po);die();

    if($po=='N/A'){
      echo '
      <div class="w3-col 12 w3-padding w3-margin">              
      <div class="w3-col l12">
      <div class="w3-center">
      <img src="'.base_url().'images/desktop/NoResultsImage.jpg" width="auto" class="img"/>
      </div>
      </div>             
      </div>';
    }
    else{
      echo "check else";
      $user_details=Project_listing::getprojectlist();
      $userBookmark=array();
      if($user_details['status']==200){
        $userBookmark = json_decode($user_details['status_message'][0]['jm_userBookmark'],TRUE);
      }
      foreach ($post as $key) {
        $class="fa-bookmark-o";
        $title="Add Bookmark";
        if($userBookmark){
          if(in_array($key['jm_project_id'], $userBookmark)){
            $class="fa-bookmark";
            $title="Bookmarked";


            print_r('
              <div class="w3-col 12 w3-padding">              
              <div class="w3-col l12 w3-border-bottom">
              <div class="w3-right w3-margin-right w3-padding-right"><a onclick="add_bookmark('.$user_id.','.$key['jm_project_id'].')" title="'.$title.'"><i id="project_'.$key['jm_project_id'].'" class="fa '.$class.'" style="font-size:25px; color: black"></i></a></div>
              <div class="col-lg-8">
              <h4>'.$key['jm_project_title'].'</h4>
              <div>
              <p>
              <div style="max-height:200px;overflow: hidden">
              '.$key['jm_project_description'].'<a class="w3-margin-left" href="'.base_url().'project/view_project/'.base64_encode($key['jm_project_id']).'"><span style="color:#02b28b"><i>more</i></span></a>
              </div>
              </p>
              </div>
              <div class="para_second">
              <p>Tags & Skills: </p>
              </div>
              <div class="w3-col l8 w3-margin-bottom">
              <div class="w3-col l12">
              <div class="w3-col l3 s3 w3-padding-tiny w3-tiny"><b>'.$key['jm_job_type'].'</b></div>

              </div>
              </div>              
              </div>
              <div class="col-lg-4 w3-hide-small">
              <div class="">
              <div class="w3-small w3-col l12 "><b class="w3-right w3-margin-top w3-margin-bottom">'.$key['jm_projectbudget_type'].'</b></div>
              <div class="w3-col l12"><a href="'.base_url().'project/view_project/'.base64_encode($key['jm_project_id']).'" class="w3-small w3-black w3-right w3-round-xlarge w3-padding-tiny btn">VIEW PROJECT</a></div>
              <div class=" w3-col l12 w3-small"><span class="w3-right" style="padding-right:5px;margin-top:10px">'.$key['jm_project_bid'].' Proposals</span></div>
              <div class="w3-col 12 w3-padding-tiny w3-margin-top w3-right w3-tiny w3-text-grey"><i class="w3-right">posted '.timeago($key['jm_posting_date']).'</i></div>
              </div>
              </div>

              <div class="col-lg-4 w3-hide-large">
              <div class="">
              <div class="w3-small w3-col l6 s6"><b class="w3-left w3-margin-top w3-margin-bottom">'.$key['jm_projectbudget_type'].'</b></div>
              <div class="w3-col l6 s6"><a href="'.base_url().'project/view_project/'.base64_encode($key['jm_project_id']).'" class="w3-small w3-black w3-right w3-round-xlarge w3-padding-tiny btn">VIEW PROJECT</a>
              </div>

              <div class=" w3-col l12 s6 w3-small">
              <span class="w3-right" style="padding-right:5px; margin-top:10px">'.$key['jm_project_bid'].' Proposals</span></div>

              <div class="w3-col l6 s6 w3-padding-tiny w3-margin-top w3-left w3-tiny w3-text-grey"><i class="w3-left">posted '.timeago($key['jm_posting_date']).'</i></div>
              </div>
              </div>
              </div>             
              </div>
              ');  
          }
        }
       //print_r($a);die();
      }}}



   //---------------download user resume----------------------//
      public function download($bid_id = '') {
        $path = base_url();
        $url = $path . 'api/View_Project_api/download?bid_id='.$bid_id;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        //print_r($response_json);die();

        $file = explode("/", $response);
        $file_name = $file[3];
        $file =base_url().$response;
        $data = file_get_contents($file);            
        force_download($file_name,$data); 
      }
    // -----------------download function ends---------------//

    //---------------Award Poroject function---------------------//
      public function awardProject() {
        extract($_POST);
        $path = base_url();
        $url = $path . 'api/View_Project_api/awardProject?freelancer_id='.$freelancer_id.'&project_id='.$project_id;
        //echo $url;die();
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true); 
        print_r($response_json);die();
       // echo ($response['status_message']);
       echo'<div class="alert alert-success w3-margin" style="text-align: center;">
            <strong>' . $response['status_message'] . '</strong> 
            </div>    
            ';   
      }
    // -----------------Award Poroject function---------------//

  
    //---------------cloase project permanntly function---------------------//
      public function closeProject() {
        extract($_POST);
        $path = base_url();
        $url = $path . 'api/View_Project_api/closeProject?project_id='.$project_id;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true); 
        if ($response['status'] == 200) {
          echo'
          <h4 class="bluish-green w3-margin"><i class="fa fa-check"></i> '.$response['status_message'].'</h4>
          <script>
          window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove(); 
            });
            window.location.href="'.base_url().'project/project_listing";
          }, 1000);
          </script>    
          ';
        } else {
          echo'<h4 class="w3-text-red w3-margin"><i class="fa fa-warning"></i> '.$response['status_message'].'</h4>
          <script>
          window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove(); 
            });
            window.location.href="'.base_url().'project/project_listing";
          }, 1000);
          </script>  
          ';
        }
      }
    // -----------------cloase project permanntly function---------------//
}//end of class