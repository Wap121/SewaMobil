<?php

	include('access.php');
	include ('connect.php');
	$db= mysqli_connect($db_host,$db_username,$db_password,$db_database);

	$id=$_GET['no_supir'];
	// ".$_GET['id']."
	$query="DELETE FROM supir WHERE no_supir = '$id' ";
	$result = mysqli_query($conn, $query);

	if( $result) {
            echo '<script language="javascript">alert("Data Berhasil Dihapus");document.location="../admin/supir.php";</script>';
    }else{
          echo '<script language="javascript">alert("Data Gagal Dihapus");document.location="../admin/supir.php";</script>';
    }
    mysqli_close($conn);
?>