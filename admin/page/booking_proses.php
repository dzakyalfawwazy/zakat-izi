<?php if((isset($_GET['type'])) and ($_GET['type']=="pesan")){
 if(isset($_POST['tambah'])){
$query=mysqli_query($conn,"INSERT INTO `tb_booking`(`id_booking`, `tanggal_pesan`, `id_kamar`, `id_pasien`, `waktu_checkin`, `waktu_checkout`, `status`) VALUES (null,'$_POST[tanggal_pesan]','$_POST[id_kamar]','$_POST[id_pasien]','','','booked')");
if ($query)
{
  echo "<script>window.alert('Booking Selesai')</script>";
}
}
 ?>
<form role="form" method="post">
<div class="col-md-12 text-right">
  <button type="submit" name="tambah" class="btn btn-small btn-success"> <i class="fas fa-check"></i> Proses Booking Kamar </button>
</div>
  <div class="row">
    <div class="col-md-4 offset-md-4">
      <!-- text input -->
      <div class="form-group">
        <label>Tanggal Pesan</label>
        <input type="date" name="tanggal_pesan" class="form-control form-control-sm" placeholder="Enter ..." value="<?= $_POST['tanggal_pesan'] ?>" readonly>
      </div>
      <div class="form-group">
        <label>ID Kamar </label>
        <select required class="form-control form-control-sm" name="id_kamar" placeholder="Enter ...">
          <option value="">Pilih Pilih Kamar</option>
          <?php $jKamar=mysqli_query($conn,"SELECT * FROM tb_kamar where id_kamar not in (SELECT id_kamar FROM tb_booking where tanggal_pesan='_POST[tanggal_pesan]' or (tanggal_pesan < '_POST[tanggal_pesan]' and status='checkin') or (tanggal_pesan < '_POST[tanggal_pesan]' and status='booked'))");
          while ($qKamar = mysqli_fetch_array($jKamar)) {
          ?> <option value = "<?= $qKamar['id_kamar'] ?>"><?= $qKamar['nama_kamar'] ?></option>
        <?php } ?>
      </select>
      </div>
      <div class="form-group">
        <label>ID Pasien</label>
        <select required class="form-control form-control-sm" name="id_pasien" placeholder="Enter ...">
          <option value="">Pilih Pasien</option>
          <?php $jKamar1=mysqli_query($conn,"SELECT * FROM tb_pasien");
          while ($qKamar1 = mysqli_fetch_array($jKamar1)) {
          ?> <option value = "<?= $qKamar1['id_pasien'] ?>"><?= $qKamar1['nama'] ?></option>
        <?php } ?>
      </select>
    </div>
  </div>
</div>
</form>
<?php } else {?>

<form role="form" method="post" action="index.php?p=6&type=pesan">
<div class="col-md-12 text-right">
</div>
  <div class="row">
    <div class="col-md-4 offset-md-4">
      <!-- text input -->
      <div class="form-group">
        <label>Tanggal Pesan</label>
        <input type="date" name="tanggal_pesan" class="form-control form-control-sm" placeholder="Enter ...">
      </div>
  <button type="submit" class="btn btn-small btn-success"> <i class="fas fa-check"></i> Lihat Kamar </button>
  </div>
</div>
</form>
<?php } ?>
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
      <th>Status</th>
    </tr>
  </thead>
 <tbody>
    <?php $kamar  =mysqli_query($conn,"select * from tb_booking,tb_pasien,tb_kamar where tb_booking.id_kamar=tb_kamar.id_kamar and tb_pasien.id_pasien=tb_booking.id_pasien and status ='booked' order by id_booking");
    while($data=mysqli_fetch_array($kamar)) { $no=0;$no++; ?>

    <tr>
      <td><?= $no; ?></td>
      <td><?= $data['id_booking'] ?></td>
      <td><?= $data['tanggal_pesan'] ?></td>
      <td><?= $data['id_kamar'] ?></td>
      <td><?= $data['nama_kamar'] ?></td>
      <td><?= $data['id_pasien'] ?></td>
      <td><?= $data['nama'] ?></td>
      <td><?= $data['status'] ?></td>
    </tr>
  <?php } ?>
  </tbody>
</table>
