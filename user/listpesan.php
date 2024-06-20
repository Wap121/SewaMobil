<?php
  include ('../php/accessuser.php');
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

  <title>Pesan Mobil</title>
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
        <h1 class="text-light"><a href="listmobil.php"><span>SBI</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>
      <?php
        $idUser = $_SESSION['id_user'];
        $query="SELECT * FROM user WHERE no_karyawan='$idUser'";
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
          <li class="active"><a href="listmobil.php">Pesan Mobil</a></li>
          <li><a href="pesan.php">Histori Pemesanan</a></li>
          <li><a href="kontakadmin.php">Kontak Admin</a></li>
          <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i></i><span><?php echo $Nama; ?></span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-item"></div>
                  <a class="dropdown-item" style = "color:black" href="isiuser.php">Edit Profil</a>
                <div class="dropdown-divider"></div>
                  <a class="dropdown-item" style = "color:black" href="../php/logoutuser.php">Logout</a>
              </div>
          </li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <main id="main">

  <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Data Pesanan</h2>
          <ol>
            <li><a href="listmobil.php">Home</a></li>
            <li>Data Pesanan</li>
          </ol>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Isi User ======= -->
    <?php  
      //Daftar User/Supir
      $idUser = $_SESSION['id_user'];
      $ID = $_SESSION['idtransaksi'];

      $query4="SELECT idtransaksi, tanggal, tempat_awal, tujuan, transaksi.plat_nomor AS tplat, supir.nama AS supirnama, supir.telp AS supirtelp, merek, user.nama AS usernama, user.telp AS usertelp, status.status AS statua 
      FROM transaksi 
      INNER JOIN mobil ON transaksi.plat_nomor=mobil.plat_nomor 
      INNER JOIN supir ON transaksi.no_supir=supir.no_supir 
      INNER JOIN user ON transaksi.id_user=user.no_karyawan
      INNER JOIN status ON transaksi.status=status.id
      WHERE id_user='$idUser' AND idtransaksi='$ID' ORDER BY idtransaksi ASC";
      $result2 = $conn-> query($query4);
      if ($result2->num_rows > 0){
        while ($row2 = $result2-> fetch_assoc()){
          $ID = $row2['idtransaksi'];
          $Nama1 = $row2['usernama'];
          $Telepon1 = $row2['usertelp'];
          $Nama = $row2['supirnama'];
          $Telepon = $row2['supirtelp'];
          $Merek = $row2['merek'];
          $Plat = $row2['tplat'];
          $Jemput = $row2['tempat_awal'];
          $Tujuan = $row2['tujuan'];
          $Status = $row2['statua'];
        }
      } else {
          $Nama1 = '';
          $Telepon1 = '';
          $Nama = '';
          $Telepon = '';
          $Merek = '';
          $Plat = '';
          $Jemput = '';
          $Tujuan = '';
          $Status = '';
      }
      
      ?>

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="isiuser" >
        <div class="my-auto">      
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 mx-auto">
                    <div class="modal-body">
                  <!-- Project Details Go Here -->
           <form action="../php/mulaipesan.php?idtransaksi=<?php echo($ID)?>" method="POST">
          <div class="form-group">
            <label for="nama">Nama Pemesan</label>
            <input type="text" style="text-align:center;" name="nama" class="form-control" value="<?php echo $Nama1?>" readonly> 
          </div>
          <div class="form-group">
            <label for="no_telp">No Telp</label>
            <input type="text" style="text-align:center;" name="no_telp" class="form-control" value="<?php echo $Telepon1?>" required>
          </div>
          <div class="form-group">
            <label for="jemput">Alamat Penjemputan</label>
            <input type="text" style="text-align:center;" name="jemput" class="form-control" value="<?php echo $Jemput?>" required>
          </div>
          <div class="form-group">
            <label for="tujuan">Alamat Tujuan</label>
            <input type="text" style="text-align:center;" name="tujuan" class="form-control" value="<?php echo $Tujuan?>" required>
          </div>
          <div class="form-group">
            <label for="plat">Plat Nomor</label>
            <input type="text" style="text-align:center;" name="plat" class="form-control" value="<?php echo $Plat?>" readonly>
          </div>
          <div class="form-group">
            <label for="kendaraan">Kendaraan</label>
            <input type="text" style="text-align:center;" name="kendaraan" class="form-control" value="<?php echo $Merek?>" readonly>
          </div>
          <div class="form-group">
            <label for="supir">Supir</label>
            <input type="text" style="text-align:center;" name="supir" class="form-control" value="<?php echo $Nama?>" readonly>
          </div>
          <div class="form-group">
            <label for="supir">No Telepon Supir</label>
            <input type="text" style="text-align:center;" name="supir" class="form-control" value="<?php echo $Telepon?>" readonly>
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <input type="text" style="text-align:center;" name="status" class="form-control" value="<?php echo $Status?>" hidden>
          </div>
          <button type="submit" class="btn btn-primary btn-block" name="save">Pesan</button><br/>
          
              </div>
            </div>
          </div>
        </div>
      </div>
      </section>

      
    <!-- ======= Facts Section ======= -->

   
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
  <script>
    
  $(document).on("click","#pesan", function(){
    var plat = $(this).data('plat');
    var supir = $(this).data('supir');

    $("#modal-edit #plat").val(plat);
    $("#modal-edit #supir").val(supir);
  })

  </script>

</body>

</html>