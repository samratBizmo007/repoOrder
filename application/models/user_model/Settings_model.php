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

        $sql = "UPDATE company_tab SET email='$email' WHERE company_id='$company_id'";

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
}