<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// connect to database
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "temp";

$conn = mysqli_connect($host, $user, $pass, $dbname) or die("can not connect to DB");
mysqli_set_charset($conn, "utf8");
/* if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully";
} */
