<section class="chat page d-flex justify-content-center align-items-center">
    <div class="container w-400">
        <?php
        $query = mysqli_query($koneksi, "SELECT*FROM guru LEFT JOIN percakapan ON guru.id_guru = percakapan.id_guru");
        while ($data = (mysqli_fetch_array($query))) {
        ?>
        <div class="card konseling-card mb-3" data-aos="zoom-in">
            <div class="card-body">
                <a href="?page=chat&id=<?php echo $data['id_guru'];?>" class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center nama-guru">
                        <img src="assets/img/apple-touch-icon.png" class="w-10 rounded-circle">
                        <span class="fs-xs m-2"><?php echo $data['nama']?><br>
                        <small>
                            <?php echo $data['chat_akhir']?>
                        </small>            	
                    </div>
                </a>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</section>