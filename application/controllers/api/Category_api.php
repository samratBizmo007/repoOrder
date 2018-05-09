<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');

class Category_api extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model/category_model');
        //date_default_timezone_set('Asia/Kolkata');	//set Kuwait's timezone
    }

    // get salers as per category api
    public function getCategorySalers_get() {
        extract($_GET);
        $result = $this->category_model->getCategorySalers($cat_id);
        return $this->response($result);
    }
    // get salers as per category api ends

}
