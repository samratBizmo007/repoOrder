<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');

class AppliedCandidate_Lists_api extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('job_model/Applied_candidatelist_model');
        date_default_timezone_set('Asia/Kolkata'); //set Kuwait's timezone
    }
    public function showApplied_candidate_list_get(){
        extract($_GET);
        $result = $this->Applied_candidatelist_model->showApplied_candidate_list($job_id);
        return $this->response($result);
    }
    public function SaveStatus_get(){
        extract($_GET);
        $Candidate_Status = $_GET['Candidate_Status'];
        $candidate_id = $_GET['candidate_id'];
        $result = $this->Applied_candidatelist_model->SaveStatus($Candidate_Status,$candidate_id);
        return $this->response($result);
    }
    public function download_get(){
        extract($_GET);
        $result = $this->Applied_candidatelist_model->download($user_id);
        return $this->response($result);
    }
    public function hireSelectedStudents_get(){
        extract($_GET);
        $result = $this->Applied_candidatelist_model->hireSelectedStudents($candidate_id,$job_id);
        return $this->response($result);
    }
    public function DownloadCsv_get(){
        extract($_GET);
        $result = $this->Applied_candidatelist_model->DownloadCsv($job_id);
        return $this->response($result);
    }
    public function getShortlistedcandidates_get(){
        extract($_GET);
        $result = $this->Applied_candidatelist_model->getShortlistedcandidates($job_id);
        return $this->response($result);
    }
}