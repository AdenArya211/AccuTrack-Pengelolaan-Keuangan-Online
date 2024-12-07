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
            <form action="/update/{{$data->id}}" method="post">
                @csrf
                <label for="rentang_tanggal">Rentang Tanggal</label>
                <input class="input" type="text" name="rentang_tanggal" id="rentang_tanggal" value="{{$data->rentang_tanggal}}";

                <label for="kategori">Kategori</label>
                <select class="input" name="kategori" id="kategori" required>
                    <option value="Pemasukan" >Pemasukan</option>
                    <option value="Pengeluaran" >Pengeluaran</option>
                </select>

                <label for="total">Total</label>
                <input class="input" type="number" name="total" id="total" value="{{$data->total}}" step="0.01" required />

                <label for="keterangan">Keterangan</label>
                <input class="input" type="text" name="keterangan" id="keterangan" value="{{$data->keterangan}}" />

                <button type="submit" class="btn btn-update" name="update">Perbarui</button>
            </form>
            <a href="kelolauang.php" class="btn-back">Kembali</a>
        </div>
    </div>
</body>
</html>
