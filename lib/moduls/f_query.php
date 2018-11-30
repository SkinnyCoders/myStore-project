<?php 

include 'f_conn.php';

function viewData($query){
	global $conn;

	$result = mysqli_query($conn, $query);

	$rows = [];

	while ($row = mysqli_fetch_assoc($result)) {
		$rows = $row;
	}

	return $rows;
}

function viewsData($query){
	global $conn;

	$result = mysqli_query($conn, $query);

	$rows = [];

	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}

	return $rows;
}

function getData($query){
	global $conn;

	$result = mysqli_query($conn, $query);

	return mysqli_fetch_assoc($result);
}

function cekData($query){
	global $conn;

	$result = mysqli_query($conn, $query);

	return mysqli_num_rows($result);
}

function insertData($query){
	global $conn;

	$result = mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function updateData($query){
	global $conn;

	$result = mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

