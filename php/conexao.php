<?php
$servername = "localhost";
$username = "root";
$password = "root";
$bd = "meuestoque";

$servername = "localhost";
$username = "root";
$password = "root";
$banco = "meuestoque";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $banco);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
?>