<?php
// Assuming session_start() has been called before this code block
if (isset($_GET['id'])) {
    $id_siswa = mysqli_real_escape_string($koneksi, $_GET['id']);
    $chats = getChats($_SESSION['user']['id_guru'], $id_siswa, $koneksi);
    $sql = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id_siswa = {$id_siswa}");
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        opened($row['id_siswa'], $_SESSION['user']['id_guru'], $koneksi);
    }
}
?>
<div class="col">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title box-title"><?php echo $row['id_siswa']; ?></h4>
            <div class="card-content">
                <div class="messenger-box">
                    <ul id="chatBox" class="chat-box">
                    <?php
                        if (!empty($chats)) {
                            foreach($chats as $chat){
                                if($chat['id_asal'] == $_SESSION['user']['id_guru']) {
                        ?>
                        <li>
                            <div class="msg-sent msg-container">
                                <div class="msg-box">
                                    <div class="inner-box">
                                        <div class="name">
                                            Anda
                                            <div class="send-time"><?= $chat['waktu'] ?></div>
                                        </div>
                                        <div class="meg">
                                            <?= $chat['chat'] ?>
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
                                            Siswa
                                            <div class="send-time"><?= $chat['waktu'] ?></div>
                                        </div>
                                        <div class="meg">
                                        <?= $chat['chat'] ?>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.msg-sent -->
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
                    <div class="send-mgs">
                        <div class="yourmsg">
                            <input class="form-control" type="text" id="message">
                        </div>
                        <button class="btn msg-send-btn" id="sendBtn">
                            <i class="pe-7s-paper-plane"></i>
                        </button>
                    </div>
                </div><!-- /.messenger-box -->
            </div>
        </div> <!-- /.card-body -->
    </div><!-- /.card -->
</div>

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

            $.post("../chat/ajax/insert.php",
            {
                message: message,
                to_id: id_tujuan
            },
            function(data){
                $("#message").val("");
                $("#chatBox").append(data);
                scrollDown();
            });
        });


        function fetchData() {
        var id_tujuan = <?php echo isset($_SESSION['user']['id_siswa']) ? $row['id_guru'] : $row['id_siswa']; ?>;
            $.post("../chat/ajax/getMessage.php", { id_2: id_tujuan }, function(data){
                $("#chatBox").append(data);
                if (data != "") scrollDown(); // Ensure scrolling to the bottom if new data is fetched
            });
        }
        setInterval(fetchData, 1000);
    });
</script>