<?php  
 //Daftar User/Supir

 include('access.php');
 include ('connect.php');
 $db= mysqli_connect($db_host,$db_username,$db_password,$db_database);  
 
if (isset($_POST['save'])){
      

      $Tipe = $_POST['tipe'];
      $query_save="INSERT INTO tipe_mobil SET 
      Tipe='$Tipe'  
      ";

      if (mysqli_query($conn,$query_save)){
         echo '<script language="javascript">alert("Data Berhasil Disimpan");document.location="../admin/jenismobil.php";</script>';  
      
      } else{
          echo '<script language="javascript">alert("Data Gagal Disimpan");document.location="../admin/jenismobil.php";</script>';
         
      }
      exit();
   }
 ?>  