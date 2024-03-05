<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Data Guru</h4>
                              
                        <a href="?page=guru-tambah"  class="btn btn-secondary mb-3" style="border-radius:0.5rem;" >+ Tambah Data</a> 
                   
                    <div class="table-responsive">
                        <table class="table table-striped">
                        <thead>
                            <tr>
                            <th>
                                No
                            </th>
                            <th>
                                Nama
                            </th>
                            <th>
                                Aksi
                            </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 1;
                            $query = mysqli_query($koneksi, "SELECT*FROM guru");
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $i++; ?></th>
                                <td><?php echo $data['nama']; ?></td>
                                <td>
                                    <a class="btn btn-info" style="border-radius:0.5rem;" href="?page=guru-ubah&id=<?php echo $data['id_guru']; ?>"><i class="fa-solid fa-pen-to-square"></i> </a>
                                    <a onclick="return confirm('Yakin Hapus?')" class="btn btn-danger" style="border-radius:0.5rem;" href="?page=guru-hapus&id=<?php echo $data['id_guru']; ?>"><i class="fa-solid fa-trash"></i></a>
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
