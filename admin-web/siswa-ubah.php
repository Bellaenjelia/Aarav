<?php
$id = $_GET['id'];

if (isset($_POST['bsimpan'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysqli_query($koneksi, "UPDATE siswa SET username='$username', password='$password' WHERE id_siswa=$id");

    if ($_POST['password'] != "") {
        $query = mysqli_query($koneksi, "UPDATE siswa SET password='$password' WHERE id_siswa=$id");
    }

    if ($query) {
        echo "<script>alert('Ubah data berhasil');document.location='index.php?page=siswa';</script>";
    } else {
        echo "<script>alert('Ubah data gagal');document.location='index.php?page=siswa';</script>";
    }
}
$query = mysqli_query($koneksi, "SELECT*FROM siswa WHERE id_siswa=$id");
$data = mysqli_fetch_array($query);
?>


   
    <div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
                    <h4 class="card-title">Ubah Data</h4>             
                    <a href="?page=siswa" class="btn btn-primary" style="margin-bottom:1rem;">Kembali</a>

                    <form method="post">
                        <table class="table">
                     
                        <tr>
                            <td>Username</td>
                            <td>:</td>
                            <td><input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $data['username']?>"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td><input type="password" class="form-control" placeholder="Password" name="password"></td>
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