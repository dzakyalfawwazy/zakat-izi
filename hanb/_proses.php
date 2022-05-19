<?php
session_start();
include 'crudApp.php';
$db = new crud();
$tipe=$_GET['type'];
if($tipe=='pesan'){
    $y=date('Y');
    $m=date('m');
    $d=date('d');
    $h=date('h');
    $i=date('i');
    $s=date('s');
    $id="TR-".$y."".$m."".$d."".$h."".$i."".$s;
    $query=$db->insert("tb_order","'$id',now(),date_add(now(), INTERVAL 1 DAY),'$_POST[tot_belanja]','Belum Bayar','-','$_SESSION[id_pelanggan]','-'");
    foreach ($_SESSION['keranjang_wisata'] as $key => $value) {

     $query2=$db->insert("tb_transaksi","NULL,'$value[tanggal]','$value[jam]','$id','$value[item_id]'");

     unset($_SESSION['keranjang_wisata'][$key]);
 }
 echo '<script> window.alert("Ordering process has done"); window.location="../index.php?hal=pembayaran&id='.$id.'";</script>';
}
if($tipe=='pembayaran'){
    
    $image=addslashes(file_get_contents($_FILES['imagess']['tmp_name']));
    $value= "
    status = 'Unggah Pembayaran',
    bukti_pembayaran = '".$image."'";
    $query = $db->edit('tb_order', $value, 'id_order', $_GET['id']);
    $row=$db->tampildetail('tb_transaksi','id_order="'.$_GET['id'].'"');
   
    echo "<script>window.alert('Payment Token Has Uploaded'); window.location.href='../index.php?hal=lihatpemesanan&id=$_GET[id]'</script>";
}

if($tipe=='terimapesanan'){
    
    $value= "
    status = 'Selesai'";
    $query = $db->edit('tb_order', $value, 'id_order', $_GET['id']);
    echo "<script>window.alert('Ordering Has Done!'); window.location.href='../index.php?hal=lihatpemesanan&id=$_GET[id]'</script>";
}
if($tipe=='hapusitem'){
    
  foreach ($_SESSION['keranjang_wisata'] as $key => $value) {
    if ($value['item_id']==$_GET['id']){
        unset($_SESSION['keranjang_wisata'][$key]);
        echo '<script> window.alert("Item has been deleted"); window.location="../index.php?hal=pesan";</script>'; 
    }
}
}
?>
