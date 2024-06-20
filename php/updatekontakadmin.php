<?php  
 //Deskripsi Proyek

 include('access.php');
 include ('connect.php');
 $db= mysqli_connect($db_host,$db_username,$db_password,$db_database);  
 
if (isset($_POST['save'])){
      

      $Telp = $_POST['telepon'];
      $Email = $_POST['Email'];
      $Lain = $_POST['lainnya'];
      $ID = $_GET['id'];

      $query_update="UPDATE kontakadmin SET 
      telepon='$Telp', 
      email='$Email',
      lainnya='$Lain'  WHERE id='$ID' 
      ";
      
      if($ID){
         mysqli_query($conn,$query_update);
         echo '<script language="javascript">alert("Data Berhasil Disimpan");document.location="../admin/kontakadmin.php";</script>';  
      } else{
          echo '<script language="javascript">alert("Data Gagal Disimpan");document.location="../admin/kontakadmin.php";</script>';
      }
      exit();
   }

 ?>  