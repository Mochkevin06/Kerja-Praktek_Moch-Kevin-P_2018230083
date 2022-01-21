<div class="aa">
    <h1 class="h3 mb-4 text-gray-800"><b>Data Lapangan</b></h1>
    <hr>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaltambah" style="margin-bottom: 20px;">Tambah Data</button>
    <table id="example" class="table table-striped table-bordered display responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Lapangan</th>
                <th scope="col">Detail</th>
                <th scope="col">Gambar</th>
                <th scope="col">Harga</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php

            $sql = mysqli_query($conn, "SELECT * FROM tbl_lapangan");
            while ($data = mysqli_fetch_array($sql)) {

            ?>
                <tr>
                    <td><?php echo $data['id_lapangan']; ?></td>
                    <td><?php echo $data['judul']; ?></td>
                    <td><?php echo $data['detail']; ?></td>
                    <td class="center"><img src="img/lapangan/<?php
                                                                $q = mysqli_query($conn, "select * from tbl_lapangan where id_lapangan='$data[id_lapangan]'");
                                                                $l = mysqli_fetch_array($q);
                                                                echo $l['gambar']; ?>" width="90" height="60" alt="Belum Upload"></td>
                    <td>Rp.<?php echo $data['harga_lapangan']; ?></td>
                    <td><a id="tomboleditlapangan" data-toggle="modal" data-target="#modaleditt" data-id="<?php echo $data['id_lapangan']; ?>" data-lapangan="<?php echo $data['judul']; ?>" data-detail="<?php echo $data['detail']; ?>" data-gambar="<?php echo $data['gambar']; ?>" data-harga="<?php echo $data['harga_lapangan']; ?>">
                            <button class="btn btn-primary" name="simpan"><i class="fas fa-edit"></i></button>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Lapangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="edit-form">
                    <form class="form-horizontal" action="prosestambahlapangan.php" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="control-label col-md-12 col-sm-3 col-xs-12" for="first-name">Lapangan <span class="required"></span>
                            </label>
                            <div class="col-md-12 col-sm-6 col-xs-12">
                                <input type="text" id="lapangan" name="lapangan" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12 col-sm-3 col-xs-12" for="first-name">Detail <span class="required"></span>
                            </label>
                            <div class="col-md-12 col-sm-6 col-xs-12">
                                <input type="text" id="detail" name="detail" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12 col-sm-3 col-xs-12" for="first-name">Upload Bukti<span class="required"></span>
                            </label>
                            <div class="col-md-12 col-sm-6 col-xs-12">
                                <label class="btn btn-info btn-xs" for="my-file-selector2">
                                    <input id="my-file-selector2" name="foto_lapangan" type="file" style="display:none;" onchange="$('#upload-file-foto').html($(this).val());">
                                    Upload <span class='label label-danger col-sm-8' id="upload-file-foto"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12 col-sm-3 col-xs-12" for="first-name">Harga <span class="required"></span>
                            </label>
                            <div class="col-md-12 col-sm-6 col-xs-12">
                                <input type="text" id="harga" name="harga" required="required" class="form-control col-md-7 col-xs-12" value="">
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


<div class="modal fade" id="modaleditt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Lapangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="edit-form">
                    <form class="form-horizontal" action="proseseditlapangan.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label col-md-12 col-sm-3 col-xs-12" for="first-name">Id Lapangan <span class="required"></span>
                            </label>
                            <div class="col-md-12 col-sm-6 col-xs-12">
                                <input type="text" id="id_lapangan" name="id_lapangan" required="required" class="form-control col-md-7 col-xs-12" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12 col-sm-3 col-xs-12" for="first-name">Lapangan <span class="required"></span>
                            </label>
                            <div class="col-md-12 col-sm-6 col-xs-12">
                                <input type="text" id="lapangan" name="lapangan" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12 col-sm-3 col-xs-12" for="first-name">Detail <span class="required"></span>
                            </label>
                            <div class="col-md-12 col-sm-6 col-xs-12">
                                <input type="text" id="detail" name="detail" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12 col-sm-3 col-xs-12" for="first-name">Upload Bukti<span class="required"></span>
                            </label>
                            <div class="col-md-12 col-sm-6 col-xs-12">

                                <input type="file" id="foto_lapangan" name="foto_lapangan" class="btn btn-info btn-xs" multiple onchange="$('#upload-file-foto').html($(this).val());">
                                Upload <span class='label label-danger col-sm-8' id="upload-file-foto"></span>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12 col-sm-3 col-xs-12" for="first-name">Harga <span class="required"></span>
                            </label>
                            <div class="col-md-12 col-sm-6 col-xs-12">
                                <input type="text" id="harga" name="harga" required="required" class="form-control col-md-7 col-xs-12">
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