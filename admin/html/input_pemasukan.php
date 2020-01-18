<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Input Pemasukan Buku</h4>
    </div>
</div>
<?php 
	$id_buku = $_GET['id_buku'];
	$query = mysqli_query($koneksi,"SELECT * FROM buku WHERE id_buku='$id_buku' ");
	$data = mysqli_fetch_array($query);
 ?>
<div class="row">
	<form method="POST" action="" enctype="multipart/form-data">
		<div class="col-md-8">
			<div class="form-group">
				<label for="buku">Buku</label>
				<input class="form-control" type="text" id="buku" name="buku" value="<?php echo $data['judul']; ?>" required="" readonly="">
			</div>
			<div class="form-group">
			    <label for="id_distributor">Distributor</label>
			    <select class="form-control" name="id_distributor" id="id_distributor" required="">
			      <option disabled="">Pilih distributor</option>
			      <?php
			        $distributor = mysqli_query($koneksi, "SELECT * FROM distributor");
			        while ($r = mysqli_fetch_array($distributor)) { ?>
			          <option selected="" value="<?php echo $r['id_distributor'] ?>"><?php echo $r['nama_distributor'] ?></option>
			        <?php
			        }
			       ?>
			    </select>
			 </div>
			<div class="form-group">
				<label for="stok_awal">Stok awal buku</label>
				<input type="number" readonly="" class="form-control" id="stok_awal" name="stok_awal" value="<?php echo $data['stok'] ?>" required="">
			</div>
			<div class="form-group">
				<label for="jumlah">Jumlah</label>
				<input type="number" name="jumlah" class="form-control" id="jumlah" placeholder="Masukkan jumlah pemasukan buku" required="">
			</div>
			<div class="form-group">
				<label for="tanggal">Tanggal</label>
				<input type="text" class="form-control" value="<?php echo date('d-m-Y'); ?>" name="tanggal" id="tanggal" required="" readonly="">
			</div>
			
			<button name="simpan" class="btn btn-success">Simpan</button>
			<a class="btn btn-info" href="index.php?p=data_pegawai">Kembali</a>
		</div>
	</form>
<?php 
	if (isset($_POST['simpan'])) {
		$id_distributor = $_POST['id_distributor'];
		$jumlah = $_POST['jumlah'];
		$tanggal = $_POST['tanggal'];
		$stok_akhir = $jumlah + $data['stok'];

		$query = mysqli_query($koneksi,"INSERT INTO pasok (id_distributor, id_buku, jumlah, tanggal)VALUES('$id_distributor','$id_buku','$jumlah','$tanggal')");

		mysqli_query($koneksi, "UPDATE buku SET stok='$stok_akhir' WHERE id_buku='$id_buku' ");

		if ($query) {
			echo "<script>alert('Tambah data Berhasil')</script>";
			echo "<script>location='index.php?p=data_buku';</script>";
		}else {
			echo "<script>alert('Tambah data gagal')</script>";
		}
	}
?>
</div>