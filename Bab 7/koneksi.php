<?php
// koneksi.php
$host = "localhost";
$user = "root"; // Ganti jika user berbeda
$password = ""; // Ganti jika ada password
$database = "db_accutrack";

$koneksi = mysqli_connect($host, $user, $password, $database);

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>
