<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Contact_model extends CI_Model{

	public function __construct() {
		parent::__construct();
        //$this->load->model('search_model');
	}

public function sendVerificatinEmail($user_name,$email,$profile_type){

		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'mx1.hostinger.in',
			'smtp_port' => '587',
     		'smtp_user' => 'customercare@jobmandi.in', // change it to yours
     		'smtp_pass' => 'Descartes@1990', // change it to yours
     		'mailtype' => 'html',
     		'charset' => 'utf-8',
     		'wordwrap' => TRUE
     	);
		$config['smtp_crypto'] = 'tls';
		//return ($config);die();

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('customercare@jobmandi.in', "Admin Team");
		$this->email->to($email,$username);  
		$this->email->subject("JOBMANDI-Email Verification");
		$this->email->message("Dear ".$username.",\nPlease click on below URL or paste into your browser to verify your Email Address\n\n <a href='".base_url()."auth/login/verify_email/".base64_encode($email)."?profile=".$profile_type."'>".base_url()."auth/login/verify_email/".base64_encode($email)."?profile=".$profile_type."</a>\n"."\n\nThanks\nAdmin Team");

		if (!$this->email->send()) {
			$response=array(
				'status' => 0,	//---------email sending failed
				'status_message' =>'Email Sending Failed.'
			);
		} else {
			$response=array(
				'status' => 200,	//---------email send succesfully
				'status_message' =>'Email Sent Succesfully.'
			);
		}
		return $response;

	}
}