<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Profile</h4>
    </div>
</div>
<!-- .row -->
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="white-box">
            <div class="user-bg">
                <div class="overlay-box">
                    <div class="user-content">
                        <a onclick="return confirm('Apakah anda yakin ingin menghapus foto profil?')" href="index.php?p=hapus_foto"><img src="plugins/images/users/<?php echo $profil['foto'] ?>" class="thumb-lg img-circle" alt="Telah di hapus"></a>
                        <h3 class="text-white"><?php echo $profil['username']; ?></h3>
                        <h5 class="text-white"><?php echo $profil['status'] ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-md-offset-2">
        <div class="white-box">
            <table class="table">
                <tr>
                    <th>Nama</th><td>:</td><td><?php echo $profil['nama']; ?></td>
                </tr>
                <tr>
                    <th>Alamat</th><td>:</td><td><?php echo $profil['alamat']; ?></td>
                </tr>
                <tr>
                    <th>Telepon</th><td>:</td><td><?php echo $profil['telepon']; ?></td>
                </tr>
            </table>
            <a class="btn btn-primary" href="index.php?p=edit_profil">Edit Data</a>
        </div>
    
        <div class="white-box">
            <h3 class="text-center">Edit username</h3>
            <form method="POST" action="">
                <div class="input-group">
                    <span class="input-group-addon" id="username">Username</span>
                    <input type="text" class="form-control" readonly="" id="username" value="<?php echo $profil['username']; ?>">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon" id="userbaru">Username Baru</span>
                    <input type="text" class="form-control" name="userbaru" id="userbaru" placeholder="Masukkan username baru">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon" id="pass">Password</span>
                    <input type="password" class="form-control" name="pass" id="pass" placeholder="Masukkan password anda">
                </div>
                <br>
                <button name="edit_user" class="btn btn-success">Simpan</button>
            </form>
            <!-- Fungsi edit username -->
            <?php
                if (isset($_POST['edit_user'])) {
                     $userbaru = $_POST['userbaru'];
                     $pass = $_POST['pass'];
                     if (md5($pass)==$profil['password']) {
                         mysqli_query($koneksi, "UPDATE kasir SET username='$userbaru' WHERE id_kasir='$profil[id_kasir]' ");
                         ?>
                         <script type="text/javascript">
                            alert('Username anda berhasil diubah, Silahkan login kembali !');
                            document.location.href="../inc/logout.php";
                         </script>
                         <?php
                     }
                     else{
                        ?>
                        <br>
                        <div class="alert alert-danger">
                            Password yang anda masukkan salah!
                        </div>
                        <?php
                     }
                 } 
             ?>
        </div>

        <div class="white-box">
            <h3 class="text-center">Edit password</h3>
            <form method="POST" action="">
                <div class="input-group">
                    <span class="input-group-addon" id="pass1">Password Baru</span>
                    <input type="password" class="form-control" name="pass1" id="pass1">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon" id="pass2">Ketik ulang password baru</span>
                    <input type="password" class="form-control" name="pass2" id="pass2">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon" id="pass_awal">Password</span>
                    <input type="password" class="form-control" name="pass_awal" id="pass_awal" placeholder="Masukkan password anda saat ini">
                </div>
                <br>
                <button name="edit_password" class="btn btn-info">Simpan</button>
            </form>
            <!-- Fungsi edit password -->
            <?php
                if (isset($_POST['edit_password'])) {
                     $pass1 = md5($_POST['pass1']);
                     $pass2 = md5($_POST['pass2']);
                     $pass = $_POST['pass_awal'];
                     if ($pass1 != $pass2) {
                         echo "Password konfirmasi tidak cocok !";
                     }
                     else{
                        if (md5($pass)==$profil['password']) {
                         mysqli_query($koneksi, "UPDATE kasir SET password='$pass1' WHERE id_kasir='$profil[id_kasir]' ");
                         ?>
                         <script type="text/javascript">
                            alert('Password anda berhasil diubah, Silahkan login kembali !');
                            document.location.href="../inc/logout.php";
                         </script>
                         <?php
                     }
                     else{
                        ?>
                        <br>
                        <div class="alert alert-danger">
                            Password yang anda masukkan salah!
                        </div>
                        <?php
                     }
                     }
                 } 
             ?>
        </div>
    </div>

</div>
<!-- /.row -->