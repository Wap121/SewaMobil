<?php
  include ('../php/access.php');
  require_once ('../php/connect.php');
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

  <title>Edit Data Tahun</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/smcb1.png" rel="icon">
  <link href="../assets/img/smcb1.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Moderna - v2.1.0
  * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container">

      <div class="logo float-left">
        <h1 class="text-light"><a href="../indexadmin.php"><span>SBI</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <li><a href="../indexadmin.php">Home</a></li>
          <li class="nav-item dropdown no-arrow active">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i></i><span>Lihat Data</span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-item"></div>
                <a class="dropdown-item" style = "color:black" href="user.php">
                  Penyewa
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" style = "color:black" href="supir.php">
                  Supir
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" style = "color:black" href="admin.php">
                  Admin
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" style = "color:black" href="transaksi.php">
                  Transaksi
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" style = "color:black" href="jenismobil.php">
                  Jenis Mobil
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" style = "color:black" href="tahun.php">
                  Tahun
                </a>
              </div>
          </li>
          <li><a href="mobil.php">Mobil</a></li>
          <li><a href="kontakadmin.php">Kontak Admin</a></li>
          <li><a href="../php/logout.php">Logout</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Ubah Data Tahun</h2>
          <ol>
            <li><a href="../indexadmin.php">Home</a></li>
            <li>Ubah Data Tahun</li>
          </ol>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Isi Tipe Mobil ======= -->

      <?php
        $noTahun = $_GET['idtahun'];
        $query="SELECT * FROM data_tahun WHERE idtahun='$noTahun'";
        $result = $conn-> query($query);
        if ($result->num_rows > 0){
          while ($row = $result-> fetch_assoc()){
            $Tahun = $row['nama_tahun'];
          }
        } else {
            $Tahun = '';
        }
      ?>

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="isiuser">
        <div class="my-auto">      
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 mx-auto">
                    <div class="modal-body">
                  <!-- Project Details Go Here -->
           <form action="../php/updatetahun.php?idtahun=<?php echo($noTahun)?>" method="POST">
          <div class="form-group">
            <label for="tahun">Tahun</label>
            <input type="text" style="text-align:center;" name="tahun" class="form-control" value="<?php echo $Tahun; ?>">
          </div>
          <button type="submit" class="btn btn-primary btn-block" name="save">Save</button><br/>
          
              </div>
            </div>
          </div>
        </div>
      </div>
      </section>

  </main><!-- End #main -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/venobox/venobox.min.js"></script>
  <script src="../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="../assets/vendor/counterup/counterup.min.js"></script>
  <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>