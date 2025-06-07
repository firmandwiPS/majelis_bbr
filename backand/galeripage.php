<?php
require 'config/databasefoto.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Galeri Kegiatan</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .modal {
      transition: all 0.3s ease-in-out;
    }
    .modal-content {
      transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
    }
  </style>
</head>
<body class="bg-gray-100 text-gray-800">

<?php include 'navbar.php' ?>

<div class="container mx-auto px-6 py-16">
 <h2 class="text-4xl font-bold text-green-800 mb-10 text-center mt-24">📸 Galeri Kegiatan Majelis</h2>

  <?php
$kegiatan = mysqli_query($conn, "
    SELECT nama_kegiatan, MAX(uploaded_at) as last_uploaded 
    FROM dokumentasi_kegiatan 
    GROUP BY nama_kegiatan 
    ORDER BY last_uploaded DESC
");
  
  while ($k = mysqli_fetch_assoc($kegiatan)) {
      $namaKegiatan = htmlspecialchars($k['nama_kegiatan']);
      echo '<div class="mb-12">';
      echo '<h3 class="text-2xl font-semibold text-green-700 mb-4">' . $namaKegiatan . '</h3>';

      $fotos = mysqli_query($conn, "SELECT * FROM dokumentasi_kegiatan WHERE nama_kegiatan = '" . mysqli_real_escape_string($conn, $k['nama_kegiatan']) . "' ORDER BY uploaded_at DESC");
      echo '<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">';
      while ($row = mysqli_fetch_assoc($fotos)) {
          $fotoPath = $row['foto'];
          echo '<div class="aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden shadow hover:shadow-lg transition group">';
          echo '<img src="' . $fotoPath . '" alt="Foto kegiatan" class="object-cover w-full h-full cursor-pointer transition duration-300 hover:opacity-80" onclick="openModal(' . $row['id'] . ')" />';
          echo '</div>';

          // Modal
          echo '<div id="modal_' . $row['id'] . '" class="modal hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-80 backdrop-blur-sm">';
          echo '<div class="modal-content bg-white rounded-xl p-6 w-[90%] max-w-3xl shadow-xl scale-95 opacity-0">';
          echo '<button class="absolute top-4 right-4 text-gray-800 text-3xl font-bold hover:text-red-600" onclick="closeModal(' . $row['id'] . ')">&times;</button>';
          echo '<img src="' . $fotoPath . '" alt="Foto kegiatan" class="w-full max-h-[70vh] object-contain rounded-md mb-6" />';
          echo '<div class="flex justify-center gap-4">';
          echo '<a href="' . $fotoPath . '" download class="bg-green-600 text-white font-semibold px-6 py-2 rounded-lg hover:bg-green-700 shadow transition">Download</a>';
          echo '<button onclick="closeModal(' . $row['id'] . ')" class="bg-gray-600 text-white font-semibold px-6 py-2 rounded-lg hover:bg-gray-700 shadow transition">Tutup</button>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
      }
      echo '</div>';
      echo '</div>';
  }
  ?>
</div>

<!-- Footer -->
<footer class="bg-green-700 text-white text-center p-6 mt-16 shadow-inner">
  <p>&copy; 2025 Majelis Sosial. Semua hak dilindungi.</p>
</footer>

<!-- Script -->
<script>
  AOS.init();

  function openModal(id) {
    const modal = document.getElementById('modal_' + id);
    const content = modal.querySelector('.modal-content');
    modal.classList.remove('hidden');
    setTimeout(() => {
      content.classList.remove('scale-95', 'opacity-0');
      content.classList.add('scale-100', 'opacity-100');
    }, 10);
  }

  function closeModal(id) {
    const modal = document.getElementById('modal_' + id);
    const content = modal.querySelector('.modal-content');
    content.classList.remove('scale-100', 'opacity-100');
    content.classList.add('scale-95', 'opacity-0');
    setTimeout(() => {
      modal.classList.add('hidden');
    }, 200);
  }
</script>

</body>
</html>
