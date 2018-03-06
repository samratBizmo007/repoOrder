<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class login extends CI_Model {

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
	
    
}
