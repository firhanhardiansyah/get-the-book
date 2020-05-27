<?php 

session_start();

include_once("function/koneksi.php");
include_once("function/helper.php");

$ebook_id = $_GET['ebook_id'];
$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : false;

$query = mysqli_query($con, "SELECT nama_ebook, gambar, harga FROM ebook WHERE ebook_id='$ebook_id'");
$row = mysqli_fetch_assoc($query);

$keranjang[$ebook_id] = [
  "nama_ebook" => $row['nama_ebook'],
  "gambar" => $row['gambar'],
  "harga"  => $row['harga'],
  "quantity" => 1
];

$_SESSION["keranjang"] = $keranjang;

header("Location:".BASE_URL);