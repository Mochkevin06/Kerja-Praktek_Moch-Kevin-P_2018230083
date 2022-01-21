<?php
require("koneksi.php");
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (isset($_SESSION['login'])) {
  $username = $_SESSION['login'];
  $sql = "select * from tbl_user where username = '$username'";
  $query_sel = mysqli_query($conn, $sql);
  $sql_sel = mysqli_fetch_array($query_sel);
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/FA5PRO-master/css/all.css">
    <style>
      .vv {
        background-color: white;
        padding: 30px;
        box-shadow: 0 3px 20px rgb(0, 0, 0, 0.5);
        border-radius: 14px;
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
          box-shadow: 0 3px 20px rgb(0, 0, 0, 0.5);
          border-radius: 14px;
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

        }
      }
    </style>
    <title>Document</title>
  </head>

  <body>
    <?php
    include "navbar.php";
    ?>

    <div class="container vv">
      <div class="header">
        <H1>Selamat Pesanan Anda Telah Dikonfirmasi</H1>
      </div>
      <div class="continer cc">
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
        <div class="form-group">
          <div class="col-md-12 col-sm-7 col-xs-12">
            <h4>Kode Booking : <?php echo $id; ?></h4>
          </div>
        </div>



        <div class="form-group">

          <div class="col-lg-12 col-sm-7 col-xs-2">
            <h4>No Lapangan &nbsp;: <?php echo $q['id_lapangan']; ?> </h4>
            </h4>
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-12 col-sm-7 col-xs-2">
            <h4>Tanggal Main &nbsp;: <?php echo $s['tgl_main']; ?> </h4>
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-12 col-sm-7 col-xs-2">
            <h4>Durasi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $e ?> Jam</h4>
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-12 col-sm-7 col-xs-2">
            <h4>Dari Jam &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $s['jam_mulai']; ?> - <?php echo $s['jam_berakhir']; ?> </h4>
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-12 col-sm-7 col-xs-2">
            <h4>Jenis Pembayaran : <?php echo $s['jenis_bayar']; ?> </h4>
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-12 col-sm-7 col-xs-2">
            <h4>Total Harga &nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $s['total_harga']; ?> </h4>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><span class="required"></span>
          </label>
          <div class="col-lg-12 col-sm-7 col-xs-2">
            <h3 align="center">Selamat bermain dengan menunjukkan halaman ini atau dengan menunjukkan bukti email yang telah dikirim ke email Anda kepada Operator tempat futsal</h3>
          </div>
        </div>

      </div>
    </div>
    <?php
    include "footer.php";
    ?>

    <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
  </body>

  </html>
<?php } ?>