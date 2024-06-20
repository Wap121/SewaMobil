<?php
session_start();

if(!isset($_SESSION['admin'])){
	echo '<script language="javascript">alert("Anda harus login terlebih dahulu!"); document.location="../index.html";</script>';
}
?>