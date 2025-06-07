<?php
$conn = mysqli_connect("localhost", "root", "", "bbr"); // Ganti sesuai nama database
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
