<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ERROR | E_PARSE);
class Membership_model extends CI_Model
{

	// -----------------------GET ALL USER INFO MODEL----------------------//
	//-------------------------------------------------------------//
	public function getUserDetails_pay($user_id)
	{
		$query = "SELECT * FROM jm_user_tab, jm_userprofile_tab WHERE jm_user_tab.jm_user_id=jm_userprofile_tab.jm_user_id AND jm_user_tab.jm_user_id='$user_id'";
		$result=$this->db->query($query);  
		if ($result->num_rows() <= 0) 
		{
			$response = array(                                             
				'status' => 500,
				'status_message' => 'No Record Found.');                           
		} else {
			$response = array(
				'status' => 200,
				'status_message' => $result->result_array());
		}
		return $response;
	}

	// -----------------------GET ALL USER INFO MODEL----------------------//

	//---------------------function for save membership payment details--------------//
	function save_paymentdetails($data){
		//print_r($data);die();
		extract($data);
		$checkTransaction=Membership_model::checkTransaction_exist($txnid);
		if($checkTransaction)
		{
			$date=date('Y-m-d');
			$query="INSERT INTO jm_membership_payment(jm_user_id,jm_user_name,jm_package,jm_status,jm_txnid,jm_amount,jm_hash,jm_subscribed_date)VALUES('$user_id','$user_name','$productinfo','$status','$txnid','$amount','$hash',NOW())";
      //echo $query;die();

			if($this->db->query($query)) {	
				if($status!='failure' && $status!=''){
					Membership_model::get_update_subscription($productinfo,$user_id);
				}

				$response = array(
					'status' => 200,
					'status_message' => 'Transaction saved successfully.');
			} 
			else {
				$response = array(
					'status' => 500,
					'status_message' => 'Transaction failed.');
			}
		}
		else {
	 	//if email-Id already regiterd then show error
			$response=array(
				'status' => 500,
				'status_message' =>'Transaction ID: '.$txnid.' already saved !!!'					
			);	
		}	

		return $response;
	}
	//-----End function for save membership payment details-----------------------------//


      //---------------------function to check whetherTransaction already exists to avoid reinsert data if page refreshed------------------//
	function checkTransaction_exist($jm_txnid)
	{
		$query = null;
		$query = $this->db->get_where('jm_membership_payment', array(//making selection
			'jm_txnid' => $jm_txnid
		));		
		
		if ($query->num_rows() > 0) {
			return 0;			
		} else {
			return 1;			
		}
	}
//-----------------------function to check whether Transaction already exists  to avoid reinsert data if page refreshed------------------//

	public function get_update_subscription($membership_package,$user_id)
	{
		$select_query = "SELECT * FROM jm_user_tab WHERE jm_user_id='$user_id'";
		//echo $query;die();
		$result = $this->db->query($select_query);
		if ($result->num_rows() <= 0) {
			$response = array(
				'status' => 500,
				'status_message' => 'update subscription failed.');
		} else {
			$total_bids='';
			$total_view='';

			$avail_bids='';
			$avail_view='';
			$current_package='';
			foreach ($result->result_array() as $row) 
			{
				$total_bids = $row['total_bids'];
				$total_view = $row['total_view'];

				$avail_bids= $row['avail_bids'];
				$avail_view= $row['avail_view'];
				$current_package= $row['membership_package'];

			}
			switch($membership_package)
			{
				case 'P/M' :
				$avail_bids=$avail_bids+50;
				$total_bids=$avail_bids;

				if($avail_bids>=200){
					$avail_bids=200;
					$total_bids=200;
				}

				$avail_view=-1;
				$total_view=-1;
				// if($current_package=='FREE'){
				// 	$total_bids=50;
				// 	$avail_bids=50;
				$current_package='P/M';
				// }
				break;
				
				case 'P/Y' :
				$avail_bids=$avail_bids+50;
				$total_bids=$avail_bids;

				if($avail_bids>=200){
					$avail_bids=200;
					$total_bids=200;
				}

				$avail_view=-1;
				$total_view=-1;
				$current_package='P/Y';
				break;

			}    
			$query = "UPDATE jm_user_tab SET membership_package='$current_package',total_bids='$total_bids',avail_bids='$avail_bids',total_view='$total_view',avail_view='$avail_view' WHERE jm_user_id ='$user_id'";
			//echo $query;die();	
			$result = $this->db->query($query);

			if ($result) {
				$response = array(
					'status' => 200,
					'status_message' => ' Updated Successfully..!');
			} else {
				$response = array(
					'status' => 500,
					'status_message' => ' Update Failed...!');
			}			
		}
		print_r($response);
	}

