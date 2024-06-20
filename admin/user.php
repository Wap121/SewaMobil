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

  <title>Daftar Penyewa</title>
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
          <h2>Daftar Penyewa</h2>
          <ol>
            <li><a href="../indexadmin.php">Home</a></li>
            <li>Daftar Penyewa</li>
          </ol>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Isi Penyewa ======= -->
    <div class="containerss">
      <div class="center">  
        <form>
        <input type="button" class= "btn btn-info " value="Simpan Data ke Excel" onclick="window.location.href='../php/printexceluser.php'" />
        </form><br/> 
      </div>
    </div>
    <div class="containerss">
      <div class="center">  
        <form>
        <input type="button" class= "btn btn-info" value="Tambah Penyewa" onclick="window.location.href='../admin/tambahuser.php'" />
        </form><br/>
      </div>
    </div>
    
      <table class="table table-bordered table-dark">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">No Karyawan</th>
          <th scope="col">Nama</th>
          <th scope="col">No Telp</th>
          <th scope="col">Departemen</th>
          <th scope="col">Username</th>
          <th scope="col">Password</th>
          <th colspan="2" scope="col">Opsi</th>
        </tr>
      </thead>
      <tbody>
      <?php
        include ('../php/connect.php');
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 100;
        $nobaris=1;
        $offset = ($pageno-1) * $no_of_records_per_page;
        $offset2 = $offset + 1;
        $total_pages_sql = "SELECT COUNT(*) FROM user";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $sql = "SELECT * FROM user LIMIT $offset, $no_of_records_per_page";
        $res_data = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($res_data)){
            echo "<tr>";
            echo "<td>".$offset2++."</td>";
            echo "<td>".$row["no_karyawan"]."</td>";
            echo "<td>".$row["nama"]."</td>";
            echo "<td>".$row["telp"]."</td>";
            echo "<td>".$row["kode_departemen"]."</td>";
            echo "<td>".$row["username"]."</td>";
            echo "<td>".$row["password"]."</td>";
            echo "<td><a href='isiuser.php?no_karyawan=".$row['no_karyawan']."'>Edit</a></td>";
            echo "<td><a href='../php/deleteuser.php?no_karyawan=".$row['no_karyawan']."'>Delete</a></td>";
            echo "</tr>";
            
          }
          echo "</tbody>";
          echo "</table>";
        mysqli_close($conn);

      ?>
      <nav>
        <ul class="pagination">
          <li><a class="page-link" href="?pageno=1">First</a></li>
          <li class="<?php if($pageno <= 1){ echo 'page-item disabled'; } ?>">
              <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
          </li>
          <li class="<?php if($pageno >= $total_pages){ echo 'page-item disabled'; } ?>">
              <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
          </li>
          <li><a class="page-link" href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
       </ul>
      </nav>

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