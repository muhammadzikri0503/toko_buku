<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Tambah Pegawai</h4>
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
			<div class="form-group">
				<label for="status">Status user</label>
				<select class="form-control" name="status" id="status" required="">
					<option selected="" disabled="" value="">Pilih Status</option>
					<option value="aktif">Aktif</option>
					<option value="nonaktif">Tidak Aktif</option>
				</select>
			</div>
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" name="username" class="form-control" id="username" placeholder="Masukkan username" required="">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password" required="">
			</div>
			<div hidden="" class="form-group">
				<label for="akses">Akses user</label>
				<input type="text" class="form-control" name="akses" readonly="" value="kasir">
			</div>
			<div class="form-group">
				<label for="foto">Foto</label>
				<input type="file" name="foto" id="foto" class="form-control" required="">
			</div>
			<button name="simpan" class="btn btn-success">Simpan</button>
			<a class="btn btn-info" href="index.php?p=data_pegawai">Kembali</a>
		</div>
	</form>
<?php 
	if (isset($_POST['simpan'])) {
		$foto = $_FILES['foto']['name'];
		$lokasi = $_FILES['foto']['tmp_name'];
		move_uploaded_file($lokasi, "../kasir/plugins/images/users/".$foto);

		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$telepon = $_POST['telepon'];
		$status = $_POST['status'];
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$akses = "kasir";

		$query = mysqli_query($koneksi,"INSERT INTO kasir (nama, alamat, telepon, status, username, password, akses, foto)VALUES('$nama','$alamat','$telepon','$status','$username','$password','$akses','$foto')");

		if ($query) {
			echo "<script>alert('Tambah data Berhasil')</script>";
			echo "<script>location='index.php?p=data_pegawai';</script>";
		}else {
			echo "<script>alert('Tambah data gagal')</script>";
		}
	}
?>
</div>