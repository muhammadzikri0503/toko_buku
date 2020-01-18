<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Edit Profil</h4>
    </div>
</div>

<div class="row">
	<form method="POST" action="" enctype="multipart/form-data">
		<div class="col-md-8">
			<div class="form-group">
				<label for="nama">Nama</label>
				<input class="form-control" type="text" id="nama" name="nama" value="<?php echo $profil['nama']; ?>" required="">
			</div>
			<div class="form-group">
				<label for="alamat">Alamat</label>
				<textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10" required=""><?php echo $profil['alamat'] ?></textarea>
			</div>
			<div class="form-group">
				<label for="telp">Telepon</label>
				<input type="number" class="form-control" id="telp" name="telp" value="<?php echo $profil['telepon'] ?>" required="">
			</div>
			<div class="form-group">
 				<label id="foto">Ganti Foto</label>
 				<input type="file" name="foto" id="foto" class="form-control" >
 			</div>
			<button name="edit_profil" class="btn btn-success">Simpan</button>
			<a class="btn btn-info" href="index.php?p=profile">Batal</a>
		</div>
	</form>
	<?php 
		if (isset($_POST['edit_profil'])) {
			$namafoto=$_FILES['foto']['name'];
 	 		$lokasifoto = $_FILES['foto']['tmp_name'];

 	 		$nama = $_POST['nama'];
 	 		$alamat = $_POST['alamat'];
 	 		$telp = $_POST['telp'];
 	 		// Jika foto dirubah
		 	if (!empty($lokasifoto)) {
		 	 		move_uploaded_file($lokasifoto, "plugins/images/users/$namafoto");

		 	 		mysqli_query($koneksi,"UPDATE kasir SET nama='$nama', alamat='$alamat', telepon='$telp', foto='$namafoto' WHERE id_kasir='$profil[id_kasir]' ");
		 	 	}
		 	 	else{
		 	 		mysqli_query($koneksi,"UPDATE kasir SET nama='$nama', alamat='$alamat', telepon='$telp' WHERE id_kasir='$profil[id_kasir]' ");
		 	 	}
		 	 	echo "<script>alert('Profile anda berhasil di perbaharui');</script>";
		 	 	echo "<script>location='index.php?p=profile';</script>"; 		
				}
	?>
</div>