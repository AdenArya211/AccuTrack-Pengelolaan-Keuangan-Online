<?php
include '../koneksi.php'; // Sertakan koneksi database

// Ambil data berdasarkan ID dari URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM tb_pendapatan WHERE id = $id";
    $result = mysqli_query($koneksi, $query);

    // Jika data ditemukan, simpan dalam variabel
    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Data tidak ditemukan!');window.location='kelolauang.php';</script>";
        exit();
    }
}

// Proses update data jika form disubmit
if (isset($_POST['update'])) {
    $rentang_tanggal = mysqli_real_escape_string($koneksi, $_POST['rentang_tanggal']);
    $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);
    $total = mysqli_real_escape_string($koneksi, $_POST['total']);
    $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);

    // Query untuk update data
    $query = "UPDATE tb_pendapatan 
              SET rentang_tanggal = '$rentang_tanggal', 
                  kategori = '$kategori', 
                  total = '$total', 
                  keterangan = '$keterangan' 
              WHERE id = $id";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data berhasil diperbarui!');window.location='kelolauang.php';</script>";
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
    <title>Edit Data Keuangan - ACCUTRACK</title>
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

        .btn-update {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #00796b;
            color: white;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn-update:hover {
            background-color: #00b9ff;
        }

        .btn-back {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: white;
            background-color: #f44336;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .btn-back:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <div class="home-content">
        <h3>Edit Data Keuangan</h3>
        <div class="form-login">
            <form action="" method="post">
                <label for="rentang_tanggal">Rentang Tanggal</label>
                <input class="input" type="text" name="rentang_tanggal" id="rentang_tanggal" value="<?php echo htmlspecialchars($data['rentang_tanggal']); ?>" required />

                <label for="kategori">Kategori</label>
                <select class="input" name="kategori" id="kategori" required>
                    <option value="Pemasukan" <?php echo $data['kategori'] == 'Pemasukan' ? 'selected' : ''; ?>>Pemasukan</option>
                    <option value="Pengeluaran" <?php echo $data['kategori'] == 'Pengeluaran' ? 'selected' : ''; ?>>Pengeluaran</option>
                </select>

                <label for="total">Total</label>
                <input class="input" type="number" name="total" id="total" value="<?php echo htmlspecialchars($data['total']); ?>" step="0.01" required />

                <label for="keterangan">Keterangan</label>
                <input class="input" type="text" name="keterangan" id="keterangan" value="<?php echo htmlspecialchars($data['keterangan']); ?>" />

                <button type="submit" class="btn btn-update" name="update">Perbarui</button>
            </form>
            <a href="kelolauang.php" class="btn-back">Kembali</a>
        </div>
    </div>
</body>
</html>
