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

        <title>Pastel Futsal || Pemesanan</title>
        <!-- Custom Theme Style -->

        <link href="assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>



        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/stylee.css">
        <link rel="stylesheet" type="text/css" href="css/FA5PRO-master/css/all.css">

        <style>
            body {
                background-color: #CCC;
            }

            .vv {
                background-color: #FFF;
                margin-top: 20px;
                height: 980px;
                margin-bottom: 50px;



            }

            @media (min-width: 992px) {
                .vv {
                    height: 950px;
                    width: 800px;
                    box-shadow: 0 3px 20px rgb(0, 0, 0, 0.5);
                    border-radius: 14px;
                    margin-bottom: 50px;

                }

                form {
                    margin-left: 0;
                }
            }
        </style>


    </head>

    <body>
        <?php
        include "navbar.php";
        ?>
        <!-- page content -->
        <div class="container vv">
            <br>

            <div class="">Pemesanan Lapangan</div>
            <h4>Pesan Lapangan Anda Dan Segera Lakukan Pembayaran </h4>
            <hr>

            <?php
            // membuat kode urut otomatis sebagai ID booking
            $sql = "SELECT max(id_book) as terakhir from transaksi";
            $hasil = mysqli_query($conn, $sql);
            $data = mysqli_fetch_array($hasil);
            $lastID = $data['terakhir'];
            $lastNoUrut = substr($lastID, 3, 9);
            $nextNoUrut = $lastNoUrut + 1;
            $nextID = "KB" . sprintf("%08s", $nextNoUrut);
            ?>

            <?php
            $id_lapangan = $_REQUEST['id_lapangan'];
            $sel = mysqli_query($conn, "SELECT * FROM tbl_lapangan WHERE id_lapangan='$id_lapangan'");
            $pilih = mysqli_fetch_array($sel);
            //memanggil data dari database yang memiliki id_lap sesuai yang dipilih oleh member
            ?>


            <form class="form-horizontal" method="post">

                <div class="form-group">
                    <label class="control-label col-md-12 col-sm-3 col-xs-12" for="first-name">Kode Booking <span class="required"></span>
                    </label>
                    <div class="col-md-12 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="id_book" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $nextID; ?>" readonly>
                        <input type="hidden" id="id_user" required="required" name="id_user" class="form-control col-md-7 col-xs-12" value="<?php echo $sql_sel['id_user']; ?>" readonly>
                        <input type="hidden" id="first-name" required="required" name="username" class="form-control col-md-7 col-xs-12" value="<?php echo $sql_sel['username']; ?>" readonly>
                        <input type="hidden" id="id_lapangan" name="id_lapangan" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $pilih['id_lapangan']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12 col-sm-3 col-xs-12" for="last-name">Lapangan<span class="required"></span>
                    </label>
                    <div class="col-md-12 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $pilih['judul']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12 col-sm-3 col-xs-12" for="last-name">Harga Per Jam<span class="required"></span>
                    </label>
                    <div class="col-md-12 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" value="Rp. <?php echo $pilih['harga_lapangan']; ?>,00" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12 col-sm-3 col-xs-12" for="last-name">Atas Nama<span class="required"></span>
                    </label>
                    <div class="col-md-12 col-sm-6 col-xs-12">
                        <input type="text" id="atas_nama" name="atas_nama" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12 col-sm-6 col-xs-12">
                        <input type="hidden" name="jenis_bayar" required value="transfer" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-12 col-sm-3 col-xs-12" for="last-name">Tanggal Main<span class="required"></span>
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class='input-group date' id='datepicker'>
                            <input type="date" class="form-control" placeholder="" name="tanggal_main">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12 col-sm-1 col-xs-2">
                        <label class="control-label" for="last-name">Mulai<span class="required"></span>
                        </label>
                    </div>
                    <div class="col-md-4 col-sm-2 col-xs-4">
                        <select class="custom-select mr-sm-2" name="jam_mulai" id="sel1">
                            <option>08:00</option>
                            <option>09:00</option>
                            <option>10:00</option>
                            <option>11:00</option>
                            <option>12:00</option>
                            <option>13:00</option>
                            <option>14:00</option>
                            <option>15:00</option>
                            <option>16:00</option>
                            <option>17:00</option>
                            <option>18:00</option>
                            <option>19:00</option>
                            <option>20:00</option>
                            <option>21:00</option>
                            <option>22:00</option>
                            <option>23:00</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-12 col-sm-3 col-xs-12" for="last-name">Durasi<span class="required"></span>
                    </label>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <select class="form-control" name="durasi" id="durasi" required>
                            <option value="0">Pilih Jam</option>
                            <option value="1">1 Jam</option>
                            <option value="2">2 Jam</option>
                            <option value="3">3 Jam</option>
                            <option value="4">4 Jam</option>
                            <option value="5">5 Jam</option>
                            <option value="6">6 Jam</option>
                            <option value="7">7 Jam</option>
                            <option value="8">8 Jam</option>
                            <option value="9">9 Jam</option>
                            <option value="10">10 Jam</option>
                            <option value="11">12 Jam</option>
                            <option value="12">13 Jam</option>
                            <option value="13">14 Jam</option>
                            <option value="14">15 Jam</option>
                            <option value="15">16 Jam</option>
                            <option value="15">17 Jam</option>
                            <option value="16">18 Jam</option>
                            <option value="17">19 Jam</option>
                            <option value="18">20 Jam</option>
                            <option value="19">21 Jam</option>
                            <option value="20">22 Jam</option>
                            <option value="21">23 Jam</option>
                            <option value="2">24 Jam</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12 3col-sm-3 col-xs-12" for="last-name">Total Harga<span class="required"></span>
                    </label>
                    <div class="col-md-12 col-sm-6 col-xs-12">
                        <input type="text" id="total" name="total_harga" required="required" class="form-control col-md-7 col-xs-12" value="0" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12 col-sm-3 col-xs-12">
                        <button type="submit" class="btn btn-success" name="lanjut">Lanjutkan <i class="fa fa-arrow-right"></i></button>
                    </div>
                </div>
            </form>





            <?php
            //require "koneksi.php";
            if (isset($_POST['lanjut'])) {
                $id_book = $_POST['id_book'];
                $id_user = $_POST['id_user'];
                $username = $_POST['username'];
                $id_lapangan = $_POST['id_lapangan'];                        //variabel yang berisi inputan yang diisi oleh member pada form transaksi
                $tanggal_main = $_POST['tanggal_main'];
                $jam_mulai = $_POST['jam_mulai'];
                $atas_nama = $_POST['atas_nama'];
                $durasi = $_POST['durasi'];
                //penambahan pada jam mulai dan durasi
                $jamdur = ((float)$durasi + (float)$jam_mulai);
                $jam_berakhir = $jamdur . ":00:00";
                //echo $jam_berakhir;
                //$now=date('Y-m-d h:i:s', strtotime('4 hours', strtotime($tgl)));
                $tanggal = date('Y-m-d', time() + 60 * 60 * 6); //variabel dengan nilai date/tanggal sekarang
                $jam = date('H:i:s', time() + 60 * 60 * 6); ////variabel dengan nilai time/jam sekarang
                $tanggaljam = date('Y-m-d H:i:s', time() + 60 * 60 * 6); //variabel dengan nilai datetime sekarang
                $tgljam = $tanggal_main . " " . $jam_mulai;

                if (strtotime($tgljam) - strtotime($tanggaljam) > 43200) { //jika main lebih dari 12 jam
                    $bayarakhir = $tanggal_main; // maka bayar akhir 6 jam dari waktu pesan
                } else { // jika tidak
                    $bayarakhir = $tanggal_main; // maka bayar akhir 3 jam dari waktu pesan
                }

                $jenis_bayar = $_POST['jenis_bayar'];
                $total = $_POST['total_harga'];
                if ($jenis_bayar == 'transfer') { // jika jenis bayar transfer
                    $status = "Menunggu Transfer"; // maka status Menunggu Transfer
                }
                //cek jam mulai diantara jam mulai dan jam berakhir yang telah ada di database
                $cek1 = mysqli_fetch_array(mysqli_query($conn, "select * from transaksi where (id_lapangan = '$id_lapangan' && tgl_main='$tanggal_main') && (jam_mulai<='$jam_mulai' && jam_berakhir>'$jam_mulai') && (status!='Dibatalkan' && status!='Selesai') order by tgl_book"));
                //cek jam mulai sebelum jam mulai di database, dan jam berakhir melebihi jam berakhir di database
                $cek2 = mysqli_fetch_array(mysqli_query($conn, "select * from transaksi where (id_lapangan = '$id_lapangan' && tgl_main='$tanggal_main') && (jam_mulai>'$jam_mulai' && jam_mulai<'$jam_berakhir') && (status!='Dibatalkan' && status!='Selesai')  order by tgl_book"));

                if ($cek1 > 0) { //cek jam mulai diantara jam mulai dan jam berakhir yang telah ada di database
                    echo "<script> alert(\"Jam mulai yang anda pilih telah dipesan orang lain.\");</script>";
                } elseif ($cek2 > 0) { //cek jam mulai sebelum jam mulai di database, dan jam berakhir melebihi jam berakhir di database
                    echo "<script> alert(\"Durasi yang anda pilih terlalu lama. Kurangi durasi atau pilih jam mulai yang lain.\");</script>";
                } elseif ($tanggal_main < $tanggal && $jam_mulai < $jam) { // cek tanggal main = tanggal sekarang dan jam mulai kurang dari jam sekarang
                    echo "<script> alert(\"Jam mulai kadaluarsa\");</script>";
                } elseif ($tanggal_main < $tanggal) { // cek tanggal main kurang dari tanggal sekarang
                    echo "<script> alert(\"Tanggal main kadaluarsa\");</script>";
                } else { //jika tidak maka transaksi dapat dilanjutkan
                    $simpan = mysqli_query($conn, "insert into transaksi values ('$id_book','$id_user','$username','$atas_nama','$id_lapangan',NOW(),'$bayarakhir','$tanggal_main','$jam_mulai','$jamdur:00:00','$jenis_bayar','$total','$status')");


                    if ($simpan & $jenis_bayar == 'transfer') { //jika simpan data berhasil dan jenis bayar = transfer 
                        echo "<script> alert(\"Silakan Lakukan Pembayaran\"); window.location = \"trans_upload_bayar.php?kd=$id_book&bayar=$total\"; </script>";
                    } else { //dan jika tidak
                        echo "<script> alert(\"Maaf, Terjadi Kesalahan...\"); window.location = \"index.php\"; </script>";
                    }
                }
            }

            ?>




        </div>




        <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>

        <!-- jQuery -->
        <script src="admin/assets/vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="admin/assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="admin/assets/vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="admin/assets/vendors/nprogress/nprogress.js"></script>
        <!-- jQuery Smart Wizard -->
        <script src="admin/assets/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
        <!-- Custom Theme Scripts -->
        <script src="admin/assets/build/js/custom.min.js"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="assets/min/moment.min.js"></script>
        <script src="admin/assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

        <script src="assets/js/moment.js"></script>
        <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript">
            $(function() {
                $('#datetimepicker').datetimepicker({
                    format: 'DD MMMM YYYY HH:mm',
                });

                $('#datepicker').datetimepicker({
                    format: 'YYYY-MM-DD',
                });

                $('#timepicker').datetimepicker({
                    format: 'HH:mm'
                });
            });
        </script>

        <!-- jQuery Smart Wizard -->
        <script>
            $(document).ready(function() {
                $('#wizard').smartWizard();

                $('#wizard_verticle').smartWizard({
                    transitionEffect: 'slide'
                });

            });
        </script>
        <!-- /jQuery Smart Wizard -->
        <!-- Total Harga -->
        <script>
            $(function() {
                $("#durasi").change(function() {
                    var durasi = $("#durasi option:selected").val();
                    var id_lapangan = $("#id_lapangan").val();


                    $.ajax({
                        url: 'trans_get_harga.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            'id_lapangan': id_lapangan
                        },
                        success: function(siswa) {
                            $("#total").val(siswa['harga_lapangan'] * durasi);
                        }
                    });
                });
            });
        </script>

        <?php
        include "footer.php";
        ?>


    </body>

    </html>
<?php
} else {
    echo "<script> alert(\"Silakan Login Terlebih Dahulu\"); window.location = \"index.php\" </script>";
}
?>