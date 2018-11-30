<?php 
include_once '../lib/moduls/f_conn.php';
include_once '../admin/moduls/f_alert.php';
include_once '../lib/moduls/f_filter.php';
include_once '../lib/moduls/f_query.php';

 			
if (isset($_POST['login'])) {
$varUserAdmin = filter(strtolower($_POST['frmUsername']));
$varPassword = mysqli_real_escape_string($conn, $_POST['frmPassword']);

 $varSQL = "SELECT * FROM admin WHERE admin_username = '$varUserAdmin'";
 $varSQLBlock = "SELECT admin_block_status, admin_log_status FROM admin WHERE admin_username = '$varUserAdmin'";
 $varCekUser = cekData($varSQL);
 $varCekBlock = getData($varSQLBlock);

 if (empty($varUserAdmin)) {
 	$alert = alertDanger('Upss! Username belum diinputkan!');
    return false;

 }elseif (empty($varPassword)) {
 	$alert = alertDanger('Upss! Password belum diinputkan!');
    return false;

 }elseif ($varCekBlock['admin_block_status'] == 'Y') {
 	$alert = alertDanger('Upss! Akun anda telah terblokir!');
    return false;

 }elseif ($varCekBlock['admin_log_status'] == 'Y') {
  $alert = alertDanger('Upss! Akun ini sedang online!');
    return false;

 }elseif ($varCekUser > 0) {
 		$varGetDataUser = getData($varSQL);
 		if (password_verify($varPassword, $varGetDataUser['admin_password'])) {
 			session_start();
      $_SESSION['login'] = "login";
      $_SESSION['admin_id'] = $varGetDataUser['admin_id'];
			$_SESSION['name'] = $varGetDataUser['admin_name'];
      $_SESSION['user'] = $varGetDataUser['admin_username'];
      $_SESSION['since'] = $varGetDataUser['admin_register_date'];
      setcookie('admin_id', base64_encode($varGetDataUser['admin_id']), time()+(60*60*24*7), '/');

      updateData("UPDATE admin SET admin_log_status='Y' WHERE admin_id=".$_SESSION['admin_id']."");
 			header('location: index.php?pages');
 		}else{
 			$varErrorDate = date('Y-m-d');
 			$varError = 1;
 			$varSQLError = "SELECT admin_id, admin_counter_date, admin_counter_error FROM admin_counter WHERE admin_counter_date='$varErrorDate' AND admin_id=".$varGetDataUser['admin_id']."";
 			$varErrorLogin = cekData($varSQLError);
 			if ($varErrorLogin == 0) {
 				insertData("INSERT INTO admin_counter VALUES ('','".$varGetDataUser['admin_id']."','$varError','$varErrorDate')");
 			}else{
 				$varGetDataError = getData($varSQLError);
 				// if ($varGetDataError['admin_counter_date'] == $varErrorDate) {
 				// 	$varCounterError = getData("SELECT admin_id,admin_counter_error,admin_counter_date FROM admin_counter WHERE admin_id='".$varGetDataError['admin_id']."'");
 					if ($varGetDataError['admin_counter_error'] < 3) {
 						$varErrorCount = $varError+1;
 						$varErrorCount = ++$varErrorCount;
            updateData("UPDATE admin_counter SET admin_counter_error='$varErrorCount' WHERE admin_counter_date='$varErrorDate' AND admin_id=".$varGetDataError['admin_id']."");
 					}elseif ($varGetDataError['admin_counter_error'] == 3) {
 						updateData("UPDATE admin SET admin_block_status='Y' WHERE admin_id=".$varGetDataError['admin_id']."");
 					}
 				//}
 			}
      $alert = alertWarning('Upss! Password yang anda masukan salah!');
      return false;
 		}
 	}else{
 		$alert = alertDanger('Upss! Username anda belum terdaftar!');
    return false;
 	}	
} 

 ?>