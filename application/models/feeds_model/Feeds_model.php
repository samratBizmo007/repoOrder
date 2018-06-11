<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Feeds_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kuwait');   //set Kuwait's timezone
        //$this->load->model('search_model');
    }
    
    // -----------------------GET ALL STATISTICS COUNT----------------------//
    //-------------------------------------------------------------//
    public function getStatistics(){

        // -------------get user count ----------------------
        $userCount=0;
        $user_query = $this->db->get('user_tab');
        $userCount=$user_query->num_rows();

        // -------------get products count----------------------
        $prod_count=0;
        $prod_query = $this->db->get('product_tab');
        $prod_count=$prod_query->num_rows();

        // // -------------get close order count----------------------
        // $closeCount=0;
        // $close_query = $this->db->get_where('order_tab', array(//making selection
        //     'status' => '0'
        // ));
        // $closeCount=$close_query->num_rows();

        $response = array(
            'status' => 200,
            'status_message' => 'Count for all statistics',
            'userCount'  =>  $userCount,
            'prod_count'  =>  $prod_count,
        );
        return $response;
    }
    // -----------------------GET ALL STATISTICS COUNT MODEL----------------------//


    // -----------------fucntion to get all timeline data- ---------------------//
    public function getTimeline($per_page,$offset) {

        $query = "SELECT c.category_name,u.user_id,u.role,u.cat_id,u.fb_id,u.full_name,u.unique_id,u.username,u.company_name,u.user_image,u.website,u.bio,u.email,u.phone,u.country_code,u.whatsapp_no,u.address,p.user_id,p.cat_id,p.product_name,p.posted_by,p.prod_id,p.prod_description,p.prod_image FROM user_tab as u JOIN product_tab as p JOIN category_tab as c ON (u.unique_id= p.user_id AND c.cat_id = p.cat_id) ORDER BY p.prod_id DESC LIMIT $offset,$per_page";

        $result = $this->db->query($query);

        if ($result->num_rows() <= 0) {
            $response = array(
                'status' => 500,
                'status_message' => 'No recent Feed available.');
        } else {
            $response = array(
                'status' => 200,
                'status_message' => $result->result_array());
        }
        return $response;
    }
    // ----------------------fcuntion  ends here --------------------------//

// -----------------fucntion to get all timeline data scroll- ---------------------//
    public function getTimelineScroll($limit,$start) {

        $query = "SELECT c.category_name,u.user_id,u.role,u.cat_id,u.fb_id,u.full_name,u.unique_id,u.username,u.company_name,u.user_image,u.website,u.bio,u.email,u.phone,u.country_code,u.whatsapp_no,u.address,p.user_id,p.cat_id,p.product_name,p.posted_by,p.prod_id,p.prod_image,p.prod_description FROM user_tab as u JOIN product_tab as p JOIN category_tab as c ON (u.unique_id= p.user_id AND c.cat_id = p.cat_id) ORDER BY p.prod_id DESC LIMIT $start,$limit";

        $result = $this->db->query($query);

        if ($result->num_rows() <= 0) {
            $response = array(
                'status' => 500,
                'status_message' => 'No more Feeds available.');
        } else {
            $response = array(
                'status' => 200,
                'status_message' => $result->result_array());
        }
        return $response;
    }
    // ----------------------fcuntion  ends here --------------------------//

// ----------------get all timeline dta rows count------------//
    public function numRows() {
        $query = $this->db->select('*')
        ->from('product_tab')
        ->order_by('prod_id', 'DESC')
        ->get();
        return $query->num_rows();
    }
// -----------------------fucntion ends-------------------------//
    //-------fun for delete feeds from admin side--------------//

    public function removeProduct($prod_id) {

        $sql = "DELETE FROM product_tab WHERE prod_id = '$prod_id'";
        $result = $this->db->query($sql);
        if ($this->db->affected_rows()>0) {
            $response = array(
                'status' => 200,
                'status_message' => 'Product removed Successfully..!');
        } else {
            $response = array(
                'status' => 500,
                'status_message' => 'Product Not removed Successfully...!');
        }
        return $response;
    }

    //-------fun for delete feeds from admin side --------------//


}

?>