<?php

class ManageOrder_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        //$this->load->model('search_model');
        $this->load->model('admin_model/settings_model');
    }

    
public function numRows($user_id) {
    $query = $this->db->select('*')
    ->from('order_tab')
    ->where('user_id', $user_id)
    ->order_by('order_id', 'DESC')
    ->get();
    return $query->num_rows();
}
    
    // -----------------------GET ALL MY ORDERS MODEL----------------------//
    //-------------------------------------------------------------//
    public function getMyOrders($user_id,$limit,$offset) {

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

         $query = $this->db->select('*')
                ->from('order_tab')
                ->where('user_id', $user_id)
                ->order_by('order_id', 'DESC')
                ->limit($limit, $offset)                 
                ->get();

        if ($query->num_rows() <= 0) {
            $response = array(
                'status' => 500,
                'status_message' => 'No orders found.');
        } else {
            $response = array(
                'status' => 200,
                'imageBasePath' => IMAGE_PATH,
                'status_message' => $query->result_array());
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

        $dashImg = $this->settings_model->getSettingDetails('dash_image');
        $response = array(
            'status' => 200,
            'status_message' => 'Fetched orders for given UserId',
            'activeOrders'  =>  $activeCount,
            'openOrders'  =>  $openCount,
            'closeOrders'  =>  $closeCount,
            'userImage' =>  DASBOARDIMAGE_PATH.$dashImg['setting_value']
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
        $this->email->to($AdminEmail);
         $this->email->subject("New Order For Jumla");
        //$this->email->message("Dear ".$username.",\nPlease click on below URL or paste into your browser to verify your Email Address\n\n <a href='".base_url()."auth/login/verify_email/".base64_encode($email)."?profile=".$profile_type."'>".base_url()."auth/login/verify_email/".base64_encode($email)."?profile=".$profile_type."</a>\n"."\n\nThanks\nAdmin Team");
        $count=1;
        $value = '';      
        if ($business_field == 1) {
            $value = 'Mobile Accessories';
        }
        if ($business_field == 2) {
            $value = 'Cosmetics';
        }
        if ($business_field == 3) {
            $value = 'Watch and Glasses';
        }
        if ($business_field == 4) {
            $value = 'Bags';
        }
        if ($business_field == 5) {
            $value = 'Others';
        }
        //$baseUrl = 'http://localhost/repoOrder/images/order_images/';
        $baseUrl = 'http://ordertracker.bizmo-tech-admin.com/images/order_images/';
        $message='<html>
		<head>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style>
		table {
		    font-family: arial, sans-serif;
		    border-collapse: collapse;
		    width: 100%;
		}
		
		td, th {
		    border: 1px solid #dddddd;
		    text-align: left;
		    padding: 8px;
		}
		
		tr:nth-child(even) {
		    background-color: #dddddd;
		}
		</style>
		</head>
		<body>
		<div class="container col-lg-8" style="box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important;margin:10px; font-family:Candara;">
		<h2 style="text-align:center; color:#4CAF50; font-size:40px">Jumla business</h2>
		<h3 style="font-size:15px;"><b>Hello Admin,</b></h3>
		<h4 style=""><b>Order Id : </b>#'.$order_id.'<br><b>Date : </b>'.date('M d,Y') . '-' .date('h:i a').'<br><b>Business Field : </b>'.$value.'<br><b>Username : </b> '.$user_username.'<br><b>Email :</b>'.$user_email.'</h4>
		<hr>
		<h2>Order Details</h2>
		<table>
		<tr>
		<th>Product Image</th>
		<th>Product </th>
		<th>product Quantity </th>
		</tr>';
		  foreach (json_decode($prod_associated,TRUE) as $key){ 
            $img='';
            if(isset($key['prod_image'])){
                $img=$key['prod_image'];
            }
            $message.='<tr>'
             .'<td>
            <img class="img img-thumbnail" alt="Item Image not available" style="height: 100px; width: 100px; object-fit: contain" src="'.IMAGE_PATH.''.$img.'" onerror="this.src=\''.base_url().'images/default_image.png\'">
            </td>'
            . '<td>'.$key['prod_Name'].'</td>
            <td>'.$key['prod_quantity'].'</td>
            </tr>';
        }
		$message.='</table>
		</div>
		</body>
		</html>';
       
        $this->email->message($message);
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
        $mail_verified='';
        //$details = '';
        $sql = "SELECT * FROM customer_tab WHERE user_id = '$user_id'";
        $resultnew = $this->db->query($sql);

        
        if ($resultnew->num_rows() <= 0) {
            $response = array(
                'status' => 500,
                'status_message' => 'No User found.');
        } else {
            foreach ($resultnew->result_array() as $row) {
                $email = $row['email'];
                $username = $row['username'];
                $mail_verified = $row['email_verified'];
            }

            $response = array(
                'status' => 200,
                'status_message' => 'User Details found!',
                'email' => $email,
                'username' => $username,
                'email_verified'    =>  $mail_verified
            );
        }       
        return $response;
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
        $query = "DELETE FROM order_tab WHERE order_id=".$order_id." ";

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
