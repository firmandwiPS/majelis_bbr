<?php
session_start();
include 'config/app.php';

$errorAuth = false;
$errorRecaptcha = false;

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $secret_key = "6LfD7ggqAAAAALNBUQexKPIdtNNwegV148xucQME";
    $verifikasi = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $_POST['g-recaptcha-response']);
    $response = json_decode($verifikasi);

    if ($response->success) {
        $result = mysqli_query($db, "SELECT * FROM akun WHERE username = '$username'");
        if (mysqli_num_rows($result) == 1) {
            $hasil = mysqli_fetch_assoc($result);
            if (password_verify($password, $hasil['password'])) {
                $_SESSION['login'] = true;
                $_SESSION['id_akun'] = $hasil['id_akun'];
                $_SESSION['nama'] = $hasil['nama'];
                $_SESSION['username'] = $hasil['username'];
                $_SESSION['email'] = $hasil['email'];
                $_SESSION['level'] = $hasil['level'];
                header("Location: dokumentasi.php");
                exit;
            } else {
                $errorAuth = true;
                $errorMessage = "Password salah!";
            }
        } else {
            $errorAuth = true;
            $errorMessage = "Username tidak ditemukan!";
        }
    } else {
        $errorRecaptcha = true;
        $errorMessage = "Verifikasi reCAPTCHA gagal!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login - Majelis Baburrahman</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <style>
body {
  margin: 0;
  padding: 0;
  overflow: hidden; /* Ini mencegah scroll */
  font-family: 'Segoe UI', sans-serif;
  background-color: #064e3b;
}

    .background-container {
      position: fixed;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, #064e3b, #16a34a);
      overflow: hidden;
      z-index: -3;
    }

    #particles-js {
      position: fixed;
      width: 100%;
      height: 100%;
      z-index: -2;
    }

    .radius-shape {
      position: absolute;
      z-index: -1;
      animation: float 6s ease-in-out infinite alternate;
      filter: drop-shadow(0 0 8px #a3e635cc);
    }

    #radius-shape-1 { height: 260px; width: 260px; top: -100px; left: -140px; background: radial-gradient(circle at center, #065f46 0%, #a3e635 80%); border-radius: 60% 40% 70% 30% / 50% 60% 40% 50%; animation-delay: 0s; animation-duration: 7s; }
    #radius-shape-2 { height: 180px; width: 180px; top: 60px; left: 90px; background: radial-gradient(circle at center, #064e3b 0%, #84cc16 90%); border-radius: 55% 45% 55% 45% / 60% 50% 50% 40%; animation-delay: 3s; animation-duration: 8s; }
    #radius-shape-3 { height: 300px; width: 300px; bottom: -80px; right: -120px; background: radial-gradient(circle at center, #065f46 0%, #a3e635 85%); border-radius: 45% 55% 55% 45% / 65% 40% 60% 35%; animation-delay: 1.2s; animation-duration: 6s; }
    #radius-shape-4 { height: 200px; width: 200px; bottom: 60px; right: 50px; background: radial-gradient(circle at center, #0f5132 0%, #a3e635 70%); border-radius: 70% 30% 60% 40% / 60% 50% 50% 40%; animation-delay: 4s; animation-duration: 7s; }
    #radius-shape-5 { position: absolute; height: 430px; width: 420px; top: 9%; left: 40%; background: radial-gradient(circle at center, #065f46 0%, #a3e635 70%); border-radius: 55% 45% 55% 45% / 50% 60% 40% 50%; animation-delay: 2s; animation-duration: 5s; animation-name: float; animation-timing-function: ease-in-out; animation-iteration-count: infinite; }

    @keyframes float {
      0% { transform: translateY(0px) rotate(0deg); }
      50% { transform: translateY(25px) rotate(4deg); }
      100% { transform: translateY(0px) rotate(0deg); }
    }

    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.95) !important;
      backdrop-filter: saturate(200%) blur(25px);
      border-radius: 1rem;
    }

    @media (max-width: 768px) {
      .row.gx-lg-5.align-items-center { flex-direction: column; }
      .col-lg-6 { max-width: 100%; flex: 0 0 100%; }
      .col-lg-6.mb-5.mb-lg-0.text-white { margin-bottom: 2rem; text-align: center; }
      h1.display-5 { font-size: 2rem; }
      h1 span.text-warning { font-size: 2.4rem; }
      #radius-shape-1 { height: 180px; width: 180px; top: -80px; left: -80px; }
      #radius-shape-2 { height: 120px; width: 120px; top: 30px; left: 40px; }
      #radius-shape-3 { height: 180px; width: 180px; bottom: -60px; right: -60px; }
      #radius-shape-4 { height: 120px; width: 120px; bottom: 30px; right: 20px; }
      #radius-shape-5 { height: 280px; width: 280px; top: 5%; left: 30%; }
      .card-body.px-4.py-5 { padding: 1.5rem 1.5rem; }
      button.btn.btn-success.w-100 { font-size: 1.1rem; padding: 0.75rem; }
    }
  </style>
