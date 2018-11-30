<?php 
include_once '../lib/moduls/f_conn.php';
include_once '../lib/moduls/f_query.php';

session_start();

$varAdminId = base64_decode($_COOKIE['admin_id']);

if (isset($_COOKIE['admin_id'])) {
	$varUpdate  = updateData("UPDATE admin SET admin_log_status='N' WHERE admin_id=".$varAdminId."");
	session_unset();
	session_destroy();
	header('location:../admin/login.php');
}else{
	$varUpdate  = updateData("UPDATE admin SET admin_log_status='N' WHERE admin_id=".$_SESSION['admin_id']."");
	session_unset();
	session_destroy();
	header('location:../admin/login.php');
}

 ?>