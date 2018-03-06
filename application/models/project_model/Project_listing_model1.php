<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Project_listing_model extends CI_Model
{

//----------------function to show project list--------------------------------//
	public function project_post_model()
	{
		$query = "SELECT * FROM jm_project_list ";
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
				'status_message' =>'no jobs found');
		}else{
			$response = array(
				'status' => 1,
				'status_message' => $result->result_array());

		}

		return $response;

	}
}