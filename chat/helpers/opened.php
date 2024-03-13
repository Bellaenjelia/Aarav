<?php 
// Define the opened function
function opened($id_asal, $id_tujuan, $koneksi){
    $sql = "UPDATE chat SET opened = 1 WHERE id_asal = ? AND id_tujuan = ? AND opened = 0";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ii", $id_asal, $id_tujuan);
    $stmt->execute();
}
?> 
