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
    <div class="container w-600">
        <div class="section-title" data-aos="zoom-in">
            <h2>Konseling</h2>
            <p>Ayo temukan solusi dan dukungan yang Anda butuhkan!</p>
        </div>
        <?php
        if (!empty($conversations)) {
            foreach ($conversations as $conversation) {
                $id_1 = $_SESSION['user']['id_siswa'];
                $id_2 = $conversation['id_guru'];
                $lastChat = getLastChat($id_1, $id_2, $koneksi);
        ?>
        <div class="card konseling-card mb-3" data-aos="zoom-in">
            <div class="card-body">
                <a href="?page=chat&id=<?= $conversation['id_guru'];?>" class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center nama-guru">
                        <span class="fs-xs m-2"><?= $conversation['nama']; ?><br>
                        <small>
                        <?php
                            if ($lastChat) {
                                // Display the last chat message
                                echo $lastChat['chat'];
                            } else {
                                // No chat messages found
                                echo "No chat messages yet.";
                            }
                            ?>
                        </small>            	
                    </div>
                    <?php
                    $id_siswa = $_SESSION['user']['id_siswa'];
                    $query_open = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM chat WHERE id_tujuan = $id_siswa AND opened = 0"));
                    ?>
                    <span class="badge badge-pill rounded-circle bg-danger p-2 <?php if ($query_open == 0) echo 'visually-hidden'; ?>">
                        <?php echo $query_open; ?>
                    </span>
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