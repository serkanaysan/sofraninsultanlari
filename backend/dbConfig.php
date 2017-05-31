<?php
$servername = "94.73.148.62";
$username = "user016AF2";
$password = "THoh72G0";
$dbname = "db016AF2";


/*
$servername = "localhost";
$username = "root";
$password = "Aa123456";
$dbname = "sofraninsultanlari";*/





// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($conn,"utf8");

?>