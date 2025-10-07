<!DOCTYPE html>
<html>
<head>
    <title>Menentukan Grade Nilai Mahasiswa</title>
</head>
<body>
    <h2>Program Menentukan Grade Nilai Mahasiswa</h2>

    <form method="post">
        Masukkan nilai Anda: <input type="number" name="nilai" required>
        <input type="submit" value="Cek Grade">
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nilai = $_POST["nilai"];

            echo "<br>Nilai Anda: $nilai<br>";

            if ($nilai >= 90 && $nilai <= 100) {
                echo "Grade: A";
            } elseif ($nilai >= 80) {
                echo "Grade: B";
            } elseif ($nilai >= 70) {
                echo "Grade: C";
            } elseif ($nilai >= 60) {
                echo "Grade: D";
            } elseif ($nilai >= 0) {
                echo "Grade: E";
            } else {
                echo "Nilai tidak valid!";
            }
        }
    ?>
</body>
</html>
