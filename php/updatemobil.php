<?php  
 include ('../php/access.php');
  require_once ('../php/connect.php');
        $db= mysqli_connect($db_host,$db_username,$db_password,$db_database);
        if (mysqli_connect_errno()){
            die("Could not connect to database : ".myslqi_connect_error());
        }
        
 if(isset($_POST["save"]))  
 {  
      $platNomor = $_POST['plat_nomor'];
      $Merek = $_POST['merek'];
      $Tipe = $_POST['tipe1'];
      $Supir = $_POST['supir'];
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
      $PlatNomor = $_GET['plat_nomor'];

      $query = "UPDATE mobil SET 
      plat_nomor='$platNomor',
      merek='$Merek',
      tipe='$Tipe',
      no_supir='$Supir',
      gambar='$file' WHERE plat_nomor='$PlatNomor'";
      if($PlatNomor){ 
      mysqli_query($conn, $query);
      echo '<script language="javascript">alert("Data Berhasil Disimpan");document.location="../admin/mobil.php";</script>';  
      
      } else{
          echo '<script language="javascript">alert("Data Gagal Disimpan");document.location="../admin/mobil.php";</script>';
         
      }
    }  
 ?> 