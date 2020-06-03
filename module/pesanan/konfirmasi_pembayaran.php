<?php

  $pesanan_id = $_GET['pesanan_id']
?>

<div class="container pt-4">
  <div class="card card-shadow mb-4">
    <div class="card-header">
      <h5>Konfirmasi Pembayaran</h5>
    </div>
    <div class="card-body">
      <form action="<?= BASE_URL ?>module/pesanan/action.php?pesanan_id=<?= $pesanan_id ?>" method="POST">
        <div class="form-group">
          <label>No Rekening</label>
          <input type="text" name="nomor_rekening" class="form-control" autocomplete="off">
        </div>
        <div class="form-group">
          <label>Nama Account</label>
          <input type="text" name="nama_account" class="form-control" autocomplete="off">
        </div>
        <div class="form-group">
          <label>Tanggal Transfer</label>
          <input type="date" name="tanggal_transfer" class="form-control" autocomplete="off">
        </div>
        <div class="mt-4 row">
          <div class="col-6 col-xl-6 col-lg-6 col-sm-6">
            <a href="<?= BASE_URL ?>index.php?page=my_profile&module=pesanan&action=detail&pesanan_id=<?= $pesanan_id ?>" class="btn btn-primary mr-3 card-shadow mb-4 col-xl-4 col-lg-4 col-md-6"
              style="border-radius: 30px; padding: 10px; width: 100%;">
              Kembali
            </a>
          </div>
          <div class="col-6 col-xl-6 col-lg-6 col-sm-6">
            <input type="submit" value="Konfirmasi" name="button" class="btn btn-success float-right card-shadow col-xl-4 col-lg-4 col-md-6"
              style="border-radius: 30px; padding: 10px; width: 100%;">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>