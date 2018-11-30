<?php 
include_once '../lib/moduls/f_conn.php';
include_once '../admin/moduls/f_alert.php';
include_once '../lib/moduls/f_filter.php';
include_once '../lib/moduls/f_query.php';

$_SESSION['member_id'] = 1;

if ($_GET['a'] == 'add') {
	$varProductCode = mysqli_real_escape_string($conn,$_POST['product_code']);
	$varCartQty = filter($_POST['cart_qty']);
	$varMemberId = $_SESSION['member_id'];

	if (empty($varCartQty) OR $varCartQty == 0) {
		echo "<script>alert('Harap masukkan jumlah produk yang ingin dipesan');window.location='".$_SERVER['HTTP_REFERER']."'</script>";
		return false;
	}elseif (strpos($varCartQty, '-') == 'true') {
		echo "<script>alert('Jumlah produk yang dipesan tidak boleh minus');window.location='".$_SERVER['HTTP_REFERER']."'</script>";
		return false;
	}elseif (!is_numeric($varCartQty)) {
		echo "<script>alert('Harap masukkan jumlah produk yang ingin dipesan dalam angka!');window.location='".$_SERVER['HTTP_REFERER']."'</script>";
		return false;
	}

	$varResult = insertData("INSERT INTO cart VALUES ('','$varProductCode','$varCartQty','$varMemberId')");

	if ($varResult) {
		echo "<script>alert('berhasil');history.go(-1);</script>";
		return false;
	}

}

if ($_GET['a'] == 'addQty') {
	$varNewCartQty = $_POST['qty'];
	$varCartId = $_GET['cart_id'];
	$varResult = updateData("UPDATE cart SET cart_qty='$varNewCartQty' WHERE cart_id='$varCartId'");

	if ($varResult) {
		echo "<script>history.go(-1)</script>";
		return false;
	}
}


if ($_GET['a'] == 'delete') {
	$varCartId = $_GET['cart_id'];
	$varResult = insertData("DELETE FROM cart WHERE cart_id='$varCartId'");

	if ($varResult) {
		echo "<script>alert('Produk berhasil dihapus dari keranjang');window.location='".$_SERVER['HTTP_REFERER']."'</script>";
		return false;
	}else{
		echo "<script>alert('Produk gagal dihapus dari keranjang');window.location='".$_SERVER['HTTP_REFERER']."'</script>";
		return false;
	}
}
 ?>