<?php 

function filter($data){
	$varFilter = htmlspecialchars(strip_tags($data, ENT_QUOTES));
	return $varFilter;
}

 ?>