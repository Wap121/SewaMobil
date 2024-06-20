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

  <title>List Mobil</title>
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

<?php

$rowperpage = 5;
$row = 0;


// Previous Button
if(isset($_POST['but_prev'])){
$row = $_POST['row'];
$row =(int)$row - (int)$rowperpage;
if( $row < 0 ){
  $row = 0;
  }
}

// Next Button
if(isset($_POST['but_next'])){
$row = $_POST['row'];
$allcount = $_POST['allcount'];

$val = (int)$row + (int)$rowperpage;
  if( $val < $allcount ){
    $row = $val;
  }
}


?>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container">

      <div class="logo float-left">
        <h1 class="text-light"><a href="index.html"><span>SBI</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <li><a href="../indexadmin.php">Home</a></li>
          <li class="nav-item dropdown no-arrow">
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
          <li class="active"><a href="#">Mobil</a></li>
          <li><a href="kontakadmin.php">Kontak Admin</a></li>
          <li><a href="../php/logout.php">Logout</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Our Portfolio Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>List Mobil</h2>
          <ol>
            <li><a href="../indexadmin.php">Home</a></li>
            <li>List Mobil</li>
          </ol>
        </div>

      </div>
    </section><!-- End Our Portfolio Section -->

    <!-- ======= Portfolio Section ======= -->
    <section class="portfolio">
      <div class="container">

          <div class="col-lg-12" data-aos="fade-up">
              <h3 class="resume-title"><center>Data Mobil</center></h3>
            </div>
            <div class="table-responsive" data-aos="fade-up">
            <form>
            <input type="button" class= "btn btn-info" value="Tambah Mobil" onclick="window.location.href='tambahmobil.php'" />
            </form>
              <table id="Tahun" class="table table-bordered table-striped" border="1" align="center" width="95%">
                <thead>
                  <tr>
                    <th><center>Plat Nomor</center></th>
                    <th><center>Merek</center></th>
                    <th><center>Tipe</center></th>
                    <th><center>Supir</center></th>
                    <th><center>Foto Mobil</center></th>
                    <th colspan="2"><center>Opsi</center></th>
                  </tr>
                </thead>
                <tbody>
                <?php

                $query1="SELECT * FROM mobil INNER JOIN tipe_mobil ON mobil.tipe=tipe_mobil.idtype INNER JOIN supir ON mobil.no_supir=supir.no_supir";
                $nobaris = $row + 1;
                $result1=mysqli_query($conn, $query1);
                if ($result1->num_rows > 0){
                  while ($row1 = $result1-> fetch_assoc()){
                  echo "<tr>";
                  echo "<td>".$row1["plat_nomor"]."</td>";
                  echo "<td>".$row1["merek"]."</td>";
                  echo "<td>".$row1["Tipe"]."</td>";
                  echo "<td>".$row1["nama"]."</td>";
                  echo '<td><img class="d-block w-100" height="200" width="350" src="data:image/jpeg;base64,'.base64_encode($row1['gambar'] ).'" /></a></td>';
                  echo "<td><a href='isimobil.php?plat_nomor=".$row1['plat_nomor']."'>Edit</a></td>";
                  echo "<td><a href='../php/deletemobil.php?plat_nomor=".$row1['plat_nomor']."'>Hapus</a></td>";
                  echo "</tr>";
                  $nobaris ++;
                  }
                }
                else {
                  echo "0 result";
                }
                ?>
                </tbody>
              </table>
            </div>

        

      </div>
    </section><!-- End Portfolio Section -->

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