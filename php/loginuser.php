<?php
	session_start();
	include('connect.php');
	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
	 
		$sql = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'") or die(mysql_error());

		if(mysqli_num_rows($sql) == 0){
			echo '<script language="javascript">alert("Username atau Password yang Anda Masukkan Salah!"); document.location="../index.html";</script>';
		}else{
			$row = mysqli_fetch_assoc($sql);
			$_SESSION['logged']=true;
			$_SESSION['user']=$username;
	        $_SESSION['id_user']=$row['no_karyawan'];
	        echo '<script language="javascript">document.location="../user/listmobil.php";</script>';
	        }
	}
	if(isset($_POST['back'])){
		echo '<script language="javascript">document.location="../index.html";</script>';
	}

	?>