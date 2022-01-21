<?php
session_start();
//panggil koneksi database
include "koneksi.php";
include "function/tgl-indo.php";
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
    <link rel="stylesheet" type="text/css" href="DataTables/DataTables-1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="DataTables/Responsive-2.2.7/css/responsive.bootstrap4.min.css">
    <style>
        @media (min-width: 992px) {
            .container {
                background-color: white;
                padding: 30px;
                box-shadow: 0 3px 20px rgb(0, 0, 0, 0.5);
                border-radius: 14px;
                margin-top: 40px;
            }

            h1 {
                text-align: center;
            }
        }
    </style>
    <title>Pastel Futsal</title>
</head>

<body>

    <?php
    include "navbar.php";
    ?>

    <div class="container">
        <h1><b>Riwayat Transaksi</b></h1>
        <br><br>
        <table id="example" class="table table-striped table-bordered display responsive" style="width:100%">

            <thead>
                <tr>
                    <th scope="col">Lapangan</th>
                    <th scope="col">Tanggal Main</th>
                    <th scope="col">Jam Mulai</th>
                    <th scope="col">Jam Berakhir</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($_SESSION["login"])) {
                    $username = $_SESSION['username'];
                    $sql = mysqli_query($conn, "SELECT * FROM transaksi WHERE username='$username' AND status='selesai'");
                    while ($data = mysqli_fetch_array($sql)) { ?>
                        <?php if ($_SESSION["level"] == "user") { ?>
                            <tr>
                                <td><?php echo $data['id_lapangan']; ?></td>
                                <td><?php echo tgl_indonesia($data['tgl_main']) ?></td>
                                <td><?php echo $data['jam_mulai']; ?></td>
                                <td><?php echo $data['jam_berakhir']; ?></td>
                                <td> <?php echo $data['status']; ?></td>
                            </tr>
                <?php }
                    }
                } ?>
            </tbody>
        </table>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="DataTables/DataTables-1.10.24/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="DataTables/DataTables-1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" charset="utf8" src="DataTables/Responsive-2.2.7/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" charset="utf8" src="DataTables/Responsive-2.2.7/js/responsive.bootstrap4.min.js"></script>
    <script type="text/javascript" charset="utf8" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>