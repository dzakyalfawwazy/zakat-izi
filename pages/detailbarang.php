
<?php $row = $db -> tampildetail('tb_produk,tb_produkdetail, tb_kategori','tb_produk.id_produk="'.$_GET['id'].'" and tb_produk.id_kategori=tb_kategori.id_kategori and tb_produk.id_produk=tb_produkdetail.id_produk');
foreach($row as $data) :
 ?>
 <form method="post" action="hanb/transaksi.php">
  <input type="hidden" name="id_produkdetail" id="id_produkdetail" required value="">
  <input type="hidden" name="id_produk" id="id_produk" required value="<?= $_GET['id'] ?>">
 <div class="container">
  <section class="content">

    <!-- Default box -->
    <div class="card card-solid">
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-sm-6">
            <h3 class="d-inline-block d-sm-none"><?= $data['nama_produk'] ?></h3>
            <div class="col-12">
              <img src="data:image;base64,<?= base64_encode($data['gambar'])?>" id="gambarutama" class="product-image" alt="Product Image">
            </div>
            <div class="col-12 product-image-thumbs">
              <?php $row31=$db->tampilcond('tb_produk.id_produk,tb_produkdetail.*','tb_produk,tb_produkdetail','tb_produk.id_produk=tb_produkdetail.id_produk and tb_produk.id_produk="'.$_GET['id'].'"');

              foreach($row31 as $data31) : ?>
                <div class="product-image-thumb active"><img src="data:image/jpg;base64,<?= base64_encode($data31['gambar'])?>" alt="Product Image"></div>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="col-12 col-sm-6">
            <h3 class="my-3"><?= $data['nama_produk'] ?></h3>
            <hr>
            <h4>Warna tersedia</h4>
            <?php $row3=$db->tampilcond('tb_produk.id_produk,tb_produkdetail.*','tb_produk,tb_produkdetail','tb_produk.id_produk=tb_produkdetail.id_produk and tb_produk.id_produk="'.$_GET['id'].'" group by warna');
              foreach($row3 as $data3): ?>
              <label for="<?= $data3['warna'] ?>" id="<?= "label".$data3['warna'] ?>" class="btn btn-default text-center active">

                <input type="radio" name="warna" checked  id="<?= $data3['warna'] ?>" value="<?= $data3['warna'] ?>" style="display: none">
                <?= $data3['warna'] ?>
              </label>
            <?php endforeach; ?>

            <h4 class="mt-3">Ukuran <small>Pilih satu</small></h4>
            <div>
              <?php $row2=$db->tampilcond('tb_produk.id_produk,tb_produkdetail.*','tb_produk,tb_produkdetail','tb_produk.id_produk=tb_produkdetail.id_produk and tb_produk.id_produk="'.$_GET['id'].'"');
              foreach($row2 as $data2): ?>
                <label for="<?= $data2['ukuran'] ?>" class=" <?= $data2['warna'] ?> btn btn-default text-center" id="<?= "label".$data2['ukuran'] ?>" style="display: none">
                  <input type="radio" name="ukuran" id="<?= $data2['ukuran'] ?>" value="<?= $data2['ukuran'] ?>">
                  <span class="text-xl"><?= $data2['ukuran'] ?></span>
                </label>
              <?php endforeach; ?>
            </div>
            <div class="form-group">
              <h4 class="mt-3">Jumlah</h4>
              <input type="text" name="jumlah" class="form-control" min="1" value="1">
            </div>


            <div class="bg-gray py-2 px-3 mt-4">
              <h2 id="total" class="mb-0">
                Rp.<?= $data['hargajual'] ?>,-
                <input type="hidden" name="hargajual" id="hargajual" class="form-control" min="1" value="<?= $data['hargajual'] ?>">
              </h2>
            </div>
            <div class="mt-4">
              <button class="btn btn-info btn-lg disabled" id="bt" title="Tambah ke keranjang">
                <i class="fas fa-cart-plus fa-lg mr-2"></i> 
                Tambah ke keranjang
              </button>
            </div>

            <div class="mt-4 product-share">
              <a href="#" class="text-gray">
                <i class="fab fa-facebook-square fa-2x"></i>
              </a>
              <a href="#" class="text-gray">
                <i class="fab fa-twitter-square fa-2x"></i>
              </a>
              <a href="#" class="text-gray">
                <i class="fas fa-envelope-square fa-2x"></i>
              </a>
              <a href="#" class="text-gray">
                <i class="fas fa-rss-square fa-2x"></i>
              </a>
            </div>

          </div>
        </div>
        <div class="row mt-4">
          <nav class="w-100">
            <div class="nav nav-tabs" id="product-tab" role="tablist">
              <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Rincian Produk</a>
              <a class="nav-item nav-link" id="product-review-tab" data-toggle="tab" href="#product-review" role="tab" aria-controls="product-review" aria-selected="true">Penilaian Produk</a>
            </div>
          </nav>
          <div class="tab-content p-3 w-100" id="nav-tabContent">
            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
              <div class="row">
                <div class="col-md-3">
                  <div class="card card-success card-outline">
                    <div class="card-body">
                      <div class="card-text">
                        <label> Nama Produk</label> :
                        <p> <?= $data['nama_produk'] ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="card card-success card-outline">
                    <div class="card-body">
                      <div class="card-text">
                        <label> Berat</label> :
                        <p> <?= $data['berat'] ?> Gram</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card card-success card-outline">
                    <div class="card-body">
                      <div class="card-text">
                        <label> Jenis Kategori</label> :
                        <p> <?= $data['nama_kategori'] ?></p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card card-success card-outline">
                    <div class="card-body">
                      <div class="card-text">
                        <label> Deskripsi</label> :
                        <p> <?= $data['deskripsi'] ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
            <div class="tab-pane fade pl-5 pr-5" id="product-review" role="tabpanel" aria-labelledby="product-review-tab">
              <div class="row">
                <div class="col-md-6 offset-md-3">
                  <div class="card card-widget card-outline card-info">

                    <!-- /.card-body -->
                    <div class="card-body card-comments bg-white">
                      <div class="card-comment">
                        <!-- User image -->
                        <img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image">
                        <div class="comment-text">
                         <form action="#" method="post">
                          <!-- .img-push is used to add margin to elements next to floating images -->
                          <div class="img-push">
                            <input type="text" class="form-control form-control-sm" placeholder="Press enter to post comment">
                          </div>
                        </form>
                      </div>
                      <!-- /.comment-text -->
                    </div>
                    <!-- /.card-comment -->
                    <div class="card-comment">
                      <!-- User image -->
                      <img class="img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="User Image">

                      <div class="comment-text">
                        <span class="username">
                          Luna Stark
                          <span class="text-muted float-right">8:03 PM Today</span>
                        </span><!-- /.username -->
                        It is a long established fact that a reader will be distracted
                        by the readable content of a page when looking at its layout.
                      </div>
                      <!-- /.comment-text -->
                    </div>
                    <!-- /.card-comment -->
                  </div>
                  <!-- /.card-footer -->
                  <div class="card-footer">

                  </div>
                  <!-- /.card-footer -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>
