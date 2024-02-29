<?php
$id_guru = $_GET['id'];
?>
<section class="chat page">
    <div class="container">
        <div class="card chat-card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <a href="index.php" class="back-icon"><i class="bi bi-arrow-left"></i></a>
                    <img src="assets/img/apple-touch-icon.png" alt="" width="40" height="40" class="rounded-circle ms-3 me-2">
                    <div class="nama-guru">
                        <span>Nama Guru</span>
                    </div>
                </div>
                <div class="messenger-box chat-box py-5">
                    <ul>
                        <li>
                            <div class="msg-received msg-container">
                                <div class="avatar">
                                    <img src="admin-web/images/avatar/64-1.jpg" alt="">
                                    <div class="send-time">11.11 am</div>
                                </div>
                                <div class="msg-box">
                                    <div class="inner-box">
                                        <div class="name">
                                            John Doe
                                        </div>
                                        <div class="meg">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis sunt placeat velit ad reiciendis ipsam
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.msg-received -->
                        </li>
                        <li>
                            <div class="msg-sent msg-container">
                                <div class="avatar">
                                    <img src="admin-web/images/avatar/64-2.jpg" alt="">
                                    <div class="send-time">11.11 am</div>
                                </div>
                                <div class="msg-box">
                                    <div class="inner-box">
                                        <div class="name">
                                            John Doe
                                        </div>
                                        <div class="meg">
                                            Hay how are you doing?
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.msg-sent -->
                        </li>
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