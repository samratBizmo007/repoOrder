<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Project_listing_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model/Dashboard_model');
	}
	
	
//----------------function to show project list--------------------------------//
	public function project_post_model($data)
	{
		//echo '<pre>';print_r($data);exit;
		$user_id = $this->session->userdata('user_id');
		$profile_type=$this->session->userdata('profile_type');
		//echo '1';exit;

		$condi = '';
		if($user_id != '' && $profile_type == 4){
			if($data['jm_job_type']){
				$condi .= " jm_job_type = '".$data['jm_job_type']."' AND ";
			}
			$condi .= " jm_posted_user_id = '".$user_id."' AND 1=1";
			$query = "SELECT * FROM jm_project_list WHERE $condi ORDER BY jm_project_id DESC";
		}else{
			if(isset($data['jm_job_type'])){
				$condi .= " jm_job_type = '".$data['jm_job_type']."' AND ";
			}
			$condi .= " 1=1";
			$query = "SELECT * FROM jm_project_list WHERE $condi AND is_active = '1' ORDER BY jm_project_id DESC";
		}
		
		$result=$this->db->query($query);  
		if ($result->num_rows() <= 0) 
		{
			$response = array(                                             
				'status' => 0,
				'status_message' => 'No Project Found.');                           
		} else {
			$response = array(
				'status' => 1,
				'status_message' => $result->result_array());
		}
		 // print_r($result->result_array());die();
		return $response;
		 // print_r($response);die();
	}


	public function sort_job_type($jm_job_type)
	{
		$query = "SELECT *FROM jm_project_list WHERE jm_project_id= '$jm_job_type'";
		//echo $query;die();
		$result = $this->db->query($query);
		if($result->num_rows() <=0)
		{
			$response = array(
				'status' => 0,
				'status_message' =>'no projects found');
		}else{
			$response = array(
				'status' => 1,
				'status_message' => $result->result_array());

		}

		return $response;

	}//end of function


	public function filterProject($data){

		//echo '<pre>';print_r($data);die();
		//echo 'sujeet';exit;
		// ----------------------------project list filter---------------------------- //
		$p_cond='';
		if($data['mode']['mode'] == 'project_list'){
			//echo 'sujeet';exit;
			if($data['fileds']){
				foreach ($data['fileds'] as $k => $val) {
					$valArr = explode('/', $val);
					
					//echo "$k ".$valArr[1]." '".$valArr[0]."' AND ";echo '<br>';
					if($valArr[0] != ''){
						if($valArr[1] == 'LIKE'){
							$p_cond .= "$k ".$valArr[1]." '".$valArr[0]."%' AND ";
						}else{
							if($valArr[1]=='<'){
								if($valArr[0]=='100'){
									$p_cond .= " $k > ".$valArr[0]." ";
								}
								else{
									$p_cond .= " $k ".$valArr[1]." ".$valArr[0]."";
								}
							}
							else{
								//$p_cond .= "$k ".$valArr[1]." '".$valArr[0]."' AND ";

								if($k=='jm_job_type'){
									//echo $valArr[0];
									$p_cond .= " AND $k ".$valArr[1]." '".$valArr[0]."' ";
								}
								else{
									$p_cond .= "$k ".$valArr[1]." '".$valArr[0]."' AND ";
								}
							}
						}
						
					}
				}
//echo $p_cond;die();

				//echo $cond;exit;
				$query = "SELECT * FROM jm_project_list WHERE ($p_cond) AND is_active = '1' ORDER BY ".$data['order']['field']." ".$data['order']['order']." ";
				//echo $query;die();
				$q=$this->db->query($query);  
			}else{
				$err='N/A';
				return $err;
			}
		}
		// ----------------------------project list filter ends ---------------------------- //

		// ----------------------------freelancer list filter---------------------------- //
		if($data['mode']['mode'] == 'freelancer_list'){ 
			//echo 'sujeet';exit;
			$cond = "";
			$join_tabs='jm_user_tab as u join jm_userprofile_tab as ut on(ut.jm_user_id = u.jm_user_id)';
			$cond .= " u.jm_profile_type = '1' ";

			if($data['fileds']){
				//print_r($data);die();
				$count=1;
				foreach ($data['fileds'] as $k => $val) {

					$valArr = explode('/', $val);
					
					if($valArr[0] != ''){
						
						if($valArr[1] != 'LIKE'){
							$cond .= "AND us.".$k." ".$valArr[1]." '".$valArr[0]."' ";
							$join_tabs='jm_user_tab as u join jm_userSkills_tab as us join jm_userprofile_tab as ut on(u.jm_user_id = us.jm_user_id AND ut.jm_user_id = u.jm_user_id)';
						}else{
						if($count==1){
							$cond .= "AND (ut.".$k." ".$valArr[1]." '%".$valArr[0]."%'  ";
							$count++;
						}	
						else{
							$cond .= "OR ut.".$k." ".$valArr[1]." '%".$valArr[0]."%'  )";
						}						
							
						}						
					}

				}
				
				//echo $cond;exit;
				
				$query = "SELECT * FROM $join_tabs WHERE $cond ORDER BY u.jm_username ASC";
				//echo $query;die();
			//exit;
				$q=$this->db->query($query);  
				// $this->db->order_by('jm_project_id', 'DESC');
				// $q = $this->db->get($data['table']['table']);
			}else{
				$err='N/A';
				return $err;
			}
		}
		// ----------------------------freelancer list filter ends---------------------------- //
				
		if($q->num_rows() <=0)
		{	
			$err='N/A';
			return $err;
		}	
		else{
			return $q->result_array();
		}	
	}


	public function fetchProject($post){

		//echo '----'.$post.'-----';exit;

		$q = $this->db->select('*')->from('jm_project_list')
		->where("jm_project_title LIKE '$post%'")->order_by('jm_project_id', 'DESC')->get();
		if($q->num_rows() <=0)
		{	
			$err='N/A';
			return $err;
		}	
		else{
			return $q->result_array();
		}	
	}//end of function

	public function fetchProjectbyskill($post,$value){
		$query = "SELECT * FROM jm_project_list WHERE jm_project_skill REGEXP '$post' and jm_project_price < '$value' ORDER BY jm_project_id DESC";
		//echo $query;die();
		$result = $this->db->query($query);

		if($result->num_rows() <=0)
		{	
			$err='N/A';
			return $err;
		}	
		else{
			return $result->result_array();
		}	
		
	}//end of function

	public function serchby($data){

		$user_id = $this->session->userdata('user_id');
		$profile_type=$this->session->userdata('profile_type');
		if($data=='lastest'){
			$this->db->order_by('jm_project_id', 'DESC');
			if($user_id != '' && $profile_type == 4){
				$this->db->where('jm_posted_user_id',$user_id);	
			}
			$q = $this->db->get('jm_project_list');
		}//end of if
		if($data=='high'){
			if($user_id != '' && $profile_type == 4){
				$this->db->where('jm_posted_user_id',$user_id);	
			}
			$this->db->order_by('jm_project_price', 'DESC');
			$q = $this->db->get('jm_project_list');
		}//end of if
		if($data=='low'){
			if($user_id != '' && $profile_type == 4){
				$this->db->where('jm_posted_user_id',$user_id);	
			}
			$this->db->order_by('jm_project_price', 'ASC');
			$q = $this->db->get('jm_project_list');
		}//end of if
		//echo $this->db->last_query();exit;

		if($q->num_rows() <=0)
		{	
			$err='N/A';
			return $err;
		}	
		else{
			return $q->result_array();
		}	
	}//end of function

	public function serchjobtype($data){
		//print_r($data);die();
		if($data=='All'){
			$q = $this->db->get('jm_project_list');
		}
		else{
			$this->db->where('jm_job_type', $data); 
			$q = $this->db->get('jm_project_list');
		}		
		if($q->num_rows() <=0)
		{	
			$err='N/A';
			return $err;
		}	
		else{
			return $q->result_array();
		}	
	}//end of function 


	// -------------function to add bookmark----------//
	public function bookmark_project($user_id,$project_id){

        //sql query to get all user details (membership package)
		$sql = "SELECT * FROM jm_user_tab WHERE jm_user_id='$user_id'";
		$membership_package = '';
		$result = $this->db->query($sql);
		if ($result->num_rows() > 0) {
			foreach ($result->result_array() as $key){
				$membership_package = $key['membership_package'];

			}
		}
    // --------------fucntion ends here-----------------------

		//sql query to get all user skills
		$query="SELECT * FROM jm_userprofile_tab WHERE jm_user_id='$user_id'";
		//echo $query;die();
		$result = $this->db->query($query);

		$bookmarked=array();

	//if no record found for user
		if($result->num_rows() == 0){			
			
			$bookmarked[]=$project_id;
			$data = array(
				'jm_user_id' => $user_id,
				'jm_userBookmark' => json_encode($bookmarked)
			);
		//sql query to insert new user skill record if not available
			if($this->db->insert('jm_userprofile_tab', $data)){
				$response = array(
					'status' => 200,
					'status_message' => 'Bookmark added.');
			}
			else{
				$response = array(
					'status' => 500,
					'status_message' => 'Bookmark Addition failed.');
			}
			
		}
		else
		{
			foreach ($result->result_array() as $row) {
				$bookmarked=json_decode($row['jm_userBookmark'],TRUE);
			}
			//---------condition for check bookmark count for free membership--------//  
			$count=count($bookmarked);
			if($membership_package=='FREE' && $count>=15)
			{
				$response = array(
					'status' => 500,
					'status_message' => 'You are allowed to bookmark only 15 projects.<br>To bookmark more subscribe to <quote>Premium Membership Plan</quote>.<br> GoTo Dashboard->View Plans.');
				return $response;
				die();
			}
       // -----------end--------------------

			$bookmarked[]=$project_id;
			//print_r(json_encode($user_skills));die();
			$update_where = array('jm_user_id =' => $user_id);
			$data=array('jm_userBookmark'=>json_encode($bookmarked));
			$this->db->where($update_where);			

			if($this->db->update('jm_userprofile_tab',$data)){
				$response = array(
					'status' => 200,
					'status_message' => 'Bookmark list updated.');
			}
			else{
				$response = array(
					'status' => 500,
					'status_message' => 'Bookmark Updation failed.');
			}
		}
		return $response;
	}//end of function 
	//----------------fucntion ends---------------------//

	// -----------------------DELETE USER BOOKMARK NAME----------------------//
	//-------------------------------------------------------------//
	public function del_bookmark($user_id,$project_id){

		$query = "SELECT * FROM jm_userprofile_tab WHERE jm_user_id='$user_id'";
		$result = $this->db->query($query);

		if ($result->num_rows() <= 0) {
			$response = array(
				'status' => 500,
				'status_message' => 'Project not Found.');
		} else {
			$extra=array();
			foreach ($result->result_array() as $row) {
				$bookmarked=json_decode($row['jm_userBookmark'],TRUE);

				foreach ($bookmarked as $key) {
					//print_r($key);
					if ($key != $project_id) {						
						$extra[]=$key;
					}
				}
			}
			$update_where = array('jm_user_id =' => $user_id);
			$data=array('jm_userBookmark'=>json_encode($extra));
			$this->db->where($update_where);			

			if($this->db->update('jm_userprofile_tab',$data)){
				$response = array(
					'status' => 200,
					'status_message' => 'Bookmark Removed.');
			}						
		}
		return $response;
	}
	// -----------------------DELETE USER BOOKMARK NAME----------------------//
	//-------------------------------------------------------------//


	// -----------------------GET ALL USER INFO MODEL----------------------//
	//-------------------------------------------------------------//
	public function get_userDetails($user_id){
//---------------getting the country id by user id-----------------------------------//

		$SQL = "SELECT * FROM jm_userprofile_tab WHERE jm_user_id='$user_id'";
		$country_id = '';
		$res = $this->db->query($SQL);
		if ($res->num_rows() > 0) {
			foreach ($res->result_array() as $key){
				$country_id = $key['jm_userCountry'];
                        //print_r($key);die();
			}
		}
//---------------getting the country id by user id-----------------------------------//

//---------------getting the country name by country id-----------------------------------//
		$select = "SELECT * FROM countries WHERE id = '$country_id'";
                //echo $select;die();
		$countryname = '';
		$RESULT = $this->db->query($select);
		if ($RESULT->num_rows() > 0) {
			foreach ($RESULT->result_array() as $key){
				$countryname = $key['name'];
                        //print_r($key);die();
			}
		}
//---------------getting the country name by country id-----------------------------------//
//---------------getting the all the details of userprofile by user id-----------------------------------//
		$query = "SELECT * FROM jm_userprofile_tab WHERE jm_user_id='$user_id'";

		$result = $this->db->query($query);

		if ($result->num_rows() <= 0) {
			
			$response = array(
				'status' => 500,
				'status_message' => 'User Not Found.');
		} else {
			$response = array(
				'status' => 200,
				'status_message' => $result->result_array(),
				'country' => $countryname);
		}
		return $response;
	}
	// -----------------------GET ALL USER INFO MODEL----------------------//
	//-------------------------------------------------------------//

    //-------------------------------------------------------------//
    //this method will provide theinformation if the user can bid or view the project
	public function get_userAvailableBidsViews($user_id){

		$userTypeQuery="select jm_profile_type from jm_user_tab where jm_user_id='$user_id'";

		$userTypeResult=$this->db->query($userTypeQuery);

		$coloumnName = "avail_bids";

		foreach ($result->result_array() as $row) {
			if( $row['jm_profil_type']=='1')
			{
               //user is a Freelancer
				$coloumnName = "avail_bids";

			}else if($row['jm_profil_type']=='3')
			{
                //user is a Job Seeker
				$coloumnName = "avail_views";

			}
		}
		$query = "SELECT * FROM jm_user_tab WHERE jm_user_id='$user_id' AND ".$coloumnName."> 0";

		$result = $this->db->query($query);

		if ($result->num_rows() <= 0) {
			
			$response = array(
				'status' => 500,
				'status_message' => 'You have exceded the available limit');
		} else {
			$response = array(
				'status' => 200,
				'status_message' => $result->result_array());
		}
		return $response;
	}

    //this method will return if the user can bookmark the project or has exceeded the limit
	public function get_userAvailableBsookmarks($user_id){

		$userTypeQuery="select jm_profile_type from jm_user_tab where jm_user_id='$user_id'";

		$userTypeResult=$this->db->query($userTypeQuery);

		$coloumnName = "jm_userBookmark";

		foreach ($result->result_array() as $row) {
			if( $row['jm_profil_type']=='1')
			{
               //user is a Freelancer
				$coloumnName = "jm_userBookmark";

			}else if($row['jm_profil_type']=='3')
			{
                //user is a Job Seeker
				$coloumnName = "jm_jobBookmark";

			}
		}
		$query = "SELECT ".$coloumnName." FROM jm_userprofile_tab WHERE jm_user_id='$user_id'";

		$result = $this->db->query($query);

		foreach ($result->result_array() as $row) {
			$bookmarkCount = count(json_decode($row[$coloumnName],true));
		}

		if ($bookmarkCount <= 0) {
			
			$response = array(
				'status' => 500,
				'status_message' => 'You have exceded the available bookmark limit');
		} else {
			$response = array(
				'status' => 200,
				'status_message' => $result->result_array());
		}
		return $response;
	}
	// -----------------------GET ALL USER INFO MODEL----------------------//

	//--------------function for show bookmark project-----------------//

	public function show_bookmark_project($user_id)
	{
		$query="SELECT * FROM jm_userprofile_tab WHERE jm_user_id='$user_id'";
		//echo $query;die();
		$result = $this->db->query($query);
		if($result->num_rows() <=0)
		{
			$response = array(
				'status' => 500,
				'status_message' =>'no user found');
		}else{
			$response = array(
				'status' => 200,
				'status_message' => $result->result_array());

		}

		return $response;

	}
	//-----------------end function-------------------------------------//
	public function FetchSkills($Skills) {
        //print_r($Skills);die();
		foreach (json_decode($Skills, TRUE) as $key) {
			$demo = $this->Dashboard_model->get_skillName($key);
			foreach ($demo['status_message'] as $skill) {
				$extra = array(
					'jm_skill_name' => $skill['jm_skill_name'],
				);
				$skill_details[] = $extra;
			}
		}
		return $skill_details;
	}
        public function Get_Skills($Skills){
                foreach (json_decode($Skills, TRUE) as $key) {
			$demo = $this->Dashboard_model->get_skillName($key);
			foreach ($demo['status_message'] as $skill) {
				$extra = array(
					'jm_skill_name' => $skill['jm_skill_name'],
				);
				$skill_details[] = $extra;
			}
		}
		return $skill_details;
        }

        public function getprojectlist($jm_project_id)
	{
		$query="SELECT *FROM jm_project_list WHERE jm_project_id='$jm_project_id' AND is_active='1' ";
		$result = $this->db->query($query);
		if($result->num_rows() <=0)
		{
			$response = array(
				'status'=>500,
				'status_message' =>'no projects found');
		}else{
			$response = array(
				'status' => 200,
				'status_message' => $result->result_array());

		}

		return $response;
	}
	
}//end of class