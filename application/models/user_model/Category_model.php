<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kuwait');   //set Kuwait's timezone
        //$this->load->model('search_model');
    }

    // -----------------------GET ADMIN DETAILS----------------------//
    //-------------------------------------------------------------//
    public function getCategorySalers($cat_id) {

        $query = "SELECT * FROM user_tab as u JOIN category_tab as c ON (u.cat_id= c.cat_id) AND c.cat_id='$cat_id'";
        //echo $query;die();
        //$query = "SELECT * FROM product_tab,category_tab WHERE product_tab.cat_id=category_tab.cat_id AND product_tab.cat_id='$cat_id'";

        $result = $this->db->query($query);

        if ($result->num_rows() <= 0) {
            $response = array(
                'status' => 500,
                'status_message' => 'No data available.');
        } else {
            $response = array(
                'status' => 200,
                'status_message' => $result->result_array());
        }
        return $response;
    }
}

?>