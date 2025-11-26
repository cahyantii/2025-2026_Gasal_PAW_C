<?php
session_start();

// cek apakah user sudah login
if (!isset($_SESSION['username']) || !isset($_SESSION['level'])) {
    header("Location: login.php");
    exit;
}

$level = (int)$_SESSION['level'];
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistem Penjualan</title>
    <style>
        .navbar {
            background: #0059b3;
            padding: 10px;
            color: white;
        }
        .navbar a {
            margin-right: 20px;
            color: white;
            text-decoration: none;
        }
        .right {
            float: right;
        }
        .content {
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="navbar">
    <b>Sistem Penjualan</b> &nbsp;&nbsp;

    <?php if ($level === 1) : ?>
        <!-- Menu untuk Admin -->
        <a href="index.php">Home</a>
        <a href="../modul6/barangg.php">Data Master</a>
        <a href="../modul6/transaksi.php">Transaksi</a>
        <a href="../modul7/laporan.php">Laporan</a>
    <?php elseif ($level === 2) : ?>
        <!-- Menu untuk User Biasa -->
        <a href="index.php">Home</a>
        <a href="../modul6/transaksi.php">Transaksi</a>
        <a href="../modul7/laporan.php">Laporan</a>
    <?php endif; ?>

    <span class="right">
        <?= htmlspecialchars($username) ?> | 
        <a href="logout.php" style="color:yellow;">Logout</a>
    </span>
</div>

<div class="content">
    <h1>Selamat Datang, <?= htmlspecialchars($username) ?></h1>
    <p>Level Anda: <?= ($level === 1 ? "Admin" : "User Biasa") ?></p>
</div>

</body>
</html>
