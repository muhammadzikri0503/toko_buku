<?php
$ambil = mysqli_query($koneksi,"SELECT * FROM kasir WHERE id_kasir='$profil[id_kasir]' ");
$pecah = $ambil->fetch_assoc();
$hapus_foto = $pecah['foto'];
if (file_exists("plugins/images/users/$hapus_foto")) {
	unlink("plugins/images/users/$hapus_foto");
}
mysqli_query($koneksi,"DELETE FROM kasir ON foto WHERE id_kasir='$profil[id_kasir]' ");
echo "<script>alert('Foto berhasil dihapus');</script>";
echo "<script>location='index.php?p=profile';</script>";
 ?>