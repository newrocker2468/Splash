<?php

// ServerName, UserName, Password, Database Name
$server = "localhost";
$username = "root";
$password = "";
$database = "splash";

$conn = mysqli_connect($server, $username, $password, $database);

if(!$conn) {
    die("MySQLI Connection Error. Please Try Again Later");
}