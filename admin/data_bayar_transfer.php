<div class="aa">
    <h1 class="h3 mb-4 text-gray-800"><b>Data Konfirmasi Transfer</b></h1>
    <hr>
    <table id="example" class="table table-striped table-bordered display responsive" style="width:100%">

        <thead>
            <tr>
                <th scope="col">Id Booking</th>
                <th scope="col">Total Bayar</th>
                <th scope="col">Rekening Pengirim</th>
                <th scope="col">Atas Nama</th>
                <th scope="col">Rekening Tujuan</th>
                <th scope="col">Status</th>
                <th scope="col">Bukti Bayar</th>
                <th scope="col">Tanggal Pembayaran</th>
                <th scope="col">Konfirmasi</th>
                <th scope="col">Cetak</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $tgl = date('Y-m-d', time() + 60 * 60 * 6);
            $nows = strtotime(date('Y-m-d', time() + 60 * 60 * 6));
            $start = date('Y-m-d', strtotime('+7 day', $nows));
            $sql = mysqli_query($conn, "SELECT * FROM bayar_transfer WHERE tanggal between '$tgl' AND '$start' ORDER BY tanggal DESC");
            while ($data = mysqli_fetch_array($sql)) {

            ?>
                <tr>
                    <td><?php echo $data['id_book']; ?></td>
                    <td><?php echo $data['total_bayar']; ?></td>
                    <td><?php echo $data['rek_kirim']; ?></td>
                    <td><?php echo $data['atas_nama']; ?></td>
                    <td><?php echo $data['rek_tujuan']; ?></td>
                    <td><?php echo $data['status']; ?></td>
                    <td class="center"><img src="../assets/bukti_bayar/<?php
                                                                        $q = mysqli_query($conn, "select * from bayar_transfer where id_book='$data[id_book]'");
                                                                        $l = mysqli_fetch_array($q);
                                                                        echo $l['bukti_bayar']; ?>" width="90" height="30" alt="Belum Upload"></td>
                    <td><?php echo tgl_indonesia($data['tanggal']) ?></td>
                    <td>
                        <input type="hidden" name="hapus" value="admin">
                        <a id="tomboleditt" data-toggle="modal" data-target="#modalsave" data-id="<?php echo $data['id_book']; ?>" data-status="<?php echo $data['status']; ?>">
                            <button class="btn btn-primary" name="simpan"><i class="fas fa-edit">Konfirmasi</i></button>
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-warning" href="print_laporan_konfirm_TFpertransaksi.php?id_book=<?php echo $data['id_book']; ?>"><i class="fas fa-print"></i> Cetak</a>
                    </td>
                </tr>



            <?php } ?>
        </tbody>
    </table>
    <hr>
    <a href="print_laporan_konfirm_transfer.php" class="btn btn-warning"><i class="fas fa-print"></i> Print Data Laporan Bulan Ini</a>
</div>



<div class="modal fade" id="modalsave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="edit-form">
                    <form action="konfirmasi_transfer.php" method="POST">
                        <input type="hidden" name="simpann" value="insert">
                        <input type="hidden" name="id_book" id="id_book">

                        <div class="form-group">
                            <label for="exampleFormControlSelect1"></label>
                            <select class="form-control" id="exampleFormControlSelect1" name="status" id="status">
                                <option id="status1"></option>
                                <option>Booking</option>
                                <option>Selesai</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="simpan">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>