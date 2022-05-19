
<!-- Main content -->
    <img class="d-block w-100 m-0" src="dist/img/1.png" alt="First slide">
  <div  style="offset-position: top 100px">asdasd</div>
<div class="content">

  <div class="container-fluid" style="offset: top 100px">
    <div class="row">
      <div class="col-lg-4">
         <h4>Kategori Barang</h4>
        <div class="row">
          <?php $row=$db->tampildata('tb_kategori'); foreach ($row as $dataka): ?>
          <div class="col-12 col-sm-12 col-md-12">
            <a class="info-box text-dark" href="index.php?hal=produk&kategori=<?= $dataka['id_kategori'] ?>">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-paste"></i></span>

              <div class="info-box-content">
                <span class="info-box-text h5"><?= $dataka['nama_kategori'] ?></span>
                <span class="info-box-number">
                  Klik untuk lihat barang dari kategori ini
                </span>
              </div>
              <!-- /.info-box-content -->
            </a>
            <!-- /.info-box -->
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="col-lg-8">
      <div class="jumbotron p-4 bg-gradient-info">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="dist/img/1.png" style="border-radius: 10px" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="dist/img/3.png" style="border-radius: 10px" valt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="dist/img/2.png" style="border-radius: 10px" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>
<div id="tentang">
  <div class="row">
    <div class="container">
      <div class="col-md-12 text-center">
        <h2 class="mt-5 mb-5"><?= $datanamatoko['nilai'] ?></h2>
        <div class="card">
          <div class="card-body">
            <h5><?= $iprofil['nilai'] ?></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <div class="h2 text-center m-5">Pilihan untuk anda</div>
  <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators1" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators1" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="row">
          <?php $row=$db->tampilcond('tb_produk.*,(tb_produkdetail.gambar) as gambar,(min(tb_produkdetail.hargajual)) as harga,(sum(tb_produkdetail.stok)) as tersedia','tb_produk,tb_produkdetail','tb_produk.id_produk=tb_produkdetail.id_produk group by tb_produk.id_produk order by rand() LIMIT 3');
          foreach ($row as $data):
            if($data['tersedia'] >= 1) {
             ?>
             <div class="col-lg-3 pl-2 pr-2 pb-2" >
              <div class="card card-primary card-outline produk">
                <div class="card-body">
                  <div class="row text-center align-items-center" style="height: 200px; width: auto;">
                    <img class="img-fluid img-thumbnail" src="data:image/jpg;base64,<?= base64_encode($data['gambar'])?>" alt="Gambar Barang">
                  </div>
                  <p class="mt-5">
                    <div class="h5"><?= $data['nama_produk'] ?></div>
                  </p>
                  <div class="dropdown-divider"></div>
                  <div class="d-inline align-self-center">
                    <div class="text-md text-primary float-left">Rp.<?= $data['harga'] ?>.-</div>
                    <a href="index.php?hal=detailproduk&id=<?= $data['id_produk'] ?>" title="Lihat <?= $data['nama_produk'] ?> lebih lanjut" class="btn btn-sm btn-success float-right ml-1"><div class="fas fa-search"></div></a>
                    <a href="#" class="btn btn-sm btn-warning float-right" title="Tambah ke keranjang" data-toggle="modal" data-target="#modal-pesan-<?= $data['id_produk'] ?>"><div class="fas fa-cart-plus"></div></a>
                  </div>
                </div>
              </div>
            </div>
          <?php } else {} endforeach ?>
        </div>
      </div>
      <div class="carousel-item">
       <div class="row">
        <?php $row=$db->tampilcond('tb_produk.*,(tb_produkdetail.gambar) as gambar,(min(tb_produkdetail.hargajual)) as harga,(sum(tb_produkdetail.stok)) as tersedia','tb_produk,tb_produkdetail','tb_produk.id_produk=tb_produkdetail.id_produk group by tb_produk.id_produk order by rand() LIMIT 3');
        foreach ($row as $data):
          if($data['tersedia'] >= 1) {
           ?>
           <div class="col-lg-3 pl-2 pr-2 pb-2" >
            <div class="card card-primary card-outline produk">
              <div class="card-body">
                <div class="row text-center align-items-center" style="height: 200px; width: auto;">
                  <img class="img-fluid img-thumbnail" src="data:image/jpg;base64,<?= base64_encode($data['gambar'])?>" alt="Gambar Barang">
                </div>
                <p class="mt-5">
                  <div class="h5"><?= $data['nama_produk'] ?></div>
                </p>
                <div class="dropdown-divider"></div>
                <div class="d-inline align-self-center">
                  <div class="text-md text-primary float-left">Rp.<?= $data['harga'] ?>.-</div>
                  <a href="index.php?hal=detailproduk&id=<?= $data['id_produk'] ?>" title="Lihat <?= $data['nama_produk'] ?> lebih lanjut" class="btn btn-sm btn-success float-right ml-1"><div class="fas fa-search"></div></a>
                  <a href="#" class="btn btn-sm btn-warning float-right" title="Tambah ke keranjang" data-toggle="modal" data-target="#modal-pesan-<?= $data['id_produk'] ?>"><div class="fas fa-cart-plus"></div></a>
                </div>
              </div>
            </div>
          </div>
        <?php } else {} endforeach ?>
      </div>
    </div>
    <div class="carousel-item">
      <div class="row">
        <?php $row=$db->tampilcond('tb_produk.*,(tb_produkdetail.gambar) as gambar,(min(tb_produkdetail.hargajual)) as harga,(sum(tb_produkdetail.stok)) as tersedia','tb_produk,tb_produkdetail','tb_produk.id_produk=tb_produkdetail.id_produk group by tb_produk.id_produk order by rand() LIMIT 3');
        foreach ($row as $data):
          if($data['tersedia'] >= 1) {
           ?>
           <div class="col-lg-3 pl-2 pr-2 pb-2" >
            <div class="card card-primary card-outline produk">
              <div class="card-body">
                <div class="row text-center align-items-center" style="height: 200px; width: auto;">
                  <img class="img-fluid img-thumbnail" src="data:image/jpg;base64,<?= base64_encode($data['gambar'])?>" alt="Gambar Barang">
                </div>
                <p class="mt-5">
                  <div class="h5"><?= $data['nama_produk'] ?></div>
                </p>
                <div class="dropdown-divider"></div>
                <div class="d-inline align-self-center">
                  <div class="text-md text-primary float-left">Rp.<?= $data['harga'] ?>.-</div>
                  <a href="index.php?hal=detailproduk&id=<?= $data['id_produk'] ?>" title="Lihat <?= $data['nama_produk'] ?> lebih lanjut" class="btn btn-sm btn-success float-right ml-1"><div class="fas fa-search"></div></a>
                  <a href="#" class="btn btn-sm btn-warning float-right" title="Tambah ke keranjang" data-toggle="modal" data-target="#modal-pesan-<?= $data['id_produk'] ?>"><div class="fas fa-cart-plus"></div></a>
                </div>
              </div>
            </div>
          </div>
        <?php } else {} endforeach ?>
      </div>
    </div>
  </div>
</div>

<!-- /.row -->

<div id="review" style="display: none;">
  <div class="post">
    <div class="row">
      <div class="col-md-12 text-center">
       <h2 class="mt-5 mb-5">Review Pengguna</h2>
     </div>
     <div class="col-md-2">
      <div class="card card-success card-outline">
        <div class="card-body">
          <div class="user-block">
            <img class="img-circle img-bordered-sm" src="dist/img/user1-128x128.jpg" alt="user image">
            <span class="username">
              <a href="#">Jonathan Burke Jr.</a>
            </span>
            <span class="description">Shared publicly - 7:30 PM today</span>
          </div>
          <!-- /.user-block -->
          <p>
            Lorem ipsum represents a long-held tradition for designers,
            typographers and the like. Some people hate it and argue for
            its demise, but others ignore the hate as they create awesome
            tools to help create filler text for everyone from bacon lovers
            to Charlie Sheen fans.
          </p>

          <p>
            <span class="float-right">
              <a href="#" class="link-black text-sm">
                <i class="far fa-star"></i>
              </a>
            </span>
          </p>

          <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.post -->
</div>
</div><!-- /.container-fluid -->
</div>
        <!-- /.content -->