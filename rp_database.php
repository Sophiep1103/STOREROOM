<?php

$servername = "localhost";
$username = "root";
$password = "123456";
$database = "database_app";

$mysqli  = new mysqli($servername, $username, $password, $database, 3306);
                     
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;