<?php
include '../koneksi.php'; // Sertakan koneksi database
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendapatan</title>
    <link rel="stylesheet" href="pendapatan.css">
    <style>
        /* Tambahkan CSS untuk tombol */
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-tambah {
            text-decoration: none;
            color: white;
            background-color: #00b9ff;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 20px;
        }

        .btn-tambah:hover {
            background-color: #0056b3;
        }

        .btn-edit {
            background-color: #28a745;
        }

        .btn-edit:hover {
            background-color: #218838;
        }

        .btn-hapus {
            background-color: #dc3545;
        }

        .btn-hapus:hover {
            background-color: #c82333;
        }

        /* CSS untuk tabel */
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #00b9ff;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href="">ACCUTRACK</a></div>
            <div class="menu">
                <ul>
                    <li><a href="../dashboard.php">Beranda</a></li>
                    <li><a href="../laporan.php">Laporan Keuangan</a></li>
                    <li><a href="../kelola/kelolauang.php">Kelola Keuangan</a></li>
                    <li><a href="pendapatan.php">Pendapatan</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <h2 style="text-align: center;">Pendapatan Bulanan</h2>
    <section class="content">
        <a href="entry-pendapatan.php" class="btn btn-tambah">Tambah Data</a>
        <table>
            <thead>
                <tr>
                    <th>Bulan</th>
                    <th>Total Pendapatan</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM tb_pendapatann ORDER BY created_at DESC";
                $result = mysqli_query($koneksi, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['bulan']}</td>
                                <td>Rp " . number_format($row['total'], 2, ',', '.') . "</td>
                                <td>{$row['keterangan']}</td>
                                <td>
                                    <a href='edit-pendapatan.php?id={$row['id']}' class='btn btn-edit'>Edit</a>
                                    <a href='hapus-pendapatan.php?id={$row['id']}' class='btn btn-hapus' onclick=\"return confirm('Yakin ingin menghapus data ini?')\">Hapus</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' style='text-align:center;'>Data Kosong</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </section>
</body>
</html>