<?php
include '../koneksi.php'; // Sertakan koneksi database

// Periksa apakah ID ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data berdasarkan ID
    $query = "DELETE FROM tb_pendapatan WHERE id = $id";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data berhasil dihapus!');window.location='kelolauang.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data: " . mysqli_error($koneksi) . "');window.location='kelolauang.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan!');window.location='kelolauang.php';</script>";
}
?>
