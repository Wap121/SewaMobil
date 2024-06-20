<?php  
 //Deskripsi Proyek

 include('accessupir.php');
 include ('connect.php');
 $db= mysqli_connect($db_host,$db_username,$db_password,$db_database);  
 
if (isset($_POST['save'])){
      
   $nama = $_POST['nama'];
   $noTelp = $_POST['no_telp'];
   $userName = $_POST['username'];
   $passWord = $_POST['password'];
   $NoSup = $_GET['no_supir'];

   $query_cek="SELECT username FROM supir WHERE username='$userName'";
   $result = mysqli_query($conn,$query_cek);
   $rows= mysqli_fetch_array($result);
   $Username1 = $rows['username'];

   $query_update="UPDATE supir SET 
   nama='$nama', 
   telp='$noTelp',
   username='$userName', 
   password='$passWord'  WHERE no_supir='$NoSup' 
      ";
      
      if($NoSup && $Username1 == $userName){
         echo '<script language="javascript">alert("Maaf, Username telah dipakai di akun lain, silakan coba lagi");document.location="../supir/indexsupir.php";</script>'; 
      } else{
         mysqli_query($conn,$query_update);
         echo '<script language="javascript">alert("Data Berhasil Disimpan");document.location="../supir/indexsupir.php";</script>';
         
      }
      exit();
   }

 ?>  