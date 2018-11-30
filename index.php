<?php 

if (isset($_GET['pages'])) {
	include_once 'p/index.php';
}else{
	include_once 'p/product/index.php';
}
 ?>
