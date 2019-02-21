<?php

//evaluate data entered by the customer.
function evaluate($val) 
{
	$notAllowed = array("'",'\\','<','>',"\"");
	$val = str_replace($notAllowed, "", $val);
	return $val;
}

// format time to microtime.
function _giveFormat($date)
{
	return strtotime(substr($date, 6, 4)."-".substr($date, 3, 2)."-".substr($date, 0, 2)." " .substr($date, 10, 6)) * 1000;
}
 ?>
