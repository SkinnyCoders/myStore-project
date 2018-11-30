<?php 
include_once '../lib/moduls/f_conn.php';
include_once '../admin/moduls/f_alert.php';
include_once '../lib/moduls/f_filter.php';


if (isset($_POST['jual'])) {
	$varProductName = strtolower(filter($_POST['frmNamaProduk']));
	$varProductCode = $_POST['frmKodeProduk'];
	$varCateProduct = $_POST['categoryDrop'];
	$varStokProduct = strtolower(filter($_POST['frmStokProduk']));
	$varPriceProduct = strtolower(filter($_POST['frmHargaProduk']));
	$varDescProduct = filter($_POST['frmDeskProduk']);
	$varUploadDate = date('Y-m-d');
	$varUploadProductDate = date('Y-m-d H:i:s');
	$varDiscProduct = 30;


	// //validasi inputan
	if (empty($varProductName)) {
		$alert = alertInputDanger('Nama Produk Belum diinputkan!');
		return false;
	}elseif (empty($varCateProduct)) {
		$alert = alertInputDanger('Kategori produk belum dipilih!');
		return false;
	}elseif ($varErrorImgProduct == 4) {
		$alert = alertInputDanger('Anda belum memilih gambar produk!');
		return false;
	}elseif (empty($varStokProduct)) {
		$alert = alertInputDanger('Stok produk belum diinputkan!');
		return false;
	}elseif (!is_numeric($varStokProduct)) {
		$alert = alertInputDanger('Stok produk hanya berupa angka!');
		return false;
	}elseif (empty($varPriceProduct)) {
		$alert = alertInputDanger('Anda belum menentukan harga produk!');
		return false;
	}elseif (!is_numeric($varPriceProduct)) {
		$alert = alertInputDanger('Harga produk hanya berupa angka!');
		return false;
	}elseif (strrpos($varPriceProduct, '-') == 'true') {
		$alert = alertInputDanger('Harga produk tidak boleh minus!');
		return false;
	}elseif (empty($varDescProduct)) {
		$alert = alertInputDanger('Deskripsi produk belum diinputkan!');
		return false;
	}

	//validasi nama tidak boleh sama
	$varCekNamaProduct = cekData("SELECT product_name FROM product WHERE product_name='$varProductName' ");
	if ($varCekNamaProduct > 0) {
		$alert = alertInputDanger('Nama Produk sudah digunakan!');
		return false;
	}

	var_dump($_FILES); die;

	//proses file gambar
	foreach ($_FILES['fileImageProduk']['tmp_name'] as $key => $tmp_name) {
		$varNameImgProduct = $_FILES['fileImageProduk']['name'][$key];
		$varSizeImgProduct = $_FILES['fileImageProduk']['size'][$key];
		$varErrorImgProduct = $_FILES['fileImageProduk']['error'][$key];
		$varTmpImgProduct = $_FILES['fileImageProduk']['tmp_name'][$key];

	$varCountFile = count($_FILES['fileImageProduk']['tmp_name']);
	if ($varCountFile > 3) {
		$alert = alertInputDanger('Gambar yang anda pilih terlalu banyak!');
		return false;
	}

	//validasi inputan gamabr
	if ($varSizeImgProduct > 1000000 ) {
		$alert = alertInputDanger('Gambar yang anda pilih terlalu besar!');
		return false;
	}
	//validasi ekstensi gambar
	$varExtImgValid = ['jpg','jpeg','png'];
	$varExtImgProduct = explode('.', $varNameImgProduct);
	$varExtImgProduct = strtolower(end($varExtImgProduct));

	if (!in_array($varExtImgProduct, $varExtImgValid)) {
		$alert = alertInputDanger('File yang anda inputkan bukan gambar yang valid!');
		return false;
	}

	//nama produk baru 
	$varNewNameImgProduct = uniqid();
	$varNameImgProduct = $varNewNameImgProduct;
	$varNameImgProduct .= '.';
	$varNameImgProduct .= $varExtImgProduct;

	//memindahkan file gambar ke folder fix
	move_uploaded_file($varTmpImgProduct, '../p/product/img/'.$varNameImgProduct);

	$varInsertImgProduct = insertData("INSERT INTO product_images VALUES ('','$varProductCode','$varNameImgProduct','$varUploadDate')");
	}


	//insert produk
	$varInsertProduct = insertData("INSERT INTO product VALUES ('$varProductCode','$varProductName','$varPriceProduct','$varDiscProduct','$varStokProduct','$varDescProduct','$varCateProduct','$varUploadProductDate')");


	if ($varInsertProduct && $varInsertImgProduct) {
		$alert = alertSucces('Produk berhasil diupload');
	}else{
		$alert = alertInputDanger('Produk gagal diupload!');
	}

}

 ?>