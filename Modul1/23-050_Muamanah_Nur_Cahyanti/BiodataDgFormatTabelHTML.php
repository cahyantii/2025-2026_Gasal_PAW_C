<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Biodata Dengan Format Tabel HTML</title>
</head>
<body>
	<?php
		//
		$nama = "Muamanah Nur Cahyanti";
		$npm = "230411100050";
		$jurusan = "Teknik Informatika";
		$alamat = "Lamongan"
	?>

	<h2>Biodata Mahasiswi</h2>
	<table border = "1">
		<tr>
			<th>Field</th>
			<th>Data</th>
		</tr>
		<tr>
			<td>Nama</td>
			<td><?php echo $nama; ?></td>
		</tr>
		<tr>
			<td>Npm</td>
			<td><?php echo $npm; ?></td>
		</tr>
		<tr>
			<td>Jurusan</td>
			<td><?php echo $jurusan; ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><?php echo $alamat; ?></td>
		</tr>
	</table>
</body>
</html>