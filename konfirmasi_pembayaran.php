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
            .vv {
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

    <div class="container vv">
        <h1><b>Konfirmasi Pembayaran</b></h1>
        <br><br>
        <table id="example" class="table table-striped table-bordered display responsive" style="width:100%">

            <thead>
                <tr>
                    <th scope="col">Id Booking</th>
                    <th scope="col">Lapangan</th>
                    <th scope="col">Tanggal Main</th>
                    <th scope="col">Jam Mulai</th>
                    <th scope="col">Jam Berakhir</th>
                    <th scope="col">Total Pembayaran</th>
                    <th scope="col">Status</th>
                    <th scope="col">cetak</th>
                </tr>
            </thead>
            <?php if (isset($_SESSION["login"])) {
                $username = $_SESSION['username'];
                $tgl = date('Y-m-d', time() + 60 * 60 * 6);
                $nows = strtotime(date('Y-m-d', time() + 60 * 60 * 6));
                $start = date('Y-m-d', strtotime('+7 day', $nows));
                $sql = mysqli_query($conn, "SELECT * FROM transaksi WHERE tgl_main between '$tgl' AND '$start' AND  username='$username' ORDER BY tgl_main DESC");
                // $sql = mysqli_query($conn, "SELECT * FROM transaksi WHERE username='$username'");
                while ($data = mysqli_fetch_array($sql)) { ?>
                    <?php if ($_SESSION["level"] == "user") { ?>
                        <tbody>

                            <tr>
                                <td><?php echo $data['id_book']; ?></td>
                                <td><?php echo $data['id_lapangan']; ?></td>
                                <td><?php echo tgl_indonesia($data['tgl_main']) ?></td>
                                <td><?php echo $data['jam_mulai']; ?></td>
                                <td><?php echo $data['jam_berakhir']; ?></td>
                                <td><?php echo $data['total_harga']; ?></td>
                                <td>
                                    <?php
                                    $a = mysqli_query($conn, "select * from bayar_transfer where id_book='$data[id_book]'");
                                    $c = mysqli_num_rows($a);
                                    if ($data['status'] == 'Menunggu Transfer' || $data['status'] == 'Menunggu Konfirmasi admin') {
                                        if ($c == 0) { ?>
                                            <!--<a id="tomboledittt" data-toggle="modal" data-target="#modaledit" data-id="<?php echo $data['id_book']; ?>" data-bayar="<?php echo $data['total_harga']; ?>">
                                                <button class="btn btn-primary" name="simpan">Edit</button>
                                            </a>-->
                                            <a class="btn btn-primary" href='trans_upload_bayar.php?kd=<?php echo $data['id_book']; ?>&bayar=<?php echo $data['total_harga']; ?>'>Upload Bukti</a>
                                        <?php } else {
                                            $b = mysqli_fetch_array($a);
                                        ?>
                                            <?php echo $data['status']; ?><br>

                                            <?php    }
                                    } else {
                                        if ($data['status'] == 'Dibatalkan') {
                                            if ($c == 0) { ?>

                                                <?php echo $data['status']; ?><br>
                                            <?php }
                                            # code...
                                        } else { ?>
                                            <a class="btn btn-primary" href="trans_success.php?id=<?php echo $data['id_book']; ?>">Bukti Konfirmasi</a>
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="cetak.php?id=<?php echo $data['id_book']; ?>"><i class="fas fa-print"></i> Cetak</a>
                                </td>
                        <?php
                                        }
                                    }
                        ?>
                            </tr>

                        </tbody>
            <?php }
                }
            } ?>
        </table>
    </div>


    <div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="edit-form">
                        <form class="form-horizontal" action="proses_upload_bayar.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-3 col-xs-12" for="first-name">Kode Booking <span class="required"></span>
                                </label>
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                    <input type="text" id="id_book" name="id_book" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $kd; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-3 col-xs-12" for="first-name">Total Pembayaran <span class="required"></span>
                                </label>
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                    <input type="text" id="total_bayar" name="total_bayar" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $bayar; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-3 col-xs-12" for="last-name">Nama Pengirim<span class="required"></span>
                                </label>
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                    <input type="text" id="atas_nama" name="atas_nama" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-3 col-xs-12" for="first-name">Rekening Pengirim <span class="required"></span>
                                </label>
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="rek_kirim" required="required" class="form-control col-md-7 col-xs-12" value="" placeholder="xxxx-xxx-xxxx-xx">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-3 col-xs-12" for="first-name">Silahkan Melakukan Pembayaran Dengan Transfer Pada Rekening Berikut<span class="required"></span>
                                </label>
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                    <div class="radio">
                                        <label><input type="hidden" name="rek_tuju" value="bca"><img src="assets/images/bca.png" style="width:80px; height:30px;"> xxxx-xxx-xxxx-xx (an. xxxxx)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-3 col-xs-12" for="first-name">Upload Bukti<span class="required"></span>
                                </label>
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                    <label class="btn btn-info btn-xs" for="my-file-selector2">
                                        <input id="my-file-selector2" name="foto_bukti" type="file" style="display:none;" onchange="$('#upload-file-foto').html($(this).val());">
                                        Upload <span class='label label-danger col-sm-8' id="upload-file-foto"></span>
                                    </label>
                                </div>
                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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

        $(document).on("click", "#tomboledittt", function() {
            let id = $(this).data('id');
            let bayar = $(this).data('bayar');


            $("#id_book").val(id);
            $(".modal-body #total_bayar").val(bayar);
        })
    </script>
    <?php
    include "footer.php";
    ?>
</body>

</html>