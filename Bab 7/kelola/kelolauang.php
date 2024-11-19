<?php
include '../koneksi.php'; // Sertakan koneksi database
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Keuangan - ACCUTRACK</title>
    <link rel="stylesheet" href="kelolauang.css">
    <style>
        /* CSS khusus untuk tabel laporan keuangan */
        .content {
            width: 90%;
            margin: 50px auto;
        }
        
        .content h3 {
            color: #00796b;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .btn-tambah a {
            text-decoration: none;
            color: white;
            background-color: #00796b;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 20px;
        }

        .btn-tambah a:hover {
            background-color: #00b9ff;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 50px;
        }

        table, th, td {
            border: 1px solid #00796b;
        }
        
        table th, table td {
            padding: 15px;
            text-align: left;
        }
        
        table thead {
            background-color: #00b9ff;
            color: white;
        }
        
        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        table tbody tr:hover {
            background-color: #e0f7fa;
        }
        
        .btn-edit, .btn-hapus {
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            color: white;
        }
        
        .btn-edit {
            background-color: #4caf50;
        }
        
        .btn-hapus {
            background-color: #f44336;
        }
        
        .btn-edit:hover {
            background-color: #00eaff;
        }
        
        .btn-hapus:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href="dashboard.php">ACCUTRACK</a></div>
            <div class="menu">
                <ul>
                    <li><a href="BAB 5/dashboard.php">Beranda</a></li>
                    <li><a href=".../laporan.php">Laporan Keuangan</a></li>
                    <li><a href="kelola/kelolauang.php">Kelola Keuangan</a></li>
                    <li><a href=".../pendapatan.php">Pendapatan</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content">
        <h3>Kelola Keuangan</h3>
        <button type="button" class="btn-tambah">
            <a href="kelolauang-entry.php">Tambah Data</a>
        </button>
        <table class="table-data">
            <thead>
                <tr>
                    <th scope="col" style="width: 25%">Rentang Tanggal</th>
                    <th scope="col" style="width: 15%">Kategori</th>
                    <th scope="col" style="width: 20%">Total</th>
                    <th scope="col" style="width: 30%">Keterangan</th>
                    <th scope="col" style="width: 10%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Query untuk mengambil data dari tabel tb_pendapatan
                $query = "SELECT * FROM tb_pendapatan ORDER BY created_at DESC";
                $result = mysqli_query($koneksi, $query);

                // Jika tidak ada data, tampilkan pesan "Data Kosong"
                if (mysqli_num_rows($result) == 0) {
                    echo "
                    <tr>
                        <td colspan='5' align='center'>
                            Data Kosong
                        </td>
                    </tr>
                    ";
                }

                // Looping untuk menampilkan data
                while ($data = mysqli_fetch_assoc($result)) {
                    echo "
                    <tr>
                        <td>{$data['rentang_tanggal']}</td>
                        <td>{$data['kategori']}</td>
                        <td>Rp " . number_format($data['total'], 2, ',', '.') . "</td>
                        <td>{$data['keterangan']}</td>
                        <td>
                            <a class='btn-edit' href='kelolauang-edit.php?id={$data['id']}'>
                                Edit
                            </a> | 
                            <a class='btn-hapus' href='kelolauang-hapus.php?id={$data['id']}'>
                                Hapus
                            </a>
                        </td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
