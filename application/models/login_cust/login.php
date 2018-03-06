<?php

class Login extends CI_Model {

    public function __construct() {
        parent::__construct();
        //$this->load->model('search_model');
    }

    // -----------------------USER REGISTERATION MODEL----------------------//
    //-------------------------------------------------------------//
    public function registerCustomer($user_name, $email_id, $password, $register_mobile_no, $register_address, $register_business_field) {

        $checkEmail=login::checkEmail_exist($email_id);
        if ($checkEmail) {

            $data = array(
                'username' => $user_name,
                'password' => base64_encode($password),
                'email' => $email_id,
                'mobile_no' => $register_mobile_no,
                'address' => $register_address,
                'business_field' => $register_business_field
            );
            
            $result = $this->db->insert('customer_tab', $data);
            if($result){
                $response = array(
                        'status' => 200, //---------insert db success code
                        'status_message' => 'Registration Successfull. Please Login With Your Registered Email-ID.'
                    );
            }else {
                    $response = array(
                        'status' => 200, //---------insert db success code but email not send
                        'status_message' => 'Registration Successfull but Email-ID was not found.'
                    );
                }
        }else {
           //if email-Id already regiterd then show error
            $response = array(
                'status' => 500,
                'status_message' => 'Email ID Already Registered for this profile. Login by same or use another Email-ID!!!'
            );
        }
            
            // $mail_verified=Login_model::sendVerificatinEmail($user_name,$email_id,$profile_type);
            // print_r($mail_verified);die();
            //sql query to insert new user
//            if ($result = $this->db->insert('customer_tab', $data)) {
//                //$mail_verified = Login_model::sendVerificatinEmail($user_name, $email_id, $profile_type);
//
//                if ($mail_verified['status'] == 200) {
//                    $response = array(
//                        'status' => 200, //---------insert db success code
//                        'status_message' => 'Registration Successfull. Please Login With Your Registered Email-ID.'
//                    );
//                } else {
//                    $response = array(
//                        'status' => 200, //---------insert db success code but email not send
//                        'status_message' => 'Registration Successfull but Email-ID was not found.'
//                    );
//                }
//            } else {
//                $response = array(
//                    'status' => 500, //---------db error code 
//                    'status_message' => 'Something went wrong... Registration Failed!!!'
//                );
//            }
//        } 
        return $response;
    }

    // -----------------------USER REGISTERATION MODEL----------------------//
    //-------------------------------------------------------------//
    
    
    //-----------------------function to check whether email-ID already exists------------------//
	function checkEmail_exist($email_id)
	{
		$query = null;
		$query = $this->db->get_where('customer_tab', array(//making selection
			'email' => $email_id
		));		
		
		if ($query->num_rows() > 0) {
			return 0;			
		} else {
			return 1;			
		}
	}

//-----------------------function to check whether email-ID already exists------------------//
	

	// -----------------------USER LOGIN API----------------------//
	//-------------------------------------------------------------//
	public function loginCustomer($user_name,$password)
	{
	//sql query to check login credentials
		$pass=base64_encode($password);
		$query="SELECT * FROM customer_tab WHERE (email='$user_name' || username='$user_name') AND password='$pass'";
		//echo $query;die();
		$result = $this->db->query($query);
		$user_id='0';
		$privilege='';
	//if credentials are true, their is obviously only one record
		if($result->num_rows() == 1){
			
			foreach ($result->result_array() as $row) {
				$user_name=$row['username'];
				$user_id=$row['user_id'];
			}

			if ($result) {
				$sql = "UPDATE customer_tab SET active='1' WHERE user_id='$user_id'";
				//echo $sql;die();
				$result = $this->db->query($sql);

				//response with values to be stored in sessions if update session_bool true
				$response=array(
					'status' => 200,
					'user_id' =>$user_id,
					'user_name' => $user_name,				
					'status_message' =>'Login Successfull'
				);
			}
			else{
				$response=array(
					'status' => 500,
					'user_id' =>$user_id,
					'user_name' => $user_name,				
					'status_message' =>'Error to start session for '.$user_name.' !!!',
				);
			}
		}
		else
		{
		//login failed response
			$response=array(
				'status' => 500,
				'status_message' =>'Sorry..Login credentials are incorrect!!!',
				'user_id' =>$user_id,
				'user_name' => $user_name,				
			);
		}
		return $response;
	}
	//----------------------------LOGIN END------------------------------//
        
    
}
