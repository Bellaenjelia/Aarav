<?php
if (isset($_SESSION['user']['id_siswa'])) {
    $id_siswa = $_SESSION['user']['id_siswa'];
    $user = getUser($id_siswa, $koneksi);
} elseif (isset($_SESSION['user']['id_guru'])) {
    $id_guru = $_SESSION['user']['id_guru'];
    $user = getUser($id_guru, $koneksi);
}

function getConversation($id, $koneksi){
    $sql = "SELECT * FROM percakapan WHERE id_guru=? OR id_siswa=?";

    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ii", $id, $id); // Bind parameters
    $stmt->execute();
    
    $result = $stmt->get_result(); // Get the result set
    if ($result->num_rows > 0) { // Check if there are rows
        $conversations = $result->fetch_all(MYSQLI_ASSOC); // Fetch all rows as associative arrays
        
        $user_data = [];
        foreach ($conversations as $conversation) {
            if ($conversation['id_siswa'] == $id) {
                $sql2 = "SELECT * FROM guru WHERE id_guru=?";
                $stmt2 = $koneksi->prepare($sql2);
                $stmt2->bind_param("i", $conversation['id_guru']); // Bind parameter
                $stmt2->execute();
                $result2 = $stmt2->get_result();
                $userData = $result2->fetch_assoc();
            } elseif ($conversation['id_guru'] == $id) {
                $sql2 = "SELECT * FROM siswa WHERE id_siswa=?";
                $stmt2 = $koneksi->prepare($sql2);
                $stmt2->bind_param("i", $conversation['id_siswa']); // Bind parameter
                $stmt2->execute();
                $result2 = $stmt2->get_result();
                $userData = $result2->fetch_assoc();
            }
            
            array_push($user_data, $userData);
        }
        return $user_data;
    } else {
        return []; // Return an empty array if no conversations found
    }
}

?>