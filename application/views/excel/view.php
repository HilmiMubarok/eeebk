<html>
<head>
	<title>IMPORT EXCEL CI 3</title>
</head>
<body>
	<h1>Data Siswa</h1><hr>
	<a href="<?php echo base_url("testexcel/form"); ?>">Import Data</a><br><br>

	<table border="1" cellpadding="8">
	<tr>
		<th>Nama Pelanggaran</th>
		<th>Skor Pelanggaran</th>
	</tr>

	<?php
	if( ! empty($pelanggaran)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
		foreach($pelanggaran as $data){ // Lakukan looping pada variabel siswa dari controller
			echo "<tr>";
			echo "<td>".$data->nama_pelanggaran."</td>";
			echo "<td>".$data->skor_pelanggaran."</td>";
			echo "</tr>";
		}
	}else{ // Jika data tidak ada
		echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
	}
	?>
	</table>
</body>
</html>
