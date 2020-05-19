<?php

session_start();

include_once("function/koneksi.php");
include_once("function/helper.php");

$page        = isset($_GET['page']) ? $_GET['page'] : false;
$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;

$user_id  = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
$nama     = isset($_SESSION['nama'])    ? $_SESSION['nama']    : false;
$level    = isset($_SESSION['level'])   ? $_SESSION['level']   : false;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ebook Store</title>
  <link rel="stylesheet" href="<?= BASE_URL . 'assets/bootstrap/css/bootstrap.min.css' ?>">
  <link rel="stylesheet" href="<?= BASE_URL . 'assets/css/style.css' ?>">
  <link rel="stylesheet" href="<?= BASE_URL . 'assets/css/styles-admin.css' ?>">
  <link rel="stylesheet" href="<?= BASE_URL . 'assets/css/bootstrap-dataTables.css' ?>">
  <link rel="stylesheet" href="<?= BASE_URL . 'assets/css/dataTables.bootstrap4.min.css' ?>">
  <link rel="stylesheet" href="<?= BASE_URL . 'assets/css/banner.css' ?>">
  <link rel="stylesheet" href="<?= BASE_URL . 'assets/css/style-content.css' ?>">
</head>

<body>

  <!-- Navbar -->
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-green" style="height: 10%;">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?= BASE_URL ?>">
        <img src="<?= BASE_URL . 'assets/img/online-shopping.png' ?>" width="40"> EBook Store</a>
    
      <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button> 
      <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></div>
      <!-- Navbar-->
      <ul class="navbar-nav ml-auto ml-md-0">
        <a href="" class="btn btn-warning mr-3" style="">
          <i class="fas fa-shopping-basket"></i>
        </a>
        <?php
        if ($user_id) {
          echo '<div class="btn-group" role="group">
                      <button id="btnGroupDrop1" type="button" class="btn btn-outline-light dropdown-toggle mr-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Hello, ' . ucwords($nama) . '
                      </button>
                      <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="' . BASE_URL . 'index.php?page=my_profile&module=pesanan&action=list">My Profile</a>
                        <a class="dropdown-item" href="' . BASE_URL . 'logout.php">Logout</a>
                      </div>
                    </div>';
        } else {
          echo '<a href="' . BASE_URL . 'index.php?page=register" class="btn btn-outline-light mr-2">Daftar</a>';
          echo '<a href="' . BASE_URL . 'index.php?page=login" class="btn btn-outline-light mr-3">Login</a>';
        }
        ?>
      </ul>
    </div>
  </nav>
  <!-- End Navbar -->

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
      height: 240,
      play: {
        auto: true,
        interval: 3000
      },
      navigation: false
    });
  </script>

</body>

</html>