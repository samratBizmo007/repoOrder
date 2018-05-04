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
   $pass=base64_encode($passwd);
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

    $query = "SELECT * FROM user_tab ORDER BY status";

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