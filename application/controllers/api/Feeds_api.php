<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');

class Feeds_api extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('feeds_model/feeds_model');
        date_default_timezone_set('Asia/Kolkata'); //set Kuwait's timezone
    }

    // -----------------------ALL ORDERS API----------------------//
    //-------------------------------------------------------------//
    public function AllOrders_get() {
        extract($_GET);
        $result = $this->feeds_model->AllOrders($per_page, $offset);
        return $this->response($result);
    }

    //---------------------ALL ORDERS END------------------------------//
    // -----------------------ALL ORDERS API----------------------//
    //-------------------------------------------------------------//
    public function AllOpen_Orders_get() {
        extract($_GET);
        $result = $this->feeds_model->AllOpen_Orders();
        return $this->response($result);
    }

    //---------------------ALL ORDERS END------------------------------//
    // -----------------------ALL closed ORDERS API----------------------//
    //-------------------------------------------------------------//
    public function AllClosed_Orders_get() {
        extract($_GET);
        $result = $this->feeds_model->AllClosed_Orders();
        return $this->response($result);
    }

    //---------------------ALL Closed ORDERS END------------------------------//
    // -----------------------REOPEN ORDERS API----------------------//
    //-------------------------------------------------------------//
    public function reOpen_Orders_get() {
        extract($_GET);
        $result = $this->feeds_model->reOpen_Orders($order_id);
        return $this->response($result);
    }

    //---------------------REOPEN ORDERS END------------------------------//
    // -----------------------DELETE MY ORDERS API----------------------//
    //-------------------------------------------------------------//
    public function closeOrder_get() {
        extract($_GET);
        $result = $this->feeds_model->closeOrder($order_id);
        return $this->response($result);
    }

    //---------------------DELETE MY ORDERS END------------------------------//
    public function regretProduct_get() {
        extract($_GET);
        $result = $this->feeds_model->regretProduct($prod_no, $order_id);
        return $this->response($result);
    }

    // -----------------------ALL Statistics API----------------------//
    //-------------------------------------------------------------//
    public function getStatistics_get() {
        //extract($_GET);
        $result = $this->feeds_model->getStatistics();
        return $this->response($result);
    }

    //---------------------ALL Statistics END------------------------------//
    // -----------------------GET TIMELINE DATA API----------------------//
    //-------------------------------------------------------------//
    public function getTimeline_get() {
        extract($_GET);
        $result = $this->feeds_model->getTimeline($per_page, $offset);
        return $this->response($result);
    }

    //---------------------GET TIMELINE DATA END------------------------------//
    // -----------------------GET TIMELINE DATA FOR ADMIN API----------------------//
    //-------------------------------------------------------------//
    public function getAdminTimelineScroll_get() {
        extract($_GET);
        $result = $this->feeds_model->getTimelineAdmin($limit, $start, $sortBy);
        return $this->response($result);
    }

    //---------------------GET TIMELINE DATA FOR ADMIN END------------------------------//
    // -----------------------GET TIMELINE DATA SCROLL API----------------------//
    //-------------------------------------------------------------//
    public function getTimelineScroll_get() {
        extract($_GET);
        //------------checking the limit is empty or numeric------------//

        if (!(is_numeric($limit))) {
            if (empty($limit)) {
                $this->response([
                    'status' => 500,
                    'status_message' => 'Data Not Found.!'], REST_Controller::HTTP_PRECONDITION_FAILED);
            } else {
                $this->response([
                    'status' => 500,
                    'status_message' => 'Limit should be numeric!'], REST_Controller::HTTP_PRECONDITION_FAILED);
            }
        }
        //--------------------ends---------------------------------//
        //------------checking the limit is empty or numeric------------//

        if (!(is_numeric($start))) {
            if (empty($start)) {
                $this->response([
                    'status' => 500,
                    'status_message' => 'Data Not Found.!'], REST_Controller::HTTP_PRECONDITION_FAILED);
            } else {
                $this->response([
                    'status' => 500,
                    'status_message' => 'Start value should be numeric!'], REST_Controller::HTTP_PRECONDITION_FAILED);
            }
        }
        //--------------------ends---------------------------------//
        $result = $this->feeds_model->getTimelineScroll($limit, $start);
        //return $this->response($result);
        switch ($result['status']) {
            case '200': //-----------------if response is 200 it returns login successful
                $this->response([
                    'status' => 200,
                    'PRODUCTIMAGE_PATH' => PRODUCTIMAGE_PATH,
                    'PROFILEIMAGEPATH' => PROFILEIMAGE_PATH,
                    'status_message' => $result['status_message']], REST_Controller::HTTP_OK);
                break;

            case '500': //-----------------if response is 500 it returns error message
                $this->response([
                    'status' => 500,
                    'status_message' => 'Oops! No more Feeds available.'], REST_Controller::HTTP_PRECONDITION_FAILED);
                break;

            default:
                $this->response([
                    'status' => 500,
                    'status_message' => "Something went wrong. Request was not send...!!!"], REST_Controller::HTTP_PRECONDITION_FAILED);
                break;
        }
    }

    //---------------------GET TIMELINE DATA SCROLL END------------------------------//

    public function getTimelineByCategory_get() {
        extract($_GET);

        //------------checking the limit is empty or numeric------------//

        if (!(is_numeric($limit))) {
            if (empty($limit)) {
                $this->response([
                    'status' => 500,
                    'status_message' => 'Data Not Found.!'], REST_Controller::HTTP_PRECONDITION_FAILED);
            } else {
                $this->response([
                    'status' => 500,
                    'status_message' => 'Limit should be numeric!'], REST_Controller::HTTP_PRECONDITION_FAILED);
            }
        }
        //--------------------ends---------------------------------//
        //------------checking the limit is empty or numeric------------//

        if (!(is_numeric($start))) {
            if (empty($start)) {
                $this->response([
                    'status' => 500,
                    'status_message' => 'Data Not Found.!'], REST_Controller::HTTP_PRECONDITION_FAILED);
            } else {
                $this->response([
                    'status' => 500,
                    'status_message' => 'Start value should be numeric!'], REST_Controller::HTTP_PRECONDITION_FAILED);
            }
        }
        //------------checking the cat_id is empty or numeric------------//

        if (!(is_numeric($cat_id))) {
            if (empty($cat_id)) {
                $this->response([
                    'status' => 500,
                    'status_message' => 'Data Not Found.!'], REST_Controller::HTTP_PRECONDITION_FAILED);
            } else {
                $this->response([
                    'status' => 500,
                    'status_message' => 'Category value should be numeric!'], REST_Controller::HTTP_PRECONDITION_FAILED);
            }
        }
        //--------------------ends---------------------------------//
        $result = $this->feeds_model->getTimelineByCategory($limit, $start, $cat_id);
        //return $this->response($result);
        switch ($result['status']) {
            case '200': //-----------------if response is 200 it returns login successful
                $this->response([
                    'status' => 200,
                    'PRODUCTIMAGE_PATH' => PRODUCTIMAGE_PATH,
                    'PROFILEIMAGEPATH' => PROFILEIMAGE_PATH,
                    'status_message' => $result['status_message']], REST_Controller::HTTP_OK);
                break;

            case '500': //-----------------if response is 500 it returns error message
                $this->response([
                    'status' => 500,
                    'status_message' => 'Oops! No more Feeds available.'], REST_Controller::HTTP_PRECONDITION_FAILED);
                break;

            default:
                $this->response([
                    'status' => 500,
                    'status_message' => "Something went wrong. Request was not send...!!!"], REST_Controller::HTTP_PRECONDITION_FAILED);
                break;
        }
    }

    // -----------------------GET TIMELINE ROW COUNT API----------------------//
    //-------------------------------------------------------------//
    public function getTimelineRows_get() {
        //extract($_GET);
        $result = $this->feeds_model->numRows();
        return $this->response($result);
    }

    //---------------------GET TIMELINE ROW COUNT END------------------------------//

    public function all_ActiveOrdersCount_get() {
        $result = $this->feeds_model->all_ActiveOrdersCount();
        return $this->response($result);
    }

    public function AllOpen_OrdersCount_get() {
        $result = $this->feeds_model->AllOpen_OrdersCount();
        return $this->response($result);
    }

    public function AllClosed_OrdersCount_get() {
        $result = $this->feeds_model->AllClosed_OrdersCount();
        return $this->response($result);
    }

    //--------fun for delete feeds from admin side-----------------------//

    public function removeProduct_get() {
        extract($_GET);
        $result = $this->feeds_model->removeProduct($prod_id);
        return $this->response($result);
    }

//--------fun for delete feeds from admin side-----------------------//
    //--------fun to  mark post as featured-----------------------//

    public function markFeatured_get() {
        extract($_GET);
        $result = $this->feeds_model->markFeatured($prod_id);
        return $this->response($result);
    }

//--------fun to  mark post as featured-----------------------//
    //--------fun to  mark post as unfeatured-----------------------//

    public function markUnfeatured_get() {
        extract($_GET);
        $result = $this->feeds_model->markUnfeatured($prod_id);
        return $this->response($result);
    }

//--------fun to  mark post as unfeatured-----------------------//
}
