<?php
error_reporting(E_ERROR | E_PARSE);
class Login extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kuwait');   //set Kuwait's timezone
        $this->load->model('admin_model/settings_model');
    }

    
    // ----------------------FORGET PASSWORD MODEL-------------------------------------//
    public function getPassword($forget_email) {

        $query = "SELECT * FROM user_tab WHERE email='$forget_email'";
        $result = $this->db->query($query);

        if ($result->num_rows() <= 0) {
            $response = array(
                'status' => 412,
                'status_message' => 'Email ID not registered. New user can <a class="w3-medium" href="' . base_url() . 'registration">Register Here!</a>');
        } else {
            $password = '';
            $role = '';
            $fb_id = '';
            $status = '';
            foreach ($result->result_array() as $row) {
                $password = $row['password'];
                $role = $row['role'];
                $fb_id = $row['fb_id'];
                $status = $row['status'];
            }
            //echo $password;die();
        // if user is fb user
            if($fb_id!=0){
                $response = array(
                    'status' => 412,
                    'status_message' => 'You have registered to Jumla Business via Facebook. So try logging in by Facebook.');
                return $response;
                die();
            }

            // if registration request pending
            if($role==2 && $status==0){
                $response = array(
                    'status' => 412,
                    'status_message' => 'Your registration request is pending from Jumla Business Admin.');
                return $response;
                die();
            }

            // if registration request rejected
            if($role==2 && $status==2){
                $response = array(
                    'status' => 412,
                    'status_message' => 'Your registration request has been rejected by Jumla Business Admin.');
                return $response;
                die();
            }

            $emailSend = Login::sendPassword($forget_email, $password);
            //print_r($emailSend);die();
            if ($emailSend['status'] == 200) {
                $response = array(
                    'status' => 200,
                    'status_message' => 'Password has been sent to your registered Email ID.'
                );
            } else {
                $response = array(
                    'status' => 500,
                    'status_message' => 'Email Error. Password sending failed.'
                );
            }
        }
        return $response;
    }

    // ----------------------FORGET PASSWORD MODEL ENDS-------------------------------------//
    // -----------------------USER REGISTERATION MODEL----------------------//
    public function registerCustomer($data) {
        extract($data);
        $admin_email = '';
        $checkEmail = login::checkEmail_exist($register_email);
     //-----------checking the email id is already registered in db
        //echo $checkEmail ; die();
        $checkusername = login::checkUsername_exist($register_username); 
    //-----------checking the username id is already registered in db

        if ($checkEmail == 0 && $checkusername == 0) { 
    //------------checking email and username is registerd true then goes to the else statement

            // get userID by auto increent query--------------//
            $autoIncr_sql="SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'repoorder' AND TABLE_NAME='user_tab'";
            $autoIncr_sqlQuery = $this->db->query($autoIncr_sql);
            $user_id='';
            foreach ($autoIncr_sqlQuery->result_array() as $row) {
                $user_id = $row['AUTO_INCREMENT'];
            }
            // -------------------function ends here-------------------//
            $unique_id=$register_email.'|'.$user_id.'|'.$register_username;
        //--------------if it returns the false then goes to the insert data in db 
            $data = array(
                'role' => $user_role,
                'username' => $register_username,
                'password' => base64_encode($register_password),
                'email' => $register_email,
                'phone' => $register_mobile_no,
                'country_code' => $register_countryCode,
                'unique_id' =>  base64_encode($unique_id)
            );
        if ($this->db->insert('user_tab', $data)) { //-----insert query for register customer
            return TRUE;            //------if insert returns true  
        } else {
            return FALSE;           //-------if not insert returns false
        }
    } else {
            //if email-Id already regiterd then show error
        return 500;   
    }
        //return $response;
}

    //-----------FUNCTION FOR Seller REGISTRATION-------------------//
