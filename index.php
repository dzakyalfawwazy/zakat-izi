<?php session_start(); ?>
<?php 
date_default_timezone_set('Asia/Jakarta');
include 'hanb/crudApp.php';
$db = new crud();
$cek_kadaluarsa=$db->cek_kadaluarsa();
// $namatoko =$db->tampildata("tb_profil where jenis='Nama Toko'"); foreach($namatoko as $datanamatoko){}; 
// $infobank =$db->tampildata("tb_profil where jenis='Bank'"); foreach($infobank as $bank){}; 
// $infoalamat =$db->tampildata("tb_profil where jenis='Alamat'"); foreach($infoalamat as $alamat){}; 
// $infoprofil =$db->tampildata("tb_profil where jenis='profil'"); foreach($infoprofil as $iprofil){}; 
include 'hanb/header.php';
if(empty($_GET)){ include 'pages/home.php';}

else {
 if($_GET['hal'])
 {
  switch ($_GET['hal'])
  {
    case 'kamar':
    include 'pages/kamar.php';
    break;
    case 'temukan':
    include 'pages/temukanwisata.php';
    break;
    case 'petunjukarah':
    include 'pages/petunjukarah.php';
    break;
    case 'detailproduk':
    include 'pages/detailbarang.php';
    break;
    case 'pesan':
    include 'pages/pesan.php';
    break;
    case 'pembayaran':
    include 'pages/bukti.php';
    break;
    case 'editprofil':
    include 'pages/editprofil.php';
    break;
    case 'profil':
    include 'pages/profil.php';
    break;
    case 'lihatpemesanan':
    include 'pages/cekpembelian.php';
    break;
    case 'riwayat':
    include 'pages/riwayat.php';
    break;
    case 'caripemandu':
    include 'pages/caripemandu.php';
    break;
    case 'temukanpemandu':
    include 'pages/temukanpemandu.php';
    break;
    
    default:
    include 'pages/404.php';
    break;
  }
}
else include 'pages/404.php';
}
include 'hanb/footer.php';
