<?php

namespace App\View\Helper;

use Cake\View\Helper;

class StringHelper extends Helper {
	public function lnameFirst($fname, $mname, $lname) {
		// Logic to create specially formatted link goes here...
		$output = '';
		
		if (! empty ( $lname ) & strlen ( trim ( $lname ) ) > 0) {
			$output = $lname;
		}
		
		if (strlen ( trim ( $fname ) ) > 0) {
			$output = $output . ',' . $fname;
		}
		if (strlen ( trim ( $mname ) ) > 0) {
			$output = $output . ' ' . $mname;
		}
		return $output;
	}
	public function addressFormat($address_1, $building) {
		// Logic to create specially formatted link goes here...
		$output = '';
		
		if (strlen ( trim ( $address_1 ) ) > 0) {
			$output = $address_1;
		}
		
		if (strlen ( trim ( $building ) ) > 0) {
			$output = $output . ',' . $building;
		}
		
		return $output;
	}
	/**
	 *
	 * @param unknown $mon        	
	 * @param unknown $year        	
	 */
	public function moYearFormat($mon, $year) {
		// Logic to create specially formatted link goes here...
		$output = '';
		
		if (strlen ( trim ( $mon ) ) > 0) {
			$output = $mon;
		}
		
		if (strlen ( trim ( $year ) ) > 0) {
			$output = $output . ',' . $year;
		}
		
		return $output;
	}
	/**
	 *
	 * @param Array $values        	
	 */
	public function concatenateThemes($values, $str) {
		$cnt = 1;
		$output = "";
		foreach ( $values as $val ) {
			
			if (strlen ( trim (  $val [$str] ) ) > 0) {
				// Check if first else prefix comma
				if ($cnt == 1) {
					$output = $val [$str];
				} else {
					$output = $output . ',' . $val [$str];
				}
			}
			$cnt = $cnt + 1;
		}
		
		return $output;
	}
}