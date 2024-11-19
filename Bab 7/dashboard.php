<?php
session_start();

// Periksa apakah sesi login ada
if (!isset($_SESSION['username'])) {
    // Jika sesi tidak ada, redirect ke halaman login
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="dashboard.css">
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
                    <li><a href="pendapatan.php">Pendapatan</a></li>
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
                <p>Kelola keuangan anda secara cepat dan akurat di accutrack </p>
                <p><a href="login.php" class="tbl-bawah">Masuk atau Mendaftar</a></p>
            </div>
        </section>
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
                    <p>Jl.Jagil Gambiran Pasuruan No.77</p>
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
