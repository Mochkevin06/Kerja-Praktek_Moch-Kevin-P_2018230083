<?php
include_once("koneksi.php");

$id = $_GET['id'];

$sql = mysqli_query($conn, "DELETE FROM tbl_user WHERE id='$id'");

if ($sql) {
    echo  "<script>window.alert('data berhasil dihapus'); document.location='index.php?url=admin';</script>";
} else {
    echo  "<script>window.alert('hapus gagal'); document.location='index.php?url=admin';</script>";
}
