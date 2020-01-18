<?php
	$ambil = mysqli_query($koneksi,"SELECT * FROM kasir WHERE id_kasir='".$_GET['id_kasir']."' ");
	$data = $ambil->fetch_assoc();
	$foto = $data['foto'];
	if (file_exists("../kasir/plugins/images/users/$foto")) {
		unlink("../kasir/plugins/images/users/$foto");
	}
	mysqli_query($koneksi,"DELETE FROM kasir WHERE id_kasir='".$_GET['id_kasir']."' ");
	echo "<script>alert('Pegawai berhasil dihapus');</script>";
	echo "<script>location='index.php?p=data_pegawai';</script>";
 ?>