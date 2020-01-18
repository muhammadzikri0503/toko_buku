<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Data Pegawai</h4>
    </div>
</div>
<div class="row">
	<div class="col-md-8">
		<?php 
			$queryjumlah = mysqli_query($koneksi,"SELECT * FROM kasir WHERE akses='kasir' ");
			$jumlah = mysqli_num_rows($queryjumlah);
		 ?>
		<a class="btn btn-primary" href="index.php?p=tambah_pegawai">Tambah data</a>
		<button disabled="" class="btn btn-sm btn-default">Jumlah data <span class="badge"><?php echo $jumlah; ?></span></button>
		<a class="btn btn-sm btn-info" href="index.php?p=data_pegawai">Refresh</a>
	</div>
	<div class="col-md-4">
		<form method="POST" action="">
	    	<div class="input-group">	
		      <input name="inputan" id="inputan" type="text" class="form-control" placeholder="Cari pegawai...">
		      <span class="input-group-btn">
		        <button name="cari" class="btn btn-default">Search</button>
		      </span>
	  	 	</div>
		</form>
	</div>
</div>
<br>
<table class="table table-stripped">
	<thead>
		<tr>
			<th>No.</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Telepon</th>
			<th>Username</th>
			<th>Status</th>
			<th>Foto</th>
			<th>Opsi</th>
		</tr>
	</thead>
	<tbody>
	<?php 
		// Paging
		$batas = 5;
		$hal = ceil($jumlah / $batas);
		$page = (isset($_GET['hal'])) ? $_GET['hal']:1;
		$posisi = ($page - 1) * $batas;
		// End paging
		$no = 1 + $posisi;

		if (isset($_POST['cari'])) {
			$inputan = $_POST['inputan'];

			if ($inputan=="") {
				$q = mysqli_query($koneksi,"SELECT * FROM kasir WHERE akses='kasir' LIMIT $posisi,$batas ");
			}
			else if($inputan!=""){
				$q = mysqli_query($koneksi,"SELECT * FROM kasir WHERE nama LIKE '%$inputan%' ");
			}
		}
		else{
			$q = mysqli_query($koneksi,"SELECT * FROM kasir WHERE akses='kasir' LIMIT $posisi,$batas ");
		}
			$cek = mysqli_num_rows($q);

			if ($cek < 1) {
				?>
				<tr>
					<td class="text-center" colspan="8">
						Data yang anda cari tidak tersedia!
						<a href="index.php?p=data_pegawai" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-refresh"></span></a>
					</td>
				</tr>
				<?php
			}
			else{

		while($data = mysqli_fetch_array($q)){
	 ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['nama'] ?></td>
			<td><?php echo $data['alamat'] ?></td>
			<td><?php echo $data['telepon'] ?></td>
			<td><?php echo $data['username'] ?></td>
			<td><?php echo $data['status'] ?></td>
			<td>
				<img width="50px" src="../kasir/plugins/images/users/<?php echo $data['foto'] ?>">
			</td>
			<td>
				<a title="Edit" href="index.php?p=edit_pegawai&id_kasir=<?php echo $data['id_kasir']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
				|
				<a title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" href="index.php?p=hapus_pegawai&id_kasir=<?php echo $data['id_kasir']; ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
			</td>
		</tr>
		<?php 
			} }
		 ?>
	</tbody>
</table>
<div class="text-center">
  <ul class="pagination">
  	<?php 
  		for ($i=1; $i <= $hal; $i++) { 
  			?>
			<li <?php if($page ==$i){ echo "class='active'";} ?>><a href="?p=data_pegawai&hal=<?php echo $i; ?>"><?php echo $i; ?></a></li>
  			<?php
  		}
  	 ?>
  </ul>
</div>