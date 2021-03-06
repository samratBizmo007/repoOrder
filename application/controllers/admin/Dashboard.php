<?php

//Admin Dashboard controller
class Dashboard extends CI_Controller {

  public function __construct() {
    parent::__construct();
}

public function index() {

    //start session   
    $admin_name=$this->session->userdata('admin_name');
    // $this->load->library('user_agent');
    //check session variable set or not, otherwise logout
    if($admin_name=='') {
       redirect('admin_login');
   }

   $this->load->library('user_agent');

   $data['stats'] = Dashboard::getStatistics();   
//print_r($data);die();
   if ($this->agent->is_mobile())
   {
    $this->load->view('includes/admin_header');
    $this->load->view('pages/admin/mobile/dashboard',$data);
}
else{
    $this->load->view('includes/admin_header');
    $this->load->view('pages/admin/dashboard',$data);
}
   //$this->load->view('includes/admin_header.php');
   //$this->load->view('pages/admin/dashboard', $data);
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

  // --------- this function gets all latest product feeds web---------------//
public function getTimeline_web() {
    extract($_POST);
    //print_r($_POST);die();
    $path = base_url();
    $url = $path.'api/Feeds_api/getAdminTimelineScroll?limit='.$limit.'&start='.$start.'&sortBy='.$sortBy;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_json = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response_json, true);
    //print_r($response_json);die();
    //  return $response;

    if($response['status']==200){

        foreach ($response['status_message'] as $key) {
            $feature_sym='w3-text-grey';
            $feature_title='Mark as featured.';
            $feature_function='MarkFeatured';
            // print_r($key);
            if($key['isFeatured']==1){
                $feature_sym='w3-text-orange';
                $feature_title='Mark as Unfeatured.';
                $feature_function='MarkUnFeatured';
            }
            echo 
            '
            <div class="w3-col l12 w3-card-2 w3-margin-bottom">

            <!-- Top section div start -->
            <div class="w3-col l12 w3-border-bottom">
            <div class="w3-col l1 w3-padding">';
                // set default image for username if pofile image not available
            $default_image = base_url().'images/default_male.png';
            if($key['user_image']!=''){
                $default_image=PROFILEIMAGE_PATH.$key['user_image'];
            }
            echo '
            <div class="w3-circle w3-border user_img" style="background-image: url(\''.$default_image.'\');"></div>
            </div>
            <div class="col-lg-9 w3-padding-left w3-padding-top">
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
                    <div class="w3-col l2">
                    <span class="w3-right">
                    <a id="Featurebtn_'.$key['prod_id'].'" onclick="'.$feature_function.'('.$key['prod_id'].');" class="w3-large '.$feature_sym.' btn" style="padding: 5px;" title="'.$feature_title.'"><i class="fa fa-star"></i></a>
                    <a id="Removebtn_'.$key['prod_id'].'" onclick="RemoveProduct('.$key['prod_id'].');" class=" w3-large w3-text-grey btn" style="padding: 5px;" title="Delete Post"><i class="fa fa-trash"></i></a>
                    </span>
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
                            <img src="'.PRODUCTIMAGE_PATH.$image['prod_image'].'" style="width: 100%;height: 100%;" class="img img-responsive swiper-slide" >';                        
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
                        <img src="'.PRODUCTIMAGE_PATH.$image['prod_image'].'" style="width: 100%;height: 100%;" class="img img-responsive" >';
                    }
                } //----------------end of else count of images

                echo '<!-- Mid section div ends -->';

                echo '
                <!-- Bottom section div starts -->
                <div class="w3-col l12">
                <div class="w3-col l12 w3-padding-small w3-right">
                <a class="w3-button w3-white w3-hover-text-orange w3-hover-white" href="tel:'.$key['phone'].'" title="'.$key['phone'].'" style="padding-right: 0px;padding-left: 8px">
                <span class="fa fa-phone w3-xlarge"></span>
                </a>

                <a class="w3-button w3-white w3-hover-text-orange w3-hover-white" href="mailto:'.$key['email'].'" title="'.$key['email'].'?subject=Referred contact from Jumla Business." style="padding-right: 0px;padding-left: 15px">
                <span class="fa fa-envelope-o w3-xlarge"></span>
                </a>'; 
                if($key['whatsapp_no'] != ''){
                    echo'<a class="w3-button w3-white w3-hover-text-orange w3-hover-white" href="whatsapp://send?text=Hello! I got your contact from Jumla Business.&phone='.$key['whatsapp_no'].'" title="WhatsApp No: '.$key['whatsapp_no'].'" style="padding-right: 0px;padding-left: 15px">
                    <span class="fa fa-whatsapp w3-xlarge"></span>
                    </a>';
                }else{
                    echo '';
                }
                echo'
                <a class="btn w3-right" style="padding: 0">
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
                $url = $path.'api/Feeds_api/getAdminTimelineScroll?limit='.$limit.'&start='.$start.'&sortBy='.$sortBy;
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_HTTPGET, true);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response_json = curl_exec($ch);
                curl_close($ch);
                $response = json_decode($response_json, true);
         // print_r($response_json);die();
        //  return $response;

