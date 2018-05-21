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
        extract(getallheaders());
                //-----------------checking whatsapp no empty and numeric---------------------------//

        if (!(is_numeric($cat_id))) {
         if (empty($cat_id)) {
             $this->response([
                 'status' => 500,
                 'status_message' => 'Category Id Not Found!'], REST_Controller::HTTP_NOT_FOUND);                 
         } else {
             $this->response([
                 'status' => 500,
                 'status_message' => 'Category Id should be numeric!'], REST_Controller::HTTP_PRECONDITION_FAILED);
         }
     }
     $result = $this->category_model->getCategorySalers($cat_id);
     return $this->response($result);
 }
    // get salers as per category api ends

}
