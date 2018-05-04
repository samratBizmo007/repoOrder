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
    //-------ADD NEW ORDER FUNCTION--------------//
    public function addProduct($data) {
        extract($data);
        //print_r($data);die();
        $sql = "INSERT INTO product_tab(cat_id,product_name,prod_description,prod_image,posted_by,role,posted_date,posted_time,active) VALUES
        ('$cat_id','$product_name','$product_description','$imagePath','','',NOW(),NOW(),'1')";
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

    public function getPostedImagesBy_Role($role) {
        $sql = "SELECT * FROM product_tab WHERE role = '$role'";
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

    public function removeProduct($prod_id) {
        $sql = "DELETE FROM product_tab WHERE prod_id = '$prod_id'";
        $result = $this->db->query($sql);
        if ($result) {
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

}
