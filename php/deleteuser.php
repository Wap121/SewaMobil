<?php

	include('access.php');
	include ('connect.php');
	$db= mysqli_connect($db_host,$db_username,$db_password,$db_database);

	$id=$_GET['no_karyawan'];
	// ".$_GET['id']."
	$query="DELETE FROM user WHERE no_karyawan = '$id' ";
	$result = mysqli_query($conn, $query);

	if( $result) {
            echo '<script language="javascript">alert("Data Berhasil Dihapus");document.location="../admin/user.php";</script>';
    }else{
          echo '<script language="javascript">alert("Data Gagal Dihapus");document.location="../admin/user.php";</script>';
    }
    mysqli_close($conn);
?>