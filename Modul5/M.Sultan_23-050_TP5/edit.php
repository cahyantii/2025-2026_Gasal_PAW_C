<?php
include 'config.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM supplier WHERE id=$id");
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Master Supplier</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
    <h3>Edit Data Master Supplier</h3>
    <form method="post">
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Telp</label>
            <input type="text" name="telp" value="<?= $data['telp'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" value="<?= $data['alamat'] ?>" class="form-control" required>
        </div>
        <button type="submit" name="update" class="btn btn-success">Update</button>
        <a href="index.php" class="btn btn-danger">Batal</a>
    </form>

    <?php
    if (isset($_POST['update'])) {
        $nama = $_POST['nama'];
        $telp = $_POST['telp'];
        $alamat = $_POST['alamat'];

        mysqli_query($conn, "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id=$id");

        header("Location: index.php");
    }
    ?>
</body>
</html>