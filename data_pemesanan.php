<?php

  if ($user_id == true) {
?>
<div class="container pt-4">
  <div class="row">
    <div class="col-xl-7">
      <div class="card card-shadow mb-4">
        <div class="card-header">
          <h5>Detail Belanjaan</h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Buku</th>
                  <th>Qty</th>
                  <th>Harga</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $sub_total = 0;
                foreach ($keranjang as $key => $value) :
                  $buku_id   = $key;
                  $nama_buku = $value['nama_buku'];
                  $harga = $value['harga'];
                  $quantity = $value['quantity'];

                  $total = $quantity * $harga;
                  $sub_total += $total;
                ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $nama_buku ?></td>
                  <td><?= $quantity ?></td>
                  <td><?= rupiah($harga) ?></td>
                  <td><?= rupiah($total) ?></td>
                </tr>
                <?php $no++;
                endforeach ?>
              </tbody>
              <tfoot>
                <tr>
                  <th></th>
                  <th>Sub Total</th>
                  <th></th>
                  <th></th>
                  <th><?= rupiah($sub_total) ?></th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-5">
      <div class="card card-shadow mb-4">
        <div class="card-header">
          <h5>Alamat Pengiriman</h5>
        </div>
        <div class="card-body">
          <form action="<?= BASE_URL ?>proses_pemesanan.php" method="POST">
            <div class="form-group">
              <label>Nama Penerima</label>
              <input type="text" name="nama_penerima" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
              <label>Nomer Telepon</label>
              <input type="text" name="nomor_telepon" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <textarea class="form-control textarea" name="alamat" id="" rows="5"></textarea>
            </div>
            <div class="form-group">
              <label>Kota</label>
              <select name="kota" class="form-control">
                <?php
                $query = mysqli_query($con, "SELECT * FROM kota");

                while ($row = mysqli_fetch_assoc($query)) : ?>
                <option value="<?= $row['kota_id'] ?>"><?= $row['kota']?> ( <?= rupiah($row['tarif']) ?> )</option>
                <?php endwhile ?>
              </select>
            </div>
            <div class="row mt-4">
              <div class="col">
                <a href="<?= BASE_URL ?>index.php?page=keranjang" class="btn btn-primary mr-3 "
                  style="border-radius: 30px; padding: 10px; width: 100%;">
                  <i class="fas fa-chevron-left"></i> Kembali
                </a>
              </div>
              <div class="col">
                <button class="btn btn-success" style="border-radius: 30px; padding: 10px; width: 100%;" type="submit">
                  Submit <i class="fas fa-chevron-right"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
<?php
  } else {
    $_SESSION['proses_pemesanan'] = true;
    include_once("login.php");
    header("Location:". BASE_URL . "index.php?page=login");
    exit;
  }
?>

<!-- Footer -->
<?php
require_once("footer.php");
?>
<!-- End Footer -->