<?php
include 'config.php';
$transaksi_id = $_GET['transaksi_id'];

// code tersebut adalah untuk menghapus barang dari transaksi
if (isset($_GET['hapus_id'])) {
    $hapus_id = $_GET['hapus_id'];
    mysqli_query($conn, "DELETE FROM detil_transaksi WHERE id=$hapus_id");

    // code tersebut adalah untuk update barang yang telah di hapus
    mysqli_query($conn, "UPDATE transaksi 
                         SET total = (SELECT COALESCE(SUM(subtotal),0) FROM detil_transaksi WHERE transaksi_id=$transaksi_id)
                         WHERE id=$transaksi_id");

    echo "<script>alert('Barang berhasil dihapus dari transaksi');window.location='detail_transaksi.php?transaksi_id=$transaksi_id';</script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Detil Transaksi</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #f7f8fc, #e8efff);
    margin: 0;
    padding: 30px;
  }
  h2, h3 { color: #333; }
  a {
    text-decoration: none;
    background-color: #007bff;
    color: white;
    padding: 6px 12px;
    border-radius: 5px;
  }
  a:hover { background-color: #0056b3; }
  form {
    background: #ffffff;
    border-radius: 10px;
    padding: 15px 20px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    width: 350px;
    margin-bottom: 30px;
  }
  select, input[type=number] {
    width: 100%;
    padding: 8px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  button {
    background-color: #28a745;
    color: white;
    padding: 8px 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
  button:hover { background-color: #218838; }
  table {
    border-collapse: collapse;
    width: 100%;
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
  }
  th {
    background-color: #007bff;
    color: white;
    padding: 10px;
  }
  td {
    padding: 8px;
    border-bottom: 1px solid #ddd;
    text-align: center;
  }
  tr:nth-child(even) { background-color: #f2f7ff; }
  tr:hover { background-color: #e1ecff; }
  .hapus-btn {
    background-color: #dc3545;
    color: white;
    padding: 4px 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
  .hapus-btn:hover { background-color: #b52a35; }
</style>
</head>
<body>

<h2>Detil Transaksi ID <?= $transaksi_id ?></h2>
<a href="transaksi.php">← Kembali ke Transaksi</a><br><br>

<form method="POST">
  <label>Pilih Barang:</label>
  <select name="barangg_id" required>
    <option value="">--Pilih--</option>
    <?php
    $barang = mysqli_query($conn, "
      SELECT * FROM barang 
      WHERE id NOT IN (
        SELECT barang_id FROM detil_transaksi WHERE transaksi_id=$transaksi_id
      )
    ");
    while ($b = mysqli_fetch_assoc($barang)) {
        echo "<option value='{$b['id']}'>{$b['nama_barang']} (Rp {$b['harga']})</option>";
    }
    ?>
  </select>
  <label>Jumlah:</label>
  <input type="number" name="jumlah" required>
  <button type="submit" name="simpan">Tambah Barang</button>
</form>

<?php
// code tersebut adalah untuk nambah barang ke transaksi
if (isset($_POST['simpan'])) {
    $barang_id = $_POST['barangg_id'];
    $jumlah = $_POST['jumlah'];

    $q_barang = mysqli_query($conn, "SELECT harga FROM barang WHERE id=$barang_id");
    $data_barang = mysqli_fetch_assoc($q_barang);
    $subtotal = $data_barang['harga'] * $jumlah;

    mysqli_query($conn, "INSERT INTO detil_transaksi (transaksi_id, barang_id, jumlah, subtotal)
                         VALUES ($transaksi_id, $barang_id, $jumlah, $subtotal)");

    mysqli_query($conn, "UPDATE transaksi 
                         SET total = (SELECT SUM(subtotal) FROM detil_transaksi WHERE transaksi_id=$transaksi_id)
                         WHERE id=$transaksi_id");

    echo "<script>alert('Barang berhasil ditambahkan');window.location='detail_transaksi.php?transaksi_id=$transaksi_id';</script>";
}
?>

<h3>Daftar Barang di Transaksi Ini</h3>
<table>
<tr>
  <th>No</th>
  <th>Barang</th>
  <th>Jumlah</th>
  <th>Subtotal</th>
  <th>Aksi</th>
</tr>
<?php
$q = mysqli_query($conn, "SELECT d.*, b.nama_barang 
                          FROM detil_transaksi d 
                          JOIN barang b ON d.barang_id=b.id 
                          WHERE transaksi_id=$transaksi_id");
$no=1;
while ($r = mysqli_fetch_assoc($q)) {
    echo "<tr>
            <td>$no</td>
            <td>{$r['nama_barang']}</td>
            <td>{$r['jumlah']}</td>
            <td>Rp {$r['subtotal']}</td>
            <td>
              <a class='hapus-btn' href='detail_transaksi.php?transaksi_id=$transaksi_id&hapus_id={$r['id']}'
                 onclick='return confirm(\"Yakin ingin menghapus barang ini?\")'>Hapus</a>
            </td>
          </tr>";
    $no++;
}
?>
</table>

</body>
</html>