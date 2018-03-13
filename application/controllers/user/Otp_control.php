<?php
error_reporting(E_ERROR | E_PARSE);
class Otp_control extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

    	
        $this->load->view('pages/user/otp_user');
    }
}
?>