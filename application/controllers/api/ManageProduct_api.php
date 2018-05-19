<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');

class ManageProduct_api extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model/Product_model');
        //date_default_timezone_set('Asia/Kolkata');	//set Kuwait's timezone
    }

//--------fun for get all categories from category tab-----------------------//
    public function getAllCategories_get() {
        extract($_GET);
        $result = $this->Product_model->getAllCategories();

        switch ($result['status']) {
        case '200': //-----------------if response is 200 it returns login successful
        $this->response([
            'status' => 200,
            'status_message' => $result['status_message']], REST_Controller::HTTP_OK);
        break;

        case '500': //-----------------if response is 500 it returns error message
        $this->response([
            'status' => 500,     
            'status_message' => 'No Records Found.'],REST_Controller::HTTP_PRECONDITION_FAILED);              
        break;       
        
        default:
        $this->response([
            'status' => 500,
            'status_message' => "Something went wrong. Request was not send...!!!"], REST_Controller::HTTP_PRECONDITION_FAILED);
        break;
    }

        //return $this->response($result);
    }

//--------fun for get all categories from category tab-----------------------//
//--------fun for get all posted images and products by role from products tab-----------------------//

    public function getPostedImagesBy_username_get() {
        extract($_GET);
        $result = $this->Product_model->getPostedImagesBy_username($user_id);
        return $this->response($result);
    }

//--------fun for get all posted images and products by role from products tab-----------------------//
//--------fun for save or add product to product table-----------------------//

    public function addProduct_post() {
        $data = ($_POST);
        $result = $this->Product_model->addProduct($data);
        return $this->response($result);
    }

//--------fun for save or add product to product table-----------------------//
//--------fun for delete or remove product to product table-----------------------//

    public function removeProduct_get() {
        extract($_GET);
        $result = $this->Product_model->removeProduct($prod_id);
        return $this->response($result);
    }

//--------fun for delete or remove product to product table-----------------------//
//-------------fun for get the product category by category id -------------------//
    public function getProductCategory_get() {
        extract($_GET);
        $result = $this->Product_model->getProductCategory($cat_id);
        return $this->response($result);
    }

//-----------fun for get the product category by cate id--------------------------//    
}
