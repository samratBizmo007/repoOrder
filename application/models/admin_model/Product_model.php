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
        //print_r($data);die();
        $sql = "INSERT INTO product_tab(cat_id,user_id,product_name,prod_description,prod_image,posted_by,posted_date,posted_time,active) "
                . "VALUES ('$cat_id','$user_id','$product_name','$product_description','$prod_images','$posted_by',NOW(),NOW(),'1')";
        //print_r($sql);die();
        $result = $this->db->query($sql);
        if ($result) {
            $response = array(
                'status' => 200,
                'status_message' => 'Product Added Successfully..!');
        } else {
            $response = array(
                'status' => 500,
                'status_message' => 'Product Not Added Successfully...!');
        }
        return $response;
    }

    //-------ADD NEW product FUNCTION ends--------------//
    //-------get posted products and images from product--------------//

    public function getPostedImagesBy_username($user_id) {
        $sql = "SELECT * FROM product_tab WHERE user_id = '$user_id'";
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

    //-------get posted products and images from product--------------//
    //-------fun for remove product from product table--------------//

    public function removeProduct($prod_id) {

         if (!(is_numeric($prod_id))) {
            if ($prod_id == '') {
                $response = array(
                    'status' => 500,
                    'status_message' => 'data not found!');
                return $response;
                die();
            } else {
                $response = array(
                    'status' => 500,
                    'status_message' => 'product id should be numeric!');
                return $response;
                die();
            }
        }
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
