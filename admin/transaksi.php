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

  <title>Data Transaksi</title>
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
          <h2>Data Transaksi</h2>
          <ol>
            <li><a href="../indexadmin.php">Home</a></li>
            <li>Data Transaksi</li>
          </ol>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Tampilan awal atau tampilan setelah pencarian ======= -->
    <?php

        include ('../php/connect.php');
        $query1="SELECT * FROM data_tahun";
        $result1=mysqli_query($conn, $query1);
        $query2="SELECT * FROM data_bulan";
        $result2=mysqli_query($conn, $query2);
        $row=0;

        
        ?>
    <!-- ======= Pencarian berdasar tahun dan bulan ======= -->
    <div class="row">
      <div class="col-lg-4"></div>
          <div class="col-lg-4" >
            <h3 class="resume-title">Cari</h3>
            <div class="resume-item" >
                <form method="GET">
                    <div class="form-group">
                    <label for="Tahun"><center>Pilih Tahun :</center></label><br/>
                      <select name="Tahun" class="form-control" required>
                        <option value="">Tahun :</option>
                          <?php
                          while($row1=mysqli_fetch_array($result1)){
                            echo '<option value='.$row1['nama_tahun'].'>'.$row1['nama_tahun'].'<br/></option>';
                            } 
                          ?>                         
                      </select>
                    </div>
                    <div class="form-group">
                    <label for="Bulan">Pilih Bulan</label><br/>
                      <select name="Bulan" class="form-control" required>
                        <option value="">Bulan :</option>
                          <?php
                          while($row2=mysqli_fetch_array($result2)){
                            echo '<option value='.$row2['idbulan'].'>'.$row2['nama_bulan'].'<br/></option>';
                            } 
                          ?>                         
                      </select>
                    </div>
                        
                  <button type="submit" class="btn btn-primary btn-block" name="save1">Cari</button><br/>
                </form> 
                <form>
                <input type="button" class= "btn btn-info btn-block" value="Simpan Data ke Excel" onclick="window.location.href='../php/printexcel.php'" />
                </form><br/>       
            </div>
            </div>
          <div class="col-lg-4"></div>
        </div>

      <!-- ======= Isi User ======= -->
      <table class="table table-bordered table-dark">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Pemesan</th>
          <th scope="col">Tanggal Pesan</th>
          <th scope="col">No Telepon Pemesan</th>
          <th scope="col">Alamat Penjemputan</th>
          <th scope="col">Alamat Tujuan</th>
          <th scope="col">Plat Nomor</th>
          <th scope="col">Merek Mobil</th>
          <th scope="col">Supir</th>
          <th scope="col">No Telepon Supir</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <?php 
      if (isset($_GET['save1'])){
        $Tahun = $_GET['Tahun'];
        $Bulan = $_GET['Bulan'];
        $_SESSION['nama_tahun']=$Tahun;
        $_SESSION['idbulan']=$Bulan;
      ?>
      <tbody>
      <?php
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 10;
        $offset = ($pageno-1) * $no_of_records_per_page;
        $offset1 = $offset + 1;
        $total_pages_sql = "SELECT COUNT(*) FROM transaksi WHERE year(tanggal)='$Tahun' AND month(tanggal)='$Bulan'";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $sql = "SELECT user.nama AS usernama, user.telp AS usertelp, transaksi.tanggal, transaksi.idtransaksi, transaksi.tempat_awal, transaksi.tujuan, transaksi.plat_nomor, mobil.merek, supir.nama AS supirnama, supir.telp AS supirtelp, status.status
        FROM transaksi 
        INNER JOIN mobil ON transaksi.plat_nomor=mobil.plat_nomor 
        INNER JOIN supir ON transaksi.no_supir=supir.no_supir 
        INNER JOIN user ON transaksi.id_user=user.no_karyawan
        INNER JOIN status ON transaksi.status=status.id
        WHERE year(tanggal)='$Tahun' AND month(tanggal)='$Bulan'
        ORDER BY tanggal DESC
        LIMIT $offset, $no_of_records_per_page";
        $res_data = mysqli_query($conn,$sql);
        while($row3 = mysqli_fetch_array($res_data)){
            echo "<tr>";
            echo "<td>".$offset1++."</td>";
            echo "<td>".$row3["usernama"]."</td>";
            echo "<td>".$row3["tanggal"]."</td>";
            echo "<td>".$row3["usertelp"]."</td>";
            echo "<td>".$row3["tempat_awal"]."</td>";
            echo "<td>".$row3["tujuan"]."</td>";
            echo "<td>".$row3["plat_nomor"]."</td>";
            echo "<td>".$row3["merek"]."</td>";
            echo "<td>".$row3["supirnama"]."</td>";
            echo "<td>".$row3["supirtelp"]."</td>";
            echo "<td>".$row3["status"]."</td>";
            echo "</tr>";
          }mysqli_close($conn);
        }else{
      ?>
      <tbody>
      <?php
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 10;
        $offset = ($pageno-1) * $no_of_records_per_page;
        $offset1 = $offset + 1;
        $total_pages_sql = "SELECT COUNT(*) FROM transaksi";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $sql = "SELECT user.nama AS usernama, user.telp AS usertelp, transaksi.tanggal, transaksi.idtransaksi, transaksi.tempat_awal, transaksi.tujuan, transaksi.plat_nomor, mobil.merek, supir.nama AS supirnama, supir.telp AS supirtelp, status.status
        FROM transaksi 
        INNER JOIN mobil ON transaksi.plat_nomor=mobil.plat_nomor 
        INNER JOIN supir ON transaksi.no_supir=supir.no_supir 
        INNER JOIN user ON transaksi.id_user=user.no_karyawan
        INNER JOIN status ON transaksi.status=status.id
        ORDER BY tanggal DESC
        LIMIT $offset, $no_of_records_per_page";
        $res_data = mysqli_query($conn,$sql);
        while($row4 = mysqli_fetch_array($res_data)){
            echo "<tr>";
            echo "<td>".$offset1++."</td>";
            echo "<td>".$row4["usernama"]."</td>";
            echo "<td>".$row4["tanggal"]."</td>";
            echo "<td>".$row4["usertelp"]."</td>";
            echo "<td>".$row4["tempat_awal"]."</td>";
            echo "<td>".$row4["tujuan"]."</td>";
            echo "<td>".$row4["plat_nomor"]."</td>";
            echo "<td>".$row4["merek"]."</td>";
            echo "<td>".$row4["supirnama"]."</td>";
            echo "<td>".$row4["supirtelp"]."</td>";
            echo "<td>".$row4["status"]."</td>";
            echo "</tr>";
          }
        }
        
      ?>

      </tbody>
      </table>
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