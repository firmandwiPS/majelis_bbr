<?php
require 'config/databasefoto.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nama_kegiatan'])) {
    $nama_kegiatan = mysqli_real_escape_string($conn, $_POST['nama_kegiatan']);

    // Ambil semua path foto yang akan dihapus
    $result = mysqli_query($conn, "SELECT foto FROM dokumentasi_kegiatan WHERE nama_kegiatan = '$nama_kegiatan'");
    while ($row = mysqli_fetch_assoc($result)) {
        $file = $row['foto'];
        if (file_exists($file)) {
            unlink($file); // hapus file fisik
        }
    }

    // Hapus dari database
    mysqli_query($conn, "DELETE FROM dokumentasi_kegiatan WHERE nama_kegiatan = '$nama_kegiatan'");

    echo "<script>alert('Kegiatan \"$nama_kegiatan\" dan semua fotonya berhasil dihapus!'); location.href='dokumentasi.php';</script>";
    exit;
}
?>
