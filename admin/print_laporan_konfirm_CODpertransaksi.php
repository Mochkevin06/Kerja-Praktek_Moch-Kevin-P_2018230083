<?php
session_start();
//panggil koneksi database
include "koneksi.php";
include "../function/tgl-indo.php";
?>
<html>
<style>
    h1,
    p {
        text-align: center;
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

    .colom {
        background-color: #DCDCDC;

    }
</style>

<body>
    <?php $tanggal = date('Y-m-d', time() + 60 * 60 * 6); //variabel berisi tanggal sekarang
    ?>

    <div class="aa">
        <h1 class="h3 mb-4 text-gray-800"><b>PASTEL FUTSAL ARENA</b></h1>
        <p>Alamat: RT.001/RW.009, Mustika Jaya, Bekasi City, West Java 17158</p>
        <hr>
        <h4 style="margin-top: -5px; text-align: center;">Laporan Data Transaksi Pastel Futsal Arena</h4>
        <h4>Bulan : <?php echo tgl_indonesia($tanggal) ?></h4>
        <table id="example" class="table table-striped table-bordered display responsive nowrap" style="width:100%;" border="1">
            <thead>
                <tr class="colom">
                    <th scope="col">ID Booking</th>
                    <th scope="col">Atas Nama</th>
                    <th scope="col">Total Pembayaran</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tanggal Pesan</th>
                    <th scope="col">Tanggal Main</th>

                </tr>
            </thead>

            <tbody>
                <?php
                $id = $_GET['id_book'];
                $sql = mysqli_query($conn, "select * from bayar_cod where id_book='$id'");
                while ($data = mysqli_fetch_array($sql)) {

                ?>
                    <tr>
                        <td><?php echo $data['id_book']; ?></td>
                        <td><?php echo $data['atas_nama']; ?></td>
                        <td><?php echo $data['total_harga']; ?></td>
                        <td><?php echo $data['status']; ?></t>
                        <td><?php echo tgl_indonesia($data['tanggal']) ?></td>
                        <td><?php echo tgl_indonesia($data['tanggal_main']) ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>

<?php
$html = ob_get_contents();
ob_end_clean();

require_once "../mpdf_v8.0.3-master/vendor/autoload.php";
$mpdf = new \Mpdf\Mpdf();
$mpdf->AddPage("L", "", "", "", "", "15", "15", "15", "15", "", "", "", "", "", "", "", "", "", "", "", "A4");
$mpdf->WriteHTML($html);
$mpdf->Output();
?>