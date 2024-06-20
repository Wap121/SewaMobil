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
      $query = "INSERT INTO mobil(plat_nomor, merek, tipe, no_supir, gambar) VALUES ('$platNomor', '$Merek', '$Tipe', '$Supir', '$file')";
      if(mysqli_query($conn, $query)){ 
      echo '<script language="javascript">alert("Data Berhasil Disimpan");document.location="../admin/mobil.php";</script>';  
      
      } else{
          echo '<script language="javascript">alert("Data Gagal Disimpan");document.location="../admin/tambahmobil.php";</script>';
         
      }
    }  
 ?> 