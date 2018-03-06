<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
 
 class freelance_list_model extends CI_model
 {
 	public function __construct()
 	{
 		parent::__construct();

 	}
 
 	public function get_freelancinglist()
 	{
			$query="SELECT * FROM jm_user_tab as user JOIN jm_userSkills_tab as u JOIN jm_userprofile_tab as pro JOIN jm_freelancer_rating_table as f ON u.jm_user_id=pro.jm_user_id AND u.jm_user_id=f.jm_freelancer_id AND u.jm_profile_type=pro.jm_profile_type WHERE u.jm_profile_type='1' ";
			//echo $query;die();
			
			$result=$this->db->query($query);
			if ($result->num_rows()<= 0) 
		   {
		    $response = array(                                             
		      'status' => 0,
		      'status_message' => 'No data Found.');                           
		  } else {
		    $response = array(
		      'status' => 1,
		      'status_message' => $result->result_array());
		  }
		  return $response;
	}
 	
 	
 	
 //----function to show freelasting list-------------//
// 	public function get_freelancinglist($user_id,$profile_type){
//
//		$query = "SELECT * FROM jm_user_tab WHERE jm_profile_type='1'";
//		//echo $query;die();
//		$result=$this->db->query($query); 
//		//print_r($result);die();
//		if ($result->num_rows() <= 0) {
//			$response = array(
//				'status' => 500,
//				'status_message' =>  'Not Found.');
//		} else {
////			$response = array(
////				'status' => 200,
////				'status_message' => $result->result_array());
////		}
////		return $response;
//			$user_skills=array();
//			$skill_details=array();
//			$user_skills=freelance_list_model::getUser_skill($user_id,$profile_type);
//			//print_r($user_skills);die();
//			foreach(json_decode($user_skills['status_message'][0]['jm_skills'],TRUE) as $key)
//			{
//				// foreach ($user_skills as $key) {
//			  //	$user_skills=json_decode($row['jm_skills'],TRUE);
//				$demo=freelance_list_model::get_skillName($key);
//				//print_r($demo);die();	
//				foreach ($demo['status_message'] as $skill) {
//
//					$extra=array(
//						'skill_id'	=>	$skill['jm_skill_id'],
//						'jm_skill_name'	=>	$skill['jm_skill_name'],
//					);
//					//print_r($extra);die();
//					$skill_details[]=$extra;
//				}
//			}
//		foreach ($result->result_array() as $row) {
//				$jm_username=$row['jm_username'];
//				$jm_user_descr=$row['jm_user_descr'];
//				$jm_project_cost=$row['jm_project_cost'];
//				$jm_project_completed=$row['jm_project_completed'];
//				$jm_rank=$row['jm_rank'];
//				}
//				$a=array();
//			$a=array(
//			'jm_username' =>$jm_username,
//			'jm_user_descr' =>$jm_user_descr,
//			'jm_project_cost' =>$jm_project_cost,
//			'jm_project_completed'=>$jm_project_completed,
//			'jm_rank' =>$jm_rank,
//			'jm_skill'=>json_encode($skill_details)
//			);
//			//print_r($skill_details);die();
//			$response = array(
//				'status' => 200,
//				'status_message' =>$a);
//		}
//	//	print_r($response);die();
//		return $response;
//	}
//----function to show freelasting list-------------//

     public function get_skillName($skill_id){

		$query = "SELECT * FROM jm_skills_tab WHERE jm_skill_id='$skill_id'";
		$result = $this->db->query($query);

		if ($result->num_rows() <= 0) {
			$response = array(
				'status' => 500,
				'status_message' => 'No Skills Record Found.');
		} else {
			
			$response = array(
				'status' => 200,
				'status_message' => $result->result_array());
		}
		return $response;
	}
 	
 	public function getUser_skill($user_id,$profile_type)
 	{
 		$query = "SELECT * FROM jm_userSkills_tab WHERE jm_user_id='$user_id' AND jm_profile_type='$profile_type'";
		//echo $query;die();
		$result=$this->db->query($query); 
		//print_r($result);die();
		if ($result->num_rows() <= 0) {
			$response = array(
				'status' => 500,
				'status_message' =>  'Not Found.');
		} else {
			$response = array(
				'status' => 200,
				'status_message' => $result->result_array());
		}
		return $response;
 	}
 	
		public function calculate_freelancing_rating()
 		{
 		$query="SELECT * FROM jm_user_tab where jm_user_id=1";
 		//$query="SELECT AVG(freelancer_rating) as AVG_rate FROM jm_project_list WHERE jm_freelancer_user_id=2";
    	$result=$this->db->query($query);  
		if ($result->num_rows() <= 0) 
		   {
		    $response = array(                                             
		      'status' => 0,
		      'status_message' => 'No data Found.');                           
		  } else {
		    $response = array(
		      'status' => 1,
		      'status_message' => $result->result_array());
		  }
		  return $response;
 	} 
 }
?>