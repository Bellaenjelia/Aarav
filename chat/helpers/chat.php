<?php
// Define the getChats function to fetch chats between two users
function getChats($user_id_1, $user_id_2, $koneksi) {
    $chats = array();

    // Query to fetch chats between the two users
    $sql = "SELECT * FROM chat WHERE (id_asal = ? AND id_tujuan = ?) OR (id_asal = ? AND id_tujuan = ?)";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("iiii", $user_id_1, $user_id_2, $user_id_2, $user_id_1);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch each chat and store it in the chats array
    while ($row = $result->fetch_assoc()) {
        $chats[] = $row;
    }

    return $chats;
}
?>