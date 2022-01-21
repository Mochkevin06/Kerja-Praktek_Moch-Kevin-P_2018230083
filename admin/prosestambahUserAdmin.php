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
    $password  = $_POST["password"];
    $level  = $_POST["level"];



    $cekdata = mysqli_query($conn, "SELECT * FROM tbl_user WHERE username = '$username'");

    if (mysqli_num_rows($cekdata) > 0) {
        echo  "<script>window.alert('Maaf username sudah terdaftar'); document.location='index.php?url=admin';</script>";
    } else {
        $sql = "INSERT INTO tbl_user (username,nama_usr,email,tempat_lahir,tanggal_lahir,alamat,no_tlp,password,level)
            VALUES('$username','$nama_usr','$email','$tempat_lahir','$tanggal_lahir','$alamat','$no_tlp','$password','$level')";


        if ($conn->query($sql) === TRUE) {
            echo  "<script>window.alert('Registrasi anda berhasil'); document.location='index.php?url=admin';</script>";
        } else {
            echo "Registrasi Tidak Berhasil";
        }
    }
}
