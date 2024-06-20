<?php  
 //Deskripsi Proyek

 include('access.php');
 include ('connect.php');
 $db= mysqli_connect($db_host,$db_username,$db_password,$db_database);  
 
if (isset($_POST['save'])){
      
      $Tahun = $_POST['tahun'];
      $NoTahun = $_GET['idtahun'];

      $query_update="UPDATE data_tahun SET 
      nama_tahun='$Tahun'
      WHERE idtahun='$NoTahun' 
      ";
      
      if($NoTahun){
        mysqli_query($conn,$query_update);
         echo '<script language="javascript">alert("Data Berhasil Disimpan");document.location="../admin/tahun.php";</script>';
      } else{
         echo '<script language="javascript">alert("Data Gagal Disimpan");document.location="../admin/tahun.php";</script>';  
      }
      exit();
   }

 ?>  