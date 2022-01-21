  <?php

    include("koneksi.php");
    ?>
  <!-- Navbar -->
 <nav class=" navbar navbar-expand-lg navbar-light bg-light sticky-top shadow p-3 rounded">
      <a class="navbar-brand" href="index.php"><b>PASTEL FUTSAL ARENA</b></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse m" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              <a class="nav-link" href="pemesanan.php">Pemesanan</a>
              <a class="nav-link" href="jadwal.php">Jadwal</a>
              <a class="nav-link" href="abaout_me.php">Profil Kami</a>
              <?php if (isset($_SESSION["login"])) {
                    $username = $_SESSION['username'];
                    $sql = "select * from tbl_user where username = '$username'";
                    $query_sel = mysqli_query($conn, $sql);
                    $sql_sel = mysqli_fetch_array($query_sel); ?>
                  <?php if ($_SESSION["level"] == "user") { ?>
                      <div class="dropdown log">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Hi, <?php echo $sql_sel['nama_usr']; ?>
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="biodata_akun.php">akun</a>
                              <input type="hidden" name="username" value="<?php echo $sql_sel['username']; ?>">
                              <a class="dropdown-item" href="riwayat_transaksi.php">Riwayat Transaksi</a>
                              <a class="dropdown-item" href="konfirmasi_pembayaran.php">Konfirmasi Pembayaran</a>
                              <a class="dropdown-item" href="logout.php">logout</a>
                          </div>
                      </div>
                  <?php } ?>
              <?php } else { ?>
                  <div class="dropdown log">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          login
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="login.php">Login</a>
                          <a class="dropdown-item" href="registrasi.php">Daftar</a>
                      </div>
                  </div>
              <?php } ?>
          </div>
      </div>
  </nav>
  <!-- End Navbar -->