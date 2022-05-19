<?php 
if(isset($_GET['menu'])){
  if($_GET['menu']=='Add') { ?>
    

<div class="row">
<a href="#" class="btn btn-small btn-primary col-md-2 mb-2"> <i class="fas fa-book"></i> Lihat Data </a>
<a href="#" class="btn btn-small btn-success col-md-2 offset-md-8 mb-2"> <i class="fas fa-save"></i> Tambah Data </a>
</div>
  <?php }} else { ?>
    <div class="table">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal Kunjungan</th>
            <th>NIK Pasien</th>
            <th>Nama Pasien</th>
            <th>Keterangan</th>
          </tr>
        </thead>
        <tbody>
          <?php $kamar  =mysqli_query($conn,"select * from tb_kunjungan order by id_kunjungan");
          while($data=mysqli_fetch_array($kamar)) { $no=0;$no++; ?>

            <tr>
              <td><?= $no; ?></td>
              <td><?= $data['tanggal_kunjungan'] ?></td>
              <td><?= $data['nik_pengunjung'] ?></td>
              <td><?= $data['nama_pengunjung'] ?></td>
              <td><?= $data['keterangan_kunjungan'] ?></td>
              
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <?php } ?>