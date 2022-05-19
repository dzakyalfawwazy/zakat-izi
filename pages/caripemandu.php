<?php
if(empty($_SESSION['status']) or $_SESSION['status']!="login"){
  echo "<script>alert('Opps! You must login to see this pages!'); window.location.href='login.php'</script>";
} else {}
$row=$db->tampildetail('tb_order, tb_transaksi','tb_order.id_order=tb_transaksi.id_order and tb_order.id_pelanggan="'.$_SESSION["id_pelanggan"].'" and tb_order.status="Verifikasi Pembayaran" and tb_transaksi.tanggal="'.date('Y-m-d').'"');
$count=$row->num_rows;
?>
<!-- ***** Breadcumb Area Start ***** -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(hanb/img/bg-img/hero-1.jpg)"></div>
<!-- ***** Breadcumb Area End ***** -->
<section class="dorne-listing-destinations-area section-padding-100-50">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-heading dark text-center mb-1">
          <span></span>
          <h4>Find Tour Guide</h4>
          <p><?php if($count > 0) echo "Pilih Transaksi"; else echo "Find the guide only can when the tour day has came" ?></p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <div class="tab-content" id="vert-tabs-tabContent">
          <table class="table table-striped table-bordered small">
            <thead style="background: purple" class="text-white">
              <tr>
                <td>ID Order</td>
                <td>Date</td>
                <td>Time</td>
                <td>Action</td>
              </tr>
            </thead>
            <tbody>
              <?php 
              foreach($row as $data2): ?>
                
                <tr>
                  <td><?= $data2['id_order'] ?></td>
                  
                  <td><?= date('d/m/Y',strtotime($data2['tanggal'])) ?></td>
                  <td><?= date('H:i',strtotime($data2['jam'])) ?></td>
                  <td>
                    <?php if($data2['id_pemandu']=='-'){ ?>
                      <a href="index.php?hal=temukanpemandu&id=<?= $data2['id_order'] ?>" class="btn btn-primary btn-sm"><i class="fas fa-search"></i> Find Tour Guide</a>
                    <?php } else { ?>
                      <a href="index.php?hal=temukanpemandu&id=<?= $data2['id_order'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-eye"></i> Look for Tour Guide</a>
                    <?php } ?>
                  </td>
                </tr>
                
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    
  </div><!-- /.row -->
</section>
