<!DOCTYPE html>
<html>
<head>
	<title>Export Data Ke Excel</title>
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
	session_start();
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Transaksi.xls");
	
	// koneksi database
	$koneksi = mysqli_connect("localhost","root","","sewa-mobil1");

	$Tahun = $_SESSION['nama_tahun'];
	$Bulan = $_SESSION['idbulan'];

	$query="SELECT *
      FROM data_bulan 
      WHERE idbulan='$Bulan'";
      $result = $koneksi-> query($query);
      if ($result->num_rows > 0){
        while ($row = $result-> fetch_assoc()){
          $NamaBulan = $row['nama_bulan'];
        }
      }
	?>

	<center>
		<h1>Data Transaksi Pada Bulan <?php echo $NamaBulan ?> Tahun <?php echo $Tahun?></h1>
	</center>

	<table border="1">
		<tr>
            <th scope="col">Id Transaksi</th>
			<th scope="col">Nama Pemesan</th>
          <th scope="col">Tanggal Pesan</th>
          <th scope="col">No Telepon Pemesan</th>
          <th scope="col">Alamat Penjemputan</th>
          <th scope="col">Alamat Tujuan</th>
          <th scope="col">Plat Nomor</th>
          <th scope="col">Merek Mobil</th>
          <th scope="col">Supir</th>
          <th scope="col">No Telepon Supir</th>
          <th scope="col">Status</th>
		</tr>
		<?php 

		// menampilkan data pegawai
		$idUser = $_SESSION['id_user'];
		$data = mysqli_query($koneksi,"SELECT user.nama AS usernama, user.telp AS usertelp, transaksi.tanggal, transaksi.idtransaksi, transaksi.tempat_awal, transaksi.tujuan, transaksi.plat_nomor,transaksi.id_user, mobil.merek, supir.nama AS supirnama, supir.telp AS supirtelp, status.status
        FROM transaksi 
        INNER JOIN mobil ON transaksi.plat_nomor=mobil.plat_nomor 
        INNER JOIN supir ON transaksi.no_supir=supir.no_supir 
        INNER JOIN user ON transaksi.id_user=user.no_karyawan
        INNER JOIN status ON transaksi.status=status.id
        WHERE id_user='$idUser' AND year(tanggal)='$Tahun' AND month(tanggal)='$Bulan'");
		$no = 1;
		while($d = mysqli_fetch_array($data)){
		?>
		<tr>
            <td><?php echo $d['idtransaksi']; ?></td>
			<td><?php echo $d['usernama']; ?></td>
			<td><?php echo $d['tanggal']; ?></td>
			<td><?php echo $d['usertelp']; ?></td>
			<td><?php echo $d['tempat_awal']; ?></td>
			<td><?php echo $d['tujuan']; ?></td>
			<td><?php echo $d['plat_nomor']; ?></td>
			<td><?php echo $d['merek']; ?></td>
			<td><?php echo $d['supirnama']; ?></td>
			<td><?php echo $d['supirtelp']; ?></td>
			<td><?php echo $d['status']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>