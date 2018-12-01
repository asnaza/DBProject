<?php
$servername = "localhost";
$username = "asna";
$password = "asna";
$dbname = "AsnaTable";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
