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
        $result = $this->feeds_model->getTimeline($per_page,$offset);
        return $this->response($result);
    }
    //---------------------GET TIMELINE DATA END------------------------------//

    // -----------------------GET TIMELINE DATA SCROLL API----------------------//
    //-------------------------------------------------------------//
    public function getTimelineScroll_get() {
        extract($_GET);
        $result = $this->feeds_model->getTimelineScroll($limit,$start);
        return $this->response($result);
    }
    //---------------------GET TIMELINE DATA SCROLL END------------------------------//

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

}
