<?php

$update = ((isset($_GET['action']) AND $_GET['action'] == 'update') OR isset($_SESSION["pelanggan"])) ? true : false;
if ($update) {
  $sql = $connection->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_SESSION[pelanggan][id]'");
  $row = $sql->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if ($update) {
    $sql = "UPDATE pelanggan SET no_ktp='$_POST[no_ktp]', nama='$_POST[nama]', email='$_POST[email]', no_telp='$_POST[no_telp]', alamat='$_POST[alamat]', username='$_POST[username]'";
    if ($_POST["password"] != "") {
      $sql .= ", password='".md5($_POST["password"])."'";
    }
    $sql .= " WHERE id_pelanggan='$_SESSION[pelanggan][id]'";
  } else {
    $sql = "INSERT INTO pelanggan VALUES (NULL, '$_POST[no_ktp]', '$_POST[nama]', '$_POST[email]', '$_POST[no_telp]', '$_POST[alamat]', '$_POST[username]', '".md5($_POST["password"])."')";
  }
  if ($connection->query($sql)) {
    echo alert("Berhasil! Silahkan login", "login.php");
  } else {
    echo alert("Gagal!", "?page=pelanggan");
  }
}

if (isset($_GET['action']) AND $_GET['action'] == 'delete') {
  $connection->query("DELETE FROM pelanggan WHERE id_pelanggan='$_SESSION[pelanggan][id]'");
  echo alert("Berhasil!", "?page=pelanggan");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Daftar</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
          <li><a href="login2.php">Login</a></li>
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
          <?php if ($update): ?>
            <h2>Update <small>data pelanggan!</small></h2>
          <?php else: ?>
            <h2 class="text-center">Daftar</h2>
          <?php endif; ?>
        </div>
        <form action="php/daftar.php" method="POST">
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" style="text-align:center;" name="nama" class="form-control" autofocus="on" <?= (!$update) ?: 'value="'.$row["nama"].'"' ?>>
          </div>
          <div class="form-group">
            <label for="no_ktp">No KTP</label>
            <input type="text" style="text-align:center;" name="no_ktp" class="form-control" <?= (!$update) ?: 'value="'.$row["no_ktp"].'"' ?>>
          </div>
          <div class="form-group">
            <label for="no_telp">No Telp</label>
            <input type="text" style="text-align:center;" name="no_telp" class="form-control" <?= (!$update) ?: 'value="'.$row["no_telp"].'"' ?>>
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea rows="2" style="text-align:center;" name="alamat" class="form-control"><?= (!$update) ? "" : $row["alamat"] ?></textarea>
          </div>
          <div class="form-group">
            <label for="email">email</label>
            <input type="email" style="text-align:center;" name="email" class="form-control" <?= (!$update) ?: 'value="'.$row["email"].'"' ?>>
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" style="text-align:center;" name="username" class="form-control" <?= (!$update) ?: 'value="'.$row["username"].'"' ?>>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" style="text-align:center;" name="password" class="form-control">
          </div>
          <?php if ($update): ?>
            <div class="row">
                <div class="col-md-10">
                  <button type="submit" class="btn btn-warning btn-block">Update</button>
                </div>
                <div class="col-md-2">
                  <a href="?page=kriteria" class="btn btn-default btn-block">Batal</a>
                </div>
            </div>
          <?php else: ?>
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          <?php endif; ?>
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