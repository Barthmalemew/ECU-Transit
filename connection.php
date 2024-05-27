<?php

$sname = "localhost";
$uname = "root";
$password = "832506";
$db_name = "Transit_Drivers";

// Attempt to establish connection
$conn = mysqli_connect($sname, $uname, $password, $db_name);

// Check connection
if (!$conn) {
    // Connection failed, display error message and exit
    die("Connection failed: " . mysqli_connect_error());
}

?>
