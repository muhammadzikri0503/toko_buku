<?php
	$id_buku = $_GET['id_buku'];

	$query = mysqli_query($koneksi, "DELETE FROM buku WHERE id_buku = '$id_buku'");

	if($query) {
		echo "<script>alert('Hapus data berhasil');</script>";
		echo "<script>location='index.php?p=data_buku';</script>";
	}
	else{
		echo "<script>alert('Hapus data gagal');</script>";
	}
?>