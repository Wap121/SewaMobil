<?php  
 include ('../php/access.php');
  require_once ('../php/connect.php');
  if(isset($_POST["insert"]))  
 {  
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
      $query = "INSERT INTO mobil(gambar) VALUES ('$file')";  
      if(mysqli_query($conn, $query))  
      {  
           echo '<script>alert("Image Inserted into Database")</script>';  
      }  
 }  
 ?>   
 <!DOCTYPE html>  
 <html>  
      <head>  
           <meta charset="utf-8">
           <meta content="width=device-width, initial-scale=1.0" name="viewport"> 
           <title>Edit Data Mobil</title>
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
      </head>  
      <body>
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
                    <li class="active"><a href="mobil.php">Mobil</a></li>
                    <li><a href="kontakadmin.php">Kontak Admin</a></li>
                    <li><a href="../php/logout.php">Logout</a></li>
                  </ul>
                </nav><!-- .nav-menu -->

              </div>
            </header><!-- End Header -->   
            <main id="main">

              <section class="breadcrumbs">
                <div class="container">

                  <div class="d-flex justify-content-between align-items-center">
                    <h2>Edit Mobil</h2>
                    <ol>
                      <li><a href="../indexadmin.php">Home</a></li>
                      <li>Edit Mobil</li>
                    </ol>
                  </div>

                </div>
              </section><!-- End About Us Section -->  

          <?php
        $platNomor = $_GET['plat_nomor'];
        $query="SELECT * FROM mobil 
        INNER JOIN tipe_mobil ON mobil.tipe=tipe_mobil.idtype
        INNER JOIN supir ON mobil.no_supir=supir.no_supir 
        WHERE plat_nomor='$platNomor'";
        $result=mysqli_query($conn, $query);
        if ($result->num_rows > 0){
          while ($row = $result-> fetch_assoc()){
            $Plat = $row['plat_nomor'];
            $Merek = $row['merek'];
            $Tipe = $row['tipe'];
            $NamaTipe = $row['Tipe'];
            $NamaSupir = $row['nama'];
            $Supir = $row['no_supir'];
            $Foto = ''.base64_encode($row['gambar'] ).'';
          }
        } else {
            $Plat = '';
            $Merek = '';
            $Tipe = '';
            $NamaTipe = '';
            $NamaSupir = '';
            $Supir = '';
            $Foto = '';
        }
        $query1="SELECT idtype, Tipe FROM tipe_mobil";
        $result1=mysqli_query($conn, $query1);
        $query2="SELECT no_supir, nama FROM supir";
        $result2=mysqli_query($conn, $query2);
      ?>

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="isiuser">
        <div class="my-auto">      
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 mx-auto">
                    <div class="modal-body">
                  <!-- Project Details Go Here -->  
           <div class="container" style="width:500px;">  
                <h3 align="center">Masukkan Data Kendaraan</h3>  
                <br />  
                <form action="../php/updatemobil.php?plat_nomor=<?php echo($platNomor)?>" method="POST" enctype="multipart/form-data">  
                      <div class="form-group">
                        <label for="plat_nomor">Plat Nomor</label>
                        <input type="text" style="text-align:center;" name="plat_nomor" class="form-control"  autofocus="on" value="<?php echo $Plat?>">
                      </div>
                      <div class="form-group">
                        <label for="merek">Merek</label>
                        <input type="text" style="text-align:center;" name="merek" class="form-control" value="<?php echo $Merek ?>">
                      </div>
                      <div class="form-group">
                        <label for="tipe1">Tipe</label><br/>
                        <select name="tipe1">
                          <option value="<?php echo $Tipe?>"><?php echo $NamaTipe?></option>
                          <?php
                              while($row1=mysqli_fetch_array($result1)){
                                echo '<option value="'.$row1['idtype'].'"> '.$row1['Tipe'].'<br/></option>';
                            } 
                          ?>                         
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="supir">Supir</label><br/>
                        <select name="supir">
                          <option value="<?php echo $Supir?>"><?php echo $NamaSupir?></option>
                          <?php
                              while($row2=mysqli_fetch_array($result2)){
                                echo '<option value="'.$row2['no_supir'].'"> '.$row2['nama'].'<br/></option>';
                            } 
                          ?>                         
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="foto">Masukkan Foto Kendaraan</label>
                        <img src="data:image/jpg;charset=utf8;base64,<?php echo $Foto ?>" height="200" width="350" class="img-thumnail" />
                        <input type="file" name="image" id="image" />  
                         <br />  
                      </div>
                      <button type="submit" class="btn btn-primary btn-block" name="save" id="save" value="save" >Save</button><br/>  
                </form>  
                <br />  
                <br />  
            </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </section>
 
        </main>

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
 
 <script>  
 $(document).ready(function(){  
      $('#save').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Tolong Isi Foto Mobil");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('File Foto Tidak Valid');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>  

           