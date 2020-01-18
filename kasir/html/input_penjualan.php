<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title"><span class="glyphicon glyphicon-shopping-cart"></span> Keranjang</h4> 
    </div>
</div>
<?php 
	// Kode Otomatis
	$qkode = mysqli_query($koneksi, "SELECT max(id_jual) FROM jual ");
	$kode = mysqli_fetch_array($qkode);
	if ($kode) {
		$nilai = $kode[0];
		$nilai = substr($nilai, 3);
		$nilai = (int)$nilai;
		$kode_baru = $nilai + 1;
		$kode_otomatis = "PJN".str_pad($kode_baru,4,"0", STR_PAD_LEFT);
	}
	else{
		$kode_otomatis = "PJN0001";
	}
 ?>
<div class="row">
	<div class="col-md-8">
		<a class="btn btn-sm btn-info" href="index.php?p=load_buku">Load Buku</a><br><br>
		<h4>Kode Penjualan = <?php echo $kode_otomatis; ?></h4>
	</div>
	<br><br>
	<table class="table table-bordered">
		<tr>
			<th>No.</th>
			<th>Buku</th>
			<th>PPN</th>
			<th>Diskon</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Jumlah Harga</th>
			<th>Opsi</th>
		</tr>
		<?php
			$no = 1; 
			$query_keranjang = mysqli_query($koneksi, "SELECT * FROM keranjang 
																INNER JOIN buku ON keranjang.id_buku=buku.id_buku
																INNER JOIN kasir ON keranjang.id_kasir=kasir.id_kasir ");
			while ($data = mysqli_fetch_array($query_keranjang)) {
				
		 ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['judul']; ?></td>
			<td>Rp. <?php echo number_format($data['ppn'], 0,",","."); ?></td>
			<td>Rp. <?php echo number_format($data['diskon'], 0,",","."); ?></td>
			<td>Rp. <?php echo number_format($data['harga_pokok'], 0,",","."); ?></td>
			<td><?php echo $data['jumlah']; ?></td>
			<td>Rp. <?php echo number_format($data['jumlah_harga'], 0,",","."); ?></td>
			<td>
				<a onclick="return confirm('Anda yakin ingin menghapus buku ini dari keranjang?')" title="Hapus" href="index.php?p=hapus_keranjang&id_keranjang=<?php echo $data['id_keranjang']; ?>&id_buku=<?php echo $data['id_buku']; ?>&jumlah=<?php echo $data['jumlah']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
			</td>
		</tr>
		<?php } ?>
		<tr>
			<th class="text-right" colspan="6">Total Harga :</th>
			<td class="text-left" colspan="2">
				<?php 
					$query_total = mysqli_query($koneksi, "SELECT sum(jumlah_harga) as total FROM keranjang ");
					$total = mysqli_fetch_array($query_total);
					?>
					Rp. <?php echo number_format($total['total'], 0,",","."); ?>
			</td>
		</tr>
	</table>
	<hr>
	<?php 
		$qk = mysqli_query($koneksi, "SELECT * FROM keranjang");
		$cek = mysqli_num_rows($qk);
		if ($cek > 0) {
			
	 ?>
	<div class="col-md-5">
		<h1><small>Total Harga</small><br>
			Rp. <?php echo number_format($total['total'], 2,",","."); ?>
		</h1>
		<form action="" method="POST" class="form-inline">
			<div class="form-group">
				<label for="uang">Uang Pembeli :</label>
				<input type="number" id="uang" name="uang" placeholder="Masukkan jumlah uang" class="form-control" required="" min="<?php echo $total['total']; ?>">
			</div>
			<button class="btn btn-success" name="proses">Proses</button>
		</form>
	</div>
	<div class="col-md-5">
		<?php 
			if (isset($_POST['proses'])) {
				$uang = $_POST['uang'];
				$kembali = $uang - $total['total'];

				$tanggal = date('Y-m-d');
				mysqli_query($koneksi, "INSERT INTO penjualan(id_buku,jumlah,jumlah_harga,id_jual) SELECT id_buku,jumlah,jumlah_harga,'$kode_otomatis' FROM keranjang");

				// Memasukkan data ke tabel jual
				mysqli_query($koneksi, "INSERT INTO jual(id_jual,total,uang,kembali,id_kasir,tanggal) VALUES('$kode_otomatis','$total[total]','$uang','$kembali','$profil[id_kasir]','$tanggal') ");
				?>
				<blockquote>
					<h3>
						<small>Uang Pembeli</small>
						Rp. <?php echo number_format($uang, 0,",","."); ?>
					</h3>
					<h2>
						<small>Uang Kembalian</small>
						Rp. <?php echo number_format($kembali, 0,",","."); ?>
					</h2>
				</blockquote>
		<a title="Print" href="index.php?p=print&id_jual=<?php echo $kode_otomatis; ?>" target="_blank" class="btn btn-info"><i class="glyphicon glyphicon-print"></i></a>
		<a title="Selesai" href="index.php?p=selesai" class="btn btn-primary">Selesai</a>
	</div>
	<?php } } ?>
</div>