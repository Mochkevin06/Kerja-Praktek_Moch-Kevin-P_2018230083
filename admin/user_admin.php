<div class="aa">
    <h1 class="h3 mb-4 text-gray-800"><b>Data User Admin</b></h1>
    <hr>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaltambah" style="margin-bottom: 20px;">Tambah Data</button>
    <table id="example" class="table table-striped table-bordered display responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Tempat Lahir</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Alamat</th>
                <th scope="col">No.Telfon</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php

            $sql = mysqli_query($conn, "SELECT * FROM tbl_user WHERE level='admin'");
            while ($data = mysqli_fetch_array($sql)) {

            ?>
                <tr>
                    <td><?php echo $data['id_user']; ?></td>
                    <td><?php echo $data['username']; ?></td>
                    <td><?php echo $data['nama_usr']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo $data['tempat_lahir']; ?></td>
                    <td><?php echo tgl_indonesia($data['tanggal_lahir']) ?></td>
                    <td><?php echo $data['alamat']; ?></td>
                    <td><?php echo $data['no_tlp']; ?></td>
                    <td>
                        <a href="hapus_admin.php?id=<?php echo $data['id_user']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        <a id="tomboledit" data-toggle="modal" data-target="#modaledit" data-id="<?php echo $data['id_user']; ?>" data-user="<?php echo $data['username']; ?>" data-nama="<?php echo $data['nama_usr']; ?>" data-email="<?php echo $data['email']; ?>" data-tempatlahir="<?php echo $data['tempat_lahir']; ?>" data-tanggallahir="<?php echo tgl_indonesia($data['tanggal_lahir']) ?>" data-alamatt="<?php echo $data['alamat']; ?>" data-notlp="<?php echo $data['no_tlp']; ?>">
                            <button class="btn btn-primary" name="simpan"><i class="fas fa-edit"></i></button>
                        </a>
                    </td>
                </tr>



            <?php } ?>
        </tbody>
    </table>
    <!-- <form method="POST" action="" class="form-inline">
        <label for="date1">Tampilkan transaksi bulan </label>
        <select class="form-control mr-2" name="bulan">
            <option value="">-</option>
            <option value="1">Januari</option>
            <option value="2">Februari</option>
            <option value="3">Maret</option>
            <option value="4">April</option>
            <option value="5">Mei</option>
            <option value="6">Juni</option>
            <option value="7">Juli</option>
            <option value="8">Agustus</option>
            <option value="9">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
        </select>
        <button type="submit" name="submit" class="btn btn-primary">Tampilkan</button>
    </form> -->
    <br>
    <a href="print_laporan_userAdmin.php" class="btn btn-warning"><i class="fas fa-print"></i> Print Data User Admin</a>
</div>

<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah User Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="edit-form">
                    <form action="prosestambahUserAdmin.php" method="POST">
                        <input type="hidden" name="simpan" value="insert">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control" placeholder="Masukkan Username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Masukkan Username" name="nama_usr" required>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" placeholder="contoh@gmail.com" name="email">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tempat Lahir</label>
                                    <input type="text" class="form-control" placeholder="" name="tempat_lahir">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tanggal Lahir</label>
                                    <input type="date" class="form-control" placeholder="" name="tanggal_lahir">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" class="form-control" placeholder="Masukkan Username" name="alamat" required>
                        </div>
                        <div class="form-group">
                            <label for="">No.Telefon/HP</label>
                            <input type="text" class="form-control" placeholder="Masukkan Username" name="no_tlp" required>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" placeholder="Masukkan Password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="">level</label>
                            <input type="text" class="form-control" name="level" value="admin" readonly required>
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


<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update User Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="edit-form">
                    <form action="proseseditUser.php" method="POST">
                        <input type="hidden" name="simpann" value="insert">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control" name="username" id="username">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_usr" name="nama_usr">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tempat Lahir</label>
                                    <input type="text" class="form-control" placeholder="" id="tempat_lahir" name="tempat_lahir">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tanggal Lahir</label>
                                    <input type="date" class="form-control" placeholder="" id="tanggal_lahir" name="tanggal_lahir">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" class="form-control" id="alamatt" name="alamat">
                        </div>
                        <div class="form-group">
                            <label for="">No.Telefon/HP</label>
                            <input type="text" class="form-control" id="no_tlp" name="no_tlp">
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