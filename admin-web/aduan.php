<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Data Aduan</h4>                   
                    <div class="table-responsive">
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
                                Lokasi
                            </th>
                            <th>
                                Bukti
                            </th>
                            <th>
                                Aksi
                            </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT*FROM aduan");
                    while ($data = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i++; ?></th>
                            <td><?php echo $data['isi']; ?></td>
                            <td><?php echo $data['tgl_aduan']; ?></td>
                            <td><?php echo $data['tgl_kejadian']; ?></td>
                            <td><?php echo $data['lokasi']; ?></td>
                            <td><img src="../bukti/<?php echo $data['foto']; ?>" alt="" width="100"></td>
                            <td>
                                <a onclick="return confirm('Yakin Hapus?')" class="btn btn-danger" href="?page=aduan-hapus&id=<?php echo $data['id_aduan']; ?>"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php
                    }
                        ?>
                            
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->
            
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>