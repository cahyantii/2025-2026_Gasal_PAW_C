<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Biodata Dinamis</title>
</head>
<body>
	<?php
		// Ambil data dari query string
		$nama    = isset($_GET['nama']) ? $_GET['nama'] : "Tidak diketahui";
		$npm     = isset($_GET['npm']) ? $_GET['npm'] : "-";
		$jurusan = isset($_GET['jurusan']) ? $_GET['jurusan'] : "-";
		$alamat  = isset($_GET['alamat']) ? $_GET['alamat'] : "-";
	?>

	<h2>Biodata Mahasiswa (Dinamis)</h2>
	<table border="1">
		<tr>
			<th>Field</th>
			<th>Data</th>
		</tr>
		<tr>
			<td>Nama</td>
			<td><?php echo htmlspecialchars($nama); ?></td>
		</tr>
		<tr>
			<td>NPM</td>
			<td><?php echo htmlspecialchars($npm); ?></td>
		</tr>
		<tr>
			<td>Jurusan</td>
			<td><?php echo htmlspecialchars($jurusan); ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><?php echo htmlspecialchars($alamat); ?></td>
		</tr>
	</table>
</body>
</html>
