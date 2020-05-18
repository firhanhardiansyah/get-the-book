<?php

  include_once("../../function/helper.php");
  include_once("../../function/koneksi.php");

  $kategori = $_POST['kategori'];
  $status   = $_POST['status'];
  $button   = $_POST['button'];

  if ($button == "Tambah") {
    mysqli_query($con, "INSERT INTO kategori (kategori, status) VALUES ('$kategori', '$status')");
  } else if ($button == "Update") {
    $kategori_id = $_GET['kategori_id'];
    mysqli_query($con, "UPDATE kategori SET kategori = '$kategori', status = '$status' WHERE kategori_id = '$kategori_id' ") or die(mysqli_error($con));
  }

  header("Location: ".BASE_URL."index.php?page=my_profile&module=kategori&action=list");