
<script src="plugins/jquery/jquery.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
<!-- ***** Breadcumb Area Start ***** -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(hanb/img/bg-img/hero-1.jpg)">
</div>
<!-- ***** Breadcumb Area End ***** -->

<!-- Explore Area -->
<section class="dorne-explore-area d-md-flex">
    <!-- Explore Search Area -->
    <div class="explore-search-area d-md-flex">
        <!-- Explore Search Form -->
        <div class="explore-search-form">
            <h6>What are you looking for?</h6>
            <!-- Tabs -->
            <!-- Tabs Content -->
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-places" role="tabpanel" aria-labelledby="nav-places-tab">
                    <form method="get">
                        <input type="hidden" name="hal" class="form-control" value="temukan">
                        <select class="custom-select" name="kategori" required id="catagories">
                            <option disabled selected>Categories</option>

                            <?php $row=$db->tampildata("tb_kategori"); foreach($row as $kategori){ ?>
                                <option value="<?= $kategori['id_kategori'] ?>"><?= $kategori['nama_kategori'] ?></option>
                            <?php } ?>
                        </select>
                        <label class="text-white">Price</label>
                        <div class="input-group mb-4">
                            <input type="text" name="max" class="form-control" placeholder="Min">
                            <input type="text" name="min" class="form-control" placeholder="Max">
                        </div>
                        <label class="text-white">Time</label>
                        <div class="input-group">
                            <input type="time" name="jam_buka" class="form-control" placeholder="Harga Terendah">
                            <input type="time" name="jam_tutup" class="form-control" placeholder="Harga Tertinggi">
                        </div>
                        <button type="submit" class="btn dorne-btn mt-50 bg-white text-dark"><i class="fa fa-search pr-2" aria-hidden="true"></i> Search</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="explore-search-result">
            <!-- Single Features Area -->
            <?php


            $kategori=""; $max=""; $min=""; $jam_buka=""; $jam_tutup="";
            if(isset($_GET['kategori'])){if(($_GET['kategori']!="")) $kategori=" and tb_kategori.id_kategori = '".$_GET['kategori']."'";} else $kategori="";
            if(isset($_GET['max']) and isset($_GET['min'])){if(($_GET['max']!="") and ($_GET['min']!="")) $max=" and tb_wisata.biaya between '".$_GET['max']."' and '".$_GET['min']."'";} else $max="";
            if(isset($_GET['jam_buka'])){if(($_GET['jam_buka']!="")) $jam_buka=" and tb_wisata.jam_buka >= '".$_GET['jam_buka']."'";} else $jam_buka="";
            if(isset($_GET['jam_tutup'])){if(($_GET['jam_tutup']!="")) $jam_tutup=" and tb_wisata.jam_tutup <= '".$_GET['jam_tutup']."'";} else $jam_tutup="";
            $query="tb_wisata,tb_kategori where tb_wisata.id_kategori=tb_kategori.id_kategori $kategori $max $min $jam_buka $jam_tutup";


            $row=$db->tampildata($query); foreach($row as $wisata): ?>
            <div class="single-features-area">
                <img src="data:image/jpg;base64,<?= base64_encode($wisata['gambar'])?>" alt="">
                <!-- Price -->
                <div class="price-start">
                    <p>Rp.<?= number_format($wisata['biaya']/2) ?>,-</p>
                </div>
                <div class="feature-content d-flex align-items-center justify-content-between">
                    <div class="feature-title">
                        <h5><?= $wisata['nama_wisata'] ?></h5>
                        <p><?= $wisata['nama_kategori'] ?></p>
                        <p>Guide Fee:Rp.<?= number_format($wisata['biaya']/2) ?>,-</p>
                    </div>
                    <div class="feature-favourite">
                       <a href="#" data-toggle="modal" data-target="#<?= $wisata['id_wisata'] ?>"><i class="fa fa-heart-o"></i></a>
                   </div>
               </div>
           </div>
       <?php endforeach; ?>
   </div>
</div>
<div class="explore-map-area">
    <div id="mapid"></div>
</div>
</section>

<!-- ***** Listing Destinations Area End ***** -->
<?php foreach($row as $data): ?>
  <div class="modal fade mt-5" id="<?= $data['id_wisata'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="hanb/transaksi.php" method="post">
            <div class="modal-body">
              <h4 class="modal-title">Add to list</h4>

              <div class="contact-form p-3">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <label class="small">Place</label>
                        <input type="text" class="form-control" value="<?= $data['nama_wisata'] ?>" readonly placeholder="Subject">
                        <input type="hidden" class="form-control" name="id_wisata" value="<?= $data['id_wisata'] ?>" readonly placeholder="Subject">
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="small">Avalaible Time</label>
                        <input type="text" class="form-control" required value="<?= date('H:i',strtotime($data['jam_buka']))."-".date('H:i',strtotime($data['jam_tutup'])) ?>" readonly placeholder="Subject">
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="small">Date</label>
                        <input type="date" name="tanggal" min="<?= date('Y-m-d') ?>" required class="form-control" placeholder="">
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="small">Time</label>
                        <input type="time" name="jam" min="<?= $data['jam_buka'] ?>" max="<?= $data['jam_tutup'] ?>" required class="form-control" placeholder="Email Address">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-success" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-outline-warning">Add to list</button>
      </div>
  </form>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php endforeach; ?>
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>
<script src="dist/leaflet-routing-machine.js"></script>
<script src="map/Control.Geocoder.js"></script>
<script src="map/config.js"></script>
<script type="text/javascript">
    var map = L.map('mapid').setView([-0.451488,100.495854], 13);

    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    <?php $m=$db->tampildata($query); foreach($m as $dmark){  ?>
        L.marker([<?= $dmark['latitude'].",".$dmark['longitude'] ?>]).bindPopup(

          "<?= $dmark['nama_wisata'] ?><br> <a href='index.php?hal=petunjukarah&id=<?= $dmark['id_wisata'] ?>&lng=<?= $dmark['longitude'] ?>&lat=<?= $dmark['latitude'] ?>'>Visit</a>"

          ).addTo(map);
    <?php } ?>
    L.Routing.errorControl(control).addTo(map);
</script>