<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Daftar</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/smcb1.png" rel="icon">
  <link href="assets/img/smcb1.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Moderna - v2.1.0
  * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class = "body1">

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-transparent">
    <div class="container">
      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <li><a href="index.html">Login</a></li>
          <li class="active"><a href="#">Daftar</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header>
  <!-- End Header -->

  <!-- ======= Hero No Slider Section ======= -->
  <section class="d-flex justify-cntent-center align-items-center">
   <div class="daftar">
        <div class="page-header">
          <h2 class="text-center">Daftar</h2>
        </div>
        <form action="php/daftar.php" method="POST">
        <div class="form-group">
            <label for="no_karyawan">No Karyawan</label>
            <input type="text" style="text-align:center;" name="no_karyawan" class="form-control"  autofocus="on" required>
          </div>
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" style="text-align:center;" name="nama" class="form-control" placeholder="maksimal 50 karakter" required> 
          </div>
          <div class="form-group">
            <label for="no_telp">No Telp</label>
            <input type="text" style="text-align:center;" name="no_telp" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="kode_departemen">Departemen</label>
            <input type="text" style="text-align:center;" name="kode_departemen" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" style="text-align:center;" name="username" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="text" style="text-align:center;" name="password" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary btn-block" name="save">Register</button>
          
      </form>
     
  </div>
  </section>
  <br/>
  <br/>
  <br/><!-- End Hero No Slider Sectio -->

  

  

  
  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>