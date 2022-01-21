<?php
session_start();
include("koneksi.php");
//variabel yang berisi inputan dari member
if (isset($_POST["simpan"])) {

    $ekstensi_diperbolehkan    = array('png', 'jpg');
    $ukuran    = $_FILES['foto_bukti']['size'];
    $id_book = $_POST['id_book'];
    $total_bayar = $_POST['total_bayar'];
    $atas_nama = $_POST['atas_nama'];
    $rek_kirim = $_POST['rek_kirim'];
    $rek_tuju = $_POST['rek_tuju'];
    $tanggal = date('Y-m-d', time() + 60 * 60 * 6);
    $status = "Menunggu Konfirmasi admin";
    $gambar = $_FILES['foto_bukti']['name'];
    $x = explode('.', $gambar);
    $ekstensi = strtolower(end($x));
    $lokasi = $_FILES['foto_bukti']['tmp_name'];


    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 1044070) {
            //simpan foto ke folder
            move_uploaded_file($lokasi, 'assets/bukti_bayar/' . $gambar);
            //simpan ke database
            $simpan = "insert into bayar_transfer values('$id_book','$total_bayar','$rek_kirim','$atas_nama','$rek_tuju','$status','$gambar','$tanggal')";
            //update data di database
            $s = mysqli_query($conn, "update transaksi set status = '$status' where id_book = '$id_book'");
            $pro = mysqli_query($conn, $simpan);

            if ($pro && $s) { //jika berhasil menyimpan dan update
                echo "<script> alert(\"Silahkan tunggu konfirmasi admin\"); window.location = \"konfirmasi_pembayaran.php\"; </script>";
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
