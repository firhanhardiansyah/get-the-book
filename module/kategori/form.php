<?php
$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;
$kategori = "";
$status = "";
$button = "Tambah";

if ($kategori_id) {
  $query_kategori = mysqli_query($con, "SELECT * FROM kategori WHERE kategori_id='$kategori_id'");
  $row = mysqli_fetch_assoc($query_kategori);

  $kategori = $row['kategori'];
  $status = $row['status'];
  $button = "Update";
}
?>
<div class="mt-3 mb-3">
  <h2><i class="fas fa-th"></i> Data Kategori</h2>
</div>
<div class="card card-shadow">
  <div class="card-header bg-dark text-white">
    <h5>
      <?= $button ?> Data
    </h5>
  </div>
  <div class="card-body">
    <form action="<?= BASE_URL . "module/kategori/action.php?kategori_id=$kategori_id" ?>" method="POST">
      <div class="form-group">
        <label>Kategori</label>
        <input type="text" name="kategori" class="form-control" value="<?= $kategori ?>">
      </div>
      <div class="form-group">
        <label>Status</label>
        <div class="form-ceck">

          <input type="radio" name="status" value="on" <?php if ($status == "on")  echo "checked='true'" ?>> On
          <input type="radio" name="status" value="off" <?php if ($status == "off") echo "checked='true'" ?>> Off
        </div>
      </div>
      <div class="form-group">
        <input type="submit" value="<?= $button ?>" name="button" class="btn btn-primary">
      </div>
    </form>
  </div>
</div>