<?php
$servername = "localhost";
$username = "root";
$password = "Aa123456";
$dbname = "sofraninsultanlari";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($conn,"utf8");

?>