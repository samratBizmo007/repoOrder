<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');

class ManageProduct_api extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model/Product_model');
        //date_default_timezone_set('Asia/Kolkata');	//set Kuwait's timezone
    }

    public function getAllCategories_get() {
        extract($_GET);
        $result = $this->Product_model->getAllCategories();
        return $this->response($result);
    }

    public function getPostedImagesBy_Role_get() {
        extract($_GET);
        $result = $this->Product_model->getPostedImagesBy_Role($role);
        return $this->response($result);
    }

    public function addProduct_post() {
        $data = ($_POST);
        $result = $this->Product_model->addProduct($data);
        return $this->response($result);
    }

    public function removeProduct_get() {
        extract($_GET);
        $result = $this->Product_model->removeProduct($prod_id);
        return $this->response($result);
    }

}