	public function	cron_job_membership()
	{
		$select_query = "SELECT *FROM jm_user_tab WHERE jm_profile_type='3' OR jm_profile_type='1'";
		
		//$query = "SELECT * FROM jm_membership_payment WHERE jm_profile_type='3' OR jm_profile_type='1'";
		$result=$this->db->query($select_query);  
		if ($result->num_rows() <= 0) 
		{
			$response = array(                                             
				'status' => 500,
				'status_message' => 'No data Found.');                           
		} else {

//			$jm_subscribed_date='';
			foreach ($result->result_array() as $row) 
			{
				$profile_type=$row['jm_profile_type'];
				$jm_package=$row['membership_package'];
				$avail_bids=$row['avail_bids'];
				$total_bids=$row['total_bids'];

				$avail_view=$row['avail_view'];
				$total_view=$row['total_view'];
				//echo $jm_package;//die();
				$query = "SELECT * FROM jm_membership_payment WHERE jm_user_id=".$row['jm_user_id']." ";
				//echo $query;die();
				$result_set=$this->db->query($query);  
				if ($result_set->num_rows() > 0) 
				{
					$jm_subscribed_date='';
				// -----------------payment membership foreach------------------------//
					foreach ($result_set->result_array() as $key) 
					{
				//echo $key['jm_subscribed_date'];die();
						$jm_subscribed_date = $key['jm_subscribed_date'];

						$current_date=date('Y-m-d');
						$date1Timestamp = strtotime($current_date);
						$date2Timestamp = strtotime($jm_subscribed_date);
						$difference = $date1Timestamp - $date2Timestamp;
						$diff= floor($difference / (60 * 60 * 24));
						$date_difference=$diff;
						echo '<p>'.$date_difference.'</p>';

						switch ($jm_package) {
							case 'P/M':
							if($date_difference>30)
							{
								if($profile_type==1){
									$avail_bids = 20;
									$total_bids = 20;
								}
								if($profile_type==3){
									$avail_view = 3;
									$total_view = 3;
								}
								$jm_package='FREE';
							}

							break;

							case 'P/Y':
							if($date_difference>365)
							{

								if($profile_type==1){
									$avail_bids = 20;
									$total_bids = 20;
								}
								if($profile_type==3){
									$avail_view = 3;
									$total_view = 3;
								}
								echo $avail_bids;
								$jm_package='FREE';
							}
							else{
								if($date_difference>30 && $profile_type==1)
								{
									$avail_bids=$avail_bids+50;
									$total_bids=$avail_bids;
								}
							}

							break;

						}
							// ----------end of switch----------------------

						$Update_query = "UPDATE jm_user_tab SET membership_package='$jm_package',total_bids='$total_bids',avail_bids='$avail_bids',total_view='$total_view',avail_view='$avail_view' WHERE jm_user_id =".$row['jm_user_id']."";
						//echo $Update_query;
						$result = $this->db->query($Update_query);
					}
       		 // ----------------end of foreach---------------------------------

				}

				//$Update_query = "UPDATE jm_user_tab SET membership_package='$membership_package',total_bids='$total_bids',avail_bids='$avail_bids' WHERE jm_user_id ='$user_id'";
				//$result = $this->db->query($Update_query);
				// if ($result) {
				// 	$response = array(
				// 		'status' => 200,
				// 		'status_message' => ' Updated Successful');
				// } else {
				// 	$response = array(
				// 		'status' => 500,
				// 		'status_message' => ' Update Failed');
				// }		
			}

		}
	     // print_r($response);die();
		return $response;
	}
}//end of class