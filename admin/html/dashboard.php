<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Dashboard</h4> </div>
</div>

<div class="row">
    <div>
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading"><i class="fa fa-users fa-fw" aria-hidden="true"></i> Data Pegawai</div>
                <div class="panel-body">
                    <h4 class="text-center">
                        <?php 
                            $pegawai = mysqli_query($koneksi, "SELECT * FROM kasir ");
                            $jumlah = mysqli_num_rows($pegawai);
                            echo $jumlah;
                         ?>
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading"><i class="fa fa-shopping-basket fa-fw" aria-hidden="true"></i> Data Penjualan</div>
                <div class="panel-body">
                    <h4 class="text-center">
                        <?php 
                            $penjualan = mysqli_query($koneksi, "SELECT * FROM penjualan ");
                            $jumlah2 = mysqli_num_rows($penjualan);
                            echo $jumlah2;
                         ?>
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Data Distributor</div>
                <div class="panel-body">
                    <h4 class="text-center">
                        <?php 
                            $distributor = mysqli_query($koneksi, "SELECT * FROM distributor ");
                            $jumlah3 = mysqli_num_rows($distributor);
                            echo $jumlah3;
                         ?>
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="col-md-4 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading"><i class="fa fa-book fa-fw" aria-hidden="true"></i>Data Buku</div>
                <div class="panel-body">
                    <h4 class="text-center">
                        <?php 
                            $buku = mysqli_query($koneksi, "SELECT * FROM buku ");
                            $jumlah4 = mysqli_num_rows($buku);
                            echo $jumlah4;
                         ?>
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading"><i class="fa fa-refresh fa-spin" aria-hidden="true"></i> Riwayat Pemasukan</div>
                <div class="panel-body">
                    <h4 class="text-center">
                        <?php 
                            $pasok = mysqli_query($koneksi, "SELECT * FROM pasok ");
                            $jumlah5 = mysqli_num_rows($pasok);
                            echo $jumlah5;
                         ?>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>