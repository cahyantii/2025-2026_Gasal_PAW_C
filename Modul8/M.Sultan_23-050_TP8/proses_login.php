<?php
session_start();

// cek apakah form dikirim
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login.php");
    exit();
}

include "conn.php";

// ambil data dari form
$username = mysqli_real_escape_string($koneks, $_POST['username']);
$password = md5(mysqli_real_escape_string($koneks, $_POST['password'])); // <-- WAJIB MD5!

// query cek user
$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$query = mysqli_query($koneks, $sql);

if (!$query) {
    die("Query Error: " . mysqli_error($koneks));
}

$data = mysqli_fetch_assoc($query);

// jika data ditemukan
if ($data) {
    $_SESSION['username'] = $data['username'];
    $_SESSION['level']    = (int)$data['level']; // CAST ke integer di sini
    header("Location: index.php");
    exit();
} else {
    header("Location: login.php?error=1");
    exit();
}
?>
