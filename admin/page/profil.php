<?php if(isset($_POST['tambah'])){
  $namafile = $_FILES['gambar']['name'];
     $tmp = $_FILES['gambar']['tmp_name'];
     move_uploaded_file($tmp, '../hanb/img/profil/'.date('d-m-Y').'-'.$namafile);
     $gambar = date('d-m-Y').'-'.$namafile; 
$query=mysqli_query($conn,"INSERT INTO `tbl_profil`(`id_profil`, `tgl_p`, `judul_p`, `jenis_p`, `deskripsi_p`, `gambar_p`) VALUES (null,'$_POST[tanggal_profil]','$_POST[judul_p]','$_POST[jenis_p]','$_POST[deskripsi_p]','$gambar')");
}
 ?>
<form role="form" method="post" enctype="multipart/form-data">
<div class="col-md-12 text-right">
  <button type="submit" name="tambah" class="btn btn-small btn-success"> <i class="fas fa-check"></i> Add Profil </button>
</div>
  <div class="row">
    <div class="col-md-5">
      <!-- text input -->
      <div class="form-group">
        <label>Tanggal Profil</label>
        <input type="date" name="tanggal_profil" class="form-control form-control-sm" placeholder="Enter ...">
      </div>
      <div class="form-group">
        <label>Judul Profil</label>
        <input type="text" name="judul_p" class="form-control form-control-sm" placeholder="Enter ...">
      </div>
      <div class="form-group">
        <label>Gambar</label>
        <input type="file" name="gambar" class="form-control form-control-sm" placeholder="Enter ...">
      </div>
      <div class="form-group">
        <label>Jenis Profil</label>
        <select required class="form-control form-control-sm" name="jenis_p" placeholder="Enter ...">
          <option>Profil</option>
          <option>Fasilitas</option>
          <option>Informasi</option>
          <option>Berita</option>
        </select>
      </div>
        <div class="card card-outline card-info">
          <div class="card-header">
            <h3 class="card-title">
              Deskripsi Profil
            </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <textarea id="summernote" name="deskripsi_p">
            
            </textarea>
          </div>
        </div>
    </div>
    <div class="col-md-7">
      <div class="table pt-2">
      <table class="table table-sm text-xs table-striped">
        <tr>
          <th>Tanggal</th>
          <th>Judul</th>
          <th>Jenis</th>
          <th>Gambar</th>
          <th>Deskripsi</th>
          <th>Aksi</th>
        </tr>
        <?php $sql=mysqli_query($conn,"SELECT * FROM tbl_profil order by tgl_p asc");
              while($data=mysqli_fetch_array($sql)){
         ?>
        <tr>
          <td><?= $data["tgl_p"] ?></td>
          <td><?= $data["judul_p"] ?></td>
          <td><?= $data["jenis_p"] ?></td>
          <td align="center"><img src="../hanb/img/profil/<?= $data["gambar_p"] ?>" width="150px"></td>
          <td><?= $data["deskripsi_p"] ?></td>
          <td><!-- <a href="" class="badge badge-warning">Edit</a>  --><a href="delete.php?type=profil&id=<?= $data['id_profil'] ?>" onclick="return confirm('Amda Yakin Hapus?')" class="badge badge-danger">Delete</a> </td>
        </tr>
      <?php } ?>
      </table>
    </div>
    </div>
</div>
</form>
