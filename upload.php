<?php
include 'koneksi.php';
$message = '';
if (isset($_POST['upload'])) {
    $keterangan = $_POST['keterangan'];
    require_once('uploadd.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Upload Gambar Sederhana by KangSunu</title>
</head>

<body>
    <?php echo $message; ?>

    <form action="" method="post" enctype="multipart/form-data" accept="image/jpg">
        <label>Pilih gambar</label>
        <input type="file" name="photo" required>
        <br>
        <label>Keterangan</label>
        <textarea type="text" name="keterangan"></textarea>
        <br>
        <button type="submit" name="upload">Upload</button>
    </form>
</body>

</html>