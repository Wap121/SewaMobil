<?php
	session_start();
	include('connect.php');
	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
	 
		$sql = mysqli_query($conn, "SELECT * FROM supir WHERE username='$username' AND password='$password'") or die(mysql_error());

		if(mysqli_num_rows($sql) == 0){
			echo '<script language="javascript">alert("Username atau Password yang Anda Masukkan Salah!"); document.location="../loginsupir.php";</script>';
		}else{
			$row = mysqli_fetch_assoc($sql);
			$_SESSION['logged']=true;
			$_SESSION['supir']=$username;
	        $_SESSION['id_supir']=$row['no_supir'];
	        echo '<script language="javascript">document.location="../supir/indexsupir.php";</script>';
	        }
	}
	if(isset($_POST['back'])){
		echo '<script language="javascript">document.location="../loginsupir.php";</script>';
	}

	?>