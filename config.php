<?php

$server = "localhost";
$user = "root";
$pass = "";
$dbname = "jul_kuliah";

$conn = mysqli_connect($server,$user,$pass,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
?>