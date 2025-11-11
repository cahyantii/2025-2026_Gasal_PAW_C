<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Transaksi Barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white text-center">
                <h3>Sistem Transaksi Barang</h3>
            </div>
            <div class="card-body text-center">
                <p class="lead">Selamat datang di aplikasi Sistem Transaksi Barang</p>
                <p>Gunakan menu di bawah ini untuk mengelola data:</p>

                <div class="d-grid gap-3 col-md-4 mx-auto">
                    <a href="barangg.php" class="btn btn-outline-primary">Kelola Data Barang</a>
                    <a href="transaksi.php" class="btn btn-outline-success">Kelola Transaksi</a>
                </div>
            </div>
            <div class="card-footer text-center text-muted">
                <small>Modul 6 - Pengelolaan Master Detail Data | © 2025</small>
            </div>
        </div>
    </div>

</body>
</html>