<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Userprofile_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kuwait');   //set Kuwait's timezone
        //$this->load->model('search_model');
    }

//-------------fun for get user details from usertab----------------------------------//    
    public function getUserDetails($username) {
        $sql = "SELECT * FROM user_tab WHERE username = '$username'";
        $result = $this->db->query($sql);
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

//-------------fun for get user details from usertab----------------------------------//    
    //------------fun for get the count of products by username-------------------//
    public function getProductCountBy_username($username) {
        $sql = "SELECT count(*) as prodcount FROM product_tab WHERE posted_by = '$username'";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            $response = array(
                'status' => 500,
                'status_message' => 'No records found.');
        } else {
            foreach ($result->result_array() as $row) {
                $response = $row['prodcount']; //----getting the frrelance ids
            }
        }
        return $response;
    }

}
