<?php 

include_once("function/koneksi.php");
include_once("function/helper.php");

session_start();

$buku_id = $_GET['buku_id'];
$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : false;

$query = mysqli_query($con, "SELECT nama_buku, penulis, gambar, harga FROM buku WHERE buku_id='$buku_id'");
$row   = mysqli_fetch_assoc($query);

$keranjang[$buku_id] = [
  "nama_buku" => $row['nama_buku'],
  "penulis" => $row['penulis'],
  "gambar" => $row['gambar'],
  "harga"  => $row['harga'],
  "quantity" => 1
];

$_SESSION["keranjang"] = $keranjang;

header("Location:".BASE_URL);