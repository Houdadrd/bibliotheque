<?php
$servername = "localhost";
$username = "root";
$password = "200406KH30TARIK";
$dbname = "LIB";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
