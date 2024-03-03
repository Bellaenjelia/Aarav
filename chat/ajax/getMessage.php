<?php
function getMessage($id_1, $id_2, $koneksi)
{
    // Prepare and execute SQL query to fetch chat messages
    $sql = "SELECT * FROM chat WHERE id_tujuan=? AND id_asal=? ORDER BY id_chat ASC";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ii", $id_1, $id_2);
    $stmt->execute();

    // Store the result set
    $result = $stmt->get_result();

    // Fetch the rows
    $chats = $result->fetch_all(MYSQLI_ASSOC);

    // Loop through the fetched chats
    foreach ($chats as $chat) {
        if ($chat['opened'] == 0) {
            $opened = 1;
            $chat_id = $chat['id_chat'];

            // Update the chat status to opened
            $sql_update = "UPDATE chat SET opened = ? WHERE id_chat = ?";
            $stmt_update = $koneksi->prepare($sql_update);
            $stmt_update->bind_param("ii", $opened, $chat_id);
            $stmt_update->execute();

            // Fetch sender's name
            $sender_name = "";
            if ($id_1 == $_SESSION['user']['id_siswa']) {
                $sql_name = "SELECT nama FROM siswa WHERE id_siswa = ?";
                $stmt_name = $koneksi->prepare($sql_name);
                $stmt_name->bind_param("i", $id_1);
                $stmt_name->execute();
                $row = $stmt_name->get_result()->fetch_assoc();
                $sender_name = $row['nama'];
            } elseif ($id_1 == $_SESSION['user']['id_guru']) {
                $sender_name = "Siswa";
            }
            ?>
            <li>
                <div class="msg-received msg-container">
                    <div class="msg-box">
                        <div class="inner-box">
                            <div class="name">
                                <?= $sender_name ?>
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
?>