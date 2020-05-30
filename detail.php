<main>
  <div class="container">
    <div class="mt-4">
      <div class="card card-shadow">
        <?php
            $buku_id = $_GET['buku_id'];

            $query_buku = mysqli_query($con, "SELECT * FROM buku WHERE buku_id='$buku_id' AND status='on'");
            $row = mysqli_fetch_assoc($query_buku);
            ?>
        <div class="row">
          <div class="col-lg-4 col-md-4">
            <img class="card-img-top card card-shadow" src="<?= BASE_URL ?>assets/img/buku/<?= $row['gambar'] ?>"
              alt="Card image cap">
          </div>
          <div class="col-lg-8 col-md-8">
            <div class="card-body">
              <h2 class="card-title"><?= $row['nama_buku'] ?></h2>
              <h5 class="card-title text-secondary"><?= $row['penulis'] ?></h5>
              <h5 class="mt-4 text-secondary">Harga</h5>
              <h3 class="card-title text-danger"><?= rupiah($row['harga']) ?></h3>
              <h5 class="card-title text-secondary mt-5">Deskripsi</h5>
              <hr>
              <p class="card-text"><?= $row['deskripsi'] ?></p>
              <div class="mt-5">
                <div class="row">
                  <div class="col">
                    <a href="<?= BASE_URL ?>index.php" class="btn btn-outline-primary mr-3 card-shadow"
                    style="border-radius: 30px; padding: 10px; width: 100%;">
                      <i class="fas fa-chevron-left"></i> Kembali
                    </a>
                  </div>
                  <div class="col">
                    <a href="<?= BASE_URL ?>tambah_keranjang.php?buku_id=<?= $row['buku_id']?>"
                      class="btn btn-primary col card-shadow" style="border-radius: 30px; padding: 10px; width: 100%;">
                      <img src="<?= BASE_URL . 'assets/img/icons8-shopping-basket-60.png' ?>" width="20"> Keranjang
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- Footer -->

<?php
require_once("footer.php");
?>