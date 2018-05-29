<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Feeds_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kuwait');   //set Kuwait's timezone
        //$this->load->model('search_model');
    }
    public function all_ActiveOrdersCount(){
     $query = "SELECT * FROM order_tab as ot join customer_tab as ct on (ct.user_id = ot.user_id) WHERE ot.status=1 ORDER BY ot.order_id DESC"; 
     $result = $this->db->query($query);
     return $result->num_rows();
 }

    // -----------------------GET ALL ORDERS on admin dashboard MODEL----------------------//
    //-------------------------------------------------------------//
 public function AllOpen_Orders() {

   $query = $this->db->select('*')
   ->from('order_tab')
   ->join('customer_tab', 'order_tab.user_id=customer_tab.user_id')
   ->where('order_tab.status', 2)
   ->order_by('order_id', 'DESC')
   ->get();

        //$query = "SELECT * FROM order_tab as ot join customer_tab as ct on (ct.user_id = ot.user_id) WHERE ot.status=2 ORDER BY ot.order_id DESC";

        //$result = $this->db->query($query);

   if ($query->num_rows() <= 0) {
    $response = array(
        'status' => 500,
        'status_message' => 'No orders found.');
} else {
    $response = array(
        'status' => 200,
        'status_message' => $query->result_array());
}
return $response;
}

    // -----------------------GET ALL ORDERS on admin dashboard MODEL----------------------//
    // -----------------------GET ALL OPEN ORDERS on admin dashboard  MODEL----------------------//
    //-------------------------------------------------------------//
public function AllOrders($limit,$offset) {

    $query = $this->db->select('*')
    ->from('order_tab')
    ->join('customer_tab', 'order_tab.user_id=customer_tab.user_id')
    ->where('order_tab.status', 1)
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
            'status_message' => $query->result_array());
    }
    return $response;
}
    // -----------------------GET ALL ORDERS on admin dashboard MODEL----------------------//

    // -----------------------GET ALL CLOSED ORDERS on admin dashboard MODEL----------------------//
    //-------------------------------------------------------------//
public function AllClosed_Orders() {

    $query = $this->db->select('*')
    ->from('order_tab')
    ->join('customer_tab', 'order_tab.user_id=customer_tab.user_id')
    ->where('order_tab.status', 0)
    ->order_by('order_id', 'DESC')
    ->get();

    if ($query->num_rows() <= 0) {
        $response = array(
            'status' => 500,
            'status_message' => 'No orders found.');
    } else {
        $response = array(
            'status' => 200,
            'status_message' => $query->result_array());
    }
    return $response;
}

    // -----------------------GET ALL CLOSED ORDERS on admin dashboard MODEL----------------------//
    //---------------reopen ORder model-------------//
function reOpen_Orders($order_id) {
    $query = "UPDATE order_tab SET status=2 WHERE order_id=" . $order_id . " ";

    if ($this->db->query($query)) {
        $response = array(
            'status' => 200,
            'status_message' => 'Order Opened Successfully.'
        );
    } else {
            //insertion failure
        $response = array(
            'status' => 500,
            'status_message' => 'Sorry..Order Opening Failed!!!'
        );
    }

    return $response;
}

    //----------------reopen ORder ends--------------------------//
       //---------------close ORder model-------------//
function closeOrder($order_id)
{
    $query="UPDATE order_tab SET status=0 WHERE order_id=".$order_id." ";  

    if($this->db->query($query)){
        $response=array(
            'status' => 200,
            'status_message' =>'Order closed Successfully.'         
        );
    }
    else
    {
            //insertion failure
        $response=array(
            'status' => 500,
            'status_message' =>'Sorry..Order closing Failed!!!'         
        );
    }

    return $response;
}