</div>
</form>
<div class="modal fade" id="modal-pesan-<?= $data['id_produkdetail'] ?>">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Pesan <?= $data['nama_produk'] ?></h4>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <img src="data:image/jpg;base64,<?= base64_encode($data['gambar'])?>" class="product-image" alt="Product Image">
              </div>
              <div class="col-md-6">
                <img src="data:image/jpg;base64,<?= base64_encode($data['gambar'])?>" class="product-image" alt="Product Image">
              </div>
            </div>
          </div>
        </div>
        <button type="button" class="btn btn-primary btn-app"><i class="fas fa-cart-plus"></i> Add to List</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php endforeach; ?>

<script type="text/javascript">
  $(document).ready(function(){
    function cekharga(){
     var pilihwarna = $("input[name='warna']:checked").val();
     var pilihukuran = $("input[name='ukuran']:checked").val();
     <?php $row6=$db->tampilcond('tb_produk.id_produk,tb_produkdetail.*','tb_produk,tb_produkdetail','tb_produk.id_produk=tb_produkdetail.id_produk and tb_produk.id_produk="'.$_GET['id'].'"');
     foreach($row6 as $data6): ?>
      if (pilihwarna == "<?= $data6['warna'] ?>" && pilihukuran == "<?= $data6['ukuran'] ?>") {
       var total= $("input[name='jumlah']").val()* <?= $data6['hargajual'] ?>;
       $("#total").text("Rp."+total+",-");
       $("#id_produkdetail").val("<?=$data6['id_produkdetail']?>");
     } 
     else {
     }
   <?php endforeach; ?>

 };
 function cektombol(){
  if($("input[name='ukuran']").is(':checked')){

    $("#bt").removeClass("disabled");
  } else {
    $("#bt").addClass("disabled");
  }
 }
 $("input[name='warna']").click(function(){
  var pilihwarna = $("input[name='warna']:checked").val();
  <?php $row4=$db->tampilcond('tb_produk.id_produk,tb_produkdetail.*','tb_produk,tb_produkdetail','tb_produk.id_produk=tb_produkdetail.id_produk and tb_produk.id_produk="'.$_GET['id'].'"');
  foreach($row4 as $data4): ?>
    if (pilihwarna == "<?= $data4['warna'] ?>") {
      $(".<?= $data4['warna'] ?>").show();
      $("#<?= "label".$data4['warna'] ?>").addClass("btn-info");
      $("#<?= "label".$data4['warna'] ?>").removeClass("btn-default");
    } 
    else {

      $(".<?= $data4['warna'] ?>").hide();
      $("#<?= "label".$data4['warna'] ?>").addClass("btn-default");
      $("#<?= "label".$data4['warna'] ?>").removeClass("btn-info");
      $("#<?= "label".$data4['ukuran'] ?>").addClass("btn-default");
      $("#<?= "label".$data4['ukuran'] ?>").removeClass("btn-info");
    }
  <?php endforeach; ?>
  cektombol();
});

 $("input[name='ukuran']").click(function(){
  var pilihwarna = $("input[name='warna']:checked").val();
  var pilihukuran = $("input[name='ukuran']:checked").val();
  <?php $row5=$db->tampilcond('tb_produk.id_produk,tb_produkdetail.*','tb_produk,tb_produkdetail','tb_produk.id_produk=tb_produkdetail.id_produk and tb_produk.id_produk="'.$_GET['id'].'"');
  foreach($row5 as $data5): ?>
    if ((pilihwarna == "<?= $data5['warna'] ?>") && (pilihukuran == "<?= $data5['ukuran'] ?>")) {
      $("#<?= "label".$data5['ukuran'] ?>").addClass("btn-info");
      $("#<?= "label".$data5['ukuran'] ?>").removeClass("btn-default");
      $("#gambarutama").attr("src","data:image/jpg;base64,<?= base64_encode($data5['gambar'])?>");
      $("#hargajual").val("<?= $data5['hargajual'] ?>");
      cekharga();

    } 
    else {
      $("#<?= "label".$data5['ukuran'] ?>").addClass("btn-default");
      $("#<?= "label".$data5['ukuran'] ?>").removeClass("btn-info");
    }
  <?php endforeach; ?>

  cektombol();
});

   $("input[name='jumlah']").on('input',function(){
    cekharga();
  });

 });
</script>