<?php
include '../koneksi.php'; // Sertakan koneksi database

// Proses pengambilan data untuk diedit
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM tb_pendapatann WHERE id = $id";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        $bulan = $data['bulan'];
        $total = $data['total'];
        $keterangan = $data['keterangan'];
    } else {
        echo "<script>alert('Data tidak ditemukan!');window.location='pendapatan.php';</script>";
        exit;
    }
}

// Proses update data jika form disubmit
if (isset($_POST['update'])) {
    $bulan = mysqli_real_escape_string($koneksi, $_POST['bulan']);
    $total = mysqli_real_escape_string($koneksi, $_POST['total']);
    $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);

    $query = "UPDATE tb_pendapatann 
              SET bulan = '$bulan', total = '$total', keterangan = '$keterangan'
              WHERE id = $id";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data berhasil diperbarui!');window.location='pendapatan.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pendapatan - ACCUTRACK</title>
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
        <h3>Edit Data Pendapatan</h3>
        <div class="form-login">
            <form action="" method="post">
                <label for="bulan">Bulan</label>
                <input class="input" type="text" name="bulan" id="bulan" placeholder="Contoh: Januari 2024" value="<?php echo $bulan; ?>" required />

                <label for="total">Total Pendapatan (Rp)</label>
                <input class="input" type="number" name="total" id="total" placeholder="Contoh: 20000000" value="<?php echo $total; ?>" step="0.01" required />

                <label for="keterangan">Keterangan</label>
                <input class="input" type="text" name="keterangan" id="keterangan" placeholder="Contoh: Pendapatan dari penjualan produk utama" value="<?php echo $keterangan; ?>" />

                <button type="submit" class="btn btn-simpan" name="update">Simpan</button>
            </form>
            <a href="pendapatan.php" class="btn-back">Kembali</a>
        </div>
    </div>
</body>
</html>
