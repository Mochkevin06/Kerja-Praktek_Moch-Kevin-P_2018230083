<?php
session_start();
include("koneksi.php");


if (isset($_POST["simpan"])) {
    $id_book = $_POST['id_book'];
    $status = $_POST['status'];


    $sql = mysqli_query($conn, "UPDATE transaksi SET status = '$status' WHERE id_book = '$id_book'");
    $sqll = mysqli_query($conn, "UPDATE bayar_transfer SET status = '$status' WHERE id_book = '$id_book'");

    if ($sql && $sqll) {
        echo  "<script>window.alert('berhasil'); document.location='index.php?url=transfer';</script>";
    } else {
        echo  "<script>window.alert('hapus gagal'); document.location='index.php?url=admin';</script>";
    }
}
