<?php 
  include'inc/koneksi.php';
  session_start();
  if(@$_SESSION['userweb'] != ""){
    if ($_SESSION['level']="admin") {
      header('location:admin/index.php');
    }
    else if($_SESSION['level']="kasir"){
      header('location:kasir/index.php');
    }
  }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="login.png">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
    	<section id="content">
    		<form action="" method="POST">
    			<h1><span class="glyphicon glyphicon-book"></span> Toko Buku</h1>
          <div class="alert alert-info" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign"></span> Masukkan username atau password dengan benar!
          </div>  
    			<div>
    				<input type="text" placeholder="Username" required="" id="username" name="user" />
    			</div>
    			<div>
    				<input type="password" placeholder="Password" required="" id="password" name="pass" />
    			</div>
          <div>
      			<input type="submit" name="flogin" value="Login">
            <a href="#">Forget the password?</a>
            <a href="#">Register</a>
          </div>
    		</form>
        <?php 
          if (isset($_POST['flogin'])) {
            $user = mysqli_real_escape_string($koneksi,htmlentities($_POST['user']));
            $pass = mysqli_real_escape_string($koneksi,htmlentities(md5($_POST['pass'])));

            $qlogin = mysqli_query($koneksi, "SELECT * FROM kasir WHERE username='$user' AND password='$pass' ");
            $cek = mysqli_num_rows($qlogin);
            $data = mysqli_fetch_array($qlogin);
            
            if ($cek < 1) {
              ?>
              <br>
              <div class="alert alert-danger">
                Maaf username atau password tidak cocok!
              </div>
              <?php
            }
            else{
              if ($data['status']=="nonaktif") {
                ?>
                <br>
                <div class="alert alert-danger">
                  Maaf user anda belum aktif!
                </div>
                <?php
              }
              else if($data['status']=="aktif"){
                $_SESSION['userweb']=$data['id_kasir'];
                $_SESSION['level']=$data['akses'];

                if ($data['akses']== "admin") {
                  header('location:admin/index.php');
                }
                else if($data['akses']== "kasir"){
                  header('location:kasir/index.php');
                }
              }
            }
          }
         ?>
    	</section>
    </div>

    <script src="assets/js/bootstrap.min.css"></script>
  </body>
</html>
