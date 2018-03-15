<?php

class ManageOrder_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        //$this->load->model('search_model');
    }

    // -----------------------GET ALL MY ORDERS MODEL----------------------//
    //-------------------------------------------------------------//
    public function getMyOrders($user_id) {

        if (!(is_numeric($user_id))) {
            if ($user_id == '') {
                $response = array(
                    'status' => 500,
                    'status_message' => 'No Orders Found..!');
                return $response;
                die();
            } else {
                $response = array(
                    'status' => 500,
                    'status_message' => 'Order Placing Failed..!');
                return $response;
                die();
            }
        }

        $query = "SELECT * FROM order_tab WHERE user_id='$user_id' AND status!=0 ORDER BY order_id DESC";

        $result = $this->db->query($query);

        if ($result->num_rows() <= 0) {
            $response = array(
                'status' => 500,
                'status_message' => 'No orders found.');
        } else {
            $response = array(
                'status' => 200,
                'imageBasePath' => 'http://ordertracker.bizmo-tech-admin.com/images/order_images/',
                'status_message' => $result->result_array());
        }
        return $response;
    }

    // -----------------------GET ALL MY ORDERS MODEL----------------------//
    // -----------------------GET ALL ORDERS on admin dashboard MODEL----------------------//
    //-------------------------------------------------------------//
    public function getAllOrders() {

        $query = "SELECT * FROM order_tab WHERE status=1 ORDER BY order_id DESC";

        $result = $this->db->query($query);

        if ($result->num_rows() <= 0) {
            $response = array(
                'status' => 500,
                'status_message' => 'No orders found.');
        } else {
            $response = array(
                'status' => 200,
                'status_message' => $result->result_array());
        }
        return $response;
    }


    // -----------------------GET ALL OPEN ORDERS on admin dashboard  MODEL----------------------//
	//-------------------------------------------------------------//
	public function AllOrders(){

        $query = "SELECT * FROM order_tab WHERE status=0 ORDER BY order_id DESC";

        $result = $this->db->query($query);

        if ($result->num_rows() <= 0) {
            $response = array(
                'status' => 500,
                'status_message' => 'No orders found.');
        } else {
            $response = array(
                'status' => 200,
                'status_message' => $result->result_array());
        }
        return $response;
    }

    // -----------------------GET ALL CLOSED ORDERS on admin dashboard MODEL----------------------//
    // -----------------------GET ALL OPEN ORDERS on admin dashboard  MODEL----------------------//
    //-------------------------------------------------------------//

    // -----------------------GET ALL MY ORDERS COUNT----------------------//
    //-------------------------------------------------------------//
    public function getOrderCount($user_id){

        // -------------get active order count----------------------
        $activeCount=0;
        $active_query = $this->db->get_where('order_tab', array(//making selection
            'status' => '1',
            'user_id'   =>  $user_id
        ));
        $activeCount=$active_query->num_rows();

        // -------------get open order count----------------------
        $openCount=0;
        $open_query = $this->db->get_where('order_tab', array(//making selection
            'status' => '2',
            'user_id'   =>  $user_id
        ));
        $openCount=$open_query->num_rows();

        // -------------get close order count----------------------
        $closeCount=0;
        $close_query = $this->db->get_where('order_tab', array(//making selection
            'status' => '0',
            'user_id'   =>  $user_id
        ));
        $closeCount=$close_query->num_rows();

        $response = array(
                'status' => 200,
                'status_message' => 'Fetched orders for given UserId',
                'activeOrders'  =>  $activeCount,
                'openOrders'  =>  $openCount,
                'closeOrders'  =>  $closeCount,
            );
        return $response;
    }
    // -----------------------GET ALL ORDERS on admin dashboard MODEL----------------------//

    // -----------------------GET ALL ORDERS on admin dashboard MODEL----------------------//
    //-------ADD NEW ORDER FUNCTION--------------//
    public function addNewOrder($data) {
//        $userDetails = '';
//        $AdminEmail = '';
        $user_email = '';
        $user_username = '';
        extract($data);
        //echo(is_numeric($user_id));die();
        if (!(is_numeric($user_id))) {
            if ($user_id == '') {
                $response = array(
                    'status' => 500,
                    'status_message' => 'Order Placing Failed..!');
                return $response;
                die();
            } else {
                $response = array(
                    'status' => 500,
                    'status_message' => 'Order Placing Failed..!');
                return $response;
                die();
            }
        }

        $sql = "INSERT INTO order_tab(user_id,business_field,order_products,order_date,order_time,status) VALUES
         ('$user_id','$business_field','$prod_associated',NOW(),NOW(),'1')";
//print_r($sql);die();
        $result = $this->db->query($sql);
        $userDetails = ManageOrder_model::getUserDetails($user_id);
        $AdminEmail = ManageOrder_model::getAdminEmail();
        $user_email = $userDetails['email'];
        $user_username = $userDetails['username'];
        if ($result) {
            $order_id = $this->getNextID('order_id', 'order_tab');

        $emailfunction = ManageOrder_model::sendEmail($business_field,$order_id,$userDetails,$user_email,$user_username,$AdminEmail,$prod_associated);
        //print_r($emailfunction);        die();
        $response = array(
                'status' => 200,
                'order_id' => $order_id,
                'status_message' => 'Order Placed Successfully..!');        
        }else{
            $response = array(
                'status' => 500,
                'status_message' => 'Order Placing Failed...!');
        }
        return $response;
    }

    //---------ADD NEW ORDER FUNCTION ENDS------------------//
    //-----------fun for send email to admin for order placing--------//
    public function sendEmail($business_field, $order_id, $userDetails, $user_email, $user_username, $AdminEmail, $prod_associated) {
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
        $this->email->to($AdminEmail);
        $this->email->subject("OTP Send");
        //$this->email->message("Dear ".$username.",\nPlease click on below URL or paste into your browser to verify your Email Address\n\n <a href='".base_url()."auth/login/verify_email/".base64_encode($email)."?profile=".$profile_type."'>".base_url()."auth/login/verify_email/".base64_encode($email)."?profile=".$profile_type."</a>\n"."\n\nThanks\nAdmin Team");
        $count=1;
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
			<h3 style="font-size:15px;">Hello Admin,<br></h3>
			
			<div class="col-lg-12">
			
                  <div class="" id="All_Orders" name="All_Orders" style="height: 450px;overflow: scroll ">
                 <table class="table table-bordered table-responsive w3-small"> 
                <!-- table starts here -->
                <thead>
                  <tr class="">
                    <th class="text-center">Sr. No.</th>
                    <th class="text-center">Order No.</th>
                    <th class="text-center">Posted On</th>
                    <th class="text-center">Business Field</th>  
                  </tr>
                </thead>
                <tbody>
                  
                   <tr class="text-center">
                    <td class="text-center">'.$count.'.</td>
                    <td class="text-center">#OID-'.$order_id.'</td>
                    <td class="text-center">' .date('M d,Y') . '-' .date('h:i a') . '</td>
                    <td class="text-center">'.$business_field.'</td>
                    </tr>
                    </tbody>
                    </table>
                    </div>
                    </div>
                    </div>
                    </body>
                    </html>');
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

    //-----------fun for send email to admin for order placing--------//
    public function getAdminEmail() {
        $admin_email = '';
        $sql = "SELECT * FROM admin_tab";
        $resultnew = $this->db->query($sql);

        foreach ($resultnew->result_array() as $row) {
            $admin_email = $row['admin_email'];
        }
        return $admin_email;
    }

    public function getUserDetails($user_id) {
        $email = '';
        $username = '';
        $details = '';
        $sql = "SELECT * FROM customer_tab WHERE user_id = '$user_id'";
        $resultnew = $this->db->query($sql);

        foreach ($resultnew->result_array() as $row) {
            $email = $row['email'];
            $username = $row['username'];
        }
        $details = array(
            'email' => $email,
            'username' => $username
        );
        return $details;
    }

    //------------GET NEXT AUTO INCREMENT VALUE IN ORDER_TAB-----------------
    public function getNextID($col_name, $table_name) {


        $sql = "SELECT MAX($col_name) as id FROM $table_name";
        $resultnew = $this->db->query($sql);

        $id = "";

        foreach ($resultnew->result_array() as $row) {
            $id = $row['id'];
        }
        return $id;
    }

//-------------GET NEXT AUTO INCREMENT VALUE IN ORDER_TAB---------------*/
    //---------------delete ORder model-------------//
    function delOrder($order_id) {
        $query = "UPDATE order_tab SET status=0 WHERE order_id=" . $order_id . " ";

        if ($this->db->query($query)) {
            $response = array(
                'status' => 200,
                'status_message' => 'Order deleted Successfully.'
            );
        } else {
            //insertion failure
            $response = array(
                'status' => 500,
                'status_message' => 'Sorry..Order Deletion Failed!!!'
            );
        }

        return $response;
    }

    //----------------delete ORder ends--------------------------//
}

?>
