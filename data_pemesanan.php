<div class="container pt-4">
  <div class="card card-body card-shadow">
    <h3>Alamat Pengiriman</h3>

    <form action="<?=  BASE_URL ?>proses_pemesanan.php" method="post">
      <div class="form-group">
        <label>Nama Penerima</label>
        <input type="text" name="nama_penerima" class="form-control" autocomplete="off">
      </div>
      <div class="form-group">
        <label>Nomer Telepon</label>
        <input type="text" name="nama_penerima" class="form-control" autocomplete="off">
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

    while ($row = mysqli_fetch_assoc($query)) :
  ?>
          <option value="<?= $row['kota_id']?>"><?= $row['kota'] ?></option>
          <?php
    endwhile;
  ?>
        </select>
      </div>
      <div class="float-right">
        <a href="<?= BASE_URL ?>index.php?page=keranjang" class="btn btn-outline-primary mr-3">
            <i class="fas fa-chevron-left"></i> Kembali
        </a>
        <button class="btn btn-primary" type="submit">
          Submit <i class="fas fa-chevron-right"></i>
        </button>
      </div>
    </form>
  </div>
</div>