</head>
<body>
  <div class="background-container"></div>
  <div id="particles-js"></div>

  <div class="radius-shape" id="radius-shape-1"></div>
  <div class="radius-shape" id="radius-shape-2"></div>
  <div class="radius-shape" id="radius-shape-3"></div>
  <div class="radius-shape" id="radius-shape-4"></div>
  <div class="radius-shape" id="radius-shape-5"></div>

  <section class="min-vh-100 d-flex align-items-center justify-content-center">
    <div class="container px-4 py-5">
      <div class="row gx-lg-5 align-items-center">
        
        <div class="col-lg-6 mb-5 mb-lg-0 text-white text-center text-lg-start" data-aos="fade-right" data-aos-duration="1200">
          <h1 class="my-4 display-5 fw-bold ls-tight">
            <span id="typing-text" class="text-warning"></span><span class="blinking-cursor">|</span><br />
            di <span class="text-warning">Majelis Baburrahman</span>
          </h1>
          <p class="text-light fs-5 mt-3">
            Portal resmi kegiatan sosial, manajemen anggota, dan dokumentasi. <br />
            <strong>Login sekarang</strong> untuk akses penuh sebagai anggota aktif Majelis Baburrahman.
          </p>
        </div>

        <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200">
          <div class="card bg-glass shadow-lg">
            <div class="card-body px-4 py-5">
              <div class="text-center mb-4">
                <img src="assets/img/logobbr.png" alt="Logo BBR" width="100" />
                <h3 class="mt-2">Login Majelis Baburrahman</h3>
              </div>

              <?php if (!empty($errorAuth) || !empty($errorRecaptcha)): ?>
                <div class="alert alert-danger text-center"><?php echo $errorMessage; ?></div>
              <?php endif; ?>

              <form method="POST" action="">
                <div class="form-outline mb-4">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" id="username" name="username" class="form-control" required autofocus />
                </div>

                <div class="form-outline mb-4">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" id="password" name="password" class="form-control" required />
                </div>

                <div class="mb-4 text-center">
                  <div class="g-recaptcha d-inline-block" data-sitekey="6LfD7ggqAAAAAI6xTRycQzsNyt5f2b2fq0vi5XTN"></div>
                </div>

                <button type="submit" name="login" class="btn btn-success w-100 mb-4">Masuk</button>

                <div class="text-center mt-3">
                  <a href="/bbr" class="text-success">← Kembali ke Beranda</a>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <script>
    particlesJS('particles-js', {
      particles: {
        number: { value: 80 },
        color: { value: '#a3e635' },
        shape: { type: 'circle' },
        opacity: { value: 0.3 },
        size: { value: 3 },
        move: { enable: true, speed: 1, direction: 'none' }
      },
      interactivity: {
        events: { onhover: { enable: false }, onclick: { enable: false } }
      }
    });

    AOS.init();

    const phrases = ["Selamat Datang !!!", "Bergabung Bersama Kami", "Menjadi Bagian Kami"];
    const typingElement = document.getElementById('typing-text');
    let currentPhraseIndex = 0, currentCharIndex = 0, isDeleting = false;
    const typeSpeed = 100, deleteSpeed = 100, pauseTime = 1000;

    function typeLoop() {
      const currentPhrase = phrases[currentPhraseIndex];
      if (!isDeleting) {
        typingElement.textContent = currentPhrase.slice(0, currentCharIndex + 1);
        currentCharIndex++;
        if (currentCharIndex === currentPhrase.length) {
          setTimeout(() => { isDeleting = true; typeLoop(); }, pauseTime);
          return;
        }
      } else {
        typingElement.textContent = currentPhrase.slice(0, currentCharIndex - 1);
        currentCharIndex--;
        if (currentCharIndex === 0) {
          isDeleting = false;
          currentPhraseIndex = (currentPhraseIndex + 1) % phrases.length;
        }
      }
      setTimeout(typeLoop, isDeleting ? deleteSpeed : typeSpeed);
    }

    document.addEventListener('DOMContentLoaded', typeLoop);
  </script>
</body>
</html>
