<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        //$this->load->model('search_model');
    }

   //-------UPDATE ADMIN EMAIL FUNCTION--------------//
    public function updateEmail($email) {

        $sql = "UPDATE admin_tab SET admin_email='$email' WHERE admin_id='1'";

        if($this->db->query($sql)){
            $response = array(
                'status' => 200,
                'status_message' => 'Email Updated Successfully..!');        
        }else{
            $response = array(
                'status' => 500,
                'status_message' => 'Email Updation Failed...!');
        }
        return $response;
    }

    //---------UPDATE ADMIN EMAIL ENDS------------------//

     // -----------------------SAVE EMAIL OTP IN DB FOR USER----------------------//
    //-------------------------------------------------------------//
    public function saveOTP($email_id,$otp) {

        if ($email_id == '' || $otp == '') {
            $response = array(
                'status' => 500,
                'status_message' => 'Invalid Inputs...!');
            return $response;
            die();
        }

        $cust_id = "";
        $email_idRegistered = '';
        $sqlselect = "SELECT email_id FROM otp_expiry WHERE email_id = '$email_id'";
        $result = $this->db->query($sqlselect);

        if ($result->num_rows() >= 1) {
            $query = "UPDATE otp_expiry SET otp = '$otp',create_at=NOW() WHERE email_id = '$email_id'";
            $result = $this->db->query($query);

            if ($result) {
                // ------------set email verified status to 'Not Verified' i.e. 0
                $update_query = "UPDATE customer_tab SET email_verified ='0' WHERE email= '$email_id'";
                $update_result = $this->db->query($update_query);

                $response = array(
                            'status' => 200, //---------insert db success code
                            //'otp' => $otp,
                            'status_message' => 'OTP has been sent to your registered email-ID. Please verify your Email by OTP.'
                        );
            }
            else {
                $response = array(
                            'status' => 500, //---------insert db success code
                            'status_message' => 'OTP Registering Failed. Try Sending OTP once again.'
                        );
            }
        }
        else {
            $query = "INSERT INTO otp_expiry(email_id,otp,create_at) VALUES ('$email_id','$otp',NOW())";
            $result = $this->db->query($query);
            if ($result) {
                // ------------set email verified status to 'Not Verified' i.e. 0
                $update_query = "UPDATE customer_tab SET email_verified ='0' WHERE email= '$email_id'";
                $update_result = $this->db->query($update_query);

                $response = array(
                            'status' => 200, //---------insert db success code
                            //'otp' => $otp,
                            'status_message' => 'OTP has been sent to your registered email-ID. Please verify your Email by OTP.'
                        );
            } else {
                $response = array(
                            'status' => 500, //---------insert db success code
                            'status_message' => 'OTP Registering Failed. Try Sending OTP once again.'
                        );
            }
        }

        return $response;
    }
    // -----------------------USER REGISTERATION MODEL by mobile----------------------//

    // -----------------------SEND OTP BY MAIL----------------------//
    public function sendOTPEmail($email) {

        if ($email == '') {
            $response = array(
                'status' => 500,
                'status_message' => 'Email-ID Invalid..!');
            return $response;
            die();
        }

        $otp = rand(100000, 999999);

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
        //return ($config);die();

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('customercare@jobmandi.in', "Admin Team");
        $this->email->to($email, $email);
        $this->email->subject("OTP Send");
        $this->email->message('<html>
            <head>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            </head>
            <body>
            <div class="container col-lg-8" style="box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important;margin:10px; font-family:Candara;">
            <h2 style="color:#4CAF50; font-size:30px">Welcome To Jumla Business!!</h2>
            <h3 style="font-size:15px;">Hello '.$email.',<br></h3>
            <h3 style="font-size:15px;">Your OTP for Email Verification is '.$otp.',<br>Please verify your email-ID.</h3>
            
            <div class="col-lg-12">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
            
            </div>
            </body></html>');

        if ($this->email->send()) {
            $response = array(
                'status' => 200, //---------email sending succesfully 
                'status_message' => 'OTP Has Been Sent To Your Email ID.',
                'otp'   =>  $otp
            );
        } else {
        //print_r($this->email->print_debugger());die();
            $response = array(
                'status' => 500, //---------email send failed
                'status_message' => 'OTP Sending Failed.'
            );
        }
        return $response;
    }
    //----------------------SEND OTP BY MAIL ENDS------------------------//


    //----------------------VERIFY OTP FUNCTION------------------------//
    function verifyOTP($email, $OTP_id) {

        if ($email == '' || $OTP_id == '') {
            $response = array(
                'status' => 500,
                'status_message' => 'Invalid Inputs...!');
            return $response;
            die();
        }

        $otp = '';
        $selectquery = "SELECT otp FROM otp_expiry WHERE email_id = '$email'";
        //echo $selectquery; die();
        $resultselect = $this->db->query($selectquery);
        if ($resultselect->num_rows() == 1) {

            foreach ($resultselect->result_array() as $row) {
                $otp = $row['otp'];
            }
            //echo $otp;
            //echo $OTP_id;die();
            if ($otp == $OTP_id) {  
            // ------------set email verified status to 'Verified' i.e. 1
                $update_query = "UPDATE customer_tab SET email_verified ='1' WHERE email= '$email'";
                $update_result = $this->db->query($update_query);             
                $response = array(
                    'status' => 200,
                    'status_message' => 'OTP Verified Successfully.');
            } else {
                $response = array(
                    'status' => 500,
                    'status_message' => 'Invalid OTP. Please Validate Otp Again OR you can get new OTP.!');
            }
        } else {
            $response = array(
                'status' => 500,
                'status_message' => 'OTP not generated for this Email-ID. Please get OTP by clicking <b>"Send OTP"</b> button.!');
        }
        return $response;
    }
     //----------------------VERIFY OTP FUNCTION ENDS------------------------//


    // -----------------------GET ADMIN DETAILS----------------------//
    //-------------------------------------------------------------//
    public function getAdminDetails() {

        $query = "SELECT * FROM admin_tab WHERE admin_id=1";

        $result = $this->db->query($query);

        if ($result->num_rows() <= 0) {
            $response = array(
                'status' => 500,
                'status_message' => 'No data found.');
        } else {
            $response = array(
                'status' => 200,
                'status_message' => $result->result_array());
        }
        return $response;
    }
}

?>