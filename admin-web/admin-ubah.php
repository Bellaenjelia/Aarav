<?php
$id = $_GET['id'];

if (isset($_POST['bsimpan'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $level = $_POST['level'];

    $query = mysqli_query($koneksi, "UPDATE pengelola SET nama='$nama', username='$username', password='$password', level='$level' WHERE id_pengelola=$id");

    if ($_POST['password'] != "") {
        $query = mysqli_query($koneksi, "UPDATE pengelola SET password='$password' WHERE id_pengelola=$id");
    }

    if ($query) {
        echo "<script>alert('Ubah data berhasil');document.location='index.php?page=admin';</script>";
    } else {
        echo "<script>alert('Ubah data gagal');document.location='index.php?page=admin';</script>";
    }
}
$query = mysqli_query($koneksi, "SELECT*FROM pengelola WHERE id_pengelola=$id");
$data = mysqli_fetch_array($query);
?>


   
    <div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
                    <h4 class="card-title">Ubah Data</h4>             
                    <a href="?page=admin" class="btn btn-primary" style="margin-bottom:1rem;">Kembali</a>

                    <form method="post">
                        <table class="table">
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><input type="text" class="form-control" placeholder="Nama" name="nama" value="<?php echo $data['nama']?>"></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>:</td>
                            <td><input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $data['username']?>"></td>
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
                            <td>Level</td>
                            <td>:</td>
                            <td>
                                <select class="form-control" aria-label="Default select example" name="level">
                                    <option selected></option>
                                    <option value="admin" <?php if($data['level'] == 'Admin') echo 'selected'; ?>>Admin</option>
                                    <option value="petugas" <?php if($data['level'] == 'Petugas') echo 'selected'; ?>>Petugas</option>
                                </select>
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