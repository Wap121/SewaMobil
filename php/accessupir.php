<?php
session_start();

if(!isset($_SESSION['supir'])){
	echo '<script language="javascript">alert("Anda harus login terlebih dahulu!"); document.location="../login2.php";</script>';
}
?>