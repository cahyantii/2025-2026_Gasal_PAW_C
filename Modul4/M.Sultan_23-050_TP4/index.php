<?php
require 'validate.inc';
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    validateName($errors, $_POST, 'surname');
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Validasi</title>
</head>
<body>
    <h2>Form Input Surname</h2>

    <?php
    if (!empty($errors)) {
        echo "<strong>Errors:</strong><br/>";
        foreach ($errors as $field => $error) {
            echo "$field $error<br/>";
        }
    }

    //Di sini form dipanggil dari file lain
    include 'form.inc';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($errors)) {
        echo "<p><strong>Data OK!</strong></p>";
    }
    ?>
</body>
</html>