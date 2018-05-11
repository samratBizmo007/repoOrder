<?php

//Admin Dashboard controller
class Dashboard extends CI_Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {

    //start session   
    $admin_name=$this->session->userdata('admin_name');
    $admin_role=$this->session->userdata('admin_role');
    // $this->load->library('user_agent');
    //check session variable set or not, otherwise logout
    if($admin_name=='') {
     redirect('admin_login');
   }

   $this->load->library('user_agent');
    
    //$data['timelineData'] = Dashboard::getTimeline();     //-------show all latest posts and feeds

    $path = base_url();
    $url = $path.'api/Feeds_api/getTimelineRows';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_data = curl_exec($ch);
    curl_close($ch);

    //----------pagination code starts here-------------------------------------    
    //------loading the library pagination----------------------//
    $this->load->library('pagination');

    //--------------creating the config array for pagination basic requirements----------------//
    $config = [
      'base_url' => base_url('user/feeds/index'),
      'per_page' => 5,
      'total_rows' => json_decode($response_data, true),
    ];
    $config['full_tag_open'] = "<ul class='pagination' style='color:black'>";
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li style="color:black">';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active" style="background-color: #4CAF50;"><a href="#" style="color:white">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li style="color:black">';
    $config['prev_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li style="color:black">';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li style="color:black">';
    $config['last_tag_close'] = '</li>';

    $config['prev_link'] = '<i class="fa fa-long-arrow-left" ></i> ';
    $config['prev_tag_open'] = '<li style="color:black">';
    $config['prev_tag_close'] = '</li>';

    $config['next_link'] = ' <i class="fa fa-long-arrow-right" ></i>';
    $config['next_tag_open'] = '<li style="color:black">';
    $config['next_tag_close'] = '</li>';
        //-----initialise pagination library with passing parameter config-----------//
    $this->pagination->initialize($config);
        //-----initialise pagination library with passing parameter config-----------//

        $offset=$this->uri->segment(4);
        if($offset==''){
          $offset=0;
        }
    $data["links"] = $this->pagination->create_links();
    $path = base_url();
    $url = $path.'api/Feeds_api/getTimeline?per_page='.$config['per_page'].'&offset='.$offset;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_json = curl_exec($ch);
    curl_close($ch);
    $data['timelineData'] = json_decode($response_json, true);
    $data['stats'] = Dashboard::getStatistics();   

    $this->load->view('includes/admin_header.php');
    $this->load->view('pages/admin/dashboard', $data);
  }

    //----------this function to get all my orders count-----------------------------
  public function getStatistics() {

    $path = base_url();
    $url = $path . 'api/Feeds_api/getStatistics';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_json = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response_json, true);
    return $response;
  }
//----------------this fun get all my orders count end---------------//


}
