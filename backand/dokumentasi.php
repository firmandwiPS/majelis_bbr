<?php
session_start();

if (!isset($_SESSION["login"])) {
    echo "<script>alert('Login Dulu!!'); location.href='login.php';</script>";
    exit;
}

if ($_SESSION["level"] != 1 && $_SESSION["level"] != 2) {
    echo "<script>alert('Perhatian Anda Tidak Punya Hak Akses!!'); location.href='akun.php';</script>";
    exit;
}

require 'config/databasefoto.php';
$title = 'Dokumentasi';
include 'layout/header.php';
?>

<div class="content-wrapper px-4 py-10">

<!-- Upload Form -->
<div class="bg-gradient-to-br from-emerald-600 to-green-700 text-white rounded-2xl shadow-2xl p-8 mb-12 animate__animated animate__fadeIn">
    <div class="flex items-center gap-3 mb-4">
        <h1 class="text-3xl font-extrabold">Upload Dokumentasi Kegiatan</h1>
    </div>
    <p class="text-green-100 mb-6 text-sm sm:text-base">Unggah banyak foto dalam satu kegiatan Majelis Baburrahman. File akan otomatis dikategorikan.</p>

    <form action="upload.php" method="post" enctype="multipart/form-data" class="space-y-5">
        <div>
            <label for="nama_kegiatan" class="block text-sm font-semibold mb-1">Nama Kegiatan</label>
            <input type="text" name="nama_kegiatan" id="nama_kegiatan" required class="border border-green-300 bg-white text-gray-800 rounded-lg w-full px-4 py-3 shadow-sm focus:ring-green-500 focus:outline-none" />
        </div>

        <div>
            <label for="foto" class="block text-sm font-semibold mb-2">Upload Foto Kegiatan</label>
            <div class="relative flex items-center gap-4 bg-white rounded-xl border-2 border-dashed border-green-400 px-4 py-6 cursor-pointer hover:border-green-600 hover:bg-green-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-700" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                <div>
                    <p class="text-green-800 font-medium text-sm sm:text-base">Pilih Foto Kegiatan</p>
                    <p class="text-xs text-gray-600">Bisa memilih lebih dari satu foto sekaligus</p>
                </div>
                <input type="file" name="foto[]" id="foto" multiple required class="absolute inset-0 opacity-0 w-full h-full cursor-pointer z-10" onchange="handleFileSelect(event)" />
            </div>
        </div>

        <div id="preview" class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 mt-4"></div>

        <div>
            <button type="submit" name="upload" class="bg-white text-green-800 font-bold px-6 py-3 rounded-xl shadow hover:bg-green-100 transition-all w-full sm:w-auto">Upload</button>
        </div>
    </form>
</div>

<!-- Galeri -->
<h2 class="text-2xl font-bold text-green-800 mb-6">📸 Galeri Kegiatan Majelis</h2>

<?php
$kegiatan = mysqli_query($conn, "SELECT nama_kegiatan, MAX(uploaded_at) as last_uploaded FROM dokumentasi_kegiatan GROUP BY nama_kegiatan ORDER BY last_uploaded DESC");
$index = 0;
while ($k = mysqli_fetch_assoc($kegiatan)) {
    $namaKegiatan = htmlspecialchars($k['nama_kegiatan']);
    echo '<div class="mb-4 flex items-center gap-3">';
    echo '<button onclick="openModal(' . $index . ')" class="flex-1 bg-emerald-100 hover:bg-emerald-200 text-green-800 font-semibold py-3 px-6 rounded-xl shadow text-left">' . $namaKegiatan . '</button>';
    echo '<form method="POST" action="hapus_folder.php" onsubmit="return confirm(\'Yakin ingin menghapus semua foto kegiatan ini?\')">';
    echo '<input type="hidden" name="nama_kegiatan" value="' . $namaKegiatan . '">';
    echo '<button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold px-4 py-2 rounded-lg shadow">Hapus</button>';
    echo '</form>';
    echo '<button onclick="openRenameModal(\'' . $namaKegiatan . '\')" class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold px-4 py-2 rounded-lg shadow">Ubah</button>';
    echo '</div>';

    // Modal Galeri
    echo '<div id="modal-' . $index . '" class="fixed inset-0 z-50 bg-black bg-opacity-70 hidden flex items-center justify-center p-2 overflow-y-auto">';
    echo '<div class="bg-white rounded-2xl shadow-xl w-full max-w-4xl max-h-[90vh] overflow-y-auto relative">';
    echo '<div class="sticky top-0 bg-white px-4 py-3 flex justify-between items-center border-b border-gray-200 z-10">';
    echo '<h3 class="text-lg md:text-xl font-bold text-green-800">' . $namaKegiatan . '</h3>';
    echo '<button onclick="closeModal(' . $index . ')" class="text-2xl text-gray-600 hover:text-red-500 transition">&times;</button>';
    echo '</div>';
    
    echo '<div class="p-4 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3">';
    $fotos = mysqli_query($conn, "SELECT * FROM dokumentasi_kegiatan WHERE nama_kegiatan = '" . mysqli_real_escape_string($conn, $k['nama_kegiatan']) . "' ORDER BY uploaded_at DESC");
    while ($row = mysqli_fetch_assoc($fotos)) {
        echo '<div class="relative">';
        echo '<img src="' . $row['foto'] . '" alt="Foto kegiatan" class="rounded-lg w-full h-32 object-cover cursor-pointer hover:scale-105 transition" onclick="showLargeImage(\'' . $row['foto'] . '\', ' . $row['id'] . ')" />';
        echo '</div>';
    }
    echo '</div>';

    echo '<div class="px-4 pt-3 border-t mt-4 flex justify-end">';
    echo '<button onclick="toggleForm(' . $index . ')" class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold py-2 px-4 rounded-xl transition shadow">';
    echo '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>';
    echo 'Tambah Foto';
    echo '</button>';
    echo '</div>';

    echo '<div id="form-upload-' . $index . '" class="p-4 hidden">';
    echo '<form action="upload_lanjutan.php" method="post" enctype="multipart/form-data" class="space-y-4">';
    echo '<input type="hidden" name="nama_kegiatan" value="' . $namaKegiatan . '">';
    echo '<div><label class="text-sm">Pilih Foto:</label><input type="file" name="foto[]" multiple required class="block w-full border border-gray-300 rounded-lg shadow-sm"></div>';
    echo '<button type="submit" name="upload" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg shadow">Upload Foto</button>';
    echo '</form></div>';

    echo '</div></div>';

    $index++;
}
?>

