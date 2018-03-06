<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Edit_profile_model extends CI_model {

    public function __construct() {
        parent::__construct();
    }

    //-------this fun is used to save the updated password details-----------------------//
    public function upadteUser_Password($data) {
        extract($data);
        $user_passwordConf = base64_encode($user_passwordConfirm . USER_KEY);
        $sqlUpdate = "UPDATE jm_user_tab SET jm_password = '$user_passwordConf' WHERE jm_user_id ='$user_id'";
        //echo $sqlUpdate; die();
        $result = $this->db->query($sqlUpdate);
        // echo $result;die();
        if (!$result) {
            $response = array(
                'status' => 500,
                'status_message' => 'Updation Failed.');
        } else {
            $response = array(
                'status' => 200,
                'status_message' => 'Password Successfully Updated..!');
        }
        // print_r($response);die();
        return $response;
    }

    //-------this fun is used to save the updated password details-----------------------//
    //---------------------------this fun is used to get the deatails of user--------------//
    public function get_userDetails($user_id) {
        $sql = "SELECT * FROM jm_user_tab WHERE jm_user_id ='$user_id'";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            $response = array(
                'status' => 500,
                'status_message' => 'No Records Found.');
        } else {
            $response = array(
                'status' => 200,
                'status_message' => $result->result_array());
        }
        return $response;
    }

    //-----------------------this fun is used to get the details of user--------------------//
//--------------------------function to get edit info about user-------//
    public function get_allEditdetails($data) {
        extract($data);
        $query = "UPDATE jm_userprofile_tab SET jm_user_name='$jm_user_name',"
                . "jm_userDesignation='$jm_userDesignation',"
                . "jm_userDescription='$jm_userDescription',"
                . "jm_userCity='$jm_userCity',jm_userState='$jm_userState',"
                . "jm_userCountry='$jm_userCountry',jm_education='$jm_education',"
                . "jm_experience='$jm_experience',jm_total_experience = '$total_exp',"
                . "jm_linkedIn_url='$jm_linkedIn_url',jm_profile_image='$file',"
                . "jm_ratePerHr='$jm_rateHr',jm_userAspiration='$jm_userAspiration',"
                . "expected_salary='$expected_salary',last_updated=NOW() WHERE jm_user_id='$jm_user_id'";
        //echo $query;die();
        $result = $this->db->query($query);
        // echo $result;die();

        if (!$result) {
            $response = array(
                'status' => 500,
                'status_message' => 'Updation Failed.');
        } else {
            $response = array(
                'status' => 200,
                'status_message' => 'Details successfully updated.');
        }
        // print_r($response);die();
        return $response;
    }

    // -----------------------fucntion ends here--------------------------//
    // -----------------------GET ALL USER PROFILE INFO MODEL----------------------//
    //-------------------------------------------------------------//
    public function get_userProfile_info($user_id) {

        $query = "SELECT * FROM jm_userprofile_tab WHERE jm_user_id='$user_id'";

        $result = $this->db->query($query);

        if ($result->num_rows() <= 0) {

            $response = array(
                'status' => 500,
                'status_message' => 'User Info Not Found.');
        } else {

            $response = array(
                'status' => 200,
                'status_message' => $result->result_array());
        }
        return $response;
    }

    // -----------------------GET ALL USER PROFILE INFO MODEL----------------------//
//------------------GET ALL STATE NAME----------------------------------------//

    public function getStateby_country($country_id) {
        $query = "SELECT * FROM states WHERE country_id='$country_id'";

        $result = $this->db->query($query);

        if ($result->num_rows() <= 0) {
            $response = array(
                'status' => 500,
                'status_message' => 'No state Found.');
        } else {
            $response = array(
                'status' => 200,
                'status_message' => $result->result_array());
        }
        return $response;
    }
//------------------GET ALL STATE NAME----------------------------------------//

//------------------GET ALL COUNTRY NAME----------------------------------------//

    public function get_country() {

        $query = "SELECT * FROM countries ";

        $result = $this->db->query($query);

        if ($result->num_rows() <= 0) {
            $response = array(
                'status' => 500,
                'status_message' => 'No country Found.');
        } else {
            $response = array(
                'status' => 200,
                'status_message' => $result->result_array());
        }
        return $response;
    }

    //-------------------------------------------------------------//
//----------------get all state name----------------------------------//
    public function get_state() {

        $query = "SELECT * FROM states ";

        $result = $this->db->query($query);

        if ($result->num_rows() <= 0) {
            $response = array(
                'status' => 500,
                'status_message' => 'No state Found.');
        } else {
            $response = array(
                'status' => 200,
                'status_message' => $result->result_array());
        }
        return $response;
    }

//------------------end--------------------------------//
}
