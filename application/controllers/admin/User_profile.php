<?php

//Admin Settings controller
class User_profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('includes/admin_header.php');
        $this->load->view('pages/admin/user_profile');
    }
    
    
}