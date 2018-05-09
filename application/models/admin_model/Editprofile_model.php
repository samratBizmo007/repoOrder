<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Editprofile_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kuwait');   //set Kuwait's timezone
        //$this->load->model('search_model');
    }

    //-------UPDATE PROFILE FUNCTION--------------//
    public function updateProfile($data) {
        extract($data);
        //print_r($data);die();
        $sql = "UPDATE user_tab SET full_name='$fullname',"
                . " website='$website', bio='$bio', address='$address',"
                . " phone='$phone',user_image='$imagePath',company_name='$company_name' WHERE user_id = '$user_id'";
        //print_r($sql);die();
        $result = $this->db->query($sql);
        if ($result) {
            $response = array(
                'status' => 200,
                'status_message' => 'Profile Updated Successfully..!');
        } else {
            $response = array(
                'status' => 500,
                'status_message' => 'Profile Not Updated Successfully...!');
        }
        return $response;
    }

    //-------UPDATE PROFILE FUNCTION ends--------------//
    //--------------fun for change password------------------------//
    public function changePassword($data) {
        extract($data);
        $checkCurrPassword = Editprofile_model::checkCurrPassword_exist($curr_password, $user_id);
        if ($checkCurrPassword == 1) {
            $new_pass = base64_encode($new_password);
            $sql = "UPDATE user_tab SET password='$new_pass' WHERE user_id = '$user_id'";
            $result = $this->db->query($sql);
            if ($result) {
                $response = array(
                    'status' => 200,
                    'status_message' => 'Password Updated Successfully..!');
            } else {
                $response = array(
                    'status' => 500,
                    'status_message' => 'Password Not Updated Successfully...!');
            }
        } else {
            $response = array(
                'status' => 500,
                'status_message' => 'Current password Not Correct...!');
        }
        return $response;
    }

    //--------------fun for change password ends here------------------------//
    //----------fun for check current password exist -------------------------------//
    public function checkCurrPassword_exist($curr_password, $username) {
        $curr_pass = base64_encode($curr_password);
        $sql = "SELECT * FROM user_tab WHERE username = '$username' AND password = '$curr_pass'";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return false;
        } else {
            return true;
        }
    }

    //-----------------fun ends -----------------------------------------------------//
}
