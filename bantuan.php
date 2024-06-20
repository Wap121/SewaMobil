<?php
  include ('php/connect.php');
        $db= mysqli_connect($db_host,$db_username,$db_password,$db_database);
        if (mysqli_connect_errno()){
            die("Could not connect to database : ".myslqi_connect_error());
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Moderna Bootstrap Template - Index 2 without slider</title>
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

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-transparent">
    <div class="container">

      <div class="logo float-left">
        <h1 class="text-light"><a href="#"><span>SBI</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
        <li class="nav-item dropdown no-arrow active">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i></i><span>Login</span>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <div class="dropdown-item"></div>
                <a class="dropdown-item" style = "color:black" href="index.html">Login User</a>
              <div class="dropdown-divider"></div>
                <a class="dropdown-item" style = "color:black" href="loginsupir.php">Login Supir</a>
            </div>
        </li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero No Slider Section ======= -->
  <?php  
      $query4="SELECT * 
      FROM kontakadmin 
      ";
      $result2 = $conn-> query($query4);
      if ($result2->num_rows > 0){
        while ($row2 = $result2-> fetch_assoc()){
            $ID = $row2['id'];
            $Telp = $row2['telepon'];
            $Email = $row2['email'];
            $Lainnya = $row2['lainnya'];
        }
      } else {
            $Telp = '';
            $Email = '';
            $Lainnya = '';
      }
      
      ?>
  <section id="hero-no-slider" class="d-flex justify-cntent-center align-items-center">
    <div class="loginbox">
        
                <div class="panel panel-info">
                    <div class="panel-heading"><h3 class="text-center"><b>Bantuan</b></small></small></h3></div><br/>
                    <div class="panel-body">
                        <form action="#" method="POST">
                        <div class="form-group">
                            <label for="telepom">No WhatsApp: <?php echo $Telp; ?> (Pak Dimas)</label> 
                        </div>
                        <div class="form-group">
                            <label for="Email">Email : <?php echo $Email; ?></label>
                        </div>
                        <div class="form-group">
                            <label for="lainnya">Kontak lainnya: <?php echo $Lainnya; ?></label>
                        </div>
                        </form>
                    </div>
                    <br/>
                </div>
            
    </div>
  </section><!-- End Hero No Slider Sectio -->


  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

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