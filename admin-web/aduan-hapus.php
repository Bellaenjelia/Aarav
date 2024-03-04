<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM aduan WHERE id_aduan=$id");
if ($query) {
    echo '<script>alert("Data berhasil dihapus"); location.href="index.php?page=aduan"; </script>';
} else {
    echo '<script>alert("Data gagal dihapus"); location.href="index.php?page=aduan"; </script>';
}
?>