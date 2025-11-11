<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Transaksi</title>
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
        width: 160px;
        margin: 0 auto;
        text-align: center;
        margin-bottom: 15px;
    }

    .detil {
        color: white;
        background-color: #3498db;
        padding: 5px 10px;
        border-radius: 4px;
    }

    .detil:hover {
        background-color: #2980b9;
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

<h2>Data Transaksi</h2>
<a class="tambah" href="tambah_transaksi.php">+ Tambah Transaksi</a>

<table border="1" cellpadding="5" cellspacing="0">
<tr><th>ID</th><th>Tanggal</th><th>Total</th><th>Aksi</th></tr>

<?php
$q = mysqli_query($conn, "SELECT * FROM transaksi ORDER BY id DESC");
while ($r = mysqli_fetch_assoc($q)) {
    echo "<tr>
            <td>{$r['id']}</td>
            <td>{$r['tanggal']}</td>
            <td>Rp " . number_format($r['total'], 0, ',', '.') . "</td>
            <td>
              <a class='detil' href='detail_transaksi.php?transaksi_id={$r['id']}'>Detil</a> |
              <a class='hapus' href='hapus_transaksi.php?id={$r['id']}'
                 onclick=\"return confirm('Yakin ingin menghapus transaksi ini beserta detilnya?');\">Hapus</a>
            </td>
          </tr>";
}
?>
</table>

</body>
</html>