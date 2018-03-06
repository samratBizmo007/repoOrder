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
       // print_r($_POST);die();
    // //print_r($_POST);
    //     $data['txnid'] = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
    //     $data['email'] = $this->input->post('email');
    //     $data['phone'] = $this->input->post('mobile');
    //     $data['firstName'] = $this->input->post('firstName');
    //     $data['lastName'] = $this->input->post('lastName');
    // // $data['membership_package'] = $this->input->post('membership_package');
    //     $data['productinfo'] = $this->input->post('productinfo');
    //     $data['amount'] = $this->input->post('totalCost');
    //     $data['hash']         = '';

    //     $hash_string = MERCHANT_KEY."|".$data['txnid']."|".$data['amount']."|".$data['productinfo']."|".$data['firstName']."|".$data['email']."|||||||||||".SALT;
    // //print_r($hash_string);die();
    //     $data['hash'] = strtolower(hash('sha512', $hash_string));
    //     $data['action'] = PAYU_BASE_URL . '/_payment';        
    //     $this->load->view('pages/payment/transcation',$data);

        $amount =  $this->input->post('totalCost');
        $product_info = $this->input->post('productinfo');
        $customer_name = $this->input->post('firstName').' '.$this->input->post('lastName');
        $customer_emial = $this->input->post('email');
        $customer_mobile = $this->input->post('mobile');
        $customer_address = $this->input->post('address');
        
            //payumoney details
        
        
            $MERCHANT_KEY = "3uoXigp0"; //change  merchant with yours
            $SALT = "j93rEBf2Ah";  //change salt with yours 

            $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
            //optional udf values 
            $udf1 = '';
            $udf2 = '';
            $udf3 = '';
            $udf4 = '';
            $udf5 = '';
            
             $hashstring = $MERCHANT_KEY . '|' . $txnid . '|' . $amount . '|' . $product_info . '|' . $customer_name . '|' . $customer_emial . '|' . $udf1 . '|' . $udf2 . '|' . $udf3 . '|' . $udf4 . '|' . $udf5 . '||||||' . $SALT;
             $hash = strtolower(hash('sha512', $hashstring));
             //print_r($hashstring);
           $success = base_url() . 'payment/status';  
            $fail = base_url() . 'payment/status';
            $cancel = base_url() . 'payment/status';
            
            
             $data = array(
                'mkey' => $MERCHANT_KEY,
                'tid' => $txnid,
                'hash' => $hash,
                'amount' => $amount,           
                'name' => $customer_name,
                'productinfo' => $product_info,
                'mailid' => $customer_emial,
                'phoneno' => $customer_mobile,
                'address' => $customer_address,
                'action' => "https://sandboxsecure.payu.in", //for live change action  https://secure.payu.in
                'sucess' => $success,
                'failure' => $fail,
                'cancel' => $cancel            
            );
           //  print_r($data);
             $this->load->view('includes/header.php');       
             $this->load->view('pages/payment/transaction', $data);  
             $this->load->view('includes/footer.php');
    }

}

?>