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
                               Status
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
                            <td>
                            <?php
                                 if ($data ['status'] == 'diproses') {
                            ?>
                            <a href="?page=aduan-selesai&id=<?php echo $data['id_aduan'];?>" target="_blank" class="btn btn-success"><i class="fa-solid fa-check"></i></a>
                            <a href="?page=aduan-ditolak&id=<?php echo $data['id_aduan'];?>" target="_blank" class="btn btn-danger"><i class="fa-solid fa-xmark"></i></a>
                            <?php
                                 }elseif ($data ['status'] != 'diproses') {
                                    echo $data ['status'];
                                 }
                            ?>  
                            
                        </td>
                            <td><?php echo $data['lokasi']; ?></td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#modalBukti<?php echo $data['id_aduan'];?>">
                                    <img src="../bukti/<?php echo $data['foto']; ?>" alt="" width="100">
                                </button>
                            </td>
                            <?php
                                 if ($data ['status'] != 'diproses') {
                            ?>  
                            <td>
                                <a onclick="return confirm('Yakin Hapus?')" class="btn btn-danger" href="?page=aduan-hapus&id=<?php echo $data['id_aduan']; ?>"><i class="fa-solid fa-trash"></i></a>
                            </td>
                            <?php
                                 }
                            ?>  
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

<?php
$query = mysqli_query($koneksi, "SELECT * FROM aduan");
while ($data = mysqli_fetch_array($query)) {
?>
<!-- Modal -->
<div class="modal fade" id="modalBukti<?php echo $data['id_aduan'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Bukti</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="../bukti/<?php echo $data['foto']; ?>" alt="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php
}
?>