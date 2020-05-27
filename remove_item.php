<?php

  include_once("function/koneksi.php");
  include_once("function/helper.php");

  session_start();

  $ebook_id  = $_GET['ebook_id'];
  $keranjang = $_SESSION['keranjang'];
  
  unset($keranjang[$ebook_id]);

  $_SESSION['keranjang'] = $keranjang;

  header("Location:".BASE_URL."index.php?page=keranjang");