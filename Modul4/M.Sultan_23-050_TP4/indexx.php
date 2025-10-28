<?php
require 'validatee.inc';
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    validateForm($errors, $_POST);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Data Mahasiswa</title>
</head>
<body>
    <h2>Form Input Data Mahasiswa</h2>

    <?php
    if (!empty($errors)) {
        echo "<strong>Errors:</strong><br/>";
        foreach ($errors as $field => $error) {
            echo "$field: $error<br/>";
        }
    }
    ?>

    <form method="POST" action="indexx.php">
        Nama: <input type="text" name="nama" value="<?php echo $_POST['nama'] ?? ''; ?>"><br/>
        NIM: <input type="text" name="nim" value="<?php echo $_POST['nim'] ?? ''; ?>"><br/>
        Email: <input type="text" name="email" value="<?php echo $_POST['email'] ?? ''; ?>"><br/>
        Password: <input type="password" name="password"><br/>
        Tanggal Lahir: <input type="date" name="tanggal_lahir" value="<?php echo $_POST['tanggal_lahir'] ?? ''; ?>"><br/>
        <input type="submit" value="Kirim">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($errors)) {
        echo "<h3>Data Valid!</h3>";
        echo "Nama: " . htmlspecialchars($_POST['nama']) . "<br/>";
        echo "NIM: " . htmlspecialchars($_POST['nim']) . "<br/>";
        echo "Email: " . htmlspecialchars($_POST['email']) . "<br/>";
        echo "Tanggal Lahir: " . htmlspecialchars($_POST['tanggal_lahir']) . "<br/>";
    }
    ?>
</body>
</html>
