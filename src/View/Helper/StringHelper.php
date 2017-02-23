<?php
namespace App\View\Helper;

use Cake\View\Helper;

class StringHelper extends Helper {
	public function lnameFirst($fname, $mname,$lname)
	{
		// Logic to create specially formatted link goes here...
		
		$output='';
		
		if(!empty($lname) & strlen(trim($lname)) > 0){
			$output=$lname;
		}
		
		if(strlen(trim($fname)) > 0){
			$output=$output.','.$fname;
		}
		if(strlen(trim($mname)) > 0){
			$output=$output.' '.$mname;
		}
		return $output;
	}
	public function addressFormat($address_1, $building)
	{
		// Logic to create specially formatted link goes here...
	
		$output='';
	
		if(strlen(trim($address_1)) > 0){
			$output=$address_1;
		}
	
		if(strlen(trim($building)) > 0){
			$output=$output.','.$building;
		}
		
		
		return $output;
	}
	
	
}