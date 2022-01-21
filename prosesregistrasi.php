<?php
session_start();
include("koneksi.php");


if (isset($_POST["registrasi"])) {

    $username = $_POST["username"];
    $nama_usr = $_POST["nama_usr"];
    $email  = $_POST["email"];
    $tempat_lahir  = $_POST["tempat_lahir"];
    $tanggal_lahir  = $_POST["tanggal_lahir"];
    $alamat  = $_POST["alamat"];
    $no_tlp  = $_POST["no_tlp"];
    $password  = $_POST["password"];

    $simpan = $_POST['simpan'];

    if ($simpan == 'insert') {
        $cekdata = mysqli_query($conn, "SELECT * FROM tbl_user WHERE username = '$username'");

        if (mysqli_num_rows($cekdata) > 0) {
            echo  "<script>window.alert('Maaf username sudah terdaftar'); document.location='registrasi.php';</script>";
        } else {
            $sql = "INSERT INTO tbl_user (username,nama_usr,email,tempat_lahir,tanggal_lahir,alamat,no_tlp,password)
            VALUES('$username','$nama_usr','$email','$tempat_lahir','$tanggal_lahir','$alamat','$no_tlp','$password')";


            if ($conn->query($sql) === TRUE) {
                echo  "<script>window.alert('Registrasi anda berhasil'); document.location='index.php';</script>";
            } else {
                echo "Registrasi Tidak Berhasil";
                header("location: registrasi.php");
            }
        }
    } else {
        $sqll = mysqli_query($conn, "UPDATE tbl_user SET nama_usr='$nama_usr',email='$email',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',alamat='$alamat',no_tlp='$no_tlp' WHERE username = '$username'");

        if ($conn->query($sqll) === TRUE) {
            echo  "<script>window.alert('Update data berhasil'); document.location='biodata_akun.php';</script>";
        }
    }
}
