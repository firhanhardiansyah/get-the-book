<?php
if ($user_id) {
  header("Location: " . BASE_URL);
}
?>
<style>
  body {
    background-image: linear-gradient(to right, #4776e6	, #8e54e9);
  }
</style>
<div style="margin-top: 5%">
  <form action="<?= BASE_URL . 'proses_login.php' ?>" method="POST">

    <?php
    $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
    ?>

    <div class="card card-login">
      <div class="card-body">
        <h4 class="card-title">Login</h4>
        <hr>
        <?php
        if ($notif == "require") {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Email ataupun Password tidak sesuai !!!
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
        } else if ($notif == "berhasil_buat_akun") {
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Berhasil membuat akun...
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
        }
        ?>

        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" id="" class="form-control" autocomplete="off">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" id="" class="form-control">
        </div>
        <div class="form-group">
          <input type="submit" class="login-btn col" value="Log In">
        </div>
      </div>
    </div>
  </form>
</div>