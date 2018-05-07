<?php

//Admin Settings controller
class Admin_settings extends CI_Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    //start session   
    $admin_name=$this->session->userdata('admin_name');
    $admin_role=$this->session->userdata('admin_role');

    $this->load->library('user_agent');
    $this->load->library('user_agent');

    //check session variable set or not, otherwise logout
    if(($admin_name=='') || ($admin_role=='')){
     redirect('admin_login');
   }
   $data['adminDetails']=Admin_settings::getAdminDetails();
   $data['dashImage']=Admin_settings::getDashImage();
   $data['key']=Admin_settings::getpasskey();

     if ($this->agent->is_mobile())
    {
      $this->load->view('includes/mobile/header');
      $this->load->view('pages/admin/mobile/settings',$data);
      $this->load->view('includes/mobile/admin_footer');
    }
    else{
   $this->load->view('includes/admin_header.php');
   $this->load->view('pages/admin/admin_settings',$data);
        //$this->load->view('includes/footer.php');
 }
 }

     //----------this function to update admin email-----------------------------//
 public function updateEmail() { 
  extract($_POST);
  //print_r($_POST);die();

  //print_r($data);die();
  $data=$_POST;
  $path = base_url();
  $url = $path.'api/Admin_api/updateEmail';
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response_json = curl_exec($ch);
  curl_close($ch);
  $response = json_decode($response_json, true);
  //print_r($response_json);die();
  
  if ($response['status'] != 200) {
    echo '<h4 class="w3-text-red w3-margin"><i class="fa fa-warning"></i> '.$response['status_message'].'</h4>
    ';
  } else {
    echo '<h4 class="w3-text-green w3-margin"><i class="fa fa-check"></i> '.$response['status_message'].'</h4>
    <script>
    window.setTimeout(function() {
     location.reload();
   }, 1000);
   </script>';
 }
}
//----------------this fun to update admin email end---------------//
//------function for update user name------//
public function updateUname()
{
    extract($_POST);
    // print_r($_POST);die();
  $data=$_POST;
  $path = base_url();
  $url = $path.'api/Admin_api/updateUname';
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response_json = curl_exec($ch);
  curl_close($ch);
  $response = json_decode($response_json, true);
  //print_r($response_json);die();
  
  if ($response['status'] != 200) {
    echo '<h4 class="w3-text-red w3-margin"><i class="fa fa-warning"></i> '.$response['status_message'].'</h4>
    ';
  } else {
    echo '<h4 class="w3-text-green w3-margin"><i class="fa fa-check"></i> '.$response['status_message'].'</h4>
    <script>
    window.setTimeout(function() {
     location.reload();
   }, 1000);
   </script>';
 }

}



//------function for update Password------//
public function updatePass()
{
    extract($_POST);
    // print_r($_POST);die();
  $data=$_POST;
  $path = base_url();
  $url = $path.'api/Admin_api/updatePass';
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response_json = curl_exec($ch);
  curl_close($ch);
  $response = json_decode($response_json, true);
  //print_r($response_json);die();
  
  if ($response['status'] != 200) {
    echo '<h4 class="w3-text-red w3-margin"><i class="fa fa-warning"></i> '.$response['status_message'].'</h4>
    ';
  } else {
    echo '<h4 class="w3-text-green w3-margin"><i class="fa fa-check"></i> '.$response['status_message'].'</h4>
    <script>
    window.setTimeout(function() {
     location.reload();
   }, 1000);
   </script>';
 }

}

//-----------function for update private key-----------------//
public function updateKey()
{
   extract($_POST);
    // print_r($_POST);die();
  $data=$_POST;
  $path = base_url();
  $url = $path.'api/Admin_api/updateKey';
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response_json = curl_exec($ch);
  curl_close($ch);
  $response = json_decode($response_json, true);
  // print_r($response_json);die();
  
  if ($response['status'] != 200) {
    echo '<h4 class="w3-text-red w3-margin"><i class="fa fa-warning"></i> '.$response['status_message'].'</h4>
    ';
  } else {
    echo '<h4 class="w3-text-green w3-margin"><i class="fa fa-check"></i> '.$response['status_message'].'</h4>
    <script>
    window.setTimeout(function() {
     location.reload();
   }, 1000);
   </script>';
 }
}

     //----------this function to update user dashboard image-----------------------------//
