<?php
include 'authentication/koneksi.php';

if (!isset($_SESSION['user']['id_siswa'])) {
  header('location:authentication/login.php');
}
// Chat PHP Files
include 'chat/helpers/user.php';
include 'chat/helpers/percakapan.php';
include 'chat/helpers/chat.php';
include 'chat/helpers/opened.php';
include 'chat/helpers/last_chat.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Aarav - Bimbingan Konseling dan Aduan</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="assets/img/icon.png" rel="icon">
  <link href="assets/img/icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Chat CSS Files -->
  <link rel="stylesheet" href="chat/css/style.css">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-transparent ">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <a href=""><img src="assets/img//aaravlogo.png" alt="logo Aarav"></a>
      </div>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link" href="index.php">Home</a></li>
          <li class="dropdown"><a href=""><span>Layanan</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="index.php?page=konseling" class="nav-link">Konseling</a></li>
              <li><a href="index.php?page=aduan" class="nav-link">Aduan</a></li>
            </ul>
          </li>
          <li><a class="nav-link" href="index.php?page=faq">F.A.Q</a></li>
          <li><a class="nav-link" href="index.php?page=profil">Profile</a></li>
          <li><a class="getstarted" href="authentication/logout.php">Log out</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <main id="main">
        <?php
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';
        if (file_exists($page . '.php')) {
            include $page . '.php';
        } else {
            include '404.php';
        }
        ?>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <a href="index.php"><img src="assets/img//aaravlogo.png" alt="logo Aarav" height="30"></a>
            <p class="mt-2">
              Jl. Kemiri 15A Iring Mulyo <br>
              Metro Timur, Metro <br>
              Lampung <br><br>
              <strong>Phone:</strong> +62 9891 0230 09<br>
              <strong>Email:</strong> aarav@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php?page=contact">Contact</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php?page=faq">FAQ</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php?page=konseling">Konseling</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php?page=aduan">Aduan</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
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

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>Aarav</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>

</html>