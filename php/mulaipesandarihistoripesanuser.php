<?php
include ('accessuser.php');
include ('connect.php');
$db= mysqli_connect($db_host,$db_username,$db_password,$db_database);  

      if (isset($_POST['save'])){
        $ID = $_GET['idtransaksi'];
        $Status = '1';

        $today = date("Ymd");
      
        // cari id transaksi terakhir yang berawalan tanggal hari ini
        $query2 = "SELECT MAX(idtransaksi) AS last FROM transaksi WHERE idtransaksi LIKE '$today%'";
        $hasil = mysqli_query($conn, $query2);
        $data  = mysqli_fetch_array($hasil);
        $lastNoTransaksi = $data['last'];
        
        // baca nomor urut transaksi dari id transaksi terakhir 
        $lastNoUrut = substr($lastNoTransaksi, 8, 4); 
        
        // nomor urut ditambah 1
        $nextNoUrut = $lastNoUrut + 1;
        
        // membuat format nomor transaksi berikutnya
        $nextNoTransaksi = $today.sprintf('%04s', $nextNoUrut);


        $query_cek_transaksi="SELECT * FROM transaksi WHERE idtransaksi='$ID'";
        $results = mysqli_query($conn,$query_cek_transaksi);
        $rows1= mysqli_fetch_array($results);
        $Plat = $rows1['plat_nomor'];
        $query_cek="SELECT status from mobil WHERE plat_nomor='$Plat' AND status='0'";
      //   $query_cek2="SELECT * from mobil WHERE plat_nomor='$Plat' AND status='1'";

        $query_update="UPDATE transaksi SET
        idtransaksi = '$nextNoTransaksi', 
        status = '$Status'
        WHERE idtransaksi='$ID'
        ";

        $query_update1="UPDATE mobil SET 
        status = '$Status'
        WHERE plat_nomor='$Plat'
        ";

      $result = mysqli_query($conn,$query_cek);
      $rows= mysqli_fetch_array($result);
      $Status1 = $rows['status'];

      $query_hapus="DELETE FROM transaksi WHERE idtransaksi = '$ID'";

      if ($Status1=='0'){
            mysqli_query($conn,$query_update);
            mysqli_query($conn,$query_update1);
            $_SESSION['idtransaksi']=$nextNoTransaksi;
            echo '<script language="javascript">alert("Anda telah berhasil memesan, silakan tunggu respon dari supir");document.location="../user/detailpesan.php";</script>';  
      }else{
            mysqli_query($conn,$query_hapus);
         echo '<script language="javascript">alert("Mobil telah dipesan oleh orang lain, silakan pilih kendaraan lain");document.location="../user/listmobil.php";</script>';
      }
      exit();
     }
?>