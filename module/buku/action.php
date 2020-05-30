<?php

  include_once("../../function/helper.php");
  include_once("../../function/koneksi.php");

  $button       = isset($_POST['button']) ? $_POST['button'] : $_GET['button'];
  
  $buku_id      = isset($_GET['buku_id']) ? $_GET['buku_id'] : "";
  
  $nama_buku    = isset($_POST['nama_buku']) ? $_POST['nama_buku'] : "";
  $kategori_id  = isset($_POST['kategori_id']) ? $_POST['kategori_id'] : "";
  $penulis      = isset($_POST['penulis']) ? $_POST['penulis'] : "";
  $deskripsi    = isset($_POST['deskripsi']) ? $_POST['deskripsi'] : "";
  $harga        = isset($_POST['harga']) ? $_POST['harga'] : "";
  $stok         = isset($_POST['stok']) ? $_POST['stok'] : "";
  $status       = isset($_POST['status']) ? $_POST['status'] : "";

  # Jika upload gambar tidak terjadi error
  $update_gambar = "";

  if (!empty($_FILES['file']['name'])) {
    $nama_file   = $_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], "../../assets/img/buku/".$nama_file); 

    $update_gambar = ", gambar='$nama_file'";
  }

  if ($button == "Tambah") {
    mysqli_query($con, "INSERT INTO buku (nama_buku, kategori_id, penulis, deskripsi, gambar, harga, stok, status)
                                    VALUES ('$nama_buku', '$kategori_id', '$penulis','$deskripsi', '$nama_file', '$harga', '$stok','$status')");
  } else if ($button == "Update") {    
    mysqli_query($con, "UPDATE buku SET kategori_id = '$kategori_id',
                                          nama_buku = '$nama_buku',
                                          penulis = '$penulis',
                                          deskripsi = '$deskripsi',
                                          harga       = '$harga', 
                                          stok       = '$stok', 
                                          status      = '$status'
                                          $update_gambar
                          WHERE buku_id = '$buku_id' ") or die(mysqli_error($con));
  } else if ($button == "Delete") {
    mysqli_query($con, "DELETE FROM buku WHERE buku_id='$buku_id'");
  }

  header("Location: ".BASE_URL."index.php?page=my_profile&module=buku&action=list");