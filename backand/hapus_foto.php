<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "bbr";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (!isset($_GET['id'])) {
    die("Error: ID tidak ditemukan.");
}

$id = intval($_GET['id']);

$sql = "SELECT foto FROM dokumentasi_kegiatan WHERE id = $id";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nama_file = $row['foto'];
    $path_foto = "uploads/" . $nama_file;

    if (file_exists($path_foto)) {
        unlink($path_foto);
    }

    $sql_delete = "DELETE FROM dokumentasi_kegiatan WHERE id = $id";
    if ($conn->query($sql_delete) === TRUE) {
        echo "Data kegiatan dan foto berhasil dihapus.";
    } else {
        echo "Gagal menghapus dari database: " . $conn->error;
    }
} else {
    echo "Data tidak ditemukan di database.";
}

$conn->close();
?>
