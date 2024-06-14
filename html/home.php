<?php
session_start();
include("../proses/koneksi.php");

if (!isset($_SESSION["email"])) {
  header("Location: index.php");
  exit();
}

$emailmu = $_SESSION["email"];

// Menggunakan prepared statement untuk menghindari SQL Injection
$query = "SELECT name FROM user WHERE email = ?";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, "s", $emailmu);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
  $userName = $row['name'];
} else {
  // Jika tidak ada hasil, berikan nilai default atau pesan kesalahan
  $userName = "User";
}

mysqli_stmt_close($stmt);
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Sport Center</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../img/favicon.png" rel="icon">
  <link href="../img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="../vendor/aos/aos.css" rel="stylesheet">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../style/home.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="home.php"><?php echo htmlspecialchars($userName); ?></a></h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#main">About</a></li>
          <li><a class="nav-link scrollto" href="#booking">Reservasi</a></li>
          <li><a class="nav-link scrollto" href="daftarorder.php">Jadwalku</a></li>
          <li><a class="nav-link scrollto" href="../proses/logout.php">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="hero-img" data-aos="zoom-in" data-aos-delay="100">
        <img src="../img/hero-img.png" class="img-fluid animated" alt="">
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= pesan Section ======= -->
    <section id="pesan" class="pesan">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>PEmesanan Tempat Olahraga</h2>
          <p>Kami telah menyediakan tempat olahraga untuk anda, dengan beberapa fasilitas yang nyaman. Untuk menghadirkan permainan anda yang lebih asik dan menyenangkan</p>
        </div>
        <div class="row">
          <div class="container my-5" id="booking">
            <div class="row">
              <div class="col-md-4 mb-4">
                <div class="card card-custom">
                  <img src="../img/gbFutsal.jpg" class="card-img-top" alt="Futsal">
                  <div class="card-body">
                    <h5 class="card-title">Cabang Olahraga Futsal 2024</h5>
                    <p class="card-text">Kami telah menghadirkan beberapa lapangan futsal yang bisa anda coba dengan fasilitas yang nyaman dan perlengkapan futsal yang lengkap</p>
                  </div>
                  <div class="card-footer text-center">
                    <a href="formRegisterFutsal.php" class="btn btn-primary">Reservasi</a>
                  </div>
                </div>
              </div>
              <div class="col-md-4 mb-4">
                <div class="card card-custom">
                  <img src="../img/gbBilliard.jpg" class="card-img-top" alt="Billiard">
                  <div class="card-body">
                    <h5 class="card-title">Cabang Olahraga Billiard 2024</h5>
                    <p class="card-text">Dengan Menghadirkan meja sebanyak 24 tipe premium, dengan ini kami harap anda tidak perlu khawatir lagi dengan fasilitas yang nyaman</p>
                  </div>
                  <div class="card-footer text-center">
                    <a href="formRegisterBilliard.php" class="btn btn-primary">Reservasi</a>
                  </div>
                </div>
              </div>
              <div class="col-md-4 mb-4">
                <div class="card card-custom">
                  <img src="../img/gbBulutangkis.jpg" class="card-img-top" alt="Bulutangkis">
                  <div class="card-body">
                    <h5 class="card-title">Cabang Olahraga Bulutangkis 2024</h5>
                    <p class="card-text">Tipe lapangan yang kami sediakan sudah memenuhi persyaratan resmi, sehingga anda dapat bermain dengan nyaman</p>
                  </div>
                  <div class="card-footer text-center">
                    <a href="formRegisterBulutangkis.php" class="btn btn-primary">Reservasi</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End pesan Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Paket Promo Billiard</h2>
          <p>Kami telah menyediakan paket promo untuk anda, dengan beberapa tawaran paket yang menarik. Untuk menghadirkan permainan billiard anda yang lebih asik dan menyenangkan</p>
        </div>
        <div class="row">
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="box">
              <h3>Paket 1</h3>
              <h4><sup>Rp</sup>38.000<span>per Jam</span></h4>
              <ul>
                <li><i class="bx bx-check"></i> Regular Table</li>
                <li><i class="bx bx-check"></i> Free 1 jam Permainan</li>
                <li><i class="bx bx-check"></i> Free 2 Es Teh</li>
                <li><i class="bx bx-check"></i> Free Tempat Parkir</li>
                <li class="na"><i class="bx bx-x"></i> <span>Free Server</span></li>
                <li class="na"><i class="bx bx-x"></i> <span>Free Snack</span></li>
              </ul>
              <a href="#" class="buy-btn">Get Started</a>
            </div>
          </div>
          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
            <div class="box featured">
              <h3>Paket 2</h3>
              <h4><sup>Rp</sup>40.000<span>per Jam</span></h4>
              <ul>
                <li><i class="bx bx-check"></i> VIP Table</li>
                <li><i class="bx bx-check"></i> Free 2 jam Permainan</li>
                <li><i class="bx bx-check"></i> Free 2 Es Teh</li>
                <li><i class="bx bx-check"></i> Free Tempat Parkir</li>
                <li><i class="bx bx-check"></i> Free Server</li>
                <li><i class="bx bx-check"></i> Free Snack</li>
              </ul>
              <a href="#" class="buy-btn">Get Started</a>
            </div>
          </div>
          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="box">
              <h3>Paket 3</h3>
              <h4><sup>Rp</sup>43.000<span>per Jam</span></h4>
              <ul>
                <li><i class="bx bx-check"></i> VVIP Table</li>
                <li><i class="bx bx-check"></i> Free 2 jam Permainan</li>
                <li><i class="bx bx-check"></i> Free 2 Es Teh</li>
                <li><i class="bx bx-check"></i> Free Tempat Parkir</li>
                <li><i class="bx bx-check"></i> Free Server</li>
                <li><i class="bx bx-check"></i> Free Snack</li>
              </ul>
              <a href="#" class="buy-btn">Get Started</a>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>sportcenter</h3>
            <p>
              Jl. Satria Jl. Kav. DPR III No.28 Blok.4, <br>
              Nggrekmas, Pagerwojo, Kec. Buduran, <br>
              Kabupaten Sidoarjo, Jawa Timur 61252 <br> <br>
              <strong>Phone:</strong> +62 9999 9999<br>
              <strong>Email:</strong> sportcenter@example.com<br>
            </p>
          </div>
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Medsos</h4>
            <p>Kunjungi sosial media kami, Unruk mengenal kami lebih lanjut</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>sport center</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <!-- JavaScript Bootstrap (anda bisa menggantinya dengan link ke file lokal jika diinginkan) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"></script>
  <script src="../vendor/aos/aos.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../vendor/waypoints/noframework.waypoints.js"></script>
  <script src="../vendor/php-email-form/validate.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <!-- Template Main JS File -->
  <script src="../js/main.js"></script>
  <script>
    // Select semua tautan yang memiliki kelas 'scrollto'
    let links = document.querySelectorAll('.scrollto');

    // Loop melalui setiap tautan dan tambahkan event listener
    links.forEach(link => {
      link.addEventListener('click', smoothScroll);
    });

    // Fungsi untuk scroll yang halus
    function smoothScroll(event) {
      // Mencegah tindakan default dari tautan
      event.preventDefault();

      // Dapatkan target yang di-scroll dari atribut href tautan
      let targetId = this.getAttribute('href');
      let target = document.querySelector(targetId);

      // Menghitung jarak dari bagian atas dokumen ke target
      let offsetTop = target.getBoundingClientRect().top + window.pageYOffset;

      // Scroll halus ke target
      window.scrollTo({
        top: offsetTop,
        behavior: 'smooth'
      });
    }
  </script>

</body>

</html>