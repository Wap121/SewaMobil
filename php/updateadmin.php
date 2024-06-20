<?php  
 //Deskripsi Proyek

 include('access.php');
 include ('connect.php');
 $db= mysqli_connect($db_host,$db_username,$db_password,$db_database);  
 
if (isset($_POST['save'])){
      

      $userName = $_POST['username'];
      $passWord = $_POST['password'];
      $idUser = $_GET['idadmin'];

      $query_update="UPDATE admin SET 
      username='$userName', 
      password='$passWord'  WHERE idadmin='$idUser' 
      ";
      
      if($idUser){
         mysqli_query($conn,$query_update);
         echo '<script language="javascript">alert("Data Berhasil Disimpan");document.location="../admin/admin.php";</script>';  
      } else{
          echo '<script language="javascript">alert("Data Gagal Disimpan");document.location="../admin/admin.php";</script>';
      }
      exit();
   }

 ?>  