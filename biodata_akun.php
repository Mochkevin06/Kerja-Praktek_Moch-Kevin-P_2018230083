<?php
session_start();
//panggil koneksi database
include "koneksi.php";
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/stylee.css">
    <link rel="stylesheet" type="text/css" href="css/FA5PRO-master/css/all.css">
    <style>
        .container {
            margin-top: 20px;
        }

        .bungkus {
            background-color: rgb(255, 255, 255);
            height: 660px;
            width: 300px;
            margin: auto;
            box-shadow: 0 3px 20px rgb(0, 0, 0, 0.5);
            border-radius: 14px;
            padding: 20px 30px 30px;
            padding-bottom: 20px;
        }

        @media (min-width: 992px) {
            .bungkus {
                background-color: rgb(255, 255, 255);
                height: 580px;
                width: 800px;
                margin: auto;
                box-shadow: 0 3px 20px rgb(0, 0, 0, 0.5);
                border-radius: 14px;
                padding: 20px 30px 30px;
                padding-bottom: 20px;
            }
        }
    </style>
    <title>Biodata</title>
</head>

<body>

    <?php
    include "navbar.php";
    ?>


    <div class="container">
        <?php if (isset($_SESSION["login"])) {
            $username = $_SESSION['username'];
            $sql = "select * from tbl_user where username = '$username'";
            $query_sel = mysqli_query($conn, $sql);
            $sql_sel = mysqli_fetch_array($query_sel); ?>
            <?php if ($_SESSION["level"] == "user") { ?>
                <div class="bungkus">
                    <h4 class="text-center"><b>Profile</b></h4>
                    <hr>
                    <form action="" method="POST">
                        <div class="form-group">
                            <input type="hidden" class="form-control" placeholder="" name="username" value="<?php echo $sql_sel['username']; ?>" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="" name="nama_usr" value="<?php echo $sql_sel['nama_usr']; ?>" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" placeholder="" name="email" value="<?php echo $sql_sel['email']; ?>" readonly>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tempat Lahir</label>
                                    <input type="text" class="form-control" placeholder="" name="tempat_lahir" value="<?php echo $sql_sel['tempat_lahir']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tanggal Lahir</label>
                                    <input type="date" class="form-control" placeholder="" name="tanggal_lahir" value="<?php echo $sql_sel['tanggal_lahir']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" class="form-control" placeholder="" name="alamat" value="<?php echo $sql_sel['alamat']; ?>" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="">No.Telefon/HP</label>
                            <input type="text" class="form-control" placeholder="" name="no_tlp" value="<?php echo $sql_sel['no_tlp']; ?>" readonly required>
                        </div>
                        <a href="#" onclick="goBack()"><button type="button" class="btn btn-secondary text-center">Kembali</button></a>
                        <button class="btn btn-primary text-center" data-toggle="modal" data-target="#modaledit" type="button">Edit</button>
                    </form>
                </div>

                <!-- Login Toggler Modal-->
                <div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Form Biodata</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="edit-form">
                                    <form action="proseseditakun.php" method="POST">
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" placeholder="" name="username" value="<?php echo $sql_sel['username']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nama Lengkap</label>
                                            <input type="text" class="form-control" placeholder="" name="nama_usr" value="<?php echo $sql_sel['nama_usr']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" class="form-control" placeholder="" name="email" value="<?php echo $sql_sel['email']; ?>">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Tempat Lahir</label>
                                                    <input type="text" class="form-control" placeholder="" name="tempat_lahir" value="<?php echo $sql_sel['tempat_lahir']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Tanggal Lahir</label>
                                                    <input type="date" class="form-control" placeholder="" name="tanggal_lahir" value="<?php echo $sql_sel['tanggal_lahir']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <input type="text" class="form-control" placeholder="" name="alamat" value="<?php echo $sql_sel['alamat']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">No.Telefon/HP</label>
                                            <input type="text" class="form-control" placeholder="" name="no_tlp" value="<?php echo $sql_sel['no_tlp']; ?>" required>
                                        </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

        <?php }
        } ?>

    </div>

    <?php
    include "footer.php";
    ?>
    <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">
        function goBack() {
            window.history.back()
        }
    </script>
</body>

</html>