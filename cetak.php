<?php
require("koneksi.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
} ?>


<html>
<?Php if (isset($_SESSION['login'])) {
    $username = $_SESSION['login'];
    $sql = "select * from tbl_user where username = '$username'";
    $query_sel = mysqli_query($conn, $sql);
    $sql_sel = mysqli_fetch_array($query_sel);
?>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <style>
            .vv {
                background-color: white;
                padding: 30px;

                margin-top: 40px;
            }

            .vv h1 {
                text-align: center;
            }

            .cc {
                background-color: #DCDCDC;
                padding: 20px;

            }

            @media (min-width: 768px) {
                .vv {
                    background-color: white;
                    padding: 30px;

                    margin-top: 40px;
                }

                .vv h1 {
                    text-align: center;

                }

                .vv h4 {
                    text-align: justify;
                    margin-left: 340px;
                }

                .cc {
                    background-color: #DCDCDC;
                    padding: 20px;
                    border: 5px solid black;


                }

                .form_group {
                    margin-left: 200px;
                }

                table,
                th,
                td {
                    border: 1px solid black;
                    border-collapse: collapse;
                    text-align: center;
                }

                th,
                td {
                    padding: 5px;
                    text-align: left;
                }

            }
        </style>

        <title>Document</title>
    </head>

    <body>


        <div class="container vv">
            <div class="header">
                <H1>Selamat Pesanan Anda Telah Dikonfirmasi</H1>
            </div>
            <hr>
            <div class="continer cc">
                <table id="example" class="table table-striped table-bordered display responsive nowrap" style="width:100%;" border="2">


                    <?php
                    //select transaksi
                    $id = $_GET['id'];
                    $f = mysqli_query($conn, "select * from transaksi where id_book='$id'");
                    $s = mysqli_fetch_array($f);
                    $e = (int)$s['jam_berakhir'] - (int)$s['jam_mulai'];

                    //select lapangan
                    $q = mysqli_fetch_array(mysqli_query($conn, "select * from tbl_lapangan where id_lapangan='$s[id_lapangan]'"));
                    //select operator
                    ?>

                    <tr class="colom">
                        <th scope="col">Kode Booking</th>
                        <td>: <?php echo $id; ?></td>
                    </tr>
                    <tr class="colom">
                        <th scope="col">No Lapangan</th>
                        <td>: <?php echo $q['id_lapangan']; ?></td>
                    </tr>
                    <tr class="colom">
                        <th scope="col">Tanggal Main</th>
                        <td>: <?php echo $s['tgl_main']; ?></td>
                    </tr>
                    <tr class="colom">
                        <th scope="col">Durasi</th>
                        <td>: <?php echo $e ?></td>
                    </tr>
                    <tr class="colom">
                        <th scope="col">Dari Jam </th>
                        <td>: <?php echo $s['jam_mulai']; ?> - <?php echo $s['jam_berakhir']; ?></td>
                    </tr>
                    <tr class="colom">
                        <th scope="col">Jenis Pembayaran</th>
                        <td>: <?php echo $s['jenis_bayar']; ?></td>
                    </tr>
                    <tr class="colom">
                        <th scope="col">Atas Nama</th>
                        <td>: <?php echo $s['atas_nama']; ?></td>
                    </tr>
                    <tr class="colom">
                        <th scope="col">Total Harga</th>
                        <td>: <?php echo $s['total_harga']; ?></td>
                    </tr>
                </table>
            </div>

            <hr>
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><span class="required"></span>
                </label>
                <div class="col-lg-12 col-sm-7 col-xs-2">
                    <h4 align="center">Selamat bermain dengan menunjukkan ini kepada Operator Pastel Futsal Arena</h4>
                </div>
            </div>
        </div>

    </body>
<?php } ?>

</html>


<?php
$html = ob_get_contents();
ob_end_clean();

require_once "./mpdf_v8.0.3-master/vendor/autoload.php";
$mpdf = new \Mpdf\Mpdf();
$mpdf->AddPage("L", "", "", "", "", "15", "15", "15", "15", "", "", "", "", "", "", "", "", "", "", "", "A4");
$mpdf->WriteHTML($html);
$mpdf->Output();
?>