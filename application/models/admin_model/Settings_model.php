<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Settings_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kuwait');   //set Kuwait's timezone
        //$this->load->model('search_model');
    }

    //-------UPDATE ADMIN EMAIL FUNCTION--------------//
    public function updateEmail($email) {

        $sql = "UPDATE admin_tab SET admin_email='$email' WHERE admin_id='1'";

        if ($this->db->query($sql)) {
            $response = array(
                'status' => 200,
                'status_message' => 'Email Updated Successfully..!');
        } else {
            $response = array(
                'status' => 500,
                'status_message' => 'Email Updation Failed...!');
        }
        return $response;
    }

    //---------UPDATE ADMIN EMAIL ENDS------------------//
    //-------UPDATE USER DASHBOARD IMAGE FUNCTION--------------//
    public function updateDashboardImage($imagePath) {

        $sql = "UPDATE admin_settings SET setting_value='$imagePath' WHERE setting_name='dash_image'";

        if ($this->db->query($sql)) {
            $response = array(
                'status' => 200,
                'status_message' => 'Image Uploaded Successfully..!');
        } else {
            $response = array(
                'status' => 500,
                'status_message' => 'Image Uploading Failed...!');
        }
        return $response;
    }
    //---------UPDATE USER DASHBOARD IMAGE ENDS------------------//

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
                'status_message' => 'Admin Settings data found',
                'setting_name' => $setting_name,
                'setting_value' => $setting_value
            );
        }
        return $response;
    }
    //---------GET ADMIN SETTINGS DETAILS ENDS------------------//
    
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