                if($response['status']==200){

                    foreach ($response['status_message'] as $key) {
                        $feature_sym='w3-text-grey';
                        $feature_title='Mark as featured.';
                        $feature_function='MarkFeatured';
            // print_r($key);
                        if($key['isFeatured']==1){
                            $feature_sym='w3-text-orange';
                            $feature_title='Mark as Unfeatured.';
                            $feature_function='MarkUnFeatured';
                        }
                        echo '
                        <div class="w3-col l12 w3-margin-bottom w3-margin-top">

                        <!-- Top section div start -->
                        <div class="w3-col s12 w3-border-bottom w3-padding-bottom">
                        <!-- Top section div start -->
                        <div class="w3-col s12 w3-border-bottom w3-padding-bottom">                  
                        <div class="w3-col s2 w3-padding-small w3-padding-top">';
                        $default_image = base_url().'images/default_male.png';
                        if($key['user_image']!=''){
                            $default_image=PROFILEIMAGE_PATH.$key['user_image'];
                        }
                        echo '
                        <div class="w3-circle w3-border user_imgMob" style="background-image: url(\''.$default_image.'\');"></div>
                        </div>
                        <div class="w3-col s8 w3-padding-top" style="padding-left:5px;">
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
                        <div class="w3-col s2">
                        <span class="w3-right">
                        <a id="Featurebtn_'.$key['prod_id'].'" onclick="'.$feature_function.'('.$key['prod_id'].');" class="w3-large '.$feature_sym.' btn" style="padding: 0px;padding-right:3px" title="'.$feature_title.'"><i class="fa fa-star"></i></a>
                        <a id="Removebtn_'.$key['prod_id'].'" onclick="RemoveProduct('.$key['prod_id'].');" class="w3-large w3-text-grey btn" style="padding: 0px;" title="Delete Post"><i class="fa fa-trash"></i></a>
                        </span>
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
                                <img src="'.PRODUCTIMAGE_PATH.$image['prod_image'].'" style="width: 100%;height: 100%;" class="img img-responsive swiper-slide w3-border-bottom" >';
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
                        <img src="'.PRODUCTIMAGE_PATH.$image['prod_image'].'" style="width: 100%;height: 100%;" class="img img-responsive w3-border-bottom" >';
                    }
                } //----------------end of else count of images

                echo '
                <!-- Mid section div ends -->

                <!-- Bottom section div starts -->
                <div class="w3-col l12">
                <div class="w3-col l12 w3-padding-small w3-right">
                <a class="w3-button w3-white w3-hover-text-orange w3-hover-white" href="tel:'.$key['phone'].'" title="'.$key['phone'].'" style="padding-right: 0px;padding-left: 8px">
                <span class="fa fa-phone w3-xlarge"></span>
                </a>

                <a class="w3-button w3-white w3-hover-text-orange w3-hover-white" href="mailto:'.$key['email'].'" title="'.$key['email'].'?subject=Referred contact from Jumla Business." style="padding-right: 0px;padding-left: 15px">
                <span class="fa fa-envelope-o w3-xlarge"></span>
                </a>

                <a class="w3-button w3-white w3-hover-text-orange w3-hover-white" href="whatsapp://send?text=Hello! I got your contact from Jumla Business.&phone='.$key['phone'].'" title="'.$key['phone'].'" style="padding-right: 0px;padding-left: 15px">
                <span class="fa fa-whatsapp w3-xlarge"></span>
                </a>

                <a class="btn w3-right" style="padding: 0">
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
    //------------fun for remove product-----------------------//
            public function removeProduct() {
                extract($_POST);
         // print_r($_POST);die();
                $path = base_url();
                $url = $path . 'api/Feeds_api/removeProduct?prod_id='. $prod_id;
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_HTTPGET, true);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response_json = curl_exec($ch);
                curl_close($ch);
                $response = json_decode($response_json, true);
        // print_r($response);die();
        // return $response;
                if ($response['status'] != 200) {
                    echo '<h4 class="w3-text-red w3-margin"><i class="fa fa-warning"></i> ' . $response['status_message'] . '</h4>
                    ';
                } else {
                    echo '<h4 class="w3-text-green w3-margin"><i class="fa fa-check"></i> ' . $response['status_message'] . '</h4>
                    <script>
                    window.setTimeout(function() {
                        }, 1000);
                        </script>';
                    }
                }

    //------------fun for remove product-----------------------//

    //------------fun for remove product-----------------------//
                public function markFeatured() {
                    extract($_POST);
          //print_r($_POST);die();
                    $path = base_url();
                    $url = $path . 'api/Feeds_api/markFeatured?prod_id='. $prod_id;
                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_HTTPGET, true);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $response_json = curl_exec($ch);
                    curl_close($ch);
                    $response = json_decode($response_json, true);
                    //print_r($response_json);die();
        // return $response;
                    if ($response['status'] != 200) {
                        echo '<h4 class="w3-text-red w3-margin"><i class="fa fa-warning"></i> ' . $response['status_message'] . '</h4>
                        ';
                    } else {
                        echo '<h4 class="w3-text-green w3-margin"><i class="fa fa-check"></i> ' . $response['status_message'] . '</h4>
                        <script>
                        window.setTimeout(function() {
                            }, 1000);
                            </script>';
                        }
                    }

    //------------fun for remove product-----------------------//

    //------------fun for remove product-----------------------//
                    public function markUnfeatured() {
                        extract($_POST);
         // print_r($_POST);die();
                        $path = base_url();
                        $url = $path . 'api/Feeds_api/markUnfeatured?prod_id='. $prod_id;
                        $ch = curl_init($url);
                        curl_setopt($ch, CURLOPT_HTTPGET, true);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $response_json = curl_exec($ch);
                        curl_close($ch);
                        $response = json_decode($response_json, true);
                        //print_r($response_json);die();
        // return $response;
                        if ($response['status'] != 200) {
                            echo '<h4 class="w3-text-red w3-margin"><i class="fa fa-warning"></i> ' . $response['status_message'] . '</h4>
                            ';
                        } else {
                            echo '<h4 class="w3-text-green w3-margin"><i class="fa fa-check"></i> ' . $response['status_message'] . '</h4>
                            <script>
                            window.setTimeout(function() {
                                }, 1000);
                                </script>';
                            }
                        }

    //------------fun for remove product-----------------------//

                    }
