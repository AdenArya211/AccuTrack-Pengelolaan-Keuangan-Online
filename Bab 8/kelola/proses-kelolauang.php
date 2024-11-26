<?php
include 'koneksi.php'; // Sertakan koneksi database

// Proses tambah data jika form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rentang_tanggal = mysqli_real_escape_string($koneksi, $_POST['rentang_tanggal']);
    $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);
    $total = mysqli_real_escape_string($koneksi, $_POST['total']);
    $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);

    $query = "INSERT INTO tb_pendapatan (rentang_tanggal, kategori, total, keterangan) 
              VALUES ('$rentang_tanggal', '$kategori', '$total', '$keterangan')";
    
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data berhasil ditambahkan!');window.location='kelolauang.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data!');</script>";
    }
}
?>