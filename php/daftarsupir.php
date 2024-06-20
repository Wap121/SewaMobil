<?php  
 //Daftar User/Supir

 include('access.php');
 include ('connect.php');
 $db= mysqli_connect($db_host,$db_username,$db_password,$db_database);  
 
if (isset($_POST['save'])){
      

      $nama = $_POST['nama'];
      $noTelp = $_POST['no_telp'];
      $userName = $_POST['username'];
      $passWord = $_POST['password'];

      $query_save="INSERT INTO supir SET 
      nama='$nama', 
      telp='$noTelp',
      username='$userName', 
      password='$passWord'  
      ";

      if (mysqli_query($conn,$query_save)){
         echo '<script language="javascript">alert("Data Berhasil Disimpan");document.location="../admin/supir.php";</script>';  
      
      } else{
          echo '<script language="javascript">alert("Data Gagal Disimpan");document.location="../admin/tambahsupir.php";</script>';
         
      }
      exit();
   }
 ?>  