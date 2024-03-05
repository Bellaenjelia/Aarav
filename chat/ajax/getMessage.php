<?php
// getMessage function to fetch and display messages
function getMessage($id_1, $id_2, $koneksi) {
    // Prepare and execute SQL query to fetch chat messages
    $sql = "SELECT * FROM chat WHERE id_tujuan=? AND id_asal=? AND opened=0 ORDER BY id_chat ASC";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ii", $id_1, $id_2);
    $stmt->execute();

    // Store the result set
    $result = $stmt->get_result();

    // Loop through the fetched chats and display new messages
    while ($chat = $result->fetch_assoc()) {
        // Mark the message as opened
        $sql_update = "UPDATE chat SET opened = 1 WHERE id_chat = ?";
        $stmt_update = $koneksi->prepare($sql_update);
        $stmt_update->bind_param("i", $chat['id_chat']);
        $stmt_update->execute();

        // Display the message
        $sender_name = ($id_1 == $_SESSION['user']['id_siswa']) ? "Guru" : "Siswa";
        ?>
        <<li>
            <div class="msg-received msg-container">
                <div class="msg-box">
                    <div class="inner-box">
                        <div class="name">
                            <?= $sender_name; ?>
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
?>
