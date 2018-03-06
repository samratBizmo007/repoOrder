<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ERROR | E_PARSE);
class Post_project_model extends CI_model
{
  public function __construct()
  {
   parent::__construct();

 }
  //----this fun is used to get the count of projects-------------------------------------//
 public function getCountOf_Projects(){
  $sql = "SELECT count(*) as projectCount FROM jm_project_list";
  $result = $this->db->query($sql);
  if ($result->num_rows() <= 0) {
    $response = array(
      'status' => 0,
      'status_message' => 'No Project Found.');
  } else {

    foreach ($result->result_array() as $row) {
      $response = $row['projectCount'];
    }
  }
  return $response;
}
  //----------this fun is used to get the count of projects-------------------------------//      
//--------------------------function to add post project form data-------//
public function get_allproject_details($data)
{
 extract($data);
         //print_r($data);die();
 $query = "INSERT INTO jm_project_list(jm_posted_user_id,jm_posted_profile_id,jm_project_title,jm_project_description,jm_project_file,jm_job_type,jm_project_skill,jm_project_price,jm_time_estimation,jm_projectbudget_type,jm_posted_time,jm_posting_date)
 VALUES('$user_id','$profile_id','$project_title','$project_description','$file','$project_type','$project_skill','$project_price','$time_estimation','$project_budget',NOW(),NOW())";
      //echo $query;die();
 $result = $this->db->query($query);
       // echo $result;die();

 if(!$result) {
  $response = array(
    'status' => 500,
    'status_message' => 'Project posting Failed.');
} else {
  $response = array(
    'status' => 200,
    'status_message' => 'Project posted Successfully.');
}
    // print_r($response);die();
return $response;
}

//--------------------------function to add post project form data-------//

// --------------fuser feedback function------------//
public function get_freelancerComments($freelanceUSer_id)
{
 $query="SELECT * FROM jm_freelancer_rating_table WHERE  jm_freelancer_id='$freelanceUSer_id'";
      //echo $query;die();
 $result=$this->db->query($query);  
 if ($result->num_rows() <= 0) 
 {
  $response = array(                                             
    'status' => 500,
    'status_message' => 'No Comments Found.');                           
} else {
  $response = array(
    'status' => 200,
    'status_message' => $result->result_array());
}
return $response;
}
////////////////////END//////////////////////////////

// --------------empuser feedback function------------//
public function get_fEmployerComments($employerUSer_id)
{
 $query="SELECT * FROM jm_employer_rating_table WHERE  jm_employer_id='$employerUSer_id'";
      //echo $query;die();
 $result=$this->db->query($query);  
 if ($result->num_rows() <= 0) 
 {
  $response = array(                                             
    'status' => 500,
    'status_message' => 'No Comments Found.');                           
} else {
  $response = array(
    'status' => 200,
    'status_message' => $result->result_array());
}
return $response;
}
////////////////////END//////////////////////////////



//---------------function to show project list--------------//

public function get_project_list()
{
 $query="SELECT * FROM jm_project_list";
    	//echo $query;die();
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
return $response;
}
//---------------function to save feedback for freelancer project list--------------//
public function save_feedback_freelancer($data)
{

 extract($data);
 $query="SELECT * FROM jm_freelancer_rating_table WHERE jm_project_id = '$jm_project_id'";
 $result=$this->db->query($query);  
 if ($result->num_rows() > 0) 
 {
  $query_update="UPDATE jm_freelancer_rating_table SET jm_emp_id = '$jm_emp_id', jm_freelancer_id = '$jm_freelancer_id',jm_communication='$jm_communication', jm_ontimedelivery='$jm_ontimedelivery',jm_valueformoney='$jm_valueformoney',jm_expertise='$jm_expertise',jm_hire_again='$jm_hire_again',jm_feedback_comment='$jm_feedback_comment',dated=now() WHERE jm_project_id = '$jm_project_id'";
          //echo $query_update;die();

  $result_update = $this->db->query($query_update);
        //echo $result_update;die();
  if(!$result_update) {
    $response = array(
      'status' => 500,
      'status_message' => 'Updation Failed.');
  } else {
  	//-----fetching the project details from project table using project id-------------//
     	 $sql = "SELECT * FROM jm_project_list WHERE jm_project_id ='$jm_project_id'";
     	 //echo $sql;die();
   	 	$result = $this->db->query($sql);
		$project_title='';
	
                    foreach ($result->result_array() as $key) {
                    	//print_r($key) ;
                        $project_title = $key['jm_project_title'];    //----getting job name
                       }
                      // print_r($project_title);die();
   		 //-------sending mail functionality by freelancer id-------------------//
    		$query = "SELECT * FROM jm_user_tab WHERE jm_user_id='$jm_freelancer_id'";
                    $output = $this->db->query($query);
     				$email_id = '';
                    $username = '';
				foreach ($output->result_array() as $row) {
                            $email_id = $row['jm_email_id'];
                            $username = $row['jm_username'];
                        }
                      //  print_r($email_id);die();
				Post_project_model::closedProject_email($email_id,$username,$project_title);
		//die();
    $Update= Post_project_model::update_status($jm_project_id);
    $response = array(
      'status' => 200,
      'status_message' => 'Thank you for your feedback. Your Feedback was submitted successfully.');
    $demo = Post_project_model::calculate_Avg_freelancing_rating($jm_freelancer_id);
    $update_where = array('jm_project_id =' => $jm_project_id);
     $data=array('is_active'=>'0');    //2 value for bid status denotes freelancer is awarded...
     $this->db->where($update_where);
     $this->db->update('jm_project_list',$data);
// ------------------close project-------------------
   }
 }
 else
 {
  $this->load->model('project_model/view_project_model');
  $proj_Details=$this->view_project_model->getProjectDetails($jm_project_id);

  //Check if ther is any freelancer working on project or not------------
  if($proj_Details['status_message'][0]['jm_freelancer_user_id']!=0){

    $query_insert = "INSERT INTO jm_freelancer_rating_table(jm_project_id,jm_emp_id,jm_freelancer_id,jm_communication,jm_ontimedelivery,jm_valueformoney,jm_expertise,jm_hire_again,jm_feedback_comment,dated)
    VALUES('$jm_project_id','$jm_emp_id','$jm_freelancer_id','$jm_communication','$jm_ontimedelivery','$jm_valueformoney','$jm_expertise','$jm_hire_again','$jm_feedback_comment',now())";
    //echo $query_insert;die();
    $result_insert = $this->db->query($query_insert);

    if(!$result_insert) {
      $response = array(
        'status' => 500,
        'status_message' => 'Something went wrong. Feedback was not submitted successfully.');
    } else {
    	  //-----fetching the project details from project table using project id-------------//
     	 $sql = "SELECT * FROM jm_project_list WHERE jm_project_id ='$project_id'";
     	 //echo $sql;die();
   	 	$result = $this->db->query($sql);
		$project_title='';
	
                    foreach ($result->result_array() as $key) {
                    //	print_r($key) ;
                        $project_title = $key['jm_project_title'];    //----getting job name
                       }
                      // print_r($project_title);die();
   		 //-------sending mail functionality by freelancer id-------------------//
    		$query = "SELECT * FROM jm_user_tab WHERE jm_user_id='$freelancer_id'";
                    $output = $this->db->query($query);
     				$email_id = '';
                    $username = '';
				foreach ($output->result_array() as $row) {
                            $email_id = $row['jm_email_id'];
                            $username = $row['jm_username'];
                        }
                      //  print_r($email_id);die();
				Post_project_model::closedProject_email($email_id,$username,$project_title);
    	//die();
      $response = array(
        'status' => 200,
        'status_message' => 'Thank you for your feedback. Your Feedback was submitted successfully.');
      $demo = Post_project_model::calculate_Avg_freelancing_rating($jm_freelancer_id);
      $update_where = array('jm_project_id =' => $jm_project_id);
     $data=array('is_active'=>'0');    //2 value for bid status denotes freelancer is awarded...
     $this->db->where($update_where);
     $this->db->update('jm_project_list',$data);
// ------------------close project-------------------
   }
 }
 else{
  $response = array(
    'status' => 500,
    'status_message' => 'Feedback will not be registered untill project is awarded to any Freelancer!!!');
}
}

return $response;  

}
  //---------------------function end---------------------------------------//
  


//----------Email notification send to awarded freelancer---------------------//
      public function closedProject_email($email_id,$username,$project_title)
      {
      //	return strtoupper($email_id);die();
      	 $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'mx1.hostinger.in',
            'smtp_port' => '587',
            'smtp_user' => 'customercare@jobmandi.in', // change it to yours
            'smtp_pass' => 'Descartes@1990', // change it to yours
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );
           $config['smtp_crypto'] = 'tls';
             
