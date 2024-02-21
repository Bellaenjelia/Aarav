<!-- ======= Aduan Section ======= -->
<section id="aduan" class="contact">
    <div class="container" data-aos="fade-up">

    <div class="section-title m-3">
        <h2>Aduan</h2>
        <p>........</p>
    </div>

    <div class="row">

        <div class="col-lg-6" style="margin-left: 3rem;">
        <form action="forms/aduan.php" method="post" role="form" class="php-email-form" data-aos="fade-up">
            <div class="form-group">
            <label class="col-sm-7 col-form-label" style="color: black;">Tanggal Aduan :</label>
            <input placeholder="Tanggal Aduan" type="date" name="tgl_aduan" class="form-control" id="tgl_aduan" required>
            </div>
            <div class="form-group mt-3">
            <label class="col-sm-7 col-form-label" style="color: black;">Tanggal Kejadian :</label>
            <input placeholder="tgl_kejadian" type="date" class="form-control" name="tgl_kejadian" id="email" required>
            </div>
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
            <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
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