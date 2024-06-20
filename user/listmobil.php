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

  <title>Daftar Mobil</title>
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
        <h1 class="text-light"><a href="#"><span>SBI</span></a></h1>
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

    <!-- ======= About Us Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Daftar Mobil</h2>
          <ol>
            <li><a href="listmobil.php">Home</a></li>
            <li>Daftar Mobil</li>
          </ol>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= About Section ======= -->
    <section class="portfolio">
      <div class="container">

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <?php
              include ('../php/connect.php');
              $query="SELECT * FROM tipe_mobil";
              $result_query=mysqli_query($conn, $query);
              while($row = mysqli_fetch_array($result_query))  
              { 
                  echo'
                  <li data-filter=".filter-'.$row['Tipe'].'">'.$row['Tipe'].'</li>
                  ';
              }
              ?>
            </ul>
            <br/>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

      
        <?php
        $query1="SELECT * FROM mobil INNER JOIN tipe_mobil ON mobil.tipe=tipe_mobil.idtype WHERE status='0'";
        $result_query1=mysqli_query($conn, $query1); 
        while($row1 = mysqli_fetch_array($result_query1))  
          {
            $idMobil = $row1['plat_nomor'];
            $Supir = $row1['no_supir'];
            echo '
              <br/>
              <div class="col-lg-4 col-md-6 filter-'.$row1['Tipe'].'">
                <div class="portfolio-item">
                  <a href="" id="pesan" data-plat="'.$row1['plat_nomor'].'" data-supir="'.$row1 ['no_supir'].'" data-toggle="modal" data-target="#myModal"><img src="data:image/jpeg;base64,'.base64_encode($row1['gambar'] ).'" height="200" width="350" class="img-thumnail" alt=""></a>
                  <div class="portfolio-info">
                    <h3><a title="'.$row1['merek'].'">'.$row1['merek'].'</a></h3>
                  </div>
                </div>
              </div>
            ';   
        }
        ?>
      </div>

      <?php
      $today = date("Ymd");
      
      // cari id transaksi terakhir yang berawalan tanggal hari ini
      $query2 = "SELECT MAX(idtransaksi) AS last FROM transaksi WHERE idtransaksi LIKE '$today%'";
      $hasil = mysqli_query($conn, $query2);
      $data  = mysqli_fetch_array($hasil);
      $lastNoTransaksi = $data['last'];
      
      // baca nomor urut transaksi dari id transaksi terakhir 
      $lastNoUrut = substr($lastNoTransaksi, 8, 4); 
      
      // nomor urut ditambah 1
      $nextNoUrut = intval ($lastNoUrut) + 1;
      
      // membuat format nomor transaksi berikutnya
      $nextNoTransaksi = $today.sprintf('%04s', $nextNoUrut);
      ?>

      <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
        
          <!-- Modal content-->
          <div class="modal-content" id="form-edit">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Pesan Mobil</h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            <div id="modal-edit" class="modal-body">
              <form action="../php/daftarpesan.php" method="POST">
              <div class="form-group">
                <input type="text" style="text-align:center;" name="id" class="form-control" autofocus="on" value="<?php echo $nextNoTransaksi?>" hidden> 
              </div>
              <div class="form-group">
                <label for="jemput">Alamat Penjemputan</label>
                <input type="text" style="text-align:center;" name="jemput" class="form-control" autofocus="on" required> 
              </div>
              <div class="form-group">
                <label for="tujuan">Alamat Tujuan</label>
                <input type="text" style="text-align:center;" name="tujuan" class="form-control" required>
              </div>
              <div class="form-group">
                <input type="text" style="text-align:center;" id="plat" name="plat" hidden>
                <input type="text" style="text-align:center;" id="supir" name="supir" hidden>
              </div>
              <button type="submit" class="btn btn-primary btn-block" name="save">Pesan</button><br/>
            </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal" name="save">Close</button>
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