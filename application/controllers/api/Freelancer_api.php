<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');

class Freelancer_api extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('freelancer_model/Freelancer_model');
    }
    public function getUserFeedback_get(){
        $result = $this->Freelancer_model->getUserFeedback($_GET['user_id']);
        return $this->response($result);
    }
}
