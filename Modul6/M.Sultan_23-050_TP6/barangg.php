<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Barang</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f6f8;
        margin: 30px;
    }

    h2 {
        color: #333;
        text-align: center;
    }

    a {
        text-decoration: none;
        color: white;
        background-color: #4CAF50;
        padding: 8px 12px;
        border-radius: 4px;
    }

    a:hover {
        background-color: #45a049;
    }

    table {
        width: 90%;
        margin: 20px auto;
        border-collapse: collapse;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        background: white;
    }

    th {
        background-color: #4C89FE;
        color: white;
        padding: 10px;
        text-align: center;
    }

    td {
        padding: 10px;
        text-align: center;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #e8f0fe;
    }

    .tambah {
        display: block;
        width: 140px;
        margin: 0 auto;
        text-align: center;
        margin-bottom: 15px;
    }

    .hapus {
        color: white;
        background-color: #e74c3c;
        padding: 5px 10px;
        border-radius: 4px;
    }

    .hapus:hover {
        background-color: #c0392b;
    }
</style>
</head>
<body>

<h2>Data Barang</h2>
<a class="tambah" href="tambah_barang.php">+ Tambah Barang</a>

<table border="1" cellpadding="5" cellspacing="0">
<tr><th>ID</th><th>Nama Barang</th><th>Harga</th><th>Stok</th><th>Aksi</th></tr>

<?php
$q = mysqli_query($conn, "SELECT * FROM barang");
while ($r = mysqli_fetch_assoc($q)) {
    echo "<tr>
            <td>{$r['id']}</td>
            <td>{$r['nama_barang']}</td>
            <td>Rp " . number_format($r['harga'], 0, ',', '.') . "</td>
            <td>{$r['stok']}</td>
            <td><a class='hapus' href='hapus_barang.php?id={$r['id']}'>Hapus</a></td>
          </tr>";
}
?>
</table>

</body>
</html>