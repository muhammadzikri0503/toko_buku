<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Data Penjualan</h4> </div>
</div>

<div class="row">
	<div class="col-md-8">
		<?php 
			$queryjumlah = mysqli_query($koneksi,"SELECT * FROM jual ");
			$jumlah = mysqli_num_rows($queryjumlah);
		 ?>
		<button disabled="" class="btn btn-sm btn-default">Jumlah data <span class="badge"><?php echo $jumlah; ?></span></button>
		<a class="btn btn-sm btn-info" href="index.php?p=data_penjualan">Refresh</a>
	</div>
	<div class="col-md-4">
		<form method="POST" action="">
	    	<div class="input-group">	
		      <input name="inputan" id="inputan" type="text" class="form-control" placeholder="Cari nama pegawai...">
		      <span class="input-group-btn">
		        <button name="cari" class="btn btn-default">Search</button>
		      </span>
	  	 	</div>
		</form>
	</div>
</div>
<br>
<table class="table table-stripped">
	<thead>
		<tr>
			<th>No.</th>
			<th>Nama Pegawai Kasir</th>
			<th>Total</th>
			<th>Uang Pembeli</th>
			<th>Uang Kembali</th>
			<th>Tanggal</th>
			<th>Opsi</th>
		</tr>
	</thead>
	<tbody>
	<?php 
		// Paging
		$batas = 5;
		$hal = ceil($jumlah / $batas);
		$page = (isset($_GET['hal'])) ? $_GET['hal']:1;
		$posisi = ($page - 1) * $batas;
		// End paging
		$no = 1 + $posisi;

		if (isset($_POST['cari'])) {
			$inputan = $_POST['inputan'];

			if ($inputan=="") {
				$q = mysqli_query($koneksi,"SELECT * FROM jual 
													INNER JOIN kasir ON jual.id_kasir=kasir.id_kasir LIMIT $posisi,$batas");
			}
			else if($inputan!=""){
				$q = mysqli_query($koneksi,"SELECT * FROM jual
													INNER JOIN kasir ON jual.id_kasir=kasir.id_kasir WHERE nama LIKE '%$inputan%' ");
			}
		}
		else{
			$q = mysqli_query($koneksi,"SELECT * FROM jual
												INNER JOIN kasir ON jual.id_kasir=kasir.id_kasir LIMIT $posisi,$batas ");
		}
			$cek = mysqli_num_rows($q);

			if ($cek < 1) {
				?>
				<tr>
					<td class="text-center" colspan="8">
						Data yang anda cari tidak tersedia!
						<a href="index.php?p=data_penjualan" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-refresh"></span></a>
					</td>
				</tr>
				<?php
			}
			else{

		while($data = mysqli_fetch_array($q)){
	 ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['nama'] ?></td>
			<td>Rp. <?php echo number_format($data['total'], 0,",","."); ?></td>
			<td>Rp. <?php echo number_format($data['uang'], 0,",","."); ?></td>
			<td>Rp. <?php echo number_format($data['kembali'], 0,",","."); ?></td>
			<td><?php echo $data['tanggal'] ?></td>
			<td>
				<a title="Detail" class="btn btn-success" href="index.php?p=detail_jual&id_jual=<?php echo $data['id_jual']; ?>">Detail</a>
				<a title="Hapus" class="btn btn-warning" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" href="index.php?p=hapus_penjualan&id_penjualan=<?php echo $data['id_penjualan']; ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
			</td>
		</tr>
		<?php 
			} }
		 ?>
	</tbody>
</table>
<div class="text-center">
  <ul class="pagination">
  	<?php 
  		for ($i=1; $i <= $hal; $i++) { 
  			?>
			<li <?php if($page ==$i){ echo "class='active'";} ?>><a href="?p=data_penjualan&hal=<?php echo $i; ?>"><?php echo $i; ?></a></li>
  			<?php
  		}
  	 ?>
  </ul>
</div>