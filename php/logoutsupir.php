<?php

session_start();
unset($_SESSION["id_supir"]);
header('Location: ../loginsupir.php');
?>