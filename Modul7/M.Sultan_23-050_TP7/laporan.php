<?php
include 'config.php';

$tgl_awal  = $_GET['tgl_awal'] ?? '';
$tgl_akhir = $_GET['tgl_akhir'] ?? '';

// Query transaksi per tanggal
if ($tgl_awal != "" && $tgl_akhir != "") {
    $sql = "
        SELECT tanggal, SUM(total) AS total_harian
        FROM transaksi
        WHERE tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir'
        GROUP BY tanggal
        ORDER BY tanggal ASC
    ";
} else {
    $sql = "
        SELECT tanggal, SUM(total) AS total_harian
        FROM transaksi
        GROUP BY tanggal
        ORDER BY tanggal ASC
    ";
}

$q = mysqli_query($conn, $sql);

$dataTanggal = [];
$dataTotal   = [];
$totalPendapatan = 0;

while ($row = mysqli_fetch_assoc($q)) {
    $dataTanggal[] = $row['tanggal'];
    $dataTotal[]   = $row['total_harian'];
    $totalPendapatan += $row['total_harian'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        @media print {
            .no-print { display: none !important; }
        }
    </style>
</head>
<body>
<div class="container" style="margin-top:20px;">

    <!-- FORM FILTER TANGGAL -->
    <div class="no-print">
        <form method="GET">
            <div class="row">
                <div class="col-md-3">
                    <label>Dari Tanggal</label>
                    <input type="date" name="tgl_awal" class="form-control" value="<?= $tgl_awal ?>">
                </div>
                <div class="col-md-3">
                    <label>Sampai Tanggal</label>
                    <input type="date" name="tgl_akhir" class="form-control" value="<?= $tgl_akhir ?>">
                </div>
                <div class="col-md-3">
                    <br>
                    <button class="btn btn-primary" style="margin-top:6px;">Tampilkan</button>
                </div>
            </div>
        </form>

        <br>

        <!-- Tombol aksi -->
        <a href="index.php" class="btn btn-primary">⬅ Kembali</a>
        <button class="btn btn-warning" onclick="window.print()">🖨 Cetak</button>
        <a href="excel.php?tgl_awal=<?= $tgl_awal ?>&tgl_akhir=<?= $tgl_akhir ?>" class="btn btn-success">⬇ Excel</a>
        <br><br>
    </div>

    <!-- Grafik -->
    <canvas id="grafik" height="100"></canvas>
    <script>
        new Chart(document.getElementById('grafik'), {
            type: 'bar',
            data: {
                labels: <?= json_encode($dataTanggal) ?>,
                datasets: [{
                    label: 'Total Penjualan',
                    data: <?= json_encode($dataTotal) ?>,
                    backgroundColor: 'rgba(0,0,0,0.2)',
                    borderColor: 'black',
                    borderWidth: 1
                }]
            }
        });
    </script>

    <br><br>

    <!-- Rekap Tabel -->
    <table class="table table-bordered">
        <thead style="background:#e1eef7;">
            <tr>
                <th>No</th>
                <th>Total</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
        <?php for($i=0; $i<count($dataTanggal); $i++): ?>
            <tr>
                <td><?= $i+1 ?></td>
                <td>Rp <?= number_format($dataTotal[$i],0,',','.') ?></td>
                <td><?= date("d-M-Y", strtotime($dataTanggal[$i])) ?></td>
            </tr>
        <?php endfor; ?>
        </tbody>
    </table>

    <!-- TOTAL -->
    <div class="row">
        <div class="col-md-3" style="background:#e1eef7; padding:20px;">
            <b>Jumlah Pelanggan</b>
            <h3><?= mysqli_num_rows($q) ?> Transaksi</h3>
        </div>

        <div class="col-md-3" style="background:#e1eef7; padding:20px; margin-left:10px;">
            <b>Jumlah Pendapatan</b>
            <h3>Rp <?= number_format($totalPendapatan,0,',','.') ?></h3>
        </div>
    </div>
</div>
</body>
</html>