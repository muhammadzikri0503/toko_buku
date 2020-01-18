<?php
	$id_distributor = $_GET['id_distributor'];

	$query = mysqli_query($koneksi, "DELETE FROM distributor WHERE id_distributor = '$id_distributor'");

	if($query) {
		echo "<script>alert('Hapus data berhasil');</script>";
		echo "<script>location='index.php?p=data_distributor';</script>";
	}
	else{
		echo "<script>alert('Hapus data gagal');</script>";
	}
?>