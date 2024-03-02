<?php
if (isset($_SESSION['user']['id_siswa'])) {
    $id_siswa = $_SESSION['user']['id_siswa'];
    $user = getUser($id_siswa, $koneksi);
} elseif (isset($_SESSION['user']['id_guru'])) {
    $id_guru = $_SESSION['user']['id_guru'];
    $user = getUser($id_guru, $koneksi);
}

function getUser($id, $koneksi){
    if (is_numeric($id)) {
        $sql = "SELECT * FROM siswa WHERE id_siswa = ?";
        if (isset($_SESSION['user']['id_guru'])) {
            $sql = "SELECT * FROM guru WHERE id_guru = ?";
        }
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        
        $result = $stmt->get_result();
        if ($result->num_rows === 1) {
            return $result->fetch_assoc();
        }
    }
    return null;
}
?>
