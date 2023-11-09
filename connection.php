<?php 
    $servername = "localhost";
    $username = "root";
    $password = "123456";
    $database = "database_app";
    $conn = new mysqli($servername, $username, $password, $database, 3306);
    if($conn->connect_error){
        die("Connection failed".$conn->connect_error);
    }
    echo "";
    return $conn;
    
    ?>