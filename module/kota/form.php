<?php
  $kota_id = isset($_GET['kota_id']) ? $_GET['kota_id'] : false;
  $kota = "";
  $tarif = "";
  $status = "";
  $button = "Tambah";

  if ($kota_id) {
    $query_kota = mysqli_query($con, "SELECT * FROM kota WHERE kota_id='$kota_id'");
    $row = mysqli_fetch_assoc($query_kota);
    
    $kota = $row['kota'];
    $tarif = $row['tarif'];
    $status = $row['status'];
    $button = "Update";
  }
?>
<div class="mt-3 mb-3">
  <h1><i class="fas fa-city"></i> Kota</h1>
</div>
<div class="card">
  <div class="card-header bg-dark text-white">
    <h5>
    <?= $button ?> Data Kota Pengiriman
    </h5>
  </div>
  <div class="card-body">
    <form action="<?= BASE_URL . "module/kota/action.php?kota_id=$kota_id" ?>" method="POST">
      <div class="form-group">
        <label>Nama Kota</label>
        <input type="text" name="kota" class="form-control" value="<?= $kota ?>">
      </div>
      <div class="form-group">
        <label>Tarif</label>
        <input type="text" name="tarif" class="form-control" value="<?= $tarif ?>">
      </div>
      <div class="form-group">
        <label>Status</label>
        <div class="form-ceck">

          <input type="radio" name="status" value="on"  <?php if($status == "on")  echo "checked='true'" ?> > On
          <input type="radio" name="status" value="off" <?php if($status == "off") echo "checked='true'" ?> > Off
        </div>
      </div>
      <div class="form-group">
        <input type="submit" value="<?= $button ?>" name="button" class="btn btn-primary">
      </div>
    </form>
  </div>
</div>