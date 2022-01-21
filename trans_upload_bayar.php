<?php
require("koneksi.php");
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (isset($_SESSION['login'])) {
  $username = $_SESSION['username'];
  $sql = "select * from tbl_user where username = '$username'";
  $query_sel = mysqli_query($conn, $sql);
  $sql_sel = mysqli_fetch_array($query_sel);
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pembayaran</title>
    <!-- Custom Theme Style -->

    <link href="assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/stylee.css">
      <link rel="stylesheet" type="text/css" href="css/FA5PRO-master/css/all.css">
      <style>
        body {
          background-color: #CCC;
          margin-top: -30px;
        }

        .vv {
          background-color: #FFF;
          margin-top: 20px;
          height: 980px;
          margin-bottom: 50px;



        }

        @media (min-width: 992px) {
          .vv {
            height: 710px;
            width: 600px;
            box-shadow: 0 3px 20px rgb(0, 0, 0, 0.5);
            border-radius: 14px;
            margin-bottom: 50px;

          }

          form {
            margin-left: 0;
          }
        }
      </style>
      </style>


  </head>

  <body>
    <?php
    include "navbar.php";
    ?>
    <!-- page content -->
    <div class="container vv">
      <br>
      <div class="panel panel-default">
        <div class="panel-heading">Pemesanan Lapangan</div>
        <div class="panel-body">
          <h4>Konfirmasi Pembayaran </h4>
          <hr>
          <form class="form-horizontal" action="trans_upload_save.php" method="post" enctype="multipart/form-data">
            <?php
            $kd = $_GET['kd'];
            $bayar = $_GET['bayar']; //mengambil kode booking dari form pemesanan
            ?>
            <div class="form-group">
              <label class="control-label col-md-12 col-sm-3 col-xs-12" for="first-name">Kode Booking <span class="required"></span>
              </label>
              <div class="col-md-12 col-sm-6 col-xs-12">
                <input type="text" id="first-name" name="id_book" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $kd; ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-12 col-sm-3 col-xs-12" for="first-name">Total Pembayaran <span class="required"></span>
              </label>
              <div class="col-md-12 col-sm-6 col-xs-12">
                <input type="text" id="first-name" name="total_bayar" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $bayar; ?>" readonly>
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
                <input type="text" id="first-name" name="rek_kirim" required="required" class="form-control col-md-7 col-xs-12" value="" placeholder="">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-12 col-sm-3 col-xs-12" for="first-name">Silahkan Melakukan Pembayaran Dengan Transfer Pada Rekening Berikut<span class="required"></span>
              </label>
              <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="radio">
                  <label><input type="hidden" name="rek_tuju" value="bca"><img src="assets/images/bca.png" style="width:80px; height:30px;"> 00778843616</label>
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
            <hr>
            <div class="form-group">
              <div class="col-md-12 col-sm-6 col-xs-12">
                <button type="submit" class="btn btn-primary">Konfirmasi</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>


    <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>


  </body>

  </html>
<?php
} else {
  echo "<script> alert(\"Silakan Login Sebagai Member\"); window.location = \"index.php\" </script>";
}
?>