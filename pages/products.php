<?php if(isset($_GET['kategori'])) $k="tb_produk.id_kategori='".$_GET['kategori']."' and "; else $k='';?>
<?php if(isset($_GET['q'])) $q="tb_produk.nama_produk like '%".$_GET['q']."%' and "; else $q='';?>
<!-- Main content -->
<div class="content">
  <div class="row">
    <div class="col-md-2 p-0">
      <div class="card card-outline card-danger h-100">
        <div class="card-body p-0">
          <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel d-flex">
              <div class="info">
                <h5 class="d-block">Menu Produk</h5>
              </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-1 p-0">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                  <a href="index.php?hal=produk" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>Produk Terbaru <span class="right badge badge-danger">New!!</span>
                    </p>
                  </a>
                </li>

                <li class="nav-item has-treeview menu-open">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                      Kategori
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <?php $kat=$db->tampildata("tb_kategori"); foreach($kat as $dkat): ?>
                    <li class="nav-item">
                      <a href="index.php?hal=produk&kategori=<?= $dkat['id_kategori'] ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p><?= $dkat['nama_kategori'] ?></p>
                      </a>
                    </li>
                  <?php endforeach; ?>
                  </ul>
                </li>
              </ul>
            </nav>
            <!-- /.sidebar-menu -->
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-10">
      <div class="container-fluid">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header p-0 border-bottom-0">
              <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="custom-tabs-three-terkait-tab" data-toggle="pill" href="#custom-tabs-three-terkait" role="tab" aria-controls="custom-tabs-three-terkait" aria-selected="true">Terkait</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-three-terlaris-tab" data-toggle="pill" href="#custom-tabs-three-terlaris" role="tab" aria-controls="custom-tabs-three-terlaris" aria-selected="false">Terlaris</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-three-terbaru-tab" data-toggle="pill" href="#custom-tabs-three-terbaru" role="tab" aria-controls="custom-tabs-three-terbaru" aria-selected="false">Terbaru</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-three-terendah-tab" data-toggle="pill" href="#custom-tabs-three-terendah" role="tab" aria-controls="custom-tabs-three-terendah" aria-selected="false">Harga Terendah</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-three-tertinggi-tab" data-toggle="pill" href="#custom-tabs-three-tertinggi" role="tab" aria-controls="custom-tabs-three-tertinggi" aria-selected="false">Harga Tertinggi</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content" id="custom-tabs-three-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-three-terkait" role="tabpanel" aria-labelledby="custom-tabs-three-terkait-tab">
                 <div class="row">
                  <?php
                  $row=$db->tampilcond('tb_produk.*,(tb_produkdetail.gambar) as gambar,(min(tb_produkdetail.hargajual)) as harga,(sum(tb_produkdetail.stok)) as tersedia','tb_produk,tb_produkdetail',  $q.''.$k.'tb_produk.id_produk=tb_produkdetail.id_produk group by tb_produk.id_produk order by rand()');
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
              <div class="tab-pane fade" id="custom-tabs-three-terlaris" role="tabpanel" aria-labelledby="custom-tabs-three-terlaris-tab">
               <div class="row">
                <?php $row1=$db->tampilcond('tb_produk.*,(tb_produkdetail.gambar) as gambar,(min(tb_produkdetail.hargajual)) as harga, sum(tb_produkdetail.stok) as tersedia','tb_produk,tb_produkdetail',$q.''.$k.'tb_produk.id_produk=tb_produkdetail.id_produk group by tb_produk.id_produk');
                foreach ($row1 as $data1):
                  if($data1['tersedia'] > 0)
                  {
                   ?>
                   <div class="col-lg-3 pl-2 pr-2 pb-2" >
                    <div class="card card-primary card-outline produk">
                      <div class="card-body">
                        <div class="row text-center align-items-center" style="height: 200px; width: auto;">
                          <img class="img-fluid img-thumbnail" src="data:image;base64,<?= base64_encode($data1['gambar'])?>" alt="Gambar Barang">
                        </div>
                        <p class="mt-5">

                          <div class="h5"><?= $data1['nama_produk'] ?></div>
                        </p>
                        <div class="dropdown-divider"></div>
                        <div class="d-inline align-self-center">
                          <div class="text-md text-primary float-left">Rp.<?= $data1['harga'] ?>.-</div>
                          <a href="index.php?hal=detailproduk&id=<?= $data1['id_produk'] ?>" title="Lihat <?= $data1['nama_produk'] ?> lebih lanjut" class="btn btn-sm btn-success float-right ml-1"><div class="fas fa-search"></div></a>
                          <a href="#" class="btn btn-sm btn-warning float-right" title="Tambah ke keranjang" data-toggle="modal" data-target="#modal-pesan-<?= $data1['id_produk'] ?>"><div class="fas fa-cart-plus"></div></a>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } else {} endforeach ?>
              </div>
            </div>
            <div class="tab-pane fade" id="custom-tabs-three-terbaru" role="tabpanel" aria-labelledby="custom-tabs-three-terbaru-tab">
              <div class="row">
                <?php $row2=$db->tampilcond('tb_produk.*,(tb_produkdetail.gambar) as gambar,(min(tb_produkdetail.hargajual)) as harga,sum(tb_produkdetail.stok) as tersedia','tb_produk,tb_produkdetail', $q.''.$k.'tb_produk.id_produk=tb_produkdetail.id_produk group by tb_produk.id_produk order by  tanggal desc');
                foreach ($row2 as $data2):
                  if($data2['tersedia'] > 0) {
                   ?>
                   <div class="col-lg-3 pl-2 pr-2 pb-2" >
                    <div class="card card-primary card-outline produk">
                      <div class="card-body">
                        <div class="row text-center align-items-center" style="height: 200px; width: auto;">
                          <img class="img-fluid img-thumbnail"  src="data:image;base64,<?= base64_encode($data2['gambar'])?>" alt="Gambar Barang">
                        </div>
                        <p class="mt-5">

                          <div class="h5"><?= $data2['nama_produk'] ?></div>
                        </p>
                        <div class="dropdown-divider"></div>
                        <div class="d-inline align-self-center">
                          <div class="text-md text-primary float-left">Rp.<?= $data2['harga'] ?>.-</div>
                          <a href="index.php?hal=detailproduk&id=<?= $data['id_produk'] ?>" title="Lihat <?= $data2['nama_produk'] ?> lebih lanjut" class="btn btn-sm btn-success float-right ml-1"><div class="fas fa-search"></div></a>
                          <a href="#" class="btn btn-sm btn-warning float-right" title="Tambah ke keranjang" data-toggle="modal" data-target="#modal-pesan-<?= $data2['id_produk'] ?>"><div class="fas fa-cart-plus"></div></a>
                        </div>
                      </div>
                    </div>
                  </div>

                <?php } else {} endforeach ?>
              </div>
            </div>
            <div class="tab-pane fade" id="custom-tabs-three-terendah" role="tabpanel" aria-labelledby="custom-tabs-three-terendah-tab">
             <div class="row">
              <?php $row3=$db->tampilcond('tb_produk.*,(tb_produkdetail.gambar) as gambar,(min(tb_produkdetail.hargajual)) as harga,sum(tb_produkdetail.stok) as tersedia','tb_produk,tb_produkdetail',$q.''.$k.'tb_produk.id_produk=tb_produkdetail.id_produk group by tb_produk.id_produk order by harga asc');
              foreach ($row3 as $data3):
                if($data3['tersedia'] > 0) {
                 ?>
                 <div class="col-lg-3 pl-2 pr-2 pb-2" >
                  <div class="card card-primary card-outline produk">
                    <div class="card-body">
                      <div class="row text-center align-items-center" style="height: 200px; width: auto;">
                        <img class="img-fluid img-thumbnail"  src="data:image;base64,<?= base64_encode($data3['gambar'])?>" alt="Gambar Barang">
                      </div>
                      <p class="mt-5">

                        <div class="h5"><?= $data3['nama_produk'] ?></div>
                      </p>
                      <div class="dropdown-divider"></div>
                      <div class="d-inline align-self-center">
                        <div class="text-md text-primary float-left">Rp.<?= $data3['harga'] ?>.-</div>
                        <a href="index.php?hal=detailproduk&id=<?= $data3['id_produk'] ?>" title="Lihat <?= $data3['nama_produk'] ?> lebih lanjut" class="btn btn-sm btn-success float-right ml-1"><div class="fas fa-search"></div></a>
                        <a href="#" class="btn btn-sm btn-warning float-right" title="Tambah ke keranjang" data-toggle="modal" data-target="#modal-pesan-<?= $data3['id_produk'] ?>"><div class="fas fa-cart-plus"></div></a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } else {} endforeach ?>
            </div>
          </div>
          <div class="tab-pane fade" id="custom-tabs-three-tertinggi" role="tabpanel" aria-labelledby="custom-tabs-three-tertinggi-tab">
           <div class="row">
            <?php $row4=$db->tampilcond('tb_produk.*,(tb_produkdetail.gambar) as gambar,(min(tb_produkdetail.hargajual)) as harga,sum(tb_produkdetail.stok) as tersedia','tb_produk,tb_produkdetail',$q.''.$k.'tb_produk.id_produk=tb_produkdetail.id_produk group by tb_produk.id_produk order  by harga desc');
            foreach ($row4 as $data4):
              if($data4['tersedia'] > 0) {
               ?>
               <div class="col-lg-3 pl-2 pr-2 pb-2" >
                <div class="card card-primary card-outline produk">
                  <div class="card-body">
                    <div class="row text-center align-items-center" style="height: 200px; width: auto;">
                      <img class="img-fluid img-thumbnail" src="data:image;base64,<?= base64_encode($data4['gambar'])?>" alt="Gambar Barang">
                    </div>
                    <p class="mt-5">

                      <div class="h5"><?= $data4['nama_produk'] ?></div>
                    </p>
                    <div class="dropdown-divider"></div>
                    <div class="d-inline align-self-center">
                      <div class="text-md text-primary float-left">Rp.<?= $data4['harga'] ?>.-</div>
                      <a href="index.php?hal=detailproduk&id=<?= $data4['id_produk'] ?>" title="Lihat <?= $data4['nama_produk'] ?> lebih lanjut" class="btn btn-sm btn-success float-right ml-1"><div class="fas fa-search"></div></a>
                      <a href="#" class="btn btn-sm btn-warning float-right" title="Tambah ke keranjang" data-toggle="modal" data-target="#modal-pesan-<?= $data4['id_produk'] ?>"><div class="fas fa-cart-plus"></div></a>
                    </div>
                  </div>
                </div>
              </div>
            <?php } else {} endforeach ?>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>
<!-- /.row -->
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
<div id="review">
  <div class="post">
    <div class="row" style="display: none">
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
</div>
</div>
</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- /.content -->
<!-- /.modal -->
<?php $row5=$db->tampilcond('tb_produk.*,(tb_produkdetail.gambar) as gambar,(min(tb_produkdetail.hargajual)) as harga,(sum(tb_produkdetail.stok)) as tersedia','tb_produk,tb_produkdetail','tb_produk.id_produk=tb_produkdetail.id_produk group by tb_produk.id_produk');
foreach ($row5 as $data5): ?>
  <div class="modal fade" id="modal-pesan-<?= $data5['id_produk'] ?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Masukan <?= $data5['nama_produk'] ?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>One fine body&hellip;</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<?php endforeach ?>
<!-- /.modal -->
