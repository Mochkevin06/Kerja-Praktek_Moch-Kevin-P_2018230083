<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/FA5PRO-master/css/all.css">

    <title>Pastel Futsal</title>
</head>

<body>
    mysqli_query($conn, "delete from transaksi where batas_bayar <= '$tanggal' && jenis_bayar='transfer' && (status='Dibatalkan' )"); mysqli_query($conn, "delete from transaksi where batas_bayar <= '$tanggal' && jenis_bayar = 'cod' && (status='Dibatalkan')" ); <!-- Navbar -->
        <nav class=" navbar navbar-expand-lg navbar-light bg-light sticky-top">
            <a class="navbar-brand" href="#">PASTEL FUTSAL ARENA</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse m" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-link" href="#">Pemesanan</a>
                    <a class="nav-link" href="#">Jadwal</a>
                    <a class="nav-link" href="#">Abaout Me</a>
                    <a class="nav-link" href="#">Login</a>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

        <!-- jumbotron -->
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-4"><b>Pastel Futsal Arena</b></h1>
                <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
                <a class="btn btn-primary" href="#" role="button">Pesan sekarang</a>
            </div>
        </div>
        <!-- End Jumbotron -->


        <!-- Lapangan -->
        <div class="container lapangan">
            <h1>LAPANGAN</h1>
            <div class="row workingspace">
                <div class="col-lg-5">
                    <img src="img/lap1.jpg" alt="workingspace" class="img-fluid">
                </div>
                <div class="col-lg-6">
                    <h3>Lapangan 1</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam commodi, voluptas et molestiae maiores assumenda asperiores quo quae expedita odit, enim unde rerum fuga possimus porro dolore, quia reprehenderit deserunt.</p>
                </div>
            </div>

            <div class="row workingspace">
                <div class="col-lg-5">
                    <img src="img/lap2.jpg" alt="workingspace" class="img-fluid as">
                </div>
                <div class="col-lg-6">
                    <h3>Lapangan 2</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam commodi, voluptas et molestiae maiores assumenda asperiores quo quae expedita odit, enim unde rerum fuga possimus porro dolore, quia reprehenderit deserunt.</p>
                </div>
            </div>
        </div>
        <!-- End Lapangan -->

        <!-- Fasilitas -->
        <div class="fasilitas">
            <div class="container fasilitas1">
                <h1>FASILITAS</h1>
                <!-- Fasilitas -->
                <div class="row justify-content-center">
                    <div class="col-lg-12 info-fasilitas">
                        <div class="row mt-4">
                            <div class="col-lg">
                                <img src="img/icon/toilet.jpg" alt=" employe" class="ic">
                                <h4>Toilet</h4>
                            </div>
                            <div class="col-lg">
                                <img src="img/icon/mushola.png" alt=" employe" class="ic">
                                <h4>Mushola</h4>
                            </div>
                            <div class="col-lg">
                                <img src="img/icon/kantin.png" alt=" employe" class="ic">
                                <h4>Kantin</h4>
                            </div>
                            <div class="col-lg">
                                <img src="img/icon/parkir.png" alt=" employe" class="ic">
                                <h4>Parkirant</h4>
                            </div>
                            <div class=" col-lg">
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
            <h1>MAPS</h1>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <iframe src=" https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15862.986826584667!2d107.0340386!3d-6.2969793!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe208c322f9398146!2sPastel%20Futsal%20Arena!5e0!3m2!1sid!2sid!4v1617767463275!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" class="maps col-lg-12"></iframe>
                </div>
            </div>
        </div>
        <!-- End Maps -->
        <div class="fasilitas">
        </div>

        <!-- footer -->

        <!-- End Footer -->


        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
</body>

</html>