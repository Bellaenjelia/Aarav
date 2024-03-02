<?php
function lastChat($id_1, $id_2, $koneksi){
    $sql = "SELECT chat FROM chat WHERE (id_asal=? AND id_tujuan=?) OR (id_tujuan=? AND id_asal=?) ORDER BY id_chat DESC LIMIT 1";
    $stmt = $koneksi->prepare($sql);
    $stmt->execute([$id_1, $id_2, $id_1, $id_2]);

    // Check if any rows are returned
    if ($stmt->rowCount() > 0) {
        // Fetch the last chat message
        $chat = $stmt->fetch();
        return $chat['chat']; // Return the last chat message
    } else {
        // No chat messages found, return an empty string
        return '';
    }
}
?>
