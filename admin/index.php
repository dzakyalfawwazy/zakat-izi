<?php include 'acc/config.php' ?>
<?php include 'acc/head.php' ?>

<?php 

if(isset($_GET))
{
  if (isset($_GET['p']))
  {
    if($_GET['p']=='1') {$judul='Data Pasien';$body='page/pasien_data.php';}
    elseif($_GET['p']=='2') {$judul='Data Jenis Kamar';$body='page/jeniskamar_data.php';}
    elseif($_GET['p']=='3') {$judul='Data Kamar';$body='page/kamar_data.php';}
    elseif($_GET['p']=='4') {$judul='Data Kunjungan';$body='page/kunjungan_data.php';}
    elseif($_GET['p']=='5') {$judul='Data Rekap';$body='page/transaksi_data.php';}
    elseif($_GET['p']=='6') {$judul='Proses Booking';$body='page/booking_proses.php';}
    elseif($_GET['p']=='7') {$judul='Data Check In';$body='page/checkin.php';}
    elseif($_GET['p']=='8') {$judul='Data Check Out';$body='page/checkout.php';}
    elseif($_GET['p']=='9') {$judul='Data Profil';$body='page/profil.php';}
    elseif($_GET['p']=='5') {$judul='Data Booking dalam Proses';$body='page/transaksiberjalan_data.php';}
    else { $judul = 'Beranda'; $body = 'page/main.php'; } 
  } else  { $judul = 'Beranda'; $body = 'page/main.php'; }
  } else  { $judul = 'Beranda'; $body = 'page/main.php'; }
  ?>
  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"><?= $judul ?></h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <?php include $body ?>        

        </div>
        <!-- /.card-body -->
        <div class="card-footer">

        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
      <?php include 'acc/foot.php' ?>