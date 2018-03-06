<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model{

	public function __construct() {
		parent::__construct();
    //$this->load->model('search_model');
	}
    public function get_job($job_id)
    {
      $query="SELECT *FROM jm_post_job WHERE jm_jobpost_id='$job_id' AND is_active='1' ";
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
 public function show_BookmarkedJobs($user_id){
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

        //-------this fun is used to get the feed back of freelancer and freelancer employer------------//
 public function getTestomonials($user_id,$profile_type){
    
    if ($profile_type == 1) {
        $sqlSelect = "SELECT * FROM jm_freelancer_rating_table WHERE jm_freelancer_id= '$user_id' AND jm_feedback_comment != ''";
            //echo $sqlSelect;die();
        $result = $this->db->query($sqlSelect);
        $Emp_id = '';
        $username = '';
        $designation = '';
        $comments = '';
        $UserImage = '';
        $arr = '';
        $val = '';
        $extra = array();
        if ($result->num_rows() <= 0) {
            $response = array(
                'status' => 500,
                'status_message' => 'No Record Found.');
        } else {

            foreach ($result->result_array() as $row) {
                    $Emp_id = $row['jm_emp_id'];  //---getting the employ ids
                    $comments = $row['jm_feedback_comment'];  //----getting the comments of freelancer employer
                    //$arr[] = $comments;
//----------------get the infor of freelancer employer from user profile table-------------------//

                    $SELECT = "SELECT * FROM jm_userprofile_tab WHERE jm_user_id = '$Emp_id'";
                    $output = $this->db->query($SELECT);

                    foreach ($output->result_array() as $row) {
                        $designation = $row['jm_userDesignation'];
                        $UserImage = $row['jm_profile_image'];
                        $username = $row['jm_user_name'];
                    }

                    $extra[] = array(
                        'designation' => $designation,
                        'UserImage' => $UserImage,
                        'username' => $username,
                        'comments' => $comments
                    );
                }
//----------------get the infor of freelancer employer from user profile table-------------------//

                $response = array(
                    'status' => 200,
                    'status_message' => $extra);
            }
            //-------if profile type == freelancer employer then the feedbacks of freelancer employer comments are here------//
        } elseif ($profile_type == 2) {
            $sqlSelect = "SELECT * FROM jm_employer_rating_table WHERE jm_employer_id= '$user_id' AND jm_feedback_comment != ''";
            //echo $sqlSelect;die();
            $result = $this->db->query($sqlSelect);
            $Emp_id = '';
            $username = '';
            $designation = '';
            $comments = '';
            $UserImage = '';
            $arr = '';
            $val = '';
            $extra = array();
            if ($result->num_rows() <= 0) {
                $response = array(
                    'status' => 500,
                    'status_message' => 'No Record Found.');
            } else {

                foreach ($result->result_array() as $row) {
                    $Freelance_id = $row['jm_freelance_id']; //----getting the frrelance ids
                    $comments = $row['jm_feedback_comment']; //---getting the freelancer comments by the freelancer 
                    //$arr[] = $comments;
//----------------get the infor of freelancer from user profile table-------------------//
                    $SELECT = "SELECT * FROM jm_userprofile_tab WHERE jm_user_id = '$Freelance_id'";
                    $output = $this->db->query($SELECT);

                    foreach ($output->result_array() as $row) {
                        $designation = $row['jm_userDesignation'];
                        $UserImage = $row['jm_profile_image'];
                        $username = $row['jm_user_name'];
                    }

                    $extra[] = array(
                        'designation' => $designation,
                        'UserImage' => $UserImage,
                        'username' => $username,
                        'comments' => $comments
                    );
                }
//----------------get the infor of freelancer from user profile table-------------------//

                $response = array(
                    'status' => 200,
                    'status_message' => $extra);
            }
        }
        return $response;
    }

    //-------this fun is used to get the feed back of freelancer and freelancer employer------------//

        //------------this fun is used to get freelancer Average ratings------------------------//
    public function getAverageRatingsOf_Freelancer($user_id){
        $sql = "SELECT AVG(jm_communication) as communication,"
        . "AVG(jm_ontimedelivery) as delivery,"
        . "AVG(jm_valueformoney) as money,"
        . "AVG(jm_expertise) as expert,"
        . "AVG(jm_hire_again) as hire,"
        . "jm_project_id,jm_emp_id FROM jm_freelancer_rating_table "
        . "WHERE jm_freelancer_id ='$user_id'";
//echo $sql;die();
        $result = $this->db->query($sql);
        if ($result->num_rows() > 0) {
         $response = array(
            'status' => 200,
            'status_message' => $result->result_array());
     } else {
         $response = array(
            'status' => 500,
            'status_message' => 'Ratings Not Found.');
     }
     return $response; 
     
 }

        //------------this fun is used to get freelancer Average ratings------------------------//
       //--------this fun is used to get the frelancer employer average ratings-----------//

 public function getAverageRatingsOf_FreelancEmployer($user_id){
   $sql = "SELECT AVG(jm_communication) as communicationemployer,"
   . "AVG(jm_payment_prompt) as payment,"
   . "AVG(jm_acc_of_requirement) as requirements,"
   . "AVG(jm_work_again) as working,"
   . "jm_project_id,jm_freelance_id FROM jm_employer_rating_table "
   . "WHERE jm_employer_id='$user_id'";
   $result = $this->db->query($sql);
   if ($result->num_rows() > 0) {
     $response = array(
        'status' => 200,
        'status_message' => $result->result_array());
 } else {
     $response = array(
        'status' => 500,
        'status_message' => 'Ratings Not Found.');
 }
 return $response;            
}
        //--------this fun is used to get the frelancer employer average ratings-----------//
public function getAppliedJobs_ByUser($user_id) {
  $sqlSelect = "SELECT * FROM jm_applied_candidates as can JOIN jm_post_job as job ON (can.jm_job_id = job.jm_jobpost_id) WHERE can.jm_applieduser_id ='$user_id' AND job.is_active = '1' ORDER BY job.jm_jobpost_id DESC";
  $result = $this->db->query($sqlSelect);
  if ($result->num_rows() > 0) {
     $response = array(
        'status' => 200,
        'status_message' => $result->result_array());
 } else {
     $response = array(
        'status' => 500,
        'status_message' => 'No Skills Found.');
 }
 return $response;
}
        //------------this fun is used to get the the applied jobs------------------------//
    //------------this fun is used to get the the previous jobs------------------------//
public function getPostedJobs_ByUser($user_id) {
    $sqlSelect = "SELECT * FROM jm_applied_candidates as can JOIN jm_post_job as job ON (can.jm_job_id = job.jm_jobpost_id) WHERE can.jm_applieduser_id ='$user_id' AND job.is_active = '0' ORDER BY job.jm_jobpost_id DESC";
    $result = $this->db->query($sqlSelect);
    if ($result->num_rows() > 0) {
        $response = array(
            'status' => 200,
            'status_message' => $result->result_array());
    } else {
        $response = array(
            'status' => 500,
            'status_message' => 'No Records Found.');
    }
    return $response;
}

    //------------this fun is used to get the the previous jobs------------------------//
    //------------this fun is used to get the the posted jobs by job employer------------------------//
public function getPosted_JobsByJobEmployer($user_id){
 $sqlSelect = "SELECT * FROM jm_post_job WHERE jm_user_id='$user_id' AND is_active='1' ORDER BY jm_jobpost_id DESC";
 $result = $this->db->query($sqlSelect);
 if ($result->num_rows() > 0) {
    $response = array(
        'status' => 200,
        'status_message' => $result->result_array());
} else {
    $response = array(
        'status' => 500,
        'status_message' => 'No Records Found.');
}
return $response; 
}
    //------------this fun is used to get the the posted jobs by job employer------------------------//

public function getPrevious_JobsByJobEmployer($user_id){
  $sqlSelect = "SELECT * FROM jm_post_job WHERE jm_user_id='$user_id' AND is_active='0' ORDER BY jm_jobpost_id DESC";
  $result = $this->db->query($sqlSelect);
  if ($result->num_rows() > 0) {
    $response = array(
        'status' => 200,
        'status_message' => $result->result_array());
} else {
    $response = array(
        'status' => 500,
        'status_message' => 'No Records Found.');
}
return $response;  
}

public function Show_Live_Projects($user_id){
    $sqlSelect = "SELECT * FROM jm_project_list WHERE jm_posted_user_id='$user_id' AND is_active='1' ORDER BY jm_project_id DESC";
        //echo $sqlSelect;die();
    $result = $this->db->query($sqlSelect);
    if ($result->num_rows() > 0) {
        $response = array(
            'status' => 200,
            'status_message' => $result->result_array());
    } else {
        $response = array(
            'status' => 500,
            'status_message' => 'No Records Found.');
    }
    return $response;  
}

    // ----------freelancer live projects-------------------//
public function freelanceLive_Projects($user_id){
    $sqlSelect = "SELECT * FROM jm_project_list WHERE jm_freelancer_user_id='$user_id' AND is_active='1' ORDER BY jm_project_id DESC";
    $result = $this->db->query($sqlSelect);
    if ($result->num_rows() > 0) {
        $response = array(
            'status' => 200,
            'status_message' => $result->result_array());
    } else {
        $response = array(
            'status' => 500,
            'status_message' => 'No Records Found.');
    }
    return $response;  
}
    // -------------fucntion ends here----------------------//

    // ----------freelancer previous projects-------------------//
public function freelancePrevious_Projects($user_id){
    $sqlSelect = "SELECT * FROM jm_project_list WHERE jm_freelancer_user_id='$user_id' AND is_active!='1' ORDER BY jm_project_id DESC";
    $result = $this->db->query($sqlSelect);
    if ($result->num_rows() > 0) {
        $response = array(
            'status' => 200,
            'status_message' => $result->result_array());
    } else {
        $response = array(
            'status' => 500,
            'status_message' => 'No Records Found.');
    }
    return $response;  
}
    // -------------fucntion ends here----------------------//

public function get_userDetails($user_id){
    $sqlSelect = "SELECT * FROM jm_user_tab WHERE jm_user_id = '$user_id'";
    $result = $this->db->query($sqlSelect);
    if ($result->num_rows() > 0) {
        $response = array(
            'status' => 200,
            'status_message' => $result->result_array());
    } else {
        $response = array(
            'status' => 500,
            'status_message' => 'No Records Found.');
    }
    return $response; 
}

public function Show_Previous_Projects($user_id){
    $sqlSelect = "SELECT * FROM jm_project_list WHERE jm_posted_user_id='$user_id' AND is_active='0' ORDER BY jm_project_id DESC";
    $result = $this->db->query($sqlSelect);
    if ($result->num_rows() > 0) {
        $response = array(
            'status' => 200,
            'status_message' => $result->result_array());
    } else {
        $response = array(
            'status' => 500,
            'status_message' => 'No Records Found.');
    }
    return $response;  
}

public function addRow($user_id,$profile_type){
        // -------add user entry in profile table-------------------
  $query = "SELECT * FROM jm_userprofile_tab WHERE jm_user_id='$user_id'";

  $result = $this->db->query($query);

  if ($result->num_rows() <= 0) {
     $insert_query = "INSERT INTO jm_userprofile_tab(jm_user_id,last_updated) values('$user_id',NOW())";
        //echo $query; die();
     $this->db->query($insert_query);
 }
        // -----------------add user entry in profile tab ends--------------------

//         // -------------add user entry in skill table------------------
//  if($profile_type=='1' || $profile_type=='3'){
//     $query_skilTab = "SELECT * FROM jm_userSkills_tab WHERE jm_user_id='$user_id'";

//     $resul_skilTabt = $this->db->query($query_skilTab);

//     if ($result_skilTab->num_rows() <= 0) {
//         $insert_query_skilTab = "INSERT INTO jm_userSkills_tab(jm_user_id,jm_profile_type) values('$user_id','$profile_type')";
//         //echo $query; die();
//         $this->db->query($insert_query_skilTab);
//     }
// }
//         // ---------------add user entry in skill table------------------
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

	// -----------------------GET ALL SKILLS  BY CATEGORY MODEL----------------------//
	//-------------------------------------------------------------//
public function getSkill_byCategory($category_id){
  $query = "SELECT * FROM jm_skills_tab WHERE category_id = $category_id";
               // echo $query;die();
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
	// -----------------------GET ALL SKILLS  BY CATEGORY MODEL----------------------//
	//-------------------------------------------------------------//

// -----------------------GET ALL CATEGORY MODEL----------------------//
	//-------------------------------------------------------------//
public function get_allCategory(){

  $query = "SELECT DISTINCT jm_category_name,category_id FROM jm_skills_tab ORDER BY jm_category_name ASC";

  $result = $this->db->query($query);

  if ($result->num_rows() <= 0) {
     $response = array(
        'status' => 500,
        'status_message' => 'No Category Found.');
 } else {
     $response = array(
        'status' => 200,
        'status_message' => $result->result_array());
 }
 return $response;
}
	// -----------------------GET ALL CATEGORY MODEL----------------------//
	//-------------------------------------------------------------//

	// -----------------------GET ALL USER INFO MODEL----------------------//
	//-------------------------------------------------------------//
public function get_userInfo($user_id,$profile_type){

  $query = "SELECT * FROM jm_user_tab WHERE jm_user_id='$user_id' AND jm_profile_type='$profile_type'";

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
	// -----------------------GET ALL USER INFO MODEL----------------------//
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

	// -----------------------GET ALL USER FEEDBACK MODEL----------------------//
	//-------------------------------------------------------------//
	public function get_userFeedback($user_id, $profile_type) {

        if ($profile_type == '1') {
            $query = "SELECT * FROM jm_freelancer_rating_table as fr join jm_project_list as pl on(pl.jm_project_id = fr.jm_project_id) WHERE fr.jm_freelancer_id = '$user_id' AND fr.jm_feedback_comment != ''";
        } else {
            $query = "SELECT * FROM jm_employer_rating_table as er join jm_project_list as pl on(pl.jm_project_id = er.jm_project_id) WHERE er.jm_employer_id = '$user_id' AND er.jm_feedback_comment != ''";
        }

        $result = $this->db->query($query);

        if ($result->num_rows() <= 0) {
            $response = array(
                'status' => 500,
                'status_message' => 'No Feedback found for this profile.');
        } else {
            $response = array(
                'status' => 200,
                'status_message' => $result->result_array());
        }
        return $response;
    }

    // -----------------------GET ALL USER FEEDBACK MODEL----------------------//
	//-----------------------------------------------------------------------//
public function getEmployer_Details($emp_id,$profile_type){
    if($profile_type == 1){
        $sql = "SELECT AVG((fr.jm_communication+fr.jm_ontimedelivery+fr.jm_valueformoney+fr.jm_expertise+fr.jm_hire_again)/5) as freelancerRatings,"
        . "ut.jm_user_name,ut.jm_userCity,fr.dated,ut.jm_profile_image "
        . "FROM jm_freelancer_rating_table as fr join jm_project_list as pl join jm_userprofile_tab as ut "
        . "on(pl.jm_project_id = fr.jm_project_id AND ut.jm_user_id = pl.jm_posted_user_id) "
        . "WHERE fr.jm_emp_id = '$emp_id'";
    }
    if($profile_type == 2){
        $sql = "SELECT AVG((er.jm_communication+er.jm_payment_prompt+er.jm_acc_of_requirement+er.jm_work_again)/4) as freelancerRatings, ut.jm_user_name,ut.jm_userCity,er.dated,ut.jm_profile_image 
        FROM jm_employer_rating_table as er join jm_project_list as pl join jm_userprofile_tab as ut 
        on(pl.jm_project_id = er.jm_project_id AND ut.jm_user_id = pl.jm_freelancer_user_id) WHERE er.jm_freelance_id ='$emp_id'";    
    }
    $result = $this->db->query($sql);

    if ($result->num_rows() <= 0) {
        $response = array(
            'status' => 500,
            'status_message' => 'No Details Found.');
    } else {
        $response = $result->result_array();
    }
    return $response;
}
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



}
?>