<?php
include 'crudApp.php';
$db = new crud();
$tipe=$_GET['type'];
if($tipe=='register'){
	$y=date('Y');
	$m=date('m');
	$d=date('d');
	$h=date('h');
	$i=date('i');
	$s=date('s');
	$id="P-".$y."".$m."".$d."".$h."".$i."".$s;
	// $image=addslashes(file_get_contents($_FILES['imagess']['tmp_name']));
	$value="
	'".$id."',
	'".$_POST['nik']."',
	'".$_POST['nama_plg']."',
	'".$_POST['jenkel']."',
	'".$_POST['tgl_lahir']."',
	'".$_POST['alamat']."',
	'".$_POST['nohp']."',
	now()";
	$query=$db->insert('tb_pasien',$value);

	$value1="NULL,
	'".$_POST['nama_user']."',
	'".$_POST['password']."',
	'user',
	'unconfirmed',
	'".$id."'";

	$query=$db->insert('tb_user',$value1);
	echo "<script> alert('Account has been registered,please wait for admin confirm!');window.location='../index.php';</script>";
}
if($tipe=='edit'){
	$id=$_POST['id_pelanggan'];
	if($_FILES['imagess']['name']==NULL){
	$value="
	nama_plg='".$_POST['nama_plg']."',
	jenkel='".$_POST['jenkel']."',
	tgl_lahir='".$_POST['tgl_lahir']."',
	email='".$_POST['email']."',
	nohp='".$_POST['nohp']."',
	alamat='".$_POST['alamat']."'";
} else {
	$image=addslashes(file_get_contents($_FILES['imagess']['tmp_name']));
	$value="
	nama_plg='".$_POST['nama_plg']."',
	jenkel='".$_POST['jenkel']."',
	tgl_lahir='".$_POST['tgl_lahir']."',
	email='".$_POST['email']."',
	nohp='".$_POST['nohp']."',
	alamat='".$_POST['alamat']."',
	foto='".$image."'";
}
	$query=$db->edit('tb_pelanggan',$value,'id_pelanggan',$id);

	$value1="
	nama_user='".$_POST['nama_user']."',
	password='".$_POST['password']."'";

	$query2=$db->edit('tb_user',$value1,'id_pelanggan',$id);
	echo "<script> alert('Profil Has Changed!');window.location='../index.php?hal=profil';</script>";
}
if($tipe=='masuk'){
	session_start();
	$nama_user=$_POST['nama_user'];
	$password=$_POST['password'];
	$query1=$db->login($nama_user,$password);
	if($query1->num_rows==0)
				{echo "<script> alert('Something wrong when sign in');window.location='../login.php';</script>";} else {
	foreach($query1 as $ceklogin):
		if($ceklogin['level']=='admin')
		{
			$_SESSION['status']="login";
			$_SESSION['level']="admin";
				echo "<script>window.location='../admin/index.php';</script>";
		}
		else 
			{echo "<script> alert('Something wrong when sign in');window.location='../login.php';</script>";}

	endforeach;
	}
}