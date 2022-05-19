<?php
if(empty($_SESSION['status']) or $_SESSION['status']!="login"){
  echo "<script>alert('Opps! You must login to see this pages!'); window.location.href='login.php'</script>";
} else {}

?>
<?php
if(isset($_POST['caripemandu'])){
 $qpe=$db->tampildetail("tb_absen,tb_pemandu","tb_pemandu.id_pemandu=tb_absen.id_pemandu and date(tb_absen.waktuabsen)='".date('Y-m-d')."' and time(tb_absen.waktuabsen) < '".$_POST['time']."' and tb_absen.status='Tersedia' order by tb_absen.waktuabsen asc");
 $count=$qpe->num_rows;
 if($count > 0){
 foreach($qpe as $pemandu){}
  $insert=$db->edit('tb_order','id_pemandu="'.$pemandu["id_pemandu"].'"','id_order',$_POST["id_order"]);
$absen=$db->edit('tb_absen','status="Proses"','id_absen',$pemandu["id_absen"]);

// echo"update $table  set $value where $cond  = '$set'";
} 
else {
  echo "<script>alert('Pemandu Tidak Ditemukan!');window.location='index.php?hal=temukanpemandu&id=".$_POST['id_order']."'</script>"; 
} } ?>
<?php
if(isset($_POST['selesai'])){
// echo 'id_pemandu= "'.$_POST["id_pemandu"].'" and tb_absen.waktuabsen="'.date("Y-m-d").'"';
  $insert=$db->edit('tb_order','status="Selesai"','id_order',$_POST["id_order"]);
$absen=$db->edit2('tb_absen','status="Tersedia"','id_pemandu= "'.$_POST["id_pemandu"].'" and date(tb_absen.waktuabsen)="'.date("Y-m-d").'"');
echo "<script>alert('Proses Pemandu Selesai');window.location.href='index.php?hal=riwayat'</script>";

} ?>
<!-- ***** Breadcumb Area Start ***** -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(hanb/img/bg-img/hero-1.jpg)"></div>
<!-- ***** Breadcumb Area End ***** -->
<section class="dorne-listing-destinations-area pt-3">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="section-heading dark text-center mb-1">
          <span></span>
          <h4>Tour Guide</h4>
        </div>
      </div>
    </div>

    <?php $row=$db->tampildetail('tb_order, tb_transaksi','tb_order.id_order=tb_transaksi.id_order and tb_order.id_pelanggan="'.$_SESSION["id_pelanggan"].'" and tb_order.status="Verifikasi Pembayaran" and tb_transaksi.tanggal="'.date('Y-m-d').'" and tb_order.id_order="'.$_GET["id"].'"');
    foreach($row as $data2): ?>
    <?php endforeach; ?>
    <div class="row">
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <h5>Order Information</h5>
            <table class="table table-striped table-bordered small">
              <tr>
                <td>ID Order</td>
                <td><?= $data2['id_order'] ?></td>
              </tr>
              <tr>
                <td>Date</td>
                <td><?= date('d/m/Y',strtotime($data2['tanggal'])) ?></td>
              </tr>
              <tr>
                <td>Time Depature</td>
                <td><?= date('H:i',strtotime($data2['jam'])) ?></td>
              </tr>
            </table>
            <h5>Tour Information</h5>
            <table class="table table-striped table-bordered small">
              <tr>
                <th>Place</th>
                <th>Time</th>
              </tr>
              <?php $row1=$db->tampildetail('tb_transaksi,tb_order,tb_wisata','tb_order.id_order=tb_transaksi.id_order and tb_transaksi.id_wisata=tb_wisata.id_wisata and tb_order.id_pelanggan="'.$_SESSION["id_pelanggan"].'"  and tb_order.id_order="'.$_GET["id"].'"');
              foreach($row1 as $data){ ?>
                <tr><td>
                  <?= $data['nama_wisata'] ?></td><td><?= $data['jam'] ?></td></tr>
                <?php } ?>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="jumbotron bg-warning">
            <h4>Information:</h4>
            <span>Please gathering 15 minutes before the guide will start!</span>
          </div>
          <?php if($data2['id_pemandu']!='-'){ ?>
            <form method="post">
              <input type="hidden" name="id_pemandu" value="<?= $data2['id_pemandu'] ?>">
              <input type="hidden" name="id_order" value="<?= $data2['id_order'] ?>">
            <h6>Please confirm when it has finished:</h6>
            <button type="submit" name="selesai" class="btn btn-success col-12">Finish Guide</button>
          </form>
          <?php } else {} ?>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5>Guide's Information</h5>
              <?php if($data2['id_pemandu']=='-'){ ?>
                <span>Tour guide not found! Press button below to find the tour guide!</span>
                <form method="post" action="">
                  <input type="hidden" name="time" value="<?= $data2['jam'] ?>">
                  <input type="hidden" name="id_order" value="<?= $data2['id_order'] ?>">
                  <button type="submit" onclick="return confirm('Cari Pemandu?')" class="btn btn-warning" name="caripemandu"> <i class="fas fa-search"></i> Find Tour Guide</button>
                </form>
              <?php } else { ?>
                <?php $row2=$db->tampildetail('tb_pemandu','id_pemandu="'.$data2['id_pemandu'].'"'); foreach($row2 as $pro){} ?>
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                  <div class="card-body">
                    <div class="text-center">
                     <img class="img-fluid img-thumbnail"
                     src="data:image/jpg;base64,<?= base64_encode($pro['foto'])?>" style="width: 150px"
                     alt="User profile picture">
                   </div>
                   <h3 class="profile-username text-center"><?= $pro['nama_pemandu'] ?></h3>

                   <p class="text-muted text-center">Tour Guide</p>

                   <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>ID Tour Guide</b> <a class="float-right"><?= $pro['id_pemandu'] ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Phone Number</b> <div class="float-right"><?= $pro['nohp'] ?></div>
                    </li>
                    <li class="list-group-item">
                      <b>Email</b> <div class="float-right"><?= $pro['email'] ?></div>
                    </li>
                    <li class="list-group-item">
                      <b>Gender</b> <div class="float-right"><?= $pro['jenkel'] ?></div>
                    </li>
                    <li class="list-group-item">
                      <b>Date Birth</b> <div class="float-right"><?= $pro['tgl_lahir'] ?></div>
                    </li>
                  </ul>

                </div>
                <!-- /.card-body -->
              </div>
            <?php }?>
          </div>
        </div>
      </div>
    </div>

  </div><!-- /.row -->
</section>
