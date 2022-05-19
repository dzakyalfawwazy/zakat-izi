<!-- ***** Breadcumb Area Start ***** -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(hanb/img/bg-img/hero-1.jpg)"></div>
<!-- ***** Breadcumb Area End ***** -->
<section class="dorne-listing-destinations-area section-padding-100-50">
  <div class="container-fluid small">
    <div class="row">
      <div class="col-12">
        <div class="section-heading dark text-center mb-1">
          <span></span>
          <h4>Order Tour Desctionation</h4>
          <p>Nagari Pariangan</p>
        </div>
      </div>
    </div>
        <div class="invoice p-3 mb-3">
          <!-- title row -->
          <?php 
          $row2 = $db -> tampildetail("tb_order","id_order='$_GET[id]'");
          foreach($row2 as $data2): endforeach;  ?>
          <div class="row">
            <div class="col-12">
              <h4>
                <i class="fas fa-globe"></i> Ordering
                <small class="float-right">Date : <?= date('d/m/Y') ?></small>
              </h4>
            </div>
            <!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">

              <b>Order ID:</b><?= $data2['id_order'] ?><br>
              <b>Time Order:</b><?= $data2['waktu_penjualan'] ?><br>
              <b>Time Limit Payment:</b><?= $data2['waktu_kadaluarsa'] ?><br>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <b>Total:</b><h3>Rp.<?= $data2['total_bayar'] ?>,-</h3><br>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <b>Payment Status</b><br>
              <h1><?= $data2['status'];
              if($data2['status']=='Belum bayar')  echo "<script>window.alert('Pembayaran belum di unggah'); window.location.href='index.php?hal=pembayaran&id=$_GET[id]'</script>"; else {} ?></h1>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- Table row -->
          <div class="row">
             <div class="col-7 table-responsive">
          <table class="table table-striped">
           <thead>
            <tr class="bg-primary text-white">
              <th>Time</th>
              <th></th>
              <th>Place</th>
              <th>Cost</th>
            </tr>
          </thead>
          <tbody>
           <?php 
           $row = $db -> tampildetail("tb_wisata,tb_transaksi","tb_transaksi.id_wisata=tb_wisata.id_wisata and tb_transaksi.id_order='".$_GET['id']."'");
           foreach($row as $data){
             ?>
             <tr>
              <td><?= $data['tanggal'] ?>,<?= $data['jam'] ?></td>
              <td align="center"> <div class="img-rounded text-center" style="height: 100px; width: 150px"><img src="data:image/jpg;base64,<?= base64_encode($data['gambar'])?>" class="img-fluid img-rounded" alt="Product Image"></div></td>
              <td><?= $data['nama_wisata'] ?></td>
              <td>Rp.<?= $data['biaya']; ?>,-</td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <p class="lead">Payment Information</p>
      <p class="jumbotron bg-gradient-light" style="margin-top: 5px;">
       <?= $bank['nilai']; ?>
     </p>
   </div>
          <!-- accepted payments column -->
          <div class="col-5">

            <div class="card">
              <div class="card-body">
                <form method="post" action="hanb/_proses.php?type=terimapesanan&id=<?= $_GET['id'] ?>" enctype="multipart/form-data">
                  <div class="row">
                    <h3 class="col-7">Payment Token</h3>
                    <div class="col-5">
                      <?php if($data2['status']=='Selesai') { ?>
                      <span class="btn btn-warning btn-sm float-right"><i class="far fa-credit-card"></i> Pesanan Telah Diterima!
                      </span>
                    <?php } else if($data2['status']=='Verifikasi Pembayaran') { ?>
                      <button type="submit" class="btn btn-success btn-sm float-right" onclick="return confirm('Barang Pesanan Sudah Diterima?')"><i class="far fa-credit-card"></i> Konfirmasi Pesanan Telah Diterima!
                      </button>
                    <?php } else {}?>
                    </div>
                  </div>
                  <img src="data:image/jpg;base64,<?= base64_encode($data2['bukti_pembayaran'])?>" id="output_image" class="img-thumbnail col-12" alt="Bukti Pembayaran">
                </form>
              </div>
              <!-- /.form-box -->
            </div><!-- /.card -->
          </div>
          <div class="col-6">
              
            </div>
          <!-- /.col -->
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
</div><!-- /.container-fluid -->
</section>

<script src="plugins/jquery/jquery.min.js"></script>
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