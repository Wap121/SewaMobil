<?php  
 //Daftar User/Supir

 include('access.php');
 include ('connect.php');
 $db= mysqli_connect($db_host,$db_username,$db_password,$db_database);  
 
if (isset($_POST['save'])){
      

      $noKar = $_POST['no_karyawan'];
      $nama = $_POST['nama'];
      $noTelp = $_POST['no_telp'];
      $koDar = $_POST['kode_departemen'];
      $userName = $_POST['username'];
      $passWord = $_POST['password'];

      $query_cek="SELECT username FROM user WHERE username='$userName'";
      $result = mysqli_query($conn,$query_cek);
      $rows= mysqli_fetch_array($result);
      $Username1 = $rows['username'];


      $query_save="INSERT INTO user SET 
      no_karyawan='$noKar',
      nama='$nama', 
      telp='$noTelp',
      kode_departemen='$koDar',
      username='$userName', 
      password='$passWord'  
      ";

      if ($Username1 == $userName){
         echo '<script language="javascript">alert("Maaf, Username telah dipakai di akun lain, silakan coba lagi");document.location="../admin/tambahuser.php";</script>';  
      } else{
         mysqli_query($conn,$query_save);
         echo '<script language="javascript">alert("Data Berhasil Disimpan");document.location="../admin/user.php";</script>';
         
      }
      exit();
   }
 ?>  