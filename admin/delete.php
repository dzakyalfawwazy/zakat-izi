<?php include 'acc/config.php' ?>
<?php 
if($_GET['type']=='pasien'){
	$query=mysqli_query($conn,"delete from tb_pasien where id_pasien='$_GET[id]'");
	echo "<script>window.location.href='index.php?p=1';</script>";
}
elseif($_GET['type']=='jeniskamar'){
	$query=mysqli_query($conn,"delete from jenis_kamar where id_jeniskamar='$_GET[id]'");
	echo "<script>window.location.href='index.php?p=2';</script>";
}
elseif($_GET['type']=='profil'){
	$sql=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM tbl_profil where id_profil='$_GET[id]'"));
	unlink("../hanb/img/profil/".$sql['gambar_p']);
	$query=mysqli_query($conn,"delete from tbl_profil where id_profil='$_GET[id]'");
	echo "<script>window.location.href='index.php?p=9';</script>";
}
?>