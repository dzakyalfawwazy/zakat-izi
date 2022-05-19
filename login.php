<?php 
date_default_timezone_set('Asia/Jakarta');
include 'hanb/crudApp.php';
$db = new crud();
$cek_kadaluarsa=$db->cek_kadaluarsa();
include 'hanb/header.php'; ?>
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(hanb/img/bg-img/hero-1.jpg)"></div>
<!-- ***** Breadcumb Area End ***** -->
<section class="dorne-listing-destinations-area section-padding-100-50">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="section-heading dark text-center mt-0">
          <h4>Login</h4>
          <span></span>
          <p>Rumah Singgah Pasien IZI</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 offset-md-4">
        <div class="contact-form ">
          <form action="hanb/_akun.php?type=masuk" method="post">
            <div class="input-group mb-3">
              <input type="text" name="nama_user" class="form-control" placeholder="Username">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" name="password" class="form-control" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-4 offset-8">
                <button type="submit" class="btn btn-danger btn-block">Sign In</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include "hanb/footer.php" ?>
