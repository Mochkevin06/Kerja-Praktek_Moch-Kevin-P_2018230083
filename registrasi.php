<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/FA5PRO-master/css/all.css">
    <style>
        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #ccccccb9;
        }

        .bungkus {
            background-color: rgb(255, 255, 255);
            height: 830px;
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
                height: 740px;
                width: 800px;
                margin: auto;
                box-shadow: 0 3px 20px rgb(0, 0, 0, 0.5);
                border-radius: 14px;
                padding: 20px 30px 30px;
                padding-bottom: 20px;
            }
        }
    </style>
    <title>Resgistrasi</title>
</head>

<body>

    <div class="container">
        <div class="bungkus">
            <h4 class="text-center">Form Registrasi</h4>
            <hr>
            <form action="prosesregistrasi.php" method="POST">
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
                    <input type="text" class="form-control" placeholder="" name="alamat" required>
                </div>
                <div class="form-group">
                    <label for="">No.Telefon/HP</label>
                    <input type="text" class="form-control" placeholder="" name="no_tlp" required>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" placeholder="Masukkan Password" name="password" required>
                </div>
                <a href="#" onclick="goBack()"><button type="button" class="btn btn-secondary text-center">Kembali</button></a>
                <button type="submit" class="btn btn-primary text-center" name="registrasi">Register</button>
            </form>
        </div>

    </div>

    <script type="text/javascript">
        function goBack() {
            window.history.back()
        }
    </script>
</body>

</html>