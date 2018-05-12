<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AdminUser_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kuwait');   //set Kuwait's timezone
        //$this->load->model('search_model');
    }

    //-------REJECT USER REQUEST FUNCTION--------------//
    public function rejectUser($user_id) {
        if ($user_id=='') {
           $response = array(
            'status' => 500,
            'status_message' => 'Please provide User-ID!');
           return $response;
           die();
       }

       $sql = "UPDATE user_tab SET status='2' WHERE user_id='$user_id'";

       if ($this->db->query($sql)) {
        $response = array(
            'status' => 200,
            'status_message' => 'Request for #UID-0'.$user_id.' Rejected');
    } else {
        $response = array(
            'status' => 500,
            'status_message' => 'User Rejection Failed...!');
    }
    return $response;
}
    //---------REJECT USER REQUEST ENDS------------------//

    //-------APPROVE USER REQUEST FUNCTION--------------//
public function apprUser($user_id,$passwd) {

    if ($user_id=='') {
       $response = array(
        'status' => 500,
        'status_message' => 'Please provide User-ID!');
       return $response;
       die();
   }
   if ($passwd=='') {
       $response = array(
        'status' => 500,
        'status_message' => 'Please provide password!');
       return $response;
       die();
   }

   $email='';
   $username='';

   $pass=base64_encode($passwd);
   // ------get user details-------------//
   $u_query = "SELECT * FROM user_tab WHERE user_id='$user_id'";
    $u_result = $this->db->query($u_query);

    if ($u_result->num_rows() <= 0) {
        $response = array(
            'status' => 500,
            'status_message' => 'No data found.');
        return $response;
        die();
    } else {

        foreach ($u_result->result_array() as $u_key) {
            $email = $u_key['email'];
            $username = $u_key['username'];
                //print_r($key);die();
        }

        AdminUser_model::sendPass_saler($username, $email, $pass);  //------ send password to user email
    }
   // ----------get user details ends

   $sql = "UPDATE user_tab SET status='1',password='$pass' WHERE user_id='$user_id'";

   if ($this->db->query($sql)) {
    $response = array(
        'status' => 200,
        'status_message' => 'Request for #UID-0'.$user_id.' Approved.');
} else {
    $response = array(
        'status' => 500,
        'status_message' => 'User Approval Failed...!');
}
return $response;
}
    //---------APPROVE USER REQUEST ENDS------------------//

// -----------------------SEND PASSWORD TO SALER----------------------//
    public function sendPass_saler($user_name, $email_id, $password) {
        
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'mx1.hostinger.in',
            'smtp_port' => '587',
            'smtp_user' => 'customercare@jumlakuwait.com', // change it to yours
            'smtp_pass' => 'Descartes@1990', // change it to yours
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );
        $config['smtp_crypto'] = 'tls';
        //return ($config);die();

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('customercare@jumlakuwait.com', "Admin Team");
        $this->email->to($email_id,$user_name);
        $this->email->subject("Password - JUMLA BUSINESS");
        $this->email->message('<html>
            <head>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            </head>
            <body>
            <div class="container col-lg-8" style="box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important;margin:10px; font-family:Candara;">
            <h2 style="color:#4CAF50; font-size:30px">Your password for JUMLA BUSINESS.</h2>
            <h3 style="font-size:15px;">Hello '.$user_name.',<br></h3>
            <h3 style="font-size:15px;">We are glad to inform you that your registration request has been approved by JUMLA Admin. So, following are your credentials provided below and you can use the same for logging into JUMLA BUSINESS.</h3>
            <h3 style="font-size:15px;">Here\'s your credentials:</h3>
            <h3><b>Username:</b> ' . $user_name . '</h3>
            <h3><b>Email:</b> ' . $email_id . '</h3>
            <h3><b>Password:</b> ' . base64_decode($password) . '</h3>
            <h3 style="font-size:15px;">This is a direct link to JUMLA BUSINESS login page: '.base_url().'login .</h3>
            <div class="col-lg-12">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">

            </div>
            </body></html>');

        if ($this->email->send()) {
            $response = array(
                'status' => 200, //---------email sending succesfully 
                'status_message' => 'Email Sent Successfully.',
            );
        } else {
            //print_r($this->email->print_debugger());die();
            $response = array(
                'status' => 500, //---------email send failed
                'status_message' => 'Email Sending Failed.'
            );
        }
        return $response;
    }

    // -----------------------SEND PASSWORD TO SALER---------------------//

    // -----------------------GET ADMIN SETTINGS DETAILS----------------------//
    //-------------------------------------------------------------//
public function getSettingDetails($setting_name) {

    $query = "SELECT * FROM admin_settings WHERE setting_name='$setting_name'";
    $result = $this->db->query($query);

    if ($result->num_rows() <= 0) {
        $response = array(
            'status' => 500,
            'status_message' => 'No data found.');
    } else {

        foreach ($result->result_array() as $key) {
            $setting_value = $key['setting_value'];
                //print_r($key);die();
        }
        $response = array(
            'status' => 200,
            'status_message' => 'Admin Setting data found',
            'setting_name' => $setting_name,
            'setting_value' => $setting_value
        );
    }
    return $response;
}
    //---------GET ADMIN SETTINGS DETAILS ENDS------------------//

    // -----------------------GET ADMIN DETAILS----------------------//
    //-------------------------------------------------------------//
public function allUsers() {

    $query = "SELECT * FROM user_tab WHERE role='2' ORDER BY status";

    $result = $this->db->query($query);

    if ($result->num_rows() <= 0) {
        $response = array(
            'status' => 500,
            'status_message' => 'No user data available.');
    } else {
        $response = array(
            'status' => 200,
            'status_message' => $result->result_array());
    }
    return $response;
}
    //--------------------------------------------------------------//

    // -----------------------GET ADMIN EMAIL----------------------//
    //-------------------------------------------------------------//
public function getAdminEmail() {
    $admin_email = '';
    $query = "SELECT * FROM admin_tab WHERE admin_id=1";

    $result = $this->db->query($query);

    if ($result->num_rows() <= 0) {
        $response = array(
            'status' => 500,
            'status_message' => 'No data found.');
    } else {
        foreach ($result->result_array() as $key) {
            $admin_email = $key['admin_email'];
        }
    }
    return $admin_email;
}

    // -----------------------GET ADMIN EMAIL----------------------//
}

?>