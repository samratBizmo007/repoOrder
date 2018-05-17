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
		// if(($user_id=='') || ($user_name=='')){
		// 	redirect('login');
		// }  
	}

	public function index() {
		$this->load->library('user_agent');
		
		//$data['timelineData'] = Dashboard::getTimeline(); 		//-------show all latest posts and feeds

		// $path = base_url();
		// $url = $path.'api/Feeds_api/getTimelineRows';
		// $ch = curl_init($url);
		// curl_setopt($ch, CURLOPT_HTTPGET, true);
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// $response_data = curl_exec($ch);
		// curl_close($ch);

  //   //----------pagination code starts here-------------------------------------    
  //   //------loading the library pagination----------------------//
		// $this->load->library('pagination');

  //   //--------------creating the config array for pagination basic requirements----------------//
		// $config = [
		// 	'base_url' => base_url('user/feeds/index'),
		// 	'per_page' => 5,
		// 	'total_rows' => json_decode($response_data, true),
		// ];
		// $config['full_tag_open'] = "<ul class='pagination' style='color:black'>";
		// $config['full_tag_close'] = '</ul>';
		// $config['num_tag_open'] = '<li style="color:black">';
		// $config['num_tag_close'] = '</li>';
		// $config['cur_tag_open'] = '<li class="active" style="background-color: #4CAF50;"><a href="#" style="color:white">';
		// $config['cur_tag_close'] = '</a></li>';
		// $config['prev_tag_open'] = '<li style="color:black">';
		// $config['prev_tag_close'] = '</li>';
		// $config['first_tag_open'] = '<li style="color:black">';
		// $config['first_tag_close'] = '</li>';
		// $config['last_tag_open'] = '<li style="color:black">';
		// $config['last_tag_close'] = '</li>';

		// $config['prev_link'] = '<i class="fa fa-long-arrow-left" ></i> ';
		// $config['prev_tag_open'] = '<li style="color:black">';
		// $config['prev_tag_close'] = '</li>';

		// $config['next_link'] = ' <i class="fa fa-long-arrow-right" ></i>';
		// $config['next_tag_open'] = '<li style="color:black">';
		// $config['next_tag_close'] = '</li>';
  //       //-----initialise pagination library with passing parameter config-----------//
		// $this->pagination->initialize($config);
  //       //-----initialise pagination library with passing parameter config-----------//

		// $offset=$this->uri->segment(4);
		// if($offset==''){
		// 	$offset=0;
		// }
		// $data["links"] = $this->pagination->create_links();
		// $path = base_url();
		// $url = $path.'api/Feeds_api/getTimeline?per_page='.$config['per_page'].'&offset='.$offset;
		// $ch = curl_init($url);
		// curl_setopt($ch, CURLOPT_HTTPGET, true);
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// $response_json = curl_exec($ch);
		// curl_close($ch);
		// $data['timelineData'] = json_decode($response_json, true);
		//print_r($response_json);die();
		if ($this->agent->is_mobile())
		{
			$this->load->view('includes/mobile/header');
			$this->load->view('pages/user/mobile/user_dashboard');
			$this->load->view('includes/mobile/footer');
		}
		else{
			$this->load->view('includes/header');
			$this->load->view('pages/user/user_dashboard');
		}
		
	}
	
