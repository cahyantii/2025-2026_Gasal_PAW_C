<?php
$hostname = "localhost";
$dbuser   = "root";
$dbpass   = "";
$dbname   = "db_login";

$koneks = mysqli_connect($hostname, $dbuser, $dbpass, $dbname);

if (!$koneks) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
