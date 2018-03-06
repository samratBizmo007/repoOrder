<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(E_ERROR | E_PARSE);
class Project_listing extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->view('pages/helper/helper');
    $this->load->model('dashboard_model/dashboard_model');
	}

	public function index()
	{
    //echo 'sujeet';

  $user_id = $this->session->userdata('user_id');
  $this->load->database();
  $this->load->model('project_model/project_listing_model');
  $data['info']=$this->project_listing_model->project_post_model();
  // print_r($data);die();
  $data['all_skills']=Project_listing::get_allSkills();
  $data['user_details']=Project_listing::get_userDetails();
  $this->load->view('includes/header.php');
  $this->load->view('pages/project/project_listing.php',$data);
  $this->load->view('includes/footer.php',$data);
 }

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
  print_r($response_json);
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
  print_r($response_json);
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
    $user_id=$this->session->userdata('user_id');   
    $user_details=Project_listing::get_userDetails();
    $userBookmark=array();
    if($user_details['status']==200){
      $userBookmark=json_decode($user_details['status_message'][0]['jm_userBookmark'],TRUE);
    } 
    $result['result'] = $this->project->filterProject($data);
    //echo '<pre>';print_r($result);exit;
    if($result['result'] == 'N/A'){
      echo '
      <div class="w3-col 12 w3-padding w3-margin">              
      <div class="w3-col l12">
      <div class="w3-center">
      <img src="'.base_url().'images/desktop/NoResultsImage.jpg" width="auto" class="img"/>
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




  public function filterProject1(){
    $this->load->model('project_model/Project_listing_model','project');
    $data = $this->input->post();
    $user_id=$this->session->userdata('user_id');    
    $po = $this->project->filterProject($data);

    



    //$data="";
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

        if($userBookmark){
          if(in_array($key['jm_project_id'], $userBookmark)){
            $class="fa-bookmark";
            $title="Bookmarked";
          }
        }
       
        if($data['mode']['mode'] == 'project_list'){
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
        }elseif ($data['mode']['mode'] == 'freelancer_list') { ?>
         <?php $i=1;  ?>
      <div class="col-md-12 w3-padding w3-border-bottom">
        <div class="col-md-3 ">
        <div class="span1">
           <img class="img-circle w3-padding" width="100" src="<?php echo base_url().$key['jm_profile_image'] ?>?sz=100" alt="User Pic">
        </div>
      </div>
    <div class="col-md-7">
      <div class="span10">
        <strong><?php echo $key['jm_user_name']; ?></strong><br>
        <span class="text-muted">Location: <?php echo $key['jm_userCity']; ?>, <?php echo $key['jm_userState']; ?>, <?php echo $key['jm_userCountry']; ?></span>
      </div>
    </div>
    <div class="col-md-2">
      <div class="span1 dropdown-user" data-for=".cyruxx-<?php echo $i ?>">
      Expand
      </div>
    </div>

    <div class="col-md-12 w3-border-right" id="showResult">
      <div class="row-fluid user-infos cyruxx-<?php echo $i ?>">
        <div class="span10 offset1">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Information</h3>
            </div>
            <div class="panel-body">
              <div class="row-fluid">
                
                <div class="span6">
                  <table class="table table-condensed table-responsive table-user-information">
                    <tbody>
                      <tr>
                        <td>Email </td>
                        <td><?php echo $key['jm_email_id']; ?></td>
                      </tr>
                      <tr>
                        <td>Designation </td>
                        <td><?php echo $key['jm_userDesignation']; ?></td>
                      </tr>
                      <tr>
                        <td>Skill </td>
                        <td><?php $path = base_url();
                        $url = $path . 'api/JobListing_api/FetchSkills?Skills=' . $key['jm_skills'];
                        $ch = curl_init($url);
                        curl_setopt($ch, CURLOPT_HTTPGET, true);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $response_json = curl_exec($ch);
                        curl_close($ch);
                        $response = json_decode($response_json, true);
                        //print_r($response);
                        if($response){
                          foreach ($response as $val) { ?>
                          <p><?php echo $val['jm_skill_name']; ?>,</p>
                        <?php  }
                        }
                         ?></td>
                      </tr>
                      <tr>
                        <td>Education</td>
                        <td><?php 
                        $asd = json_decode($key['jm_education']);
                        if($asd){
                          foreach ($asd as $val) { ?>
                            <p><?php echo $val->jm_course ?>, <?php echo $val->jm_university ?>, <?php echo $val->jm_passing_year ?></p>
                          <?php  }
                        }
                         ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Experience</td>
                        <td><?php 
                        $asd = json_decode($key['jm_experience']);
                        if($asd){
                          foreach ($asd as $val) { ?>
                            <p><?php echo $val->jm_designation ?>, <?php echo $val->jm_organisation ?>, <?php echo $val->jm_worked_till ?></p>
                          <?php  }
                        }
                         ?></td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>             
    </div>
  </div>
  <?php $i++;  ?>

      
        <?php }elseif ($data['mode']['mode'] == 'job_list') {
          
        }
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
}//end of class