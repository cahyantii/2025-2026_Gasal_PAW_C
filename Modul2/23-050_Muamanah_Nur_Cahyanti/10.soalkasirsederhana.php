<?php

// Daftar menu dan harga
$menu = [
    "1" => ["nama" => "Nasi Goreng", "harga" => 15000],
    "2" => ["nama" => "Mie Goreng", "harga" => 12000],
    "3" => ["nama" => "Ayam Geprek", "harga" => 18000],
    "4" => ["nama" => "Es Teh", "harga" => 5000],
    "5" => ["nama" => "Es Jeruk", "harga" => 6000]
];

// Inisialisasi
$total = 0;
$message = "";
$finished = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Gunakan null-coalescing untuk menghindari undefined index
    $pilihan = $_POST['pilihan'] ?? '';
    $jumlah  = isset($_POST['jumlah']) ? (int) $_POST['jumlah'] : 0;
    $lanjut  = $_POST['lanjut'] ?? 'ya';
    // total dikirim sebagai hidden field; jika tidak ada, default 0
    $total   = isset($_POST['total']) ? (int) $_POST['total'] : 0;

    // Validasi input sebelum memproses
    if ($pilihan !== '' && isset($menu[$pilihan]) && $jumlah > 0) {
        $nama     = htmlspecialchars($menu[$pilihan]['nama']);
        $harga    = $menu[$pilihan]['harga'];
        $subtotal = $harga * $jumlah;
        $total   += $subtotal;

        $message .= "<b>Pesanan:</b> $nama x $jumlah = Rp " . number_format($subtotal, 0, ',', '.') . "<br>";
        $message .= "<b>Total sementara:</b> Rp " . number_format($total, 0, ',', '.') . "<hr>";
    } else {
        $message .= "<b style='color:red'>Input tidak valid. Pilih menu yang benar dan jumlah >= 1.</b><hr>";
    }

    if ($lanjut === "tidak") {
        $finished = true;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sistem Kasir Sederhana</title>
</head>
<body>
    <h2>Sistem Kasir Sederhana</h2>

    <b>Daftar Menu:</b><br>
    <?php foreach ($menu as $key => $item): ?>
        <?= $key . ". " . htmlspecialchars($item['nama']) . " - Rp " . number_format($item['harga'], 0, ',', '.') ?><br>
    <?php endforeach; ?>
    <hr>

    <!-- Pesan (subtotal / total sementara / error) -->
    <?= $message ?>

    <?php if ($finished): ?>
        <!-- Tampilan akhir -->
        <h3> Total yang harus dibayar: Rp <?= number_format($total,0,',','.') ?></h3>
        <h4>Terima kasih telah mampir di kedai kami </h4>
        <p><a href="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">Mulai pesanan baru</a></p>
    <?php else: ?>
        <!-- Form input (tampil selama belum selesai) -->
        <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            Pilih menu (nomor): 
            <input type="number" name="pilihan" min="1" max="<?= count($menu) ?>" required><br>
            Jumlah porsi: 
            <input type="number" name="jumlah" min="1" required><br>
            <input type="hidden" name="total" value="<?= (int)$total ?>">
            Apakah ingin menambah pesanan lagi?
            <select name="lanjut">
                <option value="ya">Ya</option>
                <option value="tidak">Tidak</option>
            </select><br><br>
            <input type="submit" value="Proses">
        </form>
    <?php endif; ?>
</body>
</html>
