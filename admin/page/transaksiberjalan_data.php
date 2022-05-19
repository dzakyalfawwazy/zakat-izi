<a href="#" class="btn btn-small btn-success col-md-2 offset-md-10 mb-2"> <i class="fas fa-plus"></i> Tambah Data </a>
<?php 
if(isset($_GET['menu'])){
if($_GET['menu']=='Add') { ?>
  

  
<?php }} else { ?>
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
      <th>Status</th>
    </tr>
  </thead>
 <tbody>
    <?php $kamar  =mysqli_query($conn,"select * from tb_booking,tb_pasien,tb_kamar where tb_booking.id_kamar=tb_kamar.id_kamar and tb_pasien.id_pasien=tb_booking.id_pasien and status<> 'selesai' order by id_booking");
    while($data=mysqli_fetch_array($kamar)) { $no=0;$no++; ?>

    <tr>
      <td><?= $no; ?></td>
      <td><?= $data['id_booking'] ?></td>
      <td><?= $data['tanggal_pesan'] ?></td>
      <td><?= $data['id_kamar'] ?></td>
      <td><?= $data['nama_kamar'] ?></td>
      <td><?= $data['id_pasien'] ?></td>
      <td><?= $data['nama'] ?></td>
      <td><?= $data['waktu_checkin'] ?></td>
      <td><?= $data['waktu_checkout'] ?></td>
      <td><?= $data['status'] ?></td>
    </tr>
  <?php } ?>
  </tbody>
</table>
  <?php } ?>