<?php
  include ('../php/accessupir.php');
  include ('../php/functions.php');
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

  <title>Halaman Utama Supir</title>
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
  <header id="header" class="fixed-top header-transparent">
    <div class="container">

      <div class="logo float-left">
        <h1 class="text-light"><a href="indexsupir.php"><span>SBI</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <?php
        $idSupir = $_SESSION['id_supir'];
        $query="SELECT * FROM supir WHERE no_supir='$idSupir'";
        $result = $conn-> query($query);
        if ($result->num_rows > 0){
          while ($row = $result-> fetch_assoc()){
            $Nama = $row['nama'];
          }
        } else {
            $Nama = '';
        }
      ?>

      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="indexsupir.php">Home</a></li>
          <li><a href="historipesan.php">Histori Pesan</a></li>
          <li><a href="kontakadmin.php">Kontak Admin</a></li>
          <li class="nav-item dropdown">
            <a id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"href="contact.html">Pesanan 
                <?php
                $query1 = "SELECT COUNT(*) FROM transaksi WHERE status = '1' AND no_supir = '$idSupir' ORDER BY tanggal DESC";
                $result = mysqli_query($conn,$query1);
                $total_rows = mysqli_fetch_array($result)[0];
                if(($total_rows)>0){
                ?>
            <span class="badge badge-dark"> <?php echo $total_rows; ?></span>
            <?php
                }
                    ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-item"></div>
                <?php
                $query2 = "SELECT * FROM transaksi WHERE status = '1' AND no_supir = '$idSupir' ORDER BY tanggal DESC";
                $result1 = mysqli_query($conn,$query2);
                
                
                if ($result1->num_rows > 0){
                  while($rows1 = mysqli_fetch_array($result1))  
                  {
                    $ID = $rows1['idtransaksi'];
                    $TGL = $rows1['tanggal'];
                    $Status1 = $rows1['status'];
                    $_SESSION['idtransaksi']=$ID;
                ?>
                  <a class="dropdown-item" style = " <?php echo 'font-weight:bold; color:black'; ?>" 
                  href="datapesanan.php">
                         <small><i><?php echo date('F j, Y, g:i a',strtotime($TGL)) ?></i></small><br/>
                         <?php 
                    echo "Ada pesanan";
                  }
                  ?>
                         </a>
                <div class="dropdown-divider"></div>
                  <a class="dropdown-item" style = "color:black" href=""><?php
                     
                 }else{
                     echo "No Records yet.";
                 }
                     ?></a>
              </div>

          </li>
          <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i></i><span><?php echo $Nama; ?></span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-item"></div>
                  <a class="dropdown-item" style = "color:black" href="isisupir.php">Edit Profil</a>
                <div class="dropdown-divider"></div>
                  <a class="dropdown-item" style = "color:black" href="../php/logoutsupir.php">Logout</a>
              </div>
          </li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Selamat Datang <span><?php echo $Nama; ?></span></h2>
        </div>
      </div>

    </div>
  </section><!-- End Hero -->

  <main id="main">

   
   

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