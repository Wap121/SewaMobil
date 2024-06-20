<?php
	session_start();
	include('connect.php');
	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
	 
		$sql = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$password'") or die(mysql_error());

		if(mysqli_num_rows($sql) == 0){
			echo '<script language="javascript">alert("Username atau Password yang Anda Masukkan Salah!"); document.location="../loginadmin.php";</script>';
		}else{
			$row = mysqli_fetch_assoc($sql);
			$_SESSION['logged']=true;
			$_SESSION['admin']=$username;
	        $_SESSION['id_user']=$row['idadmin'];
	        echo '<script language="javascript">document.location="../indexadmin.php";</script>';
	        }
	}
	if(isset($_POST['back'])){
		echo '<script language="javascript">document.location="../indexadmin.php";</script>';
	}

	?>