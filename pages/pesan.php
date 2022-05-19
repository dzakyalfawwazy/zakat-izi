<!-- ***** Breadcumb Area Start ***** -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(hanb/img/bg-img/hero-1.jpg)"></div>
<!-- ***** Breadcumb Area End ***** -->
<section class="dorne-listing-destinations-area section-padding-100-50">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="section-heading dark text-center mb-1">
          <span></span>
          <h4>Pesan Kamar</h4>
          <p>Rumah Singgah Basnas</p>
        </div>
      </div>
    </div>
    <form method="post" action="hanb/_proses.php?type=pesan">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Main content -->
              <!-- title row -->
              <div class="row">
                <div class="col-8 table-responsive">
                <small class="float-right">Date: <?= date('d/m/Y') ?></small>
                  <table class="table table-bordered small">
                    <thead>
                      <tr class="bg-primary text-white">
                        <th>Time</th>
                        <th></th>
                        <th>Place</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php if(!empty($_SESSION['keranjang_kamar']))
                     {  $total = 0;
                       $row = $db -> tampildata('tb_kamar,jenis_kamar where tb_kamar.id_jeniskamar=jenis_kamar.id_jeniskamar');
                       foreach($row as $data)
                       {
                        foreach ($_SESSION['keranjang_kamar'] as $key => $value) 
                        {
                          if($value['item_id']==$data['id_kamar'])
                          { ?>
                            <tr>
                              <td><?= $value['tanggal'] ?>,<?= $value['jam'] ?></td>
                              <td align="center"> <div class="img-rounded text-center" style="height: 100px; width: 150px"><img src="data:image/jpg;base64,<?= base64_encode($data['gambar'])?>" class="img-fluid img-rounded" alt="Product Image"></div></td>
                              <td><?= $data['nama_kamar'] ?></td>
                              <td><a class="btn btn-warning btn-sm" href="hanb/_proses.php?type=hapusitem&id=<?= $value['item_id'] ?>"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                            <?php
                          } 
                        } 
                      } 
                    } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
              <!-- accepted payments column -->
              
             <div class="col-4">
              <p class="lead">Lanjutkan Proses disini</p>
              <?php
              if(empty($_SESSION['status']) or $_SESSION['status']!="login"){ ?>
                <?php $btn="disabled"; echo "<i class='text-danger text-xs'><small>Anda harus login untuk melanjutkannya</small></i>"; } else {$btn="";}

                ?>
                <!-- /.col -->

                <div class="col-12">
                    <button type="submit" class="btn btn-success btn-sm float-right" <?= $btn ?>><i class="fas fa-arrow-right"></i> Proses
                    </button>
                  </div>

                  <!-- accepted payments column -->

                  <!-- /.col -->
                </div>
                <!-- /.row -->>
              </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </form>


    </div>
  </section>
 