<?php if(isset($_SESSION['status']) and $_SESSION['status']=='login'){
  $profil=$db->tampildetail('tb_pelanggan,tb_user','tb_user.id_pelanggan=tb_pelanggan.id_pelanggan and tb_user.id_pelanggan="'.$_SESSION["id_pelanggan"].'"');
  foreach($profil as $pro):
   ?>
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(hanb/img/bg-img/hero-1.jpg)"></div>
<!-- ***** Breadcumb Area End ***** -->
<section class="dorne-listing-destinations-area section-padding-100-50">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="section-heading dark text-center mb-1">
          <span></span>
          <h4>Traveller Profile</h4>
          <p>Nagari Pariangan</p>
        </div>
      </div>
    </div>
      <form class="form-horizontal" method="post" action="hanb/_akun.php?type=edit" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-4">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                 <img class="profile-user-img img-fluid img-circle"
                 src="data:image/jpg;base64,<?= base64_encode($pro['foto'])?>"
                 alt="User profile picture" id="output_image">
               </div>
               <div class="input-group mb-3 mt-3">
                <div class="custom-file">
                  <input type="file" accept=".jpg" name="imagess" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                </div>
              </div>
              <h3 class="profile-username text-center"><?= $pro['nama_plg'] ?></h3>

              <p class="text-muted text-center">Traveller</p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>ID Travaller</b> <a class="float-right"><?= $pro['id_pelanggan'] ?></a>
                </li>
                <li class="list-group-item">
                  <b>Username</b> <a class="float-right"><input type="text" class="form-control" id="inputName" placeholder="Name" name="nama_user" value="<?= $pro['nama_user'] ?>"><input type="hidden" class="form-control" id="inputName" placeholder="id_pelanggan" name="id_pelanggan" value="<?= $pro['id_pelanggan'] ?>"></a>
                </li>
                <li class="list-group-item">
                  <b>Password</b> <a class="float-right"><input type="text" class="form-control" id="inputName" placeholder="Name" name="password" value="<?= $pro['password'] ?>"></a>
                </li>
              </ul>

              <button type="submit" class="btn btn-success btn-block"><b>Finish Update Profil</b></button>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
          <div class="card">
            <div class="card-body">
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputName" placeholder="Name" name="nama_plg" value="<?= $pro['nama_plg'] ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Gender</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputEmail" placeholder="Jenis Kelamin" name="jenkel" value="<?= $pro['jenkel'] ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail1" class="col-sm-2 col-form-label">Date Birth</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" id="inputEmail1" placeholder="Tanggal Lahir" name="tgl_lahir" value="<?= $pro['tgl_lahir'] ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputName2" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="inputName2" placeholder="Email" name="email" value="<?= $pro['email'] ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputName3" class="col-sm-2 col-form-label">Phone Number</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputName3" placeholder="No. HP" name="nohp" value="<?= $pro['nohp'] ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputExperience" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="inputExperience" name="alamat" placeholder="Alamat"><?= $pro['alamat'] ?></textarea>
                </div>
              </div>
             
          </div><!-- /.card-body -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </form>
</div><!-- /.container-fluid -->
</section>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<script type="text/javascript">
 $(document).ready(function () {

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
<script type="text/javascript">
 $(function () {
  $('#provinsi').change(function(){

      //Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax 
      var pro = $('#provinsi').val();
      var pecah= pro.split(',');
      var prov = pecah[0];

      $.ajax({
        type : 'GET',
        url : 'ongkir/cek_kabupaten.php',
        data :  'prov_id=' + prov,
        success: function (data) {

          //jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
          $("#kabupaten").html(data);
        }
      });
    });
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  });
</script>
<?php endforeach; } else {"<script>alert('Opps! You must login to see this pages!'); window.location.href='login.php'</script>";}