<?php
	session_start();
	session_unset();
	session_destroy();
	echo "<script>alert('Sukses logout');location='login.php';</script>";
?>