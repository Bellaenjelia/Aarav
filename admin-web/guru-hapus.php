<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM guru WHERE id_guru=$id");
if ($query) {
    echo '<script>alert("Data berhasil dihapus"); location.href="index.php?page=guru"; </script>';
} else {
    echo '<script>alert("Data gagal dihapus"); location.href="index.php?page=guru"; </script>';
}
?>