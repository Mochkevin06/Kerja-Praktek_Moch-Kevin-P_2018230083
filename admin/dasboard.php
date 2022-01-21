<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dasboard</h1>
</div>

<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <?php
    $sql = mysqli_query($conn, "SELECT id_user FROM tbl_user ORDER BY id_user");
    $row = mysqli_num_rows($sql);
    ?>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-dark shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">
                            <H4><b>User</b></H4>
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-800"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    $sqll = mysqli_query($conn, "SELECT id_book FROM transaksi ORDER BY id_book");
    $roww = mysqli_num_rows($sqll);
    ?>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-dark shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">
                            <H4><b>TRANSAKSI</b></H4>
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $roww; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-desktop fa-2x text-gray-800"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <?php
    $sqlll = mysqli_query($conn, "SELECT SUM(total_bayar) AS total FROM bayar_transfer");
    $rowww = mysqli_fetch_array($sqlll)
    ?>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-dark shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">
                            <H4><b>TOTAL PEMASUKAN</b></H4>
                        </div>

                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rowww['total']; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-desktop fa-2x text-gray-800"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-5 col-md-6 mb-4">
        <div class="card border-left-dark shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">
                            <H4><b>daftar transaksi per-akun</b></H4>
                        </div>
                        <table id="examplee" class="table table-striped table-bordered display responsive" style="width:100%">

                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">atas nama</th>
                                    <th scope="col">Jumlah pesanan</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $sqllll = mysqli_query($conn, "SELECT @no:=@no+1 nomor, username, atas_nama, COUNT(id_book) AS total FROM transaksi,(SELECT @no:= 0) AS no WHERE MONTH(tgl_main) = MONTH(CURDATE()) GROUP BY (username) DESC");
                                while ($rowwww = mysqli_fetch_array($sqllll)) {

                                ?>
                                    <tr>
                                        <td><?php echo $rowwww['nomor']; ?></td>
                                        <td><?php echo $rowwww['username']; ?></td>
                                        <td><?php echo $rowwww['atas_nama']; ?></td>
                                        <td><?php echo $rowwww['total']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>