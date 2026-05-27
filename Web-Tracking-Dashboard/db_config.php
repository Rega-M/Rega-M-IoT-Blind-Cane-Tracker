<?php
$host = "localhost";
$user = "root"; // Disamarkan untuk GitHub
$password = ""; // Disamarkan untuk GitHub
$database = "teknobli_gps_tracker";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>