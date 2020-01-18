<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Edit Buku</h4>
    </div>
</div>
<?php 
	$query = mysqli_query($koneksi,"SELECT * FROM buku WHERE id_buku='".$_GET['id_buku']."' ");
	$data = mysqli_fetch_array($query);
 ?>
<div class="row">
	<form method="POST" action="" enctype="multipart/form-data">
		<div class="col-md-6">
			<div class="form-group">
				<label for="judul">Judul</label>
				<input class="form-control" type="text" id="judul" name="judul" value="<?php echo $data['judul']; ?>" required="">
			</div>
			<div class="form-group">
				<label for="noisbn">Noisbn</label>
				<input class="form-control" type="number" id="noisbn" name="noisbn" value="<?php echo $data['noisbn']; ?>" required="">
			</div>
			<div class="form-group">
				<label for="penulis">Penulis</label>
				<input class="form-control" type="text" id="penulis" name="penulis" value="<?php echo $data['penulis']; ?>" required="">
			</div>
			<div class="form-group">
				<label for="penerbit">Penerbit</label>
				<input class="form-control" type="text" id="penerbit" name="penerbit" value="<?php echo $data['penerbit']; ?>" required="">
			</div>
			<div class="form-group">
				<label for="tahun">Tahun</label>
				<input class="form-control" min="1200" max="2099" type="number" id="tahun" name="tahun" value="<?php echo $data['tahun']; ?>" required="">
			</div>	
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="stok">Stok</label>
				<input type="number" class="form-control" id="stok" readonly="" name="stok" value="<?php echo $data['stok']; ?>" required="">
			</div>
			<div class="form-group">
				<label for="harga_pokok">Harga Pokok</label>
				<input class="form-control" type="number" id="harga_pokok" name="harga_pokok" value="<?php echo $data['harga_pokok']; ?>" required="" readonly="">
			</div>
			<div class="form-group">
				<label for="harga_jual">Harga Jual</label>
				<input class="form-control" type="number" id="harga_jual" name="harga_jual" value="<?php echo $data['harga_jual']; ?>" required="">
			</div>
			<div class="form-group">
				<label for="ppn">PPN</label>
				<input class="form-control" type="number" id="ppn" name="ppn" required="" value="<?php echo $data['ppn']; ?>" readonly="">
			</div>
			<div class="form-group">
				<label for="diskon">Diskon</label>
				<input class="form-control" type="number" id="diskon" name="diskon" value="<?php echo $data['diskon']; ?>" required="">
			</div>
		</div>
		<div class="col-md-8">
			<button name="simpan" class="btn btn-success">Simpan</button>
			<a class="btn btn-info" href="index.php?p=data_buku">Kembali</a>
		</div>	
	</form>
<?php 
	if (isset($_POST['simpan'])) {

		$judul = $_POST['judul'];
		$noisbn = $_POST['noisbn'];
		$penulis = $_POST['penulis'];
		$penerbit = $_POST['penerbit'];
		$tahun = $_POST['tahun'];
		$stok = $_POST['stok'];
		$harga_jual = $_POST['harga_jual'];
		$jml_ppn = 0.1;
		$ppn = $harga_jual * $jml_ppn;
		$diskon = $_POST['diskon'];
		$harga_pokok = ($harga_jual + $ppn) - $diskon;

		$query = mysqli_query($koneksi,"UPDATE buku SET judul='$judul', noisbn='$noisbn', penulis='$penulis', penerbit='$penerbit', tahun='$tahun', stok='$stok', harga_pokok='$harga_pokok', harga_jual='$harga_jual', ppn='$ppn', diskon='$diskon' WHERE id_buku='".$_GET['id_buku']."' ");

		if ($query) {
			echo "<script>alert('Data berhasil diperbaharui')</script>";
			echo "<script>location='index.php?p=data_buku';</script>";
		}else {
			echo "<script>alert('Tambah data gagal')</script>";
		}
	}
?>
</div>