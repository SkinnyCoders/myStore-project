<?php 
include_once '../lib/moduls/f_conn.php';
include_once '../admin/moduls/f_alert.php';
include_once '../lib/moduls/f_filter.php';
include_once '../lib/moduls/f_query.php';

if (isset($_POST['register'])) {
	$varName = strtolower(filter($_POST['frmNama']));
	$varUsername = strtolower(filter($_POST['frmUsername']));
	$varPassword = mysqli_real_escape_string($conn, $_POST['frmPassword']);
	$varRePassword = mysqli_real_escape_string($conn, $_POST['frmRePassword']);
	$varPhoto = "admin.jpg";
	$varLevel = 1;
	$varRegDate = date('d-M-Y');

	//Validasi Form
	if (empty($varName)) {
		$alert = alertDanger('Upss! Nama belum diinputkan!');
		return false;
	}elseif (empty($varUsername)) {
		$alert = alertDanger('Upss! Username belum diinputkan!');
		return false;
	}elseif (empty($varPassword)) {
		$alert = alertDanger('Upss! Password belum diinputkan!');
		return false;
	}elseif (empty($varRePassword)) {
		$alert = alertDanger('Upss! Konfirmasi Password belum diinputkan!');
		return false;
	}elseif (strlen($varPassword) < 8) {
		$alert = alertDanger('Upss! Password kurang dari 8 karakter!');
		return false;
	}elseif ($varPassword !== $varRePassword) {
		$alert = alertDanger('Upss! Konfirmasi password tidak sama!');
		return false;
	}

	//validasi Username
	$varCekUser = cekData("SELECT admin_username FROM admin WHERE admin_username='$varUsername'");
	if ($varCekUser > 0) {
		$alert = alertDanger('Upss! Username sudah digunakan!');
		return false;
	}

	//encrypt Password
	$varPasswordEncrypt = password_hash($varPassword, PASSWORD_DEFAULT);

	//validasi CheckBox
	if (isset($_POST['checkbox'][0])) {
		
		//insert Data
		$varInsert = insertData("INSERT INTO admin VALUES('','$varUsername','$varPasswordEncrypt','$varName','$varPhoto','$varRegDate','$varLevel','N','N')");
		if ($varInsert > 0) {
			$alert = alertSucces('Selamat, Akun anda telah dibuat');
		}else{
			$alert = alertDanger('Akun anda gagal dibuat!');
		}
	}elseif (empty($_POST['checkbox'])) {
		$alert = alertWarning('Harap check kotak persetujuan!');
		return false;
	}

}


 ?>