<?php 
if(isset($_GET['menu'])){
  if($_GET['menu']=='Add') {
    $date=date('Y-m-d');
    if(isset($_POST['tambah'])){
      $namafile = $_FILES['foto']['name'];
      $tmp = $_FILES['foto']['tmp_name'];
      move_uploaded_file($tmp, '../hanb/img/kamar/'.date('d-m-Y').'-'.$namafile);
      $gambar = date('d-m-Y').'-'.$namafile; 
      $query=mysqli_query($conn,"INSERT INTO `tb_pasien`(`id_pasien`, `nik`, `nama`, `jenkel`, `tgl_lahir`, `alamat`, `telpon`, `foto`, `tgl_daftar`) VALUES (NULL,'$_POST[nik]','$_POST[nama]','$_POST[jenkel]','$_POST[tgl_lahir]','$_POST[alamat]','$_POST[telpon]','$gambar','$date')");
      }
    ?>

    <form role="form" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-4 offset-md-2">
          <!-- text input -->
          <div class="form-group">
            <label>Nama </label>
            <input type="text" name="nama" class="form-control form-control-sm" placeholder="Enter ...">
          </div>
          <div class="form-group">
            <label>NIK</label>
            <input type="text" name="nik" class="form-control form-control-sm" placeholder="Enter ...">
          </div>
          <div class="form-group">
            <label>Jenis Kelamin</label>
            <select class="form-control form-control-sm" name="jenkel" placeholder="Enter ...">
              <option>Laki-Laki</option>
              <option>Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" class="form-control form-control-sm" name="tgl_lahir" placeholder="Enter ...">
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input type="text" class="form-control form-control-sm" name="alamat" placeholder="Enter ...">
          </div>
          <div class="form-group">
            <label>Telfon</label>
            <input type="text" class="form-control form-control-sm" name="telpon" placeholder="Enter ...">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="exampleInputFile">foto pasien</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" accept=".jpg,.jpeg" name="foto" class="custom-file-input form-control-sm" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Pilih Foto (JPG)</label>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <a href="index.php?p=1" class="btn btn-small btn-primary col-md-2 mb-2"> <i class="fas fa-book"></i> Lihat Data </a>
        <button type="submit" name="tambah" class="btn btn-small btn-success col-md-2 offset-md-8 mb-2"> <i class="fas fa-save"></i> Tambah Data </button>
      </div>
    </form>
  <?php } elseif($_GET['menu']=='Edit') {
    $sPasien=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM tb_pasien where id_pasien='$_GET[id]'"));
    $date=date('Y-m-d');
    if(isset($_POST['edit'])){
      if(isset($_FILES['foto']))
      {
        $namafile = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];
        move_uploaded_file($tmp, '../hanb/img/kamar/'.date('d-m-Y').'-'.$namafile);
        $gambar = date('d-m-Y').'-'.$namafile; 
        $query=mysqli_query($conn,"UPDATE `tb_pasien` set `nik`='$_POST[nik]', `nama`='$_POST[nama]', `jenkel`='$_POST[jenkel]', `tgl_lahir`='$_POST[tgl_lahir]', `alamat`='$_POST[alamat]', `telpon`='$_POST[telpon]',foto='$gambar'  where id_pasien = '$_GET[id]'");
      }
      else {
        $query=mysqli_query($conn,"UPDATE `tb_pasien` set `nik`='$_POST[nik]', `nama`='$_POST[nama]', `jenkel`='$_POST[jenkel]', `tgl_lahir`='$_POST[tgl_lahir]', `alamat`='$_POST[alamat]', `telpon`='$_POST[telpon]' where id_pasien = '$_GET[id]'");
      }
      if ($query)
      {
        echo "<script>window.location.href='index.php?p=1'</script>";
      }
    
    }
    ?>

    <form role="form" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-4 offset-md-2">
          <!-- text input -->
          <div class="form-group">
            <label>Nama </label>
            <input type="text" name="nama" class="form-control form-control-sm" value="<?= $sPasien['nama'] ?>" placeholder="Enter ...">
          </div>
          <div class="form-group">
            <label>NIK</label>
            <input type="text" name="nik" class="form-control form-control-sm" value="<?= $sPasien['nik'] ?>" placeholder="Enter ...">
          </div>
          <div class="form-group">
            <label>Jenis Kelamin</label>
            <select class="form-control form-control-sm" name="jenkel" placeholder="Enter ...">
              <option value="<?= $sPasien['jenkel'] ?>"><?= $sPasien['jenkel'] ?></option>
              <option>Laki-Laki</option>
              <option>Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" class="form-control form-control-sm" name="tgl_lahir" value="<?= $sPasien['tgl_lahir'] ?>" placeholder="Enter ...">
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input type="text" class="form-control form-control-sm" name="alamat" value="<?= $sPasien['alamat'] ?>" placeholder="Enter ...">
          </div>
          <div class="form-group">
            <label>Telfon</label>
            <input type="text" class="form-control form-control-sm" name="telpon" value="<?= $sPasien['telpon'] ?>" placeholder="Enter ...">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="exampleInputFile">foto pasien</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" accept=".jpg,.jpeg" name="foto" class="custom-file-input form-control-sm" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Pilih Foto (JPG)</label>
              </div>
            </div>
            <img src="../hanb/img/pasien/<?= $data['foto'] ?>"> 
          </div>
        </div>
      </div>

      <div class="row">
        <a href="index.php?p=1" class="btn btn-small btn-primary col-md-2 mb-2"> <i class="fas fa-book"></i> Lihat Data </a>
        <button type="submit" name="edit" onclick="return confirm('Ubah Data?')" class="btn btn-small btn-success col-md-2 offset-md-8 mb-2"> <i class="fas fa-save"></i> Edit Data </button>
      </div>
    </form>
  <?php }
} else { ?>
  <a href="index.php?p=1&menu=Add" class="btn btn-small btn-success col-md-2 offset-md-10 mb-2"> <i class="fas fa-plus"></i> Tambah Data </a>
  <table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>ID Pasien</th>
        <th>NIK</th>
        <th>Nama Pasien</th>
        <th>Jenis Kelamin</th>
        <th>Alamat</th>
        <th>Telfon</th>
        <th>Foto</th>
        <th>Tanggal Terdaftar</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php $pasien=mysqli_query($conn,"select * from tb_pasien order by id_pasien");
      while($data=mysqli_fetch_array($pasien)) { $no=0;$no++; ?>

        <tr>
          <td><?= $no; ?></td>
          <td><?= $data['id_pasien'] ?></td>
          <td><?= $data['nik'] ?></td>
          <td><?= $data['nama'] ?></td>
          <td><?= $data['jenkel'] ?></td>
          <td><?= $data['alamat'] ?></td>
          <td><?= $data['telpon'] ?></td>
          <td><img width="150" src="../hanb/img/kamar/<?= $data['foto'] ?>"></td>
          <td><?= $data['tgl_daftar'] ?></td>
          <td><a href="index.php?p=1&menu=Edit&id=<?= $data['id_pasien'] ?>" class="badge badge-warning">Edit</a> <a href="delete.php?type=pasien&id=<?= $data['id_pasien'] ?>" onclick="return confirm('Hapus?')" class="badge badge-danger">Delete</a></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <?php } ?>