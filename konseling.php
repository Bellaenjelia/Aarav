<?php
if (isset($_SESSION['user']['id_siswa'])) {
    $user = getUser($_SESSION['user']['id_siswa'], $koneksi);
    $conversations = getConversation($user['id_siswa'], $koneksi);
  } elseif (isset($_SESSION['user']['id_guru'])) {
    $user = getUser($_SESSION['user']['id_guru'], $koneksi);
    $conversations = getConversation($user['id_guru'], $koneksi);
  }
?>
<section class="chat page d-flex justify-content-center align-items-center">
    <div class="container w-400">
        <?php
        if (!empty($conversations)) {
            foreach ($conversations as $conversation) {
        ?>
        <div class="card konseling-card mb-3" data-aos="zoom-in">
            <div class="card-body">
                <a href="?page=chat&id=<?= $conversation['id_guru'];?>" class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center nama-guru">
                        <img src="assets/img/apple-touch-icon.png" class="w-10 rounded-circle">
                        <span class="fs-xs m-2"><?= $conversation['nama']; ?><br>
                        <small>
                            
                        </small>            	
                    </div>
                </a>
            </div>
        </div>
        <?php
            }
        } else {
            $query = mysqli_query($koneksi, "SELECT*FROM guru");
            while ($data = mysqli_fetch_array($query)) {
        ?>
        <div class="card konseling-card mb-3" data-aos="zoom-in">
            <div class="card-body">
                <a href="?page=chat&id=<?php echo $data['id_guru'];?>" class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center nama-guru">
                        <img src="assets/img/apple-touch-icon.png" class="w-10 rounded-circle">
                        <span class="fs-xs m-2"><?php echo $data['nama'];?><br>           	
                    </div>
                </a>
            </div>
        </div>
        <?php
            }
        }
        ?>
    </div>
</section>