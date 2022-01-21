<?php
session_start();
include("koneksi.php");


if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = mysqli_query($conn, "SELECT * FROM tbl_user WHERE username = '$username' AND passwordd='$password'");
    $result  = mysqli_num_rows($sql);


    //cek username 
    if ($result > 0) {

        //cek password 
        $row = mysqli_fetch_assoc($sql);

        if ($row['level'] == "admin") {

            // buat session login dan username
            $_SESSION["login"] = true;
            $_SESSION['username'] = $username;
            $_SESSION['level'] = "admin";
            // alihkan ke halaman dashboard admin
            header("location:admin");

            // cek jika user login sebagai pegawai
        } else if ($row['level'] == "user") {
            // buat session login dan username
            $_SESSION["login"] = true;
            $_SESSION['username'] = $username;
            $_SESSION['level'] = "user";
            // alihkan ke halaman dashboard pegawai
            header("location:index.php");

            // cek jika user login sebagai pengurus
        } else {

            // alihkan ke halaman login kembali
            echo '<script>alert("Welcome to Geeks for Geeks")</script>';
        }
    } else {
        echo "<script> alert(\"Maaf, Username atau Password anda salah...\"); window.location = \"login.php?pesan=gagal\"; </script>";
    }
}
