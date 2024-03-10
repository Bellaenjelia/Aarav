<?php
$id = $_GET['id'];

if (isset($_POST['bsimpan'])) {
    $id_guru = $_POST['id_guru'];
    $nama = $_POST['nama'];
    $password = md5($_POST['password']);

    $query = mysqli_query($koneksi, "UPDATE guru SET id_guru='$id_guru', nama='$nama', password='$password' WHERE id_guru=$id");

    if ($_POST['password'] != "") {
        $query = mysqli_query($koneksi, "UPDATE guru SET password='$password' WHERE id_guru=$id");
    }

    if ($query) {
        echo "<script>alert('Ubah data berhasil');document.location='index.php?page=guru';</script>";
    } else {
        echo "<script>alert('Ubah data gagal');document.location='index.php?page=guru';</script>";
    }
}
$query = mysqli_query($koneksi, "SELECT*FROM guru WHERE id_guru=$id");
$data = mysqli_fetch_array($query);
?>


   
    <div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
                    <h4 class="card-title">Ubah Data</h4>             
                    <a href="?page=guru" class="btn btn-primary" style="margin-bottom:1rem;">Kembali</a>

                    <form method="post">
                        <table class="table">
                     
                        <tr>
                            <td>Kode Guru</td>
                            <td>:</td>
                            <td><input type="number" class="form-control" placeholder="Kode Guru" name="id_guru" value="<?php echo $data['id_guru']?>"></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>:</td>
                            <td><input type="text" class="form-control" placeholder="Username" name="nama" value="<?php echo $data['nama']?>"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td>
                                <input type="password" class="form-control" placeholder="Password" name="password">
                                <div class="form-text"><small>*) Jika tidak ingin diubah, kosongkan saja</small></div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="submit" class="btn btn-success" name="bsimpan">Submit</button>
                            </td>
                        </tr>
                        </table>
                    </form>
				</div>
			</div>
		</div>
	</div>