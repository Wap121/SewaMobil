<?php

	include('access.php');
	include ('connect.php');
	$db= mysqli_connect($db_host,$db_username,$db_password,$db_database);

	$id=$_GET['idtype'];
	// ".$_GET['id']."
	$query="DELETE FROM tipe_mobil WHERE idtype = '$id' ";
	$result = mysqli_query($conn, $query);

	if( $result) {
            echo '<script language="javascript">alert("Data Berhasil Dihapus");document.location="../admin/jenismobil.php";</script>';
    }else{
          echo '<script language="javascript">alert("Data Gagal Dihapus");document.location="../admin/jenismobil.php";</script>';
    }
    mysqli_close($conn);
?>