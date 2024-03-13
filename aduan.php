<!-- ======= Aduan Section ======= -->
<?php
if (isset($_POST['bsimpan'])) {
    $id_siswa= $_SESSION ['user'] ['id_siswa'];
    $tgl_aduan = date('Y-m-d h:i:s');
    $tgl_kejadian = $_POST['tgl_kejadian'];
    $lokasi = $_POST['lokasi'];
    $isi = $_POST['isi'];
    
    $foto = $_FILES['foto'];
    $nama_foto = date('YmdHis')."_".$foto['name'];
    move_uploaded_file($foto['tmp_name'], "bukti/".$nama_foto);

    $query = mysqli_query($koneksi, "INSERT INTO aduan (id_siswa, isi, tgl_aduan, tgl_kejadian, lokasi, foto) VALUES ('$id_siswa', '$isi', '$tgl_aduan', '$tgl_kejadian', '$lokasi', '$nama_foto')");

    if ($query) {
        echo "<script>alert('Tambah data berhasil');document.location='index.php?page=aduan';</script>";
    } else {
        echo "<script>alert('Tambah data gagal');document.location='index.php?page=aduan';</script>";
    }
}
?>

<style>
    .aduan .text-center button{
        background: none; 
        padding:1rem; 
        border-radius:1rem; 
        border:1px solid #AAD9BB; 
        margin-top:1.5rem; 
        width:10rem; 
        color:#637E76;
    }
    .aduan .text-center button:hover{
        background: #C5FFF8;
    }
</style>

<section id="aduan" class="aduan page">
    <div class="container" data-aos="fade-up">

    <div class="section-title m-3">
        <h2>Aduan</h2>
        <p>Berikan Pernyataan Anda dengan Jujur!</p>
    </div>

    <div class="row">

        <div class="col-lg-6" style="margin-left: 3rem;">
        <form method="post" role="form" data-aos="fade-up" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-sm-7 col-form-label" style="color: black;">Tanggal Kejadian :</label>
                <input placeholder="tgl_kejadian" type="date" class="form-control" name="tgl_kejadian" id="tgl_kejadian" required>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            <script>
                $('#tgl_kejadian').attr('max', new Date().toISOString().split('T')[0]);
            </script>
            <div class="form-group mt-3">
                <label class="col-sm-7 col-form-label" style="color: black;">Lokasi :</label>
                <input placeholder="Lokasi" type="text" class="form-control" name="lokasi" id="lokasi" required>
            </div>
            <div class="form-group mt-3">
                <label class="col-sm-7 col-form-label" style="color: black;">Aduan :</label>
                <textarea placeholder="Isi Aduan" class="form-control" name="isi" rows="5" required></textarea>
            </div>
            <div class="form-group mt-3">
                <label class="col-sm-7 col-form-label" style="color: black;">Bukti :</label>
                <input placeholder="Kirim Bukti" type="file" class="form-control" name="foto"id="foto" required>
            </div>
            <div class="text-center"><button type="submit" name="bsimpan">Kirim Aduan</button></div>
        </form>
        </div>
        <div class="image col-xl-5 d-flex align-items-stretch justify-content-center order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100" style="margin-top:-3rem; width:40%; margin-left:4rem;">
            <img src="assets/img/features.svg" class="img-fluid" alt="">
          </div>
        </div>
    </div>

    </div>
</section><!-- End Contact Section -->