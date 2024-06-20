<!DOCTYPE html>
<html>
<head>
	<title>Export Data Supir Ke Excel</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>

	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Supir.xls");
	
	// koneksi database
	$koneksi = mysqli_connect("localhost","root","","sewa-mobil1");
	?>

	<center>
		<h1>Data Supir</h1>
	</center>

	<table border="1">
		<tr>
          <th scope="col">Nama</th>
          <th scope="col">No Telp</th>
          <th scope="col">Username</th>
          <th scope="col">Password</th>
		</tr>
		<?php 

		// menampilkan data pegawai
		
		$data = mysqli_query($koneksi,"SELECT * FROM supir");
		$no = 1;
		while($d = mysqli_fetch_array($data)){
		?>
		<tr>
			<td><?php echo $d['nama']; ?></td>
			<td><?php echo $d['telp']; ?></td>
			<td><?php echo $d['username']; ?></td>
			<td><?php echo $d['password']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>