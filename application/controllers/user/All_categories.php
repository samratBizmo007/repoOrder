<?php

//User All_categories controller
class All_categories extends CI_Controller {

  public function __construct() {
    parent::__construct();
    date_default_timezone_set('Asia/Kuwait'); //set Kuwait's timezone
  }

  public function index() {
    $this->load->library('user_agent');
    $data['all_categories']=All_categories::getAllCategories();

    if ($this->agent->is_mobile())
    {
      $this->load->view('includes/mobile/header');
      $this->load->view('pages/user/mobile/all_categories',$data);
      $this->load->view('includes/mobile/footer');
    }
    else{
      $this->load->view('includes/header.php');
      $this->load->view('pages/user/all_categories',$data);
    }
        //$this->load->view('includes/footer.php');
  }

  //------------fun for get the all categories -----------------------//
  public function getAllCategories() {
        $path = base_url();
        $url = $path . 'api/ManageProduct_api/getAllCategories';
        //create a new cURL resource
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        $response_json = curl_exec($ch);
        //close cURL resource
        curl_close($ch);
        $response = json_decode($response_json, true);
        return $response;
  }
    //------------fun for get the all categories -----------------------//

}
