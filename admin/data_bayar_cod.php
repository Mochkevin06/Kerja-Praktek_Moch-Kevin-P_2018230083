<div class="aa">
    <h1 class="h3 mb-4 text-gray-800"><b>Data Konfirmasi COD</b></h1>
    <hr>
    <table id="example" class="table table-striped table-bordered display responsive" style="width:100%">

        <thead>
            <tr>
                <th scope="col">Id Booking</th>
                <th scope="col">atas nama</th>
                <th scope="col">harga</th>
                <th scope="col">status</th>
                <th scope="col">Tanggal Pesan</th>
                <th scope="col">Tanggal Main</th>
                <th scope="col">Konfirmasi</th>
                <th scope="col">Cetak</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $tgl = date('Y-m-d', time() + 60 * 60 * 6);
            $nows = strtotime(date('Y-m-d', time() + 60 * 60 * 6));
            $start = date('Y-m-d', strtotime('+7 day', $nows));
            $sql = mysqli_query($conn, "SELECT * FROM bayar_cod");
            while ($data = mysqli_fetch_array($sql)) {

            ?>
                <tr>
                    <td><?php echo $data['id_book']; ?></td>
                    <td><?php echo $data['atas_nama']; ?></td>
                    <td><?php echo $data['total_harga']; ?></td>
                    <td><?php echo $data['status']; ?></td>
                    <td><?php echo tgl_indonesia($data['tanggal']) ?></td>
                    <td><?php echo tgl_indonesia($data['tanggal_main']) ?></td>
                    <td>
                        <input type="hidden" name="hapus" value="admin">
                        <a id="tomboleditt" data-toggle="modal" data-target="#modalsave" data-id="<?php echo $data['id_book']; ?>" data-status="<?php echo $data['status']; ?>">
                            <button class="btn btn-primary" name="simpan"><i class="fas fa-edit"></i> Edit</button>
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-warning" href="print_laporan_konfirm_CODpertransaksi.php?id_book=<?php echo $data['id_book']; ?>"><i class="fas fa-print"></i> Cetak</a>
                    </td>
                </tr>



            <?php } ?>
        </tbody>
    </table>
    <hr>
    <a href="print_laporan_konfirm_COD.php" class="btn btn-warning"><i class="fas fa-print"></i> Print Data Laporan Bulan Ini</a>
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
                    <form action="konfirmasi_cod.php" method="POST">
                        <input type="hidden" name="simpann" value="insert">
                        <input type="hidden" name="id_book" id="id_book">

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Level</label>
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