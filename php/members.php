<?php
include "../connection.php"; // Include the script that establishes the database connection

if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    $sql = "SELECT * FROM drivers ORDER BY id ASC";
    $res = mysqli_query($conn, $sql); // Use the database connection variable ($conn)
} else {
    header("Location: index.php");
}
?>
