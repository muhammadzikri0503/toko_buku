<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Data Buku</h4>
    </div>
</div>
<div class="row">
	<div class="col-md-8">
		<?php 
			$queryjumlah = mysqli_query($koneksi,"SELECT * FROM buku ");
			$jumlah = mysqli_num_rows($queryjumlah);
		 ?>
		<a class="btn btn-primary" href="index.php?p=tambah_buku">Tambah data</a>
		<button disabled="" class="btn btn-sm btn-default">Jumlah data <span class="badge"><?php echo $jumlah; ?></span></button>
		<a class="btn btn-sm btn-info" href="index.php?p=data_buku">Refresh</a>
	</div>
	<div class="col-md-4">
		<form method="POST" action="">
	    	<div class="input-group">	
		      <input name="inputan" id="inputan" type="text" class="form-control" placeholder="Cari judul buku...">
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
			<th>Judul</th>
			<th>Noisbn</th>
			<th>Penulis</th>
			<th>Penerbit</th>
			<th>Tahun</th>
			<th>Stok</th>
			<th>Harga Pokok</th>
			<th>Harga Jual</th>
			<th>PPN</th>
			<th>Diskon</th>
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
				$q = mysqli_query($koneksi,"SELECT * FROM buku LIMIT $posisi,$batas");
			}
			else if($inputan!=""){
				$q = mysqli_query($koneksi,"SELECT * FROM buku WHERE judul LIKE '%$inputan%' ");
			}
		}
		else{
			$q = mysqli_query($koneksi,"SELECT * FROM buku LIMIT $posisi,$batas ");
		}
			$cek = mysqli_num_rows($q);

			if ($cek < 1) {
				?>
				<tr>
					<td class="text-center" colspan="12">
						Data yang anda cari tidak tersedia!
						<a href="index.php?p=data_buku" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-refresh"></span></a>
					</td>
				</tr>
				<?php
			}
			else{

		while($data = mysqli_fetch_array($q)){
	 ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['judul'] ?></td>
			<td><?php echo $data['noisbn'] ?></td>
			<td><?php echo $data['penulis'] ?></td>
			<td><?php echo $data['penerbit'] ?></td>
			<td><?php echo $data['tahun'] ?></td>
			<td><?php echo $data['stok'] ?></td>

			<td>Rp. <?php echo number_format($data['harga_pokok'], 0,",","."); ?></td>
			<td>Rp. <?php echo number_format($data['harga_jual'], 0,",","."); ?></td>
			<td>Rp. <?php echo number_format($data['ppn'], 0,",","."); ?></td>
			<td>Rp. <?php echo number_format($data['diskon'], 0,",","."); ?></td>
			<td>
				<a title="Edit" href="index.php?p=edit_buku&id_buku=<?php echo $data['id_buku']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
				|
				<a title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" href="index.php?p=hapus_buku&id_buku=<?php echo $data['id_buku']; ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
				<br>
				<a title="Pasok buku" class="btn btn-xs btn-info" href="index.php?p=input_pemasukan&id_buku=<?php echo $data['id_buku']; ?>">Pasok</a>
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
			<li <?php if($page ==$i){ echo "class='active'";} ?>><a href="?p=data_buku&hal=<?php echo $i; ?>"><?php echo $i; ?></a></li>
  			<?php
  		}
  	 ?>
  </ul>
</div>