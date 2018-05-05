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
                . " phone='$phone',user_image='$imagePath' WHERE username = '$username'";
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
}