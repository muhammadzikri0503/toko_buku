<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Pilih Buku</h4> </div>
</div>
<div class="row">
	<div class="col-md-6">
		<form method="POST" class="form-inline" action="">
			<div class="input-group">	
		      <input name="carian" type="text" class="form-control" placeholder="Cari judul buku...">
		      <span class="input-group-btn">
		        <button name="cari" class="btn btn-sm btn-info">Search</button>
		      </span>
	  	 	</div>
	  	 	<a href="index.php?p=load_buku" class="btn btn-sm btn-success">Reflesh</a>
		  	<?php 
				$queryjumlah = mysqli_query($koneksi,"SELECT * FROM buku");
				$jumlah = mysqli_num_rows($queryjumlah);
			 ?>
			<button disabled="" class="btn btn-sm btn-default">Jumlah data <span class="badge"><?php echo $jumlah; ?></span></button>
	  	 	
		</form>

		<br>
		<table class="table table-bordered">
			<tr>
				<th>No</th>
				<th>Judul Buku</th>
				<th>Stok</th>
				<th class="text-center">Opsi</th>
			</tr>
			<?php 
				// Paging
				$batas = 5;
				$hal = ceil($jumlah / $batas);
				$page = (isset($_GET['hal'])) ? $_GET['hal']:1;
				$posisi = ($page - 1) * $batas;
				// End paging
				$no = 1 + $posisi;

				if (isset($_POST['cari'])) {
					$inputan = $_POST['carian'];

					if ($inputan =="") {
						$buku = mysqli_query($koneksi,"SELECT * FROM buku LIMIT $posisi,$batas");
					}
					else if ($inputan != "") {
						$buku = mysqli_query($koneksi,"SELECT * FROM buku WHERE judul LIKE '%$inputan%' ");
					}
				}
				else{
					$buku = mysqli_query($koneksi,"SELECT * FROM buku LIMIT $posisi,$batas");
				}

				$cek = mysqli_num_rows($buku);
				if ($cek < 1) {
					?>
					<tr>
						<td class="text-center" colspan="3">
							Data tidak ada! &nbsp;
						</td>
					</tr>
					<?php
				}
				else{

				while ($data = mysqli_fetch_array($buku)){
			 ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $data['judul']; ?></td>
				<td><?php echo $data['stok']; ?></td>
				<td class="text-center">
					<?php 
						if ($data['stok'] == '0') {
							?>
							Stok Habis!
							<?php
						}else{
							?>
							<a class="btn btn-md btn-block btn-warning" href="index.php?p=detail&id_buku=<?php echo $data['id_buku']; ?>">Pilih</a>
							<?php
						}
					 ?>
				</td>
			</tr>
			<?php } } ?>
		</table>
		<div class="text-center">
		  <ul class="pagination">
		  	<?php 
		  		for ($i=1; $i <= $hal; $i++) { 
		  			?>
					<li <?php if($page ==$i){ echo "class='active'";} ?>><a href="?p=load_buku&hal=<?php echo $i; ?>"><?php echo $i; ?></a></li>
		  			<?php
		  		}
		  	 ?>
		  </ul>
		</div>
	</div>
</div>