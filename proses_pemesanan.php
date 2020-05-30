<?php

  include_once("function/koneksi.php");
  include_once("function/helper.php");

  session_start();

  $nama_penerima = $_POST['nama_penerima'];
  $nomor_telepon = $_POST['nomor_telepon'];
  $alamat        = $_POST['alamat'];
  $kota          = $_POST['kota'];
  $user_id       = $_SESSION['user_id'];
  $timestamp     = date("Y-m-d H:i:s");

  $query  = mysqli_query($con, "INSERT INTO pesanan (nama_penerima, user_id, nomor_telepon, kota_id, alamat, tanggal_pemesanan, status)
                                               VALUES ('$nama_penerima', '$user_id', '$nomor_telepon', '$kota', '$alamat', '$timestamp', '0')");

  if ($query) {
    # Id terakhir dari pemesanan
    $last_pemesanan_id = mysqli_insert_id($con);

    $keranjang = $_SESSION['keranjang'];

    foreach ($keranjang as $key => $value) {
      $buku_id  = $key;
      $quantity = $value['quantity'];
      $harga    = $value['harga'];

      mysqli_query($con, "INSERT INTO pesanan_detail (pesanan_id, buku_id, quantity, harga)
                                          VALUES ('$last_pemesanan_id', '$buku_id', '$quantity', '$harga')");
    } 

    unset($_SESSION['keranjang']);

    header("Location:".BASE_URL."index.php?page=my_profile&module=pesanan&action=detail&pesanan_id=$last_pemesanan_id");
  }

