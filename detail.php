<main>
  <div class="container">
    <div class="mt-3">
      <div class="card card-shadow">
        <?php
        $ebook_id = $_GET['ebook_id'];

        $query_ebook = mysqli_query($con, "SELECT * FROM ebook WHERE ebook_id='$ebook_id' AND status='on'");
        $row = mysqli_fetch_assoc($query_ebook);
        ?>
        <div class="row">
          <div class="col-lg-4 col-md-4">
            <img class="card-img-top mt-4 mb-4 img-detail" src="<?= BASE_URL ?>assets/img/ebook/<?= $row['gambar'] ?>" alt="Card image cap">
          </div>
          <div class="col-lg-8 col-md-8">
            <div class="card-body">
              <h2 class="card-title"><?= $row['nama_ebook'] ?></h2>
              <hr>
              <div class="row">
                <div class="col-lg-2">
                  <h6 class="text-secondary">Penulis</h6>
                </div>
                <div class="col-lg-10">
                  <h4 class="card-title text-dark"><?= $row['penulis'] ?></h4>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-2">
                  <h6 class="text-secondary">Harga</h6>
                </div>
                <div class="col-lg-10">
                  <h3 class="card-title text-danger"><?= rupiah($row['harga']) ?></h3>
                </div>
              </div>
              <hr>
              <div class="row" style="margin-top: 5%">
                <div class="col">
                  <a href="#" class="btn btn-outline-primary col">
                    Baca Selengkapnya . . .
                  </a>
                </div>
                <div class="col">
                  <a href="<?= BASE_URL ?>tambah_keranjang.php?ebook_id=<?= $row['ebook_id']?>" class="btn btn-primary col">
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
          <h5>Deskripsi E-Book</h5>
          <hr>
          <p class="card-text"><?= $row['deskripsi'] ?></p>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- Footer -->
<?php
require_once("footer.php");
?>