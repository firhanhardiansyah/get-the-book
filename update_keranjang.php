<?php

include_once("function/koneksi.php");

$buku_id   = $_POST["buku_id"];
$value     = $_POST["value"];
$status    = false;
$pesan     = '';

$query = mysqli_query($con, "SELECT stok FROM buku WHERE buku_id='$buku_id'");
$row = mysqli_fetch_array($query);

if ($row['stok'] >= $value) {
  $status = true;

  session_start();
  $keranjang = $_SESSION["keranjang"];
  $keranjang[$buku_id]["quantity"] = $value;
  $_SESSION["keranjang"] = $keranjang;
} else {
  $status = false;
  $pesan  = "Stok Tersisa " . $row['stok'];
}

$arr = [
  'status' => $status,
  'pesan' => $pesan
];

$json = json_encode($arr);

echo $json;