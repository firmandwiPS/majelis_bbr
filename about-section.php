<style>
.scroll-wrapper {
  overflow: hidden;
  white-space: nowrap;
  width: 100%;
  padding: 1rem 0;
  position: relative;
}

.scroll-strip {
  display: inline-block;
  white-space: nowrap;
  animation: scroll-left 20s linear infinite;
}

.scroll-strip img {
  width: 250px;
  height: 250px;
  object-fit: cover;
  margin-right: 16px;
  border-radius: 12px;
  box-shadow: 0 4px 15px rgba(0,0,0,0.15);
  transition: transform 0.3s;
}

.scroll-strip img:hover {
  transform: scale(1.10);
}

@keyframes scroll-left {
  0% {
    transform: translateX(0%);
  }
  100% {
    transform: translateX(-50%);
  }
}

/* Mobile */
@media (max-width: 767.98px) {
  .scroll-strip img {
    width: 150px;
    height: 150px;
    margin-right: 15px;
  }
}
</style>






<!-- About Section -->
<section id="about" class="about section">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row mb-5">
      <div class="col-lg-6 pe-lg-5" data-aos="fade-right" data-aos-delay="200">
        <h2 class="display-6 fw-bold mb-4">Menebar Ilmu, <span>Merajut Ukhuwah</span></h2>
        <p class="lead mb-4">Majelis Baburrahman hadir sebagai wadah silaturahmi, pembinaan iman, dan aksi sosial yang menginspirasi. Bersama, kita belajar, berbagi, dan bertumbuh dalam keimanan.</p>
      </div>

      <div class="col-lg-6 pe-lg-5" data-aos="fade-right" data-aos-delay="200">
            <div class="d-flex flex-wrap gap-4 mb-4">
          <div class="stat-box">
            <span class="stat-number"><span data-purecounter-start="0" data-purecounter-end="5" data-purecounter-duration="1" class="purecounter"></span>+</span>
            <span class="stat-label">Tahun Berdiri</span>
          </div>
          <div class="stat-box">
            <span class="stat-number"><span data-purecounter-start="0" data-purecounter-end="50" data-purecounter-duration="1" class="purecounter"></span>+</span>
            <span class="stat-label">Anggota Aktif</span>
          </div>
          <div class="stat-box">
            <span class="stat-number"><span data-purecounter-start="0" data-purecounter-end="30" data-purecounter-duration="1" class="purecounter"></span>+</span>
            <span class="stat-label">Kegiatan Per Tahun</span>
          </div>
        </div>
        </div>

<div class="scroll-wrapper">
  <div class="scroll-strip">
    <!-- Foto asli -->
    <img src="assets/img/majelis/kegiatan1.jpg" alt="1">
    <img src="assets/img/majelis/kegiatan2.jpg" alt="2">
    <img src="assets/img/majelis/kegiatan3.jpg" alt="3">
    <img src="assets/img/majelis/kegiatan4.jpg" alt="4">
    <img src="assets/img/majelis/kegiatan5.jpg" alt="5">
    <img src="assets/img/majelis/kegiatan6.jpg" alt="6">
    <img src="assets/img/majelis/kegiatan7.jpg" alt="7">
    <img src="assets/img/majelis/kegiatan8.jpg" alt="8">

    <!-- Duplikat untuk loop tanpa henti -->
    <img src="assets/img/majelis/kegiatan1.jpg" alt="1-dup">
    <img src="assets/img/majelis/kegiatan2.jpg" alt="2-dup">
    <img src="assets/img/majelis/kegiatan3.jpg" alt="3-dup">
    <img src="assets/img/majelis/kegiatan4.jpg" alt="4-dup">
    <img src="assets/img/majelis/kegiatan5.jpg" alt="5-dup">
    <img src="assets/img/majelis/kegiatan6.jpg" alt="6-dup">
    <img src="assets/img/majelis/kegiatan7.jpg" alt="7-dup">
    <img src="assets/img/majelis/kegiatan8.jpg" alt="8-dup">
  </div>
</div>
    </div>

<div class="row mission-vision-row g-4">
  <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
    <div class="value-card h-100">
      <div class="card-icon">
        <i class="bi bi-heart-fill"></i>
      </div>
      <h3>Misi Kami</h3>
      <p>Menumbuhkan keimanan dan mempererat tali ukhuwah dengan pengajian, kegiatan sosial, dan dakwah yang mengajak pada kebaikan dengan hati.</p>
    </div>
  </div>
  <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
    <div class="value-card h-100">
      <div class="card-icon">
        <i class="bi bi-lightbulb"></i>
      </div>
      <h3>Visi Kami</h3>
      <p>Menjadi majelis yang memancarkan cahaya ilmu dan kasih sayang, menjadi pelita bagi masyarakat, serta mendorong lahirnya generasi yang bertakwa dan peduli.</p>
    </div>
  </div>
  <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
    <div class="value-card h-100">
      <div class="card-icon">
        <i class="bi bi-stars"></i>
      </div>
      <h3>Nilai-Nilai Kami</h3>
      <p>Berbagi tanpa pamrih, peduli tanpa batas. Kami menjunjung keikhlasan, kebersamaan, dan kesederhanaan dalam melayani umat dan merangkul sesama.</p>
    </div>
  </div>
</div>


  </div>

</section>
<!-- /About Section -->

<script>
const strip = document.getElementById('scrollStrip');
const wrapper = document.getElementById('carouselMobile');

wrapper.addEventListener('mouseenter', () => {
  strip.style.animationPlayState = 'paused';
});
wrapper.addEventListener('mouseleave', () => {
  strip.style.animationPlayState = 'running';
});
wrapper.addEventListener('touchstart', () => {
  strip.style.animationPlayState = 'paused';
});
wrapper.addEventListener('touchend', () => {
  strip.style.animationPlayState = 'running';
});
</script>
