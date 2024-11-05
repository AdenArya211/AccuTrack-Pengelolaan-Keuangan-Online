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
        
        .content h2 {
            color: #00796b; 
            margin-bottom: 20px; 
            text-align: center; 
        }
        
        table {
            width: 100%; 
            border-collapse: collapse; 
            margin-bottom: 50px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
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
            transition: background-color 0.3s ease-in-out;
        }
        
        table tbody td {
            color: #00796b; 
        }
        
        
        .btn-edit, .btn-hapus {
            padding: 8px 12px; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer; 
            margin-right: 10px; 
            font-size: 0.9em; 
            transition: background-color 0.3s;
        }
        
        .btn-edit {
            background-color: #4caf50; 
            color: white; 
        }
        
        .btn-hapus {
            background-color: #f44336; 
            color: white; 
        }
        
        .btn-edit:hover {
            background-color: #00eaff; 
        }
        
        .btn-hapus:hover {
            background-color: #d32f2f; 
        }

        /* CSS untuk modal popup konfirmasi */
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1000; 
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); 
            justify-content: center; 
            align-items: center; 
        }
        
        .modal-content {
            background-color: white; 
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }

        .modal-content h3 {
            margin-bottom: 20px;
            color: #00796b;
        }

        .modal-content .btn-confirm, .modal-content .btn-cancel {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9em;
            margin: 5px;
        }

        .btn-confirm {
            background-color: #4caf50;
            color: white;
        }

        .btn-cancel {
            background-color: #f44336;
            color: white;
        }

        .btn-confirm:hover {
            background-color: #00eaff;
        }

        .btn-cancel:hover {
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
                    <li><a href="dashboard.php">Beranda</a></li>
                    <li><a href="laporan.php">Laporan Keuangan</a></li>
                    <li><a href="kelolauang.php">Kelola Keuangan</a></li>
                    <li><a href="pendapatan.php">Pendapatan</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <h2 style="text-align: center;">KELOLA KEUANGAN ANDA</h2>
    <section class="content">
        <table>
            <thead>
                <tr>
                    <th>Rentang Tanggal</th>
                    <th>Kategori</th>
                    <th>Total</th>
                    <th>Keterangan</th>
                    <th>Aksi</th> 
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1 Januari - 10 Januari 2024</td>
                    <td>Pemasukan</td>
                    <td>Rp 20.000.000</td>
                    <td>Pendapatan dari penjualan produk utama</td>
                    <td>
                        <button class="btn-edit">Edit</button>
                        <button class="btn-hapus">Hapus</button>
                    </td>
                </tr>
                <!-- Baris lainnya -->
            </tbody>
        </table>
    </section>

    <!-- Modal konfirmasi hapus -->
    <div id="modalHapus" class="modal">
        <div class="modal-content">
            <h3>Apakah Anda yakin ingin menghapus item ini?</h3>
            <button class="btn-confirm">Ya</button>
            <button class="btn-cancel">Batal</button>
        </div>
    </div>

    <script>
        // Fungsi untuk membuka dan menutup modal
        const hapusButtons = document.querySelectorAll('.btn-hapus');
        const modal = document.getElementById('modalHapus');
        const btnConfirm = document.querySelector('.btn-confirm');
        const btnCancel = document.querySelector('.btn-cancel');
        
        let currentRow;

        hapusButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Mencegah aksi default tombol
                currentRow = this.closest('tr'); // Mendapatkan baris terkait
                modal.style.display = 'flex'; // Menampilkan modal
            });
        });

        // Menghapus baris jika pengguna menekan "Ya"
        btnConfirm.addEventListener('click', function() {
            if (currentRow) {
                currentRow.remove(); // Menghapus baris dari tabel
                alert('Item berhasil dihapus.');
            }
            modal.style.display = 'none'; // Menutup modal
        });

        // Menutup modal jika pengguna menekan "Batal"
        btnCancel.addEventListener('click', function() {
            modal.style.display = 'none'; // Menutup modal
        });

        // Menutup modal jika pengguna mengklik area luar modal
        window.addEventListener('click', function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        });
    </script>
</body>
</html>
