<?php
session_start();
include("koneksi.php");


if (isset($_POST["simpan"])) {

    $username = $_POST["username"];
    $nama_usr = $_POST["nama_usr"];
    $email  = $_POST["email"];
    $tempat_lahir  = $_POST["tempat_lahir"];
    $tanggal_lahir  = $_POST["tanggal_lahir"];
    $alamat  = $_POST["alamat"];
    $no_tlp  = $_POST["no_tlp"];


    $sqll = mysqli_query($conn, "UPDATE tbl_user SET nama_usr='$nama_usr',email='$email',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',alamat='$alamat',no_tlp='$no_tlp' WHERE username = '$username'");

    if ($sqll) {
        echo  "<script>window.alert('Update data berhasil'); document.location='biodata_akun.php';</script>";
    } else {
        echo "Registrasi Tidak Berhasil";
    }
}
