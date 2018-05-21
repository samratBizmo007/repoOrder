<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');

class Editprofile_api extends REST_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('admin_model/Editprofile_model');
        //date_default_timezone_set('Asia/Kolkata');	//set Kuwait's timezone
  }

//--------fun for update profile-----------------------//
  public function updateProfile_post() {
    $data = ($_POST);
    extract($data);
    extract(getallheaders());
        //$data['user_id'] = $user_id;
         //print_r($data);die();
    if(empty($fullname)){
         //set the response and exit
      $this->response([
        'status' => 500,
        'status_message' => 'Please Enter Full Name.'
      ], REST_Controller::HTTP_PRECONDITION_FAILED);       
    }
        //---------------ends------------------------
        //--------------------------checking for user id is empty---------------//
    if(empty($user_id)){
         //set the response and exit
      $this->response([
        'status' => 500,
        'status_message' => 'User Id Not Found.'
      ], REST_Controller::HTTP_PRECONDITION_FAILED);       
    }
        //-------------------ends -------------------------------------------//
        //-----------------checking country code empty---------------------------//
    if (empty($countryCode)) {
      $this->response([
        'status' => 500,
        'status_message' => 'Please Select Country Code.'
      ], REST_Controller::HTTP_PRECONDITION_FAILED);
    }
//-------------------ends -------------------------------------------//
        //-----------------checking address empty---------------------------//
    if (empty($address)) {
     $this->response([
      'status' => 500,
      'status_message' => 'Please Enter Your Address.'
    ], REST_Controller::HTTP_PRECONDITION_FAILED);
   }       
        //-------------------ends -------------------------------------------//
        //-----------------checking phone empty and numeric---------------------------//
   if (!(empty($phone))) {
     if (!is_numeric($phone)) {
       $this->response([
         'status' => 500,
         'status_message' => 'Phone no should be numeric!'], REST_Controller::HTTP_PRECONDITION_FAILED);                 
     }
   }
   else{
     $this->response([
       'status' => 500,
       'status_message' => 'Please enter phone no!'], REST_Controller::HTTP_PRECONDITION_FAILED); 
   }
       //-------------------ends -------------------------------------------//
        //-----------------checking company name empty---------------------------//
   if (empty($company_name)) {
    $this->response([
      'status' => 500,
      'status_message' => 'Please Enter Your Phone No.'
    ], REST_Controller::HTTP_PRECONDITION_FAILED);
  }
        //-------------------ends -------------------------------------------//
        //-----------------checking image path empty---------------------------//
  if (empty($imagePath)) {
    $this->response([
      'status' => 500,
      'status_message' => 'Please Select Profile Image.'
    ], REST_Controller::HTTP_PRECONDITION_FAILED);
  }
        //-------------------ends -------------------------------------------//

  $result = $this->Editprofile_model->updateProfile($data);
  if($result == TRUE){
   $this->response([
    'status' => 200,
    'status_message' => 'Profile Upated Successfully.'], REST_Controller::HTTP_OK);
 }else{
  $this->response([
    'status' => 500,
    'status_message' => 'Something Went Wrong..! Profile Not Upated Successfully.'], REST_Controller::HTTP_PRECONDITION_FAILED);
}

}
//--------fun for update profile ends here-----------------------//

    //----------fun for change password------------------------//
public function changePassword_post() {
  $data = ($_POST);
  extract($data);
  if (empty($user_id)) {
    $this->response([
      'status' => 500,
      'status_message' => 'User Id Not Found.'
    ], REST_Controller::HTTP_PRECONDITION_FAILED);
  }
  if (empty($curr_password)) {
   $this->response([
    'status' => 500,
    'status_message' => 'current password Not Found.'
  ], REST_Controller::HTTP_PRECONDITION_FAILED);
 }
 if (empty($new_password)) {
   $this->response([
    'status' => 500,
    'status_message' => 'New Password Not Found.'
  ], REST_Controller::HTTP_PRECONDITION_FAILED);
 }
 $result = $this->Editprofile_model->changePassword($data);
 if($result['status'] == 200){
  $this->response([
    'status' => 200,
    'status_message' => $result['status_message']], REST_Controller::HTTP_OK);
}else{
  $this->response([
    'status' => 500,
    'status_message' => $result['status_message']], REST_Controller::HTTP_PRECONDITION_FAILED);
}
   // return $this->response($result);
}

    //--------------fun ends here-----------------------------//

    //--------fun for update profile-----------------------//

