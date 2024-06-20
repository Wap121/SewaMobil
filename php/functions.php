<?php

    define('DBINFO', 'mysql:host=localhost;dbname=sewa-mobil');
    define('DBUSER','root');
    define('DBPASS','');

    function fetchAll($query1){
        $con = new PDO(DBINFO, DBUSER, DBPASS);
        $stmt = $con->query($query1);
        return $stmt->fetchAll();
    }
    function performQuery($query1){
        $con = new PDO(DBINFO, DBUSER, DBPASS);
        $stmt = $con->prepare($query1);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

?>