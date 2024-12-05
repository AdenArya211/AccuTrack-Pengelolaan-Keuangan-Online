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
        
        .btn-tambah a, .btn-cetak a {
            text-decoration: none;
            color: white;
            background-color: #00b9ff;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 20px;
        }

        .btn-tambah a:hover, .btn-cetak a:hover {
            background-color: #007acc;
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
                    <li><a href="../dashboard.php">Beranda</a></li>
                    <li><a href="../laporan.php">Laporan Keuangan</a></li>
                    <li><a href="kelolauang.php">Kelola Keuangan</a></li>
                    <li><a href="../pendapatan/pendapatan.php">Pendapatan</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content">
        <h3>Kelola Keuangan</h3>
        <div class="btn-group">
            <button type="button" class="btn-tambah">
                <a href="/entry">Tambah Data</a>
            </button>
            <button type="button" class="btn-cetak">
                <a href="/cetak" target="_blank">Cetak Data</a>
            </button>
        </div>
        <table class="table-data">
            <thead>
                <tr>
                    <th scope="col" style="width: 25%">Rentang Tanggal</th>
                    <th scope="col" style="width: 15%">Kategori</th>
                    <th scope="col" style="width: 15%">Total</th>
                    <th scope="col" style="width: 25%">Keterangan</th>
                    <th scope="col" style="width: 15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pendapatan as $pt)
                <td>{{$pt->rentang_tanggal}}</td>
                <td>{{$pt->kategori}}</td>
                <td>{{$pt->total}}</td>
                <td>{{$pt->keterangan}}</td>
                <td><div class="btn-group">
            <button type="button" class="btn-edit">
                <a href="edit/{{$pt->id}}">Edit</a>
                <div class="btn-group">
            <button type="button" class="btn-hapus">
                <a href="/destroy/{{$pt->id}}">Hapus</a>
            </td>
                
            </tbody>
            @endforeach

        </table>
    </div>
</body>
</html>
