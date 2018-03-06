<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
//error_reporting(E_ERROR | E_PARSE);
function timeago($date) {
       $timestamp = strtotime($date);   
       
       $strTime = array("second", "minute", "hour", "day", "month", "year");
       $length = array("60","60","24","30","12","10");

       $currentTime = time();
       if($currentTime >= $timestamp) {
            $diff     = time()- $timestamp;
            for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
            $diff = $diff / $length[$i];
            }
			$unit='';
			$unit = $strTime[$i];
			$diff = round($diff);
           
          
       if($unit=='hour'){
				return 'today';
			}
			else{
            return $diff." ".$strTime[$i]."(s) ago ";
				
			}
       }
    }
?>
