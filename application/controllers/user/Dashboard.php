<?php
//User Dashboard controller
class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();

        //start session   
		$user_id=$this->session->userdata('user_id');
		$user_name=$this->session->userdata('user_name');
		
    //check session variable set or not, otherwise logout
		if(($user_id=='') || ($user_name=='')){
			redirect('login');
		}  
	}

	public function index() {

		$this->load->view('includes/header');
		$this->load->view('pages/user/user_dashboard');
        //$this->load->view('includes/footer.php');
	}
	
	
}
?>