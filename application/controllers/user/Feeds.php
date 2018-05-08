<?php
//User Feeds controller
class Feeds extends CI_Controller {

	public function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Kuwait');	//set Kuwait's timezone

        //start session   
		$user_id=$this->session->userdata('user_id');
		$user_name=$this->session->userdata('user_name');
		
    //check session variable set or not, otherwise logout
		if(($user_id=='') || ($user_name=='')){
			redirect('login');
		}  
	}

	public function index() {
		$this->load->library('user_agent');
		
		//$data['timelineData'] = Dashboard::getTimeline(); 		//-------show all latest posts and feeds

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
		//print_r($response_json);die();
		if ($this->agent->is_mobile())
		{
			$this->load->view('includes/mobile/header');
			$this->load->view('pages/user/mobile/user_dashboard',$data);
			$this->load->view('includes/mobile/footer');
		}
		else{
			$this->load->view('includes/header');
			$this->load->view('pages/user/user_dashboard',$data);
		}
		
	}
	
// --------- this function gets all latest product feeds---------------//
	public function getTimeline() {

		$path = base_url();
		$url = $path.'api/Feeds_api/getTimeline';
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HTTPGET, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response_json = curl_exec($ch);
		curl_close($ch);
		$response = json_decode($response_json, true);
		return $response;
	}
  // -----------------fucntion ends here --------------------------------//



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

}
?>