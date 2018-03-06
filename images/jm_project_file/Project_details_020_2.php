<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');
class Regrettable_report_api extends REST_Controller
{
	 public function __construct()
   		 {
       		  parent::__construct();
		$this->load->model('Report/Regrettable_report_model');
	}

   public function get_regrettable_data_get()
   {
   		 $From_date = $_GET['From_date'];
        $To_date = $_GET['To_date'];
        $cust_id = $_GET['cust_id'];
   	 	 $response = $this->Regrettable_report_model->get_regrettable_data($From_date, $To_date,$cust_id);
         return $this->response($response);
   }

    public function sort_byBranch_get() {
        //print_r($_GET);die();
          $From_date = $_GET['From_date'];
          $To_date = $_GET['To_date'];
          $cust_id = $_GET['cust_id'];
          $branch_name = $_GET['Sort_by_branch'];
          $response = $this->Regrettable_report_model->sort_byBranch($From_date, $To_date, $branch_name, $cust_id);
         return $this->response($response);
    }
 }