<?php

if ($centers->toArray()) {
	
	echo '<option value="">' . Configure::read('Select.defaultBefore') . __('pleaseSelect') . Configure::read('Select.defaultAfter') . '</option>';
	foreach ($centers as $k => $v) {
		echo '<option value="' . $k . '">' . h($v) . '</option>';
	}
} else {
	echo '<option value="0">' . Configure::read('Select.naBefore') . __('noOptionAvailable') . Configure::read('Select.naAfter') . '</option>';
}




