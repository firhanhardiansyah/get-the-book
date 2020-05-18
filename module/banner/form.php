<?php

$banner_id = isset($_GET['banner_id']) ? $_GET['banner_id'] : "";

$banner = "";
$link = "";
$gambar = "";
$keterangan_gambar = "";
$status = "";

$button = "Tambah";

if ($banner_id != "") {
	$button = "Update";

	$queryBanner = mysqli_query($con, "SELECT * FROM banner WHERE banner_id='$banner_id'");
	$row = mysqli_fetch_array($queryBanner);

	$banner = $row["banner"];
	$link = $row["link"];
	$gambar = "<img src='" . BASE_URL . "assets/img/slide/$row[gambar]' class='img-size' />";
	$keterangan_gambar = "(klik 'Pilih Gambar' hanya jika tidak ingin mengganti gambar)";
	$status = $row["status"];
}
?>
<div class="mt-3 mb-3">
  <h1><i class="fab fa-adversal"></i> Banner</h1>
</div>
<div class="card">
  <div class="card-header bg-dark text-white">
    <h5>
    <?= $button ?> Data Banner
    </h5>
  </div>
  <div class="card-body">               <!-- Fungsi penting untuk kebutuhan mengupload gambar : enctype="multipart/form-data" -->   
    <form action="<?= BASE_URL . "module/banner/action.php?banner_id=$banner_id" ?>" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label>Banner</label>
        <input type="text" name="banner" class="form-control" value="<?= $banner ?>">
      </div>
      <div class="form-group">
        <label>Link</label>
        <input type="text" name="link" class="form-control" value="<?= $link ?>">
      </div>
      <div class="form-group">
        <label>Gambar</label>
        <input type="file" name="file" class="form-control-file"> <?= $gambar ?>
      </div>
      <div class="form-group">
        <label>Status</label>
        <div class="form-check">
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