<?php
require 'validate8.inc';
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    validateForm($errors, $_POST);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Data Mahasiswa - Validasi Server-side</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        form { border: 1px solid #ccc; padding: 20px; width: 350px; border-radius: 10px; }
        input[type="text"], input[type="password"], input[type="date"] {
            width: 100%; padding: 8px; margin: 6px 0;
        }
        input[type="submit"] {
            background-color: #4CAF50; color: white; border: none; padding: 10px 15px;
            border-radius: 5px; cursor: pointer;
        }
        input[type="submit"]:hover { background-color: #45a049; }
        .error { color: red; font-size: 14px; }
        .success { color: green; font-weight: bold; }
    </style>
</head>
<body>

    <h2>Form Input Data Mahasiswa</h2>

    <!-- Tampilkan pesan error -->
    <?php
    if (!empty($errors)) {
        echo "<div class='error'><strong>Terjadi kesalahan:</strong><br/>";
        foreach ($errors as $field => $error) {
            echo ucfirst($field) . ": $error<br/>";
        }
        echo "</div><br/>";
    }
    ?>

    <!-- Form Input -->
    <form method="POST" action="index8.php">
        Nama:<br>
        <input type="text" name="nama" value="<?php echo $_POST['nama'] ?? ''; ?>"><br>

        NIM:<br>
        <input type="text" name="nim" value="<?php echo $_POST['nim'] ?? ''; ?>"><br>

        Email:<br>
        <input type="text" name="email" value="<?php echo $_POST['email'] ?? ''; ?>"><br>

        Password:<br>
        <input type="password" name="password"><br>

        Tanggal Lahir:<br>
        <input type="date" name="tanggal_lahir" value="<?php echo $_POST['tanggal_lahir'] ?? ''; ?>"><br>

        <input type="submit" value="Kirim">
    </form>

    <!-- Tampilkan hasil validasi jika data benar -->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($errors)) {
        echo "<div class='success'>";
        echo "<h3>Data Valid!</h3>";
        echo "Nama: " . htmlspecialchars($_POST['nama']) . "<br/>";
        echo "NIM: " . htmlspecialchars($_POST['nim']) . "<br/>";
        echo "Email: " . htmlspecialchars($_POST['email']) . "<br/>";
        echo "Tanggal Lahir: " . htmlspecialchars($_POST['tanggal_lahir']) . "<br/>";
        echo "</div>";
    }
    ?>

</body>
</html>
