<?php
include ('accessuser.php');
include ('connect.php');
$db= mysqli_connect($db_host,$db_username,$db_password,$db_database);  

      if (isset($_POST['save'])){
        $ID = $_GET['idtransaksi'];
        $Status = '1';
        $Nama=$_POST['nama'];
        $Plat =$_POST['plat'];
        $Telp = $_POST['no_telp'];
        $Jemput = $_POST['jemput'];
        $Tujuan = $_POST['tujuan']; 

        $query_cek="SELECT status from mobil WHERE plat_nomor='$Plat' AND status='0'";
      //   $query_cek2="SELECT * from mobil WHERE plat_nomor='$Plat' AND status='1'";

        $query_update="UPDATE transaksi SET 
        tempat_awal='$Jemput',
        tujuan='$Tujuan', 
        status = '$Status'
        WHERE idtransaksi='$ID'
        ";

        $query_update1="UPDATE mobil SET 
        status = '$Status'
        WHERE plat_nomor='$Plat'
        ";

        $query_update2="UPDATE user SET 
        telp = '$Telp'
        WHERE nama='$Nama'
        ";

      $result = mysqli_query($conn,$query_cek);
      $rows= mysqli_fetch_array($result);
      $Status1 = $rows['status'];

      $query_hapus="DELETE FROM transaksi WHERE idtransaksi = '$ID'";

      if ($Status1=='0'){
            mysqli_query($conn,$query_update);
            mysqli_query($conn,$query_update1);
            mysqli_query($conn,$query_update2);
            $_SESSION['idtransaksi']=$ID;
            echo '<script language="javascript">alert("Anda telah berhasil memesan, silakan tunggu respon dari supir");document.location="../user/detailpesan.php";</script>';  
      }else{
            mysqli_query($conn,$query_hapus);
         echo '<script language="javascript">alert("Mobil telah dipesan oleh orang lain, silakan pilih kendaraan lain");document.location="../user/listmobil.php";</script>';
      }
      exit();
     }
?>