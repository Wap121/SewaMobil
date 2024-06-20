<?php

	include('access.php');
	include ('connect.php');
	$db= mysqli_connect($db_host,$db_username,$db_password,$db_database);

	$id=$_GET['plat_nomor'];
	// ".$_GET['id']."
	$query="DELETE FROM mobil WHERE plat_nomor = '$id' ";
	$result = mysqli_query($conn, $query);

	if( $result) {
            echo '<script language="javascript">alert("Data Berhasil Dihapus");document.location="../admin/mobil.php";</script>';
    }else{
          echo '<script language="javascript">alert("Data Gagal Dihapus");document.location="../admin/mobil.php";</script>';
    }
    mysqli_close($conn);
?>