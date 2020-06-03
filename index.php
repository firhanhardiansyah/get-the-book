<?php

session_start();

include_once("function/koneksi.php");
include_once("function/helper.php");

$page        = isset($_GET['page']) ? $_GET['page'] : false;
$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;

$user_id  = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
$nama     = isset($_SESSION['nama'])    ? $_SESSION['nama']    : false;
$level    = isset($_SESSION['level'])   ? $_SESSION['level']   : false;

$keranjang    = isset($_SESSION['keranjang'])   ? $_SESSION['keranjang'] : array();

$total_buku  = count($keranjang);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Get The Book</title>
  <link rel="shortcut icon" href="<?= BASE_URL . 'assets/img/icons8-book-stack-100-logo.png' ?>">
  <link rel="stylesheet" href="<?= BASE_URL . 'assets/bootstrap/css/bootstrap.min.css' ?>">
  <link rel="stylesheet" href="<?= BASE_URL . 'assets/css/style.css' ?>">
  <link rel="stylesheet" href="<?= BASE_URL . 'assets/css/styles-admin.css' ?>">
  <link rel="stylesheet" href="<?= BASE_URL . 'assets/css/bootstrap-dataTables.css' ?>">
  <link rel="stylesheet" href="<?= BASE_URL . 'assets/css/dataTables.bootstrap4.min.css' ?>">
  <link rel="stylesheet" href="<?= BASE_URL . 'assets/css/banner.css' ?>">
  <link rel="stylesheet" href="<?= BASE_URL . 'assets/css/style-content.css' ?>">
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-expand-md navbar-dark bg-electric-violet card-shadow">
    <div class="container-fluid">
      <!-- Brand -->
      <a class="navbar-brand" href="<?= BASE_URL ?>">
        <div class="row no-gutters">
          <div class="col mr-2">
            <img src="<?= BASE_URL . 'assets/img/icons8-book-stack-100.png' ?>" width="50">
          </div>
          <div class="col">
            <h3 class="mt-2" style="font-family: 'Dancing Script', cursive;"> Get The Book </h3>
          </div>
        </div>
      </a>
      <!-- End Brand -->

      <!-- Button akan tampil jika dilayar hp atau tablet -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- End Button -->

      <!-- Menu -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        </ul>
        <div class="float-right form-inline my-lg-0 mb-2 mt-3">
          <!-- Keranjang -->
          <a class="mr-3 mb-1 " href="<?= BASE_URL ?>index.php?page=keranjang">
            <img src="<?= BASE_URL . 'assets/img/icons8-shopping-basket-60.png' ?>" width="30">
            <?php
            if ($total_buku != 0) {
              echo '<span class="badge badge-pill badge-danger notif-keranjang">' . $total_buku . '</span>';
            }
            ?>
          </a>
          <!-- End Keranjang -->
          <!-- Menu Side bar -->
          <?php
          $btn_my_profile = "$page.php" == "my_profile.php";
          if ($btn_my_profile) :
          ?>
            <button class="btn btn-outline-light mb-1 mr-3" id="sidebarToggle" href="#">Menu</button>
          <?php endif ?>
          <!-- End Menu Side bar -->
          <div class="float-right">
            <?php
            if ($user_id) {
              echo '<div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-outline-light dropdown-toggle mb-1 mr-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Hello, ' . ucwords($nama) . '
                    </button>
                    <div class="dropdown-menu mb-1" aria-labelledby="btnGroupDrop1">
                      <a class="dropdown-item" href="' . BASE_URL . 'index.php?page=my_profile&module=pesanan&action=list">My Profile</a>
                      <a class="dropdown-item" href="' . BASE_URL . 'logout.php">Logout</a>
                    </div>
                  </div>';
            } else {
              echo '<a href="' . BASE_URL . 'index.php?page=register" class="btn btn-outline-light mr-2">Daftar</a>';
              echo '<a href="' . BASE_URL . 'index.php?page=login" class="btn btn-outline-light mr-3">Login</a>';
            }
            ?>
          </div>
        </div>
      </div>
      <!-- Menu -->
    </div>
  </nav>

  <!-- Content -->
  <?php
  $filename = "$page.php";

  if (file_exists($filename)) {
    include_once($filename);
  } else {
    include_once("main.php");
  }
  ?>
  <!-- End Content -->

  <script src="<?= BASE_URL . 'assets/js/jquery_3_4_1.min.js' ?>"></script>
  <script src="<?= BASE_URL . 'assets/bootstrap/js/bootstrap.min.js' ?>"></script>
  <script src="<?= BASE_URL . 'assets/js/scripts.js' ?>"></script>
  <script src="<?= BASE_URL . 'assets/js/script-login-regist.js' ?>"></script>
  <script src="<?= BASE_URL . 'assets/js/dataTables/jquery.dataTables.min.js' ?>"></script>
  <script src="<?= BASE_URL . 'assets/js/dataTables/dataTables.bootstrap4.min.js' ?>"></script>
  <script src="<?= BASE_URL . 'assets/js/slidesJS-3/jquery.slides.min.js' ?>"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous">
  </script>
  <script>
    $('.alert').alert();
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
    $('#slides2').slidesjs({
      height: 450,
      play: {
        auto: true,
        interval: 3000
      },
      navigation: false
    });
  </script>

</body>

</html>