<?php
include '../../authentication/koneksi.php';

// Check if the message and recipient ID are set
if (isset($_POST['message']) && isset($_POST['to_id'])) {
    $message = $_POST['message']; // Corrected
    $id_tujuan = $_POST['to_id']; // Ensure this matches the name sent from JavaScript

    // Get the sender's ID based on their role
    if (isset($_SESSION['user']['id_siswa'])) {
        $id_asal = $_SESSION['user']['id_siswa'];
    } elseif (isset($_SESSION['user']['id_guru'])) {
        $id_asal = $_SESSION['user']['id_guru'];
    }

    // Insert the message into the database
    $sql = "INSERT INTO chat(id_asal, id_tujuan, chat) VALUES (?, ?, ?)";
    $stmt = $koneksi->prepare($sql);
    if (!$stmt) {
        // Handle statement preparation error
        echo "Error: " . $koneksi->error;
    } else {
        $res = $stmt->execute([$id_asal, $id_tujuan, $message]);
        if ($res) {
            // Check if a conversation already exists between the sender and recipient
            $sql2 = "SELECT * FROM percakapan WHERE (id_guru=? AND id_siswa=?) OR (id_guru=? AND id_siswa=?)";
            $stmt2 = $koneksi->prepare($sql2);
            if (!$stmt2) {
                // Handle statement preparation error
                echo "Error: " . $koneksi->error;
            } else {
                $stmt2->execute([$id_asal, $id_tujuan, $id_tujuan, $id_asal]);
                // Fetch the current time
                $time = date("h:i:s a");
                // Store the result set from the query
                $stmt2->store_result();
                // Get the number of rows returned by the query
                $row_count = $stmt2->num_rows;
                // If no conversation exists, insert a new conversation
                if ($row_count == 0) {
                    $sql3 = "INSERT INTO percakapan(id_guru, id_siswa) VALUES (?, ?)";
                    $stmt3 = $koneksi->prepare($sql3);
                    if (!$stmt3) {
                        // Handle statement preparation error
                        echo "Error: " . $koneksi->error;
                    } else {
                        // Insert the conversation based on the sender's role
                        if (isset($_SESSION['user']['id_siswa'])) {
                            $stmt3->execute([$id_tujuan, $id_asal]);
                        } elseif (isset($_SESSION['user']['id_guru'])) {
                            $stmt3->execute([$id_asal, $id_tujuan]);
                        }
                    }
                }
                // Display the sent message
                echo '<li>
                    <div class="msg-sent msg-container">
                        <div class="msg-box">
                            <div class="inner-box">
                                <div class="name">
                                    Anda
                                    <div class="send-time">' . $time . '</div>
                                </div>
                                <div class="meg">' . $message . '</div>
                            </div>
                        </div>
                    </div>
                </li>';
            }
        } else {
            // Handle the case where the message insertion fails
            echo "Failed to send message.";
        }
    }
}
?>
