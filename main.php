<!-- SideBar & Content -->
<div id="layoutSidenavs">

  <!-- Content -->
  <div id="layoutSidenav_contents">
    <main>
      <div class="container">
        <!-- Banner -->
        <div class="" id="slides2">
          <?php
          $query_banner = mysqli_query($con, "SELECT * FROM banner WHERE status='on' ORDER BY banner_id DESC LIMIT 3");

          while ($row = mysqli_fetch_assoc($query_banner)) : ?>
            <a href="<?= BASE_URL . $row['link'] ?>">
              <img src="<?= BASE_URL ?>assets/img/slide/<?= $row['gambar'] ?>" style="width: 100%">
            </a>
          <?php endwhile ?>
          <a href="#" class="slidesjs-previous slidesjs-navigation mb-3"><i class="icon-chevron-left"></i></a>
          <a href="#" class="slidesjs-next slidesjs-navigation"><i class="icon-chevron-right"></i></a>
        </div>
        <!-- End Banner -->

        <h4 class="mb-3 mt-3">Kategori Pilihan</h4>
        <div class="row">
          <?php
          $query = mysqli_query($con, "SELECT * FROM kategori WHERE status='on' ");
          while ($row = mysqli_fetch_assoc($query)) :
          ?>
            <div class="col-lg-3 col-sm-6 mb-3 col-6">
              <a href="<?= BASE_URL ?>index.php?kategori_id=<?= $row['kategori_id'] ?>" style="text-decoration-line: none">
                <button class="card card-shadow col" style="border-radius: 20px">
                  <div class="card-body">
                    <h6 class="card-text text-left"><?= $row['kategori'] ?></h6>
                  </div>
                </button>
              </a>
            </div>
          <?php
          endwhile;
          ?>
        </div>
        <!-- Content EBook -->
        <!-- Nama Kategori -->
        <?php
        $query = mysqli_query($con, "SELECT * FROM kategori WHERE status='on' AND kategori_id='$kategori_id' ");
        $row = mysqli_fetch_assoc($query);
        if ($kategori_id) {
        ?>
          <h4 class="mb-3 mt-3">E-Book - <?= $row['kategori'] ?></h4>
        <?php } else { ?>
          <h4 class="mb-3 mt-3">Semua E-Book</h4>
        <?php } ?>
        <!-- Nama Kategori -->
        <div class="row">
          <?php
          if ($kategori_id) {
            $query = mysqli_query($con, "SELECT * FROM ebook WHERE status='on' AND kategori_id='$kategori_id' ORDER BY rand() DESC");
          } else {
            $query = mysqli_query($con, "SELECT * FROM ebook WHERE status='on' ORDER BY rand() ASC");
          }

          while ($row = mysqli_fetch_assoc($query)) :
          ?>
            <div class="col-lg-3 col-sm-6 col-md-4 mb-3 col-6">
              <div class="card card-shadow" style="height: 95%">
                <a href="<?= BASE_URL ?>index.php?page=detail&ebook_id=<?= $row['ebook_id'] ?>">
                  <img class="mt-2 card-img-top img-content" src="<?= BASE_URL ?>assets/img/ebook/<?= $row['gambar'] ?>" alt="Card image cap">
                </a>
                <div class="card-body mb-3">
                  <h5 class="card-title"><?= $row['nama_ebook'] ?></h5>
                  <h6 class="card-text text-danger"><?= rupiah($row['harga']) ?></h6>
                </div>
              </div>
            </div>
          <?php
          endwhile;
          ?>
        </div>
        <!-- Ennd Content EBook -->
      </div>
    </main>
    <!-- Footer -->
    <?php
    require_once("footer.php");
    ?>
    <!-- End Footer -->
  </div>
  <!-- End Content -->

</div>
<!-- End SideBar & Content -->