<!-- Modal Rename -->
<div id="rename-modal" class="fixed inset-0 z-50 bg-black bg-opacity-60 hidden items-center justify-center">
    <div class="bg-white p-6 rounded-xl shadow-xl w-full max-w-md">
        <h2 class="text-xl font-bold text-green-800 mb-4">Ubah Nama Kegiatan</h2>
        <form method="POST" action="ubah_nama_kegiatan.php" class="space-y-4">
            <input type="hidden" name="nama_lama" id="rename-nama-lama">
            <div>
                <label class="text-sm font-medium text-gray-700 mb-1 block">Nama Baru</label>
                <input type="text" name="nama_baru" id="rename-nama-baru" required class="w-full border border-gray-300 rounded-lg px-4 py-2">
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" onclick="closeRenameModal()" class="px-4 py-2 bg-gray-300 rounded-lg">Batal</button>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white font-semibold rounded-lg">Ubah</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Gambar Besar -->
<div id="image-modal" class="fixed inset-0 z-50 bg-black bg-opacity-90 hidden flex items-center justify-center px-4">
    <div class="relative">
        <img id="large-image" src="" class="max-h-[90vh] rounded-xl border-4 border-white shadow-2xl">
        <button onclick="closeImage()" class="absolute top-2 right-2 text-white text-3xl bg-black bg-opacity-50 px-2 rounded">&times;</button>
        <button id="delete-btn" class="absolute bottom-2 right-2 bg-red-600 text-white px-4 py-2 rounded-lg shadow" onclick="deleteImage()">Hapus Foto Ini</button>
    </div>
</div>

<script>
    let selectedFiles = [];
    let currentImageId = null;

    function handleFileSelect(event) {
        const files = Array.from(event.target.files);
        selectedFiles = [...files];
        updatePreview();
    }

    function updatePreview() {
        const preview = document.getElementById('preview');
        preview.innerHTML = '';
        selectedFiles.forEach((file, index) => {
            if (!file.type.startsWith('image')) return;
            const reader = new FileReader();
            reader.onload = function (e) {
                const div = document.createElement('div');
                div.className = 'relative';
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'w-full h-40 object-cover rounded-xl shadow';
                const btn = document.createElement('button');
                btn.innerHTML = '&times;';
                btn.onclick = () => { selectedFiles.splice(index, 1); updatePreview(); };
                btn.className = 'absolute top-1 right-1 bg-red-600 text-white rounded-full px-2';
                div.appendChild(img);
                div.appendChild(btn);
                preview.appendChild(div);
            };
            reader.readAsDataURL(file);
        });
    }

    function openModal(index) {
        document.getElementById('modal-' + index).classList.remove('hidden');
    }

    function closeModal(index) {
        document.getElementById('modal-' + index).classList.add('hidden');
    }

    function openRenameModal(nama) {
        document.getElementById('rename-modal').classList.remove('hidden');
        document.getElementById('rename-nama-lama').value = nama;
    }

    function closeRenameModal() {
        document.getElementById('rename-modal').classList.add('hidden');
    }

    function toggleForm(index) {
        const form = document.getElementById('form-upload-' + index);
        form.classList.toggle('hidden');
    }

    function showLargeImage(src, id) {
        document.getElementById('large-image').src = src;
        currentImageId = id;
        document.getElementById('image-modal').classList.remove('hidden');
    }

    function closeImage() {
        document.getElementById('image-modal').classList.add('hidden');
        currentImageId = null;
    }

    function deleteImage() {
        if (!currentImageId) return;
        if (confirm("Yakin ingin menghapus foto ini?")) {
            fetch(`hapus_foto.php?id=${currentImageId}`)
                .then(res => res.text())
                .then(msg => {
                    alert(msg);
                    location.reload();
                });
        }
    }
</script>

<?php include 'layout/footer.php'; ?>
