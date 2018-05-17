<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model{
    function __construct() {
        $this->tableName = 'fb_users';  //-------- facebook logged in users table
        $this->primaryKey = 'id';
    }
    
    /*
     * Insert / Update facebook profile data into the database
     * @param array the data for inserting into the table
     */
    public function checkUser($userData = array()){
        $fb_id = '';
        $firstname = '';
        $lastname = '';
        $email = '';
        $role = '';
        $username = '';
        $response = '';
        //print_r($userData);die();
        
        if(!empty($userData)){
            $email = $userData['email'];
            //check whether user data already exists in database with same oauth info
            //$this->db->select($this->primaryKey);
            //$this->db->from($this->tableName);
            //$this->db->where(array('oauth_provider'=>$userData['oauth_provider'],'oauth_uid'=>$userData['oauth_uid']));
            $sql = "SELECT id,first_name,last_name FROM fb_users WHERE oauth_provider ='".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
            $prevQuery = $this->db->query($sql);
            //print_r($prevQuery->result_array());die();
            
            $username = $userData['first_name'].'_'.$userData['last_name'];
            $prevCheck = $prevQuery->num_rows();
            
            if($prevCheck > 0){
                
                // ---------get fb user_ID-----------//
                foreach ($prevQuery->result_array() as $row) {
                    $fb_id = $row['id'];
                }
                
                //echo $fb_id;die();
                $prevResult = $prevQuery->row_array();
                
                //update user data
                $userData['modified'] = date("Y-m-d H:i:s");
                $update = $this->db->update($this->tableName,$userData,array('id'=>$prevResult['id']));
                
                //get user ID
                //$userID = $prevResult['id'];
                
                // ------------get user id having facebook id --------------
                $user_sql = "SELECT * FROM user_tab WHERE fb_id ='$fb_id'";
                
                $user_query = $this->db->query($user_sql);
                $user_id=0;
            // ---------get usertab user_ID-----------//
                foreach ($user_query->result_array() as $key) {
                    $user_id = $key['user_id'];
                }
                
                $response = array(
                    'status' => 200,
                    'userID' => $user_id,
                    'user_name' => $username,
                    'role' => '1',
                    'cat_id'=>'',
                    'status_message' => 'Login Successfull'
                );
                
            }else{
                $checkEmail = User::checkEmail_exist($email);
                
                if($checkEmail == 0){
                    
                //insert facebook user data
                    $userData['created']  = date("Y-m-d H:i:s");
                    $userData['modified'] = date("Y-m-d H:i:s");
                    $insert = $this->db->insert($this->tableName,$userData);
                //get user ID
                    $fb_ID = $this->db->insert_id();
                    //echo $fb_ID;die();
                //functionality for saving the user info from facebook to website user table
                    
                    $sqlInsert = "INSERT INTO user_tab (fb_id,role,username,email) values ('$fb_ID','1','$username','$email')"; 
                    $resinsert = $this->db->query($sqlInsert);
                    $user_id = $this->db->insert_id();
                    
                    $response = array(
                        'status' => 200,
                        'userID' => $user_id,
                        'user_name' => $username,
                        'role' => '1',
                        'cat_id'=>'',
                        'status_message' => 'Login Successfull'
                    );
                }else{
                    $response = array(
                        'status' => 500,
                        'status_message' => 'Email ID already registered. Please try another email-ID OR login by the same.'
                    );
                }
                
                
            }
        }
        
        return $response;
       // return $userID?$userID:FALSE;
    }
    // --------------facebook login function ends here---------------------//
    
    // ----------check email id registered or not------------------//
    public function checkEmail_exist($email){
        $query = null;
        $query = $this->db->get_where('user_tab', array('email' => $email));

        if ($query->num_rows() <= 0) {
            return 0;
        } else {
            return 1;
        }
    }
    // ------------------fucntion ends--------------------//
}