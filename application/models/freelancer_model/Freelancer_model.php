<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Freelancer_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        //$this->load->model('search_model');
    }

    public function get_freelancer() {
        $query = "SELECT * FROM jm_user_tab JOIN jm_userprofile_tab ON jm_userprofile_tab.jm_user_id=jm_user_tab.jm_user_id WHERE jm_user_tab.jm_profile_type = '1' ORDER BY jm_user_tab.jm_username ASC ";

        $result = $this->db->query($query);
        if ($result->num_rows() <= 0) {
            $response = array(
                'status' => 0,
                'status_message' => 'No Data Found.');
        } else {
            $response = array(
                'status' => 1,
                'status_message' => $result->result_array());
        }
        return $response;
    }

    public function getUserFeedback($user_id) {
        $query = "SELECT count(*) as feedback FROM jm_freelancer_rating_table as fr join jm_project_list as pl on(pl.jm_project_id = fr.jm_project_id) WHERE fr.jm_freelancer_id = '$user_id' AND fr.jm_feedback_comment != ''";
        $result = $this->db->query($query);
        $response = '';
        if ($result->num_rows() <= 0) {
            $response = array(
                'status' => 0,
                'status_message' => 'N/A.');
        } else {
           foreach ($result->result_array() as $row) {
                 $response = $row['feedback'];
           }
        }
        return $response;
    }

}

?>