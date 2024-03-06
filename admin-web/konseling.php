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
                $id_1 = $_SESSION['user']['id_guru']; // Assuming this is the user's ID
                $id_2 = $conversation['id_siswa'];; // Assuming this is the recipient's ID
                $lastChat = getLastChat($id_1, $id_2, $koneksi);
        ?>
        <div class="card konseling-card mb-3" data-aos="zoom-in">
            <div class="card-body">
                <a href="?page=chat&id=<?= $conversation['id_siswa'];?>" class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center nama-guru">
                        <span class="fs-xs m-2"><?= $conversation['id_siswa']; ?><br>
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
                <div class="alert alert-primary" role="alert">
                    Belum ada percakapan.
                </div>
            </div>
        </div>
        <?php
            }
        }
        ?>
    </div>
</section>