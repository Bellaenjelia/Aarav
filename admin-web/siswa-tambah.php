<?php
if(isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $query = mysqli_query($koneksi, "INSERT INTO siswa (username,password) VALUES ('$username','$password')");
        if ($query) {
            echo '<script>alert("Tambah data berhasil")</script>';
        } else {
            echo '<script>alert("Tambah data gagal")</script>';
        }
    }
   
?>


    <div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body" >
                    <h4 class="card-title">Tambah Data</h4>             
                    <a href="?page=siswa" class="btn btn-primary" style="margin-bottom: 1rem;">Kembali</a>
                    
                    
                    <form method="post">
                        <table class="table">
                           
                            <tr>
                                <td width="200">Username</td>
                                <td width="1">:</td>
                                <td><input class="form-control" type="text" name="username" required></td>
                            </tr>
                            <tr>
                                <td width="200">Password</td>
                                <td width="1">:</td>
                                <td><input class="form-control" type="password" name="password" required></td>
                            </tr>
                           
                            <tr>
                                <td></td>
                                <td></td>
                                <td><button class="btn btn-success" type="submit">Simpan</button></td>
                            </tr>
                            
                        </table>
                    </form>
				</div>
			</div>
		