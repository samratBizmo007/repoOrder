<?php

//Admin Settings controller
class Edit_profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        //start session   
        $admin_name = $this->session->userdata('admin_name');
        $admin_role = $this->session->userdata('admin_role');

        //check session variable set or not, otherwise logout
        if (($admin_name == '') || ($admin_role == '')) {
            redirect('admin_login');
        }
        $data['userDetails'] = Edit_profile::getUserDetails();
        //$data['products'] = Edit_profile::getPostedImagesBy_username();
        $this->load->view('includes/admin_header.php');
        $this->load->view('pages/admin/edit_profile', $data);
    }

    //------------fun for get user details -----------------------//
    public function getUserDetails() {
        $admin_name = $this->session->userdata('admin_name');
        $path = base_url();
        $url = $path . 'api/Userprofile_api/getUserDetails?username=' . $admin_name;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
        //print_r($response_json);die();
        return $response;
    }

    //------------fun for get user details -----------------------//
    //--------this fun is used to update the profile---------------------//
    public function updateProfile() {
        $admin_name = $this->session->userdata('admin_name');
        $admin_role = $this->session->userdata('admin_role');
        extract($_POST);
        $data = $_POST;
        //print_r($data);
        //print_r($_FILES);
        //die();

        $allowed_types = ['gif', 'jpg', 'png', 'jpeg', 'JPG', 'GIF', 'JPEG', 'PNG'];

        if (!empty(($_FILES['profile_image']['name']))) {
            $extension_img = pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION); //get prod image file extension 
            //image validating---------------------------//
            //check whether image size is less than 2 mb or not
            if ($_FILES['profile_image']['size'] > 10485760) {  //for prod images
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
        if (!empty(($_FILES['profile_image']['name']))) {
            $extension = pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION);

            $_FILES['userFile']['name'] = $admin_name . '.' . $extension;
            $_FILES['userFile']['type'] = $_FILES['profile_image']['type'];
            $_FILES['userFile']['tmp_name'] = $_FILES['profile_image']['tmp_name'];
            $_FILES['userFile']['error'] = $_FILES['profile_image']['error'];
            $_FILES['userFile']['size'] = $_FILES['profile_image']['size'];

            $uploadPath = 'images/users/';  //upload images in images/desktop/ folder
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
        $data['imagePath'] = $uploadPath.$imagePath;
        $data['username'] = $admin_name;
        $path = base_url();
        $url = $path . 'api/Editprofile_api/updateProfile';
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

    //------------function ends------------------------------------------//
}
