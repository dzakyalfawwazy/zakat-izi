<?php 
include 'admin/acc/config.php';
if(isset($_POST['submit'])){
$date=date('Y-m-d');
$query=mysqli_query($conn,"INSERT INTO `tb_kunjungan`(`id_kunjungan`, `tanggal_kunjungan`, `nik_pengunjung`, `nama_pengunjung`, `keterangan_kunjungan`) VALUES (null,'$date','$_POST[nik]','$_POST[nama]','$_POST[keterangan]')");

if ($query) {
  echo "<script>window.alert('Terima Kasih atas kunjungan anda')</script>";
}
}
?>

<script src="plugins/jquery/jquery.min.js"></script>
<!-- ***** Welcome Area Start ***** -->
<section class="dorne-welcome-area bg-img bg-overlay" style="background-image: url(hanb/img/bg-img/hero-1.jpg);">
  <div class="container h-100">
    <div class="row h-100 align-items-center justify-content-center">
      <div class="col-12 col-md-10">
        <div class="hero-content">
          <h2>Rumah Singgah Pasien</h2>
          <h4>Inisiatif Zakat Indonesia</h4>
          <h2 style="background-color: green; margin-top: 10px; color: white;"><marquee> Untuk Kaum Dhuafa</marquee></h2>
        </div>
        <!-- Hero Search Form -->
        <div class="hero-search-form">
          <!-- Tabs -->
          <div class="nav nav-tabs" id="heroTab" role="tablist">
            <a class="nav-item nav-link active" id="nav-places-tab" data-toggle="tab" href="#nav-places" role="tab" aria-controls="nav-places" aria-selected="true">Info</a>
            <a class="nav-item nav-link" id="nav-events-tab" data-toggle="tab" href="#nav-events" role="tab" aria-controls="nav-events" aria-selected="false">..</a>
          </div>
          <!-- Tabs Content -->
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-places" role="tabpanel" aria-labelledby="nav-places-tab">
              <h6>Daftar Kunjungan</h6>
              <form action="#" method="post">
                
                <div class="input-group mr-2">
                  <input type="text" name="nik" class="form-control" placeholder="NIK">
                </div>
                <div class="input-group mr-2">
                  <input type="text" name="nama" class="form-control" placeholder="Nama Pengunjung">
                </div>
                <div class="input-group mr-2">
                  <input type="text" name="keterangan" class="form-control" placeholder="keterangan">
                </div>
                <button type="submit" name="submit" class="btn dorne-btn"><i class="fa fa-check pr-2" aria-hidden="true"></i> Kirim</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ***** Welcome Area End ***** -->

<!-- ***** Catagory Area Start ***** -->
<section class="dorne-catagory-area">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="all-catagories">
          <div class="row">
            <!-- Single Catagory Area -->
            <div class="col-12 col-sm-6 col-md">
              <div class="single-catagory-area wow fadeInUpBig" data-wow-delay="0.2s">
                <div class="catagory-content">
                  <img src="hanb/img/core-img/icon-1.png" alt="">
                  <a href="#">
                    <h6>RUMAH</h6>
                  </a>
                </div>
              </div>
            </div>
            <!-- Single Catagory Area -->
            <div class="col-12 col-sm-6 col-md">
              <div class="single-catagory-area wow fadeInUpBig" data-wow-delay="0.4s">
                <div class="catagory-content">
                  <img src="hanb/img/core-img/icon-2.png" alt="">
                  <a href="#">
                    <h6>SINGGAH</h6>
                  </a>
                </div>
              </div>
            </div>
            <!-- Single Catagory Area -->
            <div class="col-12 col-sm-6 col-md">
              <div class="single-catagory-area wow fadeInUpBig" data-wow-delay="0.6s">
                <div class="catagory-content">
                  <img src="hanb/img/core-img/icon-3.png" alt="">
                  <a href="#">
                    <h6>PASIEN</h6>
                  </a>
                </div>
              </div>
            </div>
            <!-- Single Catagory Area -->
            <div class="col-12 col-sm-6 col-md">
              <div class="single-catagory-area wow fadeInUpBig" data-wow-delay="0.8s">
                <div class="catagory-content">
                  <img src="hanb/img/core-img/icon-4.png" alt="">
                  <a href="#">
                    <h6>IZI</h6>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ***** Catagory Area End ***** -->