public function AllRegreted_orders(){
    $query = "SELECT * FROM order_tab as ot join customer_tab as ct on (ct.user_id = ot.user_id) WHERE ot.status= -1 ORDER BY ot.order_id DESC";

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

    //----------------delete ORder ends--------------------------//
public function regretProduct($prod_no, $order_id) {

    $query = "SELECT * FROM order_tab WHERE order_id='$order_id'";

    $result = $this->db->query($query);
    $Product_details = '';
    if ($result->num_rows() <= 0) {
        $Product_details = array(
            'status' => 0,
            'status_message' => 'No Records Found.');
    } else {
        foreach ($result->result_array() as $row) {
            $Product_details = $row['order_products'];
        }
    }
        //$Product_details = QuotationForEnquiry_model::getOrderedProductDetails($order_id); //----fun for get ordered product details 
    $productArr = json_decode($Product_details, TRUE);

        foreach ($productArr as &$prod) {//-----loop for update json price
            if ($prod['prod_no'] == $prod_no) {
                $prod['prod_regret'] = 1;
            }
        }
        $productinfo = json_encode($productArr);

        $sqlupdate = "UPDATE order_tab SET order_products = '$productinfo'  WHERE order_id='$order_id'"; //----update enquiry befor insert to status 0
        $resultupdate = $this->db->query($sqlupdate);

        if ($resultupdate) {
            $response = array(
                'status' => 200,
                'status_message' => 'Product Cancelled..!');
        } else {
            $response = array(
                'status' => 500,
                'status_message' => 'Product cancellation failed...!');
        }
        return $response;
    }

    // -----------------------GET ALL STATISTICS COUNT----------------------//
    //-------------------------------------------------------------//
    public function getStatistics(){

        // -------------get user count ----------------------
        $userCount=0;
        $user_query = $this->db->get('user_tab');
        $userCount=$user_query->num_rows();

        // -------------get products count----------------------
        $prod_count=0;
        $prod_query = $this->db->get('product_tab');
        $prod_count=$prod_query->num_rows();

        // // -------------get close order count----------------------
        // $closeCount=0;
        // $close_query = $this->db->get_where('order_tab', array(//making selection
        //     'status' => '0'
        // ));
        // $closeCount=$close_query->num_rows();

        $response = array(
            'status' => 200,
            'status_message' => 'Count for all statistics',
            'userCount'  =>  $userCount,
            'prod_count'  =>  $prod_count,
        );
        return $response;
    }
    // -----------------------GET ALL STATISTICS COUNT MODEL----------------------//


    // -----------------fucntion to get all timeline data- ---------------------//
    public function getTimeline($per_page,$offset) {

    $query = "SELECT c.category_name,u.user_id,u.role,u.cat_id,u.fb_id,u.full_name,u.unique_id,u.username,u.company_name,u.user_image,u.website,u.bio,u.email,u.phone,u.country_code,u.whatsapp_no,u.address,p.user_id,p.cat_id,p.product_name,p.posted_by,p.prod_id,p.prod_description,p.prod_image FROM user_tab as u JOIN product_tab as p JOIN category_tab as c ON (u.unique_id= p.user_id AND c.cat_id = p.cat_id) ORDER BY p.prod_id DESC LIMIT $offset,$per_page";

    $result = $this->db->query($query);

    if ($result->num_rows() <= 0) {
        $response = array(
            'status' => 500,
            'status_message' => 'No recent Feed available.');
    } else {
        $response = array(
            'status' => 200,
            'status_message' => $result->result_array());
    }
    return $response;
}
    // ----------------------fcuntion  ends here --------------------------//

// -----------------fucntion to get all timeline data scroll- ---------------------//
    public function getTimelineScroll($limit,$start) {

    $query = "SELECT c.category_name,u.user_id,u.role,u.cat_id,u.fb_id,u.full_name,u.unique_id,u.username,u.company_name,u.user_image,u.website,u.bio,u.email,u.phone,u.country_code,u.whatsapp_no,u.address,p.user_id,p.cat_id,p.product_name,p.posted_by,p.prod_id,p.prod_description,p.prod_image FROM user_tab as u JOIN product_tab as p JOIN category_tab as c ON (u.unique_id= p.user_id AND c.cat_id = p.cat_id) ORDER BY p.prod_id DESC LIMIT $start,$limit";

    $result = $this->db->query($query);

    if ($result->num_rows() <= 0) {
        $response = array(
            'status' => 500,
            'status_message' => 'No more Feeds available.');
    } else {
        $response = array(
            'status' => 200,
            'status_message' => $result->result_array());
    }
    return $response;
}
    // ----------------------fcuntion  ends here --------------------------//

// ----------------get all timeline dta rows count------------//
public function numRows() {
    $query = $this->db->select('*')
    ->from('product_tab')
    ->order_by('prod_id', 'DESC')
    ->get();
    return $query->num_rows();
}
// -----------------------fucntion ends-------------------------//
    //-------fun for delete feeds from admin side--------------//

    public function removeProduct($prod_id) {

        $sql = "DELETE FROM product_tab WHERE prod_id = '$prod_id'";
        $result = $this->db->query($sql);
        if ($this->db->affected_rows()>0) {
            $response = array(
                'status' => 200,
                'status_message' => 'Product removed Successfully..!');
        } else {
            $response = array(
                'status' => 500,
                'status_message' => 'Product Not removed Successfully...!');
        }
        return $response;
    }

    //-------fun for delete feeds from admin side --------------//


}

?>