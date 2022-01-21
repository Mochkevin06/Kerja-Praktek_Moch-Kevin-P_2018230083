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
    <link rel="stylesheet" type="text/css" href="css/style_pesanan.css">
    <link rel="stylesheet" type="text/css" href="css/FA5PRO-master/css/all.css">
    <style>
        .card img {
            margin-top: 39px;
            width: 280px;
            margin-left: 24px;

        }

        @media (min-width: 992px) {
            .card {
                margin-top: 50px;
                margin-left: 240px;
                width: 600px;
            }

            .card img {
                margin-left: -2px;
            }

            .card-body {
                margin-top: 23px;
                margin-left: 60px;
            }

            .keten {}


            .keten p {
                text-align: left;


            }

            .pesan {
                margin-right: 150px;
            }

            .baris {
                margin-left: 50px;
            }

            .gambar {
                width: 500px;
            }



        }
    </style>
    <title>Pastel Futsal</title>
</head>

<body>
    <!--navbar-->
    <?php
    include "navbar.php";
    ?>
    <!--end navbar-->

    <div class="container lapangan">
        <h1><b>CARA PEMESANAN</b></h1>
        <div class="container">
            <div class="row keten">
                <div class="col-lg-5">
                    <img src="img/icon/1-01.png" class="gambar">
                    <div class="col-lg-5">
                        <p> Melakukan Login</p>
                    </div>
                        <p>2. Lihat Jadwal Lapangan Yang Tersedia</p>
                        <p>3. Lakukan Pemesanan</p>
                        <p>4. Isi Form Pemesanan</p>
                        <p>5. Lakukan Pembayaran</p>
                        <p>6. Tunggu Konfirmasi</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- syarat dan ketentuan -->
        <div class="container">
            <h1><b>CARA PEMESANAN</b></h1>
            <div class="row keten">
                <div class="col-lg-5">
                    <p>1. Melakukan Login</p>
                    <p>2. Lihat Jadwal Lapangan Yang Tersedia</p>
                    <p>3. Lakukan Pemesanan</p>
                    <p>4. Isi Form Pemesanan</p>
                    <p>5. Lakukan Pembayaran</p>
                    <p>6. Tunggu Konfirmasi</p>
                </div>
            </div>
        </div>
        <!-- end syarat dan ketentuan -->



        <!--footer-->
        <?php
        include "footer.php";
        ?>
        <!--end footer-->



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