<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        //$this->load->model('search_model');
    }

   //-------UPDATE ADMIN EMAIL FUNCTION--------------//
    public function updateEmail($email) {
      
        $sql = "UPDATE admin_tab SET admin_email='$email' WHERE admin_id='1'";

       if($this->db->query($sql)){
        $response = array(
                'status' => 200,
                'status_message' => 'Email Updated Successfully..!');        
        }else{
            $response = array(
                'status' => 500,
                'status_message' => 'Email Updation Failed...!');
        }
        return $response;
    }

    //---------UPDATE ADMIN EMAIL ENDS------------------//


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
}

?>