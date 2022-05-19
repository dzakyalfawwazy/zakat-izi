<?php 
date_default_timezone_set('Asia/Jakarta');
include 'hanb/crudApp.php';
$db = new crud();
$cek_kadaluarsa=$db->cek_kadaluarsa();
?>
<?php include "hanb/header.php" ?>
<style type="text/css">

  .wizard .tab-pane {
    position: relative;
    padding-top: 30px;
  }

</style>

<!-- ***** Breadcumb Area Start ***** -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(hanb/img/bg-img/hero-1.jpg)"></div>
<!-- ***** Breadcumb Area End ***** -->
<section class="dorne-listing-destinations-area section-padding-100-50">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="section-heading dark text-center mt-0">
          <span></span>
          <h4>Daftar Sebagai Pasien</h4>
          <p>Rumah Singgah</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-primary bg-gradient-white">
          <div class="card-body">
            <form role="form" method="post" action="hanb/_akun.php?type=register" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-4">

                 <div class="card">
                  <div class="card-header text-white bg-primary">
                   <div class="h3">Account</div>
                 </div>
                 <div class="card-body">
                  <div class="input-group mb-3">
                    <input type="text" required class="form-control" name="nama_plg" placeholder="Fullname">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-home"></span>
                      </div>
                    </div>
                  </div>

                  <label class="text-danger nik" style="display: none;"></label>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" id="nik" required name="nik" placeholder="Nik">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-user"></span>
                      </div>
                    </div>
                  </div>
                  <label class="text-danger username" style="display: none;"></label>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" id="username" required name="nama_user" placeholder="Username">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-user"></span>
                      </div>
                    </div>
                  </div>
                  <label class="text-danger password" style="display: none;"></label>
                  <div class="input-group mb-3">
                    <input type="password" class="form-control" id="password" required name="password" placeholder="Password">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                  </div>
                  <label class="text-danger confirm" style="display: none;"></label>
                  <div class="input-group mb-3">
                    <input type="password" class="form-control" id="confirm" required name="confirm" placeholder="Confirm Password">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- /.card -->
            <div class="col-md-4">
              <div class="card">

                <div class="card-header text-white bg-success">
                  <div class="h3">Personal Data</div>
                </div>
                <div class="card-body">
                  <div class="form-group d-inline">
                    <label>Gender</label>
                    <div class="form-group">
                      <input type="radio" name="jenkel" value="Laki-laki" id="jenkel1">
                      <label class="small" for="jenkel1">
                      Male</label>
                      <input type="radio" name="jenkel" value="Perempuan" id="jenkel2">
                      <label class="small" for="jenkel2">
                      Female</label>
                    </div>
                  </div>

                  <div class="input-group mb-3">
                    <input type="date" required class="form-control" name="tgl_lahir" placeholder="Nama Lengkap">
                  </div>
                  <div class="input-group mb-3">
                    <input type="email" required class="form-control" name="email" placeholder="Email">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                      </div>
                    </div>
                  </div>
                  <div class="input-group mb-3">
                    <input type="text" required class="form-control" name="nohp" placeholder="Phone Number">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-phone"></span>
                      </div>
                    </div>
                  </div>
                  <div class="input-group mb-3">
                    <textarea required class="form-control" name="alamat" placeholder="Address"></textarea>
                  </div>
                </div>
                <!-- /.form-box -->
              </div><!-- /.card -->
            </div>

            <div class="col-md-4">

              <div class="card">
                <div class="card-header text-white bg-info">
                  <div class="h3">Your Photo</div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="input-group mb-3 col-8">
                      <input type="file" accept=".jpg" name="imagess" class="form-control" id="exampleInputFile">
                    </div>
                    <img src="#" id="output_image" class="product-image-thumb col-4" alt="Photo">
                  </div>
                </div>

                <!-- /.form-box -->
              </div><!-- /.card -->
              <button type="submit" name="kirim" class="btn bg-success mt-3 float-right text-white" id="kirim">
                <i class="fas fa-paper-plane"></i> Registration!
              </button>

            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</section>

<script type="text/javascript">
  $(function () {
    function button(){

      if($('.username').is(":hidden")) 
      { 
        if($('.confirm').is(":hidden"))
        { 
          if($('.password').is(":hidden")){ $('#kirim').removeClass('disabled');}
        }  

      }
      else { $('#kirim').addClass('disabled');} 
      
    };
    <?php 
    $cekuse=$db->tampildetail('tb_user','1="1"'); ?>
    $('#username').on('change',function(){
      if($('#username').val().length < 8) {
        $('#username').addClass('is-invalid');
        $('.username').show();
        $('.username').text("Karakter harus lebih dari 8");

      } else   if($('#username').val().length >= 8){
        <?php
        foreach($cekuse as $cekuser) { ?> 
          if($('#username').val() == "<?php echo $cekuser['nama_user'] ?>" ) {
            $('#username').addClass('is-invalid'); 
            $('.username').show();
            $('.username').text("username sudah dipakai");
          } else {
            $('.username').hide();
            $('.username').text("");
            $('#username').removeClass('is-invalid'); 
          }

        <?php }?>
      }
      button(); 
    });
    $('#password').on('change',function(){
      if($('#password').val().length < 8 && $('#password').val().length > 0) {
        $('#password').addClass('is-invalid');
        $('.password').show();
        $('.password').text("Karakter harus lebih dari 8");

      } else {

        $('.password').hide();
        $('.password').text("");
        $('#password').removeClass('is-invalid'); 

      } 
      button();
    });
    $('#confirm').on('change',function(){
      if($('#confirm').val() != $('#password').val()) {
        $('#confirm').addClass('is-invalid');
        $('.confirm').show();
        $('.confirm').text("Password tidak sama");

      } else {

        $('.confirm').hide();
        $('.confirm').text("");
        $('#confirm').removeClass('is-invalid'); 

      } 
      button();
    });

    $(":file").change(function(){
      if (this.files && this.files[0]) {
       var reader = new FileReader();
       reader.onload = imageIsLoaded;
       reader.readAsDataURL(this.files[0]);
     }
   });
    function imageIsLoaded(e) {
      $("#output_image").attr('src',e.target.result);
    };
  });
</script>
<?php include 'hanb/footer.php'; ?>