<!-- ***** About Area Start ***** -->
<section class="dorne-about-area section-padding-0-100">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="about-content text-center  wow fadeInUpBig">
          <h2>Rumah Singgah Pasien<br><span>Inisiatif Zakat Indonesia</span></h2>
        </div> 
        </div>
          <?php $sql=mysqli_query($conn,"SELECT * FROM tbl_profil where jenis_p = 'profil' order by tgl_p asc");
                while($data = mysqli_fetch_array($sql)) { ?>
      <div class="col-12 m-3">
        <div class="about-content text-center  wow fadeInUpBig">
                  <h4><?= $data['judul_p'] ?></h4>
                  <img src="hanb/img/profil/<?= $data["gambar_p"] ?>">
                  <p><?= $data['deskripsi_p'] ?></p>
        </div>
      </div>
          <?php } ?>
    </div>
  </div>
</section>
<!-- ***** About Area End ***** -->
<!-- ***** Features Restaurant Area Start ***** -->
<section class="dorne-features-restaurant-area bg-default">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="section-heading text-center">
          <span></span>
          <h4>Informasi Rumah Singgah</h4>
          <p>Terbaru</p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="features-slides owl-carousel">
          <!-- Single Features Area -->
           <?php $sql2=mysqli_query($conn,"SELECT * FROM tbl_profil where jenis_p='Informasi'");
          while($data2=mysqli_fetch_array($sql2)) { ?>
          <div class="single-features-area">
            <img src="hanb/img/profil/<?= $data2['gambar_p'] ?>" alt="">
            <div class="feature-content d-flex align-items-center justify-content-between">
              <div class="feature-title">
                <h5><?= $data2['judul_p'] ?></h5>
              </div>
              <div class="feature-favourite">
                <a href="#" data-toggle="modal" data-target="#<?= $data2['id_profil'] ?>"><i class="fa fa-heart-o"></i></a>
              </div>
            </div>
          </div>
        <?php } ?>
          <!-- Single Features Area -->
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ***** Features Restaurant Area End ***** -->

