<?php 
function opened($id_1, $koneksi, $chats){
    foreach ($chats as $chat) {
    	if ($chat['opened'] == 0) {
    		$opened = 1;
    		$chat_id = $chat['id_chat'];

    		$sql = "UPDATE chat SET   opened = ? WHERE id_asal=?  AND   id_tujuan = ?";
            $stmt = $koneksi->prepare($sql);
            $stmt->execute([$opened, $id_1, $chat_id]);
    	}
    }
}
?>