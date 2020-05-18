<!-- SideBar & Content -->
<div id="layoutSidenav">

  <?= kategori($kategori_id) ?>

  <!-- Content -->
  <div id="layoutSidenav_content">
    <main>
      <div class="container">
        <div class="mt-3">
          <div class="card card-shadow">
            <?php
            $barang_id = $_GET['barang_id'];

            $query_barang = mysqli_query($con, "SELECT * FROM barang WHERE barang_id='$barang_id' AND status='on'");
            $row = mysqli_fetch_assoc($query_barang);
            ?>
            <div class="row">
              <div class="col-lg-4">
                <img class="card-img-top mt-4 mb-4 img-content" src="<?= BASE_URL ?>assets/img/barang/<?= $row['gambar'] ?>" alt="Card image cap">
              </div>
              <div class="col-lg-8">
                <div class="card-body">
                  <h2 class="card-title"><?= $row['nama_barang'] ?></h2>
                  <hr>
                  <div class="row">
                    <div class="col-lg-2">
                      <h6 class="text-secondary">Harga</h6>
                    </div>
                    <div class="col-lg-10">
                      <h3 class="card-title text-danger"><?= rupiah($row['harga']) ?></h3>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-2">
                      <h6 class="text-secondary">Stok Barang</h6>
                    </div>
                    <div class="col-lg-10">
                      <h4 class="card-title"><?= $row['stok'] ?></h4>
                    </div>
                  </div>
                  <hr>
                  <div class="row" style="margin-top: 5%">
                    <div class="col">
                      <a href="#" class="btn btn-outline-primary col">
                        Detail
                      </a>
                    </div>
                    <div class="col">
                      <a href="#" class="btn btn-primary col">
                        <i class="fas fa-plus"></i> Keranjang
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="mt-4 mb-4 card card-shadow">
            <div class="card-body">
              <h5>Deskripsi Produk</h5>
              <hr>
              <p class="card-text"><?= $row['spesifikasi'] ?></p>
            </div>
          </div>
        </div>
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