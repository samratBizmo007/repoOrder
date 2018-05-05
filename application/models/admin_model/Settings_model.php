<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Settings_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kuwait');   //set Kuwait's timezone
        //$this->load->model('search_model');
    }

    //-------UPDATE ADMIN EMAIL FUNCTION--------------//
    public function updateEmail($email) {

        $sql = "UPDATE admin_tab SET admin_email='$email' WHERE admin_id='1'";

        if ($this->db->query($sql)) {
            $response = array(
                'status' => 200,
                'status_message' => 'Email Updated Successfully..!');
        } else {
            $response = array(
                'status' => 500,
                'status_message' => 'Email Updation Failed...!');
        }
        return $response;
    }

    //---------UPDATE ADMIN EMAIL ENDS------------------//
        //-------UPDATE username FUNCTION--------------//
    public function updateUname($uname) {

        $sql = "UPDATE admin_tab SET username='$uname' WHERE admin_id='1'";

        if ($this->db->query($sql)) {
            $response = array(
                'status' => 200,
                'status_message' => 'Username Updated Successfully..!');
        } else {
            $response = array(
                'status' => 500,
                'status_message' => 'Username Updation Failed...!');
        }
        return $response;
    }

    //---------UPDATE ADMIN EMAIL ENDS------------------//

           //-------UPDATE Password FUNCTION--------------//
    public function updatePass($pass) {

        $sql = "UPDATE admin_tab SET password='$pass' WHERE admin_id='1'";

        if ($this->db->query($sql)) {
            $response = array(
                'status' => 200,
                'status_message' => 'Password Updated Successfully..!');
        } else {
            $response = array(
                'status' => 500,
                'status_message' => 'Password Updation Failed...!');
        }
        return $response;
    }

    //---------UPDATE ADMIN EMAIL ENDS------------------//



    //-------UPDATE USER DASHBOARD IMAGE FUNCTION--------------//
    public function updateDashboardImage($imagePath) {

        $sql = "UPDATE admin_settings SET setting_value='$imagePath' WHERE setting_name='dash_image'";

        if ($this->db->query($sql)) {
            $response = array(
                'status' => 200,
                'status_message' => 'Image Uploaded Successfully..!');
        } else {
            $response = array(
                'status' => 500,
                'status_message' => 'Image Uploading Failed...!');
        }
        return $response;
    }
    //---------UPDATE USER DASHBOARD IMAGE ENDS------------------//
    //-------update private security key-----------------//
       public function updateKey($admin_key){        
    $sql = "UPDATE admin_settings SET setting_value='$admin_key' WHERE setting_name='pass_privateKey'";

        if ($this->db->query($sql)) {
            $response = array(
                'status' => 200,
                'status_message' => 'Private Key Updated Successfully..!');
        } else {
            $response = array(
                'status' => 500,
                'status_message' => ' Private Key Updation Failed...!');
        }
        return $response;
    }
   //-------update private security key-----------------//
    // -----------------------GET ADMIN SETTINGS DETAILS----------------------//
    //-------------------------------------------------------------//
    public function getSettingDetails($setting_name) {

        $query = "SELECT * FROM admin_settings WHERE setting_name='$setting_name'";
        $result = $this->db->query($query);

        if ($result->num_rows() <= 0) {
            $response = array(
                'status' => 500,
                'status_message' => 'No data found.');
        } else {

            foreach ($result->result_array() as $key) {
                $setting_value = $key['setting_value'];
                //print_r($key);die();
            }
            $response = array(
                'status' => 200,
                'status_message' => 'Admin Settings data found',
                'setting_name' => $setting_name,
                'setting_value' => $setting_value
            );
        }
        return $response;
    }
    //---------GET ADMIN SETTINGS DETAILS ENDS------------------//
    
    // -----------------------GET ADMIN DETAILS----------------------//
    //-------------------------------------------------------------//
    public function getAdminDetails() {

        $query = "SELECT * FROM admin_tab WHERE admin_id=1";

        $result = $this->db->query($query);

        if ($result->num_rows() <= 0) {
            $response = array(
                'status' => 500,
                'status_message' => 'No data found.');
        } else {
            $response = array(
                'status' => 200,
                'status_message' => $result->result_array());
        }
        return $response;
    }

    //--------------------------------------------------------------//
    // -----------------------GET ADMIN EMAIL----------------------//
    //-------------------------------------------------------------//
    public function getAdminEmail() {
        $admin_email = '';
        $query = "SELECT * FROM admin_tab WHERE admin_id=1";

        $result = $this->db->query($query);

        if ($result->num_rows() <= 0) {
            $response = array(
                'status' => 500,
                'status_message' => 'No data found.');
        } else {
            foreach ($result->result_array() as $key) {
                $admin_email = $key['admin_email'];
            }
        }
        return $admin_email;
    }

    // -----------------------GET ADMIN EMAIL----------------------//

    //-----------FUNCTION FOR ADMIN REGISTRATION-------------------//
   public function registerCustomer($register_username, $register_email, $register_mobile_no,$user_role)
    {

          $admin_email = '';
    $checkEmail = Settings_model::checkEmail_exist($register_email);
    $checkusername = Settings_model::checkUsername_exist($register_username);
    if ($checkEmail == 0 && $checkusername == 0) {
        $data = array(
            'username' => $register_username,
            'email' => $register_email,
            'phone' => $register_mobile_no,
            'role' => $user_role
        );

        // print_r($data);die();
        if ($this->db->insert('user_tab', $data)) {
            $response = array(
                    'status' => 200, //---------insert db success code
                    'status_message' => 'Your Registration Request has been succesfully sent to JUMLA TEAM.Soon you will get Login Password on your email'
                );
            $admin_email = $this->settings_model->getAdminEmail();
            //settings_model::sendUserIs_RegisteredEmail($register_username,$register_email,$admin_email,$user_role);
           //print_r($d);die();
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


      //-----------------------function to check whether email-ID or username already exists------------------//

    public function checkUsername_exist($register_username) {
        $query = null;
        $query = $this->db->get_where('user_tab', array(//making selection
            'username' => $register_username
        ));

        if ($query->num_rows() <= 0) {
            return 0;
        } else {
            return 1;
        }
    }
  

  public function checkEmail_exist($register_email) {
    $query = null;
        $query = $this->db->get_where('user_tab', array(//making selection
            'email' => $register_email
        ));

        if ($query->num_rows() <= 0) {
            return 0;
        } else {
            return 1;
        }
    }


//-----------------------function to check whether email-ID or username already exists------------------//


public function sendUserIs_RegisteredEmail($register_username,$register_email,$admin_email,$register_role){

$role='';
if($register_role=='2'){
    $role='Admin';
}
if($register_role=='3'){
    $role='Wholesaler';
}
$config = Array(
    'protocol' => 'smtp',
    'smtp_host' => 'mx1.hostinger.in',
    'smtp_port' => '587',
            'smtp_user' => 'support@jumlakuwait.com', // change it to yours
            'smtp_pass' => 'Descartes@1990', // change it to yours
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );
 $config['smtp_crypto'] = 'tls';
        //return ($config);die();

 $this->load->library('email', $config);
 $this->email->set_newline("\r\n");
 $this->email->from('support@jumlakuwait.com', "Admin Team");
 $this->email->to($admin_email);
 $this->email->subject("New User Registered - JUMLA BUSINESS");
 $this->email->message('<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <div class="container col-lg-8" style="box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important;margin:10px; font-family:Candara;">
    <h2 style="color:#4CAF50; font-size:30px">New Request to Jumla Business!!</h2>
    <h3 style="font-size:15px;">Hello Admin,<br></h3>
    <h3 style="font-size:15px;">We have a new request for '.$role.' User Registration for Jumla Business.</h3>
    <h3 style="font-size:15px;">Following are the user details-</h3>
    <h3><b>User Name:</b> '.$register_username.'</h3>
    <h3><b>User Email:</b> '.$register_email.'</h3>
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


}

?>