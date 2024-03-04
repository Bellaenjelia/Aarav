<?php
function getLastChat($id_1, $id_2, $koneksi) {
    // Prepare and execute the SQL query to fetch the last chat message
    $sql = "SELECT * FROM chat WHERE (id_asal = ? AND id_tujuan = ?) OR (id_asal = ? AND id_tujuan = ?) ORDER BY id_chat DESC LIMIT 1";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("iiii", $id_1, $id_2, $id_2, $id_1);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if there are any rows returned
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row; // Return the last chat message
    } else {
        return false; // Return false if no chat message is found
    }
}
?>

