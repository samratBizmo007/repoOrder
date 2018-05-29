<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kuwait');   //set Kuwait's timezone
        //$this->load->model('search_model');
    }

    //-------get all categories from category table--------------//
    public function getAllCategories() {
        $sql = "SELECT * FROM category_tab";
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

    //-------get all categories from category table--------------//
    //-------ADD NEW product FUNCTION--------------//
    public function addProduct($data) {
        extract($data);
        
        $sql = "INSERT INTO product_tab(cat_id,user_id,product_name,prod_description,prod_image,posted_date,posted_time,active)"
                . "VALUES ('$cat_id','$user_id','".addslashes($product_name)."','".addslashes($product_description)."','$prod_images',NOW(),NOW(),'1')";
        //print_r($sql);die();
        $result = $this->db->query($sql);
        if ($result) {
            return TRUE;
            // $response = array(
            //     'status' => 200,
            //     'status_message' => 'Product Added Successfully..!');
        } else {
            return FALSE;
            // $response = array(
            //     'status' => 500,
            //     'status_message' => 'Product Not Added Successfully...!');
        }
        //return $response;
    }

    //-------ADD NEW product FUNCTION ends--------------//
    //-------function to fetch user as per that particular category id----------------------//
    // public function getsellercategory()
    // {
    //     $sql = "SELECT * FROM `user_tab` WHERE user_id = 13 AND cat_id =2";
    //     $result = $this->db->query($sql);
    //     if ($result->num_rows() <= 0) {
    //         $response = array(
    //             'status' => 500,
    //             'status_message' => 'No data found.');
    //     } else {
    //         $response = array(
    //             'status' => 200,
    //             'status_message' => $result->result_array());
    //     }
    //     return $response;

    // }
    //---------function end------------//
    //-------get posted products and images from product--------------//

    public function getUserProducts($user_id) {
        // $sql = "SELECT * FROM product_tab WHERE user_id = '$user_id'";
        $sql = "SELECT * FROM  product_tab as p JOIN category_tab as c ON c.cat_id = p.cat_id WHERE p.user_id='$user_id'";
        $result = $this->db->query($sql);
        if ($result->num_rows() > 0) {
             $response = array(
                'status' => 200,
                'status_message' => $result->result_array());
        } 
        return $response;
    }

    //-------get posted products and images from product--------------//
    //-------fun for remove product from product table--------------//

    public function removeProduct($prod_id) {

        $sql = "DELETE FROM product_tab WHERE prod_id = '$prod_id'";
        $result = $this->db->query($sql);
        if ($this->db->affected_rows()>0) {
            return TRUE;
        } else {
            return FALSE;   
        }
    }

    //-------fun for remove product from product table--------------//
    //------------fun for get the category name from category id-----------------//
    public function getProductCategory($cat_id) {
        $sql = "SELECT * FROM category_tab WHERE cat_id = '$cat_id'";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            $response = array(
                'status' => 500,
                'status_message' => 'No records found.');
        } else {
            foreach ($result->result_array() as $row) {
                $response = $row['category_name']; //----getting the frrelance ids
            }
        }
        return $response;
    }

    //------------fun for get the category name from category id-----------------//
}