// --------- this function gets all latest product feeds web---------------//
	public function getTimeline_web() {
		extract($_POST);
		//print_r($_POST);die();
		$path = base_url();
		$url = $path.'api/Feeds_api/getTimelineScroll?limit='.$limit.'&start='.$start;
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HTTPGET, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response_json = curl_exec($ch);
		curl_close($ch);
		$response = json_decode($response_json, true);
		//	print_r($response_json);die();
		//	return $response;

		if($response['status']==200){
			foreach ($response['status_message'] as $key) {
				echo 
				'<div class="w3-col l12 w3-card-2 w3-margin-bottom">

				<!-- Top section div start -->
				<div class="w3-col l12 w3-border-bottom">
				<div class="w3-col l1 w3-padding">';
                // set default image for username if pofile image not available
                $default_image = 'images/default_male.png';
                if($key['user_image']!=''){
                    $default_image=$key['user_image'];
                }
                echo '
				<div class="w3-circle w3-border user_img" style="background-image: url(\''.base_url().$default_image.'\');"></div>
				</div>
				<div class="col-lg-11 w3-padding-left w3-padding-top">
                <p style="padding:0;margin:0">
				<label class="w3-small" style="margin-bottom:0;padding-top:8px">
                '; 
                // show company name and address on post
                if($key['company_name']=='')
                { 
                    echo '<span class="w3-text-red">Not Disclosed</span>'; 
                }
                else {
                    echo $key['company_name'];
                } echo'</label>
                </p>
                <p style="padding:0;margin:0" class="w3-small">                
                '; 
                if($key['address']=='')
                { 
                    echo '<span class="w3-text-red">Not Disclosed</span>'; 
                }
                else {
                    echo $key['address'];
                } echo'
                </p>
				</div>
				</div>
				<!-- Top section div ends -->

				<!-- Mid section div start -->';

				$imageArr=json_decode($key['prod_image'],TRUE);
				if(count($imageArr)>1){
					echo '
					<!-- Image slider Swiper repo -->
					<div class="swiper-container" style="height: auto;width: 100%">
					<div class="swiper-wrapper" style="vertical-align:middle">';
					
					foreach ($imageArr as $image) {
						echo '						
                        <img src="'.base_url().$image['prod_image'].'" style="width: 100%;height: 100%;" class="img img-responsive swiper-slide" >';						
					}
					echo '
					</div>
					<!-- Add Arrows -->
					<div class="swiper-button-next w3-white w3-opacity"></div>
					<div class="swiper-button-prev w3-white w3-opacity"></div>
					<!-- Add Pagination for multiple images-->
					<!-- <div class="swiper-pagination w3-opacity"></div> -->
					</div>';
                } //-------end of if count of images
                else{ 

                	echo '<!-- Single image div -->';
                	foreach ($imageArr as $image) {
                		echo'
                		<img src="'.base_url().$image['prod_image'].'" style="width: 100%;height: 100%;" class="img img-responsive" >';
                	}
                } //----------------end of else count of images

                echo '<!-- Mid section div ends -->';

                echo '
                <!-- Bottom section div starts -->
                <div class="w3-col l12">
                <div class="w3-col l12 w3-padding-small w3-right">
                <a class="w3-button w3-white w3-hover-text-orange w3-hover-white" href="tel:+'.$key['country_code'].$key['phone'].'" title="+'.$key['country_code'].$key['phone'].'" style="padding-right: 0px;padding-left: 8px">
                <span class="fa fa-phone w3-xlarge"></span>
                </a>

                <a class="w3-button w3-white w3-hover-text-orange w3-hover-white" href="mailto:'.$key['email'].'?subject=Referred contact from Jumla Business." title="'.$key['email'].'" style="padding-right: 0px;padding-left: 15px">
                <span class="fa fa-envelope-o w3-xlarge"></span>
                </a>'; 
                if($key['whatsapp_no']!='0'){
                echo'<a class="w3-button w3-white w3-hover-text-orange w3-hover-white" href="whatsapp://send?text=Hello! I got your contact from Jumla Business.&phone='.$key['country_code'].$key['whatsapp_no'].'" title="WhatsApp No: '.$key['country_code'].$key['whatsapp_no'].'" style="padding-right: 0px;padding-left: 15px">
                <span class="fa fa-whatsapp w3-xlarge"></span>
                </a>';
                }else {
                    echo '';
                }
                
                echo'<a class="btn w3-right" href="'.base_url().'user/category/'.base64_encode($key['cat_id']).'" style="padding: 0">
                <span class="w3-margin-top w3-small"><i>'.$key['category_name'].'</i></span>
                </a>
                </div>

                <div class="w3-col l12 w3-padding ">
                <label>'.$key['product_name'].'</label>
                <span class="w3-small w3-margin-left">'.$key['prod_description'].'</span>
                <hr>
                </div>

                </div>
                <!-- Bottom section div ends -->

                </div>
                <script>
                var swiper = new Swiper(".swiper-container", {
                	navigation: {
                		nextEl: ".swiper-button-next",
                		prevEl: ".swiper-button-prev",
                	},
                });
                </script>';
            }
        }
        
    }
  // -----------------fucntion get timeline data web ends here --------------------------------//

    // --------- this function gets all latest product feeds for mobile---------------//
    public function getTimeline_mob() {
    	extract($_POST);
		//print_r($_POST);die();
    	$path = base_url();
    	$url = $path.'api/Feeds_api/getTimelineScroll?limit='.$limit.'&start='.$start;
    	$ch = curl_init($url);
    	curl_setopt($ch, CURLOPT_HTTPGET, true);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	$response_json = curl_exec($ch);
    	curl_close($ch);
    	$response = json_decode($response_json, true);
		//	print_r($response_json);die();
		//	return $response;

    	if($response['status']==200){
    		foreach ($response['status_message'] as $key) {
    			echo '
    			<div class="w3-col l12 w3-margin-bottom">

    			<!-- Top section div start -->
    			<div class="w3-col s12 w3-border-bottom w3-padding-bottom">                  
    			<div class="w3-col s2 w3-padding-small w3-padding-top">';
                $default_image = 'images/default_male.png';
                if($key['user_image']!=''){
                    $default_image=$key['user_image'];
                }
                echo '
                <div class="w3-circle w3-border user_imgMob" style="background-image: url(\''.base_url().$default_image.'\');"></div>
    			</div>
    			<div class="w3-col s10 w3-padding-top">
    			<a class="btn" style="padding: 0;margin:0">
                <label class="w3-small" style="padding:0;margin:0">';
                if($key['company_name']==''){
                    echo '<span class="w3-text-red">Not Disclosed</span>';
                }
                else{
                    echo $key['company_name'];
                }
                echo '
                </label>
                </a>
                <p style="padding:0;margin:0" class="w3-small">                
                '; 
                if($key['address']=='')
                { 
                    echo '<span class="w3-text-red">Not Disclosed</span>'; 
                }
                else {
                    echo $key['address'];
                } 
                echo'
                </p>
                
                
    			</div>
    			</div>
    			<!-- Top section div ends -->

    			<!-- Mid section div start -->';

    			$imageArr=json_decode($key['prod_image'],TRUE);
    			if(count($imageArr)>1){
    				echo '
    				<!-- Image slider Swiper repo -->
    				<div class="swiper-container" style="height: auto;width: 100%">
                    <div class="swiper-wrapper" style="vertical-align:middle!important;">';
    				foreach ($imageArr as $image) {
    					echo '
    					<img src="'.base_url().$image['prod_image'].'" style="width: 100%;height: 100%;" class="img img-responsive swiper-slide w3-border-bottom" >';
    				}
    				echo '
    				</div>
    				<!-- Add Pagination for multiple images-->
    				<div class="swiper-pagination w3-opacity"></div>
    				</div>';
    				
                } //-------end of if count of images
                else{ 

                	echo '<!-- Single image div -->';
                	foreach ($imageArr as $image) {
                		echo '
                		<img src="'.base_url().$image['prod_image'].'" style="width: 100%;height: 100%;" class="img img-responsive w3-border-bottom" >';
                	}
                } //----------------end of else count of images

                echo '
                <!-- Mid section div ends -->

                <!-- Bottom section div starts -->
                <div class="w3-col l12">
                <div class="w3-col l12 w3-padding-small w3-right">
                <a class="w3-button w3-white w3-hover-text-orange w3-hover-white" href="tel:+'.$key['country_code'].$key['phone'].'" title="+'.$key['country_code'].$key['whatsapp_no'].'" style="padding-right: 0px;padding-left: 8px">
                <span class="fa fa-phone w3-xlarge"></span>
                </a>

                <a class="w3-button w3-white w3-hover-text-orange w3-hover-white" href="mailto:'.$key['email'].'?subject=Referred contact from Jumla Business." title="'.$key['email'].'" style="padding-right: 0px;padding-left: 15px">
                <span class="fa fa-envelope-o w3-xlarge"></span>
                </a>';
                if($key['whatsapp_no'] != '0'){
                echo'<a class="w3-button w3-white w3-hover-text-orange w3-hover-white" href="whatsapp://send?text=Hello! I got your contact from Jumla Business.&phone='.$key['country_code'].$key['whatsapp_no'].'" title="'.$key['country_code'].$key['whatsapp_no'].'" style="padding-right: 0px;padding-left: 15px">
                <span class="fa fa-whatsapp w3-xlarge"></span>
                </a>';
                }else{
                    echo '';
                }
                echo'<a class="btn w3-right" href="'.base_url().'user/category/'.base64_encode($key['cat_id']).'" style="padding: 0">
                <span class="w3-margin-top w3-small"><i>'.$key['category_name'].'</i></span>
                </a>                      
                </div>

                <div class="w3-col l12 w3-padding ">
                <label>'.$key['product_name'].'</label>
                <span class="w3-small w3-margin-left">'.$key['prod_description'].'</span>
                <hr>
                </div>

                </div>
                <!-- Bottom section div ends -->

                </div>
                <script>
                var swiper = new Swiper(".swiper-container", {
                	pagination: {
                		el: ".swiper-pagination",
                	},
                });
                </script>
                ';

            }
        }
        
    }
  // -----------------fucntion get timeline mobile ends here --------------------------------//

	//----------this function to get admin details-----------------------------
    // public function getDashImage() {

    // 	$path = base_url();
    // 	$url = $path . 'api/Admin_api/getDashImage?setting_name=dash_image';
    // 	$ch = curl_init($url);
    // 	curl_setopt($ch, CURLOPT_HTTPGET, true);
    // 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // 	$response_json = curl_exec($ch);
    // 	curl_close($ch);
    // 	$response = json_decode($response_json, true);
    // 	return $response;
    // }
//----------------this fun get admin details end---------------//

}
?>