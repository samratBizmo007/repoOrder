<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//error_reporting(E_ERROR | E_PARSE);
class Contact_us extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        //$data['jobs']= About_us::getRecentJobs();		
        $this->load->view('includes/header.php');
        $this->load->view('pages/static/contact_us.php');
        $this->load->view('includes/footer.php');
    }

    public function sendContactEmail() {
        extract($_POST);
        //print_r($_POST);die();
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
        $this->email->to('customercare@jobmandi.in');
        $this->email->subject("JOBMANDI-Contact Form");
        $this->email->message("<html>"
                . "<head>"
                . "</head>"
                . "<body>"
                . "<p><label><h3><b>Contact Form</label></b></h3></p>"
                . "<p><label>Contact form has been submitted by: Name:- $user_name </label></p>"
                . "<p><label>Email Id:- $email </label></p>"
                . "<p><label>Subject:- $subject</label></p>"
                . "<p><label>For The Purpose Of: $message </label></p>"
                . "</body>"
                . "</html>");
        //print_r($this->email->send());die();
        if (!$this->email->send()) {
            echo '<div class="alert alert-danger" style="margin-bottom:5px">
            <strong>Message Sending Failed.</strong> 
            </div>
            <script>
            window.setTimeout(function() {
              $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
                 $(this).remove(); 
                 location.reload();
             });
            }, 100);
            </script>';
        } else {

            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from('customercare@jobmandi.in', "Admin Team");
            $this->email->to($email);
            $this->email->subject("JOBMANDI-Customer Care");
			$this->email->message( '<html>
			<head>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link rel="stylesheet" href="http://jobmandi.in/css/bootstrap/bootstrap.min.css">
			<script src="http://jobmandi.in/css/bootstrap/jquery.min.js"></script>
			<script src="http://jobmandi.in/css/bootstrap/bootstrap.min.js"></script>
			</head>
			<body>
			<div class="container col-lg-8" style="box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important;margin:10px; font-family:Candara;">
			<img class="w3-border" style="width:100px;height:auto; margin-left:auto; margin-right: auto;" src="http://jobmandi.in/images/desktop/logo-main.png">
			<h2 style="color:#4CAF50; font-size:30px">JOBMANDI Customer Support</h2>
			<h3 style="font-size:15px;"> Your message was successfully sent!.<br><br>Thank you for contacting us, we will reply to your inquiry as soon as possible!</h3>
			<div class="col-lg-12">
			<div class="col-lg-4"></div>
			<div class="col-lg-4"></div>
			</div>
			<h4 style="font-size:15px;"><b>Thank You..!</b></h4>
			</div>
			</body></html>');
                    
            if ($this->email->send()) {
                echo '<div class="alert alert-success" style="margin-bottom:5px">
            <strong>Message Sent Successfully..!</strong> 
            </div>
            <script>
            window.setTimeout(function() {
              $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
                 $(this).remove(); 
                 location.reload();
             });
            }, 100);
            </script>';
            } else {
                echo '<div class="alert alert-danger" style="margin-bottom:5px">
            <strong>Message Sending Failed..!</strong> 
            </div>
            <script>
            window.setTimeout(function() {
              $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
                 $(this).remove(); 
                 location.reload();
             });
            }, 100);
            </script>';
            }
        }
    }

    //----------------------email verification code ends------------------------//
    //--------------------------------------------------------------------------//
}

?>