<?php
include('accessuser.php');
include ('connect.php');
$db= mysqli_connect($db_host,$db_username,$db_password,$db_database);  

      if (isset($_POST['save'])){
        $ID = $_POST['id'];
        $Jemput = $_POST['jemput'];
        $Tujuan = $_POST['tujuan'];
        $Plat = $_POST['plat'];
        $Supir = $_POST['supir'];
        $idUser = $_SESSION['id_user'];

        $query_save="INSERT INTO transaksi SET
        idtransaksi='$ID', 
        tempat_awal='$Jemput',
        tujuan='$Tujuan', 
        plat_nomor='$Plat',
        no_supir='$Supir',
        id_user='$idUser'
        ";
        if (mysqli_query($conn,$query_save)){
            $_SESSION['idtransaksi']=$ID;
            echo '<script language="javascript">alert("Data Berhasil Disimpan");document.location="../user/listpesan.php";</script>';  
      }else{
         echo '<script language="javascript">alert("Data Gagal Disimpan");document.location="../user/listmobil.php";</script>';
      }
      exit();
     }
?>