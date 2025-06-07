<?php
include 'config/databasefoto.php'; // Ganti sesuai dengan file koneksi kamu

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nama_kegiatan']) && isset($_FILES['foto'])) {
        $nama_kegiatan = mysqli_real_escape_string($conn, $_POST['nama_kegiatan']);
        $uploadDir = 'uploads/'; // Pastikan folder ini ada dan bisa ditulis
        $success = true;

        // Buat folder jika belum ada
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        foreach ($_FILES['foto']['tmp_name'] as $key => $tmp_name) {
            $fileName = basename($_FILES['foto']['name'][$key]);
            $fileTmp  = $_FILES['foto']['tmp_name'][$key];
            $filePath = $uploadDir . time() . '_' . $fileName;

            // Cek apakah file gambar
            $imageType = exif_imagetype($fileTmp);
            if ($imageType === IMAGETYPE_JPEG || $imageType === IMAGETYPE_PNG || $imageType === IMAGETYPE_WEBP) {
                if (move_uploaded_file($fileTmp, $filePath)) {
                    $fotoUrl = mysqli_real_escape_string($conn, $filePath);
                    $query = "INSERT INTO dokumentasi_kegiatan (nama_kegiatan, foto, uploaded_at) 
                              VALUES ('$nama_kegiatan', '$fotoUrl', NOW())";
                    if (!mysqli_query($conn, $query)) {
                        $success = false;
                    }
                } else {
                    $success = false;
                }
            } else {
                $success = false;
            }
        }

        if ($success) {
            header("Location: dokumentasi.php");
            exit();
        } else {
            echo "Gagal upload beberapa atau semua gambar.";
        }
    } else {
        echo "Data tidak lengkap.";
    }
} else {
    echo "Metode tidak diperbolehkan.";
}
?>
