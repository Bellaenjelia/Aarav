<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM pengelola WHERE id_pengelola=$id");
if ($query) {
    echo '<script>alert("Data berhasil dihapus"); location.href="index.php?page=admin"; </script>';
} else {
    echo '<script>alert("Data gagal dihapus"); location.href="index.php?page=admin"; </script>';
}
?>