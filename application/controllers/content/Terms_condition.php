
<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

error_reporting(E_ERROR | E_PARSE);
class Terms_condition extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		
	}

	public function index(){
		//$data['jobs']= About_us::getRecentJobs();		
		$this->load->view('includes/header.php');
		$this->load->view('pages/static/terms_condition.php');
		$this->load->view('includes/footer.php');
		
	}
}
?>