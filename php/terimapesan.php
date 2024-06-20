<?php
include('accessupir.php');
include ('connect.php');
$db= mysqli_connect($db_host,$db_username,$db_password,$db_database);  

      if (isset($_POST['terima'])){
        $ID = $_SESSION['idtransaksi'];
        $Status = '2';
        

        $query_update="UPDATE transaksi SET 
        status = '$Status'
        WHERE idtransaksi='$ID'
        ";

      if ($ID){
            mysqli_query($conn,$query_update);
            echo '<script language="javascript">alert("Anda telah menerima pesanan");document.location="../supir/datapesanan.php";</script>';  
      }else{
         echo '<script language="javascript">alert("Anda tidak bisa menerima pesanan");document.location="../supir/indexsupir.php";</script>';
      }
      exit();
     }

     if (isset($_POST['tolak'])){
        $ID = $_SESSION['idtransaksi'];
        $Status = '2';
        $Status1 = '0';
        $Plat = $_POST['plat'];
    

        $query_update="UPDATE mobil SET 
        status = '$Status1'
        WHERE plat_nomor='$Plat'
        ";

      $query_hapus="DELETE FROM transaksi WHERE idtransaksi = '$ID'";

      if ($Plat){
            mysqli_query($conn,$query_update);
            mysqli_query($conn,$query_hapus);
            echo '<script language="javascript">alert("Anda telah menolak pesanan");document.location="../supir/indexsupir.php";</script>';  
      }else{
         echo '<script language="javascript">alert("Anda tidak bisa menolak pesanan");document.location="../supir/datapesanan.php";</script>';
      }
      exit();
     }

     if (isset($_POST['selesai'])){
        $ID = $_SESSION['idtransaksi'];
        $Status = '0';
        $Status1 = '3';
        $Plat = $_POST['plat'];
    

        $query_update="UPDATE mobil SET 
        status = '$Status'
        WHERE plat_nomor='$Plat'
        ";

         $query_update1="UPDATE transaksi SET 
         status = '$Status1'
         WHERE idtransaksi='$ID'
         ";

      if ($Plat){
            mysqli_query($conn,$query_update);
            mysqli_query($conn,$query_update1);
            echo '<script language="javascript">alert("Pesanan Telah Selesai");document.location="../supir/indexsupir.php";</script>';  
      }else{
         echo '<script language="javascript">alert("Ada kesalahan");document.location="../supir/datapesanan.php?idtransaksi=<?php echo($ID)?>";</script>';
      }
      exit();
     }
?>