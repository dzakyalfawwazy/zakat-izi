<?php 
if(isset($_GET['menu'])){
  if($_GET['menu']=='Add') {
    if(isset($_POST['tambah'])){
     $namafile = $_FILES['foto_kamar']['name'];
     $tmp = $_FILES['foto_kamar']['tmp_name'];
     move_uploaded_file($tmp, '../hanb/img/kamar/'.date('d-m-Y').'-'.$namafile);
     $gambar = date('d-m-Y').'-'.$namafile; 
     $query=mysqli_query($conn,"INSERT INTO `tb_kamar`(`id_kamar`, `nama_kamar`, `id_jeniskamar`, `isi_kamar`, `foto_kamar`, `deskripsi`) VALUES (NULL,'$_POST[nama_kamar]','$_POST[id_jeniskamar]','$_POST[isi_kamar]','$gambar','$_POST[deskripsi]')"); 

   }
   ?>

   <form role="form" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-4 offset-md-4">
        <!-- text input -->
        <div class="form-group">
          <label>Nama Kamar </label>
          <input type="text" name="nama_kamar" class="form-control form-control-sm" name="nama_kamar" placeholder="Enter ...">
        </div>
        <div class="form-group">
          <label>Jenis Kamar </label>
          <select class="form-control form-control-sm" name="id_jeniskamar" placeholder="Enter ...">
            <option value=""></option>
            <?php $jKamar=mysqli_query($conn,"SELECT * FROM jenis_kamar");
            while ($qKamar = mysqli_fetch_array($jKamar)) {
            ?> <option value = "<?= $qKamar['id_jeniskamar'] ?>"><?= $qKamar['jenis_kamar'] ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label>Isi Kamar </label>
        <input type="text" class="form-control form-control-sm" name="isi_kamar" placeholder="Enter ...">
      </div>
      <div class="form-group">
        <label>Deskripsi Kamar </label>
        <textarea class="form-control form-control-sm" name="deskripsi" placeholder="Enter ..."></textarea>
      </div>

      <div class="form-group">
        <label for="exampleInputFile">Foto Kamar</label>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" accept=".jpg,.jpeg" name="foto_kamar" class="custom-file-input form-control-sm" id="exampleInputFile">
            <label class="custom-file-label" for="exampleInputFile">Pilih Foto (JPG)</label>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <a href="#" class="btn btn-small btn-primary col-md-2 mb-2"> <i class="fas fa-book"></i> Lihat Data </a>
    <button type="submit" name="tambah" class="btn btn-small btn-success col-md-2 offset-md-8 mb-2"> <i class="fas fa-save"></i> Tambah Data </button>
</div>
  </form>
<?php }  elseif($_GET['menu']=='Edit') {
      $dtkamar=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM tb_kamar where id_kamar='$_GET[id]'"));
    if(isset($_POST['edit'])){
      if(isset($_FILES['foto_kamar']))
      {
     $namafile = $_FILES['foto_kamar']['name'];
     $tmp = $_FILES['foto_kamar']['tmp_name'];
     move_uploaded_file($tmp, '../hanb/img/kamar/'.date('d-m-Y').'-'.$namafile);
     $gambar = date('d-m-Y').'-'.$namafile; 
     $query=mysqli_query($conn,"UPDATE `tb_kamar` SET  `nama_kamar`='$_POST[nama_kamar]', `id_jeniskamar`='$_POST[id_jeniskamar]', `isi_kamar`='$_POST[isi_kamar]', `foto_kamar`='$gambar', `deskripsi`='$_POST[deskripsi]' WHERE `id_kamar`='$_GET[id]'"); 
   }
   else {
    $query=mysqli_query($conn,"UPDATE `tb_kamar` SET  `nama_kamar`='$_POST[nama_kamar]', `id_jeniskamar`='$_POST[id_jeniskamar]', `isi_kamar`='$_POST[isi_kamar]', `deskripsi`='$_POST[deskripsi]' WHERE `id_kamar`='$_GET[id]'"); 
   }
    if ($query)
      {
        echo "<script>window.location.href='index.php?p=3'</script>";
      }
   }
   ?>

   <form role="form" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-4 offset-md-4">
        <!-- text input -->
        <div class="form-group">
          <label>Nama Kamar </label>
          <input type="text" name="nama_kamar" class="form-control form-control-sm" name="nama_kamar" value="<?= $dtkamar['nama_kamar'] ?>">
        </div>
        <div class="form-group">
          <label>Jenis Kamar </label>
          <select class="form-control form-control-sm" name="id_jeniskamar" placeholder="Enter ...">
            <?php $jKamar=mysqli_query($conn,"SELECT * FROM jenis_kamar");
            while ($qKamar = mysqli_fetch_array($jKamar)) {
              if ($dtkamar['id_jeniskamar']==$qKamar['id_jeniskamar']) $s="selected"; else $s="";
            ?> <option value = "<?= $qKamar['id_jeniskamar'] ?>" <?= $s ?>><?= $qKamar['jenis_kamar'] ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label>Isi Kamar </label>
        <input type="text" class="form-control form-control-sm" name="isi_kamar" placeholder="Enter ..." value="<?= $dtkamar['isi_kamar'] ?>">
      </div>
      <div class="form-group">
        <label>Deskripsi Kamar </label>
        <textarea class="form-control form-control-sm" name="deskripsi" placeholder="Enter ..."><?= $dtkamar['deskripsi'] ?></textarea>
      </div>

      <div class="form-group">
        <label for="exampleInputFile">Foto Kamar</label>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" accept=".jpg,.jpeg" name="foto_kamar" class="custom-file-input form-control-sm" id="exampleInputFile">
            <label class="custom-file-label" for="exampleInputFile">Pilih Foto (JPG)</label>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <a href="#" class="btn btn-small btn-primary col-md-2 mb-2"> <i class="fas fa-book"></i> Lihat Data </a>
    <button type="submit" name="edit" class="btn btn-small btn-success col-md-2 offset-md-8 mb-2"> <i class="fas fa-save"></i> Edit Data </button>
</div>
  </form>
<?php } } else { ?>
  <a href="index.php?p=3&menu=Add" class="btn btn-small btn-success col-md-2 offset-md-10 mb-2"> <i class="fas fa-plus"></i> Tambah Data </a>
  <table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Kamar</th>
        <th>Jenis Kamar</th>
        <th>Isi Kamar</th>
        <th>Foto Kamar</th>
        <th>Deskripsi (Fasilitas)</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php $kamar  =mysqli_query($conn,"select * from tb_kamar,jenis_kamar where tb_kamar.id_jeniskamar=jenis_kamar.id_jeniskamar order by id_kamar");
      while($data=mysqli_fetch_array($kamar)) { $no=0;$no++; ?>

        <tr>
          <td><?= $no; ?></td>
          <td><?= $data['id_kamar'] ?></td>
          <td><?= $data['jenis_kamar'] ?></td>
          <td><?= $data['isi_kamar'] ?></td>
          <td><img width="150" src="../hanb/img/kamar/<?= $data['foto_kamar'] ?>"></td>
          <td><?= $data['deskripsi'] ?></td>
          <td><a href="index.php?p=3&menu=Edit&id=<?= $data['id_kamar'] ?>" class="badge badge-warning">Edit</a> <a href="#" class="badge badge-danger">Delete</a></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <?php } ?>