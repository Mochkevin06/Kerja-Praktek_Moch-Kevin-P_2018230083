<?php
include "koneksi.php";
//variabel yang berisi inputan dari member
$id_book = $_POST['id_book'];
$atas_nama = $_POST['atas_nama'];
$total_bayar = $_POST['total_bayar'];
$rek_kirim = $_POST['rek_kirim'];
$rek_tuju = $_POST['rek_tuju'];
$status = "Menunggu Konfirmasi admin";
$tanggal = date('Y-m-d', time() + 60 * 60 * 6);
$foto = $_FILES['foto_bukti']['name'];
$lokasi = $_FILES['foto_bukti']['tmp_name'];
//simpan foto ke folder
copy($lokasi, "assets/bukti_bayar/" . $foto);
//simpan ke database
$simpan = "insert into bayar_transfer values('','$id_book','$total_bayar','$rek_kirim','$atas_nama','$rek_tuju','$status','$foto','$tanggal')";
//update data di database
$s = mysqli_query($conn, "update transaksi set status = '$status' where id_book = '$id_book'");
$pro = mysqli_query($conn, $simpan);


if ($pro && $s) { //jika berhasil menyimpan dan update
	echo "<script> alert(\"Silahkan tunggu konfirmasi admin\"); window.location = \"index.php\"; </script>";
} else { //jika tidak
	echo "<script> alert(\"Maaf, Terjadi Kesalahan...\"); window.location = \"index.php\"; </script>";
}
