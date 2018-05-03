<?php

error_reporting(E_ERROR | E_PARSE);

class Privacy_terms extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kuwait');   //set Kuwait's timezone
        $this->load->helper('cookie');
    }

    public function index() {

        $this->load->view('pages/privacy_terms');
    }

}

?>