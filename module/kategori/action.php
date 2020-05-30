<?php

include_once("../../function/helper.php");
include_once("../../function/koneksi.php");

$button      = isset($_POST['button']) ? $_POST['button'] : $_GET['button'];

$kategori_id   = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : "";

$kategori   = isset($_POST['kategori']) ? $_POST['kategori'] : "";
$status   = isset($_POST['status']) ? $_POST['status'] : "";

if ($button == "Tambah") {
  mysqli_query($con, "INSERT INTO kategori (kategori, status) VALUES ('$kategori', '$status')");
} else if ($button == "Update") {
  mysqli_query($con, "UPDATE kategori SET kategori = '$kategori', status = '$status' WHERE kategori_id = '$kategori_id' ") or die(mysqli_error($con));
} else if ($button == "Delete") {
  mysqli_query($con, "DELETE FROM kategori WHERE kategori_id='$kategori_id'");
}

header("Location: " . BASE_URL . "index.php?page=my_profile&module=kategori&action=list");
