<?php  
 //Deskripsi Proyek

 include('access.php');
 include ('connect.php');
 $db= mysqli_connect($db_host,$db_username,$db_password,$db_database);  
 
if (isset($_POST['save'])){
      
      $Tipe = $_POST['tipe'];
      $NoTip = $_GET['idtype'];

      $query_update="UPDATE tipe_mobil SET 
      Tipe='$Tipe'
      WHERE idtype='$NoTip' 
      ";
      
      if($NoTip){
        mysqli_query($conn,$query_update);
         echo '<script language="javascript">alert("Data Berhasil Disimpan");document.location="../admin/jenismobil.php";</script>';
      } else{
         echo '<script language="javascript">alert("Data Gagal Disimpan");document.location="../admin/jenismobil.php";</script>';  
      }
      exit();
   }

 ?>  