<!-- ***** Features Destinations Area Start ***** -->
<section class="dorne-features-destinations-area">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="section-heading dark text-center">
          <span></span>
          <h4>Berita Inisiatif Zakat Indonesia</h4>
          <p>Terbaru</p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="features-slides owl-carousel">
          <?php $sql1=mysqli_query($conn,"SELECT * FROM tbl_profil where jenis_p='Berita'");
          while($data1=mysqli_fetch_array($sql1)) { ?>
          <!-- Single Features Area -->
          <div class="single-features-area">
            <img src="hanb/img/profil/<?= $data1['gambar_p'] ?>" alt="">
            <!-- Price -->
            <div class="price-start">
              <p><?= $data1['tgl_p'] ?></p>
            </div>
            <div class="feature-content d-flex align-items-center justify-content-between">
              <div class="feature-title">
                <h5><?= $data1['judul_p'] ?></h5>
                <p><?= $data1['deskripsi_p'] ?></p>
              </div>
              <div class="feature-favourite">
                <a href="#" data-toggle="modal" data-target="#<?= $data1['id_profil'] ?>"><i class="fa fa-heart-o"></i></a>
              </div>
            </div>
          </div>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ***** Features Destinations Area End ***** -->
<!-- ***** Editor Pick Area Start ***** -->
<section class="dorne-editors-pick-area bg-img bg-overlay-9 section-padding-100" style="background-image: url(hanb/img/bg-img/hero-2.jpg);">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-heading text-center">
          <span></span>
          <h4>Fasilitas Rumah Singgah Izi</h4>
        </div>
      </div>
    </div>

    <div class="row">
       <?php $sql1=mysqli_query($conn,"SELECT * FROM tbl_profil where jenis_p='Fasilitas'");
          while($data1=mysqli_fetch_array($sql1)) { ?>
      <div class="col-12 col-lg-6">
        <div class="single-editors-pick-area wow fadeInUp" data-wow-delay="0.2s">
          <img src="hanb/img/bg-img/editor-1.jpg" alt="">
          <div class="editors-pick-info">
            <div class="places-total-destinations d-flex">
              <a href="#"><?= "Fasilitas" ?></a>
              <a href="#"><?= $data1['judul_p'] ?></a>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
    </div>
  </div>
</section>
<!-- ***** Editor Pick Area End ***** -->



<!-- ***** Features Events Area Start ***** -->
<section class="dorne-features-events-area bg-img bg-overlay-9 section-padding-100-50" style="background-image: url(hanb/img/bg-img/hero-3.jpg); display: none">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-heading text-center">
          <span></span>
          <h4>Featured events</h4>
          <p>Editor’s pick</p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12 col-lg-6">
        <div class="single-feature-events-area d-sm-flex align-items-center wow fadeInUpBig" data-wow-delay="0.2s">
          <div class="feature-events-thumb">
            <img src="hanb/img/bg-img/event-1.jpg" alt="">
            <div class="date-map-area d-flex">
              <a href="#">26 Nov</a>
              <a href="#"><img src="hanb/img/core-img/map.png" alt=""></a>
            </div>
          </div>
          <div class="feature-events-content">
            <h5>Jazz Concert</h5>
            <h6>Manhathan</h6>
            <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra...</p>
          </div>
          <div class="feature-events-details-btn">
            <a href="#">+</a>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6">
        <div class="single-feature-events-area d-sm-flex align-items-center wow fadeInUpBig" data-wow-delay="0.3s">
          <div class="feature-events-thumb">
            <img src="hanb/img/bg-img/event-2.jpg" alt="">
            <div class="date-map-area d-flex">
              <a href="#">26 Nov</a>
              <a href="#"><img src="hanb/img/core-img/map.png" alt=""></a>
            </div>
          </div>
          <div class="feature-events-content">
            <h5>DeeJay in the house</h5>
            <h6>Manhathan</h6>
            <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra...</p>
          </div>
          <div class="feature-events-details-btn">
            <a href="#">+</a>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6">
        <div class="single-feature-events-area d-sm-flex align-items-center wow fadeInUpBig" data-wow-delay="0.4s">
          <div class="feature-events-thumb">
            <img src="hanb/img/bg-img/event-3.jpg" alt="">
            <div class="date-map-area d-flex">
              <a href="#">26 Nov</a>
              <a href="#"><img src="hanb/img/core-img/map.png" alt=""></a>
            </div>
          </div>
          <div class="feature-events-content">
            <h5>Theatre Night outside</h5>
            <h6>Manhathan</h6>
            <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra...</p>
          </div>
          <div class="feature-events-details-btn">
            <a href="#">+</a>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6">
        <div class="single-feature-events-area d-sm-flex align-items-center wow fadeInUpBig" data-wow-delay="0.5s">
          <div class="feature-events-thumb">
            <img src="hanb/img/bg-img/event-4.jpg" alt="">
            <div class="date-map-area d-flex">
              <a href="#">26 Nov</a>
              <a href="#"><img src="hanb/img/core-img/map.png" alt=""></a>
            </div>
          </div>
          <div class="feature-events-content">
            <h5>Wine tasting</h5>
            <h6>Manhathan</h6>
            <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra...</p>
          </div>
          <div class="feature-events-details-btn">
            <a href="#">+</a>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6">
        <div class="single-feature-events-area d-sm-flex align-items-center wow fadeInUpBig" data-wow-delay="0.6s">
          <div class="feature-events-thumb">
            <img src="hanb/img/bg-img/event-5.jpg" alt="">
            <div class="date-map-area d-flex">
              <a href="#">26 Nov</a>
              <a href="#"><img src="hanb/img/core-img/map.png" alt=""></a>
            </div>
          </div>
          <div class="feature-events-content">
            <h5>New Moon Party</h5>
            <h6>Manhathan</h6>
            <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra...</p>
          </div>
          <div class="feature-events-details-btn">
            <a href="#">+</a>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6">
        <div class="single-feature-events-area d-sm-flex align-items-center wow fadeInUpBig" data-wow-delay="0.7s">
          <div class="feature-events-thumb">
            <img src="hanb/img/bg-img/event-6.jpg" alt="">
            <div class="date-map-area d-flex">
              <a href="#">26 Nov</a>
              <a href="#"><img src="hanb/img/core-img/map.png" alt=""></a>
            </div>
          </div>
          <div class="feature-events-content">
            <h5>Happy hour at pub</h5>
            <h6>Manhathan</h6>
            <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra...</p>
          </div>
          <div class="feature-events-details-btn">
            <a href="#">+</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ***** Features Events Area End ***** -->

<!-- ***** Clients Area Start ***** -->
<div class="dorne-clients-area section-padding-100" style="display: none">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="clients-logo d-md-flex align-items-center justify-content-around">
          <img src="hanb/img/clients-img/1.png" alt="">
          <img src="hanb/img/clients-img/2.png" alt="">
          <img src="hanb/img/clients-img/3.png" alt="">
          <img src="hanb/img/clients-img/4.png" alt="">
          <img src="hanb/img/clients-img/5.png" alt="">
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ***** Clients Area End ***** -->

<?php $sq2= mysqli_query($conn,"SELECT * FROM tbl_profil where jenis_p='Berita' or jenis_p='Informasi'");
      while($dt1=mysqli_fetch_array($sq2)) {
   ?>
  <div class="modal fade mt-5" id="<?= $dt1['id_profil'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="hanb/transaksi.php" method="post">
            <div class="modal-body">
              <h4 class="modal-title"><?= $dt1['judul_p'] ?></h4>

              <div class="contact-form p-3">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <img src="hanb/img/profil/<?= $dt1["gambar_p"] ?>">
                        <small><?= $dt1['deskripsi_p'] ?></small>                    
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-success" data-dismiss="modal">Close</button>
      </div>
  </form>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php }; ?>
