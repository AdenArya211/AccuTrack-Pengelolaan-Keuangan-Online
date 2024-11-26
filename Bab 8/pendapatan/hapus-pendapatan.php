<?php
include '../koneksi.php';
$id = $_GET['id'];

$query = "DELETE FROM tb_pendapatann WHERE id = $id";
if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Data berhasil dihapus!');window.location='pendapatan.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data!');</script>";
}
?>
