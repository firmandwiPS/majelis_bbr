<?php

session_start();
if (!isset($_SESSION["login"])) {
    echo "<script>
            alert('Login Dulu!!');
            document.location.href='login.php';
        </script>";
    exit;
}


$title = 'Daftar Akun';

include 'layout/header.php';

$data_akun = select("SELECT * FROM akun");

$id_akun = $_SESSION['id_akun'];
$data_bylogin = select("SELECT * FROM akun WHERE id_akun = $id_akun");

// jika tombol tambah di tekan jalankan ini
if (isset($_POST['tambah'])) {
    if (create_akun($_POST) > 0) {
        echo "<script>
        alert('Data Akun Berhasil Ditambahkan');
        document.location.href = 'akun.php';
        </script>";
    } else {
        echo "<script>
        alert('Data Akun Gagal Ditambahkan');
        document.location.href = 'akun.php';
        </script>";
    }
}

// jika tombol ubah di tekan jalankan ini
if (isset($_POST['ubah'])) {
    if (update_akun($_POST) > 0) {
        echo "<script>
        alert('Data Akun Berhasil Diubah');
        document.location.href = 'akun.php';
        </script>";
    } else {
        echo "<script>
        alert('Data Akun Gagal Diubah');
        document.location.href = 'akun.php';
        </script>";
    }
}
?>

<section class="content-wrapper bg-gray-50 py-10 px-4 sm:px-6 lg:px-8 min-h-screen pt-24">
  <div class="max-w-7xl mx-auto">
    <!-- Judul -->
    <div class="text-center mb-10">
      <h1 class="text-4xl font-bold text-emerald-700">📋 Data Akun</h1>
      <p class="text-gray-600 mt-2">Berisi informasi pengguna sistem majelis</p>
    </div>

    <!-- Tombol tambah akun (admin) -->
    <?php if ($_SESSION['level'] == 1) : ?>
    <div class="mb-5 text-right">
      <button data-bs-toggle="modal" data-bs-target="#modalTambah"
        class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white font-medium px-4 py-2 rounded-lg shadow-md transition">
        <i class="fa-solid fa-circle-plus"></i> Tambah Akun
      </button>
    </div>
    <?php endif; ?>

    <!-- Tabel -->
<div class="table-container bg-white shadow-xl rounded-xl overflow-hidden ring-1 ring-gray-200">
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-emerald-700 text-white">
                <tr>
                    <th class="px-5 py-3">No</th>
                    <th class="px-5 py-3">Nama</th>
                    <th class="px-5 py-3">Username</th>
                    <th class="px-5 py-3">Email</th>
                    <th class="px-5 py-3">Password</th>
                    <th class="px-5 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 bg-white">
                <?php $no = 1; ?>
                <?php if ($_SESSION['level'] == 1): ?>
                    <?php foreach ($data_akun as $akun): ?>
                    <tr class="hover:bg-emerald-50">
                        <td class="px-5 py-4"><?= $no++; ?></td>
                        <td class="px-5 py-4"><?= htmlspecialchars($akun['nama']); ?></td>
                        <td class="px-5 py-4"><?= htmlspecialchars($akun['username']); ?></td>
                        <td class="px-5 py-4"><?= htmlspecialchars($akun['email']); ?></td>
                        <td class="px-5 py-4 italic text-gray-400">Terenkripsi</td>
                        <td class="px-5 py-4 text-center space-x-2">
                            <button data-bs-toggle="modal" data-bs-target="#modalUbah<?= $akun['id_akun']; ?>"
                                class="inline-flex items-center gap-1 px-3 py-1 bg-yellow-400 text-yellow-900 rounded-full hover:bg-yellow-500 transition">
                                <i class="fa-regular fa-pen-to-square"></i> Ubah
                            </button>
                            <button data-bs-toggle="modal" data-bs-target="#modalHapus<?= $akun['id_akun']; ?>"
                                class="inline-flex items-center gap-1 px-3 py-1 bg-red-600 text-white rounded-full hover:bg-red-700 transition">
                                <i class="fa-solid fa-trash-can"></i> Hapus
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <?php foreach ($data_bylogin as $akun): ?>
                    <tr class="hover:bg-emerald-50">
                        <td class="px-5 py-4"><?= $no++; ?></td>
                        <td class="px-5 py-4"><?= htmlspecialchars($akun['nama']); ?></td>
                        <td class="px-5 py-4"><?= htmlspecialchars($akun['username']); ?></td>
                        <td class="px-5 py-4"><?= htmlspecialchars($akun['email']); ?></td>
                        <td class="px-5 py-4 italic text-gray-400">Terenkripsi</td>
                        <td class="px-10 py-4 italic text-gray-400">Anda Tidak Memiliki Akses</td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</section>

<!-- Modal tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required
                            minlength="6">
                    </div>

                    <div class="mb-3">
                        <label for="level">Level</label>
                        <select name="level" id="level" class="form-control" required>
                            <option value="">-- Pilih Level --</option>
                            <option value="1">Admin</option>
                            <option value="2">Anggota Majelis</option>
                            
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Kembali</button>
                <button type="submit" name="tambah" class="btn btn-primary rounded-pill">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>




<!-- Modal ubah -->
<?php foreach ($data_akun as $akun): ?>

    <div class="modal fade" id="modalUbah<?= $akun['id_akun']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input type="hidden" name="id_akun" value="<?= $akun['id_akun']; ?>">

                        <div class="mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="<?= $akun['nama']; ?>"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control"
                                value="<?= $akun['username']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="<?= $akun['email']; ?>"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="password">Password <small>(Masukan Password Baru/Lama)</small></label>
                            <input type="password" name="password" id="password" class="form-control" required
                                minlength="6">
                        </div>


                        <?php if ($_SESSION['level'] == 1) : ?>
                        <div class="mb-3">
                            <label for="level">Level</label>
                            <select name="level" id="level" class="form-control" required>
                                <?php $level = $akun['level']; ?>
                                <option value="1" <?php $level == '1' ? 'selected' : null ?>>Admin</option>
                                <option value="2" <?php $level == '2' ? 'selected' : null ?>>Anggota Majelis</option>
                               
                            </select>
                        </div>
                            <?php else :?>
                                <input type="hidden" name="level" value="<?= $akun['level']; ?>">
                        <?php endif ;?>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" name="ubah" class="btn btn-success rounded-pill">Ubah</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal Hapus -->
<?php foreach ($data_akun as $akun): ?>
    <div class="modal fade" id="modalHapus<?= $akun['id_akun'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Yakin Ingin Menghapus Data Akun : <?= $akun['nama']; ?> ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Batal</button>
                    <a href="hapus-akun.php?id_akun=<?= $akun['id_akun'] ?>" class="btn btn-danger rounded-pill">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<?php include 'layout/footer.php'; ?>