            $current_date = date('Y-m-d');                
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from('customercare@jobmandi.in', "Admin Team");
            $this->email->to($email_id);
            $this->email->subject("JOBMANDI-Project Completed");
      		 $this->email->message('<html>
			<head>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link rel="stylesheet" href="http://jobmandi.in/css/bootstrap/bootstrap.min.css">
			<script src="http://jobmandi.in/css/bootstrap/jquery.min.js"></script>
			<script src="http://jobmandi.in/css/bootstrap/bootstrap.min.js"></script>
			</head>
			<body>
			<div class="container col-lg-8" style="box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important;margin:10px; font-family:Candara;">
			<img class="w3-border" style="width:100px;height:auto; margin-left:auto; margin-right: auto;" src="http://jobmandi.in/images/desktop/logo-main.png">
			<h2 style="color:#4CAF50; font-size:30px">Congratulations...!</h2>
			<h3 style="font-size:15px;">Dear '.$username.',<br>You Have Successfully Completed our Project : <b>'.strtoupper($project_title).'</b>.<br></h3>
			<div class="col-lg-12">
			<div class="col-lg-4"></div>
			<div class="col-lg-4"></div>
			</div>
			<hr>
			<h4 style="font-size:15px;"><b>Questions?</b></h4>
			<h4 style="font-size:15px;">Please let us know if there is anything we can help you with by replying this email.<br><br>Thanks, <b>Admin Team</b></h4>
			</div>
			</body></html>');
                
                
                //$this->email->send(); //----send email function
            if (!$this->email->send()) {
                $response = array(
                    'status' => 500,
                    'status_message' => 'Mail Sending Failed!');
            } else {
                $response = array(
                    'status' => 200,
                    'status_message' => 'Email Sent Successfully...!');
            }
        
        return $response;
      
      
      
      }
      
