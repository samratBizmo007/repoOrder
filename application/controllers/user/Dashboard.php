<?php
//User Dashboard controller
class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $this->load->view('includes/header');
        $this->load->view('pages/user/user_dashboard');
        //$this->load->view('includes/footer.php');
    }
    
    
}
?>