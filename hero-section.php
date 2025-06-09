<style>
  /* Animasi berjalan dari kanan ke kiri */
  @keyframes tickerScroll {
    0% {
      transform: translateX(0);
    }
    100% {
      transform: translateX(-50%);
    }
  }

  /* Track ticker: elemen yang bergerak */
  .ticker-track {
    display: flex;
    width: max-content;
    animation: tickerScroll 60s linear infinite;
    animation-play-state: running;
  }

  /* Saat cursor hover ke ticker, animasi berhenti */
  .ticker-container:hover .ticker-track {
    animation-play-state: paused;
  }

  /* Desain tiap item acara */
  .ticker-item {
    flex-shrink: 0;
    min-width: 300px;
    background-color: white;
    border-left: 4px solid #22c55e; /* Hijau */
    border-radius: 0.75rem;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    margin-right: 1rem;
    padding: 1rem;
    transition: transform 0.3s;
    cursor: pointer;
  }

  /* Efek hover pada item acara */
  .ticker-item:hover {
    transform: scale(1.05);
  }

  /* Badge hari pada acara */
  .day-badge {
    background-color: #22c55e;
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 9999px;
    font-weight: 700;
    font-size: 0.875rem;
    box-shadow: 0 0 5px rgba(34, 197, 94, 0.6);
  }

  /* Judul acara */
  .event-title {
    font-weight: 600;
    color: black;
  }

  /* Jam acara */
  .event-time {
    font-size: 0.875rem;
    color: black;
  }

  /* Responsif: pastikan ticker lebar penuh di desktop */
  @media (min-width: 1024px) {
    .ticker-container {
      width: 100vw;
      max-width: 100%;
      overflow: hidden;
    }

    .ticker-track {
      width: max-content;
      display: flex;
      animation: tickerScroll 60s linear infinite;
    }
  }
</style>

<section id="hero" class="hero section dark-background">
  <!-- Video latar belakang -->
  <div class="hero-container">
    <video autoplay muted loop playsinline class="video-background">
      <source src="assets/img/education/video-2.mp4" type="video/mp4">
    </video>
    <div class="overlay"></div>

    <div class="container">
      <div class="row align-items-center">
        <!-- Kolom kiri: teks dan tombol -->
        <div class="col-lg-7" data-aos="zoom-out" data-aos-delay="100">
          <div class="hero-content">
            <h1>Majelis Baburrahman</h1>
            <p>Tempat berkumpulnya umat dalam menuntut ilmu, mempererat ukhuwah, dan menebar kebaikan. Bersama kita tumbuh dalam keimanan dan amal sosial.</p>
            <div class="cta-buttons">
              <a href="login.php" class="btn-primary">Login</a>
              <a href="#featured-activities" class="btn-secondary">Lihat Kegiatan</a>
            </div>
          </div>
        </div>

        <!-- Kolom kanan: statistik -->
        <div class="col-lg-5" data-aos="zoom-out" data-aos-delay="200">
          <div class="stats-card">
            <div class="stats-header">
              <h3>Kegiatan Kami</h3>
              <div class="decoration-line"></div>
            </div>
            <div class="stats-grid">
              <div class="stat-item">
                <div class="stat-icon"><i class="bi bi-heart-fill"></i></div>
                <div class="stat-content">
                  <h4>50+</h4>
                  <p>Penerima Bantuan Sosial</p>
                </div>
              </div>
              <div class="stat-item">
                <div class="stat-icon"><i class="bi bi-book-fill"></i></div>
                <div class="stat-content">
                  <h4>10+</h4>
                  <p>Pengajian Rutin</p>
                </div>
              </div>
              <div class="stat-item">
                <div class="stat-icon"><i class="bi bi-people-fill"></i></div>
                <div class="stat-content">
                  <h4>50+</h4>
                  <p>Anggota Aktif</p>
                </div>
              </div>
              <div class="stat-item">
                <div class="stat-icon"><i class="bi bi-tree-fill"></i></div>
                <div class="stat-content">
                  <h4>8+</h4>
                  <p>Tour Dakwah & Alam</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Bagian ticker scroll acara -->
      <div class="bg-yellow-50 overflow-hidden py-4 ticker-container relative mt-5">
        <div class="flex ticker-track px-4">
          <!-- Template isi acara -->
          <template id="events">
            <div class="ticker-item">
              <div class="flex items-center gap-4">
                <span class="day-badge">Senin</span>
                <div class="flex flex-col">
                  <span class="event-title">Pengajian Anak-anak</span>
                  <span class="event-time">07.00 - 09.00</span>
                </div>
              </div>
            </div>

            <div class="ticker-item">
              <div class="flex items-center gap-4">
                <span class="day-badge">Selasa</span>
                <div class="flex flex-col">
                  <span class="event-title">Kajian Ibu-Ibu</span>
                  <span class="event-time">09.00 - 11.00</span>
                </div>
              </div>
            </div>

            <div class="ticker-item">
              <div class="flex items-center gap-4">
                <span class="day-badge">Rabu</span>
                <div class="flex flex-col">
                  <span class="event-title">Belajar Al-Qur'an</span>
                  <span class="event-time">13.00 - 15.00</span>
                </div>
              </div>
            </div>

            <div class="ticker-item">
              <div class="flex items-center gap-4">
                <span class="day-badge">Kamis</span>
                <div class="flex flex-col">
                  <span class="event-title">Pelatihan Adab Islami</span>
                  <span class="event-time">16.00 - 18.00</span>
                </div>
              </div>
            </div>

            <div class="ticker-item">
              <div class="flex items-center gap-4">
                <span class="day-badge">Jumat</span>
                <div class="flex flex-col">
                  <span class="event-title">Khotmil Qur’an & Dzikir</span>
                  <span class="event-time">18.00 - 20.00</span>
                </div>
              </div>
            </div>

            <div class="ticker-item">
              <div class="flex items-center gap-4">
                <span class="day-badge">Sabtu</span>
                <div class="flex flex-col">
                  <span class="event-title">Majelis Remaja</span>
                  <span class="event-time">19.00 - 21.00</span>
                </div>
              </div>
            </div>

            <div class="ticker-item">
              <div class="flex items-center gap-4">
                <span class="day-badge">Minggu</span>
                <div class="flex flex-col">
                  <span class="event-title">Tour Dakwah & Alam</span>
                  <span class="event-time">08.00 - 12.00</span>
                </div>
              </div>
            </div>
          </template>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Script untuk menggandakan acara agar ticker terlihat berjalan terus -->
<script>
  const track = document.querySelector('.ticker-track');
  const template = document.querySelector('#events');

  // Clone isi acara 2x untuk tampilan scroll tak terputus
  for (let i = 0; i < 2; i++) {
    track.appendChild(template.content.cloneNode(true));
  }
</script>
