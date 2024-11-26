<?php
include('../koneksi.php');
require_once("../dompdf/autoload.inc.php");

use Dompdf\Dompdf;

// Inisialisasi Dompdf
$dompdf = new Dompdf();

// Query untuk mengambil data dari database
$query = mysqli_query($koneksi, "SELECT * FROM tb_pendapatan");

// Awal pembuatan HTML
$html = '<center><h3>Data Laporan Keuangan</h3></center><hr/><br>';
$html .= '<table border="1" width="100%" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Rentang Tanggal</th>
                    <th>Kategori</th>
                    <th>Total</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>';

$no = 1;
while ($transaction = mysqli_fetch_assoc($query)) {
    $html .= "<tr>
                <td>" . $no . "</td>
                <td>" . htmlspecialchars($transaction['rentang_tanggal']) . "</td>
                <td>" . htmlspecialchars($transaction['kategori']) . "</td>
                <td>Rp. " . number_format($transaction['total'], 2, ',', '.') . "</td>
                <td>" . htmlspecialchars($transaction['keterangan']) . "</td>
              </tr>";
    $no++;
}
$html .= "</tbody></table>";

// Memuat HTML ke Dompdf
$dompdf->loadHtml($html);

// Menentukan ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'portrait');

// Rendering dari HTML ke PDF
$dompdf->render();

// Output file PDF
$dompdf->stream('laporan-keuangan.pdf', ["Attachment" => false]);
?>
