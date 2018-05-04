<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Userprofile_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kuwait');   //set Kuwait's timezone
        //$this->load->model('search_model');
    }
    
    public function getUserDetails($username){
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
}