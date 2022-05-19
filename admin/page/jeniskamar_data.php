<?php 
if(isset($_GET['menu'])){
if($_GET['menu']=='Add') { 
 if(isset($_POST['tambah']))
  $query=mysqli_query($conn,"INSERT INTO jenis_kamar VALUES (NULL,'$_POST[jenis]','$_POST[jumlah]')");
  ?>
  
    <form role="form" method="post">
      <div class="row">
        <div class="col-md-4 offset-md-4">
          <!-- text input -->
          <div class="form-group">
            <label>Jenis Kamar </label>
            <input type="text" class="form-control form-control-sm" name="jenis" placeholder="Enter ...">
          </div>
          <div class="form-group">
            <label>Jumlah Kamar </label>
            <input type="text" class="form-control form-control-sm" name="jumlah" placeholder="Enter ...">
          </div>
        </div>
      </div>

  <div class="row">
<a href="#" class="btn btn-small btn-primary col-md-2 mb-2"> <i class="fas fa-book"></i> Lihat Data </a>
<button type="submit" name="tambah" class="btn btn-small btn-success col-md-2 offset-md-8 mb-2"> <i class="fas fa-save"></i> Tambah Data </button>
</div>
    </form>
<?php }} else { ?>
<a href="index.php?p=2&menu=Add" class="btn btn-small btn-success col-md-2 offset-md-10 mb-2"> <i class="fas fa-plus"></i> Tambah Data </a>
  <table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Jenis Kamar</th>
      <th>Isi Kamar</th>
      <th></th>
    </tr>
  </thead>
 <tbody>
    <?php $kamar  =mysqli_query($conn,"select * from jenis_kamar order by id_jeniskamar");
    while($data=mysqli_fetch_array($kamar)) { $no=0;$no++; ?>

    <tr>
      <td><?= $no; ?></td>
      <td><?= $data['jenis_kamar'] ?></td>
      <td><?= $data['jumlah_kamar'] ?></td>
      <td><a href="delete.php?type=jeniskamar&id=<?= $data['id_jeniskamar'] ?>" onclick="return confirm('Yakin Hapus?')" class="badge badge-danger">Delete</a></td>
    </tr>
  <?php } ?>
  </tbody>
</table>
<?php } ?>