public function updateProfileMob_post() {
  //print_r($_POST);die();
  $data = ($_POST);
  extract($data);

  if(empty($fullname)){
         //set the response and exit
    $this->response([
      'status' => 500,
      'status_message' => 'Please Enter Full Name.'
    ], REST_Controller::HTTP_PRECONDITION_FAILED);       
  }
        //---------------ends------------------------
        //--------------------------checking for user id is empty---------------//
  if(empty($user_id)){
         //set the response and exit
    $this->response([
      'status' => 500,
      'status_message' => 'User Id Not Found.'
    ], REST_Controller::HTTP_PRECONDITION_FAILED);       
  }
        //-------------------ends -------------------------------------------//
        //-----------------checking country code empty---------------------------//
  if (empty($countryCode)) {
    $this->response([
      'status' => 500,
      'status_message' => 'Please Select Country Code.'
    ], REST_Controller::HTTP_PRECONDITION_FAILED);
  }
//-------------------ends -------------------------------------------//
        //-----------------checking address empty---------------------------//
  if (empty($address)) {
   $this->response([
    'status' => 500,
    'status_message' => 'Please Enter Your Address.'
  ], REST_Controller::HTTP_PRECONDITION_FAILED);
 }       
        //-------------------ends -------------------------------------------//
        //-----------------checking phone empty and numeric---------------------------//
 if (!(empty($phone))) {
     if (!is_numeric($phone)) {
       $this->response([
         'status' => 500,
         'status_message' => 'Phone no should be numeric!'], REST_Controller::HTTP_PRECONDITION_FAILED);                 
     }
   }
   else{
     $this->response([
       'status' => 500,
       'status_message' => 'Please enter phone no!'], REST_Controller::HTTP_PRECONDITION_FAILED); 
   }
       //-------------------ends -------------------------------------------//
        //-----------------checking company name empty---------------------------//
 if (empty($company_name)) {
  $this->response([
    'status' => 500,
    'status_message' => 'Please Enter Your Company Name'
  ], REST_Controller::HTTP_PRECONDITION_FAILED);
}
        //-------------------ends -------------------------------------------//

$result = $this->Editprofile_model->updateProfileMob($data);
if($result == TRUE){
 $this->response([
  'status' => 200,
  'status_message' => 'Profile Upated Successfully.'], REST_Controller::HTTP_OK);
}else{
  $this->response([
    'status' => 500,
    'status_message' => 'Something Went Wrong..! Profile Not Upated Successfully.'], REST_Controller::HTTP_PRECONDITION_FAILED);
}
}

//--------fun for update profile ends here-----------------------//

    //--------fun for update profile-----------------------//
public function updateImage_post() {
  $data = ($_POST);
  extract($data);
  //print_r($data);die();
      //--------------------------checking for user id is empty---------------//
  if(empty($user_id)){
         //set the response and exit
    $this->response([
      'status' => 500,
      'status_message' => 'User Id Not Found.'
    ], REST_Controller::HTTP_PRECONDITION_FAILED);       
  }
        //-------------------ends -------------------------------------------//
            //-----------------checking image path empty---------------------------//
  if (empty($imagePath)) {
    $this->response([
      'status' => 500,
      'status_message' => 'Please Enter Profile Images.'
    ], REST_Controller::HTTP_PRECONDITION_FAILED);
  }
        //-------------------ends -------------------------------------------//

  $result = $this->Editprofile_model->updateImage($data);
  if($result == TRUE){
   $this->response([
    'status' => 200,
    'status_message' => 'Profile Image Updated Successfully.'], REST_Controller::HTTP_OK);
 }else{
  $this->response([
    'status' => 500,
    'status_message' => 'Something Went Wrong..! Profile Image Not Upated Successfully.'], REST_Controller::HTTP_PRECONDITION_FAILED);
}
}
//--------fun for update profile ends here-----------------------//
}
