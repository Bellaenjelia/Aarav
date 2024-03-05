<?php
$id = $_SESSION['user']['id_siswa'];
$query = mysqli_query($koneksi, "SELECT*FROM siswa WHERE id_siswa=$id");
$data = mysqli_fetch_array($query);
?>

<section class="profile page-content content-wrapper stretch-card" style="margin-top: 2rem;">
    <div class="container py-5 card">
        <div class="background-profile">
            <img src="" class="rounded" alt="..." width="100%" height="280px" style="margin-bottom: 2rem;">
        </div>
        <div class="row justify-content-center profile-content">
            <div class="col-10">
                <div class="row">
                <div class="col-md-4 col-lg-2">
                        <div class="profile-pict mb-5">
                            
                         <img src="assets/images/user/default.jpg" class="rounded" alt="..." width="150" height="150">
                            
                           
                        </div>
                    </div>
                    <div class="col profile-detail mt-5" style="margin-left: 2rem;">
                        <h3><?php echo $_SESSION['user']['username']?></h3>
                        <p>
                            <?php 
                                if ($data['bio'] != "") {
                                    echo $data['bio'];
                                } else {
                                    echo "No bio yet";
                                }
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
            
                                <div class="table-responsive mt-3 ">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>
                                                    No
                                                </th>
                                                <th>
                                                    Aduan
                                                </th>
                                                <th>
                                                    Tanggal Aduan
                                                </th>
                                                <th>
                                                    Tanggal Kejadian
                                                </th>
                                                <th>
                                                    Status
                                                </th>
                                                <th>
                                                    Lokasi
                                                </th>
                                                <th>
                                                    Bukti
                                                </th>
                                                <?php
                                                    $where = "WHERE aduan.id_siswa=" . $_SESSION['user']['id_siswa'];
                                                ?>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        $i = 1;
                                        $query = mysqli_query($koneksi, "SELECT*FROM aduan $where");
                                        while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $i++; ?></th>
                                                <td><?php echo $data['isi']; ?></td>
                                                <td><?php echo $data['tgl_aduan']; ?></td>
                                                <td><?php echo $data['tgl_kejadian']; ?></td>
                                                <td><?php echo $data['status']; ?>
                                                <td><?php echo $data['lokasi']; ?></td>
                                                <td><img src="bukti/<?php echo $data['foto']; ?>" alt="" width="100"></td>
                                            </tr>
                                            <?php
                                        }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                
            
    </div>
</section>

       




