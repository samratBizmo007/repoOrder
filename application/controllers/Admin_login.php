<?php


class Admin_login extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

    	 //$this->session->set_userdata($session_data);
        //start session		
		$admin_id=$this->session->userdata('admin_id');
		$admin_name=$this->session->userdata('admin_name');
//		$user_name=$this->session->userdata('user_name');
//		//check session variable set or not, otherwise logout
    	if(($admin_id!='') || ($admin_name!='')){
			redirect('admin/dashboard');
			}
        $this->load->view('pages/admin_login');
    }

    public function adminLogin() {
        extract($_POST);
        //print_r($_POST);
        //die();
        //Connection establishment, processing of data and response from REST API		
        $data = array(
            'login_username' => $login_username,
            'login_password' => $login_password
                //'login_remember' => $remember_me
        );
        //print_r($data);die();
        $path = base_url();
        $url = $path . 'api/Login_api/adminLogin';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
//print_r($response_json);die();
        //API processing end
        if ($response['status'] == 500) {
            echo '<div class="alert alert-danger ">
            <strong>' . $response['status_message'] . '</strong> 
            </div>			
            ';
        } else {
            //----create session array--------//
            $session_data = array(
                'admin_id' => $response['user_id'],
                'admin_name' => $response['user_name']
            );
        	
            //start session of user if login success
            $this->session->set_userdata($session_data);
//        	
 			//redirect('admin/dashboard');
            echo '<div class="alert alert-success" style="margin-bottom:5px">
            <strong>' . $response['status_message'] . '</strong> 
            </div>
            <script>
            window.setTimeout(function() {
               $(".alert").fadeTo(500, 0).slideUp(500, function(){
                  $(this).remove(); 
              });
              window.location.href="' . base_url() . 'admin/dashboard";
          }, 100);
          </script>
          ';
          
        }
    }

    public function logout() {
        $admin_id=$this->session->userdata('admin_id');
        $admin_name=$this->session->userdata('admin_name');
        //if logout success then destroy session and unset session variables
        //if logout success then destroy session and unset session variables
        $this->session->unset_userdata(array("admin_id" => "", "admin_name" => ""));
        $this->session->sess_destroy();

        redirect(admin_login);
    }

}
