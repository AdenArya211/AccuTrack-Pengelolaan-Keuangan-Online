<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bulan = mysqli_real_escape_string($koneksi, $_POST['bulan']);
    $total = mysqli_real_escape_string($koneksi, $_POST['total']);
    $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);

    $query = "INSERT INTO tb_pendapatann (bulan, total, keterangan) VALUES ('$bulan', '$total', '$keterangan')";
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data berhasil ditambahkan!');window.location='pendapatan.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data!');</script>";
    }
}
?>
