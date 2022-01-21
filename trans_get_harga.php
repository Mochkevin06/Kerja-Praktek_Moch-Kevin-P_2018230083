<?php

require 'koneksi.php';

$query = mysqli_query($conn, "SELECT * FROM tbl_lapangan WHERE id_lapangan='" . mysqli_escape_string($conn, $_POST['id_lapangan']) . "'");
$data = mysqli_fetch_array($query);

echo json_encode($data);
