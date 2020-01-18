<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Tambah Buku</h4>
    </div>
</div>

<div class="row">
	<form method="POST" action="" enctype="multipart/form-data">
		<div class="col-md-6">
			<div class="form-group">
				<label for="judul">Judul</label>
				<input class="form-control" type="text" id="judul" name="judul" placeholder="Masukkan judul buku" required="">
			</div>
			<div class="form-group">
				<label for="noisbn">Noisbn</label>
				<input class="form-control" type="number" id="noisbn" name="noisbn" placeholder="Masukkan noisbn" required="">
			</div>
			<div class="form-group">
				<label for="penulis">Penulis</label>
				<input class="form-control" type="text" id="penulis" name="penulis" placeholder="Masukkan nama penulis" required="">
			</div>
			<div class="form-group">
				<label for="penerbit">Penerbit</label>
				<input class="form-control" type="text" id="penerbit" name="penerbit" placeholder="Masukkan nama penerbit" required="">
			</div>
			<div class="form-group">
				<label for="tahun">Tahun</label>
				<input class="form-control" min="1200" max="2099" type="number" id="tahun" name="tahun" placeholder="Masukkan tahun" required="">
			</div>	
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="stok">Stok</label>
				<input type="number" class="form-control" id="stok" name="stok" placeholder="Masukkan stok buku" required="">
			</div>
			<div class="form-group">
				<label for="harga_pokok">Harga Pokok</label>
				<input class="form-control" type="number" id="harga_pokok" name="harga_pokok" placeholder="Harga pokok dihitung otomatis" required="" readonly="">
			</div>
			<div class="form-group">
				<label for="harga_jual">Harga Jual</label>
				<input class="form-control" type="number" id="harga_jual" name="harga_jual" placeholder="Masukkan harga jual" required="">
			</div>
			<div class="form-group">
				<label for="ppn">PPN</label>
				<input class="form-control" type="number" id="ppn" name="ppn" placeholder="PPN dihitung otomatis 10% dari harga jual" required="" readonly="">
			</div>
			<div class="form-group">
				<label for="diskon">Diskon</label>
				<input class="form-control" type="number" id="diskon" name="diskon" placeholder="Masukkan diskon" required="">
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

		$query = mysqli_query($koneksi,"INSERT INTO buku (judul, noisbn, penulis, penerbit, tahun, stok, harga_pokok, harga_jual, ppn, diskon)VALUES('$judul','$noisbn','$penulis','$penerbit','$tahun','$stok','$harga_pokok','$harga_jual','$ppn','$diskon')");

		if ($query) {
			echo "<script>alert('Tambah data Berhasil')</script>";
			echo "<script>location='index.php?p=data_buku';</script>";
		}else {
			echo "<script>alert('Tambah data gagal')</script>";
		}
	}
?>
</div>