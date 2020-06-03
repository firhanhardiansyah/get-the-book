<?php 
  $pesanan_id = $_GET['pesanan_id']; 
  $query      = mysqli_query($con, "SELECT status FROM pesanan WHERE pesanan_id = '$pesanan_id'");
  $row        = mysqli_fetch_assoc($query);
  $status     = $row['status'];  
?>

<div class="mt-3 mb-3">
  <h2>Edit Pemesanan</h2>
</div>
<div class="card card-shadow">
  <div class="card-body">
    <form action="<?= BASE_URL . "module/pesanan/action.php?pesanan_id=$pesanan_id" ?>" method="POST">
      <div class="form-group">
        <label>Pesanan Id</label>
        <input type="text" name="pesanan_id" class="form-control" value="<?= $pesanan_id ?>" disabled>
      </div>
      <div class="form-group">
        <label>Status</label>
        <select name="status" id="" class="form-control">
          <?php foreach ($array_status_pesanan as $key => $value) : ?>
          <?php if ($status == $key) {?>
            <option value="<?= $key ?>" selected="true"><?= $value ?></option>
          <?php } else {?>
            <option value="<?= $key ?>" ><?= $value ?></option>
          <?php } endforeach ?>
        </select>
      </div>
      <div class="form-group">
        <input type="submit" value="Edit Status" name="button" class="btn btn-primary">
      </div>
    </form>
  </div>
</div>