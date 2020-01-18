<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Edit Pegawai</h4>
    </div>
</div>
<?php 
	$ambil = mysqli_query($koneksi,"SELECT * FROM kasir WHERE id_kasir='".$_GET['id_kasir']."' ");
	$data = $ambil->fetch_assoc();
 ?>
<div class="row">
	<form method="POST" action="" enctype="multipart/form-data">
		<div class="col-md-8">
			<div class="form-group">
				<label for="nama">Nama</label>
				<input class="form-control" type="text" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required="">
			</div>
			<div class="form-group">
				<label for="alamat">Alamat</label>
				<textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10" required=""><?php echo $data['alamat'] ?></textarea>
			</div>
			<div class="form-group">
				<label for="telepon">Telepon</label>
				<input type="number" class="form-control" id="telepon" name="telepon" value="<?php echo $data['telepon']; ?>" required="">
			</div>
			<div class="form-group">
				<label for="status">Status user</label>
				<select class="form-control" name="status" id="status">
					<option disabled="">Pilih Status</option>
					<option value="aktif" <?php if($data['status']=="aktif"){ echo "selected";} ?> >Aktif</option>
					<option value="nonaktif" <?php if($data['status']=="nonaktif"){ echo "selected";} ?> >Tidak Aktif</option>
				</select>
			</div>
			<div class="form-group">
				<label for="img">Foto</label>
				<br>
				<img src="../kasir/plugins/images/users/<?php echo $data['foto']; ?>" alt="foto">
				<br><br>
				<label for="foto">Ganti foto</label>
				<input type="file" name="foto" class="form-control" readonly="">
			</div>
			<button name="simpan" class="btn btn-success">Simpan</button>
			<a class="btn btn-info" href="index.php?p=data_pegawai">Kembali</a>
		</div>
	</form>
<?php 
	if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $status = $_POST['status'];

 	$namafoto=$_FILES['foto']['name'];
 	$lokasifoto = $_FILES['foto']['tmp_name'];
 	// Jika Foto dirubah
 	if (!empty($lokasifoto)) {
 	 	move_uploaded_file($lokasifoto, "../kasir/plugins/images/users/$namafoto");

 	 	$koneksi->query("UPDATE kasir SET nama='$nama', alamat='$alamat', telepon='$telepon', status='$status', foto='$namafoto' WHERE id_kasir='".$_GET['id_kasir']."' ");
 	 }
 	else{
  		$koneksi->query("UPDATE kasir SET nama='$nama', alamat='$alamat', telepon='$telepon', status='$status' WHERE id_kasir='".$_GET['id_kasir']."' ");
 	 }
 	 echo "<script>alert('Data pegawai berhasil diubah');</script>";
 	 echo "<script>location='index.php?p=data_pegawai';</script>";
 	}
?>
</div>