<?php

  include_once("../../function/helper.php");
  include_once("../../function/koneksi.php");

  $nama_ebook = $_POST['nama_ebook'];
  $kategori_id = $_POST['kategori_id'];
  $penulis   = $_POST['penulis'];
  $deskripsi   = $_POST['deskripsi'];
  $stok        = $_POST['stok'];
  $harga       = $_POST['harga'];
  $status      = $_POST['status'];
  $button      = $_POST['button'];

  # Jika upload gambar tidak terjadi error
  $update_gambar = "";

  if (!empty($_FILES['file']['name'])) {
    $nama_file   = $_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], "../../assets/img/ebook/".$nama_file); 

    $update_gambar = ", gambar='$nama_file'";
  }

  if ($button == "Tambah") {
    mysqli_query($con, "INSERT INTO ebook (nama_ebook, kategori_id, penulis, deskripsi, gambar, stok, harga, status)
                                    VALUES ('$nama_ebook', '$kategori_id', '$penulis','$deskripsi', '$nama_file', '$stok', '$harga', '$status')");
  } else if ($button == "Update") {
    $ebook_id = $_GET['ebook_id'];
    
    mysqli_query($con, "UPDATE ebook SET kategori_id = '$kategori_id',
                                          nama_ebook = '$nama_ebook',
                                          penulis = '$penulis',
                                          deskripsi = '$deskripsi',
                                          stok        = '$stok', 
                                          harga       = '$harga', 
                                          status      = '$status'
                                          $update_gambar
                          WHERE ebook_id = '$ebook_id' ") or die(mysqli_error($con));
  }

  header("Location: ".BASE_URL."index.php?page=my_profile&module=ebook&action=list");