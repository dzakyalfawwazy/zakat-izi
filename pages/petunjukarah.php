
<script src="plugins/jquery/jquery.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
<!-- ***** Breadcumb Area Start ***** -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(hanb/img/bg-img/hero-1.jpg)">
</div>
<!-- ***** Breadcumb Area End ***** -->

<!-- Explore Area -->
<section class="dorne-explore-area d-md-flex">
  <!-- Explore Search Area -->
  <div class="col-md-3">
    <div class="card mt-1">
      <div class="card-header bg-success">
        <h5 class="text-white">Tour Information</h5>
      </div>
      <div class="card-body text-center">
       <?php $row=$db->tampildata("tb_wisata,tb_kategori where tb_kategori.id_kategori=tb_wisata.id_kategori and id_wisata='".$_GET['id']."'"); foreach($row as $wisata){} ?>
       <img class="img-fluid" src="data:image/jpg;base64,<?= base64_encode($wisata['gambar'])?>" alt="" style="height: 250px">
       <p>Rp.<?= number_format($wisata['biaya']) ?>,-</p>
       <h5><?= $wisata['nama_wisata'] ?></h5>
       <p><?= $wisata['nama_kategori'] ?></p>
     </div>
   </div>
 </div>
 <div id="mapid" style="width: 100%"></div>
</section>
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>
<script src="dist/leaflet-routing-machine.js"></script>
<script src="map/Control.Geocoder.js"></script>
<script src="map/config.js"></script>
<script type="text/javascript">
  if(navigator.geolocation){
    var map = L.map('mapid').setView([-0.451488,100.495854], 13);

    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    <?php $m=$db->tampildata('tb_wisata where id_wisata="'.$_GET["id"].'"'); foreach($m as $dmark){  ?>
      L.marker([<?= $dmark['latitude'].",".$dmark['longitude'] ?>]).bindPopup(

        "<?= $dmark['nama_wisata'] ?><br> <a href='index.php?hal=wisata&q=<?= $dmark['nama_wisata'] ?>'>Kunjungi</a>"

        ).addTo(map);
    <?php } ?>
    map.locate({setView: true, 
     maxZoom: 16, 
     watch:true
   });
    var control;
    function onLocationFound(e) {
      var radius = e.latlng;
      console.log(radius);
      var control = L.Routing.control(L.extend(window.lrmConfig,{
        waypoints: [
        L.latLng(radius),
        L.latLng(<?= $_GET['lat'] ?>,<?= $_GET['lng'] ?>)
        ],
        geocoder: L.Control.Geocoder.nominatim(),
        showAlternatives: true,
        altLineOptions: {
          styles: [
          {color: 'black', opacity: 0.15, weight: 9},
          {color: 'white', opacity: 0.8, weight: 6},
          {color: 'blue', opacity: 0.5, weight: 2}
          ]
        }
      })).addTo(map);

      L.Routing.errorControl(control).addTo(map);
    }
    map.on('locationfound', onLocationFound);
  }
</script>