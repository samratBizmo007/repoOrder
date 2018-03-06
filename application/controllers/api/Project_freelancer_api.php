<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH . '/libraries/REST_Controller.php');

class freelance_api extends REST_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('freelance/freelance_list_model');
    }

	public function get_freelancinglist_get(){
		$result = $this->freelance_list_model->get_freelancinglist();
		return $this->response($result);			
	}
    
   	public function calculate_freelancing_rating_get()
     {
     	//extract($_GET);
     	$result = $this->freelance_list_model->calculate_freelancing_rating();
     	return $this->response($result);
     }
     
	public function get_rating_get()
     {
     	//extract($_GET);
     	$result = $this->freelance_list_model->calculate_freelancing_rating();
     	return $this->response($result);
     }


        public function calculate_freelancing_Avg_rating_get()
     {
        //extract($_GET);
        $result = $this->Post_project_model-> calculate_Avg_freelancing_rating($jm_freelancer_id);
        return $this->response($result);
     }
      
}