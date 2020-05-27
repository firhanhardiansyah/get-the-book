<?php
if ($user_id) {
  header("Location: " . BASE_URL);
}
?>
<?php
$notif         =   isset($_GET['notif']) ? $_GET['notif'] : false;
$nama_lengkap  =   isset($_GET['nama_lengkap']) ? $_GET['nama_lengkap'] : false;
$email         =   isset($_GET['email']) ? $_GET['email'] : false;
$phone         =   isset($_GET['phone']) ? $_GET['phone'] : false;
$alamat        =   isset($_GET['alamat']) ? $_GET['alamat'] : false;
?>
<style>
  body {
    background-image: linear-gradient(to right, #4776e6	, #8e54e9);
  }
</style>
<div class="container">
  <div class="" style="margin-top: 5%; margin-bottom: 5%;">
    <form action="<?= BASE_URL . 'proses_register.php' ?>" method="POST">
      <div class="card card-register card-shadow">
        <div class="card-body">
          <h4 class="card-title">Daftar</h4>
          <hr>
          <?php
          if ($notif == "require") {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      Data Harus Lengkap !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
          } else if ($notif == "password_kosong") {
            echo '<div class="alert alert-danger" role="alert">
                  Password tidak boleh kosong!
                </div>';
          } else if ($notif == "password") {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Password harus sama !
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
          } else if ($notif == "email") {
            echo '<div class="alert alert-danger" role="alert">
                  Email sudah terdaftar
                </div>';
          }
          ?>
          <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" id="" class="form-control" autocomplete="off" value="<?= $nama_lengkap ?>">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" id="" class="form-control" autocomplete="off" value="<?= $email ?>">
          </div>
          <div class="form-group">
            <label>Nomer Telepon</label>
            <input type="text" name="phone" id="" class="form-control" autocomplete="off" value="<?= $phone ?>">
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control textarea" name="alamat" id="" rows="5"><?= $alamat ?></textarea>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" id="" class="form-control">
          </div>
          <div class="form-group">
            <label>Re-Type Password</label>
            <input type="password" name="re_password" id="" class="form-control">
          </div>
          <div class="form-group">
            <input type="submit" class="login-btn col" value="Daftar">
          </div>
        </div>
      </div>
    </form>
  </div>
</div>