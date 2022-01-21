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
    <link rel="stylesheet" type="text/css" href="css/style_pesanann.css">
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

            .keten {

                margin-left: 50px;
            }


            .keten p {
                text-align: left;
                margin-left: 65px;

            }

            .pesan {
                margin-right: 150px;
            }

            .baris {
                margin-left: 50px;
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
        <h1><b>LAPANGAN</b></h1>

    </div>
    <?php if (isset($_SESSION["login"])) {
        $username = $_SESSION['username'];
        $sql = "select * from tbl_user where username = '$username'";
        $query_sel = mysqli_query($conn, $sql);
        $sql_sel = mysqli_fetch_array($query_sel); ?>
        <?php if ($_SESSION["level"] == "user") { ?>
            <div class="baris">
                <div class="row pesan">
                    <?php
                    $sql = mysqli_query($conn, "SELECT * FROM tbl_lapangan ORDER BY id_lapangan");
                    while ($data = mysqli_fetch_array($sql)) {
                    ?>




                        <div class="col-lg-5 mm">
                            <div class="card mb-3 col-lg-6">
                                <div class="row no-gutters">
                                    <div class="col-lg-6">
                                        <img src="admin/img/lapangan/<?php
                                                                        $q = mysqli_query($conn, "select * from tbl_lapangan where id_lapangan='$data[id_lapangan]'");
                                                                        $l = mysqli_fetch_array($q);
                                                                        echo $l['gambar']; ?>" alt="lapangan">
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="card-body">
                                            <form action="transaksi.php" method="post">
                                                <input type="hidden" name="id_lapangan" value="<?php echo $data['id_lapangan']; ?>">
                                                <h5 class="card-title"><b><?php echo $data['judul']; ?></b></h5>
                                                <p class="card-text"><?php echo $data['detail']; ?></p>
                                                <p class="card-text">Rp.<?php echo $data['harga_lapangan']; ?> /Jam</p>

                                                <button type="submit" class="btn btn-primary">Pesan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    <?php
                    } ?>
                </div>
            </div>
        <?php
        }
    } else {
        ?>
        <div class="baris">
            <div class="row pesan">
                <?php
                $sql = mysqli_query($conn, "SELECT * FROM tbl_lapangan ORDER BY id_lapangan");
                while ($data = mysqli_fetch_array($sql)) {
                ?>




                    <div class="col-lg-5 mm">
                        <div class="card mb-3 col-lg-6">
                            <div class="row no-gutters">
                                <div class="col-lg-6">
                                    <img src="admin/img/lapangan/<?php
                                                                    $q = mysqli_query($conn, "select * from tbl_lapangan where id_lapangan='$data[id_lapangan]'");
                                                                    $l = mysqli_fetch_array($q);
                                                                    echo $l['gambar']; ?>" alt="lapangan">
                                </div>
                                <div class="col-lg-6">
                                    <div class="card-body">
                                        <form action="transaksi.php" method="post">
                                            <input type="hidden" name="id_lapangan" value="<?php echo $data['id_lapangan']; ?>">
                                            <h5 class="card-title"><b><?php echo $data['judul']; ?></b></h5>
                                            <p class="card-text">Rp.<?php echo $data['harga_lapangan']; ?> /Jam</p>

                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Pesan</button>


                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Peringatan!!</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Silahkan Login Terlebih Dahulu Untuk Memesan
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>
    <?php } ?>


    <!-- syarat dan ketentuan -->
    <div class="container lapangan">
        <h1><b>Syarat & ketentuan</b></h1>
        <div class="row keten">
            <div class="col-lg-5">
                <h5><b>Syarat</b></h5>
                <p>1. Diharuskan Memiliki Akun</p>
            </div>
            <div class="col-lg-7">
                <h5><b>ketentuan</b></h5>
                <p>1. Tidak boleh melakukan penyewaan pada tanggal dan jam yang sama.<br>
                    2. Jika ada yang ingin merubah jadwal silahkan menghubungi kami ke melalui kontak yang tersedia.<br>
                    3. Tidak boleh melakukan penyewaan sebelum mendaftar akun.<br>
                </p>
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