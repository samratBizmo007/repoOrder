<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
error_reporting(E_ERROR | E_PARSE);

//Login controller
class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $this->load->view('includes/header.php');
        $this->load->view('pages/orders/dashboard');
        $this->load->view('includes/footer.php');
    }
    
    
}