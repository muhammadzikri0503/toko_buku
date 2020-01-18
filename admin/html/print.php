<?php 
	$id_jual = $_GET['id_jual'];
	$query = mysqli_query($koneksi, " SELECT * FROM jual 
											INNER JOIN kasir ON jual.id_kasir=kasir.id_kasir WHERE id_jual='$id_jual' ");
	$data = mysqli_fetch_array($query);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Toko Buku</title>
</head>
<body>
<br>
<div class="text-center">
	<h1>TOKO BUKU</h1>
</div>

<div class="row">
	<div style="width: 45%; float: left;">
		<table class="table table-condensed">
			<tr>
				<th>Kode Penjualan :</th> <td><?php echo $data['id_jual']; ?></td>
			</tr>
			<tr>
				<th>Pegawai Kasir :</th> <td><?php echo $data['nama']; ?></td>
			</tr>
			<tr>
				<th>Tanggal :</th> <td><?php echo $data['tanggal']; ?></td>
			</tr>
		</table>
	</div>

	<div style="width: 45%; float: left; margin-left: 10%;">
		<table class="table table-condensed">
			<tr>
				<th>Total Harga :</th> <td>Rp. <?php echo number_format($data['total'], 0,",","."); ?></td>
			</tr>
			<tr>
				<th>Uang Pembeli :</th> <td>Rp. <?php echo number_format($data['uang'], 0,",","."); ?></td>
			</tr>
			<tr>
				<th>Uang Kembali :</th> <td>Rp. <?php echo number_format($data['kembali'], 0,",","."); ?></td>
			</tr>
		</table>
	</div>
</div>

<div class="row">
	<table class="table table-bordered">
		<tr>
			<th>No.</th>
			<th>Buku</th>
			<th>PPN</th>
			<th>Diskon</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Jumlah Harga</th>
		</tr>
		<?php
			$no = 1; 
			$query_buku = mysqli_query($koneksi, " SELECT * FROM penjualan 
															INNER JOIN buku ON penjualan.id_buku=buku.id_buku
															WHERE id_jual='$id_jual' ");
			while ($data2 = mysqli_fetch_array($query_buku)) {
				
		 ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data2['judul']; ?></td>
			<td>Rp. <?php echo number_format($data2['ppn'], 0,",","."); ?></td>
			<td>Rp. <?php echo number_format($data2['diskon'], 0,",","."); ?></td>
			<td>Rp. <?php echo number_format($data2['harga_pokok'], 0,",","."); ?></td>
			<td><?php echo $data2['jumlah']; ?></td>
			<td>Rp. <?php echo number_format($data2['jumlah_harga'], 0,",","."); ?></td>
		</tr>
		<?php } ?>
		<tr>
			<th class="text-right" colspan="6">Total Harga :</th>
			<td class="text-left">Rp. <?php echo number_format($data['total'], 0,",","."); ?></td>
		</tr>
	</table>
	
</div>

</body>
</html>
<script>
	window.print();
</script>