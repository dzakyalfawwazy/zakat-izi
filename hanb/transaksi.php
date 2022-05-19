<?php

session_start();
$id=$_POST['id_kamar'];
if (isset($_SESSION['keranjang_kamar']))
  {
    $item_array_id=array_column($_SESSION["keranjang_kamar"], "item_id");
    if (!in_array($_POST['id_kamar'],$item_array_id)) {
      $count =count($_SESSION['keranjang_kamar']);
      $item_array = array(
       'item_id' => $_POST['id_kamar'],
       'tanggal' => $_POST['tanggal'],
       'jam' => $_POST['jam']
     );
      $_SESSION['keranjang_kamar'][$count]=$item_array;
  echo "<script>window.location='../index.php?hal=pesan';</script>";
    }
      else {
        echo "<script> window.alert('Data Sudah ada'); window.location='../index.php?hal=kamar';</script>";
      }
    }
  
  else {
    $item_array = array(
       'item_id' => $_POST['id_kamar'],
       'tanggal' => $_POST['tanggal'],
      'jam' => $_POST['jam']
    );
    $_SESSION["keranjang_kamar"][0]=$item_array;
  echo "<script>window.location='../index.php?hal=pesan';</script>";
  }
  