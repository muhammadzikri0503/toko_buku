<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Edit Distributor</h4>
    </div>
</div>
<?php 
	$query = mysqli_query($koneksi,"SELECT * FROM distributor WHERE id_distributor='".$_GET['id_distributor']."' ");
	$data = mysqli_fetch_array($query);
 ?>
<div class="row">
	<form method="POST" action="" enctype="multipart/form-data">
		<div class="col-md-8">
			<div class="form-group">
				<label for="nama">Nama</label>
				<input class="form-control" type="text" id="nama" name="nama" value="<?php echo $data['nama_distributor']; ?>" required="">
			</div>
			<div class="form-group">
				<label for="alamat">Alamat</label>
				<textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10" required=""><?php echo $data['alamat'] ?></textarea>
			</div>
			<div class="form-group">
				<label for="telepon">Telepon</label>
				<input type="number" class="form-control" id="telepon" name="telepon" value="<?php echo $data['telepon']; ?>" required="">
			</div>
			
			<button name="ubah" class="btn btn-success">Simpan</button>
			<a class="btn btn-info" href="index.php?p=data_pegawai">Kembali</a>
		</div>
	</form>
<?php 
 	if (isset($_POST['ubah'])) {
 		$nama = $_POST['nama'];
    	$alamat = $_POST['alamat'];
    	$telepon = $_POST['telepon'];

 		$query = mysqli_query($koneksi, "UPDATE distributor SET nama_distributor='$nama', alamat='$alamat', telepon='$telepon' WHERE id_distributor='".$_GET['id_distributor']."' ");
 		if ($query) {
 			echo "<script>alert('Data berhasil diperbaharui')</script>";
 			echo "<script>location='index.php?p=data_distributor';</script>";
 		}
 		else{
 			echo "<script>alert('Data gagal diperbaharui')</script>";
 		}
 	}
?>
</div>