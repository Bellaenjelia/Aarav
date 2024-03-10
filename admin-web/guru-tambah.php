<?php
if(isset($_POST['nama'])) {
    $id_guru = $_POST['id_guru'];
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    
    $query = mysqli_query($koneksi, "INSERT INTO guru (id_guru,nama,password) VALUES ('$id_guru','$nama','$password')");
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
                    <a href="?page=guru" class="btn btn-primary" style="margin-bottom: 1rem;">Kembali</a>
                    
                    
                    <form method="post">
                        <table class="table">
                           
                            <tr>
                                <td width="200">Kode Guru</td>
                                <td width="1">:</td>
                                <td><input class="form-control" type="number" name="id_guru" required></td>
                            </tr>
                            <tr>
                                <td width="200">Nama</td>
                                <td width="1">:</td>
                                <td><input class="form-control" type="text" name="nama" required></td>
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
		