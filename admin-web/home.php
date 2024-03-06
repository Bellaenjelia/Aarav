<!-- Animated -->
<div class="animated fadeIn">
    <!-- Widgets  -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-1">
                        <i class="pe-7s-users"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><span class="count"><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM pengelola"));?></span></div>
                                <div class="stat-heading">Pengelola</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-2">
                        <i class="pe-7s-users"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><span class="count"><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM siswa"));?></span></div>
                                <div class="stat-heading">Siswa</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-3">
                            <i class="pe-7s-browser"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><span class="count"><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM percakapan"));?></span></div>
                                <div class="stat-heading">Konseling</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-4">
                        <i class="pe-7s-browser"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><span class="count"><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM aduan"));?></span></div>
                                <div class="stat-heading">Aduan</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                        <table class="table">
                        <?php
                    if (isset($_SESSION['user']['level'])) {
                    ?>
                    <tr>
                        <td width="200">Nama User</td>
                        <td width="1">:</td>
                        <td><?php echo $_SESSION['user']['username']; ?></td>
                    </tr>
                    <tr>
                        <td width="200">Level User</td>
                        <td width="1">:</td>
                        <td><?php echo $_SESSION['user']['level']; ?></td>
                    </tr>
                    <?php
                    }else {
                    ?>
                    <tr>
                        <td width="200">Nama User</td>
                        <td width="1">:</td>
                        <td><?php echo $_SESSION['user']['nama']; ?></td>
                    </tr>
                    <tr>
                        <td width="200">Level User</td>
                        <td width="1">:</td>
                        <td>Guru</td>
                    </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <td width="200">Tanggal Login</td>
                        <td width="1">:</td>
                        <td><?php echo date('d-m-Y'); ?></td>
                    </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>