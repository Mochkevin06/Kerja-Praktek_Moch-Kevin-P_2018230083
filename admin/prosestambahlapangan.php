<?php
session_start();
include("koneksi.php");
//variabel yang berisi inputan dari member
if (isset($_POST["simpan"])) {

    $ekstensi_diperbolehkan    = array('png', 'jpg');
    $ukuran    = $_FILES['foto_lapangan']['size'];

    $lapangan = $_POST['lapangan'];
    $detail = $_POST['detail'];
    $gambar = $_FILES['foto_lapangan']['name'];
    $x = explode('.', $gambar);
    $ekstensi = strtolower(end($x));
    $lokasi = $_FILES['foto_lapangan']['tmp_name'];
    $harga = $_POST['harga'];

    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 1044070) {
            //simpan foto ke folder
            move_uploaded_file($lokasi, 'img/lapangan/' . $gambar);
            //simpan ke database
            $simpan = "insert into tbl_lapangan values('id','$lapangan','$detail','$gambar','$harga')";
            //update data di database
            $pro = mysqli_query($conn, $simpan);


            if ($pro) { //jika berhasil menyimpan dan update
                echo "<script> alert(\"Silahkan tunggu konfirmasi admin\"); window.location = \"index.php\"; </script>";
            } else { //jika tidak
                echo "<script> alert(\"Maaf, Terjadi Kesalahan...\"); window.location = \"index.php\"; </script>";
            }
        } else {
            echo 'UKURAN FILE TERLALU BESAR';
        }
    } else {
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
    }
}
