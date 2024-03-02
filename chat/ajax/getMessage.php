<?php
if (isset($_POST['id_2'])) {
    include '../../authentication/koneksi.php';
    if (isset($_SESSION['user']['id_siswa'])) {
        $id_1  = $_SESSION['user']['id_siswa'];
    } elseif (isset($_SESSION['user']['id_guru'])) {
        $id_1  = $_SESSION['user']['id_guru'];
    }
    $id_2  = $_POST['id_2'];
    $opend = 0;

    $sql = "SELECT * FROM chat WHERE id_tujuan=? AND id_asal=? ORDER BY id_chat ASC";
    $stmt = $koneksi->prepare($sql);
    $stmt->execute([$id_1, $id_2]);
    
    // Store the result set
    $stmt->store_result();

    // Get the number of rows
    $num_rows = $stmt->num_rows;

    if ($num_rows > 0) {
        $result = $stmt->get_result();
        $chats = [];
        while ($row = $result->fetch_assoc()) {
            $chats[] = $row;
        }

        // Fetching the sender's name
        if (isset($_SESSION['user']['id_siswa'])) {
            $sql_name = "SELECT * FROM siswa WHERE id_siswa = ?";
            $stmt_name = $koneksi->prepare($sql_name);
            $stmt_name->execute([$id_1]);
            $row = $stmt_name->fetch();
        } elseif (isset($_SESSION['user']['id_guru'])) {
            $sql_name = "SELECT * FROM guru WHERE id_guru = ?";
            $stmt_name = $koneksi->prepare($sql_name);
            $stmt_name->execute([$id_1]);
            $row = $stmt_name->fetch();
        }

        // Loop through the chats
        foreach ($chats as $chat) {
            if ($chat['opened'] == 0) {
                $opened = 1;
                $chat_id = $chat['id_chat'];

                $sql_update = "UPDATE chat SET opened = ? WHERE id_chat = ?";
                $stmt_update = $koneksi->prepare($sql_update);
                $stmt_update->execute([$opened, $chat_id]);

                // Display the chat message
                ?>
                <li>
                    <div class="msg-received msg-container">
                        <div class="msg-box">
                            <div class="inner-box">
                                <div class="name">
                                    <?php echo $row['nama']; ?>
                                    <div class="send-time">
                                        <?= $chat['waktu'] ?> <!-- Assuming there's a 'timestamp' field in your chat table -->
                                    </div>
                                </div>
                                <div class="meg">
                                    <?= $chat['chat'] ?> <!-- Accessing the 'chat' field -->
                                </div>
                            </div>
                        </div>
                    </div><!-- /.msg-received -->
                </li>
                <?php
            }
        }
    }
}
?>
