<?php 
date_default_timezone_set("Asia/Jakarta");
    $date=date('Y-m-d H:s');
    $date1=date('Y-m-d');
       if(isset($_POST['tambah'])){
$query=mysqli_query($conn, "UPDATE `tb_booking` SET waktu_checkout = '$date',status='selesai' where id_booking='$_POST[id_booking]'");
if ($query)
{
  echo "<script>window.alert('Check Out Selesai')</script>";
}
}
  ?>
<form role="form" method="post">
  <div class="row">
    <div class="col-md-12 text-right">
       <button type="submit" name="tambah" class="btn btn-small btn-success"> <i class="fas fa-check"></i> Proses Checkout </button>
    </div>
    <div class="form-group col-md-4 offset-md-4">
      <label>Pesanan</label>
      <select required class="form-control form-control-sm" name="id_booking" placeholder="Enter ...">
          <option value="">Pilih Pilih Kamar</option>
          <?php $jKamar=mysqli_query($conn,"SELECT * FROM tb_booking join tb_pasien on tb_booking.id_pasien=tb_pasien.id_pasien where tb_booking.status='checkin'");
          while ($qKamar = mysqli_fetch_array($jKamar)) {
          ?> <option value = "<?= $qKamar['id_booking'] ?>"><?= $qKamar['nama'] ?>(<?= $qKamar['tanggal_pesan'] ?>)</option>
        <?php } ?>
      </select>
    </div>
    <!-- text input -->
   <!--  <div class="form-group col-md-3 offset-md-1">
      <label>Tanggal Pesan</label>
        <input type="text" class="form-control form-control-sm" placeholder="Enter ...">
    </div>
    <div class="form-group col-md-3">
      <label>ID Kamar </label>
      <input type="text" class="form-control form-control-sm" placeholder="Enter ...">
    </div>
    <div class="form-group col-md-3">
      <label>ID Pasien</label>
        <input type="text" class="form-control form-control-sm" placeholder="Enter ...">
    </div>
    <div class="col-md-1 ">
      <a href="#" class="btn btn-sm btn-success mt-4 p-1"> <i class="fas fa-book"></i> Lihat Data </a>
    </div> -->
  </div>
</form>
  <table id="example1" class="table table-bordered table-striped text-sm">
  <thead>
    <tr>
      <th>No</th>
      <th>ID Booking</th>
      <th>Tanggal Pesan</th>
      <th>ID Kamar</th>
      <th>Nama Kamar</th>
      <th>ID Pasien</th>
      <th>Nama Pasien</th>
      <th>Waktu Masuk</th>
      <th>Waktu Keluar</th>
      <th>Lama Inap</th>
      <th>Status</th>
    </tr>
  </thead>
 <tbody>
    <?php $kamar  =mysqli_query($conn,"select tb_booking.*,tb_pasien.*,tb_kamar.*, datediff(waktu_checkout,tanggal_pesan) as lama from tb_booking,tb_pasien,tb_kamar where tb_booking.id_kamar=tb_kamar.id_kamar and tb_pasien.id_pasien=tb_booking.id_pasien and (status ='selesai' or status = 'checkin') order by status,id_booking ");
    while($data=mysqli_fetch_array($kamar)) { $no=0;$no++; ?>

    <tr>
      <td><?= $no; ?></td>
      <td><?= $data['id_booking'] ?></td>
      <td><?= $data['tanggal_pesan'] ?></td>
      <td><?= $data['id_kamar'] ?></td>
      <td><?= $data['nama_kamar'] ?></td>
      <td><?= $data['id_pasien'] ?></td>
      <td><?= $data['nama'] ?></td>
      <td nowrap><?= $data['waktu_checkin'] ?></td>
      <td nowrap><?= $data['waktu_checkout'] ?></td>
      <td><?php if ($data['status']=="selesai") { echo $data['lama']." Hari";}
                else echo "Masih Inap";
           ?></td>
      <td><?= $data['status'] ?></td>
    </tr>
  <?php } ?>
  </tbody>
</table>