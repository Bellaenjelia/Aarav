<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "UPDATE aduan set status='selesai' WHERE id_aduan=$id");
if($query) {
    echo '<script>alert("Kasus Selesai."); location.href="index.php?page=aduan";</script>';
}
?>