  //---------function end----------------------------// 

  //-----------------------function for save feedback freelancer Employer ---------//
public function save_feedback_freelancerEmployer($data)
{
 extract($data);
 //print_r($data);
 $query="SELECT *FROM jm_employer_rating_table WHERE jm_project_id = '$jm_project_id'";
 $result=$this->db->query($query);  
 if ($result->num_rows() > 0) 
 {
  $query="UPDATE jm_employer_rating_table SET jm_employer_id = '$jm_emp_id', jm_freelance_id = '$jm_freelancer_id',jm_communication='$jm_communication', jm_payment_prompt='$jm_promptpay',jm_acc_of_requirement='$jm_reqAccuracy',jm_work_again='$jm_workAgain',jm_feedback_comment='$emp_comment',dated=now() WHERE jm_project_id = '$jm_project_id'";
        //echo $query;die();
  $result = $this->db->query($query);

  if(!$result) {
    $response = array(
      'status' => 500,
      'status_message' => 'Updation Failed.');
  } else {
   $demo = Post_project_model::calculate_Avg_freelancerEmp_rating($jm_emp_id);

   $response = array(
    'status' => 200,
    'status_message' => 'Details successfully updated.');
 }
            // print_r($response);die();
 return $response;

}
else
{

  $query = "INSERT INTO jm_employer_rating_table(jm_project_id,jm_employer_id,jm_freelance_id,jm_communication,jm_payment_prompt,jm_acc_of_requirement,jm_work_again,jm_feedback_comment,dated)
  VALUES('$jm_project_id','$jm_emp_id','$jm_freelancer_id','$jm_communication','$jm_promptpay','$jm_reqAccuracy','$jm_workAgain','$emp_comment',now())";
      //echo $query;die();
  $result = $this->db->query($query);
  if(!$result) {
    $response = array(
      'status' => 500,
      'status_message' => 'Something went wrong. Feedback was not submitted successfully.');
  } else {
    $response = array(
      'status' => 200,
      'status_message' => 'Thank you for your feedback. Your Feedback was submitted successfully.');
    $demo = Post_project_model::calculate_Avg_freelancerEmp_rating($jm_emp_id);
  }
     // print_r($response);die();
  return $response;
}
}
  //-----------function end-------------------------------------------//
public function update_status($jm_project_id)
{
	$query="UPDATE jm_project_list SET is_active = '0' WHERE jm_project_id='$jm_project_id'";
  $result=$this->db->query($query); 
  if(!$result) {
    $response = array(
      'status' => 500,
      'status_message' => 'Updation Failed.');
  } else {
   $response = array(
    'status' => 200,
    'status_message' => 'Details successfully updated.');
 } 
}

//-----------------function for calculating avg freelancing rating-------------------//
public function calculate_Avg_freelancing_rating($jm_freelancer_id)
{
  $query= "SELECT AVG((jm_communication+jm_ontimedelivery+jm_valueformoney+jm_expertise+jm_hire_again)/5) FROM jm_freelancer_rating_table WHERE jm_freelancer_id= '$jm_freelancer_id'";

  $result=$this->db->query($query);  
  if ($result->num_rows() <= 0) 
  {
   $response = array(                                             
    'status' => 500,
    'status_message' => 'No data Found.');                           
 } else {
   foreach ($result->result_array() as $key ) {
    $avg=$key['AVG((jm_communication+jm_ontimedelivery+jm_valueformoney+jm_expertise+jm_hire_again)/5)'];
               # code...
  }

  $query="UPDATE jm_user_tab SET jm_avg_rating='$avg' WHERE jm_user_id='$jm_freelancer_id'";
  $result=$this->db->query($query); 
  if(!$result) {
    $response = array(
      'status' => 500,
      'status_message' => 'Updation Failed.');
  } else {
   $response = array(
    'status' => 200,
    'status_message' => 'Details successfully updated.');
 } 

}
return $response;
} 
   //------------------function end-----------------------------//
  //-----------------------------function to calculate avg fpr freelancer employer------------------//
public function  calculate_Avg_freelancerEmp_rating($jm_emp_id)
{

 $query= "SELECT AVG((jm_communication+jm_payment_prompt+jm_acc_of_requirement+jm_work_again)/4) FROM jm_employer_rating_table WHERE jm_employer_id= '$jm_emp_id'";

    //$query="SELECT AVG(freelancer_rating) as AVG_rate FROM jm_project_list WHERE jm_freelancer_user_id=2";
 $result=$this->db->query($query);  
 if ($result->num_rows() <= 0) 
 {
   $response = array(                                             
    'status' => 500,
    'status_message' => 'No data Found.');                           
 } else {
   foreach ($result->result_array() as $key ) {
    $avg=$key['AVG((jm_communication+jm_payment_prompt+jm_acc_of_requirement+jm_work_again)/4)'];
               # code...
  }
  $query="UPDATE jm_user_tab SET jm_avg_rating='$avg' WHERE jm_user_id='$jm_employer_id'";

  $result=$this->db->query($query); 
  if(!$result) {
    $response = array(
      'status' => 500,
      'status_message' => 'Updation Failed.');
  } else {
   $response = array(
    'status' => 200,
    'status_message' => 'Details successfully updated.');
 } 

}
return $response;

}
  //----------------function end----------------------------------------------------------//


}


