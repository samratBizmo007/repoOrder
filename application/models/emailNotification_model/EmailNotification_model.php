<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class EmailNotification_model extends CI_Model {
//------this fun is used to send the email notification to the freelancer user for not getting logged in from last 15 days------//
    public function getEmailNotifications() {

        $sqlSelect = "SELECT * FROM jm_user_tab WHERE jm_profile_type='1'";
        $result = $this->db->query($sqlSelect);
        $loginDate = '';
        $email_id = '';
        $username = '';

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'mx1.hostinger.in',
            'smtp_port' => '587',
            'smtp_user' => 'customercare@jobmandi.in', // change it to yours
            'smtp_pass' => 'Descartes@1990', // change it to yours
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );
        $config['smtp_crypto'] = 'tls';

        if ($result->num_rows() >= 1) {
            foreach ($result->result_array() as $row) {
                $loginDate = $row['jm_login_date'];
                $email_id = $row['jm_email_id'];
                $username = $row['jm_username'];
                $current_date = date('Y-m-d');

                $current_dateNew = strtotime($current_date);
                $loginDateNew = strtotime($loginDate);
                $difference = $current_dateNew - $loginDateNew;
                $diff = floor($difference / (60 * 60 * 24));
                $date_difference = $diff;

                if ($date_difference >= 15) {

                    $this->load->library('email', $config);
                    $this->email->set_newline("\r\n");
                    $this->email->from('customercare@jobmandi.in', "Admin Team");
                    $this->email->to($email_id);
                    $this->email->subject("JOBMANDI-Customer Support.");
                    $this->email->message("<html>"
                            . "<head>"
                            . "</head>"
                            . "<body>"
                            . "<p><label><b>Dear $username</label></b></p>"
                            . "<p><label>You Have Not Been Login Since 15 days</label></p>"
                            . "<p><label>Please Login..! Update Your Profile..!</label></p>"
                            . "<p><label>BY - Jobmandi Customer Support.</label></p>"
                            . "</body>"
                            . "</html>");

                    $this->email->send(); //----send email function
                }
            }
        }
    }
//------this fun is used to send the email notification to the freelancer user for not getting logged in from last 15 days------//
//------this fun is used to send the email notification to the freelancer employer user for not getting logged in from last 15 days------//

    public function getEmailNotificationsForFreelancer_Employer() {

        $sqlSelect = "SELECT * FROM jm_user_tab WHERE jm_profile_type IN('2','4')";
        $result = $this->db->query($sqlSelect);
        $loginDate = '';
        $email_id = '';
        $username = '';

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'mx1.hostinger.in',
            'smtp_port' => '587',
            'smtp_user' => 'customercare@jobmandi.in', // change it to yours
            'smtp_pass' => 'Descartes@1990', // change it to yours
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );
        $config['smtp_crypto'] = 'tls';

        if ($result->num_rows() >= 1) {
            foreach ($result->result_array() as $row) {
                $loginDate = $row['jm_login_date'];
                $email_id = $row['jm_email_id'];
                $username = $row['jm_username'];
                $current_date = date('Y-m-d');

                $current_dateNew = strtotime($current_date);
                $loginDateNew = strtotime($loginDate);
                $difference = $current_dateNew - $loginDateNew;
                $diff = floor($difference / (60 * 60 * 24));
                $date_difference = $diff;

                if ($date_difference >= 15) {

                    $this->load->library('email', $config);
                    $this->email->set_newline("\r\n");
                    $this->email->from('customercare@jobmandi.in', "Admin Team");
                    $this->email->to($email_id);
                    $this->email->subject("JOBMANDI- Customer Support.");
                    $this->email->message("<html>"
                            . "<head>"
                            . "</head>"
                            . "<body>"
                            . "<p><label><b>Dear $username</label></b></p>"
                            . "<p><label>You Have Not Been Login Since 15 days</label></p>"
                            . "<p><label>Please Login..! Update Your Profile..!</label></p>"
                            . "<p><label>BY - Jobmandi Customer Support.</label></p>"
                            . "</body>"
                            . "</html>");
                    $this->email->send(); //----send email function
                }
            }
        }
    }
//------this fun is used to send the email notification to the freelancer employer user for not getting logged in from last 15 days------//
//------this fun is used to send the email notification to the freelancer Job employer user for not getting logged in from last 5 days------//

    public function getEmailNotificationsForJob_Employer() {

        $sqlSelect = "SELECT project.jm_posted_profile_id,user.jm_login_date,user.jm_email_id,user.jm_username FROM jm_user_tab as user join jm_project_list as project "
                . "ON user.jm_user_id = project.jm_posted_user_id WHERE project.jm_posted_profile_id IN('4','2') GROUP BY(project.jm_posted_user_id)";
        $result = $this->db->query($sqlSelect);
        $loginDate = '';
        $email_id = '';
        $username = '';

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'mx1.hostinger.in',
            'smtp_port' => '587',
            'smtp_user' => 'customercare@jobmandi.in', // change it to yours
            'smtp_pass' => 'Descartes@1990', // change it to yours
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );
        $config['smtp_crypto'] = 'tls';
        //print_r($result->result_array());die();
        if ($result->num_rows() >= 1) {
            foreach ($result->result_array() as $row) {
                $loginDate = $row['jm_login_date'];
                $email_id = $row['jm_email_id'];
                $username = $row['jm_username'];
                $current_date = date('Y-m-d');

                $current_dateNew = strtotime($current_date);
                $loginDateNew = strtotime($loginDate);
                $difference = $current_dateNew - $loginDateNew;
                $diff = floor($difference / (60 * 60 * 24));
                $date_difference = $diff;

                if ($date_difference >= 5) {

                    $this->load->library('email', $config);
                    $this->email->set_newline("\r\n");
                    $this->email->from('customercare@jobmandi.in', "Admin Team");
                    $this->email->to($email_id);
                    $this->email->subject("JOBMANDI- Customer Support.");
                    $this->email->message("<html>"
                            . "<head>"
                            . "</head>"
                            . "<body>"
                            . "<p><label><b>Dear $username</label></b></p>"
                            . "<p><label>You Have Not Been Login Since 5 days</label></p>"
                            . "<p><label>Please Login..! Update Your Profile..!</label></p>"
                            . "<p><label>BY - Jobmandi Customer Support.</label></p>"
                            . "</body>"
                            . "</html>");

                    $this->email->send(); //----send email function
                }
            }
        }
    }
//------this fun is used to send the email notification to the freelancer Job employer user for not getting logged in from last 5 days------//
}
