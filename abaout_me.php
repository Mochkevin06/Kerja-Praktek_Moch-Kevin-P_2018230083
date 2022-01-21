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
    include "navbar.php";
    ?>



    <!-- Fasilitas -->
    <div class="about">
        <div class="container fasilitas1">
            <h1 id="list-item-1">Tentang Kami</h1>
            <!-- Fasilitas -->
            <div class="row justify-content-center">
                <div class="col-lg-12 info-obat">
                    <div class="row mt-4">
                        <div class="col-lg">
                            <h4>Pastel Futsal Arena</h4>
                            <p>Pastel Futsal Arena merupakan bisnis atau usaha di bidang jasa penyewaan lapangan futsal yang
                                bertempat di RT.001/RW.009, Mustika Jaya, Kec. Mustika Jaya, Kota Bks, Jawa Barat 17158. Kami Menyediakan
                                dua lapangan yang siap untuk dipakai dengan kualitas lapangan yang sesuai standart dan juga nyaman.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card mb-3 col-lg-12">
                    <div class="row no-gutters">
                        <div class="col-md-4 kel">
                            <img src="img/2.JPG" alt=" ...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Mudah</h5>
                                <p class="card-text">website penyewaan lapangan Pastel Futsal Arena ini mudah untuk melakukan pemesanan karna
                                    disini kami tealh menyediakan fitur-fitur yang akan membantu anda untuk melakukan pemesanan.
                                </p>
                            </div>
                            <div class="row no-gutters">
                                <div class="card-body">
                                    <h5 class="card-title">Cepat</h5>
                                    <p class="card-text">proses pemesanan lapangan futsal ini juga cepat mendapatkan respon dari kami
                                        sehingga anda tidak perlu menunggu lama untuk melakukan pemesanan lapangan futsal.
                                    </p>
                                </div>
                            </div>
                            <div class="row no-gutters">
                                <div class="card-body">
                                    <h5 class="card-title">Efesien</h5>
                                    <p class="card-text">Melakukan Pemesanan di website kami sangat efesien karena untuk melakukan pemesanan lapangan
                                        kami melakukan pemesanan secara online yang akan memudahkan pelanggan untuk memesan kapanpun dan dimana pun.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Akhir Fasilitas -->



    <!-- Footer -->
    <?php
    include "footer.php";
    ?>

    <!-- End Footer -->


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