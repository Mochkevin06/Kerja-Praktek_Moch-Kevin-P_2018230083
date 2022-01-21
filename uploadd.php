<?php
$message  = '';
$valid_file  = true;
$max_size  = 1024000; // Ukuran maksimal file yang akan diupload (dalam byte)


if ($_FILES['gambar']['name']) {
    // if no errors...
    if (!$_FILES['gambar']['error']) {

        // now is the time to modify the future file name and validate the file
        $new_file_name = strtolower($_FILES['gambar']['tmp_name']); //rename file menjadi huruf kecil
        if ($_FILES['gambar']['size'] > $max_size) //file tidak boleh lebih besar dari ukuran maksimal
        {
            $valid_file = false;
            $message = 'Maaf, file terlalu besar. Max: 1MB';
        }



        // Mengatur format file yang boleh diupload
        $image_path = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION); //ambil extensi file
        $extension = strtolower($image_path); //rename extensi file menjadi huruf kecil

        if ($extension != "jpg" && $extension != "jpeg" && $extension != "png" && $extension != "gif") {
            $valid_file = false;
            $message = "Maaf, file yang diijinkan hanya format JPG, JPEG, PNG & GIF. #" . $extension;
        }



        // jika file lolos filter
        if ($valid_file == true) {
            // mengganti nama gambar
            $rename_nama_file = date('YmdHis');
            $nama_file_baru  = $rename_nama_file . '.' . $extension;


            // simpan ke database
            $sql = "INSERT INTO gambar VALUES(null, '$nama_file_baru', '$keterangan')";
            if (!mysqli_query($koneksi, $sql)) {
                echo "Error: " . mysqli_error($koneksi) . "<br>";
                die('. Gagal mengupload gambar.');
            }

            //memindahkan gambar ke tempat yang kita inginkan
            move_uploaded_file($_FILES['gambar']['tmp_name'], 'gambar/' . $nama_file_baru);
            $message = 'Gambar berhasil diupload!';
            die($message);
        }
    }
    //if there is an error...
    else {
        //set that to be the returned message
        $message = 'Ooops!  Your upload triggered the following error:  ' . $_FILES['photo']['error'];
    }
}
