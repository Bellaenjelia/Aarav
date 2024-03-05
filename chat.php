<?php
if (isset($_GET['id'])) {
    $id_guru = mysqli_real_escape_string($koneksi, $_GET['id']);
    $chats = getChats($_SESSION['user']['id_siswa'], $id_guru, $koneksi);
    $sql = mysqli_query($koneksi, "SELECT * FROM guru WHERE id_guru = {$id_guru}");
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        opened($row['id_guru'], $koneksi, $chats);
?>
<section class="chat page">
    <div class="container">
        <div class="card chat-card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="nama-guru">
                        <span><?php echo $row['nama']; ?></span>
                    </div>
                </div>
                <div class="messenger-box chat-box py-5">
                    <ul id="chatBox">
                        <?php
                        if (!empty($chats)) {
                            foreach($chats as $chat){
                                if($chat['id_asal'] == $_SESSION['user']['id_siswa']) {
                        ?>
                        <li>
                            <div class="msg-sent msg-container">
                                <div class="msg-box">
                                    <div class="inner-box">
                                        <div class="name">
                                            Anda
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
                                else {
                        ?>
                        <li>
                            <div class="msg-received msg-container">
                                <div class="msg-box">
                                    <div class="inner-box">
                                        <div class="name">
                                            <?php echo $row['nama']; ?>
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
                        } else {
                        ?>
                        <div class="alert alert-primary" role="alert">
                        Belum ada pesan, mulai percakapan sekarang!
                        </div>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="typing-area">
                    <textarea id="message" class="form-control"></textarea>
                    <button id="sendBtn">
                        <i class="bi bi-send"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    } else {
        echo "Guru not found";
    }
} else {
    echo "Guru ID not provided";
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    function scrollDown() {
        let chatBox = document.getElementById('chatBox');
        chatBox.scrollTop = chatBox.scrollHeight;
    }

    $(document).ready(function(){
        $("#sendBtn").on('click', function(){
            var message = $("#message").val();
            if (message === "") return;

            var id_tujuan = <?php echo isset($_SESSION['user']['id_siswa']) ? $row['id_guru'] : $row['id_siswa']; ?>;

            $.post("chat/ajax/insert.php",
            {
                message: message,
                to_id: id_tujuan
            },
            function(data, status){
                $("#message").val("");
                $("#chatBox").append(data);
                scrollDown();
            });
        });


        function fetchData() {
            var id_tujuan = <?php echo isset($_SESSION['user']['id_siswa']) ? $row['id_guru'] : $row['id_siswa']; ?>;
            $.post("chat/ajax/getMessage.php",
            {
                id_2: id_tujuan
            },
            function(data, status){
                $("#chatBox").append(data);
                if (data != "") scrollDown();
            });
        }
        fetchData(); 
    });
</script>
