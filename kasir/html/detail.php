<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Detail</h4> </div>
</div>
<?php 
	$id_buku = $_GET['id_buku'];
	$qbuku = mysqli_query($koneksi,"SELECT * FROM buku WHERE id_buku='$id_buku' ");
	$buku = mysqli_fetch_array($qbuku);
 ?>
<div class="row">
	<form action="" method="POST">
		<div class="col-md-6">
			<div class="form-group">
				<label for="buku">Judul Buku</label>
				<input type="text" id="buku" readonly="" required="" value="<?php echo $buku['judul']; ?>" class="form-control">
			</div>

			<div class="form-group">
				<label for="jumlah">Jumlah Buku</label>
				<input required="" id="jumlah" min="1" class="form-control" name="jumlah" placeholder="Jumlah beli Maksimal <?php echo $buku['stok']; ?>" type="number" max="<?php echo $buku['stok']; ?>">
			</div>
		</div>
		<div class="col-md-8">
			<button class="btn btn-primary" name="tambah">Tambah ke keranjang</button>
			<a class="btn btn-info" href="index.php?p=load_buku">Kembali</a>
		</div>
	</form>
	<?php 
		if (isset($_POST['tambah'])) {
			$jumlah = $_POST['jumlah'];
			$id_kasir = $profil['id_kasir'];
			$jumlah_harga = $buku['harga_pokok'] * $jumlah;
			$query = mysqli_query($koneksi,"INSERT INTO keranjang (id_buku,id_kasir,jumlah,jumlah_harga) VALUES ('$id_buku','$id_kasir','$jumlah','$jumlah_harga') ");
			$update_stok = $buku['stok'] - $jumlah; 
			mysqli_query($koneksi, "UPDATE buku SET stok='$update_stok' WHERE id_buku='$id_buku' ");

			if ($query) {
			echo "<script>alert('Berhasil ditambahkan ke keranjang')</script>";
			echo "<script>location='index.php?p=input_penjualan';</script>";
			}else {
				echo "<script>alert('Gagal ditambahkan ke keranjang')</script>";
			}
		}
	 ?>
</div>