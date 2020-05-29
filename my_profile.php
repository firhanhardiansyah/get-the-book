<?php

if ($user_id) {
  $module = isset($_GET['module']) ? $_GET['module'] : false;
  $action = isset($_GET['action']) ? $_GET['action'] : false;
  $mode   = isset($_GET['mode']) ? $_GET['mode'] : false;
} else {
  header("Location: " . BASE_URL . "index.php?page=login");
}

?>
<!-- SideBar & Content -->
<div id="layoutSidenav">
  <!-- Sidebar -->
  <div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
      <div class="sb-sidenav-menu">
        <div class="nav">
          <?php if ($level == "superadmin") : ?>
            <div class="sb-sidenav-menu-heading">Menu Admin</div>
            <a <?php if ($module == "kategori") echo "class='nav-link active'"; ?> class="nav-link" href="<?= BASE_URL . "index.php?page=my_profile&module=kategori&action=list" ?>">
              <div class="sb-nav-link-icon"><i class="fas fa-th"></i></div>
              Kategori
            </a>
            <a <?php if ($module == "buku") echo "class='nav-link active'"; ?> class="nav-link" href="<?= BASE_URL . "index.php?page=my_profile&module=buku&action=list" ?>">
              <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
              Buku
            </a>
            <a <?php if ($module == "kota") echo "class='nav-link active'"; ?> class="nav-link" href="<?= BASE_URL . "index.php?page=my_profile&module=kota&action=list" ?>">
              <div class="sb-nav-link-icon"><i class="fas fa-city"></i></div>
              Kota
            </a>
            <a <?php if ($module == "user") echo "class='nav-link active'"; ?> class="nav-link" href="<?= BASE_URL . "index.php?page=my_profile&module=user&action=list" ?>">
              <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
              User
            </a>
            <a <?php if ($module == "banner") echo "class='nav-link active'"; ?> class="nav-link" href="<?= BASE_URL . "index.php?page=my_profile&module=banner&action=list" ?>">
              <div class="sb-nav-link-icon"><i class="fab fa-adversal"></i></div>
              Banner
            </a>
          <?php endif ?>
          <div class="sb-sidenav-menu-heading">User</div>
          <a <?php if ($module == "pesanan") echo "class='nav-link active'"; ?> class="nav-link" href="<?= BASE_URL . "index.php?page=my_profile&module=pesanan&action=list" ?>">
            <div class="sb-nav-link-icon"><i class="fas fa-box-open"></i></div>
            Pesanan
          </a>
        </div>
      </div>
      <!-- Footer Sidebar -->
      <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        <?= ucwords($nama) ?>
      </div>
      <!-- Footer Sidebar -->
    </nav>
  </div>
  <!-- End Sidebar -->

  <!-- Content -->
  <div id="layoutSidenav_content">
    <main>
      <div class="container-fluid">
        <?php
        $file = "module/$module/$action.php";

        if (file_exists($file)) {
          include_once($file);
        } else {
          echo "Halaman Tidak Ada";
        }
        ?>
      </div>
    </main>
    <?php
      require_once("footer.php");
    ?>
  </div>
  <!-- End Content -->

</div>
<!-- End SideBar & Content -->