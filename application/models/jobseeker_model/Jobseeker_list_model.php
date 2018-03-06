<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jobseeker_list_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
//    get all job seeker list for explore jobseeker
    
    public function all_jobSeeker(){
       $sqlSelect = "SELECT * FROM jm_user_tab JOIN jm_userprofile_tab ON jm_userprofile_tab.jm_user_id=jm_user_tab.jm_user_id WHERE jm_user_tab.jm_profile_type = '3' ORDER BY jm_user_tab.jm_username ASC ";

       $result = $this->db->query($sqlSelect);
       if ($result->num_rows() <= 0) {
        $response = array(
            'status' => 500,
            'status_message' => 'Job Seeker list is empty.');
    } else {
        $response = array(
            'status' => 200,
            'status_message' => $result->result_array());
    }
    return $response;
}


// -----------------------------------------------------------------------------
public function filterSeeker($data){

    if($data['mode']['mode'] == 'jobseeker_list'){ 
            //echo 'sujeet';exit;
        $cond = "";
        $join_tabs='jm_user_tab as u join jm_userprofile_tab as ut on(ut.jm_user_id = u.jm_user_id)';
        $cond .= " u.jm_profile_type = '3' ";

        if($data['fileds']){
                //print_r($data);die();
            $count=1;
            foreach ($data['fileds'] as $k => $val) {

                $valArr = explode('/', $val);

                if($valArr[0] != ''){

                    if($valArr[1] != 'LIKE'){
                        $cond .= "AND us.".$k." ".$valArr[1]." '".$valArr[0]."' ";
                        $join_tabs='jm_user_tab as u join jm_userSkills_tab as us join jm_userprofile_tab as ut on(u.jm_user_id = us.jm_user_id AND ut.jm_user_id = u.jm_user_id)';
                    }else{
                        if($count==1){
                            $cond .= "AND (ut.".$k." ".$valArr[1]." '%".$valArr[0]."%'  ";
                            $count++;
                        }   
                        else{
                            $cond .= "OR ut.".$k." ".$valArr[1]." '%".$valArr[0]."%'  )";
                        }                       

                    }                       
                }

            }

                //echo $cond;exit;

            $query = "SELECT * FROM $join_tabs WHERE $cond ORDER BY u.jm_username ASC";
                //echo $query;die();
            //exit;
            $q=$this->db->query($query);  
                // $this->db->order_by('jm_project_id', 'DESC');
                // $q = $this->db->get($data['table']['table']);
        }else{
            $err='N/A';
            return $err;
        }
    }

        //echo $this->db->last_query();
        //print_r($q->num_rows());exit;

    if($q->num_rows() <=0)
    {   
        $err='N/A';
        return $err;
    }   
    else{
        return $q->result_array();
    }   
}
    // ---------------------------------------------------------

    // ------------------------------------------------filter job list-----------------------//

// -----------------------------------------------------------------------------
public function filterJob($data){
//print_r($data);die();
    if($data['mode']['mode'] == 'job_list'){ 
            //echo 'sujeet';exit;
        $cond = "";
        if($data['fileds']){
                //print_r($data);
            $filed_count=count($data['fileds']);
            foreach ($data['fileds'] as $k => $val) {
                    //print_r(count($data['fileds']));
                $valArr = explode('/', $val);
                if($valArr[0] != ''){
                    //print_r($valArr);
                    if($valArr[1] == 'LIKE'){
                        if($filed_count!=1 ){                            
                            $cond .= " ($k ".$valArr[1]." '".$valArr[0]."%' OR ";
                        }
                        else{
                            $cond .= "$k ".$valArr[1]." '".$valArr[0]."%') AND ";
                        }

                    }else{
                        $cond .= "$k ".$valArr[1]." '".$valArr[0]."' AND ";
                    }

                }
                $filed_count--;
            }

            if($cond!= ''){
               $query = "SELECT * FROM jm_post_job WHERE $cond is_active='1' ORDER BY jm_jobpost_id DESC";
           }else{
               $query = "SELECT * FROM jm_post_job  WHERE is_active='1' ORDER BY jm_jobpost_id DESC";

           }
                //echo $query;die();
            //exit;
           $q=$this->db->query($query);  
                // $this->db->order_by('jm_project_id', 'DESC');
                // $q = $this->db->get($data['table']['table']);
       }else{
        $err='N/A';
        return $err;
    }
}

        //echo $this->db->last_query();
        //print_r($q->num_rows());exit;

if($q->num_rows() <=0)
{   
    $err='N/A';
    return $err;
}   
else{
    return $q->result_array();
}   
}
    // ---------------------------------------------------------
    //-------------------------------------end------------------------------------------//
}
