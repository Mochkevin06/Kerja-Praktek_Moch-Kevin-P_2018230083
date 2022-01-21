<?php
include_once("koneksi.php");

$id_book = $_GET['id'];


$sql = mysqli_query($conn, "UPDATE transaksi SET status = 'Dibatalkan' WHERE id_book = '$id_book'");

if ($sql) {
    echo  "<script>window.alert('data berhasil dihapus'); document.location='index.php?url=transaksi';</script>";
} else {
    echo  "<script>window.alert('hapus gagal'); document.location='index.php?url=pelanggan';</script>";
}
