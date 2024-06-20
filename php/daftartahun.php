<?php  
 //Daftar User/Supir

 include('access.php');
 include ('connect.php');
 $db= mysqli_connect($db_host,$db_username,$db_password,$db_database);  
 
if (isset($_POST['save'])){
      

      $Tahun = $_POST['tahun'];
      $query_save="INSERT INTO data_tahun SET 
      nama_tahun='$Tahun'  
      ";

      if (mysqli_query($conn,$query_save)){
         echo '<script language="javascript">alert("Data Berhasil Disimpan");document.location="../admin/tahun.php";</script>';  
      
      } else{
          echo '<script language="javascript">alert("Data Gagal Disimpan");document.location="../admin/tahun.php";</script>';
         
      }
      exit();
   }
 ?>  