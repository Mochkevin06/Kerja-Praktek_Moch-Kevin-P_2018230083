<?php

require 'koneksi.php';
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if (isset($_SESSION['login'])) {
	$username = $_SESSION['login'];
	$sql = "select * from tbl_user where username = '$username'";
	$query_sel = mysqli_query($conn, $sql);
	$sql_sel = mysqli_fetch_array($query_sel);
}
$query = mysqli_query($kon, "SELECT * FROM tbl_lapangan WHERE judul='" . mysqli_escape_string($kon, $_POST['judul']) . "' && username='$username'");
$data = mysqli_fetch_array($query);

echo json_encode($data);
