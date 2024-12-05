<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Keuangan - ACCUTRACK</title>
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

        .form-login input[type="file"] {
            padding: 5px;
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
        <h3>Tambah Data Keuangan</h3>
        <div class="form-login">
            <form action="/store" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <label for="rentang_tanggal">Rentang Tanggal</label>
                <input class="input" type="text" name="rentang_tanggal" id="rentang_tanggal" placeholder="Contoh: 1 Januari - 10 Januari 2024" required />

                <label for="kategori">Kategori</label>
                <select class="input" name="kategori" id="kategori" required>
                    <option value="Pemasukan">Pemasukan</option>
                    <option value="Pengeluaran">Pengeluaran</option>
                </select>

                <label for="total">Total</label>
                <input class="input" type="number" name="total" id="total" placeholder="Contoh: 20000000" step="0.01" required />

                <label for="keterangan">Keterangan</label>
                <input class="input" type="text" name="keterangan" id="keterangan" placeholder="Contoh: Pendapatan dari penjualan produk utama" />

                <button type="submit" class="btn btn-simpan" name="simpan">Simpan</button>
            </form>
            <a href="kelolauang.php" class="btn-back">Kembali</a>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\Kuliah S1\Semester 3\Praktikum\PEMWEB\TUGAS\Bab 9\accutrack\resources\views/kelola/entry.blade.php ENDPATH**/ ?>