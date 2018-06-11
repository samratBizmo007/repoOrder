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
        . " website='$website', bio='".addslashes($bio)."', address='".addslashes($address)."',"
        . " phone='$phone',country_code = '$countryCode',user_image='$imagePath',whatsapp_no = '$whatsapp_no',company_name='".addslashes($company_name)."' WHERE unique_id = '$user_id'";
        //print_r($sql);die();
        $result = $this->db->query($sql);
        if ($result) {
            return true;
            // $response = array(
            //     'status' => 200,
            //     'status_message' => 'Profile Updated Successfully..!');
        } else {
            return false;
            // $response = array(
            //     'status' => 500,
            //     'status_message' => 'Profile Not Updated Successfully...!');
        }
       // return $response;
    }

    //-------UPDATE PROFILE FUNCTION ends--------------//

    //-------UPDATE PROFILE FUNCTION--------------//
    public function updateProfileMob($data) {
        extract($data);
        //print_r($data);die();        
        
        $sql = "UPDATE user_tab SET full_name='$fullname',"
        . " website='$website', bio='".addslashes($bio)."', address='".addslashes($address)."',"
        . " phone='$phone',country_code = '$countryCode',whatsapp_no = '$whatsapp_no',company_name='".addslashes($company_name)."' WHERE unique_id = '$user_id'";
        //print_r($sql);die();
        $result = $this->db->query($sql);
        if ($result) {
            return TRUE;           
        } else {
            return FALSE;            
        }
        return $response;
    }

    //-------UPDATE PROFILE FUNCTION ends--------------//

     //-------UPDATE PROFILE FUNCTION--------------//
    public function updateImage($data) {
        extract($data);
        //print_r($data);die();
        
        $sql = "UPDATE user_tab SET user_image='$imagePath' WHERE unique_id = '$user_id'";
        //print_r($sql);die();
        $result = $this->db->query($sql);
        if ($result) {
            return TRUE;            
        } else {
            return FALSE;
        }
        return $response;
    }

    //-------UPDATE PROFILE FUNCTION ends--------------//


    //--------------fun for change password------------------------//
    public function changePassword($data) {
        extract($data);
        //print_r($data);die();
        
        $checkCurrPassword = Editprofile_model::checkCurrPassword_exist($curr_password, $user_id);
//print_r($checkCurrPassword);die();
        if ($checkCurrPassword == 1) {
            $new_pass = base64_encode($new_password);
            $sql = "UPDATE user_tab SET password='$new_pass' WHERE unique_id = '$user_id'";
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

        $sql = "SELECT * FROM user_tab WHERE unique_id = '$user_id' AND password = '$curr_pass'";
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
