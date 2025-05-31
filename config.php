<?php
$host = "localhost";
$user = "root";
$pass = ""; // sesuaikan jika pakai password
$db = "xkulin";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>