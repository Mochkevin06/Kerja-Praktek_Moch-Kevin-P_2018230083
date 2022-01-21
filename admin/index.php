<?php
session_start();
//panggil koneksi database
include "koneksi.php";
include "../function/tgl-indo.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Pastel Futsal || Admin</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../DataTables/DataTables-1.10.24/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="../DataTables/Responsive-2.2.7/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="../DataTables/Buttons-1.7.0/css/buttons.bootstrap4.min.css">
  <style>
    .aa {
      background-color: white;
      padding: 25px;
      box-shadow: 0 3px 20px rgb(0, 0, 0, 0.5);


    }
  </style>

</head>

<body id="page-top">

  <?php if (isset($_SESSION["login"])) {
    $username = $_SESSION['username'];
    $sql = "select * from tbl_user where username = '$username'";
    $query_sel = mysqli_query($conn, $sql);
    $sql_sel = mysqli_fetch_array($query_sel); ?>
    <?php if ($_SESSION["level"] == "admin") { ?>

      <!-- Page Wrapper -->
      <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion" id="accordionSidebar">

          <!-- Sidebar - Brand -->
          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="">PASTEL FUTSAL</div>
          </a>

          <!-- Divider -->
          <hr class="sidebar-divider my-0">

          <!-- Nav Item - Dashboard -->
          <li class="nav-item">
            <a class="nav-link" href="index.php?url=home">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Dashboard</span></a>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider">


          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
              <i class="fas fa-id-card"></i>
              <span>Data User</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="index.php?url=admin">Data Admin</a>
                <a class="collapse-item" href="index.php?url=pelanggan">Data Pelanggan</a>
              </div>
            </div>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider">

          <!-- Nav Item - Utilities Collapse Menu -->

          <li class="nav-item">
            <a class="nav-link collapsed" href="index.php?url=transfer">
              <i class="fas fa-edit"></i>
              <span>Konfirmasi Pembayaran</span>
            </a>
          </li>

          <!-- <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
              <i class="fas fa-edit"></i>
              <span>Konfirmasi</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="index.php?url=transfer">Pembayaran Transfer</a>
                <a class="collapse-item" href="index.php?url=cod">Pembayaran COD</a>
      </div>
      </li>-->

          <!-- Divider -->
          <hr class="sidebar-divider">

          <!-- Nav Item - Utilities Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="index.php?url=lapangan">
              <i class="fas fa-edit"></i>
              <span>Lapangan</span>
            </a>
          </li>

          <hr class="sidebar-divider">

          <!-- Nav Item - Utilities Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="index.php?url=transaksi">
              <i class="fas fa-desktop"></i>
              <span>Data Transaksi</span>
            </a>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider">




          <!-- Sidebar Toggler (Sidebar) -->
          <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
          </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

          <!-- Main Content -->
          <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

              <!-- Sidebar Toggle (Topbar) -->
              <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
              </button>

              <!-- Topbar Navbar -->
              <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                  <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                  </a>
                  <!-- Dropdown - Messages -->
                  <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                      <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                          <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </li>




                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $sql_sel['username']; ?></span>
                    <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                  </a>
                  <!-- Dropdown - User Information -->
                  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="index.php?url=profile">
                      <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                      Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                      Logout
                    </a>
                  </div>
                </li>

              </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->

            <div class="container-fluid">




              <?php
              if (isset($_GET['url'])) {
                if ($_GET['url'] == 'admin') {
                  include "user_admin.php";
                } elseif ($_GET['url'] == 'pelanggan') {
                  include "user_pelanggan.php";
                } elseif ($_GET['url'] == 'lapangan') {
                  include "data_lapangan.php";
                } elseif ($_GET['url'] == 'home') {
                  include "dasboard.php";
                } elseif ($_GET['url'] == 'transaksi') {
                  include "data_transaksi.php";
                } elseif ($_GET['url'] == 'transfer') {
                  include "data_bayar_transfer.php";
                } elseif ($_GET['url'] == 'cod') {
                  include "data_bayar_cod.php";
                } elseif ($_GET['url'] == 'profile') {
                  include "biodata_admin.php";
                } else {
                  include "dashboard.php";
                }
              ?>
              <?php } ?>
            </div>


            <!-- /.container-fluid -->

          </div>
          <!-- End of Main Content -->

          <!-- Footer -->
          <footer class="sticky-footer bg-white">
            <div class="container my-auto">
              <div class="copyright text-center my-auto">
                <span>Copyright @2021 All right reserved by: <strong>Kevin Pratama Hidayat</strong></span>
              </div>
            </div>
          </footer>
          <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

      </div>
      <!-- End of Page Wrapper -->

      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
      </a>

      <!-- Logout Modal-->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
          </div>
        </div>
      </div>

  <?php }
  } ?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script type="text/javascript" src="../js/jquery-3.5.1.js"></script>
  <script type="text/javascript" charset="utf8" src="../DataTables/DataTables-1.10.24/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="../DataTables/Buttons-1.7.0/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" charset="utf8" src="../DataTables/JSZip-2.5.0/jszip.min.js"></script>
  <script type="text/javascript" charset="utf8" src="../DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" charset="utf8" src="../DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" charset="utf8" src="../DataTables/Buttons-1.7.0/js/buttons.html5.min.js"></script>
  <script type="text/javascript" charset="utf8" src="../DataTables/Buttons-1.7.0/js/buttons.print.js"></script>
  <script type="text/javascript" charset="utf8" src="../DataTables/DataTables-1.10.24/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" charset="utf8" src="../DataTables/Responsive-2.2.7/js/dataTables.responsive.min.js"></script>
  <script type="text/javascript" charset="utf8" src="../DataTables/Responsive-2.2.7/js/responsive.bootstrap4.min.js"></script>
  <script type="text/javascript" charset="utf8" src="../js/bootstrap.min.js"></script>


  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <script>
    $(document).on("click", "#tomboledit", function() {
      let id = $(this).data('id');
      let username = $(this).data('user');
      let nama = $(this).data("nama");
      let email = $(this).data("email");
      let tempat_lahir = $(this).data("tempatlahir");
      let tanggal_lahir = $(this).data("tanggallahir");
      let alamatt = $(this).data("alamatt");
      let notlp = $(this).data("notlp");
      let password = $(this).data("password");

      $("#id").val(id);
      $(".modal-body #username").val(username);
      $(".modal-body #nama_usr").val(nama);
      $(".modal-body #email").val(email);
      $(".modal-body #tempat_lahir").val(tempat_lahir);
      $(".modal-body #tanggal_lahir").val(tanggal_lahir);
      $(".modal-body #alamatt").val(alamatt);
      $(".modal-body #no_tlp").val(notlp);
      $(".modal-body #password").val(password);
    })

    $(document).on("click", "#tomboleditt", function() {
      let id = $(this).data('id');

      $("#id_book").val(id);
    })

    $(document).on("click", "#tomboleditlapangan", function() {
      let id = $(this).data('id');
      let lapangan = $(this).data('lapangan');
      let detail = $(this).data("detail");
      let gambar = $(this).data("gambar");
      let harga = $(this).data("harga");

      $("#id_lapangan").val(id);
      $(".modal-body #lapangan").val(lapangan);
      $(".modal-body #detail").val(detail);
      $(".modal-body #upload-file-foto").val(gambar);
      $(".modal-body #harga").val(harga);
    })

    $(document).ready(function() {
      $('#example').DataTable({
        dom: 'Bfrtip',
        buttons: [
          'excel', 'print'
        ]
      });
    });

    $(document).ready(function() {
      $('#examplee').DataTable({});
    });
  </script>





</body>

</html>
