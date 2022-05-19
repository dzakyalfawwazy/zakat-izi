
<!-- ***** Breadcumb Area Start ***** -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(hanb/img/bg-img/hero-1.jpg)"></div>
<!-- ***** Breadcumb Area End ***** -->

<!-- ***** Listing Destinations Area Start ***** -->
<section class="dorne-listing-destinations-area section-padding-100-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading dark text-center">
                    <span></span>
                    <h4>List Kamar IZI</h4>
                    <p>Rumah Singgah Basnas</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php 
            include 'admin/acc/config.php';
            $row=$db->tampildata("tb_kamar,jenis_kamar where tb_kamar.id_jeniskamar=jenis_kamar.id_jeniskamar order by id_kamar"); foreach($row as $data): 
            $sql=mysqli_query($conn,"SELECT id_kamar, waktu_checkin, tanggal_pesan, max(tanggal_pesan), datediff(now(),waktu_checkin) as lama, id_kamar,status FROM `tb_booking` where id_kamar='$data[id_kamar]' and status='checkin' group by id_kamar; ");
            $csql=mysqli_num_rows($sql);
            $dsql=mysqli_fetch_array($sql);
            ?>
            <!-- Single Features Area -->
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-features-area mb-50">
                    <img src="hanb/img/kamar/<?= $data['foto_kamar']?>" alt="">
                    <div class="feature-content d-flex align-items-center justify-content-between">
                        <div class="feature-title">
                            <h5><?= $data['nama_kamar'] ?></h5>
                            <p>Jenis Kamar :<?= $data['jenis_kamar'] ?></p>
                            <p>Isi Kamar : <?= $data['isi_kamar'] ?></p>
                            <?php if ($csql > 0) { ?>
                            <p><b>Status : Tidak Tersedia</b></p>
                            <p><b>Lama Terisi : <?= $dsql['lama'] ?> Hari</b></p>
                            <?php } else { ?> 
                            <p>Status : Tersedia</p>
                            <?php } ?>
                       </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</section>
<!-- ***** Listing Destinations Area End ***** -->
<?php foreach($row as $data): ?>
  <div class="modal fade mt-5" id="<?= $data['id_kamar'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="hanb/transaksi.php" method="post">
            <div class="modal-body">
              <h4 class="modal-title">Booking Proses..</h4>

              <div class="contact-form p-3">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <label class="small">Kamar</label>
                        <input type="text" class="form-control" value="<?= $data['nama_kamar'] ?>" readonly placeholder="Subject">
                        <input type="hidden" class="form-control" name="id_kamar" value="<?= $data['id_kamar'] ?>" readonly placeholder="Subject">
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="small">Tanggal</label>
                        <input type="date" name="tanggal" min="<?= date('Y-m-d') ?>" required class="form-control" placeholder="">
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="small">Waktu</label>
                        <input type="time" name="jam" min="<?= $data['jam_buka'] ?>" max="<?= $data['jam_tutup'] ?>" required class="form-control" placeholder="Email Address">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-success" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-outline-warning">Proses</button>
      </div>
  </form>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php endforeach; ?>