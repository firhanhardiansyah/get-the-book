<?php

  include_once("../../function/helper.php");
  include_once("../../function/koneksi.php");

  $kota     = $_POST['kota'];
  $tarif    = $_POST['tarif'];
  $status   = $_POST['status'];
  $button   = $_POST['button'];

  if ($button == "Tambah") {
		mysqli_query($con, "INSERT INTO kota (kota, tarif, status) VALUES ('$kota', '$tarif','$status')");
		
  } else if ($button == "Update") {
    $kota_id = $_GET['kota_id'];
    mysqli_query($con, "UPDATE kota SET kota = '$kota',
																				tarif = '$tarif',
																				status = '$status'
																		WHERE kota_id = '$kota_id' ") or die(mysqli_error($con));
  }

  header("Location: ".BASE_URL."index.php?page=my_profile&module=kota&action=list");