<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Tambah Distributor</h4>
    </div>
</div>

<div class="row">
	<form method="POST" action="" enctype="multipart/form-data">
		<div class="col-md-8">
			<div class="form-group">
				<label for="nama">Nama</label>
				<input class="form-control" type="text" id="nama" name="nama" placeholder="Masukkan nama" required="">
			</div>
			<div class="form-group">
				<label for="alamat">Alamat</label>
				<textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10" placeholder="Masukkan alamat" required=""></textarea>
			</div>
			<div class="form-group">
				<label for="telepon">Telepon</label>
				<input type="number" class="form-control" id="telepon" name="telepon" placeholder="Masukkan nomor telepon" required="">
			</div>

			<button name="simpan" class="btn btn-success">Simpan</button>
			<a class="btn btn-info" href="index.php?p=data_distributor">Kembali</a>
		</div>
	</form>
<?php 
	if (isset($_POST['simpan'])) {

		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$telepon = $_POST['telepon'];

		$query = mysqli_query($koneksi,"INSERT INTO distributor (nama_distributor, alamat, telepon)VALUES('$nama','$alamat','$telepon')");

		if ($query) {
			echo "<script>alert('Tambah data Berhasil')</script>";
			echo "<script>location='index.php?p=data_distributor';</script>";
		}else {
			echo "<script>alert('Tambah data gagal')</script>";
		}
	}
?>
</div>