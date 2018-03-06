<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends CI_Model{

	public function __construct() {
		parent::__construct();
    //$this->load->model('search_model');
	}

	// ----------------ADD PORTFOLIO DATA----------------------//
	public function add_portfolio($data){
		extract($data);

		$query = "INSERT INTO jm_portfolio_data(jm_user_id,jm_profile_type,jm_portfolio_file,jm_portfolio_details)
		VALUES('$user_id','$profile_type','$file','$jm_portfolio_details')";
		//echo $query;die();
		if($this->db->query($query)) {
			$response = array(
				'status' => 200,
				'status_message' => 'Portfolio added successfully.');
		} else {
			$response = array(
				'status' => 500,
				'status_message' => 'Portfolio addition failed.');
		}
		return $response;
	}
	// --------------------ADD PORTFOLIO ENDS---------------------//
        public function getBars_PercentageValue($user_id){
            	
			  $percentage_budget = Profile_model::get_budget($user_id);
			  $percentage_time = Profile_model::get_bar_Time($user_id);
			  $percentage =Profile_model::get_projects_completed($user_id);
		
			  $a=array();
			  $a=array(
			  'percentage'=>$percentage,
			  'percentage_budget'=>$percentage_budget,
			  'percentage_time'=>$percentage_time			  
			  );
			  return $a;
				
        }
        //-------------function for 3 bar rating for budget-------------------------//
	
    public function get_budget($user_id) {
        $count_money = '';
        $query = "SELECT SUM(jm_valueformoney) as sum FROM `jm_freelancer_rating_table` where jm_freelancer_id = '$user_id'";
        $queryNew = "SELECT * FROM `jm_freelancer_rating_table` where jm_freelancer_id = '$user_id'";
        //echo $queryNew;
        //echo $query;die();
        $result = $this->db->query($query);
        $result_new = $this->db->query($queryNew);
        $num_rows_total = $result_new->num_rows();
     			
        foreach ($result->result_array() as $key) {
            $count_money = $key['sum'];
        }
        $Final_count = '';
        $Final_count = ($num_rows_total * 5);
        if ($num_rows_total == 0 || $Final_count == 0) {
            $percentage_budget = 0;
        } else {
            $percentage_budget = (($count_money / $Final_count) * 100);
        }
        return $percentage_budget;
    }
    //---------------------function end------------------------------------------// 		
	//---------------------function for 3 bar rating for time----------------------//	
	//----------------function end----------------------------------//			
     public function get_bar_Time($user_id) {

        $count_delivery = '';
        $query = "SELECT SUM(jm_ontimedelivery) as sum FROM `jm_freelancer_rating_table` where jm_freelancer_id = '$user_id'";
        $queryNew = "SELECT * FROM `jm_freelancer_rating_table` where jm_freelancer_id = '$user_id'";
        $time = $this->db->query($query);
        $count_time = $this->db->query($queryNew);
        $num_rows_total = $count_time->num_rows();

        foreach ($time->result_array() as $key) {
            $count_delivery = $key['sum'];
        }
        $Final_count = '';
        $Final_count = ($num_rows_total * 5);
        if ($num_rows_total == 0 || $Final_count == 0) {
            $percentage_time = 0;
            //echo "IN IF".$percentage;
        } else {
            $percentage_time = (($count_delivery / $Final_count) * 100);
        }
        return $percentage_time;
    }

    public function get_projects_completed($user_id) {

        $query = "SELECT * FROM jm_project_list where is_active != '1' AND jm_freelancer_user_id='$user_id'";
        $queryNew = "SELECT * FROM jm_project_list where is_active= '0' AND jm_freelancer_user_id='$user_id'";
        //echo $queryNew;die();
        $total = $this->db->query($query);
        //print_r($total);die();
        $completed = $this->db->query($queryNew);
        //print_r($completed);die();
        $num_rows_total = $total->num_rows();
        $num_rows_completed = $completed->num_rows();
        //print_r($num_rows_completed);die();e;
        if ($num_rows_total == 0 || $num_rows_completed == 0) {
            $percentage = 0;
//				echo "IN IF".$percentage;
        } else {
            $percentage = (($num_rows_completed / $num_rows_total) * 100);
//				echo "IN ELSE".$percentage;
        }

        return $percentage;
    }

    // -----------------------GET ALL SKILLS MODEL----------------------//
	//-------------------------------------------------------------//
	public function get_allSkills(){

		$query = "SELECT * FROM jm_skills_tab ORDER BY jm_skill_name";

		$result = $this->db->query($query);

		if ($result->num_rows() <= 0) {
			$response = array(
				'status' => 500,
				'status_message' => 'No Skills Found.');
		} else {
			$response = array(
				'status' => 200,
				'status_message' => $result->result_array());
		}
		return $response;
	}
	// -----------------------GET ALL SKILLS MODEL----------------------//
	//-------------------------------------------------------------//

	// -----------------------GET ALL SKILLS MODEL----------------------//
	//-------------------------------------------------------------//
	public function get_userInfo($user_id){

		$query = "SELECT * FROM jm_user_tab WHERE jm_user_id='$user_id'";

		$result = $this->db->query($query);

		if ($result->num_rows() <= 0) {
			
			$response = array(
				'status' => 500,
				'status_message' => 'User Info Not Found.');
		} else {
			$response = array(
				'status' => 200,
				'status_message' => $result->result_array());
		}
		return $response;
	}
	// -----------------------GET ALL SKILLS MODEL----------------------//
	//-------------------------------------------------------------//

	// -----------------------GET ALL USER TRANSACTION MODEL----------------------//
	//-------------------------------------------------------------//
	public function get_userTransaction($user_id){

		$query = "SELECT * FROM jm_usertransaction_tab WHERE jm_user_id='$user_id'";

		$result = $this->db->query($query);

		if ($result->num_rows() <= 0) {
			$response = array(
				'status' => 500,
				'status_message' => 'No Financial Record found for this user.');
		} else {
			$response = array(
				'status' => 200,
				'status_message' => $result->result_array());
		}
		return $response;
	}
	// -----------------------GET ALL USER TRANSACTION MODEL----------------------//
	//-------------------------------------------------------------//

	// -----------------------GET ALL USER SKILLS MODEL----------------------//
	//-------------------------------------------------------------//
	public function get_userSkills($user_id,$profile_type){

		$query = "SELECT * FROM jm_userSkills_tab WHERE jm_user_id='$user_id' AND jm_profile_type='$profile_type'";
		//echo $query;die();
		$result = $this->db->query($query);

		if ($result->num_rows() <= 0) {
			$response = array(
				'status' => 500,
				'status_message' => 'No Skills Added yet.');
		} else {
			$user_skills=array();
			$skill_details=array();
			foreach ($result->result_array() as $row) {
				$user_skills=json_decode($row['jm_skills'],TRUE);
			}
				//print_r($user_skills);die();
			foreach ($user_skills as $key) {
				//print_r($key);
				$demo=Dashboard_model::get_skillName($key);	
				foreach ($demo['status_message'] as $skill) {

					$extra=array(
						'skill_id'	=>	$skill['jm_skill_id'],
						'jm_skill_name'	=>	$skill['jm_skill_name'],
					);
					$skill_details[]=$extra;
				}
			}
			//print_r($skill_details);die();
			$response = array(
				'status' => 200,
				'status_message' => $skill_details);
		}
		return $response;
	}
	// -----------------------GET ALL USER SKILLS MODEL----------------------//
	//-----------------------------------------------------------------------//

	// -----------------------GET ALL USER PORTFOLIO MODEL----------------------//
	//-------------------------------------------------------------//
	public function get_userPortfolio($user_id,$profile_type){

		$query = "SELECT * FROM jm_portfolio_data WHERE jm_user_id='$user_id' AND jm_profile_type='$profile_type'";
		//echo $query;die();
		$result = $this->db->query($query);

		if ($result->num_rows() <= 0) {
			$response = array(
				'status' => 500,
				'status_message' => 'No Portfolio found for this profile.');
		} else {
			//print_r($skill_details);die();
			$response = array(
				'status' => 200,
				'status_message' => $result->result_array());
		}
		return $response;
	}
	// -----------------------GET ALL USER PORTFOLIO MODEL----------------------//
	//-----------------------------------------------------------------------//

	// -----------------------DELETE PORTFOLIO MODEL----------------------//
	//-------------------------------------------------------------//
	public function del_portfolio($portfolio_id){

		$sqldelete = "DELETE FROM jm_portfolio_data WHERE jm_portfolio_id = '$portfolio_id'";
        $resultdelete = $this->db->query($sqldelete);

        if ($resultdelete) {
            $response = array(
                'status' => 200,
                'status_message' => 'Records Deleted Successfully..!');
        } else {
            $response = array(
                'status' => 500,
                'status_message' => 'Records Not Deleted Successfully...!');
        }

        return $response;
	}
	// -----------------------DELETE PORTFOLIO MODEL----------------------//
	//-----------------------------------------------------------------------//

	// -----------------------GET ALL USER FEEDBACK MODEL----------------------//
	//-------------------------------------------------------------//
	public function get_userFeedback($user_id,$profile_type){

		if($profile_type=='1'){
			$query="SELECT * FROM jm_project_list WHERE jm_freelancer_user_id='$user_id'  AND freelancer_comment !=''";
		}
		else{
			$query = "SELECT * FROM jm_project_list WHERE jm_posted_user_id='$user_id' AND jm_posted_profile_id='$profile_type'  AND employer_comment !=''";
		}
		//echo $query;die();
		$result = $this->db->query($query);

		if ($result->num_rows() <= 0) {
			$response = array(
				'status' => 500,
				'status_message' => 'Your project List is empty.');
		} else {			
			$response = array(
				'status' => 200,
				'status_message' => $result->result_array());
		}
		return $response;
	}
	// -----------------------GET ALL USER FEEDBACK MODEL----------------------//
	//-----------------------------------------------------------------------//

	// -----------------------GET ALL USER SKILLS NAME----------------------//
	//-------------------------------------------------------------//
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
	// -----------------------GET ALL USER SKILLS NAME----------------------//
	//-------------------------------------------------------------//

	// -----------------------DELETE USER SKILLS NAME----------------------//
	//-------------------------------------------------------------//
	public function del_userSkill($user_id,$skill_id,$profile_type){

		$query = "SELECT * FROM jm_userSkills_tab WHERE jm_user_id='$user_id' AND jm_profile_type='$profile_type'";
		$result = $this->db->query($query);

		if ($result->num_rows() <= 0) {
			$response = array(
				'status' => 500,
				'status_message' => 'No Skills Record Found.');
		} else {
			$extra=array();
			foreach ($result->result_array() as $row) {
				$user_skills=json_decode($row['jm_skills'],TRUE);

				foreach ($user_skills as $key) {
					//print_r($key);
					if ($key != $skill_id) {						
						$extra[]=$key;
					}
				}
			}
			$update_where = array('jm_user_id =' => $user_id, 'jm_profile_type =' => $profile_type);
			$data=array('jm_skills'=>json_encode($extra));
			$this->db->where($update_where);			

			if($this->db->update('jm_userSkills_tab',$data)){
				$response = array(
					'status' => 200,
					'status_message' => 'Skill Deleted.');
			}						
		}
		return $response;
	}
	// -----------------------DELETE USER SKILLS NAME----------------------//
	//-------------------------------------------------------------//


	// -----------------------USER SKILL MODEL----------------------//
	//-------------------------------------------------------------//
	public function add_userSkills($user_id,$skill_id,$profile_type)
	{

	//sql query to get all user skills
		$query="SELECT * FROM jm_userSkills_tab WHERE jm_user_id='$user_id' AND jm_profile_type='$profile_type'";
		$result = $this->db->query($query);

		$user_skills=array();

	//if no record found for user
		if($result->num_rows() == 0){			
			
			$user_skills[]=$skill_id;
			$data = array(
				'jm_user_id' => $user_id,
				'jm_profile_type' => $profile_type,
				'jm_skills' => json_encode($user_skills)
			);
		//sql query to insert new user skill record if not available
			if($this->db->insert('jm_userSkills_tab', $data)){
				$response = array(
					'status' => 200,
					'status_message' => 'Skill added.');
			}
			else{
				$response = array(
					'status' => 500,
					'status_message' => 'Skill Addition failed.');
			}
			
		}
		else
		{
			//$user_skill='';
			foreach ($result->result_array() as $row) {
				$user_skills=json_decode($row['jm_skills'],TRUE);
			}
			$user_skills[]=$skill_id;
			//print_r(json_encode($user_skills));die();
			$update_where = array('jm_user_id =' => $user_id, 'jm_profile_type =' => $profile_type);
			$data=array('jm_skills'=>json_encode($user_skills));
			$this->db->where($update_where);			

			if($this->db->update('jm_userSkills_tab',$data)){
				$response = array(
					'status' => 200,
					'status_message' => 'Skills list updated.');
			}
			else{
				$response = array(
					'status' => 500,
					'status_message' => 'Skills Updation failed.');
			}
		}
		return $response;
	}

	//----------------------------USER SKILLS END------------------------------//


	//-----------------------function to check whether privilege level already exists------------------//
	function checkPrivilege_exist($privilege_level)
	{
		$query = null;
		$query = $this->db->get_where('roles', array(
			'privilege_level' => $privilege_level
		));		

		if ($query->num_rows() > 0) {
			return 0;			
		} else {
			return 1;			
		}
	}
//-----------------------------------function end---------------------------------------//

	//-----------------function for 3 bar rating for job completed-------------------------//
	
		public function get_bars_value($user_id,$profile_type)
		{
			
			  $percentage_budget = Profile_model::get_bar_onbudget($user_id,$profile_type);
			  $percentage_time = Profile_model::get_bar_onTime($user_id,$profile_type);
			  $percentage =Profile_model::get_project_completed($user_id,$profile_type);
			 // print_r($percentage_budget);die();
			 // $percentage='';
			 // $percentage_budget='';
			 // $percentage_time='';
			  $a=array();
			  $a=array(
			  'percentage'=>$percentage,
			  'percentage_budget'=>$percentage_budget,
			  'percentage_time'=>$percentage_time
			  
			  );
			  return $a;
		    // print_r($a);die();
			//echo $query;die();
			
			
			
		}
	//-----------function end---------------------------------------//
	
	//-------------function for 3 bar rating for budget-------------------------//
	
        public function get_bar_onbudget($user_id, $profile_type) {
        if ($profile_type == '1') {
            $count_money = '';
            $query = "SELECT SUM(jm_valueformoney) as sum FROM `jm_freelancer_rating_table` where jm_freelancer_id = '$user_id'";
            $queryNew = "SELECT * FROM `jm_freelancer_rating_table` where jm_freelancer_id = '$user_id'";
            //echo $queryNew;
            $result = $this->db->query($query);
            $result_new = $this->db->query($queryNew);
            $num_rows_total = $result_new->num_rows();
            //$num_rows_count=$result_new->num_rows();
            //$Final_count=($num_rows_count*5);

            foreach ($result->result_array() as $key) {
                $count_money = $key['sum'];
            }

            $Final_count = '';
            $Final_count = ($num_rows_total * 5);
            if ($num_rows_total == 0 || $Final_count == 0) {
                $percentage_budget = 0;
                //echo "IN IF".$percentage_budget;
            } else {
                //$Final_count=($count_money*5);
                $percentage_budget = (($count_money / $Final_count) * 100);
                //echo "IN ELSE".$percentage_budget;
            }
        } elseif ($profile_type == '2') {
            $count_payment = '';
            $query = "SELECT SUM(jm_payment_prompt) as sum FROM `jm_employer_rating_table` WHERE jm_employer_id ='$user_id'";
            $queryNew = "SELECT * FROM `jm_employer_rating_table` WHERE jm_employer_id ='$user_id'";
            $result = $this->db->query($query);
            $result_new = $this->db->query($queryNew);
            $num_rows_total = $result_new->num_rows();
            foreach ($result->result_array() as $key) {
                $count_payment = $key['sum'];
            }
            $Final_count = ($num_rows_total * 5);
            if ($num_rows_total == 0 || $Final_count == 0) {
                $percentage_budget = 0;
            } else {
                $percentage_budget = (($count_payment / $Final_count) * 100);
            }
        }
        return $percentage_budget;
    }

    //---------------------function end------------------------------------------// 
		
	//---------------------function for 3 bar rating for time----------------------//
	
	//----------------function end----------------------------------//	
		
        public function get_bar_onTime($user_id, $profile_type) {
        if ($profile_type == '1') {
            $count_delivery = '';
            $query = "SELECT SUM(jm_ontimedelivery) as sum FROM `jm_freelancer_rating_table` where jm_freelancer_id = '$user_id'";
            $queryNew = "SELECT * FROM `jm_freelancer_rating_table` where jm_freelancer_id = '$user_id'";
            $time = $this->db->query($query);
            $count_time = $this->db->query($queryNew);
            $num_rows_total = $count_time->num_rows();

            foreach ($time->result_array() as $key) {
                $count_delivery = $key['sum'];
            }
            $Final_count = '';
            $Final_count = ($num_rows_total * 5);
            if ($num_rows_total == 0 || $Final_count == 0) {
                $percentage_time = 0;
            } else {
                $percentage_time = (($count_delivery / $Final_count) * 100);
            }
        } elseif ($profile_type == '2') {
            $count_requirements = '';
            $query = "SELECT SUM(jm_acc_of_requirement) as sum FROM `jm_employer_rating_table` WHERE jm_employer_id = '$user_id'";

            $queryCount = "SELECT * FROM `jm_employer_rating_table` WHERE jm_employer_id = '$user_id'";
            $result_new = $this->db->query($query);
            $result_Count = $this->db->query($queryCount);
            $num_rows_total = $result_Count->num_rows();
            foreach ($result_new->result_array() as $key) {
                $count_requirements = $key['sum'];
            }

            $Final_count = '';
            if ($num_rows_total == 0 || $count_requirements == 0) {
                $percentage_time = 0;
//				echo "IN IF".$percentage;
            } else {
                $Final_count = ($num_rows_total * 5);
                $percentage_time = (($count_requirements / $Final_count) * 100);
            }
        }
        return $percentage_time;
    }

    public function get_project_completed($user_id,$profile_type)
		{
			if($profile_type=='1')
			{
			$query = "SELECT * FROM jm_project_list where is_active != '1' AND jm_freelancer_user_id='$user_id'";
			$queryNew = "SELECT * FROM jm_project_list where is_active= '0' AND jm_freelancer_user_id='$user_id'";
			$total = $this->db->query($query);
			$completed = $this->db->query($queryNew);
			$num_rows_total=$total->num_rows();
			$num_rows_completed=$completed->num_rows();
			if($num_rows_total== 0 || $num_rows_completed==0 ){
				$percentage = 0;
			}
			else{
				$percentage=(($num_rows_completed/$num_rows_total)*100);
			}
			}
			elseif($profile_type=='2')
			{
			$query = "SELECT * FROM jm_project_list where jm_posted_user_id='$user_id'";
			   $queryNew = "SELECT * FROM jm_project_list where is_active= '0' AND jm_posted_user_id='$user_id'";
			   $total = $this->db->query($query);
			   $completed = $this->db->query($queryNew);
			   $num_rows_total=$total->num_rows();
			   $num_rows_completed=$completed->num_rows();
			if($num_rows_total== 0 || $num_rows_completed==0 ){
				$percentage = 0;
			}
			else{
				$percentage=(($num_rows_completed/$num_rows_total)*100);
			}	
			}
		 return $percentage;
		
		}
			
}
?>