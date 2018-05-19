<?php

error_reporting(E_ERROR | E_PARSE);

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kuwait');   //set Kuwait's timezone
        $this->load->helper('cookie');
        
        // ------load facebook library
        $this->load->library('facebook');
    }

    public function index() {

        if(isset($_COOKIE['jumla_uname']) && isset($_COOKIE['jumla_uname'])!=''){
            Login::loginCustomer();
        }

        //start session		
        $user_id = $this->session->userdata('user_id');
        $user_name = $this->session->userdata('user_name');
        $user_role = $this->session->userdata('user_role');
        $cat_id = $this->session->userdata('cat_id');
        if (($user_id != '') || ($user_name != '') || ($user_role !='') || ($cat_id !='')) {
            redirect('user/feeds');
        }
        
        // -----------facebook login URL-------------//
        $data['authURL']=$this->facebook->login_url();
        $this->load->view('pages/login/login',$data);
    }

    //----------------------function to login---------------------------//
    public function loginCustomer() {

        if(isset($_COOKIE['jumla_uname']) && isset($_COOKIE['jumla_uname'])!=''){
            $data = array(
                'login_username' => $_COOKIE['jumla_uname'],
                'login_password' => $_COOKIE['jumla_pass']
            );
        }
        else{
            extract($_POST);   
            $data = array(
                'login_username' => $login_username,
                'login_password' => $login_password
            );

        }
//-----------api for login customer--------------------------------//
        $apiKey = 'jumla@1234';
        $path = base_url();
        $url = $path . 'api/Login_api/loginCustomer';
        //create a new cURL resource
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-API-KEY: " . $apiKey));
            //curl_setopt($ch, CURLOPT_USERPWD, "$register_username:$register_password");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
//-----------api for login customer ends here--------------------------------//

        if($response['status'] == 200){ //-------if response status is 200 it returns the login successfull
            $session_data = array(
                'user_id' => $response['user_id'],
                'user_name' => $response['user_name'],
                'user_role'=>$response['role'],
                'cat_id'=>$response['cat_id']
            );
            //start session of user if login success
            $this->session->set_userdata($session_data);//-----------session starts here----------------------//

            if(isset($login_remember)){

                $cookie_username= array( 
                    'name'   => 'jumla_uname', 
                    'value'  => $login_username, 
                    'expire' => '86400' 
                );
            //print_r($cookie);die();
                $this->input->set_cookie($cookie_username); //-------set username to coockies-------------//

                $cookie_password= array(
                 'name' => 'jumla_pass',
                 'value' => $login_password,
                 'expire' => '86400'

             );
            //print_r($cookie_password);die();
                $this->input->set_cookie($cookie_password);     //-------set username to coockies-------------//       
            }
            echo '<div class="alert alert-success" style="margin-bottom:5px">
            <strong>' . $response['status_message'] . '</strong> 
            </div>
            <script>
            window.setTimeout(function() {
               $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
                  $(this).remove(); 
                  });
                  window.location.href="' . base_url() . 'user/feeds";
                  }, 100);
                  </script>
                  ';
              }else{
                echo '<div class="alert alert-danger ">
                <strong>' . $response['status_message'] . '</strong> 
                </div>          
                ';
            }        
        }
//-----------------------function ends-----------------------------//

// ---------------function to logout------------------------//
        public function logout() {

            $user_id = $this->session->userdata('user_id');

        // Remove local Facebook session
            $this->facebook->destroy_session();
        // Remove user data from session
            $this->session->unset_userdata('userData');
        // Redirect to login page

        //if logout success then destroy session and unset session variables
            $this->session->unset_userdata(array("user_id" => "", "user_name" => "","user_role" => "","cat_id" => ""));
            $this->session->sess_destroy();

     // ----------delete cookie---------------------
            delete_cookie("jumla_uname");
            delete_cookie("jumla_pass");    

            redirect(base_url());
        }
// ---------------------function ends----------------------------------//

// ----------------facebook login code-------------------------//
        public function fblogin(){
            $userData = array();
        //echo $this->facebook->is_authenticated();
        // Check if user is logged in
       // $this->load->view('pages/login');

            if($this->facebook->is_authenticated()){
            // Get user facebook profile details
                $fbUserProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,picture');
            //print_r($fbUserProfile);die();

            // Preparing data for database insertion
                $userData['oauth_provider'] = 'facebook';
                $userData['oauth_uid'] = $fbUserProfile['id'];
                $userData['first_name'] = $fbUserProfile['first_name'];
                $userData['last_name'] = $fbUserProfile['last_name'];
                $userData['email'] = $fbUserProfile['email'];
            //$userData['gender'] = $fbUserProfile['gender'];
            //$userData['locale'] = $fbUserProfile['locale'];
            //$userData['cover'] = $fbUserProfile['cover']['source'];
                $userData['picture'] = $fbUserProfile['picture']['data']['url'];
            //$userData['link'] = $fbUserProfile['link'];
            //$userData['role'] = 1;

            // Insert or update user data
            //$userID = $this->user->checkUser($userData);

                $path = base_url();
                $url = $path.'api/FacebookUser_api/checkUser';
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $userData);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response_json = curl_exec($ch);
                curl_close($ch);
                $response = json_decode($response_json, true);
            //print_r($response_json);die();

            // Check user data insert or update status
                if ($response['status'] == 500) {
                    $data['err_msg']=$response['status_message'];

                    $data['authURL']=$this->facebook->login_url();
                    $this->load->view('pages/login/login',$data);

                } else {
            //----create session array--------//
                    $session_data = array(
                        'user_id' => $response['userID'],
                        'user_name' => $response['user_name'],
                        'user_role'=>$response['role'],
                        'cat_id'=>$response['cat_id']
                    );
            //start session of user if login success
                    $this->session->set_userdata($session_data);
                    redirect('user/feeds');
                }
            }
        }
// ------------------facebook login code ends -----------------//
    }

    ?>