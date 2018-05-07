<?php

class Login extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kuwait');   //set Kuwait's timezone
        $this->load->model('admin_model/settings_model');
    }

    // -----------------------USER REGISTERATION MODEL BY MOBILE----------------------//
    //-------------------------------------------------------------//
    public function send_otpForMobile($user_name, $email_id) {

        if ($user_name == '') {
            $response = array(
                'status' => 500,
                'status_message' => 'Username Not Found..!');
            return $response;
            die();
        }

        if ($email_id == '') {
            $response = array(
                'status' => 500,
                'status_message' => 'Email Not Found..!');
            return $response;
            die();
        }

        $cust_id = "";
        $email_idRegistered = '';
        $checkEmail = login::checkEmail_exist($email_id);
        $checkusername = login::checkUsername_exist($user_name);
        //print_r($checkEmail);die();
        if ($checkEmail == 0 && $checkusername == 0) {
            $otp = rand(100000, 999999);

            $otp_function = login::sendEmailotp($user_name, $email_id, $otp);

            if ($otp_function) {
                //$otp_save_pudate =login::saveOtp($email_id,$otp); 
                $sqlselect = "SELECT email_id FROM otp_expiry WHERE email_id = '$email_id'";

                $result = $this->db->query($sqlselect);

                if ($result->num_rows() >= 1) {
                    foreach ($result->result_array() as $row) {
                        $email_idRegistered = $row['email_id'];
                    }
                }

                if ($email_id == $email_idRegistered) {

                    $query = "UPDATE otp_expiry SET otp = '$otp',user_name = '$user_name' WHERE email_id = '$email_id' AND user_name='$user_name'";

                    $result = $this->db->query($query);

                    if ($result) {
                        $response = array(
                            'status' => 200, //---------insert db success code
                            //'otp' => $otp,
                            'status_message' => 'OTP Has Been Sent To Your Email ID. Please Verify The OTP.'
                        );
                    }
                } else {
                    $query = "INSERT INTO otp_expiry(email_id,otp,create_at,user_name) VALUES ('$email_id','$otp',NOW(),'$user_name')";

                    $result = $this->db->query($query);
                    if ($result) {
                        $response = array(
                            'status' => 200, //---------insert db success code
                            //'otp' => $otp,
                            'status_message' => 'OTP Has Been Sent To Your Email ID. Please Verify The OTP.'
                        );
                    } else {
                        $response = array(
                            'status' => 500, //---------insert db success code
                            'status_message' => 'OTP Sending Failed.'
                        );
                    }
                }
            }
        } else {
            //if email-Id already regiterd then show error
            $response = array(
                'status' => 500,
                'status_message' => 'Email OR Username Already Registered. Login by same or use another Email OR Username.!!!'
            );
        }
        return $response;
    }

    // -----------------------USER REGISTERATION MODEL by mobile ends----------------------//

    // ----------------------FORGET PASSWORD MODEL-------------------------------------//
    public function getPassword($forget_email)
    {
        $query = "SELECT password FROM customer_tab WHERE email='$forget_email'";
        //echo $query;die();
        $result=$this->db->query($query);  
        if ($result->num_rows() <= 0) 
        {
            $response = array(                                             
              'status' => 500,
              'status_message' => 'Email ID not found. New user can <a class="w3-medium" href="'.base_url().'login">Register Here!</a>');                           
        } else {
            $password='';
            foreach ($result->result_array() as $row) {
                $password=$row['password'];
            }
            //echo $password;die();

            $emailSend=Login::sendPassword($forget_email,$password);

            if($emailSend['status']==200){
              $response = array(
                  'status' => 200,
                  'status_message' => 'Password has been sent to your registered Email ID.'
              );  
          }
          else{
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
public function registerCustomer($user_name, $email_id, $password, $register_mobile_no, $register_address) {
    $admin_email = '';
    $checkEmail = login::checkEmail_exist($email_id);
    $checkusername = login::checkUsername_exist($user_name);
    if ($checkEmail == 0 && $checkusername == 0) {
        $data = array(
            'username' => $user_name,
            'password' => base64_encode($password),
            'email' => $email_id,
            'mobile_no' => $register_mobile_no,
            'address' => $register_address
        );
        if ($this->db->insert('customer_tab', $data)) {
            $response = array(
                    'status' => 200, //---------insert db success code
                    'status_message' => 'Registration Successfull. Please Login With Your Registered Email-ID.'
                );
            $admin_email = $this->settings_model->getAdminEmail();
            Login::sendUserIs_RegisteredEmail($user_name,$email_id,$admin_email);
        } else {
            $response = array(
                    'status' => 500, //---------db error code 
                    'status_message' => 'Something went wrong... Registration Failed!!!'
                );
        }
    } else {
            //if email-Id already regiterd then show error
        $response = array(
            'status' => 500,
            'status_message' => 'Email-ID OR Username already registered. Login by same or try another Email-ID OR Username!!!'
        );
    }
    return $response;
}

    // -----------------------USER REGISTERATION MODEL----------------------//
public function sendUserIs_RegisteredEmail($user_name,$email_id,$admin_email){
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
 $this->email->subject("New User Registered - JUMLA BUSINESS");
 $this->email->message('<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <div class="container col-lg-8" style="box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important;margin:10px; font-family:Candara;">
    <h2 style="color:#4CAF50; font-size:30px">New User Registered to Jumla Business!!</h2>
    <h3 style="font-size:15px;">Hello Admin,<br></h3>
    <h3 style="font-size:15px;">New user has been registered to Jumla Business.</h3>
    <h3 style="font-size:15px;">Following are the user details-</h3>
    <h3><b>User Name:</b> '.$user_name.'</h3>
    <h3><b>User Email:</b> '.$email_id.'</h3>
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
public function sendPassword($email_id,$password){
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
 $this->email->subject("Current Password-JUMLA BUSINESS");
 $this->email->message('<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <div class="container col-lg-8" style="box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important;margin:10px; font-family:Candara;">
    <h2 style="color:#4CAF50; font-size:25px">Password for Jumla Business!</h2>
    <h3 style="font-size:15px;">Hello Jumla User,<br></h3>
    <h3 style="font-size:15px;">We have recieved a request to have your password for <u>Jumla Business</u>.</h3>
    <h3 style="font-size:15px;">Following is the requested password for '.$email_id.'</h3>
    <h3><b>Password:</b> '.base64_decode($password).'</h3>
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
        //print_r($this->email->print_debugger());die();
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
        $query = $this->db->get_where('customer_tab', array(//making selection
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
        $query = $this->db->get_where('customer_tab', array(//making selection
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
    // -----------------------USER LOGIN API----------------------//
    public function sendEmailotp($username, $email, $otp) {

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
        $this->email->to($email, $username);
        $this->email->subject("OTP Send");
        //$this->email->message("Dear ".$username.",\nPlease click on below URL or paste into your browser to verify your Email Address\n\n <a href='".base_url()."auth/login/verify_email/".base64_encode($email)."?profile=".$profile_type."'>".base_url()."auth/login/verify_email/".base64_encode($email)."?profile=".$profile_type."</a>\n"."\n\nThanks\nAdmin Team");

        $this->email->message('<html>
           <head>
           <meta name="viewport" content="width=device-width, initial-scale=1.0">
           <link rel="stylesheet" href="http://jobmandi.in/css/bootstrap/bootstrap.min.css">
           <script src="http://jobmandi.in/css/bootstrap/jquery.min.js"></script>
           <script src="http://jobmandi.in/css/bootstrap/bootstrap.min.js"></script>
           </head>
           <body>
           <div class="container col-lg-8" style="box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important;margin:10px; font-family:Candara;">
           <h2 style="color:#4CAF50; font-size:30px">Welcome To Joomla Business!!</h2>
           <h3 style="font-size:15px;">Hello ' . $username . ',<br></h3>
           <h3 style="font-size:15px;">Your OTP is ' . $otp . ',<br>Please Login with OTP</h3>

           <div class="col-lg-12">
           <div class="col-lg-4"></div>
           <div class="col-lg-4">

           </div>
           </body></html>');

        if ($this->email->send()) {
            $response = array(
                'status' => 200, //---------email sending succesfully 
                'status_message' => 'Email Sent Succesfully.'
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

    //----------------------email verification code ends------------------------//
//----------------------verify otp for mobile---------------------------------------//
    public function verify_otpForRegisterCustomer($register_username, $register_email, $register_password, $register_mobile_no, $register_address, $OTP_id) {
        //echo strlen($register_password);        die();
        if ($register_password == '' || strlen($register_password) < 8) {
            $response = array(
                'status' => 500,
                'status_message' => 'Password size is invalid must be greater than 8 chars!');
            return $response;
            die();
        }
        if ($register_email == '') {
            $response = array(
                'status' => 500,
                'status_message' => 'Email Not Found!');
            return $response;
            die();
        }
        if ($register_username == '') {
            $response = array(
                'status' => 500,
                'status_message' => 'Username not found!');
            return $response;
            die();
        }
        if (!(is_numeric($register_mobile_no))) {
            if ($register_mobile_no == '') {
                $response = array(
                    'status' => 500,
                    'status_message' => 'Mobile number not found!');
                return $response;
                die();
            } else {
                $response = array(
                    'status' => 500,
                    'status_message' => 'Mobile number should be numeric!');
                return $response;
                die();
            }
        }
        if (!(is_numeric($OTP_id))) {
            if ($OTP_id == '') {
                $response = array(
                    'status' => 500,
                    'status_message' => 'OTP code invalid!');
                return $response;
                die();
            } else {
                $response = array(
                    'status' => 500,
                    'status_message' => 'OTP code invalid!');
                return $response;
                die();
            }
        }
        $otp = '';
        $selectquery = "SELECT otp FROM otp_expiry WHERE email_id = '$register_email'";
        //echo $selectquery; die();
        $resultselect = $this->db->query($selectquery);
        if ($resultselect->num_rows() == 1) {

            foreach ($resultselect->result_array() as $row) {
                $otp = $row['otp'];
            }
            //echo $otp;
            //echo $OTP_id;die();
            if ($otp == $OTP_id) {
                $insertquery = "INSERT INTO customer_tab(username,password,email,mobile_no,address) VALUES "
                . "('$register_username','" . base64_encode($register_password) . "','$register_email','$register_mobile_no','$register_address')";
                //echo $insertquery; die();
                $result = $this->db->query($insertquery);
                $response = array(
                    'status' => 200,
                    'status_message' => 'Registration successfull.');
            } else {
                $response = array(
                    'status' => 500,
                    'status_message' => 'Invalid OTP. Please Validate Otp Again By Filling The Registration Form.!');
            }
        } else {
            $response = array(
                'status' => 500,
                'status_message' => 'OTP Generation Failed. Please Register Once Again..!');
        }
        return $response;
    }

    //----------------------verify otp for mobile---------------------------------------//
    //----------------------otp verification code starts here------------------------//

    function verify_otp($register_username, $register_email, $register_password, $register_mobile_no, $register_address, $OTP_id) {

        $otp = '';
        $selectquery = "SELECT otp FROM otp_expiry WHERE email_id = '$register_email'";
        //echo $selectquery; die();
        $resultselect = $this->db->query($selectquery);
        if ($resultselect->num_rows() == 1) {

            foreach ($resultselect->result_array() as $row) {
                $otp = $row['otp'];
            }
            //echo $otp;
            //echo $OTP_id;die();
            if ($otp == $OTP_id) {
                $insertquery = "INSERT INTO customer_tab(username,password,email,mobile_no,address) VALUES "
                . "('$register_username','" . base64_encode($register_password) . "','$register_email','$register_mobile_no','$register_address')";
                //echo $insertquery; die();
                $result = $this->db->query($insertquery);
                $response = array(
                    'status' => 200,
                    'status_message' => 'Registration successfull.');
            } else {
                $response = array(
                    'status' => 500,
                    'status_message' => 'Invalid OTP. Please Validate Otp Again By Filling The Registration Form.!');
            }
        } else {
            $response = array(
                'status' => 500,
                'status_message' => 'OTP Generation Failed. Please Register Once Again..!');
        }
        return $response;
    }

    //-------------------------------------------------------------//
    public function loginCustomer($user_name, $password) {
        //sql query to check login credentials
        $pass = base64_encode($password);
        $query = "SELECT * FROM customer_tab WHERE (email='$user_name' || username='$user_name') AND password='$pass'";
        //echo $query;die();
        $result = $this->db->query($query);
        $user_id = '0';
        $privilege = '';
        //if credentials are true, their is obviously only one record
        if ($result->num_rows() == 1) {

            foreach ($result->result_array() as $row) {
                $user_name = $row['username'];
                $user_id = $row['user_id'];
            }

            if ($result) {
                $sql = "UPDATE customer_tab SET active='1' WHERE user_id='$user_id'";
                //echo $sql;die();
                $result = $this->db->query($sql);

                //response with values to be stored in sessions if update session_bool true
                $response = array(
                    'status' => 200,
                    'user_id' => $user_id,
                    'user_name' => $user_name,
                    'status_message' => 'Login Successfull'
                );
            } else {
                $response = array(
                    'status' => 500,
                    'user_id' => $user_id,
                    'user_name' => $user_name,
                    'status_message' => 'Error to start session for ' . $user_name . ' !!!',
                );
            }
        } else {
            //login failed response
            $response = array(
                'status' => 500,
                'status_message' => 'Sorry..Login credentials are incorrect!!!',
                'user_id' => $user_id,
                'user_name' => $user_name,
            );
        }
        return $response;
    }

    //----------------------------LOGIN END------------------------------//
    // -----------------------Admin LOGIN ----------------------//
    //-------------------------------------------------------------//
    public function adminLogin($user_name, $password,$role) {
       
        
        //sql query to check login credentials
        $pass = base64_encode($password);
        if($role==1)
        {
            $query = "SELECT * FROM admin_tab WHERE (admin_email='$user_name' || username='$user_name') AND password='$password'";
        }
        else{
            // ------check username registration request status
            $stat=Login::checkPassword_status($user_name);
            if($stat['status']==500){
                return $stat;die();
            }
            else{
                $query = "SELECT * FROM user_tab WHERE (email='$user_name' || username='$user_name') AND password='$pass' AND role='$role'";
            }          

       } //echo $query;die();
       $result = $this->db->query($query);
       $user_name ="";
        //if credentials are true, their is obviously only one record
       if ($result->num_rows() == 1) {
           foreach ($result->result_array() as $row) {
            $user_name = $row['username'];
                // $user_id = $row['user_id'];
        }

            //response with values to be stored in sessions if update session_bool true
        $response = array(
            'status' => 200,
            'user_name' => $user_name,
            'status_message' => 'Login Successfull.'
        );
    } else {
            //login failed response
        $response = array(
            'status' => 500,
            'user_name' => $user_name,
            'status_message' => 'Sorry..Login credentials are incorrect!!!'
        );
    }
    return $response;
}

// --function to check password request status---------//

public function checkPassword_status($username)
{
    $sql = "SELECT * FROM user_tab WHERE username='$username'";
    $result = $this->db->query($sql);
    $status ="";
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

}
else {
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
    $sql = "UPDATE customer_tab SET active='0' WHERE user_id='$user_id'";
        //echo $sql;die();
    $this->db->query($sql);
    return $this->db->affected_rows();
}

    //-------End Logout user--------------------------------//
    //----------------------------LOGIN END------------------------------//
}
