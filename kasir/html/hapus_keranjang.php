<?php
	$id_buku = $_GET['id_buku'];
	$id_keranjang = $_GET['id_keranjang'];
	$jumlah = $_GET['jumlah'];

	$qbuku = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku='$id_buku' ");
	$buku = mysqli_fetch_array($qbuku);
	$stokupdate = $buku['stok'] + $jumlah;

	mysqli_query($koneksi, "UPDATE buku SET stok='$stokupdate' WHERE id_buku='$id_buku' ");

	$query = mysqli_query($koneksi, "DELETE FROM keranjang WHERE id_keranjang = '$id_keranjang'");

	if($query) {
		echo "<script>alert('Hapus data keranjang berhasil');</script>";
		echo "<script>location='index.php?p=input_penjualan';</script>";
	}
	else{
		echo "<script>alert('Data keranjang gagal di hapus');</script>";
	}
?>