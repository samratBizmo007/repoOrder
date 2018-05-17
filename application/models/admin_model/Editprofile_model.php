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
        if ($fullname == '') {
            $response = array(
                'status' => 500,
                'status_message' => 'Please Enter Your Name..!');
            return $response;
            die();
        }

        if ($countryCode == '') {
            $response = array(
                'status' => 500,
                'status_message' => 'Please select Country Code eg.965!');
            return $response;
            die();
        }

        if ($address == '') {
            $response = array(
                'status' => 500,
                'status_message' => 'Please Enter Your Address..!');
            return $response;
            die();
        }
        if ($phone == '') {
            $response = array(
                'status' => 500,
                'status_message' => 'Please Enter Your phone no..!');
            return $response;
            die();
        }
         if ($whatsapp_no == '') {
            $response = array(
                'status' => 500,
                'status_message' => 'Please Enter Your Whatsapp no..!');
            return $response;
            die();
        }
//        $contactNo=$countryCode.$phone;
//        $whatsappNo = $countryCodeWhatsapp.$whatsapp_no;
//        if (!is_numeric($contactNo)) {
//            $response = array(
//                'status' => 500,
//                'status_message' => 'Please Enter numeric phone no!');
//            return $response;
//            die();
//        }

        $sql = "UPDATE user_tab SET full_name='$fullname',"
        . " website='$website', bio='".addslashes($bio)."', address='".addslashes($address)."',"
        . " phone='$phone',country_code = '$countryCode',user_image='$imagePath',whatsapp_no = '$whatsapp_no',company_name='".addslashes($company_name)."' WHERE user_id = '$user_id'";
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
        //print_r($data);die();
        if ($user_id == '') {
            $response = array(
                'status' => 500,
                'status_message' => 'Please Enter User Id..!');
            return $response;
            die();
        }
        if ($curr_password == '') {
            $response = array(
                'status' => 500,
                'status_message' => 'Please Enter Current Password..!');
            return $response;
            die();
        }
        if ($new_password == '') {
            $response = array(
                'status' => 500,
                'status_message' => 'Please Enter New Password..!');
            return $response;
            die();
        }
        $checkCurrPassword = Editprofile_model::checkCurrPassword_exist($curr_password, $user_id);
//print_r($checkCurrPassword);die();
        if ($checkCurrPassword == 1) {
            $new_pass = base64_encode($new_password);
            $sql = "UPDATE user_tab SET password='$new_pass' WHERE user_id = '$user_id'";
            //echo $sql;die();
            $result = $this->db->query($sql);
            if ($this->db->affected_rows()>0) {
                $response = array(
                    'status' => 200,
                    'status_message' => 'Password Updated Successfully..!');
            } else {
                if($new_password==$curr_password){
                    $response = array(
                        'status' => 500,
                        'status_message' => 'Password was not updated! New Password and Current Password is same.');
                }
                else{
                    $response = array(
                        'status' => 500,
                        'status_message' => 'Password Not Updated Successfully!');
                }
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
    public function checkCurrPassword_exist($curr_password, $user_id) {
        $curr_pass = base64_encode($curr_password);

        $sql = "SELECT * FROM user_tab WHERE user_id = '$user_id' AND password = '$curr_pass'";
        //echo $sql;die();
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return false;
        } else {
            return true;
        }
    }

    //-----------------fun ends -----------------------------------------------------//
}
