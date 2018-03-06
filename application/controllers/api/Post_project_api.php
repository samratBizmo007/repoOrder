<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');

class Post_project_api extends REST_Controller 
{

	 public function __construct() {
        parent::__construct();
        $this->load->model('project_model/post_project_model');
    }

	public function Post_project_get()
	{
		$this->load->post_project_model->post_project_form_model();
		return $this->response($result);

	}
}