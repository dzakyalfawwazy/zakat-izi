<?php $conn=new mysqli('localhost','root','','db_zakatizi'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Report Rekapan Booking Kamar</title>
</head>
<body>
	<table width="100%">
  <thead>
  	<tr>
  		<td width="25%" align="center"><img src="..\hanb\img\capture2.png" width="150px"></td>
  		<td align="center">
  			
	<h2>Rekap</h2>
	<h3>Booking Kamar Rumah Singgah Pasien</h3>
	<h4>Inisiatif Zakat Indonesia (IZI)</h4>
  		</td>
  		<td width="25%"></td>
  	</tr>
  </thead>
</table>
<hr>
<br><br>
<table border="1" width="100%">
  <thead>
    <tr>
      <th>No</th>
      <th>ID Booking</th>
      <th>Tanggal Pesan</th>
      <th>Nama Kamar</th>
      <th>ID Pasien</th>
      <th>Nama Pasien</th>
      <th>Waktu Masuk</th>
      <th>Waktu Keluar</th>
      <th>Status</th>
    </tr>
  </thead>
 <tbody>
    <?php $kamar  =mysqli_query($conn,"select * from tb_booking,tb_pasien,tb_kamar where tb_booking.id_kamar=tb_kamar.id_kamar and tb_pasien.id_pasien=tb_booking.id_pasien and status='selesai' order by id_booking");
    while($data=mysqli_fetch_array($kamar)) { $no=1;  ?>

    <tr>
      <td><?= $no; ?></td>
      <td><?= $data['id_booking'] ?></td>
      <td><?= $data['tanggal_pesan'] ?></td>
      <td><?= $data['nama_kamar'] ?></td>
      <td><?= $data['id_pasien'] ?></td>
      <td><?= $data['nama'] ?></td>
      <td><?= $data['waktu_checkin'] ?></td>
      <td><?= $data['waktu_checkout'] ?></td>
      <td><?= $data['status'] ?></td>
    </tr>
  <?php $no=$no+1; } ?>
  </tbody>
</table>
<br>
<table width="100%">
<thead align="center">
  	<tr>
  		<td width="25%">	Diketahui Oleh:
  	<br>
  	<br>
  	<br>
  	<br>
  	Pimpinan</td>
  		<td align="center"></td>
  		<td width="25%">	Dicetak Oleh:
  	<br>
  	<br>
  	<br>
  	<br>
  	(Administrator)</td>
  	</tr>
  </thead>
</table>
</body>
<script type="text/javascript">window.print()</script>
</html>