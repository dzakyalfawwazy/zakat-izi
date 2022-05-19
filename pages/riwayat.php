<?php
if(empty($_SESSION['status']) or $_SESSION['status']!="login"){
  echo "<script>alert('Opps! You must login to see this pages!'); window.location.href='login.php'</script>";
} else {}

?>
<!-- ***** Breadcumb Area Start ***** -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(hanb/img/bg-img/hero-1.jpg)"></div>
<!-- ***** Breadcumb Area End ***** -->
<section class="dorne-listing-destinations-area section-padding-100-50">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="section-heading dark text-center mb-1">
          <span></span>
          <h4>History Order</h4>
          <p>Nagari Pariangan</p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-5 col-sm-3">
        <div class="contact-form p-4">
          <h4>History</h4>
          <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Success</a>
            <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">In Process</a>
            <a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill" href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages" aria-selected="false">Failed</a>
          </div>
        </div>
      </div>
      <div class="col-7 col-sm-9">
        <div class="tab-content" id="vert-tabs-tabContent">
          <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
            <table class="table table-striped table-bordered small">
              <thead style="background: purple" class="text-white">
                <tr>
                  <td>ID Order</td>
                  <td></td>
                  <td>Date</td>
                  <td>Time</td>
                  <td>Place</td>
                  <td>Cost</td>
                  <td>Actions</td>
                </tr>
              </thead>
              <tbody>
                <?php $row=$db->tampildetail('tb_transaksi,tb_order,tb_wisata','tb_order.id_order=tb_transaksi.id_order and tb_transaksi.id_wisata=tb_wisata.id_wisata and tb_order.id_pelanggan="'.$_SESSION["id_pelanggan"].'"');
                foreach($row as $data): if($data['status']=='Selesai'){ ?>

                  <tr>
                    <td><?= $data['id_order'] ?></td>
                    <td class="text-center"> <div style="width: 150px" class="text-center"><img class="img-fluid" src="data:image/jpg;base64,<?= base64_encode($data['gambar'])?>" alt="Product Image"></div></td>
                    <td><?= date('d/m/Y',strtotime($data['tanggal'])) ?></td>
                    <td><?= date('h:i',strtotime($data['jam'])) ?></td>
                    <td><?= $data['nama_wisata'] ?></td>
                    <td>Rp.<?= number_format($data['biaya']) ?>,-</td>
                    <td><a href="index.php?hal=pembayaran&id=<?= $data['id_order'] ?>" class="badge badge-primary">Detail</a></td>
                  </tr>

                <?php } endforeach; ?>
              </tbody>
            </table>
          </div>
          <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
           <table class="table table-striped table-bordered small">
            <thead style="background: navy" class="text-white">
              <tr>
                  <td>ID Order</td>
                  <td></td>
                  <td>Date</td>
                  <td>Time</td>
                  <td>Place</td>
                  <td>Cost</td>
                  <td>Actions</td>
              </tr>
            </thead>
            <tbody>
              <?php $row2=$db->tampildetail('tb_transaksi,tb_order,tb_wisata','tb_order.id_order=tb_transaksi.id_order and tb_transaksi.id_wisata=tb_wisata.id_wisata and tb_order.id_pelanggan="'.$_SESSION["id_pelanggan"].'"');
              foreach($row2 as $data2): 
                if($data2['status']=='Belum Bayar' or $data2['status']=='Unggah Pembayaran' or $data2['status']=='Verifikasi Pembayaran'){
                  ?>
                  <tr>
                    <td><?= $data2['id_order'] ?></td>
                    <td class="text-center"> <div style="width: 150px" class="text-center"><img class="img-fluid" src="data:image/jpg;base64,<?= base64_encode($data2['gambar'])?>" alt="Product Image"></div></td>
                    <td><?= date('d/m/Y',strtotime($data2['tanggal'])) ?></td>
                    <td><?= date('H:i',strtotime($data2['jam'])) ?></td>
                    <td><?= $data2['nama_wisata'] ?></td>
                    <td>Rp.<?= number_format($data2['biaya']) ?>,-</td>
                    <td><a href="index.php?hal=pembayaran&id=<?= $data2['id_order'] ?>" class="badge badge-primary">Detail</a></td>
                  </tr>

                <?php } endforeach; ?>
              </tbody>
            </table>
          </div>
          <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">
           <table class="table table-striped table-bordered small">
            <thead style="background: black" class="text-white">
              <tr>
                  <td>ID Order</td>
                  <td></td>
                  <td>Date</td>
                  <td>Time</td>
                  <td>Place</td>
                  <td>Cost</td>
                  <td>Actions</td>
              </tr>
            </thead>
            <tbody>
              <?php $row2=$db->tampildetail('tb_transaksi,tb_order,tb_wisata','tb_order.id_order=tb_transaksi.id_order and tb_transaksi.id_wisata=tb_wisata.id_wisata and tb_order.id_pelanggan="'.$_SESSION["id_pelanggan"].'"');
              foreach($row2 as $data2):
               if($data2['status']=='Batal' or $data2['status']=='Kadaluarsa'){ ?>

                <tr>
                  <td><?= $data2['id_order'] ?></td>
                  <td class="text-center"> <div style="width: 150px" class="text-center"><img class="img-fluid" src="data:image/jpg;base64,<?= base64_encode($data2['gambar'])?>" alt="Product Image"></div></td>
                  <td><?= date('d/m/Y',strtotime($data2['tanggal'])) ?></td>
                  <td><?= date('H:i',strtotime($data2['jam'])) ?></td>
                  <td><?= $data2['nama_wisata'] ?></td>
                  <td>Rp.<?= number_format($data2['biaya']) ?>,-</td>
                  <td><a href="index.php?hal=pembayaran&id=<?= $data2['id_order'] ?>" class="badge badge-primary">Detail</a></td>
                </tr>

              <?php } endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div><!-- /.row -->
</section>
