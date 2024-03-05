<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "UPDATE aduan set status='ditolak' WHERE id_aduan=$id");
if($query) {
    echo '<script>alert("Aduan ditolak"); location.href="index.php?page=aduan";</script>';
}
?>

