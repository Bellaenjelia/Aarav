<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "UPDATE aduan set status='diproses' WHERE id_aduan=$id");
if($query) {
    echo '<script>alert("Sedang diproses."); location.href="index.php?page=aduan";</script>';
}
?>

