<?php

//User Category controller
class Category extends CI_Controller {

  public function __construct() {
    parent::__construct();
    date_default_timezone_set('Asia/Kuwait'); //set Kuwait's timezone
  }

  public function index($id='') {
    echo $id;die();
    $this->load->library('user_agent');
    $this->load->library('user_agent');
    $data['all_categories']=All_categories::getAllCategories();

    if ($this->agent->is_mobile())
    {
      $this->load->view('includes/mobile/header');
      $this->load->view('pages/user/mobile/category',$data);
      $this->load->view('includes/mobile/footer');
    }
    else{
      $this->load->view('includes/header.php');
      $this->load->view('pages/user/category',$data);
    }
        //$this->load->view('includes/footer.php');
  }

  //------------fun for get the all categories -----------------------//
  public function getAllCategories() {
    $path = base_url();
    $url = $path.'api/ManageProduct_api/getAllCategories';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_json = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response_json, true);
    return $response;
  }
    //------------fun for get the all categories -----------------------//

}
