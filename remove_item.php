<?php

  include_once("function/koneksi.php");
  include_once("function/helper.php");

  session_start();

  $buku_id  = $_GET['buku_id'];
  $keranjang = $_SESSION['keranjang'];
  
  unset($keranjang[$buku_id]);

  $_SESSION['keranjang'] = $keranjang;

  header("Location:".BASE_URL."index.php?page=keranjang");