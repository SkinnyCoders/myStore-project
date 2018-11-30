<?php 	
function kode($panjang = 5){
	$kodeProduct = "";
	$angka = range(0, 9);
	$max = count($angka)-1;
	for ($i=0; $i < $panjang; $i++) { 
		$rand = mt_rand(0, $max);
		$kodeProduct .= $angka[$rand];
	}
	return $kodeProduct;
}
 ?>