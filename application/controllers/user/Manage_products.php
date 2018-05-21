<?php

//Admin Settings controller
class Manage_products extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        //start session  
        $user_id = $this->session->userdata('user_id');
        $user_name = $this->session->userdata('user_name');
        $user_role = $this->session->userdata('user_role');
        $cat_id = $this->session->userdata('cat_id');
         // echo $cat_id;
         // echo $user_name;die();
        $this->load->library('user_agent');
        if (($user_id == '') || ($user_role != '2') || ($cat_id =='')) {
            redirect('login');
        }
        
        $data['categories'] = Manage_products::getAllCategories();
        $data['products'] = Manage_products::getPostedImagesBy_username();

        if ($this->agent->is_mobile()) {
            $this->load->view('includes/mobile/header');
            $this->load->view('pages/user/mobile/manage_product', $data);
            $this->load->view('includes/mobile/footer');
        } else {
            $this->load->view('includes/header.php');
            $this->load->view('pages/user/manage_product', $data);
        }
    }

    //------------fun for get the all categories -----------------------//
    public function getAllCategories() {
        
        $apiKey = 'jumla@1234';
        $path = base_url();
        $url = $path . 'api/ManageProduct_api/getAllCategories';
        //create a new cURL resource
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-API-KEY: " . $apiKey));
        $response_json = curl_exec($ch);
        //close cURL resource
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
            $user_name = $this->session->userdata('user_name');
            $user_id = $this->session->userdata('user_id');
            $cat_id = $this->session->userdata('cat_id');
            extract($_POST);
        // echo $cat_id;die();
        // if ($cat_id == 0) {
        //     echo '<label class="w3-small w3-label w3-text-red"><i class="fa fa-warning w3-large"></i> Please Select Category First.</label>';
        //     die();
        // }
            $data = $_POST;
            $prod_Arr = array();
        //print_r($_FILES);die();
            $allowed_types = ['gif', 'jpg', 'png', 'jpeg', 'JPG', 'GIF', 'JPEG', 'PNG'];
        // for($i = 0; $i < count($_FILES['prod_image']['name']); $i++){
        // if (!empty(($_FILES['prod_image']['name'][$i]))) {
        //     $extension_img = pathinfo($_FILES['prod_image']['name'][$i], PATHINFO_EXTENSION); //get prod image file extension 
        //     //image validating---------------------------//
        //     //check whether image size is less than 2 mb or not
        //     if ($_FILES['prod_image']['size'][$i] > 10485760) {  //for prod images
        //         echo '<label class="w3-small w3-label w3-text-red"><i class="fa fa-warning w3-large"></i> Image size exceeds size limit of 10MB. Upload image having size less than 10MB</label>';
        //         die();
        //     }
        //     //check file is an image or not by checking extensions
        //     if (!in_array($extension_img, $allowed_types)) {  //for prod images
        //         echo '<label class="w3-small w3-label w3-text-red"><i class="fa fa-warning w3-large"></i> File is not an image file. Upload image having type gif, jpg, jpeg OR png</label>';
        //         die();
        //     }
        // }
        // }
        //$imagePath = '';
            for ($i = 0; $i < count($_FILES['prod_image']['name']); $i++) {
                $imagePath = '';
                $product_image = $_FILES['prod_image']['name'][$i];
                if (!empty(($_FILES['prod_image']['name'][$i]))) {
                    $extension = pathinfo($_FILES['prod_image']['name'][$i], PATHINFO_EXTENSION);

                    $_FILES['userFile']['name'] = $product_name . '-' . $user_name . '-' . $product_image . $user_id . '.' . $extension;
                    $_FILES['userFile']['type'] = $_FILES['prod_image']['type'][$i];
                    $_FILES['userFile']['tmp_name'] = $_FILES['prod_image']['tmp_name'][$i];
                    $_FILES['userFile']['error'] = $_FILES['prod_image']['error'][$i];
                    $_FILES['userFile']['size'] = $_FILES['prod_image']['size'][$i];

                $uploadPath = 'images/product_images/';  //upload images in images/desktop/ folder
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png|jpeg'; //allowed types of images           
                $config['overwrite'] = TRUE;
                // print_r($fileData = $this->upload->data());die();
                $this->load->library('upload', $config);  //load upload file config.
                $this->upload->initialize($config);

                if ($this->upload->do_upload('userFile')) {
                    $fileData = $this->upload->data();
                    $imagePath = 'images/product_images/' . $fileData['file_name'];
                    // check EXIF and autorotate if needed
                    $this->load->library('image_autorotate', array('filepath' => $imagePath));
                }
            }
            $prod_Arr[] = array(
                'prod_image' => $imagePath
            );
        }

        //echo $imagePath;die();
        //validating image ends---------------------------//
        //print_r($prod_Arr);die();
        //$data['imagePath'] = $uploadPath . $imagePath;
        $data['posted_by'] = $user_name;
        $data['user_id'] = $user_id;
        $data['cat_id'] = $cat_id;
        $data['prod_images'] = json_encode($prod_Arr);
        //print_r($data);die();
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
        $url = $path . 'api/ManageProduct_api/getProductCategory?cat_id=' . $cat_id;
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
