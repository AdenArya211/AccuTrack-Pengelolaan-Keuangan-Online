<?php
session_start();

// Periksa apakah sesi login ada
if (!isset($_SESSION['username'])) {
    // Jika sesi tidak ada, redirect ke halaman login
    header("Location: login.php");
    exit();
}

include 'koneksi.php'; // Sertakan file koneksi database

// Query untuk menghitung total pemasukan
$queryTotalPendapatan = "SELECT SUM(total) AS total_pendapatan FROM tb_pendapatan";
$resultPendapatan = mysqli_query($koneksi, $queryTotalPendapatan);
$totalPendapatan = 0;

if ($resultPendapatan && mysqli_num_rows($resultPendapatan) > 0) {
    $dataPendapatan = mysqli_fetch_assoc($resultPendapatan);
    $totalPendapatan = $dataPendapatan['total_pendapatan'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - ACCUTRACK</title>
    <link rel="stylesheet" href="dashboard.css">
    <style>
        .widget {
            margin: 20px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #00796b;
            border-radius: 10px;
            width: 50%;
            text-align: center;
        }

        .widget h3 {
            margin: 0;
            font-size: 18px;
            color: #00796b;
        }

        .widget p {
            font-size: 24px;
            color: #333;
            margin: 10px 0 0;
        }

        .wrapper {
            max-width: 1200px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href="">ACCUTRACK</a></div>
            <div class="menu">
                <ul>
                    <li><a href="dashboard.php">Beranda</a></li>
                    <li><a href="laporan.php">Laporan Keuangan</a></li>
                    <li><a href="kelola/kelolauang.php">Kelola Keuangan</a></li>
                    <li><a href="pendapatan/pendapatan.php">Pendapatan</a></li>
                    <?php if (isset($_SESSION['username'])): ?>
                        <li><a href="logout.php" class="tbl-atas">Logout</a></li>
                    <?php else: ?>
                        <li><a href="register.php">Register</a></li>
                        <li><a href="login.php" class="tbl-atas">Login</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="wrapper">
        <section id="home">
            <img src="img/diagram.png">
            <div class="kolom">
                <p class="deskripsi"></p>
                <h2>SELAMAT DATANG DI ACCUTRACK</h2>
                <p>Kelola keuangan anda secara cepat dan akurat di ACCUTRACK</p>
            </div>
        </section>

        <!-- Widget Total Transaksi -->
        <div class="widget">
            <h3>Total Pendapatan Anda:</h3>
            <p>Rp <?php echo number_format($totalPendapatan, 0, ',', '.'); ?></p>
        </div>

        <div class="wrapper">
            <div class="footer">
                <div class="footer-section">
                    <h3>KELOLA KEUANGAN DENGAN CEPAT</h3>
                    <p>Solusi untuk mengelola keuangan secara cepat dan akurat tanpa kekhawatiran untuk kehilangan data dari pemasukan dan pengeluaran anda</p>
                </div>
                <div class="footer-section">
                    <h3>KETAHUI PEMASUKAN ANDA</h3>
                    <p>Ketahui pemasukan anda setiap minggu, bulan, bahkan tahun sesuai kategori anda. Mudah, Aman, dan Terpercaya.</p>
                </div>
                <div class="footer-section">
                    <h3>KONTAK KAMI</h3>
                    <p>Jl. Jagil Gambiran Pasuruan No.77</p>
                </div>
            </div>
        </div>
    </div>
    <div id="copyright">
        <div class="wrapper">
            &copy;2024.<b>ACCUTRACK.</b>All Right Reserved.
        </div>
    </div>
</body>
</html>
