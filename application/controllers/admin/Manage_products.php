<?php

//Admin Settings controller
class Manage_products extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        //start session   
        $admin_name = $this->session->userdata('admin_name');
        $admin_role = $this->session->userdata('admin_role');

        $this->load->library('user_agent');
        //check session variable set or not, otherwise logout
        if (($admin_name == '') || ($admin_role == '')) {
            redirect('admin_login');
        }
        $data['categories'] = Manage_products::getAllCategories();
        $data['products'] = Manage_products::getPostedImagesBy_username();
         if ($this->agent->is_mobile())
        {
          $this->load->view('includes/mobile/header');
          $this->load->view('pages/admin/mobile/manage_product',$data);
          $this->load->view('includes/mobile/admin_footer');
    }
    else{
        $this->load->view('includes/admin_header.php');
        $this->load->view('pages/admin/manage_product', $data);
    }
    }

    //------------fun for get the all categories -----------------------//
    public function getAllCategories() {
        $path = base_url();
        $url = $path . 'api/ManageProduct_api/getAllCategories';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        return $response;
    }

    //------------fun for get the all categories -----------------------//
    //------------fun for get posted products  -----------------------//
    public function getPostedImagesBy_username() {
        $admin_name = $this->session->userdata('admin_name');
        $path = base_url();
        $url = $path . 'api/ManageProduct_api/getPostedImagesBy_username?username=' . $admin_name;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        return $response;
    }

    //------------fun for get posted products  -----------------------//
    //------------fun for remove product-----------------------//
    public function removeProduct() {
        extract($_POST);
        $path = base_url();
        $url = $path . 'api/ManageProduct_api/removeProduct?prod_id=' . $prod_id;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        if ($response['status'] != 200) {
            echo '<h4 class="w3-text-red w3-margin"><i class="fa fa-warning"></i> ' . $response['status_message'] . '</h4>
    ';
        } else {
            echo '<h4 class="w3-text-green w3-margin"><i class="fa fa-image"></i> ' . $response['status_message'] . '</h4>
                  <script>
                  window.setTimeout(function() {
                  }, 1000);
                  </script>';
        }
    }

    //------------fun for remove product-----------------------//
//------------fun for add new product to product table---------------------------//
    public function addProduct() {
        $admin_name = $this->session->userdata('admin_name');
        $admin_role = $this->session->userdata('admin_role');
        extract($_POST);
        if ($cat_id == 0) {
            echo '<label class="w3-small w3-label w3-text-red"><i class="fa fa-warning w3-large"></i> Please Select Category First.</label>';
            die();
        }
        $data = $_POST;
         print_r($data);die();

        $allowed_types = ['gif', 'jpg', 'png', 'jpeg', 'JPG', 'GIF', 'JPEG', 'PNG'];

        if (!empty(($_FILES['prod_image']['name']))) {
            $extension_img = pathinfo($_FILES['prod_image']['name'], PATHINFO_EXTENSION); //get prod image file extension 
            //image validating---------------------------//
            //check whether image size is less than 2 mb or not
            if ($_FILES['prod_image']['size'] > 10485760) {  //for prod images
                echo '<label class="w3-small w3-label w3-text-red"><i class="fa fa-warning w3-large"></i> Image size exceeds size limit of 10MB. Upload image having size less than 10MB</label>';
                die();
            }
            //check file is an image or not by checking extensions
            if (!in_array($extension_img, $allowed_types)) {  //for prod images
                echo '<label class="w3-small w3-label w3-text-red"><i class="fa fa-warning w3-large"></i> File is not an image file. Upload image having type gif, jpg, jpeg OR png</label>';
                die();
            }
        }

        $imagePath = '';
        if (!empty(($_FILES['prod_image']['name']))) {
            $extension = pathinfo($_FILES['prod_image']['name'], PATHINFO_EXTENSION);

            $_FILES['userFile']['name'] = $product_name . '.' . $extension;
            $_FILES['userFile']['type'] = $_FILES['prod_image']['type'];
            $_FILES['userFile']['tmp_name'] = $_FILES['prod_image']['tmp_name'];
            $_FILES['userFile']['error'] = $_FILES['prod_image']['error'];
            $_FILES['userFile']['size'] = $_FILES['prod_image']['size'];

            $uploadPath = 'images/product_images/';  //upload images in images/desktop/ folder
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'gif|jpg|png|jpeg'; //allowed types of images           
            $config['overwrite'] = TRUE;
            // print_r($fileData = $this->upload->data());die();
            $this->load->library('upload', $config);  //load upload file config.
            $this->upload->initialize($config);

            if ($this->upload->do_upload('userFile')) {
                $fileData = $this->upload->data();
                $imagePath = $fileData['file_name'];
            }
        }

        //echo $imagePath;die();
        //validating image ends---------------------------//
        //print_r($data);die();
        $data['imagePath'] = $uploadPath . $imagePath;
        $data['posted_by'] = $admin_name;
        $data['role'] = $admin_role;
        $path = base_url();
        $url = $path . 'api/ManageProduct_api/addProduct';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        //print_r($response_json);
        //die();

        if ($response['status'] != 200) {
            echo '<h4 class="w3-text-red w3-margin"><i class="fa fa-warning"></i> ' . $response['status_message'] . '</h4>
            ';
        } else {
            echo '<h4 class="w3-text-green w3-margin"><i class="fa fa-image"></i> ' . $response['status_message'] . '</h4>
            <script>
            window.setTimeout(function() {
               location.reload();
           }, 1000);
           </script>';
        }
    }

//------------fun for add new product to product table---------------------------//
    //-----------fun for get the product category by cat id -------------------------//
    public function getProductCategory() {
        extract($_POST);
        $path = base_url();
        $url = $path . 'api/ManageProduct_api/getProductCategory?cat_id='.$cat_id;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        print_r($response);
    }
    //-----------fun for get the product category by cat id -------------------------//

}
