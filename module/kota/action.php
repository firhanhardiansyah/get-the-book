<?php

include_once("../../function/helper.php");
include_once("../../function/koneksi.php");

$button      = isset($_POST['button']) ? $_POST['button'] : $_GET['button'];

$kota_id   = isset($_GET['kota_id']) ? $_GET['kota_id'] : "";

$kota   = isset($_POST['kota']) ? $_POST['kota'] : "";
$tarif   = isset($_POST['tarif']) ? $_POST['tarif'] : "";
$status   = isset($_POST['status']) ? $_POST['status'] : "";

if ($button == "Tambah") {
  mysqli_query($con, "INSERT INTO kota (kota, tarif, status) VALUES ('$kota', '$tarif','$status')");
} else if ($button == "Update") {
  $kota_id = $_GET['kota_id'];
  mysqli_query($con, "UPDATE kota SET kota = '$kota',
																				tarif = '$tarif',
																				status = '$status'
																		WHERE kota_id = '$kota_id' ") or die(mysqli_error($con));
} else if ($button == "Delete") {
  mysqli_query($con, "DELETE FROM kota WHERE kota_id='$kota_id'");
}

header("Location: " . BASE_URL . "index.php?page=my_profile&module=kota&action=list");