public function registerSeller($data) {
    extract($data);
    
    $admin_email = '';
    $checkEmail = login::checkEmail_exist($register_email);
     //-----------checking the email id is already registered in db
    $checkusername = login::checkUsername_exist($register_username);
        //-----------checking the username id is already registered in db

    if ($checkEmail == 0 && $checkusername == 0) {
            //------------checking email and username is registerd true then goes to the else statement
        // get userID by auto increent query--------------//
        $autoIncr_sql="SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'repoorder' AND TABLE_NAME='user_tab'";
        $autoIncr_sqlQuery = $this->db->query($autoIncr_sql);
        $user_id='';
        foreach ($autoIncr_sqlQuery->result_array() as $row) {
            $user_id = $row['AUTO_INCREMENT'];
        }
            // -------------------function ends here-------------------//
        $unique_id=$register_email.'|'.$user_id.'|'.$register_username;

        //--------------if it returns the false then goes to the insert data in db 
        $data = array(
            'username' => $register_username,
            'email' => $register_email,
            'phone' => $register_mobile_no,
            'country_code' => $register_countryCode,
            'role' => $user_role,
            'cat_id'=>$cat_id,
            'unique_id' =>  base64_encode($unique_id)
        );

            // print_r($data);die();
        if ($this->db->insert('user_tab', $data)) {  //-----insert query for register customer
            //------------getting the admin email id from admin table
            $admin_email = $this->settings_model->getAdminEmail();
            
            //-----------sending email to the admin for user is registred to jumla business
            login::sendUserIs_RegisteredEmail($register_username,$register_email,$admin_email,$user_role);
            
            return TRUE; //------if insert returns true  
        } else {

            return FALSE; //------if not insert returns false  
        }
    } else {
            //if email-Id already regiterd then show error
        return 500;
    }
        //return $response;
}

    // -----------------------USER REGISTERATION MODEL----------------------//
