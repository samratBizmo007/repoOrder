<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

//error_reporting(E_ERROR | E_PARSE);
class Transaction extends CI_Controller
{
	public function __construct(){
		parent::__construct();

		//start session		
		// $user_id=$this->session->userdata('user_id');
		// $user_name=$this->session->userdata('user_name');
		// $privilege=$this->session->userdata('privilege');

		// //check session variable set or not, otherwise logout
		// if(($user_id=='') || ($user_name=='') || ($privilege=='')){
		// 	redirect('role_login');
		// }

	}
public function index() {
    //print_r($_POST);
    $data['txnid'] = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
    $data['email'] = $this->input->post('email');
    $data['phone'] = $this->input->post('mobile');
    $data['firstName'] = $this->input->post('firstName');
    $data['lastName'] = $this->input->post('lastName');
    // $data['membership_package'] = $this->input->post('membership_package');
    $data['productinfo'] = $this->input->post('productinfo');
    $data['amount'] = $this->input->post('totalCost');
    $data['hash']         = '';
     // empty($posted['txnid'])
     //      || empty($posted['amount'])
     //      || empty($posted['firstname'])
     //      || empty($posted['email'])
     //      || empty($posted['phone'])
     //      || empty($posted['productinfo'])
     //      || empty($posted['surl'])
     //      || empty($posted['furl'])
     //      || empty($posted['service_provider'])
    //Below is the required format need to hash it and send it across payumoney page. UDF means User Define Fields.
    //$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
    $hash_string = MERCHANT_KEY."|".$data['txnid']."|".$data['amount']."|".$data['productinfo']."|".$data['firstName']."|".$data['email']."||||||||||".SALT;
    //print_r($hash_string);die();
    $data['hash'] = strtolower(hash('sha512', $hash_string));
    $data['action'] = PAYU_BASE_URL . '/_payment';        
    $this->load->view('pages/payment/transcation',$data);
   
}

	// public function index(){
		
 //                        $this->load->view('includes/header.php');
	// 		$this->load->view('pages/payment/transcation.php');
 //                   	$this->load->view('includes/footer.php');
	// }
	

}

?>