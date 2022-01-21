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
                margin-top: 45px;
                margin-left: 60px;
            }

            .keten {
                text-align: left;
                margin-left: 23px;
            }

            .keten .ap {
                text-align: left;
                margin-left: 23px;
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
        <h1><b>Jadwal Lapangan</b></h1>

    </div>
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
                                    <form action="jadwal_lp.php" method="post">
                                        <input type="hidden" name="id_lapangan" value="<?php echo $data['id_lapangan']; ?>">
                                        <h5 class="card-title"><b><?php echo $data['judul']; ?></b></h5>

                                        <button type="submit" class="btn btn-primary">Lihat Jadwal</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>
    </div>






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