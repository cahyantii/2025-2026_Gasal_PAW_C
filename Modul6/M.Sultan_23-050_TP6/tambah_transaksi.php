<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Transaksi</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f6f8;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 400px;
        margin: 60px auto;
        background: white;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    label {
        margin-top: 10px;
        color: #333;
        font-weight: bold;
    }

    input[type="date"] {
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
        transition: border-color 0.3s;
    }

    input[type="date"]:focus {
        border-color: #4C89FE;
    }

    button {
        margin-top: 20px;
        padding: 10px;
        border: none;
        background-color: #4CAF50;
        color: white;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #45a049;
    }

    a {
        display: block;
        text-align: center;
        margin-top: 15px;
        color: #4C89FE;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>

<div class="container">
    <h2>Tambah Transaksi</h2>
    <form method="POST">
        <label>Tanggal:</label>
        <input type="date" name="tanggal" required>

        <button type="submit" name="simpan">Simpan</button>
    </form>

    <a href="transaksi.php">← Kembali ke Data Transaksi</a>
</div>

<?php
if (isset($_POST['simpan'])) {
    $tgl = $_POST['tanggal'];
    mysqli_query($conn, "INSERT INTO transaksi (tanggal) VALUES ('$tgl')");
    $id = mysqli_insert_id($conn);
    echo "<script>alert('Transaksi berhasil dibuat');window.location='detail_transaksi.php?transaksi_id=$id';</script>";
}
?>
</body>
</html>