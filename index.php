<?php
session_start();
//panggil koneksi database
include "koneksi.php";
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/stylee.css">
  <link rel="stylesheet" type="text/css" href="css/FA5PRO-master/css/all.css">

  <title>Pastel Futsal</title>
</head>

<body>

  <?php
  include "koneksi.php";
  $tanggal = date('Y-m-d', time() + 60 * 60 * 6); //variabel berisi tanggal sekarang
  $jam = date('H:i:s', time() + 60 * 60 * 6); //variabel berisi jam sekarang
  $tanggaljam = date('Y-m-d H:i:s', time() + 60 * 60 * 6); //variabel berisi tanggal dan jam sekarang
  //echo $tanggaljam;
  //$tanggaljam1 = '2016-12-30 10:00:00';
  //$jam1 = '10:00:00';
  $cektr = mysqli_query($conn, "select * from transaksi");
  $cek = mysqli_num_rows($cektr);
  $les = mysqli_fetch_array($cektr);

  if ($cek > 0) {
    //Dibatalkan jika bayar transfer dan telah melewati batas bayar
    //mysqli_query($conn, "update transaksi set status='Dibatalkan' where batas_bayar > tgl_main && jenis_bayar = 'transfer' && (status='Menunggu Transfer')");
    //Dibatalkan jika bayar cod , statusnya masih belum transfer dan telah melewati batas bayar
    //mysqli_query($conn, "update transaksi set status='Dibatalkan' where batas_bayar > tgl_main && jenis_bayar = 'cod' && (status='Booking dan Menunggu Pembayaran')");
    //Selesai jika jam berakhir telah melewati waktu sekarang
    //mysqli_query($conn, "update transaksi set status='Selesai' where tgl_main >= tgl_main && jam_berakhir > '$jam' && (status!='Dibatalkan' && status!='Selesai' && status!='Menunggu Konfirmasi Admin')");
  }
  ?>


  <?php
  include "navbar.php";
  ?>

  <!-- jumbotron -->
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-4"><b>Pastel Futsal Arena</b></h1>
      <p class="lead">Selamat datang di Website Penyewaan Lapngan Futsal. Disini Kami Menyediakan Jasa Penyewaan Lapangan Futsal Secara Online dengan Pelayanan Terbaik Bagi Anda.</p>
      <a class="btn btn-primary" href="pemesanan.php" role="button" style="border-radius: 22px;">Pesan sekarang</a>
    </div>
  </div>
  <!-- End Jumbotron -->


  <!-- Lapangan -->
  <div class="container lapangan">
    <h1><b>LAPANGAN</b></h1>
    <div class="row workingspace">
      <div class="col-lg-5">
        <img src="img/lap1.jpg" alt="workingspace" class="img-fluid">
      </div>
      <div class="col-lg-6 deskripsi">
        <h2><b>Lapangan 1</b></h2>
        <p>Lapangan ini Memakai Matras model Vinyl bahan yang digunakan matras ini sangat bagus dan mempunyai efek lentur yang membuat tetap stabil. Lapangan ini memikili Panjang 27 Meter dan Lebat 19 Meter. Sedangkan gawang lapangan ini memiliki ukuran Lebar 3 Meter dan Tinggi 2 Meter. Lapangan ini juga memiliki 3 Lapisan dimana akan membuat terasa lebih lembut dan tahan dari getaran apapun. Harga Sewa Lapngan ini Sebesar Rp.120.000 Perjam.</p>
      </div>
    </div>

    <div class="row workingspace">
      <div class="col-lg-5">
        <img src="img/lap2.jpg" alt="workingspace" class="img-fluid as">
      </div>
      <div class="col-lg-6 deskripsi">
        <h2><b>Lapangan 2</b></h2>
        <p>Lapangan ini Memakai Matras model Vinyl bahan yang digunakan matras ini sangat bagus dan mempunyai efek lentur yang membuat tetap stabil. Lapangan ini memikili Panjang 27 Meter dan Lebat 19 Meter. Sedangkan gawang lapangan ini memiliki ukuran Lebar 3 Meter dan Tinggi 2 Meter. Lapangan ini juga memiliki 3 Lapisan dimana akan membuat terasa lebih lembut dan tahan dari getaran apapun. Harga Sewa Lapngan ini Sebesar Rp.120.000 Perjam.</p>
      </div>
    </div>
  </div>
  <!-- End Lapangan -->

  <!-- Fasilitas -->
  <div class="fasilitas">
    <div class="container fasilitas1">
      <h1><b>FASILITAS</b></h1>
      <!-- Fasilitas -->
      <div class="row justify-content-center">
        <div class="col-lg-12 info-fasilitas">
          <div class="row mt-4">
            <div class="col-lg">
              <img src="img/icon/toilet.jpg" alt=" employe" class="ic">
              <h4>Toilet</h4>
            </div>
            <div class="col-lg deskripsi">
              <img src="img/icon/mushola.png" alt=" employe" class="ic">
              <h4>Mushola</h4>
            </div>
            <div class="col-lg deskripsi">
              <img src="img/icon/kantin.png" alt=" employe" class="ic">
              <h4>Kantin</h4>
            </div>
            <div class="col-lg deskripsi">
              <img src="img/icon/parkir.png" alt=" employe" class="ic">
              <h4>Parkirant</h4>
            </div>
            <div class=" col-lg deskripsi">
              <img src="img/icon/ganti.png" alt=" employe" class="ic">
              <h4>Ruang Ganti</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Akhir Fasilitas -->



  <!-- Maps -->
  <div class="container maps1">
    <h1><b>MAPS</b></h1>
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <iframe src=" https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15862.986826584667!2d107.0340386!3d-6.2969793!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe208c322f9398146!2sPastel%20Futsal%20Arena!5e0!3m2!1sid!2sid!4v1617767463275!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" class="maps col-lg-12"></iframe>
      </div>
    </div>
  </div>
  <!-- End Maps -->



  <?php
  include "footer.php";
  ?>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
</body>

</html>