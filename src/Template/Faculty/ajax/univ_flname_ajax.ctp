<?php
 if (!empty($faclnames)){

	
	echo '<option value="">'. Configure::read('Select.defaultBefore') . __('Please Select') . Configure::read('Select.defaultAfter') . '</option>';
	foreach ($faclnames as $fac) {
		echo '<option value="' .$fac['Faculty_Lname'] . '">' .h($fac['Faculty_Lname']).'</option>';
	}
} else {
	echo '<option value="0">' . Configure::read('Select.naBefore') . __('Not Available') . Configure::read('Select.naAfter') . '</option>';
}




