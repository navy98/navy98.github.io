<?php 
    $host = 'localhost';
    $name = 'root';
    $dbname = 'warnasol';
    $dbpass = '';

    $con = mysqli_connect($host,$name,$dbpass,$dbname);

    if (!$con){
        die("Database tidak di temukan". mysqli_connect_error());
    }


?>