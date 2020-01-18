<?php 
    include'../inc/koneksi.php';
    session_start();
    if ($_SESSION['userweb']=="") {
        header('location:../index.php');
    }
    if ($_SESSION['level']=="admin") {
        header('location:../admin/index.php');
    }

    $qprofil = mysqli_query($koneksi, "SELECT * FROM kasir WHERE id_kasir='$_SESSION[userweb]' ");
    $profil = mysqli_fetch_array($qprofil);
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="plugins/images/logo-kasir.png">
    <title>Kasir</title>
    <!-- Bootstrap Core CSS -->
    <link href="html/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="html/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="html/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="html/css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header">
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="index.php?p=dashboard">
                        <img style="height: 60px;" src="plugins/images/kasir.png" alt="">
                    </a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a class="nav-toggler open-close waves-effect waves-light hidden-md hidden-lg" href="javascript:void(0)"><i class="fa fa-bars"></i></a>
                    </li>
                    <li>
                        <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                            <input type="text" placeholder="Search..." class="form-control"> 
                            <a href="">
                                <i class="fa fa-search"></i>
                            </a> 
                        </form>
                    </li>
                    <li>
                        <a class="profile-pic" href="index.php?p=profile"> <img src="plugins/images/users/<?php echo $profil['foto'] ?>" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo $profil['nama']; ?></b></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav nav-pills nav-stacked" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        <a href="index.php?p=dashboard" class="waves-effect"><i class="fa fa-home fa-fw" aria-hidden="true"></i>Dashboard</a>
                    </li>
                    <li>
                      <a href="index.php?p=input_penjualan" class="waves-effect"><i class="fa fa-paper-plane fa-fw" aria-hidden="true"></i>Input Penjualan</a>
                    </li>
                    <li>
                      <a href="index.php?p=data_penjualan" class="waves-effect"><i class="fa fa-clipboard fa-fw" aria-hidden="true"></i>Data / laporan penjualan</a>
                    </li>
                    <li>
                      <a href="../inc/logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?')" class="waves-effect"><i class="fa  fa-sign-out fa-fw" aria-hidden="true"></i>Logout</a>
                    </li>
                </ul>

            </div>
            
        </div>

        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
            <?php 
                if (@$_GET['p'] == "") {
                  include_once 'html/dashboard.php';
                }
                elseif (@$_GET['p'] == "dashboard") {
                  include_once 'html/dashboard.php';
                }
                elseif (@$_GET['p'] == "input_penjualan") {
                  include_once 'html/input_penjualan.php';
                }
                elseif (@$_GET['p'] == "load_buku") {
                  include_once 'html/load_buku.php';
                }
                elseif (@$_GET['p'] == "hapus_keranjang") {
                  include_once 'html/hapus_keranjang.php';
                }
                elseif (@$_GET['p'] == "detail") {
                  include_once 'html/detail.php';
                }
                elseif (@$_GET['p'] == "detail_jual") {
                  include_once 'html/detail_jual.php';
                }
                elseif (@$_GET['p'] == "data_penjualan") {
                  include_once 'html/data_penjualan.php';
                }
                elseif (@$_GET['p'] == "hapus_penjualan") {
                  include_once 'html/hapus_penjualan.php';
                }
                elseif (@$_GET['p'] == "profile") {
                  include_once 'html/profile.php';
                }
                elseif (@$_GET['p'] == "edit_profil") {
                  include_once 'html/edit_profil.php';
                }
                elseif (@$_GET['p'] == "hapus_foto") {
                  include_once 'html/hapus_foto.php';
                }
                elseif (@$_GET['p'] == "selesai") {
                  include_once 'html/selesai.php';
                }
                elseif (@$_GET['p'] == "print") {
                  include_once 'html/print.php';
                }
             ?>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2019 &copy; Muhammad Zikri</footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="html/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="html/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="html/js/waves.js"></script>
    <!--Counter js -->
    <script src="plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!-- chartist chart -->
    <script src="plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
    <script src="plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="html/js/custom.min.js"></script>
    <script src="plugins/bower_components/toast-master/js/jquery.toast.js"></script>
</body>

</html>