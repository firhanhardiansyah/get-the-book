<?php
$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : "";

$button = "Update";
$query_user = mysqli_query($con, "SELECT * FROM user WHERE user_id='$user_id'");

$row = mysqli_fetch_array($query_user);

$nama = $row["nama"];
$email = $row["email"];
$phone = $row["phone"];
$alamat = $row["alamat"];
$status = $row["status"];
$level = $row["level"];

?>
<div class="mt-3 mb-3">
  <h1><i class="fas fa-user"></i> User</h1>
</div>
<div class="card">
  <div class="card-header bg-dark text-white">
    <h5>
      <?= $button ?> Data User
    </h5>
  </div>
  <div class="card-body">
    <form action="<?= BASE_URL . "module/user/action.php?user_id=$user_id" ?>" method="POST">
      <div class="form-group">
        <label>Nama Lengkap</label>
        <input type="text" name="nama" class="form-control" value="<?= $nama ?>">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="<?= $email ?>">
      </div>
      <div class="form-group">
        <label>No Telp</label>
        <input type="text" name="phone" class="form-control" value="<?= $phone ?>">
      </div>
      <div class="form-group">
        <label>Alamat</label>
        <textarea name="alamat" id="" cols="30" rows="5" class="form-control textarea " id=""><?= $alamat ?></textarea>
      </div>
      <div class="form-group">
        <label>Level</label>
        <div class="form-check">
          <input type="radio" value="superadmin" name="level" <?php if ($level == "superadmin") echo "checked" ?> /> Superadmin
          <input type="radio" value="customer" name="level" <?php if ($level == "customer")   echo "checked" ?> /> Customer
        </div>
      </div>
      <div class="form-group">
        <label>Status</label>
        <div class="form-check">
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