public function updateDashboardImage() { 
  //extract($_POST);
  //print_r($_FILES);die();
  $prod_Arr=array();  //prod_image array
  $allowed_types=['gif','jpg','png','jpeg','JPG','GIF','JPEG','PNG'];
  
  if(!empty(($_FILES['admin_image']['name']))){
    $extension_img = pathinfo($_FILES['admin_image']['name'], PATHINFO_EXTENSION); //get prod image file extension 
    //image validating---------------------------//
    //check whether image size is less than 2 mb or not
    if($_FILES['admin_image']['size'] > 10485760){  //for prod images
      echo '<label class="w3-small w3-label w3-text-red"><i class="fa fa-warning w3-large"></i> Image size exceeds size limit of 10MB. Upload image having size less than 10MB</label>';
      die();
    }

    //check file is an image or not by checking extensions
    if(!in_array($extension_img, $allowed_types)){  //for prod images
      echo '<label class="w3-small w3-label w3-text-red"><i class="fa fa-warning w3-large"></i> File is not an image file. Upload image having type gif, jpg, jpeg OR png</label>';
      die();
    }   
  }

  $imagePath ='';
  if(!empty(($_FILES['admin_image']['name']))){
    $extension = pathinfo($_FILES['admin_image']['name'], PATHINFO_EXTENSION);

    $_FILES['userFile']['name'] = 'userDashImage.'.$extension;
    $_FILES['userFile']['type'] = $_FILES['admin_image']['type'];
    $_FILES['userFile']['tmp_name'] = $_FILES['admin_image']['tmp_name'];
    $_FILES['userFile']['error'] = $_FILES['admin_image']['error'];
    $_FILES['userFile']['size'] = $_FILES['admin_image']['size'];

      $uploadPath ='images/admin/';  //upload images in images/desktop/ folder
      $config['upload_path'] = $uploadPath;
      $config['allowed_types'] = 'gif|jpg|png|jpeg'; //allowed types of images           
      $config['overwrite'] = TRUE;            
     // print_r($fileData = $this->upload->data());die();
      $this->load->library('upload', $config);  //load upload file config.
      $this->upload->initialize($config);

      if($this->upload->do_upload('userFile')){
        $fileData = $this->upload->data();
        $imagePath = $fileData['file_name'];
      }
    }
    
   //echo $imagePath;die();
  //validating image ends---------------------------//
  //print_r($data);die();
    $data['imagePath']=$imagePath;
    $path = base_url();
    $url = $path.'api/Admin_api/updateDashboardImage';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_json = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response_json, true);
  //print_r($response_json);die();
    
    if ($response['status'] != 200) {
      echo '<h4 class="w3-text-red w3-margin"><i class="fa fa-warning"></i> '.$response['status_message'].'</h4>
      ';
    } else {
      echo '<h4 class="w3-text-green w3-margin"><i class="fa fa-image"></i> '.$response['status_message'].'</h4>
      <script>
      window.setTimeout(function() {
       location.reload();
     }, 1000);
     </script>';
   }
 }
//----------------this fun to update user dashboard image end---------------//

 
//----------this function to get admin details-----------------------------
 public function getAdminDetails() {

  $path = base_url();
  $url = $path . 'api/Admin_api/getAdminDetails';
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_HTTPGET, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response_json = curl_exec($ch);
  curl_close($ch);
  $response = json_decode($response_json, true);
  return $response;
}
//----------------this fun get admin details end---------------//

//----------this function to get admin details-----------------------------
public function getDashImage() {

  $path = base_url();
  $url = $path . 'api/Admin_api/getDashImage?setting_name=dash_image';
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_HTTPGET, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response_json = curl_exec($ch);
  curl_close($ch);
  $response = json_decode($response_json, true);
  return $response;
}
//----------------this fun get admin details end---------------//

public function getpasskey() {

  $path = base_url();
  $url = $path . 'api/Admin_api/getpasskey?setting_name=pass_privateKey';
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_HTTPGET, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response_json = curl_exec($ch);
  curl_close($ch);
  $response = json_decode($response_json, true);
  return $response;
}
}
