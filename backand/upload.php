<?php
require 'config/databasefoto.php';

if (isset($_POST['upload'])) {
    $nama_kegiatan = mysqli_real_escape_string($conn, $_POST['nama_kegiatan']);
    $targetDir = "uploads/"; // Direktori untuk menyimpan file
    $uploadedFiles = [];

    foreach ($_FILES['foto']['name'] as $key => $fileName) {
        $targetFilePath = $targetDir . basename($_FILES['foto']['name'][$key]);
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Validasi jenis file gambar (png, jpg, jpeg)
        if (in_array($fileType, ['jpg', 'png', 'jpeg'])) {
            if (move_uploaded_file($_FILES['foto']['tmp_name'][$key], $targetFilePath)) {
                // Menyimpan ke dalam database
                $query = "INSERT INTO dokumentasi_kegiatan (nama_kegiatan, foto) 
                          VALUES ('$nama_kegiatan', '$targetFilePath')";
                if (mysqli_query($conn, $query)) {
                    $uploadedFiles[] = $fileName;
                } else {
                    echo "Error uploading file: " . mysqli_error($conn);
                }
            } else {
                echo "Failed to upload file: " . $_FILES['foto']['name'][$key];
            }
        } else {
            echo "Invalid file type for file: " . $_FILES['foto']['name'][$key];
        }
    }

    if (count($uploadedFiles) > 0) {
        echo "<script>alert('Foto berhasil diupload!'); location.href='dokumentasi.php';</script>";
    } else {
        echo "<script>alert('Gagal mengupload foto.'); location.href='dokumentasi.php';</script>";
    }
}
?>
