<?php
$host = "localhost";
$db   = "jwt_auth";
$user = "root";
$pass = "786786"; // usually empty on Ubuntu

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("DB Connection Failed");
}
?>