public function sendUserIs_RegisteredEmail($user_name, $email_id, $admin_email,$user_role) {
    $role='Customer';
    if($user_role=='2'){
        $role='Saler';
    }
    $config = Array(
        'protocol' => 'smtp',
        'smtp_host' => 'mx1.hostinger.in',
        'smtp_port' => '587',
            'smtp_user' => 'customercare@jumlakuwait.com', // change it to yours
            'smtp_pass' => 'Descartes@1990', // change it to yours
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );
    $config['smtp_crypto'] = 'tls';
        //return ($config);die();

    $this->load->library('email', $config);
    $this->email->set_newline("\r\n");
    $this->email->from('customercare@jumlakuwait.com', "Admin Team");
    $this->email->to($admin_email);
    $this->email->subject("New User - JUMLA BUSINESS");
    $this->email->message('<html>
        <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>
        <body>
        <div class="container col-lg-8" style="box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important;margin:10px; font-family:Candara;">
        <h2 style="color:#4CAF50; font-size:30px">New User Registered on Jumla Business.</h2>
        <h3 style="font-size:15px;">Hello Admin,<br></h3>
        <h3 style="font-size:15px;">New user has been registered on Jumla Business.</h3>
        <h3 style="font-size:15px;">Following are the user details-</h3>
        <h3>Registered as: ' . $role . '</h3>
        <h3>Username: ' . $user_name . '</h3>
        <h3>Email: ' . $email_id . '</h3>
        <div class="col-lg-12">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">

        </div>
        </body></html>');

    if ($this->email->send()) {
        $response = array(
                'status' => 200, //---------email sending succesfully 
                'status_message' => 'Email Sent Successfully.',
            );
    } else {
            //print_r($this->email->print_debugger());die();
        $response = array(
                'status' => 500, //---------email send failed
                'status_message' => 'Email Sending Failed.'
            );
    }
    return $response;
}
    // -----------------------------------------------------------------------------//

    // -----------------------PASSWORD EMAIL MODEL----------------------//
public function sendPassword($email_id, $password) {
    $config = Array(
        'protocol' => 'smtp',
        'smtp_host' => 'mx1.hostinger.in',
        'smtp_port' => '587',
            'smtp_user' => 'customercare@jumlakuwait.com', // change it to yours
            'smtp_pass' => 'Descartes@1990', // change it to yours
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );
    $config['smtp_crypto'] = 'tls';
        //return ($config);die();

    $this->load->library('email', $config);
    $this->email->set_newline("\r\n");
    $this->email->from('customercare@jumlakuwait.com', "Admin Team");
    $this->email->to($email_id);
    $this->email->subject("Password Request-JUMLA BUSINESS");
    $this->email->message('<html>
        <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>
        <body>
        <div class="container col-lg-8" style="box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important;margin:10px; font-family:Candara;">
        <h2 style="color:#4CAF50; font-size:25px">Password for Jumla Business!</h2>
        <h3 style="font-size:15px;">Hello Jumla User,<br></h3>
        <h3 style="font-size:15px;">We have recieved a request to have your password for <u>Jumla Business</u>.</h3>
        <h3 style="font-size:15px;">Following is the requested password for ' . $email_id . '</h3>
        <h3>Password: '.base64_decode($password).'</h3>
        <br><br>
        <h5>Note: If you did not make this request, then kindly ignore this message.</h5>
        <div class="col-lg-12">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">

        </div>
        </body></html>');

    if ($this->email->send()) {
        $response = array(
                'status' => 200, //---------email sending succesfully 
                'status_message' => 'Email Sent Successfully.',
            );
    } else {
           // print_r($this->email->print_debugger());die();
        $response = array(
                'status' => 500, //---------email send failed
                'status_message' => 'Email Sending Failed.'
            );
    }
    return $response;
}

    // ---------------------PASSWORD EMAIL MODEL ENDS--------------------------//
    // -----------------------USER REGISTERATION MODEL----------------------//
public function getNextID($col_name, $table_name) {


    $sql = "SELECT MAX($col_name) as id FROM $table_name";
    $resultnew = $this->db->query($sql);

    $id = "";

    foreach ($resultnew->result_array() as $row) {
        $id = $row['id'];
    }
    return $id;
}

    //-------------------------------------------------------------//
    //-----------------------function to check whether username already exists------------------//

function checkEmail_exist($email_id) {
    $query = null;
        // ------------ check email exist 
        $query = $this->db->get_where('user_tab', array(//making selection
            'email' => $email_id
        ));

        if ($query->num_rows() <= 0) {
            return 0;
        } else {
            return 1;
        }
    }

    //-----------------------function to check whether email-ID or username already exists------------------//

    public function checkUsername_exist($user_name) {
        $query = null;
        $query = $this->db->get_where('user_tab', array(//making selection
            'username' => $user_name
        ));

        if ($query->num_rows() <= 0) {
            return 0;
        } else {
            return 1;
        }
    }

    public function checkEmail_existForOtp($email_id) {
        $query = $this->db->get_where('otp_expiry', array(//making selection
            'email_id' => $email_id
        ));

        if ($query->num_rows() > 0) {
            return 0;
        } else {
            return 1;
        }
    }

//-----------------------function to check whether email-ID or username already exists------------------//


    //-------------------------------------------------------------//
    public function loginCustomer($data) {
        extract($data);
        
        //sql query to check login credentials
        $pass = base64_encode($login_password); //---------set tne login password value in base 64 encode format to pass variable
        $query = "SELECT * FROM user_tab WHERE (email='$login_username' || username='$login_username') AND password='$pass'";
        //---------getting the info from user tab  against the email username and password
        //echo $query;die();
        $result = $this->db->query($query);
        $user_id = '0';
        $user_name = '';
        $role = '';
        $privilege = '';
        $cat_id ='';
        //if credentials are true, their is obviously only one record
        if ($result->num_rows() == 1) {

            foreach ($result->result_array() as $row) { //------getting the username, userid, role and catid from user_tab
                $user_name = $row['username'];
                $user_id = $row['unique_id'];
                $role = $row['role'];
                $cat_id = $row['cat_id'];

            }

            if ($result) {
                //-----------if query is successfully executed the following condiion is true
                //response with values to be stored in sessions if update session_bool true
                $response = array(
                    'status' => 200,
                    'user_id' => $user_id,
                    'user_name' => $user_name,
                    'role' => $role,
                    'cat_id'=>$cat_id,
                    'status_message' => 'Login Successfull'
                );
            } else { 
                //-----------if query is not executed it retuns the error message as below.
                $response = array(
                    'status' => 500,
                    'user_id' => $user_id,
                    'user_name' => $user_name,
                    'status_message' => 'Error to start session for ' . $user_name . ' !!!'
                );
            }
        } else {
            //---------if the passing parameters are not correct the following message is retuns.
            //login failed response
            $response = array(
                'status' => 412,
                'status_message' => 'Sorry..Login credentials are incorrect!!!',
                'user_name' => $user_name
            );
        }
        return $response;
    }

    //----------------------------LOGIN END------------------------------//
    // -----------------------Admin LOGIN ----------------------//
    //-------------------------------------------------------------//
    public function adminLogin($user_name, $password) {
        //sql query to check login credentials
        $pass = base64_encode($password);
        $query = "SELECT * FROM admin_tab WHERE (admin_email='$user_name' || username='$user_name') AND password='$password'";
        //echo $query;die();
        $result = $this->db->query($query);
        $admin_id = '0';
        $privilege = '';
        //if credentials are true, their is obviously only one record
        if ($result->num_rows() == 1) {

            foreach ($result->result_array() as $row) {
                $user_name = $row['username'];
                $admin_id = $row['admin_id'];
            }

            //response with values to be stored in sessions if update session_bool true
            $response = array(
                'status' => 200,
                'user_id' => $admin_id,
                'user_name' => $user_name,
                'status_message' => 'Login Successfull'
            );
        } else {
            //login failed response
            $response = array(
                'status' => 500,
                'status_message' => 'Sorry..Login credentials are incorrect!!!',
                'user_id' => $admin_id,
                'user_name' => $user_name,
            );
        }
        return $response;
    }


// --function to check password request status---------//

    public function checkPassword_status($username) {
        $sql = "SELECT * FROM user_tab WHERE username='$username'";
        $result = $this->db->query($sql);
        $status = "";
        //if credentials are true, their is obviously only one record
        if ($result->num_rows() == 1) {
            foreach ($result->result_array() as $row) {
                $status = $row['status'];
                // $user_id = $row['user_id'];
            }

            switch ($status) {
                case '0':
                $response = array(
                    'status' => 500,
                    'user_name' => $username,
                    'status_message' => 'Your Registration Request is still Pending. Please wait till you get Confirmation from Jumla Team on your Email.'
                );
                break;

                case '2':
                $response = array(
                    'status' => 500,
                    'user_name' => $username,
                    'status_message' => 'Your Registration Request has been rejected by our Jumla Team. Kindly contact to Jumla Admin Team.'
                );
                break;

                default:
                $response = array(
                    'status' => 200,
                    'user_name' => $username,
                    'status_message' => 'Your Registration Request has approved. Kindly check your Email for your password.'
                );
                break;
            }
        } else {
            //login failed response
            $response = array(
                'status' => 500,
                'user_name' => $username,
                'status_message' => 'Account does not exists!'
            );
        }
        return $response;
    }

//  function ends
    //--------------Logout User-----------------------------//
    function logout_user($user_id) {
        $sql = "UPDATE customer_tab SET active='0' WHERE unique_id='$user_id'";
        //echo $sql;die();
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    //-------End Logout user--------------------------------//
    //----------------------------LOGIN END------------------------------//
}
