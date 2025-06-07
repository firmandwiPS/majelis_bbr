<?php
require 'config/databasefoto.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $lama = mysqli_real_escape_string($conn, $_POST['nama_lama']);
    $baru = mysqli_real_escape_string($conn, $_POST['nama_baru']);

    $update = mysqli_query($conn, "UPDATE dokumentasi_kegiatan SET nama_kegiatan='$baru' WHERE nama_kegiatan='$lama'");

    if ($update) {
        echo "<script>alert('Nama kegiatan berhasil diubah!'); location.href='dokumentasi.php';</script>";
    } else {
        echo "<script>alert('Gagal mengubah nama kegiatan.'); location.href='dokumentasi.php';</script>";
    }
}
