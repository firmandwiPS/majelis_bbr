<!-- Navbar -->
<header id="navbar" class="shadow-md rounded-full fixed top-4 left-4 right-4 z-40 transition-all duration-300 bg-green-800 backdrop-blur-md bg-opacity-90">
  <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">
    <!-- Logo -->
    <div class="flex items-center gap-1">
      <img src="assets/img/logobbr.png" alt="Logo" class="w-18 h-12 rounded-full shadow">
      <h1 class="text-xl font-bold text-yellow-300">Majelis Baburrahman</h1>
    </div>

    <!-- Desktop Menu -->
    <nav class="hidden md:flex gap-5 items-center text-sm text-white">
      <a href="index.php" class="hover:text-yellow-300">Tentang</a>
      <a href="kegiatanpage.php" class="hover:text-yellow-300">Kegiatan</a>
      <a href="galeripage.php" class="hover:text-yellow-300">Galeri</a>
      <a href="kontak.php" class="hover:text-yellow-300">Kontak</a>
    </nav>

    <!-- Login Button (Desktop) -->
    <a href="login.php" class="hidden md:inline-block bg-yellow-300 text-white px-5 py-2 rounded-full text-sm font-semibold shadow hover:bg-green-700 transition-all duration-300">
      Login
    </a>

    <!-- Hamburger Button (Mobile) -->
    <button id="menuToggle" class="md:hidden text-yellow-300 focus:outline-none">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>
  </div>
</header>

<!-- Mobile Menu Modal (Animated & Modern) -->
<div id="mobileMenuOverlay" class="hidden fixed inset-0 z-50 bg-black/40 backdrop-blur-sm flex items-start justify-center pt-20 transition-all duration-300 ease-in-out">
  <div class="relative bg-white w-11/12 max-w-sm rounded-2xl shadow-xl px-6 py-8 transform scale-95 opacity-0 transition-all duration-300 ease-out">
    <!-- Tombol Close -->
    <button id="closeMenu" class="absolute top-4 right-4 text-3xl text-gray-600 hover:text-gray-900">&times;</button>

    <!-- Isi Menu -->
    <div class="space-y-6 mt-6 text-lg text-gray-900 font-medium text-center">
      <a href="index.php" class="block hover:text-green-700">Tentang</a>
      <a href="kegiatanpage.php" class="block hover:text-green-700">Kegiatan</a>
      <a href="galeripage.php" class="block hover:text-green-700">Galeri</a>
      <a href="kontak.php" class="block hover:text-green-700">Kontak</a>
      <a href="login.php" class="inline-block bg-green-600 text-white px-6 py-2 rounded-full text-center hover:bg-green-700">
        Login
      </a>
    </div>
  </div>
</div>

<!-- JavaScript -->
<script>
  const menuToggle = document.getElementById("menuToggle");
  const mobileMenuOverlay = document.getElementById("mobileMenuOverlay");
  const mobileMenuContent = mobileMenuOverlay.querySelector("div");
  const closeMenu = document.getElementById("closeMenu");

  menuToggle.addEventListener("click", () => {
    mobileMenuOverlay.classList.remove("hidden");
    setTimeout(() => {
      mobileMenuContent.classList.remove("scale-95", "opacity-0");
      mobileMenuContent.classList.add("scale-100", "opacity-100");
    }, 10);
  });

  closeMenu.addEventListener("click", () => {
    mobileMenuContent.classList.remove("scale-100", "opacity-100");
    mobileMenuContent.classList.add("scale-95", "opacity-0");
    setTimeout(() => {
      mobileMenuOverlay.classList.add("hidden");
    }, 300);
  });
</script>
