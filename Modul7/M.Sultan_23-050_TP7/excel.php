<?php
include 'config.php';

// Header untuk download Excel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan_Penjualan.xls");

// Ambil tanggal dari GET
$tgl_awal  = $_GET['tgl_awal'] ?? '';
$tgl_akhir = $_GET['tgl_akhir'] ?? '';
?>

<!-- Judul dan Periode -->
<table border="0" cellspacing="0" cellpadding="5">
    <tr><td colspan="3" style="font-weight:bold; font-size:14pt;">Rekap Laporan Penjualan</td></tr>
    <?php
    if ($tgl_awal != "" && $tgl_akhir != "") {
        // Format tanggal lengkap: 01-Jan-2025
        $tgl_awal_formatted  = date("d-M-Y", strtotime($tgl_awal));
        $tgl_akhir_formatted = date("d-M-Y", strtotime($tgl_akhir));
        echo "<tr><td colspan='3'>Dari: $tgl_awal_formatted Sampai: $tgl_akhir_formatted</td></tr>";
    } else {
        echo "<tr><td colspan='3'>Semua Periode</td></tr>";
    }
    ?>
    <tr><td colspan="3" style="border-bottom:1px solid #000;">&nbsp;</td></tr>
</table>

<!-- Tabel Data Penjualan -->
<table border="1" cellspacing="0" cellpadding="5" style="border-collapse:collapse;">
    <tr style="background:#d9edf7; font-weight:bold; text-align:center;">
        <th>No</th>
        <th>Total</th>
        <th>Tanggal</th>
    </tr>

<?php
// Query data penjualan berdasarkan filter tanggal jika ada
if ($tgl_awal != "" && $tgl_akhir != "") {
    $query = "
        SELECT tanggal, SUM(total) AS total_harian 
        FROM transaksi
        WHERE tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir'
        GROUP BY tanggal
        ORDER BY tanggal ASC
    ";
} else {
    $query = "
        SELECT tanggal, SUM(total) AS total_harian 
        FROM transaksi
        GROUP BY tanggal
        ORDER BY tanggal ASC
    ";
}

$q = mysqli_query($conn, $query);

$no = 1;
$total_pendapatan = 0;
$jumlah_hari = mysqli_num_rows($q);

while ($row = mysqli_fetch_assoc($q)) {
    // Format tanggal ke format 01-Jan-2025
    $tanggal_terformat = date("d-M-Y", strtotime($row['tanggal']));
    
    // Format total penjualan
    $total_terformat = 'RP. ' . number_format($row['total_harian'], 0, ',', '.');
    
    echo "
    <tr>
        <td style='text-align:center;'>$no</td>
        <td style='text-align:right;'>$total_terformat</td>
        <td style='text-align:center;'>$tanggal_terformat</td>
    </tr>";
    
    $total_pendapatan += $row['total_harian'];
    $no++;
}

// Hitung jumlah pelanggan (hardcode sementara)
$jumlah_pelanggan = 6;
$total_pendapatan_formatted = 'RP. ' . number_format($total_pendapatan, 0, ',', '.');
?>

</table>

<br>

<!-- Rekap Total -->
<table border="0" cellspacing="0" cellpadding="5">
    <tr style="font-weight:bold;">
        <td>Jumlah Pelanggan</td>
        <td>Jumlah Pendapatan</td>
    </tr>
    <tr style="font-weight:bold;">
        <td><?= $jumlah_pelanggan ?> Orang</td>
        <td><?= $total_pendapatan_formatted ?></td>
    </tr>
</table>