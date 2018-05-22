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

    public function getUserProducts_get() {
        extract(getallheaders());
        extract($_GET);
        // ------if user_id not found-------------
        if ($user_id=='') {
            $this->response([
                'status' => 500,
                'status_message' => 'User ID field is empty. All parameters are required!'
            ], REST_Controller::HTTP_PRECONDITION_FAILED);
            die();
        }
        $result = $this->Product_model->getUserProducts($user_id);
        if(!empty($result)){
            $this->response([
                'status' => 200,
                'status_message' => $result['status_message']
            ], REST_Controller::HTTP_OK);
        }
        else{
            $this->response([
                'status' => 500,
                'status_message' => 'No products available for this user!'
            ], REST_Controller::HTTP_PRECONDITION_FAILED);
        }
    }

//--------fun for get all posted images and products by role from products tab-----------------------//
//--------fun for save or add product to product table-----------------------//

    public function addProduct_post() {
        $data = ($_POST);
        extract($data);
      
        //echo $user_id;die();
        //print_r(getallheaders());die();
        //print_r($data);die();
//------------checking the product name is not empty------------//
        if(empty($product_name)){
         //set the response and exit
            $this->response([
                'status' => 500,
                'status_message' => 'Please Enter Product Name.'
            ], REST_Controller::HTTP_PRECONDITION_FAILED);       
        }
       ////------------checking the product name is not empty------------//

 //------------checking the product description is empty------------//

        if(empty($product_description) ){     
            $this->response([
                'status' => 500,
                'status_message' => 'Please Enter your Product Description.'
            ], REST_Controller::HTTP_PRECONDITION_FAILED);
        //die();        
        }
         //-------------------ends------------//
 //------------checking the user id is empty------------//

        if(empty($user_id)){
            $this->response([
                'status' => 500,
                'status_message' => 'User Id Is Not Found.'
            ], REST_Controller::HTTP_PRECONDITION_FAILED);
        //die();        
        }
         //--------------------------ends -----------------------//
 //------------checking the product category id is empty------------//

        if(empty($cat_id) ){

            $this->response([
                'status' => 500,
                'status_message' => 'Product Category Not Found.'
            ], REST_Controller::HTTP_PRECONDITION_FAILED);
        //die();        
        }
         //------------ ----------ends ------------//
 //------------checking the product is posted by value is empty------------//

        if(empty($posted_by) ){
            
            $this->response([
                'status' => 500,
                'status_message' => 'Please Enter The User Name For Product Posted By .'
            ], REST_Controller::HTTP_PRECONDITION_FAILED);
        //die();        
        }
         //-------------------ends -------------------------------//

        //------------checking the product images is empty------------//

        if(empty($prod_images) ){
            
            $this->response([
                'status' => 500,
                'status_message' => 'Product Image Is not Found .'
            ], REST_Controller::HTTP_PRECONDITION_FAILED);
        //die();        
        }
         //-------------------ends -------------------------------//


        $result = $this->Product_model->addProduct($data);

        if($result == TRUE){
            $this->response([
            'status' => 200,
             'status_message' => 'Product Added Successfully.'], REST_Controller::HTTP_OK);

        }else{
            $this->response([
            'status' => 500,
             'status_message' => 'Something Went Wrong..! Product Not Added Successfully.'], REST_Controller::HTTP_PRECONDITION_FAILED);
        }
        //return $this->response($result);
    }

//--------fun for save or add product to product table-----------------------//
//--------fun for delete or remove product to product table-----------------------//

    public function removeProduct_get() {
        extract($_GET);
        extract(getallheaders());
        //print_r($prod_id);die();
     //------------checking the Product ID is empty or numeric------------//

        if (!(is_numeric($prod_id))) {
           if (empty($prod_id)) {
               $this->response([
                   'status' => 500,
                   'status_message' => 'Product Id Is Not Found.!'], REST_Controller::HTTP_PRECONDITION_FAILED);                 
           } else {
               $this->response([
                   'status' => 500,
                   'status_message' => 'Product ID should be numeric!'], REST_Controller::HTTP_PRECONDITION_FAILED);
           }
       }

 //--------------------ends---------------------------------//
        $result = $this->Product_model->removeProduct($prod_id);

        if($result == TRUE){
             $this->response([
            'status' => 200,
             'status_message' => 'Product Removed Successfully.'], REST_Controller::HTTP_OK);
        }else{
            $this->response([
            'status' => 500,
             'status_message' => 'Something Went Wrong..! Product Not Removed Successfully.'], REST_Controller::HTTP_PRECONDITION_FAILED);
        }

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
