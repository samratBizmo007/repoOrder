<?php


class Admin_login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kuwait');   //set Kuwait's timezone
    }

    public function index() {

    	 //$this->session->set_userdata($session_data);
        //start session		
		// $admin_id=$this->session->userdata('admin_id');
		$admin_name=$this->session->userdata('admin_name');
        $admin_role=$this->session->userdata('admin_role');
//		$user_name=$this->session->userdata('user_name');
//		//check session variable set or not, otherwise logout
    	if(($admin_name!='') || ($admin_role!='')){
			redirect('admin/dashboard');
			}
        $this->load->view('pages/admin_login');
    }

    public function adminLogin() {
        extract($_POST);
        // print_r($_POST);
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
                // 'admin_id' => $response['user_id'],
                'admin_name' => $response['user_name'],
                'admin_role' => $response['user_role']
            );
        	// print_r($session_data);
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
    
    //----------function for admin registerd user------------------//
    
    public function admin_registration()
    {
    	extract($_POST);
        //print_r($_POST);die();
        //Connection establishment, processing of data and response from REST API		
        $data = array(
            'register_username' => $register_username,
            'register_email' => $register_email,
            'register_mobile_no' => $mob_number,
            'user_role' => $user_role
        );
         // print_r($data);die();
        $path = base_url();
        $url = $path . 'api/Admin_api/registerAdmin';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        // print_r($response_json);die();
        if ($response['status'] == 500) {
            echo '<div class="alert alert-danger ">
            <strong>' . $response['status_message'] . '</strong> 
            </div>          
            ';
        } else {

            echo '<div class="alert alert-success" style="margin-bottom:5px">
            <strong>' . $response['status_message'] . '</strong> 
            </div>
            <script>
            window.setTimeout(function() {
             $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
              $(this).remove(); 
          });

      }, 2000);
      </script>
      ';
    	
    }

}

}