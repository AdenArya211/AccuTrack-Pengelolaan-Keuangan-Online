<?php
include '../koneksi.php'; // Sertakan koneksi database

// Proses simpan data jika form disubmit
if (isset($_POST['simpan'])) {
    $bulan = mysqli_real_escape_string($koneksi, $_POST['bulan']);
    $total = mysqli_real_escape_string($koneksi, $_POST['total']);
    $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);

    // Query untuk menyimpan data ke tabel tb_pendapatan
    $query = "INSERT INTO tb_pendapatann (bulan, total, keterangan) 
              VALUES ('$bulan', '$total', '$keterangan')";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data berhasil ditambahkan!');window.location='pendapatan.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pendapatan - ACCUTRACK</title>
    <style>
        .home-content {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #00796b;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        h3 {
            text-align: center;
            color: #00796b;
            margin-bottom: 20px;
        }

        .form-login {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .form-login label {
            font-weight: bold;
            color: #00796b;
        }

        .form-login .input {
            padding: 10px;
            border: 1px solid #00796b;
            border-radius: 5px;
        }

        .btn-simpan {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #00b9ff;
            color: white;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn-simpan:hover {
            background-color: #00b9ff;
        }

        .btn-back {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: white;
            background-color: #00b9ff;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .btn-back:hover {
            background-color: #00b9ff;
        }
    </style>
</head>
<body>
    <div class="home-content">
        <h3>Tambah Data Pendapatan</h3>
        <div class="form-login">
            <form action="" method="post">
                <label for="bulan">Bulan</label>
                <input class="input" type="text" name="bulan" id="bulan" placeholder="Contoh: Januari 2024" required />

                <label for="total">Total Pendapatan (Rp)</label>
                <input class="input" type="number" name="total" id="total" placeholder="Contoh: 20000000" step="0.01" required />

                <label for="keterangan">Keterangan</label>
                <input class="input" type="text" name="keterangan" id="keterangan" placeholder="Contoh: Pendapatan dari penjualan produk utama" />

                <button type="submit" class="btn btn-simpan" name="simpan">Simpan</button>
            </form>
            <a href="pendapatan.php" class="btn-back">Kembali</a>
        </div>
    </div>
</body>
</html>
