<?php
 if (!empty($facfnames)){
	echo '<option value="">'. Configure::read('Select.defaultBefore') . __('Please Select') . Configure::read('Select.defaultAfter') . '</option>';
	foreach ($facfnames as $val) {
		echo '<option value="' .$val['Faculty_ID'] . '">'. h($val['Faculty_Fname']) .'</option>';
	}
} else {
	echo '<option value="0">' . Configure::read('Select.naBefore') . __('Not Available') . Configure::read('Select.naAfter') . '</option>';
}