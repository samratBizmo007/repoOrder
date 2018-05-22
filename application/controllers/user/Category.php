<?php

//User Category controller
class Category extends CI_Controller {

  public function __construct() {
    parent::__construct();
    date_default_timezone_set('Asia/Kuwait'); //set Kuwait's timezone
  }

  public function index($id='') {
    $cat_id=base64_decode($id);
    //echo $cat_id;die();
    $this->load->library('user_agent');
    $data['all_salers']=Category::getCategorySalers($cat_id);

    if ($this->agent->is_mobile())
    {
      $this->load->view('includes/mobile/header');
      $this->load->view('pages/user/mobile/all_salers',$data);
      $this->load->view('includes/mobile/footer');
    }
    else{
      $this->load->view('includes/header.php');
      $this->load->view('pages/user/all_salers',$data);
    }
        //$this->load->view('includes/footer.php');
  }

  //------------fun for get all category salers -----------------------//
  public function getCategorySalers($cat_id) {
    $path = base_url();
    $url = $path.'api/Category_api/getCategorySalers?cat_id='.$cat_id;
    // print_r($url);die();
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("cat_id: ".$cat_id));
    $response_json = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response_json, true);
        //print_r($response_json);die();
    return $response;
  }
    //------------fun for get all category salers ends -----------------------//

}
