<?php
	$id_penjualan = $_GET['id_penjualan'];

	$query = mysqli_query($koneksi, "DELETE FROM penjualan WHERE id_penjualan = '$id_penjualan'");

	if($query) {
		echo "<script>alert('Hapus data berhasil');</script>";
		echo "<script>location='index.php?p=data_penjualan';</script>";
	}
	else{
		echo "<script>alert('Hapus data gagal');</script>";
	}
?>