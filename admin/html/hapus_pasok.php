<?php
	$id_pasok = $_GET['id_pasok'];

	$query = mysqli_query($koneksi, "DELETE FROM pasok WHERE id_pasok = '$id_pasok'");

	if($query) {
		echo "<script>alert('Hapus data berhasil');</script>";
		echo "<script>location='index.php?p=data_pemasukan';</script>";
	}
	else{
		echo "<script>alert('Hapus data gagal');</script>";
	}
?>