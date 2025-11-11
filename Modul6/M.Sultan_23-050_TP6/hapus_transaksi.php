<?php
include 'config.php';

$id = $_GET['id'];

// Hapus semua detil transaksi terlebih dahulu
mysqli_query($conn, "DELETE FROM detil_transaksi WHERE transaksi_id=$id");

// Hapus transaksi utama
mysqli_query($conn, "DELETE FROM transaksi WHERE id=$id");

echo "<script>alert('Transaksi dan semua detilnya berhasil dihapus');window.location='transaksi.php';</script>";
?>