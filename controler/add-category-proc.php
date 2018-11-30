<?php 
include '../lib/moduls/f_filter.php';
include '../lib/moduls/f_query.php';
include '../lib/moduls/f_conn.php';


//Proses ADD Kategori
if (isset($_POST['simpan-kategori'])) {
	$varCatName = strtolower(filter($_POST['frmCategory']));

	if (empty($varCatName)) {
		echo "<script>alert('Nama Kategori belum diinputkan');window.location='".$_SERVER['HTTP_REFERER']."'</script>";
		return false;
	}elseif (strlen($varCatName)> 20 ) {
		echo "<script>alert('Upss! Nama Kategori terlalu panjang');window.location='".$_SERVER['HTTP_REFERER']."'</script>";
		return false;
	}elseif (strlen($varCatName) < 3 ) {
		echo "<script>alert('Upss! Nama Kategori tidak boleh kurang dari 3 karakter');window.location='".$_SERVER['HTTP_REFERER']."'</script>";
		return false;
	}

	$varSQL = "SELECT * FROM category WHERE category_name ='$varCatName'";
	$varCekData = cekData($varSQL);

	if ($varCekData > 0) {
		echo "<script>alert('Upss! Nama Kategori telah digunakan');window.location='".$_SERVER['HTTP_REFERER']."'</script>";
		return false;
	}else{
		$varInsert = insertData("INSERT INTO category VALUES('','$varCatName')");
		if ($varInsert > 0) {
			echo "<script>alert('Data berhasil disimpan');window.location='".$_SERVER['HTTP_REFERER']."'</script>";
		}else{
			echo "<script>alert('Data gagal disimpan');window.location='".$_SERVER['HTTP_REFERER']."'</script>";
		}
	}
}

// Proses update
if (isset($_POST['update'])) {

	$varId = $_GET['category_id'];
	$varCatName = strtolower(filter($_POST['frmCategory']));

	$varUpdate = updateData("UPDATE category SET category_name='$varCatName' WHERE category_id=$varId");
	if ($varUpdate > 0) {
		echo "<script>alert('Data berhasil diubah');window.location='admin/index.php?pages=category'</script>";
	}
}

// Proses Hapus Kategori
$varCatId = $_GET['category_id'];
if ($_GET['action'] == "delete"){
	$varResult = mysqli_query($conn, "DELETE FROM category WHERE category_id='$varCatId'");
	if ($varResult > 0) {
		echo "<script>alert('Data berhasil dihapus');window.location='".$_SERVER['HTTP_REFERER']."'</script>";
	}
}





 ?>